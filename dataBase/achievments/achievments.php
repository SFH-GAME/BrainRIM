<?php
// Получение достижений пользователя
function getUserAchievements($user_id)
{
    global $pdo;

    // Добавлено поле reward_claimed для отслеживания забранной награды
    $query = $pdo->prepare("
        SELECT a.id, a.name, a.description, a.type, a.goal, 
               ua.status, ua.progress, ua.reward_claimed,
               ar.currency, ar.hints, ar.IQ, ar.exp
        FROM achievements a
        LEFT JOIN user_achievements ua 
            ON a.id = ua.achievement_id AND ua.user_id = :user_id
        LEFT JOIN achievement_rewards ar 
            ON a.id = ar.achievement_id
        ORDER BY a.id
    ");
    $query->execute(['user_id' => $user_id]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Обновление достижения (увеличение прогресса)
/**
 * Обновляет достижение пользователя.
 *
 * @param int $user_id ID пользователя
 * @param int $achievement_id ID достижения
 * @param int $progress_change Сколько прогресса добавить или установить
 * @param string $mode Режим: 'add' (добавить к текущему) или 'set' (установить напрямую)
 */
function updateAchievement($user_id, $achievement_id, $progress_change = 1, $mode = 'add')
{
    global $pdo;

    // Получаем тип (single или progress) и цель (goal) достижения
    $query = $pdo->prepare("SELECT type, goal FROM achievements WHERE id = :achievement_id");
    $query->execute(['achievement_id' => $achievement_id]);
    $achievement = $query->fetch(PDO::FETCH_ASSOC);

    // Если достижение не найдено — выходим
    if (!$achievement) {
        return;
    }

    // Если достижение одноразовое (например: "Пройти обучение")
    if ($achievement['type'] === 'single') {
        // Просто сразу отмечаем как выполненное
        $pdo->prepare("
            INSERT INTO user_achievements (user_id, achievement_id, status, progress, reward_claimed) 
            VALUES (:user_id, :achievement_id, 'completed', 1, 0)
            ON DUPLICATE KEY UPDATE status = 'completed', progress = 1
        ")->execute([
                    'user_id' => $user_id,
                    'achievement_id' => $achievement_id
                ]);
    }

    // Если достижение с прогрессом (например: "Набрать 20 000 очков")
    elseif ($achievement['type'] === 'progress') {

        // Получаем текущий прогресс пользователя по этому достижению
        $query = $pdo->prepare("SELECT progress FROM user_achievements WHERE user_id = :user_id AND achievement_id = :achievement_id");
        $query->execute([
            'user_id' => $user_id,
            'achievement_id' => $achievement_id
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Если прогресс есть — берём его, иначе 0
        $current_progress = $result ? $result['progress'] : 0;

        // Вычисляем новый прогресс в зависимости от режима
        if ($mode === 'set') {
            // Устанавливаем прогресс напрямую (например, текущий уровень игрока)
            $new_progress = min($achievement['goal'], $progress_change);
        } else {
            // Прибавляем прогресс (например, очки в игре)
            $new_progress = min($achievement['goal'], $current_progress + $progress_change);
        }

        // Статус зависит от того, достигнута ли цель
        $status = ($new_progress >= $achievement['goal']) ? 'completed' : 'inprogress';

        // Обновляем или создаём запись в таблице user_achievements
        $pdo->prepare("
            INSERT INTO user_achievements (user_id, achievement_id, status, progress, reward_claimed) 
            VALUES (:user_id, :achievement_id, :status, :progress, 0)
            ON DUPLICATE KEY UPDATE status = :status, progress = :progress
        ")->execute([
                    'user_id' => $user_id,
                    'achievement_id' => $achievement_id,
                    'status' => $status,
                    'progress' => $new_progress
                ]);
    }
}


// Функция для получения награды за достижение
function claimReward($user_id, $achievement_id)
{
    global $pdo;

    // Получаем данные о награде из таблицы achievement_rewards
    $stmtReward = $pdo->prepare("
        SELECT currency, hints, IQ, exp 
        FROM achievement_rewards 
        WHERE achievement_id = :achievement_id
    ");
    $stmtReward->execute(['achievement_id' => $achievement_id]);
    $reward = $stmtReward->fetch(PDO::FETCH_ASSOC);

    if (!$reward) {
        return ['success' => false, 'message' => 'Награда для этого достижения не определена.'];
    }

    // Получаем состояние достижения пользователя
    $stmt = $pdo->prepare("
        SELECT status, reward_claimed 
        FROM user_achievements 
        WHERE user_id = :user_id AND achievement_id = :achievement_id
    ");
    $stmt->execute(['user_id' => $user_id, 'achievement_id' => $achievement_id]);
    $userAchievement = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$userAchievement || $userAchievement['status'] !== 'completed') {
        return ['success' => false, 'message' => 'Достижение не выполнено.'];
    }
    if ($userAchievement['reward_claimed']) {
        return ['success' => false, 'message' => 'Награда уже получена.'];
    }

    try {
        $pdo->beginTransaction();

        // Отмечаем, что награда получена
        $updateRewardClaim = $pdo->prepare("
            UPDATE user_achievements 
            SET reward_claimed = 1 
            WHERE user_id = :user_id AND achievement_id = :achievement_id
        ");
        $updateRewardClaim->execute(['user_id' => $user_id, 'achievement_id' => $achievement_id]);

        // Обновляем баланс валюты (таблица Memany, столбец sum_memany)
        if (isset($reward['currency']) && $reward['currency'] > 0) {
            $updateCurrency = $pdo->prepare("
                UPDATE Memany 
                SET sum_memany = sum_memany + :amount 
                WHERE user_id = :user_id
            ");
            $updateCurrency->execute(['amount' => $reward['currency'], 'user_id' => $user_id]);
        }

        // Обновляем количество подсказок (таблица hintEye, столбец sum_eye_hint)
        if (isset($reward['hints']) && $reward['hints'] > 0) {
            $updateHints = $pdo->prepare("
                UPDATE hintEye 
                SET sum_eye_hint = sum_eye_hint + :hints 
                WHERE user_id = :user_id
            ");
            $updateHints->execute(['hints' => $reward['hints'], 'user_id' => $user_id]);
        }

        // Обновляем IQ (таблица IQscore, столбец sum_iq)
        if (isset($reward['IQ']) && $reward['IQ'] > 0) {
            $updateIQ = $pdo->prepare("
                UPDATE IQscore 
                SET sum_iq = sum_iq + :IQ 
                WHERE user_id = :user_id
            ");
            $updateIQ->execute(['IQ' => $reward['IQ'], 'user_id' => $user_id]);
        }

        // Обновляем опыт пользователя (таблица usersLvl, столбец experience)
        if (isset($reward['exp']) && $reward['exp'] > 0) {
            $updateExp = $pdo->prepare("
                UPDATE usersLvl 
                SET experience = experience + :exp 
                WHERE user_id = :user_id
            ");
            $updateExp->execute(['exp' => $reward['exp'], 'user_id' => $user_id]);
        }

        $pdo->commit();
        return ['success' => true, 'message' => 'Награда успешно получена!'];
    } catch (Exception $e) {
        $pdo->rollBack();
        return ['success' => false, 'message' => 'Ошибка при получении награды.'];
    }
}





/*
Пример: вызываем в коде после завершения игры

require_once 'achievements.php';

$user_id = $_SESSION['id']; // Получаем ID пользователя

// Обновляем статистику пользователя после игры
$points_earned = 50; // Очки за игру (пример)
$pdo->prepare("INSERT INTO user_experience (user_id, points) VALUES (:user_id, :points)")
    ->execute(['user_id' => $user_id, 'points' => $points_earned]);

// Проверяем, какие достижения можно обновить
checkAllAchievements($user_id);
*/


//проверка достижений на выполнение

// Автоматическая проверка всех достижений (вызывать при определённых действиях)
function checkAllAchievements($user_id)
{
    global $pdo;

    // Проверяем достижение "Первые шаги" (первый вход в систему)
    // Если пользователь существует (проверка на наличие $user_id)
    if ($user_id) {
        updateAchievement($user_id, 1, 1, 'set'); // ID 1 — достижение "Первые шаги" (устанавливаем прогресс)
    }

    // Проверяем достижение "Первые очки опыта" (первое получение опыта)
    $query = $pdo->prepare("SELECT experience FROM usersLvl WHERE user_id = :user_id");
    $query->execute(['user_id' => $user_id]);
    $experience = $query->fetchColumn();
    // Если у пользователя есть опыт (т.е. он его получил)
    if ($experience > 0) {
        updateAchievement($user_id, 2, 1, 'set'); // ID 2 — достижение "Первые очки опыта" (устанавливаем прогресс)
    }
}

function checkLevelAchievement($user_id)
{
    global $pdo;

    // Получаем текущий уровень пользователя
    $query = $pdo->prepare("SELECT level FROM usersLvl WHERE user_id = :user_id");
    $query->execute(['user_id' => $user_id]);
    $level = $query->fetchColumn();

    // ID достижения "Достигнуть 3 уровня"
    $achievement_id3 = 3;
    // ID достижения "Достигнуть 5 уровня"
    $achievement_id5 = 5;

    // Обновляем прогресс достижения
    updateAchievement($user_id, $achievement_id3, $level, 'set');
    updateAchievement($user_id, $achievement_id5, $level, 'set');
}

//проверяем достижения для игры 2048
function check2048Achievement($user_id, $score)
{
    global $pdo;

    //достижение заработать 20000
    $achievement_id = 4;

    // Проверяем текущий прогресс достижения
    $query = $pdo->prepare("SELECT progress FROM user_achievements WHERE user_id = :user_id AND achievement_id = :achievement_id");
    $query->execute(['user_id' => $user_id, 'achievement_id' => $achievement_id]);
    $current_progress = $query->fetchColumn();

    // Убеждаемся, что прогресс увеличивается, но не превышает цель
    $new_progress = ($current_progress ? $current_progress : 0) + $score;

    updateAchievement($user_id, $achievement_id, $score, 'add');
}

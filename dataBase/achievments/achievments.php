<?php

//получаем достижения пользователя из базы данных
function getUserAchievements($user_id) {
   global $pdo;

   $query = $pdo->prepare("
       SELECT a.id, a.name, a.description, a.type, a.goal, 
              ua.status, ua.progress 
       FROM achievements a
       LEFT JOIN user_achievements ua ON a.id = ua.achievement_id AND ua.user_id = :user_id
       ORDER BY a.id
   ");
   $query->execute(['user_id' => $user_id]);
   return $query->fetchAll(PDO::FETCH_ASSOC);
}


//функция обновления достижений и пример использования: updateAchievement($_SESSION['id'], 1); // Выполнить одноразовое достижение (например, "Зарегистрироваться") или updateAchievement($_SESSION['id'], 2, 10); // Добавить 10 к прогрессу (например, "Сыграть 10 игр из 50")

function updateAchievement($user_id, $achievement_id, $progress_increase = 1) {
   global $pdo;

   // Получаем тип и цель достижения
   $query = $pdo->prepare("SELECT type, goal FROM achievements WHERE id = :achievement_id");
   $query->execute(['achievement_id' => $achievement_id]);
   $achievement = $query->fetch(PDO::FETCH_ASSOC);

   if (!$achievement) {
       return; // Если достижения нет, выходим
   }

   if ($achievement['type'] === 'single') {
       // Одноразовое достижение
       $pdo->prepare("
           INSERT INTO user_achievements (user_id, achievement_id, status, progress) 
           VALUES (:user_id, :achievement_id, 'completed', 1) 
           ON DUPLICATE KEY UPDATE status = 'completed', progress = 1
       ")->execute(['user_id' => $user_id, 'achievement_id' => $achievement_id]);

   } elseif ($achievement['type'] === 'progress') {
       // Прогресс-достижение
       $query = $pdo->prepare("
           SELECT progress FROM user_achievements 
           WHERE user_id = :user_id AND achievement_id = :achievement_id
       ");
       $query->execute(['user_id' => $user_id, 'achievement_id' => $achievement_id]);
       $result = $query->fetch(PDO::FETCH_ASSOC);

       $current_progress = $result ? $result['progress'] : 0;
       $new_progress = min($achievement['goal'], $current_progress + $progress_increase);
       $status = ($new_progress >= $achievement['goal']) ? 'completed' : 'inprogress';

       $pdo->prepare("
           INSERT INTO user_achievements (user_id, achievement_id, status, progress) 
           VALUES (:user_id, :achievement_id, :status, :progress) 
           ON DUPLICATE KEY UPDATE status = :status, progress = :progress
       ")->execute([
           'user_id' => $user_id, 
           'achievement_id' => $achievement_id,
           'status' => $status, 
           'progress' => $new_progress
       ]);
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
function checkAllAchievements($user_id) {
    global $pdo;

    // Проверяем достижение "Первые шаги" (первый вход в систему)
    if ($user_id) {
        updateAchievement($user_id, 1); // ID 1 — достижение "Первые шаги"
    }

    // Проверяем достижение "Марафонец" (сыграть 50 игр)
    /*$query = $pdo->prepare("SELECT COUNT(*) FROM game_sessions WHERE user_id = :user_id");
    $query->execute(['user_id' => $user_id]);
    $games_played = $query->fetchColumn();
    
    updateAchievement($user_id, 2, $games_played); // ID 2 — достижение "Марафонец"

    // Проверяем достижение "Гуру" (1000 опыта)
    $query = $pdo->prepare("SELECT SUM(points) FROM user_experience WHERE user_id = :user_id");
    $query->execute(['user_id' => $user_id]);
    $total_xp = $query->fetchColumn();
    
    updateAchievement($user_id, 3, $total_xp); // ID 3 — достижение "Гуру"
    */

}

function checkLevelAchievement($user_id) {
    global $pdo;

    // Получаем текущий уровень пользователя
    $query = $pdo->prepare("SELECT level FROM usersLvl WHERE user_id = :user_id");
    $query->execute(['user_id' => $user_id]);
    $level = $query->fetchColumn();

    // ID достижения "Достигнуть 3 уровня" (проверь в БД)
    $achievement_id = 3; // Заменить на правильный ID

    // Обновляем прогресс достижения
    updateAchievement($user_id, $achievement_id, $level);
}
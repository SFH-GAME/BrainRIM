<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php";
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/achievments/achievments.php";

$achievements = getUserAchievements($_SESSION['id']);//запрашиваем список достижений из базы
?>
<!DOCTYPE html>
<html lang="en">
<script>//записывает в переменные данные из базы
    <?php if (isset($_SESSION['id'])): ?>
        let levelValue = Number('<?= $levelValue ?>');

    <?php else: ?>//что бы не было ошибки когда не авторизован пользователь

        let levelValue = Number(1);
    <?php endif; ?>
</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="Profile.css?v=4.0">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
    <title>Профиль</title>
</head>

<body>
    <!-- alert -->
    <div class="pop-up-alert-container">
        <div class="alert-text">Функция в разработке!</div>
    </div>
    </div>
    <div class="gray-background-container"></div>
    <!-- alert -->
    <header>
        <a class="comeback-button" href="/index.php">
            <ion-icon name="arrow-back-outline" role="img" class="md hydrated"
                aria-label="arrow back outline"></ion-icon>
        </a>
        <div class="mail-messages" onclick="toggleMailContainer()"><ion-icon name="mail-outline"
                class="mail md hydrated" role="img" aria-label="mail outline"></ion-icon>
            <div class="circle"></div>
        </div>
    </header>


    <main>
        <div class="profile-container">
            <div class="profile-avatar"><img src="/img/Menu/brain.svg" alt="аватар"></div>
            <div class="nickname">
                <?php if (isset($_SESSION['id'])): ?>
                    <?php echo $_SESSION['login']; ?>
                <?php else: ?>
                    Логин
                <?php endif; ?>
                <div class="change-name"><ion-icon name="pencil-outline" role="img" class="md hydrated"
                        aria-label="pencil outline"></ion-icon></div>
            </div>
            <div class="rank-container">
                <h3>Статус:</h3>
                <div class="rank">Новенький</div>
            </div>

            <h3>Прогресс</h3>
            <div class="progress-container">
                <div class="progress-item">
                    <ion-icon name="ribbon-outline"></ion-icon>
                    <div class="progress-value">
                        <?php if (isset($_SESSION['id'])): ?>
                            <?php echo $completedAchievementsCount; ?>
                        <?php else: ?>
                            0
                        <?php endif; ?>
                    </div>
                    <div class="progress-label">Достижений получено</div>
                </div>
                <div class="divider"></div>
                <div class="progress-item">
                    <ion-icon name="stats-chart-outline"></ion-icon>
                    <div class="progress-value">
                        <?php if (isset($_SESSION['id'])): ?>
                            <span class="playerLvlCounterBody"></span>
                        <?php else: ?>
                            <span class="playerLvlCounterBody"></span>
                        <?php endif; ?>
                    </div>
                    <div class="progress-label">Уровней позади</div>
                </div>
                <div class="divider"></div>
                <div class="progress-item">
                    <ion-icon name="checkbox-outline"></ion-icon>
                    <div class="progress-value">0</div>
                    <div class="progress-label">Задач выполнено</div>
                </div>
            </div>

            <h3 class="skill-txt">Уровень навыков</h3>
            <div class="skill-container">
                <div class="test-position">
                    <button class="test-button">Пройти Тест</button>
                </div>
                <div class="skill">
                    <span>Память <span>(<div class="actual-num">0</div>/100)</span></span>
                    <div class="progress-bar">
                        <div class="progress" style="width: 1%;"></div>
                    </div>
                </div>
                <div class="skill">
                    <span>Память <span>(<div class="actual-num">0</div>/100)</span></span>
                    <div class="progress-bar">
                        <div class="progress" style="width: 1%;"></div>
                    </div>
                </div>
                <div class="skill">
                    <span>Память <span>(<div class="actual-num">0</div>/100)</span></span>
                    <div class="progress-bar">
                        <div class="progress" style="width: 1%;"></div>
                    </div>
                </div>
                <div class="skill">
                    <span>Память <span>(<div class="actual-num">0</div>/100)</span></span>
                    <div class="progress-bar">
                        <div class="progress" style="width: 1%;"></div>
                    </div>
                </div>
            </div>

            <div class="achievements">
                <h3 class="achievements-txt">Достижения</h3>
                <img class="Braincurrencypct" src="/img/Menu/Braincurrency.svg" alt="">

                <div class="popup-overlay"></div>

                <img class="Braincurrencypctafter" src="/img/Menu/Braincurrency.svg" alt="">
                <div class="currencies-popup">
                    <div class="currency-span">Капитал</div>
                    <div class="currency-divider"></div>

                    <div class="currencies">
                        <div class="set-currency">
                            <div class="currency-pct lamp"><img class="lamppct" src="/img/Menu/lamp-idea.png" alt="">
                            </div>
                            <div class="currency-background lamp-value">508</div>
                        </div>

                        <div class="set-currency">
                            <div class="currency-pct memoney"><img class="memoneypct" src="/img/Menu/memoney2.png"
                                    alt=""></div>
                            <div class="currency-background memoney-value">675</div>
                        </div>

                        <div class="set-currency">
                            <div class="currency-pct exp"><img class="exppct" src="/img/Menu/exp.png" alt=""></div>
                            <div class="currency-background exp-currency">
                                <div class="exp-level">0 уровень</div>
                                <div class="exp-value">6/250</div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php foreach ($achievements as $achieve): ?>
                    <?php
                    $progress = $achieve['progress'] ?? 0;
                    $goal = $achieve['goal'] ?? 1; // 1 для одноразовых достижений
                    $progress_percent = ($achieve['type'] === 'progress') ? min(100, ($progress / $goal) * 100) : 100;
                    $status = ($achieve['status'] === 'completed') ? 'completed' : 'inprogress';
                    ?>
                    <div class="achieve" data-achievement-id="<?= $achieve['id'] ?>">
                        <h3 class="achieve-theme"><?= htmlspecialchars($achieve['name']) ?></h3>
                        <span class="achieve-descript"><?= htmlspecialchars($achieve['description']) ?></span>

                        <!-- Прогресс-бар (отображается только для достижений с прогрессом) -->
                        <?php if ($achieve['type'] === 'progress'): ?>
                            <div class="progress-text"><?= $progress ?>/<?= $goal ?></div>
                            <div class="progress-bar">
                                <div class="progress" style="width: <?= $progress_percent ?>%;"></div>
                            </div>
                        <?php endif; ?>

                        <!-- Статус -->
                        <div class="spinner <?= $status ?>">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <div class="reward-container">
                            <!-- Награда -->
                            <?php if ($achieve['status'] === 'completed' && ($achieve['reward_claimed'] ?? 0) == 0): ?>
                                <div class="reward-info">
                                    <div class="reward-block">
                                        <div class="reward-item">
                                            <img src="/img/Menu/Memoney.png" alt="игровая валюта" title="игровая валюта">
                                            <span>10</span>
                                        </div>
                                        <div class="reward-item">
                                            <img src="/img/Menu/Memoney.png" alt="игровая валюта" title="игровая валюта">
                                            <span>5</span>
                                        </div>
                                        <div class="reward-item">
                                            <img src="/img/Menu/Memoney.png" alt="игровая валюта" title="игровая валюта">
                                            <span>0</span>
                                        </div>
                                        <div class="reward-item">
                                            <img src="/img/Menu/Memoney.png" alt="игровая валюта" title="игровая валюта">
                                            <span>0</span>
                                        </div>
                                    </div>
                                    <button class="claim-reward" data-achievement-id="<?= $achieve['id'] ?>">
                                        Забрать награду
                                    </button>
                                </div>
                            <?php elseif (($achieve['reward_claimed'] ?? 0) == 1): ?>
                                <div class="received-reward-info">
                                    <span>Награда получена!</span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="achive__button-container">
                            <div class="achieve-progress <?= $status ?>">
                                <?= $achieve['status'] === 'completed' ? 'Выполнено' : 'В процессе' ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Подключаем jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--скрипт для обновления наград в базе после получения-->
        <script>
            $(document).ready(function () {
                $('.claim-reward').on('click', function () {
                    var achievementId = $(this).data('achievement-id');
                    var button = $(this);
                    $.ajax({
                        url: '/dataBase/achievments/claim_rewardAchievments.php', // Файл для обработки получения награды
                        type: 'POST',
                        data: { achievement_id: achievementId },
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                alert(response.message);
                                // Обновляем интерфейс: заменяем кнопку сообщением о получении награды
                                button.closest('.reward-info').html('<span>Награда получена!</span>');
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function () {
                            alert('Ошибка запроса.');
                        }
                    });
                });
            });
        </script>

        <div class="leave-btn">
            <a href="<?php echo "/dataBase/logOut.php"; ?>" class="logout">Выйти из аккаунта</a>
        </div>


        <div class="mail-container">
            <div class="mail-header">
                <ion-icon name="arrow-back-outline" role="img" class="md hydrated mail-back"
                    aria-label="arrow back outline" onclick="toggleMailContainer()"></ion-icon>
                <h3 class="msg">Сообщения</h3>
            </div>
            <div class="user-messages">
                <div class="message">
                    <span class="message-txt">Подарок за регистрацию</span>
                    <div class="message-reward">
                        <div class="currency"><img class="currency-memoney-icon" src="/img/Menu/Memoney.png"
                                alt="memoney"> 10
                        </div>
                        <div class="hints"><img class="currency-icons" src="img/Hints.svg" alt="hints"> 20</div>
                        <div class="iq"><span class="iq-name">IQ</span> 10</div>
                    </div>
                    <div class="message-description">Мы рады приветствовать вас в приложении BrainRIM. Благодарим вас и
                        дарим приветственный бонус. Приятной игры!</div>
                </div>
                <!--<div class="message">
                    <span class="message-txt">Поделитесь с друзьями</span>
                    <div class="message-reward">
                        <div class="currency"><img class="currency-memoney-icon" src="/Memoney.svg" alt="memoney"> ?</div>
                        <div class="hints"><img class="currency-icons" src="/Hints.svg" alt="hints"> ?</div>
                        <div class="iq"><span class="iq-name">IQ</span> ?</div>
                    </div>
                    <div class="message-description">Расскажи о нас в своих соцсетях и получи бонус!</div>
                </div>-->
            </div>
            <div class="check-all-msg">Пометить всё как прочитанное

                <div class="checkbox-wrapper-46">
                    <input type="checkbox" id="cbx-46" class="inp-cbx" />
                    <label for="cbx-46" class="cbx"><span>
                            <svg viewBox="0 0 12 10" height="10px" width="12px">
                                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                            </svg></span><span></span>
                    </label>
                </div>

            </div>
        </div>

    </main>
</body>
<script src="Profile.js?v=2.0"></script>

</html>
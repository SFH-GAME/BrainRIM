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
    <link rel="stylesheet" href="Profile.css?v=1.0">
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
            <img src="/img/icons/arrow-back-outline.svg" class="close-about-us img-icon" alt="иконка закрытия"
                title="иконка закрытия">
        </a>
        <div class="mail-messages" onclick="toggleMailContainer()">
            <img src="/img/icons/mail-outline.svg" alt="письмо" title="письмо">
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
                <div class="change-name"><img src="/img/icons/pencil-outline.svg" class="close-about-us img-icon"
                        alt="карандаш" title="карандаш"></div>
            </div>
            <div class="rank-container">
                <h3>Статус:</h3>
                <div class="rank">Новенький</div>
            </div>

            <h3>Прогресс</h3>
            <div class="progress-container">
                <div class="progress-item">
                    <img src="/img/icons/ribbon-outline.svg" alt="достижения" title="достижения">
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
                    <img src="/img/icons/stats-chart-outline.svg" alt="иконка уровней" title="иконка уровней">
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
                    <img src="/img/icons/checkbox-outline.svg" alt="иконка задач" title="иконка задач">
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
                    <span>Реакция <span>(<div class="actual-num">0</div>/100)</span></span>
                    <div class="progress-bar">
                        <div class="progress" style="width: 1%;"></div>
                    </div>
                </div>
                <div class="skill">
                    <span>Внимательность <span>(<div class="actual-num">0</div>/100)</span></span>
                    <div class="progress-bar">
                        <div class="progress" style="width: 1%;"></div>
                    </div>
                </div>
                <div class="skill">
                    <span>Интеллект <span>(<div class="actual-num">0</div>/100)</span></span>
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
                            <div class="currency-pct memoney"><img class="memoneypct" src="/img/Menu/Memoney.png"
                                    alt=""></div>
                            <div class="currency-background memoney-value">
                                <?php if (isset($_SESSION['id'])): ?>
                                    <span class="currency-value"><?php echo $memany['sum_memany']; ?></span>
                                <?php else: ?>
                                    <span class="currency-value">0</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="set-currency">
                            <div class="currency-pct lamp"><img class="lamppct" src="/img/Menu/icon-hints.png" alt="">
                            </div>
                            <div class="currency-background lamp-value">
                                <?php if (isset($_SESSION['id'])): ?>
                                    <span class="hints-value"><?php echo $EyeScore['sum_eye_hint']; ?></span>
                                <?php else: ?>
                                    <span class="hints-value">0</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="set-currency">
                            <div class="currency-pct "><img src="/img/Menu/IQ.svg" alt="IQ" title="IQ"></div>
                            <div class="currency-background ">
                                <?php if (isset($_SESSION['id'])): ?>
                                    <span class="iq-value"><?php echo $IQscore['sum_iq']; ?></span>
                                <?php else: ?>
                                    <span class="iq-value">0</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="set-currency">
                            <div class="currency-pct exp"><img class="exppct" src="/img/Menu/exp.png" alt=""></div>
                            <div class="currency-background exp-currency">
                                <div class="exp-level">
                                    <?php if (isset($_SESSION['id'])): ?>
                                        <?php echo $level['Level']; ?>
                                    <?php else: ?>
                                        0
                                    <?php endif; ?>
                                    уровень
                                </div>
                                <div class="exp-value-container">
                                    <?php if (isset($_SESSION['id'])): ?>
                                        <span class="exp-value"><?php echo $level['experience']; ?></span> /
                                        <?php echo $level['nextLvlExp']; ?>
                                    <?php else: ?>
                                        0
                                    <?php endif; ?>
                                </div>
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
                            <div class="reward-info <?= ($achieve['reward_claimed'] ?? 0) == 1 ? 'claimed' : '' ?>">
                                <!--здесть я добавляю классы со стилями под разные статусы -->
                                <div class="reward-block 
                                <?= ($achieve['status'] === 'completed' && ($achieve['reward_claimed'] ?? 0) == 0) ? 'pending-reward' : '' ?> 
                                <?= ($achieve['reward_claimed'] ?? 0) == 1 ? 'claimed-reward' : '' ?>">
                                    <div class="reward-item">
                                        <img src="/img/Menu/Memoney.png" alt="игровая валюта" title="игровая валюта">
                                        <span><?= $achieve['currency'] ?></span>
                                    </div>
                                    <div class="reward-item">
                                        <img src="/img/Menu/icon-hints.png" alt="подсказки" title="подсказки">
                                        <span><?= $achieve['hints'] ?></span>
                                    </div>
                                    <div class="reward-item">
                                        <img src="/img/Menu/IQ.svg" alt="IQ" title="IQ">
                                        <span><?= $achieve['IQ'] ?></span>
                                    </div>
                                    <div class="reward-item">
                                        <img src="/img/Menu/exp-icon.svg" alt="опыт" title="опыт">
                                        <span><?= $achieve['exp'] ?></span>
                                    </div>
                                </div>

                                <?php if ($achieve['status'] === 'completed' && ($achieve['reward_claimed'] ?? 0) == 0): ?>
                                    <button class="claim-reward" data-achievement-id="<?= $achieve['id'] ?>">
                                        Забрать награду
                                    </button>
                                <?php endif; ?>
                            </div>
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
                $(document).on('click', '.claim-reward', function () {
                    var button = $(this);
                    var achievementId = button.data('achievement-id');
                    var achievementContainer = button.closest('.achieve');
                    var rewardBlock = achievementContainer.find('.reward-block');

                    // Определяем иконки валют и соответствующие элементы в интерфейсе
                    var currencyData = [
                        { icon: "/img/Menu/Memoney.png", target: $('.currency-background .currency-value') },
                        { icon: "/img/Menu/icon-hints.png", target: $('.currency-background .hints-value') },
                        { icon: "/img/Menu/IQ.svg", target: $('.currency-background .iq-value') },
                        { icon: "/img/Menu/exp-icon.svg", target: $('.currency-background .exp-value') }
                    ];

                    // Определяем целевой блок (Braincurrencypct)
                    var target = $('.Braincurrencypct');
                    var targetOffset = target.offset();

                    $.post('/dataBase/achievments/claim_rewardAchievments.php', { achievement_id: achievementId }, function (response) {
                        if (response.success) {
                            // Обновляем стиль кнопки
                            button.css({ 'opacity': '0.7', 'cursor': 'default' }).prop('disabled', true).text('Награда получена');
                            rewardBlock.addClass('claimed-reward');

                            // Запускаем анимацию полёта валют
                            currencyData.forEach((data, index) => {
                                let rewardValue = parseInt(rewardBlock.find(`.reward-item:eq(${index}) span`).text()) || 0;
                                let targetCurrency = data.target;

                                if (rewardValue > 0) {
                                    setTimeout(function () {
                                        var flyingReward = $('<img class="flying-currency" src="' + data.icon + '">').appendTo('body');

                                        flyingReward.css({
                                            left: button.offset().left + 'px',
                                            top: button.offset().top + 'px',
                                            position: 'absolute',
                                            zIndex: 1000,
                                            width: '25px',
                                            height: '25px',
                                            opacity: 1
                                        });

                                        flyingReward.animate({
                                            left: targetOffset.left + (Math.random() * 30 - 15) + 'px',
                                            top: targetOffset.top + 'px',
                                            opacity: 0
                                        }, 2500, function () {
                                            $(this).remove();

                                            // **Обновляем значение валюты в интерфейсе**
                                            targetCurrency.text(parseInt(targetCurrency.text()) + rewardValue);
                                        });
                                    }, index * 200);
                                }
                            });

                        } else {
                            alert(response.message);
                        }
                    }, 'json').fail(function () {
                        alert('Ошибка запроса.');
                    });
                });
            });

        </script>

        <div class="leave-btn">
            <a href="<?php echo "/dataBase/logOut.php"; ?>" class="logout">Выйти из аккаунта</a>
        </div>


        <div class="mail-container">
            <div class="mail-header">
                <img src="/img/icons/arrow-back-outline.svg" class="md hydrated mail-back"
                    onclick="toggleMailContainer()" alt="иконка закрытия" title="иконка закрытия">
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
<script src="Profile.js?v=1.0"></script>

</html>
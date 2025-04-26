<?php
include($_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <script>//записывает в переменные данные из базы
      <?php if (isset($_SESSION['id'])): ?>
         let expValue = Number('<?= $expValue ?>');
         let nextLvlExpValue = Number('<?= $nextLvlExpValue ?>');
         let levelValue = Number('<?= $levelValue ?>');
         let memoneyValue = Number('<?= $memoneyValue ?>');
         let hintsValue = Number('<?= $hintsValue ?>');
         let receiveGiftValue = Number('<?= $receiveGiftValue ?>');
         let viewedPopUpValue = Number('<?= $viewedPopUpValue ?>');
      <?php else: ?>//что бы не было ошибки когда не авторизован пользователь
         let expValue = 0;
         let nextLvlExpValue = Number(100);
         let levelValue = Number(1);
         let memoneyValue = 1;
         let hintsValue = 1;
         let receiveGiftValue = 1;
         let viewedPopUpValue = 1;
      <?php endif; ?>
   </script>

   <!-- Этот код нужен для предварительного запуска темы(чтобы не было вспышки)-->
   <script>
         (function () {
            try {
               const userPref = localStorage.getItem('theme');
               let theme;
               if (userPref) {
                  theme = userPref;
               } else {
                  theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
               }
               document.documentElement.setAttribute('data-theme', theme);
            } catch (e) { }
         })();
   </script>


   <!-- Основные метатеги -->
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

   <meta name="description"
      content="BrainRim — приложение для самосовершенствования и развития! Ежедневные интересные слова, исторические даты, английский словарный запас. Мини-игры на логику, память и отдых. Система баллов и наград для мотивации!">
   <meta name="keywords"
      content="самосовершенствование, развитие, мини-игры, логика, память, внимание, английский язык, интересные слова, исторические даты, 2048, баллы, награды, мотивация">
   <meta name="author" content="Романовский Порфирий">
   <meta name="robots" content="index, follow">
   <meta name="theme-color" content="#161618">

   <!-- Open Graph (для соцсетей) -->
   <meta property="og:title" content="BrainRim — развивайся каждый день!">
   <meta property="og:description"
      content="Самосовершенствование, мини-игры, ежедневные интересные факты и много мотивации! Попробуй сегодня!">
   <meta property="og:image" content="/img/app_icon_with_larger_area_1024x1024.png">
   <meta property="og:url" content="https://brainrim.site">
   <meta property="og:type" content="website">

   <!-- Twitter Card -->
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="BrainRim — развивайся каждый день!">
   <meta name="twitter:description"
      content="Ежедневные обновления: интересные слова, исторические даты, английский словарный запас, мини-игры для тренировки логики, памяти и отдыха!">
   <meta name="twitter:image" content="/img/app_icon_with_larger_area_1024x1024.png">

   <!-- Дополнительные метатеги -->
   <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
   <link rel="manifest" href="/manifest.json">
   <meta name="application-name" content="BrainRim">
   <meta name="mobile-web-app-capable" content="yes">
   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="apple-mobile-web-app-title" content="BrainRim">
   <meta name="apple-mobile-web-app-status-bar-style" content="default">
   <link rel="apple-touch-icon" href="/img/app_icon_with_larger_area_1024x1024.png">

   <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/system/css/global.css?v=1.0">
   <link rel="stylesheet" href="/pages/main-page/css/main-page.css?v=1.0">
   <link rel="manifest" href="/manifest.json">
   <title>Развитие и самосовершенствование - BrainRim</title>
   <link rel="canonical" href="https://brainrim.site">


   <!-- Yandex.Metrika counter -->
   <script type="text/javascript">
      (function (m, e, t, r, i, k, a) {
         m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
         m[i].l = 1 * new Date();
         for (var j = 0; j < document.scripts.length; j++) { if (document.scripts[j].src === r) { return; } }
         k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
      })
         (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

      ym(99567764, "init", {
         clickmap: true,
         trackLinks: true,
         accurateTrackBounce: true,
         webvisor: true
      });
   </script>
   <noscript>
      <div><img src="https://mc.yandex.ru/watch/99567764" style="position:absolute; left:-9999px;" alt="" /></div>
   </noscript>
   <!-- /Yandex.Metrika counter -->
</head>

<body>
   <!-- alert -->
   <div class="pop-up-alert-container">
      <div class="alert-text">Функция в разработке!</div>
   </div>
   <!-- alert -->
   <div class="wrapper">
      <div class="gray-background-container"></div>
      <header class="header">
         <div class="header__top-button-container">
            <a href="/pages/settings-page/settings-page.php" class="settings"><img src="/img/icons/settings-outline.svg"
                  class="icon-settings" alt="иконка настроек" title="иконка настроек"></a>
            <!--<span class="header__top-button-title">BrainRIM</span>-->
            <div class="card">
               <div class="loader">
                  <p>Улучши</p>
                  <div class="words">
                     <span class="word">память</span>
                     <span class="word">внимательность</span>
                     <span class="word">реакцию</span>
                     <span class="word">интеллект</span>
                     <span class="word">с BrainRIM</span>
                     <span class="word">память</span>
                  </div>
               </div>
            </div>
            <div class="Profile-anim"><a href="/pages/Profile-page/Profile.php" class="profile-page"><img
                     src="/img/Menu/brain.svg" alt="#" class="profile"></a>
               <div class="unread-mark"></div>
            </div>

         </div>
         <div class="header-score-container">
            <div class="memany-container currency-container">
               <div role="tooltip" id="help-tooltip" class="tooltip">
                  <i>💡</i><strong>Memoney</strong>
               </div>
               <img class="currency-memoney-icon" src="/img/Menu/Memoney.png" alt="memoney">
               <div class="memany-count home-memony-body">
                  <?php if (isset($_SESSION['id'])): ?>
                     <?php echo $memany['sum_memany']; ?>
                  <?php else: ?>
                     0
                  <?php endif; ?>
               </div>
            </div>
            <div class="hint-container currency-container">
               <div role="tooltip" id="help-tooltip" class="tooltip">
                  <i>💡</i><strong>Подсказки</strong>
               </div>
               <img class="currency-icons" src="/img/Menu/icon-hints.png" alt="hints">
               <div class="memany-count home-hints-body">
                  <?php if (isset($_SESSION['id'])): ?>
                     <?php echo $EyeScore['sum_eye_hint']; ?>
                  <?php else: ?>
                     0
                  <?php endif; ?>
               </div>
            </div>
            <div class="iq-container currency-container">
               <div role="tooltip" id="help-tooltip" class="tooltip">
                  <i>💡</i><strong>Интеллект</strong>
               </div>
               <span class="iq-name">IQ</span>
               <div class="memany-count home-iq-body">
                  <?php if (isset($_SESSION['id'])): ?>
                     <?php echo $IQscore['sum_iq']; ?>
                  <?php else: ?>
                     0
                  <?php endif; ?>
               </div>
            </div>
         </div>

         <div class="player-level">Уровень
            <?php if (isset($_SESSION['id'])): ?>
               <span class="playerLvlCounterBody"></span>
            <?php else: ?>
               <span class="playerLvlCounterBody"></span>
            <?php endif; ?>
         </div>
         <div id="loading-bar" class="player-exp-scale">
            <div id="progress" class="player-exp__line-blue"></div>
            <p class="player-exp__text"><?php if (isset($_SESSION['id'])): ?> <span class="expValueFromDB"></span>
               <?php else: ?><span class="expValueFromDB"></span><?php endif; ?>/<?php if (isset($_SESSION['id'])): ?>
                  <span class="nextLvl-value"></span> <?php else: ?><span class="nextLvl-value"></span><?php endif; ?>
            </p>
         </div>
      </header>
      <main class="main">
         <div class="lvl-container">

            <script
               src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.9.3/tsparticles.confetti.bundle.min.js"></script>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
            <button class="level-up magic" style="display:none;">Улучшить</button>
            <?php if (isset($_SESSION['id'])): ?>
               <div class="tree-button">
                  <img src="/img/Menu/Tree.svg" alt="Дерево навыков">
                  <span class="tree-span">Дерево навыков</span>
               </div>
            <?php else: ?>
               <a class="reg-hint" href="/pages/page-registration/registration-page.php">
                  <img src="/img/icons/gift-outline.svg" class="reg-hint-icon img-icon" alt="иконка подарка"
                     title="иконка подарка">
                  <span class="reg-hint-text"><span>Войдите</span>, чтобы сохранить прогресс.<br> <span>Подарок</span> при
                     регистрации!</span>
               </a>


            <?php endif; ?>
            <div class="tasks-bonus-iq-container">
               <div class="everyday-word-button"><img src="/img/icons/calendar-number-outline.svg" class="img-icon"
                     alt="иконка календаря" title="иконка календаря"></div>
               <div class="everyday-tasks-button"><img src="/img/icons/receipt-outline.svg" class="img-icon"
                     alt="иконка рецепта" title="иконка рецепта"></div>
            </div>
            <div class="about-us-container">
               <div class="about-us-header">
                  <img src="/img/icons/arrow-forward-outline.svg" class="close-about-us img-icon" alt="иконка закрытия"
                     title="иконка закрытия">
                  <h1 class="about-app-text">О приложении</h1>
               </div>
               <div class="about-us-first about-us-body">
                  <div class="about-us-title">Здравствуй!</div>
                  <div class="about-us-welcome-text">Наш проект предназначен для людей которые, как и мы, стремиться к
                     самосовершенствованию, развитию, и успеху в жизни! Приложение выступит в роли вашего
                     помощника-ассистента.</div>
               </div>

               <div class="about-us-first about-us-body">
                  <div class="about-us-title">Функционал</div>
                  <div class="about-us-warning-info">(Некоторые функции в стадии разработки)</div>
                  <div class="about-us-text">1. Система уровней и бонусов</div>
                  <div class="about-us-picture"><img class="about-us-png" src="pages\main-page\img\Funct.png"
                        alt="hints"></div>
               </div>

               <div class="about-us-first about-us-body">
                  <div class="about-us-text">2. Игры для развития и отдыха</div>
                  <div class="about-us-picture"><img class="about-us-png" src="pages\main-page\img\2048.png"
                        alt="hints"></div>
               </div>

               <div class="about-us-first about-us-body">
                  <div class="about-us-text">3. Раздел "Развитие"</div>
                  <div class="about-us-picture"><img class="about-us-png" src="pages\main-page\img\Growth.png"
                        alt="hints"></div>
                  <div class="about-us-Description">Финансы, планирование, спорт, медитация, питание. Эти и другие
                     функции мы поможем внедрить в вашу жизнь.</div>
               </div>

               <div class="about-us-first about-us-body">
                  <div class="about-us-text">4. Раздел "Аналитика"</div>
                  <div class="about-us-picture"><img class="about-us-png" src="pages\main-page\img\analitycs.png"
                        alt="hints"></div>
                  <div class="about-us-Description">Отслеживание вашего прогресса на пути самосовершенствования.</div>
               </div>

               <div class="about-us-first about-us-body">
                  <div class="about-us-text">5. Раздел "Слово дня"</div>
                  <div class="about-us-picture"><img class="about-us-png" src="pages\main-page\img\Everyday word.png"
                        alt="hints"></div>
                  <div class="about-us-Description">Пополняйте свой лексикон сложными словами и узнавайте новые
                     исторические даты.</div>
               </div>

               <div class="about-us-first about-us-body">
                  <div class="about-us-text">6. Раздел "Еженедельные задания"</div>
                  <div class="about-us-picture"><img class="about-us-png" src="pages\main-page\img\Everyday quests.png"
                        alt="hints"></div>
                  <div class="about-us-Description">Выполняй задания и получай бонусы и награды.</div>
               </div>
               <div class="about-us-confirm_button">Погнали!</div>
            </div>


            <div class="bonus_container">
               <p class="welcome-bonus-text">Добро пожаловать !</p>
               <p class="bonus-text-second">Подарок</p>
               <div class="bonus-rewards">
                  <div class="rewards-item">+10 <span class="iq-name">IQ</span></div>
                  <div class="rewards-item">+20 <img class="currency-icons" src="/img/Menu/icon-hints.png" alt="hints">
                  </div>
                  <div class="rewards-item">+10 <img class="currency-memoney-icon" src="/img/Menu/Memoney.png"
                        alt="memoney"></div>
               </div>
               <div class="bonus_container_continue">Принять</div>
            </div>

      </main>
      <footer class="footer">
         <div class="navigation">
            <ul>
               <li class="list list-analytic">
                  <a href="#analitycs">
                     <span class="icon"><img src="/img/icons/bar-chart-outline.svg" class="navig-icon"
                           alt="иконка аналитики" title="иконка аналитики"></span>
                     <span class="text">Аналитика</span>
                  </a>
               </li>
               <li class="list list-store">
                  <a href="#shop">
                     <span class="icon"><img src="/img/icons/storefront-outline.svg" class="navig-icon"
                           alt="иконка магазина" title="иконка магазина"></span>
                     <span class="text">Магазин</span>
                  </a>
               </li>
               <li class="list list-home active">
                  <a href="#home">
                     <span class="icon"><img src="/img/icons/home-outline.svg" class="navig-icon" alt="иконка дома"
                           title="иконка дома"></span>
                     <span class="text active">Главная</span>
                  </a>
               </li>
               <li class="list list-improve">
                  <a href="#improve">
                     <span class="icon"><img src="/img/icons/trending-up-outline.svg" class="navig-icon"
                           alt="иконка роста" title="иконка роста"></span>
                     <span class="text">Развитие</span>
                  </a>
               </li>
               <li class="list list-games">
                  <a href="#games">
                     <span class="icon"><img src="/img/icons/game-controller-outline.svg" class="navig-icon"
                           alt="иконка игр" title="иконка игр"></span>
                     <span class="text">Игры</span>
                  </a>
               </li>
               <div class="indicator"></div>
            </ul>
         </div>
      </footer>

      <div class="page-games-container">

         <div class="games-container">
            <div class="switch-btn-container">
               <div onclick="toggleGameVisibility()" class="switch-btn switch-btn__chill active">Отдых✨</div>
               <div onclick="toggleGameVisibility()" class="switch-btn switch-btn__growth">Развитие🌿</div>
            </div>
            <div class="games-chill-container">
               <a href="/pages/Games/Chill/2048/2048-Game.php">
                  <div class="game-item">
                     <h2 class="title">2048</h2>
                     <ul>
                        <li><span>Логика</span></li>
                        <li><span>Внимательность</span></li>
                     </ul>
                     <p class="mark-icon">🧩🔍🧠</p>
                     <img src="/img/Games/2048gameImage.svg" alt="картинка">
                     <div class="game-item__category">мини-игра</div>
                  </div>
               </a>
               <a href="/pages/Games/Chill/TilesLabirint/tilesMaze.php">
                  <div class="game-item">
                     <h2 class="title">Лабиринт</h2>
                     <ul>
                        <li><span>Память</span></li>
                        <li><span>Концентрация</span></li>
                     </ul>
                     <p class="mark-icon">🧠🧘</p>
                     <img src="/img/Games/mazeGameImage.svg" alt="картинка">
                     <div class="game-item__category spotlight">в разработке</div>
                  </div>
               </a>
               <a href="/pages/Games/Chill/runingGame/runingGame.php">
                  <div class="game-item">
                     <h2 class="title">Забег</h2>
                     <ul>
                        <li><span>Реакция</span></li>
                     </ul>
                     <p class="mark-icon">⚡🚀</p>
                     <img src="/img/Games/runnerImg.svg" alt="картинка">
                     <div class="game-item__category">мини-игра</div>
                  </div>
               </a>
               <a href="/pages/Games/Chill/DifferentColor/Diffcolor.php">
                  <div class="game-item">
                     <h2 class="title">Игра цветов</h2>
                     <ul>
                        <li><span>Внимательность</span></li>
                     </ul>
                     <p class="mark-icon">⚙️🔍</p>
                     <img src="/img/Games/DiffColorgm.svg" alt="картинка">
                     <div class="game-item__category">мини-игра</div>
                  </div>
               </a>
               <a href="/pages/Games/Chill/Connections/Connections.php">
                  <div class="game-item">
                     <h2 class="title">Соединения</h2>
                     <ul>
                        <li><span>Логика</span></li>
                        <li><span>Стратегическое мышление</span></li>
                     </ul>
                     <p class="mark-icon">🧩🧠</p>
                     <img src="/img/Games/Connections.svg" alt="картинка">
                     <div class="game-item__category spotlight">в разработке</div>
                     <div class="game-item__category_spotlight_second">есть баги!</div>
                  </div>
               </a>
               <a href="/pages/Games/Chill/Cupgame/Cupgame.php">
                  <div class="game-item">
                     <h2 class="title">Найти шарик</h2>
                     <ul>
                        <li><span>Внимательность</span></li>
                        <li><span>Память</span></li>
                     </ul>
                     <p class="mark-icon">🔍🧠</p>
                     <img src="/img/Games/Cupgame.svg" alt="картинка">
                     <div class="game-item__category spotlight">в разработке</div>
                  </div>
               </a>
               <a href="/pages/Games/Chill/TapCircle/Tapcircle.php">
                  <div class="game-item">
                     <h2 class="title">Тап ось</h2>
                     <ul>
                        <li><span>Реакция</span></li>
                     </ul>
                     <p class="mark-icon">⚡🚀</p>
                     <img src="/img/Games/TapCircle.svg" alt="картинка">
                     <div class="game-item__category spotlight">в разработке</div>
                  </div>
               </a>
            </div>


            <div class="games-growth-container hidden">
               <div class="game-item-block">
                  <h2 class="title">Память</h2>
                  <h2 class="icon"><span>5</span><img src="/img/Games/gamesCount.svg" alt="иконка игр"></h2>
               </div>
               <div class="game-item-block__content">
                  <a href="/pages/Games/Growth/Memory/saymonSays-game.php">
                     <div class="game-item">
                        <h2 class="title">Саймон говорит</h2>
                        <ul>
                           <li><span>Краткосрочная Память</span></li>
                        </ul>
                        <p class="mark-icon">🎯🧠</p>
                        <img src="/img/Games/GameSaymonSays.svg" alt="память картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
                  <a href="/pages/Games/Growth/Memory/Memory-game.php">
                     <div class="game-item">
                        <h2 class="title">Зеркальная память</h2>
                        <ul>
                           <li><span>Внимательность</span></li>
                           <li><span>Память</span></li>
                        </ul>
                        <p class="mark-icon">🃏🔍</p>
                        <img src="/img/Games/memoryGameImg.svg" alt="память картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
                  <a href="/pages/Games/Chill/math3/math3.php">
                     <div class="game-item">
                        <h2 class="title">Числовой штурм</h2>
                        <ul>
                           <li><span>Внимательность</span></li>
                           <li><span>Память</span></li>
                        </ul>
                        <p class="mark-icon">🔢🧠⏳</p>
                        <img src="/img/Games/gameNumbrsImage.svg" alt="числа картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
                  <a href="/pages/Games/Chill/TilesLabirint/tilesMaze.php">
                     <div class="game-item">
                        <h2 class="title">Лабиринт</h2>
                        <ul>
                           <li><span>Память</span></li>
                           <li><span>Концентрация</span></li>
                        </ul>
                        <p class="mark-icon">🧩🧠</p>
                        <img src="/img/Games/mazeGameImage.svg" alt="лабиринт картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
                  <a href="/pages/Games/Chill/Cupgame/Cupgame.php">
                     <div class="game-item">
                        <h2 class="title">Найти шарик</h2>
                        <ul>
                           <li><span>Внимательность</span></li>
                           <li><span>Память</span></li>
                        </ul>
                        <p class="mark-icon">🔍🧠</p>
                        <img src="/img/Games/Cupgame.svg" alt="картинка">
                        <div class="game-item__category spotlight">в разработке</div>
                     </div>
                  </a>
               </div>

               <div class="game-item-block">
                  <h2 class="title">Внимательность</h2>
                  <h2 class="icon"><span>3</span><img src="/img/Games/gamesCount.svg" alt="иконка игр"></h2>
               </div>
               <div class="game-item-block__content">
                  <a href="/pages/Games/Growth/Reaction/Game-colors.php">
                     <div class="game-item">
                        <h2 class="title">Верю - Не Верю</h2>
                        <ul>
                           <li><span>Реакция</span></li>
                           <li><span>Внимательность</span></li>
                        </ul>
                        <p class="mark-icon">🔴🟢⚡</p>
                        <img src="/img/Games/colorGameImage.svg" alt="верю - не верю картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
                  <a href="/pages/Games/Growth/Memory/Memory-game.php">
                     <div class="game-item">
                        <h2 class="title">Зеркальная память</h2>
                        <ul>
                           <li><span>Внимательность</span></li>
                           <li><span>Память</span></li>
                        </ul>
                        <p class="mark-icon">🃏🔍
                        </p>
                        <img src="/img/Games/memoryGameImg.svg" alt="память картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
                  <a href="/pages/Games/Chill/DifferentColor/Diffcolor.php">
                     <div class="game-item">
                        <h2 class="title">Игра цветов</h2>
                        <ul>
                           <li><span>Внимательность</span></li>
                        </ul>
                        <p class="mark-icon">⚙️🔍</p>
                        <img src="/img/Games/DiffColorgm.svg" alt="картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
               </div>

               <div class="game-item-block">
                  <h2 class="title">Реакция</h2>
                  <h2 class="icon"><span>2</span><img src="/img/Games/gamesCount.svg" alt="иконка игр"></h2>
               </div>
               <div class="game-item-block__content">
                  <a href="/pages/Games/Growth/Reaction/Game-colors.php">
                     <div class="game-item">
                        <h2 class="title">Верю - Не Верю</h2>
                        <ul>
                           <li><span>Реакция</span></li>
                           <li><span>Внимательность</span></li>
                        </ul>
                        <p class="mark-icon">🔴🟢⚡</p>
                        <img src="/img/Games/colorGameImage.svg" alt="верю - не верю картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
                  <a href="/pages/Games/Chill/TapCircle/Tapcircle.php">
                     <div class="game-item">
                        <h2 class="title">Тап ось</h2>
                        <ul>
                           <li><span>Реакция</span></li>
                        </ul>
                        <p class="mark-icon">⚡🚀</p>
                        <img src="/img/Games/TapCircle.svg" alt="картинка">
                        <div class="game-item__category spotlight">в разработке</div>
                     </div>
                  </a>
               </div>
               <div class="game-item-block">
                  <h2 class="title">Интеллект</h2>
                  <h2 class="icon"><span>2</span><img src="/img/Games/gamesCount.svg" alt="иконка игр"></h2>
               </div>
               <div class="game-item-block__content">
                  <a href="/pages/Games/Growth/IQ/GameCountries.php">
                     <div class="game-item">
                        <h2 class="title">Страны</h2>
                        <ul>
                           <li><span>Интеллект</span></li>
                        </ul>
                        <p class="mark-icon">🌍⚡</p>
                        <img src="/img/Games/countriesGameImage.svg" alt="верю - не верю картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
                  <a href="/pages/Games/Chill/2048/2048-Game.php">
                     <div class="game-item">
                        <h2 class="title">2048</h2>
                        <ul>
                           <li><span>Логика</span></li>
                           <li><span>Внимательность</span></li>
                        </ul>
                        <p class="mark-icon">🚀🧠</p>
                        <img src="/img/Games/2048gameImage.svg" alt="2048 картинка">
                        <div class="game-item__category">мини-игра</div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>

      <div class="page-improve-container">
         <div class="wrapper-improve">

            <main class="main-improve">
               <div id="improve-container">
                  <a href="/pages/ImproveFunctional/Articles/ArticleMain.php">
                     <div class="container-improve">
                        <div class="improve">Зона роста<img src="/img/icons/book-outline.svg"
                              class="improve-icon img-icon" alt="иконка книги" title="иконка книги">
                        </div>
                        <div class="forimprove">Свежие идеи, ценные знания и мощные инсайды для тех, кто хочет большего!
                           🚀🔥</div>
                     </div>
                  </a>
                  <a href="/pages/ImproveFunctional/Planning/Planning-page.php">
                     <div class="container-improve">
                        <div class="improve">Планирование<img src="/img/icons/calendar-outline.svg"
                              class="improve-icon img-icon" alt="иконка календаря" title="иконка календаря"></div>
                        <div class="forimprove">Ставь цели, достигай их!</div>
                     </div>
                  </a>
                  <div class="container-improve improve-in-dev">
                     <div class="improve">Финансы<img src="/img/icons/cash-outline.svg" class="improve-icon img-icon"
                           alt="иконка денег" title="иконка денег"></div>
                     <div class="forimprove">Планируй расходы и узнавай стратегии!</div>
                  </div>
                  <div class="container-improve improve-in-dev">
                     <div class="improve">Медитация<img src="/img/icons/pulse-outline.svg" class="improve-icon img-icon"
                           alt="иконка пульса" title="иконка пульса"></div>
                     <div class="forimprove">Расслабляйся , настраивайся на рабочий лад , отдыхай!</div>
                  </div>
                  <div class="container-improve improve-in-dev">
                     <div class="improve">Упражнения<img src="/img/icons/bicycle-outline.svg"
                           class="improve-icon img-icon" alt="иконка велосипеда" title="иконка велосипеда">
                     </div>
                     <div class="forimprove">Построй свой план тренировок, разминок!</div>
                  </div>
                  <div class="container-improve improve-in-dev">
                     <div class="improve">Развитие<img src="/img/icons/rocket-outline.svg" class="improve-icon img-icon"
                           alt="иконка ракеты" title="иконка ракеты"></div>
                     <div class="forimprove"> Уверенность, самодисциплина, общительность и др.</div>
                  </div>
                  <div class="container-improve improve-in-dev">
                     <div class="improve">Продуктивность<img src="/img/icons/time-outline.svg"
                           class="improve-icon img-icon" alt="иконка времени" title="иконка времени">
                     </div>
                     <div class="forimprove">Управление временем, планирования задач, список дел, напоминания!</div>
                  </div>
               </div>
               <div class="DownButton">
                  <div class="scroll"><img src="/img/icons/chevron-up-outline.svg" class="Up-button img-icon"
                        alt="иконка вниз" title="иконка вниз"></div>
               </div>
            </main>
         </div>
      </div>

      <div class="page-store-container">
         <span class="games-title Shop">Магазин</span>
         <div class="clocks">
            <div class="clock">
               <div class="hour">
                  <div class="hr" id="hr"></div>
               </div>
               <div class="min">
                  <div class="mn" id="mn"></div>
               </div>
               <div class="sec">
                  <div class="sc" id="sc"></div>
               </div>
            </div>
         </div>

         <!--<div class="time">Обновление через</div>
         <div class="time">23:59</div>-->
         <div class="currency">
            <div class="currency-memoney">
               <img class="memoneyicon" src="/img/Menu/Memoney.png" alt="">
               <div class="count count-memoney">
                  <?php if (isset($_SESSION['id'])): ?>
                     <?php echo $memany['sum_memany']; ?>
                  <?php else: ?>
                     0
                  <?php endif; ?>
               </div>
            </div>
            <div class="currency-hints">
               <img class="hintsicon" src="/img/Menu/icon-hints.png" alt="иконка подсказки">
               <div class="count count-hints">
                  <?php if (isset($_SESSION['id'])): ?>
                     <?php echo $EyeScore['sum_eye_hint']; ?>
                  <?php else: ?>
                     0
                  <?php endif; ?>
               </div>
            </div>
         </div>
         <div class="convert-currency-body">
            <div class="convert-currency-text">Конвертировать валюту</div>
            <div class="trade-price">
               <span>1</span><img class="memoneyicon" src="/img/Menu/Memoney.png" alt="">
               <div class="reverse"><img src="/img/icons/repeat-outline.svg" class="img-icon" alt="иконка повтора"
                     title="иконка повтора"></div>
               <span>8</span><img class="hintsicon" src="/img/Menu/icon-hints.png" alt="">
            </div>
            <div class="trade-currency">
               <input placeholder="1" type="number" class="input-trade" id="myInput" oninput="trackInput()">
               <span>=</span>
               <div class="input-trade" id="output"></div>
            </div>
            <button type="submit" name="convert-button" class="convert-button">Обменять</button>
         </div>
         <div class="buy-currency">
            <div class="buy-memoney">
               <div id="buy" class="buy first-offer">5<img class="memoneyicon" src="/img/Menu/Memoney.png" alt="">=
                  0.50$<div class="points_wrapper">
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                  </div>
               </div>
               <div id="buy" class="buy second-offer">15<img class="memoneyicon" src="/img/Menu/Memoney.png" alt="">=
                  0.99$<div class="points_wrapper">
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                  </div>
               </div>
               <div id="buy" class="buy third-offer">50<img class="memoneyicon" src="/img/Menu/Memoney.png" alt="">=
                  2.99$<div class="points_wrapper">
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                  </div>
               </div>
               <div id="buy" class="buy four-offer">120<img class="memoneyicon" src="/img/Menu/Memoney.png" alt="">=
                  5.99$<div class="points_wrapper">
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                  </div>
               </div>
               <div id="buy" class="buy five-offer">260<img class="memoneyicon" src="/img/Menu/Memoney.png" alt="">=
                  13.62$<div class="points_wrapper">
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                  </div>
               </div>
               <div id="buy" class="buy six-offer">666<img class="memoneyicon" src="/img/Menu/Memoney.png" alt="">=
                  22.22$<div class="points_wrapper">
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                     <i class="point"></i>
                  </div>
               </div>
            </div>
            <div class="special-offers">Специальные предложения</div>
            <div class="special-offers-body">
               <div class="pack">
                  <div class="pack-name">Начальный капитал</div>
                  <img src="/img/Shop/MoneyPack1.png" class="pack-img" alt="">
                  <div class="pack-price">?$</div>
               </div>

               <div class="pack">
                  <div class="pack-name">Пак новичка</div>
                  <img src="/img/Shop/MoneyPack2.png" class="pack-img" alt="">
                  <div class="pack-price">?$</div>
               </div>

               <div class="pack">
                  <div class="pack-name">Запасливый игрок</div>
                  <img src="/img/Shop/MoneyPack3.png" class="pack-img" alt="">
                  <div class="pack-price">?$</div>
               </div>

               <div class="pack">
                  <div class="pack-name">Хитрюга</div>
                  <img src="/img/Shop/Improvization.png" class="pack-img" alt="">
                  <div class="pack-price">?$</div>
               </div>
            </div>
         </div>
      </div>

      <div class="everyday-tasks-container">
         <div class="info-button tasks-info-button"><img src="/img/icons/information-outline.svg" class="img-icon"
               alt="иконка информации" title="иконка информации"></div>
         <div class="close-window every-day-tasks-close-button"><img src="/img/icons/close-outline.svg" class="img-icon"
               alt="иконка закрытия" title="иконка закрытия"></div>
         <Span class="everyday-tasks-title">Еженедельные задачи</Span>
         <div class="everyday-tasks-body">
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">Набрать 1600 очков в картинках</div>
               <div class="tasks-body__task-reward">26 IQ</div>
            </div>
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">Выйграть 3 игры</div>
               <div class="tasks-body__task-reward">29 IQ</div>
            </div>
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">Разгадать заданные числа</div>
               <div class="tasks-body__task-reward">23 IQ</div>
            </div>
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">Открыть 4 правильных карты подряд</div>
               <div class="tasks-body__task-reward">25 IQ</div>
            </div>
         </div>
      </div>
      <div class="info-button-body">
         <span>Еженедельные задания - задания которые вы можете выполнять в течении недели и получать бонусы и подарки.
            <br>В конце каждой недели они обновляются. На данный момент функция в разработке.</span>
         <div class="close-every-day-tasks-info every-day-tasks-close-button"><img src="/img/icons/close-outline.svg"
               class="img-icon" alt="иконка закрытия" title="иконка закрытия">
         </div>
      </div>

      <div class="day-word-container">
         <div class="info-button word-day-info-button"><img src="/img/icons/information-outline.svg" class="img-icon"
               alt="иконка информации" title="иконка информации"></div>
         <div class="close-window word-day-close-button"><img src="/img/icons/close-outline.svg" class="img-icon"
               alt="иконка закрытия" title="иконка закрытия"></div>
         <div class="everyday-title">Ежедневно</div>
         <div class="everyday_body">
            <div class="everyday_word">
               <div class="everyday_icon_body everyday-glowing"><img src="/img/icons/book-outline.svg" class="img-icon"
                     alt="иконка книги" title="иконка книги"></div>
               <div class="everyday_text_body everyday-glowing">Слово дня
                  <?php if ($rusWordsCount == $historyFactsCount && $historyFactsCount < $engWordsCount): ?>
                     <!--добавляю точку к каждому обновлённому элементу-->
                     <?php echo '<div class="red-update dot">обновлено</div>'; ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="day_history">
               <div class="everyday_icon_body"><img src="/img/icons/library-outline.svg" class="img-icon"
                     alt="иконка книг" title="иконка книг"></div>
               <div class="everyday_text_body">Историч. дата
                  <?php if ($historyFactsCount > $rusWordsCount && $historyFactsCount == $engWordsCount): ?>
                     <?php echo '<div class="red-update dot">обновлено</div>'; ?>
                  <?php endif; ?>
               </div>
            </div>
            <div class="new_word">
               <div class="everyday_icon_body"><img src="/img/icons/language-outline.svg" class="img-icon"
                     alt="иконка языка" title="иконка языка"></div>
               <div class="everyday_text_body">Англ. слово дня
                  <?php if ($rusWordsCount < $historyFactsCount && $historyFactsCount < $engWordsCount && $rusWordsCount !== 1): ?>
                     <?php echo '<div class="red-update dot">обновлено</div>'; ?>
                  <?php endif; ?>
               </div>
            </div>
         </div>

      </div>
	  <div class="everyday-info-button-body">
            <span>Каждый день здесь будет появляться новая интересная и полезная информация.
               <br>Она будет расширять ваш кругозор.
               <br>Не пропустите!</span>
            <div class="close-everyday-info-button-body"><img src="/img/icons/close-outline.svg" class="img-icon"
                  alt="иконка закрытия" title="иконка закрытия"></div>
         </div>
      <div class="everyday_day-word-container">
         <div class="word-info-button word-day-info-button"><img src="/img/icons/information-outline.svg" class="img-icon"
               alt="иконка информации" title="иконка информации"></div>
         <div class="close-window everyday_day-word-close-button"><img src="/img/icons/arrow-forward-outline.svg"
               class="img-icon" alt="иконка назад" title="иконка назад"></div>

         <div class="everyday-title">Слово дня</div>
         <div class="day-word__body">
            <div class="day-word">
               <?php echo $insertRusWord; ?>
            </div>
         </div>
      </div>
		<div class="word-info-button-body second-info-button-body">
			<span>Здесь располагаются интересные и не частые в употреблении слова и их первоисточник.</span>
			<div class="close-word-info-button-body close-second-info-body">
				<img src="/img/icons/close-outline.svg" class="img-icon"alt="иконка закрытия" title="иконка закрытия">
			</div>
		</div>
      <div class="everyday_date-container">
         <div class="date-info-button word-day-info-button"><img src="/img/icons/information-outline.svg" class="img-icon"
               alt="иконка информации" title="иконка информации"></div>
         <div class="close-window everyday_date-close-button"><img src="/img/icons/arrow-forward-outline.svg"
               class="img-icon" alt="иконка назад" title="иконка назад"></div>
         <div class="everyday-title">Историческая дата</div>
         <div class="day-word__body">
            <div class="day-date">
               <?php echo $insertHistoryFact; ?>
            </div>
         </div>
      </div>
	  <div class="date-info-button-body second-info-button-body">
			<span>Здесь располагаются исторические даты дня их значимость.</span>
			<div class="close-date-info-button-body close-second-info-body">
				<img src="/img/icons/close-outline.svg" class="img-icon"alt="иконка закрытия" title="иконка закрытия">
			</div>
		</div>
      <div class="everyday_new-word-container">
         <div class="eng-info-button word-day-info-button"><img src="/img/icons/information-outline.svg" class="img-icon"
               alt="иконка информации" title="иконка информации"></div>
         <div class="close-window everyday_new-word-close-button"><img src="/img/icons/arrow-forward-outline.svg"
               class="img-icon" alt="иконка назад" title="иконка назад"></div>
         <div class="everyday-title">Англ. слово дня</div>
         <div class="day-word__body">
            <div class="day-word">
               <?php echo $insertEngWord; ?>
            </div>
         </div>
      </div>
	  <div class="eng-info-button-body second-info-button-body">
			<span>Здесь располагаются английские слова дня, их применение в предложениях, перевод и транскрипция для правильного произношения.</span>
			<div class="close-eng-info-button-body close-second-info-body">
				<img src="/img/icons/close-outline.svg" class="img-icon"alt="иконка закрытия" title="иконка закрытия">
			</div>
		</div>
      <div class="analytic-container">
         <div class="games-title">Аналитика</div>
         <div class="analytics-in-development">"Мы ведём активную разработку над разделом <div class="neoncolor">
               "АНАЛИТИКА"</div> и в ближайшее время порадуем вас обновлением!"</div>
      </div>

      <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/include/checks/checkingUnread.php'; ?><!--Проверка нужен ли маркер непрачитанного-->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="/system/js/global.js"></script>
      <script src="/pages/main-page/js/main-page.js?v=1.0"></script>
</body>

</html>
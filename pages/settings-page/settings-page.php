<?php
include($_SERVER['DOCUMENT_ROOT'] . "/dataBase/controllers/settings/userQuestions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/pages/settings-page/css/settings-page.css?v=1.0">
   <link rel="stylesheet" href="/system/css/global.css?v=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link rel="stylesheet" href="/BrimFont/css/brim.css">
   <link rel="canonical" href="https://brainrim.site">
   <title>Настройки</title>

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

</head>

<body>
   <div class="wrapper">
      <div class="gray-background-container"></div>
      <header class="header">
         <a class="comeback-button" href="/index.php"><img class="comeback-icon" src="/img/icons/arrow-back-outline.svg"
               alt="иконка-назад" title="иконка-назад"></a>
         <div class="social-list">
            <a class="settings-top-icon" target="_blank" href="https://www.tiktok.com/@brainrim_app"><i
                  class="fa-brands fa-tiktok fa-2x" alt="TikTok"></i></a>
            <a class="settings-top-icon" target="_blank" href="https://vk.com/brainrim"><i class="fa-brands fa-vk fa-2x"
                  alt="Telegram"></i></a>
            <a class="settings-top-icon" target="_blank" href="https://t.me/brainrim"><i
                  class="fa-brands fa-telegram fa-2x" alt="Vk"></i></a>
         </div>
      </header>
      <main class="main">
         <div class="mode-theme-btn-container">
            <label id="theme-toggle-button">
               <input type="checkbox" id="toggle">
               <svg viewBox="0 0 69.667 44" xmlns:xlink="http://www.w3.org/1999/xlink"
                  xmlns="http://www.w3.org/2000/svg">
                  <g transform="translate(3.5 3.5)" data-name="Component 15 – 1" id="Component_15_1">


                     <g filter="url(#container)" transform="matrix(1, 0, 0, 1, -3.5, -3.5)">
                        <rect fill="#83cbd8" transform="translate(3.5 3.5)" rx="17.5" height="35" width="60.667"
                           data-name="container" id="container"></rect>
                     </g>

                     <g transform="translate(2.333 2.333)" id="button">

                        <g data-name="sun" id="sun">
                           <g filter="url(#sun-outer)" transform="matrix(1, 0, 0, 1, -5.83, -5.83)">
                              <circle fill="#f8e664" transform="translate(5.83 5.83)" r="15.167" cy="15.167" cx="15.167"
                                 data-name="sun-outer" id="sun-outer-2"></circle>
                           </g>
                           <g filter="url(#sun)" transform="matrix(1, 0, 0, 1, -5.83, -5.83)">
                              <path fill="rgba(246,254,247,0.29)" transform="translate(9.33 9.33)"
                                 d="M11.667,0A11.667,11.667,0,1,1,0,11.667,11.667,11.667,0,0,1,11.667,0Z"
                                 data-name="sun" id="sun-3"></path>
                           </g>
                           <circle fill="#fcf4b9" transform="translate(8.167 8.167)" r="7" cy="7" cx="7" id="sun-inner">
                           </circle>
                        </g>


                        <g data-name="moon" id="moon">
                           <g filter="url(#moon)" transform="matrix(1, 0, 0, 1, -31.5, -5.83)">
                              <circle fill="#cce6ee" transform="translate(31.5 5.83)" r="15.167" cy="15.167" cx="15.167"
                                 data-name="moon" id="moon-3"></circle>
                           </g>
                           <g fill="#a6cad0" transform="translate(-24.415 -1.009)" id="patches">
                              <circle transform="translate(43.009 4.496)" r="2" cy="2" cx="2"></circle>
                              <circle transform="translate(39.366 17.952)" r="2" cy="2" cx="2" data-name="patch">
                              </circle>
                              <circle transform="translate(33.016 8.044)" r="1" cy="1" cx="1" data-name="patch">
                              </circle>
                              <circle transform="translate(51.081 18.888)" r="1" cy="1" cx="1" data-name="patch">
                              </circle>
                              <circle transform="translate(33.016 22.503)" r="1" cy="1" cx="1" data-name="patch">
                              </circle>
                              <circle transform="translate(50.081 10.53)" r="1.5" cy="1.5" cx="1.5" data-name="patch">
                              </circle>
                           </g>
                        </g>
                     </g>


                     <g filter="url(#cloud)" transform="matrix(1, 0, 0, 1, -3.5, -3.5)">
                        <path fill="#fff" transform="translate(-3466.47 -160.94)"
                           d="M3512.81,173.815a4.463,4.463,0,0,1,2.243.62.95.95,0,0,1,.72-1.281,4.852,4.852,0,0,1,2.623.519c.034.02-.5-1.968.281-2.716a2.117,2.117,0,0,1,2.829-.274,1.821,1.821,0,0,1,.854,1.858c.063.037,2.594-.049,3.285,1.273s-.865,2.544-.807,2.626a12.192,12.192,0,0,1,2.278.892c.553.448,1.106,1.992-1.62,2.927a7.742,7.742,0,0,1-3.762-.3c-1.28-.49-1.181-2.65-1.137-2.624s-1.417,2.2-2.623,2.2a4.172,4.172,0,0,1-2.394-1.206,3.825,3.825,0,0,1-2.771.774c-3.429-.46-2.333-3.267-2.2-3.55A3.721,3.721,0,0,1,3512.81,173.815Z"
                           data-name="cloud" id="cloud"></path>
                     </g>


                     <g fill="#def8ff" transform="translate(3.585 1.325)" id="stars">
                        <path transform="matrix(-1, 0.017, -0.017, -1, 24.231, 3.055)"
                           d="M.774,0,.566.559,0,.539.458.933.25,1.492l.485-.361.458.394L1.024.953,1.509.592.943.572Z">
                        </path>
                        <path transform="matrix(-0.777, 0.629, -0.629, -0.777, 23.185, 12.358)"
                           d="M1.341.529.836.472.736,0,.505.46,0,.4.4.729l-.231.46L.605.932l.4.326L.9.786Z"
                           data-name="star"></path>
                        <path transform="matrix(0.438, 0.899, -0.899, 0.438, 23.177, 29.735)"
                           d="M.015,1.065.475.9l.285.365L.766.772l.46-.164L.745.494.751,0,.481.407,0,.293.285.658Z"
                           data-name="star"></path>
                        <path transform="translate(12.677 0.388) rotate(104)"
                           d="M1.161,1.6,1.059,1,1.574.722.962.607.86,0,.613.572,0,.457.446.881.2,1.454l.516-.274Z"
                           data-name="star"></path>
                        <path transform="matrix(-0.07, 0.998, -0.998, -0.07, 11.066, 15.457)"
                           d="M.873,1.648l.114-.62L1.579.945,1.03.62,1.144,0,.706.464.157.139.438.7,0,1.167l.592-.083Z"
                           data-name="star"></path>
                        <path transform="translate(8.326 28.061) rotate(11)"
                           d="M.593,0,.638.724,0,.982l.7.211.045.724.36-.64.7.211L1.342.935,1.7.294,1.063.552Z"
                           data-name="star"></path>
                        <path transform="translate(5.012 5.962) rotate(172)"
                           d="M.816,0,.5.455,0,.311.323.767l-.312.455.516-.215.323.456L.827.911,1.343.7.839.552Z"
                           data-name="star"></path>
                        <path transform="translate(2.218 14.616) rotate(169)"
                           d="M1.261,0,.774.571.114.3.487.967,0,1.538.728,1.32l.372.662.047-.749.728-.218L1.215.749Z"
                           data-name="star"></path>
                     </g>
                  </g>
               </svg>
            </label>
         </div>
         <div class="settings-main-item">

            <div class="item-body">
               <div class="mark"><img src="/img/icons/log-in-outline.svg" class="mark-icon" alt="иконка-вход"
                     title="иконка-вход"></div>
               <div class="main-item connect">
                  <a class="sign-in" href="/pages/page-registration/registration-page.php">Войти</a>
                  <a href="/pages/page-registration/registration-page.php"></a>
               </div>
            </div>

            <div class="item-body">
               <div class="mark"><img src="/img/icons/chatbubble-ellipses-outline.svg" class="mark-icon"
                     alt="иконка-вход" title="иконка-вход"></div>
               <div class="main-item support">Поддержка</div>
            </div>
            <div class="support-body">
               <form action="settings-page.php" method="post">
                  <textarea name="questoinValue" placeholder="Опишите свою проблему" class="input-trouble"></textarea>
                  <button type="submit" name="button-send-questions" class="submit-button">Отправить</button>
               </form>
               <div class="close-support"><img src="/img/icons/close-outline.svg" class="mark-icon" alt="иконка-закрыть"
                     title="иконка-закрыть"></div>
            </div>

            <div class="item-body">
               <div class="mark"><img src="/img/icons/help-circle-outline.svg" class="mark-icon" alt="иконка-вопрос"
                     title="иконка-вопрос"></div>
               <div class="main-item developers-button">Разработчики</div>
               <div class="developers-container_body">
                  <div class="developer">Порфирий Романовский<br>
                     <span><a href="https://t.me/PorfiriyRoma" class="dev-social">(tg: @PorfiriyRoma)</a></span>
                  </div>
                  <div class="developer">Aleksey Butor<br>
                     <span><a href="https://t.me/moonmistx" class="dev-social">(tg: @MooNMisTX)</a></span>
                  </div>
                  <div class="close"><img src="/img/icons/close-outline.svg" class="mark-icon" alt="иконка-закрыть"
                        title="иконка-закрыть"></div>
               </div>
            </div>

            <div class="item-body">
               <div class="mark"><img src="/img/icons/language-outline.svg" class="mark-icon" alt="иконка-язык"
                     title="иконка-язык"></div>
               <div class="main-item language-button">Язык</div>
               <div class="language-container">
                  <div class="EN language in-dev">Английский</div>
                  <div class="RU language active">Русский</div>
                  <div class="EN language in-dev">中文</div>
                  <div class="EN language in-dev">español</div>
                  <div class="EN language in-dev">français</div>
                  <div class="close-language mark"><img src="/img/icons/close-outline.svg" class="mark-icon"
                        alt="иконка-закрыть" title="иконка-закрыть"></div>
               </div>
            </div>

            <div class="item-body">
               <div class="mark"><img src="/img/icons/newspaper-outline.svg" class="mark-icon" alt="иконка-язык"
                     title="иконка-язык"></div>
               <div class="main-item news">Новости</div>
            </div>
            <div class="news-body">
               <div class="news-all">
                  <h1 class="news-title">Масштабное обновление</h1>
                  <span class="date">28.03.2023</span>
                  <ul class="news-text">
                     <li>Открыт бета-тест</li>
                     <li>Добавлена поддержка</li>
                     <li>Добавлены новости</li>
                     <li>Изменён профиль</li>
                     <li>Обновлены все страницы</li>
                     <li>Сделан конвертер валют</li>
                     <li>Изменён конвертер валют</li>
                     <li>Обновлены игры</li>
                     <li>И ещё очень много чего!</li>
                  </ul>

                  <h1 class="news-title">С Новым годом, друзья!</h1>
                  <span class="date">01.01.2024</span>
                  <ul class="news-text">
                     <li>Желаем вам ярких идей и новых возможностей!</li>
                     <li>Пусть все ваши мечты сбудутся в этом году!</li>
                     <li>Мы благодарны вам за то, что были с нами.</li>
                     <li>В новом году мы приготовили для вас много сюрпризов!</li>
                     <li>Будем рады видеть вас снова и снова.</li>
                     <li>Счастья, здоровья и успехов в 2024 году!</li>
                     <li>Вместе мы сделаем этот год незабываемым!</li>
                  </ul>

                  <h1 class="news-title">Небольшое обновление</h1>
                  <span class="date">05.01.2024</span>
                  <ul class="news-text">
                     <li>🔧 Мы улучшили производительность некоторых функций для вашего комфорта.</li>
                     <li>📋 Добавлены небольшие визуальные улучшения в интерфейсе.</li>
                     <li>🛠️ Исправлены несколько мелких багов, чтобы всё работало ещё стабильнее.</li>
                  </ul>

                  <h1 class="news-title" style="text-shadow: 2px 2px 5px #FFD700;">С новым, 2025 годом! 🎉</h1>
                  <span class="date">01.01.2025</span>
                  <ul class="news-text">
                     <li>🌟Пусть новый год принесёт радость, удачу и вдохновение!</li>
                     <li>✨Мы рады, что вы с нами. Ваша поддержка делает нас сильнее!</li>
                     <li>🎁В 2025 году мы подготовили много новых сюрпризов и обновлений для вас!</li>
                     <li>💫Пусть каждый ваш день будет наполнен счастьем и успехами.</li>
                     <li>🔥Мы продолжаем работать для вас и ваших достижений.</li>
                     <li>🌈С Новым годом! Пусть все ваши мечты станут реальностью!</li>
                  </ul>

                  <h1 class="news-title">Долгожданное обновление!</h1>
                  <span class="date">10.03.2025</span>
                  <ul class="news-text">
                     <li>📚 Мы добавили зону роста со статьями, наполненными полезной информацией!</li>
                     <li>🎮 Встречайте множество новых и захватывающих игр, которые подарят вам массу удовольствия!</li>
                     <li>🎨 Провели редизайн многих элементов, чтобы сделать ваш опыт ещё более комфортным и
                        современным!</li>
                     <li>🏆 Встречайте новый профиль, в котором появились достижения</li>
                     <li>🌳 Работаем над деревом навыков</li>
                     <li>🚀 Наши улучшения не останавливаются — мы продолжаем двигаться вперёд при вашей поддержке!</li>
                  </ul>

               </div>
               <div class="close-news mark"><img src="/img/icons/close-outline.svg" class="mark-icon"
                     alt="иконка-закрыть" title="иконка-закрыть"></div>
            </div>

            <div class="item-body">
               <div class="mark"><img src="/img/icons/information-circle-outline.svg" class="mark-icon"
                     alt="иконка-информация" title="иконка-информация"></div>
               <div class="main-item about">О нас</div>
            </div>
            <div class="about-us-container">
               <span class="text-about-us">Привет! Мы (два разработчика)
                  <br>Решили создать это приложение в недалёком 2021 году.
                  <br>Мы не программисты,просто интузиасты (инди разработчики).
                  <br>Мы будем поддерживать этот проект настолько долго, насколько долго будет жить наше комьюнити, не
                  сомневайтесь в нас.
                  <br><br><span class="lasttxt">Будьте здоровы!</span></span>
               <div class="close-about-us"><img src="/img/icons/close-outline.svg" class="mark-icon"
                     alt="иконка-закрыть" title="иконка-закрыть"></div>
            </div>
            <div class="item-body">
               <div class="mark"><img src="/img/icons/at-outline.svg" class="mark-icon" alt="иконка-почта"
                     title="иконка-почта"></div>
               <a href="mailto:brainriminfo@gmail.com" class="main-item about">Написать разработчикам</a>
            </div>
         </div>

      </main>
      <footer class="footer">
         <span class="version">| Beta version 1.4</span>
         <a href="/Privacy-Policy.php" class="privacy">
            <div class="default mark"><img src="/img/icons/shield-outline.svg" class="mark-icon" alt="иконка-щит"
                  title="иконка-щит"></div>
            <div class="hover mark"><img src="/img/icons/shield-half-outline.svg" class="mark-icon" alt="иконка-щит"
                  title="иконка-щит"></div>
         </a>
      </footer>
      <script src="/system/js/global.js"></script>
      <script src="/pages/settings-page/settings-page.js?v=1.0"></script>
</body>

</html>
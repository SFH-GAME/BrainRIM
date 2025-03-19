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
   <title>Настройки</title>
</head>

<body>
   <div class="wrapper">
      <div class="gray-background-container"></div>
      <header class="header">
         <a class="comeback-button" href="/index.php">
            <ion-icon name="arrow-back-outline"></ion-icon></a>
         <div class="social-list">
            <a class="settings-top-icon" target="_blank" href="https://www.tiktok.com/@brainrim_app"><ion-icon
                  name="logo-tiktok"></ion-icon></a>
            <a href="https://vk.com/brainrim" target="_blank" class="settings-top-icon"><img
                  src="/img/free-icon-vk-3670055.png" alt=""></a>
            <a href="https://t.me/brainrim" target="_blank" class="settings-top-icon"><img src="/img/telegram.png"
                  alt=""></a>
         </div>
      </header>
      <main class="main">
         <div class="settings-main-item">

            <div class="item-body">
               <div class="mark"><ion-icon name="log-in-outline"></ion-icon></div>
               <div class="main-item connect">
                  <a class="sign-in" href="/pages/page-registration/registration-page.php">Войти</a>
                  <a href="/pages/page-registration/registration-page.php"><img src="/img/Settings/PlayGamesGamepad.svg"
                        alt="Gamepad" class="gamepad"></a>
               </div>
            </div>

            <div class="item-body">
               <div class="mark"><ion-icon name="chatbubble-ellipses-outline"></ion-icon></div>
               <div class="main-item support">Поддержка</div>
            </div>
            <div class="support-body">
               <form action="settings-page.php" method="post">
                  <textarea name="questoinValue" placeholder="Опишите свою проблему" class="input-trouble"></textarea>
                  <button type="submit" name="button-send-questions" class="submit-button">Отправить</button>
               </form>
               <div class="close-support"><ion-icon name="close-outline"></ion-icon></div>
            </div>

            <div class="item-body">
               <div class="mark"><ion-icon name="help-circle-outline"></ion-icon></div>
               <div class="main-item developers-button">Разработчики</div>
               <div class="developers-container_body">
                  <div class="developer">Порфирий Романовский<br>
                     <span>(tg: @PorfiriyRoma)</span>
                  </div>
                  <div class="developer">Aleksey Butor</div>
                  <div class="close"><ion-icon name="close-outline"></ion-icon></div>
               </div>
            </div>

            <div class="item-body">
               <div class="mark"><ion-icon name="language-outline"></ion-icon></div>
               <div class="main-item language-button">Язык</div>
               <div class="language-container">
                  <div class="EN language in-dev">Английский</div>
                  <div class="RU language">Русский</div>
                  <div class="EN language in-dev">中文</div>
                  <div class="EN language in-dev">español</div>
                  <div class="EN language in-dev">français</div>
                  <div class="close-language"><ion-icon name="close-outline"></ion-icon></div>
               </div>
            </div>

            <div class="item-body">
               <div class="mark"><ion-icon name="newspaper-outline"></ion-icon></div>
               <div class="main-item news">Новости</div>
            </div>
            <div class="news-body">
               <h1 class="news-title">Масштабное обновление</h1>
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
               <span class="date">28.03.2023</span>
               <div class="close-news"><ion-icon name="close-outline"></ion-icon></div>
            </div>

            <div class="item-body">
               <div class="mark"><ion-icon name="information-circle-outline"></ion-icon></div>
               <div class="main-item about">О нас</div>
            </div>
            <div class="about-us-container">
               <span class="text-about-us">Привет! Мы (два разработчика)
                  <br>Решили создать это приложение в недалёком 2021 году.
                  <br>Мы не программисты,просто интузиасты (инди разработчики).
                  <br>Мы будем поддерживать этот проект настолько долго, насколько долго будет жить наше комьюнити, не
                  сомневайтесь в нас.
                  <br><br><span class="lasttxt">Будьте здоровы!</span></span>
               <div class="close-about-us"><ion-icon name="close-outline"></ion-icon></div>
            </div>
            <div class="item-body">
               <div class="mark"><ion-icon name="at-outline"></ion-icon></div>
               <a href="mailto:porf2002@mail.ru" class="main-item about">Написать разработчику</a>
            </div>
         </div>

      </main>
      <footer class="footer">
         <span class="version">| Beta version 1.4</span>
         <a href="/Privacy-Policy.php" class="privacy"><ion-icon name="shield-outline"></ion-icon></a>
      </footer>
   </div>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   <script src="/pages/settings-page/settings-page.js?v=1.0"></script>
</body>

</html>
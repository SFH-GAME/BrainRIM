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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <title>Настройки</title>
</head>

<body>
   <div class="wrapper">
      <div class="gray-background-container"></div>
      <header class="header">
         <a class="comeback-button" href="/index.php">
            <ion-icon name="arrow-back-outline"></ion-icon></a>
         <div class="social-list">
			<a class="settings-top-icon" target="_blank" href="https://www.tiktok.com/@brainrim_app"><i class="fa-brands fa-tiktok fa-2x" alt="TikTok"></i></a>
			<a class="settings-top-icon" target="_blank" href="https://vk.com/brainrim"><i class="fa-brands fa-vk fa-2x" alt="Telegram"></i></a>
			<a class="settings-top-icon" target="_blank" href="https://t.me/brainrim"><i class="fa-brands fa-telegram fa-2x" alt="Vk"></i></a>
         </div>
      </header>
      <main class="main">
         <div class="settings-main-item">

            <div class="item-body">
               <div class="mark"><ion-icon name="log-in-outline"></ion-icon></div>
               <div class="main-item connect">
                  <a class="sign-in" href="/pages/page-registration/registration-page.php">Войти</a>
                  <a href="/pages/page-registration/registration-page.php"></a>
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
                     <span><a href="https://t.me/PorfiriyRoma" class="dev-social">(tg: @PorfiriyRoma)</a></span>
                  </div>
                  <div class="developer">Aleksey Butor<br>
				     <span class="dev-social">(tg: None)</span>
					 </div>
                  <div class="close"><ion-icon name="close-outline"></ion-icon></div>
               </div>
            </div>

            <div class="item-body">
               <div class="mark"><ion-icon name="language-outline"></ion-icon></div>
               <div class="main-item language-button">Язык</div>
               <div class="language-container">
                  <div class="EN language in-dev">Английский</div>
                  <div class="RU language active">Русский</div>
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
					<span class="date">01.01.2024</span>
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
						<li>🎨 Провели редизайн многих элементов, чтобы сделать ваш опыт ещё более комфортным и современным!</li>
						<li>🏆 Встречайте новый профиль, в котором появились достижения</li>
						<li>🌳 Работаем над деревом навыков</li>
						<li>🚀 Наши улучшения не останавливаются — мы продолжаем двигаться вперёд при вашей поддержке!</li>
					</ul>

				</div>
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
               <a href="mailto:brainriminfo@gmail.com" class="main-item about">Написать разработчикам</a>
            </div>
         </div>

</main>
<footer class="footer">
        <span class="version">| Beta version 1.4</span>
        <a href="/Privacy-Policy.php" class="privacy">
			<ion-icon class="default" name="shield-outline"></ion-icon>
			<ion-icon class="hover" name="shield-half-outline"></ion-icon>
		</a>
</footer>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   <script src="/pages/settings-page/settings-page.js?v=1.0"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/pages/Games/Growth/Memory/css/saymonSays-game.css">
   <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/system/css/global.css?v=2.0">
   <link rel="canonical" href="https://brainrim.site">
   <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
   <title>Игра - "Саймон говорит"</title>

</head>

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

<body>
   <?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-pop-up.php"); ?>
   <div class="button-start-container">
      <div class="start-menu">
         <div class="start-menu__game-mode-container">
            <div class="start-menu__game-mode"></div>
         </div>
         <button class="button-start">START</button>
         <div class="game-info-title">
            <span class="game-info-name">Саймон говорит</span>
            <span class="game-info">Твоя задача — запомнить последовательность мигающих цветов и повторить её. С каждым
               раундом становится сложнее</span>
         </div>
      </div>
   </div>

   <?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-top-button.php"); ?>

   <div id="status">Запомни</div>
   <h2>Ход: <span id="round">0</span></h2>
   <div class="game-container">
      <button class="btn green" data-color="green"></button>
      <button class="btn red" data-color="red"></button>
      <button class="btn blue" data-color="blue"></button>
      <button class="btn yellow" data-color="yellow"></button>
   </div>
   <script src="/pages/Games/Growth/Memory/js/saymonSays-game.js"></script>
   <script src="/system/js/global.js"></script>
</body>

</html>
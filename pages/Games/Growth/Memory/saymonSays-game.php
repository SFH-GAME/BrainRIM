<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/pages/Games/Growth/Memory/css/saymonSays-game.css">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="canonical" href="https://brainrim.site">
	<link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link rel="stylesheet" href="/system/css/global.css?v=4.0">
	<title>Игра - "Саймон говорит"</title>

	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-leaderboard.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-start-page.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-pop-up.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-top-button.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/results-pop-up.php"); ?>
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
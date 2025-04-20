<?php
$game_name = "Найдите шарик";
$game_description = "Запомните расположение шарика и найдите его!";
$leaderboard_name = "Найдите шарик";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/pages/Games/Chill/Cupgame/css/Cupgame.css">
    <link rel="canonical" href="https://brainrim.site">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/system/css/global.css?v=1.0">
	<title>Cup Game</title>

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
<div class="score-container">Угадал: <span id="score">0 раз</span></div>

<div class="game-container">
    <div class="ball"></div>
    <div class="cup" style="left: 0px;" data-index="0"></div>
    <div class="cup" style="left: 120px;" data-index="1"></div>
    <div class="cup" style="left: 240px;" data-index="2"></div>
</div>
<button id="restart" style="display: none;">Далее</button>

	<script src ="/pages/Games/Chill/Cupgame/js/Cupgame.js"></script>
	<script src="/system/js/global.js"></script>
</body>
</html>



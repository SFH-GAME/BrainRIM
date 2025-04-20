<?php
$game_name = "Соединения";
$game_description = "Проводите линии между точками, чтобы победить!";
$leaderboard_name = "Соединения";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/pages/Games/Chill/Connections/css/Connections.css">
    <link rel="canonical" href="https://brainrim.site">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/system/css/global.css?v=1.0">
	<title>Color Connections Game</title>

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
	<h1>Соедини одинаковые цвета</h1>
	<canvas id="gameCanvas"></canvas>

	<script src ="/pages/Games/Chill/Connections/js/Connections.js"></script>
	<script src="/system/js/global.js"></script>
</body>
</html>



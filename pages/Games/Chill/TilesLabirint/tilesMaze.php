<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/games/logicMazeGame.php";

$game_name = "Лабиринт";
$game_description = "Запомните подсвеченные кубики и найдите их";
$leaderboard_name = "Лабиринт";
$game_boosts = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<script>//записывает в переменные данные из базы
		<?php if (isset($_SESSION['id'])): ?>
			let bestTimeRes = Number('<?= $bestUserResultTime ?>');
			let bestLevelRes = Number('<?= $bestUserLevel ?>');
		<?php else: ?>//что бы не было ошибки когда не авторизован пользователь
			bestTimeRes = 0;
			bestLevelRes = 0;
		<?php endif; ?>
	</script>
	<script src="/system/js/global.js"></script><!--он здесь чтобы отрабатывали все функции-->
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/pages/Games/Chill/TilesLabirint/css/tilesMaze.css">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="canonical" href="https://brainrim.site">
	<link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/system/css/global.css?v=10.0">
	<title>Игра Лабиринт</title>
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
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-leaderboard.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-start-page.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-pop-up.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-top-button.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/results-pop-up.php"); ?>
	<div id="level">Уровень: 1</div>
	<div id="level-timer">Осталось: 40 сек.</div>
	<div id="message">Уровень пройден!</div>
	<div id="game-board"></div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="/pages/Games/Chill/TilesLabirint/js/tilesMaze.js?v=10.0"></script>
	<script src="/include/results.js"></script>
</body>

</html>
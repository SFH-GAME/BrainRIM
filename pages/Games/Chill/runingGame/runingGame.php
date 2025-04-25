<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/games/logicRuningGame.php";

$game_name = "Забег";
$game_description = "Уклоняйтесь от врагов и продержитесь как можно дольше";
$leaderboard_name = "Забег";
$game_boosts = '
	<div class="container-boost"><div class="heart-info"></div> - доп. жизнь при столкновении</div>
	<div class="container-boost">
		<div class="boost-info">
			<div class="triangle-info"></div>
			<div class="triangle-info"></div>
			<div class="triangle-info"></div>
		</div> - замедление врагов (5 секунд)
	</div>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script>//записывает в переменные данные из базы
    <?php if (isset($_SESSION['id'])): ?>
		let bestTimeRes = Number('<?= $bestUserResultTime ?>');
		let bestEnemiesPassedRes = Number('<?= $bestUserResultEnemiesPassed ?>');
    <?php else: ?>//что бы не было ошибки когда не авторизован пользователь
	bestTimeRes = 0;
	bestEnemiesPassedRes = 0;
		<?php endif; ?>
		</script>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Игра - бега</title>
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/pages/Games/Chill/runingGame/css/runingGame.css?v=2.0" />
	<link rel="canonical" href="https://brainrim.site">
	<link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link rel="stylesheet" href="/system/css/global.css?v=1.0">

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
	<div class="game-container">
		<div id="player"></div>
		<div id="score">Время: 
			<span id="timer">0</span>с 
		<div class="score-enemy-passed">Врагов пройдено: 
			<span id="score-num">0</span>
		</div>
		</div>
		<div class="boosts-ui">
		<div id="lives-counter">❤️<span id="lives-count">1</span></div>
	</div>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="/pages/Games/Chill/runingGame/js/runingGame.js?v=2.0"></script>
  <script src="/system/js/global.js"></script>
</body>

</html>
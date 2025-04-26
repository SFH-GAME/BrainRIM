<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/games/logic2048Game.php";

$game_name = "2048";
$game_description = "Соединяйте кубики, чтобы дойти до заветного числа - 2048!";
$leaderboard_name = "2048";
$game_boosts = "";
?>

<?php

try {

	// SQL-запрос для получения лучших результатов
	$query = "
      SELECT 
			r.user_id, 
			u.login AS user_name, 
			MAX(r.score) AS best_score 
		FROM 
			game_2048_results r 
		JOIN 
			users u 
		ON 
			r.user_id = u.id 
		GROUP BY 
			r.user_id, u.login 
		ORDER BY 
			best_score DESC
		LIMIT 10;
		
    ";

	// Выполнение запроса
	$stmt = $pdo->prepare($query);
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<script>//записывает в переменные данные из базы
		<?php if (isset($_SESSION['id'])): ?>
			let bestTimeRes = Number('<?= $bestUserResultTime ?>');
			let bestScoreRes = Number('<?= $bestUserScore ?>');
		<?php else: ?>//что бы не было ошибки когда не авторизован пользователь
			bestTimeRes = 0;
			bestScoreRes = 0;
		<?php endif; ?>
	</script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/pages/Games/Chill/2048/css/2048-Game.css?v=1.0">
	<link rel="canonical" href="https://brainrim.site">
	<link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link rel="stylesheet" href="/system/css/global.css?v=1.0">
	<title>2048</title>
	
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
	<div class="wrapper">
		<div class="score_container">
			<div class="best-score">Лучший результат: <span class="value-best">00</span></div>
			<p>Счёт: <span id="score01"> 0</span></p>
		</div>
		<div class="main">
			<div class="cell" id="c00"></div>
			<div class="cell" id="c01"></div>
			<div class="cell" id="c02"></div>
			<div class="cell" id="c03"></div>

			<div class="cell" id="c10"></div>
			<div class="cell" id="c11"></div>
			<div class="cell" id="c12"></div>
			<div class="cell" id="c13"></div>

			<div class="cell" id="c20"></div>
			<div class="cell" id="c21"></div>
			<div class="cell" id="c22"></div>
			<div class="cell" id="c23"></div>

			<div class="cell" id="c30"></div>
			<div class="cell" id="c31"></div>
			<div class="cell" id="c32"></div>
			<div class="cell" id="c33"></div>
		</div>


	</div>
	<!-- <div class="results-gameover results-container">
		<h1 class="results-head-text">Результаты</h1>
		<div class="results">
			<div class="time">Время:<div class="time-count"></div>c.</div>
			<div class="moves">Счёт:<div class="moves-count"></div>
			</div>
			<div class="best-results">Ваш лучший результат:</div>
			<div class="time">Время: <div class="best-time-count">0</div>с.</div>
			<div class="moves">Счёт: <div class="best-moves-count">0</div>
			</div>
			<div class="loose-win-value">Вы проиграли</div>
		</div>
		<div class="results-menu__buttons-container">
			<div onclick="window.location.reload();" class="results-menu__button results-menu__button-restart"><img
					src="/img/icons/refresh-outline.svg" class="img-icon" alt="иконка-обновить" title="иконка-обновить">
			</div>
			<a href="/index.php" class=" results-menu__button result-menu__button-home"><img
					src="/img/icons/home-outline.svg" class="img-icon" alt="иконка-дома" title="иконка-дома"></a>
		</div>
	</div> -->
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="/system/js/global.js"></script>
	<script src="/pages/Games/Chill/2048/js/2048-Game.js"></script>
	<script src="/include/results.js"></script>
</body>

</html>
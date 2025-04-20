<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/games/logicTapcircleGame.php";

$game_name = "Тап ось";
$game_description = "Кружок движется по оси — нажми, когда он окажется в фиолетовом диапазоне. Тренируй свою скорость и меткость!";
$leaderboard_name = "Тап ось";
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
			game_tapcircle_results r 
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/pages/Games/Chill/TapCircle/css/Tapcircle.css">
	<link rel="canonical" href="https://brainrim.site">
	<link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/system/css/global.css?v=2.0">
	<title>Tap Circle</title>
</head>

	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-leaderboard.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-start-page.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-pop-up.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-top-button.php"); ?>
	<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/results-pop-up.php"); ?>

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
	<canvas id="gameCanvas"></canvas>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="/pages/Games/Chill/TapCircle/js/Tapcircle.js"></script>
	<script src="/system/js/global.js"></script>
</body>

</html>
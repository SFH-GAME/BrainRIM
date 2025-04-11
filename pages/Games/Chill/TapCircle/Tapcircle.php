<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/games/logicTapcircleGame.php";
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
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/pages/Games/Chill/TapCircle/css/Tapcircle.css">
    <link rel="canonical" href="https://brainrim.site">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/system/css/global.css?v=2.0">
	<title>Tap Circle</title>
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
<div class="leaderboard-container">
		<div class="leaderboard__back-button"><img class="img-icon" src="/img/icons/arrow-back-outline.svg" alt="иконка-назад" title="иконка-назад"></div>
		<h2>Лидеры</h2>
		<div class="leaderboard-list-container">
			<h3>Тап ось</h3>
			<span>(Топ 10)</span>
			<div class="leaderboard-items-container">
				<?php foreach ($results as $index => $row): ?>
					<div class="leaderboard-item">
						<div class="leaderboard-item__id"><?php echo $index + 1; ?></div>
						<div class="leaderboard-item__name"><?php echo htmlspecialchars($row['user_name']); ?></div>
						<div class="leaderboard-item__score"><?php echo htmlspecialchars($row['best_score']); ?></div>
						<div class="leaderboard-item__img"><img class="img-icon comeback-icon"
								src="/img/icons/ribbon-outline.svg" alt="иконка-заслуги" title="иконка-заслуги"></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<div class="button-start-container">
		<div class="start-menu">
			<div class="leaderboard-button"><img src="/img/ranking_pe6ng5yn5vbm.svg" alt="Список лидеров"></div>
			<!-- добавлять опционально, только если нужен список лидеров-->
			<div class="button-start">START</div>
			<div class="game-info-title">
				<span class="game-info-name">Тап ось</span>
				<span class="game-info">В этой игре вам надо словить шарик в зелёной зоне</span>
			</div>
		</div>
	</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/include/games-pop-up.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/games-top-button.php"); ?>

<canvas id="gameCanvas"></canvas>

<div class="results-gameover results-container">
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
        <div onclick="window.location.reload();" class="results-menu__button results-menu__button-restart"><img src="/img/icons/refresh-outline.svg" class="img-icon" alt="иконка-обновить" title="иконка-обновить">
        </div>
        <a href="/index.php" class=" results-menu__button result-menu__button-home"><img src="/img/icons/home-outline.svg" class="img-icon" alt="иконка-дома" title="иконка-дома"></a>
      </div>
    </div>
</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src ="/pages/Games/Chill/TapCircle/js/Tapcircle.js"></script>
	<script src="/system/js/global.js"></script>
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/pages/Games/Chill/TapCircle/css/Tapcircle.css">
    <link rel="canonical" href="https://brainrim.site">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<title>Tap Circle</title>
</head>

<body>
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
        <div onclick="window.location.reload();" class="results-menu__button results-menu__button-restart"><img src="/img/Icons/refresh-outline.svg" class="img-icon" alt="иконка-обновить" title="иконка-обновить">
        </div>
        <a href="/index.php" class=" results-menu__button result-menu__button-home"><img src="/img/Icons/home-outline.svg" class="img-icon" alt="иконка-дома" title="иконка-дома"></a>
      </div>
    </div>
  </div>

	<script src ="/pages/Games/Chill/TapCircle/js/Tapcircle.js"></script>
</body>
</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/pages/Games/Chill/DifferentColor/css/Diffcolor.css">
    <link rel="canonical" href="https://brainrim.site">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<title>Color Different Game</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/games-pop-up.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/games-top-button.php"); ?>
<div class="pause-button"><img src="/img/icons/pause-circle-outline.svg" class="img-icon" alt="иконка-паузы" title="иконка-паузы"></div>
	<div class="pause-alert"><span class="alert-span">На паузе</span></div>
	<h1>Найди отличающийся квадрат!</h1>
	<div class="game">
		<div id="timer">Оставшееся время: <span>5</span> сек</div>
		<div id="score">Найдено: <span>0</span></div>
	<div class="grid"></div>
	</div>

	<script src ="/pages/Games/Chill/DifferentColor/js/Diffcolor.js"></script>
</body>
</html>
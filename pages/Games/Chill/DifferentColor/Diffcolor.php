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

<header>
	<div class="pause-button"><ion-icon name="pause-circle-outline"></ion-icon></div>
</header> 

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/games-pop-up.php"); ?>
<div class="pause-alert"><span class="alert-span">На паузе</span></div>
<h1>Найди отличающийся квадрат!</h1>
	<div class="game">
		<div id="timer">Оставшееся время: <span>5</span> сек</div>
		<div id="score">Найдено: <span>0</span></div>
	<div class="grid"></div>
</div>

	<script src ="/pages/Games/Chill/DifferentColor/js/Diffcolor.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

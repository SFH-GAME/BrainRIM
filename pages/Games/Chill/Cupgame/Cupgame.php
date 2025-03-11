<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="/pages/Games/Chill/Cupgame/css/Cupgame.css">
    <link rel="canonical" href="https://brainrim.site">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<title>Cup Game</title>
</head>

<body>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/games-pop-up.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/include/games-top-button.php"); ?>

<div class="score-container">Угадал: <span id="score">0 раз</span></div>

<div class="game-container">
    <div class="ball"></div>
    <div class="cup" style="left: 0px;" data-index="0"></div>
    <div class="cup" style="left: 120px;" data-index="1"></div>
    <div class="cup" style="left: 240px;" data-index="2"></div>
</div>
<button id="restart" style="display: none;">Далее</button>

	<script src ="/pages/Games/Chill/Cupgame/js/Cupgame.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>



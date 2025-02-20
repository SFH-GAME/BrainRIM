<?php 
   include $_SERVER['DOCUMENT_ROOT']."/dataBase/games/logicRuningGame.php";
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <script>//записывает в переменные данные из базы
      <?php if(isset($_SESSION['id'])): ?>
        let bestTimeRes = Number('<?= $bestUserResultTime ?>');
        let bestEnemiesPassedRes = Number('<?= $bestUserResultEnemiesPassed ?>');
      <?php else: ?>//что бы не было ошибки когда не авторизован пользователь
        bestTimeRes = 0;
        bestEnemiesPassedRes = 0;
      <?php endif;?>
    </script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Игра - бега</title>
	  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/pages/Games/Chill/runingGame/css/runingGame.css" />
    <link rel="canonical" href="https://brainrim.site">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
  </head>
  <body>
    <?php include($_SERVER['DOCUMENT_ROOT']."/include/games-pop-up.php"); ?>
    <div class="button-start-container">
      <div class="start-menu">
        <div class="start-menu__best-res-title">Лучший результат:<div class="best-res__value"></div> кубиков</div>
        <div class="button-start">START</div>
        <div class="game-info-title">
          <span class="game-info-name">Забег</span>
          <span class="game-info">В этой игре вам надо уворачиваться от падающих кубиков и продержаться как можно дольше</span>
        </div>
      </div>
   </div>
   </div>
  <div class="topButton-gameWords">
         <a class="comeback-button" href="#"><div class="comeback-button-body"><ion-icon name="arrow-back-outline"></ion-icon></div></a>
         <a href="#" class="linkToTheSettings"><ion-icon class="imgSettings" name="settings-outline"></ion-icon></a>
         <div class="linkToTheRestart"><ion-icon name="refresh-outline"></ion-icon></div>
  </div>
    <div class="game-container">
        <div id="player"></div>
      <div id="score">Время: <span id="timer">0</span>с <div class="score-enemy-passed">Врагов пройдено: <span id="score-num">0</span></div></div>

	  <div class="results-gameover results-container">
	    <h1 class="results-head-text">Результаты</h1>
			<div class="results">
				<div class="time">Время:<div class="time-count"></div>c.</div>
				<div class="moves">Врагов:<div class="moves-count"></div></div>
				<div class="best-results">Ваш лучший результат:</div>
				<div class="time">Время: <div class="best-time-count">0</div>с.</div>
				<div class="moves">Врагов: <div class="best-moves-count">0</div></div>
				<div class="loose-win-value">Вы проиграли</div> 
			</div>
			<div class="results-menu__buttons-container">
			<div onclick="window.location.reload();" class=" results-menu__button results-menu__button-restart"><ion-icon name="refresh-outline" role="img" class="md hydrated" aria-label="refresh outline"></ion-icon>
			</div>
			<a href="/index.php" class=" results-menu__button result-menu__button-home"><ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon></a>
		</div>
	  </div>
    </div>
	 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/pages/Games/Chill/runingGame/js/runingGame.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/pages/Games/Chill/TilesLabirint/css/tilesMaze.css">
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
  <link rel="canonical" href="https://brainrim.site">
  <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <title>Игра Лабиринт  рррррррр</title>
  <style>
    
  </style>
</head>
<body>
  <?php include($_SERVER['DOCUMENT_ROOT']."/include/games-pop-up.php"); ?>
  <div class="button-start-container">
      <div class="start-menu">
         <div class="button-start">START</div>
		 <div class="game-info-title">
		<span class="game-info-name">Лабиринт</span>
		<span class="game-info">В этой игре вам надо запомнить правильный путь и восстановить его по памяти за определенное время</span>
	  </div>
      </div>
   </div>
</div>
  <div class="topButton-gameWords">
    <a class="comeback-button" href="#"><div class="comeback-button-body"><ion-icon name="arrow-back-outline"></ion-icon></div></a>
    <a href="#" class="linkToTheSettings"><ion-icon class="imgSettings" name="settings-outline"></ion-icon></a>
    <div class="linkToTheRestart"><ion-icon name="refresh-outline"></ion-icon></div>
  </div>
  
    <div id="level">Уровень: 1</div>
    <div id="level-timer">Осталось: 40 сек.</div>
    <div id="message">Уровень пройден!</div>
    <div id="game-board"></div>

<!--Результаты -->
    <div class="results-gameover results-container">
        <h1 class="results-head-text">Результаты</h1>
        <div class="results">
          <div class="time">Оставшееся время:<div class="time-count"></div>c.</div>
          <div class="level">Уровень:<div class="level-count"></div></div>
          <div class="best-results">Ваш лучший результат:</div>
          <div class="time">Время: <div class="best-time-count">0</div>с.</div>
          <div class="level">Уровень: <div class="best-level-count">0</div></div>
          <div class="loose-win-value">Вы проиграли</div>
        </div>
        <div class="results-menu__buttons-container">
          <div onclick="window.location.reload();" class=" results-menu__button results-menu__button-restart"><ion-icon name="refresh-outline" role="img" class="md hydrated" aria-label="refresh outline"></ion-icon>
        </div>
        <a href="/index.php" class=" results-menu__button result-menu__button-home"><ion-icon name="home-outline" role="img" class="md hydrated" aria-label="home outline"></ion-icon></a>
      </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src = "/pages/Games/Chill/TilesLabirint/js/tilesMaze.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

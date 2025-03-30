<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/pages/Games/Growth/Memory/css/saymonSays-game.css">
   <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
   <link rel="canonical" href="https://brainrim.site">
   <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
   <title>Игра - "Саймон говорит"</title>

</head>

<body>
   <?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-pop-up.php"); ?>
   <div class="button-start-container">
      <div class="start-menu">
         <div class="start-menu__game-mode-container">
            <div class="start-menu__game-mode"></div>
         </div>
         <button class="button-start">START</button>
         <div class="game-info-title">
            <span class="game-info-name">Саймон говорит</span>
            <span class="game-info">Твоя задача — запомнить последовательность мигающих цветов и повторить её. С каждым
               раундом становится сложнее</span>
         </div>
      </div>
   </div>

   <?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-top-button.php"); ?>

   <div id="status">Запомни</div>
   <h2>Ход: <span id="round">0</span></h2>
   <div class="game-container">
      <button class="btn green" data-color="green"></button>
      <button class="btn red" data-color="red"></button>
      <button class="btn blue" data-color="blue"></button>
      <button class="btn yellow" data-color="yellow"></button>
   </div>
   <script src="/pages/Games/Growth/Memory/js/saymonSays-game.js"></script>
</body>

</html>
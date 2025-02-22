<?php
include($_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <script>
      let eyeValue = '<?= $eyeValue ?>';
   </script>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/pages/Games/Growth/Memory/css/Memory-game.css">
   <link rel="canonical" href="https://brainrim.site">
   <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
   <title>Игра - память</title>
</head>

<body>
   <?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-pop-up.php"); ?>


   <div class="victory-loose-screen-container">
      <div class="victory-loose-screen__mode-container">
         <div class="victory-loose-screen__mode-title">Сложность</div>
         <div class="victory-loose-screen__mode"></div>
      </div>
      <div class="victory-loose-screen__win-loose-text">Победа!</div>
      <div class="victory-loose-screen__results-button" id="button">Результаты</div>
   </div>
   <div class="results-menu-container">
      <div class="results-menu__title">Результаты</div>
      <div class="results-menu__mode-container">
         <div class="results-menu__mode-title">Сложность</div>
         <div class="results-menu__mode"></div>
      </div>

      <div class="win-loose-screen">
         <ion-icon class="star" name="star"></ion-icon>
         <div class="screen-title items-container__win-loose-item">Победа</div>
         <ion-icon class="star" name="star"></ion-icon>
      </div>

      <div class="results-menu__items-container items-container">
         <div class="items-container__each-item-container">
            <div class="items-container__done-cards-icon"><ion-icon name="checkmark-outline"></ion-icon></div>
            <div class="items-container__done-cards-item">
               <div class="opened-cards"></div>/9
            </div>
         </div>
         <div class="items-container__each-item-container">
            <div class="items-container__time-icon"><ion-icon name="stopwatch-outline"></ion-icon></div>
            <div class="items-container__time-item">
               <div class="results-menu__time"></div>0м. <div class="results__time-sec"></div>с.
            </div>
         </div>
         <div class="items-container__each-item-container">
            <div class="items-container__iq-icon">IQ</div>
            <div class="items-container__iq-item"></div>
         </div>
         <div class="items-container__each-item-container">
            <div class="items-container__exp-icon">Exp</div>
            <div class="items-container__exp-item"></div>
         </div>
      </div>
      <div class="results-menu__buttons-container">
         <div onClick="window.location.reload();" class=" results-menu__button results-menu__button-restart"><ion-icon
               name="refresh-outline"></ion-icon>
         </div>
         <a href="/index.php" class=" results-menu__button result-menu__button-home"><ion-icon
               name="home-outline"></ion-icon></a>
      </div>
   </div>

   <div class="button-start-container">
      <div class="start-menu">
         <div class="start-menu__game-mode-container">
            <div class="start-menu__game-mode-title">Сложность</div>
            <div class="start-menu__game-mode"></div>
         </div>
         <a href="#" class="button-start">START</a>
         <div class="game-info-title">
            <span class="game-info-name">Зеркальная память</span>
            <span class="game-info">В этой игре вам надо будет запомнить расположение перевёрнутой карты и найти её
               пару</span>
         </div>
      </div>
   </div>
   <div class="wrapper">
      <div class="mode-options-container">
         <div class="mode-option-title">Сложность</div>
         <div class="mode-body">
            <div class="easy-mode-button">
               <span class="easy-mode-text">Легко</span>
               <div class="easy-mode-count">1x</div>
            </div>
            <div class="normal-mode-button">
               <span class="normal-mode-text">Нормально</span>
               <div class="normal-mode-count">1.2x</div>
            </div>
            <div class="hard-mode-button">
               <span class="hard-mode-text">Сложно</span>
               <div class="hard-mode-count">1.5x</div>
            </div>
            <div class="crazy-mode-button">
               <span class="crazy-mode-text">Безумие</span>
               <div class="crazy-mode-count">2x</div>
            </div>
         </div>
      </div>
      <div class="topButton-gameWords">
         <a class="comeback-button" href="#">
            <div class="comeback-button-body"><ion-icon name="arrow-back-outline"></ion-icon></div>
         </a>
         <a href="#" class="linkToTheSettings"><ion-icon class="imgSettings" name="settings-outline"></ion-icon></a>
         <div class="linkToTheRestart"><ion-icon name="refresh-outline"></ion-icon></div>
      </div>
      <div class="game-mode"></div>
      <div class="hint-button">
         <ion-icon class="icon-eye" name="eye-outline"></ion-icon>
         <div class="hint-counter"><?php if (isset($_SESSION['id'])): ?>    <?php echo $EyeScore['sum_eye_hint']; ?>
            <?php else: ?>0<?php endif; ?>
         </div>
      </div>
      <div class="deadLineWrapper">
         <div id="deadeLine"></div>
         <h3 class="text-openedCards"> Сделано:<span class="score-openedCards" id="scoreOpenedCards"></span>/9</h3>
      </div>
      <section class="memory-game">
         <div class="memory-card" data-framework="1">
            <img src="/pages/Games/Growth/Memory/img/1.png" alt="1" class="front-face">
            <img src="" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="1">
            <img src="/pages/Games/Growth/Memory/img/1.png" alt="1" class="front-face">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>

         <div class="memory-card" data-framework="2">
            <img src="/pages/Games/Growth/Memory/img/2.png" alt="2" class="front-face two-eagle">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="2">
            <img src="/pages/Games/Growth/Memory/img/2.png" alt="2" class="front-face two-eagle">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="3">
            <img src="/pages/Games/Growth/Memory/img/3.png" alt="3" class="front-face img-mouse">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="3">
            <img src="/pages/Games/Growth/Memory/img/3.png" alt="3" class="front-face img-mouse">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="4">
            <img src="/pages/Games/Growth/Memory/img/4.png" alt="4" class="front-face">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="4">
            <img src="/pages/Games/Growth/Memory/img/4.png" alt="4" class="front-face">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="5">
            <img src="/pages/Games/Growth/Memory/img/5.png" alt="5" class="front-face img-sheep">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="5">
            <img src="/pages/Games/Growth/Memory/img/5.png" alt="5" class="front-face img-sheep">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="6">
            <img src="/pages/Games/Growth/Memory/img/6.png" alt="6" class="front-face">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="6">
            <img src="/pages/Games/Growth/Memory/img/6.png" alt="6" class="front-face">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="7">
            <img src="/pages/Games/Growth/Memory/img/7.png" alt="7" class="front-face img-ice-creem">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="7">
            <img src="/pages/Games/Growth/Memory/img/7.png" alt="7" class="front-face img-ice-creem">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="8">
            <img src="/pages/Games/Growth/Memory/img/8.png" alt="8" class="front-face">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="8">
            <img src="/pages/Games/Growth/Memory/img/8.png" alt="8" class="front-face">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="9">
            <img src="/pages/Games/Growth/Memory/img/9.png" alt="9" class="front-face img-circle">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
         <div class="memory-card" data-framework="9">
            <img src="/pages/Games/Growth/Memory/img/9.png" alt="9" class="front-face img-circle">
            <img src="/pages/Games/Growth/Memory/img/0.jpg" alt="memory card" class="back-face">
            <img class="brain-logo" src="/pages/Games/Growth/Memory/img/brain-logo.svg" alt="logo">
         </div>
      </section>

   </div>

   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   <script src="/pages/Games/Growth/Memory/js/Memory-game.js"></script>

</body>

</html>
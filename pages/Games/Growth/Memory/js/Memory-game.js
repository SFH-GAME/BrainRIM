"use strict"

//звук
let audioCardDone = new Audio('/sound/interface-124464_RpPW8qfY.mp3');
let audioComplete = new Audio('/sound/680126__strangehorizon__g_neck_pop.wav');
let audioVictory = new Audio('/sound/successfull.mp3');
let audioStart = new Audio('/sound/start-game.mp3');

let ModeTimeAnim;

let settings = document.querySelector(".pop-up__container");
let comeback = document.querySelector(".pop-up__container2");
let restart = document.querySelector(".pop-up__container3");


//добавляет счёт для открытых карт
let score = 0;
let expUpForMode;
let iqUpForMode;
let gameModeId;
//считает время с начала игры
let seconds = 0;
let minutes = 0;
let winForResults = 0;
let looseForResults = 0;
let statusLoosOrWin;
let eyeValueForJS = eyeValue;//записываю из переменной с инфой из базы данных в обычн js переменную для динамич. показа на экране
const cards = document.querySelectorAll('.memory-card');
let deadeLine = document.getElementById("deadeLine");
let easyModeButton = document.querySelector('.easy-mode-button');
let normalModeButton = document.querySelector('.normal-mode-button');
let hardModeButton = document.querySelector('.hard-mode-button');
let crazyModeButton = document.querySelector('.crazy-mode-button');
let modeOptionsContainer = document.querySelector('.mode-options-container');
let hintButton = document.querySelector('.hint-button');
let hintCounter = document.querySelector('.hint-counter');
let gameMode = document.querySelector('.game-mode');
let gameModeStyleEasy = document.querySelector('.game-mode-style-easy');
const startButtonContainer = document.querySelector('.button-start-container');
const startButtonGameMode = document.querySelector('.start-menu__game-mode');
const victoryLooseScreenContainer = document.querySelector('.victory-loose-screen-container');
const victoryLooseScreenGameMode = document.querySelector('.victory-loose-screen__mode');
const victoryLooseScreenWinLooseText = document.querySelector('.victory-loose-screen__win-loose-text');
const victoryLooseScreenResultsButton = document.querySelector('.victory-loose-screen__results-button');
const resultsMenuContainer = document.querySelector('.results-menu-container');
const resultsMenuMode = document.querySelector('.results-menu__mode');
const resultsMenuWinLooseItem = document.querySelector('.items-container__win-loose-item');
const resultsMenuTimeItem = document.querySelector('.items-container__time-item');
const resultsMenuOpenedCardsItem = document.querySelector('.opened-cards');
const resultsMenuDoneCardsItem = document.querySelector('.items-container__done-cards-item');
const resultsMenuTime = document.querySelector('.results__time-sec');
const resultsMenuIqItem = document.querySelector('.items-container__iq-item');
const resultsMenuExpItem = document.querySelector('.items-container__exp-item');


//z
//AJAX запрос на сервер для добавления в базу данных инфы 
function doAjaxExperience() {

   let expUpForModeAjax;

   if (statusLoosOrWin == "win") {//проверка на победу или луз
      expUpForModeAjax = `${expUpForMode}`;
   } else {
      expUpForModeAjax = 2;
   }

   $.ajax({
      url: '/dataBase/controllers/bonusSystem/experience.php',
      type: 'POST',
      dataType: "json",
      data: {
         expUpForModeAjax: expUpForModeAjax,

      },
      success: function (data) {
         console.log(data.expUpForModeAjax);
      },
      error: function () {
         console.log('ERROR');
      }
   })
}

//AJAX запрос на сервер для добавления в базу данных инфы при выйгрыше
function doAjaxWinBonuse() {
   let IqUpForModeAjax = `${iqUpForMode}`;


   $.ajax({
      url: '/dataBase/controllers/bonusSystem/bonusForWin copy.php',
      type: 'POST',
      dataType: "json",
      data: {
         IqUpForModeAjax: IqUpForModeAjax,

      },
      success: function (data) {
         console.log(data.IqUpForModeAjax);
      },
      error: function () {
         console.log('ERROR');
      }
   })
}

function doAjaxMinusHints() {


   $.ajax({
      url: '/dataBase/controllers/antiBonusSystem/minusEyeHints.php',
      type: 'POST',
      data: {
      },
      success: function (data) {
         console.log(data);
      },
      error: function () {
         console.log('ERROR');
      }
   })
}


function doAjaxLooseBonuse() {
   let IqUpForModeAjax = `2`;

   $.ajax({
      url: '/dataBase/controllers/bonusSystem/bonusForLoose.php',
      type: 'POST',
      dataType: "json",
      data: {
         IqUpForModeAjax: IqUpForModeAjax,

      },
      success: function (data) {
         console.log(data.IqUpForModeAjax);
      },
      error: function () {
         console.log('ERROR');
      }
   })
}

//AJAX запрос на сервер для добавления в базу данных инфы при выйгрыше
function doAjaxResults() {
   let modeID = `${gameModeId}`;
   let win = `${winForResults}`;
   let loose = `${looseForResults}`;
   let time_sec = `${seconds}`;
   let opened_cards = `${score}`;

   $.ajax({
      url: '/dataBase/resultsGames/resultsImgGame.php',
      type: 'POST',
      dataType: "json",
      data: {
         modeID: modeID,
         win: win,
         loose: loose,
         time_sec: time_sec,
         opened_cards: opened_cards,
      },
      success: function (data) {
         console.log(data);
      },
      error: function () {
         console.log('ERRORчик');
      }
   })
}


//при нажатии на отмену вспл окна настройки 
document.querySelector('.pop-up__cancel').onclick = function () {
   settings.style = 'visibility:hidden;';

};
//при нажатии на иконку настроек
document.querySelector('.linkToTheSettings').onclick = function () {

   settings.style = 'visibility:visible;';

};

//при нажатии на отмену вспл окна назад
document.querySelector('.pop-up__cancel2').onclick = function () {
   comeback.style = 'visibility:hidden;';

};
//при нажатии на иконку назад
document.querySelector('.comeback-button').onclick = function () {

   comeback.style = 'visibility:visible;';

};

//при нажатии на отмену вспл окна рестарт
document.querySelector('.pop-up__cancel3').onclick = function () {
   restart.style = 'visibility:hidden;';

};
//при нажатии на иконку рестарт
document.querySelector('.linkToTheRestart').onclick = function () {

   restart.style = 'visibility:visible;';

};

easyModeButton.onclick = function () {//при нажатии на изи кнопку сложности
   modeOptionsContainer.style = 'display: none;';
   gameMode.innerHTML = 'Легко';
   gameMode.classList.add('game-mode-style-easy');
   ModeTimeAnim = '50';
   startButtonContainer.style = 'display: block;';
   startButtonGameMode.innerHTML = 'Легко';
   startButtonGameMode.classList.add('start-menu__easy-game-mode');
   victoryLooseScreenGameMode.classList.add('victory-loose-screen__easy-mode');
   victoryLooseScreenGameMode.innerHTML = 'Легко';
   resultsMenuMode.classList.add('results-menu__easy-mode');
   resultsMenuMode.innerHTML = 'Легко';
   expUpForMode = 5;
   iqUpForMode = 10;
   gameModeId = 1;
   audioComplete.play();
}
normalModeButton.onclick = function () {
   modeOptionsContainer.style = 'display: none;';
   gameMode.innerHTML = 'Нормально';
   gameMode.classList.add('game-mode-style-normal');
   ModeTimeAnim = '40';
   startButtonContainer.style = 'display: block;';
   startButtonGameMode.innerHTML = 'Нормально';
   startButtonGameMode.classList.add('start-menu__normal-game-mode');
   victoryLooseScreenGameMode.classList.add('victory-loose-screen__normal-mode');
   victoryLooseScreenGameMode.innerHTML = 'Нормально';
   resultsMenuMode.classList.add('results-menu__normal-mode');
   resultsMenuMode.innerHTML = 'Нормально';
   expUpForMode = 6;
   iqUpForMode = 12;
   gameModeId = 2;
   audioComplete.play();
}
hardModeButton.onclick = function () {
   modeOptionsContainer.style = 'display: none;';
   gameMode.innerHTML = 'Сложно';
   gameMode.classList.add('game-mode-style-hard');
   ModeTimeAnim = '35';
   startButtonContainer.style = 'display: block;';
   startButtonGameMode.innerHTML = 'Сложно';
   startButtonGameMode.classList.add('start-menu__hard-game-mode');
   victoryLooseScreenGameMode.classList.add('victory-loose-screen__hard-mode');
   victoryLooseScreenGameMode.innerHTML = 'Сложно';
   resultsMenuMode.classList.add('results-menu__hard-mode');
   resultsMenuMode.innerHTML = 'Сложно';
   expUpForMode = 8;
   iqUpForMode = 15;
   gameModeId = 3;
   audioComplete.play();
}
crazyModeButton.onclick = function () {
   modeOptionsContainer.style = 'display: none;';
   gameMode.innerHTML = 'Безумно';
   gameMode.classList.add('game-mode-style-crazy');
   ModeTimeAnim = '30';
   startButtonContainer.style = 'display: block;';
   startButtonGameMode.innerHTML = 'Безумно';
   startButtonGameMode.classList.add('start-menu__crazy-game-mode');
   victoryLooseScreenGameMode.classList.add('victory-loose-screen__crazy-mode');
   victoryLooseScreenGameMode.innerHTML = 'Безумно';
   resultsMenuMode.classList.add('results-menu__crazy-mode');
   resultsMenuMode.innerHTML = 'Безумно';
   expUpForMode = 10;
   iqUpForMode = 20;
   gameModeId = 4;
   audioComplete.play();
}
victoryLooseScreenResultsButton.onclick = function () {
   resultsMenuContainer.style = 'display:block;';
   audioComplete.play();
}

hintButton.onclick = function () {//при нажатии на подсказку
   if (eyeValue > 0 && eyeValueForJS > 0) {
      eyeValueForJS -= 1;
      hintCounter.innerHTML = eyeValueForJS;
      doAjaxMinusHints();
      audioComplete.play();
      if (cards.forEach(card => card.classList.contains('flip'))) {

      }
      else {
         cards.forEach(card => card.classList.add('flip'));
         if (cards.forEach(card => card.classList.contains('alredy-flip'))) {
         } else {
            setTimeout(() => {
               cards.forEach(card => card.classList.remove('flip'));
            }, 1500);
         }
      }
   }
}



function game() {


   function timerGame() {
      let timerID = setInterval(function () {

         seconds += 1;
      }, 1000)
   }
   timerGame();

   deadeLine.style = `animation: deadeLine ${ModeTimeAnim}s linear `;//запуск анимации,c переменной под каждый мод игы

   //анимация проигриша 
   function showMessage() {
      victoryLooseScreenContainer.style = 'display:flex;';
      victoryLooseScreenWinLooseText.innerHTML = 'Поражение!'
      victoryLooseScreenWinLooseText.classList.add('loose-text-red');
      resultsMenuWinLooseItem.innerHTML = 'Поражение!'
      resultsMenuWinLooseItem.classList.add('items-container__win-loose-item-red');
      resultsMenuOpenedCardsItem.innerHTML = `${score}`;
      resultsMenuDoneCardsItem.classList.add('items-container__done-cards-item-red');
      resultsMenuTimeItem.classList.add('items-container__time-item-red');
      resultsMenuTime.innerHTML = `${seconds}`;
      resultsMenuIqItem.innerHTML = '+2';
      resultsMenuExpItem.innerHTML = `+2`;
      statusLoosOrWin = "loose";
      looseForResults = 1;
      doAjaxLooseBonuse();
      doAjaxExperience();
      doAjaxResults();
   }
   deadeLine.addEventListener("animationend", showMessage);




   function createBorder() {
      for (let i = 0; i < cardsArr.length; i++) {
         const imgCard = document.createElement('IMG');
         imgCard.setAttribute('id', String(i));
         imgCard.setAttribute('src', 'page-for-memory/pages/thirdGame-images/img/0.jpg')
         imgCard.addEventListener('click', flipCard);
         cardsDiv.appendChild(imgCard);
      }
   }

   let cardsChosenArr = [];
   let cardsChosenArrId = [];
   let nofOpenedCardsArr = [];




   let hasFlippedCard = false;
   let lockBoard = false;
   let firstCard, secondCard;
   let victoryTab = document.querySelector('.textVictory');
   let looseTab = document.querySelector('.textLoose');


   function flipCard() {
      if (lockBoard) return;
      if (this === firstCard) return;

      this.classList.add('flip');

      if (!hasFlippedCard) {
         hasFlippedCard = true;
         firstCard = this;
         return;
      }

      secondCard = this;
      hasFlippedCard = false;

      checkForMatch();



   }
   //добавляет счёт для открытых карт
   document.getElementById("scoreOpenedCards").innerHTML = score;

   function checkForMatch() {
      if (firstCard.dataset.framework === secondCard.dataset.framework) {

         document.getElementById("scoreOpenedCards").innerHTML = score += 1;

         //анимация победы 
         if (score == 9) {
            deadeLine.style = "animation-play-state: paused ";
            victoryLooseScreenContainer.style = 'display:flex;';
            victoryLooseScreenWinLooseText.innerHTML = 'Победа!'
            victoryLooseScreenWinLooseText.classList.add('victory-text-green');
            resultsMenuWinLooseItem.innerHTML = 'Победа!'
            resultsMenuWinLooseItem.classList.add('items-container__win-loose-item-green');
            resultsMenuOpenedCardsItem.innerHTML = '9';
            resultsMenuDoneCardsItem.classList.add('items-container__done-cards-item-green');
            resultsMenuTimeItem.classList.add('items-container__time-item-green');
            resultsMenuTime.innerHTML = `${seconds}`;
            resultsMenuIqItem.innerHTML = `+${iqUpForMode}`;
            resultsMenuExpItem.innerHTML = `+${expUpForMode}`;
            statusLoosOrWin = "win";
            winForResults = 1;
            doAjaxWinBonuse();
            doAjaxExperience();
            doAjaxResults();
            audioVictory.play();
         }
         //добавляет звук
         audioCardDone.play();

         disableCards();
         return;
      }

      unflipCards();
   }




   function disableCards() {
      firstCard.classList.add('alredy-flip');
      secondCard.classList.add('alredy-flip');
      firstCard.removeEventListener('click', flipCard);
      secondCard.removeEventListener('click', flipCard);

      resetBoard();
   }

   function unflipCards() {
      lockBoard = true;

      setTimeout(() => {
         firstCard.classList.remove('flip');
         secondCard.classList.remove('flip');

         lockBoard = false;
         resetBoard();
      }, 1500);
   }

   function resetBoard() {
      [hasFlippedCard, lockBoard] = [false, false];
      [firstCard, secondCard] = [null, null];
   }

   function shuffle() {
      cards.forEach(card => {
         let ramdomPos = Math.floor(Math.random() * 18);
         card.style.order = ramdomPos;
      });
   }

   shuffle();
   cards.forEach(card => card.addEventListener('click', flipCard));
}


//активация кнопки старт при нажатии
const BUTTON_START = document.querySelector('.button-start');
BUTTON_START.onclick = function () {
   document.querySelector('.start-menu').classList.add('activated');
   BUTTON_START.classList.add('activated');
   if (BUTTON_START.classList.contains('activated')) {
      audioStart.play();
      game();
   }
}


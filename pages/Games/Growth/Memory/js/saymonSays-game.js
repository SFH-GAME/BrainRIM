let sequence = [];
let playerSequence = [];
let round = 0;
let colors = ["green", "red", "blue", "yellow"];
let buttons = document.querySelectorAll(".btn");
let canClick = false;
let statusElement = document.getElementById("status");


function startGame() {
   sequence = [];
   playerSequence = [];
   round = 0;
   document.getElementById("round").textContent = round;
   nextRound();
}

function nextRound() {
   round++;
   document.getElementById("round").textContent = round;
   statusElement.textContent = "Запомни";
   statusElement.style.color = "#c67e29ed";
   playerSequence = [];
   sequence.push(colors[Math.floor(Math.random() * 4)]);
   playSequence();
}

function playSequence() {
   canClick = false;
   let i = 0;
   let interval = setInterval(() => {
      flashButton(sequence[i]);
      i++;
      if (i >= sequence.length) {
         clearInterval(interval);
         setTimeout(() => {
            statusElement.textContent = "Повторяй";
            statusElement.style.color = "#0aa60ae6";
            canClick = true;
         }, 500);
      }
   }, 800);
}

function flashButton(color) {
   let button = document.querySelector(`.btn.${color}`);
   button.classList.add("active");
   setTimeout(() => button.classList.remove("active"), 500);
}

buttons.forEach(button => {
   button.addEventListener("click", () => {
      if (!canClick) return;
      let color = button.dataset.color;
      playerSequence.push(color);
      flashButton(color);
      checkSequence();
   });
});

function checkSequence() {
   let index = playerSequence.length - 1;
   if (playerSequence[index] !== sequence[index]) {
      alert("Ты ошибся! Игра окончена. Твой счёт: " + (sequence.length - 1));
      return;
   }
   if (playerSequence.length === sequence.length) {
      setTimeout(nextRound, 1000);
   }
}

//Всплывающие окна
let settings = document.querySelector(".pop-up__container");
let comeback = document.querySelector(".pop-up__container2");
let restart = document.querySelector(".pop-up__container3");


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



//активация кнопки старт при нажатии
const BUTTON_START = document.querySelector('.button-start');
BUTTON_START.onclick = function () {
   document.querySelector('.start-menu').classList.add('activated');
   BUTTON_START.classList.add('activated');
   if (BUTTON_START.classList.contains('activated')) {

      setTimeout(startGame, 2000);
   }
}
const resultContainer = document.querySelector('.results-container');
const timerCountResultsValue = document.querySelector(".time-count");
const scoreResultsValue = document.querySelector(".moves-count");
const bestTimerCountResultsValue = document.querySelector(".best-time-count");
const bestScoreCountResultsValue = document.querySelector(".best-moves-count");
const winOrLooseResultsValue = document.querySelector(".loose-win-value");
const bestResultGameContainerValue = document.querySelector(".value-best");

let leaderboardButton = document.querySelector(".leaderboard-button");
let leaderboarBackdButton = document.querySelector(".leaderboard__back-button");
let leaderboardContainer = document.querySelector(".leaderboard-container");

//AJAX запрос на сервер для добавления в базу данных инфы 
let winForResults = 0;
let looseForResults = 0;
let statusLoosOrWin;

function doAjaxExperience() {
   let expUpForModeAjax;
   if (statusLoosOrWin === "win") {//проверка на победу или луз
      expUpForModeAjax = 15;
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
   let IqUpForModeAjax = 15;
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

function doAjaxLooseBonuse() {
   let IqUpForModeAjax = 2;

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
   let win = `${winForResults}`;
   let loose = `${looseForResults}`;
   let time_sec = `${timerCount}`;
   let score = `${game.score}`;

   $.ajax({
      url: '/dataBase/resultsGames/results2048Game.php',
      type: 'POST',
      dataType: "json",
      data: {
         win: win,
         loose: loose,
         time_sec: time_sec,
         score: score,
      },
      success: function (data) {
         console.log(data);
      },
      error: function () {
         console.log('ERRORчик');
      }
   })
}

  leaderboardButton.onclick = function () {
	leaderboardContainer.style = "display: block;"
 }
 leaderboarBackdButton.onclick = function () {
	leaderboardContainer.style = "display: none;"
 }

 const startButton = document.querySelector('.button-start');
 const startMenu = document.querySelector('.start-menu');
 
 let gameStarted = false; // Флаг начала игры
 let isGameActive = false; // Флаг активности игры
 
 startButton.addEventListener('click', (event) => {
    if (gameStarted) return; // Если игра уже запущена, игнорируем клик
    gameStarted = true; 

    startMenu.style.display = "none"; // Прячем стартовое меню
    resetGameState(); // Сбрасываем состояние игры

    isGameActive = true; // Разрешаем игровые клики
    animate(); // Запускаем игру сразу же после нажатия
    event.stopPropagation(); // Останавливаем всплытие клика
});

 
 // Функция сброса состояния перед началом новой игры
 function resetGameState() {
	score = 0;
	speed = 0.02;
	startTime = Date.now();
	[safeZoneStart, safeZoneEnd] = randomizeSafeZonePosition(initialZoneSize);
	isGameOver = false;
	gameStarted = false; // Разрешаем следующий запуск
	resultsGameOver.style.display = "none"; // Прячем окно проигрыша
 }

 function comparisonResBetterOrNot() {//возвращает правду или ложь
	if (game.score > bestScoreRes) {
	   return true;
	} else {
	   return false;
	}
 }

 let isResultSent = false; // Флаг для отправки результатов

 const game = {
	status: "playing", // начальный статус
	gameover: "gameover", // статус завершения
 
	checkGameOver: function () {
	   if (this.status === this.gameover && !isResultSent) {
		  isResultSent = true;
		  timerCountResultsValue.innerHTML = timerCount;
		  scoreResultsValue.innerHTML = this.score;
		  bestTimerCountResultsValue.innerHTML = bestTimeRes; // из базы данных
		  bestScoreCountResultsValue.innerHTML = bestScoreRes;
 
		  if (comparisonResBetterOrNot() == true) { // Если результат лучше
			 winOrLooseResultsValue.classList.add('congrats');
			 winOrLooseResultsValue.innerHTML = 'Лучший результат!';
			 statusLoosOrWin = "win";
			 winForResults = 1;
			 doAjaxWinBonuse();
		  } else {
			 winOrLooseResultsValue.classList.add('loose');
			 winOrLooseResultsValue.innerHTML = 'Вы проиграли';
			 looseForResults = 1;
			 statusLoosOrWin = "loose";
			 doAjaxLooseBonuse();
			 doAjaxExperience();
		  }
		  resultContainer.style.display = "block";
		  doAjaxResults();
	   }
	},
 
	isgameover: function () {
	   for (var r = 0; r < 4; r++) {
		  for (var c = 0; c < 4; c++) {
			 if (this.mydata[r][c] == 0) {
				return false;
			 }
			 if (c < 3 && this.mydata[r][c] == this.mydata[r][c + 1]) {
				return false;
			 }
			 if (r < 3 && this.mydata[r][c] == this.mydata[r + 1][c]) {
				return false;
			 }
		  }
	   }
	   return true;
	}
 };
 
 // Вызывать game.checkGameOver() в нужный момент
 

// логика для всплывающих окон
let settings = document.querySelector(".pop-up__container");
let comeback = document.querySelector(".pop-up__container2");
let restart = document.querySelector(".pop-up__container3");

//
let ResultsGameOver = document.querySelector(".results-gameover");

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




 const canvas = document.createElement('canvas');
 const ctx = canvas.getContext('2d');
 document.body.appendChild(canvas);
 
 canvas.width = window.innerWidth;
 canvas.height = window.innerHeight;
 
 const centerX = canvas.width / 2;
 const centerY = canvas.height / 2;
 let radius = Math.min(canvas.width, canvas.height) / 3;
 
 let movingAngle = 0;
 let speed = 0.02; // Начальная скорость движения шарика
 const maxSpeed = 0.1; // Максимальная скорость шарика
 let speedIncrement = 0.002; // Как скорость будет увеличиваться
 
 let safeZoneStart = Math.random() * Math.PI * 2; // Случайное начало зелёной зоны
 let safeZoneEnd = safeZoneStart + Math.PI / 1; // Начальный размер зелёной зоны
 const minZoneSize = Math.PI / 12; // Минимальный размер зелёной зоны
 let score = 0;
 const initialZoneSize = Math.PI / 1; // Исходный размер зелёной зоны
 const zoneShrink = 0.1; // Насколько сужается зона при правильном ответе
 
 let isGameOver = false; // Флаг состояния игры
 let startTime = Date.now(); // Время старта игры
 
 // Получаем элементы для результатов
 let resultsGameOver = document.querySelector(".results-gameover");
 let timeCount = document.querySelector(".time-count");
 let movesCount = document.querySelector(".moves-count");
 let bestTimeCount = document.querySelector(".best-time-count");
 let bestMovesCount = document.querySelector(".best-moves-count");
 let looseWinValue = document.querySelector(".loose-win-value");
 
 // Загружаем лучший результат из localStorage
 let bestScore = localStorage.getItem("bestScore") || 0;
 let bestTime = localStorage.getItem("bestTime") || 0;
 
 // Функция отрисовки круга с зонами
 function drawCircle() {
	 ctx.beginPath();
	 ctx.moveTo(centerX, centerY);
	 ctx.arc(centerX, centerY, radius, 0, safeZoneStart);
	 ctx.arc(centerX, centerY, radius, safeZoneEnd, Math.PI * 2);
	 ctx.fillStyle = 'gray';
	 ctx.fill();
	 
	 ctx.beginPath();
	 ctx.moveTo(centerX, centerY);
	 ctx.arc(centerX, centerY, radius, safeZoneStart, safeZoneEnd);
	 ctx.fillStyle = 'green';
	 ctx.fill();
 
	 ctx.beginPath();
	 ctx.arc(centerX, centerY, radius, 0, Math.PI * 2);
	 ctx.strokeStyle = 'white';
	 ctx.lineWidth = 2;
	 ctx.stroke();
 }
 
 // Отрисовка движущегося шарика
 function drawMovingPoint() {
	 let x = centerX + Math.cos(movingAngle) * radius;
	 let y = centerY + Math.sin(movingAngle) * radius;
	 ctx.fillStyle = 'blue';
	 ctx.beginPath();
	 ctx.arc(x, y, 10, 0, Math.PI * 2);
	 ctx.fill();
 }
 
 // Отрисовка счёта
 function drawScore() {
	 ctx.fillStyle = 'white';
	 ctx.font = '30px Arial';
	 const text = 'Счёт: ' + score;
	 const textWidth = ctx.measureText(text).width;
	 const textX = (canvas.width - textWidth) / 2;
	 const textY = canvas.height / 5;
	 ctx.fillText(text, textX, textY);
 }
 
 // Функция для случайного размещения зелёной зоны
 function randomizeSafeZonePosition(currentSize) {
	 let randomStart = Math.random() * Math.PI * 2;
	 let randomEnd = randomStart + currentSize;
	 if (randomEnd > Math.PI * 2) randomEnd -= Math.PI * 2;
	 return [randomStart, randomEnd];
 }
 
 // Анимация игры
 function animate() {
	 if (isGameOver) return; // Если игра окончена — остановить анимацию
   ctx.clearRect(0, 0, canvas.width, canvas.height);
   drawCircle();
   drawMovingPoint();
   drawScore();
   movingAngle += speed;
   if (movingAngle > Math.PI * 2) movingAngle -= Math.PI * 2;
   if (!isGameOver) requestAnimationFrame(animate);
}
 
// Логика нажатия во время игры
window.addEventListener('click', (event) => {
    if (!isGameActive || isGameOver) return; // Если игра не активна, игнорируем клик

    let isInsideSafeZone = false;

    if (safeZoneStart <= safeZoneEnd) {
        isInsideSafeZone = movingAngle >= safeZoneStart && movingAngle <= safeZoneEnd;
    } else {
        isInsideSafeZone = movingAngle >= safeZoneStart || movingAngle <= safeZoneEnd;
    }

    if (isInsideSafeZone) {
        score++;

        let currentZoneSize = safeZoneEnd - safeZoneStart;
        if (currentZoneSize < 0) currentZoneSize += Math.PI * 2;

        let newZoneSize = Math.max(currentZoneSize - zoneShrink, minZoneSize);
        [safeZoneStart, safeZoneEnd] = randomizeSafeZonePosition(newZoneSize);

        console.log('Good tap! Score: ' + score);

        if (speed < maxSpeed) {
            speed += speedIncrement;
        }
    } else {
        gameOver();
    }
});
 
// Функция завершения игры
function gameOver() {
    console.log('Game Over! Final Score: ' + score);
    isGameOver = true;
    isGameActive = false; // Останавливаем обработку кликов

    let elapsedTime = Math.round((Date.now() - startTime) / 1000); // Время в секундах

    timeCount.textContent = elapsedTime;
    movesCount.textContent = score;

    if (score > bestScore) {
        bestScore = score;
        localStorage.setItem("bestScore", bestScore);
    }
    if (elapsedTime > bestTime) {
        bestTime = elapsedTime;
        localStorage.setItem("bestTime", bestTime);
    }

    bestTimeCount.textContent = bestTime;
    bestMovesCount.textContent = bestScore;

    looseWinValue.textContent = "Вы проиграли";
    looseWinValue.classList.add("loose");

    resultsGameOver.style.display = "block";
}
 
 // Функция перезапуска игры
 function restartGame() {
	 score = 0;
	 speed = 0.02;
	 startTime = Date.now();
	 [safeZoneStart, safeZoneEnd] = randomizeSafeZonePosition(initialZoneSize);
	 isGameOver = false;
	 resultsGameOver.style.display = "none";
	 animate(); // Запускаем анимацию снова
 }
 
 // Назначаем событие на кнопку "Играть снова"
 document.querySelector(".results-menu__button-restart").addEventListener("click", restartGame);
 
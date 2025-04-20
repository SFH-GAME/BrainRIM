/*НУЖНО ПЕРЕДЕЛАТЬ ПОД НОВЫЙ КОД

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

function comparisonResBetterOrNot() {//возвращает правду или ложь
   if (game.score > bestScoreRes) {
      return true;
   } else {
      return false;
   }
}

НУЖНО ПЕРЕДЕЛАТЬ ПОД НОВЫЙ КОД*/

let resultsGameOver = document.querySelector('.results-gameover');

let gameStarted = false; // Флаг начала игры
let isGameActive = false; // Флаг активности игры

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

let isResultSent = false; // Флаг для отправки результатов

const game = {
   status: "playing", // начальный статус
   gameover: "gameover", // статус завершения

   start: function () {
	if (gameStarted) return;
	gameStarted = true;

	resetGameState();

	isGameActive = true;
	animate();
 },

 checkGameOver: function () {
	if (this.status === this.gameover && !isResultSent) {
	   isResultSent = true;

	   timerCountResultsValue.innerHTML = timerCount;
	   scoreResultsValue.innerHTML = this.score;
	   bestTimerCountResultsValue.innerHTML = bestTimeRes;
	   bestScoreCountResultsValue.innerHTML = bestScoreRes;

	   resultContainer.style.display = "block";
	   doAjaxResults();
	}
 },

 isgameover: function () {
	for (var r = 0; r < 4; r++) {
	   for (var c = 0; c < 4; c++) {
		  if (this.mydata[r][c] == 0) return false;
		  if (c < 3 && this.mydata[r][c] == this.mydata[r][c + 1]) return false;
		  if (r < 3 && this.mydata[r][c] == this.mydata[r + 1][c]) return false;
	   }
	}
	return true;
 }
};

// Вызывать game.checkGameOver() в нужный момент

const canvas = document.createElement('canvas');
const ctx = canvas.getContext('2d');
document.body.appendChild(canvas);

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const centerX = canvas.width / 2;
const centerY = canvas.height / 2;
let radius = Math.min(canvas.width, canvas.height) / 3;

let movingAngle = 0;
let speed = 0.03; // Начальная скорость движения шарика
const maxSpeed = 0.1; // Максимальная скорость шарика
let speedIncrement = 0.002; // Как скорость будет увеличиваться

let safeZoneStart = Math.random() * Math.PI * 2; // Случайное начало зелёной зоны
let safeZoneEnd = safeZoneStart + Math.PI / 1; // Начальный размер зелёной зоны

const minZoneSize = Math.PI / 12; // Минимальный размер зелёной зоны
let score = 0;
const initialZoneSize = Math.PI * 2 * 0.9; // 80% круга
const zoneShrink = 0.2; // Насколько сужается зона при правильном ответе

let isGameOver = false; // Флаг состояния игры
let startTime = Date.now(); // Время старта игры

// Загружаем лучший результат из localStorage
let bestScore = localStorage.getItem("bestScore") || 0;
let bestTime = localStorage.getItem("bestTime") || 0;

// Функция отрисовки круга с зонами
function drawCircle() {
   // Вычисляем корректную разницу углов
   let zoneSize = safeZoneEnd - safeZoneStart;
   if (zoneSize < 0) zoneSize += Math.PI * 2;

   // Серый сектор — это всё, что вне фиолетовой зоны
   if (zoneSize < Math.PI * 2 - 0.01) {
      ctx.beginPath();
      ctx.moveTo(centerX, centerY);
      ctx.arc(centerX, centerY, radius, safeZoneEnd, safeZoneStart + Math.PI * 2); // рисуем "оставшуюся часть"
      ctx.closePath();
      ctx.fillStyle = '#2B2A31';
      ctx.fill();
   }

   // Фиолетовая зона
   ctx.beginPath();
   ctx.moveTo(centerX, centerY);
   ctx.arc(centerX, centerY, radius, safeZoneStart, safeZoneEnd);
   ctx.closePath();
   ctx.fillStyle = '#7655f5';
   ctx.fill();

   // Обводка круга
   ctx.beginPath();
   ctx.arc(centerX, centerY, radius, 0, Math.PI * 2);
   ctx.strokeStyle = 'white';
   ctx.lineWidth = 2;
   ctx.stroke();
}



// Отрисовка движущегося прямоугольника
function drawMovingPoint() {
	let x = centerX + Math.cos(movingAngle) * radius;  // радиус для вычисления положения
	let y = centerY + Math.sin(movingAngle) * radius;
	let circleRadius = 10;  // радиус круга
 
	ctx.save(); // сохраняем текущие настройки canvas
	ctx.translate(x, y); // переносим начало координат в точку движения
	ctx.rotate(movingAngle + Math.PI / 2); // поворачиваем круг по касательной (плюс π/2, т.к. canvas по умолчанию рисует вниз)
 
	ctx.fillStyle = 'red';
	ctx.beginPath();
	ctx.arc(0, 0, circleRadius, 0, Math.PI * 2);  // рисуем круг с центром в (0, 0)
	ctx.fill();
 
	ctx.restore(); // возвращаем состояние canvas
 }
 


// Отрисовка счёта
function drawScore() {
	// Получаем значение CSS-переменной
	const color = getComputedStyle(document.documentElement)
				   .getPropertyValue('--text-color').trim();
  
	ctx.fillStyle = color || 'white'; // подстраховка, если переменная не найдена
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
	isGameActive = false;
 
	let elapsedTime = Math.round((Date.now() - startTime) / 1000);
 
	// Сохраняем лучшие результаты
	if (score > bestScore) {
	   bestScore = score;
	   localStorage.setItem("bestScore", bestScore);
	}
	if (elapsedTime > bestTime) {
	   bestTime = elapsedTime;
	   localStorage.setItem("bestTime", bestTime);
	}
 
	// Подготавливаем данные и вызываем showResults()
	const resultData = {
	   score: score,
	   level: Math.floor(elapsedTime / 10),
	   reward: {
		  money: 0,
		  hints: 0,
		  iq: 0,
		  exp: 0
	   },
	   best: {
		  score: bestScore,
		  level: Math.floor(bestTime / 10)
	   }
	};
 
	showResults(resultData);
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

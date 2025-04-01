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
 const initialZoneSize = Math.PI / 4; // Исходный размер зелёной зоны
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
	 requestAnimationFrame(animate);
 }
 
 // Логика нажатия
 window.addEventListener('click', () => {
	 if (isGameOver) return; // Не реагировать на нажатия после окончания игры
 
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
 
	 let elapsedTime = Math.round((Date.now() - startTime) / 1000); // Время в секундах
 
	 // Обновляем результаты в HTML
	 timeCount.textContent = elapsedTime;
	 movesCount.textContent = score;
 
	 // Обновляем лучшие результаты
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
 
	 // Меняем текст результата (выигрыш/проигрыш)
	 looseWinValue.textContent = "Вы проиграли";
	 looseWinValue.classList.add("loose");
 
	 // Показываем блок с результатами
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
 
 // Запускаем игру
 animate();
 
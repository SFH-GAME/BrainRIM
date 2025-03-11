// логика для всплывающих окон
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




 const cups = document.querySelectorAll('.cup');
 const ball = document.querySelector('.ball');
 const restartButton = document.getElementById('restart');
 const scoreElement = document.getElementById('score');
 
 let positions = [0, 120, 240];
 let ballPosition;
 let mixCount = 3;
 let animationDuration = 0.8; // Начальная длительность анимации
 let score = 0; // Начальный счёт
 
 function startGame() {
	 restartButton.style.display = "none";
	 
	 ballPosition = Math.floor(Math.random() * cups.length);
	 ball.style.transform = `translateX(${positions[ballPosition]}px)`;
 
	 cups[ballPosition].style.transform = "translateY(-50px)";
 
	 setTimeout(() => {
		 lowerCups();
	 }, 2000); // Полные 2 сек на показ шарика
 }
 
 function lowerCups() {
	 cups.forEach(cup => cup.style.transform = "translateY(0)");
 
	 setTimeout(() => {
		 shuffleCups(mixCount);
	 }, 2000); // Ждём 2 секунды, пока стаканы точно опустятся
 }
 
 function shuffleCups(count) {
	 if (count === 0) {
		 enableSelection();
		 return;
	 }
 
	 let newPositions = [...positions];
	 do {
		 newPositions.sort(() => Math.random() - 0.5);
	 } while (JSON.stringify(newPositions) === JSON.stringify(positions));
 
	 // Двигаем стаканы и шарик одновременно
	 cups.forEach((cup, index) => {
		 let moveX = newPositions[index] - positions[index];
		 cup.style.transition = `transform ${animationDuration}s ease-in-out`;
		 cup.style.transform = `translateX(${moveX}px)`;
	 });
 
	 ball.style.transition = `transform ${animationDuration}s ease-in-out`;
	 ball.style.transform = `translateX(${newPositions[ballPosition]}px)`;
 
	 setTimeout(() => {
		 cups.forEach((cup, index) => {
			 // Устанавливаем новые позиции
			 cup.style.left = `${newPositions[index]}px`;
			 cup.style.transition = "none"; // Отключаем transition временно
			 cup.style.transform = "translateX(0)"; // Сбрасываем transform
		 });
 
		 ball.style.transform = `translateX(${newPositions[ballPosition]}px)`;
		 positions = [...newPositions]; // Обновляем глобальные позиции
 
		 setTimeout(() => shuffleCups(count - 1), 800); // Следующий раунд
	 }, animationDuration * 1000);
 }
 
 function enableSelection() {
	 cups.forEach(cup => {
		 cup.addEventListener("click", revealCup);
		 cup.style.cursor = "pointer";
	 });
 }
 
 function revealCup(event) {
	 let selectedCup = event.currentTarget;
	 let selectedIndex = Array.from(cups).indexOf(selectedCup);
 
	 selectedCup.style.transform = "translateY(-50px)";
 
	 setTimeout(() => {
		 if (selectedIndex === ballPosition) {
			 alert("Поздравляю! Ты нашёл шарик!");
			 increaseDifficulty(); // Увеличиваем сложность при правильном ответе
			 updateScore(); // Увеличиваем счёт
		 } else {
			 alert("Не угадал! Попробуй снова.");
		 }
		 restartButton.style.display = "block";
	 }, 500);
 
	 cups.forEach(cup => cup.removeEventListener("click", revealCup));
 }
 
 function increaseDifficulty() {
	 // Каждые 10 очков уменьшаем длительность анимации на 10%
	 if (score % 10 === 0 && score !== 0) {
		 animationDuration = Math.max(0.2, animationDuration * 0.9); // Уменьшение на 10%, минимум 0.2 сек
		 mixCount += 1; // Увеличиваем число перемешиваний каждые 10 очков
	 }
 }
 
 function updateScore() {
	 score += 1;
	 scoreElement.textContent = score; // Обновляем текст счётчика
 }
 
 restartButton.addEventListener("click", () => {
	 cups.forEach(cup => {
		 cup.style.transform = "translateY(0)";
	 });
	 startGame();
 });
 
 startGame();
 
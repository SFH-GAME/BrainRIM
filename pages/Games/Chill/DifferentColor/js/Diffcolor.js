const pauseAlert = document.querySelector(".pause-alert");
const grid = document.querySelector(".grid");
const scoreDisplay = document.querySelector("#score span");
const timerDisplay = document.querySelector("#timer span");

let level = 2; // Начальный размер сетки
let score = 0; // Счётчик очков
const maxLevel = 6; // Максимальный размер сетки
let timeLeft = 5; // Время в секундах
let timer; // Хранит setInterval
let highScore = localStorage.getItem("highScore") || 0; // Рекорд
let lastClickTime = Date.now(); // Время последнего клика
let colorDifficulty = 40; // Начальная сложность различия цветов
let isPaused = false; // Флаг паузы

generateGrid();
startTimer();

function generateGrid() {
    grid.innerHTML = "";
    grid.style.gridTemplateColumns = `repeat(${level}, 50px)`;
    grid.style.transform = "scale(1.1)";
    setTimeout(() => grid.style.transform = "scale(1)", 300);

    let baseColor = getRandomColor();
    let diffColor = changeColor(baseColor, colorDifficulty); // Усложнение оттенка
    let diffIndex = Math.floor(Math.random() * (level * level));

    for (let i = 0; i < level * level; i++) {
        let div = document.createElement("div");
        div.classList.add("square");
        div.style.background = i === diffIndex ? diffColor : baseColor;
        div.onclick = () => checkChoice(i === diffIndex);
        grid.appendChild(div);
    }

    // Обновляем счёт и таймер на экране
    scoreDisplay.textContent = score;
    timerDisplay.textContent = timeLeft;
    lastClickTime = Date.now(); // Запоминаем время создания сетки
}

function checkChoice(isCorrect) {
    if (isCorrect && !isPaused) {
        score++;
        
        // Увеличиваем уровень КАЖДЫЕ 5 очков
        if (score % 5 === 0 && level < maxLevel) {
            level++;
            animateGridChange(); // Запускаем анимацию смены уровня
        } else {
            generateGrid();
        }
        
        // Каждые 10 правильных ответов усложняем различие оттенка
        if (score % 10 === 0 && colorDifficulty > 5) {
            colorDifficulty -= 5;
        }
        
        resetTimer(); // Сбрасываем таймер на 5 секунд после каждого правильного ответа
    } else if (!isPaused) {
        gameOver();
    }
}

function animateGridChange() {
    document.querySelectorAll(".square").forEach(square => {
        square.classList.add("hidden"); // Анимация исчезновения
    });

    setTimeout(() => {
        generateGrid(); // Создаём новую сетку после исчезновения старой
    }, 300);
}

function startTimer() {
    const timerDisplay = document.querySelector("#timer span");
    clearInterval(timer); // Очищаем предыдущий таймер
    timer = setInterval(() => {
        if (!isPaused) {
            timeLeft--;
            timerDisplay.textContent = timeLeft;
            if (timeLeft <= 0) gameOver(); // Если время закончилось – конец игры
        }
    }, 1000);
}

function resetTimer() {
    timeLeft = 5// Обновляем время до 5 сек
    const timerDisplay = document.querySelector("#timer span");
    timerDisplay.textContent = timeLeft;
    clearInterval(timer);
    startTimer(); // Запускаем таймер заново
}

function togglePause() {
    const grid = document.querySelector(".grid");
    isPaused = !isPaused;
    if (isPaused) {
        grid.style.filter = "blur(40px)"; // Размытие сетки
		pauseAlert.style = 'display: flex;';
    } else {
        grid.style.filter = "none";
		pauseAlert.style = 'display: none;';
    }
}

document.querySelector(".pause-button").addEventListener("click", togglePause);

function gameOver() {
    clearInterval(timer);
    let message = `Время вышло! Итоговый счёт: ${score}`;
    
    // Проверяем рекорд
    if (score > highScore) {
        highScore = score;
        localStorage.setItem("highScore", highScore);
        message += `\n🎉 Новый рекорд: ${highScore} очков!`;
    }
    
    alert(message);
    level = 2;
    score = 0;
    timeLeft = 5;
    colorDifficulty = 40; // Сбрасываем сложность различения цвета
    isPaused = false;
    generateGrid();
    startTimer();
}

function getRandomColor() {
    let r = rand(100, 255);
    let g = rand(100, 255);
    let b = rand(100, 255);
    return `rgb(${r}, ${g}, ${b})`;
}

function changeColor(color, amount) {
    let rgb = color.match(/\d+/g);
    let r = Math.min(255, Math.max(0, parseInt(rgb[0]) - amount));
    let g = Math.min(255, Math.max(0, parseInt(rgb[1]) - amount));
    let b = Math.min(255, Math.max(0, parseInt(rgb[2]) - amount));
    return `rgb(${r}, ${g}, ${b})`;
}

function rand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}




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
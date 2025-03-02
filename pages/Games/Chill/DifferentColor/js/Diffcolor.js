let level = 2; // Начальный размер сетки
let score = 0; // Счётчик очков
const maxLevel = 6; // Максимальный размер сетки
let timeLeft = 5; // Время в секундах
let timer; // Хранит setInterval
let highScore = localStorage.getItem("highScore") || 0; // Рекорд
let lastClickTime = Date.now(); // Время последнего клика

generateGrid();
startTimer();

function generateGrid() {
    const grid = document.querySelector(".grid");
    const scoreDisplay = document.querySelector("#score span");
    grid.innerHTML = "";
    grid.style.gridTemplateColumns = `repeat(${level}, 50px)`;
    grid.style.transform = "scale(1.1)";
    setTimeout(() => grid.style.transform = "scale(1)", 300);

    let baseColor = getRandomColor();
    let diffColor = changeColor(baseColor, 20); // Немного изменить цвет
    let diffIndex = Math.floor(Math.random() * (level * level));

    for (let i = 0; i < level * level; i++) {
        let div = document.createElement("div");
        div.classList.add("square");
        div.style.background = i === diffIndex ? diffColor : baseColor;
        div.onclick = () => checkChoice(i === diffIndex);
        grid.appendChild(div);
    }

    // Обновляем счёт
    scoreDisplay.textContent = score;
    lastClickTime = Date.now(); // Запоминаем время создания сетки
}

function checkChoice(isCorrect) {
    if (isCorrect) {
        score++;
        
        // Добавляем 1 секунду к таймеру за правильный ответ
        timeLeft += 1;

        // Увеличиваем уровень КАЖДЫЕ 5 очков
        if (score % 5 === 0 && level < maxLevel) {
            level++;
            animateGridChange(); // Запускаем анимацию смены уровня
        } else {
            generateGrid();
        }

        // Перезапускаем таймер, но не сбрасываем время
        clearInterval(timer);
        startTimer();
    } else {
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
        timeLeft--;
        timerDisplay.textContent = timeLeft;
        if (timeLeft <= 0) gameOver(); // Если время закончилось – конец игры
    }, 1000);
}

function resetTimer() {
    timeLeft = 5; // Обновляем время до 5 сек
    startTimer(); // Запускаем таймер заново
}

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

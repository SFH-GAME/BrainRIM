let settings = document.querySelector(".pop-up__container");
let comeback = document.querySelector(".pop-up__container2");
let restart = document.querySelector(".pop-up__container3");

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


const gameContainer = document.querySelector(".game-container");
const bestResBody = document.querySelector(".best-res__value");
const timerCountResultsValue = document.querySelector(".time-count");
const enemyCountResultsValue = document.querySelector(".moves-count");
const bestTimerCountResultsValue = document.querySelector(".best-time-count");
const bestEnemyCountResultsValue = document.querySelector(".best-moves-count");
const winOrLooseResultsValue = document.querySelector(".loose-win-value");
const score = document.querySelector("#score-num");
const BUTTON_START = document.querySelector('.button-start');
const livesCounter = document.getElementById("lives-count");
const timerDisplay = document.getElementById("timer");

let timerCount = 0;
let enemiesPassedCount = 0;
let isGameOver = false;
let enemySpeed = 3;
let enemyInterval = 1500;
let maxEnemies = 16;
let currentEnemies = 0;
let enemyIntervalId = null;

let winForResults = 0;
let looseForResults = 0;
let statusLoosOrWin = "";

let playerLives = 1; // Количество жизней
let isSpeedBoostActive = false; // Флаг замедления врагов
const boostTypes = ["heart", "boost-container"]; // Доступные бусты


// Функция для AJAX-запроса
function sendAjaxRequest(url, data) {
   $.ajax({
      url: url,
      type: 'POST',
      dataType: "json",
      data: data,
      success: function (response) {
         console.log(response);
      },
      error: function () {
         console.log('Ошибка AJAX запроса:', url);
      }
   });
}

// Функция обновления опыта
function updateExperience() {
   sendAjaxRequest('/dataBase/controllers/bonusSystem/experience.php', {
      expUpForModeAjax: statusLoosOrWin === "win" ? 15 : 2
   });
}

// Бонус за победу
function updateWinBonus() {
   sendAjaxRequest('/dataBase/controllers/bonusSystem/bonusForWin.php', { IqUpForModeAjax: 15 });
}

// Бонус за проигрыш
function updateLooseBonus() {
   sendAjaxRequest('/dataBase/controllers/bonusSystem/bonusForLoose.php', { IqUpForModeAjax: 2 });
}

// Сохранение результатов игры
function saveGameResults() {
   sendAjaxRequest('/dataBase/resultsGames/resultsRuningGame.php', {
      win: winForResults,
      loose: looseForResults,
      time_sec: timerCount,
      enemiesPassed: enemiesPassedCount
   });
}

// Движение игрока, cмещение относительно элемента игрока
let offsetX = 0;
let offsetY = 0;

function movePlayerStart(event) {
   if (!event.touches.length) return;
   const touch = event.touches[0];
   const playerRect = player.getBoundingClientRect();
   // Вычисляем смещение между точкой касания и верхним левым углом игрока
   offsetX = touch.clientX - playerRect.left;
   offsetY = touch.clientY - playerRect.top;
}

function movePlayer(event) {
   if (!event.touches.length) return;
   const touch = event.touches[0];
   const x = touch.clientX - offsetX; // Учитываем смещение
   const y = touch.clientY - offsetY; // Учитываем смещение
   const horizontalLimit = gameContainer.clientWidth - player.clientWidth;
   const verticalLimit = gameContainer.clientHeight - player.clientHeight;
   if (x > 0 && x < horizontalLimit && y > 0 && y < verticalLimit) {
      player.style.left = `${x}px`;
      player.style.top = `${y}px`;
   }
}

// Добавляем обработчик для определения начального смещения
player.addEventListener("touchstart", movePlayerStart);
gameContainer.addEventListener("touchmove", movePlayer);

// Создание врагов
function createEnemy() {
   if (currentEnemies >= maxEnemies || isGameOver) return;

   const enemy = document.createElement("div");
   enemy.classList.add("enemy");
   enemy.style.left = `${Math.random() * (gameContainer.clientWidth - 20)}px`;
   gameContainer.appendChild(enemy);
   moveEnemy(enemy);
   currentEnemies++;
}

// Движение врагов
function moveEnemy(enemy) {
    let enemyMoveInterval = setInterval(() => {
        if (isGameOver || !enemy.parentElement) {
            clearInterval(enemyMoveInterval);
            return;
        }

        const playerPosition = player.getBoundingClientRect();
        const enemyPosition = enemy.getBoundingClientRect();

        if (checkCollision(playerPosition, enemyPosition)) {
            handleEnemyCollision(enemy, enemyMoveInterval);
        } else if (enemyPosition.top >= gameContainer.clientHeight) {
            removeEnemy(enemy, enemyMoveInterval);
        } else {
            enemy.style.top = `${enemyPosition.top + enemySpeed}px`;
        }
    }, 20);
}

// Проверка столкновения
function checkCollision(rect1, rect2) {
    return (
        rect1.bottom >= rect2.top &&
        rect1.top <= rect2.bottom &&
        rect1.right >= rect2.left &&
        rect1.left <= rect2.right
    );
}

// Обработка столкновения с игроком
function handleEnemyCollision(enemy, interval) {
    if (playerLives > 1) {
        playerLives--;
        updateLivesDisplay();
        console.log(`💥 Потеря жизни! Осталось жизней: ${playerLives}`);
    } else {
        gameOver();
    }
    clearInterval(interval);
    enemy.remove();
}

// Удаление врага при выходе за пределы экрана
function removeEnemy(enemy, interval) {
    enemy.remove();
    clearInterval(interval);
    enemiesPassedCount++;
    updateScore();
    currentEnemies--;
}


// Обновление счета
function updateScore() {
   score.innerHTML = `${enemiesPassedCount}`;
}

// Повышение сложности
function increaseDifficulty() {
   if (timerCount > 0 && timerCount % 10 === 0) {
      enemySpeed += 1.5;
      if (enemyInterval > 400) {
         enemyInterval -= 400;
         clearInterval(enemyIntervalId);
         enemyIntervalId = setInterval(createEnemy, enemyInterval);
      }
      maxEnemies += 2;
   }
}

// Начало игры
function startGame() {
   isGameOver = false;
   timerCount = 0;
   enemiesPassedCount = 0;
   enemySpeed = 3;
   enemyInterval = 1500;
   maxEnemies = 16;
   updateScore();
   updateLivesDisplay(); // Обновляем жизни
   updateTimerDisplay(); // Обновляем таймер на старте

   player.style.left = "50%";
   player.style.top = "90%";

   let gameTimer = setInterval(() => {
      if (isGameOver) {
         clearInterval(gameTimer);
         return;
      }
      timerCount++;
	  updateTimerDisplay(); // Отображение таймера
	  increaseDifficulty();
  }, 1000);

   enemyIntervalId = setInterval(createEnemy, enemyInterval);
   createEnemy();
}

// Конец игры
function gameOver() {
   isGameOver = true;
   clearInterval(enemyIntervalId);
   enemySpeed = 0;
   showMessageLoose();
   statusLoosOrWin = "loose";
   looseForResults = 1;
   updateLooseBonus();
   updateExperience();
   saveGameResults();
}

// Отображение результатов
function showMessageLoose() {
   ResultsGameOver.style.display = 'block';
   timerCountResultsValue.innerHTML = timerCount;
   enemyCountResultsValue.innerHTML = enemiesPassedCount;
   bestTimerCountResultsValue.innerHTML = bestTimeRes;
   bestEnemyCountResultsValue.innerHTML = bestEnemiesPassedRes;

   if (comparisonResBetterOrNot()) {
      winOrLooseResultsValue.classList.add('congrats');
      winOrLooseResultsValue.innerHTML = 'Вы победили!';
      statusLoosOrWin = "win";
      winForResults = 1;
      updateWinBonus();
      updateExperience();
      saveGameResults();
   } else {
      winOrLooseResultsValue.classList.add('loose');
      winOrLooseResultsValue.innerHTML = 'Вы проиграли!';
   }
}

// Проверка результата
function comparisonResBetterOrNot() {
   return enemiesPassedCount > bestEnemiesPassedRes;
}

// Обработчик нажатия кнопки "Старт"
BUTTON_START.onclick = function () {
   document.querySelector('.start-menu').classList.add('activated');
   BUTTON_START.classList.add('activated');
   if (BUTTON_START.classList.contains('activated')) {
      startGame();
   }
};

gameContainer.addEventListener("touchmove", movePlayer);







function createBoost() {
    if (isGameOver) return;

    const boost = document.createElement("div");
    const boostType = boostTypes[Math.floor(Math.random() * boostTypes.length)];
    boost.classList.add("boost", boostType);

    if (boostType === "boost-container") {
        for (let i = 0; i < 3; i++) {
            const triangle = document.createElement("div");
            triangle.classList.add("triangle");
            boost.appendChild(triangle);
        }
    }

    // Начальная позиция (случайно по ширине, но сверху)
    boost.style.left = `${Math.random() * (gameContainer.clientWidth - 50)}px`;
    boost.style.top = `-50px`; // Начинает падение сверху

    gameContainer.appendChild(boost);

	let fallSpeed = Math.random() * 1 + 1.8; // Скорость падения (рандом от 1 до 1.8 пикселей)

	function fall() {
        if (isGameOver || !boost.parentElement) return;

        let currentTop = parseFloat(boost.style.top);
        boost.style.top = `${currentTop + fallSpeed}px`;

        if (currentTop < gameContainer.clientHeight) {
            requestAnimationFrame(fall);
        } else {
            boost.remove(); // Удаляем буст, если он упал за границы
        }
    }

    requestAnimationFrame(fall);

    // Буст исчезает через 10 секунд, если не был подобран
    setTimeout(() => {
        if (boost.parentElement) {
            boost.remove();
        }
    }, 10000);
}

// Проверка столкновения игрока с бустами
function checkBoostCollision() {
    const boosts = document.querySelectorAll(".boost");
    boosts.forEach(boost => {
        const playerPosition = player.getBoundingClientRect();
        const boostPosition = boost.getBoundingClientRect();

        if (
            playerPosition.bottom >= boostPosition.top &&
            playerPosition.top <= boostPosition.bottom &&
            playerPosition.right >= boostPosition.left &&
            playerPosition.left <= boostPosition.right
        ) {
            if (boost.classList.contains("heart")) {
                applyHeartBoost();
            } else if (boost.classList.contains("boost-container")) {
                applySpeedBoost();
            }
            if (boost.parentElement) {
                boost.remove(); // Удаляем буст после подбора
            }
        }
    });
}

function applyHeartBoost() {
    playerLives++;
    console.log(`❤️ Дополнительная жизнь! Жизни: ${playerLives}`);
    updateLivesDisplay(); // Обновляем отображение
}

// Вызов при старте игры для начального обновления
updateLivesDisplay();

let speedBoostDuration = 0; // Общее время активного замедления
let speedBoostTimers = []; // Хранение таймеров

function applySpeedBoost() {
    if (!isSpeedBoostActive) {
        isSpeedBoostActive = true;
        enemySpeed /= 2; // Замедляем врагов
        console.log("🐢 Враги замедлены!");
    }

    speedBoostDuration += 5000; // Увеличиваем общее время
    console.log(`⏳ Продлено замедление: ${speedBoostDuration / 1000} сек.`);

    // Создаём таймер для конкретного буста
    const boostTimer = setTimeout(() => {
        speedBoostDuration -= 5000; // Уменьшаем общее время

        if (speedBoostDuration <= 0) {
            enemySpeed *= 2; // Возвращаем скорость врагов
            isSpeedBoostActive = false;
            console.log("⏳ Время замедления закончилось!");
        }
    }, 5000);

    speedBoostTimers.push(boostTimer);
}

// Функция для случайного времени спавна буста (от 5 до 30 секунд)
function spawnBoostWithRandomInterval() {
    createBoost();
    const randomInterval = Math.random() * (30000 - 5000) + 5000; // От 5 до 30 секунд
    setTimeout(spawnBoostWithRandomInterval, randomInterval);
}

// Запуск случайного спавна бустов
setTimeout(spawnBoostWithRandomInterval, Math.random() * (30000 - 5000) + 5000);

// Добавляем проверку на подбор бустов при каждом движении игрока
gameContainer.addEventListener("touchmove", checkBoostCollision);

// Функция обновления жизней на экране
function updateLivesDisplay() {
    livesCounter.textContent = playerLives;
}


// Функция обновления таймера на экране
function updateTimerDisplay() {
    timerDisplay.textContent = timerCount;
}
// Вызываем обновление при старте игры
updateTimerDisplay();
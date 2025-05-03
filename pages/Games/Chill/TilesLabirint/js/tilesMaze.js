const board = document.getElementById('game-board');
const levelTimerElement = document.getElementById('level-timer');
const totalTimerElement = document.getElementById('total-timer');
const levelElement = document.getElementById('level');
const messageElement = document.getElementById('message');

let gridSize = 2; // Starting grid size
let path = [];
let selectedTiles = new Set();
let levelTime = 40; // время на один уровень
let totalTime = 0; // общее время для всей игры
let currentLevel = 1; // Current level number
let levelTimer;
let totalTimer;
let gameOver = false;
let score = 0;
let time_sec = 0;

// Объявление объекта results
let results = {};

const game = {
   start: function () {
      startGame();  // Запуск игры
   }
};

function generateMaze(size) {
   board.innerHTML = '';
   board.style.gridTemplateColumns = `repeat(${size}, 1fr)`;
   const totalTiles = size * size;
   path = [];
   selectedTiles.clear();
   for (let i = 0; i < totalTiles; i++) {
      const tile = document.createElement('div');
      tile.classList.add('tile');
      tile.addEventListener('click', () => handleTileClick(i));
      board.appendChild(tile);
   }
   createPath(size);
   showPathPreview();
}

function calculateLevelTime(level) {
   // Уменьшение времени от 40 до 7 секунд по мере роста уровня
   let time = 40 - (level - 1) * 3; // уменьшаем по 2 сек за уровень
   return Math.max(7, time); // минимально 7 секунд
}


function createPath(size) {
   let x = 0, y = 0;
   path.push(0);
   while (x < size - 1 || y < size - 1) {
      if (x < size - 1 && (y === size - 1 || Math.random() > 0.5)) {
         x++;
      } else {
         y++;
      }
      path.push(y * size + x);
   }
   console.log('Path:', path); // Debugging purposes
}

function showPathPreview() {
   const tiles = document.querySelectorAll('.tile');
   path.forEach(index => tiles[index].classList.add('preview'));
   setTimeout(() => {
      path.forEach(index => tiles[index].classList.remove('preview'));
      enableTiles();
      startLevelTimer(); // Start level timer only after preview ends
   }, 2000); // Show path for 2 seconds
}

function enableTiles() {
   const tiles = document.querySelectorAll('.tile');
   tiles.forEach(tile => tile.style.pointerEvents = 'auto');
}

function handleTileClick(index) {
   const tiles = document.querySelectorAll('.tile');
   if (path.includes(index) && !selectedTiles.has(index)) {
      tiles[index].classList.add('correct');
      selectedTiles.add(index);
      if (selectedTiles.size === path.length) {
         clearInterval(levelTimer); // Остановить таймер уровня
         setTimeout(() => {
            messageElement.style.visibility = 'visible';
            setTimeout(() => {
               messageElement.style.visibility = 'hidden';
               nextLevel();
            }, 2000);
         }, 300);
      }
   } else if (!path.includes(index)) {
      tiles[index].classList.add('incorrect');
      endGame(); // Завершаем игру при неверном ответе
   }
}

function resetMaze() {
   setTimeout(() => {
      clearInterval(levelTimer); // Остановить текущий таймер уровня
      levelTime = 40; // Сбросить время уровня
      levelTimerElement.textContent = `Осталось: ${levelTime} сек.`; // Обновить отображение времени

      generateMaze(gridSize);
      selectedTiles.clear();

      startLevelTimer(); // Запуск нового таймера уровня
   }, 500);
}
function startLevelTimer() {
   clearInterval(levelTimer); // Очистка предыдущего таймера, если он существует
   levelTimer = setInterval(() => {
      levelTime--;
      levelTimerElement.textContent = `Осталось: ${levelTime} сек.`;
      if (levelTime <= 0) {
         endGame(); // Заканчиваем игру, если время на уровне закончилось
      }
   }, 1000);
}

function startTotalTimer() {
   totalTimer = setInterval(() => {
      totalTime++;
   }, 1000);
}

function endGame() {
   if (!gameOver) {
      gameOver = true;

      // Подсчёт уровня и времени
      let level = currentLevel;
      time_sec = totalTime;

      // Условная награда за игру
      let reward = {
         iq: Math.floor(level * 1.2),
         exp: Math.floor(level * 1.5),
         money: level >= 8 ? Math.floor((level - 7) / 3) : 0,
         hints: level >= 8 ? Math.floor((level - 7) / 2) : 0
      };

      clearInterval(levelTimer);
      clearInterval(totalTimer);

      // Функция для обновления объекта results
      function updateResults() {

         results = {
            difficulty: undefined, // Пример сложности 'Средний'
            activity_type: 'upgrade', // 'upgrade' или 'rest'
            upgrade: 'Память', // Пример улучшения
            exp: reward.exp,
            money: reward.money,
            hints: reward.hints,
            iq: reward.iq,
            enemies: undefined,
            time: { min: Math.floor(time_sec / 60), sec: time_sec % 60 },
            score: undefined,
            level: currentLevel,
            moves: undefined,
            best_enemies: undefined,
            best_time: { min: Math.floor(bestTimeRes / 60), sec: bestTimeRes % 60 },
            best_score: undefined,
            best_level: bestLevelRes,
            best_moves: undefined
         };
      }
      updateResults();//обновляем результаты
      showResults();


      animateCountUpWhenVisible('.money');
      animateCountUpWhenVisible('.hints');
      animateCountUpWhenVisible('.iq');
      animateCountUpWhenVisible('.exp');

      // Отправка данных на сервер
      sendGameResults(time_sec, level, reward);

   }
}

function sendGameResults(time_sec, level, reward) {
   $.ajax({
      url: '/dataBase/resultsGames/resultsMazeGame.php',
      type: 'POST',
      dataType: 'json',
      data: {
         win: 0,
         loose: 0,
         time_sec: time_sec,
         level: level
      },
      success: function (data) {
         console.log('Результат отправлен:', data);
      },
      error: function () {
         console.log('Ошибка отправки результата');
      }
   });

   //обновляем Опыт в базе
   $.ajax({
      url: '/dataBase/controllers/bonusSystem/experience.php',
      type: 'POST',
      dataType: 'json',
      data: {
         expUpForModeAjax: reward.exp
      },
      success: function (data) {
         console.log('Exp:', data);
      },
      error: function () {
         console.log('Ошибка отправки опыта');
      }
   });

   //обновляем IQ в базе
   $.ajax({
      url: '/dataBase/controllers/bonusSystem/iqIncrease.php',
      type: 'POST',
      dataType: 'json',
      data: {
         IqUpForModeAjax: reward.iq
      },
      success: function (data) {
         console.log('IQ:', data);
      },
      error: function () {
         console.log('Ошибка отправки IQ');
      }
   });

   //обновляем HINTS в базе
   $.ajax({
      url: '/dataBase/controllers/bonusSystem/HintsIncrease.php',
      type: 'POST',
      dataType: 'json',
      data: {
         HintsUpForModeAjax: reward.hints
      },
      success: function (data) {
         console.log('hints:', data);
      },
      error: function () {
         console.log('Ошибка отправки IQ');
      }
   });
   //обновляем HINTS в базе
   $.ajax({
      url: '/dataBase/controllers/bonusSystem/MoneyIncrease.php',
      type: 'POST',
      dataType: 'json',
      data: {
         MoneyUpForModeAjax: reward.money
      },
      success: function (data) {
         console.log('hints:', data);
      },
      error: function () {
         console.log('Ошибка отправки IQ');
      }
   });
}

function restartGame() {
   location.reload();
}

function startGame() {
   levelTime = calculateLevelTime(currentLevel);
   generateMaze(gridSize);
   startTotalTimer(); // Start total timer at the beginning of the game
}


function nextLevel() {
   levelTime = calculateLevelTime(currentLevel); // Reset level time
   if (gridSize < 8) { // Ограничение размера сетки
      gridSize++;
   }
   currentLevel++;
   levelElement.textContent = `Уровень: ${currentLevel}`;
   generateMaze(gridSize);
}



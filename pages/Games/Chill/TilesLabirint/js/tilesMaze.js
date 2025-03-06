// логика для всплывающих окон
let settings = document.querySelector(".pop-up__container");
let comeback = document.querySelector(".pop-up__container2");
let restart = document.querySelector(".pop-up__container3");

// результаты 
let ResultsGameOver = document.querySelector(".results-gameover");
const gameContainer = document.querySelector(".game-container");
const bestResBody = document.querySelector(".best-res__value");
const timerCountResultsValue = document.querySelector(".time-count");
const levelCountResultsValue = document.querySelector(".level-count");
const bestTimerCountResultsValue = document.querySelector(".best-time-count");
const bestlevelCountResultsValue = document.querySelector(".best-level-count");
const winOrLooseResultsValue = document.querySelector(".loose-win-value");



//AJAX запрос на сервер для добавления в базу данных инфы 
let winForResults = 0;
let looseForResults = 0;
let statusLoosOrWin;

function doAjaxExperience() {
   let expUpForModeAjax;
   if (statusLoosOrWin == "win") {//проверка на победу или луз
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
   let win = `0`;
   let loose = `1`;
   let time_sec = `${totalTime}`;
   let level = `${currentLevel}`;

   $.ajax({
      url: '/dataBase/resultsGames/resultsMazeGame.php',
      type: 'POST',
      dataType: "json",
      data: {
         win: win,
         loose: loose,
         time_sec: time_sec,
         level: level,
      },
      success: function (data) {
         console.log(data);
      },
      error: function () {
         console.log('ERRORчик');
      }
   })
}
//z

function comparisonResBetterOrNot() {//возвращает правду или ложь
   if (game.score > bestScoreRes) {
      return true;
   } else {
      return false;
   }
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
        clearInterval(levelTimer);
        clearInterval(totalTimer);
        gameOver = true;
        showMessageLoose();
    }
}

function restartGame() {
   location.reload();
}

function startGame() {
   generateMaze(gridSize);
   startTotalTimer(); // Start total timer at the beginning of the game
}


//показывает результаты
function showMessageLoose() {
   ResultsGameOver.style = 'display:block;';
   timerCountResultsValue.innerHTML = totalTime;
   levelCountResultsValue.innerHTML = currentLevel;
   //bestTimerCountResultsValue.innerHTML = bestTimeRes;//из базы данных
   //bestlevelCountResultsValue.innerHTML = bestEnemiesPassedRes;
   doAjaxResults();
   if (comparisonResBetterOrNot() == true) {//если результат лучше
      winOrLooseResultsValue.classList.add('congrats');
      winOrLooseResultsValue.innerHTML = 'вы победили';
      doAjaxWinBonuse();
      statusLoosOrWin = "win";
      winForResults = 1;
      doAjaxWinBonuse();
      doAjaxExperience();

   } else {
      winOrLooseResultsValue.classList.add('loose');
      winOrLooseResultsValue.innerHTML = 'вы проиграли';
   }
}
function comparisonResBetterOrNot() {//возвращает правду или ложь
   //if (enemiesPassedCount > bestEnemiesPassedRes) {
   //   return true;
   //} else {
   //   return false;
   //}
}


//активация кнопки старт при нажатии
const BUTTON_START = document.querySelector('.button-start');
BUTTON_START.onclick = function () {
   document.querySelector('.start-menu').classList.add('activated');
   BUTTON_START.classList.add('activated');
   if (BUTTON_START.classList.contains('activated')) {
      startGame();

   }
}


function nextLevel() {
	levelTime = 40; // Reset level time
	if (gridSize < 8) { // Ограничение размера сетки
	   gridSize++;
	}
	currentLevel++;
	levelElement.textContent = `Уровень: ${currentLevel}`;
	generateMaze(gridSize);
 }



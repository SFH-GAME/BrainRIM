//звук 
let audioClick = new Audio('/pages/main-page/sounds/mixkit-modern-click-box-check-1120.wav');
let audioSwapeLeftRight = new Audio('/sound/korotkiy-moschnyiy-zamah.mp3');
let audioSwapeTopBottom = new Audio('/sound/zvuk-kogda-razrubili-vozduh.mp3');

let settings = document.querySelector(".pop-up__container");
let comeback = document.querySelector(".pop-up__container2");
let restart = document.querySelector(".pop-up__container3");
const resultContainer = document.querySelector('.results-container');
const timerCountResultsValue = document.querySelector(".time-count");
const scoreResultsValue = document.querySelector(".moves-count");
const bestTimerCountResultsValue = document.querySelector(".best-time-count");
const bestScoreCountResultsValue = document.querySelector(".best-moves-count");
const winOrLooseResultsValue = document.querySelector(".loose-win-value");
const bestResultGameContainerValue = document.querySelector(".value-best");
let timerCount = 0;

let leaderboardButton = document.querySelector(".leaderboard-button");
let leaderboarBackdButton = document.querySelector(".leaderboard__back-button");
let leaderboardContainer = document.querySelector(".leaderboard-container");

//AJAX запрос на сервер для добавления в базу данных инфы 
let winForResults = 0;
let looseForResults = 0;
let statusLoosOrWin;



// Объявление объекта results
let results = {};

// Функция для обновления объекта results
function updateResults() {
   results = {
      difficulty: 'Средний', // Пример сложности
      activity_type: 'upgrade', // 'upgrade' или 'rest'
      upgrade: 'Память', // Пример улучшения
      exp: '+50',
      money: '100',
      hints: '3',
      iq: '15',
      enemies: undefined,
      time: { sec: timerCount % 60, min: Math.floor(timerCount / 60) },
      score: game.score,
      level: undefined,
      moves: undefined,
      best_enemies: undefined,
      best_time: { sec: bestTimeRes % 60, min: Math.floor(bestTimeRes / 60) },
      best_score: bestScoreRes,
      best_level: undefined,
      best_moves: undefined
   };
}

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
//z


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




function comparisonResBetterOrNot() {//возвращает правду или ложь
   if (game.score > bestScoreRes) {
      return true;
   } else {
      return false;
   }
}

let isResultSent = false; // Флаг для предотвращения дублирования

var game = {
   mydata: [],     // Добавляем атрибут mydata для хранения игровых данных
   score: 0,	  	   // Добавляем атрибут оценки
   gameover: 0,	    // Добавляем состояние в конце игры 
   gamerrunning: 1,	     // Добавляем состояние, когда игра запущена
   status: 1,		      // Добавляем состояние игры
   start: function () {      // Устанавливаем метод при запуске игры
      this.status = this.gamerrunning;
      this.score = 0;
      this.mydata = [];
      for (var r = 0; r < 4; r++) {  // Добавьте число 0 к переменной цикла массива mydata, чтобы сделать его двумерным массивом
         this.mydata[r] = [];
         for (var c = 0; c < 4; c++) {
            this.mydata[r][c] = 0;
         }
      }
      this.randomNum();    // Число 2/4 генерируется случайным образом в начале игры
      this.randomNum();
      this.dataView();     // Выполняем функцию dataView, когда игра начинает передавать обновление данных на страницу, обновляем данные на странице
      // console.log(this.mydata);
      //timer
      const gameTimer = setInterval(() => {
         timerCount++;
      }, 1000);
   },

   randomNum: function () {       // Метод генерации случайных чисел и присвоения начального случайного числа mydata
      for (; ;) {                     // Циклу for здесь нельзя задать фиксированное условие, потому что конечное условие не может быть известно, когда игра запущена, и он может работать только последовательно
         var r = Math.floor(Math.random() * 4);      // Задаем случайную величину и пусть это будет координата, в которой число появляется случайным образом
         var c = Math.floor(Math.random() * 4);
         if (this.mydata[r][c] == 0) {               // Если значение в текущей координате в данных равно 0 или пусто, вставляем случайное число 2 или 4
            var num = Math.random() > 0.5 ? 2 : 4;     // Установленное случайное число 2 или 4 имеет одинаковый шанс выпадения, наполовину открыто
            this.mydata[r][c] = num;
            break;
         }
      }
   },


   dataView: function () {      // Метод передачи данных на страницу и контроль смены стиля
      for (var r = 0; r < 4; r++) {
         for (var c = 0; c < 4; c++) {
            var div = document.getElementById("c" + r + c);
            if (this.mydata[r][c] == 0) {
               div.innerHTML = "";
               div.className = "cell";
            }
            else {
               div.innerHTML = this.mydata[r][c];
               div.className = 'cell n' + this.mydata[r][c];
            }
         }
      }
      document.getElementById('score01').innerHTML = this.score;
      bestResultGameContainerValue.innerHTML = bestScoreRes;

      // При завершении игры
      if (this.status == this.gameover && !isResultSent) {
         /* isResultSent = true; // Устанавливаем флаг, чтобы не отправлять запрос повторно
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
          }*/
         resultContainer.style = "display: block;";
         doAjaxResults();



         // Обновляем объект results с актуальными данными
         updateResults();
         showResults();
      }
   },

   isgameover: function () {
      for (var r = 0; r < 4; r++) {
         for (var c = 0; c < 4; c++) {
            if (this.mydata[r][c] == 0) {
               return false;
            }
            if (c < 3) {
               if (this.mydata[r][c] == this.mydata[r][c + 1]) {
                  return false;
               }
            }
            if (r < 3) {
               if (this.mydata[r][c] == this.mydata[r + 1][c]) {
                  return false;
               }
            }
         }
      }
      return true;
   },

   //Движение влево
   moveLeft: function () {
      //audioSwapeLeftRight.play();
      var before = String(this.mydata);
      for (var r = 0; r < 4; r++) {
         this.moveLeftInRow(r);
      }
      var after = String(this.mydata);
      if (before != after) {
         this.randomNum();
         if (this.isgameover()) {
            this.status = this.gameover;
         }
         this.dataView();
      }
   },

   moveLeftInRow: function (r) {
      for (var c = 0; c < 3; c++) {
         var nextc = this.getNEXTinRow(r, c);
         if (nextc != -1) {
            if (this.mydata[r][c] == 0) {
               this.mydata[r][c] = this.mydata[r][nextc];
               this.mydata[r][nextc] = 0;
               c--;
            }
            else if (this.mydata[r][c] == this.mydata[r][nextc]) {
               this.mydata[r][c] *= 2;
               this.mydata[r][nextc] = 0;
               this.score += this.mydata[r][c];
            }
         }
         else {
            break;
         }
      }
   },

   getNEXTinRow: function (r, c) {
      for (var i = c + 1; i < 4; i++) {
         if (this.mydata[r][i] != 0) {
            return i;
         }
      }
      return -1;
   },


   //Переместить вправо
   moveRight: function () {
      //audioSwapeLeftRight.play();
      var before = String(this.mydata);
      for (var r = 0; r < 4; r++) {
         this.moveRightInRow(r);
      }
      var after = String(this.mydata);
      if (before != after) {
         this.randomNum();
         if (this.isgameover()) {
            this.status = this.gameover;
         }
         this.dataView();
      }
   },

   moveRightInRow: function (r) {
      for (var c = 3; c > 0; c--) {
         var nextc = this.RightgetNEXTinRow(r, c);
         if (nextc != -1) {
            if (this.mydata[r][c] == 0) {
               this.mydata[r][c] = this.mydata[r][nextc];
               this.mydata[r][nextc] = 0;
               c++;
            }
            else if (this.mydata[r][c] == this.mydata[r][nextc]) {
               this.mydata[r][c] *= 2;
               this.mydata[r][nextc] = 0;
               this.score += this.mydata[r][c];
            }
         }
         else {
            break;
         }
      }
   },

   RightgetNEXTinRow: function (r, c) {
      for (var i = c - 1; i >= 0; i--) {
         if (this.mydata[r][i] != 0) {
            return i;
         }
      }
      return -1;
   },


   // Двигаться вверх
   moveTop: function () {
      //audioSwapeTopBottom.play();
      var before = String(this.mydata);
      for (var r = 0; r < 4; r++) {
         this.moveTopInRow(r);
      }
      var after = String(this.mydata);
      if (before != after) {
         this.randomNum();
         if (this.isgameover()) {
            this.status = this.gameover;
         }
         this.dataView();
      }
   },

   moveTopInRow: function (r) {
      for (var c = 0; c < 3; c++) {
         var nextc = this.TopgetNEXTinRow(r, c);
         if (nextc != -1) {
            if (this.mydata[c][r] == 0) {
               this.mydata[c][r] = this.mydata[nextc][r];
               this.mydata[nextc][r] = 0;
               c++;
            }
            else if (this.mydata[c][r] == this.mydata[nextc][r]) {
               this.mydata[c][r] *= 2;
               this.mydata[nextc][r] = 0;
               this.score += this.mydata[c][r];
            }
         }
         else {
            break;
         }
      }
   },

   TopgetNEXTinRow: function (r, c) {
      for (var i = c + 1; i < 4; i++) {
         if (this.mydata[i][r] != 0) {
            return i;
         }
      }
      return -1;
   },


   // двигаться вниз
   moveBottom: function () {
      //audioSwapeTopBottom.play();
      var before = String(this.mydata);
      for (var r = 0; r < 4; r++) {
         this.moveBottomInRow(r);
      }
      var after = String(this.mydata);
      if (before != after) {
         this.randomNum();
         if (this.isgameover()) {
            this.status = this.gameover;
         }
         this.dataView();
      }
   },

   moveBottomInRow: function (r) {
      for (var c = 3; c > 0; c--) {
         var nextc = this.BottomgetNEXTinRow(r, c);
         if (nextc != -1) {
            if (this.mydata[c][r] == 0) {
               this.mydata[c][r] = this.mydata[nextc][r];
               this.mydata[nextc][r] = 0;
               c++;
            }
            else if (this.mydata[c][r] == this.mydata[nextc][r]) {
               this.mydata[c][r] *= 2;
               this.mydata[nextc][r] = 0;
               this.score += this.mydata[c][r];
            }
         }
         else {
            break;
         }
      }
   },

   BottomgetNEXTinRow: function (r, c) {
      for (var i = c - 1; i >= 0; i--) {
         if (this.mydata[i][r] != 0) {
            return i;
         }
      }
      return -1;
   },

}

document.onkeydown = function (event) {
   var event = event || e || arguments[0];
   if (event.keyCode == 37) {
      game.moveLeft();
   }
   else if (event.keyCode == 38) {
      game.moveTop();
   }
   else if (event.keyCode == 39) {
      game.moveRight();
   }
   else if (event.keyCode == 40) {
      game.moveBottom();
   }
}


// Следующий код предназначен для обработки совместимости этой игры путем ее упаковки в режим приложения,
var startX, startY, endX, endY;    // Определение четырех переменных для хранения значений по оси X и оси Y при касании и при выходе из касания
document.addEventListener("touchstart", function (event) {  // Связывание события слушателя при начале касания пальцем
   var event = event || e || arguments[0];
   startX = event.touches[0].pageX;
   startY = event.touches[0].pageY;
})

document.addEventListener("touchend", function (event) {    // Привязка события прослушивания, когда палец касается и уходит
   var event = event || e || arguments[0];
   endX = event.changedTouches[0].pageX;
   endY = event.changedTouches[0].pageY;

   var x = endX - startX;
   var y = endY - startY;

   var absX = Math.abs(x) > Math.abs(y);
   var absY = Math.abs(y) > Math.abs(x);
   if (x > 0 && absX) {
      game.moveRight();
   }
   else if (x < 0 && absX) {
      game.moveLeft();
   }
   else if (y > 0 && absY) {
      game.moveBottom();
   }
   else if (y < 0 && absY) {
      game.moveTop();
   }

})


leaderboardButton.onclick = function () {
   leaderboardContainer.style = "display: block;"
}
leaderboarBackdButton.onclick = function () {
   leaderboardContainer.style = "display: none;"
}

//активация кнопки старт при нажатии
const BUTTON_START = document.querySelector('.button-start');
BUTTON_START.onclick = function () {
   document.querySelector('.start-menu').classList.add('activated');
   BUTTON_START.classList.add('activated');
   if (BUTTON_START.classList.contains('activated')) {
      game.start();

   }
}


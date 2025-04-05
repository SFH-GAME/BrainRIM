//звук 
let audioClick = new Audio('/pages/main-page/sounds/najatie-na-kompyuternuyu-knopku1.mp3');
let audioNavigClick = new Audio('/sound/knopka-voda-vyisokii-glubokii.mp3');


const list = document.querySelectorAll('.list');
const canvas = document.querySelector('.canvas');
const itemHomeNavigation = document.querySelector('.list-home');
const itemGamesNavigation = document.querySelector('.list-games');
const itemStoreNavigation = document.querySelector('.list-store');
const itemAnalyticNavigation = document.querySelector('.list-analytic');
const itemImproveNavigation = document.querySelector('.list-improve');
const containerGamesPage = document.querySelector('.page-games-container');
const containerImprovePage = document.querySelector('.page-improve-container');
const containerStorePage = document.querySelector('.page-store-container');
const containerEverydayTasks = document.querySelector('.everyday-tasks-container');
const containerAnalyticPage = document.querySelector('.analytic-container');
const containerGrayBackground = document.querySelector('.gray-background-container');
const everydayTasksButton = document.querySelector('.everyday-tasks-button');
const everydayTasksCloseButton = document.querySelector('.every-day-tasks-close-button');
const wordDayContainer = document.querySelector('.day-word-container');
const wordDayCloseButton = document.querySelector('.word-day-close-button');
const wordDayButton = document.querySelector('.everyday-word-button');
const settingsButton = document.querySelector('.settings')
const everydayWordButton = document.querySelector('.everyday_day-word-container');
const everydayWord = document.querySelector('.everyday_word');
const Profile = document.querySelector('.profile')
const everydayWordCloseButton = document.querySelector('.everyday_day-word-close-button');
const everydayDateButton = document.querySelector('.everyday_date-container');
const everydayDateCloseButton = document.querySelector('.everyday_date-close-button');
const everydayNewWordButton = document.querySelector('.everyday_new-word-container');
const everydayNewWordCloseButton = document.querySelector('.everyday_new-word-close-button');
const dayHistoryButton = document.querySelector('.day_history');
const newWordButton = document.querySelector('.new_word');
const ImproveScrollButton = document.querySelector('.scroll');
const InfoForTasks = document.querySelector('.info-button-body');
const InfoWordDayButton = document.querySelector('.word-day-info-button');
const InfoTasksButton = document.querySelector('.tasks-info-button');
const CloseInfoForTasks = document.querySelector('.close-every-day-tasks-info');
const EverydayInfoButton = document.querySelector('.everyday-info-button-body');
const CloseInfoForEverydayWords = document.querySelector('.close-everyday-info-button-body');
const AllLevelsButton = document.querySelector('.player-level');
const AllLevels = document.querySelector('.all-lvls-container');
const CloseAllLevels = document.querySelector('.close-levels-container');
const ConvertCurrencyButton = document.querySelector('.convert-currency-button');
const Offers = document.querySelector('.special-offers');

//new
const chillButton = document.querySelector('.switch-btn__chill');
const growthButton = document.querySelector('.switch-btn__growth');
const gamesChillContainer = document.querySelector('.games-chill-container');
const gamesGrowthContainer = document.querySelector('.games-growth-container');
// конец раздела с играми

const nextLvlValueContainer = document.querySelector('.nextLvl-value');
const bodyForExpValue = document.querySelector('.expValueFromDB');
const bodyForNextExpValue = document.querySelector('.nextLvl-value');
const buttonLevelUp = document.querySelector('.level-up');
const playerLvlCounterBody = document.querySelector('.playerLvlCounterBody');
const BonusContainer = document.querySelector('.bonus_container');
const BonusContainerContinue = document.querySelector('.bonus_container_continue');
const shopMemoneyValueBody = document.querySelector('.count-memoney');
const homeMemoneyValueBody = document.querySelector('.home-memony-body');
const homeHintsValueBody = document.querySelector('.home-hints-body');
const homeIqValueBody = document.querySelector('.home-iq-body');
const shopHintsValueBody = document.querySelector('.count-hints');
const AboutUsContainer = document.querySelector('.about-us-container');

let memoneyRealtime = memoneyValue;
let eyeHintsRealtime = hintsValue;
const deg = 6;
const hr = document.querySelector('#hr');
const mn = document.querySelector('#mn');
const sc = document.querySelector('#sc');



// подключение serwice worker нужен для PWA
if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/sw.js')
    .then(registration => {
      console.log('Service Worker зарегистрирован:', registration);
    })
    .catch(error => {
      console.error('Ошибка регистрации Service Worker:', error);
    });
}


//pop-up alert
const GamesInDev = document.querySelectorAll('.game-in-dev');
const alertContainer = document.querySelector('.pop-up-alert-container');
const TreeBtn = document.querySelector('.tree-button');

GamesInDev.forEach(element => {
  element.addEventListener('click', popUpAlert);
});

if (TreeBtn) {
  TreeBtn.addEventListener('click', popUpAlert);
}

function popUpAlert() {
  alertContainer.style = 'display: flex;';
  setTimeout(() => {
    alertContainer.style = 'display: none;';
  }, 2000);
}

const ImproveDev = document.querySelectorAll('.improve-in-dev');

ImproveDev.forEach(element => {
  element.addEventListener('click', popUpAlert);
});
//pop-up alert


//AJAX запрос обнуление опыта
function doAjaxExperienceDowngradeAndLevelUp() {
  $.ajax({
    url: '/dataBase/controllers/antiBonusSystem/minusExp.php',
    type: 'POST',
    dataType: "json",
    data: {

    },
    success: function (data) {
      console.log(data.expUpForModeAjax);
    },
    error: function () {
      console.log('ERROR');
    }
  })
}
//AJAX запрос на добавления подарка или просмотр вводного поп ап
let receiveGift = false;
let viewedPopUp = false;
function doAjaxGiftAndViwed() {
  $.ajax({
    url: '/dataBase/controllers/bonusSystem/registrGifts.php',
    type: 'POST',
    dataType: "json",
    data: {
      receiveGift: receiveGift,
      viewedPopUp: viewedPopUp,
    },
    success: function (data) {
      console.log(data);
    },
    error: function () {
      console.log('ERRORчик');
    }
  })
}

console.log(expValue);
console.log(nextLvlExpValue);
if (expValue >= nextLvlExpValue && expValue !== 0) {//если лвл достиг нужн знач.
  buttonLevelUp.style = 'display:flex;';
}
// нажатие на кнопку улучшить
buttonLevelUp.onclick = function () {
  ShowFireworks();
  doAjaxExperienceDowngradeAndLevelUp();
  bodyForExpValue.innerHTML = 0;
  progress.style.width = 0 + "%";//обнуляет линию
  buttonLevelUp.style = 'display:none;';
  playerLvlCounterBody.innerHTML = levelValue += 1;
  bodyForNextExpValue.innerHTML = nextLvlExpValue += 50;
  audioClick.play();
}
bodyForExpValue.innerHTML = expValue;//добавляют динамич знач на экран из базы данных
bodyForNextExpValue.innerHTML = nextLvlExpValue;
playerLvlCounterBody.innerHTML = levelValue;

let bar = document.querySelector("#loading-bar");
let progress = document.querySelector("#progress");

let oneProcent = nextLvlExpValue / 100;
let i = expValue / oneProcent;
progress.style.width = i + "%";//выводит линию по опыту

//отвечает за конвертаци в магазине,вывод расчётов 
let inputConvert;
function trackInput() {
  inputConvert = document.getElementById('myInput').value;
  let output = document.getElementById('output');
  output.innerHTML = inputConvert *= 8;

}

document.querySelector(".convert-button").onclick = function () {//конвертирует монеты пользователя в подсказки
  if (memoneyRealtime >= inputConvert / 8) {
    memoneyRealtime -= inputConvert / 8;
    eyeHintsRealtime += inputConvert;
  }
  shopMemoneyValueBody.innerHTML = `${memoneyRealtime}`;//динамически обновляет валюту на странице
  homeMemoneyValueBody.innerHTML = `${memoneyRealtime}`;
  shopHintsValueBody.innerHTML = `${eyeHintsRealtime}`;
  homeHintsValueBody.innerHTML = `${eyeHintsRealtime}`;
  let currencyValue = inputConvert;
  $.ajax({
    url: '/dataBase/controllers/convertCurrency/convertHints.php',
    type: 'POST',
    dataType: "json",
    data: {
      currencyValue: currencyValue,
    },
    success: function (data) {
      console.log(data);
    },
    error: function () {
      console.log('ERROR');
    }
  })
  ConvertCurrencyBody.style = 'display: none;'; //Закрывает конвертер в конце
  containerGrayBackground.style = 'display: none;';
}



const maxStars = 10; // Максимальное количество звёзд на контейнер

const createStar = (container) => {
  const star = document.createElement('div');
  star.classList.add('star');

  // Рандомная горизонтальная позиция в пределах контейнера
  star.style.left = Math.random() * 148 + 'px';
  star.style.animationDuration = Math.random() * 16 + 24 + 's'; // Анимация от 24 до 40 секунд

  // Добавление звезды в контейнер
  container.appendChild(star);

  // Проверка и удаление лишних звёзд
  const stars = container.querySelectorAll('.star'); // Находим только звёзды
  if (stars.length > maxStars) {
    stars[0].remove(); // Удаляем только первую звезду
  }

  // Удаление звезды после завершения анимации
  setTimeout(() => {
    if (container.contains(star)) {
      star.remove();
    }
  }, 40000); // Устанавливаем время жизни звезды
};

const packs = document.querySelectorAll('.pack');

// Создаём звёзды для каждого контейнера с интервалом
packs.forEach((pack) => {
  setInterval(() => createStar(pack), 500);
});



function ShowFireworks() {

  const duration = 5 * 1000,
    animationEnd = Date.now() + duration,
    defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

  function randomInRange(min, max) {
    return Math.random() * (max - min) + min;
  }

  const interval = setInterval(function () {
    const timeLeft = animationEnd - Date.now();

    if (timeLeft <= 0) {
      return clearInterval(interval);
    }

    const particleCount = 50 * (timeLeft / duration);

    // since particles fall down, start a bit higher than random
    confetti(
      Object.assign({}, defaults, {
        particleCount,
        origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 },
      })
    );
    confetti(
      Object.assign({}, defaults, {
        particleCount,
        origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 },
      })
    );
  }, 250);
}

function activeLink() {
  list.forEach((item) =>
    item.classList.remove('active'));
  this.classList.add('active');
}
list.forEach((item) =>
  item.addEventListener('click', activeLink));


//Дом
itemHomeNavigation.onclick = function () {//при нажатии на элем home в меню навигац
  containerGamesPage.style = 'display: none;'; //убирает страницу игр
  containerImprovePage.style = 'display: none;';
  containerStorePage.style = 'display: none;';
  containerAnalyticPage.style = 'display:none;';
  audioNavigClick.play();
}

//О приложении
const CloseAboutUs = document.querySelector('.close-about-us');
CloseAboutUs.onclick = function () {
  AboutUsContainer.style = 'display: none;';
}
const CloseAboutUsBtn = document.querySelector('.about-us-confirm_button'); //Сделать закрытие "О приложении" с таймером на кнопку 'confirm_button'
CloseAboutUsBtn.onclick = function () {
  viewedPopUp = true;
  AboutUsContainer.style = 'display: none;';
  doAjaxGiftAndViwed();
}

//Бонус при регистрации
if (receiveGiftValue == 0) {//проверка на получение подарка и вывод на экран окна с подарком
  BonusContainer.style = 'display: flex;';
  containerGrayBackground.style = 'display: flex;';
}
//pop-up about us
if (viewedPopUpValue == 0) {//проверка на получение подарка и вывод на экран окна с подарком
  AboutUsContainer.style = 'display: flex;';
}
BonusContainerContinue.onclick = function () { //при закрытии Бонуса
  shopMemoneyValueBody.innerHTML = `10`;
  homeIqValueBody.innerHTML = '10';
  shopHintsValueBody.innerHTML = `20`;
  homeMemoneyValueBody.innerHTML = `10`;
  homeHintsValueBody.innerHTML = `20`;
  BonusContainer.style = 'display: none;';
  containerGrayBackground.style = 'display: none;';
  receiveGift = true;
  doAjaxGiftAndViwed();
  ShowFireworks();
  audioClick.play();
}

//Ежедневки
everydayTasksButton.onclick = function () { //при нажатии на кнопку ежедневных заданий
  containerEverydayTasks.style = 'display: block;';
  containerGrayBackground.style = 'display: block;';
  audioClick.play();
}
everydayTasksCloseButton.onclick = function () { //при закрытии ежедневных заданий
  containerEverydayTasks.style = 'display: none;';
  containerGrayBackground.style = 'display: none;';
  wordDayContainer.style = 'display: none;';
  audioClick.play();
}
InfoTasksButton.onclick = function () { //при нажатии на кнопку инфы ежедневных заданий
  InfoForTasks.style = 'display: flex; z-index:6;';
  containerGrayBackground.style = 'display: block; z-index:5;';
  audioClick.play();
}
CloseInfoForTasks.onclick = function () { //при закрытии инфы ежедневных заданий
  InfoForTasks.style = 'display: none;';
  containerGrayBackground.style = 'display: block; z-index: 3;';
  audioClick.play();
}
wordDayButton.onclick = function () { //при нажатии на кнопку ежедневных фактов
  wordDayContainer.style = 'display: block; z-index: 4;';
  containerGrayBackground.style = 'display: block;';
  audioClick.play();
}
wordDayCloseButton.onclick = function () { //при закрытии ежедневных фактов
  containerGrayBackground.style = 'display: none;';
  wordDayContainer.style = 'display: none;';
  audioClick.play();
}
InfoWordDayButton.onclick = function () { //при нажатии на кнопку инфы ежедневных фактов
  EverydayInfoButton.style = 'display: flex; z-index: 6;';
  containerGrayBackground.style = 'display: block; z-index: 5;';
  wordDayContainer.style = 'display: block;';
  audioClick.play();
}
CloseInfoForEverydayWords.onclick = function () { //при закрытии инфы ежедневных фактов
  EverydayInfoButton.style = 'display: none;';
  containerGrayBackground.style = 'display: block; z-index: 3;';
  audioClick.play();
}
everydayWord.onclick = function () { //при нажатии на кнопку слова дня
  containerGrayBackground.style = 'display: block;';
  everydayWordButton.style = 'display: block; z-index: 4;';
  audioClick.play();
}
everydayWordCloseButton.onclick = function () { //при закрытии слова дня
  everydayWordButton.style = 'display: none';
  audioClick.play();
}

dayHistoryButton.onclick = function () { //при нажатии на кнопку исторической даты
  containerGrayBackground.style = 'display: block;';
  everydayDateButton.style = 'display: block; z-index: 4;';
  audioClick.play();
}
everydayDateCloseButton.onclick = function () { //при закрытии инфы исторической даты
  everydayDateButton.style = 'display: none';
  audioClick.play();
}

newWordButton.onclick = function () { //при нажатии на кнопку нового английского слова
  containerGrayBackground.style = 'display: block;';
  everydayNewWordButton.style = 'display: block; z-index: 4;';
  audioClick.play();
}
everydayNewWordCloseButton.onclick = function () { //при закрытии нового английского слова
  everydayNewWordButton.style = 'display: none';
  audioClick.play();
}

//код для свайпов по играм
document.addEventListener('DOMContentLoaded', function () {
  const swipeArea = document.querySelector('.page-games-container');
  let startX, startY;
  const threshold = 50; // Минимальное расстояние для определения свайпа

  swipeArea.addEventListener('touchstart', function (e) {
    const touch = e.touches[0];
    startX = touch.clientX;
    startY = touch.clientY;
  });

  swipeArea.addEventListener('touchend', function (e) {
    const touch = e.changedTouches[0];
    const endX = touch.clientX;
    const endY = touch.clientY;

    const deltaX = endX - startX;
    const deltaY = endY - startY;

    // Проверяем, является ли движение больше по горизонтали
    if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > threshold) {
      if (deltaX > 0) {
        chillButton.classList.add('active');
        growthButton.classList.remove('active');
        gamesChillContainer.classList.remove('hidden');
        gamesGrowthContainer.classList.add('hidden');
      } else {
        gamesChillContainer.classList.add('hidden');
        growthButton.classList.add('active');
        chillButton.classList.remove('active');
        gamesGrowthContainer.classList.remove('hidden');
      }
    }
  });
});


//Игры
chillButton.onclick = function () {
  chillButton.classList.add('active');
  growthButton.classList.remove('active');
  gamesChillContainer.classList.remove('hidden');
  gamesGrowthContainer.classList.add('hidden');
}
growthButton.onclick = function () {
  gamesChillContainer.classList.add('hidden');
  growthButton.classList.add('active');
  chillButton.classList.remove('active');
  gamesGrowthContainer.classList.remove('hidden');
}

//разворачивание элементов при нажатии
document.addEventListener("DOMContentLoaded", function () {
  const gameBlocks = document.querySelectorAll(".game-item-block");


  gameBlocks.forEach((block) => {
    block.addEventListener("click", function () {
      // Найдем следующий соседний элемент с классом game-item-block__content
      const content = this.nextElementSibling;

      // Если следующий элемент существует и является нужным блоком контента
      if (content && content.classList.contains("game-item-block__content")) {
        content.classList.toggle("active");
        block.classList.toggle("active");

        if (content.style.height === '0px' || content.style.height === '') {
          content.style.height = `${content.scrollHeight}px`; // Устанавливаем высоту равной содержимому
        } else {
          content.style.height = '0px';
        }

      }
    });
  });
});


//ИГРЫ
itemGamesNavigation.onclick = function () { //при нажатии на кнопку Games
  containerGamesPage.style = 'display: block;';
  containerImprovePage.style = 'display: none;';
  containerStorePage.style = 'display: none;';
  containerAnalyticPage.style = 'display:none;';
  audioNavigClick.play();
}

//Развитие
itemImproveNavigation.onclick = function () { //при нажатии на кнопку Improve
  containerImprovePage.style = 'display: block;';
  containerGamesPage.style = 'display: none;'; //убирает страницу игр
  containerStorePage.style = 'display: none;';
  containerAnalyticPage.style = 'display:none;';
  audioNavigClick.play();
}

//Скролл у ачивок
ImproveScrollButton.onclick = function scrollToDown() {
  document.getElementById('improve-container').scrollTo(9999, 9999);
}
ImproveScrollButton.onclick = function scrollToTop() {
  document.getElementById('improve-container').scrollTo(0, 0);
};




//Магазин
itemStoreNavigation.onclick = function () { //при нажатии на кнопку Store
  containerStorePage.style = 'display: block;';
  containerGamesPage.style = 'display: none;'; //убирает страницу игр
  containerImprovePage.style = 'display: none;';
  containerAnalyticPage.style = 'display:none;';
  audioNavigClick.play();
}
setInterval(() => { //время
  let day = new Date();
  let hh = day.getHours() * 30;
  let mm = day.getMinutes() * deg;
  let ss = day.getSeconds() * deg;
  hr.style.transform = `rotateZ(${hh + (mm / 12)}deg)`;
  mn.style.transform = `rotateZ(${mm}deg)`;
  sc.style.transform = `rotateZ(${ss}deg)`;
})

Offers.onclick = function scrollToDown() { //Скролл до спец предложений
  containerStorePage.scrollTo(9999, 9999);
}

//Аналитика
itemAnalyticNavigation.onclick = function () {
  containerAnalyticPage.style = 'display: block;';
  containerGamesPage.style = 'display: none;'; //убирает страницу игр
  containerImprovePage.style = 'display: none;';
  containerStorePage.style = 'display: none;';
  audioNavigClick.play();
}

settingsButton.onclick = function () {
  audioClick.play();
}
Profile.onclick = function () {
  audioClick.play();
}


//Анимация звёзд на кнопке "Дерево навыков"
document.addEventListener("DOMContentLoaded", () => {
  const button = document.querySelector(".tree-button");

  function createSparkle() {
    const sparkle = document.createElement("div");
    sparkle.classList.add("sparkle");

    const size = Math.random() * 1.5 + 0.2; // Размер звезды
    const posX = Math.random() * button.clientWidth;
    const posY = Math.random() * button.clientHeight;

    sparkle.style.width = `${size}px`;
    sparkle.style.height = `${size}px`;
    sparkle.style.left = `${posX}px`;
    sparkle.style.top = `${posY}px`;

    button.appendChild(sparkle);

    setTimeout(() => sparkle.remove(), 5000); // Удаляем через 5 сек
  }

  setInterval(createSparkle, 60); // Создаём новую точку каждые 60 мс
});
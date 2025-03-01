//счёт уровня
const playerLvlCounterBody = document.querySelector('.playerLvlCounterBody');


//отображение уровня
playerLvlCounterBody.innerHTML = levelValue;

// Функция для переключения видимости контейнера сообщений и блокировки прокрутки на фоне
function toggleMailContainer() {
  const mailContainer = document.querySelector('.mail-container');
  const body = document.querySelector('body');

  // Переключаем видимость контейнера
  mailContainer.classList.toggle('show');

  // Блокируем или разблокируем прокрутку на фоне
  body.classList.toggle('no-scroll', mailContainer.classList.contains('show'));
}


document.addEventListener('DOMContentLoaded', function () {
  const messages = document.querySelectorAll('.message');
  const container = document.querySelector('.user-messages');

  messages.forEach(function (message) {
    message.addEventListener('click', function (event) {
      event.stopPropagation(); // Останавливаем всплытие события, чтобы не срабатывал обработчик на контейнере
      this.classList.toggle('open'); // Переключаем класс 'open' при клике на сообщение
    });
  });

  // Скрыть описание при клике на пустое место (вне сообщений)
  document.addEventListener('click', function (event) {
    // Проверяем, был ли клик вне контейнера сообщений
    if (!container.contains(event.target)) {
      messages.forEach(function (message) {
        message.classList.remove('open');
      });
    }
  });
});



document.querySelector('.check-all-msg').addEventListener('click', function () {
  var checkbox = document.querySelector('.inp-cbx');
  checkbox.checked = !checkbox.checked; // переключаем состояние чекбокса
});


//pop-up alert
const buttonChangedName = document.querySelector('.change-name');
const alertContainer = document.querySelector('.pop-up-alert-container');
const testButton = document.querySelector('.test-button');
const changeName = document.querySelector('.change-name');

changeName.onclick = function () {
  alertContainer.style = 'display: flex;';
  setTimeout(() => {
    alertContainer.style = 'display: none;';
  }, 2000);
}

testButton.onclick = function popUpAlert() {
  alertContainer.style = 'display: flex;';
  setTimeout(() => {
    alertContainer.style = 'display: none;';
  }, 2000);
}


//pop-up Валюта
const brainButton = document.querySelector('.Braincurrencypct');
const currencypopup = document.querySelector('.currencies-popup');
const brainButtonafter = document.querySelector('.Braincurrencypctafter');
const overlay = document.querySelector('.popup-overlay');

document.body.appendChild(overlay);

brainButton.onclick = function () {
    currencypopup.style.display = 'flex';
    brainButtonafter.style.display = 'flex';
    brainButton.style.display = 'none';
    overlay.style.display = 'block';
    document.body.style.overflow = 'hidden';
};

function closePopup() {
    currencypopup.style.display = 'none';
    brainButtonafter.style.display = 'none';
    brainButton.style.display = 'flex';
    overlay.style.display = 'none';
	document.body.style.overflow = '';
}

brainButtonafter.onclick = closePopup;
overlay.onclick = closePopup;

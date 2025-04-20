const grid = document.getElementById('grid');
const keyboard = document.getElementById('keyboard');
const timer = document.getElementById('timer');
const endGameButton = document.getElementById('endGame');
const postGame = document.getElementById('postGame');
const restartGame = document.getElementById('restartGame');
const homeButton = document.getElementById('homeButton');
const startButton = document.querySelector('.button-start');

const numbers = Array.from({ length: 12 }, () => Math.floor(Math.random() * 90 + 10));
const cells = [];

let game = null;

// Создание ячеек с числами
numbers.forEach((num, index) => {
  const cell = document.createElement('div');
  cell.classList.add('cell');
  cell.textContent = num;
  cell.dataset.index = index;
  grid.appendChild(cell);
  cells.push(cell);
});

// Класс Game
class Game {
  constructor(cells, numbers) {
    this.cells = cells;
    this.numbers = numbers;
    this.countdown = 20;
    this.timerInterval = null;
  }

  start() {
    // Анимация и задержка перед началом игры
    setTimeout(() => {
      this.startTimer();
      this.hideNumbers();
    }, 2000);
  }

  startTimer() {
    timer.textContent = `Осталось: ${this.countdown} секунд`;
    this.timerInterval = setInterval(() => {
      this.countdown--;
      timer.textContent = `Осталось: ${this.countdown} секунд`;
      if (this.countdown <= 0) {
        clearInterval(this.timerInterval);
        timer.textContent = 'Начинай заполнять ячейки!';
      }
    }, 1000);
  }

  hideNumbers() {
    setTimeout(() => {
      this.cells.forEach(cell => {
        cell.textContent = '';
        cell.classList.add('hidden');
      });
      keyboard.style.display = 'grid';
      endGameButton.style.display = 'block';
      generateKeyboard();
    }, 20000);
  }
}

// Обработка кнопки старт
startButton.addEventListener('click', () => {
  document.querySelector('.start-container').classList.add('activated');
  startButton.classList.add('activated');
  document.querySelector('.start-wrapper').classList.add('activated');

  game = new Game(cells, numbers);
  game.start();
});

// Генерация клавиатуры
function generateKeyboard() {
  keyboard.innerHTML = ''; // Очищаем перед созданием
  for (let i = 0; i <= 9; i++) {
    const key = document.createElement('button');
    key.textContent = i;
    key.classList.add('key');
    key.addEventListener('click', () => handleKeyPress(i));
    keyboard.appendChild(key);
  }

  const clearKey = document.createElement('button');
  const clearIcon = document.createElement('img');
  clearIcon.src = '/img/free-icon-delete-trash.png';
  clearIcon.alt = 'Clear';
  clearKey.appendChild(clearIcon);
  clearKey.classList.add('key');
  clearKey.addEventListener('click', clearInput);
  keyboard.appendChild(clearKey);

  const deleteKey = document.createElement('button');
  const delIcon = document.createElement('img');
  delIcon.src = '/img/free-icon-delete-159805.png';
  delIcon.alt = 'Delete';
  deleteKey.appendChild(delIcon);
  deleteKey.classList.add('key');
  deleteKey.addEventListener('click', deleteLastDigit);
  keyboard.appendChild(deleteKey);
}

// Ввод чисел
function handleKeyPress(num) {
  const emptyCell = cells.find(cell => {
    const currentValue = cell.textContent || '';
    return currentValue.length < 2;
  });

  if (emptyCell) {
    const currentValue = emptyCell.textContent || '';
    emptyCell.textContent = currentValue + num;
    emptyCell.classList.remove('hidden');
  }
}

function clearInput() {
  cells.forEach(cell => {
    cell.textContent = '';
    cell.classList.add('hidden');
  });
}

function deleteLastDigit() {
  const lastFilledCell = [...cells].reverse().find(cell => cell.textContent.length > 0);
  if (lastFilledCell) {
    lastFilledCell.textContent = lastFilledCell.textContent.slice(0, -1);
    if (lastFilledCell.textContent === '') {
      lastFilledCell.classList.add('hidden');
    }
  }
}

// Завершение игры
function endGame() {
  let correctCount = 0;
  cells.forEach((cell, index) => {
    if (parseInt(cell.textContent) === numbers[index]) {
      correctCount++;
      cell.classList.add('correct');
    }
  });
  keyboard.style.display = 'none';
  endGameButton.style.display = 'none';
  postGame.style.display = 'flex';

  showResults({
    score: correctCount,
    level: 1,
    reward: {
      money: correctCount * 2,
      hints: correctCount > 5 ? 1 : 0,
      iq: correctCount * 3,
      exp: correctCount * 10
    },
    best: {
      score: correctCount,
      level: 1
    }
  });
}

// Навешивание событий
endGameButton.addEventListener('click', endGame);
restartGame.addEventListener('click', () => location.reload());
homeButton.addEventListener('click', () => window.location.href = '/');

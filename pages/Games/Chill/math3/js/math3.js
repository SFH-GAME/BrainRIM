const grid = document.getElementById('grid');
const keyboard = document.getElementById('keyboard');
const timer = document.getElementById('timer');
const endGameButton = document.getElementById('endGame');
const postGame = document.getElementById('postGame');
const restartGame = document.getElementById('restartGame');
const homeButton = document.getElementById('homeButton');

const numbers = Array.from({ length: 12 }, () => Math.floor(Math.random() * 90 + 10));
const cells = [];

numbers.forEach((num, index) => {
   const cell = document.createElement('div');
   cell.classList.add('cell');
   cell.textContent = num;
   cell.dataset.index = index;
   grid.appendChild(cell);
   cells.push(cell);
});

setTimeout(() => {
   cells.forEach(cell => {
      cell.textContent = '';
      cell.classList.add('hidden');
   });
   keyboard.style.display = 'grid';
   endGameButton.style.display = 'block';
   generateKeyboard();
}, 20000);

function generateKeyboard() {
   for (let i = 0; i <= 9; i++) {
      const key = document.createElement('button');
      key.textContent = i;
      key.classList.add('key');
      key.addEventListener('click', () => handleKeyPress(i));
      keyboard.appendChild(key);
   }

   const clearKey = document.createElement('button');
   const clearIcon = document.createElement('img');
   clearIcon.src = '/img/free-icon-delete-trash.png'; // Путь к вашей иконке
   clearIcon.alt = 'Clear'; // Альтернативный текст для иконки
   clearKey.appendChild(clearIcon); // Добавляем иконку в кнопку
   clearKey.classList.add('key');
   clearKey.addEventListener('click', clearInput);
   keyboard.appendChild(clearKey);

   const deleteKey = document.createElement('button');
   const delIcon = document.createElement('img');
   delIcon.src = '/img/free-icon-delete-159805.png'; // Путь к вашей иконке
   delIcon.alt = 'Delete'; // Альтернативный текст для иконки
   deleteKey.appendChild(delIcon); // Добавляем иконку в кнопку
   deleteKey.classList.add('key');
   deleteKey.addEventListener('click', deleteLastDigit);
   keyboard.appendChild(deleteKey);
}

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

function endGame() {
   let correctCount = 0;
   cells.forEach((cell, index) => {
      if (parseInt(cell.textContent) === numbers[index]) {
         correctCount++;
         cell.classList.add('correct');
      }
   });
   alert(`Game Over! You remembered ${correctCount} out of 12 numbers correctly.`);
   keyboard.style.display = 'none';
   endGameButton.style.display = 'none';
   postGame.style.display = 'flex';
}

endGameButton.addEventListener('click', endGame);

restartGame.addEventListener('click', () => {
   location.reload();
});

homeButton.addEventListener('click', () => {
   window.location.href = '/';
});

let countdown = 20;
const interval = setInterval(() => {
   countdown--;
   timer.textContent = `Осталось: ${countdown} секунд`;
   if (countdown <= 0) {
      clearInterval(interval);
      timer.textContent = 'Начинай заполнять ячейки!';
   }
}, 1000);
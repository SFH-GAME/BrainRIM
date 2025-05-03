const resultsContainer = document.querySelector('.results-container');

function showResults() {
   resultsContainer.style = "display: block;";

   if (typeof results === 'undefined') {
      console.error('Переменная results не определена.');
   }
   // Заполнение данных
   if (results.difficulty) {
      document.querySelector('.difficult').style.display = 'flex';
      document.querySelector('.difficult-mode').textContent = results.difficulty;
   }

   // Устанавливаем заголовок и значение активности
   let activityBlock = document.querySelector('.activity-block');
   if (results.activity_type === 'upgrade') {
      activityBlock.querySelector('.head-span').textContent = 'Улучшил:';
      activityBlock.querySelector('.activity-item').textContent = results.upgrade;
   } else if (results.activity_type === 'rest') {
      activityBlock.querySelector('.head-span').textContent = 'Активность:';
      activityBlock.querySelector('.activity-item').textContent = 'Отдыхал';
      document.querySelector('.exp-wrapper').style.display = 'none';
   }

   document.querySelector('.money').textContent = results.money;
   document.querySelector('.hints').textContent = results.hints;
   document.querySelector('.iq').textContent = results.iq;
   document.querySelector('.exp').textContent = results.exp;

   if (results.enemies !== undefined) {
      document.querySelector('.enemies').style.display = 'flex';
      document.querySelector('.enemies-count').textContent = results.enemies;
   }

   if (results.time) {
      document.querySelector('.time').style.display = 'flex';
      document.querySelector('.sec').textContent = results.time.sec + ' с.';
      document.querySelector('.min').textContent = results.time.min + ' м.';
   }
   if (results.score !== undefined) {
      document.querySelector('.score').style.display = 'flex';
      document.querySelector('.score-count').textContent = results.score;
   }

   if (results.level !== undefined) {
      document.querySelector('.level').style.display = 'flex';
      document.querySelector('.level-count').textContent = results.level;
   }

   if (results.best_enemies !== undefined) {
      document.querySelector('.best-enemies').style.display = 'flex';
      document.querySelector('.best-enemies-count').textContent = results.best_enemies;
   }
   if (results.best_score !== undefined) {
      document.querySelector('.best-score').style.display = 'flex';
      document.querySelector('.best-score-count').textContent = results.best_score;
   }

   if (results.best_time) {
      document.querySelector('.best-time').style.display = 'flex';
      document.querySelector('.best-sec').textContent = results.best_time.sec + ' с.';
      document.querySelector('.best-min').textContent = results.best_time.min + ' м.';
   }

   if (results.best_level !== undefined) {
      document.querySelector('.best-level').style.display = 'flex';
      document.querySelector('.best-level-count').textContent = results.best_level;
   }

}
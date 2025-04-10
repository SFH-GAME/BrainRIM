if (typeof results === 'undefined') {
   console.error('Переменная results не определена.');

}
// Заполнение данных
if (results.difficulty) {
   document.querySelector('.difficult').style.display = 'block';
   document.querySelector('.difficult-mode').textContent = results.difficulty;
}

// Устанавливаем заголовок и значение активности
var activityBlock = document.querySelector('.activity-block');
if (results.activity_type === 'upgrade') {
   activityBlock.querySelector('.head-span').textContent = 'Улучшил:';
   activityBlock.querySelector('.activity-item').textContent = results.upgrade;
} else if (results.activity_type === 'rest') {
   activityBlock.querySelector('.head-span').textContent = 'Активность:';
   activityBlock.querySelector('.activity-item').textContent = 'Отдыхал';
}

document.getElementById('exp-value').textContent = results.exp;
document.querySelector('.money').textContent = results.money;
document.querySelector('.hints').textContent = results.hints;
document.querySelector('.iq').textContent = results.iq;
document.querySelector('.exp').textContent = results.exp;

if (results.enemies !== undefined) {
   document.querySelector('.enemies').style.display = 'block';
   document.querySelector('.enemies-count').textContent = results.enemies;
}

if (results.time) {
   document.querySelector('.time').style.display = 'block';
   document.querySelector('.sec').textContent = results.time.sec + ' с.';
   document.querySelector('.min').textContent = results.time.min + ' м.';
}
if (results.score !== undefined) {
   document.querySelector('.score').style.display = 'block';
   document.querySelector('.score-count').textContent = results.score;
}

if (results.level !== undefined) {
   document.querySelector('.level').style.display = 'block';
   document.querySelector('.level-count').textContent = results.level;
}

if (results.moves !== undefined) {
   document.querySelector('.moves').style.display = 'block';
   document.querySelector('.moves-count').textContent = results.moves;
}

if (results.best_enemies !== undefined) {
   document.querySelector('.best-enemies').style.display = 'block';
   document.querySelector('.best-enemies-count').textContent = results.best_enemies;
}
if (results.best_enemies !== undefined) {
   document.querySelector('.best-score').style.display = 'block';
   document.querySelector('.best-score-count').textContent = results.best_score;
}

if (results.best_time) {
   document.querySelector('.best-time').style.display = 'block';
   document.querySelector('.best-sec').textContent = results.best_time.sec + ' с.';
   document.querySelector('.best-min').textContent = results.best_time.min + ' м.';
}

if (results.best_level !== undefined) {
   document.querySelector('.best-level').style.display = 'block';
   document.querySelector('.best-level-count').textContent = results.best_level;
}

if (results.best_moves !== undefined) {
   document.querySelector('.best-moves').style.display = 'block';
   document.querySelector('.best-moves-count').textContent = results.best_moves;
}
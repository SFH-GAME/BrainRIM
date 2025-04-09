(function () {
   const toggleInput = document.getElementById('toggle');
   const userPref = localStorage.getItem('theme');

   // Устанавливаем тему всегда
   function setInitialTheme() {
      let theme;

      if (userPref) {
         theme = userPref;
      } else {
         const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
         theme = systemDark ? 'dark' : 'light';
      }

      document.documentElement.setAttribute('data-theme', theme);

      // Если кнопка есть — синхронизируем её положение
      if (toggleInput) {
         toggleInput.checked = theme === 'dark';
      }
   }

   // Если кнопка есть — добавляем обработчик
   if (toggleInput) {
      toggleInput.addEventListener('change', function () {
         const isDark = toggleInput.checked;
         const next = isDark ? 'dark' : 'light';
         document.documentElement.setAttribute('data-theme', next);
         localStorage.setItem('theme', next);
      });
   }

   setInitialTheme();
})();

//Анимация полоски (Прогресс бара)
function initializeProgressBar(progressBarId, expValueId, targetPercentage, targetXP) {
	const progressBar = document.getElementById(progressBarId);
	const expValue = document.getElementById(expValueId);
  
	let currentXP = 0;
	const duration = 1200; // общая длительность (мс)
	const stepTime = 20;
	const steps = duration / stepTime;
	const increment = targetXP / steps;
  
	// Запуск прогресс-бара
	setTimeout(() => {
	  progressBar.style.width = targetPercentage + '%';
	}, 400);
  
	// Анимация XP чисел
	const counter = setInterval(() => {
	  currentXP += increment;
	  if (currentXP >= targetXP) {
		currentXP = targetXP;
		clearInterval(counter);
	  }
	  expValue.textContent = `+${Math.floor(currentXP)} XP`;
	}, stepTime);
  }
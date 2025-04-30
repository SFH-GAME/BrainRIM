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

// анимация цифр от нуля до заданного значения
function animateCountUpWhenVisible(selector, duration = 1500) {
   const element = document.querySelector(selector);
   if (!element) return;

   const endValue = parseInt(element.textContent.trim(), 10);
   let animated = false;

   const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
         if (entry.isIntersecting && !animated) {
            animated = true; // предотвращаем повторную анимацию
            animateCountUp(element, endValue, duration);
            observer.unobserve(element); // отключаем наблюдение
         }
      });
   }, { threshold: 0.5 }); // 50% элемента должно быть видно

   observer.observe(element);
}

function animateCountUp(element, endValue, duration = 1500) {
   let start = 0;
   let startTime = null;

   function step(timestamp) {
      if (!startTime) startTime = timestamp;
      const progress = timestamp - startTime;
      const current = Math.min(Math.floor((progress / duration) * endValue), endValue);
      element.textContent = current;

      if (current < endValue) {
         requestAnimationFrame(step);
      }
   }

   requestAnimationFrame(step);
}

// Для высоты экрана устройства
function setVH() {
	const vh = window.innerHeight * 0.01;
	document.documentElement.style.setProperty('--vh', `${vh}px`);
  }
  
  window.addEventListener('resize', setVH);
  window.addEventListener('orientationchange', setVH);
  setVH();
  
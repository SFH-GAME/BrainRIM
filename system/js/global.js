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

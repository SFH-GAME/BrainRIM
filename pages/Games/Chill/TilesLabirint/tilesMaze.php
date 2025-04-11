<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="/pages/Games/Chill/TilesLabirint/css/tilesMaze.css">
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/system/css/global.css?v=2.0">
  <link rel="canonical" href="https://brainrim.site">
  <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
  <meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <title>Игра Лабиринт</title>
  <style>

  </style>
</head>

<!-- Этот код нужен для предварительного запуска темы(чтобы не было вспышки)-->
<script>
		(function () {
		try {
			const userPref = localStorage.getItem('theme');
			let theme;
			if (userPref) {
				theme = userPref;
			} else {
				theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
			}
			document.documentElement.setAttribute('data-theme', theme);
		} catch (e) { }
		})();
</script>

<body>
  <div class="button-start-container">
    <div class="start-menu">
      <div class="button-start">START</div>
      <div class="game-info-title">
        <span class="game-info-name">Лабиринт</span>
        <span class="game-info">В этой игре вам надо запомнить правильный путь и восстановить его по памяти за
          определенное время</span>
      </div>
    </div>
  </div>
  </div>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-pop-up.php"); ?>
  <?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-top-button.php"); ?>

  <div id="level">Уровень: 1</div>
  <div id="level-timer">Осталось: 40 сек.</div>
  <div id="message">Уровень пройден!</div>
  <div id="game-board"></div>

  <!--Результаты -->
  <div class="results-gameover results-container">
    <h1 class="results-head-text">Результаты</h1>
    <div class="results">
      <div class="time">Оставшееся время:<div class="time-count"></div>c.</div>
      <div class="level">Уровень:<div class="level-count"></div>
      </div>
      <div class="best-results">Ваш лучший результат:</div>
      <div class="time">Время: <div class="best-time-count">0</div>с.</div>
      <div class="level">Уровень: <div class="best-level-count">0</div>
      </div>
      <div class="loose-win-value">Вы проиграли</div>
    </div>
    <div class="results-menu__buttons-container">
      <div onclick="window.location.reload();" class=" results-menu__button results-menu__button-restart"><img src="/img/icons/refresh-outline.svg" class="img-icon" alt="иконка-обновить" title="иконка-обновить">
      </div>
      <a href="/index.php" class=" results-menu__button result-menu__button-home"><img src="/img/icons/home-outline.svg" class="img-icon" alt="иконка-дома" title="иконка-дома"></a>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/pages/Games/Chill/TilesLabirint/js/tilesMaze.js"></script>
	<script src="/system/js/global.js"></script>
</body>

</html>
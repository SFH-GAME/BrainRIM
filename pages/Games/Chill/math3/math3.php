<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/pages/Games/Chill/math3/css/math3.css">
	<link rel="stylesheet" href="/system/css/global.css?v=2.0">
    <title>Memory Game</title>
    <link rel="canonical" href="https://brainrim.site">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
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
    <div id="timer">Запомни числа в ячейках !</div>
    <div class="grid" id="grid"></div>
    <div class="keyboard" id="keyboard" style="display: none;"></div>
    <button id="endGame" style="display: none;">Отправить</button>
    <div class="post-game" id="postGame" style="display: none;">
        <button class="restart" id="restartGame">Restart Game</button>
        <button class="home" id="homeButton">Go to Home</button>
    </div>
	 <script src ="/pages/Games/Chill/math3/js/math3.js"></script>
	 <script src="/system/js/global.js"></script>
</body>
</html>

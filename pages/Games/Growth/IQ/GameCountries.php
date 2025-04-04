<?php
include($_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/pages/Games/Growth/IQ/GameCountries.css">
	<link rel="canonical" href="https://brainrim.site">
	<link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
	<title>Игра - страны</title>
</head>
<script>
	let eyeValue = '<?= $eyeValue ?>';
</script>
<?php include($_SERVER['DOCUMENT_ROOT'] . "/include/games-pop-up.php"); ?>

<body>
	<div class="victory-loose-screen-container">
		<div class="victory-loose-screen__mode-container">
			<div class="victory-loose-screen__mode-title">Сложность</div>
			<div class="victory-loose-screen__mode"></div>
		</div>
		<div class="victory-loose-screen__win-loose-text">Победа!</div>
		<div class="victory-loose-screen__results-button">Результаты</div>
	</div>
	<div class="results-menu-container">
		<div class="results-menu__title">Результаты</div>
		<div class="results-menu__mode-container">
			<div class="results-menu__mode-title">Сложность</div>
			<div class="results-menu__mode"></div>
		</div>

		<div class="win-loose-screen">
			<img src="/img/icons/star.svg" class="star img-icon" alt="иконка-звезды" title="иконка-звезды">
			<div class="screen-title items-container__win-loose-item">Победа</div>
			<img src="/img/icons/star.svg" class="star img-icon" alt="иконка-звезды" title="иконка-звезды">
		</div>

		<div class="results-menu__items-container items-container">
			<div class="items-container__each-item-container">
				<div class="items-container__done-cards-icon"><img src="/img/icons/checkmark-outline.svg" class="img-icon" alt="иконка-галочки" title="иконка-галочки"></div>
				<div class="items-container__done-cards-item">
					<div class="opened-cards"></div>/10
				</div>
			</div>
			<div class="items-container__each-item-container">
				<div class="items-container__time-icon"><img src="/img/icons/stopwatch-outline.svg" class="img-icon" alt="иконка-секундомера" title="иконка-секундомера"></div>
				<div class="items-container__time-item">
					<div class="results-menu__time"></div> с.
				</div>
			</div>
			<div class="items-container__each-item-container">
				<div class="items-container__iq-icon">IQ</div>
				<div class="items-container__iq-item">+</div>
			</div>
			<div class="items-container__each-item-container">
				<div class="items-container__exp-icon">Exp</div>
				<div class="items-container__exp-item">+</div>
			</div>
		</div>
		<div class="results-menu__buttons-container">
			<div onClick="window.location.reload();" class=" results-menu__button results-menu__button-restart"><img src="/img/icons/refresh-outline.svg" class="img-icon" alt="иконка-обновить" title="иконка-обновить">
			</div>
			<a href="/index.php" class=" results-menu__button result-menu__button-home"><img src="/img/icons/home-outline.svg" class="img-icon" alt="иконка-дома" title="иконка-дома"></a>
		</div>
	</div>
	<div class="button-start-container">
		<div class="start-menu">
			<div class="start-menu__game-mode-container">
				<div class="start-menu__game-mode-title">Сложность</div>
				<div class="start-menu__game-mode"></div>
			</div>
			<a href="#" class="button-start">START</a>
			<div class="game-info-title">
				<span class="game-info-name">Угадай страну</span>
				<span class="game-info">В этой игре вам надо будет выбрать правильное название страны, изображённой на
					картинке </span>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="mode-options-container">
			<div class="mode-option-title">Сложность</div>
			<div class="mode-body">
				<div class="easy-mode-button">
					<span class="easy-mode-text">Легко</span>
					<div class="easy-mode-count">1.2x</div>
				</div>
				<div class="normal-mode-button">
					<span class="normal-mode-text">Нормально</span>
					<div class="normal-mode-count">1.4x</div>
				</div>
				<div class="hard-mode-button">
					<span class="hard-mode-text">Сложно</span>
					<div class="hard-mode-count">1.7x</div>
				</div>
				<div class="crazy-mode-button">
					<span class="crazy-mode-text">Безумие</span>
					<div class="crazy-mode-count">2x</div>
				</div>
			</div>
		</div>
		<div class="topButton-gameWords">
			<a class="comeback-button" href="#">
				<div class="comeback-button-body"><img src="/img/icons/arrow-back-outline.svg" class="img-icon" alt="иконка-назад" title="иконка-назад"></div>
			</a>
			<a href="#" class="linkToTheSettings"><img src="/img/icons/settings-outline.svg" class="img-icon imgSettings" alt="иконка-настройки" title="иконка-настройки"></a>
			<div class="linkToTheRestart"><img src="/img/icons/refresh-outline.svg" class="img-icon" alt="иконка-обновить" title="иконка-обновить"></div>
		</div>
		<main>
			<div class="game-mode"></div>
			<div class="deadLineWrapper">
				<div id="deadeLine"></div>
			</div>
			<div class="hints-container"><img src="/img/Menu/icon-hints.png" alt="Подсказки" class="hints">
				<div class="hint-counter"><?php if (isset($_SESSION['id'])): ?> 	<?php echo $EyeScore['sum_eye_hint']; ?>
					<?php else: ?>0<?php endif; ?>
				</div>
			</div>

	</div>
	<div class="flags-container">
		<div class="flags-body-img">
		</div>
	</div>
	<div class="country-answers-container">
		<div class="button-count__1 country-button"></div>
		<div class="button-count__2 country-button"></div>
		<div class="button-count__3 country-button"></div>
		<div class="button-count__4 country-button"></div>
		<div class="button-hardMode-container">
			<div class="button-count__5 country-button"></div>
			<div class="button-count__6 country-button"></div>
		</div>

	</div>
	</main>
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="/pages/Games/Growth/IQ/GameCountries.js"></script>
</body>

</html>
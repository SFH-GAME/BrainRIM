<div class="start-container">
	<a class="start-comeback-button" href="/index.php">
	<div class="start-comeback-button-body"><img src="/img/icons/arrow-back-outline.svg" class="img-back-icon" alt="иконка-назад" title="иконка-назад"></div>
	</a>
		<div class="leaderboard-button"><img src="/img/ranking_pe6ng5yn5vbm.svg" alt="Список лидеров"></div> <!--список лидеров-->
		<div class="start-wrapper"><div class="button-start">START</div></div>
	<div class="game-info-title">
		<span class="game-info-name">2048</span>
		<span class="game-info">Соединяйте кубики, чтобы дойти до заветного числа - 2048!</span>
	</div>
</div>


<style>
.start-container{
	display: flex;
    justify-content: center;
	font-family: 'Balsamiq Sans', cursive;
	position: fixed;
	z-index: 3;
	width: 100%;
	height: 100%;
}

/* Для больших экранов (десктоп) */
@media (min-width: 1200px) {
	.start-container {
		background-image: var(--games-start-page-large);
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
}
}

/* Для средних экранов (планшеты) */
@media (min-width: 768px) and (max-width: 1199px) {
	.start-container {
		background-image: var(--games-start-page-medium);
}
}

/* Для маленьких экранов (телефоны) */
@media (max-width: 767px) {
	.start-container {
	background-image: var(--games-start-page);
}
}

/* Назад */
.start-comeback-button-body {
	display: flex;
	align-items: center;
	transition: 0.1s;
	position: fixed;
    top: 2%;
    left: 5%;
}
.start-comeback-button-body:active {
    transform: scale(0.8);
}
.img-back-icon{
	width: 50px;
	height: 50px;
	filter: var(--icon-color);
}

/* Старт */
.start-wrapper {
	background: linear-gradient(140deg, rgba(125, 124, 191, 1), rgba(50, 56, 109, 1));
	padding: 4px;
	height: 180px;
    width: 180px;
	border-radius: 50%;
	position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.button-start {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 172px;
    width: 172px;
	border-radius: 50%;
    font-weight: bold;
    color: var(--main-color);
    font-size: 38px;
    box-shadow:  0px 0px 15px 1px rgb(72 25 255);
	background: #161618;
	color: white;
}
.start-container.activated{
	transition: all 0.5s ;
	visibility: hidden;
}
.button-start.activated{
	transform: translate(-10%, -10%) scale(1,1);
	transition: 0.7s;
	height: 0px;
	width: 0px;
	font-size: 0px;
}
.start-wrapper.activated {
	transform: translate(-50%, -50%) scale(0,0);
	transition: 0.7s;
	height: 0px;
	width: 0px;
	font-size: 0px;
}

/* Название и описание игры */
.game-info-title{
	display: flex;
    flex-direction: column;
    bottom: 20%;
    position: absolute;
    text-align: center;
    gap: 15px;
} 
.game-info-name {
    color: var(--main-color);
	font-size: 32px;
}
.game-info{
    max-width: 350px;
    font-size: 18px;
}

/* Кнопка таблицы лидеров */
.leaderboard-button {
	display: flex;
	align-items: center;
	justify-content: center;
	z-index: 4;
	height: 50px;
	width: 50px;
	border-radius: 10px;
	box-shadow: 0px 0px 0px 1px rgb(107 9 127 / 25%), 3px 3px 6px 0px rgb(66 14 101 / 30%);
	border: 2px solid var(--main-color);
	position: fixed;
    top: 20%;
    left: 20%;
    transform: translate(-50%, -50%);
	background-color: var(--bg-color);
}
.leaderboard-button:active {
	transform: translate(-50%, -50%) scale(0.95);
    box-shadow: 0px 0px 3px 1px rgb(89 9 105 / 50%);
}
.leaderboard-button img {
	height: 30px;
	width: 30px;
	filter: var(--icon-color);
}
</style>

<script>
//активация кнопки старт при нажатии 
const BUTTON_START = document.querySelector('.button-start');
const BUTTON_STARTWRAPPER = document.querySelector('.start-wrapper');
BUTTON_START.onclick = function () {
	document.querySelector('.start-container').classList.add('activated');
	BUTTON_START.classList.add('activated');
	BUTTON_STARTWRAPPER.classList.add('activated');

	if (BUTTON_START.classList.contains('activated')) {
		game.start();
	}
}

//активация таблицы лидеров при нажатии
let leaderboardButton = document.querySelector(".leaderboard-button");
leaderboardButton.onclick = function () {
	leaderboardContainer.style = "display: block;"
}
</script>
<div class="topButton-gameWords">
    <a class="comeback-button" href="#">
        <div class="comeback-button-body"><img src="/img/icons/arrow-back-outline.svg" class="img-icon"
                alt="иконка-назад" title="иконка-назад"></div>
    </a>
    <a href="#" class="linkToTheSettings"><img src="/img/icons/settings-outline.svg" class="img-icon"
            alt="иконка настроек" title="иконка настроек"></a>
    <div class="linkToTheRestart"><img src="/img/icons/refresh-outline.svg" class="img-icon" alt="иконка-назад"
            title="иконка-назад"></div>
</div>

<style>
.topButton-gameWords {
	position: absolute;
	top: 10px;
	display: flex;
	justify-content: space-between;
	align-items: center;
	width: 100%;
	-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
	-webkit-tap-highlight-color: transparent;
	z-index: 2;
	filter: var(--icon-color);
}

.comeback-button-body {
	display: flex;
	align-items: center;
	justify-content: center;
	position: relative;
	z-index: 2;
	transition: 0.1s;
	margin: 0px 0px 0px 5px;
}
.comeback-button-body:active {
	transform: scale(0.8);
}

.linkToTheSettings {
	display: flex;
	align-items: center;
	justify-content: center;
	transition: 1.2s;
}
.linkToTheSettings:hover {
	transform: rotate(180deg);
}

.linkToTheRestart {
	display: flex;
	align-items: center;
	justify-content: center;
	margin: 0px 5px 0 0;
	-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
	-webkit-tap-highlight-color: transparent;
	transition: 1.2s;
}
.linkToTheRestart:hover {
	transform: rotate(540deg);
}

.img-icon {
	width: 40px;
	height: 40px;
	filter: var(--icon-color);
}
</style>
<script>
// логика для всплывающих окон
let settings = document.querySelector(".pop-up__container");
let comeback = document.querySelector(".pop-up__container2");
let restart = document.querySelector(".pop-up__container3");

//при нажатии на отмену вспл окна настройки 
document.querySelector('.pop-up__cancel').onclick = function () {
	settings.style = 'visibility:hidden;';
 };
 //при нажатии на иконку настроек
 document.querySelector('.linkToTheSettings').onclick = function () {
	settings.style = 'visibility:visible;';
 };
 //при нажатии на отмену вспл окна назад
 document.querySelector('.pop-up__cancel2').onclick = function () {
	comeback.style = 'visibility:hidden;';
 };
 //при нажатии на иконку назад
 document.querySelector('.comeback-button').onclick = function () {
	comeback.style = 'visibility:visible;';
 };
 //при нажатии на отмену вспл окна рестарт
 document.querySelector('.pop-up__cancel3').onclick = function () {
	restart.style = 'visibility:hidden;';
 };
 //при нажатии на иконку рестарт
 document.querySelector('.linkToTheRestart').onclick = function () {
	restart.style = 'visibility:visible;';
 };
</script>
const BackToPlanning = document.querySelector(".back-to-planning");
const planNumberInputBody = document.querySelector('.planNumber');
const ChangePlanBody = document.querySelector('.change-plan-body');

BackToPlanning.onclick = function () {//при нажатии назад на новом плане
	ChangePlanBody.style = 'display: none;';
}


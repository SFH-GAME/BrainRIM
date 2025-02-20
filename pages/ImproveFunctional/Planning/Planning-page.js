const Add1Plan = document.querySelector('.first-plan');
const Add2Plan = document.querySelector('.second-plan');
const Add3Plan = document.querySelector('.third-plan');
const Add4Plan = document.querySelector('.fourth-plan');
const NewPlanBody = document.querySelector('.new-plan-body');
const planNumberInputBody = document.querySelector('.planNumber');
const Back = document.querySelector('.back');
const todayDateValue = document.querySelector('.today-date');
//const ta = document.querySelector('#target'); // textarea
const textarea = document.querySelector("#target");
const count = document.querySelector(".count");
const MaximumCount = document.querySelector("#maximum");







Back.onclick = function () {//при нажатии назад на новом плане
	NewPlanBody.style = 'display: none;';
}



flatpickr(".new-plan-date", {
	dateFormat: "Y/m/d"
});

let currentDate = new Date();
let day = currentDate.getDate();
let month = currentDate.toLocaleString('default', { month: 'long' });
let year = currentDate.getFullYear();
// Форматируем дату в нужный формат (дд-мм-гггг)
let formattedDate = year + ' - ' + month + ' - ' + day;
todayDateValue.innerHTML = formattedDate;



// Кол-во символов в текстарее и смена цвета при низких значениях
const MaxCount = 200;

textarea.addEventListener('input', () => {
	const remaining = MaxCount - textarea.value.length;
	const color = remaining < MaxCount * 0.1 ? 'red' : null;

	count.textContent = `${remaining}`;
	count.style.color = color;
});

//проверяем если в базе есть план на ячейке то вешаем на ячейку ссылку на это задание
if (planDateValue1 !== "") {
	Add1Plan.innerHTML = planDateValue1;
	Add1Plan.onclick = function () {//при нажатии открывается план
		var url = "/pages/ImproveFunctional/Planning/plansPages/firstUserPlanBody.php"; // ссылка на план
		window.location.href = url;
	}
} else {
	Add1Plan.onclick = function () {//при нажатии открывается новый план только когда в базе на эту ячейку ничего нет
		NewPlanBody.style = 'display: flex;';
		planNumberInputBody.value = 1;
	}
}
if (planDateValue2 !== "") {
	Add2Plan.innerHTML = planDateValue2;
	Add2Plan.onclick = function () {//при нажатии открывается план
		var url = "/pages/ImproveFunctional/Planning/plansPages/secondUserPlanBody.php"; // ссылка на план
		window.location.href = url;
	}
} else {
	Add2Plan.onclick = function () {//при нажатии открывается новый план
		NewPlanBody.style = 'display: flex;';
		planNumberInputBody.value = 2;
	}
}
if (planDateValue3 !== "") {
	Add3Plan.innerHTML = planDateValue3;
	Add3Plan.onclick = function () {//при нажатии открывается план
		var url = "/pages/ImproveFunctional/Planning/plansPages/thirdUserPlanBody.php"; // ссылка на план
		window.location.href = url;
	}
} else {
	Add3Plan.onclick = function () {//при нажатии открывается новый план
		NewPlanBody.style = 'display: flex;';
		planNumberInputBody.value = 3;
	}
}
if (planDateValue4 !== "") {
	Add4Plan.innerHTML = planDateValue4;
	Add4Plan.onclick = function () {//при нажатии открывается план
		var url = "/pages/ImproveFunctional/Planning/plansPages/fourthUserPlanBody.php"; // ссылка на план
		window.location.href = url;
	}
} else {
	Add4Plan.onclick = function () {//при нажатии открывается новый план
		NewPlanBody.style = 'display: flex;';
		planNumberInputBody.value = 4;
	}
}


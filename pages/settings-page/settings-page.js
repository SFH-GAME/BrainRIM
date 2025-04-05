'use strict'
const Devs = document.querySelector('.developers-button');
const DevsList = document.querySelector('.developers-container_body');
const containerGrayBackground = document.querySelector('.gray-background-container');
const Close = document.querySelector('.close');
const AboutUs = document.querySelector('.about-us-container');
const AboutButton = document.querySelector('.about');
const CloseAboutUs = document.querySelector('.close-about-us');
const LanguageButton = document.querySelector('.language-button');
const Language = document.querySelector('.language-container');
const CloseLanguage = document.querySelector('.close-language');
const SupportButton = document.querySelector('.support');
const Support = document.querySelector('.support-body');
const CloseSupport = document.querySelector('.close-support');
const NewsButton = document.querySelector('.news');
const News = document.querySelector('.news-body');
const CloseNews = document.querySelector('.close-news');



Devs.onclick = function () { //Разработчики - при нажатии на кнопку
	DevsList.style = 'display: flex;';
	containerGrayBackground.style = 'display: block;';
}

Close.onclick = function () { //Разработчики - при закрытии
	DevsList.style = 'display: none;';
	containerGrayBackground.style = 'display: none;';
}

AboutButton.onclick = function () { //О нас - при нажатии на кнопку
	AboutUs.style = 'display: flex;';
	containerGrayBackground.style = 'display: block;';
}

CloseAboutUs.onclick = function () { //О нас - при закрытии
	AboutUs.style = 'display: none;';
	containerGrayBackground.style = 'display: none;';
}
LanguageButton.onclick = function () { //Язык - при нажатии на кнопку
	Language.style = 'display: flex;';
	containerGrayBackground.style = 'display: block;';
}
CloseLanguage.onclick = function () { //Язык - при закрытии
	Language.style = 'display: none;';
	containerGrayBackground.style = 'display: none;';
}

SupportButton.onclick = function () { //Поддержка - при нажатии на кнопку
	Support.style = 'display: flex;';
	containerGrayBackground.style = 'display: block;';
}
CloseSupport.onclick = function () { //Поддержка - при закрытии
	Support.style = 'display: none;';
	containerGrayBackground.style = 'display: none;';
}
NewsButton.onclick = function () { //Поддержка - при нажатии на кнопку
	News.style = 'display: flex;';
	containerGrayBackground.style = 'display: block;';
}
CloseNews.onclick = function () { //Поддержка - при закрытии
	News.style = 'display: none;';
	containerGrayBackground.style = 'display: none;';
}

//Раздел "Язык"
const languages = document.querySelectorAll(".language");
const defaultLanguage = document.querySelector(".RU"); // RU — язык по умолчанию
const languageContainer = document.querySelector(".language-container"); // Контейнер с языками

languages.forEach(language => {
	language.addEventListener("click", () => {
		document.querySelector(".language.active")?.classList.remove("active");
		language.classList.add("active");
	});
});

//Сброс языка на RU
function closeLanguageMenu() {
	document.querySelector(".language.active")?.classList.remove("active");
	defaultLanguage.classList.add("active");
	languageContainer.style.display = "none";
}

document.querySelector(".close-language").addEventListener("click", closeLanguageMenu);




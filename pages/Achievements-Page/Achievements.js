const containerAchievmentsPage = document.querySelector('.page-achievments-container');
const AchievmentsScrollButton = document.querySelector('.scroll');

  
  //Скролл у ачивок
  AchievmentsScrollButton.onclick = function scrollToDown() {
	document.getElementById('achievments-container').scrollTo(9999, 9999);
  }
  AchievmentsScrollButton.onclick = function scrollToTop() {
	document.getElementById('achievments-container').scrollTo(0, 0);
  };
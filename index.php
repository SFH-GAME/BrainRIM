<?php
   include "path.php";
   include ( $_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");
   
?>

<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width">
   <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/pages/main-page/css/main-page.css">
   <title>main-page</title>
</head>

<body>
   <div class="wrapper">
      <div class="gray-background-container"></div>
      <header class="header">
         <div class="header__top-button-container">
            <a href="/pages/settings-page/settings-page.php" class="settings"><ion-icon class="icon-settings"
                  name="settings-outline"></ion-icon></a>
            <span class="header__top-button-title">BrainRIM</span>
			<div class="Profile-anim"><a href="/pages/Profile-page/Profile.php" class="profile-page"><img src="/img/Menu/brain.svg" alt="#" class="profile"></a></div>
         </div>
         <div class="header-score-container">
            <div class="memany-container currency-container">
               <img class="currency-memoney-icon" src="/img/Menu/Memoney.svg" alt="memoney">
               <div class="memany-count">
                  <?php if(isset($_SESSION['id'])): ?>
                  <?php echo $memany['sum_memany']; ?>
                  <?php else: ?>
                  0
                  <?php endif;?>
               </div>
            </div>
            <div class="hint-container currency-container">
               <img class="currency-icons" src="/img/Menu/Hints.svg" alt="hints">
               <div class="memany-count">
                  <?php if(isset($_SESSION['id'])): ?>
                  <?php echo $EyeScore['sum_eye_hint']; ?>
                  <?php else: ?>
                  0
                  <?php endif;?>
               </div>
            </div>
            <div class="iq-container currency-container">
               <span class="iq-name">IQ</span>
               <div class="memany-count">
                  <?php if(isset($_SESSION['id'])): ?>
                  <?php echo $IQscore['sum_iq']; ?>
                  <?php else: ?>
                  0
                  <?php endif;?>
               </div>
            </div>
         </div>

      </header>
      <main class="main">
		         <div class="lvl-container">
            <div class="player-level">Lvl 1</div>
            <div class="player-exp-scale">
               <div class="player-exp__line-blue"></div>
               <div class="player-exp__text">0/100</div>
            </div>
            <div class="all-lvls-container">
               <div class="level level-one">Lvl 1</div>
               <div class="level level-two">Lvl 2</div>
               <div class="level level-three">Lvl 3</div>
               <div class="level level-four">Lvl 4</div>
               <div class="level level-five">Lvl 5</div>
               <div class="level level-six">Lvl 6</div>
               <div class="level level-seven">Lvl 7</div>
               <div class="level level-eight">Lvl 8</div>
               <div class="level level-nine">Lvl 9</div>
               <div class="level level-ten">Lvl 10</div>
               <div class="close-levels-container"><ion-icon name="close-outline"></ion-icon></div>
            </div>
         <div class="tasks-bonus-iq-container">
            <div class="everyday-word-button"><ion-icon name="calendar-number-outline"></ion-icon></div>
            <div class="everyday-tasks-button"><ion-icon name="receipt-outline"></ion-icon>
            </div>
         </div>
      </main>
      <footer class="footer">
         <div class="navigation">
            <ul>
               <li class="list list-analytic">
                  <a href="#analitycs">
                     <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                     <span class="text">Аналитика</span>
                  </a>
               </li>
               <li class="list list-store">
                  <a href="#shop">
                     <span class="icon"><ion-icon name="storefront-outline"></ion-icon></span>
                     <span class="text">Магазин</span>
                  </a>
               </li>
               <li class="list list-home active">
                  <a href="#home">
                     <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                     <span class="text active">Главная</span>
                  </a>
               </li>
               <li class="list list-achievements">
                  <a href="#achievements">
                     <span class=" icon"><ion-icon name="ribbon-outline"></ion-icon></span>
                     <span class="text">Достижения</span>
                  </a>
               </li>
               <li class="list list-games">
                  <a href="#games">
                     <span class="icon"><ion-icon name="game-controller-outline"></ion-icon></span>
                     <span class="text">Игры</span>
                  </a>
               </li>
               <div class="indicator"></div>
            </ul>
         </div>
      </footer>
      <div class="page-games-container">
         <div class="page-title">Тренируй свой мозг!</div>
         <div class="container-list-games">
            <div class="random-game-button">Случайная игра</div>
               <div class="item-games yellow-item">
                  <img src="/pages/main-page/img/games-page/numbersImg.svg" alt="">
               </div>
            </a>
            <div class="item-games"><img src="/pages/main-page/img/games-page/wordsImg.svg" alt="">
            </div>
            <a href="/pages/thirdGame-images/game-images.php">
               <div class="item-games"><img src="/pages/main-page/img/games-page/ImageIcon.svg" alt="">
               </div>
            </a>
            <a href="#">
               <div class="item-games"><img src="/pages/main-page/img/games-page/shapesImg.svg" alt="">
               </div>
            </a>
            <a href="/pages/fourthGame-colors/game-colors.php">
               <div class="item-games"><img src="/pages/main-page/img/games-page/colorsImg.svg" alt="">
               </div>
            </a>
            <a href="/pages/Game-Countries/GameCountries.php">
               <div class="item-games"><img src="/pages/main-page/img/games-page/CountriesImg.svg"
                     alt="">
               </div>
            </a>

            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>
            <div class="item-games-in-dev in-dev_text">В разработке</div>

         </div>

      </div>

      <div class="page-achievments-container">
         <div class="wrapper-achievments">
            <span class="page-title Achievements">Достижения</span>
            <main class="main-achievements">
               <div id="achievments-container">
                  <div class="container-achieve">
                     <div class="achieve">Just Chill</div>
                     <div class="forachieve">Играть больше часа в одной игре</div>
                  </div>
                  <div class="container-achieve">
                     <div class="achieve">Мегаразум</div>
                     <div class="forachieve">Провести в приложении 20+ часов</div>
                  </div>
                  <div class="container-achieve">
                     <div class="achieve">Молоток</div>
                     <div class="forachieve">Выполнить все ежедневные задания</div>
                  </div>
                  <div class="container-achieve">
                     <div class="achieve">?</div>
                     <div class="forachieve">???</div>
                  </div>
                  <div class="container-achieve">
                     <div class="achieve">?</div>
                     <div class="forachieve">???</div>
                  </div>
                  <div class="container-achieve">
                     <div class="achieve">?</div>
                     <div class="forachieve">???</div>
                  </div>
                  <div class="container-achieve">
                     <div class="achieve">?</div>
                     <div class="forachieve">???</div>
                  </div>
               </div>
               <div class="DownButton">
                  <div class="scroll"><ion-icon class="Up-button" name="chevron-down-outline"></ion-icon></div>
               </div>
            </main>
         </div>
      </div>
      <div class="page-store-container">
         <span class="page-title Shop">Магазин</span>
         <img src="/img/Menu/Time.svg" alt="Время" class="timeoclock">
         <div class="time">Обновление через</div>
         <div class="time">23:59</div>
         <div class="currency">
            <div class="currency-memoney">
               <img class="memoneyicon" src="/img/Menu/Memoney.svg" alt="">
               <div class="count count-memoney">
               <?php if(isset($_SESSION['id'])): ?>
                  <?php echo $memany['sum_memany']; ?>
                  <?php else: ?>
                  0
                  <?php endif;?>
               </div>
            </div>
            <div class="currency-hints">
               <img class="hintsicon" src="/img/Menu/Hints.svg" alt="">
               <div class="count count-hints">
               <?php if(isset($_SESSION['id'])): ?>
                  <?php echo $EyeScore['sum_eye_hint']; ?>
                  <?php else: ?>
                  0
                  <?php endif;?>
               </div>
            </div>
         </div>
         <div class="convert-currency">
            <button class="convert-currency-button">Конвертировать валюту</button>
			</div>
			<div class="convert-currency-body">
				<div class="convert-currency-text">Конвертировать валюту</div>
			<div class="close-currency-body"><ion-icon name="close-outline"></ion-icon></div>
		</div>
         <div class="buy-currency">
            <div class="buy-memoney">
               <div class="buy first-offer">5<img class="memoneyicon" src="/img/Menu/Memoney.svg"
                     alt="">= 0.86$</div>
               <div class="buy second-offer">15<img class="memoneyicon" src="/img/Menu/Memoney.svg"
                     alt="">= 1.88$</div>
               <div class="buy third-offer">48<img class="memoneyicon" src="/img/Menu/Memoney.svg"
                     alt="">= 3.41$</div>
               <div class="buy four-offer">120<img class="memoneyicon" src="/img/Menu/Memoney.svg"
                     alt="">= 6.99$</div>
               <div class="buy five-offer">200<img class="memoneyicon" src="/img/Menu/Memoney.svg"
                     alt="">= 13.62$</div>
               <div class="buy six-offer">500<img class="memoneyicon" src="/img/Menu/Memoney.svg"
                     alt="">= 25.22$</div>
            </div>
            <div class="special-offers">Специальные предложения</div>
         </div>
      </div>

      <div class="everyday-tasks-container">
         <div class="info-button tasks-info-button"><ion-icon name="information-outline"></ion-icon></div>
         <div class="close-window every-day-tasks-close-button"><ion-icon name="close-outline"></ion-icon></div>
         <Span class="everyday-tasks-title">Еженедельные задачи</Span>
         <div class="everyday-tasks-body">
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">Набрать 1600 очков в картинках</div>
               <div class="tasks-body__task-reward">26 IQ</div>
            </div>
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">Выйграть 3 игры</div>
               <div class="tasks-body__task-reward">29 IQ</div>
            </div>
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">Разгадать заданные числа</div>
               <div class="tasks-body__task-reward">23 IQ</div>
            </div>
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">Открыть 4 правильных карты подряд</div>
               <div class="tasks-body__task-reward">25 IQ</div>
            </div>
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">???</div>
               <div class="tasks-body__task-reward">255 IQ</div>
            </div>
            <div class="task-body">
               <div class="tasks-body__mark-done"></div>
               <div class="tasks-body__task-text">???</div>
               <div class="tasks-body__task-reward">255 IQ</div>
            </div>
         </div>
      </div>
      <div class="info-button-body">
         <span>Еженедельные задания - задания которые вы можете выполнять в течении недели и получать бонусы и подарки.
            <br>В конце каждой неделю они обновляются. На данный момент функция в разработке.</span>
         <div class="close-every-day-tasks-info every-day-tasks-close-button"><ion-icon name="close-outline"></ion-icon>
         </div>
      </div>

      <div class="day-word-container">
         <div class="info-button word-day-info-button"><ion-icon name="information-outline"></ion-icon></div>
         <div class="close-window word-day-close-button"><ion-icon name="close-outline"></ion-icon></div>
         <div class="everyday-title">Ежедневно</div>
         <div class="everyday_body">
            <div class="everyday_word">
               <div class="everyday_icon_body"><ion-icon name="book-outline"></ion-icon></div>
               <div class="everyday_text_body">Слово дня</div>
            </div>
            <div class="day_history">
               <div class="everyday_icon_body"><ion-icon name="library-outline"></ion-icon></div>
               <div class="everyday_text_body">Историческая дата</div>
            </div>
            <div class="new_word">
               <div class="everyday_icon_body"><ion-icon name="language-outline"></ion-icon></div>
               <div class="everyday_text_body">Англ. слово дня</div>
            </div>
         </div>
         <div class="everyday-info-button-body">
            <span>Ежедневно здесь будет появляться интересная и полезная информация.
               <br>Она будет расширять ваш кругозор.
               <br>Не пропустите!.</span>
            <div class="close-everyday-info-button-body"><ion-icon name="close-outline"></ion-icon></div>
         </div>
      </div>
      <div class="everyday_day-word-container">
         <div class="info-button word-day-info-button"><ion-icon name="information-outline"></ion-icon></div>
         <div class="close-window everyday_day-word-close-button"><ion-icon name="close-outline"></ion-icon></div>
         <div class="everyday-title">Слово дня</div>
         <div class="day-word__body">
            <div class="day-word">
               <span class="yellow-word">Прокрастинация</span> - склонность к постоянному
               откладыванию даже важных и срочных дел,
               приводящая к жизненным проблемам и болезненным психологическим эффектам.
            </div>
         </div>
      </div>
      <div class="everyday_date-container">
         <div class="info-button word-day-info-button"><ion-icon name="information-outline"></ion-icon></div>
         <div class="close-window everyday_date-close-button"><ion-icon name="close-outline"></ion-icon></div>
         <div class="everyday-title">Историческая дата</div>
         <div class="day-word__body">
            <div class="day-date">
               <span class="yellow-word">26 апреля 1986 года </span>- Произошла Авария на Черно́быльской АЭС.
               Разрушение реактора четвёртого энергоблока Чернобыльской атомной электростанции, расположенной около
               города Припять.
               Активная зона реактора была полностью разрушена,
               в окружающую среду выброшено большое количество радиоактивных веществ.
               Авария расценивается как крупнейшая в своём роде за всю историю атомной энергетики,
               как по предполагаемому количеству погибших и пострадавших от её последствий людей, так и по
               экономическому ущербу.
            </div>
         </div>
      </div>
      <div class="everyday_new-word-container">
         <div class="info-button word-day-info-button"><ion-icon name="information-outline"></ion-icon></div>
         <div class="close-window everyday_new-word-close-button"><ion-icon name="close-outline"></ion-icon></div>
         <div class="everyday-title">Новое слово дня</div>
         <div class="day-word__body">
            <div class="day-word">
               <span class="yellow-word">unaware</span> - Не знать / не знающий,
               не подозревающий.
            </div>
         </div>
      </div>
      <div class="analytic-container">
		<div class="page-title">Аналитика</div>
		<div class="container-list-games">
		<!--<a href="/page-for-memory/pages/Statistics-page/0All-statistics/All-stats.html" class="random-game-button">Общая
		</a>
		   <a href="/page-for-memory/pages/Statistics-page/1Number-statistics/Numbers-stats.html">
			  <div class="item-games yellow-item">
				 <img src="/page-for-memory/pages/main-page/img/games-page/numbersImg.svg" alt="">
			  </div>
		   </a>
		   <a href="/page-for-memory/pages/Statistics-page/2Words-statistics/Words-stats.html">
		   <div class="item-games"><img src="/page-for-memory/pages/main-page/img/games-page/wordsImg.svg" alt="">
		   </div>
		   <a href="/page-for-memory/pages/Statistics-page/3Images-statistics/Images-stats.html">
			   <div class="item-games"><img src="/page-for-memory/pages/main-page/img/games-page/ImageIcon.svg" alt="">
			  </div>
		   </a>
		   <a href="/page-for-memory/pages/Statistics-page/4Figures-statistics/Figures-stats.html">
			  <div class="item-games"><img src="/page-for-memory/pages/main-page/img/games-page/shapesImg.svg" alt="">
			  </div>
		   </a>
		   <a href="/page-for-memory/pages/Statistics-page/5Colors-statistics/Colors-stats.html">
				 <div class="item-games"><img src="/page-for-memory/pages/main-page/img/games-page/colorsImg.svg" alt="">
			  </div>
		   </a>
		   <a href="/page-for-memory/pages/Statistics-page/6Countries-statistics/Rhytms-stats.html">
			  <div class="item-games"><img src="/page-for-memory/pages/main-page/img/games-page/CountriesImg.svg" alt="">
			  </div>
		   </a>-->
		   <a href="#" class="random-game-button-in-dev">В разработке
		   </a>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
		   <div class="item-games-in-dev in-dev_text">В разработке</div>
         </div>
      </div>


      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script src="/pages/main-page/js/main-page.js"></script>
</body>

</html>
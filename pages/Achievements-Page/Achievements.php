<?php
   
   include $_SERVER['DOCUMENT_ROOT']."/dataBase/surencyAndScore.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
   <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.png" type="image/png">
	<link rel="stylesheet" href="/pages/Achievements-Page/Achievements.css">
	<title>Достижения</title>
   <link rel="canonical" href="https://brainrim.site">
</head>
<header>
<a class="comeback-button" href="/pages/Profile-page/Profile.php"><ion-icon name="arrow-back-outline"></ion-icon></a>
</header>
<body>
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
               </div>
               <div class="DownButton">
                  <div class="scroll"><ion-icon class="Up-button" name="chevron-down-outline"></ion-icon></div>
               </div>
            </main>
         </div>
      </div>
</body>
	  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script src="/pages/Achievements-Page/Achievements.js"></script>
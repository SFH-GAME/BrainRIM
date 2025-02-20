<?php
	include($_SERVER['DOCUMENT_ROOT']."/pages/ImproveFunctional/Planning/php/LogicToPlan.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
//записывает в переменные данные из базы
      <?php if(isset($_SESSION['id'])): ?>
            let planDateValue1 = '<?= $planData1 ?>';
				let planDateValue2 = '<?= $planData2 ?>';
				let planDateValue3 = '<?= $planData3 ?>';
				let planDateValue4 = '<?= $planData4 ?>';
      <?php else: ?>//что бы не было ошибки когда не авторизован пользователь
           
      <?php endif;?>
   </script>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
   <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/pages/ImproveFunctional/Planning/Planning-page.css">
	<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
	<link rel="canonical" href="https://brainrim.site">
    <link rel="icon" href="/img/app_icon_with_larger_area_1024x1024.ico" type="image/x-icon">
   <title>Планирование</title>
</head>

<body>
    <header>
         <a class="comeback-button" href="/index.php"><ion-icon name="arrow-back-outline"></ion-icon></a>
			<div class="page-title">Планирование<ion-icon class="page-title-icon" name="calendar-outline"></ion-icon></div>
	</header>
	<main>
	   <div class="info-body">
	        <div class="info-button"><ion-icon name="information-outline" role="img" class="md hydrated" aria-label="information outline"></ion-icon></div>
	        <div class="info-text">Выбирай дату и записывай задачу</div>
	   </div>
		<div class="alerts-container err">
			<p><?=$errorMsg?></p>
		</div>
		<div class="date-body">
				<div class="today-text">Сегодня</div>
				<div class="today-date"></div>
		</div>
		<div class="add-plan-body">
			<div class="add-plan first-plan">+ Добавить план</div>
			<div class="add-plan second-plan">+ Добавить план</div>
			<div class="add-plan third-plan">+ Добавить план</div>
			<div class="add-plan fourth-plan">+ Добавить план</div>
		</div>
		<form action="Planning-page.php" method="post">

		<div class="new-plan-body">
		    	<div class="comeback-button back"><ion-icon name="arrow-back-outline"></ion-icon></div>
		    	<div class="new-plan-title">Новый план</div>
			<div class="new-plan-date-body">
				<input type="date" name="planDateValue" class="new-plan-date" placeholder="Выберите дату">
		   	<div class="date-icon" ></div>
				<input type="number" name="planNumber" class="planNumber" value="">
			</div>
			<div class="container plan-text-body">
    			<textarea name="planTextArea" placeholder="Напишите цель/заметку здесь..." id="target" autocomplete="on" maxlength="200"></textarea>
				<div class="symbols-count">
    			<span class="count" id="current">0 </span>
    			<span id="maximum">/ 200</span>
  				</div>
			</div>
		  <button type="submit" name="button-new-plan" class="create-plan">Создать план</button>
		  </form>
		</div>

		
		
	</main>
</body>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   <script src="/pages/ImproveFunctional/Planning/Planning-page.js"></script>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>





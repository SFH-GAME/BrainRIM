<?php
	include($_SERVER['DOCUMENT_ROOT']."/pages/ImproveFunctional/Planning/php/LogicToPlan.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/pages/ImproveFunctional/Planning/plansPages/css/firstPlan.css">
   <title>Document</title>
</head>
<body>
<div class="change-plan-body">
            <a href="/pages/ImproveFunctional/Planning/Planning-page.php" class="comeback-button back-to-planning"><ion-icon name="chevron-back-outline"></ion-icon></a>
		    	<div class="new-plan-title">План</div>
			<div class="new-plan-date-body">
				<div class="plan-date"><?php echo $valueFromDBPlan3['planDate'];?></div>
		   	<div class="date-icon"></div>
			</div>
			<form action="firstUserPlanBody.php" method="post">
			<input type="number" name="planNumber" class="planNumber" value="3">
			<div class="container plan-text-body">
			<!--<button type="submit" name="button-change" class="change-plan">Изменить</button>-->
    			<textarea readonly name="planTextArea" placeholder="" id="target" autocomplete="on" maxlength="200" ><?php echo $valueFromDBPlan3['planText'];?></textarea>
			</div>
		  <button type="submit" name="button-save-plan" class="save-plan">Выполнено</button>
		  <button type="submit" name="button-save-plan" class="delete-plan">Удалить</button>
			</form>
		</div>
</body>
<script src="/pages/ImproveFunctional/Planning/plansPages/js/firstPlan.js"></script>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</html>

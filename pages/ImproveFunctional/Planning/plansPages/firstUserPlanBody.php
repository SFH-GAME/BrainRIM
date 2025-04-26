<?php
	include($_SERVER['DOCUMENT_ROOT']."/pages/ImproveFunctional/Planning/php/LogicToPlan.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/pages/ImproveFunctional/Planning/plansPages/css/PlanBody.css">
   <link rel="stylesheet" href="/system/css/global.css?v=1.0">
   <title>Первый план</title>
</head>

<script>
		(function () {
		try {
			const userPref = localStorage.getItem('theme');
			let theme;
			if (userPref) {
				theme = userPref;
			} else {
				theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
			}
			document.documentElement.setAttribute('data-theme', theme);
		} catch (e) { }
		})();
</script>

<body>
<div class="change-plan-body">
            <a href="/pages/ImproveFunctional/Planning/Planning-page.php" class="comeback-button back-to-planning"><img src="/img/icons/chevron-back-outline.svg" class="img-icon" alt="иконка-назад" title="иконка-назад"></a>
		    	<div class="new-plan-title">План</div>
			<div class="new-plan-date-body">
				<div class="plan-date"><?php echo $valueFromDBPlan1['planDate'];?></div>
		   	<div class="date-icon"></div>
			</div>
			<form action="firstUserPlanBody.php" method="post">
			<input type="number" name="planNumber" class="planNumber" value="1">
			<div class="container plan-text-body">
			<!--<button type="submit" name="button-change" class="change-plan">Изменить</button>-->
    			<textarea readonly name="planTextArea" placeholder="" id="target" autocomplete="on" maxlength="200" ><?php echo $valueFromDBPlan1['planText'];?></textarea>
			</div>
		  <button type="submit" name="button-save-plan" class="save-plan">Выполнено</a></button>
		  <button type="submit" name="button-save-plan" class="delete-plan">Удалить</button>
			</form>
		</div>
</body>
<script src="/pages/ImproveFunctional/Planning/plansPages/js/PlanBody.js"></script>
</html>

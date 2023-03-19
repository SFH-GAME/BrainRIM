<?php
   
   include $_SERVER['DOCUMENT_ROOT']."/dataBase/surencyAndScore.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/pages/Profile-page/Profile.css">
	<title>Profile-page</title>
</head>

<body>
	<header>
		<a class="comeback-button" href="/index.php">
			<ion-icon name="chevron-back-outline"></ion-icon></a>
		<span class="page-name">Профиль</span>
		<ion-icon class="settings" name="ellipsis-vertical-outline"></ion-icon>
	</header>
	<main>
		<div class="profile-container">
			<div class="profile_first">
				<div class="profile-picture"><img class="Profilesvg" src="/img/Profile/Goodpict.svg" alt=""></div>
				<span class="profile-name">
					<?php if(isset($_SESSION['id'])): ?>
					<?php echo $_SESSION['login'];?>
					<?php else: ?>
					Логин
					<?php endif;?>
				</span>
			</div>
			<div class="currency">
				<div class="currencies memoney"><img class="money-pct" src="/img/Menu/Memoney.svg" alt="">
					<div class="count">
					<?php if(isset($_SESSION['id'])): ?>
                  <?php echo $memany['sum_memany']; ?>
                  <?php else: ?>
                  0
                  <?php endif;?>
					</div>
				</div>
				<div class="currencies hints"><img class="hints-pct" src="/img/Menu/Hints.svg" alt="">
					<div class="count">
					<?php if(isset($_SESSION['id'])): ?>
                  <?php echo $EyeScore['sum_eye_hint']; ?>
                  <?php else: ?>
                  0
                  <?php endif;?>
					</div>
				</div>
				<div class="currencies iq"><span class="iq-txt">IQ</span>
					<div class="count">
					<?php if(isset($_SESSION['id'])): ?>
                  <?php echo $IQscore['sum_iq']; ?>
                  <?php else: ?>
                  0
                  <?php endif;?>
					</div>
				</div>
			</div>
			<div class="statistics">
				<span class="button zvanie">Новичок</span>
				<span class="button zvanie">?</span>
				<a href="#"
					class="button statistic-page">Статистика<ion-icon name="stats-chart"></ion-icon></a>
				<a href="<?php echo "/dataBase/logOut.php";?>" class="leave">Выйти</a>
			</div>
		</div>
	</main>

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script src="/pages/Profile-page/Profile.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width">
      <link rel="stylesheet" href=" /pages/page-registration/css/registration-page.css">
      <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
      <title>registration-page</title>
</head>

<body>
      <?php  include("C:\ospanel\domains\mem.com\dataBase\db.php"); ?>
      <div class="pg-registr-container">
            <header>
                  <a href="/index.php" class="scip-pg-registr">Пропустить</a>
            </header>
            <div class="pg-registr-title"><ion-icon class="reg-icon" name="id-card-outline"></ion-icon>Регистрация</div>
            <div class="alerts-container">
                  <?php
                        if($userAlreadyHave == true):
                  ?>
                  <div class="alert-user-already-have">Такой логин уже занят!</div>
                  <?php endif;?>
            </div>
            <main>

                  <form action="/dataBase/check.php" method="post">
                        <input type="text" class="form-control" name="login" id="login" placeholder="Логин">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Имя">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Пароль">
                        <button type="submit" class="btn btn-send">Отправить</button>
                  </form>

                  <div class="bttn-authorisation">Авторизация</div>
            </main>
      </div>
      <div class="pg-authoris-container">
            <header>
                  <a href=" /index.php" class="scip-pg-registr">Пропустить</a>
            </header>
            <div class="pg-registr-title"><ion-icon class="reg-icon" name="id-card-outline"></ion-icon>Авторизация</div>
            <main>

                  <form action=" /dataBase/auth.php" method="post">
                        <input type="text" class="form-control" name="login" id="login" placeholder="Логин">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Пароль">
                        <a href="#" class="forgot-pass">Забыли пароль?</a>
                        <button type="submit" class="btn btn-send">Отправить</button>
                  </form>

                  <div class="bttn-registr">Регистрация</div>
            </main>
      </div>
      
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src=" /pages/page-registration/registration-page.js"></script>

</html>
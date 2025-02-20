<?php
   
   include $_SERVER['DOCUMENT_ROOT']."/dataBase/db.php";

   $errorMsg = '';

   function userAuth ($array) {
      $_SESSION['id'] = $array['id'];
      $_SESSION['login'] = $array['login'];
      $_SESSION['admin'] = $array['admin'];
   }
   
   //код для формы регистрации
   if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
         $login = trim($_POST['login']);
         $email = trim($_POST['email']);
         $pass = trim($_POST['pass']);
         $admin = 0; 

         if($login === '' || $pass === '' || $email === ''){
            $errorMsg = "Не все поля заполнены";
         }else if(mb_strlen($login, 'UTF8') < 2){
            $errorMsg = 'Логин должен быть длиннее двух символов';
         }else if(mb_strlen($login, 'UTF8') < 2){
            $errorMsg = 'Логин должен быть длиннее двух символов';
         }else{
            $existence = selectOne('users', ['email' => $email]);
            if($existence['email'] == $email){
               $errorMsg = 'Пользователь с этой почтой уже есть';
            }else{
               //код при успешн рег
               $pass = password_hash($pass, PASSWORD_DEFAULT);
               $post = [
                  'admin' => $admin,
                  'login' => $login,
                  'pass' => $pass,
                  'email' => $email
               ];
               $id = insert('users',$post);
               $user =selectOne('users', ['id' => $id]);


               //должно создавать новую строку со счётом memany с id пользователя
               $currencyMemany = [
                  'user_id' => $id,
                  'sum_memany' => 0
               ];
               insert('Memany',$currencyMemany);
               //должно создавать новую строку со счётом Подсказок Глаз с id пользователя
                $currencyEyeHint = [
                   'user_id' => $id,
                   'sum_eye_hint' => 0
                ];
                insert('hintEye',$currencyEyeHint);
                //должно создавать новую строку со счётом iq с id пользователя
                $currencyIQscore = [
                  'user_id' => $id,
                  'sum_iq' => 0
               ];
               insert('IQscore',$currencyIQscore);
               $userLvlValue = [
                  'user_id' => $id
               ];
               insert('usersLvl',$userLvlValue);
               $dataForComparison = [
                  'user_id' => $id,
                  'lastSaveDate' => '2022-02-24 02:00:22',
                  'rusWordsCount' => 1,
                  'historyFactsCount' => 2,
                  'engWordsCount' => 3
               ];
               insert('dateForComparison',$dataForComparison);
               userAuth($user);

               //записываем достижение в БД
               require_once $_SERVER['DOCUMENT_ROOT'].'/dataBase/achievments/achievments.php';
               checkAllAchievements($id);
               
               header('location: /index.php');


               //функция для оповещения о новой регистрации в канале ТГ
               function sendTelegramMessage($chatId, $message, $token) {
                  $url = "https://api.telegram.org/bot{$token}/sendMessage";
                  $data = [
                      'chat_id' => $chatId,
                      'text' => $message,
                  ];
                  $options = [
                      'http' => [
                          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                          'method'  => 'POST',
                          'content' => http_build_query($data),
                      ],
                  ];
                  $context  = stream_context_create($options);
                  file_get_contents($url, false, $context);
              }
              
              $token = '7768419147:AAFOkr_gRotalDyLrjQWkMuHfAJf3AXre24';
              $chatId = '@NEWREGISTRATIONBRAINRIM';
              $userData = [
                  'username' => $login,
                  'email' => $email,
                  'registration_date' => date('Y-m-d H:i:s'),
              ];
              $message = "Новый пользователь зарегистрирован:\n\n";
              $message .= "Имя: " . $userData['username'] . "\n";
              $message .= "Email: " . $userData['email'] . "\n";
              $message .= "Дата регистрации: " . $userData['registration_date'];
              
              sendTelegramMessage($chatId, $message, $token);
            }
         }
   }else{
      $login = '';
      $email = '';
   }

     
   //код для формы авторизации
   if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){
      $email = trim($_POST['email']);
      $pass = trim($_POST['pass']);
      if($email === '' || $pass === ''){
         $errorMsg = "Не все поля заполнены";
      }else{
         $existence = selectOne('users', ['email' => $email]);
         //tt($existence);
         if($existence && password_verify($pass, $existence['pass'])){
            userAuth($existence);
            header('location: /index.php');
         }else{
            //ошибка авторизации
            $errorMsg = 'Почта или пароль введены не верно';
         }
      }

   }else{
      $email = '';
      
   }
      
     
?>
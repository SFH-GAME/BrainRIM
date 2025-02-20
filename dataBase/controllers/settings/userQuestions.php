<?php
   include($_SERVER['DOCUMENT_ROOT']."/dataBase/controllers/users.php"); 

   if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-send-questions'])){
   
      
      $questionValue = htmlspecialchars($_POST['questoinValue']);
      tt($value);
      $submitData = [
         'user_id' => $_SESSION['id'],
         'question' => $questionValue
      ];
      insert('usersQuestions',$submitData);
     

   }
?>
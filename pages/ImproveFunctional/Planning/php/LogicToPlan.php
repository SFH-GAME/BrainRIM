<?php
   
   include($_SERVER['DOCUMENT_ROOT']."/dataBase/controllers/users.php"); 

   $errorMsg = '';
   
   //код для нового плана
   if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-new-plan'])){
      $planNumber = htmlspecialchars($_POST['planNumber']);
      $planText = htmlspecialchars($_POST['planTextArea']);
      $planDate = htmlspecialchars($_POST['planDateValue']);
      $submitData = [//отправляем эти данные в базу 
         'planNumber' => $planNumber,
         'user_id' => $_SESSION['id'],
         'planText' => $planText,
         'planDate' => $planDate
      ];
         if($planText === '' || $planDate === ''){//проверка на пустые данные
            $errorMsg = "Не все поля заполнены";
         }else{
            insert('userListPlans',$submitData);
         }
   }

   //код на обнуление информации
   if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-save-plan'])){
      $planNumber = htmlspecialchars($_POST['planNumber']);
      delete('userListPlans',$planNumber);
   }
      
   //$userPlanFromDB = selectAll('userListPlans', ['user_id' => $_SESSION['id']]);
   //tt($userPlanFromDB);

   $planNumbers = selectAll('userListPlans', ['user_id' => $_SESSION['id']]); // Замените 'your_table_name' на имя вашей таблицы

   foreach ($planNumbers as $row) {//записи данных из БД в переменные по условиям
      if ($row['planNumber'] == 1) {
         $valueFromDBPlan1 = $row;
       }
       if ($row['planNumber'] == 2) {
         $valueFromDBPlan2 = $row;
       }
       if ($row['planNumber'] == 3) {
         $valueFromDBPlan3 = $row;
       }
       if ($row['planNumber'] == 4) {
         $valueFromDBPlan4 = $row; 
       }
   }

   $planNumber1 = null;//в эти переменные записываю массивы по номеру плана
   $planNumber2 = null;
   $planNumber3 = null;
   $planNumber4 = null;

   
   
   foreach ($planNumbers as $row) {
      if ($row['planNumber'] == 1) {
         $planNumber1 = $row;
         
       }
       if ($row['planNumber'] == 2) {
         $planNumber2 = $row;
       }
       if ($row['planNumber'] == 3) {
         $planNumber3 = $row;
       }
       if ($row['planNumber'] == 4) {
         $planNumber4 = $row; 
       }
   }

   $planData1 = $planNumber1['planDate'];
   $planData2 = $planNumber2['planDate'];
   $planData3 = $planNumber3['planDate'];
   $planData4 = $planNumber4['planDate'];


?>

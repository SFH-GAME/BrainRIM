<?php
include $_SERVER['DOCUMENT_ROOT']."/dataBase/surencyAndScore.php";
// This is the server-side script.

// Set the content type.
header('Content-Type: text/plain');

$ajaxValue['currencyValue'] = $_POST['currencyValue'];
echo json_encode($ajaxValue);

$needMemoney = $ajaxValue['currencyValue'] / 8;

if($memoneyValue >= $needMemoney){//смотрит на количесво монет у пользователя ,отнимает и доваляет
   $minusMemoney = ['sum_memany' => $memany['sum_memany']-$needMemoney];
   updateTo('Memany',$_SESSION['id'],$minusMemoney);

   $eyeUpdate = ['sum_eye_hint' => $EyeScore['sum_eye_hint']+$ajaxValue['currencyValue']];
   updateTo('hintEye',$_SESSION['id'],$eyeUpdate);
}

?>
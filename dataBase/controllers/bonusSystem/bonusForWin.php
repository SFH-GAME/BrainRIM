<?php
include $_SERVER['DOCUMENT_ROOT']."/dataBase/surencyAndScore.php";

// This is the server-side script.

// Set the content type.
header('Content-Type: text/plain');

$ajaxValue['IqUpForModeAjax'] = $_POST['IqUpForModeAjax'];

echo json_encode($ajaxValue);


$sumIQ = ['sum_iq' => $IQscore['sum_iq']+$ajaxValue['IqUpForModeAjax']];
updateTo('IQscore',$_SESSION['id'],$sumIQ);
?>


<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php";
// Увеличивает IQ пользователя в базе

header('Content-Type: text/plain');

$ajaxValue['IqUpForModeAjax'] = $_POST['IqUpForModeAjax'];
echo json_encode($ajaxValue);

$sumIQ = ['sum_iq' => $IQscore['sum_iq'] + $ajaxValue['IqUpForModeAjax']];
updateTo('IQscore', $_SESSION['id'], $sumIQ);

?>
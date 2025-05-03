<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php";
// Увеличивает IQ пользователя в базе

header('Content-Type: text/plain');

$ajaxValue['MoneyUpForModeAjax'] = $_POST['MoneyUpForModeAjax'];
echo json_encode($ajaxValue);

$sumMoney = ['sum_memany' => $memany['sum_memany'] + $ajaxValue['MoneyUpForModeAjax']];
updateTo('Memany', $_SESSION['id'], $sumMoney);

?>
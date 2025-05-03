<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php";
// Увеличивает IQ пользователя в базе

header('Content-Type: text/plain');

$ajaxValue['HintsUpForModeAjax'] = $_POST['HintsUpForModeAjax'];
echo json_encode($ajaxValue);

$sumHints = ['sum_eye_hint' => $EyeScore['sum_eye_hint'] + $ajaxValue['HintsUpForModeAjax']];
updateTo('hintEye', $_SESSION['id'], $sumHints);

?>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dataBase/achievments/achievments.php");

header('Content-Type: text/plain');

$ajaxValue['expUpForModeAjax'] = $_POST['expUpForModeAjax'];


echo json_encode($ajaxValue);


$experienceValue = ['experience' => $level['experience'] + $ajaxValue['expUpForModeAjax']];

updateTo('usersLvl', $_SESSION['id'], $experienceValue);

checkAllAchievements($_SESSION['id']);

?>
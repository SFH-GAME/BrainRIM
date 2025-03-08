<?php
include($_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/dataBase/achievments/achievments.php");

header('Content-Type: text/plain');

$modeIdValue['win'] = $_POST['win'];
$modeIdValue['loose'] = $_POST['loose'];
$modeIdValue['time_sec'] = $_POST['time_sec'];
$modeIdValue['score'] = $_POST['score'];

echo json_encode($modeIdValue);

$resultsData = [
   'user_id' => $_SESSION['id'],
   'win' => $modeIdValue['win'],
   'loose' => $modeIdValue['loose'],
   'time_sec' => $modeIdValue['time_sec'],
   'score' => $modeIdValue['score']
];

insert('game_2048_results', $resultsData);

// Проверяем достижение "20 000 очков в 2048"
check2048Achievement($_SESSION['id'], $_POST['score']);


?>
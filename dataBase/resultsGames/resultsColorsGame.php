<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");

header('Content-Type: text/plain');

$modeIdValue['modeID'] = $_POST['modeID'];
$modeIdValue['win'] = $_POST['win'];
$modeIdValue['loose'] = $_POST['loose'];
$modeIdValue['time_sec'] = $_POST['time_sec'];
$modeIdValue['rightAnswerValue'] = $_POST['rightAnswerValue'];

echo json_encode($modeIdValue);

$resultsData = [
   'user_id' => $_SESSION['id'],
   'mode_id'  => $modeIdValue['modeID'],
   'win' => $modeIdValue['win'],
   'loose' => $modeIdValue['loose'],
   'time_sec' => $modeIdValue['time_sec'],
   'rightAnswer' => $modeIdValue['rightAnswerValue']
];

 insert('game_colors_results',$resultsData);



?>
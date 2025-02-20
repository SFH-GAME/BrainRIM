<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");

header('Content-Type: text/plain');

$modeIdValue['modeID'] = $_POST['modeID'];
$modeIdValue['win'] = $_POST['win'];
$modeIdValue['loose'] = $_POST['loose'];
$modeIdValue['time_sec'] = $_POST['time_sec'];
$modeIdValue['opened_cards'] = $_POST['opened_cards'];

echo json_encode($modeIdValue);

$resultsData = [
   'user_id' => $_SESSION['id'],
   'mode_id'  => $modeIdValue['modeID'],
   'win' => $modeIdValue['win'],
   'loose' => $modeIdValue['loose'],
   'time_sec' => $modeIdValue['time_sec'],
   'opened_cards' => $modeIdValue['opened_cards']
];

 insert('game_img_results',$resultsData);



?>
<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");

header('Content-Type: text/plain');

$modeIdValue['win'] = $_POST['win'];
$modeIdValue['loose'] = $_POST['loose'];
$modeIdValue['time_sec'] = $_POST['time_sec'];
$modeIdValue['level'] = $_POST['level'];

echo json_encode($modeIdValue);

$resultsData = [
   'user_id' => $_SESSION['id'],
   'win' => $modeIdValue['win'],
   'loose' => $modeIdValue['loose'],
   'time_sec' => $modeIdValue['time_sec'],
   'level' => $modeIdValue['level']
];

 insert('game_maze_results',$resultsData);

?>
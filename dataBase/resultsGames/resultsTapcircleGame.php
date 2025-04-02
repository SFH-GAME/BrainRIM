<?php
include($_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");

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

insert('game_tapcircle_results', $resultsData);


?>
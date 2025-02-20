<?php
include $_SERVER['DOCUMENT_ROOT']."/dataBase/surencyAndScore.php";
// This is the server-side script.

// Set the content type.
header('Content-Type: text/plain');


// Send the data back.
$minusHints = ['sum_eye_hint' => $EyeScore['sum_eye_hint']-1];
updateTo('hintEye',$_SESSION['id'],$minusHints);
?>
<?php
include ( $_SERVER['DOCUMENT_ROOT'] . "/dataBase/surencyAndScore.php");

header('Content-Type: text/plain');

$levelValue = ['Level' => $level['Level']+1];
updateTo('usersLvl',$_SESSION['id'],$levelValue);

$experienceValue = ['experience' => 0];

updateTo('usersLvl',$_SESSION['id'],$experienceValue);

$nextExpValue = ['nextLvlExp' => $level['nextLvlExp']+50];
updateTo('usersLvl',$_SESSION['id'],$nextExpValue);

// Проверяем достижение "Достигнуть 3 уровня"
$file = $_SERVER['DOCUMENT_ROOT'].'/dataBase/achievments/achievments.php';
if (!file_exists($file)) {
    die("Ошибка: файл $file не найден!");
}
require_once $file;
echo "Файл achievements.php подключен!<br>";
checkLevelAchievement($_SESSION['id']);

?>
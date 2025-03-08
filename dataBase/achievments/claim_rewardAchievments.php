<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/dataBase/db.php"; // Файл подключения к базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . "/dataBase/achievments/achievments.php"; // Файл с функциями getUserAchievements, updateAchievement, claimReward

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['id'])) {
    echo json_encode(['success' => false, 'message' => 'Пользователь не авторизован.']);
    exit;
}

$user_id = $_SESSION['id'];

if (isset($_POST['achievement_id'])) {
    $achievement_id = intval($_POST['achievement_id']);
    $result = claimReward($user_id, $achievement_id);
    echo json_encode($result);
    exit;
} else {
    echo json_encode(['success' => false, 'message' => 'Неверные параметры.']);
    exit;
}
?>
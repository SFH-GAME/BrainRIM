<?php
// Начало сессии
session_start();

// Удаление данных из сессии
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['admin']);

// Уничтожение сессии
session_destroy(); // Полностью уничтожает данные сессии на сервере

// Удаление cookie сессии
setcookie(session_name(), '', time() - 3600, '/');

// Перенаправление на главную страницу
header('Location: /index.php');
exit; // Прекращение выполнения скрипта
?>
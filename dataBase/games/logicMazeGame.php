<?php
include $_SERVER['DOCUMENT_ROOT'] . "/dataBase/controllers/users.php";

//Запрос на получение одной строки с выбранной таблицы
function select($table, $params = [])
{
   global $pdo;
   $sql = "SELECT * FROM $table";

   if (!empty($params)) {
      $i = 0;
      foreach ($params as $key => $value) {
         if (!is_numeric($value)) {
            $value = "'" . $value . "'";
         }
         if ($i === 0) {
            $sql = $sql . " WHERE $key = $value";
         } else {
            $sql = $sql . " AND $key = $value";
         }
         $i++;
      }
   }
   $query = $pdo->prepare($sql);
   $query->execute();

   dbCheckError($query);
   return $query->fetch();
}
//Обновление данных в таблице
function updateTo($table, $id, $params)
{
   global $pdo;
   $i = 0;
   $str = '';
   foreach ($params as $key => $value) {
      if ($i === 0) {
         $str = $str . $key . " = '" . $value . "'";
      } else {

         $str = $str . ", " . $key . " = '" . $value . "'";
      }
      $i++;
   }

   $sql = "UPDATE $table SET $str WHERE user_id = $id;";
   $query = $pdo->prepare($sql);
   $query->execute($params);
   dbCheckError($query);
}

$allUserResults = selectAll('game_maze_results', ['user_id' => $_SESSION['id']]);

$arrBestUserLevel = null;
$maxlevel = -1; // Устанавливаем начальное значение переменной для сравнения
$arrBestUserResultTime = null;
$maxTime = -1;
$bestUserResultTime = null;

foreach ($allUserResults as $row) {//выбираем самый лучший рещультат
   if ($row['level'] > $maxLevel) {
      $maxLevel = $row['level'];
      $arrBestUserLevel = $row;
      $bestUserLevel = $arrBestUserLevel['level'];
   }
}
foreach ($allUserResults as $row) {//выбираем самый лучший рещультат
   if ($row['time_sec'] > $maxTime) {
      $maxTime = $row['time_sec'];
      $arrBestUserResultTime = $row;
      $bestUserResultTime = $arrBestUserResultTime['time_sec'];
   }
}
?>
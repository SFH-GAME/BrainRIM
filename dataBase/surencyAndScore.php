<?php 
   include $_SERVER['DOCUMENT_ROOT']."/dataBase/controllers/users.php";

//Запрос на получение одной строки с выбранной таблицы
function select($table,$params = []){
   global $pdo;
   $sql = "SELECT * FROM $table";
 
   if(!empty($params)){
      $i = 0;
      foreach($params as $key => $value){
         if(!is_numeric($value)){
            $value = "'".$value."'";
         }
         if($i === 0){
            $sql = $sql . " WHERE $key = $value";
         }else{
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
function updateTo($table, $id ,$params){
   global $pdo;
   $i = 0;
   $str ='';
   foreach($params as $key => $value){
      if($i === 0){
         $str = $str.$key." = '".$value. "'";
      }else{
      
         $str = $str. ", ".$key." = '".$value."'";
      }
      $i++;
   }

   $sql = "UPDATE $table SET $str WHERE user_id = $id;";
   $query = $pdo->prepare($sql);
   $query->execute($params);
   dbCheckError($query);
}

$level = selectOne('usersLvl', ['user_id' => $_SESSION['id']]);

$memany = select('Memany', ['user_id' => $_SESSION['id']]);
$IQscore = select('IQscore', ['user_id' => $_SESSION['id']]);
$EyeScore = select('hintEye', ['user_id' => $_SESSION['id']]);
$userInfo = select('users', ['id' => $_SESSION['id']]);
$dateForComparison = select('dateForComparison',['user_id' => $_SESSION['id']]);
$rusDayWord = selectAll('rusWords');
$historyFacts = selectAll('historyFacts');
$engDayWord = selectAll('engWords');

$hintsValue = $EyeScore['sum_eye_hint'];
$memoneyValue = $memany['sum_memany'];
$eyeValue = $EyeScore['sum_eye_hint'];
$levelValue = $level['Level'];
$expValue = $level['experience'];
$nextLvlExpValue = $level['nextLvlExp'];
$receiveGiftValue = $userInfo['recevedGift'];
$viewedPopUpValue = $userInfo['lookedIntro'];
$insertRusWord;
$rusWordsCount = $dateForComparison['rusWordsCount'];
$historyFactsCount = $dateForComparison['historyFactsCount'];
$engWordsCount = $dateForComparison['engWordsCount'];

// Получаем список всех ID, сортируем их
$rusWordsIds = array_column($rusDayWord, 'id');
$historyFactsIds = array_column($historyFacts, 'id');
$engWordsIds = array_column($engDayWord, 'id');

sort($rusWordsIds);
sort($historyFactsIds);
sort($engWordsIds);

// Определяем текущий индекс в массиве (если ID нет в списке, берём первый)
$rusIndex = array_search($rusWordsCount, $rusWordsIds);
$historyIndex = array_search($historyFactsCount, $historyFactsIds);
$engIndex = array_search($engWordsCount, $engWordsIds);

if ($rusIndex === false) $rusIndex = 0;
if ($historyIndex === false) $historyIndex = 0;
if ($engIndex === false) $engIndex = 0;

// Получаем текущие значения
$insertRusWord = $rusDayWord[$rusIndex]['word'] ?? "Нет данных";
$insertHistoryFact = $historyFacts[$historyIndex]['fact'] ?? "Нет данных";
$insertEngWord = $engDayWord[$engIndex]['word'] ?? "Нет данных";


// Ежедневное изменение параметров
$currentDateTime = date('Y-m-d H:i:s');
$lastDateTime = $dateForComparison['lastSaveDate'];

$current = new DateTime($currentDateTime);
$last = new DateTime($lastDateTime);
$interval = $current->diff($last);

// Проверяем, прошло ли 24 часа
if ($interval->h >= 24 || $interval->d >= 1) {
    // Обновляем дату в базе данных
    $lastDateTime = $current->format('Y-m-d H:i:s');
    update('dateForComparison', $_SESSION['id'], ['lastSaveDate' => $lastDateTime]);

    // Если прошло 24 часа, обновляем дату и переключаем параметры
if ($interval->h >= 24 || $interval->d >= 1) {
   update('dateForComparison', $_SESSION['id'], ['lastSaveDate' => $current->format('Y-m-d H:i:s')]);

   // Переход к следующему ID (циклично)
   $rusIndex = ($rusIndex + 1) % count($rusWordsIds);
   $historyIndex = ($historyIndex + 1) % count($historyFactsIds);
   $engIndex = ($engIndex + 1) % count($engWordsIds);

   update('dateForComparison', $_SESSION['id'], [
       'rusWordsCount' => $rusWordsIds[$rusIndex],
       'historyFactsCount' => $historyFactsIds[$historyIndex],
       'engWordsCount' => $engWordsIds[$engIndex]
   ]);
}

}
?>

<?php 

// Подключаемся к базе данных (важно сделать это до регистрации обработчиков сессий)
require('connect.php');

// Настройка времени жизни сессии (30 дней)
session_set_cookie_params([
    'lifetime' => 2592000, // 30 дней в секундах
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => isset($_SERVER['HTTPS']), // Включить только для HTTPS
    'httponly' => true,
    'samesite' => 'Lax'
]);

// Обработчики сессий
function openSession($savePath, $sessionName) {
    return true;
}

function closeSession() {
    return true;
}

function readSession($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT data FROM sessions WHERE id = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchColumn();
    return $result ?: '';
}

function writeSession($id, $data) {
    global $pdo;
    $stmt = $pdo->prepare(
        "REPLACE INTO sessions (id, data, last_access) VALUES (:id, :data, NOW())"
    );
    $stmt->execute(['id' => $id, 'data' => $data]);
    return true;
}

function destroySession($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM sessions WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return true;
}

function gcSession($maxLifetime) {
    global $pdo;
    $stmt = $pdo->prepare(
        "DELETE FROM sessions WHERE last_access < NOW() - INTERVAL :maxLifetime SECOND"
    );
    $stmt->execute(['maxLifetime' => $maxLifetime]);
    return true;
}

// Регистрируем функции для обработки сессий
session_set_save_handler(
    "openSession",
    "closeSession",
    "readSession",
    "writeSession",
    "destroySession",
    "gcSession"
);

session_start();

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

//Проверка выполнения запроса к БД
function dbCheckError($query){
   $errorInfo = $query->errorInfo();
   if($errorInfo[0] !== PDO::ERR_NONE) {
      echo $errorInfo[2];
      exit();
   }
   return true;
}

//Запрос на получение данных одной таблицы
function selectAll($table,$params = []){
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
   return $query->fetchAll();
}


//Запрос на получение одной строки с выбранной таблицы
function selectOne($table,$params = []){
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

//Запись в БД
function insert($table,$params){
   global $pdo;
   $i = 0;
   $coll ='';
   $mask = '';
   foreach($params as $key => $value){
      if($i === 0){ 
         $coll = $coll."$key";
         $mask = $mask."'"."$value"."'";
      }else{
         $coll = $coll." ,$key";
         $mask = $mask.", '"."$value"."'";
      }
      $i++;
   }

   $sql = "INSERT INTO $table ($coll) VALUES ($mask);";

   $query = $pdo->prepare($sql);
   $query->execute($params);
   dbCheckError($query);
   return $pdo->lastInsertId();
}

$arrData = [
   'login' => 'galina',
   'pass'  => '2389uxx37r873r',
   'email'  => 'lisa',
   'admin' => '0',
   'created' => '2023-02-13 19:35:14'
];

//insert('users',$arrData);


//Обновление данных в таблице
function update($table, $id ,$params){
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

// $param = [
//    'admin' => '0',
//    'pass'  => '55555',
//    'login' => 'dura435'

// ];

// update('users',22,$param);


//Удаление данных в таблице
function delete($table, $planNum ){
   global $pdo;
   
   $sql = "DELETE FROM $table WHERE planNumber = $planNum;";
   $query = $pdo->prepare($sql);
   $query->execute($params);
   dbCheckError($query);
}

// $param = [
//    'admin' => '0',
//    'pass'  => '55555',
//    'login' => 'dura435'

// ];

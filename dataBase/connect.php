<?php
$DRIVER = 'mysql';
$DBLOGIN = 'root';
$DBPASS = '';
$DBHOST = 'localhost';
$DBDATA = 'projectDB';
$CHARSET = 'utf8mb4';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];


try{
   $pdo = new PDO("$DRIVER:host=$DBHOST;dbname=$DBDATA;charset=$CHARSET",$DBLOGIN,$DBPASS,$options
   );
}catch(PDOException $i){
   die("Ошибка подключения к бд");
}
?>
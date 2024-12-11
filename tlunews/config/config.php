<?php
define('APP_ROOT', dirname(__FILE__, 3));
define('DOMAIN', 'http://localhost:8080/BaiThucHanh2/CSE485Lab2/');


function getConnect(){
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'tlunews';

    try{
        $conn = new PDO("mysql:host=$host;dbname=$database",$user,$pass);

        return $conn;
    }
    catch(PDOException $e){
        return $e->getMessage();
    }
}
?>
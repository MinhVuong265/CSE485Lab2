<?php


class DatabaseService{
    public function getConnect(){
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'tlunews';

        $conn = new PDO("mysql:host=$host;dbname=$database", $user, $pass);

        return $conn;
    }
}

?>
<?php
// include '../config/config.php';
require_once APP_ROOT . '/tlunews/models/user.php';

class UserService{

    public function getAllUser(){

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'tlunews';

        
        try{
            $conn = new PDO("mysql:host=$host;dbname=$database",$user,$pass);
            // $sqlString = "SELECT * FROM users";
            $sqlString = "SELECT * FROM users WHERE username = :username and password = :password";
            $stmt = $conn->prepare($sqlString);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            $users = [];
            while($row = $stmt->fetch()){
                $user = new user($row['id'], $row['username'], $row['password'], $row['role']);
                $users[] = $user;
        }
            return $users;

        }
        catch(PDOException){
            return $users = [];
        }
    }

    public function getUser($username, $password){
        $conn = getConnect();

        $query = "SELECT * FROM users WHERE username = :username";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);

        $stmt->execute();

        while($row = $stmt->fetch()){
            $user = new user($row['id'], $row['username'], $row['password'], $row['role']);
        }
        return $user;

        // if($user->getPassword() == $password){
        //     return true;
        // }
        // else return false;
        
    }
}


?>
<?php
include '../config/config.php';
require_once APP_ROOT . '/tlunews/services/UserService.php';
session_start();


$userService = new UserService();

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $userService->getUser($username,$password);
    if($user->getPassword() == $password){
        $_SESSION['isLoggined'] = $username;
        header("Location:../index.php");
    }
    else{
        header("Location:../views/user/login.php?=messageInvalid username or password");
    }
}


?>
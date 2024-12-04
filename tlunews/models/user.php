<?php

session_start();
if (isset($_POST['login'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if ($user == 'admin' && $pass == 'admin') {
            $_SESSION['isLoggined'] = 'admin';
            header("Location: ../views/home/index.php");
        } else {
            header("Location: ../login.php?message=Invalid username or password");
        }
    }
else if(isset($_POST['signup'])){
    if($_POST['password'] == $_POST['conf_password']){
        //query dang ky
    }
}
}

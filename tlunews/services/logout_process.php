<?php
session_start();

if(isset($_SESSION['isLoggined'])){
    unset($_SESSION['isLoggined']);
    header("Location: ../index.php");
}

?>
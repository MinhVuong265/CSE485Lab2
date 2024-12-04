<?php
    
    if(!isset($_SESSION['isLoggined'])){
        header("Location: ../../login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>News</h1>
    <a href="">Logout</a>
</body>
</html>

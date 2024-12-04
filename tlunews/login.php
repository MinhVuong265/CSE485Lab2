<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="./models/user.php" method="post">
        UserName: <input type="text" name="username" id="username"><br>
        Password: <input type="password" name="password" id="password"><br>
        <button type="submit" name="login">Login</button><br>
        Haven't have an account? <a href="signup.php">Signup</a>
    </form>
</body>
</html>

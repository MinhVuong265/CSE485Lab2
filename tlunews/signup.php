<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="./models/user.php" method="post">
        UserName: <input type="text" name="username" id="username" require><br>
        Password: <input type="password" name="password" id="password" require><br>
        Confirm Password <input type="password" name="conf_password" require><br>
        <button type="submit" name="signup">Signup</button>
    </form>
</body>
</html>
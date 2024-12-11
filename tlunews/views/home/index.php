<?php
session_start();
// require_once APP_ROOT.'';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tin tức</title>

</head>
<body>
<?php
  if (isset($_SESSION['isLoggined'])) {
      echo '<b>' . htmlspecialchars($_SESSION['isLoggined']) . '</b><br>';
      echo '<a href="' . DOMAIN . 'tlunews/services/logout_process.php" class="btn btn-warning">Đăng xuất</a>';
  } else {
      echo '<a href="' . DOMAIN . 'tlunews/views/user/login.php" class="btn btn-success">Đăng nhập</a>';
  }
?>

    
    <h1>News</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">context</th>
      <th scope="col">create_at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($newsList as $news) : ?>
    <tr>
      <th scope="row"><?=$news->getId();?></th>
      <td><?=$news->getTitle();?></td>
      <td><?=$news->getContext();?></td>
      <td><?=$news->getCreate_at();?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

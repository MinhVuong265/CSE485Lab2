<?php
include 'db.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM news WHERE id = $id";
$result = $conn->query($sql);
$news = $result->fetch_assoc();

if (!$news) {
    die("Không tìm thấy tin tức!");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($news['title']); ?></title>
</head>
<body>
    <h1><?php echo htmlspecialchars($news['title']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($news['content'])); ?></p>
    <p><a href="index.php">Quay lại danh sách</a></p>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List</title>
</head>
<body>
    <h1>News List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Context</th>
                <th>Category</th>
                <th>Create At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Kết nối database
            $conn = new mysqli("localhost", "root", "", "TluNews");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Truy vấn dữ liệu
            $sql = "SELECT news.id, news.title, news.context, categories.name AS category_name, news.create_at 
                    FROM news 
                    INNER JOIN categories ON news.category_id = categories.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>" . substr($row['context'], 0, 50) . "...</td>";
                    echo "<td>{$row['category_name']}</td>";
                    echo "<td>{$row['create_at']}</td>";
                    echo "<td>
                        <a href='edit.php?id={$row['id']}'>Edit</a> |
                        <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No news found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>


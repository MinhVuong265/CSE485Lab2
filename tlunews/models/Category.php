<?php
// Kết nối database
$conn = new mysqli("localhost", "root", "", "TluNews");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Thêm mới category
if (isset($_POST['add_category'])) {
    $category_name = $conn->real_escape_string($_POST['category_name']);
    $conn->query("INSERT INTO categories (name) VALUES ('$category_name')");
    header("Location: admin_categories.php");
    exit;
}

// Xoá category
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM categories WHERE id = $id");
    header("Location: admin_categories.php");
    exit;
}

// Sửa category
if (isset($_POST['edit_category'])) {
    $id = (int)$_POST['id'];
    $category_name = $conn->real_escape_string($_POST['category_name']);
    $conn->query("UPDATE categories SET name = '$category_name' WHERE id = $id");
    header("Location: admin_categories.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f9;
        }
        form {
            margin-bottom: 20px;
        }
        input, button {
            padding: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>Manage Categories</h1>

    <!-- Form thêm mới category -->
    <form method="POST" action="admin_categories.php">
        <input type="text" name="category_name" placeholder="Enter new category name" required>
        <button type="submit" name="add_category">Add Category</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Hiển thị danh sách categories
            $result = $conn->query("SELECT * FROM categories ORDER BY id ASC");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>
                        <form method='POST' action='admin_categories.php' style='display:inline;'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input type='text' name='category_name' value='{$row['name']}' required>
                            <button type='submit' name='edit_category'>Edit</button>
                        </form>
                        <a href='admin_categories.php?delete={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No categories found.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>

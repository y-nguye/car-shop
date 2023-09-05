<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Đăng Nhập</h2>
    <form method="post" action="login.php">
        <label for="username">Tên Đăng Nhập:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mật Khẩu:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Đăng Nhập">
    </form>
</body>

</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kết nối đến cơ sở dữ liệu (thay đổi các thông số kết nối tùy theo cấu hình)
    $db = new mysqli("localhost", "username", "password", "database");

    if ($db->connect_error) {
        die("Kết nối thất bại: " . $db->connect_error);
    }

    // Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập
    $sql = "SELECT id, username, password FROM Users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($password, $row["password"])) {
        // Đăng nhập thành công
        $_SESSION["user_id"] = $row["id"];
        header("Location: index.php");
        exit();
    } else {
        // Đăng nhập thất bại
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }

    $stmt->close();
    $db->close();
}
?>
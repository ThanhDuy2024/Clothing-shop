<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM account";
    $result = mysqli_query($conn, $sql);
    $num_rows = $result->num_rows;

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $Phone = mysqli_real_escape_string($conn, $_POST['email']);
    $sql = "SELECT * FROM account WHERE UserName = '$username'";
    $result = mysqli_query($conn, $sql);
    mysqli_num_rows($result);
    if(mysqli_num_rows($result) > 0){
        echo "tên người dùng đã tồn tại!";
    }
    else if($password != $password_1){
        echo "không đúng mật khẩu";
    }
    else{
        $sql = "INSERT INTO account (user_id, UserName, Email, Password, Phone, created_at, update_at, role) 
            VALUES ($num_rows + 1, '$username', '$email', '$password','$Sdt', NOW(), NOW(), 'user')";
        if (mysqli_query($conn, $sql)) {
            echo "Dữ liệu đã được thêm thành công!";
        }else{
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập</title>
    </head>
    <body>
        <h2>Đăng nhập</h2>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <label for="password_1">Password:</label>
            <input type="password_1" name="password_1" id="password_1" required>
            <br>
            <label for="email">email:</label>
            <input type="text" name="email" id="email" required>
            <br>
            <label for="sdt">so dien thoai:</label>
            <input type="text" name="Sdt" id="Sdt" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>
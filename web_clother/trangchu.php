<?php
include "connect.php";
session_start();
// $_SESSION['login']['username'] = null;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chính</title>
</head>
<body>
    <?php if (!isset($_SESSION['login']) || !isset($_SESSION['login']['username'])): ?>
        <a href="login.php">dang nhap</a>
    <?php endif; ?>
    <?php if (isset($_SESSION['login']['username'])): 
        $message = "Welcome, " . $_SESSION['login']['username'] . "!";?>
        <p><?php echo $message ?></p>
        <a href="logout.php">dang xuat</a>
    <?php endif; ?>
</body>
</html>

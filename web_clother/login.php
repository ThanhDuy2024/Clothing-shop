<?php
include "connect.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM account WHERE UserName = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result); // Lấy dữ liệu từ kết quả truy vấn

        $use = isset($_POST['username']) ? $_POST['username'] : ''; 


        $_SESSION['login']['username'] = $use; 

        $_SESSION['login']['id'] = $row['user_id']; 
        $allowed_actions = ['about', 'contact', 'products']; // Danh sách các hành động hợp lệ
        if (isset($_GET['action']) && in_array($_GET['action'], $allowed_actions)) {
            $action = $_GET['action'];
            header('location: ' . $action . '.php');
            exit;
        } 
        else {
            header('location: ' . 'index' . '.php');
            exit;
        }
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Login</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="inner__wrap">
                <a class="header__title" href="index.php">28.Shop</a>
                <ul class="header__bar">
                    <li>
                        <a href="/">Giới Thiệu</a>
                    </li>
                    <li>
                        <a href="/">Sản Phẩm</a>
                    </li>
                    <li>
                        <a href="/">Bài Viết</a>
                    </li>
                    <li>
                        <a href="/">Liên Hệ</a>
                    </li>
                </ul>
                <form action="" class="header__form">
                    <input type="text" placeholder="Tìm kiếm sản phẩm...">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

                <div class="header__cart">
                    <a href=""><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href=""><i class="fa-regular fa-user"></i></a>
                </div>

            </div>
        </div>
    </header>
    <div class="login">
        <div class="container">
            <div class="inner__wrap">
                <div class="form">
                    <h1 class="title">Đăng nhập</h1>
                    <form method="POST" action="">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required>
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                    <button>Đăng nhập</button>
                    </form>
                    <div class="notAccount">
                        <a href="register.html">Bạn chưa có tài khoản ?</a>
                        <a href="">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="inner__wrap">

                <div class="footer__top">
                    <div class="footer__main">
                        <div class="footer__title">
                            28.Shop
                        </div>
                        <div class="footer__desc">
                            Chúng tôi có những bộ quần áo phù hợp với phong cách của bạn và bạn có thể tự hào khi mặc.
                        </div>
                        <div class="footer__social">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-square-x-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>

                    <div class="footer__bar">
                        <div class="footer__title">
                            CÔNG TY
                        </div>
                        <ul class="footer__desc">
                            <li><a href="">Giới Thiệu</a></li>
                            <li><a href="">Sản Phẩm</a></li>
                            <li><a href="">Công Việc</a></li>
                            <li><a href="">Việc Làm</a></li>
                        </ul>
                    </div>

                    <div class="footer__bar">
                        <div class="footer__title">
                            Trợ giúp
                        </div>
                        <ul class="footer__desc">
                            <li><a href="">Hỗ Trợ Khách Hàng</a></li>
                            <li><a href="">Thông Tin Đơn Hàng</a></li>
                            <li><a href="">Điều Khoản & Điều Kiện</a></li>
                            <li><a href="">Chính Sách</a></li>
                        </ul>
                    </div>

                    <div class="footer__bar">
                        <div class="footer__title">
                            Tài nguyên
                        </div>
                        <ul class="footer__desc">
                            <li><a href="">Sách Miễn Phí</a></li>
                            <li><a href="">Bài Viết</a></li>
                            <li><a href="">Kiến Thức</a></li>
                            <li><a href="">Youtube</a></li>
                        </ul>
                    </div>

                    <div class="footer__bar">
                        <div class="footer__title">
                            FAQ
                        </div>
                        <ul class="footer__desc">
                            <li><a href="">Tài Khoản</a></li>
                            <li><a href="">Quản Lý Đơn Hàng</a></li>
                            <li><a href="">Đơn Hàng</a></li>
                            <li><a href="">Thanh Toán</a></li>
                        </ul>
                    </div>
                </div>


                <div class="footer__bottom">
                    28.SHOP © 2024, All Rights Reserved
                </div>

            </div>
        </div>
    </footer>
</body>

</html>

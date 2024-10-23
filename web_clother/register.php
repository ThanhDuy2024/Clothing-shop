<?php
include "connect.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM account";
    $result = mysqli_query($conn, $sql);
    $num_rows = $result->num_rows;

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
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
            VALUES ($num_rows + 1, '$username', '$email', '$password','$Phone', NOW(), NOW(), 'user')";
        if (mysqli_query($conn, $sql)) {
            echo "Dữ liệu đã được thêm thành công!";
        }else{
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>
<!-- <!DOCTYPE html>
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
</html> -->
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
                <a class="header__title" href="index.html">28.Shop</a>
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
                    <a href="login.html"><i class="fa-regular fa-user"></i></a>
                </div>

            </div>
        </div>
    </header>


    <div class="login">
        <div class="container">
            <div class="inner__wrap">
                <div class="form">
                    <h1 class="title">Đăng ký</h1>
                    <form method="POST" action="">
                        <!-- <label for="username ">Name</label>
                        <input type="text" name="username " placeholder="Nhập tên của bạn.....">
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" placeholder="Nhập mật khẩu của bạn.....">
                        <label for="password_1">Password</label>
                        <input id="password_1" type="password" name="password_1" placeholder="Nhập  lại mật khẩu của bạn.....">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="Nhập email của bạn....." class="email">
                        <label for="Phone">SDT</label>
                        <input type="number" name="Phone" placeholder="Nhập số điện thoại của bạn.....">
                        <input type="submit" value="Login"> -->
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username"  placeholder="Nhập tên của bạn....." required >
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password"  placeholder="Nhập mật khẩu của bạn....." required>
                        <label for="password_1">Password:</label>
                        <input type="password" name="password_1" id="password_1"  placeholder="Nhập  lại mật khẩu của bạn....." required>
                        <label for="email">email:</label>
                        <input type="text" name="email" id="email" placeholder="Nhập email của bạn....." required>
                        <label for="Phone">so dien thoai:</label>
<input type="text" name="Phone" id="Phone"   placeholder="Nhập số điện thoại của bạn....."  required>
                        <input type="submit" value="Login">
                    </form>
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
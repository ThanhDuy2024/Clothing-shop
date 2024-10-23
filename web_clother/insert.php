<?php
include "connect.php";
session_start();
echo $_SESSION['login']['username'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cart_id = mysqli_real_escape_string($conn, $_POST['cart_id']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    $sql = "INSERT INTO cart(cart_id, user_id, product_id, quantity,added_at) 
            VALUES ('$cart_id', '$user_id', '$product_id', $quantity,NOW())";
    if (mysqli_query($conn, $sql)) {
        echo "Dữ liệu đã được thêm thành công!";
    }else{
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm vào giỏ hàng</title>
</head>
<body>
    <h2>Thêm sản phẩm vào giỏ hàng</h2>
    <form method="POST" action="">
        <label for="cart_id">Cart ID:</label>
        <input type="text" name="cart_id" id="cart_id" required>
        <br>
        
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" required>
        <br>
        
        <label for="product_id">Product ID:</label>
        <input type="text" name="product_id" id="product_id" required>
        <br>
        
        <label for="quantity">quantity</label>
        <input type="text" name="quantity" id="quantity" required>
        <br>
        
        
        
        <input type="submit" value="Thêm vào giỏ hàng">
    </form>
</body>
</html>
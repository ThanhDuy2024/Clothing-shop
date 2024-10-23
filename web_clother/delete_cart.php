<?php
include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Product_id = mysqli_real_escape_string($conn, $_POST['Product_id']);
    $cart_id=mysqli_real_escape_string($conn, $_POST['cart_id']);
    $sql = "DELETE FROM cart WHERE Product_id = '$Product_id' AND cart_id='$cart_id'";
    
    if (mysqli_query($conn, $sql)) {
        header('Location: cart.php');
       
    }
    else {
        echo "Lỗi khi xóa bản ghi từ cơ sở dữ liệu: " . mysqli_error($conn);
    }
}
?>

<?php
include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $img_path = mysqli_real_escape_string($conn, $_POST['img_path']); // Đảm bảo đây là đường dẫn file đúng
    $sql = "DELETE FROM product WHERE Product_id = '$product_id'";
    $dir = 'C:/xampp/htdocs/web_clother/' . $img_path;
    echo $img_path;
    if (file_exists($dir)) {
        if (!unlink($dir)) {
            echo "Lỗi: Không thể xóa file ảnh.";
        }
    }
    else{
        echo "File ảnh không tồn tại.";
    }
    if (mysqli_query($conn, $sql)) {
        header('Location: lietke.php');
        exit;
    }
    else {
        echo "Lỗi khi xóa bản ghi từ cơ sở dữ liệu: " . mysqli_error($conn);
    }
}
?>

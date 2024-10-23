<?php
include "connect.php";
session_start();
$target_dir = "C:/xampp/htdocs/web_clother/img/";
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if ($imageFileType == "jpg" || $imageFileType == "jpeg" || $imageFileType == "png" || $imageFileType == "gif") {
            if (file_exists($target_file)) {
                echo "Lỗi: Hình ảnh đã tồn tại.";
            } else {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    echo "Hình ảnh " . htmlspecialchars(basename($_FILES["image"]["name"])) . " đã được tải lên.";
                    echo $target_dir . basename($_FILES["image"]["name"]);
                } else {
                    echo "Lỗi khi tải lên hình ảnh.";
                }
            }
        } else {
            echo "Lỗi: Chỉ chấp nhận các tệp JPG, JPEG, PNG, GIF.";
        }
    } else {
        echo "Lỗi: Tệp không phải là hình ảnh.";
    }
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    $num_rows = $result->num_rows;

    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $Product_name = mysqli_real_escape_string($conn, $_POST['Product_name']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $Price = mysqli_real_escape_string($conn, $_POST['Price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $target_file = 'img/' . htmlspecialchars(basename($_FILES["image"]["name"]));

    $sql = "INSERT INTO product (Product_id, category_id, Product_name, stock, Price, description, img_path) 
            VALUES ($num_rows + 1, '$category_id', '$Product_name','$stock', '$Price', '$description', '$target_file')";
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
    </head>
    <body>
    <h2>Thêm sản phẩm mới</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="category_id">category_id:</label>
        <input type="text" name="category_id" id="category_id" required><br>

        <label for="Product_name">Product_name:</label>
        <input type="text" name="Product_name" id="Product_name" required><br>

        <label for="stock">stock:</label>
        <input type="text" name="stock" id="stock" required><br>

        <label for="Price">Price:</label>
        <input type="text" name="Price" id="Price" required><br>

        <label for="description">description:</label>
        <input type="text" name="description" id="description" required><br>

        <label for="file">Chọn hình ảnh:</label>
        <input type="file" name="image" id="file" accept="image/*" required><br><br>

        <input type="submit" value="Thêm sản phẩm">
    </form>
        </form>
        
    </body>
</html>
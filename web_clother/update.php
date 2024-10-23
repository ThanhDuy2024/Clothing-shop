<?php
include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Product_id =  mysqli_real_escape_string($conn, $_POST['Product_id']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $Product_Name = mysqli_real_escape_string($conn, $_POST['Product_Name']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);
    $Price = mysqli_real_escape_string($conn, $_POST['Price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $sql = "UPDATE product 
            SET category_id='$category_id', Product_Name='$Product_Name', stock='$stock', Price='$Price', description='$description' 
            WHERE Product_id = '$Product_id'";
    if(mysqli_query($conn, $sql)){
        header('location: ' . 'lietke' . '.php');
    }
}
?>
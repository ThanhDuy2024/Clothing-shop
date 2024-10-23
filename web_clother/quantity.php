<?php

include "connect.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cart_id = mysqli_real_escape_string($conn, $_POST['cart_id']);
    $product_id = mysqli_real_escape_string($conn, $_POST['Product_id']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    
    $query = "UPDATE cart SET quantity = '$quantity', added_at = NOW() WHERE cart_id = '$cart_id' AND Product_id = '$product_id'";
    mysqli_query($conn, $query);
    $sql= "DELETE FROM cart WHERE quantity = 0";
    mysqli_query($conn, $sql);
}
?>

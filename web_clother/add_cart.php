<?php
include "connect.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $Product_id = mysqli_real_escape_string($conn, $_POST['Product_id']);

    $sql = "SELECT quantity FROM cart WHERE user_id = '$user_id' AND '$Product_id';";
    $result = mysqli_query($conn, $sql);
    if($result && mysqli_num_rows($result) > 0){
        $result =  mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result); 
     
        $quantity = $row['quantity'] +1;
        echo $quantity;
        $sql = "UPDATE cart SET quantity = $quantity,added_at = NOW()
                WHERE user_id = $user_id AND Product_id = $Product_id ";
        if(mysqli_query($conn, $sql)){
            header('location: ' . 'lietke_user.php');
        }else{
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    }
    else{
        $sql = "INSERT INTO cart (user_id, Product_id,quantity,added_at)
            VALUES ('$user_id', '$Product_id',1,NOW())";
        if(mysqli_query($conn, $sql)){
            header('location: ' . 'lietke_user.php');
        }else{
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        
    }
}

?>
<?php
include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    if($category_name == ''){?>
        
    <?php}
    $sql = "INSERT INTO category(category_name) 
            VALUES ('$category_name')";
    if(mysqli_query($conn, $sql)){
        header('location'.'category.php');
    }
}
?>
<?php 
$sql = "SELECT * FROM category;";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){?>
<tr>
        <td><?php echo $row['category_id']; ?></td>
        <td><?php echo $row['category_name']; ?></td>
</tr>
<?php
        }
        ?>
<form method="POST" action="" >
    <input type="text" name="category_name" id="category_name">
    <input type="submit">
</form>
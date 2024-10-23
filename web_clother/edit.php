
<form method="POST" action="update.php">
    <table>
        <?php
        include "connect.php";
        $query = "SELECT * FROM product ORDER BY Product_Name"; // Sắp xếp theo tên sản phẩm
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_assoc($result)) {
          ?>
        <tr>
        <td>
            <input type="hidden" name="Product_id" value="<?php echo $row['Product_id']; ?>"></td>
            <td><input type="text" name="category_id" value="<?php echo $row['category_id']; ?>"></td>
            <td><input type="text" name="Product_Name" value="<?php echo $row['Product_Name']; ?>"></td>
            <td><input type="text" name="stock" value="<?php echo $row['stock']; ?>"></td>
            <td><input type="text" name="Price" value="<?php echo $row['Price']; ?>"></td>
            <td><input type="text" name="description" value="<?php echo $row['description']; ?>"></td>
            <td><img src="<?php echo $row['img_path']; ?>" height="50px" width="50px" alt="Product Image"></td>
            <td><input type="submit" value="edit"></td>
        </tr>
        <?php
        }
        ?>
    </table>
</form>

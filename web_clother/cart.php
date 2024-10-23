
<?php
include "connect.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    />

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Product List</title>
  </head>
  <body>
    <div class="container">
      <h2>Product List</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>quantity</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $user_id = mysqli_real_escape_string($conn, $_SESSION['login']['id']);
        $sql = "SELECT cart.cart_id, cart.user_id, product.Product_id ,product.Product_Name, product.Price, cart.quantity, cart.added_at
                  FROM cart
                  INNER JOIN product ON cart.Product_id = product.Product_id
                  WHERE cart.user_id = '$user_id';";
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)) {
          
          ?>
          <tr>
            <td><?php echo $row['Product_Name']; ?></td>
            <td><?php echo $row['Price']; ?></td>
            <td><input style="width: 40px;" type="number" value="<?php echo $row['quantity']; ?>" onchange="updateQuantity(<?php echo $row['cart_id']; ?>,<?php echo $row['Product_id']; ?>, this.value)" ></td>
            <!-- <td> <img src="<?php echo $row['img_path']; ?>" height= "50px" width= "50px" alt="Product Image"> </td> -->
          
            <td>
            <form method="POST" action="delete_cart.php">
              <label for="product_id"></label>
              <input type="hidden" name="Product_id" value="<?php echo $row['Product_id']; ?>">
              <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
              <input type="submit" value="Delete">
            </form>
            </td>
          </tr>
          
          
          <?php
        }
        ?>
        </tbody>    
      </table>
    </div>
    </div>
    
  </body>
  <script>
function updateQuantity(cart_id,productId, quantity) {
    
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "quantity.php", true); // Path to the PHP file for handling

    // Set the content type for the request
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Handle the server response
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log("Quantity updated successfully:", xhr.responseText);
        } else {
            console.error("Error updating quantity:", xhr.statusText);
        }
    };

    // Send the request with the necessary data, including cart_id
    xhr.send("Product_id=" + encodeURIComponent(productId) + "&quantity=" + encodeURIComponent(quantity) + "&cart_id=" + encodeURIComponent(cart_id));
    setTimeout(function() {
    location.reload();
}, 100);

}
</script>
</html>

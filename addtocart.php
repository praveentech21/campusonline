<?php
include "connect.php";
if(isset($_GET['product_id'])){
    $quantity = 1;
    if(isset($_GET['quantity'])) $quantity = $_GET['quantity'];
    $checkcart = mysqli_query($con,"SELECT * FROM cart WHERE product_id = '{$_GET['product_id']}' AND coustmer_id = '{$_SESSION['student_id']}'");
    if(mysqli_num_rows($checkcart) == 0) {
    $addtocart = mysqli_query($con,"INSERT INTO cart (product_id,coustmer_id,product_quantity) VALUES ('{$_GET['product_id']}','{$_SESSION['student_id']}','$quantity')");
    $removefromwishlist = mysqli_query($con,"DELETE FROM wishlist WHERE product_id = '{$_GET['product_id']}' AND coustmer_id = '{$_SESSION['student_id']}'");
    if(isset($_GET['quantity'])){ ?> 
    <script> alert('Product added to cart successfully');  window.location.href = 'product.php?product_id=<?php echo $_GET['product_id']; ?>';  </script>;
    <?php }
    else echo "<script> alert('Product added to cart successfully'); window.location.href = 'index.php'; </script>";
    }
    else{
        if(isset($_GET['quantity'])) echo "<script> alert('Product added to cart successfully'); window.location.href = 'product.php?product_id'".$_GET['product_id']."; </script>";
        else echo "<script> alert('Product already added to cart'); window.location.href = 'index.php'; </script>";  
    }
}
?>
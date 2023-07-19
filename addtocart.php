<?php
include "connect.php";
if(isset($_GET['product_id'])){
    $addtocart = mysqli_query($con,"INSERT INTO cart (product_id,coustmer_id) VALUES ('{$_GET['product_id']}','{$_SESSION['student_id']}')");
    if($addtocart){
        $removefromwishlist = mysqli_query($con,"DELETE FROM wishlist WHERE product_id = '{$_GET['product_id']}' AND coustmer_id = '{$_SESSION['student_id']}'");
        echo "<script> alert('Product added to cart successfully'); window.location.href = 'index.php'; </script>";
    }
    else{
        echo "<script> alert('Product not added to cart'); window.location.href = 'index.php'; </script>";  
    }
}
?>
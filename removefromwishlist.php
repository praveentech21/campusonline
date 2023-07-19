<?php
    include "connect.php";
    if(isset($_GET['product_id'])){
        $removefromwishlist = mysqli_query($con,"DELETE FROM wishlist WHERE product_id = '{$_GET['product_id']}' AND coustmer_id = '{$_SESSION['student_id']}'");
        if($removefromwishlist){
            echo "<script> alert('Product removed from Wishlist successfully'); window.location.href = 'index.php'; </script>";
        }
        else{
            echo "<script> alert('Product not removed from Wishlist'); window.location.href = 'index.php'; </script>";  
        }
    }
?>
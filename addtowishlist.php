<?php
    include "connect.php";
    if(isset($_GET['product_id'])){
        $checkwishlist = mysqli_query($con,"SELECT * FROM wishlist WHERE product_id = '{$_GET['product_id']}' AND coustmer_id = '{$_SESSION['student_id']}'");
        if(mysqli_num_rows($checkwishlist) == 0){
            $addtowishlist = mysqli_query($con,"INSERT INTO wishlist (product_id,coustmer_id) VALUES ('{$_GET['product_id']}','{$_SESSION['student_id']}')");
            echo "<script> alert('Product added to Wishlist successfully'); window.location.href = 'index.php'; </script>";
        }
        else{
            echo "<script> alert('Product already added to Wishlist'); window.location.href = 'index.php'; </script>";  
        }
    }
?>
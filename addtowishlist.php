<?php
    include "connect.php";
    if(isset($_GET['product_id'])){
        $addtowishlist = mysqli_query($con,"INSERT INTO wishlist (product_id,coustmer_id) VALUES ('{$_GET['product_id']}','{$_SESSION['student_id']}')");
        if(mysqli_errno($con) === 1062) echo "<script>alert('This Product was Alredy in Your Wishlist');</script>";
        else{
            echo "<script> alert('Product added to Wishlist'); window.location.href = 'index.php'; </script>";  
        }
    }
?>
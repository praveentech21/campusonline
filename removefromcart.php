<?php
    include "connect.php";
    if(empty($_SESSION['student_id']) or $_SESSION['student_id'] == '000000') header('location:login.php');
    if(isset($_GET['product_id'])){
        $removefromcart = mysqli_query($con,"DELETE FROM cart WHERE product_id = '{$_GET['product_id']}' AND coustmer_id = '{$_SESSION['student_id']}'");
        $checkwishlist = mysqli_query($con,"SELECT * FROM wishlist WHERE product_id = '{$_GET['product_id']}' AND coustmer_id = '{$_SESSION['student_id']}'");
        if(mysqli_num_rows($checkwishlist) == 0) {
            $addtowishlist = mysqli_query($con,"INSERT INTO wishlist (product_id,coustmer_id) VALUES ('{$_GET['product_id']}','{$_SESSION['student_id']}')");
            echo "<script> window.location.href = 'index.php'; </script>";
         }
        else{
            echo "<script> window.location.href = 'index.php'; </script>";  
        }
    }
?>
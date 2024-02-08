<?php
    include "./connect.php";
    if(empty($_SESSION['student_id']) or $_SESSION['student_id'] == '000000') {
        echo "<script> window.location.href = 'login.php'; </script>";
    }
    if(isset($_GET['product_id'])){
        $reducecart = mysqli_query($con,"UPDATE cart SET product_quantity = product_quantity + 1 WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
        if($reducecart){
            header("location:cart.php");
        }
    }
?>  
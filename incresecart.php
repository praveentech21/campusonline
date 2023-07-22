<?php
    include "./connect.php";
    if(isset($_GET['product_id'])){
        $reducecart = mysqli_query($con,"UPDATE cart SET product_quantity = product_quantity + 1 WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
        if($reducecart){
            header("location:cart.php");
        }
    }
?>  
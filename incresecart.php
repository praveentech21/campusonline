<?php
include "connect.php";
if (empty($_SESSION['student_id']) or $_SESSION['student_id'] == '000000') header('location:login.php');
if (isset($_GET['product_id'])) {
    $cart = mysqli_query($con, "SELECT * FROM cart WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
    if (mysqli_num_rows($cart) == 0) {
        $addtocart = mysqli_query($con, "INSERT INTO cart (product_id,product_quantity,coustmer_id) VALUES ('{$_GET['product_id']}',1,'{$_SESSION['student_id']}')");
        if ($addtocart) header("location:cart.php");
    } else {
        $incresecart = mysqli_query($con, "UPDATE cart SET product_quantity = product_quantity + 1 WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
        if ($incresecart) header("location:cart.php");
    }
}

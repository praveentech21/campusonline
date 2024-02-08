<?php
    include "./connect.php";
    if(empty($_SESSION['student_id'])) {
        echo "<script> window.location.href = 'login.php'; </script>";
    }
    if(isset($_GET['product_id'])){
        $checkcart = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM cart WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'"));
        if($checkcart['product_quantity'] == 0)?>
        <script> window.location.href = "index.php";
        </script>
        <?php
        $reducecart = mysqli_query($con,"UPDATE cart SET product_quantity = product_quantity - 1 WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
        if($checkcart['product_quantity'] -1 == 0){
            $deletecart = mysqli_query($con,"DELETE FROM cart WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
        }
        if($reducecart){
            header("location:cart.php");
        }
    }
?>  
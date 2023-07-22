<?php
    include "./connect.php";
    if(isset($_GET['product_id'])){
        $checkcart = mysqli_query($con,"SELECT * FROM cart WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
        if(mysqli_num_rows($checkcart) == 0)?>
        <script>
            alert("You have not added this product to your cart yet!");
            window.location.href = "index.php";
        </script>
        <?php
        $reducecart = mysqli_query($con,"UPDATE cart SET product_quantity = product_quantity - 1 WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
        if(mysqli_num_rows($checkcart) -1 == 0){
            $deletecart = mysqli_query($con,"DELETE FROM cart WHERE product_id = '{$_GET['product_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
        }
        if($reducecart){
            header("location:cart.php");
        }
    }
?>  
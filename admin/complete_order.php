<?php
include "connect.php";
if(isset($_GET['order_id'])){
  $order_id = $_GET['order_id'];
  $order_status = mysqli_fetch_assoc(mysqli_query($con, "SELECT `status` FROM `order_details` WHERE `order_id` = '{$_GET['order_id']}'"))['status'];
  if($order_status == '1'){
    mysqli_query($con, "UPDATE `order_details` SET `status` = 2 WHERE `order_id` = '{$_GET['order_id']}'");
  }
}
header('location: orders.php');
?>

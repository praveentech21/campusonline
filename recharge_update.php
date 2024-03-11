<?php
include 'connect.php';

if (isset($_POST['payment']) and $_POST['payment'] == "initiate_payment") {

    $orderAmount = $_POST['orderAmount'] / 100;
    $orderId = $_POST['orderId'];
    $studentid = $_POST['studentid'];

    $cashback = $orderAmount * 0.05;
    $today = date("Y/m/d");

    $student_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `students` WHERE `student_id` = '$studentid'"));

    $total_recharge_avabile = $orderAmount + $cashback + $student_details['reacharge'];

    $initial_sql = "INSERT INTO `recharges`(`order_id`, `student_id`, `available_recharge`, `amount`, `cashback`, `total_recharge`, `date`) VALUES ('$orderId','$studentid',{$student_details['reacharge']},$orderAmount,$cashback,$total_recharge_avabile,'$today')";

    if (mysqli_query($con, $initial_sql)) {
        $response = array(
            'status' => 'success',
            'message' => "Order Amount: $orderAmount, Order_ID: $orderId",
            'Order_ID' => $orderId
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Failed to update recharge details.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} 
elseif (isset($_POST['razorpay_payment_id']) ) {

    require_once('vendor/razorpay/razorpay/Razorpay.php');

    $apiKey = 'rzp_test_bZFi6V3FyQ5lBT'; 
    $apiSecret = 'nEJCjWeTtdKUpifSKfyQV2oX';
 
    $api = new Razorpay\Api\Api($apiKey, $apiSecret);
 
    $paymentId = $_POST['razorpay_payment_id'];
    $orderId = $_POST['razorpay_order_id'];
    $signature = $_POST['razorpay_signature'];

    echo $paymentId."<br>".$orderId."<br>".$signature;
 
    try {
        $attributes = array(
            'razorpay_payment_id' => $paymentId,
            'razorpay_order_id' => $orderId,
            'razorpay_signature' => $signature
        );
 
        $api->utility->verifyPaymentSignature($attributes);

        $update_recharge = mysqli_query($conn, "UPDATE `recharges` SET `status`=1,`recharge_id`='$paymentId',`signature`='$signature' WHERE `order_id` = '$orderId'");

        $student_details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT `total_recharge`, `student_id` FROM `recharges` WHERE `order_id` = '$orderId'"));

        $total_recharge_avabile = $student_details['total_recharge'];
        $studentid  = $student_details['student_id'];

        $update_student = mysqli_query($conn, "UPDATE `students` SET `reacharge` = $total_recharge_avabile WHERE `student_id` = '$studentid')");

        http_response_code(200);
        echo 'Payment success';
    } catch (Exception $e) {
        echo $e->getMessage();

        $update_recharge = mysqli_query($conn, "UPDATE `recharges` SET `status`=0,`recharge_id`='$paymentId',`signature`='$signature' WHERE `order_id` = '$orderId'");

        http_response_code(400);
        echo 'Payment failed';
    }
} else {
    $response = array(
        'status' => 'error',
        'message' => 'Missing parameters.'
    );

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

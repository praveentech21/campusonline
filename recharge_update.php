<?php
include 'connect.php';
if (isset($_POST['paymentId']) and isset($_POST['orderAmount'])) {

    $orderAmount = $_POST['orderAmount']/100;
    $paymentId = $_POST['paymentId'];
    $studentid = $_POST['studentid'];
    
    $cashback = $orderAmount * 0.05;
    $today = date("Y/m/d");
    
    $student_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `students` WHERE `student_id` = '$studentid'"));

    $total_recharge_avabile = $orderAmount + $cashback + $student_details['reacharge'];

    $upd_recharge = mysqli_query($con, "INSERT INTO `recharges`(`recharge_id`, `student_id`, `available_recharge`, `amount`, `cashback`, `total_recharge`, `date`) VALUES ('$paymentId','$studentid',{$student_details['reacharge']},$orderAmount,$cashback,$total_recharge_avabile,'$today')");

    if ($upd_recharge && mysqli_query($con, "UPDATE `students` SET `reacharge`=$total_recharge_avabile WHERE `student_id` ='$studentid' ")) {
        $response = array(
            'status' => 'success',
            'message' => "Order Amount: $orderAmount, Payment_ID: $paymentId",
            'Payment_ID' => $paymentId
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
else {
    $response = array(
        'status' => 'error',
        'message' => 'Missing parameters.'
    );

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
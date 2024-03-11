<?php 

if(isset($_POST['work']) and $_POST['work'] == 'create_order'){
    $recharge_in_paise = $_POST['orderAmount'];

    require_once('vendor/razorpay/razorpay/Razorpay.php');
    $api = new Razorpay\Api\Api("rzp_test_bZFi6V3FyQ5lBT", "nEJCjWeTtdKUpifSKfyQV2oX");

    $orderData = [
        'amount' => $recharge_in_paise, // amount in paise (e.g. ₹10 = 1000 paise)
        'currency' => 'INR',
        'receipt' => 'order_receipt',
        'payment_capture' => 1 // auto capture payment
    ];

    $order = $api->order->create($orderData);
    $orderId = $order['id'];

    if ($orderId != '') {
        echo json_encode(array('id' => $orderId));
    } else {
        echo json_encode(array('error' => 'Order creation failed'));
    }
}
?>
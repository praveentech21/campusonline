<?php

        $conn = new mysqli("sql207.infinityfree.com","if0_35924919","srkrcampuscafe","if0_35924919_test");

      require_once('vendor/razorpay/razorpay/Razorpay.php');

   $apiKey = 'rzp_test_bZFi6V3FyQ5lBT'; 
   $apiSecret = 'nEJCjWeTtdKUpifSKfyQV2oX';

   $api = new Razorpay\Api\Api($apiKey, $apiSecret);

   $paymentId = $_POST['razorpay_payment_id'];
   $orderId = $_POST['razorpay_order_id'];
   $signature = $_POST['razorpay_signature'];

   try {
       $attributes = array(
           'razorpay_payment_id' => $paymentId,
           'razorpay_order_id' => $orderId,
           'razorpay_signature' => $signature
       );

       $api->utility->verifyPaymentSignature($attributes);
       mysqli_query($conn, "INSERT INTO `testing`( `coloum1`, `coloum2`, `coloum3`) VALUES ('$paymentId','$orderId','$signature')");

       http_response_code(200);
       echo 'Payment success';
   } catch (Exception $e) {
       echo $e->getMessage();

       http_response_code(400);
       echo 'Payment failed';
   }
   ?>
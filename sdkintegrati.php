<?php

require_once('vendor/razorpay/razorpay/Razorpay.php');

$api = new Razorpay\Api\Api("rzp_test_bZFi6V3FyQ5lBT", "nEJCjWeTtdKUpifSKfyQV2oX");



$orderData = [

    'amount' => 100, // amount in paise (e.g. ₹10 = 1000 paise)

    'currency' => 'INR',

    'receipt' => 'order_receipt',

    'payment_capture' => 1 // auto capture payment

];



$order = $api->order->create($orderData);

$orderId = $order['id'];

echo "$orderId";

echo "<input type='hidden' id='orderid' value='$orderId'>";

    



?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

</head>

<body>

<button id="rzp-button1">Pay</button>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>





<script>

    var orderId = document.getElementById('orderid').value;

var options = {

    "key": "rzp_test_bZFi6V3FyQ5lBT", // Enter the Key ID generated from the Dashboard

    "amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise

    "currency": "INR",

    "name": "SRKR Campus Online",

    "description": "SRKR Campusonline Test Transaction",

    "image": "http://srkrcampusonline.rf.gd/Bhavani/img/campus_online_200_96.png",

    "order_id": orderId, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1

    "callback_url": "http://srkrcampusonline.rf.gd/paymenthandel.php",

    "prefill": {

        "name": "Sai Praveen",

        "email": "rravikumar_csd@srkrec.edu.in",

        "contact": "9052727402"

    },

    "notes": {

        "address": "Razorpay Corporate Office"

    },

    "theme": {

        "color": "#3399cc"

    }

};

var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){

    rzp1.open();

    e.preventDefault();

}

</script>

</body>

</html>




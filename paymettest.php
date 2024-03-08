    <?php


            $recharge_amount_to_pay = $_POST['recharge_amount_to_pay'] * 100; //Amount in Rupess to paise
            $orderData = [
                'amount' => $recharge_amount_to_pay, // amount in paise (e.g., 1000 paise = ₹10)
                'currency' => 'INR',
                'receipt' => '21B91A6206',
                'payment_capture' => 1 // auto capture payment
            ];

            try {
                $razorpay_order = $api->order->create($orderData);
                $razorpay_orderId = $razorpay_order->id;
                echo "<script>document.getElementById('razorpay_order_id').value =".$razorpay_orderId." console.log('Order created successfully. Order ID: ' . $orderId)</script>";

                
            } catch (Exception $e) {
                echo 'Error creating order: ' . $e->getMessage();
            }

        

    ?>
    
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('rzp-button').addEventListener('click', function () {
        var orderID = document.getElementById('razorpay_order_id').value;
var options = {
    
    "name": "SRKR CampusOnline",
    "description": "Reacharge Student Cridets",
    "image": "https://example.com/your_logo",
    "order_id": orderID, //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": {
        "name": "Sai Praveen",
        "email": "ravikumar_csd@srkrec.edu.in",
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
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
    });
</script>

        function setrechargecridets(studentId) {
            document.getElementById('recharge_student').value = studentId;
        }



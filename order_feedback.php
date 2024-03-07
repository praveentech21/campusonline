<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $order_review = $_POST['order_review'];
        $order_rating = $_POST['order_rating'];
        $order_id = $_POST['order_id'];
        $order_feedback = $_POST['order_feedback'];
        $studentId = $_POST['studentId'];
    
        include 'connect.php';
        $run = mysqli_query($con, "INSERT INTO `order_rewies`(`student_id`, `order_id`, `rating`, `feedback`, `review`) VALUES ('$studentId','$order_id','$order_rating','$order_feedback','$order_review')");
        if ($run) {
            echo json_encode(array("success" => "Review Submitted Successfully!"));
        } else {
            echo json_encode(array("success" => "Review Submission Failed!"));
        }

    } else {
        // Handle the case when form data is not submitted
        echo "No data submitted";
    }
    ?>
?>

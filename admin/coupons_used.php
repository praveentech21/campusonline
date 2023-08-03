<?php
  include "connect.php";
  $coupans_used = mysqli_query($con, "SELECT * FROM `coupans_used`");
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="Bhavani/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Campus Online Admin</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="Bhavani/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="Bhavani/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="Bhavani/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="Bhavani/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="Bhavani/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="Bhavani/vendor/libs/apex-charts/apex-charts.css" />

    <script src="Bhavani/vendor/js/helpers.js"></script>

    <script src="Bhavani/js/config.js"></script>
  </head>

  <body>
        
      <!-- Sidebar Starts Here Shiva -->
        <?php include 'header.php'; ?>
      <!-- Sidebar Ends Here Shiva -->

        <!-- Content Starts Here Shiva-->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <!-- Striped Rows -->
              <div class="card">
                <h5 class="card-header">Coupons Used Till Now</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Coupon Name</th>
                        <th>Student Name</th>
                        <th>Student Reg</th>
                        <th>Order Id</th>
                        <th>Price Reduced</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                        while($row = mysqli_fetch_assoc($coupans_used)){
                          $coupan_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT `coupan_name` FROM `coupans` WHERE `coupan_id` = '{$row['coupan_id']}'"))['coupan_name'];
                          $order_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT `coustmer_id`, `coupan_price` FROM `order_details` WHERE `order_id` = '{$row['order_id']}'"));
                          $student_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT `student_name`, `student_id` FROM `students` WHERE `student_id` = '{$order_details['coustmer_id']}'"));
                      ?>
                      <tr>
                        <td><strong><?php echo $coupan_name ?></strong></td>
                        <td><?php echo $student_details['student_name'] ?></td>
                        <td><?php echo $student_details['student_id'] ?></td>
                        <td><a href="complete_order.php?order_id=<?php echo $row['order_id'] ?>"><?php echo $row['order_id'] ?></a></td>
                        <td><span class="badge bg-label-primary me-1"><?php echo $order_details['coupan_price'] ?></span></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Striped Rows -->

              
            </div>
          </div>
        <!-- Content Ends Here Shiva -->

      <!-- Footer Starts Here Shiva-->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends Here Shiva-->

  </body>
</html>

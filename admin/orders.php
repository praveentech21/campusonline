<?php
  include "connect.php";
  $pending_orders = mysqli_query($con, "SELECT * FROM order_details WHERE status = 1");
  $completed_orders = mysqli_query($con, "SELECT * FROM order_details WHERE status = 2");
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

              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Pending Orders</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>Order ID</th>
                          <th>Mobile</th>
                          <th>Address</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($row = mysqli_fetch_assoc($pending_orders)){
                            $student_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM students WHERE student_id = '{$row['coustmer_id']}'"));
                        ?>
                        <tr>
                          <td><strong><?php echo $student_details['student_name'] ?></strong></td>
                          <td><a href="order.php?order_id=<?php echo $row['order_id'] ?>"><strong><?php echo $row['order_id'] ?></strong></a></td>
                          <td><a href="tel:<?php echo $student_details['student_mobile'] ?>"><?php echo $student_details['student_mobile'] ?></a></td>
                          <td><?php echo $row['address'] ?></td>
                          <td><a href="complete_order.php?order_id=<?php echo $row['order_id'] ?>"><span class="badge bg-label-primary me-1">Complete</span></a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
             <hr class="my-4">
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Completed Orders</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Student Name</th>
                          <th>Order ID</th>
                          <th>Reg No </th>
                          <th>Mobile</th>
                          <th>Address</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                          while($row = mysqli_fetch_assoc($completed_orders)){
                            $student_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM students WHERE student_id = '{$row['coustmer_id']}'"));
                        ?>
                        <tr>
                          <td><strong><?php echo $student_details['student_name'] ?></strong></td>
                          <td><a href="order.php?order_id=<?php echo $row['order_id'] ?>"><strong><?php echo $row['order_id'] ?></strong></a></td>
                          <td><?php echo $student_details['student_id'] ?></td>
                          <td><a href="tel:<?php echo $student_details['student_mobile'] ?>"><?php echo $student_details['student_mobile'] ?></a></td>
                          <td><?php echo $row['address'] ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->

            </div>
          </div>
        <!-- Content Ends Here Shiva -->

      <!-- Footer Starts Here Shiva-->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends Here Shiva-->

  </body>
</html>

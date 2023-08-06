<?php
  include 'connect.php';
  $this_week_orders = mysqli_query($con,"SELECT * FROM order_details WHERE order_date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() group by order_date");
  $dashbord = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) , SUM(`order_amount`), SUM(`total_amount`), SUM(`discount_price`), SUM(`coupan_price`) FROM `order_details`"));
  $categories = mysqli_query($con,"SELECT * FROM categorys");
  $coupons = mysqli_query($con,"SELECT * FROM coupans");
  $date_to_day = mysqli_query($con,"SELECT `order_date`,COUNT(`order_date`),SUM(`coupan_price`),SUM(`discount_price`),SUM(`order_amount`),SUM(`total_amount`) FROM order_details GROUP BY order_date ORDER BY `order_details`.`order_date` DESC ");
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
                <div class="row">
                <!-- Today Delivary Agent Report Starts Here Shiva -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <h5 class="card-header">This Week Sales Report</h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Day</th>
                              <th>No of Order</th>
                              <th>Sales</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              while($row = mysqli_fetch_assoc($this_week_orders)){
                                $order_date = $row['order_date'];
                                $order_date = date('d-m-Y',strtotime($order_date));
                                $order_day = date('l',strtotime($order_date));
                                $today_orders = mysqli_fetch_assoc(mysqli_query($con,"SELECT sum(order_amount),count(*) FROM order_details WHERE order_date = '$row[order_date]'"));  
                            ?>
                            <tr>
                              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $order_date; ?></strong></td>
                              <td><?php echo $order_day; ?></td>
                              <td><?php echo $today_orders['count(*)']; ?></td>
                              <td><?php echo (integer)$today_orders['sum(order_amount)']; ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Today Delivary Agent Report Ends Here Shiva -->


                <!-- Data Cards Here Shiva -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                  <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="Bhavani/img/icons/unicons/chart-success.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="d-block mb-1">Orders : <?php echo $dashbord['COUNT(*)']; ?></span>
                          <h3 class="card-title text-nowrap mb-2"><?php echo $dashbord['SUM(`total_amount`)']; ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="Bhavani/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="d-block mb-1">Discount Amount</span>
                          <h3 class="card-title text-nowrap mb-2"><?php echo $dashbord['SUM(`discount_price`)']; ?></h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="Bhavani/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Total Sales</span>
                          <h3 class="card-title mb-2"><?php echo (integer)$dashbord['SUM(`order_amount`)']; ?></h3>
                        </div>
                      </div>  
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="Bhavani/img/icons/unicons/cc-warning.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Coupon Amount</span>
                          <h3 class="card-title mb-2"><?php echo (integer)$dashbord['SUM(`coupan_price`)']; ?></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <!--/ Data Cards Here Shiva -->
                <hr class="my-4">
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Category Wise Sales</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Category Name</th>
                          <th>Category ID</th>
                          <th>No of Products </th>
                          <th>No of Orders </th>
                          <th>Sales</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($row = mysqli_fetch_assoc($categories)){
                            $orders = 0;
                            $sales = 0;
                            $products = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) FROM `products` WHERE category_id = '{$row['category_id']}'"))['COUNT(*)'];
                            $orders = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(`product_id`) FROM orders WHERE `product_id` in (SELECT sku FROM products WHERE `category_id` ='{$row['category_id']}')"))['COUNT(`product_id`)'];
                            $products_category = mysqli_query($con,"SELECT `sku`,`product_price`,`discount_price` FROM `products` WHERE `category_id` = '{$row['category_id']}'");
                            while($row1 = mysqli_fetch_assoc($products_category)){
                              if($row1['discount_price'] != 0) $discount = $row1['discount_price'];
                              else $discount = $row1['product_price'];
                              $sales += mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(`product_quantity`) FROM `orders` WHERE `product_id` = '{$row1['sku']}'"))['SUM(`product_quantity`)'] * $discount  ;
                            }
                        ?>
                        <tr>
                          <td><strong><?php echo $row['category_name']; ?></strong></td>
                          <td><?php echo $row['category_id']; ?></td>
                          <td><?php echo $products ?></td>
                          <td><?php echo $orders ?></td>
                          <td><?php echo $sales; ?></td>
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
                <h5 class="card-header">Coupon Wise Sales</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Coupon Name</th>
                          <th>Coupon ID</th>
                          <th>Coupon Value</th>
                          <th>Coupon Type</th>
                          <th>No of Orders</th>
                          <th>Coupon Sales</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while($row = mysqli_fetch_assoc($coupons)){
                            $coupon_sales = 0;
                            $no_of_orders = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) FROM `coupans_used` WHERE coupan_id = '{$row['coupan_id']}'"))['COUNT(*)'];
                            $order_id_coupons = mysqli_query($con,"SELECT `order_id` FROM `coupans_used` WHERE `coupan_id` = '{$row['coupan_id']}'");
                            while($row1 = mysqli_fetch_assoc($order_id_coupons)){
                              $coupon_sales += mysqli_fetch_assoc(mysqli_query($con,"SELECT `coupan_price` FROM `orders` WHERE `order_id` = '{$row1['order_id']}'"))['coupan_price'];
                            }
                        ?>
                        <tr>
                          <td><strong><?php echo $row['coupan_name'] ?></strong></td>
                          <td><?php echo $row['coupan_id'] ?></td>
                          <td><?php echo $row['coupan_value'] ?></td>
                          <td><?php if($row['coupan_type']==1) echo "Flate"; else echo "Percentage";  ?></td>
                          <td><?php echo $no_of_orders ?></td>
                          <td><?php echo $coupon_sales ?></td>
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
                <h5 class="card-header">Daily Orders</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Orders</th>
                          <th>Order Amount</th>
                          <th>Discount</th>
                          <th>Coupon</th>
                          <th>Sale Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          while($row = mysqli_fetch_assoc($date_to_day)){
                        ?>
                        <tr>
                          <td><?php echo $row['order_date'] ?></td>
                          <td><?php echo $row['COUNT(`order_date`)'] ?></td>
                          <td><?php echo (integer)$row['SUM(`order_amount`)'] ?></td>
                          <td><?php echo (integer)$row['SUM(`discount_price`)'] ?></td>
                          <td><?php echo (integer)$row['SUM(`coupan_price`)'] ?></td>
                          <td><?php echo (integer)$row['SUM(`total_amount`)'] ?></td>
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

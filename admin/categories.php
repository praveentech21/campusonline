<?php
  include "connect.php";
  $all_categorys = mysqli_query($con, "SELECT * FROM `categorys` order by `category_weightage` desc");
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
                <h5 class="card-header">All categorys</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Category Name</th>
                        <th>Category ID</th>
                        <th>weitage</th>
                          <th>No of Products </th>
                        <th>No of Orders </th>
                        <th>Sales</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                        while($row = mysqli_fetch_array($all_categorys)){
                          $orders = 0;
                          $sales = 0;
                          $products = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(*) FROM `products` WHERE category_id = '{$row['category_id']}'"))['COUNT(*)'];
                          $orders = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(`product_id`) FROM orders WHERE `product_id` in (SELECT sku FROM products WHERE `category_id` ='{$row['category_id']}')"))['COUNT(`product_id`)'];
                          $products_category = mysqli_query($con,"SELECT `sku`,`product_price` FROM `products` WHERE `category_id` = '{$row['category_id']}'");
                          while($row1 = mysqli_fetch_assoc($products_category)){
                            $sales += mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(`product_quantity`) FROM `orders` WHERE `product_id` = '{$row1['sku']}'"))['SUM(`product_quantity`)'] * $row1['product_price'];
                          }
                      ?>
                      <tr>
                        <td><strong><?php echo $row['category_name'] ?></strong></td>
                        <td><?php echo $row['category_id'] ?></td>
                        <td><?php echo $row['category_weightage'] ?></td>
                        <td><?php echo $products ?></td>
                        <td><?php echo $orders ?></td>
                        <td><?php echo $sales; ?></td>
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

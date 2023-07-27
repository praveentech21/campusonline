<?php
  include "connect.php";
  $all_products = mysqli_query($con, "SELECT * FROM `products`");
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
                <h5 class="card-header">Campus Online Products</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Categories</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>No Of Units Sold</th>
                        <th>Sale</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php 
                        while($product = mysqli_fetch_assoc($all_products)){
                          $category = mysqli_fetch_assoc(mysqli_query($con, "SELECT `category_name` FROM `categorys` WHERE `category_id` = '{$product['category_id']}'"))['category_name'];
                          $no_of_units_sold = mysqli_fetch_assoc(mysqli_query($con, "SELECT count(product_id) FROM `orders` WHERE `product_id` = '{$product['sku']}'"))['count(product_id)'];
                          $sales = $product['product_price']* $no_of_units_sold;
                      ?>
                      <tr>
                        <td><strong><?php echo $product['product_name'] ?></strong></td>
                        <td><?php echo $category ?></td>
                        <td><?php echo $product['product_price'] ?></td>
                        <td><?php echo $product['product_price'] - $product['discount_price'] ?></td>
                        <td><?php echo $no_of_units_sold ?></td>
                        <td><?php echo $sales ?></td>
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

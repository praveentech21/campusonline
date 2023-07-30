<?php 
  include 'connect.php';
  $all_coupon = mysqli_query($con, "SELECT * FROM `coupans`");
  $coupons = mysqli_query($con, "SELECT * FROM `coupans`");
  $all_coupons = mysqli_query($con, "SELECT * FROM `coupans`");
  $categorys = mysqli_query($con, "SELECT * FROM `categorys`");
  $products = mysqli_query($con, "SELECT * FROM `products`");
  if(isset($_POST['applycoupon'])){
    $coupon = $_POST['coupon'];
    $category = $_POST['category'];
    $product = $_POST['product'];
    $applycoupon = $con -> prepare("INSERT INTO `coupan_applicable`(`coupan_id`, `category_id`, `product_id`) VALUES (?,?,?)");
    $applycoupon -> bind_param("sss",$coupon,$category,$product);
    $applycoupon -> execute();
    if($applycoupon -> affected_rows == 1){
      echo "<script>alert('Coupon Applied Successfully');</script>";
      echo "<script>window.location.href='coupon_applicable.php'</script>";
    }
    else{
      echo "<script>alert('Something Went Wrong');</script>";
      echo "<script>window.location.href='coupon_applicable.php'</script>";
    }
  }
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
                <div class="col-xl">
                    <div class="card mb-4">
                      <!-- Striped Rows -->
                        <div class="card">
                          <h5 class="card-header">Products to Coupons</h5>
                          <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>Coupon</th>
                                  <th>Product</th>
                                  <th>Sku</th>
                                </tr>
                              </thead>  
                              <tbody class="table-border-bottom-0">
                                <?php 
                                  while($row = mysqli_fetch_assoc($all_coupon)){
                                    $pro_coup = mysqli_query($con, "SELECT `product_id` FROM `coupan_applicable` WHERE `coupan_id` = '{$row['coupan_id']}' and `product_id` != '0'");
                                    while($row1 = mysqli_fetch_assoc($pro_coup)){
                                      $product_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT `product_name` FROM `products` WHERE `sku` = '{$row1['product_id']}'"))['product_name'];
                                  ?>
                                <tr>
                                  <td><strong><?php echo $row['coupan_name'] ?></strong></td>
                                  <td><?php echo $product_name ?></td>
                                  <td><?php echo $row1['product_id'] ?></td>
                                </tr>
                                <?php }} ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      <!--/ Striped Rows -->

                    </div>
                </div>
                <div class="col-xl">
                    <div class="card mb-4">
                      <!-- Striped Rows -->
                      <div class="card">
                        <h5 class="card-header">Categorys to Coupons</h5>
                        <div class="table-responsive text-nowrap">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Coupon</th>
                                <th>Category</th>
                                <th>Category ID</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                              <?php while($row = mysqli_fetch_assoc($all_coupons)){
                                  $cat_coup = mysqli_query($con, "SELECT `category_id` FROM `coupan_applicable` WHERE `coupan_id` = '{$row['coupan_id']}'");
                                  while($row1 = mysqli_fetch_assoc($cat_coup)){
                                    $category_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT `category_name` FROM `categorys` WHERE `category_id` = '{$row1['category_id']}'"))['category_name'];
                                ?>
                              <tr>
                                <td><strong><?php echo $row['coupan_name'] ?></strong></td>
                                <td><?php echo $category_name ?></td>
                                <td><?php echo $row1['category_id']?></td>
                              </tr>
                              <?php }} ?>
                            </tbody>
                          </table>
                        </div>
                        </div>
                        <!--/ Striped Rows -->
                     </div>
                </div>
              </div>

                <!-- New Product Adding Form Starts Here Shiva -->
                <form action="" method="post">
                    <!-- Basic Layout -->
                    <div class="row">
                      <div class="col-xl">
                        <div class="card mb-4">
                          <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Apply Coupon to Category or product</h5>
                          </div>
                          <div class="card-body">
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-fullname">Coupon Id</label>
                              <select class="form-select" name="coupon" id="exampleFormControlSelect1" aria-label="Default select example" required>
                                <option selected> Select Coupon </option>
                                <?php while($row = mysqli_fetch_assoc($coupons)){ ?>
                                <option value="<?php echo $row['coupan_id'] ?>"><?php echo $row['coupan_name'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-company">category to Apply</label>
                              <select class="form-select" name="category" id="exampleFormControlSelect1" aria-label="Default select example" >
                                <option > Select Category </option>
                                <?php while($row = mysqli_fetch_assoc($categorys)){ ?>
                                <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-company">Prooduct to Apply</label>
                              <select class="form-select" name="product" id="exampleFormControlSelect1" aria-label="Default select example" >
                                <option > Select Product </option>
                                <?php while($row = mysqli_fetch_assoc($products)){ ?>
                                <option value="<?php echo $row['sku'] ?>"><?php echo $row['product_name'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="applycoupon" class="btn btn-primary">Send</button>
                </form>
                <!-- New Product Adding Form Starts Here Shiva -->

              
            </div>
          </div>
        <!-- Content Ends Here Shiva -->

      <!-- Footer Starts Here Shiva-->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends Here Shiva-->

  </body>
</html>

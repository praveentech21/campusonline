<?php 
  include "connect.php";
  if(isset($_POST['newcoupon'])){
    $coupan_name = $_POST['coupan_name'];
    $coupan_id = $_POST['coupan_id'];
    $coupan_type = $_POST['coupan_type'];
    $coupan_value = $_POST['coupan_value'];
    $coupan_starts = $_POST['coupan_starts'];
    $coupans_ends = $_POST['coupans_ends'];
    $coupan_descrpition = $_POST['coupan_descrpition'];
    $newcoupon = $con ->prepare("INSERT INTO `coupans`(`coupan_name`, `coupan_id`, `coupan_type`, `coupan_value`, `coupan_starts`, `coupans_ends`, `coupan_descrpition`) VALUES (?,?,?,?,?,?,?)");
    $newcoupon -> bind_param("ssidsss",$coupan_name,$coupan_id,$coupan_type,$coupan_value,$coupan_starts,$coupans_ends,$coupan_descrpition);
    $newcoupon -> execute();
    if(isset($newcoupon)){
      echo "<script>alert('New Coupon Added Successfully')</script>";
      echo "<script>window.location.href='coupons.php'</script>";
    }
    else{
      echo "<script>alert('Something Went Wrong')</script>";
      echo "<script>window.location.href='coupons.php'</script>";
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

              <!-- New Product Adding Form Starts Here Shiva -->
              <form action="#" method="post">
                <!-- Basic Layout -->
                <div class="row">
                  <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add New Coupon</h5>
                      </div>
                      <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Name of Coupon</label>
                          <input required name="coupan_name" type="text" class="form-control" id="basic-default-fullname" placeholder=" Shiva_Bhavani " />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Value of Coupon</label>
                          <input required name="coupan_value" type="text" class="form-control" id="basic-default-company" placeholder="Product Price" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Coupon Starts Date</label>
                          <input required name="coupan_starts" type="date" class="form-control" id="basic-default-company" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Coupon Id</label>
                          <input required name="coupan_id" type="text" class="form-control" id="basic-default-company" placeholder="Ram001" />
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlSelect1" class="form-label">Coupon Type</label>
                          <select class="form-select" name="coupan_type" id="exampleFormControlSelect1" aria-label="Default select example" required>
                            <option selected> Select Product Category </option>
                            <option value="1">Flat</option>
                            <option value="2">Discount</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Coupon Ends Date</label>
                          <input required name="coupans_ends" type="date" class="form-control" id="basic-default-company" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">About Coupon</label>
                          <input required name="coupan_descrpition" type="text" class="form-control" id="basic-default-company" placeholder="About Coupon ---- " />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" name="newcoupon" class="btn btn-primary">Send</button>
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

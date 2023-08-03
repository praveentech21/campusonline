<?php 
  include 'connect.php';
  if(isset($_POST['getcoupan'])) $coupon_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM coupans WHERE coupan_id='{$_POST['coupanid']}'"));
  if(isset($_POST['updatecoupan'])){
    $name_coupan = $_POST['name_coupan'];
    $value_coupan = $_POST['value_coupan'];
    $coupan_start_date = $_POST['coupan_start_date'];
    $coupan_type = $_POST['coupan_type'];
    $about_coupan = $_POST['about_coupan'];
    $coupan_ends_date = $_POST['coupan_ends_date'];
    $coupan_id = $_POST['coupan_id'];
    $update_coupan = $con ->prepare("UPDATE `coupans` SET `coupan_name`=?,`coupan_descrpition`=?,`coupan_type`=?,`coupan_value`=?,`coupan_starts`=?,`coupans_ends`=? WHERE `coupan_id`=?");
    $update_coupan -> bind_param("ssidsss",$name_coupan,$about_coupan,$coupan_type,$value_coupan,$coupan_start_date,$coupan_ends_date,$coupan_id);
    if($update_coupan -> execute()) echo "<script>alert('Coupon Updated Successfully')</script>";
    else echo "<script>alert('Coupon Updation Failed')</script>";  
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

                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Select Coupon</h5>
                    <form action="#" method="post">
                      <div class="card-body">
                        <div>
                          <label for="defaultFormControlInput" class="form-label">Coupon ID</label>
                          <input type="text"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="Rama1"
                            aria-describedby="defaultFormControlHelp"
                            type="text"
                            name="coupanid"
                          />
                        </div>
                        <div class="mt-3">
                          <button type="submit" name="getcoupan" class="btn btn-primary">Get Details</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              <?php if(isset($coupon_details)){ ?>

              <!-- New Product Adding Form Starts Here Shiva -->
              <form action="" method="post">
                <!-- Basic Layout -->
                <div class="row">
                  <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Coupon</h5>
                      </div>
                      <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Name of Coupon</label>
                          <input type="text" value="<?php echo $coupon_details['coupan_name'] ?>" class="form-control" id="basic-default-fullname" name="name_coupan" />
                          <input hidden value="<?php echo $coupon_details['coupan_id'] ?>"name="coupan_id" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Value of Coupon</label>
                          <input type="text" value="<?php echo $coupon_details['coupan_value'] ?>" class="form-control" id="basic-default-company" name="value_coupan" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Coupon Starts Date (<?php echo $coupon_details['coupan_starts'] ?>)</label>
                          <input type="date" value="<?php echo $coupon_details['coupan_starts'] ?>" class="form-control" id="basic-default-company" name="coupan_start_date" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Coupon ID</h5>
                      </div>
                      <div class="card-body">
                        <div class="mb-3">
                          <label for="exampleFormControlSelect1" class="form-label">Coupon Type</label>
                          <select name="coupan_type" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" >
                            <option <?php if($coupon_details['coupan_type'] == '1') echo 'selected';?> value="1">Flat</option>
                            <option <?php if($coupon_details['coupan_type'] == '2') echo 'selected';?> value="2">Percentage</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">About Coupon</label>
                          <input name="about_coupan" value="<?php echo $coupon_details['coupan_descrpition'] ?>" type="text" class="form-control" id="basic-default-company" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Prooduct Ends Date (<?php echo $coupon_details['coupans_ends'] ?>)</label>
                          <input name="coupan_ends_date" value="<?php echo $coupon_details['coupans_ends'] ?>" type="date" class="form-control" id="basic-default-company" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" name="updatecoupan" class="btn btn-primary">Send</button>
              </form>
                <!-- New Product Adding Form Starts Here Shiva -->
                <?php } ?>

              
            </div>
          </div>
        <!-- Content Ends Here Shiva -->

      <!-- Footer Starts Here Shiva-->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends Here Shiva-->

  </body>
</html>

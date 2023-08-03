<?php
  include 'connect.php';
  $categories = mysqli_query($con, "SELECT * FROM categorys");
  if(isset($_POST['getcategory'])) $category = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM categorys WHERE category_id='{$_POST['categoryid']}'"));
  if(isset($_POST['updatecategory'])){
    $categoryid = $_POST['categoryid'];
    $categoryname = $_POST['categoryname'];
    $catdescription = $_POST['catdescription'];
    $catweitage = $_POST['catweitage'];
    $updatecategory = $con -> prepare("UPDATE categorys SET category_name=?, category_description=?, category_weightage=? WHERE category_id=?");
    $updatecategory -> bind_param("ssis", $categoryname, $catdescription, $catweitage, $categoryid);
    if($updatecategory -> execute()){
      echo "<script>alert('Category Updated Successfully')</script>";
      echo "<script>window.location.href='edit_categorie.php'</script>";
  }
  else{
      echo "<script>alert('Category Updation Failed')</script>";
      echo "<script>window.location.href='edit_categorie.php'</script>";
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

                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Select Category</h5>
                    <form action="#" method="post">
                      <div class="card-body">
                        <div>
                          <label for="defaultFormControlInput" class="form-label">Category ID</label>
                          <input type="text"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="Rama1"
                            aria-describedby="defaultFormControlHelp"
                            type="number"
                            name="categoryid"
                          />
                        </div>
                        <div class="mt-3">
                          <button type="submit" name="getcategory" class="btn btn-primary">Get Details</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <?php if(isset($category)){ ?>
                <!-- Category Update Form Starts Here Shiva -->
              <form action="" method="post">
                <!-- Basic Layout -->
                <div class="row">
                  <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Category</h5>
                      </div>
                      <div class="card-body">
                      <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">category ID</label>
                          <input type="text" disabled  class="form-control" id="basic-default-fullname" value="<?php echo $category['category_id'] ?>" />
                          <input type="text" hidden name="categoryid" class="form-control" id="basic-default-fullname" value="<?php echo $category['category_id'] ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">category Name</label>
                          <input type="text" name="categoryname" class="form-control" id="basic-default-fullname" value="<?php echo $category['category_name'] ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Description</label>
                          <input type="text" name="catdescription" class="form-control" id="basic-default-fullname" value="<?php echo $category['category_description'] ?>" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Category weitage</label>
                          <input type="number" name="catweitage" class="form-control" id="basic-default-company" value="<?php echo $category['category_weightage'] ?>" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <button type="submit" name="updatecategory" class="btn btn-primary">Send</button>
              </form>
                <!-- Category Update Form Starts Here Shiva -->
                <?php } ?>

              
            </div>
          </div>
        <!-- Content Ends Here Shiva -->

      <!-- Footer Starts Here Shiva-->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends Here Shiva-->

  </body>
</html>

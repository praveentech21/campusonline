<?php 
  include 'connect.php';
  if(isset($_POST['addtag'])){
    $tag = $_POST['tag'];
    $product = $_POST['product'];
    $tag_details = mysqli_query($con,"SELECT * FROM `tags` WHERE tag_name = '$tag' AND product_id = '$product' ");
    if(mysqli_num_rows($tag_details) > 0){
      echo "<script>alert('Tag already exists for the product')</script>";
    }else{
      $add_tag = mysqli_query($con,"INSERT INTO `tags`(`tag_name`, `product_id`) VALUES ('$tag','$product')");
      if($add_tag){
        echo "<script>alert('Tag added successfully')</script>";
      }else{
        echo "<script>alert('Failed to add tag')</script>";
      }
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
                    <h5 class="card-header">Enter Tag to Product </h5>
                    <form action="#" method="post">
                      <div class="card-body">
                      <div>
                          <label for="defaultFormControlInput" class="form-label">Tag</label>
                          <input type="text"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="Biriyani"
                            aria-describedby="defaultFormControlHelp"
                            type="text"
                            name="tag"
                          />
                        </div>
                        <div>
                          <label class="form-label" for="basic-default-company">Prooduct to Apply</label>
                            <select class="form-select" name="product" id="exampleFormControlSelect1" aria-label="Default select example" require>
                              <option value="0" > Select Product </option>
                              <?php 
                                $all_products = mysqli_query($con,"SELECT * FROM `products`");
                                while($row = mysqli_fetch_assoc($all_products)){
                              ?>
                              <option value="<?php echo $row['sku'] ?>"><?php echo $row['product_name'] ?></option>
                              <?php } ?>
                            </select>
                        </div>
                        <div class="mt-3">
                          <button type="submit" name="addtag" class="btn btn-primary">Get Details</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

              
            </div>
          </div>
        <!-- Content Ends Here Shiva -->

      <!-- Footer Starts Here Shiva-->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends Here Shiva-->

  </body>
</html>

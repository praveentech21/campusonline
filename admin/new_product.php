<?php
  include "connect.php";
  $categories = mysqli_query($con, "SELECT `category_name`,`category_id` FROM `categorys`");
  if(isset($_POST['addproduct'])){
    $sku = $_POST['sku'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $dprice = $_POST['dprice'];
    $addinfo = $_POST['addinfo'];
    $aboutpro = $_POST['aboutpro'];
    $stime = $_POST['stime'];
    $pend = $_POST['pend'];
    $no_of_units = $_POST['no_of_units'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $photos = array();
    if(isset($_FILES["photos"]) && !empty($_FILES['photos']['name'][0])){
      $target_dir = "../Bhavani/img/products/";

      foreach ($_FILES["photos"]["tmp_name"] as $key => $tmpName){
        $fileName = uniqid() . '_' . $_FILES["photos"]["name"][$key];
        $photos[] = $fileName;
        $targetPath = $target_dir . $fileName;

        if(move_uploaded_file($tmpName, $targetPath)){
          echo "File uploaded successfully.<br>";
        } else{
          echo "Error uploading file <br>";
        }
      }
    }
    $add_new_product = $con -> prepare("INSERT INTO `products`(`sku`, `product_name`, `product_price`, `category_id`, `discount_price`, `about_product`, `no_units`, `product_start_time`, `product_end_time`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $add_new_product -> bind_param("ssdsdssissssss",$sku,$pname,$pprice,$category,$dprice,$aboutpro,$no_of_units,$stime,$pend,$photos[0],$photos[1],$photos[2],$photos[3],$photos[4]);
    if($add_new_product -> execute()){
      echo "<script>alert('Product Added Successfully')</script>";
    } else {
      echo "<script>alert('Product Adding Failed')</script>";
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
              <form action="#" method="post" enctype="multipart/form-data">
                <!-- Basic Layout -->
                <div class="row">
                  <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add New Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">SKU of Product</label>
                          <input required type="text" name="sku" class="form-control" id="basic-default-fullname" placeholder=" --- COSB001 --- " />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Product Price</label>
                          <input required type="text" name="pprice" class="form-control" id="basic-default-company" placeholder="Product Price" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Prooduct Starts Time</label>
                          <input type="time" name="stime" class="form-control" id="basic-default-company" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">No of Units Avabile</label>
                          <input required type="number" name="no_of_units" class="form-control" id="basic-default-fullname" placeholder="If limated stock is sold give that stock else give a large number" />
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Category</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="category" aria-label="Default select example" required>
                          <option selected> Select Product Category </option>
                          <?php while($row = mysqli_fetch_assoc($categories)){ ?>
                          <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                          <?php } ?>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Description</label>
                          <textarea
                            id="basic-default-message"
                            name="description"
                            class="form-control"
                            placeholder="Give a brief description about the product">
                          </textarea>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Send</button> -->
                      <!-- </form> -->
                    </div>
                  </div>
                  </div>
                  <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">More About Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Product Name</label>
                          <input required type="text" name="pname" class="form-control" id="basic-default-company" placeholder="Product Name" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Discount Price</label>
                          <input required type="text" name="dprice" class="form-control" id="basic-default-company" placeholder="Discount Price" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Prooduct Ends Time</label>
                          <input type="time" name="pend" class="form-control" id="basic-default-company" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">About Prooduct</label>
                          <input required type="text" name="aboutpro" class="form-control" id="basic-default-company" placeholder="About Product ---- " />
                        </div>
                        <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Product Photos (select upto 5)</label>
                        <input required class="form-control" type="file" name="photos[]" id="formFileMultiple" multiple />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Additional Information</label>
                          <textarea
                            id="basic-default-message"
                            name="addinfo"
                            class="form-control"
                            placeholder="All the additional information about the product"
                          ></textarea>
                        </div>
                    </div>
                  </div>
                  </div>
                </div>
                <button type="submit" name="addproduct" class="btn btn-primary">Send</button>
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

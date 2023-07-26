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
                    <h5 class="card-header">Select the Product</h5>
                    <form action="#" method="post">
                      <div class="card-body">
                        <div>
                          <label for="defaultFormControlInput" class="form-label">Product SKU</label>
                          <input type="text"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="COSB001"
                            aria-describedby="defaultFormControlHelp"
                            type="number"
                            name="productsku"
                          />
                        </div>
                        <div class="mt-3">
                          <button type="submit" name="getproduct" class="btn btn-primary">Get Details</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>

                <!-- Update the product details here Shiva -->
              <form action="" method="post">
                <!-- Basic Layout -->
                <div class="row">
                  <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update Product</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">SKU of Product</label>
                          <input disabled type="text" class="form-control" id="basic-default-fullname" placeholder=" --- COSB001 --- " />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Product Price</label>
                          <input required type="text" class="form-control" id="basic-default-company" placeholder="Product Price" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Prooduct Starts Time</label>
                          <input required type="time" class="form-control" id="basic-default-company" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">No of Units Avabile</label>
                          <input required type="number" class="form-control" id="basic-default-fullname" placeholder="If limated stock is sold give that stock else give a large number" />
                        </div>
                        <div class="mb-3">
                        <label for="exampleFormControlSelect1" class="form-label">Select Category</label>
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" required>
                          <option selected> Select Product Category </option>
                          <option value="1">one</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Description</label>
                          <textarea
                            id="basic-default-message"
                            class="form-control"
                            placeholder="Give a brief description about the product"
                          ></textarea>
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
                          <input required type="text" class="form-control" id="basic-default-company" placeholder="Product Name" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Discount Price</label>
                          <input required type="text" class="form-control" id="basic-default-company" placeholder="Discount Price" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Prooduct Ends Time</label>
                          <input required type="time" class="form-control" id="basic-default-company" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">About Prooduct</label>
                          <input required type="text" class="form-control" id="basic-default-company" placeholder="About Product ---- " />
                        </div>
                        <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Product Photos</label>
                        <input required class="form-control" type="file" id="formFileMultiple" multiple />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Additional Information</label>
                          <textarea
                            id="basic-default-message"
                            class="form-control"
                            placeholder="All the additional information about the product"
                          ></textarea>
                        </div>
                    </div>
                  </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </form>

                <!-- Update Product Details Completed here Shiva -->


              
            </div>
          </div>
        <!-- Content Ends Here Shiva -->

      <!-- Footer Starts Here Shiva-->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends Here Shiva-->

  </body>
</html>

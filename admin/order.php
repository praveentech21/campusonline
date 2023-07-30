
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

            <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Order Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="Bhavani/img/avatars/sureshsir.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Sai Praveen</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Complete</span>
                          </button>

                          <p class="text-muted mb-0">Reg no : 21B91A6206</p>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

                <hr class="my-0" />

                <div class="card">
                  <h5 class="card-header">Products</h5>
                  <div class="card-body">
                    <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Coupon</th>
                            <th>Shipping</th>
                            <th>TOtal</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><strong>Price</strong></td>
                            <td>Albert Cook</td>
                            <td>Albert Cook</td>
                            <td>Albert Cook</td>
                            <td><span class="badge bg-label-primary me-1">Active</span></td>
                          </tr>
                        </tbody>
                      </table>
                        <hr class="my-3">
                      <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <td><strong>Price</strong></td>
                            <td>Albert Cook</td>
                          </tr>
                          <tr>
                            <td><strong>Discount</strong></td>
                            <td>Albert Cook</td>
                          </tr>
                          <tr>
                            <td><strong>Coupon Price</strong></td>
                            <td>Albert Cook</td>
                          </tr>
                          <tr>
                            <td><strong>Shipping</strong></td>
                            <td>Albert Cook</td>
                          </tr>
                          <tr>
                            <td><strong>Total</strong></td>
                            <td>Albert Cook</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
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

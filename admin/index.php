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
                <!-- Today Delivary Agent Report Starts Here Shiva -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <h5 class="card-header">This Week Sales Report</h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Day</th>
                              <th>No of Order</th>
                              <th>Sales</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Rama Seetha</strong></td>
                              <td><a href="tel:9052727402">9052727402</a></td>
                              <td><span class="badge bg-label-warning me-1"> Boxes</span></td>
                              <td><span class="badge bg-label-primary me-1"> Boxes</span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Today Delivary Agent Report Ends Here Shiva -->


                <!-- Data Cards Here Shiva -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                  <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="BHavani/img/icons/unicons/chart-success.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="d-block mb-1">Total Orders</span>
                          <h3 class="card-title text-nowrap mb-2">5 Orders</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="BHavani/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">In Transition</span>
                          <h3 class="card-title mb-2">5 Boxes</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="Bhavani/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="d-block mb-1">Not Picked Up</span>
                          <h3 class="card-title text-nowrap mb-2">5 Boxes</h3>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="Bhavani/img/icons/unicons/cc-warning.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">In Transition</span>
                          <h3 class="card-title mb-2">5 Boxes</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <!--/ Data Cards Here Shiva -->
                <hr class="my-4">
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">category Wise Sales</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Category Name</th>
                          <th>Category ID</th>
                          <th>No of Products </th>
                          <th>No of Orders </th>
                          <th>Sales</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><strong>Angular Project</strong></td>
                          <td>Albert Cook</td>
                          <td>Albert Cook</td>
                          <td><span class="badge bg-label-primary me-1">Active</span></td>
                          <td><span class="badge bg-label-primary me-1">Active</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
              <hr class="my-4">
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Coupon Wise Sales</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Coupon Name</th>
                          <th>Coupon ID</th>
                          <th>No of Orders</th>
                          <th>Sale Amount</th>
                          <th>Coupon Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><strong>Angular Project</strong></td>
                          <td>Albert Cook</td>
                          <td>Albert Cook</td>
                          <td><span class="badge bg-label-primary me-1">Active</span></td>
                          <td><span class="badge bg-label-primary me-1">Active</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
              <hr class="my-4">
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Monthly Orders</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Orders</th>
                          <th>Sales</th>
                          <th>Discount</th>
                          <th>Coupon</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><strong>Angular Project</strong></td>
                          <td>Albert Cook</td>
                          <td>Albert Cook</td>
                          <td><span class="badge bg-label-primary me-1">Active</span></td>
                          <td><span class="badge bg-label-primary me-1">Active</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->



            </div>
          </div>
        <!-- Content Ends Here Shiva -->

      <!-- Footer Starts Here Shiva-->
        <?php include 'footer.php'; ?>
      <!-- Footer Ends Here Shiva-->

  </body>
</html>

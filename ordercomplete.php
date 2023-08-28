<?php
	include 'connect.php';
	if(!isset($_SESSION['order_id'])) header("location: index.php");
	$order_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `order_details` WHERE order_id = '{$_SESSION['order_id']}'"));
	$student_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `students` WHERE student_id = '{$order_details['coustmer_id']}'"));
	$order_products = mysqli_query($con, "SELECT * FROM `orders` WHERE order_id = '{$_SESSION['order_id']}'");
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SRKR Campus Online Order Complete</title>	

		<meta name="keywords" content="WebSite Template" />
		<meta name="description" content="Porto - Multipurpose Website Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="Bhavani/img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="Bhavani/img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="Bhavani/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="Bhavani/vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="Bhavani/vendor/animate/animate.compat.css">
		<link rel="stylesheet" href="Bhavani/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="Bhavani/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="Bhavani/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="Bhavani/vendor/magnific-popup/magnific-popup.min.css">
		<link rel="stylesheet" href="Bhavani/vendor/bootstrap-star-rating/css/star-rating.min.css">
		<link rel="stylesheet" href="Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="Bhavani/css/theme.css">
		<link rel="stylesheet" href="Bhavani/css/theme-elements.css">
		<link rel="stylesheet" href="Bhavani/css/theme-blog.css">
		<link rel="stylesheet" href="Bhavani/css/theme-shop.css">

		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="Bhavani/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="Bhavani/css/custom.css">

		<!-- Head Libs -->
		<script src="Bhavani/vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body data-plugin-page-transition>

		<div class="body">
			<!-- <div class="notice-top-bar bg-primary" data-sticky-start-at="180">
				<button class="hamburguer-btn hamburguer-btn-light notice-top-bar-close m-0 active" data-set-active="false">
					<span class="close">
						<span></span>
						<span></span>
					</span>
				</button>
				<div class="container">
					<div class="row justify-content-center py-2">
						<div class="col-9 col-md-12 text-center">
							<p class="text-color-light font-weight-semibold mb-0">Get Up to <strong>40% OFF</strong> New-Season Styles <a href="#" class="btn btn-primary-scale-2 btn-modern btn-px-2 btn-py-1 ms-2">MEN</a> <a href="#" class="btn btn-primary-scale-2 btn-modern btn-px-2 btn-py-1 ms-1 me-2">WOMAN</a> <span class="opacity-6 text-1">* Limited time only.</span></p>
						</div>
					</div>
				</div>
			</div> -->
				<!-- Hearder Comes Here Shiva -->
				<?php include 'shoping_header.php'; ?>
			<div role="main" class="main shop pb-4">

				<div class="container">

					<div class="row justify-content-center">
						<div class="col-lg-8">
							<ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 justify-content-center my-5">
								<li class="text-transform-none me-2">
									<a href="cart.php" class="text-decoration-none text-color-dark text-color-hover-primary">Shopping Cart</a>
								</li>
								<li class="text-transform-none text-color-dark me-2">
									<a href="checkout.php" class="text-decoration-none text-color-dark text-color-hover-primary">Checkout</a>
								</li>
								<li class="text-transform-none text-color-dark">
									<a href="ordercomplete.php" class="text-decoration-none text-color-primary">Order Complete</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-lg-8">
							<div class="card border-width-3 border-radius-0 border-color-success">
								<div class="card-body text-center">
									<p class="text-color-dark font-weight-bold text-4-5 mb-0"><i class="fas fa-check text-color-success me-1"></i> Thank You. Your Order has been received.</p>
								</div>
							</div>
							<div class="d-flex flex-column flex-md-row justify-content-between py-3 px-4 my-4">
								<div class="text-center">
									<span>
										Order Number <br>
										<strong class="text-color-dark"><?php echo $_SESSION['order_id'] ?></strong>
									</span>
								</div>
								<div class="text-center mt-4 mt-md-0">
									<span>
										Date <br>
										<strong class="text-color-dark"><?php echo $order_details['order_date'] ?></strong>
									</span>
								</div>
								<div class="text-center mt-4 mt-md-0">
									<span>
										Name <br>
										<strong class="text-color-dark"><?php echo $student_details['student_name'] ?></strong>
									</span>
								</div>
								<div class="text-center mt-4 mt-md-0">
									<span>
										Total <br>
										<strong class="text-color-dark"><?php echo $order_details['order_amount'] ?></strong>
									</span>
								</div>
								<div class="text-center mt-4 mt-md-0">
									<span>
										Payment Method <br>
										<strong class="text-color-dark">Cash on Delivery</strong>
									</span>
								</div>
							</div>
							<div class="card border-width-3 border-radius-0 border-color-hover-dark mb-4">
								<div class="card-body">
									<h4 class="font-weight-bold text-uppercase text-4 mb-3">Your Order</h4>
									<table class="shop_table cart-totals mb-0">
										<tbody>
											<tr>
												<td colspan="2" class="border-top-0">
													<strong class="text-color-dark">Product</strong>
												</td>
											</tr>
											<?php
													while($row = mysqli_fetch_array($order_products)){
													$product = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$row['product_id']}'"));
													$category_name = mysqli_fetch_array(mysqli_query($con, "SELECT category_name FROM categorys WHERE category_id = '{$product['category_id']}'"));
												?>
												<tr>
													<td>
														<strong class="d-block text-color-dark line-height-1 font-weight-semibold"><?php echo $product['product_name']; ?> <span class="product-qty">x <?php echo $row['product_quantity'];?></span></strong>
														<span class="text-1"><?php echo $category_name['category_name'];?></span>
													</td>
													<td class="text-end align-top">
													<p class="text-4 mb-2">
														<?php if($product['discount_price'] != 0){	?>
															<span class="amount">&#8377; <del><?php echo $product['product_price'] ?></del></span><br>
															<span class="sale text-color-dark font-weight-semi-bold">&#8377; <?php echo $product['discount_price'] ?></span>
															<?php }else{  ?>
															<span class="amount">&#8377; <?php echo $product['product_price'] ?></span>
														<?php } ?>
													</p>
													</td>
												</tr>
												<?php } ?>
											<tr class="cart-subtotal">
												<td class="border-top-0">
													<strong class="text-color-dark">Order Amount</strong>
												</td>
												<td class="border-top-0 text-end">
													<strong><span class="amount font-weight-medium"><?php echo $order_details['order_amount'] ?></span></strong>
												</td>
											</tr>
											<tr class="shipping">
												<td class="border-top-0">
													<strong class="text-color-dark">Shipping</strong>
												</td>
												<td class="border-top-0 text-end">
													<strong><span class="amount font-weight-medium">Free Shipping</span></strong>
												</td>
											</tr>
											<tr class="total">
												<td>
													<strong class="text-color-dark text-3-5">Total</strong>
												</td>
												<td class="text-end">
													<strong class="text-color-dark"><span class="amount text-color-dark text-5"><?php echo $order_details['order_amount'] ?></span></strong>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row pt-3">
								<div class="col-lg-6 mb-4 mb-lg-0">
									<h2 class="text-color-dark font-weight-bold text-5-5 mb-1"> Address</h2>
									<ul class="list list-unstyled text-2 mb-0">
										<li class="mb-0"><?php echo $student_details['student_name'] ?></li>
										<li class="mb-0"><a href="tel:<?php echo $student_details['student_mobile'] ?>"><?php echo $student_details['student_mobile'] ?></a></li>
										<li class="mb-0"><?php echo $order_details['address'] ?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
			<?php include"shoping_fotter.php" ?>
			<!-- Fotter Start Here Shiva -->
		</div>

		<!-- Vendor -->
		<script src="Bhavani/vendor/plugins/js/plugins.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="Bhavani/js/theme.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="Bhavani/js/views/view.shop.js"></script>

		<!-- Theme Custom -->
		<script src="Bhavani/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="Bhavani/js/theme.init.js"></script>

	</body>
</html>

<?php
include "connect.php";
if (empty($_SESSION['student_id']) or $_SESSION['student_id'] == '000000') header('location:login.php');
$cartproducts = mysqli_query($con, "SELECT * FROM cart WHERE coustmer_id = '{$_SESSION['student_id']}'");
$subtotal = 0;
$discountprice = 0;
$coupanprice = 0;
$total = 0;
!empty($_SESSION['coupanprice']) ? $coupanprice = $_SESSION['coupanprice'] : $coupanprice = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Check Out Campus Online</title>

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
		<?php include 'shoping_header.php'; ?>
		<!-- Header Starts here Shiva -->
		<div role="main" class="main shop pb-4">

			<div class="container">

				<div class="row">
					<div class="col">
						<ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 justify-content-center my-5">
							<li class="text-transform-none me-2">
								<a href="cart.php" class="text-decoration-none text-color-dark text-color-hover-primary">Shopping Cart</a>
							</li>
							<li class="text-transform-none text-color-dark me-2">
								<a href="checkout.php" class="text-decoration-none text-color-primary">Checkout</a>
							</li>
							<li class="text-transform-none text-color-grey-lighten">
								<a href="ordercomplete.php" class="text-decoration-none text-color-grey-lighten text-color-hover-primary">Order Complete</a>
							</li>
						</ul>
					</div>
				</div>


				<div class="row">
					<div class="col">
						<p>Have a coupon? <a href="cart.php" class="text-color-dark text-color-hover-primary text-uppercase text-decoration-none font-weight-bold" data-bs-toggle="collapse" data-bs-target=".coupon-form-wrapper">Enter your code</a></p>
					</div>
				</div>

				<form action="#" class="needs-validation" method="post">
					<div class="row">
						<!-- <div class="col-lg-7 mb-4 mb-lg-0">

								<h2 class="text-color-dark font-weight-bold text-5-5 mb-3">Delivery Details</h2>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">Place or Block to Delivery <span class="text-color-danger">*</span></label>
										<div class="custom-select-1">
											<select class="form-select form-control h-auto py-2" name="country" required>
												<option value="" selected></option>
												<option value="Idea Lab">Idea Lab</option>
												<option value="IT Block">IT Block</option>
												<option value="CSE Block">CSE Block</option>
												<option value="Adminstrative Block">Adminstrative Block</option>
												<option value="ECE Block">ECE Block</option>
												<option value="EEE Block">EEE Block</option>
												<option value="Mechnical Block">Mechnical Block</option>
												<option value="Civil Block">Civil Block</option>
												<option value="I Block">I Block</option>
												<option value="S Block">S Block</option>
												<option value="Girls Hostel Block">Girls Hostel Block</option>
												<option value="Gym Block">Gym Block</option>
												<option value="Canteen">Canteen</option>
											</select>
										</div>
									</div>
								</div>
							</div> -->
						<div class="col-lg-5 position-relative">
							<div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
								<div class="card-body">
									<h4 class="font-weight-bold text-uppercase text-4 mb-3">Your Order</h4>
									<table class="shop_table cart-totals mb-3">
										<tbody>
											<tr>
												<td colspan="2" class="border-top-0">
													<strong class="text-color-dark">Product</strong>
												</td>
											</tr>
											<?php
											while ($row = mysqli_fetch_array($cartproducts)) {
												$product = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$row['product_id']}'"));
												$category_name = mysqli_fetch_array(mysqli_query($con, "SELECT category_name FROM categorys WHERE category_id = '{$product['category_id']}'"));
											?>
												<tr>
													<td>
														<strong class="d-block text-color-dark line-height-1 font-weight-semibold"><?php echo $product['product_name']; ?> <span class="product-qty">x <?php echo $row['product_quantity']; ?></span></strong>
														<span class="text-1"><?php echo $category_name['category_name']; ?></span>
													</td>
													<td class="text-end align-top">
														<p class="text-4 mb-2">
															<?php if ($product['discount_price'] != 0) {
																$discountprice += $product['product_price'] * $row['product_quantity'] - $product['discount_price'] * $row['product_quantity'];
															?>
																<span class="amount">&#8377; <del><?php echo $product['product_price'] ?></del></span><br>
																<span class="sale text-color-dark font-weight-semi-bold">&#8377; <?php echo $product['discount_price'] ?></span>
															<?php } else {  ?>
																<span class="amount">&#8377; <?php echo $product['product_price'] ?></span>
															<?php } ?>
														</p>
													</td>
												</tr>
											<?php $subtotal += $product['product_price'] * $row['product_quantity'];
											} ?>
											<tr class="cart-subtotal">
												<td class="border-top-0">
													<strong class="text-color-dark">Subtotal</strong>
												</td>
												<td class="border-top-0 text-end">
													<strong><span class="amount font-weight-medium">&#8377; <?php echo $subtotal ?></span></strong>
												</td>
											</tr>
											<tr class="cart-subtotal">
												<td class="border-top-0">
													<strong class="text-color-dark">Discount </strong>
												</td>
												<td class="border-top-0 text-end">
													<strong><span class="amount font-weight-medium"><b>&#8377; <?php echo $discountprice ?></b></span></strong>
												</td>
											</tr>
											<tr class="cart-subtotal">
												<td class="border-top-0">
													<strong class="text-color-dark">Coupan </strong>
												</td>
												<td class="border-top-0 text-end">
													<strong><span class="amount font-weight-medium"><b>&#8377; <?php echo $coupanprice ?></b></span></strong>
												</td>
											</tr>
											<tr class="cart-subtotal">
												<td class="border-top-0">
													<strong class="text-color-dark">Shipping </strong>
												</td>
												<td class="border-top-0 text-end">
													<strong><span class="amount font-weight-medium"><b> &#8377; 0 </b></span></strong>
												</td>
											</tr>
											<tr class="total">
												<td>
													<strong class="text-color-dark text-3-5">Total</strong>
												</td>
												<td class="text-end">
													<strong class="text-color-dark"><span class="amount text-color-dark text-5"> &#8377; <?php echo $total = $subtotal - $discountprice - $coupanprice; ?></span></strong>
												</td>
											</tr>
											<tr class="payment-methods">
												<td colspan="2">
													<strong class="d-block text-color-dark mb-2">Payment Methods</strong>

													<div class="d-flex flex-column">
														<label class="d-flex align-items-center text-color-grey mb-0" for="cridets">
															<input id="cridets" type="radio" class="me-2" name="payment_method" value=1 checked />
															Payment from Cridets
														</label>
														<label class="d-flex align-items-center text-color-grey mb-0" for="recharge">
															<input id="recharge" type="radio" class="me-2" name="payment_method" value=2 />
															Payment from Recharge
														</label>
														<label class="d-flex align-items-center text-color-grey mb-0" for="cashondel">
															<input id="cashondel" type="radio" class="me-2" name="payment_method" value=3 />
															Cash on delivery
														</label>
													</div>
												</td>
											</tr>
											<tr>
												<td colspan="2">
													We will Delivery Your Faviourt Product in 2-3 hours
												</td>
											</tr>
										</tbody>
									</table>
									<button type="submit" name="placeorder" class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">Place Order <i class="fas fa-arrow-right ms-2"></i></button>
								</div>
							</div>
						</div>
					</div>
				</form>

			</div>

		</div>
		<?php include 'shoping_fotter.php'; ?>
		<!-- Footer Starts here Shiva -->
	</div>

	<!-- Vendor -->
	<script src="vendor/plugins/js/plugins.min.js"></script>
	<script src="vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
	<script src="vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Current Page Vendor and Views -->
	<script src="js/views/view.shop.js"></script>

	<!-- Theme Custom -->
	<script src="js/custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>

	<?php

	function checkcridentials($con, $ordramount)
	{
		$studcre = mysqli_fetch_assoc(mysqli_query($con, "SELECT `reacharge`, `cridets` FROM `students` WHERE student_id = '{$_SESSION['student_id']}'"));
		$rechargepoints = $studcre['reacharge'];
		$cridets = $studcre['cridets'];
		if ($rechargepoints < $ordramount) {
			echo "<script> document.getElementById('recharge').disabled = true;</script>";
		}
		if ($cridets < $ordramount) {
			echo "<script> document.getElementById('cridets').disabled = true;</script>";
		}

		if ($rechargepoints > $ordramount and $cridets > $ordramount) return 1;
		elseif ($rechargepoints > $ordramount) return 3;
		elseif ($cridets > $ordramount) return 2;
		else return 4;
	}

	$amountcheck = checkcridentials($con, $total);

	if (isset($_POST['placeorder'])) {
		function generateRandomOrderId($con, $length = 5)
		{
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomOrderId = '';
			$maxTries = 10;
			for ($i = 0; $i < $length; $i++) {
				$randomOrderId .= $characters[rand(0, strlen($characters) - 1)];
			}

			for ($try = 0; $try < $maxTries; $try++) {
				if (!isOrderIdUnique($con, $randomOrderId)) {
					$randomOrderId = '';
					for ($i = 0; $i < $length; $i++) {
						$randomOrderId .= $characters[rand(0, strlen($characters) - 1)];
					}
				} else {
					break;
				}
			}

			return $randomOrderId;
		}
		function isOrderIdUnique($con, $orderId)
		{
			$query = "SELECT COUNT(*) AS count FROM `order_details` WHERE order_id = ?";
			$stmt = $con->prepare($query);
			$stmt->bind_param("s", $orderId);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$count = $row['count'];
			return $count === 0;
		}

		$payment_method = $_POST['payment_method'];
		if ($amountcheck == 4 or $amountcheck == 3 and $payment_method == 1) {
			echo "<script>alert('You have not enough cridets to place order');  window.location.href = 'checkout.php';</script>";
		} elseif ($amountcheck == 4 or $amountcheck == 2 and $payment_method == 2) {
			echo "<script>alert('You have not enough recharge points to place order');  window.location.href = 'checkout.php';</script>";
		}

		$ordered_products = mysqli_query($con, "SELECT * FROM cart WHERE coustmer_id = '{$_SESSION['student_id']}'");
		$newOrderId = generateRandomOrderId($con);
		$order_details = mysqli_query($con, "INSERT INTO `order_details`(`order_id`, `coustmer_id`, `payment`, `total_amount`,`discount_price`, `coupan_price`, `Shipping_price`, `order_amount`, `status`, `address`) VALUES ('$newOrderId','{$_SESSION['student_id']}',$payment_method,'$subtotal','$discountprice','$coupanprice','0','$total','1','{$_POST['country']}')");
		while ($row = mysqli_fetch_assoc($ordered_products)) {
			$place_order = mysqli_query($con, "INSERT INTO `orders`(`order_id`, `coustmer_id`, `product_id`, `product_quantity`)VALUES ('$newOrderId','{$_SESSION['student_id']}','{$row['product_id']}','{$row['product_quantity']}')");
		}
		if (isset($order_details) && isset($place_order)) {
			
		if($payment_method == 1)$set_amount = mysqli_query($con, "UPDATE `students` SET `cridets`=`cridets`- $total WHERE `student_id` = '{$_SESSION['student_id']}'");
		elseif($payment_method == 2) $set_amount = mysqli_query($con, "UPDATE `students` SET `reacharge`=`reacharge`- $total WHERE `student_id` = '{$_SESSION['student_id']}'");

			$_SESSION['order_id'] = $newOrderId;
			$deleate_cart = mysqli_query($con, "DELETE FROM `cart` WHERE coustmer_id = '{$_SESSION['student_id']}'");
			echo "<script>alert('Order Placed Successfully');  window.location.href = 'ordercomplete.php';</script>";
		}
	}
	?>
</body>

</html>
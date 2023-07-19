<?php include "connect.php" ?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Single Product Left Sidebar | Porto - Multipurpose Website Template</title>	

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
			<div class="notice-top-bar bg-primary" data-sticky-start-at="180">
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
			</div>
				<?php include 'shoping_header.php'; ?>
				<!-- Header Starts here Shiva -->
			<div role="main" class="main shop pb-4">

				<div class="container">

					<div class="row">
						<div class="col">
							<ul class="breadcrumb breadcrumb-dividers-no-opacity font-weight-bold text-6 justify-content-center my-5">
								<li class="text-transform-none me-2">
									<a href="shop-cart.html" class="text-decoration-none text-color-dark text-color-hover-primary">Shopping Cart</a>
								</li>
								<li class="text-transform-none text-color-dark me-2">
									<a href="shop-checkout.html" class="text-decoration-none text-color-primary">Checkout</a>
								</li>
								<li class="text-transform-none text-color-grey-lighten">
									<a href="shop-order-complete.html" class="text-decoration-none text-color-grey-lighten text-color-hover-primary">Order Complete</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="row">
						<div class="col">
							<p class="mb-1">Returning customer? <a href="#" class="text-color-dark text-color-hover-primary text-uppercase text-decoration-none font-weight-bold" data-bs-toggle="collapse" data-bs-target=".login-form-wrapper">Login</a></p>
						</div>
					</div>

					<div class="row login-form-wrapper collapse mb-5">
						<div class="col">
							<div class="card border-width-3 border-radius-0 border-color-hover-dark">
								<div class="card-body">
									<form action="/" id="frmSignIn" method="post">
										<div class="row">
											<div class="form-group col">
												<label class="form-label text-color-dark text-3">Email address <span class="text-color-danger">*</span></label>
												<input type="text" value="" class="form-control form-control-lg text-4" required>
											</div>
										</div>
										<div class="row">
											<div class="form-group col">
												<label class="form-label text-color-dark text-3">Password <span class="text-color-danger">*</span></label>
												<input type="password" value="" class="form-control form-control-lg text-4" required>
											</div>
										</div>
										<div class="row justify-content-between">
											<div class="form-group col-md-auto">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="rememberme">
													<label class="form-label custom-control-label cur-pointer text-2" for="rememberme">Remember Me</label>
												</div>
											</div>
											<div class="form-group col-md-auto">
												<a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="#">Forgot Password?</a>
											</div>
										</div>
										<div class="row">
											<div class="form-group col">
												<button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Login</button>
												<div class="divider">
													<span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">or</span>
												</div>
												<a href="#" class="btn btn-primary-scale-2 btn-modern w-100 text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-facebook text-5 me-2"></i> Login With Facebook</a>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col">
							<p>Have a coupon? <a href="#" class="text-color-dark text-color-hover-primary text-uppercase text-decoration-none font-weight-bold" data-bs-toggle="collapse" data-bs-target=".coupon-form-wrapper">Enter your code</a></p>
						</div>
					</div>

					<div class="row coupon-form-wrapper collapse mb-5">
						<div class="col">
							<div class="card border-width-3 border-radius-0 border-color-hover-dark">
								<div class="card-body">
									<form role="form" method="post" action="">
										<div class="d-flex align-items-center">
											<input type="text" class="form-control h-auto border-radius-0 line-height-1 py-3" name="couponCode" placeholder="Coupon Code" required />
											<button type="submit" class="btn btn-light btn-modern text-color-dark bg-color-light-scale-2 text-color-hover-light bg-color-hover-primary text-uppercase text-3 font-weight-bold border-0 border-radius-0 ws-nowrap btn-px-4 py-3 ms-2">Apply Coupon</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<form role="form" class="needs-validation" method="post" action="">
						<div class="row">
							<div class="col-lg-7 mb-4 mb-lg-0">

								<h2 class="text-color-dark font-weight-bold text-5-5 mb-3">Billing Details</h2>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="form-label">First Name <span class="text-color-danger">*</span></label>
										<input type="text" class="form-control h-auto py-2" name="firstName" value="" required />
									</div>
									<div class="form-group col-md-6">
										<label class="form-label">Last Name <span class="text-color-danger">*</span></label>
										<input type="text" class="form-control h-auto py-2" name="lastName" value="" required />
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">Company Name</label>
										<input type="text" class="form-control h-auto py-2" name="companyName" value="" />
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">Country/Region <span class="text-color-danger">*</span></label>
										<div class="custom-select-1">
											<select class="form-select form-control h-auto py-2" name="country" required>
												<option value="" selected></option>
												<option value="usa">United States</option>
												<option value="spa">Spain</option>
												<option value="fra">France</option>
												<option value="uk">United Kingdon</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">Street Address <span class="text-color-danger">*</span></label>
										<input type="text" class="form-control h-auto py-2" name="address1" value="" placeholder="House number and street name" required />
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<input type="text" class="form-control h-auto py-2" name="address2" value="" placeholder="Apartment, suite, unit, etc..." required />
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">Town/City <span class="text-color-danger">*</span></label>
										<input type="text" class="form-control h-auto py-2" name="city" value="" required />
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">State <span class="text-color-danger">*</span></label>
										<div class="custom-select-1">
											<select class="form-select form-control h-auto py-2" name="state" required>
												<option value="" selected></option>
												<option value="ny">Nova York</option>
												<option value="ca">California</option>
												<option value="tx">Texas</option>
												<option value="">Florida</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">ZIP <span class="text-color-danger">*</span></label>
										<input type="text" class="form-control h-auto py-2" name="zip" value="" required />
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">Phone <span class="text-color-danger">*</span></label>
										<input type="number" class="form-control h-auto py-2" name="phone" value="" required />
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">Email Address <span class="text-color-danger">*</span></label>
										<input type="email" class="form-control h-auto py-2" name="email" value="" required />
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<div class="custom-checkbox-1">
											<input id="createAccount" type="checkbox" name="createAccount" value="1" />
											<label for="createAccount">Create an account ?</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col">
										<div class="custom-checkbox-1" data-bs-toggle="collapse" data-bs-target=".shipping-field-wrapper">
											<input id="shipAddress" type="checkbox" name="shipAddress" value="1" />
											<label for="shipAddress">Shop to a different address ?</label>
										</div>
									</div>
								</div>
								<!-- Ship to a differente address fields -->
								<div class="shipping-field-wrapper collapse">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="form-label">First Name <span class="text-color-danger">*</span></label>
											<input type="text" class="form-control h-auto py-2" name="shippingFirstName" value="" required />
										</div>
										<div class="form-group col-md-6">
											<label class="form-label">Last Name <span class="text-color-danger">*</span></label>
											<input type="text" class="form-control h-auto py-2" name="shippingLastName" value="" required />
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="form-label">Company Name</label>
											<input type="text" class="form-control h-auto py-2" name="shippingCompanyName" value="" />
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="form-label">Country/Region <span class="text-color-danger">*</span></label>
											<div class="custom-select-1">
												<select class="form-select form-control h-auto py-2" name="shippingCountry" required>
													<option value="" selected></option>
													<option value="usa">United States</option>
													<option value="spa">Spain</option>
													<option value="fra">France</option>
													<option value="uk">United Kingdon</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="form-label">Street Address <span class="text-color-danger">*</span></label>
											<input type="text" class="form-control h-auto py-2" name="shippingAddress1" value="" placeholder="House number and street name" required />
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<input type="text" class="form-control h-auto py-2" name="shippingAddress2" value="" placeholder="Apartment, suite, unit, etc..." required/>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="form-label">Town/City <span class="text-color-danger">*</span></label>
											<input type="text" class="form-control h-auto py-2" name="shippingCity" value="" required />
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="form-label">State <span class="text-color-danger">*</span></label>
											<div class="custom-select-1">
												<select class="form-select form-control h-auto py-2" name="shippingState" required>
													<option value="" selected></option>
													<option value="ny">Nova York</option>
													<option value="ca">California</option>
													<option value="tx">Texas</option>
													<option value="">Florida</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="form-label">ZIP <span class="text-color-danger">*</span></label>
											<input type="text" class="form-control h-auto py-2" name="shippingZip" value="" required />
										</div>
									</div>
									<div class="row">
										<div class="form-group col">
											<label class="form-label">Phone <span class="text-color-danger">*</span></label>
											<input type="number" class="form-control h-auto py-2" name="shippingPhone" value="" required />
										</div>
									</div>
									<!-- End of Ship to a differente address fields -->
								</div>
								<div class="row">
									<div class="form-group col">
										<label class="form-label">Order Notes</label>
										<textarea class="form-control h-auto py-2" name="orderNotes" rows="5" placeholder="Notes about you orderm e.g. special notes for delivery"></textarea>
									</div>
								</div>

							</div>
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
												<tr>
													<td>
														<strong class="d-block text-color-dark line-height-1 font-weight-semibold">Black Porto Smartwatch <span class="product-qty">x1</span></strong>
														<span class="text-1">COLOR BLACK</span>
													</td>
													<td class="text-end align-top">
														<span class="amount font-weight-medium text-color-grey">$15</span>
													</td>
												</tr>
												<tr>
													<td class="border-top-0 pt-0">
														<strong class="d-block text-color-dark line-height-1 font-weight-semibold">Black Porto Smartwatch <span class="product-qty">x1</span></strong>
														<span class="text-1">COLOR BLACK</span>
													</td>
													<td class="border-top-0 text-end align-top pt-0">
														<span class="amount font-weight-medium text-color-grey">$15</span>
													</td>
												</tr>
												<tr class="cart-subtotal">
													<td class="border-top-0">
														<strong class="text-color-dark">Subtotal</strong>
													</td>
													<td class="border-top-0 text-end">
														<strong><span class="amount font-weight-medium">$431</span></strong>
													</td>
												</tr>
												<tr class="shipping">
													<td colspan="2">
														<strong class="d-block text-color-dark mb-2">Shipping</strong>

														<div class="d-flex flex-column">
															<label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method1">
																<input id="shipping_method1" type="radio" class="me-2" name="shipping_method" value="free" checked />
																Free Shipping
															</label>
															<label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method2">
																<input id="shipping_method2" type="radio" class="me-2" name="shipping_method" value="local-pickup" />
																Local Pickup
															</label>
															<label class="d-flex align-items-center text-color-grey mb-0" for="shipping_method3">
																<input id="shipping_method3" type="radio" class="me-2" name="shipping_method" value="flat-rate" />
																Flat Rate: $5.00
															</label>
														</div>
													</td>
												</tr>
												<tr class="total">
													<td>
														<strong class="text-color-dark text-3-5">Total</strong>
													</td>
													<td class="text-end">
														<strong class="text-color-dark"><span class="amount text-color-dark text-5">$431</span></strong>
													</td>
												</tr>
												<tr class="payment-methods">
													<td colspan="2">
														<strong class="d-block text-color-dark mb-2">Payment Methods</strong>

														<div class="d-flex flex-column">
															<label class="d-flex align-items-center text-color-grey mb-0" for="payment_method1">
																<input id="payment_method1" type="radio" class="me-2" name="payment_method" value="cash-on-delivery" checked />
																Cash On Delivery
															</label>
															<label class="d-flex align-items-center text-color-grey mb-0" for="payment_method2">
																<input id="payment_method2" type="radio" class="me-2" name="payment_method" value="paypal" />
																PayPal
															</label>
														</div>
													</td>
												</tr>
												<tr>
													<td colspan="2">
														Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.
													</td>
												</tr>
											</tbody>
										</table>
										<button type="submit" class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">Place Order <i class="fas fa-arrow-right ms-2"></i></button>
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

	</body>
</html>

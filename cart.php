<?php 
	include "connect.php"; 
	$cartproducts = mysqli_query($con, "SELECT * FROM cart WHERE coustmer_id = '{$_SESSION['student_id']}'");
	$subtotal = 0;
	$discountprice = 0;
	$coupanprice = 0;
	if(mysqli_num_rows($cartproducts) == 0) echo "<script>alert('Your Cart is Empty'); window.location.href='index.php';</script>";
	if(isset($_POST['applycoupan'])){
		$checkcoupan = mysqli_query($con, "SELECT * FROM coupans WHERE coupan_name = '{$_POST['couponCode']}'");
		if(mysqli_num_rows($checkcoupan) != 0){
			$coupan = mysqli_fetch_array($checkcoupan);
			$checkcoupan_used = mysqli_query($con, "SELECT * FROM coupans_used WHERE coupan_id = '{$coupan['coupan_id']}' and coustmer_id = '{$_SESSION['student_id']}'");
			if(mysqli_num_rows($checkcoupan_used) == 0){
				$products_cart = mysqli_query($con, "SELECT * FROM cart WHERE coustmer_id = '{$_SESSION['student_id']}'");
				$checkcoupan_applied = mysqli_query($con, "SELECT * FROM coupan_applicable WHERE coupan_id = '{$coupan['coupan_id']}'");
				$cat_in_coupan = array();
				$cat_in_cart = array();
				$pro_in_coupan = array();
				$pro_in_cart = array();
				while($rcat = mysqli_fetch_array($products_cart)){
					$product = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$rcat['product_id']}'"));
					array_intersect($product['category_id'], $cat_in_cart);
					array_intersect($product['product_id'], $pro_in_cart);
				}
				while($rcoupan = mysqli_fetch_array($checkcoupan_applied)){
					array_intersect($rcoupan['category_id'], $cat_in_coupan);
					array_intersect($rcoupan['product_id'], $pro_in_coupan);
				}
				$cat_in_cartandcoupan = array_intersect($cat_in_cart, $cat_in_coupan);
				$pro_in_cartandcoupan = array_intersect($pro_in_cart, $pro_in_coupan);
				if(count($cat_in_cartandcoupan) != 0){
					$cat_to_apply_coupan = mysqli_query($con,"select * from cart where category_id = '{$cat_in_cartandcoupan[0]}' and coustmer_id = '{$_SESSION['student_id']}'");
					$coupan_applicable_price = 0;
					while($row = mysqli_fetch_array($cat_to_apply_coupan)){
						$product = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$row['product_id']}'"));
						if($product['discount_price'] != 0){
							$coupan_applicable_price  += $product['discount_price']*$row['product_quantity'];
						}else{
							$coupan_applicable_price  += $product['product_price']*$row['product_quantity'];
						}
					}
					if($coupan['coupan_type'] == 2){
						$coupanprice = $coupan_applicable_price * $coupan['coupan_price'] / 100;
						//$coupan_used = mysqli_query($con, "INSERT INTO coupans_used (coupan_id, coustmer_id) VALUES ('{$coupan['coupan_id']}', '{$_SESSION['student_id']}')");
					}else{
						$coupanprice = $coupan['coupan_price'];
						//$coupan_used = mysqli_query($con, "INSERT INTO coupans_used (coupan_id, coustmer_id) VALUES ('{$coupan['coupan_id']}', '{$_SESSION['student_id']}')");
					}
				}
				else if(count($pro_in_cartandcoupan) != 0){
					$coupan_applicable_price = 0;
					foreach($pro_in_cartandcoupan as $product_id){
						$product = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$product_id}'"));
						if($product['discount_price'] != 0){
							$coupan_applicable_price  += $product['discount_price']*$row['product_quantity'];
						}else{
							$coupan_applicable_price  += $product['product_price']*$row['product_quantity'];
						}
					}
					if($coupan['coupan_type'] == 2){
						$coupanprice = $coupan_applicable_price * $coupan['coupan_price'] / 100;
						//$coupan_used = mysqli_query($con, "INSERT INTO coupans_used (coupan_id, coustmer_id) VALUES ('{$coupan['coupan_id']}', '{$_SESSION['student_id']}')");
					}else{
						$coupanprice = $coupan['coupan_price'];
						//$coupan_used = mysqli_query($con, "INSERT INTO coupans_used (coupan_id, coustmer_id) VALUES ('{$coupan['coupan_id']}', '{$_SESSION['student_id']}')");
					}
				}
				else{
					echo "<script>alert('This coupan is not applicable for your cart'); window.location.href = 'cart.php';</script>";
				}
			}
			else{
				echo "<script>alert('You have already used this coupan');</script>";
			}
		}else{
			echo "<script>alert('Invalid Coupan Code');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SRKR Campus Online Cart</title>	

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
			<!-- Header Comes Here Shiav -->
			<?php include 'shoping_header.php'; ?>
			<div role="main" class="main shop pb-4">

				<div class="container">

					<div class="row">
						<div class="col">
							<ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
								<li class="text-transform-none me-2">
									<a href="cart.php" class="text-decoration-none text-color-primary">Shopping Cart</a>
								</li>
								<li class="text-transform-none text-color-grey-lighten me-2">
									<a href="checkout.php" class="text-decoration-none text-color-grey-lighten text-color-hover-primary">Checkout</a>
								</li>
								<li class="text-transform-none text-color-grey-lighten">
									<a href="ordercomplete.php" class="text-decoration-none text-color-grey-lighten text-color-hover-primary">Order Complete</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="row pb-4 mb-5">
						<div class="col-lg-8 mb-5 mb-lg-0">
							<form method="post" action="">
								<div class="table-responsive">
									<table class="shop_table cart">
										<thead>
											<tr class="text-color-dark">
												<th class="product-thumbnail" width="15%">
													&nbsp;
												</th>
												<th class="product-name text-uppercase" width="30%">
													Product
												</th>
												<th class="product-price text-uppercase" width="15%">
													Price
												</th>
												<th class="product-quantity text-uppercase" width="20%">
													Quantity
												</th>
												<th class="product-subtotal text-uppercase text-end" width="20%">
													Subtotal
												</th>
											</tr>
										</thead>
										<tbody>
											<?php
												while($row = mysqli_fetch_array($cartproducts)){
													$product = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$row['product_id']}'"));
											?>
											<tr class="cart_table_item">
												<td class="product-thumbnail">
													<div class="product-thumbnail-wrapper">
														<a href="removefromcart.php?product_id=<?php echo $row['product_id']; ?>" class="product-thumbnail-remove" title="Remove Product">
															<i class="fas fa-times"></i>
														</a>
														<a href="product.php?product_id=<?php echo $row['product_id']; ?>" class="product-thumbnail-image" title="<?php echo $product['product_name']; ?>">
															<img width="90" height="90" alt="<?php echo $product['product_name']; ?>" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo1']; ?>">
														</a>
													</div>
												</td>
												<td class="product-name">
													<a href="product.php?product_id=<?php echo $row['product_id']; ?>" class="font-weight-semi-bold text-color-dark text-color-hover-primary text-decoration-none"><?php echo $product['product_name']; ?></a>
												</td>
												<td class="product-price">
													<p class="price text-5 mb-3">
														<?php if($product['discount_price'] != 0){	?>
															<span class="sale text-color-dark font-weight-semi-bold"><?php echo $product['discount_price'] ?></span>
															<span class="amount"><?php echo $product['product_price'] ?></span>
															<?php }else{  ?>
															<span class="amount"><?php echo $product['product_price'] ?></span>
														<?php } ?>
													</p>
												</td>
												<td class="product-quantity">
													<div class="quantity float-none m-0">
														<a href="reducecart.php?product_id=<?php echo $row['product_id'] ?>"><input type="button"  class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-"></a>
														<input type="text" class="input-text qty text" title="Qty" value="<?php echo $row['product_quantity'];?>" name="quantity" min="1" step="1">
														<a href="incresecart.php?product_id=<?php echo $row['product_id'] ?>"><input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+"></a>
													</div>
												</td>
												<td class="product-subtotal text-end">
													<span class="amount text-color-dark font-weight-bold text-4">
														<?php
															if($product['discount_price'] != 0){
																echo $product['discount_price']*$row['product_quantity'];
																$discountprice += $product['product_price']*$row['product_quantity'] - $product['discount_price']*$row['product_quantity'];
															}else{
																echo $product['product_price']*$row['product_quantity'];
															}
														?>
													</span>
												</td>
											</tr>
											<?php 
												$subtotal += $product['product_price']*$row['product_quantity'];
												  
											} ?>

											<tr>
												<td colspan="5">
													<div class="row justify-content-between mx-0">
														<div class="col-md-auto px-0 mb-3 mb-md-0">
															<div class="d-flex align-items-center">
																<input type="text" class="form-control h-auto border-radius-0 line-height-1 py-3" name="couponCode" placeholder="Share Your Secrete with us...." />
																<input type="submit" class="btn btn-light btn-modern text-color-dark bg-color-light-scale-2 text-color-hover-light bg-color-hover-primary text-uppercase text-3 font-weight-bold border-0 border-radius-0 ws-nowrap btn-px-4 py-3 ms-2" name="applycoupan" value="Apply Coupan">
															</div>
														</div>
														<div class="col-md-auto px-0">
															<input value="Update Cart" name="updatecart" type="submit" class="btn btn-light btn-modern text-color-dark bg-color-light-scale-2 text-color-hover-light bg-color-hover-primary text-uppercase text-3 font-weight-bold border-0 border-radius-0 btn-px-4 py-3">
														</div>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</form>
						</div>
						<div class="col-lg-4 position-relative">
							<div class="card border-width-3 border-radius-0 border-color-hover-dark" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.row', 'padding': {'top': 85}}">
								<div class="card-body">
									<h4 class="font-weight-bold text-uppercase text-4 mb-3">Your Order</h4>
									<table class="shop_table cart-totals mb-4">
										<tbody>
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
											<!-- <tr class="shipping">
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
											</tr> -->
											<tr class="total">
												<td>
													<strong class="text-color-dark text-3-5">Total</strong>
												</td>
												<td class="text-end">
													<strong class="text-color-dark"><span class="amount text-color-dark text-5"><?php echo $subtotal - $discountprice - $coupanprice; ?></span></strong>
												</td>
											</tr>
										</tbody>
									</table>
									<a href="shop-checkout.html" class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">Proceed to Checkout <i class="fas fa-arrow-right ms-2"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<h4 class="font-weight-semibold text-4 mb-3">PEOPLE ALSO BOUGHT</h4>
							<hr class="mt-0">
							<div class="products row">
								<div class="col">
									<div class="owl-carousel owl-theme nav-style-1 nav-outside nav-outside nav-dark mb-0" data-plugin-options="{'loop': false, 'autoplay': false, 'items': 4, 'nav': true, 'dots': false, 'margin': 20, 'autoplayHoverPause': true, 'autoHeight': true, 'stagePadding': '75', 'navVerticalOffset': '50px'}">

										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="product-thumb-info-badges-wrapper">
													<span class="badge badge-ecommerce badge-success">NEW</span>

												</div>

												<div class="addtocart-btn-wrapper">
													<a href="shop-cart.html" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
													QUICK VIEW
												</a>
												<a href="shop-product-sidebar-left.html">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-1.jpg">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">electronics</a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Photo Camera</a></h3>
												</div>
												<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold">$69,00</span>
												<span class="amount">$59,00</span>
											</p>
										</div>

										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="product-thumb-info-badges-wrapper">
													<span class="badge badge-ecommerce badge-success">NEW</span>
													<span class="badge badge-ecommerce badge-danger">27% OFF</span>
												</div>

												<div class="addtocart-btn-wrapper">
													<a href="shop-cart.html" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
													QUICK VIEW
												</a>
												<a href="shop-product-sidebar-left.html">
													<div class="product-thumb-info-image product-thumb-info-image-effect">
														<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-7.jpg">

															<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-7-2.jpg">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">accessories</a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Porto Headphone</a></h3>
												</div>
												<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold">$199,00</span>
												<span class="amount">$99,00</span>
											</p>
										</div>

										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="addtocart-btn-wrapper">
													<a href="shop-cart.html" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
													QUICK VIEW
												</a>
												<a href="shop-product-sidebar-left.html">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-2.jpg">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">sports</a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Golf Bag</a></h3>
												</div>
												<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold">$29,00</span>
												<span class="amount">$19,00</span>
											</p>
										</div>

										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="product-thumb-info-badges-wrapper">

												<span class="badge badge-ecommerce badge-danger">27% OFF</span>
												</div>

												<div class="addtocart-btn-wrapper">
													<a href="shop-cart.html" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<div class="countdown-offer-wrapper">
													<div class="text-color-light text-2" data-plugin-countdown data-plugin-options="{'textDay': 'DAYS', 'textHour': 'HRS', 'textMin': 'MIN', 'textSec': 'SEC', 'date': '2024/01/01 12:00:00', 'numberClass': 'text-color-light', 'wrapperClass': 'text-color-light', 'insertHTMLbefore': '<span>OFFER ENDS IN </span>', 'textDay': 'DAYS', 'textHour': ':', 'textMin': ':', 'textSec': '', 'uppercase': true}"></div>
												</div>

												<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
													QUICK VIEW
												</a>
												<a href="shop-product-sidebar-left.html">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-3.jpg">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">sports</a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Workout</a></h3>
												</div>
												<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold">$40,00</span>
												<span class="amount">$30,00</span>
											</p>
										</div>

										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="addtocart-btn-wrapper">
													<a href="shop-cart.html" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
													QUICK VIEW
												</a>
												<a href="shop-product-sidebar-left.html">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-4.jpg">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">accessories</a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Luxury Bag</a></h3>
												</div>
												<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold">$99,00</span>
												<span class="amount">$79,00</span>
											</p>
										</div>

										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="addtocart-btn-wrapper">
													<a href="shop-cart.html" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
													QUICK VIEW
												</a>
												<a href="shop-product-sidebar-left.html">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-5.jpg">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">accessories</a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Styled Bag</a></h3>
												</div>
												<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold">$199,00</span>
												<span class="amount">$119,00</span>
											</p>
										</div>

										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="addtocart-btn-wrapper">
													<a href="shop-cart.html" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
													QUICK VIEW
												</a>
												<a href="shop-product-sidebar-left.html">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-6.jpg">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">hat</a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Blue Hat</a></h3>
												</div>
												<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold">$299,00</span>
												<span class="amount">$289,00</span>
											</p>
										</div>

										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="addtocart-btn-wrapper">
													<a href="shop-cart.html" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
													QUICK VIEW
												</a>
												<a href="shop-product-sidebar-left.html">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-8.jpg">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">accessories</a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Adventurer Bag</a></h3>
												</div>
												<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold">$99,00</span>
												<span class="amount">$79,00</span>
											</p>
										</div>

										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">

												<div class="addtocart-btn-wrapper">
													<a href="shop-cart.html" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>

												<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
													QUICK VIEW
												</a>
												<a href="shop-product-sidebar-left.html">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-9.jpg">

													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">sports</a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Baseball Ball</a></h3>
												</div>
												<a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold">$399,00</span>
												<span class="amount">$299,00</span>
											</p>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<?php include 'shoping_fotter.php'; ?>
			<!-- Fotter Comes Here Shiva -->
		</div>

		<!-- Vendor -->
		<script src="Bhavani/vendor/plugins/js/plugins.min.js"></script>
		<script src="Bhavani/vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
		<script src="Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
		<script src="Bhavani/vendor/jquery.countdown/jquery.countdown.min.js"></script>

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

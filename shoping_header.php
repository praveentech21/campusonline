<?php
$category = mysqli_query($con, "SELECT * FROM categorys");
$wishlist = mysqli_query($con, "SELECT * FROM wishlist WHERE coustmer_id = '{$_SESSION['student_id']}'");
$cart = mysqli_query($con, "SELECT * FROM cart WHERE coustmer_id = '{$_SESSION['student_id']}'");
$offer = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM offer "))['header'];
$total_price = 0;
?>
<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyStartAt': 135, 'stickySetTop': '-135px', 'stickyChangeLogo': true}">
	<div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
		<div class="header-top header-top-small-minheight header-top-simple-border-bottom">
			<div class="container">
				<div class="header-row justify-content-between">
					<div class="header-column col-auto px-0">
						<div class="header-row">
							<p class="font-weight-semibold text-1 mb-0 d-none d-sm-block d-md-none">FREE CLASS ROOM DELIVERY</p>
							<p class="font-weight-semibold text-1 mb-0 d-none d-md-block">DELIVERY WITHIN CAMPUS | PICKUP AT CAMPUS ONLINE STALL</p>
						</div>
					</div>
					<div class="header-column justify-content-end col-auto px-0">
						<!-- <div class="header-row">
							<nav class="header-nav-top">
								<ul class="nav nav-pills font-weight-semibold text-2">
									<li class="nav-item dropdown nav-item-left-border d-lg-none">
										<a class="nav-link text-color-default text-color-hover-primary" href="#" role="button" id="dropdownMobileMore" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											More
											<i class="fas fa-angle-down"></i>
										</a>
										<div class="dropdown-menu" aria-labelledby="dropdownMobileMore">
											<a class="dropdown-item" href="#">About</a>
											<a class="dropdown-item" href="#">Our Store</a>
											<a class="dropdown-item" href="#">Blog</a>
											<a class="dropdown-item" href="#">Contact</a>
											<a class="dropdown-item" href="#">Help & FAQs</a>
											<a class="dropdown-item" href="#">Track Order</a>
										</div>
									</li>
									<li class="nav-item d-none d-lg-inline-block">
										<a href="#" class="text-decoration-none text-color-default text-color-hover-primary">About</a>
									</li>
									<li class="nav-item d-none d-lg-inline-block">
										<a href="#" class="text-decoration-none text-color-default text-color-hover-primary">Our Stores</a>
									</li>
									<li class="nav-item d-none d-lg-inline-block">
										<a href="#" class="text-decoration-none text-color-default text-color-hover-primary">Blog</a>
									</li>
									<li class="nav-item d-none d-lg-inline-block">
										<a href="#" class="text-decoration-none text-color-default text-color-hover-primary">Contact</a>
									</li>
									<li class="nav-item d-none d-xl-inline-block">
										<a href="#" class="text-decoration-none text-color-default text-color-hover-primary">Help & FAQs</a>
									</li>
									<li class="nav-item d-none d-xl-inline-block">
										<a href="#" class="text-decoration-none text-color-default text-color-hover-primary">Track Order</a>
									</li>
								</ul>
								<ul class="header-social-icons social-icons social-icons-clean social-icons-icon-gray">
									<li class="social-icons-facebook">
										<a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li class="social-icons-twitter">
										<a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
									</li>
									<li class="social-icons-linkedin">
										<a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a>
									</li>
								</ul>
							</nav>
						</div> -->
						<div class="header-row">
							<p class="font-weight-semibold text-1 mb-0 d-none d-sm-block d-md-none">A Startup from Technology Center</p>
							<p class="font-weight-semibold text-1 mb-0 d-none d-md-block">A Startup from Technology Center</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-container container">
			<div class="header-row py-2">
				<div class="header-column w-100">
					<div class="header-row justify-content-between">
						<div class="header-logo z-index-2 col-lg-2 px-0">
							<a href="index.php">
								<img alt="Porto" width="100" height="48" data-sticky-width="82" data-sticky-height="40" data-sticky-top="84" src="Bhavani/img/campus_online_200_96.png">
							</a>
						</div>
						<div class="header-nav-features header-nav-features-no-border col-lg-5 col-xl-6 px-0 ms-0">
							<div class="header-nav-feature ps-lg-5 pe-lg-4">
								<form role="search" method="get" id="search-form">
									<div class="search-with-select">
										<!-- <a href="#" class="mobile-search-toggle-btn me-2" data-toggle-class="open">
											<i class="icons icon-magnifier text-color-dark text-color-hover-primary"></i>
										</a> -->
										<div class="search-form-wrapper input-group">
										<p class="font-weight-semibold text-5 mb-0 d-none d-md-block"><?php echo $offer ?></p>
											
											<!-- <input class="form-control text-1" id="search-input" type="search" value="" placeholder="Search...">
											<div class="search-form-select-wrapper">
												<div class="custom-select-1">
													<select name="category_id" class="form-control form-select">
														<option value="all" selected>All Categories</option>
														<?php //while ($row = mysqli_fetch_assoc($category)) { ?>
															<option value="<?php //echo $row['category_id'] ?>"><?php //echo $row['category_name'] ?></option>
														<?php //} ?>
													</select>
												</div>
												<button class="btn" type="submit" aria-label="Search">
													<i class="icons icon-magnifier header-nav-top-icon text-color-dark"></i>
												</button>
											</div> -->
										</div>
									</div>
								</form>
								<!-- <div id="search-results"></div> -->
							</div>
						</div>
						<div class="d-flex col-auto col-lg-2 pe-0 ps-0 ps-xl-3">
							<ul class="header-extra-info">
								<li class="ms-0 ms-xl-4">
									<div class="header-extra-info-icon">
										<a href="profile.php" class="text-decoration-none text-color-dark text-color-hover-primary text-2">
											<i class="icons icon-user"></i>
										</a>
									</div>
								</li>
							</ul>
							<div class="header-nav-features ps-0 ms-1">
								<div class="header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex top-2 ms-2">
									<a href="#" class="header-nav-features-toggle" aria-label="">
										<img src="Bhavani/img/wishlist_30_30.png" height="30" alt="" class="header-nav-top-icon-img">
										<span class="cart-info">
											<span class="cart-qty"><?php echo mysqli_num_rows($wishlist) ?></span>
										</span>
									</a>
									<div class="header-nav-features-dropdown" id="headerTopCartDropdown">
										<ol class="mini-products-list">
											<?php while ($row = mysqli_fetch_assoc($wishlist)) {
												$product_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$row['product_id']}'"));
											?>
												<li class="item">
													<a href="#" title="Camera X1000" class="product-image"><img src="Bhavani/img/products/<?php echo $product_details['photo1'] ?>" alt="<?php echo $product_details['product_name'] ?>"></a>
													<div class="product-details">
														<p class="product-name">
															<a href="product.php?product_id=<?php echo $row['product_id'] ?>"><?php echo $product_details['product_name'] ?></a>
															<a href="addtocart.php?product_id=<?php echo $row['product_id'] ?>"><img src="Bhavani/img/icons/icon-cart-big.svg" height="30" alt="Add to Cart"></a>
														</p>
														<p class="qty-price">
															<span class="price"><?php if ($product_details['discount_price'] != 0) echo $product_details['discount_price'];
																				else echo $product_details['product_price']; ?></span>
														</p>
														<a href="removefromwishlist.php?product_id=<?php echo $row['product_id']; ?>" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
													</div>
												</li>
											<?php } ?>
										</ol>
									</div>
								</div>
								<div class="header-nav-feature header-nav-features-cart header-nav-features-cart-big d-inline-flex top-2 ms-2">
									<a href="#" class="header-nav-features-toggle" aria-label="">
										<img src="Bhavani/img/icons/icon-cart-big.svg" height="30" alt="" class="header-nav-top-icon-img">
										<span class="cart-info">
											<span class="cart-qty"><?php echo mysqli_num_rows($cart) ?></span>
										</span>
									</a>
									<div class="header-nav-features-dropdown" id="headerTopCartDropdown">
										<ol class="mini-products-list">
											<?php while ($row = mysqli_fetch_assoc($cart)) {
												$product_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$row['product_id']}'"));
												$total_price += $product_details['product_price'] * $row['product_quantity'];
											?>
												<li class="item">
													<a href="#" title="Camera X1000" class="product-image"><img src="Bhavani/img/products/<?php echo $product_details['photo1'] ?>" alt="<?php echo $product_details['product_name'] ?>"></a>
													<div class="product-details">
														<p class="product-name">
															<a href="product.php?product_id=<?php echo $row['product_id'] ?>"><?php echo $product_details['product_name'] ?></a>
														</p>
														<p class="qty-price">
															<?php echo $row['product_quantity'] ?> X <span class="price"><?php if ($product_details['discount_price'] != 0) echo $product_details['discount_price'];
																															else echo $product_details['product_price']; ?></span>
														</p>
														<a href="removefromcart.php?product_id=<?php echo $row['product_id']; ?>" title="Remove This Item" class="btn-remove"><i class="fas fa-times"></i></a>
													</div>
												</li>
											<?php } ?>
										</ol>
										<div class="totals">
											<span class="label">Total:</span>
											<span class="price-total"><span class="price"><?php echo $total_price ?></span></span>
										</div>
										<div class="actions">
											<a href="cart.php"><button class="btn btn-dark btn-modern w-100 text-uppercase bg-color-hover-primary border-color-hover-primary border-radius-0 text-3 py-3">view cart <i class="fas fa-arrow-right ms-2"></i></button></a>
											<!-- <a class="btn btn-primary" href="checkout.php">Checkout</a> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="header-column justify-content-end">
					<div class="header-row">

					</div>
				</div>
			</div>
		</div>
		<!-- <div class="header-nav-bar header-nav-bar-top-border bg-light">
			<div class="header-container container">
				<div class="header-row">
					<div class="header-column">
						<div class="header-row justify-content-end">
							<div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border justify-content-start" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '105px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
								<div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1 w-100">
									<nav class="collapse w-100">
										<ul class="nav nav-pills w-100" id="mainNav">
											<li class="dropdown">
												<a class="dropdown-item dropdown-toggle" href="index.php">
													Home
												</a>
											</li>
											<li class="dropdown dropdown-mega">
												<a class="dropdown-item dropdown-toggle" href="#">
													Elements
												</a>
											</li>
											<li class="dropdown">
												<a class="dropdown-item dropdown-toggle" href="#">
													Features
												</a>
											</li>
											<li class="dropdown">
												<a class="dropdown-item dropdown-toggle" href="#">
													Pages
												</a>
											</li>
											<li class="dropdown">
												<a class="dropdown-item dropdown-toggle" href="#">
													Portfolio
												</a>
											</li>
											<li class="dropdown">
												<a class="dropdown-item dropdown-toggle" href="#">
													Blog
												</a>
											</li>
											<li class="dropdown">
												<a class="dropdown-item dropdown-toggle active" href="#">
													Shop
												</a>
											</li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
</header>


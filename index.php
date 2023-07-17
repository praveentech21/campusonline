<?php
session_start();
// if(empty($_SESSION['std_id']))
// {
// 	header("location:login.php");
// }
include "connect.php";
	$products = mysqli_query($con,"SELECT * FROM products");
	$categories = mysqli_query($con,"SELECT * FROM categorys order by category_weightage desc");
	$tags = mysqli_query($con,"SELECT * FROM tags group by tag_name");
	$topproducts = mysqli_query($con,"SELECT product_id FROM reviews group by product_id order by rating desc");


?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SRKR Campus Online Store</title>	

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
			<!-- Offere Starts Here Shiva -->
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
			<!-- Offere Ends Here Shiva -->
				<?php include "shoping_header.php" ?>
				<!-- Headre Comes Here Shiva -->
			<div role="main" class="main shop pt-4">

				<div class="container">

					<div class="row">
						<div class="col-lg-9">

							<div class="masonry-loader masonry-loader-showing">
								<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
									<?php while($row = mysqli_fetch_array($products)){ ?>
									<div class="col-sm-6 col-lg-4">
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
									</div>
									<?php } ?>


								</div>
								<div class="row mt-4">
									<div class="col">
										<ul class="pagination float-end">
											<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<aside class="sidebar">
								<form action="page-search-results.html" method="get">
									<div class="input-group mb-3 pb-1">
										<input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
										<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
									</div>
								</form>
								<h5 class="font-weight-semi-bold pt-3">Categories</h5>
								<ul class="nav nav-list flex-column">
									<?php while($row = mysqli_fetch_array($categories)){ ?>
									<li class="nav-item"><a class="nav-link" href="#"><?php echo $row['category_id'] ?></a></li>
									<?php } ?>
								</ul>
								<h5 class="font-weight-semi-bold pt-5">Tags</h5>
								<div class="mb-3 pb-1">
									<?php while($row = mysqli_fetch_array($tags)){ ?>
										<a href="#"><span class="badge badge-dark badge-sm rounded-pill text-uppercase px-2 py-1 me-1"><?php echo $row['tag_name'] ?></span></a>
									<?php } ?>
								</div>
								<div class="row mb-5">
									<div class="col">
										<h5 class="font-weight-semi-bold pt-5">Top Rated Products</h5>
										<div class="product row row-gutter-sm align-items-center mb-4">
											<div class="col-5 col-lg-5">
												<div class="product-thumb-info border-0">
													<a href="shop-product-sidebar-left.html">
														<div class="product-thumb-info-image">
															<img alt="" class="img-fluid" src="Bhavani/img/products/product-grey-6.jpg">
														</div>
													</a>
												</div>
											</div>
											<div class="col-7 col-lg-7 ms-md-0 ms-lg-0 ps-lg-1 pt-1">
												<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-2">category</a>
												<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary text-decoration-none">product Name</a></h3>
												<div title="Rated 5 out of 5">
													<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'dark', 'size':'xs'}">
												</div>
												<p class="price text-4 mb-0">
													<span class="sale text-color-dark font-weight-semi-bold">Discounted Price</span>
													<span class="amount">Original Price</span>
												</p>
											</div>
										</div>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</div>

			</div>
			<?php include 'shoping_fotter.php'; ?>
			<!-- Fotter Come Here Shiva -->
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

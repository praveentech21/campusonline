<?php 
	include "connect.php";
	if(isset($_GET['product_id'])){
		$categories = mysqli_query($con,"SELECT * FROM categorys order by category_weightage desc");
		$tags = mysqli_query($con,"SELECT * FROM tags group by tag_name");
		$product= mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM products WHERE sku = '{$_GET['product_id']}'"));
		$products = mysqli_query($con,"SELECT * FROM products where category_id = '{$product['category_id']}' and sku != '{$_GET['product_id']}' and no_units != 0");
		$category= mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM categorys WHERE category_id = '{$product['category_id']}'"));
		$checkwishlist = mysqli_query($con,"select * from wishlist where coustmer_id='{$_SESSION['student_id']}' and product_id='{$_GET['product_id']}'");
		$reviews = mysqli_query($con,"SELECT * FROM reviews WHERE product_id = '{$product['sku']}'");
		$productId = $_GET['product_id'];
		$additional_information = mysqli_fetch_assoc(mysqli_query($con,"select * from product_details where product_id = '{$_GET['product_id']}'"));
		$customerId = $_SESSION['student_id'];
		$top_rated = mysqli_query($con,"SELECT product_id FROM reviews group by product_id order by rating desc");
		if(isset($_POST['addtocart'])){
			$quantity = $_POST['quantity'];
			$addtocart = "INSERT INTO `cart`(`coustmer_id`, `product_id`, `product_quantity`) VALUES (?,?,?)";
			$addtocart = mysqli_prepare($con,$addtocart);
			mysqli_stmt_bind_param($addtocart,"ssi",$customerId,$productId,$quantity);
			try {
				if (mysqli_stmt_execute($addtocart)) {
					echo "<script> alert('{$product['product_name']} added to cart successfully'); </script>";
					$removefromwishlist = mysqli_query($con,"DELETE FROM wishlist WHERE product_id = '{$_GET['product_id']}' AND coustmer_id = '{$_SESSION['student_id']}'");
				}
			} catch (mysqli_sql_exception $e) {
				if ($e->getCode() === 1062) {
					echo "<script>alert('This Product is Already in Your Cart');</script>";
				} else {
					echo "<script>alert('Error: {$e->getMessage()}');</script>";
				}
			}
		}
		if(isset($_POST['ratingofproduct'])){
			$rating = $_POST['rating'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$review = $_POST['review'];
			$ratingofproduct = "INSERT INTO `reviews`(`coustmer_id`, `product_id`, `rating`, `name`, `email`, `review`) VALUES (?,?,?,?,?,?)";
			$ratingofproduct = mysqli_prepare($con,$ratingofproduct);
			mysqli_stmt_bind_param($ratingofproduct,"ssisss",$customerId,$productId,$rating,$name,$email,$review);
			mysqli_stmt_execute($ratingofproduct);
		}
	}
	else{
		echo "<script> window.location.href = 'index.php'; </script>";
	}	
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SRKR Campus Online Product</title>	

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
			<!-- Header Page Comes Hear Shiva -->
		<?php include 'shoping_header.php'; ?>
		<div role="main" class="main shop py-4">

			<div class="container">

				<div class="row">
					<div class="col-lg-9">

						<div class="row">
							<div class="col-lg-6">

								<div class="thumb-gallery-wrapper">
									<div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
										<div>
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo1'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product['photo1'] ?>">
										</div>
										<div>
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo2'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product['photo2'] ?>">
										</div>
										<div>
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo3'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product['photo3'] ?>">
										</div>
										<div>
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo4'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product['photo4'] ?>">
										</div>
										<div>
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo5'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product['photo5'] ?>">
										</div>
									</div>
									<div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
										<div class="cur-pointer">
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo1'] ?>">
										</div>
										<div class="cur-pointer">
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo2'] ?>">
										</div>
										<div class="cur-pointer">
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo3'] ?>">
										</div>
										<div class="cur-pointer">
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo4'] ?>">
										</div>
										<div class="cur-pointer">
											<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product['photo5'] ?>">
										</div>
									</div>
								</div>

							</div>

							<div class="col-lg-6">

								<div class="summary entry-summary position-relative">

									<div class="position-absolute top-0 right-0">
										<div class="products-navigation d-flex">
											<a href="#" class="prev text-decoration-none text-color-dark text-color-hover-primary border-color-hover-primary" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-original-title="Red Ladies Handbag"><i class="fas fa-chevron-left"></i></a>
											<a href="#" class="next text-decoration-none text-color-dark text-color-hover-primary border-color-hover-primary" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-original-title="Green Ladies Handbag"><i class="fas fa-chevron-right"></i></a>
										</div>
									</div>

									<h1 class="mb-0 font-weight-bold text-7"><?php echo $product['product_name'] ?></h1>

									<div class="pb-0 clearfix d-flex align-items-center">
										<div title="Rated 3 out of 5" class="float-start">
											<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
										</div>

										<div class="review-num">
											<a href="#description" class="text-decoration-none text-color-default text-color-hover-primary" data-hash data-hash-offset="0" data-hash-offset-lg="75" data-hash-trigger-click=".nav-link-reviews" data-hash-trigger-click-delay="1000">
												<span class="count text-color-inherit" itemprop="ratingCount">(<?php echo mysqli_num_rows($reviews); ?></span> reviews)
											</a>
										</div>
									</div>

									<div class="divider divider-small">
										<hr class="bg-color-grey-scale-4">
									</div>

									<p class="price mb-3">
										<span class="sale text-color-dark">&#8377; <?php echo $product['discount_price'] ?></span>
										<span class="amount">&#8377; <?php echo $product['product_price'] ?></span>
									</p>

									<p class="text-3-5 mb-3"><?php echo $product['about_product'] ?></p>

									<ul class="list list-unstyled text-2">
										<li class="mb-0">AVAILABILITY: <strong class="text-color-dark"><?php 
										if($product['no_units'] == 0) echo "OUT OF STOCK";
										else{ 
											echo $product['no_units'].' Units';	
											if(!empty($product['product_start_time'])) echo '<br>Avabile between '.$product['product_start_time'] .' to '. $product['product_end_time'];
										}
										?></strong></li>
										<li class="mb-0">SKU: <strong class="text-color-dark"><?php echo $_GET['product_id'] ?></strong></li>
									</ul>

									<form enctype="multipart/form-data" method="post" class="cart" action="#">
										<!-- <table class="table table-borderless" style="max-width: 300px;">
											<tbody>
												<tr>
													<td class="align-middle text-2 px-0 py-2">SIZE:</td>
													<td class="px-0 py-2">
														<div class="custom-select-1">
															<select name="size" class="form-control form-select text-1 h-auto py-2">
																<option value="">PLEASE CHOOSE</option>
																<option value="blue">Small</option>
																<option value="red">Normal</option>
																<option value="green">Big</option>
															</select>
														</div>
													</td>
												</tr>
												<tr>
													<td class="align-middle text-2 px-0 py-2">COLOR:</td>
													<td class="px-0 py-2">
														<div class="custom-select-1">
															<select name="color" class="form-control form-select text-1 h-auto py-2">
																<option value="">PLEASE CHOOSE</option>
																<option value="blue">Blue</option>
																<option value="red">Red</option>
																<option value="green">Green</option>
															</select>
														</div>
													</td>
												</tr>
											</tbody>
										</table> -->
										<hr>
										<div class="quantity quantity-lg">
											<input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
											<input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
											<input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
										</div>
										<button type="submit" name="addtocart" class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary border-color-hover-primary">Add to cart</button>
										<hr>
									</form>

									<div class="d-flex align-items-center">
										<ul class="social-icons social-icons-medium social-icons-clean-with-border social-icons-clean-with-border-border-grey social-icons-clean-with-border-icon-dark me-3 mb-0">
											<!-- Facebook -->
											<li class="social-icons-facebook">
												<a href="http://www.facebook.com/sharer.php?u=https://www.saipraveen.free.nf" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Facebook">
													<i class="fab fa-facebook-f"></i>
												</a>
											</li>
											<!-- Google+ -->
											<li class="social-icons-googleplus">
												<a href="https://plus.google.com/share?url=https://www.saipraveen.free.nf" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Google+">
													<i class="fab fa-google-plus-g"></i>
												</a>
											</li>
											<!-- Twitter -->
											<li class="social-icons-twitter">
												<a href="https://twitter.com/share?url=https://www.saipraveen.free.nf&amp;text=Sai%20Praveen&amp;hashtags=#csd" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Twitter">
													<i class="fab fa-twitter"></i>
												</a>
											</li>
											<!-- Email -->
											<li class="social-icons-email">
												<a href="mailto:?Subject=Share This Page&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://www.saipraveen.free.nf" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share By Email">
													<i class="far fa-envelope"></i>
												</a>
											</li>
										</ul>
										<?php if(mysqli_num_rows($checkwishlist) == 0){ ?>
										<a href="addtowishlist.php?product_id=<?php echo $productId ?>" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2">
											<i class="far fa-heart me-1"></i> SAVE TO WISHLIST
										</a>
										<?php }else{ ?>
											<a href="#" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2">
											<i class="far fa-heart me-1"></i> Already in Wishlist
											</a>
										<?php } ?>
									</div>

								</div>

							</div>
						</div>

						<div class="row">
							<div class="col">
								<div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
									<ul class="nav nav-tabs justify-content-start">
										<li class="nav-item"><a class="nav-link active font-weight-bold text-3 text-uppercase py-2 px-3" href="#productDescription" data-bs-toggle="tab">Description</a></li>
										<li class="nav-item"><a class="nav-link font-weight-bold text-3 text-uppercase py-2 px-3" href="#productInfo" data-bs-toggle="tab">Additional Information</a></li>
										<li class="nav-item"><a class="nav-link nav-link-reviews font-weight-bold text-3 text-uppercase py-2 px-3" href="#productReviews" data-bs-toggle="tab">Reviews (2)</a></li>
									</ul>
									<div class="tab-content p-0">
										<div class="tab-pane px-0 py-3 active" id="productDescription">
											<p><?php echo $additional_information['description'] ?></p>
										</div>
										<div class="tab-pane px-0 py-3" id="productInfo">
											<p><?php echo $additional_information['additional_info'] ?></p>
											<!-- <table class="table table-striped m-0">
												<tbody>
													<tr>
														<th class="border-top-0">
															Size:
														</th>
														<td class="border-top-0">
															Unique
														</td>
													</tr>
													<tr>
														<th>
															Colors
														</th>
														<td>
															Red, Blue
														</td>
													</tr>
													<tr>
														<th>
															Material
														</th>
														<td>
															100% Leather
														</td>
													</tr>
												</tbody>
											</table> -->
										</div>
										<div class="tab-pane px-0 py-3" id="productReviews">
											<ul class="comments">
												<?php 
													while($row = mysqli_fetch_assoc($reviews)){
														$coustmer = mysqli_fetch_assoc(mysqli_query($con,"select * from students where student_id = '{$row['coustmer_id']}'"));
												?>
												<li>
													<div class="comment">
														<div class="img-thumbnail border-0 p-0 d-none d-md-block">
															<img class="avatar rounded-circle" alt="" src="Bhavani/img/avatars/<?php echo $coustmer['photo'] ?>">
														</div>
														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong><?php echo $coustmer['student_name'] ?></strong>
																<span class="float-end">
																	<div class="pb-0 clearfix">
																		<div title="Rated 3 out of 5" class="float-start">
																			<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
																		</div>

																		<div class="review-num">
																			<span class="count" itemprop="ratingCount"><?php echo $row['rating'] ?></span> reviews
																		</div>
																	</div>
																</span>
															</span>
															<p><?php echo $row['review'] ?></p>
														</div>
													</div>
												</li>
												<?php } ?>
											</ul>
											<hr class="solid my-5">
											<h4>Add a review</h4>
											<div class="row">
												<div class="col">

													<form action="#" id="submitReview" method="post">
														<div class="row">
															<div class="form-group col pb-2">
																<label class="form-label required font-weight-bold text-dark">Rating</label>
																<input type="text" name="rating" class="rating-loading" value="0" title="" data-plugin-star-rating data-plugin-options="{'color': 'primary', 'size':'sm'}">
															</div>
														</div>
														<div class="row">
															<div class="form-group col-lg-6">
																<label class="form-label required font-weight-bold text-dark">Name</label>
																<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required>
															</div>
															<div class="form-group col-lg-6">
																<label class="form-label required font-weight-bold text-dark">Email Address</label>
																<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email">
															</div>
														</div>
														<div class="row">
															<div class="form-group col">
																<label class="form-label required font-weight-bold text-dark">Review</label>
																<textarea maxlength="5000" data-msg-required="Please enter your review." rows="8" class="form-control" name="review" id="review" required></textarea>
															</div>
														</div>
														<div class="row">
															<div class="form-group col mb-0">
																<input type="submit" name="ratingofproduct" value="Post Review" class="btn btn-primary btn-modern" data-loading-text="Loading...">
															</div>
														</div>
													</form>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<hr class="solid my-5">

						<h4 class="mb-3">Related <strong>Products</strong></h4>
						<div class="products row">
							<div class="col">
								<div class="owl-carousel owl-theme show-nav-title nav-dark mb-0" data-plugin-options="{'loop': false, 'autoplay': false,'items': 4, 'nav': true, 'dots': false, 'margin': 20, 'autoplayHoverPause': true, 'autoHeight': true}">
									<?php while($row = mysqli_fetch_array($products)){
										$today = date("Y-m-d");
										$nooffdays = (strtotime($today) - strtotime($row['date_create'])) / (60 * 60 * 24);
										if($row['discount_price'] != 0){
											$discount = ($row['product_price'] - $row['discount_price']) * 100 / $row['product_price'];
										}
										$category_name = mysqli_fetch_assoc(mysqli_query($con,"SELECT category_name FROM `categorys` WHERE `category_id` ='{$row['category_id']}' "))['category_name'];
									?>
									<div class="product mb-0">
										<div class="product-thumb-info border-0 mb-3">

											<div class="product-thumb-info-badges-wrapper">
											<?php if($nooffdays <= 30){ ?>
												<span class="badge badge-ecommerce badge-success">NEW</span>
												<?php } if($row['discount_price'] != 0){ ?>
												<span class="badge badge-ecommerce badge-danger"><?php echo (integer)$discount ?>% OFF</span>
												<?php } ?>
											</div>
											<?php if($row['no_units'] != 0){ ?>
												<div class="addtocart-btn-wrapper">
													<a href="addtocart.php?product_id=<?php echo $row['sku']; ?>" class="text-decoration-none addtocart-btn" title="Add to Cart">
														<i class="icons icon-bag"></i>
													</a>
												</div>
											<?php } else{ ?>
												<div class="addtocart-btn-wrapper">
													<a href="#" class="text-decoration-none addtocart-btn" title="Out of Stock">
														<i class="icons icon-bag"></i>
													</a>
												</div>
											<?php } ?>
											<a href="Bhavani/ajax/shop-product-quick-view.html" class="quick-view text-uppercase font-weight-semibold text-2">
												QUICK VIEW
											</a>
											<a href="product.php?product_id=<?php echo $row['sku'] ?>">	
													<div class="product-thumb-info-image product-thumb-info-image-effect">
														<?php if($row['photo1'] != null){ ?>
														<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $row['photo1'] ?>">

															<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $row['photo1'] ?>">
														<?php } else{ ?>
														<img alt="" class="img-fluid" src="Bhavani/img/products/noimage.jpg">

															<img alt="" class="img-fluid" src="Bhavani/img/products/noimage.jpg">
														<?php } ?>
													</div>
												</a>
										</div>
										<div class="d-flex justify-content-between">
											<div>
												<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1"><?php echo $category_name; ?></a>
												<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary"><?php echo $row['product_name'] ?></a></h3>
											</div>
											<a href="addtowishlist.php?product_id=<?php echo $row['sku']; ?>" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
										</div>
										<div title="Rated 5 out of 5">
											<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
										</div>
										<p class="price text-5 mb-3">
											<span class="sale text-color-dark font-weight-semi-bold"><?php echo $row['discount_price'] ?></span>
											<span class="amount"><?php echo $row['product_price'] ?></span>
										</p>
									</div>
									<?php } ?>

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
									<li class="nav-item"><a class="nav-link" href="#"><?php echo $row['category_name'] ?></a></li>
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
									<?php while($row = mysqli_fetch_array($top_rated)){ 
											$product_details = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM products WHERE sku = '{$row['product_id']}'"));
											$category_name = mysqli_fetch_assoc(mysqli_query($con, "SELECT category_name FROM categorys WHERE category_id = '{$product_details['category_id']}'"))['category_name'];
										?>
										<div class="product row row-gutter-sm align-items-center mb-4">
											<div class="col-5 col-lg-5">
												<div class="product-thumb-info border-0">
													<a href="shop-product-sidebar-left.html">
														<div class="product-thumb-info-image">
															<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo1'] ?>">
														</div>
													</a>
												</div>
											</div>	
											<div class="col-7 col-lg-7 ms-md-0 ms-lg-0 ps-lg-1 pt-1">
												<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-2"><?php echo $category_name ?></a>
												<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary text-decoration-none"><?php echo $product_details['product_name'] ?></a></h3>
												<div title="Rated 5 out of 5">
													<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'dark', 'size':'xs'}">
												</div>
												<p class="price text-4 mb-0">
													<span class="sale text-color-dark font-weight-semi-bold"><?php echo $product_details['discount_price'] ?></span>
													<span class="amount"><?php echo $product_details['product_price'] ?></span>
												</p>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>

		</div>
		<?php include 'shoping_fotter.php'; ?>
		<!-- Fotter Comes Hera Shiva -->
	</div>

		<!-- Vendor -->
	<script src="Bhavani/vendor/plugins/js/plugins.min.js"></script>
	<script src="Bhavani/vendor/bootstrap-star-rating/js/star-rating.min.js"></script>
	<script src="Bhavani/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js"></script>
	<script src="Bhavani/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="Bhavani/js/theme.js"></script>

	<!-- Current Page Vendor and Views -->
	<script src="Bhavani/js/views/view.shop.js"></script>

		<!-- Theme Custom -->
	<script src="Bhavani/js/custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="Bhavani/js/theme.init.js"></script>

	<!-- Examples -->
	<script src="Bhavani/js/examples/examples.gallery.js"></script>	

</body>
</html>

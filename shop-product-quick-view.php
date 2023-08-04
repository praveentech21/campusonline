<?php 
	include 'connect.php';
	if(isset($_GET['sku'])){
		$product_details = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM products WHERE sku = '{$_GET['sku']}'"));
		$reviews = mysqli_query($con,"SELECT * FROM reviews WHERE product_id = '{$_GET['sku']}'");

	}else echo"<script>window.location.href='index.php'</script>";
?>
<div class="shop dialog dialog-lg fadeIn animated" style="animation-duration: 300ms;">
	<div class="row">
		<div class="col-lg-6">

			<div class="thumb-gallery-wrapper">
				<div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
					<div>
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo1'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product_details['photo1'] ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo2'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product_details['photo2'] ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo3'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product_details['photo3'] ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo4'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product_details['photo4'] ?>">
					</div>
					<div>
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo5'] ?>" data-zoom-image="Bhavani/img/products/<?php echo $product_details['photo5'] ?>">
					</div>
				</div>
				<div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
					<div class="cur-pointer">
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo1'] ?>">
					</div>
					<div class="cur-pointer">
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo2'] ?>">
					</div>
					<div class="cur-pointer">
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo3'] ?>">
					</div>
					<div class="cur-pointer">
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo4'] ?>">
					</div>
					<div class="cur-pointer">
						<img alt="" class="img-fluid" src="Bhavani/img/products/<?php echo $product_details['photo5'] ?>">
					</div>
				</div>
			</div>

		</div>

		<div class="col-lg-6">

			<div class="summary entry-summary position-relative">

				<h1 class="font-weight-bold text-7 mb-0"><a href="product.php?product_id=<?php echo $product_details['sku'] ?>" class="text-decoration-none text-color-dark text-color-hover-primary"><?php echo $product_details['product_name'] ?></a></h1>

				<div class="pb-0 clearfix d-flex align-items-center">
					<div title="Rated 3 out of 5" class="float-start">
						<input type="text" class="d-none" value="<?php echo mysqli_num_rows($reviews); ?>" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
					</div>

					<div class="review-num">
						<a href="product.php?product_id=<?php echo $product_details['sku'] ?>#productReviews"><span class="count" itemprop="ratingCount">(<?php echo mysqli_num_rows($reviews); ?></span> reviews)</a>
					</div>
				</div>

				<div class="divider divider-small">
					<hr class="bg-color-grey-scale-4">
				</div>

				<p class="price mb-3">
					<?php if($product_details['discount_price'] != 0){ ?>	
					<span class="sale text-color-dark">&#8377; <?php echo $product_details['discount_price'] ?></span>
					<span class="amount">&#8377; <?php echo $product_details['product_price'] ?></span>
					<?php }else{ ?>
						<span class="amount">&#8377; <?php echo $product_details['product_price'] ?></span>
					<?php } ?>
				</p>

				<p class="text-3-5 mb-3"><?php echo $product_details['about_product'] ?></p>

				<ul class="list list-unstyled text-2">
				<li class="mb-0">AVAILABILITY: <strong class="text-color-dark"><?php 
				$category_info = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `categorys` WHERE `category_id` = '{$product_details['category_id']}'"));
				if($product_details['no_units'] == 0) echo "OUT OF STOCK";
				else{ 
				echo $product_details['no_units'].' Units';	
				if(!empty($product_details['product_start_time'])) echo '<br>Avabile between '.$product_details['product_start_time'] .' to '. $product_details['product_end_time'];
				} ?></strong></li>
				<li class="mb-0">SKU: <strong class="text-color-dark"><?php echo $_GET['sku'] ?></strong></li>
				<li class="mb-0">Category : <a href="index.php?category_id=<?php echo $category_info['category_id'] ?>"> <strong class="text-color-dark"><?php echo $category_info['category_name'] ?></strong></a></li>
				</ul>



				<div class="d-flex align-items-center">
					<ul class="social-icons social-icons-medium social-icons-clean-with-border social-icons-clean-with-border-border-grey social-icons-clean-with-border-icon-dark me-3 mb-0">
						<!-- Facebook -->
						<li class="social-icons-facebook">
							<a href="http://www.facebook.com/sharer.php?u=https://www.saipraveen.tech" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Facebook">
								<i class="fab fa-facebook-f"></i>
							</a>
						</li>
						<!-- Google+ -->
						<li class="social-icons-googleplus">
							<a href="https://plus.google.com/share?url=https://www.saipraveen.tech" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Google+">
								<i class="fab fa-google-plus-g"></i>
							</a>
						</li>
						<!-- Twitter -->
						<li class="social-icons-twitter">
							<a href="https://twitter.com/share?url=https://www.saipraveen.tech&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share On Twitter">
								<i class="fab fa-twitter"></i>
							</a>
						</li>
						<!-- Email -->
						<li class="social-icons-email">
							<a href="mailto:?Subject=Share This Page&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://www.saipraveen.tech" data-bs-toggle="tooltip" data-bs-animation="false" data-bs-placement="top" title="Share By Email">
								<i class="far fa-envelope"></i>
							</a>
						</li>
					</ul>
					<a href="addtowishlist.php?product_id=<?php echo $_GET['sku'] ?>" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2">
						<i class="far fa-heart me-1"></i> SAVE TO WISHLIST
					</a>
				</div>

			</div>


		</div>
	</div>
</div>
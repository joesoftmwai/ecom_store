<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>


<?php 

 	$product_id  =  $_GET['pro_id'];

 	$get_product  = "SELECT * FROM products WHERE product_url = '{$product_id}'";
 	$run_product  = mysqli_query($conn, $get_product);
 	confirm($run_product);

 	$check_product = mysqli_num_rows($run_product);

 	$row_product  = mysqli_fetch_array($run_product);
 	$p_cat_id   = $row_product['p_cat_id'];
 	$pro_title  = $row_product['product_title'];
 	$pro_price  = $row_product['product_price'];
 	$pro_desc   = $row_product['product_desc'];
 	$pro_img1   = $row_product['product_img1'];
 	$pro_img2   = $row_product['product_img2'];
 	$pro_img2   = $row_product['product_img3'];

 	$pro_id     = $row_product['product_id'];
 	$pro_label  = $row_product['product_label'];
 	$product_psp_price = $row_product['product_psp_price'];
    $pro_features = $row_product['product_features'];
 	$pro_video    = $row_product['product_video'];
	$status       = $row_product['status'];
	$pro_url      = $row_product['product_url'];   
 


 	$get_p_cat  = "SELECT * FROM products_category WHERE p_cat_id = {$p_cat_id }";
 	$run_p_cat  = mysqli_query($conn, $get_p_cat);

 	$row_p_cat  = mysqli_fetch_array($run_p_cat);
 	$p_cat_title = $row_p_cat['p_cat_title'];


 	 if ($pro_label != "New") {
 	 		$product_price   = "<del>$pro_price</del>";
 	 		$product_psp_price = "$product_psp_price";
 	 	} else {
 	 		$product_price   = "$pro_price";
 	 		$product_psp_price = "";
 	 	}

 	if ($pro_label == "") {
 	 		# code...
 	 	} else {
 	 		$pro_label = "
 	 		  <a href='#' class='label sale' style='color:black;'> 
 	 		    <div class='thelabel'>".$pro_label."</div>
 	 		    <div class='label-background'></div>
 	 		  </a>
 	 		";
 	 	}

 ?>


<div id="content"> <!-- _Content starts -->
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="shop.php">Shop</a>
				</li>
				<li>
					<a href="shop.php?p_cart=<?php echo $p_cat_id; ?>">
						<?php echo $p_cat_title; ?>
					</a>
				</li>
				<li>
					<?php echo $pro_title ; ?>
				</li>
			</ul>
		</div>


		<div class="col-md-12">
			<div class="row" id="productMain">
				<div class="col-sm-6">
					<div id="mainImage">
						
						<div id="myCarousel" class="carousel slide" data-ride=
						"carousel">

						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="2" class="active"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<center>
									<img src="admin-area/product_images/<?php echo $pro_img1 ; ?>" alt="" class="img-responsive">
								</center>
							</div>

							<div class="item">
								<center>
									<img src="admin-area/product_images/<?php echo $pro_img1 ; ?>" alt="" class="img-responsive">
								</center>
							</div>

							<div class="item">
								<center>
									<img src="admin-area/product_images/<?php echo $pro_img1 ; ?>" alt="" class="img-responsive">
								</center>	
							</div>
						</div>


						<a href="#myCarousel" class="left carousel-control" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>

						<a href="#myCarousel" class="right carousel-control" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>

						</div>
					</div>

					<?php echo $pro_label; ?>
				</div>


				<div class="col-sm-6">
					<div class="box">
						<h1 class="text-center"><?php echo $pro_title?></h1>

						<?php 

						if (isset($_POST['add_cart'])) {

							$ip_add =  getRealUserIp();
							$p_id   =  $pro_id;

							$product_qty  = $_POST['product_qty'];
							$product_size = $_POST['product_size'];

							$check_product = "SELECT * FROM cart WHERE p_id = $p_id AND ip_add = '$ip_add'";
							$run_check = mysqli_query($conn, $check_product);
							confirm($run_check);

							if (mysqli_num_rows($run_check) > 0) {
								echo "<script>alert('This product is already addded in cart')</script>";
								echo "<script>window.open('$pro_url', '_self')</script>";
								
							} else {
								if ($product_psp_price != null) {
									$product_price = $product_psp_price;
								} else {
									$product_price = $product_price;
								}							

								$query = "INSERT INTO cart(p_id, ip_add, qty, p_price, size) VALUES('$p_id' , '$ip_add', '$product_qty', '$product_price', '$product_size')";
								$run_query = mysqli_query($conn, $query);
								confirm($run_query);
								echo "<script>window.open('$pro_url', '_self')</script>";


							}
						}
						  ?>

						<form action="" method="post" class="form-horizontal">

							<?php 

							 if ($status == 'product') {
							 	# code...
							 ?>

							<div class="form-group">
								<label for="" class="col-md-5 control-label">Product Quantity</label>
								<div class="col-md-7">
									<select name="product_qty" id="" class="form-control" required>
										<option >1</option>
										<option >2</option>
										<option >3</option>
										<option >4</option>
										<option >5</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="" class="col-md-5 control-label">Product Size</label>
								<div class="col-md-7">
									<select name="product_size" id="" class="form-control" required>
										<option>Small</option>
										<option>Medium</option>
										<option>Large</option>
									</select>
								</div>
							</div>

						<?php } else { ?>

							<div class="form-group">
								<label for="" class="col-md-5 control-label">Bundle Quantity</label>
								<div class="col-md-7">
									<select name="product_qty" id="" class="form-control" required>
										<option >1</option>
										<option >2</option>
										<option >3</option>
										<option >4</option>
										<option >5</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="" class="col-md-5 control-label">Bundle Size</label>
								<div class="col-md-7">
									<select name="product_size" id="" class="form-control" required>
										<option>Small</option>
										<option>Medium</option>
										<option>Large</option>
									</select>
								</div>
							</div>

						<?php } ?>

							<p class="price">$<?php echo $product_price.' '.$product_psp_price; ?></p>
							<p class="text-center buttons">
								<button class="btn btn-info" name="add_cart" type="submit"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
								<button class="btn btn-info" name="add_wishlist" type="submit"><i class="fa fa-heart"></i>Add to Wishlist</button>

								<?php 
								if (isset($_POST['add_wishlist'])) {
								 	if (!isset($_SESSION['customer_email'])) {
								 		echo "<script>alert('You must login to add product in wishlist')</script>";
								 		echo "<script>window.open('checkout.php', '_self')</script>";
								 	} else {
								 		$customer_session = $_SESSION['customer_email'];
								 		$get_customer = "SELECT * FROM customers WHERE customer_email = '$customer_session'";
								 		$run_customer = mysqli_query($conn, $get_customer);
								 		$row_customer = mysqli_fetch_array($run_customer);
								 		$customer_id  = $row_customer['customer_id'];

								 		$select_wishlist = "SELECT * FROM wishlist WHERE customer_id = '$customer_id' AND product_id='$pro_id'";
								 		$run_wishlist   = mysqli_query($conn, $select_wishlist);
								 		$check_wishlist = mysqli_num_rows($run_wishlist);

								 		if ($check_wishlist == 1) {
								 			echo "<script>alert('Product has already been added in wishlist')</script>";
								 			echo "<script>window.open('$pro_url', '_self')</script>";
								 		} else {
								 			$insert_wishlist = "INSERT INTO `wishlist`(`customer_id`, `product_id`) VALUES ('$customer_id ', '$pro_id')";
								 			$run_wishlist    =  mysqli_query($conn, $insert_wishlist);

								 			if ($run_wishlist) {
								 				echo "<script>alert('Product added into wishlist successfully')</script>";
								 				echo "<script>window.open('$pro_url')('_self')</script>";
								 			}
								 		}
								 	}
								 } 
								 ?>
							</p>	
						
						</form>
					</div>


					<div class="row" id="thumbs">
						<div class="col-xs-4">
							<a href="#" class="thumb">
								<img src="admin-area/product_images/<?php echo $pro_img1 ; ?>" alt="" class="img-responsive">
							</a>
						</div>

						 <div class="col-xs-4">
							<a href="#" class="thumb">
								<img src="admin-area/product_images/<?php echo $pro_img1 ; ?>" alt="" class="img-responsive">
							</a>
						</div>

						 <div class="col-xs-4">
							<a href="#" class="thumb">
								<img src="admin-area/product_images/<?php echo $pro_img1 ; ?>" alt="" class="img-responsive">
							</a>
						</div>
					</div>
				</div>
			</div>


			<div class="box" id="details">
				<a href="#description" class="btn btn-info tab" style="margin-bottom: 10px; " data-toggle="tab">
					<?php echo $status == 'product' ? 'Product Description' : 'Bundle Description'?>
				</a>

				<a href="#features" class="btn btn-info tab" style="margin-bottom: 10px; " data-toggle="tab">
					<?php echo $status == 'product' ? 'Product Features' : 'Bundle Features'?>
				</a>

				<a href="#videos" class="btn btn-info tab" style="margin-bottom: 10px; " data-toggle="tab">
					<?php echo $status == 'product' ? 'Product Sound and Videos' : 'Bundle Sound and Videos'?>
					Sound and Videos
				</a>

				<hr style="margin-top: 0px;">

				<div class="tab-content">
					<div id="description" class="tab-pane fade in active" style="margin-top: 7px;">
						<?php echo $pro_desc; ?>
					</div>

					<div id="features" class="tab-pane fade in" style="margin-top: 7px;">
						<?php echo $pro_features; ?>
					</div>

					<div id="videos" class="tab-pane fade in" style="margin-top: 7px;">
						<?php echo $pro_video; ?>
					</div>
				</div>
			</div>


			<div class="row same-height-row">

				<?php  
				 if ($status == "product") {
				 	# code..
				 ?>

				<div class="col-sm-3 ">
					<div class="box same-height headline">
						<h3 class="text-center">You May also like these Products</h3>
					</div>
				</div>

				<?php 

				 $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0, 3";
			 	 $run_products = mysqli_query($conn, $get_products);
			 	 while($rows = mysqli_fetch_array($run_products)) {
			 	 	$pro_id 	= $rows['product_id'];
			 	 	$pro_title  = $rows['product_title'];
			 	 	$pro_price  = $rows['product_price'];
			 	 	$pro_img1   = $rows['product_img1'];
			 	 	$pro_label  = $rows['product_label'];
			 	 	$manufacturer_id = $rows['manufacturer_id'];
			 	 	$product_psp_price = $rows['product_psp_price'];
			 	 	$pro_url    = $rows['product_url'];

			 	 	$get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id = '$manufacturer_id'";
			 	 	$run_manufacturer = mysqli_query($conn, $get_manufacturer);
			 	 	$row_manufacturer = mysqli_fetch_array($run_manufacturer);
			 	 	$manufacturer_name = $row_manufacturer['manufacturer_title'];

			 	 	if ($pro_label == "Sale" || $pro_label == "Gift") {
			 	 		$product_price   = "<del>$pro_price</del>";
			 	 		$product_psp_price = "| $product_psp_price";
			 	 	} else {
			 	 		$product_price   = "$pro_price";
			 	 		$product_psp_price = "";
			 	 	}
			 
			 	 	if ($pro_label == "") {
			 	 		# code...
			 	 	} else {
			 	 		$pro_label = "
			 	 		  <a href='#' class='label sale' style='color:black;'>
			 	 		    <div class='thelabel'>".$pro_label."</div>
			 	 		    <div class='label-background'></div>
			 	 		  </a>
			 	 		";
			 	 	}



			 	 	echo '
					  
					  <div class="col-sm-3">
						<div class="product">
						<a href="'.$pro_url.'"> 
						   <img src="admin-area/product_images/'.$pro_img1.'" alt="" class="img-responsive">
						</a>

						<div class="text">
						    <center>
						     <p class="btn btn-info">'.$manufacturer_name.'</p>
						    </center>
						    <hr>
							<h3><a href="'.$pro_url.'">'.$pro_title.'</a></h3>
							<p class="price">$'.$product_price.' '. $product_psp_price .'</p>

							<p class="buttons">
								<a href="'.$pro_url.'" class="btn btn-default">View Details</a>
								<a href="'.$pro_url.'" class="btn btn-info">
									<i class="fa fa-shopping-cart"></i>Add to cart
								</a>
							</p>
						</div>

						'.$pro_label.'
					</div>
					</div>
			 	 	';

				}

				 ?>

				<?php } else { ?>


					<div class="box same-height">
						<h3 class="text-center">Bundle Products</h3>
					</div>


					<?php
					 $get_bundle_product_relation = "SELECT * FROM bundle_product_relation WHERE bundle_id='$pro_id'";
					 $run_bundle_product_relation = mysqli_query($conn, $get_bundle_product_relation);
					 while($row_bundle_product_relation = mysqli_fetch_array($run_bundle_product_relation)) {

					 	$bundle_product_relation_product_id = $row_bundle_product_relation['product_id'];

					 	$get_products = "SELECT * FROM products WHERE product_id = '$bundle_product_relation_product_id'";
					 	$run_products = mysqli_query($conn, $get_products);
					 	while($rows = mysqli_fetch_array($run_products))  {

					 	 	$pro_id 	= $rows['product_id'];
					 	 	$pro_title  = $rows['product_title'];
					 	 	$pro_price  = $rows['product_price'];
					 	 	$pro_img1   = $rows['product_img1'];
					 	 	$pro_label  = $rows['product_label'];
					 	 	$manufacturer_id = $rows['manufacturer_id'];
					 	 	$product_psp_price = $rows['product_psp_price'];
					 	 	$pro_url    = $rows['product_url'];

					 	 	$get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id = '$manufacturer_id'";
					 	 	$run_manufacturer = mysqli_query($conn, $get_manufacturer);
					 	 	$row_manufacturer = mysqli_fetch_array($run_manufacturer);
					 	 	$manufacturer_name = $row_manufacturer['manufacturer_title'];

					 	 	if ($pro_label == "Sale" || $pro_label == "Gift") {
					 	 		$product_price   = "<del>$pro_price</del>";
					 	 		$product_psp_price = "| $product_psp_price";
					 	 	} else {
					 	 		$product_price   = "$pro_price";
					 	 		$product_psp_price = "";
					 	 	}
					 
					 	 	if ($pro_label == "") {
					 	 		# code...
					 	 	} else {
					 	 		$pro_label = "
					 	 		  <a href='#' class='label sale' style='color:black;'>
					 	 		    <div class='thelabel'>".$pro_label."</div>
					 	 		    <div class='label-background'></div>
					 	 		  </a>
					 	 		";
					 	 	}



					 	 	echo '
							  
							  <div class="col-sm-3">
								<div class="product">
								<a href="'.$pro_url.'"> 
								   <img src="admin-area/product_images/'.$pro_img1.'" alt="" class="img-responsive">
								</a>

								<div class="text">
								    <center>
								     <p class="btn btn-info">'.$manufacturer_name.'</p>
								    </center>
								    <hr>
									<h3><a href="'.$pro_url.'">'.$pro_title.'</a></h3>
									<p class="price">$'.$product_price.' '. $product_psp_price .'</p>

									<p class="buttons">
										<a href="'.$pro_url.'" class="btn btn-default">View Details</a>
										<a href="'.$pro_url.'" class="btn btn-info">
											<i class="fa fa-shopping-cart"></i>Add to cart
										</a>
									</p>
								</div>

								'.$pro_label.'
							</div>
							</div>
					 	 	';

						}
				 	
	
					 }


					 ?>

				<?php } ?>

			</div>

		</div>
	</div>
</div> <!-- Content Ends -->



<!-- Footer --> 
<?php include 'includes/footer.php'; ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>


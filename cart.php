<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>


<div id="content"> <!-- _Content starts -->
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>Cart</li>
			</ul>
		</div>

		<div class="col-md-9" id="cart">
			<div class="box">

				<form action="cart.php" method="post" enctype="multipart-form-data">

					<h1>Shopping Cart</h1>

					<?php 

					$ip_add = getRealUserIp();

					$select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
					$run_cart = mysqli_query($conn, $select_cart);

					$count = mysqli_num_rows($run_cart);

					 ?>

					<p class="text-muted">You currently have <?php echo $count ?> item(s) in your cart</p>

					<div class="table-responsive">
						 <table class="table">
						 	<thead>
						 		<tr>
						 			<th colspan="2">Product</th>
						 			<th>Quantity</th>
						 			<th>Unit Price</th>
						 			<th>Size</th>
						 			<th colspan="1">Delete</th>
						 			<th colspan="2">Sub total</th>
						 		</tr>
						 	</thead>

						 	<tbody>

						 		<?php 

						 		  $total = 0;

						 		  while($row_cart = mysqli_fetch_array($run_cart)) {
						 		  	$pro_id   = $row_cart['p_id'];
						 		  	$pro_size = $row_cart['size'];
						 		  	$pro_price = $row_cart['p_price'];
						 		  	$pro_qty  = $row_cart['qty'];

						 		  	$get_products = "SELECT * FROM products WHERE product_id = $pro_id";
						 		  	$run_products = mysqli_query($conn, $get_products);

						 		  	while($row_products = mysqli_fetch_array($run_products)) {
						 		  		$product_title  = $row_products['product_title'];
						 		  		$product_img1   = $row_products['product_img1'];
						 		  		$product_price  = $row_products['product_price'];

						 		  		$subtotal       = $pro_price * $pro_qty;
						 		  		$total         += $subtotal;

						 		 ?>

						 		<tr>
						 			<td>
						 				<img src="admin-area/product_images/<?php echo $product_img1; ?>" alt="" class="img-responsive">
						 			</td>
						 			<td>
						 				<a href="#"><?php echo $product_title; ?></a>
						 			</td>
						 			<td>
						 				<input type="text" name="quantity" value="<?php echo $pro_qty; ?>" data_product_id="<?php echo $pro_id; ?>" class="quantity form-control">
						 			</td>
						 			<td>
						 				$ <?php echo $pro_price; ?>
						 			</td>
						 			<td>
						 				<?php echo $pro_size; ?>
						 			</td>
						 			<td>
						 				<input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>">
						 			</td>
						 			<td>
						 				$ <?php echo $subtotal; ?>
						 			</td>
						 		</tr>

						 		<?php } } ?>
						 	
						 	</tbody>

						 	<tfoot>
						 		<tr>
						 			<th colspan="5">Total</th>
						 			<th colspan="2">$ <?php echo $total; ?></th>
						 		</tr>
						 	</tfoot>
						 </table>

						 <div class="form-inline pull-right">
						 	<div class="form-group">
						 		<label>Coupon Code</label>
						 		<input type="text" name="code" class="form-control">
						 	</div>
						 	<input type="submit" class="btn btn-info" name="apply_coupon" value="Apply Coupon Code">
						 </div>
					</div>

					<div class="box-footer">
						<div class="pull-left">
							<a href="index.php" class="btn btn-default">
								<i class="fa fa-chevron-left"></i> Continue Shopping
							</a>
						</div>

						<div class="pull-right">
							<button type="submit" name="update" class="btn btn-default"><i class="fas fa-sync"></i> Update Cart</button>

							<a href="checkout.php" class="btn btn-info">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
				</form>
			</div>

			<?php 

			 if (isset($_POST['apply_coupon'])) {
			 	$code = $_POST['code'];

			 	if ($code == "") {
			 		# code...
			 	} else {
			 		$get_coupons = "SELECT * FROM coupons WHERE coupon_code = '$code'";
			 		$run_coupons = mysqli_query($conn, $get_coupons);
			 		$check_coupons = mysqli_num_rows($run_coupons);

			 		if ($check_coupons == 1) {

			 			$row_coupons = mysqli_fetch_array($run_coupons);
			 			$coupon_pro  = $row_coupons['product_id'];
			 			$coupon_price  = $row_coupons['coupon_price'];
			 			$coupon_limit  = $row_coupons['coupon_limit'];
			 			$coupon_used  = $row_coupons['coupon_used'];
			 			
			 			if ($coupon_limit == $coupon_used) {
			 				echo "<script>alert('Your Coupon code has been expired')</script>";
			 			} else {
			 				$get_cart = "SELECT * FROM cart WHERE p_id = '$coupon_pro' AND ip_add='$ip_add'";
			 				$run_cart = mysqli_query($conn, $get_cart);
			 				$check_cart = mysqli_num_rows($run_cart);

			 				if ($check_cart == 1) {
			 					$add_used = "UPDATE coupons SET coupon_used = coupon_used+1 WHERE coupon_code = '$code'";
			 					$run_used = mysqli_query($conn, $add_used);

			 					$update_cart = "UPDATE cart SET p_price = '$coupon_price' WHERE p_id = '$coupon_pro' AND ip_add='$ip_add'";
			 					$run_update = mysqli_query($conn, $update_cart);
			 					echo "<script>alert('Your Coupon Code has been applied successfully')</script>";
			 					echo "<script>window.open('cart.php', '_self')</script>";
			 				} else {
			 					echo "<script>alert('Product does not exist in cart')</script>";
			 				}

			 			}

			 		} else {
			 			echo "<script>alert('Your coupon code is not valid')</script>";
			 		}
			 	}
			 }
			 ?>

			<?php 
			 function update_cart() {
			 	global $conn;

			 	if (isset($_POST['update'])) {

			 		foreach($_POST['remove'] as $remove_id) {
			 			$delete_product = "DELETE FROM cart WHERE p_id = $remove_id";
			 			$run_delete  = mysqli_query($conn, $delete_product);

			 			if ($run_delete) {
			 				echo "<script>window.open('cart.php', '_self')</script>";
			 			}
			 		}
			 	}
			 }

			  echo @$up_cart = update_cart();
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



		</div>


	<div class="col-md-3">
		<div class="box" id="order-summary">
			<div class="box-header">
				<h3>Order Summary</h3>
			</div>

			<p class="text-muted">
				Shipping and additional costs are calculated based on the values you have entered 
			</p>

			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<td>Order Subtotaal</td>
							<th>$ <?php echo $total; ?></th>
						</tr>

						<tr>
							<td>Shipping and handling</td>
							<td>$0.00</td>
						</tr>

						<tr>
							<td>Tax</td>
							<td>$0.00</td>
						</tr>

						<tr class="total">
							<td>Total</td>
							<th>$<?php echo $total; ?></th>
						</tr>
					</tbody>
				</table>
			</div>
				
		
		</div>
	</div>
	</div>


</div> <!-- Content Ends -->



<!-- Footer --> 
<?php include 'includes/footer.php'; ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
	
		$(document).on('keyup', '.quantity', function() {
			var id = $(this).attr("data_product_id");
			var quantity = $(this).val();

			if (quantity != '') {
				$.ajax({
					url: 'change.ajax.php',
					method: 'POST',
					data: {id:id, quantity:quantity},
					success:function(data) {
						$('body').load('cart.php')
					}
				});
			}
		});
	
</script>
</body>
</html>
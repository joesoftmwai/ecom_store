<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Insert Coupons
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Insert Coupons
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-3 control-label">Coupon Title</label>
						<div class="col-md-6">
							<input type="text" name="coupon_title" class="form-control">
						</div>
					</div>


					<div class="form-group">
						<label class="col-md-3 control-label">Coupon Price</label>
						<div class="col-md-6">
							<input type="text" name="coupon_price" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Coupon Code</label>
						<div class="col-md-6">
							<input type="text" name="coupon_code" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Coupon Limit</label>
						<div class="col-md-6">
							<input type="number"  value="1" name="coupon_limit" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Coupon (Product or Bundle)</label>
						<div class="col-md-6">
							<select name="product_id" class="form-control">
								<option value="">Select Coupon Product</option>
								<?php 
								  $get_products = "SELECT * FROM products WHERE status = 'product'";
								  $run_products = mysqli_query($conn, $get_products);
								  while($row_products = mysqli_fetch_array($run_products)) {
								  	$product_id = $row_products['product_id'];
								  	$product_title = $row_products['product_title'];

								  	echo "<option value='".$product_id."'>".$product_title."</option>";
								  }
								 ?>
								 <option value=""></option>
								 <option value="">Select Coupon Bundle</option>
								 <?php 
								  $get_products = "SELECT * FROM products WHERE status = 'bundle'";
								  $run_products = mysqli_query($conn, $get_products);
								  while($row_products = mysqli_fetch_array($run_products)) {
								  	$product_id = $row_products['product_id'];
								  	$product_title = $row_products['product_title'];

								  	echo "<option value='".$product_id."'>".$product_title."</option>";
								  }
								 ?>
							</select>
						</div>
					</div>


					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Submit" class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php 
 
 if (isset($_POST['submit'])) {
 	$product_id       = $_POST['product_id'];
 	$coupon_title	  = $_POST['coupon_title'];
 	$coupon_price	  = $_POST['coupon_price'];
    $coupon_code	  = $_POST['coupon_code'];
    $coupon_limit	  = $_POST['coupon_limit'];
    $coupon_used      = 0;

    $get_coupons      = "SELECT * FROM coupons WHERE product_id = '$product_id' OR coupon_code = '$coupon_code'";
    $run_coupons      = mysqli_query($conn, $get_coupons);
    $check_coupon     = mysqli_num_rows($run_coupons);

    if ($check_coupon == 1) {
    	echo "<script>alert('Coupon Code or Product already added Please Choose another Coupon Code or Product')</script>";
    } else {

    	$insert_coupons = "INSERT INTO `coupons`(`product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES ('$product_id', '$coupon_title', '$coupon_price', '$coupon_code', '$coupon_limit', '$coupon_used')";
	 	$run_coupons    = mysqli_query($conn, $insert_coupons);

	 	if ($run_coupons) {
	 		echo "<script>alert('New Coupon added successfully')</script>";
	 		echo "<script>window.open('index.php?view_coupons', '_self')</script>";
	 	}

    }

 }

 ?>



 <?php } ?>
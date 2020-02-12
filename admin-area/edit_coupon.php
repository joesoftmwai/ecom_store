<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <?php 

 if (isset($_GET['edit_coupon'])) {
 	$edit_id  = $_GET['edit_coupon'];

 	$get_coupon  = "SELECT * FROM coupons WHERE coupon_id = $edit_id";
 	$run_coupon  = mysqli_query($conn, $get_coupon);
 	$row_coupon  = mysqli_fetch_array($run_coupon);
 	$coupon_id      = $row_coupon['coupon_id'];
 	$product_id   = $row_coupon['product_id'];
 	$coupon_title   = $row_coupon['coupon_title'];
 	$coupon_price    = $row_coupon['coupon_price'];
 	$coupon_code    = $row_coupon['coupon_code'];
 	$coupon_limit    = $row_coupon['coupon_limit'];
 	$coupon_used    = $row_coupon['coupon_used'];


 	$get_p_title = "SELECT * FROM products WHERE product_id='$product_id'";
  	$run_p_title = mysqli_query($conn, $get_p_title);
  	$row_p = mysqli_fetch_array($run_p_title);
  	$product_title = $row_p['product_title'];

 }

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Edit Coupon
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit Coupon
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-3 control-label">Coupon Title</label>
						<div class="col-md-6">
							<input type="text" name="coupon_title" class="form-control" value="<?php echo isset($coupon_title) ? $coupon_title : ''?>">
						</div>
					</div>


					<div class="form-group">
						<label class="col-md-3 control-label">Coupon Price</label>
						<div class="col-md-6">
							<input type="text" name="coupon_price" class="form-control" value="<?php echo isset($coupon_price ) ? $coupon_price  : ''?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Coupon Code</label>
						<div class="col-md-6">
							<input type="text" name="coupon_code" class="form-control" value="<?php echo isset($coupon_code) ? $coupon_code : ''?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Coupon Limit</label>
						<div class="col-md-6">
							<input type="number"  value="1" name="coupon_limit" class="form-control" value="<?php echo isset($coupon_limit) ? $coupon_limit : ''?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Coupon (Product or Bundle)</label>
						<div class="col-md-6">
							<select name="product_id" class="form-control">
								<option value="<?php echo $product_id; ?>"><?php echo $product_title; ?></option>
								<?php 
								  $get_products = "SELECT * FROM products WHERE product_id != '$product_id' AND status ='product'";
								  $run_products = mysqli_query($conn, $get_products);
								  while($row_products = mysqli_fetch_array($run_products)) {
								  	$product_id = $row_products['product_id'];
								  	$product_title = $row_products['product_title'];

								  	echo "<option value='".$product_id."'>".$product_title."</option>";
								  }
								 ?>
								 <option value=""></option>
								 <option value="">Coupon Bundle</option>
								 <?php 
								  $get_products = "SELECT * FROM products WHERE product_id != '$product_id' AND status ='bundle'";
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
							<input type="submit" name="submit" value="Update" class="btn btn-primary form-control">
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
    $coupon_used      = $coupon_used;

	$update_coupons = "UPDATE `coupons` SET `product_id`='$product_id ',`coupon_title`='$coupon_title',`coupon_price`='$coupon_price',`coupon_code`='$coupon_code',`coupon_limit`='$coupon_limit',`coupon_used`='$coupon_used ' WHERE coupon_id = '$edit_id'";
 	$run_coupons    = mysqli_query($conn, $update_coupons);

 	if ($run_coupons) {
 		echo "<script>alert('Coupon updated successfully')</script>";
 		echo "<script>window.open('index.php?view_coupons', '_self')</script>";
 	}

}

 ?>

 <?php } ?>
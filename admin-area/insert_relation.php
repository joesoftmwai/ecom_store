<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Insert Relation
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Insert Relation
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-3 control-label">Relation Title</label>
						<div class="col-md-6">
							<input type="text" name="rel_title" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Product</label>
						<div class="col-md-6">
							<select name="product_id" class="form-control">
								<option value="">Select Product</option>
								<?php 
								  $get_products = "SELECT * FROM products WHERE status = 'product'";
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
						<label class="col-md-3 control-label">Bundle</label>
						<div class="col-md-6">
							<select name="bundle_id" class="form-control">
								<option value="">Select  Bundle</option>
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
 	$rel_title  = $_POST['rel_title'];
 	$product_id	  = $_POST['product_id'];
 	$bundle_id	  = $_POST['bundle_id'];

 	$insert_relation = "INSERT INTO `bundle_product_relation`(`rel_title`, `product_id`, `bundle_id`) VALUES ('$rel_title','$product_id','$bundle_id')";
 	$run_relation    = mysqli_query($conn, $insert_relation);

 	if ($run_relation) {
 		echo "<script>alert('New Bundle relation added successfully')</script>";
 		echo "<script>window.open('index.php?view_relations', '_self')</script>";
 	}
 }

 ?>



 <?php } ?>
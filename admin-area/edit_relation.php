<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>



 <?php 

  if (isset($_GET['edit_relation'])) {
  	$edit_id  = $_GET['edit_relation'];

  	$edit_relation = "SELECT * FROM bundle_product_relation WHERE rel_id = $edit_id";
  	$run_edit    = mysqli_query($conn, $edit_relation);
  	$row_rrlation   = mysqli_fetch_array($run_edit);
  	
  	$rel_id    = $row_rrlation['rel_id'];
  	$rel_title  = $row_rrlation['rel_title'];
  	$product_id = $row_rrlation['product_id'];
  	$bundle_id = $row_rrlation['bundle_id'];

  	$get_p_title = "SELECT * FROM products WHERE product_id='$product_id'";
	$run_p_title = mysqli_query($conn, $get_p_title);
	$row_p = mysqli_fetch_array($run_p_title);
	$product_title = $row_p['product_title'];

	$get_bundle = "SELECT * FROM products WHERE product_id='$bundle_id'";
	$run_bundle = mysqli_query($conn, $get_bundle);
	$row_bundle = mysqli_fetch_array($run_bundle);
	$bundle_title = $row_bundle['product_title'];

  }

  ?>




 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Relation
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit Relation
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-3 control-label">Relation Title</label>
						<div class="col-md-6">
							<input type="text" name="rel_title" class="form-control" value="<?php echo isset($rel_title) ? $rel_title : '' ;?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Product</label>
						<div class="col-md-6">
							<select name="product_id" class="form-control">
								<option value="<?php echo $product_id; ?>"><?php echo $product_title; ?></option>
								<?php 
								  $get_products = "SELECT * FROM products WHERE status = 'product' AND product_id != '$product_id'";
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
								<option value="<?php echo $bundle_id ;?>"><?php echo $bundle_title; ?></option>
								<?php 
								  $get_products = "SELECT * FROM products WHERE status = 'bundle' AND product_id != '$bundle_id'";
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

<?php 

 if (isset($_POST['submit'])) {
 	$rel_title  = $_POST['rel_title'];
 	$product_id	  = $_POST['product_id'];
 	$bundle_id	  = $_POST['bundle_id'];



 	$update_relation = "UPDATE `bundle_product_relation` SET `rel_title`='$rel_title',`product_id`='$product_id',`bundle_id`='$bundle_id' WHERE rel_id = '$rel_id'";
 	$run_relation    = mysqli_query($conn, $update_relation);

 	if ($run_relation) {
 		echo "<script>alert('Bundle relation updated successfully')</script>";
 		echo "<script>window.open('index.php?view_relations', '_self')</script>";
 	}
 }

 ?>
 ?>



 <?php } ?>
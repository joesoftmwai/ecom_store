<?php 

 if (isset($_GET['edit_p_cat'])) {
 	$edit_id  = $_GET['edit_p_cat'];

 	$get_p_cat  = "SELECT * FROM products_category WHERE p_cat_id = $edit_id";
 	$run_p_cat  = mysqli_query($conn, $get_p_cat);
 	$row_p_cat  = mysqli_fetch_array($run_p_cat);
 	$p_cat_id      = $row_p_cat['p_cat_id'];
 	$p_cat_title   = $row_p_cat['p_cat_title'];
 	$p_cat_top    = $row_p_cat['p_cat_top'];
 	$p_cat_image    = $row_p_cat['p_cat_image'];

 }

 ?>


  <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Edit Product Categories
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit Product Categories
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Product Category Title</label>
						<div class="col-md-6">
							<input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Top Product Category</label>
						<div class="col-md-6">
							<label>Yes</label>
							<input type="radio" name="p_cat_top" value="Yes" grm="<?php echo $p_cat_top;?>" <?php if ($p_cat_top == "No") { } else { echo "checked='checked'";} ?>>

							<label>No</label>
							<input type="radio" name="p_cat_top" value="No" <?php if ($p_cat_top == "No") {echo "checked='checked'";} else { } ?>>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Product Category Image</label>
						<div class="col-md-6">
							<input type="file" name="p_cat_image" class="form-control"><br>
							<img src="other_images/<?php echo $p_cat_image; ?>" alt="" width="50" height="50">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="update_p_cat" value="Update" class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php 
 
 if (isset($_POST['update_p_cat'])) {
 	$p_cat_title  = $_POST['p_cat_title'];
 	$p_cat_top    = $_POST['p_cat_top'];

 	$p_cat_image   = $_FILES['p_cat_image']['name'];
 	$temp_name1     = $_FILES['p_cat_image']['tmp_name'];
 	move_uploaded_file($temp_name1 , "other_images/$p_cat_image");

 	$insert_p_cat = "UPDATE `products_category` SET `p_cat_title`='$p_cat_title',`p_cat_top`='$p_cat_top', `p_cat_image`='$p_cat_image' WHERE p_cat_id = $edit_id";
 	$run_p_cat    = mysqli_query($conn, $insert_p_cat);

 	if ($run_p_cat) {
 		echo "<script>alert('Product Category Updated Successfully')</script>";
 		echo "<script>window.open('index.php?view_p_cats', '_self')</script>";
 	}
 }

 ?>

<?php 

 if (isset($_GET['edit_cat'])) {
 	$edit_id  = $_GET['edit_cat'];

 	$get_cat  = "SELECT * FROM categories WHERE cat_id = $edit_id";
 	$run_cat  = mysqli_query($conn, $get_cat);
 	$row_cat  = mysqli_fetch_array($run_cat);
 	$cat_id      = $row_cat['cat_id'];
 	$cat_title   = $row_cat['cat_title'];
 	$cat_top    = $row_cat['cat_top'];
 	$cat_image    = $row_cat['cat_image'];

 }

 ?>


  <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Edit Categories
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit Categories
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Product Title</label>
						<div class="col-md-6">
							<input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Top Category</label>
						<div class="col-md-6">
							<label>Yes</label>
							<input type="radio" name="cat_top" value="Yes" grm="<?php echo $cat_top;?>" <?php if ($cat_top == "No") { } else { echo "checked='checked'";} ?>>

							<label>No</label>
							<input type="radio" name="cat_top" value="No" <?php if ($cat_top == "No") {echo "checked='checked'";} else { } ?>>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Category Image</label>
						<div class="col-md-6">
							<input type="file" name="cat_image" class="form-control"><br>
							<img src="other_images/<?php echo $cat_image; ?>" alt="" width="50" height="50">
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
 	$cat_title  = $_POST['cat_title'];
 	$cat_top	  = $_POST['cat_top'];

 	$cat_image   = $_FILES['cat_image']['name'];
 	$temp_name1     = $_FILES['cat_image']['tmp_name'];
 	move_uploaded_file($temp_name1 , "other_images/$cat_image");

 	$insert_p_cat = "UPDATE `categories` SET `cat_title`='$cat_title',`cat_top`='$cat_top', cat_image='$cat_image' WHERE cat_id = $edit_id";
 	$run_cat    = mysqli_query($conn, $insert_p_cat);

 	if ($run_cat) {
 		echo "<script>alert('Category Updated Successfully')</script>";
 		echo "<script>window.open('index.php?view_cats', '_self')</script>";
 	}
 }

 ?>

<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Insert Category
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Insert Category
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Product Title</label>
						<div class="col-md-6">
							<input type="text" name="cat_title" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Top Category</label>
						<div class="col-md-6">
							<label>Yes</label>
							<input type="radio" name="cat_top" value="Yes">

							<label>No</label>
							<input type="radio" name="cat_top" value="No">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Category Image</label>
						<div class="col-md-6">
							<input type="file" name="cat_image" class="form-control">
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
 	$cat_title  = $_POST['cat_title'];
 	$cat_top    = $_POST['cat_top'];

 	$cat_image   = $_FILES['cat_image']['name'];
 	$temp_name1     = $_FILES['cat_image']['tmp_name'];
 	move_uploaded_file($temp_name1 , "other_images/$cat_image");

 	$insert_cat = "INSERT INTO categories (cat_title, cat_top, cat_image) VALUES ('$cat_title' ,'$cat_top', '$cat_image')";
 	$run_cat    = mysqli_query($conn, $insert_cat);

 	if ($run_cat) {
 		echo "<script>alert('New Category added successfully')</script>";
 		echo "<script>window.open('index.php?view_cats', '_self')</script>";
 	}
 }

 ?>



 <?php } ?>
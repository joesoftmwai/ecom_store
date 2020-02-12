<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Insert Manufacturer
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Insert Manufacturer
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Manufacturer Name</label>
						<div class="col-md-6">
							<input type="text" name="manufacturer_name" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Top Manufacturer</label>
						<div class="col-md-6">
							<label>Yes</label>
							<input type="radio" name="manufacturer_top" value="Yes">

							<label>No</label>
							<input type="radio" name="manufacturer_top" value="No">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Manufacturer Image</label>
						<div class="col-md-6">
							<input type="file" name="manufacturer_image" class="form-control">
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
 	$manufacturer_name = $_POST['manufacturer_name'];
 	$top_manufacturer  = $_POST['manufacturer_top'];

 	$manufacturer_image   = $_FILES['manufacturer_image']['name'];
 	$temp_name1     = $_FILES['manufacturer_image']['tmp_name'];
 	move_uploaded_file($temp_name1 , "other_images/$manufacturer_image");

 	$insert_manufacturer = "INSERT INTO `manufacturers`(`manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES ('$manufacturer_name','$top_manufacturer','$manufacturer_image')";
 	$run_manufacturer    = mysqli_query($conn, $insert_manufacturer);

 	if ($run_manufacturer) {
 		echo "<script>alert('New Manufacturer added successfully')</script>";
 		echo "<script>window.open('index.php?view_manufacturers', '_self')</script>";
 	}
 }

 ?>



 <?php } ?>
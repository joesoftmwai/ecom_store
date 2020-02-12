<?php 

 if (isset($_GET['edit_manufacturer'])) {
 	$edit_id  = $_GET['edit_manufacturer'];

 	$get_manufacturer  = "SELECT * FROM manufacturers WHERE manufacturer_id = $edit_id";
 	$run_manufacturer  = mysqli_query($conn, $get_manufacturer);
 	$row_manufacturer  = mysqli_fetch_array($run_manufacturer);
 	$manufacturer_id      = $row_manufacturer['manufacturer_id'];
 	$manufacturer_title   = $row_manufacturer['manufacturer_title'];
 	$manufacturer_image   = $row_manufacturer['manufacturer_image'];
 	$manufacturer_top    = $row_manufacturer['manufacturer_top'];

 }

 ?>


  <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Edit Manufacturer
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit Manufacturer
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Manufacturer Name</label>
						<div class="col-md-6">
							<input type="text" name="manufacturer_name" class="form-control" value="<?php echo $manufacturer_title; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Top Manufacturer</label>
						<div class="col-md-6">

							<label>Yes</label>
							<input type="radio" name="manufacturer_top" value="Yes" grm="<?php echo $manufacturer_top;?>" <?php if ($manufacturer_top == "No") { } else { echo "checked='checked'";} ?>>

							<label>No</label>
							<input type="radio" name="manufacturer_top" value="No" <?php if ($manufacturer_top == "No") {echo "checked='checked'";} else { } ?>>

							
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Manufacturer Image</label>
						<div class="col-md-6">
							<input type="file" name="manufacturer_image" class="form-control">
							<br>
							<img src="other_images/<?php echo $manufacturer_image; ?>" alt="" width="70" height="70">
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
 	$manufacturer_name = $_POST['manufacturer_name'];
 	$top_manufacturer  = $_POST['manufacturer_top'];

 	$manufacturer_image   = $_FILES['manufacturer_image']['name'];
 	$temp_name1     = $_FILES['manufacturer_image']['tmp_name'];
 	move_uploaded_file($temp_name1 , "other_images/$manufacturer_image");


 	$update_manufacturer = "UPDATE `manufacturers` SET `manufacturer_title`='$manufacturer_name', `manufacturer_top`='$top_manufacturer', `manufacturer_image` = '$manufacturer_image' WHERE manufacturer_id = '$edit_id'";
 	$run_manufacturer    = mysqli_query($conn, $update_manufacturer);

 	if ($run_manufacturer) {
 		echo "<script>alert('Manufacturer updated successfully')</script>";
 		echo "<script>window.open('index.php?view_manufacturers', '_self')</script>";
 	} else {
 		echo "<script>alert('Syntax error')</script>";
 	}
 }

 ?>


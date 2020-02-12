<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Insert slide
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Insert Slide
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Slide Name</label>
						<div class="col-md-6">
							<input type="text" name="slide_name" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Slide Image</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="slide_image">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Slide Url</label>
						<div class="col-md-6">
							<input type="text" name="slide_url" class="form-control">
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




 	$slide_name    = $_POST['slide_name'];
 	$slide_url     = $_POST['slide_url'];
 	$slide_image   = $_FILES['slide_image']['name'];
 	$temp_name     = $_FILES['slide_image']['tmp_name'];

 	$view_slides   = "SELECT * FROM slider";
 	$run_view_slides = mysqli_query($conn, $view_slides);
 	$count_slides   = mysqli_num_rows($run_view_slides);

 	if ($count_slides < 5) {

 		move_uploaded_file($temp_name, "slides_images/$slide_image");

 		$insert_slide = "INSERT INTO slider (slide_name, slide_image, slide_url) VALUES ('$slide_name' ,'$slide_image', '$slide_url')";
 	  	$run_insert_slide    = mysqli_query($conn, $insert_slide);

 	  	echo "<script>alert('New Slide added successfully')</script>";
	 	echo "<script>window.open('index.php?view_slides', '_self')</script>";

 	} else {
 		echo "<script>alert('You have already inserted 4 images')</script>";

 	}

 }

 ?>



 <?php } ?>
<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>



 <?php 

  if (isset($_GET['edit_slide'])) {
  	$edit_id  = $_GET['edit_slide'];

  	$edit_slide = "SELECT * FROM slider WHERE slide_id = $edit_id";
  	$run_edit    = mysqli_query($conn, $edit_slide);
  	$row_slide   = mysqli_fetch_array($run_edit);
  	
  	$slide_id    = $row_slide['slide_id'];
  	$slide_name  = $row_slide['slide_name'];
  	$slide_image = $row_slide['slide_image'];
  	$slide_url   = $row_slide['slide_url'];
  }

  ?>




 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Edit slide
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit Slide
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-3 control-label">Slide Name</label>
						<div class="col-md-6">
							<input type="text" name="slide_name" class="form-control" value="<?php echo $slide_name; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Slide Image</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="slide_image">
							<br>
							<img src="slides_images/<?php echo $slide_image; ?>" alt=""  width="80" height="80">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Slide Url</label>
						<div class="col-md-6">
							<input type="text" name="slide_url" class="form-control" value="<?php echo $slide_url; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="update" value="Update" class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php 
 
 if (isset($_POST['update'])) {




 	$slide_name    = $_POST['slide_name'];
 	$slide_image   = $_FILES['slide_image']['name'];
 	$temp_name     = $_FILES['slide_image']['tmp_name'];
 	move_uploaded_file($temp_name, "slides_images/$slide_image");

 	$view_slides   = "SELECT * FROM slider";
 	$run_view_slides = mysqli_query($conn, $view_slides);
 	$count_slides    = mysqli_num_rows($run_view_slides);

 	$update_slide   = "UPDATE `slider` SET `slide_name`='$slide_name',`slide_image`='$slide_image' WHERE slide_id = $edit_id";
 	$run_update     = mysqli_query($conn, $update_slide );   

 	if ($run_update) {

 	  	echo "<script>alert('Slide updated successfully')</script>";
	 	echo "<script>window.open('index.php?view_slides', '_self')</script>";

 	} 

 	
 }

 ?>



 <?php } ?>
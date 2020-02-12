<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Insert User
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Insert User
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-3 control-label">User Name</label>
						<div class="col-md-6">
							<input type="text" name="admin_name" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User Email</label>
						<div class="col-md-6">
							<input type="text" name="admin_email" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">User Password</label>
						<div class="col-md-6">
							<input type="password" name="admin_pass" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User Country</label>
						<div class="col-md-6">
							<input type="text" name="admin_country" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User Job</label>
						<div class="col-md-6">
							<input type="text" name="admin_job" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User Countact</label>
						<div class="col-md-6">
							<input type="text" name="admin_contact" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">User About</label>
						<div class="col-md-6">
							<textarea name="admin_about" id="" cols="30" rows="3" class="form-control" required></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">User Image</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="admin_image">
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

 	
 	$admin_name	   = $_POST['admin_name'];
 	$admin_email   = $_POST['admin_email'];
 	$admin_pass	   = $_POST['admin_pass'];
 	$admin_contact = $_POST['admin_contact'];
 	$admin_country = $_POST['admin_country'];
 	$admin_job	   = $_POST['admin_job'];
 	$admin_about   = $_POST['admin_about'];

 	$admin_image   = $_FILES['admin_image']['name'];
 	$temp_name     = $_FILES['admin_image']['tmp_name'];
 	move_uploaded_file($temp_name, "admin_images/$admin_image");


 		
 	$insert_admin  = "INSERT INTO admins(`admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES ('$admin_name','$admin_email ','$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";
 	$run_admin     = mysqli_query($conn, $insert_admin);

 	


 	if ($run_admin) {
 		echo "<script>alert('Admin user added successfully')</script>";
 		echo "<script>window.open('index.php?view_users', '_self')</script>";
 	}

 	 

 	
 }

 ?>



 <?php } ?>
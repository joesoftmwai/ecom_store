<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>


 <?php 

  if (isset($_GET['user_profile'])) {
  	$user_profile  = $_GET['user_profile'];
 	$get_user  = "SELECT * FROM admins WHERE admin_id = $user_profile";
 	$run_user  = mysqli_query($conn, $get_user);
 	$row_user  = mysqli_fetch_array($run_user);

 	$admin_id         = $row_user['admin_id'];
 	$admin_contact    = $row_user['admin_contact'];
 	$admin_country    = $row_user['admin_country'];
 	$admin_job        = $row_user['admin_job'];
 	$admin_about      = $row_user['admin_about'];
 	$admin_image      = $row_user['admin_image'];
 	$admin_name       = $row_user['admin_name'];
 	$admin_email      = $row_user['admin_email'];
 	$admin_image      = $row_user['admin_image'];




  }


  ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Edit User
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit User
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-3 control-label">User Name</label>
						<div class="col-md-6">
							<input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User Email</label>
						<div class="col-md-6">
							<input type="text" name="admin_email" class="form-control" required value="<?php echo $admin_email; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">User Country</label>
						<div class="col-md-6">
							<input type="text" name="admin_country" class="form-control" required value="<?php echo $admin_country; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User Job</label>
						<div class="col-md-6">
							<input type="text" name="admin_job" class="form-control" required value="<?php echo $admin_job ; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">User Contact</label>
						<div class="col-md-6">
							<input type="text" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">User About</label>
						<div class="col-md-6">
							<textarea name="admin_about" id="" cols="30" rows="3" class="form-control" required>
								<?php echo $admin_about; ?>
							</textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">User Image</label>
						<div class="col-md-6">
							<input type="file" class="form-control" name="admin_image" value="<?php echo $admin_image ; ?>">
							<br>
							<img src="admin_images/<?php echo $admin_image ; ?>" alt="" width="60" width="60">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="update_user" value="Update" class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<?php 
 
 if (isset($_POST['update_user'])) {

 	
 	$admin_name	   = $_POST['admin_name'];
 	$admin_email   = $_POST['admin_email'];
 	$admin_contact = $_POST['admin_contact'];
 	$admin_country = $_POST['admin_country'];
 	$admin_job	   = $_POST['admin_job'];
 	$admin_about   = $_POST['admin_about'];

 	$admin_image   = $_FILES['admin_image']['name'];
 	$temp_name     = $_FILES['admin_image']['tmp_name'];
 	move_uploaded_file($temp_name, "admin_images/$admin_image");

 		
 	$update_admin  = "UPDATE `admins` SET `admin_name`='$admin_name',`admin_email`='$admin_email',`admin_image`='$admin_image',`admin_contact`=$admin_contact,`admin_country`='$admin_country',`admin_job`='$admin_job',`admin_about`='$admin_about' WHERE admin_id = $user_profile";
 	$run_admin     = mysqli_query($conn, $update_admin);

 	if ($run_admin) {
 		echo "<script>alert('Admin user Updated successfully Login again')</script>";
 		echo "<script>window.open('login.php', '_self')</script>";
 		session_destroy();
 	} else {
 		echo "<script>alert('QUERY FAILED')</script>";
 	}

 	 

 	
 }

 ?>



 <?php } ?>
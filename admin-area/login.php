<?php
 session_start();
 include 'includes/db.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="container">
		<form class="form-login" action="" method="post">
			<h2 class="form-login-heading">Admin Login</h2>
			<input type="text" class="form-control" name="admin_email" placeholder="Email" required>

			<input type="password" class="form-control" name="admin_pass" placeholder="Password" required>

			<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">Login</button>
		</form>
	</div>
</body>
</html>

<?php 
  if (isset($_POST['admin_login'])) {

  	$admin_email  = mysqli_real_escape_string($conn, $_POST['admin_email']);
  	$admin_pass   = mysqli_real_escape_string($conn, $_POST['admin_pass']);

  	$get_admin    = "SELECT * FROM admins WHERE admin_email ='$admin_email'";
  	$run_admin    = mysqli_query($conn, $get_admin);
  	$count        = mysqli_num_rows($run_admin);

  	if ($count == 1) {
  		$_SESSION['admin_email'] = $admin_email ;

  		echo "<script>alert('You are logged in into admin panel')</script>";
  		echo "<script>window.open('index.php?dashboard', '_self')</script>";
  	} else {
  		echo "<script>alert('Email or password is null')</script>";
  	}


  }
 ?>
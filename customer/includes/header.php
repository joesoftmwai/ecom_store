<?php
    session_start();
    ob_start(); 

	include 'functions/functions.php'; 
	?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Ecommerce-store</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100">
	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css">
	<link rel="stylesheet" href="font-awesome/css/fontawesome-all.min.css">
</head>
<body>

<div id="top"><!-- top Starts -->
	<div class="container">

	<div class="row">
	<div class="col-md-6 offer">
		<a href="#" class="btn btn-success">
			<?php 
			  if (!isset($_SESSION['customer_email'])) {
			  	echo "Welcome: Guest";
			  } else {
			  	echo "Welcome:".$_SESSION['customer_email']."";
			  }
			 ?>
		</a>
		<a href="#">
			Shopping Cart Total Price $ <?php total_price(); ?> , Total Items <?php items(); ?>
		</a>
	</div>

	<div class="col-md-6">
		<ul class="menu">
			<li>
				<a href="../customer_register.php">
					Register
				</a>
			</li>
			<li>
				<?php 
				  if (!isset($_SESSION['customer_email'])) {
				  	echo '<a href="../checkout.php">My Account</a>';
				  } else {
				  	echo '<a href="my_account.php?my_orders">My Account</a>';
				  }
				 ?>
			</li>
			<li>
				<a href="../cart.php">
					Go To Cart
				</a>
			</li>
			<li>
				<?php 
				  if (!isset($_SESSION['customer_email'])) {
				  	echo '<a href="../checkout.php">Login</a>';
				  } else {
				  	echo '<a href="../logout.php">Logout</a>';
				  }
				 ?> 
			</li>
		</ul>
	</div>
	</div>

	</div>
</div><!-- top Ends -->
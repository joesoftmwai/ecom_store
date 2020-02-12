<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>


<div id="content"> <!-- _Content starts -->
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>Login</li>
			</ul>
		</div>

		

		<div class="col-md-12">
			<?php
			 
			 $ip_add = getRealUserIp();
			 $check_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
			 $run_cart   = mysqli_query($conn, $check_cart );
			 $count_cart = mysqli_num_rows($run_cart);

			 if (!isset($_SESSION['customer_email'])) {
			 	include 'customer/customer_login.php';
			 } else {
			 	include 'payement_options.php';
			 }
			 ?>
			 
		</div>
	</div>
</div> <!-- Content Ends -->


<!-- Footer --> 
<?php include 'includes/footer.php'; ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
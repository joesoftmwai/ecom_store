<div class="box">
	<div class="box-header">
		<center>
			<h1>Login</h1>
			<p class="lead">Already our customer?</p>
		</center>
		<p class="text-muted">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, numquam repellendus blanditiis. Ratione corporis distinctio dolores sunt culpa, unde a ipsam fugiat. Fugit modi consequuntur quis, officiis consectetur dolores voluptatibus.
		</p>
	</div>

	<form action="checkout.php" method="post">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="c_email" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="pass">Password</label>
			<input type="password" name="c_pass" class="form-control" required>
		</div>

		<h4 align="center">
			<a href="forgot.php">Forgot Password</a>
		</h4>

		<div class="text-center">
			<button class="btn btn-info btn-btn-lg" type="submit" name="login">
				<i class="fas fa-sign-in-alt"></i> Log in  
			</button>
		</div>
	</form>
	<center>
		<a href="customer_register.php">
			<h4>New ? Register here</h4>
		</a>
	</center>

</div>

<?php 
 if (isset($_POST['login'])) {
 	$customer_email = $_POST['c_email'];
 	$customer_pass  = $_POST['c_pass'];

 	$select_customer = "SELECT * FROM customers WHERE customer_email = '$customer_email'";
 	$run_customer    = mysqli_query($conn, $select_customer);

 	$get_ip = getRealUserIp();
 	$check_customer  = mysqli_num_rows($run_customer);

 	$select_cart = "SELECT * FROM cart WHERE ip_add = '$get_ip'";
 	$run_cart    = mysqli_query($conn, $select_cart);
 	$check_cart  = mysqli_num_rows($run_cart);


 	if ($check_customer == 0) {
 		echo "<script>alert('Password or email is wrong')</script>";
 		exit();
 	}

 	if ($check_cart == 0 AND $check_customer == 1) {
 		$_SESSION['customer_email'] = $customer_email;
 		echo "<script>alert('You are logged in')</script>";
 		echo "<script>window.open('customer/my_account.php?my_orders', '_self')</script>";
 	} else {
		$_SESSION['customer_email'] = $customer_email;
 		echo "<script>alert('You are logged in')</script>";
 		echo "<script>window.open('checkout.php', '_self')</script>";
	   }
 
 }
 ?>
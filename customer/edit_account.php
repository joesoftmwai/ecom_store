<?php  

 $customer_session = $_SESSION['customer_email'];
 $get_customer     = "SELECT * FROM customers WHERE customer_email = '$customer_session'";
 $run_customer     = mysqli_query($conn, $get_customer);
 $row_customer     = mysqli_fetch_array($run_customer);

 $customer_id      = $row_customer['customer_id'];
 $customer_name    = $row_customer['customer_name'];
 $customer_email   = $row_customer['customer_email'];
 $customer_pass    = $row_customer['customer_pass'];
 $customer_country = $row_customer['customer_country'];
 $customer_city    = $row_customer['customer_city'];
 $customer_contact = $row_customer['customer_contact'];
 $customer_adress  = $row_customer['customer_adress'];
 $customer_image   = $row_customer['customer_image'];
 

 ?>




<h3 align="center">
  Edit Your Account	
</h3>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Customer Name</label>
		<input type="text" class="form-control" name="c_name" value="<?php echo $customer_name; ?>">
	</div>

	<div class="form-group">
		<label for="">Customer Email</label>
		<input type="email" class="form-control" name="c_email" value="<?php echo $customer_email; ?>">
	</div>

	<div class="form-group">
		<label for="">Customer Country</label>
		<input type="text" class="form-control" name="c_country" value="<?php echo $customer_country; ?>">
	</div>

	<div class="form-group">
		<label for="">Customer City</label>
		<input type="text" class="form-control" name="c_city" value="<?php echo $customer_city; ?>">
	</div>

	<div class="form-group">
		<label for="">Customer Address</label>
		<input type="text" class="form-control" name="c_address" value="<?php echo $customer_adress; ?>">
	</div>

	<div class="form-group">
		<label for="">Customer Image</label>
		<input type="file" class="form-control" name="c_image" required>
		<img src="customer_images/<?php echo $customer_image;?>" alt="" height="100" width="100" class="img-responsive">
	</div>

	<div class="text-center">
		<button name="update" type="submit" class="btn btn-info">
			<i class="fa fa-user"></i> Update Now
		</button>
	</div>
</form>


<?php 
 
 if (isset($_POST['update'])) {
 	$update_id  = $customer_id;
 	$c_name     = $_POST['c_name'];
 	$c_email    = $_POST['c_email'];
 	$c_country  = $_POST['c_country'];
 	$c_city     = $_POST['c_city'];
 	$c_address  = $_POST['c_address'];

 	$c_image     = $_FILES['c_image']['name'];
 	$c_image_tmp = $_FILES['c_image']['tmp_name'];
 	move_uploaded_file($c_image_tmp, "customer_images/$c_image");


 	$update_customer  = "UPDATE  customers SET customer_name = '$c_name', customer_email = '$c_email', customer_country = '$c_country', customer_city = '$c_city',customer_adress = '$c_address', customer_image = '$c_image' WHERE customer_id = {$update_id}";
 	$run_customer     = mysqli_query($conn, $update_customer);
 	confirm($run_customer);

 	if ($run_customer) {
 		echo "<script>alert('Your account has been updtated, plaese  login again')</script>";
 		echo "<script>window.open('logout.php', '_self')</script>";
 	}


 }


 ?>
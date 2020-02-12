
<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<?php 
  if (!isset($_SESSION['customer_email'])) {
  	echo "<script>window.open('../checkout.php', '_self')</script>";
  } else {

 ?>

 <?php 
  if (isset($_GET['order_id'])) {
  	$order_id  = $_GET['order_id'];
  }

  ?>


<div id="content"> <!-- _Content starts -->
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>My Account</li>
			</ul>
		</div>

		<div class="col-md-3">

			<!-- Sidebar -->
			<?php include 'includes/sidebar.php'; ?>

		</div>

		<div class="col-md-9">
			<div class="box">  
				<h3 align="center">Please confirm your payement</h3>
			
				<form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Invoice No.:</label>
						<input type="text" class="form-control" name="invoice_no">
					</div>

					<div class="form-group">
						<label for="">Amount Sent:</label>
						<input type="text" class="form-control" name="amount_sent">
					</div>

					<div class="form-group">
						<label for="">Select Payement Mode: </label>
						<select name="payement_mode" id="" class="form-control">
							<option >Select Payement Mode</option>
							<option >Bank Code</option>
							<option >Western Union</option>
							<option >Pay pal</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Transaction/ Reference Id   </label>
						<input type="text" class="form-control" name="ref_no">
					</div>

					<div class="form-group">
						<label for="">Easy Paisa/Omni </label>
						<input type="text" class="form-control" name="code">
					</div>

					<div class="form-group">
						<label for="">Payement Date </label>
						<input type="text" class="form-control" name="date">
					</div>

					<div class="text-center">
						<button type="submit" name="confirm_payement" class="btn btn-info"><i class="fa fa-user"></i>
							Confirm Payement
						</button>
					</div>
				</form>

				<?php
				  if (isset($_POST['confirm_payement'])) {
				  	$update_id = $_GET['update_id'];
				  	$invoice_no = $_POST['invoice_no'];
				  	$amount_sent = $_POST['amount_sent'];
				  	$payement_mode = $_POST['payement_mode'];
				  	$ref_no         = $_POST['ref_no'];
				  	$code         = $_POST['code'];
				  	$date       = $_POST['date'];
				  	$complete = 'complete';

				  	$insert_payement = "INSERT INTO payements (invoice, amount, payement_mode, ref_no, code, payement_date) VALUES ('$invoice_no', '$amount_sent', '$payement_mode', '$ref_no', '$code', '$date')";
				  	$run_payement    = mysqli_query($conn, $insert_payement);
				  	confirm($run_payement);

				  	$update_customer_order = "UPDATE customer_orders SET status = '$complete' WHERE order_id = {$update_id}";
				  	$run_customer_order    = mysqli_query($conn, $update_customer_order);
				  	confirm($run_customer_order);

				  	$update_pending_order  = "UPDATE pending_orders SET order_status='$complete' WHERE order_id = {$update_id}";
				  	$run_pending_order     = mysqli_query($conn, $update_pending_order);
				  	confirm($run_pending_order);

				  	if ($run_pending_order) {
				  		echo "<script>alert('Your Payement has been received, order will be completed  within 24hrs')</script>";
				  		echo "<script>window.open('my_account.php?my_orders', '_self')</script>";
				  	}

				  }
				 ?>
			</div>
		</div>

	</div>

</div> <!--_Content ends -->




<!-- Footer --> 
<?php include 'includes/footer.php'; ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

<?php } ?>
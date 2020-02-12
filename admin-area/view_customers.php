<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Customers
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Customers
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Customer No</th>
								<th>Customer Name</th>
								<th>Customer Email</th>
								<th>Customer Image</th>
								<th>Customer Country</th>
								<th>Customer City</th>
								<th>Customer Phone</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							 $i = 0;
							 $get_customer = "SELECT * FROM `customers`";
							 $run_customer = mysqli_query($conn, $get_customer);
							 while($row_customer = mysqli_fetch_array($run_customer)) {
							 	$customer_id      = $row_customer['customer_id'];
							 	$customer_name    = $row_customer['customer_name'];
							 	$customer_email   = $row_customer['customer_email'];
							 	$customer_country = $row_customer['customer_country'];
							 	$customer_city    = $row_customer['customer_city'];
							 	$customer_contact = $row_customer['customer_contact'];
							 	$customer_adress  = $row_customer['customer_adress'];
							 	$customer_image   = $row_customer['customer_image'];
							 	$customer_id     = $row_customer['customer_id'];
							 	$i++;

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $customer_name; ?></td>
								<td><?php echo $customer_email; ?></td>
								<td><img src="../customer/customer_images/<?php echo $customer_image; ?>" height="60" width="60" alt="">
								</td>
								<td><?php echo $customer_country; ?></td>
								<td><?php echo $customer_city; ?></td>
								<td><?php echo $customer_contact; ?></td>
								<td>
									<a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_customer=<?php echo $customer_id; ?>"><i class="fas fa-times"></i></a>
								</td>
									
								
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


 <?php } ?>
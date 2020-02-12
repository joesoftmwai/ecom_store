<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard 
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_products; ?></div>
						<div>Products</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_products">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>


	<div class="col-lg-3 col-md-6">
		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-comments fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_customers; ?></div>
						<div>Customers</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_customers">
				<div class="panel-footer">
					<span class="pull-left">View Customers</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-yellow">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-shopping-cart fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_p_categories; ?></div>
						<div>Product Categories</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_p_cats">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="far fa-life-ring fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge"><?php echo $count_pending_orders; ?></div>
						<div>Orders</div>
					</div>
				</div>
			</div>
			<a href="index.php?view_orderss">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

</div>

<div class="row">
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> New Orders
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Order No:</th>
								<th>Customer Email</th>
								<th>Invoice No:</th>
								<th>Product Id:</th>
								<th>Product Qty:</th>
								<th>Product Size</th>
								<th>Status:</th>
							</tr>
						</thead>

						<tbody>
							<?php 

							 $i = 0;
							 $get_order = "SELECT * FROM pending_orders ORDER BY 1 DESC LIMIT 0,5";
							 $run_order =  mysqli_query($conn, $get_order);
							 while ($row_order = mysqli_fetch_array($run_order)) {
							 	$order_id    = $row_order['order_id'];
							 	$customer_id = $row_order['customer_id'];
							 	$invoice_no  = $row_order['invoice_no'];
							 	$product_id  = $row_order['product_id'];
							 	$qty  		 = $row_order['qty'];
							 	$size   	 = $row_order['size'];
							 	$order_status  = $row_order['order_status'];
							 	$i++;

							 	$get_customers  = "SELECT * FROM customers WHERE customer_id = $customer_id";
								$run_customers  = mysqli_query($conn, $get_customers);
								$row_customers  = mysqli_fetch_array($run_customers);
								$customer_email = $row_customers['customer_email'];

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $customer_email; ?></td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $product_id; ?></td>
								<td><?php echo $qty; ?></td>
								<td><?php echo $size; ?></td>
								<td><?php echo $order_status; ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>

				<div class="text-right">
					<a href="index.php?view_orders">
						View All Orders <i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel">
			<div class="panel-body">
				<div class="thumb-info mb-md">

					<img src="admin_images/<?php echo $admin_image; ?>"  alt="" class="img-rounded img-responsive">	
					
					<div class="thumb-info-title">
						<span class="thumb-info-inner"><?php echo $admin_name; ?></span>
						<span class="thumb-info-type"><?php echo $admin_job ; ?></span>
					</div>
					
				</div>

				<div class="mb-md">
					<div class="widget-content-expanded">
						<i class="fa fa-user"></i> <span>Email: <?php echo $admin_email; ?></span><br>
						<i class="fa fa-user"></i> <span>Country: <?php echo $admin_country; ?></span><br>
						<i class="fa fa-user"></i> <span>Contact: +254<?php echo $admin_contact; ?></span><br>
					</div>

					<hr class="dotted short">
					<h5 class="text-muted">About</h5>
					<p><?php echo $about; ?></p>
				</div>

			</div>
		</div>
	</div>

</div>

<?php } ?>
<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Orders
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Orders
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Order No</th>
								<th>Customer Email</th>
								<th>Invoice No</th>
								<th>Product Title</th>
								<th>Product Qty</th>
								<th>Product Size</th>
								<th>Order Date</th>
								<th>Amount</th>
								<th>Order Status</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							 $i = 0;
							 $get_orders = "SELECT * FROM `pending_orders`";
							 $run_orders = mysqli_query($conn, $get_orders);
							 while($row_orders = mysqli_fetch_array($run_orders)) {

							 	$order_id      = $row_orders['order_id'];
							 	$customer_id    = $row_orders['customer_id'];
							 	$invoice_no   = $row_orders['invoice_no'];
							 	$product_id = $row_orders['product_id'];
							 	$qty    = $row_orders['qty'];
							 	$size = $row_orders['size'];
							 	$order_status  = $row_orders['order_status'];

							 	$get_products = "SELECT * FROM products WHERE product_id = $product_id ";
							 	$run_products = mysqli_query($conn, $get_products);
							 	$row_products = mysqli_fetch_array($run_products); 
							 	$product_title = $row_products['product_title'];
				
							 	$i++;

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td>
									<?php 

									 $get_customer = "SELECT * FROM customers WHERE customer_id=$customer_id";
									 $run_customer = mysqli_query($conn, $get_customer);
									 $row_customer = mysqli_fetch_array($run_customer);
									 echo $customer_email = $row_customer['customer_email'];

									 ?>
								</td>
								<td><?php echo $invoice_no; ?></td>
								<td><?php echo $product_title; ?></td>
								<td><?php echo $qty; ?></td>
								<td><?php echo $size; ?></td>
								<td>
									<?php 
									 $get_customer_order = "SELECT * FROM customer_orders WHERE order_id = $order_id";
									 $run_customer_order = mysqli_query($conn, $get_customer_order);
									 $row_customer_order = mysqli_fetch_array($run_customer_order);
									 $order_date = $row_customer_order['order_date'];
									 $due_amount = $row_customer_order['due_amount'];
									 echo $order_date;
									 ?>	
								</td>
								<td><?php echo $due_amount; ?></td>
								<td><?php echo $order_status ; ?></td>
								<td>
									<a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_order=<?php echo $order_id ; ?>"><i class="fas fa-times"></i></a>
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
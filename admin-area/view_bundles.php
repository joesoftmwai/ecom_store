<?php
  
  if (!isset($_SESSION['admin_email'])) {
  	echo "window.open('login.php', '_self')";
  } else { 

 ?>


 <div class="row">
 	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fas fa-tachometer-alt"></i> Dashboard/ View Bundles
			</li>
		</ol> 
	</div>
 </div>


 <div class="row">
 	<div class="col-lg-12">
 		<div class="panel panel-default">
 			<div class="panel-heading">
 				<h3 class="panel-title">
 					<i class="far fa-money-bill-alt"></i> View Bundles
 				</h3>
 			</div>

 			<div class="panel-body">
 				<div class="table-responsive">
 					<table class="table table-hover table-striped">
 						<thead>
 							<tr>
 								<th>Bundle Id</th>
 								<th>Bundle Title</th>
 								<th>Bundle Image</th>
 								<th>Bundle Price</th>
 								<th>Bundle Sold</th>
 								<th>Bundle Keywords</th>
 								<th>Bundle Date</th>
 								<th>Actions</th>
 								
 							</tr>
 						</thead>

 						<tbody>
 							<?php 
 							  $i = 0;
 							  $get_products = "SELECT * FROM products WHERE status='bundle'";
 							  $run_products = mysqli_query($conn, $get_products);
 							  while($row_products = mysqli_fetch_array($run_products)) {

 							  	$product_id       = $row_products['product_id'];
 							  	$product_title    = $row_products['product_title'];
 							  	$product_img1     = $row_products['product_img1'];
 							  	$product_price    = $row_products['product_price'];
 							  	$product_id       = $row_products['product_id'];
 							  	$product_keywords = $row_products['product_keywords'];
 							  	$date       = substr($row_products['date'], 0, 11);
 							  	$i++;


 							  	$get_sold   = "SELECT * FROM pending_orders WHERE product_id = $product_id";
 							  	$run_sold   = mysqli_query($conn, $get_sold);
 							  	$count_sold = mysqli_num_rows($run_sold);

 							  
 							 ?>

 							<tr>
 								<td><?php echo $i; ?></td>
 								<td><?php echo $product_title; ?></td>
 								<td><img src="product_images/<?php echo $product_img1; ?>" width=60 height=60 alt=""></td>
 								<td><?php echo $product_price; ?></td>
 								<td><?php echo $count_sold; ?></td>
 								<td><?php echo $product_keywords; ?></td>
 								<td><?php echo $date; ?></td>
 								<td>

 									<div class="btn-group">
 										<a class="btn btn-warning btn-sm" href="index.php?edit_bundle=<?php echo $product_id; ?>"><i class="fas fa-pencil-alt"></i></a>
 										<a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_bundle=<?php echo $product_id; ?>"><i class="fas fa-times"></i></a>
 									</div>
 									

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
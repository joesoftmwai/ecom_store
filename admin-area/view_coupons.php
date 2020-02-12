<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Coupons
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Coupons
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Coupon Id</th>
								<th>Coupon Title</th>
								<th>Product Title</th>
								<th>Coupon Price</th>
								<th>Coupon Code</th>
								<th>Coupon Limit</th>
								<th>Coupon Used</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							 $i = 0;
							 $get_coupons = "SELECT * FROM coupons";
							 $run_coupon = mysqli_query($conn, $get_coupons);
							 while($row_coupon = mysqli_fetch_array($run_coupon)) {
							 	$coupon_id     = $row_coupon['coupon_id'];
							 	$product_id  = $row_coupon['product_id'];
							 	$coupon_title  = $row_coupon['coupon_title'];
							 	$coupon_price  = $row_coupon['coupon_price'];
							 	$coupon_code  = $row_coupon['coupon_code'];
							 	$coupon_limit  = $row_coupon['coupon_limit'];
							 	$coupon_used  = $row_coupon['coupon_used'];
							 	$i++;

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $coupon_title ; ?></td>
								<td>
									<?php 
									  $get_p_title = "SELECT * FROM products WHERE product_id='$product_id'";
									  $run_p_title = mysqli_query($conn, $get_p_title);
									  $row_p = mysqli_fetch_array($run_p_title);
									  echo $product_title = $row_p['product_title'];
									 ?>				 	
								 </td>
								<td><?php echo $coupon_price ; ?></td>
								<td><?php echo $coupon_code ; ?></td>
								<td><?php echo $coupon_limit; ?></td>
								<td><?php echo $coupon_used; ?></td>
								

								<td>
									<div class="btn-group">
 										<a class="btn btn-warning btn-sm" href="index.php?edit_coupon=<?php echo $coupon_id; ?>"><i class="fas fa-pencil-alt"></i></a>
 										<a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_coupon=<?php echo $coupon_id; ?>"><i class="fas fa-times"></i></a>
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

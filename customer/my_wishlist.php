<center> <!-- Center Starts -->
	<h1>My Wishlist</h1>
	<p class="lead">
		 Your all wislist products on one place
	</p>
</center> <!-- Center Ends -->

<hr>

<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Wishlist No.</th>
				<th>Wishlist Product</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			$customer_session = $_SESSION['customer_email'];
	 		$get_customer = "SELECT * FROM customers WHERE customer_email = '$customer_session'";
	 		$run_customer = mysqli_query($conn, $get_customer);
	 		$row_customer = mysqli_fetch_array($run_customer);
	 		$customer_id  = $row_customer['customer_id'];
	 		$i = 0;

			 $get_wishlist = "SELECT * FROM wishlist WHERE customer_id = '$customer_id'";
			 $run_wishlist = mysqli_query($conn, $get_wishlist);
			 while($row_wishlist = mysqli_fetch_array($run_wishlist)) {
			 	$wishlist_id   = $row_wishlist['wishlist_id'];
			 	$product_id    = $row_wishlist['product_id'];

			 	$get_products = "SELECT * FROM products WHERE product_id = '$product_id'";
			 	$run_products = mysqli_query($conn, $get_products);

			 	$row_product = mysqli_fetch_array($run_products);
			 	$product_title  = $row_product['product_title'];
			 	$product_url  = $row_product['product_url'];
			 	$product_img1  = $row_product['product_img1'];
			 	$i++;

			 ?>

			 <tr>
			 	<td width="100"><?php echo $i; ?></td>
			 	<td>
			 		<img src="../admin-area/product_images/<?php echo $product_img1; ?>" alt="" width="60" height="60">
			 		&nbsp; &nbsp; &nbsp;
			 		<a href="../<?php echo $product_url; ?>"><?php echo $product_title; ?></a>
			 	</td>
			 	<td>
			 		<a href="my_account.php?delete_wishlist=<?php echo $wishlist_id ;?>" class="btn btn-danger" onClick="javascript:return confirm('Are you sure you want to delete ?')"><i class="fa fa-times"></i> Delete</a>
			 	</td>
			 </tr>

			 <?php  } ?>
		</tbody>
	</table>
</div>
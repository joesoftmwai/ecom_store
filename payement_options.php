


<div class="box">

	<?php

	 $session_email = $_SESSION['customer_email'];

	 $select_customer = "SELECT * FROM customers WHERE customer_email = '$session_email'";
	 $run_customer    = mysqli_query($conn, $select_customer);

	 $row_customer    = mysqli_fetch_array($run_customer);
	 $customer_id     = $row_customer['customer_id'];


	 ?>



	<h1 class="text-center">Payement options for you</h1>
	<p class="lead text-center">
		<a href="order.php?c_id=<?php  echo $customer_id; ?>">Pay offline</a>
	</p>
	<center>
		<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
			<input type="hidden" name="business" value="johndoe@gmail.com">
			<input type="hidden" name="cmd" value="_cart">
			<input type="hidden" name="upload" value="1">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="return" value="https://localhost/ecom2/paypal_order.php?c_id=<?php echo $customer_id; ?>">
			<input type="hidden" name="cancel_return" value="http://localhost/ecom2/index.php">

			<?php 

			 $i = 0;

			 $ip_add   = getRealUserIp();
			 $get_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
			 $run_cart = mysqli_query($conn, $get_cart);

			 while($row_cart = mysqli_fetch_array($run_cart)) {
			 	$pro_id      = $row_cart['p_id'];
			 	$pro_qty     = $row_cart['qty'];
			 	$pro_price   = $row_cart['p_price'];
			 	$pro_size    = $row_cart['size'];

			 	$get_products = "SELECT * FROM products WHERE product_id = '$pro_id'";
			 	$run_products = mysqli_query($conn, $get_products);
			 	$row_products = mysqli_fetch_array($run_products);

			 	$product_title = $row_products['product_title'];
			 	$i++;


			 ?>

			 <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>">
			 <input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>">
			 <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>">
			 <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>">

			 <?php } ?>

			// <input type="image" name="submit" width="500" height="270" src="images/paypal2.png" class="img-responsive">
		</form>
	</center>
</div> 
<?php include '../includes/db.php'; ?>

<?php 


 function confirm($result) {
 	global $conn;
 	if (!$result) {
 		die('QUERY FAILED'. mysqli_error($conn));
 	}
 }

 
  function getRealUserIp() {
 	global $conn;

 	switch (true) {
 		case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
 		case (!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
 		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
 		default: return $_SERVER['REMOTE_ADDR'];
 	}
 }

 function items() {
 	global $conn;

 	$ip_add = getRealUserIp();

 	$get_items = "SELECT * FROM cart WHERE ip_add = '$ip_add' ";
 	$run_items = mysqli_query($conn, $get_items);

 	$count_items =  mysqli_num_rows($run_items);

 	echo $count_items;
 }


  function total_price() {
 	global $conn;

 	$ip_add  = getRealUserIp();
 	$total = 0;

 	$select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
 	$run_cart = mysqli_query($conn, $select_cart);
 	while($record = mysqli_fetch_array($run_cart)) {
 		$pro_id = $record['p_id'];
 		$pro_qty = $record['qty'];

 		$get_price = "SELECT * FROM products WHERE product_id = $pro_id";
 		$run_price = mysqli_query($conn, $get_price);

 		while($row_price = mysqli_fetch_array($run_price)) {
 			$sub_total = $row_price['product_price'] * $pro_qty;
 			$total += $sub_total;
 		}
 	}

 	echo $total;
 }

 ?>
<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>



<?php 

 if (isset($_GET['delete_product'])) {
 	$delete_id = $_GET['delete_product'];

 	$delete_product = "DELETE FROM products WHERE product_id = $delete_id";
 	$run_delete     =  mysqli_query($conn, $delete_product);

 	if ($run_delete) {
 		echo "<script>alert('Product deleted successsfully')</script>";
 		echo "<script>window.open('index.php?view_products', '_self')</script>";
 	} else {
 		echo "<script>window.open('index.php?view_products', '_self')</script>";
 	}
	
 }

 ?>

 <?php } ?>
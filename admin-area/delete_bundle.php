<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>



<?php 

 if (isset($_GET['delete_bundle'])) {
 	$delete_id = $_GET['delete_bundle'];

 	$delete_bundle = "DELETE FROM products WHERE product_id = $delete_id";
 	$run_delete     =  mysqli_query($conn, $delete_bundle);

 	$delete_bundle_relations = "DELETE FROM `bundle_product_relation` WHERE bundle_id = '$delete_id'";
 	$run_delete_bundle_relations = mysqli_query($conn, $delete_bundle_relations);


 	if ($run_delete || $run_delete_bundle_relations) {
 		echo "<script>alert('Bundle deleted successsfully')</script>";
 		echo "<script>window.open('index.php?view_products', '_self')</script>";
 	} else {
 		echo "<script>window.open('index.php?view_products', '_self')</script>";
 	}
	
 }

 ?>

 <?php } ?>
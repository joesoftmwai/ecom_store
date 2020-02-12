<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>



<?php 

 if (isset($_GET['delete_payement'])) {
 	$delete_id = $_GET['delete_payement'];

 	$delete_payement = "DELETE FROM payements WHERE payement_id = $delete_id";
 	$run_delete     =  mysqli_query($conn, $delete_payement);

 	if ($run_delete) {
 		echo "<script>alert('Payement deleted successsfully')</script>";
 		echo "<script>window.open('index.php?view_payements', '_self')</script>";
 	} else {
 		echo "<script>window.open('index.php?view_payements', '_self')</script>";
 	}
	
 }

 ?>

 <?php } ?>
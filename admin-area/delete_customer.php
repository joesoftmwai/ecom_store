<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <?php

  if (isset($_GET['delete_customer'])) {
 	$delete_id = $_GET['delete_customer'];

 	$delete_customer = "DELETE FROM customers WHERE customer_id = $delete_id";
 	$run_delete     =  mysqli_query($conn, $delete_customer);

 	if ($run_delete) {
 		echo "<script>alert('Customer deleted successsfully')</script>";
 		echo "<script>window.open('index.php?view_customers', '_self')</script>";
 	} else {
 		echo "<script>window.open('index.php?view_customers', '_self')</script>";
 	}
	
 } 
  ?>


 <?php } ?>
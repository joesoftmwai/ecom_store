<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <?php

  if (isset($_GET['delete_relation'])) {
 	$delete_id = $_GET['delete_relation'];

 	$delete_relation = "DELETE FROM bundle_product_relation WHERE rel_id = $delete_id";
 	$run_delete     =  mysqli_query($conn, $delete_relation);

 	if ($run_delete) {
 		echo "<script>alert('Bundle relation successsfully')</script>";
 		echo "<script>window.open('index.php?view_relations', '_self')</script>";
 	} else {
 		echo "<script>window.open('index.php?view_relations', '_self')</script>";
 	}
	
 } 
  ?>


 <?php } ?>
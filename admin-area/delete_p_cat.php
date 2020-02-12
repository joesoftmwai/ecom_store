<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <?php

  if (isset($_GET['delete_p_cat'])) {
 	$delete_id = $_GET['delete_p_cat'];

 	$delete_p_cat = "DELETE FROM products_category WHERE p_cat_id = $delete_id";
 	$run_delete     =  mysqli_query($conn, $delete_p_cat);

 	if ($run_delete) {
 		echo "<script>alert('Product Category deleted successsfully')</script>";
 		echo "<script>window.open('index.php?view_p_cats', '_self')</script>";
 	} else {
 		echo "<script>window.open('index.php?view_p_cats', '_self')</script>";
 	}
	
 } 
  ?>


 <?php } ?>
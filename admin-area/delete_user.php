<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <?php

  if (isset($_GET['delete_user'])) {
 	$delete_id = $_GET['delete_user'];

 	$delete_user = "DELETE FROM admins WHERE admin_id = $delete_id";
 	$run_delete     =  mysqli_query($conn, $delete_user);

 	if ($run_delete) {
 		echo "<script>alert('User deleted successsfully')</script>";
 		echo "<script>window.open('index.php?view_users', '_self')</script>";
 	} else {
 		echo "<script>window.open('index.php?view_users', '_self')</script>";
 	}
	
 } 
  ?>


 <?php } ?>
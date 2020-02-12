<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <?php

  if (isset($_GET['delete_term'])) {
 	$delete_id = $_GET['delete_term'];

 	$delete_term = "DELETE FROM terms WHERE term_id = $delete_id";
 	$run_delete     =  mysqli_query($conn, $delete_term);

 	if ($run_delete) {
 		echo "<script>alert('Term deleted successsfully')</script>";
 		echo "<script>window.open('index.php?view_terms', '_self')</script>";
 	} else {
 		echo "<script>window.open('index.php?view_terms', '_self')</script>";
 	}
	
 } 
  ?>


 <?php } ?>
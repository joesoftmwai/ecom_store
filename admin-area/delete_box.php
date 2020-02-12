<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <?php

  if (isset($_GET['delete_box'])) {
 	$delete_id = $_GET['delete_box'];

 	$delete_box = "DELETE FROM boxes_section WHERE box_id = $delete_id";
 	$run_delete     =  mysqli_query($conn, $delete_box);

 	if ($run_delete) {
 		echo "<script>alert('Box deleted successsfully')</script>";
 		echo "<script>window.open('index.php?view_boxes', '_self')</script>";
 	} else {
 		echo "<script>window.open('index.php?view_boxes', '_self')</script>";
 	}
	
 } 
  ?>


 <?php } ?>
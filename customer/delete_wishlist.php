<?php 

 if (isset($_GET['delete_wishlist'])) {
 	$delete_id = $_GET['delete_wishlist'];


 	$delete_wishlist = "DELETE FROM wishlist WHERE wishlist_id = '$delete_id'";
 	$run_delete = mysqli_query($conn, $delete_wishlist);

 	if ($run_delete) {
 		echo "<script>alert('Wishlist item deleted successfully')</script>";
 		echo "<script>window.open('my_account.php?my_wishlist', '_self')</script>";
 	}
 }


 ?>
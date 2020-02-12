<?php 
  session_start();
  include 'includes/db.php';

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <?php 

   $admin_session = $_SESSION['admin_email'];
   $get_admin  =  "SELECT * FROM admins WHERE admin_email='$admin_session'";
   $run_admin  =  mysqli_query($conn, $get_admin);
   $row_admin  =  mysqli_fetch_array($run_admin);

   $admin_id      =  $row_admin['admin_id'];
   $admin_name    =  $row_admin['admin_name'];
   $admin_email   =  $row_admin['admin_email'];
   $admin_image   =  $row_admin['admin_image'];
   $admin_contact =  $row_admin['admin_contact'];
   $admin_country =  $row_admin['admin_country'];
   $admin_job     =  $row_admin['admin_job'];
   $admin_about   =  $row_admin['admin_about'];



   $get_products = "SELECT * FROM products";
   $run_products = mysqli_query($conn, $get_products);
   $count_products = mysqli_num_rows($run_products);

   $get_customers  = "SELECT * FROM customers";
   $run_customers  = mysqli_query($conn, $get_customers);
   $count_customers = mysqli_num_rows($run_customers);

   $get_p_categories = "SELECT * FROM products_category";
   $run_p_categories = mysqli_query($conn, $get_p_categories);
   $count_p_categories = mysqli_num_rows($run_p_categories);

   $get_pending_orders = "SELECT * FROM pending_orders";
   $run_pending_orders = mysqli_query($conn, $get_pending_orders);
   $count_pending_orders = mysqli_num_rows($run_pending_orders);




  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="font-awesome/css/fontawesome-all.min.css">
</head>
<body>

	<div id="wrapper"> <!-- wrapper starts -->
		<?php include 'includes/sidebar.php'; ?>
		<div id="page-wrapper">
			<div class="container-fluid">

				<?php
				 if (isset($_GET['dashboard'])) {
				  	include 'dashboard.php';
				  } 

				  if (isset($_GET['insert_product'])) {
				  	include 'insert_product.php';
				  }

				  if (isset($_GET['view_products'])) {
				  	include 'view_products.php';
				  }

				  if (isset($_GET['delete_product'])) {
				  	include 'delete_product.php';
				  }

				  if (isset($_GET['edit_product'])) {
				  	include 'edit_product.php';
				  }

				  if (isset($_GET['insert_p_cat'])) {
				  	include 'insert_p_cart.php';
				  }

				  if (isset($_GET['view_p_cats'])) {
				  	include 'view_p_cats.php';
				  }

				  if (isset($_GET['edit_p_cat'])) {
				  	include 'edit_p_cat.php';
				  }

				  if (isset($_GET['delete_p_cat'])) {
				  	include 'delete_p_cat.php';
				  }

				  if (isset($_GET['insert_cat'])) {
				  	include 'insert_cat.php';
				  }

				  if (isset($_GET['view_cats'])) {
				  	include 'view_cats.php';
				  }

				  if (isset($_GET['delete_cat'])) {
				  	include 'delete_cat.php';
				  }

				  if (isset($_GET['edit_cat'])) {
				  	include 'edit_cat.php';
				  }

				  if (isset($_GET['insert_slide'])) {
				  	include 'insert_slide.php';
				  }

				  if (isset($_GET['view_slides'])) {
				  	include 'view_slides.php';
				  }

				  if (isset($_GET['delete_slide'])) {
				  	include 'delete_slide.php';
				  }


				  if (isset($_GET['edit_slide'])) {
				  	include 'edit_slide.php';
				  }

				  if (isset($_GET['view_customers'])) {
				  	include 'view_customers.php';
				  }

				  if (isset($_GET['delete_customer'])) {
				  	include 'delete_customer.php';
				  }

				  if (isset($_GET['view_orders'])) {
				  	include 'view_orders.php';
				  }

				  if (isset($_GET['delete_order'])) {
				  	include 'delete_order.php';
				  }

				  if (isset($_GET['view_payements'])) {
				  	include 'view_payements.php';
				  }

				  if (isset($_GET['delete_payement'])) {
				  	include 'delete_payement.php';
				  }


				  if (isset($_GET['insert_user'])) {
				  	include 'insert_user.php';
				  }

				  if (isset($_GET['view_users'])) {
				  	include 'view_users.php';
				  }

				  if (isset($_GET['delete_user'])) {
				  	include 'delete_user.php';
				  }

				  if (isset($_GET['user_profile'])) {
				  	include 'user_profile.php';
				  }


				  if (isset($_GET['insert_box'])) {
				  	include 'insert_box.php';
				  }

				  if (isset($_GET['view_boxes'])) {
				  	include 'view_boxes.php';
				  }

				  if (isset($_GET['delete_box'])) {
				  	include 'delete_box.php';
				  }

				  if (isset($_GET['edit_box'])) {
				  	include 'edit_box.php';
				  }


				  if (isset($_GET['insert_terms'])) {
				  	include 'insert_terms.php';
				  }

				  if (isset($_GET['view_terms'])) {
				  	include 'view_terms.php';
				  }

				  if (isset($_GET['edit_term'])) {
				  	include 'edit_term.php';
				  } 
				  if (isset($_GET['delete_term'])) {
				  	include 'delete_term.php';
				  }

				  if (isset($_GET['insert_manufacturer'])) {
				  	include 'insert_manufacturer.php';
				  }

				  if (isset($_GET['view_manufacturers'])) {
				  	include 'view_manufacturers.php';
				  }

				  if (isset($_GET['delete_manufacturer'])) {
				  	include 'delete_manufacturer.php';
				  }

				  if (isset($_GET['edit_manufacturer'])) {
				  	include 'edit_manufacturer.php';
				  }

				  if (isset($_GET['insert_coupon'])) {
				  	include 'insert_coupon.php';
				  }

				  if (isset($_GET['view_coupons'])) {
				  	include 'view_coupons.php';
				  }

				  if (isset($_GET['edit_coupon'])) {
				  	include 'edit_coupon.php';
				  }

				  if (isset($_GET['delete_coupon'])) {
				  	include 'delete_coupon.php';
				  }

				  if (isset($_GET['insert_bundle'])) {
				  	include 'insert_bundle.php';
				  }

				  if (isset($_GET['view_bundles'])) {
				  	include 'view_bundles.php';
				  }

				  if (isset($_GET['delete_bundle'])) {
				  	include 'delete_bundle.php';
				  }

				  if (isset($_GET['edit_bundle'])) {
				  	include 'edit_bundle.php';
				  }

				  if (isset($_GET['insert_relation'])) {
				  	include 'insert_relation.php';
				  }

				  if (isset($_GET['view_relations'])) {
				  	include 'view_relations.php';
				  }

				  if (isset($_GET['delete_relation'])) {
				  	include 'delete_relation.php';
				  }


				  if (isset($_GET['edit_relation'])) {
				  	include 'edit_relation.php';
				  }


				  
				  


				  

				  


				  


				  
				  

				  
				  


				  


				  

				  
				  

				  

				  

				  



				  


				  


				  
				  



				  

				  


				  

				  

				  
				  


				 ?>
				
			</div>
		</div>	
	</div> <!-- Wrapper ends -->

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

  	
  <?php } ?>

<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<?php 
  if (!isset($_SESSION['customer_email'])) {
  	echo "<script>window.open('../checkout.php', '_self')</script>";
  } else {

 ?>

<div id="content"> <!-- _Content starts -->
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>My Account</li>
			</ul>
		</div>

		<div class="col-md-3">

			<!-- Sidebar -->
			<?php include 'includes/sidebar.php'; ?>

		</div>

		<div class="col-md-9">
			<div class="box"> 

				<?php 
				  if(isset($_GET['my_orders'])) {
				  	include 'my_orders.php';
				  }

				  if (isset($_GET['pay_offline'])) {
				  	include 'pay_offline.php';
				  }

				  if (isset($_GET['edit_account'])) {
				  	include 'edit_account.php';
				  }

				  if (isset($_GET['my_wishlist'])) {
				  	include 'my_wishlist.php';
				  }

				  if (isset($_GET['change_pass'])) {
				  	include 'change_pass.php';
				  }

				  if (isset($_GET['delete_account'])) {
				  	include 'delete_account.php';
				  }

				  if (isset($_GET['delete_wishlist'])) {
				  	include 'delete_wishlist.php';
				  }

				 ?>

			</div>
		</div>

	</div>

</div> <!--_Content ends -->




<!-- Footer --> 
<?php include 'includes/footer.php'; ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

<?php   } ?>
<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">

		<?php 
		 $customer_session = $_SESSION['customer_email'];
		 $get_customer = "SELECT * FROM customers WHERE customer_email = '$customer_session'";
		 $run_customer = mysqli_query($conn, $get_customer);
		 $row_customer = mysqli_fetch_array($run_customer);

		 $customer_image = $row_customer['customer_image'];
		 $customer_name  = $row_customer['customer_name'];

		 echo '
		 	<center>
				<img src="customer_images/'.$customer_image.'" alt="" class="img-responsive">
			</center>
			<br>

			<h3 align="center" class="panel-title">Name: '. $customer_name .'</h3>
		 ';

		 ?>

	</div>
	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php if(isset($_GET['my_orders'])) { echo 'active'; }  ?>">
				<a href="my_account.php?my_orders"> <i class="fa fa-list"></i> My Oders</a>
			</li>
			
			<li class="<?php if(isset($_GET['pay_offline'])) { echo 'active'; }  ?>">
				<a href="my_account.php?pay_offline"><i class="fa fa-bolt"></i> Pay Offline</a>
			</li>
			<li class="<?php if(isset($_GET['edit_account'])) { echo 'active'; }  ?>">
				<a href="my_account.php?edit_account"><i class="fas fa-pencil-alt"></i> Edit Account</a>
			</li>
			<li class="<?php if(isset($_GET['change_pass'])) { echo 'active'; }  ?>">
				<a href="my_account.php?change_pass"><i class="fa fa-user"></i> Change Password</a>
			</li>
			<li class="<?php if(isset($_GET['my_wishlist'])) { echo 'active'; }  ?>">
				<a href="my_account.php?my_wishlist"><i class="fa fa-heart"></i> My Wishlist</a>
			</li>
			<li class="<?php if(isset($_GET['delete_account'])) { echo 'active'; }  ?>">
				<a href="my_account.php?delete_account"><i class="fas fa-trash-alt"></i> Delete Account</a>
			</li>
			<li>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
			</li>
		</ul>
	</div>

</div>


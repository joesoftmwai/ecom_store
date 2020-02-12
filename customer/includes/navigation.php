<nav class="navbar navbar-default" id="navbar"> <!-- Navbar starts -->
	<div class="container">
		<div class="navbar-header">
		<a href="../index.php" class="navbar-brand home">
			<span class="logo">Oshop</span>
		</a>

		

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
			<span class="sr-only">Toggle Navigation</span>
			<i class="fa fa-align-justify"></i>
		</button>

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
			<span class="sr-only">Toggle Search</span>
			<i class="fa fa-search"></i>
		</button>
		</div>

		<div class="navbar-collapse collapse" id="navigation">
			<div class="padding-nav">
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a href="../index.php">Home</a>
					</li>
					<li>
						<a href="../shop.php">Shop</a>
					</li>
					<li>
						<?php 
						  if (!isset($_SESSION['customer_email'])) {
						  	echo '<a href="../checkout.php">My Account</a>';
						  } else {
						  	echo '<a href="my_account.php?my_orders">My Account</a>';
						  }
						 ?>
					</li>
					<li>
						<a href="../cart.php">Shopping Cart</a>
					</li>
					<li>
						<a href="../about_us.php">About Us</a>
					</li>
					<li>
						<a href="../contact.php">Contact Us</a>
					</li>
				</ul>
			</div>

			<a href="../cart.php" class="btn btn-info navbar-btn right" id="cart-ml">
				<i class="fa fa-shopping-cart"></i>
				<span><?php echo items(); ?> items in cart</span>
			</a>

			<div class="navbar-collapse collapse right">
				<button class="btn btn-info navbar-btn navbar-right" type="button" data-toggle="collapse" data-target="#search">
					<span class="sr-only">Toggle Search</span>
					<i class="fa fa-search"></i>
				</button>
			</div>

		

			<div class="collapse clearfix" id="search">
			<form action="results.php" method="get" class="navbar-form">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="user_query" required="true">
					<span class="input-group-btn">
					<button type="submit" value="Search" name="search" class="btn btn-info">
						<i class="fa fa-search"></i>
					</button>
					</span>

				</div>
			</form>
			</div>
						
		</div>

	</div>
</nav><!-- Navbar ends -->

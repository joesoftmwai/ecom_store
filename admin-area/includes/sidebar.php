<?php
  
  if (!isset($_SESSION['admin_email'])) {
  	echo "window.open('login.php', '_self')";
  } else { 

 ?>

<nav class="navbar navbar-inverse navbar-fixed-top ">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
	</div>

	<ul class="nav navbar-right top-nav">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-user"></i>
				<?php echo $admin_name; ?> <b class="caret"></b>
			</a>

			<ul class="dropdown-menu">
				<li>
					<a href="index.php?user_profile=<?php echo $admin_id; ?>">
						<i class="fa fa-fw fa-user"></i>Profile
					</a>
				</li>
				<li>
					<a href="index.php?view_products">
						<i class="fa fa-fw fa-envelope"></i>Products
						<span class="badge"><?php echo $count_products; ?></span> 
					</a>
				</li>
				<li>
					<a href="index.php?view_customers">
						<i class="fa fa-cog"></i>Customer
						<span class="badge"><?php echo $count_customers; ?></span>
					</a>
				</li>
				<li>
					<a href="index.php?view_cat">
						<i class="fa fa-cog"></i>Products Categories
						<span class="badge"><?php echo $count_p_categories; ?></span>
					</a>
				</li>

				<li class="divider"></li>

				<li>
					<a href="logout.php">
						<i class="fa fa-fw fa-power-off"></i>Logout
					</a>
				</li>

			</ul>
		</li>
	</ul>

	<div class="collapse navbar-collapse navbar-ex1-collapse ">
		<ul class="nav navbar-nav side-nav">
			<li>
				<a href="index.php?dashboard">
					<i class="fas fa-tachometer-alt"></i>  Dashboard
				</a>
			</li>

			<li>
				<a href="#" data-toggle="collapse" data-target="#products">
					<i class="fa fa-fw fa-table"></i> Products
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="products" class="collapse">
					<li>
						<a href="index.php?insert_product"> Insert Products</a>
					</li>
					<li>
						<a href="index.php?view_products"> View Products</a>
					</li>

				</ul>

			</li>

			<li>
				<a href="#" data-toggle="collapse" data-target="#bundles">
					<i class="fa fa-fw fa-edit"></i> Bundles
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="bundles" class="collapse">
					<li>
						<a href="index.php?insert_bundle"> Insert Bundles</a>
					</li>
					<li>
						<a href="index.php?view_bundles"> View Bundles</a>
					</li>

				</ul>

			</li>

			<li>
				<a href="#" data-toggle="collapse" data-target="#relations">
					<i class="fa fa-fw fa-retweet"></i> Bundle Relations
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="relations" class="collapse">
					<li>
						<a href="index.php?insert_relation"> Insert Relation</a>
					</li>
					<li>
						<a href="index.php?view_relations"> View Relation</a>
					</li>

				</ul>

			</li>




			<li>
				<a href="#" data-toggle="collapse" data-target="#manufacturers">
					<i class="fa fa-fw fa-briefcase"></i> Manufacturers
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="manufacturers" class="collapse">
					<li>
						<a href="index.php?insert_manufacturer"> Insert Manufacturer</a>
					</li>
					<li>
						<a href="index.php?view_manufacturers"> View Manufacturers</a>
					</li>

				</ul>

			</li>





			

			<li>
				<a href="#" data-toggle="collapse" data-target="#p_cart">
					<i class="fas fa-pencil-alt"></i> Products Categories
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="p_cart" class="collapse">
					<li>
						<a href="index.php?insert_p_cat"> Insert Product Category</a>
					</li>
					<li>
						<a href="index.php?view_p_cats"> View Product Categories</a>
					</li>

				</ul>
			</li>



			<li>
				<a href="#" data-toggle="collapse" data-target="#cat">
					<i class="fas fa-arrows-alt-v"></i>  Categories
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="cat" class="collapse">
					<li>
						<a href="index.php?insert_cat"> Insert Categories</a>
					</li>
					<li>
						<a href="index.php?view_cats"> View Categoriess</a>
					</li>

				</ul>
			</li>

			<li>
				<a href="#" data-toggle="collapse" data-target="#boxes">
					<i class="fas fa-arrows-alt"></i>  Boxes Section
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="boxes" class="collapse">
					<li>
						<a href="index.php?insert_box"> Insert Box</a>
					</li>
					<li>
						<a href="index.php?view_boxes"> View Box</a>
					</li>

				</ul>
			</li>

			<li>
				<a href="#" data-toggle="collapse" data-target="#coupons">
					<i class="fas fa-arrows-alt-v"></i>  Coupons
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="coupons" class="collapse">
					<li>
						<a href="index.php?insert_coupon"> Insert Coupon</a>
					</li>
					<li>
						<a href="index.php?view_coupons"> View Coupon</a>
					</li>

				</ul>
			</li>





			<li>
				<a href="#" data-toggle="collapse" data-target="#slides">
					<i class="fa fa-fw fa-cog"></i> Slides
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="slides" class="collapse">
					<li>
						<a href="index.php?insert_slide"> Insert Slide</a>
					</li>
					<li>
						<a href="index.php?view_slides"> View Slides </a>
					</li>
				</ul>
			</li>

			<li>
				<a href="#" data-toggle="collapse" data-target="#terms">
					<i class="fa fa-fw fa-table"></i> Terms and conditions
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="terms" class="collapse">
					<li>
						<a href="index.php?insert_terms"> Insert Terms</a>
					</li>
					<li>
						<a href="index.php?view_terms"> View Terms </a>
					</li>
				</ul>
			</li>

			<li>
				<a href="index.php?view_customers">
					<i class="fa fa-fw fa-edit"></i> View Customers
				</a>
			</li>

			<li>
				<a href="index.php?view_orders">
					<i class="fa fa-fw fa-list"></i> View Orders
				</a>
			</li>

			<li>
				<a href="index.php?view_payements">
					<i class="fas fa-pencil-alt"></i> View Payements
				</a>
			</li>


			<li>
				<a href="#" data-toggle="collapse" data-target="#users">
					<i class="fa fa-fw fa-cog"></i> Users info
					<i class="fa fa-fw fa-caret-down"></i>
				</a>

				<ul id="users" class="collapse">
					<li>
						<a href="index.php?insert_user"> Insert User</a>
					</li>
					<li>
						<a href="index.php?view_users"> View Users </a>
					</li>
					<li>
						<a href="index.php?user_profile=<?php echo $admin_id ; ?>"> Edit Profile </a>
					</li>
				</ul>
			</li>

			<li>
				<a href="logout.php">
					<i class="fa fa-fw fa-power-off"></i> Logout
				</a>
			</li>

		</ul>
	</div>

</nav> 

<?php } ?>
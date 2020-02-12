
<div id="footer"><!-- Footer starts -->
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6">

				<h4>Pagess</h4>
				<ul>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href="checkout.php">My Account</a></li>
				</ul>

				<hr>

				<h4>User Section</h4>
				<ul>
					<li>
						<?php 
						 if (!isset($_SESSION['customer_email'])) {
						 	echo '<a href="checkout.php">Login</a>';
						 } else {
						 	echo '<a href="customer/my_account.php?my_orders">My Account</a>';
						 }
						 ?> 
					</li>
					<li><a href="customer_register.php">Register</a></li>
					<li><a href="terms.php">Terms and condition</a></li>
				</ul>

				<hr class="hidden-md hidden-lg hidden-sm">

			</div>

			<div class="col-md-3 col-md-6">
				<h4>Top Product Categories</h4>
				<ul>
				<?php 
				 $get_p_cats = "SELECT * FROM products_category";
				 $run_p_cats = mysqli_query($conn, $get_p_cats);
				 while($rows = mysqli_fetch_array($run_p_cats)) {
				 	$p_cat_id = $rows['p_cat_id'];
				 	$p_cat_title = $rows['p_cat_title'];

				 	echo '

					<li><a href="shop.php?p_cat='.$p_cat_id.'">'.$p_cat_title.'</a></li>

				 	';
				 }
				 ?>

				</ul>
				
				<hr class="hidden-md hidden-lg">
			</div>

			<div class="col-md-3 colsm-6">
				<h4>Where to find us</h4>

				<p>
					<strong>Oshop ltd</strong>
					<br>Cabral Street
					<br>Dominion House, d5
					<br>+254 7394 849 832
					<br>mj@joesoft.com
					<br>
					<strong>Joesoft</strong>
				</p>

				<a href="contac.php">Go to Contact us page</a>

				<hr class="hidden-md hidden-lg">
			</div>

			<div class="col-md-3 col-sm-6">
				<h4>Get the news</h4>
				<p class="text-muted">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
				</p>

				<form action="" method="post">
					<div class="input-group">
						<input type="text" class="form-control" name="email">
						<span class="input-group-btn">
							<input type="submit" value="subscribe" class="btn btn-default">
						</span>
					</div>
				</form>
				<hr>

				<h4>Stay in touch</h4>

				<p class="social">
					<a href="#"><i class="fab fa-facebook"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-instagram"></i></a>
					<a href="#"><i class="fab fa-google-plus"></i></a>
					<a href="#"><i class="fas fa-envelope"></i></i></a>
					<a href="#"><i class="fab fa-whatsapp"></i></a>
				</p>

			</div>
		</div>
	</div>
</div><!-- Footer ends -->

<div id="copyright"> <!-- Copyright starts -->
	<div class="container">
		<div class="col-md-6">
			<p class="pull-left"> &copy; 2019 Joesoft </p>    
		</div>

		<div class="col-md-6">
			<p class="pull-right">
				Template by <a href="#">mj@Joesoft.com</a>
			</p>
		</div>
	</div>
</div> <!-- Copyright ends -->
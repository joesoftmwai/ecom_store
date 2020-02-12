<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>


<div id="content"> <!-- _Content starts -->
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>About Us</li>
			</ul>
		</div>


		<div class="col-md-12">
			<div class="box">
				
				<?php

				 $get_about_us  = "SELECT * FROM about_us";
				 $run_about_us  = mysqli_query($conn, $get_about_us);
				 $row_about_us  = mysqli_fetch_array($run_about_us);
				 $about_id  = $row_about_us['about_id'];
				 $about_heading  = $row_about_us['about_heading'];
				 $about_short_desc  = $row_about_us['about_short_desc'];
				 $about_desc  = $row_about_us['about_desc'];

				  ?>

				  <h3><?php echo $about_heading; ?></h3>

				  <p class="lead">
				  	<?php echo $about_short_desc; ?>
				  </p>

				  <p><?php echo $about_desc; ?></p>

				
			</div>
		</div>
	</div>
</div> <!-- Content Ends -->


<!-- Footer --> 
<?php include 'includes/footer.php'; ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>



<div class="container" id="slider"><!-- Container starts -->
	
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<div class="carousel-inner">

		<?php 
		 $get_slides = "SELECT * FROM slider LIMIT 0,1";
		 $run_slides = mysqli_query($conn, $get_slides);

		 while($rows = mysqli_fetch_array($run_slides)) {
		 	$slide_name = $rows['slide_name'];
		 	$slide_image = $rows['slide_image'];
		 	$slide_url   = $rows['slide_url'];

		 	echo "

		 	<div class='item active'>
		 	<a href='".$slide_url."'><img src='admin-area/slides_images/$slide_image' class='img-responsive center-block'></a>
		 	</div>

		 	";
		 }
		 ?>

		 <?php 
		  $get_slides = "SELECT * FROM slider LIMIT 1,3";
		  $run_slides = mysqli_query($conn, $get_slides);
		  While($rows = mysqli_fetch_array($run_slides)) {
		  	$slide_name = $rows['slide_name'];
		 	$slide_image = $rows['slide_image'];
		 	$slide_url   = $rows['slide_url'];

		 	echo "

		 	<div class='item'>
		 	<a href='".$slide_url."'><img src='admin-area/slides_images/$slide_image' class='img-responsive center-block'></a>
		 	</div>

		 	";
		  }
		  ?>

		 </div>

		 

<!-- 		<div class="carousel-inner">
			<div class="item active">
				<img src="admin-area/slides_images/1.jpg" alt="" class="img-responsive center-block">
			</div>
			<div class="item">
				<img src="admin-area/slides_images/2.png" alt="" class="iimg-responsive center-block">
			</div>
			<div class="item">
				<img src="admin-area/slides_images/3.png" alt="" class="iimg-responsive center-block">
			</div>
			<div class="item">
				<img src="admin-area/slides_images/4.jpg" alt="" class="iimg-responsive center-block">
			</div>
	
		</div>
 -->
		<a href="#myCarousel" class="left carousel-control" data-slide="prev">	  <span class=""></span>
			<span class="sr-only">Previous</span> 
		</a>

		<a href="#myCarousel" class="right carousel-control" data-slide="next">
			<span class=""></i></span>
			<span class="sr-only">Next</span>
		</a>

	</div>
</div><!-- container ends -->

<div id="advantages"> <!-- Advantages Starts -->
	<div class="container">
		<div class="row same-height-row">

			<?php 
              $get_boxes  = "SELECT * FROM boxes_section";
              $run_boxes  = mysqli_query($conn, $get_boxes);
              while($row_boxes = mysqli_fetch_array($run_boxes)) {
              	$box_id  = $row_boxes['box_id'];
              	$box_title = $row_boxes['box_title'];
              	$box_desc  = $row_boxes['box_desc'];
              
			 ?>

			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-heart"></i>
					</div>

					<h3><a href="#"> <?php echo $box_title; ?></a></h3>
					<p><?php echo $box_desc; ?></p>
				</div>
			</div>

			<!-- <div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-tags"></i>
					</div>

					<h3><a href="#"><?php //echo $box_title; ?> </a></h3>
					<p><?php //echo $box_desc; ?></p>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="box same-height">
					<div class="icon">
						<i class="fa fa-thumbs-up"></i>
					</div>

					<h3><a href="#"><?php //echo $box_title; ?></a></h3>
					<p><?php //echo $box_desc; ?></p>
				</div>
			</div>
 -->
			<?php } ?>
		</div>
	</div>
</div><!-- Advantages Ends -->


<div id="hot"><!-- Hot starts -->
	<div class="box">
		<div class="container">
			<div class="col-md-12">
				<h2>Latest this week</h2>
			</div>
		</div>
	</div>
</div><!-- Hot ends -->

<div id="content" class="container"><!-- Content Starts -->
	<div class="row">

<!-- 		<div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="details.php"> 
					<img src="admin-area/product_images/1.png" alt="" class="img-responsive">
				</a>

				<div class="text">
					<h3><a href="details.php">Arsenal 2019/20 Home Jersey</a></h3>
					<p class="price">$50</p>

					<p class="buttons">
						<a href="details.php" class="btn btn-default">View Details</a>
						<a href="details.php" class="btn btn-info">
							<i class="fa fa-shopping-cart"></i>Add to cart
						</a>
					</p>
				</div>
			</div>
		</div> -->

		<!-- Get Products -->

		<?php getProducts(); ?>


		

		
		
	</div>
</div> <!-- Content Ends -->


<!-- Footer --> 
<?php include 'includes/footer.php'; ?>




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
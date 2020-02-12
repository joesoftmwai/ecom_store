<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>

<div id="content">
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>Terms and condition</li>
			</ul>
		</div>

		<div class="col-md-3">
			<div class="box">
				<ul class="nav nav-pills nav-stacked">
					<?php 
					 $get_terms = "SELECT * FROM terms LIMIT 0,1";
					 $run_terms = mysqli_query($conn, $get_terms);
					 while ($row_terms = mysqli_fetch_array($run_terms)) {
					 	$term_title = $row_terms['term_title'];
					 	$term_link = $row_terms['term_link'];
					 	$term_title = $row_terms['term_title'];
					 	$term_title = $row_terms['term_title'];
					
					 ?>

					 <li class="active">
					 	<a data-toggle="pill" href="#<?php echo $term_link; ?>"><?php echo $term_title; ?></a>
					 </li>

					 <?php  } ?>

					 <?php 
					  $count_terms = "SELECT * FROM terms";
					  $run_count = mysqli_query($conn, $count_terms);
					  $count  = mysqli_num_rows($run_count);

					  $get_terms = "SELECT * FROM terms LIMIT 1,$count";
					  $run_terms = mysqli_query($conn, $get_terms);
					  while($row_terms = mysqli_fetch_array($run_terms)) {
					  	$term_link   = $row_terms['term_link'];
					  	$term_title  = $row_terms['term_title'];
					  ?>

					  <li>
					  	<a href="#<?php echo $term_link; ?>" data-toggle="pill"><?php echo $term_title; ?></a>
					  </li>

					   <?php  } ?>
				</ul>
			</div>
		</div>


		<div class="col-md-9">
			<div class="box">
				<div class="tab-content">
					
					<?php 
					$get_terms = "SELECT * FROM terms LIMIT 0,1";
					$run_terms = mysqli_query($conn, $get_terms);
					while ($row_terms = mysqli_fetch_array($run_terms)) {
						$term_link  = $row_terms['term_link'];
						$term_title = $row_terms['term_title'];
						$term_desc = $row_terms['term_desc'];
					
					 ?>

					 <div id="<?php echo $term_link;?>" class="tab-pane fade in active">
					 	<h1><?php echo $term_title; ?></h1>
					 	<p><?php echo $term_desc; ?></p>
					 </div>

					 <?php } ?>


					 <?php 
					  $count_terms  = "SELECT * FROM terms";
					  $run_count    = mysqli_query($conn, $count_terms);
					  $count   = mysqli_num_rows($run_count);

					  $get_terms = "SELECT * FROM terms LIMIT 1,$count";
					  $run_terms = mysqli_query($conn, $get_terms);
					  while($row_terms = mysqli_fetch_array($run_terms)) {
					  	$term_link  = $row_terms['term_link'];
					  	$term_title = $row_terms['term_title'];
					  	$term_desc  = $row_terms['term_desc'];
					  
					  ?>

					   <div id="<?php echo $term_link; ?>" class="tab-pane fade">
					   	 <h1><?php echo $term_title; ?></h1>
					   	 <p><?php echo $term_desc; ?></p>
					   </div>

					  <?php } ?>


						


				
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Footer --> 
<?php include 'includes/footer.php'; ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>

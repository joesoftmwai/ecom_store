<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Slides
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Slides
				</h3>
			</div>

			<div class="panel-body">
				<?php 

				 $get_slides = "SELECT * FROM slider";
				 $run_slides = mysqli_query($conn, $get_slides);
				 while($row_slides = mysqli_fetch_array($run_slides)) {
				 	
				 	$slide_id    = $row_slides['slide_id'];
				 	$slide_name  = $row_slides['slide_name'];
				 	$slide_image = $row_slides['slide_image'];
		
				 ?>

				 <div class="col-lg-3 col-md-3">
				 	<div class="panel panel-primary">
				 		<div class="panel-heading">
				 			<h3 class="panel-title" align="center">
				 				<?php echo $slide_name; ?>
				 			</h3>
				 			</div>
				 			<div class="panel-body">
				 				<img src="slides_images/<?php echo $slide_image; ?>" alt="" class="img-responsive">
				 			</div>
				 			<div class="panel-footer">
				 				<center>
				 					<a class="pull-left" href="index.php?edit_slide=<?php echo $slide_id; ?>"><i class="fas fa-pencil-alt"></i> Edit
				 					</a>

 									<a class="pull-right" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_slide=<?php echo $slide_id; ?>"><i class="fas fa-times"></i>   Delete
 									</a>

 										<div class="clearfix"></div>
				 				</center>
				 			</div>
				 		
				 	</div>
				 </div>



				<?php } ?>
			</div>
		</div>
	</div>
</div>


 <?php } ?>
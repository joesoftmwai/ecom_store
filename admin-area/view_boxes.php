<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Boxes
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Boxes
				</h3>
			</div>

			<div class="panel-body">
				<?php 

				  $get_boxes = "SELECT * FROM boxes_section";
				  $run_boxes  = mysqli_query($conn, $get_boxes);

				  while($row_boxes= mysqli_fetch_array($run_boxes)) {
				  	$box_id = $row_boxes['box_id'];  
				  	$box_title = $row_boxes['box_title'];
				  	$box_desc = $row_boxes['box_desc']; 

				 ?>

				 <div class="col-lg-4 col-md-4">
				 	<div class="panel panel-primary">
				 		<div class="panel-heading">
				 			<h3 class="panel-title" align="center">
				 				<?php echo $box_title; ?>
				 			</h3>
				 		</div>

				 		<div class="panel-body">
				 			<?php echo $box_desc; ?>
				 		</div>
				 		<div class="panel-footer">
			 				<center>
			 					<a class="pull-left" href="index.php?edit_box=<?php echo $box_id; ?>"><i class="fas fa-pencil-alt"></i> Edit
			 					</a>

									<a class="pull-right" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_box=<?php echo $box_id; ?>"><i class="fas fa-times"></i>   Delete
									</a>

										<div class="clearfix"></div>
			 				</center>
				 		</div>
				 	</div>
				 </div>

				 <?php  } ?>
			</div>
			
		</div>
	</div>
</div>


 <?php } ?>
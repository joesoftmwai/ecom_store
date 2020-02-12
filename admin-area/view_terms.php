<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Terms
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Terms
				</h3>
			</div>

			<div class="panel-body">
				<?php 

				  $get_terms = "SELECT * FROM terms";
				  $run_terms  = mysqli_query($conn, $get_terms);

				  while($row_terms= mysqli_fetch_array($run_terms)) {
				  	$term_id = $row_terms['term_id'];  
				  	$term_title = $row_terms['term_title'];
				  	$term_desc = substr($row_terms['term_desc'], 0,300); 

				 ?>

				 <div class="col-lg-4 col-md-4">
				 	<div class="panel panel-primary">
				 		<div class="panel-heading">
				 			<h3 class="panel-title" align="center">
				 				<?php echo $term_title; ?>
				 			</h3>
				 		</div>

				 		<div class="panel-body">
				 			<?php echo $term_desc; ?>
				 		</div>
				 		<div class="panel-footer">
			 				<center>
			 					<a class="pull-left" href="index.php?edit_term=<?php echo $term_id; ?>"><i class="fas fa-pencil-alt"></i> Edit
			 					</a>

									<a class="pull-right" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_term=<?php echo $term_id; ?>"><i class="fas fa-times"></i>   Delete
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
<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Relations
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Relations
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Relation Id</th>
								<th>Relation Title</th>
								<th>Relation Product</th>
								<th>Relation Bundle</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							 $i = 0;
							 $get_relations = "SELECT * FROM `bundle_product_relation`";
							 $run_relation = mysqli_query($conn, $get_relations);
							 while($row_relation = mysqli_fetch_array($run_relation)) {
							 	$rel_id     = $row_relation['rel_id'];
							 	$rel_title  = $row_relation['rel_title'];
							 	$product_id  = $row_relation['product_id'];
							 	$bundle_id  = $row_relation['bundle_id'];
							 	$i++;

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $rel_title ; ?></td>
								<td>
									<?php 
									  $get_p_title = "SELECT * FROM products WHERE product_id='$product_id'";
									  $run_p_title = mysqli_query($conn, $get_p_title);
									  $row_p = mysqli_fetch_array($run_p_title);
									  echo $product_title = $row_p['product_title'];
									 ?>				 	
								 </td>
								 <td>
									<?php 
									  $get_bundle = "SELECT * FROM products WHERE product_id='$bundle_id'";
									  $run_bundle = mysqli_query($conn, $get_bundle);
									  $row_bundle = mysqli_fetch_array($run_bundle);
									  echo $bundle_title = $row_bundle['product_title'];
									 ?>				 	
								 </td>
								

								<td>
									<div class="btn-group">
 										<a class="btn btn-warning btn-sm" href="index.php?edit_relation=<?php echo $rel_id; ?>"><i class="fas fa-pencil-alt"></i></a>
 										<a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_relation=<?php echo $rel_id; ?>"><i class="fas fa-times"></i></a>
 									</div>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>
</div>


 <?php } ?>

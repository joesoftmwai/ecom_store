<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Product Categories
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Product Categories
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Product Category Image</th>
								<th>Product Category Title</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							 $i = 0;
							 $get_p_cat = "SELECT * FROM products_category";
							 $run_p_cat = mysqli_query($conn, $get_p_cat);
							 while($row_p_cat = mysqli_fetch_array($run_p_cat)) {
							 	$p_cat_id     = $row_p_cat['p_cat_id'];
							 	$p_cat_title  = $row_p_cat['p_cat_title'];
							 	$p_cat_top    = $row_p_cat['p_cat_top'];
							 	$p_cat_image  = $row_p_cat['p_cat_image'];
							 	$i++;

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><img src="other_images/<?php echo $p_cat_image; ?>" alt="" width="50" height="50"></td>
								<td><?php echo $p_cat_title; ?></td>
								<td><?php echo $p_cat_top; ?></td>
								<td>
									<div class="btn-group">
 										<a class="btn btn-warning btn-sm" href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>"><i class="fas fa-pencil-alt"></i></a>
 										<a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>"><i class="fas fa-times"></i></a>
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
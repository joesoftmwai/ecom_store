<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Categories
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Categories
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Category Image</th>
								<th>Category Title</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							 $i = 0;
							 $get_cat = "SELECT * FROM categories";
							 $run_cat = mysqli_query($conn, $get_cat);
							 while($row_cat = mysqli_fetch_array($run_cat)) {
							 	$cat_id     = $row_cat['cat_id'];
							 	$cat_image  = $row_cat['cat_image'];
							 	$cat_title  = $row_cat['cat_title'];
							 	$i++;

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><img src="other_images/<?php echo $cat_image; ?>" alt="" width="50" height="50"></td>
								<td><?php echo $cat_title; ?></td>
								<td>
									<div class="btn-group">
 										<a class="btn btn-warning btn-sm" href="index.php?edit_cat=<?php echo $cat_id; ?>"><i class="fas fa-pencil-alt"></i></a>
 										<a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_cat=<?php echo $cat_id; ?>"><i class="fas fa-times"></i></a>
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
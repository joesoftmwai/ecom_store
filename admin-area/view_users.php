<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Users
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Users
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>User Name</th>
								<th>User Email</th>
								<th>User Image</th>
								<th>User Country</th>
								<th>User Job</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							 $i = 0;
							 $get_admins = "SELECT * FROM admins";
							 $run_admins = mysqli_query($conn, $get_admins);
							 while($row_admins = mysqli_fetch_array($run_admins)) {
							 	$admin_id      = $row_admins['admin_id'];
							 	$admin_name    = $row_admins['admin_name'];
							 	$admin_email   = $row_admins['admin_email'];
							 	$admin_image   = $row_admins['admin_image'];
							 	$admin_country = $row_admins['admin_country'];
							 	$admin_job     = $row_admins['admin_job'];
							 	$i++;

							
							 ?>

							 <tr>
							 	<td><?php echo $i; ?></td>
							 	<td><?php echo $admin_name; ?></td>
							 	<td><?php echo $admin_email; ?></td>
							 	<td><img src="admin_images/<?php echo $admin_image; ?>" width=60 height=60 alt=""></td>
							 	<td><?php echo $admin_country; ?></td>
							 	<td><?php echo $admin_job; ?></td>
							 	<td>
							 		<div class="btn-group">
							 			<a class="btn btn-warning btn-sm" href="index.php?user_profile=<?php echo $admin_id; ?>"><i class="fas fa-pencil-alt"></i></a>
							 			
							 		   <a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_user=<?php echo $admin_id; ?>"><i class="fas fa-times"></i></a>
							 		</div>
							 	</td>
							 </tr>


							 <?php  } ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


 <?php } ?>
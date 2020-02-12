<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Manufacturers
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Manufacturers
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Manufacturer Id</th>
								<th>Manufacturer Name</th>
								<th>Top Manufacture</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>

							<?php 

							 $i = 0;

							 $get_manufacturer = "SELECT * FROM manufacturers";
							 $run_manufacturer = mysqli_query($conn, $get_manufacturer);
							while($rows = mysqli_fetch_array($run_manufacturer)) {
								$manufacturer_id = $rows['manufacturer_id'];
								$manufacturer_title = $rows['manufacturer_title'];
								$manufacturer_top = $rows['manufacturer_top'];
								$i++;

							 ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $manufacturer_title; ?></td>
								<td><?php echo $manufacturer_top; ?></td>
								<td>
									<div class="btn-group">
 										<a class="btn btn-warning btn-sm" href="index.php?edit_manufacturer=<?php echo $manufacturer_id; ?>"><i class="fas fa-pencil-alt"></i></a>
 										<a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_manufacturer=<?php echo $manufacturer_id; ?>"><i class="fas fa-times"></i></a>
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
<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / View Payements
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> View Payements
				</h3>
			</div>

			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Payement No</th>
								<th>Invoice No</th>
								<th>Amount Paid</th>
								<th>Payement Method</th>
								<th>Reference No</th>
								<th>Payement Code</th>
								<th>Payement date</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							<?php 

							$i = 0;
							 $get_payements = "SELECT * FROM payements";
							 $run_payements = mysqli_query($conn, $get_payements);
							 while($row_payements = mysqli_fetch_array($run_payements)) {
							 	$payement_id   =   $row_payements['payement_id'];
							 	$invoice   =   $row_payements['invoice'];
							 	$amount   =   $row_payements['amount'];
							 	$payement_mode   =   $row_payements['payement_mode'];
							 	$ref_no   =   $row_payements['ref_no'];
							 	$code   =   $row_payements['code'];
							 	$payement_date   =   $row_payements['payement_date'];
							 	$i++;
							 	
							 ?>

							 <tr>
							 	<td><?php echo $i; ?></td>
							 	<td><?php echo $invoice; ?></td>
							 	<td><?php echo $amount; ?></td>
							 	<td><?php echo $payement_mode; ?></td>
							 	<td><?php echo $ref_no; ?></td>
							 	<td><?php echo $code; ?></td>
							 	<td><?php echo $payement_date; ?></td>
							 	<td>
							 		<a class="btn btn-danger btn-sm" onClick="javascript:return confirm('Are you sure you want to delete ?')" href="index.php?delete_payement=<?php echo $payement_id ; ?>"><i class="fas fa-times"></i></a>
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
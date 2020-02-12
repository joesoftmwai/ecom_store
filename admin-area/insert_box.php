<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Insert Box
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Insert Box
				</h3>
			</div>

			<div class="panel-body">

				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-3 control-label">Box Title</label>
						<div class="col-md-6">
							<input type="text" name="box_title" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Box Description</label>
						<div class="col-md-6">
							<textarea name="box_desc" id="" cols="30" rows="5" class="form-control"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Submit" class="btn btn-primary form-control">
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>


<?php 

if (isset($_POST['submit'])) {
	$box_title = $_POST['box_title'];
	$box_desc  = $_POST['box_desc'];
	

	$insert_box = "INSERT INTO boxes_section(box_title, box_desc) VALUES ('$box_title', '$box_desc')";
	$run_insert = mysqli_query($conn, $insert_box);

	if ($insert_box) {
		echo "<script>alert('New box added successfully')</script>";
		echo "<script>window.open('index.php?view_boxes', '_self')</script>";
	}
}
 ?>

<?php } ?>
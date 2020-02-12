<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>



 <?php 

  if (isset($_GET['edit_box'])) {
  	$edit_id  = $_GET['edit_box'];

  	$edit_box = "SELECT * FROM boxes_section WHERE box_id = $edit_id";
  	$run_edit    = mysqli_query($conn, $edit_box);
  	$row_slide   = mysqli_fetch_array($run_edit);
  	
  	$box_id    = $row_slide['box_id'];
  	$box_title  = $row_slide['box_title'];
  	$box_desc = $row_slide['box_desc'];

  }

  ?>




 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Edit Box
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit Box
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-3 control-label">Box Title</label>
						<div class="col-md-6">
							<input type="text" name="box_title" class="form-control" value="<?php echo isset($box_title) ? $box_title : '' ;?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Box Description</label>
						<div class="col-md-6">
							<textarea name="box_desc" id="" cols="30" rows="5" class="form-control">
								<?php echo isset($box_desc) ? $box_desc : ''; ?>
							</textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" value="Update" class="btn btn-primary form-control">
						</div>
					</div>
				</form>

		</div>
	</div>
</div>

<?php 

if (isset($_POST['submit'])) {
	$box_title = $_POST['box_title'];
	$box_desc  = $_POST['box_desc'];
	

	$insert_box = "UPDATE boxes_section SET box_title = '$box_title', box_desc='$box_desc' WHERE box_id = $edit_id";
	$run_insert = mysqli_query($conn, $insert_box);

	if ($insert_box) {
		echo "<script>alert('Box updated successfully')</script>";
		echo "<script>window.open('index.php?view_boxes', '_self')</script>";
	}
}
 ?>



 <?php } ?>
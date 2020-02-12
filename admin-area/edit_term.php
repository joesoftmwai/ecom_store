<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>



 <?php 

  if (isset($_GET['edit_term'])) {
  	$edit_id  = $_GET['edit_term'];

  	$edit_term = "SELECT * FROM terms WHERE term_id = $edit_id";
  	$run_edit    = mysqli_query($conn, $edit_term);
  	$row_slide   = mysqli_fetch_array($run_edit);
  	
  	$term_id    = $row_slide['term_id'];
  	$term_title  = $row_slide['term_title'];
  	$term_desc = $row_slide['term_desc'];
  	$term_link = $row_slide['term_link'];

  }

  ?>




 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Edit Term
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit Term
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-3 control-label">Term Title</label>
						<div class="col-md-6">
							<input type="text" name="term_title" class="form-control" value="<?php echo isset($term_title) ? $term_title : '' ;?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Term Description</label>
						<div class="col-md-6">
							<textarea name="term_desc" id="" cols="30" rows="5" class="form-control">
								<?php echo isset($term_desc) ? $term_desc : ''; ?>
							</textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Term Link</label>
						<div class="col-md-6">
							<input type="text" name="term_link" class="form-control" value="<?php echo isset($term_link) ? $term_link : '' ;?>">
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
	$term_title = $_POST['term_title'];
	$term_desc  = $_POST['term_desc'];
	$term_link  = $_POST['term_link'];
	

	$insert_box = "UPDATE terms SET term_title = '$term_title', term_desc='$term_desc', term_link = '$term_link' WHERE term_id = $edit_id";
	$run_insert = mysqli_query($conn, $insert_box);

	if ($insert_box) {
		echo "<script>alert('Term updated successfully')</script>";
		echo "<script>window.open('index.php?view_terms', '_self')</script>";
	}
}
 ?>



 <?php } ?>
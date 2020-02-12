<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>

 <div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="acive">
				<i class="fas fa-tachometer-alt"></i> Dashboard / Insert Terms
			</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Insert Terms
				</h3>
			</div>

			<div class="panel-body">
				<form action="" method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-md-3 control-label">Term Title</label>
						<div class="col-md-6">
							<input type="text" name="term_title" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Term Description</label>
						<div class="col-md-6">
							<textarea name="term_desc" id="" cols="30" rows="3" class="form-control"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label">Term Link</label>
						<div class="col-md-6">
							<input type="text" name="term_link" class="form-control">
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
 	$term_title  = $_POST['term_title'];
 	$term_desc	  = $_POST['term_desc'];
 	$term_link	  = $_POST['term_link'];

 	$insert_cat = "INSERT INTO terms (term_title, term_desc, term_link) VALUES ('$term_title' ,'$term_desc', '$term_link')";
 	$run_cat    = mysqli_query($conn, $insert_cat);

 	if ($run_cat) {
 		echo "<script>alert('New Term added successfully')</script>";
 		echo "<script>window.open('index.php?view_terms', '_self')</script>";
 	}
 }

 ?>



 <?php } ?>
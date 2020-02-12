<?php include '../functions/functions.php'; ?>
<?php 

  if (!isset($_SESSION['admin_email'])) {
  	echo "<script>window.open('login.php', '_self')</script>";
  } else {

 ?>
<!DOCTYPE html>
<html lang="en">
<head>


	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin</title>


	<!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  	<script>tinymce.init({selector:'textarea'});</script> -->
</head>
<body>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fas fa-tachometer-alt"></i> Dashboard/ Insert Bundle
			</li>
		</ol> 
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Insert Bundle
				</h3>
			</div>
			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Title</label>
						<div class="col-md-6">
							<input type="text" name="product_title" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Url</label>
						<div class="col-md-6">
							<input type="text" name="product_url" class="form-control" required>
							<br>
							<p style="font-size: 15px; font-weight: bold;">
								Product Url Example : navy-blue-t-shirt
							</p>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Select Manufacturer</label>
						<div class="col-md-6">
							<select name="manufacturer" id="" class="form-control">
								<option>Select Manufacturer</option>
								<?php 
									 $get_manufacturer = "SELECT * FROM manufacturers";
									$run_manufacturer = mysqli_query($conn, $get_manufacturer);
									while($rows = mysqli_fetch_array($run_manufacturer)) {
										$manufacturer_id = $rows['manufacturer_id'];
										$manufacturer_title = $rows['manufacturer_title'];

										echo "
										  <option value='$manufacturer_id'>$manufacturer_title</option>
										";
									}

									 ?>

							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Product Category</label>
						<div class="col-md-6">
							<select name="product_cat" id="" class="form-control">
								<option value="">Select Product Category

									<?php 
									 $get_p_cat = "SELECT * FROM products_category";
									$run_p_cat = mysqli_query($conn, $get_p_cat);
									while($rows = mysqli_fetch_array($run_p_cat)) {
										$p_cat_id = $rows['p_cat_id'];
										$p_cat_title = $rows['p_cat_title'];

										echo "
										  <option value='$p_cat_id'>$p_cat_title</option>
										";
									}

									 ?>

								</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Category</label>
						<div class="col-md-6">
							<select name="cat" class="form-control">
								<option value="">Select Category</option>
								<?php 
								 $get_cat = "SELECT * FROM categories";
								 $run_cat = mysqli_query($conn, $get_cat);
								 while($rows = mysqli_fetch_array($run_cat)) {
								 	$cat_id = $rows['cat_id'];
								 	$cat_title = $rows['cat_title'];

								 	echo "
								 	 <option value='$cat_id'>$cat_title</option>
								 	";
								 }
								 ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Image 1</label>
						<div class="col-md-6">
							<input type="file" name="product_img1" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Image 2</label>
						<div class="col-md-6">
							<input type="file" name="product_img2" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label float-left">Bundle Image 3</label>
						<div class="col-md-6">
							<input type="file" name="product_img3" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Price</label>
						<div class="col-md-6">
							<input type="number" name="product_price" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Sale Price</label>
						<div class="col-md-6">
							<input type="number" name="psp_price" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Keywords</label>
						<div class="col-md-6">
							<input type="text" name="product_keywords" class="form-control" required>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Tabs</label>
						<div class="col-md-6">
							<ul class="nav nav-tabs">
								<li class="active">
									<a href="#description" data-toggle="tab">Bundle Description</a>
								</li>

								<li>
									<a href="#features" data-toggle="tab">Bundle Features</a>
								</li>

								<li>
									<a href="#video" data-toggle="tab">Sound And Video</a>
								</li>
							</ul>

							<div class="tab-content">
								<div id="description" class="tab-pane fade-in active">
									<br>
									<textarea name="product_desc" id="product_desc" cols="30" rows="5" class="form-control" placeholder="description......"></textarea>
								</div>

								<div id="features" class="tab-pane fade-in">
									<br>
									<textarea name="product_features" id="product_features" cols="30" rows="5" class="form-control" placeholder="features......"></textarea>
								</div>

								<div id="video" class="tab-pane fade-in">
									<br>
									<textarea name="product_video" id="product_video" cols="30" rows="5" class="form-control" placeholder="video....."></textarea>
								</div>
							</div>
							<!-- <textarea name="product_desc" id="" cols="30" rows="5" class="form-control"></textarea> -->
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Label</label>
						<div class="col-md-6">
							<input type="text" name="product_label" class="form-control" required placeholder="Bundle">
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="submit" class="btn btn-info btn-block class-form-control" value="Insert Product">
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>	
</div>

</body>
</html>


<?php 
 
 if (isset($_POST['submit'])) {
 	$product_title = $_POST['product_title'];
 	$manufacturer  = $_POST['manufacturer'];
 	$product_cat   = $_POST['product_cat'];
 	$cat 		   = $_POST['cat'];
 	$product_price = $_POST['product_price'];
 	$psp_price     = $_POST['psp_price'];
 	$product_desc  = $_POST['product_desc'];
 	$product_label = $_POST['product_label'];
 	$product_url   = $_POST['product_url'];
 	$product_features   = $_POST['product_features'];
 	$product_video   = $_POST['product_video'];
 	$product_keywords = $_POST['product_keywords'];
 	$status = 'bundle';

 	$product_img1   = $_FILES['product_img1']['name'];
 	$product_img2   = $_FILES['product_img2']['name'];
 	$product_img3   = $_FILES['product_img3']['name'];

 	$temp_name1     = $_FILES['product_img1']['tmp_name'];
 	$temp_name2     = $_FILES['product_img2']['tmp_name'];
 	$temp_name3     = $_FILES['product_img3']['tmp_name'];

 	move_uploaded_file($temp_name1 , "product_images/$product_img1");
 	move_uploaded_file($temp_name2 , "product_images/$product_img2");
 	move_uploaded_file($temp_name3 , "product_images/$product_img3");






 	$insert_product = "INSERT INTO products (p_cat_id, cat_id, manufacturer_id, `date`, product_title, product_url, product_img1, product_img2, product_img3, product_price, product_psp_price, product_desc, `product_features`, `product_video`, product_keywords, product_label, status) VALUES ({$product_cat}, {$cat}, {$manufacturer}, NOW(), '$product_title', '$product_url', '$product_img1', '$product_img2', '$product_img3', {$product_price}, $psp_price, '$product_desc ', '$product_features', '$product_video', '$product_keywords', '$product_label', '$status')";

 	$run_product = mysqli_query($conn, $insert_product);

    confirm($run_product);

 	if($run_product) {
 		echo "<script>alert('Product has been inserted successfully')</script>";
 		echo "<script>window.open('index.php?view_products', '_self')</script>";
 	} 
 }

 ?>

 <?php } ?>
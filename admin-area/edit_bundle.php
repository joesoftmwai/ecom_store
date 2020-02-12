
 <?php 
  if (isset($_GET['edit_bundle'])) {
  	$edit_id  =  $_GET['edit_bundle'];

  	$get_product = "SELECT * FROM products WHERE product_id = $edit_id";
  	$run_product= mysqli_query($conn, $get_product);
  	$row_product= mysqli_fetch_array($run_product);

  	$product_id = $row_product['product_id'];
  	$p_cat_id   = $row_product['p_cat_id'];
  	$cat_id     = $row_product['cat_id'];
  	$manufacturer_id       = $row_product['manufacturer_id'];
  	$date       = $row_product['date'];
  	$product_title = $row_product['product_title'];
  	$product_img1  = $row_product['product_img1'];
  	$product_img2  = $row_product['product_img2'];
  	$product_img3  = $row_product['product_img3'];
  	$old_product_img1  = $row_product['product_img1'];
  	$old_product_img2  = $row_product['product_img2'];
  	$old_product_img3  = $row_product['product_img3'];
  	$product_price = $row_product['product_price'];
  	$psp_price     = $row_product['product_psp_price'];
  	$product_label = $row_product['product_label']; 
  	$product_url   = $row_product['product_url'];
  	$product_desc  = $row_product['product_desc'];
  	$product_features = $row_product['product_features'];
  	$product_video    = $row_product['product_video'];
  	$product_keywords = $row_product['product_keywords'];

  }

  $get_p_cat  = "SELECT * FROM products_category WHERE p_cat_id = $p_cat_id";
  $run_p_cat  = mysqli_query($conn, $get_p_cat);
  $row_p_cat  = mysqli_fetch_array($run_p_cat);
  $p_cat_title = $row_p_cat['p_cat_title'];
  $p_cat_id    = $row_p_cat['p_cat_id'];

   $get_cat   = "SELECT * FROM categories WHERE cat_id = $cat_id";
   $run_cat   = mysqli_query($conn, $get_cat);
   $row_cat   = mysqli_fetch_array($run_cat);
   $cat_title = $row_cat['cat_title'];
   $cat_id    = $row_cat['cat_id'];

   $get_manufacturer   = "SELECT * FROM manufacturers WHERE manufacturer_id = $manufacturer_id";
   $run_manufacturer   = mysqli_query($conn, $get_manufacturer);
   $row_manufacturer   = mysqli_fetch_array($run_manufacturer);
   $manufacturer_id    = $row_manufacturer['manufacturer_id'];
   $manufacturer_title = $row_manufacturer['manufacturer_title'];

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
				<i class="fas fa-tachometer-alt"></i> Dashboard / Edit Bundle
			</li>
		</ol> 
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="far fa-money-bill-alt"></i> Edit Bundle
				</h3>
			</div>
			<div class="panel-body">
				<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Title</label>
						<div class="col-md-6">
							<input type="text" name="product_title" class="form-control" required value="<?php echo $product_title; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Url</label>
						<div class="col-md-6">
							<input type="text" name="product_url" class="form-control" required value="<?php echo $product_url; ?>">
							<br>
							<p style="font-size: 15px; font-weight: bold;">
								Product Url Example : navy-blue-t-shirt
							</p>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Manufacturer</label>
						<div class="col-md-6">
							<select name="manufacturer" id="" class="form-control">
								<option value="<?php echo $manufacturer_id; ?>"><?php echo $manufacturer_title; ?></option>

									<?php 
									 

									$get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_title != '$manufacturer_title'";
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
						<label for="" class="col-md-3 control-label">Bundle Category</label>
						<div class="col-md-6">
							<select name="product_cat" id="" class="form-control">
								<option value="<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></option>

									<?php 
									 $get_p_cat = "SELECT * FROM products_category WHERE p_cat_title != '$p_cat_title'";
									 $run_p_cat = mysqli_query($conn, $get_p_cat);
									while($rows = mysqli_fetch_array($run_p_cat)) {
										$p_cat_id = $rows['p_cat_id'];
										$p_cat_title = $rows['p_cat_title'];

										echo "
										  <option value='$p_cat_id'>$p_cat_title</option>
										";
									}

									 ?>

							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Category</label>
						<div class="col-md-6">
							<select name="cat" class="form-control">
								<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
								<?php 
								 $get_cat = "SELECT * FROM categories WHERE cat_title != '$cat_title'";
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
							<input type="file" name="product_img1" class="form-control">
							<br>
							<img src="product_images/<?php echo $product_img1; ?>" alt="" width=70 height=70 class="img-thumbnail">
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Image 2</label>
						<div class="col-md-6">
							<input type="file" name="product_img2" class="form-control">
							<br>
							<img src="product_images/<?php echo $product_img2; ?>" alt="" width=70 height=70 class="img-thumbnail">
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label float-left">Bundle Image 3</label>
						<div class="col-md-6">
							<input type="file" name="product_img3" class="form-control">
							<br>
							<img src="product_images/<?php echo $product_img3; ?>" alt="" width=70 height=70 class="img-thumbnail">
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Price</label>
						<div class="col-md-6">
							<input type="text" name="product_price" class="form-control" required value="<?php echo $product_price; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Sale Price</label>
						<div class="col-md-6">
							<input type="number" name="psp_price" class="form-control" required value="<?php echo $psp_price; ?>">
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
									<a href="#features" data-toggle="tab">Bundle Feadurers</a>
								</li>

								<li>
									<a href="#video" data-toggle="tab">Sound And Video</a>
								</li>
							</ul>

							<div class="tab-content">
								<div id="description" class="tab-pane fade-in active">
									<br>
									<textarea name="product_desc" id="" cols="30" rows="5" class="form-control" placeholder="description......"><?php 
									echo $product_desc; ?></textarea>
								</div>

								<div id="features" class="tab-pane fade-in">
									<br>
									<textarea name="product_features" id="" cols="30" rows="5" class="form-control" placeholder="features......"><?php 
									echo $product_features; ?></textarea>
								</div>

								<div id="video" class="tab-pane fade-in">
									<br>
									<textarea name="product_video" id="" cols="30" rows="5" class="form-control" placeholder="video....."><?php 
									echo $product_video; ?></textarea>
								</div>
							</div>
							<!-- <textarea name="product_desc" id="" cols="30" rows="5" class="form-control"></textarea> -->
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Keywords</label>
						<div class="col-md-6">
							<input type="text" name="product_keywords" class="form-control" required value="<?php echo $product_keywords; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label">Bundle Label</label>
						<div class="col-md-6">
							<input type="text" name="product_label" class="form-control" required placeholder="New, Gift, Sale" value="<?php echo $product_label; ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="" class="col-md-3 control-label"></label>
						<div class="col-md-6">
							<input type="submit" name="update" class="btn btn-info btn-block class-form-control" value="Update Bundle">
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
 
 if (isset($_POST['update'])) {

 	$product_title = $_POST['product_title'];
 	$product_cat   = $_POST['product_cat'];
 	$cat 		   = $_POST['cat'];
 	$manufacturer  = $_POST['manufacturer'];

 	$product_price = $_POST['product_price'];
 	$psp_price     = $_POST['psp_price'];
 	$product_label = $_POST['product_label'];
 	$product_url   = $_POST['product_url'];
 	$product_features = $_POST['product_features'];
  	$product_video    = $_POST['product_video'];
 	$product_desc  = $_POST['product_desc'];
 	$product_keywords = $_POST['product_keywords'];
 	$status = "bundle";

 	$product_img1   = $_FILES['product_img1']['name'];
 	$product_img2   = $_FILES['product_img2']['name'];
 	$product_img3   = $_FILES['product_img3']['name'];

 	$temp_name1     = $_FILES['product_img1']['tmp_name'];
 	$temp_name2     = $_FILES['product_img2']['tmp_name'];
 	$temp_name3     = $_FILES['product_img3']['tmp_name'];

 	if (empty($product_img1)) {
 		$product_img1 = $old_product_img1;
 	}

 	if (empty($product_img2)) {
 		$product_img2 = $old_product_img2;
 	}

 	if (empty($product_img2)) {
 		$product_img2 = $old_product_img2;
 	}


 	move_uploaded_file($temp_name1 , "product_images/$product_img1");
 	move_uploaded_file($temp_name2 , "product_images/$product_img2");
 	move_uploaded_file($temp_name3 , "product_images/$product_img3");




 	$update_product = "UPDATE products SET p_cat_id= {$product_cat} ,cat_id={$cat}, manufacturer_id={$manufacturer},`date`=NOW(), product_url='$product_url', product_features='$product_features', product_video='$product_video', `product_title`='$product_title',`product_img1`='$product_img1',`product_img2`='$product_img2',`product_img3`='$product_img3',`product_price`=$product_price, product_psp_price='$psp_price', product_label='$product_label', `product_desc`='$product_desc',`product_keywords`='$product_keywords', status='$status' WHERE product_id = $edit_id";
 	$run_result     = mysqli_query($conn, $update_product);

		if (!$run_result) {
		 		die('QUERY FAILED'. mysqli_error($conn));
		 	} else {
		 		echo "<script>alert('Bundle has been updated successfully')</script>";
 		echo "<script>window.open('index.php?view_bundles', '_self')</script>";
		 	}


 	// if($run_product) {
 		
 	// } else {
 	// 	echo "<script>alert('Could not update the product')</script>";
 	// }
 }

 ?>

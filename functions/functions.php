<?php include 'includes/db.php'; ?>

<?php 

 function confirm($result) {
 	global $conn;
 	if (!$result) {
 		die('QUERY FAILED'. mysqli_error($conn));
 	}
 }

 function getProducts() {

 	 global $conn;

 	 $get_products = "SELECT * FROM products ORDER BY 1 DESC LIMIT 0, 4";
 	 $run_products = mysqli_query($conn, $get_products);
 	 while($rows = mysqli_fetch_array($run_products)) {
 	 	$pro_id 	= $rows['product_id'];
 	 	$pro_title  = $rows['product_title'];
 	 	$pro_price  = $rows['product_price'];
 	 	$pro_img1   = $rows['product_img1'];
 	 	$pro_label  = $rows['product_label'];
 	 	$manufacturer_id = $rows['manufacturer_id'];
 	 	$product_psp_price = $rows['product_psp_price'];
 	 	$pro_url    = $rows['product_url'];


 	 	$get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id = '$manufacturer_id'";
 	 	$run_manufacturer = mysqli_query($conn, $get_manufacturer);
 	 	$row_manufacturer = mysqli_fetch_array($run_manufacturer);
 	 	$manufacturer_name = $row_manufacturer['manufacturer_title'];

 	 	if ($pro_label != "New") {
 	 		$product_price   = "<del>$pro_price</del>";
 	 		$product_psp_price = "| $product_psp_price";
 	 	} else {
 	 		$product_price   = "$pro_price";
 	 		$product_psp_price = "";
 	 	}
 
 	 	if ($pro_label == "") {
 	 		# code...
 	 	} else {
 	 		$pro_label = "
 	 		  <a href='#' class='label sale' style='color:black;'>
 	 		    <div class='thelabel'>".$pro_label."</div>
 	 		    <div class='label-background'></div>
 	 		  </a>
 	 		";
 	 	}



 	 	echo '
		  
		  <div class="col-sm-4 col-sm-6 single">
			<div class="product">
				<a href="'.$pro_url.'"> 
				   <img src="admin-area/product_images/'.$pro_img1.'" alt="" class="img-responsive">
				</a>

				<div class="text">
				    <center>
				     <p class="btn btn-info">'.$manufacturer_name.'</p>
				    </center>
				    <hr>
					<h3><a href="'.$pro_url.'">'.$pro_title.'</a></h3>
					<p class="price">$'.$product_price.' '. $product_psp_price .'</p>

					<p class="buttons">
						<a href="'.$pro_url.'" class="btn btn-default">View Details</a>
						<a href="'.$pro_url.'" class="btn btn-info">
							<i class="fa fa-shopping-cart"></i>Add to cart
						</a>
					</p>
				</div>

				'.$pro_label.'
			</div>
		</div>
 	 	';
 	 }

 }





 function getpcatpro() {
 	global $conn;

 	if (isset($_GET['p_cat'])) {
 		$p_cat_id = $_GET['p_cat'];

 		$get_p_cat = "SELECT * FROM products_category WHERE p_cat_id = {$p_cat_id}";
 		$run_p_cat = mysqli_query($conn, $get_p_cat);

 		$row_p_cat = mysqli_fetch_array($run_p_cat); 

 		$p_cat_title = $row_p_cat['p_cat_title'];
 		$p_cat_desc  = $row_p_cat['p_cat_desc'];


 		$get_products = "SELECT * FROM products WHERE p_cat_id = {$p_cat_id}";
 		$run_products = mysqli_query($conn, $get_products);
 		$count  = mysqli_num_rows($run_products);

 		if ($count == 0) {
 			echo "

 			<div class='box'>
 			  <h3>No Product Found In These Category</h3>
 			</div>
 			";
 		} else {

 			echo "
			
			<div class='box'>
			  <h1>".$p_cat_title."</h1>
			  <p>".$p_cat_desc."</p>
			</div>
 			";
 		}


 		while($rows = mysqli_fetch_array($run_products)) {
 			$pro_id  = $rows['product_id'];
 			$pro_title = $rows['product_title'];
 			$pro_price = $rows['product_price'];
 			$pro_img1  = $rows['product_img1'];

 			echo '
							  
			<div class="col-md-4 col-sm-6 center-responsive">
				<div class="product">
					<a href="details.php?pro_id='.$pro_id.'">
						<img src="admin-area/product_images/'.$pro_img1.'" alt="" class="img-responsive">
					</a>
					<div class="text">
						<h3><a href="details.php?pro_id='.$pro_id.'">'.$pro_title.'</a></h3>
						<p class="price">$ '.$pro_price.'</p>
						<p class="buttons">
							<a href="details.php?pro_id='.$pro_id.'" class="btn btn-default">Views Details</a>
							<a href="details.php?pro_id='.$pro_id.'" class="btn btn-info"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						</p>	
						
					</div>
				</div>
			</div>

  		  	 ';
 		}
 	  }
 }


 function getcatpro() {
 	global $conn;

 	if (isset($_GET['cat'])) {
 		$cat_id  = $_GET['cat'];

 		$get_cat  = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
 		$run_cat  = mysqli_query($conn, $get_cat);

 		$row_cat  = mysqli_fetch_array($run_cat);

 		$cat_title  = $row_cat['cat_title'];
 		$cat_desc   = $row_cat['cat_desc'];


 		$get_products = "SELECT * FROM products WHERE cat_id = {$cat_id}";
 		$run_products = mysqli_query($conn, $get_products);

 		$count = mysqli_num_rows($run_products);
 		if ($count == 0) {
 			echo "
 			<div class='box'>
 			  <h3>No Product Found In These Category</h3>
 			</div>
 			";
 		} else {

 			 echo "
		
			 <div class='box'>
			   <h1>".$cat_title."</h1>
			   <p>".$cat_desc."</p>
			 </div>
 			";
 		}

 		while($rows = mysqli_fetch_array($run_products)) {
 			$pro_id  = $rows['product_id'];
 			$pro_title = $rows['product_title'];
 			$pro_price = $rows['product_price'];
 			$pro_img1  = $rows['product_img1'];

 			echo '
							  
			<div class="col-md-4 col-sm-6 center-responsive">
				<div class="product">
					<a href="details.php?pro_id='.$pro_id.'">
						<img src="admin-area/product_images/'.$pro_img1.'" alt="" class="img-responsive">
					</a>
					<div class="text">
						<h3><a href="details.php?pro_id='.$pro_id.'">'.$pro_title.'</a></h3>
						<p class="price">$ '.$pro_price.'</p>
						<p class="buttons">
							<a href="details.php?pro_id='.$pro_id.'" class="btn btn-default">Views Details</a>
							<a href="details.php?pro_id='.$pro_id.'" class="btn btn-info"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						</p>	
						
					</div>
				</div>
			</div>

  		  	 ';
 		}
 	}	
 }


 function getRealUserIp() {
 	global $conn;

 	switch (true) {
 		case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
 		case (!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
 		case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
 		default: return $_SERVER['REMOTE_ADDR'];
 	}
 }


 function items() {
 	global $conn;

 	$ip_add = getRealUserIp();

 	$get_items = "SELECT * FROM cart WHERE ip_add = '$ip_add' ";
 	$run_items = mysqli_query($conn, $get_items);

 	$count_items =  mysqli_num_rows($run_items);

 	echo $count_items;
 }


 function total_price() {
 	global $conn;

 	$ip_add  = getRealUserIp();
 	$total = 0;

 	$select_cart = "SELECT * FROM cart WHERE ip_add = '$ip_add'";
 	$run_cart = mysqli_query($conn, $select_cart);
 	while($record = mysqli_fetch_array($run_cart)) {
 		$pro_id = $record['p_id'];
 		$pro_qty = $record['qty'];
 		$pro_price = $record['p_price'];

		$sub_total = $pro_price * $pro_qty;
		$total += $sub_total;
 	}

 	echo $total;
 }


 function get_products() {
 	/// getProducts function Code Starts ///

global $conn;

$aWhere = array();

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'manufacturer_id='.(int)$sVal;

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

}

}

}

/// Categories Code Ends ///

$per_page=6;

if(isset($_GET['page'])){

$page = $_GET['page'];

}else {

$page=1;

}

$start_from = ($page-1) * $per_page ;

$sLimit = " order by 1 DESC LIMIT $start_from,$per_page";

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;

$get_products = "select * from products  ".$sWhere;

$run_products = mysqli_query($conn,$get_products);

while($row_products=mysqli_fetch_array($run_products)){

$pro_id = $row_products['product_id'];

$pro_title = $row_products['product_title'];

$pro_price = $row_products['product_price'];

$pro_img1 = $row_products['product_img1'];

$pro_label  = $row_products['product_label'];
$manufacturer_id = $row_products['manufacturer_id'];
$product_psp_price = $row_products['product_psp_price'];
$pro_url  = $row_products['product_url'];

$get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_id = '$manufacturer_id'";
$run_manufacturer = mysqli_query($conn, $get_manufacturer);
$row_manufacturer = mysqli_fetch_array($run_manufacturer);
$manufacturer_name = $row_manufacturer['manufacturer_title'];

if ($pro_label != "New") {
	$product_price   = "<del>$pro_price</del>";
	$product_psp_price = "| $product_psp_price";
} else {
	$product_price   = "$pro_price";
	$product_psp_price = "";
}

if ($pro_label == "") {
	# code...
} else {
	$pro_label = "
	  <a href='#' class='label sale' style='color:black;'>
	    <div class='thelabel'>".$pro_label."</div>
	    <div class='label-background'></div>
	  </a>
	";
}




echo '

 <div class="col-md-4">
			<div class="product">
				<a href="'.$pro_url.'"> 
				   <img src="admin-area/product_images/'.$pro_img1.'" alt="" class="img-responsive">
				</a>

				<div class="text">
				    <center>
				     <p class="btn btn-info">'.$manufacturer_name.'</p>
				    </center>
				    <hr>
					<h3><a href="'.$pro_url.'">'.$pro_title.'</a></h3>
					<p class="price">$'.$product_price.' '. $product_psp_price .'</p>

					<p class="buttons">
						<a href="'.$pro_url.'" class="btn btn-default">View Details</a>
						<a href="'.$pro_url.'" class="btn btn-info">
							<i class="fa fa-shopping-cart"></i>Add to cart
						</a>
					</p>
				</div>

				'.$pro_label.'
			</div>
		</div>

';

}
/// getProducts function Code Ends ///














 function getPaginator() {

/// getPaginator Function Code Starts ///

$per_page = 6;

global $conn;

$aWhere = array();

$aPath = '';

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'manufacturer_id='.(int)$sVal;

$aPath .= 'man[]='.(int)$sVal.'&';

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'p_cat_id='.(int)$sVal;

$aPath .= 'p_cat[]='.(int)$sVal.'&';

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aWhere[] = 'cat_id='.(int)$sVal;

$aPath .= 'cat[]='.(int)$sVal.'&';

}

}

}

/// Categories Code Ends ///

$sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');

$query = "select * from products ".$sWhere;

$result = mysqli_query($conn,$query);

$total_records = mysqli_num_rows($result);

$total_pages = ceil($total_records / $per_page);

echo "<li><a href='shop.php?page=1";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'First Page'."</a></li>";

for ($i=1; $i<=$total_pages; $i++){

echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."' >".$i."</a></li>";

};

echo "<li><a href='shop.php?page=$total_pages";

if(!empty($aPath)){ echo "&".$aPath; }

echo "' >".'Last Page'."</a></li>";

/// getPaginator Function Code Ends ///
 }

 }








 ?>



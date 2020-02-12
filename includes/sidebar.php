<?php 

$aMan  = array();

$aPCat = array();

$aCat  = array();

/// Manufacturers Code Starts ///

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

foreach($_REQUEST['man'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aMan[(int)$sVal] = (int)$sVal;

}

}

}

/// Manufacturers Code Ends ///

/// Products Categories Code Starts ///

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aPCat[(int)$sVal] = (int)$sVal;

}

}

}

/// Products Categories Code Ends ///

/// Categories Code Starts ///

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

foreach($_REQUEST['cat'] as $sKey=>$sVal){

if((int)$sVal!=0){

$aCat[(int)$sVal] = (int)$sVal;

}

}

}

/// Categories Code Ends ///



 ?>
<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<h3 class="panel-title">
		Manufacturers

		<div class="pull-right">
			<a href="#" style="color: black;">
				<span class="nav-toggle hide-show">Hide</span>
			</a>
		</div>
	</h3>
	</div>

	<div class="panel-collapse collapse-data">
		<div class="panel-body">
			<div class="input-group">
				<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-manufacturers" placeholder="Filter Manufacturers">
				<a class="input-group-addon"><i class="fa fa-search"></i></a>
			</div>	
		</div>

		<div class="panel-body scroll-menu">
			<ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturers">
				<?php 
				 $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_top='yes'";
				 $run_manufacturer = mysqli_query($conn, $get_manufacturer);
				 while($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
				 	$manufacturer_id = $row_manufacturer['manufacturer_id'];
				 	$manufacturer_title = $row_manufacturer['manufacturer_title'];
				 	$manufacturer_image = $row_manufacturer['manufacturer_image'];

				 	if ($manufacturer_image == "") {
				 		# code...
				 	} else {
				 		$manufacturer_image = "
				 		<img src='admin-area/other_images/$manufacturer_image' width='20px'>&nbsp";
				 	}

				 	echo "
				 	   <li style='background:#dddddd;' class='checkbox checkbox-primary'>
				 	     <a>
				 	       <label>
				 	         <input "; 

				 	         if (isset($aMan[$manufacturer_id])) {
				 	         	echo "checked='checked'";
				 	         }


				 	          echo " type='checkbox' value=".$manufacturer_id." name='manufacturer' class='get_manufacturer'>
				 	         <span>
				 	          ".$manufacturer_image."
				 	          ".$manufacturer_title."
				 	         </span>
				 	       </label>
				 	     </a>
				 	   </li>
				 	";
				 }

				 $get_manufacturer = "SELECT * FROM manufacturers WHERE manufacturer_top='no'";
				 $run_manufacturer = mysqli_query($conn, $get_manufacturer);
				 while($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
				 	$manufacturer_id = $row_manufacturer['manufacturer_id'];
				 	$manufacturer_title = $row_manufacturer['manufacturer_title'];
				 	$manufacturer_image = $row_manufacturer['manufacturer_image'];

				 	if ($manufacturer_image == "") {
				 		# code...
				 	} else {
				 		$manufacturer_image = "
				 		<img src='admin-area/other_images/$manufacturer_image' width='20px'>&nbsp";
				 	}

				 	echo "
				 	   <li class='checkbox checkbox-primary'>
				 	     <a>
				 	       <label>
				 	         <input "; 

				 	         if (isset($aMan[$manufacturer_id])) {
				 	         	echo "checked='checked'";
				 	         }

				 	         echo " type='checkbox' value=".$manufacturer_id." name='manufacturer' class='get_manufacturer'>
				 	         <span>
				 	          ".$manufacturer_image."
				 	          ".$manufacturer_title."
				 	         </span>
				 	       </label>
				 	     </a>
				 	   </li>
				 	";
				 }

				  ?>
			</ul>
		</div>
	</div>

</div>


<div class="panel panel-default sidebar-menu"> <!-- Sidebar Menu stars -->
	<div class="panel-heading">
		<h3 class="panel-title">
			Product Categories
			<div class="pull-right">
				<a href="#" style="color: black;">
					<span class="nav-toggle hide-show">
						Hide
					</span>
				</a>
			</div>
		</h3>
	</div>

	<div class="panel-collapse collapse-data">
		<div class="panel-body">
			<div class="input-group">
				<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filter Product Categories">
				<a class="input-group-addon"><i class="fa fa-search"></i></a>
			</div>
		</div>

		<div>
			<div class="panel-body scroll-menu">
				<ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats">
					<?php

					 $get_p_cats = "SELECT * FROM products_category WHERE p_cat_top='yes'";
					 $run_p_cats = mysqli_query($conn, $get_p_cats);
					 while($row_p_cats = mysqli_fetch_array($run_p_cats)) {
					 	$p_cat_id   = $row_p_cats['p_cat_id'];
					 	$p_cat_title   = $row_p_cats['p_cat_title'];
					 	$p_cat_image   = $row_p_cats['p_cat_image'];

					 	if ($p_cat_image == "") {
				 		# code...
					 	} else {
					 		$p_cat_image = "
					 		<img src='admin-area/other_images/$p_cat_image' width='20px'>&nbsp";
					 	}

					 	echo "
					 	   <li class='checkbox checkbox-primary' style='background:#dddddd;'>
					 	     <a>
					 	       <label>
					 	         <input ";

					 	          if (isset($aPCat[$p_cat_id])) {
					 	           	  echo "checked='checked'";
					 	           } 

					 	          echo " type='checkbox' value=".$p_cat_id." name='p_cat' class='get_manufacturer'>
					 	         <span>
					 	          ".$p_cat_image."
					 	          ".$p_cat_title."
					 	         </span>
					 	       </label>
					 	     </a>
					 	   </li>
					 	";


					 } 

					 ?>

					 <?php

					 $get_p_cats = "SELECT * FROM products_category WHERE p_cat_top='no'";
					 $run_p_cats = mysqli_query($conn, $get_p_cats);
					 while($row_p_cats = mysqli_fetch_array($run_p_cats)) {
					 	$p_cat_id   = $row_p_cats['p_cat_id'];
					 	$p_cat_title   = $row_p_cats['p_cat_title'];
					 	$p_cat_image   = $row_p_cats['p_cat_image'];

					 	if ($p_cat_image == "") {
				 		# code...
					 	} else {
					 		$p_cat_image = "
					 		<img src='admin-area/other_images/$p_cat_image' width='20px'>&nbsp";
					 	}

					 	echo "
					 	   <li class='checkbox checkbox-primary'>
					 	     <a>
					 	       <label>
					 	         <input ";

					 	          if (isset($aPCat[$p_cat_id])) {
					 	           	  echo "checked='checked'";
					 	           } 

					 	          echo " type='checkbox' value=".$p_cat_id." name='p_cat' class='get_manufacturer'>
					 	         <span>
					 	          ".$p_cat_image."
					 	          ".$p_cat_title."
					 	         </span>
					 	       </label>
					 	     </a>
					 	   </li>
					 	";


					 } 

					 ?>
				</ul>
			</div>
		</div>
	</div>
</div> <!-- Sidebar Menu ends -->


<div class="panel panel-default sidebar-menu"> <!-- Sidebar Menu stars -->
	<div class="panel-heading">
		<h3 class="panel-title">
			Categories
			<div class="pull-right">
				<a href="#" style="color:black;">
					<span class="nav-toggle hide-show">
						Hide
					</span>
				</a>
			</div>
		</h3>
	</div>

	<div class="panel-collapse collapse-data">
		<div class="panel-body">
			<div class="input-group">
				<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Filter Categories">
				<a class="input-group-addon"><i  class="fa fa-search"></i></a>
			</div>
		</div>

		<div class="panel-body scroll-menu">
			<ul class="nav nav-pills nav-stacked category-menu" id="dev-cats">
				<?php 

				 $get_cats = "SELECT * FROM categories WHERE cat_top='yes'";
				 $run_cats = mysqli_query($conn, $get_cats);
				 while($row_cats = mysqli_fetch_array($run_cats)) {
				 	$cat_id  = $row_cats['cat_id'];
				 	$cat_title  = $row_cats['cat_title'];
				 	$cat_image  = $row_cats['cat_image'];

				 	if ($cat_image == "") {
				 		# code...
					 	} else {
					 		$cat_image = "
					 		<img src='admin-area/other_images/$cat_image' width='20px'>&nbsp";
					 	}

					 	echo "
					 	   <li class='checkbox checkbox-primary' style='background:#dddddd;'>
					 	     <a>
					 	       <label>
					 	         <input ";

					 	         if (isset($aCat[$cat_id])) {
					 	          	echo "checked='checked'";
					 	          } 

					 	         echo " type='checkbox' value=".$cat_id." name='p_cat' class='get_manufacturer'>
					 	         <span>
					 	          ".$cat_image."
					 	          ".$cat_title."
					 	         </span>
					 	       </label>
					 	     </a>
					 	   </li>
					 	";

				 }
 
				 ?>

				 <?php 

				 $get_cats = "SELECT * FROM categories WHERE cat_top='no'";
				 $run_cats = mysqli_query($conn, $get_cats);
				 while($row_cats = mysqli_fetch_array($run_cats)) {
				 	$cat_id  = $row_cats['cat_id'];
				 	$cat_title  = $row_cats['cat_title'];
				 	$cat_image  = $row_cats['cat_image'];

				 	if ($cat_image == "") {
				 		# code...
					 	} else {
					 		$cat_image = "
					 		<img src='admin-area/other_images/$cat_image' width='20px'>&nbsp";
					 	}

					 	echo "
					 	   <li class='checkbox checkbox-primary'>
					 	     <a>
					 	       <label>
					 	         <input ";

					 	         if (isset($aCat[$cat_id])) {
					 	          	echo "checked='checked'";
					 	          } 

					 	         echo " type='checkbox' value=".$cat_id." name='p_cat' class='get_manufacturer'>
					 	         <span>
					 	          ".$cat_image."
					 	          ".$cat_title."
					 	         </span>
					 	       </label>
					 	     </a>
					 	   </li>
					 	";

				 }

				  ?>

			</ul>
		</div>
	</div>
</div> <!-- Sidebar Menu ends -->
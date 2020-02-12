<?php 
 include 'includes/db.php';
 include 'functions/functions.php';

 session_start();

 switch ($_REQUEST['sAction']) {
 	default : 

 	get_products();

 	break;

 	case 'getPaginator':

 	getPaginator();

 	break;




 }

 ?>
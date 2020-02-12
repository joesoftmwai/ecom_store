<!-- Header -->
<?php include 'includes/header.php'; ?>

<!-- Navigation -->
<?php include 'includes/navigation.php'; ?>


<div id="content"> <!-- _Content starts -->
	<div class="container">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>Register</li>
			</ul>
		</div>

		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<center>
						<h2>Register New Account</h2>
					</center>
					</div>


						<form action="customer_register.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="">Customer Name</label>
								<input type="text" class="form-control" name="c_name" required>
							</div>

							<div class="form-group">
								<label for="">Customer Email</label>
								<input type="email" class="form-control" name="c_email" required>
							</div>

							<div class="form-group">
								<label for="">Customer Password</label>
								<div class="input-group">
									<span class="input-group-addon xyz">
										<i class="text-success fa fa-check tick1"></i>
										<i class="fa fa-times cross1"></i>
									</span>
									<input type="password" class="form-control" id="pass" name="c_password" required>
									<span class="input-group-addon">
										<div id="meter_wrapper">
											<span id="pass_type"></span>
											<div id="meter"></div>
										</div>
									</span>
								</div>
							</div>

							<div class="form-group">
								<label for="">Confirm Password</label>
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-check tick2"></i>
										<i class="fa fa-times cross2"></i>
									</span>
									<input type="password" class="form-control confirm" id="confirm_pass">
								</div>
							</div>

							<div class="form-group">
								<label for="">Customer Country</label>
								<input type="text" class="form-control" name="c_country" required>
							</div>

							<div class="form-group">
								<label for="">Customer City</label>
								<input type="text" class="form-control" name="c_city" required>
							</div>

							<div class="form-group">
								<label for="">Customer Contact</label>
								<input type="text" class="form-control" name="c_contact" required>
							</div>

							<div class="form-group">
								<label for="">Customer Address</label>
								<input type="text" class="form-control" name="c_address" required>
							</div>

							<div class="form-group">
								<label for="">Customer Image</label>
								<input type="file" class="form-control" name="c_image" required>
							</div>

							<div class="form-group">
								<center>
									<label for="">Captcha Verification</label>
									<div class="g-recaptcha" data-sitekey="6LcEktEUAAAAANlU-FXiFkoj2DCjglxR93ixCEfN">
										
									</div>
								</center>
							</div>



							<div class="text-center">
								<button type="submit" name="register" class="btn btn-info"><i class="fa fa-user-md"></i>
									Register
								</button>
							</div>
						</form>






						<?php 
						 if (isset($_POST['register'])) {

						 	// google recaptcha
						 	$secret   = '6LcEktEUAAAAACRB8cMzoxHIdX_od17FcS0CWwdV';
						 	$response = $_POST['g-recaptcha-response'];
						 	$remoteip = $_SERVER['REMOTE_ADDR'];
						 	$url      = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

						 	$result  = json_decode($url, TRUE);

						 	if ($result['success'] == 1) {
						 		# code...
						 	

						 	$c_name  = $_POST['c_name'];
						 	$c_email = $_POST['c_email'];
						 	$c_password = $_POST['c_password'];
						 	$c_country  = $_POST['c_country'];
						 	$c_city     = $_POST['c_city'];
						 	$c_contact  = $_POST['c_contact'];
						 	$c_address  = $_POST['c_address'];

						 	$c_image     = $_FILES['c_image']['name'];
						 	$c_image_tmp = $_FILES['c_image']['tmp_name'];
						 	$c_ip        = getRealUserIp();

						 	move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

						 	// checks whether email already exist
						 	$get_email = "SELECT * FROM customers WHERE customer_email='$c_email'";
						 	$run_email = mysqli_query($conn, $get_email);
						 	$check_email = mysqli_num_rows($run_email);

						 	if ($check_email == 1) {
						 		echo "<script>alert('This email is already registered')</script>";
						 		exit();
						 	}

						 	$customer_confirm_code = mt_rand();

						 	//send confirmation code to email adress
						 	// $subject = "Email Confirmation Code";
						 	// $from    = 'mwasiley@gmail.com';
						 	// $message = '
						 	//   <h2>Email Confrimation by joes</h2>
						 	// ';
						 	
						 	$insert_customer = "INSERT INTO customers(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_adress, customer_image, customer_ip) VALUES ('$c_name', '$c_email', '$c_password', '$c_country', '$c_city',  '$c_contact', '$c_address', '$c_image','$c_ip')";
						 	$run_customer   = mysqli_query($conn, $insert_customer);
						 	confirm($run_customer);

						 	$select_cart  = "SELECT * FROM cart WHERE ip_add = '$c_ip'";
						 	$run_cart     = mysqli_query($conn, $select_cart);   
						 	$check_cart   = mysqli_num_rows($run_cart);

						 	if ($check_cart > 0) {
						 		$_SESSION['customer_email'] = $c_email;
						 		echo "<script>alert('You have been registered successfully')</script>";
						 		echo "<script>window.open('checkout.php', '_self')</script>";
						 	} else {
						 		$_SESSION['customer_email'] = $c_email;
						 		echo "<script>alert('You have been registered successfully')</script>";
						 		echo "<script>window.open('index.php', '_self')</script>";
						 	}

						 }  //  google recaptcha verification ends here
						  else {
						  	echo "<script>alert('Please select captcha, Try Again')</script>";
						  }
						 }
						 ?>
					
				
			</div>
		</div>
	</div>
</div> <!-- Content Ends -->


<!-- Footer --> 
<?php include 'includes/footer.php'; ?>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
		$('.tick1').hide();
		$('.tick2').hide();
		$('.cross1').hide();
		$('.cross2').hide();

		$('.confirm').focusout(function() {
			var password = $('#pass').val();
			var confirm_pass = $('#confirm_pass').val();

			if (password == confirm_pass) {
				$('.tick1').show();
				$('.tick2').show();
				$('.cross1').hide();
				$('.cross2').hide();
			} else {
				$('.tick1').hide();
				$('.tick2').hide();
				$('.cross1').show();
				$('.cross2').show();
			}
		})
	});
</script>
<script>
	$(document).ready(function(){

$("#pass").keyup(function(){

check_pass();

});

});

function check_pass() {
 var val=document.getElementById("pass").value;
 var meter=document.getElementById("meter");
 var no=0;
 if(val!="")
 {
// If the password length is less than or equal to 6
if(val.length<=6)no=1;

 // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
  if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

  // If the password length is greater than 6 and contain alphabet,number,special character respectively
  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

  // If the password length is greater than 6 and must contain alphabets,numbers and special characters
  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  if(no==1)
  {
   $("#meter").animate({width:'50px'},300);
   meter.style.backgroundColor="red";
   document.getElementById("pass_type").innerHTML="Very Weak";
  }

  if(no==2)
  {
   $("#meter").animate({width:'100px'},300);
   meter.style.backgroundColor="#F5BCA9";
   document.getElementById("pass_type").innerHTML="Weak";
  }

  if(no==3)
  {
   $("#meter").animate({width:'150px'},300);
   meter.style.backgroundColor="#FF8000";
   document.getElementById("pass_type").innerHTML="Good";
  }

  if(no==4)
  {
   $("#meter").animate({width:'200px'},300);
   meter.style.backgroundColor="#00FF40";
   document.getElementById("pass_type").innerHTML="Strong";
  }
 }

 else
 {
  meter.style.backgroundColor="";
  document.getElementById("pass_type").innerHTML="";
 }
}
</script>
</body>
</html>
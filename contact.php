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
				<li>Contact Us</li>
			</ul>
		</div>


		<div class="col-md-12">
			<div class="box">
				<div class="box-header">
					<center>
						<h2>Contact Us</h2>
						<p class="text-muted">
							If you have a question, please feel free to contact us, our customer service center is working for you 24/7
						</p>
					</center>
					</div>


						<form action="contact.php" method="post">
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" class="form-control" name="name" required>
							</div>

							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="email" required>
							</div>

							<div class="form-group">
								<label for="">Subject</label>
								<input type="text" class="form-control" name="subject" required>
							</div>

							<div class="form-group">
								<label for="">Message</label>
								<textarea name="message" class="form-control" id="" cols="30" rows="3"></textarea>
							</div>

							<div class="text-center">
								<button type="submit" name="submit" class="btn btn-info"><i class="fas fa-envelope"></i>
									Send Message
								</button>
							</div>
						</form>

						<?php 
						 if (isset($_POST['submit'])) {
						 	//Admin receive email through this code
						 	$sender_name    = $_POST['name'];
						 	$sender_email   = $_POST['email'];
						 	$sender_subject = $_POST['subject'];
						 	$sender_message = $_POST['message'];

						 	$receiver_email = 'joes@gmail.com';
						 	mail($receiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);

						 	//Send email to sender
						 	$email   = $_POST['email'];
						 	$subject = 'Wlecome to my website';
						 	$message = 'I shall get to you soon, Thanks for sending us email';
						 	$from    = 'joes@gmail.com';

						 	mail($email, $subject, $message, $from);


						 	echo '<h2 align="center">Your Message has been sent successfully</h2>';



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
</body>
</html>
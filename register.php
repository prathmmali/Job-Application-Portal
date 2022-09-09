<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- link to Bootstrap minified css-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- link to Jquery minified-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- link to Bootstrap JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- link to external CSS -->
		<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

	<?php
	include('header.php') 
	?>

	<?php
	include('connect.php') 
	?>





	<div class="container panel-margin">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Register</h2>
				</div>
				<div class="panel-body">
					<form method="post" action="register.php">
						<div class="form-group">
							<input type="text" required="required" value="" name="name" class="form-control" placeholder="Name">
						</div>

						<div class="form-group">
							<input type="email" required="required" value="" name="email" class="form-control" placeholder="Email">
						</div>

						<div class="form-group">
							<input type="password" required="required" value="" name="password" class="form-control" placeholder="Password">
						</div>
						
						</div>

						<button type="submit" class="btn btn-primary" name="register" value="register">Register</button>
					</form>
				</div>
				<div class="panel-footer">
					Already have an account?Click <a href="login.php">here</a> to create one.
				</div>
			</div>
		</div>

	


<?php
	include('footer.php') 
	?>






</body>
</html>

<?php

	if (isset($_POST['register'])) {
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//print_r($_POST);
		if (mysqli_query($con,"INSERT INTO `user`(`name`, `email`, `password`, `roletype`) VALUES ('$name','$email','$password','2')")) {
			echo "<script> alert('Register Successfully') </script>";
		}
		else
		{
			echo "<script> alert('Not Register') </script>";
		}
	}

?>
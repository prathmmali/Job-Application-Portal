<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Login </title>
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
	require "header.php"; 
	?>

	<?php
	include('connect.php') 
	?>

	<div class="container panel-margin">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Login</h3>
				</div>
				<div class="panel-body">
					<form action="login.php" method="post">
						<div class="form-group">
							<input type="email" required="required" value="" name="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="password" required="required" value="" name="password" class="form-control" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
					</form>
				</div>
				<div class="panel-footer">
					Don't have an account?Click <a href="register.php">here</a> to create one.
				</div>
			</div>
		</div>


<?php
	include('footer.php') 
	?>



</body>
</html>

<?php

	if (isset($_POST['login'])) {
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "select * from user where email='$email' and password='$password'";
		$rs = mysqli_query($con, $sql);

		if(mysqli_num_rows($rs)>0) {

			$data = mysqli_fetch_array($rs);
			//print_r($data);

			$roletype = $data['roletype'];
			$userid = $data['userid'];
			$username = $data['name'];

			$_SESSION['type'] = $roletype;
			$_SESSION['userid'] = $userid;
			$_SESSION['name'] = $username;

			


			if ($roletype == 1) {
				echo "<script> alert('Admin Successfully Login') </script>";

				//header('Location: index.php');
				echo "<script> window.location.href='index.php' </script>";

			}else if ($roletype == 2) {
				echo "<script> alert('User Successfully Login') </script>";
				echo "<script> window.location.href='index.php' </script>";
			}

			}else{
			echo "<script> alert('Invalid Username or Password') </script>";
		}
	}

?>
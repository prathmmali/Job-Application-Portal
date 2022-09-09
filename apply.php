<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Apply </title>
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
				<h3 class="panel-title">Upload Resume</h3>
			</div>
			<br>
			

				<div class="login-content">
                    <form action="apply.php" method="post" enctype="multipart/form-data">
                        
                        <div class="textbox-wrap">
                            <div class="form-group">
                                
                                <input type="file" required="required" value="" name="file" class="form-control">
                            </div>
                        </div>


                        <div class="login-btn">
					   <button type="submit" class="btn btn-primary" name="apply" value="Apply">Upload</button>
					</div>
				</form>
				<br>
			</div>
			<div class="panel-footer">
				<br>
				</div>

		</div>
	</div>
</div>


<?php
	include('footer.php') 
	?>




</body>
</html>

<?php

	if (isset($_POST['apply'])) {
		$jobid = $_SESSION['jobid'];
		$userid = $_SESSION['userid'];

		$file = $_FILES['file']['name'];
		$tmp = $_FILES['file']['tmp_name'];

		move_uploaded_file($tmp , "uploads/$file");

		$date = date('d/m/y');

		if(mysqli_query($con , "INSERT INTO `application`(`userid`,`jobid`,`cv`,`date`) VALUES ('$userid','$jobid','$file','$date')")){
			echo "<script> alert('Application Submitted Successfully!') </script>";
			echo "<script> window.location.href='index.php' </script>";
		}else{
			echo "<script> alert('Your Application Not Submitted  ') </script>";


		}
		
		
		
	}

?>
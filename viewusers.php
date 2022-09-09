<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> View All Users </title>
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



	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				<table class="table">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						
					</tr>


					<?php

						$sql = " select * from user where roletype = 2"; 

						$rs = mysqli_query($con , $sql);
						while($data = mysqli_fetch_array($rs)){

					
					?>

					<tr>
						<td> <?= $data['userid'] ?></td>
						<td> <?= $data['name'] ?></td>
						<td> <?= $data['email'] ?></td>
						
					</tr>

					<?php
					}
					?>



				</table>
				
			</div>
		</div>
	</div>



<?php
	include('footer.php')
?>







</body>
</html>


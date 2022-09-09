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
						<th>Job</th>
						<th>Category</th>
						<th>Date</th>
						<th>CV</th>
					</tr>


					<?php

						$userid = $_SESSION['userid'];
						$sql = "SELECT application.appid , jobs.name , categories.name AS 'catname',
								application.date , application.cv
								FROM application
								INNER JOIN jobs ON jobs.jobid = application.jobid
								INNER JOIN categories ON categories.catid = jobs.catid
								INNER JOIN user ON user.userid = application.userid
								WHERE application.userid = '$userid'

								"; 

						$rs = mysqli_query($con , $sql);
						while($data = mysqli_fetch_array($rs)){

					
					?>

					<tr>
						<td> <?= $data['appid'] ?></td>
						<td> <?= $data['name'] ?></td>
						<td> <?= $data['catname'] ?></td>
						<td> <?= $data['date'] ?></td>
						<td> <a href="uploads/<?=$data['cv']?>" class="btn btn-warning" target="_blank"> View CV</a> </td>
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


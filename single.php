<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Jobs</title>
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
       		
       		<?php
       				$jobid = $_GET['jobid'];
					$sql = "SELECT jobs.jobid , jobs.name , categories.name AS 'catname',jobs.desciption , jobs.date , jobs.salary , jobs.Skill , jobs.time1 , jobs.location FROM jobs INNER JOIN categories ON categories.catid = jobs.catid where jobs.jobid = '$jobid'";
					$rs = mysqli_query($con,$sql);
					$jobdata = mysqli_fetch_array($rs);

					$_SESSION['jobid'] = $jobid;
					
				?>

       	<div class="col-sm-12 myborder">
       		
				<h4> <?= $jobdata['name']?>	</h4>
				<small> Category :  <?=$jobdata['catname']?>  </small> 
				<p> Desc : <?=$jobdata['desciption']?> </p>
				<small> Skill :  <?=$jobdata['Skill']?>  </small>
				<p> Timing : <?=$jobdata['time1']?> </p>
				<p> Location : <?=$jobdata['location']?> </p>
				<p> Apply Now : <?=$jobdata['date']?> </p>
				<div class="col-sm-2">

					<?php

					if (isset($_SESSION['type'])) {
						if ($_SESSION['type'] == 2) {
							echo '<a href="apply.php" class="btn btn-primary"> Apply Now </a>';
						}
					}else{
							echo '<a href="login.php" class="btn btn-primary"> Login </a> <br> <br>';
							echo '<a href="register.php" class="btn btn-primary"> Register </a>';
						}
					?>					
				</div>
			</div>
	
	</div>	
</div>


</body>
</html>
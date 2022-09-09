<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jobs</title>
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

	<?php	
	if (!isset($_SESSION['type'])) {
		header('Location: login.php');
	}

	?>


	<div class="container panel-margin">
		<div class="panel panel-default"> 

			<div class="panel-heading">
					<h2 class="panel-title">Jobs</h2>
				</div>

			<div class="panel-body">	

                    <form action="jobs.php" method="post">
                        
                            <div class="form-group">
                                
                                
                                <input type="text" required="required" value="" name="Name" class="form-control" placeholder="Job Role">
                            </div>



                            <div class="form-group">
                                
                                <textarea name="desciption" id="" class="form-control" placeholder="Description" ></textarea>
                            </div>

                            <div class="form-group">
                                
                                <input type="text" required="required" value="" name="Skill" class="form-control" placeholder="Skill">
                            </div>

                            <div class="form-group">
                                
                                <input type="text" required="required" value="" name="time1" class="form-control" placeholder="Timing">
                            </div>


                            <div class="form-group">
   
                                <input type="text" required="required" value="" name="salary" class="form-control" placeholder="salary">
                            </div>

                            <div class="form-group">
                                
                                <textarea name="location" id="" class="form-control" placeholder="Location"></textarea>
                            </div>

                            <div class="form-group">
                                
                                <select name="catid" id="" class="form-control">
                                	<?php
                                	$sql = "select * from categories";
                                	$data = mysqli_query($con, $sql);
                                	if (mysqli_num_rows($data) > 0 ) {
                                		while ($row=mysqli_fetch_array($data)) {
                                			?><option value="<?= $row['catid'] ?>" > <?= $row['name'] ?> </option> <?php 
                                		}
                                	}
                                	else{
                                	?><option>Category Not Added</option><?php
                                	}                                

                                	?>
                                	
                                </select>
                                </div>
                        
                        <div class="login-btn">
					   

					   <button type="submit" name="addjob" value="Add Job" class="btn btn-primary">Submit</button>
					 

					</div>     
                     </form>					
                </div>	
                </div>	
				
			</div>

			
		</div> 
	</div> <!-- Here -->

	
	
<!-- $	$	$	$	$	$	$	$	$	$	$	$	$	$	$	$	$	$ -->


	<div class="container">
		<div class="row">
			<div class="col-lg-12">	
				<table border="1"> 
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Categories</th>
							<th>Skill</th>
							<th>Desc</th>
							<th>Salary</th>
							<th>Timing</th>
							<th>Date</th>
						</tr>
						
						<?php
							$sql = "SELECT jobs.jobid , jobs.name , categories.name AS 'catname',jobs.desciption , jobs.date , jobs.salary , jobs.Skill , jobs.time1 , jobs.location FROM jobs INNER JOIN categories ON categories.catid = jobs.catid";
							$rs = mysqli_query($con,$sql);
							while ($jobdata = mysqli_fetch_array($rs)) {
							?>


						<tr align="center">
							<td> <?= $jobdata['jobid'] ?> </td>
							<td> <?= $jobdata['name'] ?> </td>
							<td> <?= $jobdata['catname'] ?> </td>
							<td> <?= $jobdata['Skill'] ?> </td>
							<td> <?= $jobdata['desciption'] ?> </td>
							<td> <?= $jobdata['salary'] ?> </td>
							<td> <?= $jobdata['time1'] ?> </td>
							<td> <?= $jobdata['date'] ?> </td>
						</tr>

							<?php 
							}

							?>
				</table>


					
			</div>



	<?php
	if (isset($_POST['addjob'])) {
		$Name = $_POST['Name'];
		$catid = $_POST['catid'];
		$desciption = $_POST['desciption'];
		$Skill = $_POST['Skill'];
		$date = date('d/m/y');
		$time1 = $_POST['time1'];
		$location = $_POST['location'];
		$salary = $_POST['salary'];

		if (mysqli_query($con,"INSERT INTO `jobs`(`Name`, `desciption`, `Skill`, `time1`, `date`, `salary`, `location`, `catid`) VALUES ('$Name','$desciption','$Skill','$time1','$date','$salary','$location','$catid')")) {
 			echo "<script> alert('Record Added') </script>";
 		}
 		else
 		{
 			echo "<script> alert('Record Not Added') </script>";
 		}
	}

	?>

</div>
</div>

<?php
	include('footer.php') 
	?>





</body>
</html>
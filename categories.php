<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
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
	if (isset($_SESSION['type'])) {
		header('Location: login.php');
	}

	?>

	<?php

		error_reporting(0);


		$catid = $_GET['catid']; 
		$sql = "SELECT * FROM `categories` where catid='$catid'";
		$rs = mysqli_query($con,$sql);
		$catdata = mysqli_fetch_array($rs);

		
		if($_GET['delid']) {
		$delid = $_GET['delid'];
		$sql1 = "delete from categories where catid ='$delid'";
		mysqli_query($con , $sql1);
	}

	?>

	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="login-content">
                    <form action="categories.php" method="post">
                        <div class="section-title">
                            <h3> Categories </h3>
                        </div>
                        <div class="textbox-wrap">
                            <div class="input-group">
                                
                                <input type="hidden" name="cid" value="<?=$catdata['catid']?>">
                                <input type="text" required="required" value="<?=$catdata['name']?>" name="Name" class="form-control" placeholder="Name">
                                
                            </div>
                        </div>
                        <br>
                        <div class="login-btn">
                        	<button type="submit" class="btn btn-primary" name="addcat" value="Add Categories">Add Categories</button>
                        	<button type="submit" class="btn btn-primary" name="updatecat" value="Update">Update</button>
					   
					</div>
                        
                     </form>					
                </div>
			</div>

			<div class="col-lg-8">
				<table class="table">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Action</th>
					</tr>

				<?php
				$sql = "SELECT * FROM `categories`";
				$rs = mysqli_query($con,$sql);
				while ($data = mysqli_fetch_array($rs)) {
					// code...

				?>



					<tr>
						<td> <?= $data['catid'] ?> </td>
						<td> <?= $data['name'] ?> </td>
						<td>
							<a href="categories.php?catid=<?= $data['catid'] ?>" class="btn btn-primary">Edit</a>
							<a href="categories.php?delid=<?= $data['catid'] ?>" class="btn btn-danger">Delete</a>
						</td>
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



<?php
if (isset($_POST['addcat'])) {
 	$catname = $_POST['Name'];

 	//print_r($_POST);

 	if (mysqli_query($con,"INSERT INTO `categories`(`name`) VALUES ('$catname')")) {
 		echo "<script> alert('Record inserted') </script>";
 	}
 	else
 	{
 		echo "<script> alert('Record Not inserted') </script>";
 	}
 }




//Update Code
 if (isset($_POST['updatecat'])) {
 	
 	$cid = $_POST['cid'];
 	$catname = $_POST['Name'];

 	//print_r($_POST);

 	if (mysqli_query($con,"UPDATE `categories` SET `name`='$catname' WHERE catid = '$cid'")) {
 		echo "<script> alert('Record Updated') </script>";
 	}
 	else
 	{
 		echo "<script> alert('Record Not Updated') </script>";
 	}


 }

?>
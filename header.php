<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Header</title>
	<!-- link to Bootstrap minified css-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- link to Jquery minified-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- link to Bootstrap JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- link to external CSS -->
		<link rel="stylesheet" type="css" href="index.css">

		
</head>
<body>



	<nav class="nav navbar-inverse" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	        </button>
	        <a class="navbar-brand" href="index.php">TimesJob</a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav navbar-right">

	        	<?php
					session_start();

					if (isset($_SESSION['type'])) {
						if ($_SESSION['type'] == 1) {
						echo '	
						<li> <a href="jobs.php">Add Jobs</a> </li>
		        		<li> <a href="categories.php">Categories</a> </li>
		        		<li> <a href="viewsubmitedapplication.php"> View Application</a></li>
		        		<li> <a href="viewusers.php"> View User </a></li>
		        		<li> <a href="logout.php"> Logout </a></li>
						';
					}else if($_SESSION['type'] == 2){
						echo '

						<li> <a href="index.php"> Home Page </a></li>
						<li> <a href="viewjobs.php"> View Jobs </a></li>
		        		<li> <a href="viewapplication.php"> View Application</a></li>
		        		<li> <a href="logout.php"> Logout </a></li>
		        		<li> <a href="apply.php"> Upload Resume </a></li>
						';

					}
					
					}else{

						echo '

						<li> <a href="index.php"> Home Page </a></li>
						<li> <a href="viewjobs.php"> View Jobs </a></li>
						<li> <a href="login.php"> <span class="glyphicon glyphicon-log-in"></span> Login </a></li>
						<li> <a href="register.php"> <span class="glyphicon glyphicon-user"></span> Register </a></li>


						';
					
					}

					 	
					 
	        	?>

	        	
		        
	        </ul>
	    </div>
	</div>
	    <div class="clearfix"> </div>
	  </div>
	    <!--/.navbar-collapse-->
	</nav>

</body>
</html>

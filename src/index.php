<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<!--Mobile Friendly Support-->
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<meta name="description" content="Student Registration System with PHP, MySQL & JavaScript">
	<meta name="author" content="Md. Asif Salman Malik">

	<title>Student Registration System</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body class="container">
	<!-- Common Header File -->
	<?php include('assets/page/header.php'); ?>

	<div class="row space">
		<div class="col-md-offset-3 col-md-6"> 

			<!-- Add Student Server Side Handling -->
			<?php 
				if(!empty($_POST)){
					include('student.php');
					$st     = new student();
					$result = $st->addStudent();
					if($result){
						echo '<h4 align="center">Data Added Successfully!!!</h4>';
					}else {
						echo '<h4 align="center">Something Went Wrong... Try Again!!!</h4>';
					}
				}
			?>

			<div class="panel panel-primary">
				<div class="panel-heading">
					<p align="center"><strong>Student Registration Form</strong></p>
				</div>
				<div class="panel-body">
					<label><span class="req"> * </span>All Fields are REQUIRED</label>
					<form class="form" method="POST" action="">
						<div class="form-group">
							<label>Student's Name</label>
							<input class="form-control" type="text" name="name" required>
						</div>
						<div class="form-group">
							<label>Guardian's Name</label>
							<input class="form-control" type="text" name="guardian" required>
						</div>
						<div class="form-group">
							<label>Guardian's Occupation</label>
							<input class="form-control" type="text" name="occupation" required>
						</div>
						<div class="form-group">
							<label>Guardian's Contact Number</label>
							<input class="form-control" type="text" name="contact" required>
						</div>
						<div class="form-group">
							<label>Date of Birth</label>
							<input class="form-control" type="text" name="dob" id="date" required>
						</div>
						<div class="form-group">
							<label>Religion</label>
							<input class="form-control" type="text" name="religion" required>
						</div>

						<div class="form-group">
							<label>Address</label>
							<input class="form-control" name="address" required>
						</div>
						<button class="btn btn-primary">Complete Registration</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
	<script type="text/javascript" src="assets/js/index.js"></script>
</html>
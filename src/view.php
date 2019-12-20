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
	<?php include('assets/page/header.php'); ?>

		<div class="row space">
			<div class="col-md-offset-3 col-md-6">

			<div id="statusTrue" class="loading">
				<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<strong><i class="glyphicon glyphicon-ok"></i> Student Information Updated Successfully!</strong> 
				</div>
			</div>
			<div id="statusFalse" class="loading">
				<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<strong><i class="glyphicon glyphicon-remove"></i> Failed to Update Student Information!</strong> 
				</div>
			</div>
			<div id="statusLoading" class="loading">
				<div class="alert" role="alert">
  				<strong><img src="assets/image/reload.gif">  Please Wait..</strong> 
				</div>
			</div>
			<div id="deleteStatusFalse" class="loading">
				<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<strong><i class="glyphicon glyphicon-remove"></i> Failed to Delete Student!</strong> 
				</div>
			</div>
			<div id="deleteStatusTrue" class="loading">
				<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<strong><i class="glyphicon glyphicon-ok"></i> Student Deleted Successfully!</strong> 
				</div>
			</div>

			<table class="table table-striped table-hover table-bordered">
				<thead>
					<tr>
						<th>Student Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<!-- Student Data -->
				<tbody id="studentData">
					
				</tbody>
			</table>
		</div>
	</div>
</body>

<!-- View Modal -->
<div class="modal fade" id="viewStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Student Information</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
        	<tr>
        		<h3 align="center">Student Information</h3>
        	</tr>
        	<tr>
        		<td class="infoTable"><strong>Student ID</strong></td>
        		<td id="stID"></td>
        	</tr>
        	<tr>
        		<td><strong>Name</strong></td>
        		<td id="stName"></td>
        	</tr>
        	<tr>
        		<td><strong>Date of Birth</strong></td>
        		<td id="dob"></td>
        	</tr>
        	<tr>
        		<td><strong>Religion</strong></td>
        		<td id="religion"></td>
        	</tr>
        	<tr>
        		<td><strong>Address</strong></td>
        		<td id="address"></td>
        	</tr>
        	<tr>
        		<td class="infoTable"><strong>Guardian's Name</strong></td>
        		<td id="gName"></td>
        	</tr>
        	<tr>
        		<td><strong>Guardian's Occupation</strong></td>
        		<td id="occupation"></td>
        	</tr>
        	<tr>
        		<td><strong>Guardian's Phone Number</strong></td>
        		<td id="phone"></td>
        	</tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center">Delete Student</h4>
      </div>
      <div class="modal-body">
      	<h3 class="req" align="center">Are You Sure to Delete This Student?</h3>
        <table class="table table-bordered">
        	<tr>
        		<h3 align="center">Student Information</h3>
        	</tr>
        	<tr>
        		<td class="infoTable"><strong>Student ID</strong></td>
        		<td id="stIDDelete"></td>
        	</tr>
        	<tr>
        		<td><strong>Name</strong></td>
        		<td id="stNameDelete"></td>
        	</tr>
        	<tr>
        		<td><strong>Date of Birth</strong></td>
        		<td id="dobDelete"></td>
        	</tr>
        	<tr>
        		<td><strong>Religion</strong></td>
        		<td id="religionDelete"></td>
        	</tr>
        	<tr>
        		<td><strong>Address</strong></td>
        		<td id="addressDelete"></td>
        	</tr>
        	<tr>
        		<td class="infoTable"><strong>Guardian's Name</strong></td>
        		<td id="gNameDelete"></td>
        	</tr>
        	<tr>
        		<td><strong>Guardian's Occupation</strong></td>
        		<td id="occupationDelete"></td>
        	</tr>
        	<tr>
        		<td><strong>Guardian's Phone Number</strong></td>
        		<td id="phoneDelete"></td>
        	</tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Close</button>
        <button class="btn btn-danger pull-right" onclick="deleteStudentSubmit()"  data-dismiss="modal"> <i class="glyphicon glyphicon-trash"></i> Delete</button>

        
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" align="center">Edit Student Information</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
        	<tr>
        		<td class="infoTable"><strong>Student ID</strong></td>
        		<td> <input class="form-control" type="text" id="stIDEdit" readonly="1"></td>
        	</tr>
        	<tr>
        		<td><strong>Name</strong></td>
        		<td> <input class="form-control" type="text" id="stNameEdit"></td>
        	</tr>
        	<tr>
        		<td><strong>Date of Birth</strong></td>
        		<td> <input class="form-control" type="text" id="dobEdit"></td>
        	</tr>
        	<tr>
        		<td><strong>Religion</strong></td>
        		<td> <input class="form-control" type="text" id="religionEdit"></td>
        	</tr>
        	<tr>
        		<td><strong>Address</strong></td>
        		<td> <input class="form-control" type="text" id="addressEdit"></td>
        	</tr>
        	        	<tr>
        		<td><strong>Guardian's Name</strong></td>
        		<td> <input class="form-control" type="text" id="gNameEdit"></td>
        	</tr>
        	<tr>
        		<td><strong>Guardian's Occupation</strong></td>
        		<td> <input class="form-control" type="text" id="occupationEdit"></td>
        	</tr>
        	<tr>
        		<td><strong>Guardian's Phone Number</strong></td>
        		<td> <input class="form-control" type="text" id="phoneEdit"></td>
        	</tr>
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"> <i class="glyphicon glyphicon-remove"></i> Close</button>
        <button class="btn btn-primary pull-right" onclick="editStudentSubmit()"  data-dismiss="modal"> <i class="glyphicon glyphicon-floppy-disk"></i> Save Changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="assets/js/view.js"></script>
</html>
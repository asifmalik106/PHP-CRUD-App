$( "#dobEdit" ).datepicker({
	dateFormat: "dd/mm/yy",
	changeYear:true,
	yearRange: "1980:2012",
	changeMonth: true
});

//Set Student Data to View Student Information Modal
function viewStudent(id, name, guardian, occupation, phone, dob, rel, address)
{
	$('#stID').html(id);
	$('#stName').html(name);
	$('#dob').html(dob);
	$('#religion').html(rel);
	$('#address').html(address);
	$('#gName').html(guardian);
	$('#occupation').html(occupation);
	$('#phone').html(phone);
}

//Set Student Data to Edit Student Information Modal
function editStudent(id, name, guardian, occupation, phone, dob, rel, address){
	$('#stIDEdit').val(id);
	$('#stNameEdit').val(name);
	$('#dobEdit').val(dob);
	$('#religionEdit').val(rel);
	$('#addressEdit').val(address);
	$('#gNameEdit').val(guardian);
	$('#occupationEdit').val(occupation);
	$('#phoneEdit').val(phone);
}

//Set Student Data to Delete Student Modal
function deleteStudent(id, name, guardian, occupation, phone, dob, rel, address){
	$('#stIDDelete').html(id);
  	$('#stNameDelete').html(name);
  	$('#dobDelete').html(dob);
  	$('#religionDelete').html(rel);
  	$('#addressDelete').html(address);
  	$('#gNameDelete').html(guardian);
  	$('#occupationDelete').html(occupation);
  	$('#phoneDelete').html(phone);
}

//Load All Student Data
function viewStudentAll() {

	    $.post("controller.php",
	    {
	        data: "view"
	    },
	    function(data){
	        $('#studentData').html(data);
	    });
}

//Handle Edit Student Information
function editStudentSubmit() {
	$('#statusLoading').fadeIn();
	$.post(
		"controller.php",
    {
        data 		: "edit",
        ID 			: $('#stIDEdit').val(),
        name 		: $('#stNameEdit').val(),
        dob 		: $('#dobEdit').val(),
        rel 		: $('#religionEdit').val(),
        address 	: $('#addressEdit').val(),
        guardian 	: $('#gNameEdit').val(),
        occupation  : $('#occupationEdit').val(),
        phone 		: $('#phoneEdit').val()
    },
    function(data){
    	$('#statusLoading').hide();
    	if(data=='True'){
	    	$("#statusTrue").fadeIn();
        	setTimeout(function(){ 
        		$("#statusTrue").fadeOut(); 
        	}, 5000);
        	viewStudentAll();
    	}else{
    		$("#statusFalse").fadeIn();
        	setTimeout(function(){ 
        		$("#statusFalse").fadeOut(); 
        	}, 5000);
    		viewStudentAll();
    	}
    });
}

//Handle Delete Student
function deleteStudentSubmit(){
	$('#statusLoading').fadeIn();
	$.post(
		"controller.php",
    {
        data 		: "delete",
        ID 			: $('#stIDDelete').html(),
    },
    function(data){
    	$('#statusLoading').hide();
    	if(data=='True'){
	    	$("#deleteStatusTrue").fadeIn();
        	setTimeout(function(){ 
        		$("#deleteStatusTrue").fadeOut(); 
        	}, 5000);
        	viewStudentAll();
    	}else{
    		$("#deleteStatusFalse").fadeIn();
        	setTimeout(function(){ 
        		$("#deleteStatusFalse").fadeOut(); 
        	}, 5000);
    		viewStudentAll();
    	}
    });
}

//Load Student Data
viewStudentAll();
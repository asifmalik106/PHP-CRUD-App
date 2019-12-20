<?php

/* File: controller
 * Author: Asif Salman Malik
 * Description: Handle all server-side requests.
 */

include('student.php');

$st = new student();

if($_POST['data'] == 'edit'){
   $id 			= $_POST['ID'];
   $name 		= $_POST['name'];
   $dob 		= $_POST['dob'];
   $rel 		= $_POST['rel'];
   $address 	= $_POST['address'];
   $guardian 	= $_POST['guardian'];
   $occupation  = $_POST['occupation'];
   $phone 		= $_POST['phone'];
   $result = $st->editStudent($id, $name, $guardian, $occupation, $phone, $dob, $rel, $address);
   if($result){
   		echo "True";
   }
   else{
   	echo "False";
   }
   
}

if ($_POST['data'] == 'delete') {
	$id = $_POST['ID'];
	$result = $st->deleteStudent($id);
   if($result){
   		echo "True";
   }
   else{
   	echo "False";
   }
}

if($_POST['data'] == 'view'){
	$st->getStudent();
}

?>
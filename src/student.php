<?php
include('database.php');
/* Class: student
 * Author: Asif Salman Malik
 * Description: Main Class for add, edit, view, delete student information.
 */
class student
{
	 private $db;

	 function __construct(){
	 	$this->db = new database();
	 }

	public function addStudent(){
		$name = $this->verify($_POST['name']);
		$father = $this->verify($_POST['guardian']);
		$occupation = $this->verify($_POST['occupation']);
		$contact = $this->verify($_POST['contact']);
		$dob = $this->verify($_POST['dob']);
		$religion = $this->verify($_POST['religion']);
		$address = $this->verify($_POST['address']);
		$sql = "INSERT INTO info(name, guardian, occupation, contactNo, dateOfBirth, religion, address) VALUES('$name','$father','$occupation','$contact','$dob','$religion','$address')";
		
		return $this->db->execute($sql);
	}

	public function getStudent()
	{
		$sql = "SELECT * FROM info";
		$result = $this->db->fetch($sql);
		while($row = $result->fetch_assoc()){
			$view = "viewStudent('{$row['id']}','{$row['name']}','{$row['guardian']}','{$row['occupation']}','{$row['contactNo']}','{$row['dateOfBirth']}','{$row['religion']}','{$row['address']}')";
			$edit = "editStudent('{$row['id']}','{$row['name']}','{$row['guardian']}','{$row['occupation']}','{$row['contactNo']}','{$row['dateOfBirth']}','{$row['religion']}','{$row['address']}')";
			$delete = "deleteStudent('{$row['id']}','{$row['name']}','{$row['guardian']}','{$row['occupation']}','{$row['contactNo']}','{$row['dateOfBirth']}','{$row['religion']}','{$row['address']}')";

			echo '<tr>';
			echo '<td>'.$row['name'].'</td>';
			echo '<td> <button class="btn btn-success btn-sm" onclick="'.$view.'" data-toggle="modal" data-target="#viewStudent"> <i class="glyphicon glyphicon-eye-open"></i> View</button> <button class="btn btn-warning btn-sm" onclick="'.$edit.'" data-toggle="modal" data-target="#editStudent"> <i class="glyphicon glyphicon-pencil"></i> Edit</button> <button class="btn btn-danger btn-sm" onclick="'.$delete.'" data-toggle="modal" data-target="#deleteStudent"><i class="glyphicon glyphicon-trash"></i> Delete</button> </td>';
			echo '</tr>';
		}
	}

	public function editStudent($id, $name, $guardian, $occupation, $phone, $dob, $rel, $address){
		$sql = "UPDATE info SET name ='$name', guardian = '$guardian', occupation ='$occupation', contactNo ='$phone', dateOfBirth ='$dob', religion = '$rel', address = '$address' WHERE id = '$id'";
		return $this->db->execute($sql);
	}

	public function deleteStudent($id){
		$sql = "DELETE FROM info WHERE id = '$id'";
		return $this->db->execute($sql);
	}

	//Handle XSS
	public function verify($data){
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
  	}
}
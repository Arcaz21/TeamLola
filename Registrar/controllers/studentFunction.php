<?php include "../models/studentModel.php"; 

$studentModel = new studentModel();

    $db = new studentModel();
    $data['LRN'] = isset ($_REQUEST['LRN'])?$_REQUEST['LRN']:NUll;
	$data['username'] = isset ($_REQUEST['username'])?$_REQUEST['username']:NUll;
	$data['password'] = isset ($_REQUEST['password'])?$_REQUEST['password']:NUll;
	$data['fname'] = isset ($_REQUEST['fname'])?$_REQUEST['fname']:NUll;
	$data['lname'] = isset ($_REQUEST['lname'])?$_REQUEST['lname']:NUll;
    $data['role'] = isset ($_REQUEST['role'])?$_REQUEST['role']:NUll;
    
    $lr = isset ($_REQUEST['value']) ? $_REQUEST['value']:NULL;

$rows = $studentModel->listStudents();
$grades = $studentModel->viewGrades($lr);
//print_r($grades);
?>
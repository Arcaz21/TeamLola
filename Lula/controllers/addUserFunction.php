<?php include "../models/userModel.php";
	$data['id'] = isset ($_REQUEST['id'])?$_REQUEST['id']:NUll;
	$data['username'] = isset ($_REQUEST['username'])?$_REQUEST['username']:NUll;
	$data['password'] = isset ($_REQUEST['password'])?$_REQUEST['password']:NUll;
	$data['fname'] = isset ($_REQUEST['fname'])?$_REQUEST['fname']:NUll;
	$data['lname'] = isset ($_REQUEST['lname'])?$_REQUEST['lname']:NUll;
	$data['role'] = isset ($_REQUEST['role'])?$_REQUEST['role']:NUll;


$userModel = new userModel();


	if (isset ($_REQUEST['submit']) && $_REQUEST['submit'] == "Add"){

		$result = $userModel->add($data); 

		if ($result) 
		echo "<center><h2><font color=#5cb85c>New User Info Added to Database:)</font></h2></center>";

		else 
		echo "<center><h2><font color=red>There is an error in adding the item :(</h2></center>";

	}
//------------------------------------Delete USers

	$userModel->close();
?>
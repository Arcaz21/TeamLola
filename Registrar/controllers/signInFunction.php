<?php 
	include "../models/userModel.php";
	$LOGGED_IN = FALSE;	


	$username = isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
	$password = isset($_REQUEST['password'])?$_REQUEST['password']:NULL;

	$db = new userModel();
	


	if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == "LOG ME IN") {
		$role = "registrar";
		$result = $db->userExists($username, $password,$role);
		


		if ($result) {
			$LOGGED_IN = TRUE;
/*				session_start();
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;*/
		} 



	}


	$db->close();
?>	
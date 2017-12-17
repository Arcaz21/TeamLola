<?php 
	include "../models/userModel.php";
	$LOGGED_IN = FALSE;	


	$username = isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
	$password = isset($_REQUEST['password'])?$_REQUEST['password']:NULL;

	$db = new userModel();
	


	if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == "LOG ME IN") {
		$result = $db->userExists($username, $password);
		


		if ($result) {
			$LOGGED_IN = TRUE;
/*				session_start();
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;*/
		} else {?> 



<center>
	<div style="z-index: 3">
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<h2 style="color: red">Invalid Username or Password</h2>	
<h4>Please Try Again</h4>	
	</div>

</center>
<?php

	}
}

	$db->close();
?>	
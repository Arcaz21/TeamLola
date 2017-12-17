<?php include "../models/userModel.php"; 

	$username = isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
	$password = isset($_REQUEST['password'])?$_REQUEST['password']:NULL;
	
$db = new userModel();
$data = $db->getUser ($password);

 echo $data->fname;



?>
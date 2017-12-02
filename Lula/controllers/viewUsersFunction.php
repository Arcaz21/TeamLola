<?php include "../models/userModel.php"; ?>
<?php

	// default value of $select 
	$select = "no";
	$delete = "no";

	$select = isset ($_REQUEST['select']) ? $_REQUEST['select']:"no";
	$delete = isset ($_REQUEST['delete']) ? $_REQUEST['delete']:"no";
	$username = isset ($_REQUEST['username']) ? $_REQUEST['username']:NULL;
	$id = isset ($_REQUEST['id']) ? $_REQUEST['id']:NULL;
	$userModel = new userModel();
//----------------------------------View all user in a table
	if ($select == "yes") {
		$rows = $userModel->selectAll();
	}
	//----------------------------------Delete users
		if ($select == "yes" && $delete == "yes" && isset($id)){
			$result = $userModel -> delete($id);

				if ($result){
					echo "Data succesfully deleted.";
					echo "
						<script>
							window.location.href = \"viewUsers.php?select=yes\";
						</script>	
						";
			}else echo "wronggg";
		}
	$userModel->close();
?>
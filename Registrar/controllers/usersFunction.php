
<?php

include "../models/userModel.php"; 
	$username = isset ($_REQUEST['username']) ? $_REQUEST['username']:NULL;
	$id = isset ($_REQUEST['id']) ? $_REQUEST['id']:NULL;
	$userModel = new userModel();
//----------------------------------View all user in a table
	
		$rows = $userModel->selectAll();
	
	//----------------------------------Delete users
/*		if ($select == "yes" && $delete == "yes" && isset($id)){
			$result = $userModel -> delete($id);

				if ($result){
					echo "Data succesfully deleted.";
					echo "
						<script>
							window.location.href = \"viewUsers.php?select=yes\";
						</script>	
						";
			}else echo "wronggg";
		}*/

$delete = "no";
$delete = isset ($_REQUEST['delete']) ? $_REQUEST['delete']:"no";

$db = new userModel();
$data['id'] = isset ($_REQUEST['id'])?$_REQUEST['id']:NUll;
	$data['username'] = isset ($_REQUEST['username'])?$_REQUEST['username']:NUll;
	$data['password'] = isset ($_REQUEST['password'])?$_REQUEST['password']:NUll;
	$data['fname'] = isset ($_REQUEST['fname'])?$_REQUEST['fname']:NUll;
	$data['lname'] = isset ($_REQUEST['lname'])?$_REQUEST['lname']:NUll;
	$data['role'] = isset ($_REQUEST['role'])?$_REQUEST['role']:NUll;


		//UPDATE
		if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Update") {
		$db->update($data);
		if($db){	
			echo "<script>
			window.location.href = \"../views/admin1.php?view=yes\";
		</script>	
			";
		}else{ echo "Error Updating";
		
		}
		}

		//ADD
		if (isset ($_REQUEST['submit']) && $_REQUEST['submit'] == "Add"){
		$db->add($data);
		if($db){
			echo "<script>
			window.location.href = \"../views/admin1.php?view=yes\";
		</script>	
			";
		}else{ echo "Error Adding";
			
		}
		}
		//DELETE
		if ($delete == 'yes' && isset($id)){
			$db->delete($id);
			if($db){
				echo "<script>
				window.location.href = \"../views/admin1.php?view=yes\";
			</script>	
				";
			}else{ echo "Error Deleting";
				
			}
			}




	$userModel->close();
?>
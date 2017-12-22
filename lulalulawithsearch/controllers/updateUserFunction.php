
<?php
	$db = new userModel();
	$data['username'] = isset ($_REQUEST['username'])?$_REQUEST['username']:NUll;
	$data['password'] = isset ($_REQUEST['password'])?$_REQUEST['password']:NUll;
	$data['fname'] = isset ($_REQUEST['fname'])?$_REQUEST['fname']:NUll;
	$data['lname'] = isset ($_REQUEST['lname'])?$_REQUEST['lname']:NUll;
	$data['role'] = isset ($_REQUEST['role'])?$_REQUEST['role']:NUll;

	
		if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Update") {
		$db->update($data);
		if($data){
			echo "okay";
		}else echo "eroororor";
		echo "<script>
				window.location.href = \"../views/admin1.php\";
			</script>	
				";

		
	}

	$db->close();
?>
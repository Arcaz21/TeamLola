
<?php

include "../models/guardiansModel.php"; 
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





/*=========================================================================================== FOR STUDENTS FUNCTION*/




$studentModel = new studentModel();

    $db = new studentModel();
    $data['LRN'] = isset ($_REQUEST['LRN'])?$_REQUEST['LRN']:NUll;
	$data['username'] = isset ($_REQUEST['username'])?$_REQUEST['username']:NUll;
	$data['password'] = isset ($_REQUEST['password'])?$_REQUEST['password']:NUll;
	$data['fname'] = isset ($_REQUEST['fname'])?$_REQUEST['fname']:NUll;
	$data['lname'] = isset ($_REQUEST['lname'])?$_REQUEST['lname']:NUll;
    $data['role'] = isset ($_REQUEST['role'])?$_REQUEST['role']:NUll;
    
    $viewgrade = "no";
    $viewgrade = isset ($_REQUEST['viewgrade']) ? $_REQUEST['viewgrade']:"no";
    if($viewgrade =="yes"){
        header("location: grades.php");
    }

    $usr = isset ($_SESSION['username']) ? $_SESSION['username']:NULL;


    $rowsk1 = $studentModel->listStudentsk1();
    $rowsk2 = $studentModel->listStudentsk2();
    $rowsg1 = $studentModel->listStudentsg1();
    $rowsg2 = $studentModel->listStudentsg2();
    $rowsg3 = $studentModel->listStudentsg3();

    $gk1 = $studentModel->gk1();
    $gk2 = $studentModel->gk2();
    $gg1 = $studentModel->gg1();
    $gg2 = $studentModel->gg2();
    $gg3 = $studentModel->gg3();

 $usern = isset ($_REQUEST['value']) ? $_REQUEST['value']:NULL;
 if(isset ($_REQUEST['note']) ? $_REQUEST['note']:NULL){
    $get = isset ($_REQUEST['note']) ? $_REQUEST['note']:NULL;
    $getbal = $db->getbal($get);
 }
    $getRep = $db->getRep();
 

if($usern){
    	$userinfo = $studentModel->viewUinfo($usern);
    }

 $searchname = isset ($_REQUEST['value']) ? $_REQUEST['value']:NULL;

/*if($searchname){
    	$searchf = $studentModel->searchN($searchname);
    }*/

    if($usr){
         
         $studinfo = $studentModel->viewSinfo($usr);
    }










    










































	$userModel->close();
?>
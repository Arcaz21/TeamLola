
<?php

include "../models/registrarsModel.php"; 
	$username = isset ($_REQUEST['username']) ? $_REQUEST['username']:NULL;
	$id = isset ($_REQUEST['id']) ? $_REQUEST['id']:NULL;
	$userModel = new userModel();
//----------------------------------View all user in a table
	
		$rows = $userModel->selectAll();
	
	







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

    $lr = isset ($_REQUEST['value']) ? $_REQUEST['value']:NULL;


    $rowsk1 = $studentModel->listStudentsk1();
    $rowsk2 = $studentModel->listStudentsk2();
    $rowsg1 = $studentModel->listStudentsg1();
    $rowsg2 = $studentModel->listStudentsg2();
    $rowsg3 = $studentModel->listStudentsg3();









    if($lr){
         $sname= $studentModel->viewSname($lr);
         $studinfo = $studentModel->viewSinfo($lr);
    }


$guarduser = $studentModel->guardianuser();


        if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "SUBMIT NEW STUDENT"){
        $newS['LRN']= isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
        $newS['fName']= isset($_REQUEST['fName'])?$_REQUEST['fName']:NULL;
        $newS['lName']= isset($_REQUEST['lName'])?$_REQUEST['lName']:NULL;
        $newS['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        $newS['mtongue']= isset($_REQUEST['mtongue'])?$_REQUEST['mtongue']:NULL;
        $newS['age']= isset($_REQUEST['age'])?$_REQUEST['age']:NULL;
        $newS['ipGroup']= isset($_REQUEST['ipGroup'])?$_REQUEST['ipGroup']:NULL;
        $newS['birthday']= isset($_REQUEST['birthday'])?$_REQUEST['birthday']:NULL;
        $newS['address']= isset($_REQUEST['address'])?$_REQUEST['address']:NULL;
        $newS['father']= isset($_REQUEST['father'])?$_REQUEST['father']:NULL;
        $newS['mother']= isset($_REQUEST['mother'])?$_REQUEST['mother']:NULL;
        $newS['guardianID']= isset($_REQUEST['guardianID'])?$_REQUEST['guardianID']:NULL;
        $newS['gFname']= isset($_REQUEST['gFname'])?$_REQUEST['gFname']:NULL;
        $newS['gLname']= isset($_REQUEST['gLname'])?$_REQUEST['gLname']:NULL;
        $newS['password']= isset($_REQUEST['password'])?$_REQUEST['password']:NULL;
        $newS['contact']= isset($_REQUEST['contact'])?$_REQUEST['contact']:NULL;
        $newS['role']= "guardian";
        

        $result = $db->addnewGuardian($newS);
        if($result){
            echo "<meta http-equiv='refresh' content='0'>";
        }else{ echo "wrong";}

        $result2 = $db->addnewStudent($newS);
        if($result2){
            $acc['LRN'] = isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
            $acc['misc'] = 6000;
            $tuition = NUll;
            if($newS['levelID'] == 11 || $newS['levelID'] == 22){
                $tuition = 1100;
            }if($newS['levelID'] == 1 || $newS['levelID'] == 2 || $newS['levelID'] == 3){
                $tuition = 1200; 
            }
            $acc['tuition'] = $tuition;
            $acc['entrance'] = 2500;
            $acc['total'] = ($acc['tuition']+$acc['misc']+$acc['entrance']);
           $test =  $db->addAcc($acc);
            echo "<meta http-equiv='refresh' content='0'>";
        }else{ echo "wrong";}
        $result = $db->addnewUserfromS($newS);
        if($result){
            echo "<meta http-equiv='refresh' content='0'>";
        }else{ echo "wrong";}

        

    }

    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "SUBMIT NEW USER"){
        $newU['username']= isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
        $newU['password']= isset($_REQUEST['password'])?$_REQUEST['password']:NULL;
      	$newU['fName']= isset($_REQUEST['fName'])?$_REQUEST['fName']:NULL;
        $newU['lName']= isset($_REQUEST['lName'])?$_REQUEST['lName']:NULL;
        $newU['role']= isset($_REQUEST['role'])?$_REQUEST['role']:NULL;
        

        $result = $db->addnewUser($newU);
     /*   $usernamecheck = $db->addnewUsercheck($newU);
        if($usernamecheck == 1){
            echo "<script>alert('Username Exist! Please try with another username')</script>";
        }else{}*/
            if($result){
            /*echo "<meta http-equiv='refresh' content='0'>";*/
        }else{ die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));}
        
        

    
    }


    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "EDIT STUDENT INFO"){
        $editS['LRN']= isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
        $editS['fName']= isset($_REQUEST['fName'])?$_REQUEST['fName']:NULL;
        $editS['lName']= isset($_REQUEST['lName'])?$_REQUEST['lName']:NULL;
        $editS['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        $editS['mtongue']= isset($_REQUEST['mtongue'])?$_REQUEST['mtongue']:NULL;
        $editS['age']= isset($_REQUEST['age'])?$_REQUEST['age']:NULL;
        $editS['ipGroup']= isset($_REQUEST['ipGroup'])?$_REQUEST['ipGroup']:NULL;
        $editS['birthday']= isset($_REQUEST['birthday'])?$_REQUEST['birthday']:NULL;
        $editS['address']= isset($_REQUEST['address'])?$_REQUEST['address']:NULL;
        $editS['father']= isset($_REQUEST['father'])?$_REQUEST['father']:NULL;
        $editS['mother']= isset($_REQUEST['mother'])?$_REQUEST['mother']:NULL;

        $result = $db->updateStudent($editS);
        if($result){
            echo "<script>alert('Student Information Updated!')</script>";
        	echo "<meta http-equiv='refresh' content='0'>";
        }else{ echo "wrong";}

    }

    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "SUBMIT NEW RECORD"){
        $updateS['LRN']= isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
        $updateS['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        $updateS['syid']= isset($_REQUEST['syid'])?$_REQUEST['syid']:NULL;
      

        $result = $db->updateSY($updateS);
        $result2 = $db->updateSYtolevel($updateS);
        if($result){
            echo "<meta http-equiv='refresh' content='0'>";
        }else{ echo "wrong";}
        if($result2){
            echo "<meta http-equiv='refresh' content='0'>";
        }else{ echo "wrong";}

    }

    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "YES PLEASE"){
        $lr = isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
        $guardlr = isset($_REQUEST['guardianID'])?$_REQUEST['guardianID']:NULL;  
        $guarduslr = isset($_REQUEST['guardianID'])?$_REQUEST['guardianID']:NULL; 

         
        $result1 = $db->deleteG($guardlr);  
        $result2 = $db->deleteGU($guarduslr);
        $result3 = $db->deleteStudA($lr);
        $result = $db->deleteS($lr);



        if($result1){    
            echo "<meta http-equiv='refresh' content='0'>";
        }
        if($result2){
        	echo "<meta http-equiv='refresh' content='0'>";
        }
        if($result3){
            echo "<meta http-equiv='refresh' content='0'>";
        }
        if($result){
            echo "<meta http-equiv='refresh' content='0'>";
        }
    

    }
    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "SUBMIT FINAL"){
        $lr = isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
        
        $rec['LRN']= isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
        $rec['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;

        $result = $db->noEdit($lr);
        $result1 = $db->record($rec);


        
        if($result){
            echo "<meta http-equiv='refresh' content='0'>";
        }
        if($result1){
            echo "<meta http-equiv='refresh' content='0'>";
        }
    

    }
    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "EDIT GRADE"){
        $up['LRN']= isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
        $up['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        $up['subjectID']= isset($_REQUEST['subjectID'])?$_REQUEST['subjectID']:NULL;
        $up['grade']= isset($_REQUEST['grade'])?$_REQUEST['grade']:NULL;
        $up['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        $result = $db->updateGrades($up);

        
        if($result){
            $URL = "editgrade.php?viewgrade=yes";
            echo "<script>
                        window.location.href = '$URL'
                    </script>   
                        ";
        }else{}
    }
    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "ADD GRADE"){
    $up['LRN']= isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
        $up['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        $up['subjectID']= isset($_REQUEST['subjectID'])?$_REQUEST['subjectID']:NULL;
        $up['grade']= isset($_REQUEST['grade'])?$_REQUEST['grade']:NULL;
        $up['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        $result = $db->updateGrades($up);

        
        if($result){
            $URL = "editgrade.php?viewgrade=yes";
            echo "<script>
                        window.location.href = '$URL'
                    </script>   
                        ";
        }else{}
    }

if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "SEARCH"){
    $se['search']= isset($_REQUEST['search'])?$_REQUEST['search']:NULL;
        $search = $db->search($se);
        
        if($search){
            return $search;
        }else{
            $res = "no results found";
            return $res;
        }
    }





































	$userModel->close();
?>
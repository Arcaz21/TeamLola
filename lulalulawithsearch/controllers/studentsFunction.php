<?php include "../models/studentModel.php"; 

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

    $gk1 = $studentModel->gk1();
    $gk2 = $studentModel->gk2();
    $gg1 = $studentModel->gg1();
    $gg2 = $studentModel->gg2();
    $gg3 = $studentModel->gg3();


    if($lr){
         $grades = $studentModel->viewGrades($lr);
         $sname= $studentModel->viewSname($lr);
         
    }
    $addGrades = $studentModel->viewGrades($lr);

    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "EDIT GRADE"){
        $up['LRN']= isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
        $up['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        $up['subjectID']= isset($_REQUEST['subjectID'])?$_REQUEST['subjectID']:NULL;
        $up['grade']= isset($_REQUEST['grade'])?$_REQUEST['grade']:NULL;
        $up['levelID']= isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        $result = $db->updateGrades($up);


        // foreach ($_REQUEST['grade'] as $grade) {
        //     $up['grade'] = $grade;
            
        //     echo "<br>";
        //     //$result = $db->updateGrades($up);
        // }
        // print_r(count($_REQUEST['subjectID']));
        // for($a=0;$a < (count($_REQUEST['subjectID']));$a++){
        //     $up['subjectID'] = $_REQUEST['subjectID'];
        //     $up['grade'] = $_REQUEST['grade'];
        //     echo "<br>";
        //     print_r($up['grade'][$a]);
        //     echo "<br>";
        //     print_r($up['subjectID'][$a]);

            

        // }
        // foreach ($_REQUEST['subjectID'] as $subjectID) {

        //     $up['subjectID'] = $subjectID;
        //     $grade = $_REQUEST['grade'];
        //     print_r($subjectID);
        //     print_r($grade);
        //     echo "<br>";
            
        // }

        //$up['subjectID'] = isset($_REQUEST['subjectID'])?$_REQUEST['subjectID']:NULL;
        // $up['levelID'] = isset($_REQUEST['levelID'])?$_REQUEST['levelID']:NULL;
        // $up['grade'] = isset($_REQUEST['grade'])?$_REQUEST['grade']:NULL;
        
        
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

<?php

include "../models/userModel.php"; 
    $username = isset ($_REQUEST['username']) ? $_REQUEST['username']:NULL;
    $id = isset ($_REQUEST['id']) ? $_REQUEST['id']:NULL;
    $userModel = new userModel();
//----------------------------------View all user in a table
    
        $rows = $userModel->selectAll();
    
    //----------------------------------Delete users
/*      if ($select == "yes" && $delete == "yes" && isset($id)){
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

$dbb = new userModel();
$data['id'] = isset ($_REQUEST['id'])?$_REQUEST['id']:NUll;
    $data['username'] = isset ($_REQUEST['username'])?$_REQUEST['username']:NUll;
    $data['password'] = isset ($_REQUEST['password'])?$_REQUEST['password']:NUll;
    $data['fname'] = isset ($_REQUEST['fname'])?$_REQUEST['fname']:NUll;
    $data['lname'] = isset ($_REQUEST['lname'])?$_REQUEST['lname']:NUll;
    $data['role'] = isset ($_REQUEST['role'])?$_REQUEST['role']:NUll;


        //UPDATE
        if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Update") {
        $dbb->update($data);
        if($dbb){   
            echo "<script>
            window.location.href = \"../views/admin1.php?view=yes\";
        </script>   
            ";
        }else{ echo "Error Updating";
        
        }
        }

        //ADD
        if (isset ($_REQUEST['submit']) && $_REQUEST['submit'] == "Add"){
        $dbb->add($data);
        if($dbb){
            echo "<script>
            window.location.href = \"../views/admin1.php?view=yes\";
        </script>   
            ";
        }else{ echo "Error Adding";
            
        }
        }
        //DELETE
        if ($delete == 'yes' && isset($id)){
            $dbb->delete($id);
            if($dbb){
                echo "<script>
                window.location.href = \"../views/admin1.php?view=yes\";
            </script>   
                ";
            }else{ echo "Error Deleting";
                
            }
            }






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

    $gk1 = $studentModel->gk1();
    $gk2 = $studentModel->gk2();
    $gg1 = $studentModel->gg1();
    $gg2 = $studentModel->gg2();
    $gg3 = $studentModel->gg3();

//Billing
$billsk1 = $studentModel->billsK1();
$billsk2 = $studentModel->billsK2();
$billsg1 = $studentModel->billsG1();
$billsg2 = $studentModel->billsG2();
$billsg3 = $studentModel->billsG3();

 if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "TRANSACT"){
    //$trans['LRN'] = isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;
    //$trans['fName'] = isset($_REQUEST['lName'])?$_REQUEST['lName']:NULL;
    //$trans['lName'] = isset($_REQUEST['lName'])?$_REQUEST['lName']:NULL;
    $trans['tuition'] = isset($_REQUEST['tuition'])?$_REQUEST['tuition']:NULL;
    $trans['misc'] = isset($_REQUEST['misc'])?$_REQUEST['misc']:NULL;
    $trans['entrance'] = isset($_REQUEST['entrance'])?$_REQUEST['entrance']:NULL;
    $lrn = isset($_REQUEST['LRN'])?$_REQUEST['LRN']:NULL;

    $in['misc_pay'] = $trans['misc'];
    $in['tuition_pay'] = $trans['tuition'];
    $in['entrance_pay'] = $trans['entrance'];
    

    $stud = $studentModel->billStud($lrn);
    //subtract payment to current balance
    error_reporting(E_ERROR | E_PARSE); foreach ($stud as $index => $value):
        $trans['misc'] = $value['misc']-$trans['misc'];
        $trans['tuition'] = $value['tuition']-$trans['tuition'];
        $trans['entrance'] = $value['entrance']-$trans['entrance'];
        $total_due = $trans['misc']+$trans['tuition']+$trans['entrance'];
    endforeach;
    $trans['total'] = array_sum($trans);
    //update account
    $pay = $studentModel->payment($trans,$lrn);
    if($pay){
        $invoice='RS-'.$studentModel->createRandomInvoice();
        $in['invoice_num'] = $invoice;
        $in['total_pay'] = array_sum($in);
        $in['due'] = $total_due;
        $in['cashier'] = $_SESSION['username'];
        //remove unkown whitespace
        $string = str_replace(' ', '', $lrn);
        $in['LRN'] = $string;
        $add = $studentModel->addIn($in);
        if($add){
            
                $URL = "preview1.php?note=".$in['invoice_num'];
                echo "
                    <script>
                        window.location.href = '$URL';
                    </script>   
                ";
            
        }
    }


 } 
 if(isset($_GET['note'])){
    $inNum = isset ($_REQUEST['note'])?$_REQUEST['note']:NUll;
    $get = $studentModel->InvoiceInfo($inNum);
 }


 $searchname = isset ($_REQUEST['value']) ? $_REQUEST['value']:NULL;

/*if($searchname){
        $searchf = $studentModel->searchN($searchname);
    }*/

    if($lr){
         $grades = $studentModel->viewGrades($lr);
         $sname= $studentModel->viewSname($lr);
         $studinfo = $studentModel->viewSinfo($lr);
    }


$guarduser = $studentModel->guardianuser();

    $addGrades = $studentModel->viewGrades($lr);

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
        if($result){
            echo "<meta http-equiv='refresh' content='0'>";
        }else{ die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));}

        

        

    }


    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "EDIT USER"){
        $editU['username']= isset($_REQUEST['username'])?$_REQUEST['username']:NULL;
        $editU['password']= isset($_REQUEST['password'])?$_REQUEST['password']:NULL;
        $editU['fname']= isset($_REQUEST['fname'])?$_REQUEST['fname']:NULL;
        $editU['lname']= isset($_REQUEST['lname'])?$_REQUEST['lname']:NULL;
        $editU['role']= isset($_REQUEST['role'])?$_REQUEST['role']:NULL;
        $editU['id']= isset($_REQUEST['id'])?$_REQUEST['id']:NULL;

        $result = $db->updateUser($editU);
        if($result){
            echo "<meta http-equiv='refresh' content='0'>";
        }else{ echo "wrong";}

    }

    if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "YES PLEASE"){

        $result = $db->deleteU($usern);
        if($result){
            echo "<meta http-equiv='refresh' content='0'>";
        }else{ echo "dada";}

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

    $userModel->close();
?>
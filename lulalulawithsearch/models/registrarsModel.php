<?php include "../models/DBconnection.php"; 
?>

<?php
/*===================================================================================== FOR USER MODEL*/
	class userModel extends DBconnection {

		function add($data){

			$query = "INSERT INTO users (username, password, fname, lname, role) 
			VALUES (
			\"".$data['username']."\",
			\"".$data['password']."\",
			\"".$data['fname']."\",
			\"".$data['lname']."\",
			\"".$data['role']."\"
			)";

			$result = mysqli_query($this->conn, $query);
			return (($result)? TRUE:FALSE);
		}

		function userExists($username, $password) {
			
			$query = "SELECT username, password, fname, lname, role FROM users
					  WHERE username = \"".$username."\" AND password = \"".$password."\"
					  LIMIT 1
					  ";
					  

			$result = mysqli_query($this->conn, $query);

			if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error());
			}
			return (($result->num_rows==1)? TRUE: FALSE);
}


		function selectAll(){

			$query = "SELECT * FROM users";
			$result = mysqli_query($this->conn, $query);


			$res = array();
			while ($row = mysqli_fetch_array($result)){
				array_push($res, $row);
			}

			return ($result->num_rows>0)? $res: FALSE;


		}

			function getUser($id) {
				
				$query = "SELECT id, username, password, fname, lname, role FROM users
						WHERE id = $id 
						";
						

				$result = mysqli_query($this->conn, $query);
				
				if(!$result) {
					die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
				}
				$data = $result->fetch_object();
				
				return $data;
			}

		function getUse($username) {
			
			$query = "SELECT username, password, fname, lname, role FROM users
					  WHERE username = \"".$username."\"
					  LIMIT 1
					  ";

			$result = mysqli_query($this->conn, $query);
			
			// if there is an error in your query, an error message is displayed.
			if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
			$row = $result->fetch_object();
			return $row;
		}

			

		function update($data){
			$query = "UPDATE users 
					  SET 
						username = \"".$data['username']."\",
						password = \"".$data['password']."\",
						fname = \"".$data['fname']."\",
						lname = \"".$data['lname']."\",
						role = \"".$data['role']."\"
					  WHERE 
					  id = \"".$data['id']."\"";		  	
			$result = mysqli_query($this->conn, $query);
			// if there is an error in your query, an error message is displayed.
			if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}

			return $result;
		}
        


}




















/*===================================================================================== FOR STUDENTS MODEL*/
class studentModel extends DBconnection {
                function addAcc($acc){
                    $query ="INSERT into s_account (LRN, misc_balance, tuition_balance, entrance_balance, total)
                    VALUES (\"".$acc['LRN']."\",\"".$acc['misc']."\",\"".$acc['tuition']."\",\"".$acc['entrance']."\",\"".$acc['total']."\")";
                    $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        return $result;                }
                }

            	function listStudentsk1(){
                    $query = "SELECT * from student WHERE levelID = 11 ";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function listStudentsk2(){
                    $query = "SELECT * from student WHERE levelID = 22  ";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function listStudentsg1(){
                    $query = "SELECT * from student WHERE levelID = 1  ";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function listStudentsg2(){
                    $query = "SELECT * from student WHERE levelID = 2 ";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function listStudentsg3(){
                    $query = "SELECT * from student WHERE levelID = 3  ";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }


                function viewSname($LRN){
                    $query = "SELECT (student.fName) as fName, (student.lName) as lName FROM student
                    WHERE student.LRN = \"".$LRN."\"";
                    $result = mysqli_query($this->conn, $query);
                    
                    $res = array(); 
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function viewSinfo($LRN){
                    $query = "SELECT student.LRN, student.fName, student.lName, student.levelID, (select sy.syname from sy where sy.syid = student.syid) as syname, (select level.levelName from level where level.levelID=student.levelID) as level, student.levelID, student.age, student.mtongue, student.ipGroup, student.birthday, student.address, student.mother, student.father, (select guardian.fName from guardian where guardian.guardianID = student.guardianID) as guardianf, (select guardian.lName from guardian where guardian.guardianID = student.guardianID) as guardianl, (select guardian.contact from guardian where guardian.guardianID = student.guardianID) as contact, guardian.guardianID FROM student join guardian on student.guardianID = guardian.guardianID join level on level.levelID = student.levelID join sy on sy.syid = student.syid
						WHERE student.LRN = \"".$LRN."\" ";
                    $result = mysqli_query($this->conn, $query);
                    
                    $res = array(); 
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }

                function viewUinfo($usern){
                     $query = "SELECT * from users
						WHERE id = \"".$usern."\" ";
                    $result = mysqli_query($this->conn, $query);
                    
                    $res = array(); 
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                /*function searchN($searchname){
                     $query = "SELECT * from student
						WHERE fName LIKE \""%$searchname%"\" ";
                    $result = mysqli_query($this->conn, $query);
                    
                    $res = array(); 
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }*/
                function deleteS($lr){
			$query = "DELETE FROM student WHERE LRN = \"".$lr."\" ";
            
			$result = mysqli_query($this->conn, $query);
                        
                       
                    // if there is an error in your query, an error message is displayed.
                    
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        
                        return $result;
                    }
		}
        function deleteG($guardlr){
            $query = "DELETE FROM guardian WHERE guardianID = \"".$guardlr."\" ";
           
            $result = mysqli_query($this->conn, $query);
                        
                       
                    // if there is an error in your query, an error message is displayed.
                    
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        
                        return $result;
                    }
        }
        function deleteGU($guarduslr){
            $query = "DELETE FROM users WHERE username = \"".$guarduslr."\" ";
           
            $result = mysqli_query($this->conn, $query);
                        
                       
                    // if there is an error in your query, an error message is displayed.
                    
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        
                        return $result;
                    }
        }
        function deleteStudA($lr){
            $query = "DELETE FROM s_account WHERE LRN = \"".$lr."\" ";
           
            $result = mysqli_query($this->conn, $query);
                        
                       
                    // if there is an error in your query, an error message is displayed.
                    
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        
                        return $result;
                    }
        }

				function guardianuser(){
                    $query = "SELECT guardianID FROM guardian ";
                    $result = mysqli_query($this->conn, $query);
                    
                    $res = array(); 
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }


                function updateGrades($up){
                    /*print_r(count($up['subjectID']));*/
                    for($a=0;$a < count($up['subjectID']); $a++){
                        $query = "UPDATE grade 
                        SET
                        grade=\"".$up['grade'][$a]."\"
                        WHERE LRN = \"".$up['LRN']."\" AND levelID =\"".$up['levelID']."\" AND
                        subjectID=\"".$up['subjectID'][$a]."\"";
                        $result = mysqli_query($this->conn, $query);
                        echo "<br>";
                        
                    }
                    
                    $status = mysqli_affected_rows($this->conn);
                    // if there is an error in your query, an error message is displayed.
                    
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        if($status > 0){
                            $_SESSION['status'] = "GRADES UPDATED";
                        }else{
                            unset($_SESSION['status']);
                        }
                        return $result;
                    }
                }

                 function noEdit($lr){
                        $query = "UPDATE student
                        SET
                        editable = 'no'
                        WHERE LRN = '".$lr."' ";
                        
                    
                    
                    $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        /*echo "<script>alert('Edit Successful!')</script>";*/
                        return $result;
                    }
                }

                function record($rec){
                    $query=" INSERT INTO records (LRN, levelID, syid) 
                    VALUES ('" . $rec['LRN'] . "','" . $rec['levelID'] . "','17-18')";

                    $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        echo "<script>alert('New Final Record Added!')</script>";
                        return $result;
                    }
                }


                function getStudent($id) {
                    $query = "SELECT LRN,lName,fName FROM student WHERE LRN = $id";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function getUse($username) {
            
                    $query = "SELECT username, password, fname, lname, role FROM users
                              WHERE username = \"".$username."\"
                              LIMIT 1
                              ";

                    $result = mysqli_query($this->conn, $query);
                    
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }
                    $row = $result->fetch_object();
                    return $row;
                }
                function addGrade(){
                    $query = "UPDATE grade 
                    SET
                    grade=\"".$up['grade']."\"
                    WHERE LRN = \"".$up['LRN']."\" AND levelID =\"".$up['levelID']."\" AND
                    subjectID=\"".$up['subjectID']."\"";
                    $result = mysqli_query($this->conn, $query);
                    $status = mysqli_affected_rows($this->conn);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        if($status > 0){
                            $_SESSION['status'] = "GRADES UPDATED";
                        }else{
                            unset($_SESSION['status']);
                        }
                        return $result;
                    }
                }
                function viewAdd(){
                    $query="SELECT * from subject";
                    $result = mysqli_query($this->conn, $query);
                    
                    $res = array();
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }


                function addnewGuardian($newS){
                    $query=" INSERT INTO guardian (guardianID, fName, lName, contact, password) 
                    VALUES ('" . $newS['guardianID'] . "','" . $newS['gFname'] . "','" . $newS['gLname'] . "',
                    " . $newS['contact'] . ",'" . $newS['password'] . "' )";
                /*\"".$newS['guardianID']."\", \"".$newS['gFname']."\", \"".$newS['gLname']."\", \"".$newS['contact']."\", \"".$newS['password']."\"*/
        $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        
                    }else{
                        return $result;
                    }
                }

    function addnewStudent($newS){
                    $query=" INSERT INTO student (LRN, fName, lName, levelID, age, mtongue, ipGroup, birthday, address, mother, father, guardianID ) 
                    VALUES (\"".$newS['LRN']."\", \"".$newS['fName']."\", \"".$newS['lName']."\", \"".$newS['levelID']."\", \"".$newS['age']."\", \"".$newS['mtongue']."\", \"".$newS['ipGroup']."\", \"".$newS['birthday']."\", \"".$newS['address']."\", \"".$newS['mother']."\", \"".$newS['father']."\", \"".$newS['guardianID']."\" )";
                
        $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        return $result;
                    }
    }
        function addnewUser($newU){
                    $query=" INSERT INTO users (id,username, password, fname, lname, role ) 
                    VALUES (NULL, \"".$newU['username']."\",\"".$newU['password']."\", \"".$newU['fName']."\", \"".$newU['lName']."\", \"".$newU['role']."\" )";
                
        $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        return $result;
                    }
    
/*    function addnewUsercheck($newU){
                    $sql=mysql_query("SELECT * from users WHERE username = '" . $newU['username'] . "' ");
                    $ret = 0;
                    
                    if(mysql_num_rows($sql)>=1){
                        $ret = 1;
                        return $ret;
                         header("location: indexs.php");
                    }else{
                        return $ret;
                    }*/
                    
    }
    function addnewUserfromS($newS){
                    $query=" INSERT INTO users (id,username, password, fname, lname, role ) 
                    VALUES (NULL, \"".$newS['guardianID']."\",\"".$newS['password']."\", \"".$newS['gFname']."\", \"".$newS['gLname']."\", \"".$newS['role']."\" )";
                
        $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        return $result;
                    }
    }

    	function updateStudent($editS){
                    $query=" UPDATE student  
                    SET LRN = \"".$editS['LRN']."\", 
                    fName = \"".$editS['fName']."\",
                    lName = \"".$editS['lName']."\",
                    levelID = \"".$editS['levelID']."\",
                    age =\"".$editS['age']."\",
                    mtongue=\"".$editS['mtongue']."\",
                    ipGroup=\"".$editS['ipGroup']."\",
                    birthday=\"".$editS['birthday']."\",
                    address=\"".$editS['address']."\",
                    mother=\"".$editS['mother']."\",
                    father=\"".$editS['father']."\"
                    WHERE LRN = \"".$editS['LRN']."\"";
                
        $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        /*echo "<script>alert('Edit Successful!')</script>";*/
                        return $result;
                    }
    }
    function updateSY($updateS){
                    
                    
                    $query=" INSERT INTO records (LRN, levelID, syid) 
                    VALUES ('" . $updateS['LRN'] . "','" . $updateS['levelID'] . "','" . $updateS['syid'] . "')";

                    $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                       
                        return $result;
                    }
    }
    function updateSYtolevel($updateS){
                    
                    
                    $query=" UPDATE student  
                    SET 
                    levelID = \"".$updateS['levelID']."\",
                    syid = \"".$updateS['syid']."\"
                    WHERE LRN = \"".$updateS['LRN']."\"";

                    $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        echo "<script>alert('New Student Record Updated!')</script>";
                        return $result;
                    }
    }

    function search($se){
                    $query = "SELECT * from student WHERE LRN LIKE '%".$se['search']."%' OR fName LIKE '%".$se['search']."%' OR lName LIKE '%".$se['search']."%' OR syid LIKE '%".$se['search']."%' ";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                    
                }
            }

?>
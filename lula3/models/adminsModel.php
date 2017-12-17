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

            	function listStudentsk1(){
                    $query = "SELECT * from student WHERE levelID = 11";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function listStudentsk2(){
                    $query = "SELECT * from student WHERE levelID = 22";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function listStudentsg1(){
                    $query = "SELECT * from student WHERE levelID = 1";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function listStudentsg2(){
                    $query = "SELECT * from student WHERE levelID = 2";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function listStudentsg3(){
                    $query = "SELECT * from student WHERE levelID = 3";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();

                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }

/*GRADESS*/
                function gk1(){
                    $query = "SELECT student.LRN, student.fName, student.lName, 
(SELECT grade.grade FROM grade WHERE grade.subjectID = 'k1sci' AND grade.LRN=student.LRN) AS 'k1sci',
(SELECT grade.grade FROM grade WHERE grade.subjectID = 'k1mapeh' AND grade.LRN=student.LRN) AS 'k1mapeh',
(SELECT grade.grade FROM grade WHERE grade.subjectID = 'k1math' AND grade.LRN=student.LRN) AS 'k1math',
(SELECT grade.grade FROM grade WHERE grade.subjectID = 'k1eng' AND grade.LRN=student.LRN) AS 'k1eng',
(SELECT grade.grade FROM grade WHERE grade.subjectID = 'k1valed' AND grade.LRN=student.LRN) AS 'k1valed',
(SELECT grade.grade FROM grade WHERE grade.subjectID = 'k1fil' AND grade.LRN=student.LRN) AS 'k1fil', 
(SELECT grade.TimeAdded FROM grade WHERE grade.subjectID = 'k1fil' AND grade.LRN=student.LRN) as TimeAdded 
from student WHERE levelID=11";


                    $result = mysqli_query($this->conn, $query);
                    $res = array();
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }

                function gk2(){
                    $query = "SELECT student.LRN, student.fName, student.lName, 
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'k2sci' AND grade.LRN=student.LRN) AS 'k2sci',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'k2mapeh' AND grade.LRN=student.LRN) AS 'k2mapeh',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'k2math' AND grade.LRN=student.LRN) AS 'k2math',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'k2eng' AND grade.LRN=student.LRN) AS 'k2eng',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'k2valed' AND grade.LRN=student.LRN) AS 'k2valed',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'k2fil' AND grade.LRN=student.LRN) AS 'k2fil',
                    (SELECT grade.TimeAdded FROM grade WHERE grade.subjectID = 'k2fil' AND grade.LRN=student.LRN) as TimeAdded  
                    from student WHERE levelID=22";
                    $result = mysqli_query($this->conn, $query);
                    $res = array();
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function gg1(){
                    $query = "SELECT student.LRN, student.fName, student.lName, 
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g1sci' AND grade.LRN=student.LRN) AS 'g1sci',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g1msep' AND grade.LRN=student.LRN) AS 'g1msep',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g1math' AND grade.LRN=student.LRN) AS 'g1math',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g1eng' AND grade.LRN=student.LRN) AS 'g1eng',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g1valed' AND grade.LRN=student.LRN) AS 'g1valed',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g1fil' AND grade.LRN=student.LRN) AS 'g1fil' ,
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g1mtbl' AND grade.LRN=student.LRN) AS 'g1mtbl',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g1ap' AND grade.LRN=student.LRN) AS 'g1ap',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g1epp' AND grade.LRN=student.LRN) AS 'g1epp',
                    (SELECT grade.TimeAdded FROM grade WHERE grade.subjectID = 'g1epp' AND grade.LRN=student.LRN) as TimeAdded 
                    from student WHERE levelID=1";


                    $result = mysqli_query($this->conn, $query);
                    $res = array();
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function gg2(){
                    $query = "SELECT student.LRN, student.fName, student.lName, 
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g2sci' AND grade.LRN=student.LRN) AS 'g2sci',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g2msep' AND grade.LRN=student.LRN) AS 'g2msep',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g2math' AND grade.LRN=student.LRN) AS 'g2math',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g2eng' AND grade.LRN=student.LRN) AS 'g2eng',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g2valed' AND grade.LRN=student.LRN) AS 'g2valed',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g2fil' AND grade.LRN=student.LRN) AS 'g2fil' ,
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g2mtbl' AND grade.LRN=student.LRN) AS 'g2mtbl',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g2ap' AND grade.LRN=student.LRN) AS 'g2ap',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g2epp' AND grade.LRN=student.LRN) AS 'g2epp',
                    (SELECT grade.TimeAdded FROM grade WHERE grade.subjectID = 'g2epp' AND grade.LRN=student.LRN) as TimeAdded 
                    from student WHERE levelID=2";


                    $result = mysqli_query($this->conn, $query);
                    $res = array();
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function gg3(){
                    $query = "SELECT student.LRN, student.fName, student.lName, 
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g3sci' AND grade.LRN=student.LRN) AS 'g3sci',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g3msep' AND grade.LRN=student.LRN) AS 'g3msep',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g3math' AND grade.LRN=student.LRN) AS 'g3math',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g3eng' AND grade.LRN=student.LRN) AS 'g3eng',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g3valed' AND grade.LRN=student.LRN) AS 'g3valed',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g3fil' AND grade.LRN=student.LRN) AS 'g3fil' ,
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g3mtbl' AND grade.LRN=student.LRN) AS 'g3mtbl',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g3ap' AND grade.LRN=student.LRN) AS 'g3ap',
                    (SELECT grade.grade FROM grade WHERE grade.subjectID = 'g3epp' AND grade.LRN=student.LRN) AS 'g3epp',
                    (SELECT grade.TimeAdded FROM grade WHERE grade.subjectID = 'g3epp' AND grade.LRN=student.LRN) as TimeAdded 
                    from student WHERE levelID=3";


                    $result = mysqli_query($this->conn, $query);
                    $res = array();
                    while ($row = mysqli_fetch_array($result)){
                        array_push($res, $row);
                    }
                    return ($result->num_rows>0)? $res: FALSE;
                }
                function viewGrades($LRN){
                    $query = "SELECT levelName, subjectname, grade, (grade.LRN) as LRN, (grade.levelID) as levelID, (grade.subjectID) as subjectID FROM grade 
                    JOIN student ON grade.LRN = student.LRN 
                    JOIN level on level.levelID = grade.levelID 
                    JOIN subject on subject.subjectID = grade.subjectID
                    WHERE grade.LRN = \"".$LRN."\"";
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
                    $query = "SELECT student.LRN, student.fName, student.lName, (select level.levelName from level where level.levelID=student.levelID) as level, student.age, student.mtongue, student.ipGroup, student.birthday, student.address, student.mother, student.father, (select guardian.fName from guardian where guardian.guardianID = student.guardianID) as guardianf, (select guardian.lName from guardian where guardian.guardianID = student.guardianID) as guardianl FROM student join guardian on student.guardianID = guardian.guardianID join level on level.levelID = student.levelID
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
                function deleteU($usern){
			$query = "DELETE FROM users WHERE id = \"".$usern."\" ";

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
                    VALUES (\"".$newS['guardianID']."\", \"".$newS['gFname']."\", \"".$newS['gLname']."\", \"".$newS['contact']."\", \"".$newS['password']."\")";
                
        $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
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

    	function updateUser($editU){
                    $query=" UPDATE users  
                    SET username = \"".$editU['username']."\", 
                    password = \"".$editU['password']."\",
                    fname = \"".$editU['fname']."\",
                    lname = \"".$editU['lname']."\",
                    role =\"".$editU['role']."\"
                    WHERE id = \"".$editU['id']."\"";
                
        $result = mysqli_query($this->conn, $query);
                    // if there is an error in your query, an error message is displayed.
                    if(!$result) {
                        die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
                    }else{
                        return $result;
                    }
    }
            }

?>
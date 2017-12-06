<?php include "../models/DBconnection.php"; 

	class studentModel extends DBconnection {

	function listStudents(){
        $query = "SELECT * from student";
        $result = mysqli_query($this->conn, $query);
        $res = array();

        while ($row = mysqli_fetch_array($result)){
            array_push($res, $row);
        }
        return ($result->num_rows>0)? $res: FALSE;

    }
    function viewGrades($LRN){
        $query = "SELECT levelName, subjectname, grade FROM grade 
        JOIN student ON grade.LRN = student.LRN 
        JOIN level on level.levelID = grade.levelID 
        JOIN subject on subject.subjectID = grade.subjectID
        WHERE student.LRN = \"".$LRN."\"";
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


}

?>
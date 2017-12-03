<?php include "../models/DBconnection.php"; 
?>

<?php

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

		function delete($id){
			$query = "DELETE FROM users WHERE id = $id";

			$result = mysqli_query($this->conn, $query);
			
			 return (($result)? TRUE:FALSE);
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

?>
<?php include "../models/DBConnection.php";

		class SalesModel extends DBConnection {

		function selectAll(){
			$query = "SELECT * FROM products";
			$result = mysqli_query($this->conn, $query);
			
			$res = array();
			while ($row = mysqli_fetch_array($result)){
				array_push($res, $row);
			}
			return ($result->num_rows>0)? $res: FALSE;
		}
		function selectWhere($pid){
			$query = "SELECT Name, Description,Quantity,Price FROM products WHERE pid = $pid";
			
			$result = mysqli_query($this->conn, $query);
			
			// if there is an error in your query, an error message is displayed.
			if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}
		}
		
		function runQuery($query) {
		$result = mysqli_query($this->conn, $query);
		
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
}

?>
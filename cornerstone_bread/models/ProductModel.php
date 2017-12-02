<?php
	/*
		MODEL CLASSES - READ ME!
		=============================================================================
		CRUD - Create, Read, Update, Delete
		This class handles CRUD functions of the Nominees table.
		
		To create a new model class, use the format: <table_name>Model.php
		The name of the class MUST be the same as the file name.
		=============================================================================
	*/

	// The DBConnection class handles database connection
	include "../models/DBConnection.php";


	class ProductModel extends DBconnection {	
		

		function selectAll(){
			$query = "SELECT * FROM products";
			$result = mysqli_query($this->conn, $query);
			$res = array();
			while ($row = mysqli_fetch_array($result)){
				array_push($res, $row);
			}
			return ($result->num_rows>0)? $res: FALSE;
		}

		function addProduct($data) {
			//INSERT query
			$query = "INSERT INTO Products (Name, Description, Quantity, Price)
					  VALUES
						(\"".$data['name']."\",
						\"".$data['description']."\",
						\"".$data['quantity']."\",
						\"".$data['price']."\");
					";		
			$result = mysqli_query($this->conn, $query);

			return $result;
		}

		function deleteProduct($pid){
			$query = "DELETE FROM products WHERE pid=$pid";
			$result = mysqli_query($this->conn, $query);	
			
			 return (($result)? TRUE:FALSE);
		}

		function updateProduct($data) {
			$query = 
					"UPDATE products 
					 SET 
						Name = \"".$data['name']."\",
						Description = \"".$data['description']."\",
						Quantity = \"".$data['quantity']."\",
						Price = \"".$data['price']."\"
					WHERE 
					    pid = \"".$data['pid']."\"";

			$result = mysqli_query($this->conn, $query);
			
			// if there is an error in your query, an error message is displayed.
			if(!$result) {
				die("<strong>WARNING:</strong><br>" . mysqli_error($this->conn));
			}

			return $result;

		}

		function getProduct($pid){
			$query = "SELECT Name, Description, Quantity, Price FROM products
					  WHERE pid = $pid
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
	}

?>
<?php include "../models/SalesModel.php"; ?>
<?php
	$sales = new SalesModel;
	
	$select = "no";
	$show = "no";


	$select = isset ($_REQUEST['select']) ? $_REQUEST['select']:"no";
	$show = isset ($_REQUEST['show']) ? $_REQUEST['show']:"no";
	$pid = isset ($_POST['mySelect']) ? $_POST['mySelect']:NULL;
	
	//VIEW
	if($select=="yes"){
			$rows = $sales->selectAll();
		}
session_start();
$db_handle = new SalesModel();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//>>>>>>>>>>ADD<<<<<<<<<<
	case "add":
		if(!empty($_POST["Quantity"])) {
			$productByDescription = $db_handle->runQuery("SELECT * FROM products WHERE Description='" . $_GET["Description"] . "'");
			$itemArray = array($productByDescription[0]["Description"]=>array('Name'=>$productByDescription[0]["Name"], 'Description'=>$productByDescription[0]["Description"], 'Quantity'=>$_POST["Quantity"], 'Price'=>$productByDescription[0]["Price"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByDescription[0]["Description"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByDescription[0]["Description"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["Quantity"])) {
									$_SESSION["cart_item"][$k]["Quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["Quantity"] += $_POST["Quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	//>>>>>>>>>>DELETE<<<<<<<<<
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["Description"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}

	break;
	//>>>>>>>>>>If EMPTY<<<<<<<<<
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
	

?>
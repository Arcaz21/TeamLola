<?php include "../models/ProductModel.php"; ?>

<?php
	$prod = new ProductModel;
	
	$add = "no";
	$select="no";
	$delete = "no";
	$update = "no";

	$update = isset($_REQUEST['update']) ? $_REQUEST['update']:"no";
	$select = isset ($_REQUEST['select']) ? $_REQUEST['select']:"no";
	$add = isset ($_REQUEST['add']) ? $_REQUEST['add']:"no";
	$delete = isset($_REQUEST['delete']) ? $_REQUEST['delete']:"no";
	$pid = isset ($_REQUEST['pid']) ? $_REQUEST['pid']:NULL;

	$data['pid'] = isset($_REQUEST['pid'])?$_REQUEST['pid']:NULL;
	$data['name'] = isset($_REQUEST['Name'])?$_REQUEST['Name']:NULL;
	$data['description'] = isset($_REQUEST['Description'])?$_REQUEST['Description']:NULL;
	$data['quantity'] = isset($_REQUEST['Quantity'])?$_REQUEST['Quantity']:NULL;
	$data['price'] = isset($_REQUEST['Price'])?$_REQUEST['Price']:NULL;

//ADD
	if (isset ($_REQUEST['submit']) && $_REQUEST['submit'] == "Add"){
		$result = $prod->addProduct($data);

	if($result){
	echo "<center><h2><font color=#5cb85c>New Product Added to Database :)</font></h2></center>";
		/*echo "<script type='text/javascript'>alert('Name Added Successfully!')</script>";
		echo "
		<script>
			window.location.href = \"products.php?select=yes\";
		</script>	
				";*/
		}
		else 
			echo  "<center><h2><font color=red>There's Something Wrong :(</font></h2></center>";
		}
//VIEW
	if($select=="yes"){
		
			$rows = $prod->selectAll();
		}
//DELETE		
	if ($select == "yes" && $delete == "yes" && isset($pid)){
			$result = $prod -> deleteProduct($pid);

	if ($result){
		echo "Data succesfully deleted.";
		echo "
			<script>
				window.location.href = \"products.php?select=yes\";
			</script>	
				";
			}
		}
//UPDATE EDIT
		if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Update") {
		$prod->updateProduct($data);

		echo "
					<script>
						window.location.href = \"products.php?select=yes\";
					</script>	
				";
		}
	if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == "Cancel"){
		echo "
					<script>
						window.location.href = \"products.php?select=yes\";
					</script>	
				";
	}

	$prod->close();

?>
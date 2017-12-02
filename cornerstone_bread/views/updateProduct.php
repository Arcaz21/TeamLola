<?php include "../controllers/ProductsFunctions.php"; ?>
<?php
	$prod = new ProductModel();
	$data = $prod->getProduct($_REQUEST['pid']);
?>
<!DOCTYPE html>
<html>

<head>
	<title>Test - Select</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOGOL FONTS -->
    <link href='../assets/fonts/gugulFonts.css' rel='stylesheet' type='text/css' />
</head>

<body>
<center>
<div class="panel panel-primary" style="width: 300px;" >
<div class="panel-heading"  style="background-color: #5cb85c;">
<div class="panel-body">
	<form>
	<div id="solidwrapper">

			
		<div class="group"><input type="hidden" id="InputBox" name="pid" value="<?php echo $_REQUEST['pid']; ?>" required></div>
		<div class="group">
			<label  class="">Name</label>
			<input class="form-control" type="text" id="InputBox" name="Name" value="<?php echo $data->Name ?>" required>
		</div>
		<div class="group">
			<label  class="">Description</label>
			<input class="form-control" type="text" id="InputBox" name="Description" value="<?php echo $data->Description ?>" required>
		</div>
		<div class="group">
			<label  class="">Quantity</label>
			<input class="form-control" type="number" id="InputBox" name="Quantity" value="<?php echo $data->Quantity ?>" required>
		</div>
		<div class="group">
			<label  class="">Price</label>
			<input class="form-control" type="number" id="InputBox" name="Price" value="<?php echo $data->Price ?>" required>
		</div>	
		<br>
		<center>
		<table>
			<tr>
				<td><input class="btn btn-warning" type="submit" name="submit" value="Update" style="width:100px;" ></td>
				<td><input class="btn btn-danger" type="submit" name="submit" value="Cancel" style="width:100px;" ></td>
			</tr>
		</table>
		</center>	
		</div>
		</form>
		</div>
</div></div></center>
</body>
</html>
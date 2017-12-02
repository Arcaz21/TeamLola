<?php include "../controllers/ProductsFunctions.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Products</title>
		<!-- BOOTSTRAP STYLES-->
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
<div class="panel panel-primary" style="width: 300px">
<div class="panel-heading">
<div class="panel-body">

<form method="post">
<div class="group">
	<label  class="">Name</label>
	<input class="form-control" type="text" name="Name" placeholder="ex. Monay" required>
</div>
<div class="group">
	<label  class="">Description</label>
	<input class="form-control" type="text" name="Description" placeholder="ex. Newly Cooked" required>
</div>
<div class="group">
	<label  class="">Quantity</label>
	<input class="form-control" type="text" name="Quantity" placeholder="ex. 150" required>
</div>
<div class="group">
	<label  class="">Price</label>
	<input class="form-control" type="text" name="Price" placeholder="ex. 15" required>
</div>
<br>
<input class="btn btn-warning" type="submit" name="submit" value="Add">

</form>
</div></div></div>
</center>

</body>
</html>
<?php include "../controllers/addUserFunction.php"; ?>

<header>
		<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Pls Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOGOL FONTS -->
    <link href='../assets/fonts/gugulFonts.css' rel='stylesheet' type='text/css' />
</header>
<center>

<div class="panel panel-primary" style="width: 300">
<div class="panel-heading">
<div class="panel-body">
<form method="post">

<div class="group">
	<label  class="">Username</label>
	<input class="form-control" type="text" name="username" placeholder="LRN for guardians" required>
</div>
<div class="group">
	<label  class="">Password</label>
	<input class="form-control" type="text" name="password" placeholder="*******" required>						
</div>
<div class="group">
	<label  class="">First Name</label>
	<input input class="form-control" type="text" name="fname" placeholder="ex. Sidney" required>						
</div>
<div class="group">
	<label  class="">Last Name</label>
	<input class="form-control" type="text" name="lname" placeholder="ex. Belleza" required>						
</div>

	<label  class="">Role</label><br>
	<select name="role" type="radio" class="btn btn-default">
      	<option value="admin">admin</option>
      	<option value="cashier">cashier</option>
      	<option value="cashier">registrar</option>
      	<option value="cashier">guardian</option>
    </select>	
     <br><br>
    <input type="submit" class="btn btn-warning" name="submit" value="Add" >

</form>
</div>
</div>
</div>
</center>
</center>
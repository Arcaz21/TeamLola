<?php include "../controllers/signInFunction.php";
 session_start();
 session_destroy(); ?>
<head>
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
</head>
<center>
<body style="background:#F3F3F3">
    <center>
    <img style="height: 200;position: absolute; z-index: -1;margin-top: -230;top: 50%;left: 50%;transform: translate(-50%, -50%);" src="../assets/img/euro.png"/></center>
    
	<div class="panel panel-primary" style="width: 500; margin-top: 55; position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);">
	<!-- To check if naka log in -->
		<?php if ($LOGGED_IN): ?>
			<br><br><br>
			<div class="panel-heading" style="margin-top: -150;">
				<h2>You are Logged In</h2>
			</div>
				
			<?php // to check if admin or cashier
				$db = new userModel();
				$data = $db->getUse($username, $password);
			?>
			<?php 
				$name= ($data->fname);
				if (isset($name)){
					// $idnum is appended so the ID number can be passed into the /nominate.php link
					$url = "../views/admin.php?name=".$name;
					$url2= "../views/cashier.php?name=".$name;
					$url3= "../views/registrar.php?name=".$name;
					$url4= "../views/guardian.php?name=".$name;
				}
			?>
				<h3>Welcome <?php echo $data->fname?> <?php echo $data->lname?></h3>
			<?php if ($data->role == "admin"): ?>
				<?php
				session_start();
	$_SESSION['username'] =  $data->username;
	$_SESSION['password'] =  $data->password;
				?>
				<a href="<?php echo $url; ?>"><h3>START</h3></a>
			<?php endif; ?>
			<?php if ($data->role == "cashier"): ?>
				<?php
				session_start();
	$_SESSION['username'] =  $data->username;
	$_SESSION['password'] =  $data->password;
				?>
				<a href="<?php echo $url2; ?>"><h3>START</h3></a>
			<?php endif; ?>
			<?php if ($data->role == "registrar"): ?>
				<?php
				session_start();
	$_SESSION['username'] =  $data->username;
	$_SESSION['password'] =  $data->password;
				?>
				<a href="<?php echo $url3; ?>"><h3>START</h3></a>
			<?php endif; ?>
			<?php if ($data->role == "guardian"): ?>
				<?php
				session_start();
	$_SESSION['username'] =  $data->username;
	$_SESSION['password'] =  $data->password;
				?>
				<a href="<?php echo $url4; ?>"><h3>START</h3></a>
			<?php endif; ?>
			<!-- -->

		<?php endif; ?>


		<?php if (!$LOGGED_IN): ?>
			<div class="panel-heading">
			     
				<h2>Please Log In to Use</h2>
			</div>

			<form action="<?php $_PHP_SELF ?>" method="POST">
					<div class="input-group">
						<div class="six columns">
							<h3>Username</h3>
							<input class="form-control"  id="username" name="username" type="text" required>
						</div>
					</div>

					<div class="input-group">
						<div class="six columns">
							<h3>Password</h3>
							<input class="form-control" id="password" name="password" type="password" required>
						</div>
					</div>
					<br>
					<div class="panel-footer" style="margin-bottom: -13px">
					<input class="btn btn-success" value="LOG ME IN" type="submit" name="submit">
					</div>
				</form>

			</div><br>
		<?php endif; ?>

	</div>
	<div>
	
	</div>
	
</body>

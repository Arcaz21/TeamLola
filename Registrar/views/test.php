<!DOCTYPE html>
<html>
<link href="../assets/css/login.css" rel="stylesheet" />
<?php include "../controllers/signInFunction.php";
 session_start();
 session_destroy(); ?>
<body>
<?php if ($LOGGED_IN):  
                $db = new userModel();
                $data = $db->getUse($username);
            ?>
            <?php 
             if ($data->role == "registrar"){
               
                session_start();
                $_SESSION['username'] =  $data->username;
                $_SESSION['password'] =  $data->password;
                $_SESSION['role'] =  $data->role;
                header("location:../views/registrar1.php");           
             }   
             else{
                header("location:../views/index.php");
             }
 endif; ?>
<?php if (!$LOGGED_IN): ?>

<form action="<?php $_PHP_SELF ?>" method="POST">
  <div class="imgcontainer">
    <img src="../assets/img/euro.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button value="LOG ME IN" type="submit" name="submit">Login</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
  </div>
</form>
<?php endif; ?> 

</body>
</html>

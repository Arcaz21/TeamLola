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
        <?php 
            if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == "LOG ME IN") {
                if(empty($_SESSION)){
                echo "Invalid Credentials";
                } 
            }?>
    </center>
    
    <div class="panel panel-primary" style="width: 40%; margin-top: 55; position: absolute;top: 40%;left: 50%;transform: translate(-50%, -50%);">
    <!-- To check if naka log in -->
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
            <div class="panel-heading"  >
                <h2>Please Log In to Use</h2>
            </div>
            <div> 
            <img src="../assets/img/euro.png" alt="Avatar" class="avatar">
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

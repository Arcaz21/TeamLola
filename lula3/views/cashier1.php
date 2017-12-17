<?php 

session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
}
?>
<?php include "../controllers/usersFunction.php"; ?>

<!DOCTYPE html>
<html
    xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CASHIER</title>
        <!-- BOOTSTRAP STYLES-->
        <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css"  />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="assets/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <?php  $db = new userModel();
            $data = $db->getUse($_SESSION['username']);
            if( ($_SESSION['role'] != "cashier")){
                if (($_SESSION['role'] == "admin")) {
                    header("location: admin1.php");
                }
                if (($_SESSION['role'] == "registrar")) {
                    header("location: registrar1.php");
                }
                if (($_SESSION['role'] == "guardian")) {
                    header("location: guardian1.php");
                }
}
            ?>
            
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img style="margin-top: -20px;" height="60" src="../assets/img/euro.png" />
                    </a>
                </div>
                <div class="header-right">
                    <p style="font-size: 27px;">
                        <?php echo $data->fname ." ". $data->lname."  "?>
                        <a href="index.php" class="btn btn-danger" title="Logout">
                            <i class="fa fa-sign-out "></i>
                        </a>
                    </p>
                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li>
                            <center>
                                <h2 style="color: white">CASHIER</h2>
                            </center>
                        </li>
                        <li>
                            <a  >
                                <i class="fa fa-users" id=""></i>Users
                            </a>
                        </li>
                        <li>
                            <a style="cursor: pointer;" class="tablinks" onclick="options(event, 'Billing')" id="defaultOpen">
                            <i class="fa fa-child"></i>Billing Management  
                        
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-head-line">To Edit para sa cashier</h1>
                            <h1 class="page-subhead-line">
                              
                            </h1>
                            <div id="Billing" class="tabcontent">
                                <h3>Billing table and stuffs over here</h3>
                            </div>
                            
                            

                                
                            
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <p>  ambot unsay ibutang diri</p>
                                <br />
                            try tryt tyrytry
                        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>

        <!-- /. WRAPPER  -->
        <div id="footer-sec">
        &copy; TeamLula 2017
        </div>

        <!-- /. FOOTER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>
        <script src="tabs.js"></script>
    </body>
</html>

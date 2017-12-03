<?php include "../models/userModel.php"; 
session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <?php  $db = new userModel();
            $data = $db->getUse($_SESSION['username']); ?>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img style="margin-top: -20px;" height="60" src="../assets/img/euro.png" /></a>
            </div>

            <div class="header-right">

              Hello <?php echo $data->fname ." ". $data->lname?>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                   

                    <li>
                        <center>ADMIN</center>
                    </li>
                    <li>
                        <a  ><i class="fa fa-users" id=""></i>Users</a>
                    </li>
                    
                    <li>
                        <a class="tablinks" onclick="options(event, 'Students')" id="autoclick">Students  
                                                <span class="badge"> Admin</span>
                        </a>
                        
                    </li>
                    <li>
                        <a class="tablinks" onclick="options(event, 'Users')">
                                                <i class="fa fa-users"></i>Users  
                                                <span class="badge"> Admin</span>
                        </a>
                    </li>
                    <li>asd</li>
                                                           
                                        
                   
                    
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">To Edit</h1>
                        <h1 class="page-subhead-line">aaaaaaaaaaaa </h1>
<div id="Students" class="tabcontent">
                                                        <h3>Students</h3>
                                                    </div>
                                                    <div id="Users" class="tabcontent">
                                                        <h3>Users</h3>
                                                    </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                          <p>  sthfghaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>
                          <br />
                            asfsf
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

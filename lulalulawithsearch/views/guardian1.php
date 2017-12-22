<?php 

session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
}
?>
<?php include "../controllers/guardiansFunction.php"; ?>

<!DOCTYPE html>
<html
    xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>GUARDIAN</title>
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
            if( ($_SESSION['role'] != "guardian")){
                if (($_SESSION['role'] == "admin")) {
                    header("location: admin1.php");
                }
                if (($_SESSION['role'] == "registrar")) {
                    header("location: registrar1.php");
                }
                if (($_SESSION['role'] == "cashier")) {
                    header("location: cashier1.php");
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
                    <a class="navbar-brand" href="guardian1.php">
                        <img style="margin-top: -20px;" height="60" src="assets/img/corner.gif"/>
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
                                <h2 style="color: white">GUARDIAN</h2>
                            </center>
                        </li>
                        
                        <li>
                            <a style="cursor: pointer;" >
                            <i class="fa fa-child"></i>Student Information 
                        
                            </a>
                        </li>
                        <!-- <li>
                            <a style="cursor: pointer;" class="tablinks" onclick="options(event, 'Billing')" >
                            <i class="fa"></i>Balance  
                        
                            </a>
                        </li> -->
                    </ul>
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <center>
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-head-line">Student Information</h1>
                            <h1 class="page-subhead-line"></h1>
                            <center><div class="col-md-1"><center></center></div></center>
                            <center><div class="col-md-10"><center>
<center>
                       
    <div class="panel panel-info">
                            <div class="panel-heading">
                                <center><i class="fa fa-child fa-fw"></i></center>
                            </div>

                            <div class="panel-body">
                                

    <table class="table table-striped table-bordered table-hover">
        <?php error_reporting(E_ERROR | E_PARSE); foreach ($studinfo as $index => $value): ?>
       <tr>
           <td style="margin-top: 3%" colspan="2"><center><i class="fa fa-child fa-fw"></i>Student Information<i class="fa fa-child fa-fw"></i></center></td>
       </tr>
       <tr>
           <td style="margin-top: 3%" colspan="2"><center><a href="viewBalance.php?note=<?php echo $value['LRN'] ?>" type="button" style="cursor: pointer;" class="btn btn-warning ">Check Balance</a></i></center></td>
       </tr>
        <tr>
            <th>LRN</th>
            <td>
                <?php echo $value['LRN'] ?>
            </td>
        </tr>
        <tr>
            <th>First Name</th>
            <td>
                <?php echo $value['fName'] ?>
            </td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>
                <?php echo $value['lName'] ?>
            </td>
        </tr>
        <tr>
            <th>Level</th>
            <td>
                <?php echo $value['level'] ?>
            </td>
        </tr>
        <tr>
            <th>Age</th>
            <td>
                <?php echo $value['age'] ?>
            </td>
        </tr>
        <tr>
            <th>Mother Tongue</th>
            <td>
                <?php echo $value['mtongue'] ?>
            </td>
        </tr>
        <tr>
            <th>IP Group</th>
            <td>
                <?php echo $value['ipGroup'] ?>
            </td>
        </tr>
        <tr>
            <th>Birthday</th>
            <td>
                <?php echo $value['birthday'] ?>
            </td>
        </tr>
        <tr>
            <th>Address</th>
            <td>
                <?php echo $value['address'] ?>
            </td>
        </tr>
        <tr>
            <th>Mother</th>
            <td>
                <?php echo $value['mother'] ?>
            </td>
        </tr>
        <tr>
            <th>Father</th>
            <td>
                <?php echo $value['father'] ?>
            </td>
        </tr>
        <tr>
            <th style="color: white; background-color: #5bc0de">Guardian</th>
            <td style="color: white; background-color: #5bc0de">
                <?php echo $value['guardianf']." ".$value['guardianl'] ?>
            </td>
        </tr>
        <tr>
            <th style="color: white; background-color: #5bc0de">Guardian Contact No.</th>
            <td style="color: white; background-color: #5bc0de"><?php echo $value['contact'] ?></td>
        </tr>
        <tr>
            <td colspan="2"><br></td>
        </tr>
        <?php endforeach; ?>
    </table>

 
    </div>
</div>
   
</center>                                

                            </center></div></center>
                            <center><div class="col-md-1"><center></center></div></center>                            




                    
                        

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        </center>

        <!-- /. WRAPPER  -->
        <div id="footer-sec">
        <center>&copy; TeamLula 2017</center>
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

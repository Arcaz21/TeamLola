<?php 

session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
}
?>
<?php include "../controllers/studentFunction.php";
 ?>

<!DOCTYPE html>
<html
    xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>REGISTRAR</title>
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
        <link rel="stylesheet" href="assets/css/w3.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>            
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
                        <!-- <?php echo $data->fname ." ". $data->lname."  "?> -->
                        <a href="index.php" class="btn btn-danger" title="Logout">
                            <i class="fa fa-sign-out "></i>
                        </a>
                    </p>
                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    
                </div>
            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-head-line">Registrar's Lounge</h1>
                            <h1 class="page-subhead-line">
                              
                            </h1>
                            <div id="Students" class="tabcontent">
                                                                <table>
                                                                <thead>
                                                                    <h3>LEVEL</h3>
                                                                    <tr >
                                                                        <th style="text-align: center;">Subject</th>
                                                                        <th style="text-align: center;">Grade</th>
                                                                    </tr>
                                                                 </thead>
                                                                <tbody>
                                                                    <?php error_reporting(E_ERROR | E_PARSE); foreach ($grades as $index => $value): ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $value['subjectname']; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $value['grade']; ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                                </table>
                                                        </div>
                                                    </div>
                                                </d iv>
                                            </td>

                                        </tr>
                                      
                                    </tbody>
                                </table>
                                
                                


                                
                            </div>
                            <br>
                            <a href="registrar1.php"class="btn btn-danger   "> BACK</a>
                            
                
                                
                            
                        </div>
                    </div>
                    <!-- /. ROW  -->
           
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

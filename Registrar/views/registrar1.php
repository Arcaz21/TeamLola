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
                    <ul class="nav" id="main-menu">
                        <li>
                            <center>
                                <h2 style="color: white">REGISTRAR</h2>
                            </center>
                        <!-- </li>
                        <li>
                            <a  >
                                <i class="fa fa-users" id=""></i>Users
                            </a>
                        </li> -->
                        <li>
                            <a style="cursor: pointer;" class="tablinks" onclick="options(event, 'Students')" id="defaultOpen">
                            <i class="fa fa-child"></i>Students
                        
                            </a>
                        </li>
                       <li>
                            <a style="cursor: pointer;" class="tablinks" onclick="options(event, 'Addnew')" id="defaultOpen">
                            <i class="fa fa-child"></i>Add New Student 
                        
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
                            <h1 class="page-head-line">Registrar's Lounge</h1>
                            <h1 class="page-subhead-line">
                            
                            </h1>
                            <div id="Students" class="tabcontent">
                            <table >
                                    <thead>
                                        <tr >
                                            <th style="text-align: center;">LRN</th>
                                            <th style="text-align: center;">First Name</th>
                                            <th style="text-align: center;">Last Name</th>
                                            <th colspan="2" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($rows as $index => $value): ?>
                                        <tr>  
                                            <input type="hidden" value="<?php echo $value['id']; ?>">
                                            <td>
                                                <?php echo $value['LRN']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['fName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['lName']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-info"<?php  $lr=$value['LRN'] ?> href="viewgrade.php?value=<?php echo $lr ?>"  >View Grades
                                                </a>
                                                <div id="id01" class="w3-modal">
                                                    <div class="w3-modal-content">  
                                                        <div class="w3-container">
                                                            <span  onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                                                

                                                               
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> 
                                            <a style="cursor: pointer;" class="btn btn-success" onclick="options(event, 'addGrade')" <?php  $idd=$value['LRN'] ?>> Add Grade </a>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
                                
                            </div>
                            
                            
                            <div id="addGrade" class="tabcontent">
                                
                                <?php $data = $db -> getUser($idd); print_r($idd);?>
                                <form action="../controllers/studentFunction.php" method="POST">
                                <div class="group"><input type="hidden" id="id" name="id" value="<?php echo $data->id ?>" required>
                                    <div class="group">
                                        <label  class="">Level</label>
                                        <select name="levelID" type="radio" class="btn btn-default" value="<?php echo $data->role ?>" >
                                            <option value="1">Kinder 1</option>
                                            <option value="2">Kinder 2</option>
                                        </select>
                                    </div>
                                    <div class="group">
                                        <label  class="">Subject</label>
                                        <select name="subjectID" type="radio" class="btn btn-default" value="<?php echo $data->role ?>" >
                                            <option value="1">CS113</option>
                                            <option value="2">CS110</option>
                                        </select>
                                    </div>
                                    <div>
                                    <label  class="">Grade</label>
                                    <input class="form-control"  id="grade" name="grade" type="number"  required>
                                    
                                    </div>
                                    </div>
                                    <div class="group">
                                        <br>
                                        <input type="submit" class="btn btn-warning" name="submit" value="Update" style="font-size: 20px">
                                    </div>
                                    </div>                          
                                </form>
                            </div>
                                
                            
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <div class="row">
                        <div class="col-md-12">
                            
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

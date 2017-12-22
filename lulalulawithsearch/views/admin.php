<?php include "../models/userModel.php"; 
session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html
    xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>ADMIN</title>
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
        <?php  $db = new userModel();
                $data = $db->getUse($_SESSION['username']); ?>
        <div id="wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="adjust-nav">
                    <div class="navbar-header" >
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <span class="logout-spn" >
                        <br>
                Hello 
                            <?php echo $data->fname ." ". $data->lname?> |
                  
                            <a href="index.php" style="color:orange;">LOGOUT</a>
                        </span>
                    </div>
                </div>
                <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">
                            <br>
                                <br>
                                    <div class="tab">
                                        <li class="active-link">
                                         <center><img height="110" src="../assets/img/euro.png" /></center>   
                                        </li>
                                        <li class="active-link">
                                            <button class="tablinks" onclick="openCity(event, 'Students')" id="autoclick">Students  
                                                <span class="badge"> Admin</span>
                                            </button>
                                        </li>
                                        <li class="active-link">
                                            <button class="tablinks" onclick="openCity(event, 'Users')">
                                                <i class="fa fa-users"></i>    Users  
                                                <span class="badge"> Admin</span>
                                            </button>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                        </nav>
                        <!-- /. NAV SIDE  -->
                        <div id="page-wrapper" >
                            <div id="page-inner">
                                <br>
                                    <br>
                                        <div class="col-lg-12">
                                            <center>
                                                <h1>ADMIN DASHBOARD</h1>
                                            </center>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 ">
                                                <div class="alert alert-info"></div>
                                            </div>
                                            <!-- SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSTTTTTTTTTTTTAAAAAAAARRRRRRRTTTT-->
                                            <center>
EDIT HERE
</center>
                                            <center>
                                                <br>
                                                    <div id="Students" class="tabcontent">
                                                        <h3>Students</h3>
                                                    </div>
                                                    <div id="Users" class="tabcontent">
                                                        <h3>Users</h3>
                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <div class="row">
                                            <div class="col-lg-12" >
                                                <center>&copy;  Team Lula 2017</center>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. WRAPPER  -->
                                    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
                                    <!-- JQUERY SCRIPTS -->
                                    <script src="../assets/js/jquery-1.10.2.js"></script>
                                    <!-- BOOTSTRAP SCRIPTS -->
                                    <script src="../assets/js/bootstrap.min.js"></script>
                                    <!-- CUSTOM SCRIPTS -->
                                    <script src="../assets/js/custom.js"></script>
                                    <script>
        window.onload = function(){
  document.getElementById('autoclick').click();
}
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

                                    </script>
                                </body>
                            </html>
                            <style>
body {font-family: Arial;}

/* Style the tab */
div.tab {
  width: 100%;
  height: 100%;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 30px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

</style>
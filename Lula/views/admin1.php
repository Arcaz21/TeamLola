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
        <title>ADMIN</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
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
                                <h2 style="color: white">ADMIN</h2>
                            </center>
                        </li>
                        <li>
                            <a  >
                                <i class="fa fa-users" id=""></i>Users
                            </a>
                        </li>
                        <li>
                            <a style="cursor: pointer;" class="tablinks" onclick="options(event, 'Students')" id="defaultOpen">
                                <i class="fa fa-child"></i>Students  
                        
                            </a>
                        </li>
                        <li>
                            <a style="cursor: pointer;">
                                <i class="fa fa-users"></i>Users 
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a style="cursor: pointer;" class="tablinks" onclick="options(event, 'Userslist')">
                                        <i class="fa fa-th-list"></i>Users List
                                    </a>
                                </li>
                                <li>
                                    <a style="cursor: pointer;" class="tablinks" onclick="options(event, 'Users')">
                                        <i class="fa fa-user-plus "></i>Add New User
                                    </a>
                                </li>
                            </ul>
                        </li>
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
                            <div id="Userslist" class="tabcontent">
                                <table >
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Username</th>
                                            <th style="text-align: center;">First Name</th>
                                            <th style="text-align: center;">Last Name</th>
                                            <th style="text-align: center;">Password</th>
                                            <th style="text-align: center;">Role</th>
                                            <th colspan="2" style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($rows as $index => $value): ?>
                                        <tr>
                                            <td>
                                                <?php echo $value['username']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['fname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['lname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['password']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['role']; ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <a style="cursor: pointer;" href="viewUsers.php?select=yes&delete=yes&id=
                                                    <?php echo $value['id']; ?>" class="btn btn-danger">Delete
                                                </a>
                                            </td>
                                            <td style="text-align: center;">
                                                <a style="cursor: pointer;" class="tablinks" onclick="options(event, 'Usersupdate')" <?php  $idd=$value['id'] ?>> Update </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="Usersupdate" class="tabcontent">
                                <?php $data = $db -> getUser($idd); ?>
                                <h3>Studeddd</h3>
                                <form action="../controllers/usersFunction.php" method="POST">
                                    <div class="group"><input type="hidden" id="id" name="id" value="<?php echo $data->id ?>" required>
                                    <div class="group"></div>
                                        <label  class="">Username</label>
                                        <input class="form-control"  id="username" name="username" type="text" value="<?php echo $data->username ?>" required>
                                    </div>
                                    <div class="group">
                                        <label  class="">Password</label>
                                        <input class="form-control"  id="password" name="password" type="text" value="<?php echo $data->password ?>" required>
                                    </div>
                                    <div class="group">
                                        <label  class="">First Name</label>
                                        <input class="form-control"  id="fname" name="fname" type="text" value="<?php echo $data->fname ?>" required>
                                    </div>
                                    <div class="group">
                                        <label  class="">Last Name</label>
                                        <input class="form-control"  id="lname" name="lname" type="text" value="<?php echo $data->lname ?>" required>
                                    </div>
                                    <div class="group">
                                        <label  class="">Role</label><br>
                                        <select name="role" type="radio" class="btn btn-default" value="<?php echo $data->role ?>" >
                                            <option value="admin">admin</option>
                                            <option value="cashier">cashier</option>
                                            <option value="cashier">registrar</option>
                                            <option value="cashier">guardian</option>
                                        </select>
                                    </div class="group">    
                                    <div>
                                        <br>
                                        <input type="submit" class="btn btn-warning" name="submit" value="Update" style="font-size: 20px">
                                    </div>                          
                                </form>
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

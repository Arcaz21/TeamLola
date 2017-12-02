<?php include "../models/userModel.php"; 
session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
}?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cashier</title>
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
     <?php $name = (isset($name)) ?>
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="navbar-brand">
                        <img height="140" src="../assets/img/euro.png" />
                    </div>
    
                    
                </div>
              
                <span class="logout-spn" ><br>
                Hello <?php echo $_REQUEST['name']?> |
                  <a href="index.php" style="color:orange;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

                    <br><br>


                    <li class="active-link">
                    <li>
                        <a href="">Billing <span class="badge"> Cashier</span></a>
                    </li>

                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
            <br><br>
                <div class="col-lg-12">
                     <center><h2>TEST</h2>  </center> 
                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info"></div>
                    </div>
<!-- SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSTTTTTTTTTTTTAAAAAAAARRRRRRRTTTT-->
                    <center>
<!-- <a class="btn btn-primary" href="sales.php" target="iframe" style="padding-left: 20px; font-size: 30px;">View Products</a>
<a class="btn btn-primary" href="addproduct.php" target="iframe" style="padding-left: 20px; font-size: 30px">Add Products</a> -->
</center>             
    <center>
        <br>          
        <iframe src="" name="iframe" width="1000" height="1000" frameborder="0" style="overflow: hidden;;"></iframe>           
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
    
   
</body>
</html>

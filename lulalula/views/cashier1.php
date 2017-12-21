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
                    <a class="navbar-brand" href="cashier1.php">
                        <img style="margin-top: -20px;" height="60" src="assets/img/corner.gif" />
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
                        <!-- <li>
                            <a  >
                                <i class="fa fa-users" id=""></i>Users
                            </a>
                        </li> -->
                        <li>
                            <a style="cursor: pointer;" class="tablinks" href="cashier1.php">
                                <i class="fa fa-child"></i>Billing Managment  
                        
                            </a>
                        </li>
                        <li>
                            <a style="cursor: pointer;" class="tablinks" href="viewReports.php?view=1">
                                <i class="fa fa-child"></i>REPORTS
                        
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


<!-- Modal -->
  <div class="modal fade" id="theModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->  

<!-- diri ang sudlanan sa modal -->
<!--   <div id="theModal" class="modal fade text-center">
    <div class="modal-dialog">
      <div class="modal-content">
      </div>
    </div>
  </div> -->



                            <div id="Students" class="tabcontent">
<center><h1 class="page-head-line">Students List</h1></center>
                            <h1 class="page-subhead-line"> </h1>




<!-- KINDER 1  -->
<h2>Kinder 1</h2>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th style="text-align: center;">LRN</th>
                                            <th style="text-align: center;">First Name</th>
                                            <th style="text-align: center;">Last Name</th>
                                            <th style="text-align: center;">Tuition Fee</th>
                                            <th style="text-align: center;">Misc. Fee</th>
                                            <th style="text-align: center;">Entrance Fee</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($billsk1 as $index => $value): ?>
                                        <tr>  
                                            <input type="hidden" value="<?php echo $value['levelID']; ?>">
                                            <td>
                                                <?php echo $value['LRN']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['fName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['lName']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['tuition']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['misc']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['entrance']; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a type="button" class="btn btn-info " <?php  $lr=$value['LRN']; ?> href="payment.php?value=<?php echo $lr ?>" data-toggle="modal" data-target="#theModal">PAY</a>
                                                    </center>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- content end -->
                            
                                <h1 class="page-subhead-line">

</div>

<!-- KINDER 2  -->
<h2>Kinder 2</h2>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th style="text-align: center;">LRN</th>
                                            <th style="text-align: center;">First Name</th>
                                            <th style="text-align: center;">Last Name</th>
                                            <th style="text-align: center;">Tuition Fee</th>
                                            <th style="text-align: center;">Misc. Fee</th>
                                            <th style="text-align: center;">Entrance Fee</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($billsk2 as $index => $value): ?>
                                        <tr>  
                                            <input type="hidden" value="<?php echo $value['levelID']; ?>">
                                            <td>
                                                <?php echo $value['LRN']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['fName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['lName']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['tuition']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['misc']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['entrance']; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a type="button" class="btn btn-info " <?php  $lr=$value['LRN']; ?> href="payment.php?value=<?php echo $lr ?>" data-toggle="modal" data-target="#theModal">PAY</a>
                                                    </center>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- content end -->
                            
                                <h1 class="page-subhead-line">

                                <!-- KINDER 2  -->
<h2>Grade 1</h2>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th style="text-align: center;">LRN</th>
                                            <th style="text-align: center;">First Name</th>
                                            <th style="text-align: center;">Last Name</th>
                                            <th style="text-align: center;">Tuition Fee</th>
                                            <th style="text-align: center;">Misc. Fee</th>
                                            <th style="text-align: center;">Entrance Fee</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($billsg1 as $index => $value): ?>
                                        <tr>  
                                            <input type="hidden" value="<?php echo $value['levelID']; ?>">
                                            <td>
                                                <?php echo $value['LRN']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['fName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['lName']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['tuition']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['misc']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['entrance']; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a type="button" class="btn btn-info " <?php  $lr=$value['LRN']; ?> href="payment.php?value=<?php echo $lr ?>" data-toggle="modal" data-target="#theModal">PAY</a>
                                                    </center>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- content end -->
                            
                                <h1 class="page-subhead-line">

                                <!-- KINDER 2  -->
<h2>Grade 2</h2>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th style="text-align: center;">LRN</th>
                                            <th style="text-align: center;">First Name</th>
                                            <th style="text-align: center;">Last Name</th>
                                            <th style="text-align: center;">Tuition Fee</th>
                                            <th style="text-align: center;">Misc. Fee</th>
                                            <th style="text-align: center;">Entrance Fee</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($billsg2 as $index => $value): ?>
                                        <tr>  
                                            <input type="hidden" value="<?php echo $value['levelID']; ?>">
                                            <td>
                                                <?php echo $value['LRN']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['fName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['lName']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['tuition']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['misc']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['entrance']; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a type="button" class="btn btn-info " <?php  $lr=$value['LRN']; ?> href="payment.php?value=<?php echo $lr ?>" data-toggle="modal" data-target="#theModal">PAY</a>
                                                    </center>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- content end -->
                            
                                <h1 class="page-subhead-line">

                                <!-- KINDER 2  -->
<h2>Grade 3</h2>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th style="text-align: center;">LRN</th>
                                            <th style="text-align: center;">First Name</th>
                                            <th style="text-align: center;">Last Name</th>
                                            <th style="text-align: center;">Tuition Fee</th>
                                            <th style="text-align: center;">Misc. Fee</th>
                                            <th style="text-align: center;">Entrance Fee</th>
                                            <th style="text-align: center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($billsg3 as $index => $value): ?>
                                        <tr>  
                                            <input type="hidden" value="<?php echo $value['levelID']; ?>">
                                            <td>
                                                <?php echo $value['LRN']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['fName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['lName']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['tuition']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['misc']; ?>
                                            </td>
                                            <td>
                                                <?php echo "₱ ".$value['entrance']; ?>
                                            </td>
                                            <td>
                                                <center>
                                                    <a type="button" class="btn btn-info " <?php  $lr=$value['LRN']; ?> href="payment.php?value=<?php echo $lr ?>" data-toggle="modal" data-target="#theModal">PAY</a>
                                                    </center>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- content end -->
                            
                                <h1 class="page-subhead-line">

</div>










                            

</div><!-- end sa col12 -->
                    <!-- /. ROW  -->
                  

</body>
                        
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
        <script type="text/javascript">
            $('#theModal').on('hidden.bs.modal', function () {
                location.reload();
/*  window.alert('hidden event fired!');*/
});
        </script>
    </body>
</html>

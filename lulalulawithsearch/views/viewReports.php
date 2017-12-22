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
    <script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
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
                    <a class="navbar-brand" href="guardian1.php">
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
                            <a style="cursor: pointer;" class="tablinks" href="guardian1.php">
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


<!-- Modal -->
  <div class="modal fade" id="theModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->  



<div id="content" class="tabcontent">
<div style="margin: 0 auto; padding: 20px; width: 900px; font-weight: normal;">
    <div style="width: 100%; height: 190px;" >
    <div style="width: 900px; float: left;">
    <center>
    <img src="assets/img/euro1.png"> <br>
    Cornerstone Inc.,<br>    <br>
    </center>
    <div>
    </div>
    </div>
    <div style="width: 136px; float: left; height: 70px;">

    <table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">
        
    </table>
    
    </div>
    <div class="clearfix"></div>
    </div>
    <div style="width: 100%; margin-top:-70px;">
    <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th style="text-align: center;">Student Name</th>
                                            <th style="text-align: center;">Level</th>
                                            <th style="text-align: center;">Invoice Number</th>
                                            <th style="text-align: center;">Date</th>
                                            <th style="text-align: center;">Miscellenous</th>
                                            <th style="text-align: center;">Tuition Paid</th>
                                            <th style="text-align: center;">Entrance Fee Paid</th>
                                            <th style="text-align: center;">Total Paid</th>
                                            <th style="text-align: center;">Total Due Balance</th>
                                            <th style="text-align: center;">Attendee</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($getRep as $index => $value): ?>
                                        <tr>  
                                            <input type="hidden" value="<?php echo $value['Acc_num']; ?>">
                                            <td>
                                                <?php echo $value['fName']." ".$value['lName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['levelName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['invoice_num']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['misc_pay']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['tuition_pay']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['entrance_pay']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['total_pay']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['due']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['cashier']; ?>
                                            </td>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
    </div>
    </div>                     

</div>
<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
<!-- end sa col12 -->
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
        <script type="text/javascript">
            $('#theModal').on('hidden.bs.modal', function () {
                location.reload();
/*  window.alert('hidden event fired!');*/
});
        </script>
    </body>
</html>

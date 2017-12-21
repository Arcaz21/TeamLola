<?php 

session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
    
}
?>
<?php include "../controllers/usersFunction.php";
 ?>
<!DOCTYPE html>
<html
    xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>
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
            <center>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <center>
                            <i class="fa fa-money"></i>  Payment
                            
                            <i class="fa fa-money"></i>
                        </center>
                    </div>
                    <div class="panel-body">
                        
                            <div class="col-md-4"></div>
                            <!--   Basic Table  -->
                            <form action="<?php $_PHP_SELF ?>" method="POST">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Payment Information</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                             <thead>
                                                    <?php error_reporting(E_ERROR | E_PARSE); foreach ($studinfo as $index => $value): ?>
                                                            <tr>
                                                                <th>LRN: <?php echo $value['LRN']  ?> </th>
                                                                 <input value=" <?php echo $value['LRN']  ?>"  type="hidden" name="LRN" />
                                                                <th>Name: <?php echo $value['fName']." ".$value['lName'];  ?> </th>
                                                                <input value=" <?php echo $value['fName']  ?>"  type="hidden" name="fName" />
                                                                <input value=" <?php echo $value['lName']  ?>"  type="hidden" name="lName" />

                                                            </tr>
                                                    <?php endforeach ?>
                                                    
                                                            <tr> 
                                                                <th>Tuition Fee </th>
                                                                <td>
                                                                    <input placeholder="*minimum ₱500"  class="form-control" type="number" name="tuition" required="" min="<?php  ?>" max="1100" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Miscellaneous Fee</th>
                                                                <td>
                                                                    <input placeholder="*minimum ₱1000"  class="form-control" type="number" name="misc" required="" min="1000" max="1100" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Entrance Fee</th>
                                                                <td>
                                                                    <input placeholder="*minimum ₱1000" class="form-control" type="number" name="entrance" required="" min="1000" max="6000" />
                                                                </td>
                                                            </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End  Basic Table  -->
                                            <input class="btn btn-info" value="TRANSACT" type="submit" name="submit"> 
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </center>
                                <!-- Button trigger modal -->
                                <!--   <a data-toggle="modal" href="#my-modal" class="btn btn-primary btn-lg">Launch demo modal</a>
 -->
                                <!-- Modal -->
                                <!--   <div class="modal fade" id="my-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title">Hello World!</h4></div><div class="modal-body">
          Demo Modal
        </div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></div></div></div>  -->
                            </body>
                        </html>
                        <script src="assets/js/jquery-1.10.2.js"></script>
                        <!-- BOOTSTRAP SCRIPTS -->
                        <script src="assets/js/bootstrap.js"></script>
                        <!-- METISMENU SCRIPTS -->
                        <script src="assets/js/jquery.metisMenu.js"></script>
                        <!-- CUSTOM SCRIPTS -->
                        <script src="assets/js/custom.js"></script>
                        <script src="tabs.js"></script>
                        <script type="text/javascript">
            $('#my-modal').on('hidden.bs.modal', function () {
               /* location.reload();*/
  window.alert('hidden event fired!');
});
        
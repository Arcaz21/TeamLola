<?php 

session_start();
if( !isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("location: index.php");
    
}
?>
<?php include "../controllers/registrarsFunction.php";
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
                                <center><i class="fa fa-child fa-fw"></i>Edit Student Information<i class="fa fa-child fa-fw"></i></center>
                            </div>

                            <div class="panel-body">
                                
<center>
         <form action="<?php $_PHP_SELF ?>" method="POST">
        <table class="table table-striped table-bordered table-hover">
            <?php error_reporting(E_ERROR | E_PARSE); foreach ($studinfo as $index => $value): ?>
                                                <thead>
                                                    <tr>
                                                        <th>LRN</th>
                                                        <td>
                                                            <center>
                                                                <span id='message1' ></span>
                                                            </center>
                                                               <?php echo $value['LRN'] ?>
                                                               <input type="hidden" name="LRN" value="<?php echo $value['LRN'] ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>First Name</th>
                                                                <td>
                                                                    <?php echo $value['fName'] ?>
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
                                                                    <select name="levelID" class="form-control" required="required">
                                                                        <option value="<?php echo $value['levelID'] ?>" >Same level</option>
                                                                        <option value="11">Kinder 1</option>
                                                                        <option value="22">Kinder 2</option>
                                                                        <option value="1">Grade 1</option>
                                                                        <option value="2">Grade 2</option>
                                                                        <option value="3">Grade 3</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>School Year</th>
                                                                <td>
                                                                    <select name="syid" class="form-control" required="required">
                                                                        <option value="<?php echo $value['syid'] ?>" >Same SY</option>
                                                                        <option value="17-18">SY 2017-2018</option>
                                                                        <option value="18-19">SY 2018-2019</option>
                                                                        <option value="19-20">SY 2019-2020</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <?php endforeach; ?>
                                                    </table>
     <tr><input class="btn btn-info" value="SUBMIT NEW RECORD" type="submit" name="submit"></tr>
    </form>
    <br><br>
     <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
</center> 
    </div>

      </div><!-- /.modal-content -->


 </center>  


             

        

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
        </script>
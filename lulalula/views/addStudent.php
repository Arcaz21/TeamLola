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
                        <center>
                            <i class="fa fa-child fa-fw"></i>Add New Student
                            
                            <i class="fa fa-child fa-fw"></i>
                        </center>
                    </div>
                    <div class="panel-body">
                        <center>
                            <div class="col-md-4"></div>
                            <!--   Basic Table  -->
                            <form  action="<?php $_PHP_SELF ?>" method="POST">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Student</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>LRN</th>
                                                        <td>
                                                            <center>
                                                                <span id='message1' ></span>
                                                            </center>
                                                            <input type="hidden" id="lrn1" value="12" >
                                                                <input class="form-control" type="number" name="LRN" id="LRN"   required placeholder="12 digit Unique Learner Reference Number" onkeyup='check1();'>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>First Name</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="fName" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Last Name</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="lName" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Level</th>
                                                                <td>
                                                                    <select name="levelID" class="form-control" required="required">
                                                                        <option value="11">Kinder 1</option>
                                                                        <option value="22">Kinder 2</option>
                                                                        <option value="1">Grade 1</option>
                                                                        <option value="2">Grade 2</option>
                                                                        <option value="3">Grade 3</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Age</th>
                                                                <td>
                                                                    <input  class="form-control" type="number" name="age"  required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother Tongue</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="mtongue" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>IP Group</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="ipGroup" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Birthday</th>
                                                                <td>
                                                                    <input  class="form-control" type="date" name="birthday" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Address</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="address" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mother</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="mother" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Father</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="father" required="" />
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End  Basic Table  -->
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4>Guardian</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Username</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="guardianID" required="" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Password</th>
                                                                <td>
                                                                    <input  class="form-control" name="password" id="password" type="password" onkeyup='check();' />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Confirm Password</th>
                                                                <td>
                                                                    <center>
                                                                        <span id='message' ></span>
                                                                    </center>
                                                                    <input  class="form-control" type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>First Name</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="gFname" required />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Last Name</th>
                                                                <td>
                                                                    <input  class="form-control" type="text" name="gLname" required />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Contact Number</th>
                                                                <td>
                                                                    <center>
                                                                        <span id='message2' ></span>
                                                                    </center>
                                                                    <input type="hidden" id="contactn" value="11" onkeyup='check2();'>
                                                                        <input  class="form-control" type="number" name="contact" id="contact" required placeholder="11 digit mobile number" onkeyup='check2();' maxlength="11" />
                                                                    </td>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <!-- End  Basic Table  -->
                                            <input class="btn btn-info" value="SUBMIT NEW STUDENT" type="submit" name="submit">
                                            </form>
                                            <br>
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                            </center>
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
        
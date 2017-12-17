<!DOCTYPE html>
<html>
<head>
    <title></title> <!-- BOOTSTRAP STYLES-->
        <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css"  />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
        <!--CUSTOM BASIC STYLES-->
        <link href="assets/css/basic.css" rel="stylesheet" />
        <!--CUSTOM MAIN STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
</head>
<body>



<p class="text-center">
    <button class="btn btn-default" data-toggle="modal" data-target="#loginModal">Login</button>
</p>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Login</h5>
            </div>




<label>password :
  <input name="password" id="password" type="password" onkeyup='check();' />
</label>
<br>
<label>confirm password:
  <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' /> 
  <span id='message'></span>
</label>
















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
            var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = document.getElementById('password').length;
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = document.getElementById('password').value.length;
  }
}
        </script>
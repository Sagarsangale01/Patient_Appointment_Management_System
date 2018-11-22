<?php    
include("dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Appointment Managment | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

<?php
$retval = '';
if(!empty($_POST))  {
 // print_r($_REQUEST);

  if(isset($_REQUEST['name'])) { $name = $_REQUEST['name']; } else { $name = ""; }
  if(isset($_REQUEST['email'])) { $email = $_REQUEST['email']; } else { $email = ""; }
  if(isset($_REQUEST['mobile'])) { $mobile = $_REQUEST['mobile']; } else { $mobile = ""; }
  if(isset($_REQUEST['role'])) { $role = $_REQUEST['role']; } else { $role = "Patient"; }
  if(isset($_REQUEST['address'])) { $address = $_REQUEST['address']; } else { $address = ""; }
  if(isset($_REQUEST['password'])) { $password = $_REQUEST['password']; } else { $password = ""; }
  $pass = md5($password);

 $sql = "INSERT INTO users "."(user_name,email_id,mobile_no,role,address,password) "."VALUES "."('$name','$email','$mobile', '$role', '$address', '$pass')";
                   //mysql_select_db('TUTORIALS');
                  $retval = mysql_query( $sql);
}
?>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Appointment Managment</b></a>
  </div>
<?php if ($retval == '') { ?>
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="registration.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="name" id="name" class="form-control" placeholder="Full name" required="required">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="mobile" id="mobile" max="10" placeholder="Mobile Number" required="required">
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="address" id="address" placeholder="Address" required="required">
        <span class="form-control-feedback"><i class="fa fa-newspaper-o"></i></span>
      </div>
        <div class="form-group has-feedback">
        <input type="text" class="form-control" name="password" id="password"  placeholder="Password" required="required">
        <span class="form-control-feedback"><i class="fa fa-eye"></i></span>
      </div>
      
        <input type="hidden" class="form-control" name="role" id="role" value="Patient">
   
      <!-- <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div> -->
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" required="required"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->

    <a href="index.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
  <?php } 
  else { ?>

    <div class="register-box-body">
<p class="login-box-msg"><h3>Thank you for Registring With us. </h3><br>
<a href="index.php" class="text-center">Click Here to Login</a>
</p>
    </div>

  <?php } ?>
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

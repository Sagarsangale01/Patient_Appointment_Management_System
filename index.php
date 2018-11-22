<?php    
include("dbconnect.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Appointment Managment</title>
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

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
    </style>
<body class="hold-transition login-page">
<?php
if(!empty($_POST))  {
  if(isset($_REQUEST['email_id'])) { $email_id = $_REQUEST['email_id']; } else { $email_id = ""; }
  if(isset($_REQUEST['pass'])) { $password = $_REQUEST['pass']; } else { $password = ""; }
  
  $email_id = mysql_real_escape_string($email_id);
  $pas = mysql_real_escape_string($password);
  $password = md5($pas);

 echo $sql = "SELECT user_pk, user_name, role FROM users WHERE BINARY email_id = '$email_id' AND BINARY password = '$password'";
  
 $query = mysql_query("SELECT user_pk, user_name, role FROM users WHERE BINARY email_id = '$email_id' AND BINARY password = '$password'");
    $result = mysql_fetch_row($query, MYSQL_ASSOC);

  if(!empty($result))  {
    $name = $result['user_name'];
    $userid = $result['user_pk'];
	$role = $result['role'];
    session_start();
    $_SESSION['username']=$name; // You can set the value however you like.
     $_SESSION['userid']=$userid;
	 $_SESSION['role']=$role;

 header('Location: dashboard.php');

 }
  else {
    echo "<br><br><div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Entered user name or password is incorrect. Please try again.</div>";

  }
} 

?>

<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Appointment Managment System</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="index.php" method="post">
      <div class="form-group has-feedback">
        <input class="form-control" name="email_id" id="email_id" placeholder="Email Id">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
     <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4" align="center">
          <button type="submit" class="btn btn-success btn-block btn-flat">Sign In</button>
        </div>
         <div class="col-xs-8">
          <button type="submit" class="btn btn-primary btn-block btn-flat"> <a href="registration.php" style="color: white"> New Member Registration</a></button>
        </div>
        <!-- /.col -->
      </div>
      <div align='center'; style ='font:Arial,tahoma,sans-serif;color:#ff0000;'>
        <br>
        <b>Login Details</b>
        <p><b style ='font:Arial,tahoma,sans-serif;color:#000000;'>Admin :</b> Email- <span style ='font:Arial,tahoma,sans-serif;color:#000000;'>admin@gmail.com </span>|| Password - <span style ='font:Arial,tahoma,sans-serif;color:#000000;'>admin</span></p>
      <p><b style ='font:Arial,tahoma,sans-serif;color:#000000;'>Patient:</b> Email- <span style ='font:Arial,tahoma,sans-serif;color:#000000;'>rahul@gmail.com</span> || Password - <span style ='font:Arial,tahoma,sans-serif;color:#000000;'>rahul</span></p>
      <p><b style ='font:Arial,tahoma,sans-serif;color:#000000;'>Doctor:</b> Email- <span style ='font:Arial,tahoma,sans-serif;color:#000000;'>desrb@gmail.com</span> || Password - <span style ='font:Arial,tahoma,sans-serif;color:#000000;'>saurabh</span></p>
      </div>
    </form>

    <br>
	<span align="right"> 
</span>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


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
      increaseArea: '20%' // optional
    });
  });
</script>
</body>

</html>

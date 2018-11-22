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
  <?php include("links.php") ?>
  <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: center;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette-box h4 {
      position: absolute;
      top: 100%;
      left: 25px;
      margin-top: -40px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
    .subtn {
      text-align: center;
    }
    </style>
</head>
<?php 
session_start();
  $user = $_SESSION['username'];
  $userID = $_SESSION['userid'];
if(!empty($user)) {
 
            //code for add form Entery in db
            if(!empty($_POST))  {
                if(isset($_REQUEST['dr_name'])) { $dr_name = $_REQUEST['dr_name']; } else { $dr_name = ""; }
                if(isset($_REQUEST['address'])) { $address = $_REQUEST['address']; } else { $address = ""; }
                if(isset($_REQUEST['mobile'])) { $mobile = $_REQUEST['mobile']; } else { $mobile = ""; }
                if(isset($_REQUEST['email'])) { $email = $_REQUEST['email']; } else { $email = ""; }
                if(isset($_REQUEST['Qualification'])) { $Qualification = $_REQUEST['Qualification']; } else { $Qualification = ""; }
                if(isset($_REQUEST['Specialization'])) { $Specialization = $_REQUEST['Specialization']; } else { $Specialization = ""; }
                if(isset($_REQUEST['Password'])) { $Password = $_REQUEST['Password']; } else { $Password = ""; }
                if(isset($_REQUEST['role'])) { $role = $_REQUEST['role']; } else { $role = "Doctor"; }
                $pass = md5($Password);
                $sql = "INSERT INTO users"."(user_name,email_id,mobile_no,address,quelification,specialization,password,role) "."VALUES "."('$dr_name','$email','$mobile','$address','$Qualification','$Specialization','$pass','$role')";
                   //mysql_select_db('TUTORIALS');
                  $retval = mysql_query( $sql);

                  $lastid = mysql_insert_id();

 $sqlDr = "INSERT INTO doctors"."(dr_name,user_fk,email_id,mobile_no,address,quelification,specialization,password,role) "."VALUES "."('$dr_name','$lastid','$email','$mobile','$address','$Qualification','$Specialization','$pass','$role')";
                   //mysql_select_db('TUTORIALS');
                  $retval2 = mysql_query( $sqlDr);
         
            if(! $retval2 ) {

               echo("<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Could not Entered data </div>" . mysql_error());
            }
            else{
            echo "<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#008000;'> New Record Added successfully</div>";
                $_SESSION['retval']=$retval; ?>
              <script>
              window.location.href = ("view_doct.php"); </script>
               <?php   }
                    }
        ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include("header.php"); ?>
 <?php include("nav_bar.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Doctors
        <!-- <small>Preview of UI elements</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>  Add Doctors</a></li>
        <!-- <li class="active">General</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<br>
<br>
      <div class="row" align="center">
        
 <div class="col-md-12">
          <div class="box box-default box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Add Doctors</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- form start -->
            <form class="form-horizontal" action="add_doct.php" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Dr. Name<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="dr_name" name="dr_name" required="required">
                  </div>
                
                  <label class="col-sm-2 control-label">Address<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="address" name="address" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Mobile No<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="mobile" name="mobile" required="required">
                  </div>
                
                  <label class="col-sm-2 control-label">Email Id<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="email" name="email" required="required">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Qualification<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="Qualification" name="Qualification" required="required">
                  </div>
                
                  <label class="col-sm-2 control-label">Specialization<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="Specialization" name="Specialization" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Password<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" id="Password" name="Password" required="required">
                  </div>
              
                </div> 
                <input type="hidden" class="form-control" name="role" id="role" value="Doctor">
                </div>
              <!-- /.box-body -->
              <div class="box-footer subtn">

                <button type="submit" class="btn btn-info">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
        
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		
		
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php") ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
<?php }
else{

header('Location: index.php');
  }
   ?>
</html>

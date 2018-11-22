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
                if(isset($_REQUEST['date'])) { $date = $_REQUEST['date']; } else { $date = ""; }
                if(isset($_REQUEST['time'])) { $time = $_REQUEST['time']; } else { $time = ""; }
                if(isset($_REQUEST['short_dec'])) { $short_dec = $_REQUEST['short_dec']; } else { $short_dec = ""; }
                if(isset($_REQUEST['doct_fk'])) { $doct_fk = $_REQUEST['doct_fk']; } else { $doct_fk = ""; }
                if(isset($_REQUEST['status'])) { $status = $_REQUEST['status']; } else { $status = ""; }
                if(isset($_REQUEST['patient_fk'])) { $patient_fk = $_REQUEST['patient_fk']; } else { $patient_fk = '$userID'; }

                $sql = "INSERT INTO appointment"."(patient_fk,date,time,short_dec,doct_fk,status) "."VALUES "."('$patient_fk','$date','$time','$short_dec','$doct_fk','$status')";
                   //mysql_select_db('TUTORIALS');
                  $retval = mysql_query( $sql);
         
            if(! $retval ) {

               echo("<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Could not Entered data </div>" . mysql_error());
            }
            else{
            echo "<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#008000;'> Request for Appointment Submitted successfully</div>";
                $_SESSION['retval']=$retval; ?>
              <script>
              window.location.href = ("view_appointment.php"); </script>
               <?php   }
                    }
					
		//query for view book list
          // $query = "SELECT category_pk,category FROM product_category ORDER BY category_pk DESC ";
          // $result = mysql_query($query) or die(mysql_error());			
		  
		  //--------start code for detete--------------------//
      if(!empty($_GET['del_id']))  {
         $delete_id = $_GET['del_id'];
        
          $sql_delete = "DELETE FROM product_category WHERE category_pk=$delete_id";

          $retval_del = mysql_query( $sql_delete);
          $_SESSION['retval_del']=$retval_del;
         
            if(! $retval_del ) {

               echo("<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Could not Deleted data </div>" . mysql_error());
            }
            else{
            echo "<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#008000;'> Record Deleted successfully </div>";
             header('Location: add_category.php');
                }
       }
    //----------end detete code------------------//
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
        Get Appointment
        <!-- <small>Preview of UI elements</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a>Get Appointment</a></li>
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
              <h3 class="box-title">Get Appointment</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- form start -->
            <form class="form-horizontal" action="add_appointment.php" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Date<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <input type="date" class="form-control" id="date" name="date" required="required">
                  </div>
                
                  <label class="col-sm-2 control-label">Time<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <input type="time" class="form-control" id="time" name="time" required="required">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Appointment Reason<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
                    <textarea id="short_dec" name="short_dec" rows="5" cols="50"></textarea>
                  </div>
               
                  <label class="col-sm-2 control-label">Select Doctor<span style="color:#ff0000;">*</span></label>

                  <div class="col-sm-4">
<select name="doct_fk" class="form-control"> 
       <option value=""> -----------Select Doctor----------- </option> 
     <?php
         $dd_res=mysql_query("SELECT user_pk, user_name,specialization FROM users WHERE role = 'Doctor' ORDER BY user_name ASC");
         while($r=mysql_fetch_row($dd_res))
         { 
               echo "<option value='$r[0]'> $r[1] ( $r[2] ) </option>";
         }
     ?>
</select>
                  </div>
                </div>  
                <input type="hidden" class="form-control" name="patient_fk" id="patient_fk" value="<?php echo $userID;?>"> 
                <input type="hidden" class="form-control" name="status" id="status" value="Pending">
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

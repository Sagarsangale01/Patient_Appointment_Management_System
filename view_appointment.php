<?php
include( "dbconnect.php" );
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	</script>
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
	</style>
</head>
<?php 
session_start();
  $user = $_SESSION['username'];
  $userID = $_SESSION['userid'];
  $role = $_SESSION['role'];
  
  
if(!empty($user)) {

	   if(!empty($_GET['id']) && !empty($_GET['status']))  {
         $app_id = $_GET['id'];
        //echo "<br>";
         $status = $_GET['status'];


         $sql_update = "UPDATE appointment SET status ='$status' WHERE app_pk=$app_id";
        // die();
          $retval = mysql_query( $sql_update);
          //$_SESSION['retval_del']=$retval;
         
            if(! $retval ) {

               echo("<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Could not Deleted data </div>" . mysql_error());
            }
            else{
            echo "<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#008000;'> Appointment Updated successfully </div>";
             header('Location: view_appointment.php');
                }
       }
    //----------end detete code------------------//

		 $query = "SELECT app_pk,patient_fk,date,time,short_dec,status,user_name,dr_name,status FROM appointment
				    LEFT JOIN users ON appointment.patient_fk = users.user_pk 
					LEFT JOIN doctors ON doctors.user_fk = appointment.doct_fk ORDER BY app_pk DESC";

		  $result = mysql_query($query) or die(mysql_error()); 
		  
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
        View Appointment
        <!-- <small>Preview of UI elements</small> -->
      </h1>
			
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a>
					</li>
					<li><a>Appointment</a>
					</li>
					<li><a>View Appointment</a>
					</li>
					<!-- <li class="active">General</li> -->
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<br>
				<br>
				<div class="row">

					<div class="col-md-12">
						<div class="box box-default box-solid">
							<div class="box-header with-border">
								<h3 class="box-title">List of Appointments</h3>

								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
								</div>
								<!-- /.box-tools -->
							</div>
							<!-- /.box-header -->


							<div class="box-body">
								<div class="box">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Sr. No.</th>
												<th>Patient Name</th>
												<th>Date</th>
												<th>Time</th>
												<th>Description</th>
												<th>Dr. Name</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$sr_no =1;
											
                while($row = mysql_fetch_array($result)) {
			 
			 $var = $row['date'];

			$date = date("d-m-Y", strtotime($var) );

			$patient = $row['patient_fk'];

			 $status = $row['status'];

			  if('Pending' == $status) { 
                            $color = "#FFD966";
                          } 
                if('Confirm' == $status) {  
                         $color = "#6AA84F";
                             }
                if('Canceled' == $status) {  
                         $color = "#E06666";
                             }
                 if('Post-Pond' == $status) {  
                         $color = "#6FA8DC";
                             }
                  if('Closed' == $status) {  
                         $color = "#C27BA0";
                             }

					?>
	                <?php if($role == 'Admin') { ?>

											    <tr>
											    <td>
												    <?php echo $sr_no;?>
												</td>											
												<td>
													<?php echo $row['user_name'];?>
													</a>
												</td>
												<td>
												   <?php echo $date;?>
												</td>
												<td>
													<?php echo $row['time'];?>
												</td>
												<td>
													<?php echo $row['short_dec'];?>
												</td> 
												<td>
													<?php echo $row['dr_name'];?>
												</td>
												 <td style="background-color: <?php echo "$color"; ?>">
													<?php echo $row['status'];?>
												</td>
												<td> 
													<?php if($role == 'Admin' && $status !='Closed' && $status !='Canceled') { 
														if ($status != 'Confirm') {
														?>
														<a href="view_appointment.php?id=<?php echo $row['app_pk']?>&status=Confirm"><span style="color: #008000" onclick="return confirm('Are you sure to Confirm this Appointment?')">Confirm</span></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="view_appointment.php?id=<?php echo $row['app_pk']?>&status=Post-Pond"><span style="color: #00FFFF" onclick="return confirm('Are you sure to Post-Pond this Appointment?')"><span style="color:#0000FF;">Post-Pond</span></span></a>&nbsp;&nbsp;|&nbsp;&nbsp;
													<?php }?>
													<a href="view_appointment.php?id=<?php echo $row['app_pk']?>&status=Canceled"><span style="color: #00FFFF" onclick="return confirm('Are you sure to Cancel this Appointment?')"><span style="color:#FF0000;">Cancel</span></span></a><?php } ?>
												</td>
											</tr>
												<?php } ?>

										<?php if($role == 'Patient' AND $userID == $patient) { ?>

												 <tr>
											    <td>
												    <?php echo $sr_no;?>
												</td>											
												<td>
													<?php echo $row['user_name'];?>
													</a>
												</td>
												<td>
												   <?php echo $date;?>
												</td>
												<td>
													<?php echo $row['time'];?>
												</td>
												<td>
													<?php echo $row['short_dec'];?>
												</td> 
												<td>
													<?php echo $row['dr_name'];?>
												</td>
												 <td style="background-color: <?php echo "$color"; ?>">
													<?php echo $row['status'];?>
												</td>
												<td> 
												<?php if($role == 'Patient' && $status !='Closed' && $status !='Canceled') { ?><a href="view_appointment.php?id=<?php echo $row['app_pk']?>&status=Canceled"><span style="color: #00FFFF" onclick="return confirm('Are you sure to Cancel this Appointment?')"><span style="color:#FF0000;">Cancel</span></span></a><?php } ?>

										<?php } ?>

										<?php if($role == 'doctors' && $status =='Confirm') { ?>

												 <tr>
											    <td>
												    <?php echo $sr_no;?>
												</td>											
												<td>
													<?php echo $row['user_name'];?>
													</a>
												</td>
												<td>
												   <?php echo $date;?>
												</td>
												<td>
													<?php echo $row['time'];?>
												</td>
												<td>
													<?php echo $row['short_dec'];?>
												</td> 
												<td>
													<?php echo $row['dr_name'];?>
												</td>
												 <td style="background-color: <?php echo "$color"; ?>">
													<?php echo $row['status'];?>
												</td>
												<td>
												<?php if($role == 'doctors' && $status !='Closed' && $status !='Canceled') { ?><a href="view_appointment.php?id=<?php echo $row['app_pk']?>&status=Closed"><span style="color: #00FFFF" onclick="return confirm('Are you sure to Complete this Appointment?')"><span style="color:#FF0000;">Complete</span></span></a><?php } ?>
												</td>
											</tr>
										<?php } ?>

											<?php
											$sr_no+=1; }  ?>
										</tbody>

									</table>

								</div>
								<!-- /.box-body -->
							</div>

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
<?php
   }
else {
header( 'Location: index.php' );
}
?>
</html>
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

	   if(!empty($_GET['id']) && !empty($_GET['fk']))  {
         $pk = $_GET['id'];
        //echo "<br>";
         $fk = $_GET['fk'];


         $sql_deleteDr = "DELETE FROM doctors WHERE dr_pk = '$pk'";
         $retval1 = mysql_query( $sql_deleteDr);
         $sql_deleteUr = "DELETE FROM users WHERE user_pk = '$fk'";
         $retval = mysql_query( $sql_deleteUr);

          //$_SESSION['retval_del']=$retval;
         
            if(! $retval ) {

               echo("<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#ff0000;'> Could not Deleted data </div>" . mysql_error());
            }
            else{
            echo "<div align='center'; style ='font:18px Arial,tahoma,sans-serif;color:#008000;'> Doctor Deleted successfully </div>";
             header('Location: view_doct.php');
                }
       }
 

		 $query = "SELECT dr_pk,user_fk,dr_name,email_id,mobile_no,quelification,specialization FROM doctors
				    ORDER BY dr_name ASC";

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
        View Doctors
        <!-- <small>Preview of UI elements</small> -->
      </h1>
			
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a>
					</li>
					<li><a>Doctors</a>
					</li>
					<li><a>View Doctors</a>
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
								<h3 class="box-title">List of Doctors</h3>

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
												<th>Doctor Name</th>
												<th>Eduction</th>
												<th>Specialization</th>
												<th>Email</th>
												<th>Mobile No.</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$sr_no =1;
											
                while($row = mysql_fetch_array($result)) {

					?>
	                <?php if($role == 'Admin' || $role == 'Doctor') { ?>

											    <tr>
											    <td>
												    <?php echo $sr_no;?>
												</td>											
												<td>
													<?php echo $row['dr_name'];?>
													</a>
												</td>
												<td>
													<?php echo $row['quelification'];?>
												</td>
												<td>
													<?php echo $row['specialization'];?>
												</td> 
												<td>
													<?php echo $row['email_id'];?>
												</td>
												 <td>
													<?php echo $row['mobile_no'];?>
												</td>
												<td> 
												<a href="update_doct.php?id=<?php echo $row['dr_pk']?>">Update</a>&nbsp;&nbsp;|&nbsp;&nbsp;
													<a href="view_doct.php?id=<?php echo $row['dr_pk']?>&fk=<?php echo $row['user_fk']?>"><span style="color: #00FFFF" onclick="return confirm('Are you sure to Delete?')"><span style="color:#FF0000;">Delete</span></span></a>
												</td>
											</tr>
												
											<?php
											$sr_no+=1; }  
										}?>
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
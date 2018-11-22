<?php

$currentPage = basename( $_SERVER[ 'REQUEST_URI' ] );
// echo "$currentPage"."<br>";
$cpage = explode( '?', $currentPage );
$name2 = $cpage[ 0 ];
echo $name2 . "<br>";
$role = $_SESSION['role'];
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>
					<?php echo  $user; ?>
				</p>
				<!-- <small>
					<?php //echo $res['designation']; ?>
				</small> -->
			</div>
		</div>
		<?php if($role == 'Patient') { ?>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<!-- <li class="header">MAIN NAVIGATION</li> -->
			<?php //if ($userID !== 0)  {  ?>
			<li <?php if ($name2=='dashboard.php' ) { ?> class="active"
				<?php }?>>
				<a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </li>

        <?php //}
        // if ($userID !== 0)  {  ?>

			<li <?php if ($name2=='add_appointment.php' || $name2=='view_appointment.php') { ?> class="treeview active"
				<?php } else { ?> class="treeview"
				<?php }?>>
				<a href="#">
            <i class="fa fa-hdd-o"></i>
            <span>Appointment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
				<ul class="treeview-menu">
					<li <?php if ($name2=='add_appointment.php'){ ?> class="active"
						<?php }?>><a href="add_appointment.php"><i class="fa fa-edit"></i> Apply for Appointment</a>
					</li>
					<li <?php if ($name2=='view_appointment.php'){ ?> class="active"
						<?php }?>><a href="view_appointment.php"><i class="fa fa-edit"></i> View Previous Appointment</a>
					</li>
				</ul>
			</li>
			
		</ul>
		<?php } 
		


		if($role == 'Admin') { ?>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<!-- <li class="header">MAIN NAVIGATION</li> -->
			<?php //if ($userID !== 0)  {  ?>
			<li <?php if ($name2=='dashboard.php' ) { ?> class="active"
				<?php }?>>
				<a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </li>

        <?php //}
        // if ($userID !== 0)  {  ?>

			<li <?php if ($name2=='add_doct.php' || $name2=='view_doct.php' || $name2=='update_doct.php') { ?> class="treeview active"
				<?php } else { ?> class="treeview"
				<?php }?>>
				<a href="#">
            <i class="fa fa-hdd-o"></i>
            <span>Doctors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
			
				<ul class="treeview-menu">
					<li <?php if ($name2=='add_doct.php'){ ?> class="active"
						<?php }?>><a href="add_doct.php"><i class="fa fa-edit"></i> Add</a>
					</li>
					<li <?php if ($name2=='view_doct.php'){ ?> class="active"
						<?php }?>><a href="view_doct.php"><i class="fa fa-edit"></i> View</a>
					</li>
				</ul>
			</li>
			
			<li <?php if ($name2=='add_appointment.php' || $name2=='view_appointment.php' || $name2=='update_appointment.php') { ?> class="treeview active"
				<?php } else { ?> class="treeview"
				<?php }?>>
				<a href="#">
            <i class="fa fa-hdd-o"></i>
            <span>Appointments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
			
				<ul class="treeview-menu">
					<li <?php if ($name2=='view_appointment.php'){ ?> class="active"
						<?php }?>><a href="view_appointment.php"><i class="fa fa-edit"></i> View</a>
					</li>
				</ul>
			</li>
			
		</ul>
		<?php } 



		if($role == 'Doctor') { ?>
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<!-- <li class="header">MAIN NAVIGATION</li> -->
			<?php //if ($userID !== 0)  {  ?>
			<li <?php if ($name2=='dashboard.php' ) { ?> class="active"
				<?php }?>>
				<a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </li>

        <?php //}
        // if ($userID !== 0)  {  ?>

			<li <?php if ($name2=='view_appointment.php' || $name2=='update_appointment.php') { ?> class="treeview active"
				<?php } else { ?> class="treeview"
				<?php }?>>
				<a href="#">
            <i class="fa fa-hdd-o"></i>
            <span>Appointments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
			
				<ul class="treeview-menu">
					<li <?php if ($name2=='view_appointment.php'){ ?> class="active"
						<?php }?>><a href="view_appointment.php"><i class="fa fa-edit"></i> View</a>
					</li>
				</ul>
			</li>
			
		</ul>
		<?php } ?>

	</section>
	<!-- /.sidebar -->
</aside>
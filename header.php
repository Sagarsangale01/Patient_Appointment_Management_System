
<header class="main-header">

	<!-- Logo -->
	<a href="Dashboard.php" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<!-- logo for regular state and mobile devices -->
		<span class="logo-mini"><b>AMS</b></span>
		<span class="logo-lg"><b>Appointment Managment System</b></span>
	</a>

	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <span align="center" >
	
		</span>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				
				<!-- User Account: style can be found in dropdown.less -->
				 <!-- <li><?php echo $date; ?></li>  -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo  $user; ?>&nbsp;
              <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
            </a>
				
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

							<p>
								<?php echo  $user; ?>
								<!-- <small>
									<?php //echo $role; ?>
								</small> -->
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-info btn-flat">Change Password</a>
							</div>
							<div class="pull-right">
								<a href="logout.php" class="btn btn-danger btn-flat">Sign out</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>

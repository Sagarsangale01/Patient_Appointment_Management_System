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
</head>
<?php 
session_start();
$user = $_SESSION['username'];
$userID = $_SESSION['userid'];
$role = $_SESSION['role'];
if(!empty($user)) {

?>

<body class="hold-transition skin-blue fixed sidebar-mini" onunload="ajaxFunction()">
<div class="wrapper">
<?php include("header.php"); ?>
<?php 
if($role == 'Admin') {
 include("nav_bar.php"); ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
     <h3 align="center">Welcome to Admin Section</h3>
    </section>

    <!-- /.content -->
  </div>
<?php }
  if($role == 'Patient') {
	 include("nav_bar.php"); ?>
	 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
     <h3 align="center">Welcome to Patient Section </h3>
    </section>

    <!-- /.content -->
  </div>
<?php

 }

if($role == 'Doctor') {
   include("nav_bar.php"); ?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
     <h3 align="center">Welcome to Doctor Section</h3>
    </section>

    <!-- /.content -->
  </div>
<?php }
?>

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


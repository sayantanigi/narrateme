<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Oes Dashboard</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>user_panel/student/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="<?php echo base_url()?>user_panel/student/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

<!-- Timeline CSS -->
<link href="<?php echo base_url()?>user_panel/student/dist/css/timeline.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?php echo base_url()?>user_panel/student/dist/css/sb-admin-2.css" rel="stylesheet">
<link href="<?php echo base_url()?>user_panel/student/dist/css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>user_panel/student/css/dncalendar-skin.min.css">
<!-- Morris Charts CSS -->
<link href="<?php echo base_url()?>user_panel/student/bower_components/morrisjs/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>user_panel/student/css/component.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div id="wrapper"> 
  
  <!-- Navigation -->
  <nav class="navbar navbar-default" role="navigation" style=" background-color:#075b82; margin-bottom: 0;">
    <div class="navbar-header"> 
      <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                --> 
    </div>
    <!-- /.navbar-header -->
    
    <ul class="nav navbar-top-links navbar-right">
    
      <!-- /.dropdown -->
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo $profile_name;?><i class="fa fa-caret-down"></i> </a>
        <ul class="dropdown-menu dropdown-alerts">
          <li> <a href="#">
            <div> <i class="fa fa-comment fa-fw"></i> New Comment <span class="pull-right text-muted small">4 minutes ago</span> </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <i class="fa fa-twitter fa-fw"></i> 3 New Followers <span class="pull-right text-muted small">12 minutes ago</span> </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <i class="fa fa-envelope fa-fw"></i> Message Sent <span class="pull-right text-muted small">4 minutes ago</span> </div>
            </a> </li>
                  
          <li class="divider"></li>
          <li> <a class="text-center" href="#"> <strong>See All Alerts</strong> <i class="fa fa-angle-right"></i> </a> </li>
        </ul>
        <!-- /.dropdown-alerts --> 
      </li>
      <!-- /.dropdown --> 
      <a href="<?php echo base_url('member/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
      <li class="dropdown">
        <ul class="dropdown-menu dropdown-alerts">
          <li> <a href="#">
            <div> <i class="fa fa-comment fa-fw"></i> New Comment <span class="pull-right text-muted small">4 minutes ago</span> </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <i class="fa fa-twitter fa-fw"></i> 3 New Followers <span class="pull-right text-muted small">12 minutes ago</span> </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <i class="fa fa-envelope fa-fw"></i> Message Sent <span class="pull-right text-muted small">4 minutes ago</span> </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <i class="fa fa-tasks fa-fw"></i> New Task <span class="pull-right text-muted small">4 minutes ago</span> </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <i class="fa fa-upload fa-fw"></i> Server Rebooted <span class="pull-right text-muted small">4 minutes ago</span> </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a class="text-center" href="#"> <strong>See All Alerts</strong> <i class="fa fa-angle-right"></i> </a> </li>
        </ul>
        <!-- /.dropdown-alerts --> 
      </li>
      <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links --> 
  </nav>
  <?php echo $this->load->view('instructor/aside');?>
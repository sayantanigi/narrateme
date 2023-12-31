<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Oes Dashboard</title>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>user_panel/business/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="<?php echo base_url()?>user_panel/business/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

<!-- Timeline CSS -->
<link href="<?php echo base_url()?>user_panel/business/dist/css/timeline.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?php echo base_url()?>user_panel/business/dist/css/sb-admin-2.css" rel="stylesheet">
<link href="<?php echo base_url()?>user_panel/business/dist/css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>user_panel/business/css/dncalendar-skin.min.css">
<!-- Morris Charts CSS -->
<link href="<?php echo base_url()?>user_panel/business/bower_components/morrisjs/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>user_panel/business/css/component.css" />
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
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-envelope fa-fw"></i> </a>
        <ul class="dropdown-menu dropdown-messages">
          <li> <a href="#">
            <div> <strong>John Smith</strong> <span class="pull-right text-muted"> <em>Yesterday</em> </span> </div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <strong>John Smith</strong> <span class="pull-right text-muted"> <em>Yesterday</em> </span> </div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div> <strong>John Smith</strong> <span class="pull-right text-muted"> <em>Yesterday</em> </span> </div>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a> </li>
          <li class="divider"></li>
          <li> <a class="text-center" href="#"> <strong>Read All Messages</strong> <i class="fa fa-angle-right"></i> </a> </li>
        </ul>
        <!-- /.dropdown-messages --> 
      </li>
      <!-- /.dropdown -->
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-comments fa"></i> </a>
        <ul class="dropdown-menu dropdown-tasks">
          <li> <a href="#">
            <div>
              <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
              </div>
            </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div>
              <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
              </div>
            </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div>
              <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
              </div>
            </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a href="#">
            <div>
              <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
              <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
              </div>
            </div>
            </a> </li>
          <li class="divider"></li>
          <li> <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a> </li>
        </ul>
        <!-- /.dropdown-tasks --> 
      </li>
      <!-- /.dropdown -->
      <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $profile_name;?> <i class="fa fa-caret-down"></i> </a>
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
  <?php echo $this->load->view('business/aside');?>
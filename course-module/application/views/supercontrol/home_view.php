<style type="text/css">
.dashboard-stat .visual > i {
    margin-left: 0;
}
.dashboard-stat .visual {height:150px!important;}
.dashboard-stat .details .desc {font:30px;}
</style>
<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
 </head>
 <body>
   <h1>Home</h1>
   <h2>Welcome <?php //echo $UserName; ?>!</h2>
   <a href="home/logout">Logout</a>
 </body>
</html>-->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <?php $this->load->view('supercontrol/leftbar');//include"lib/leftbar.php" ?>
    <!-- END SIDEBAR -->
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <!-- BEGIN PAGE BAR -->
       <h3 class="page-title"> Dashboard
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li><a style="pointer-events:none;" href="<?php base_url();?>supercontrol/home">Home</a><i class="fa fa-angle-right"></i></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <!-- BEGIN DASHBOARD STATS 1-->
      <div class="row">
       <!--<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard-stat blue">
            <div class="visual"> <i class="fa fa-sliders"></i> </div>
            <div class="details">
              <div class="desc">Course Managements</div>
            </div>
            <a class="more" href="<?php echo base_url(); ?>supercontrol/course/show_course"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
        </div>-->
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="dashboard-stat red">
            <div class="visual"> <i class="fa fa-picture-o"></i> </div>
            <div class="details">
              <!--<div class="number"> <span data-counter="counterup" data-value="12,5">0</span>M$ </div>-->
              <div class="desc">Course Management</div>
            </div>
            <a class="more" href="<?php echo base_url();?>supercontrol/course/show_course"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="dashboard-stat red">
            <div class="visual"> <i class="fa fa-picture-o"></i> </div>
            <div class="details">
              <!--<div class="number"> <span data-counter="counterup" data-value="12,5">0</span>M$ </div>-->
              <div class="desc">Instructor Management</div>
            </div>
            <a class="more" href="<?php echo base_url();?>supercontrol/home"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="dashboard-stat red">
            <div class="visual"> <i class="fa fa-newspaper-o"></i> </div>
            <div class="details">
              
              <div class="desc">Booking Management</div>
            </div>
            <a class="more" href="<?php echo base_url();?>supercontrol/home"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="dashboard-stat red">
            <div class="visual"> <i class="fa fa-envelope"></i> </div>
            <div class="details">
              
              <div class="desc">Student Management</div>
            </div>
            <a class="more" href="<?php echo base_url();?>supercontrol/home"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
        </div>
     
      </div>
      <div class="clearfix"></div>
      <!-- END DASHBOARD STATS 1-->
     </div>
    <!-- END CONTENT BODY -->
  </div>
  <!-- END CONTENT -->
  <!-- BEGIN QUICK SIDEBAR -->
  <a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a>
  <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
    
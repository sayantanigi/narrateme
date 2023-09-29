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

    <?php $this->load->view('leftbar');//include"lib/leftbar.php" ?>

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

       <h3 class="page-title"> Dashboard <small>dashboard & statistics</small>

        </h3>

        <div class="page-bar">

            <ul class="page-breadcrumb">

                <li><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i></li>

                <li><span>Dashboard</span></li>

            </ul>

        </div>

      <!-- END PAGE BAR -->

      <!-- BEGIN PAGE TITLE-->

      <!-- BEGIN DASHBOARD STATS 1-->

      <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

          <div class="dashboard-stat blue">

            <div class="visual"> <i class="fa fa-comments"></i> </div>

            <div class="details">

              <!--<div class="number"> <span data-counter="counterup" data-value="1349">0</span> </div>-->

              <div class="desc"> Individual  </div>

            </div>

            <a class="more" href="javascript:;"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>

        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

          <div class="dashboard-stat red">

            <div class="visual"> <i class="fa fa-bar-chart-o"></i> </div>

            <div class="details">

              <!--<div class="number"> <span data-counter="counterup" data-value="12,5">0</span>M$ </div>-->

              <div class="desc"> Students  </div>

            </div>

            <a class="more" href="javascript:;"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>

        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

          <div class="dashboard-stat green">

            <div class="visual"> <i class="fa fa-shopping-cart"></i> </div>

            <div class="details">

              <!--<div class="number"> <span data-counter="counterup" data-value="549">0</span> </div>-->

              <div class="desc"> Educational Institution  </div>

            </div>

            <a class="more" href="javascript:;"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>

        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

          <div class="dashboard-stat purple">

            <div class="visual"> <i class="fa fa-globe"></i> </div>

            <div class="details">

              <!--<div class="number"> + <span data-counter="counterup" data-value="89"></span>% </div>-->

              <div class="desc"> Instructional Facility  </div>

            </div>

            <a class="more" href="javascript:;"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>

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

    <div class="page-quick-sidebar">

      <ul class="nav nav-tabs">

        <li class="active"> <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users <span class="badge badge-danger">2</span> </a> </li>

        <li> <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts <span class="badge badge-success">7</span> </a> </li>

        <li class="dropdown"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More <i class="fa fa-angle-down"></i> </a>

          <ul class="dropdown-menu pull-right">

            <li> <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-bell"></i> Alerts </a> </li>

            <li> <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-info"></i> Notifications </a> </li>

            <li> <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-speech"></i> Activities </a> </li>

            <li class="divider"></li>

            <li> <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-settings"></i> Settings </a> </li>

          </ul>

        </li>

      </ul>

      <div class="tab-content">

        <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">

          <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">

            <h3 class="list-heading">Staff</h3>

            

            <h3 class="list-heading">Customers</h3>

            

      </div>

    </div>

  </div>

  <!-- END QUICK SIDEBAR -->

</div>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Oesacademy | <?php echo $title;?></title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700" rel="stylesheet">
  <link href="<?php echo base_url()?>user_panel/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>user_panel/css/font-awesome.css" rel="stylesheet">
  <link href="<?php echo base_url()?>user_panel/css/jquery.bxslider.css" rel="stylesheet">
  <link href="<?php echo base_url()?>user_panel/css/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url()?>user_panel/css/oes.css" rel="stylesheet">
  <link href="<?=base_url();?>user_panel/css/jquery.datetimepicker.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" />
</head>
<body>
  <!-- Header Area Start Here-->
  <div class="cms_index about-bg">
    <div class="container">
      <div class="row"> 
        <div class="col-sm-12"> 
        <!-- top nav and logo area start here-->
        <div class="header_panel"> 
          <!-- Top navigation Panerl Design start here-->
          <div class="top_navigation">
            <ul>
              <li><a href="<?=base_url('contact');?>">Contact us</a></li>
              <li><a href="<?=base_url('faq');?>">FAQ</a></li>
              <li><a href="<?=base_url('news/newslist');?>">News</a></li>
              <li><a href="<?php echo base_url('auth/registration')?>">Register</a></li>
              <?php if(!$this->session->userdata('is_user_id')){?>
                <li><a href="<?php echo base_url('auth/login')?>">Login</a></li>
              <?php }else{?>
                <li><a href="<?php echo base_url('member/profile')?>">Profile</a></li>
                <li><a href="<?php echo base_url('member/logout')?>">Logout</a></li>
              <?php }?>
              <!-- <li><a href="#">Cart</a></li> -->
            </ul>
          </div>

          <div class="logo_and_nav"> 
            <!-- logo panel Here-->
            <div class="col-sm-5 col-xs-5">
              <div class="logo"><a href="<?php echo base_url()?>" title="OES ACAGEMY"><img src="<?php echo base_url()?>user_panel/images/logo.png" alt="logo"></a></div>
            </div>
            <!-- logo panel End Here--> 
            <!-- Search box and navogation here-->
            <div class="col-sm-7 col-xs-7"> 
              <!-- Search And Coll Us panel Desiugn start here-->
              <div class="search_and_call"> 
                <!-- Call Us -->
                <div class="callus">
                  <p><span>Call us: </span> 020 7096 1212</p>
                </div>
                <!-- Call Us --> 
                <!-- Search Box-->
                <div class="search_box hidden-xs">
                  <form class="form-search" method="post"  action="<?=base_url('home/search')?>">
                    <div class="input-append">
                      <input type="text" class="input-medium search-query" name="key" placeholder="Search" >
                      <button type="submit" class="add-on"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </form>
                </div>
                <!-- Search Box--> 
              </div>
            </div>
            <!-- Search box and navogation End here--> 
              <div class="navbigation_panel"> 
                <!-- Bootstrap nav-->
                <nav class="navbar navbar-default">
                  <div class="container-fluid"> 
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" 
                      data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?=base_url();?>">Home</a></li>
                        <li><a href="<?=base_url();?>about">About Us</a></li>
                        <li><a href="<?php echo base_url('category')?>">Courses</a></li>
                        <li><a href="<?=base_url();?>about/business">Corporate training</a></li>
                        <li><a href="<?=base_url();?>about/student">Student Support</a></li>
                      </ul>
                    </div>
                    <!-- /.navbar-collapse --> 
                  </div>
                  <!-- /.container-fluid --> 
                </nav>
                <!-- Bootstrap Nav End Here--> 
              </div>
            <!-- Nav panel Desiugn End here--> 
          </div>
          <!-- Logo and nav area End here--> 

        </div>
      </div>
        <!-- top nav and logo area End here--> 

        <!-- Page Heading -->
        <div class="clearfix"></div>
        <h1 class="page-heading"><?php echo strtoupper ( $title) ?></h1>
        <!-- End Page Heading --> 

      </div>
    </div>
  </div>
<!-- Header Area End Here-->
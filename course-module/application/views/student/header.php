<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Oesacademy | <?=$title;?></title>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700" rel="stylesheet">
<link href="<?=base_url();?>user_panel/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url();?>user_panel/css/font-awesome.css" rel="stylesheet">
<link href="<?=base_url();?>user_panel/css/jquery.bxslider.css" rel="stylesheet">
<link href="<?=base_url();?>user_panel/css/oes.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" />

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="user_panel/css/font-awesome.min.css">
    <!-- ALL CSS FILES -->
    <link href="<?=base_url();?>user_panel/new/css/materialize.css" rel="stylesheet">
    <link href="<?=base_url();?>user_panel/new/css/bootstrap.css" rel="stylesheet" />
    <link href="<?=base_url();?>user_panel/new/css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="<?=base_url();?>user_panel/new/css/style-mob.css" rel="stylesheet" />
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>user_panel/student/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="<?php echo base_url()?>user_panel/student/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

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

  
  <link href="<?php echo base_url()?>user_panel/css/owl.carousel.css" rel="stylesheet">
  
  <link href="<?=base_url();?>user_panel/css/jquery.datetimepicker.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" />
</head>
<body>
  
<!-- Header Area Start Here-->
  <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="index.html"><img src="<?php echo base_url(); ?>user_panel/new/logo.png" alt="" />
            </a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <h4>Main Menu</h4>
                            <ul>
                                <li><a href="<?=base_url();?>">Home</a></li>
                                <li><a href="<?=base_url();?>about">About us</a></li>
                                <li class="cour-menu"><a href="" class="mm-arr">Services</a>
                  <div class="cour-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-cour-com mm1-s3">
                                                     <ul>
                                                        <li><a href="<?=base_url();?>about">Individual Courses</a></li>
                            <li><a href="<?=base_url();?>about">Corporate Training</a></li>
                            <li><a href="<?=base_url();?>about">Private Teaching</a></li>
                                                    </ul>
                                                </div>
                      </div>
                    </div>
                </li>
                                <li><a href="<?php echo base_url('category')?>">Courses</a></li>
                                <li><a href="<?=base_url();?>about">Events</a></li>
                                <li><a href="dashboard.html">Student</a></li>
                                <li><a href="<?=base_url('contact');?>">Contact us</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                              <?php foreach($settings as $s){?>
                                 <li><a href="#">Location: The Centre, Farnham Road, Slough, SL1 4UT</a>
                                </li>
           <li><a href="#">Phone: 020 7096 1212</a>
                                </li>
          
          <?php }?>
                                                           </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul>
                                 <li><a href="<?php echo base_url('auth/registration')?>">Register</a></li>
      <?php if(!$this->session->userdata('is_user_id')){?>
      <li><a href="<?php echo base_url('auth/login')?>">Login</a></li>
      <?php } else {?>
        <li><a href="<?php echo base_url('member/profile')?>">Profile</a></li>
        <li><a href="<?php echo base_url('member/logout')?>">Logout</a></li>
      <?php } ?>
                            </ul>
                        </div>
                        <div class="ed-com-t1-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       

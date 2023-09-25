<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SKILLOGICS | <?=$title;?></title>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700" rel="stylesheet">
<link href="<?=base_url();?>user_panel/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url();?>user_panel/css/font-awesome.css" rel="stylesheet">
<link href="<?=base_url();?>user_panel/css/jquery.bxslider.css" rel="stylesheet">
<link href="<?=base_url();?>user_panel/css/oes.css" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico" />

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="<?=base_url();?>user_panel/css/font-awesome.min.css">
    <!-- ALL CSS FILES -->
    <link href="<?=base_url();?>user_panel/new/css/materialize.css" rel="stylesheet">
    <link href="<?=base_url();?>user_panel/new/css/bootstrap.css" rel="stylesheet" />
    <link href="<?=base_url();?>user_panel/new/css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="<?=base_url();?>user_panel/new/css/style-mob.css" rel="stylesheet" />
 
 

  
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
                        <a href="<?=base_url();?>"><img src="<?=base_url();?>user_panel/new/images/logo.jpg" alt="" />
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
                                <li class="cour-menu"><a href="#" class="mm-arr">Services</a>
                                    <div class="cour-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-cour-com mm1-s3">
                                                     <ul>
                                                        <li><a href="individual-course.html">Individual Courses</a></li>
                                                        <li><a href="corporate-training.html">Corporate Training</a></li>
                                                        <li><a href="private-teaching.html">Private Teaching</a></li>
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

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="<?php echo base_url()?>"><img src="<?=base_url();?>user_panel/new/images/logo.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="<?php echo base_url()?>">Home</a></li>
                                <li><a href="<?php echo base_url('about')?>">About us</a></li>
                                 <li class="cour-menu"><a href="<?=base_url();?>course/corporatetraining" class="mm-arr">Services</a>
                                    <div class="cour-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-cour-com mm1-s3">
                                                     <ul>
                                                        <li><a href="individual-course.html">Individual Courses</a></li>
                                                        <li><a href="corporate-training.html">Corporate Training</a></li>
                                                        <li><a href="private-teaching.html">Private Teaching</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                </li>
                                <li><a href="<?php echo base_url('category')?>">Courses</a></li>
                                <li><a href="<?=base_url();?>course/events">Events</a></li>
                                <li><a href="<?=base_url();?>about/student">Student</a></li>
                                <li><a href="<?=base_url('contact');?>">Contact us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="all-drop-down-menu">

                    </div>

                </div>
            </div>
        </div>
    
    
        <div class="search-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-form">
                            <form>
                                <div class="sf-type">
                                    <div class="sf-input">
                                        <input type="text" id="sf-box" placeholder="Search course and discount courses">
                                    </div>
                                    <div class="sf-list">
                                        <ul>
                                            <li><a href="course-details.html">Accounting/Finance</a></li>
                                            <li><a href="course-details.html">Civil Engineering</a></li>
                                            <li><a href="course-details.html">Art/Design</a></li>
                                            <li><a href="course-details.html">Marine Engineering</a></li>
                                            <li><a href="course-details.html">Business Management</a></li>
                                            <li><a href="course-details.html">Journalism/Writing</a></li>
                                            <li><a href="course-details.html">Physical Education</a></li>
                                            <li><a href="course-details.html">Political Science</a></li>
                                            <li><a href="course-details.html">Sciences</a></li>
                                            <li><a href="course-details.html">Statistics</a></li>
                                            <li><a href="course-details.html">Web Design/Development</a></li>
                                            <li><a href="course-details.html">SEO</a></li>
                                            <li><a href="course-details.html">Google Business</a></li>
                                            <li><a href="course-details.html">Graphics Design</a></li>
                                            <li><a href="course-details.html">Networking Courses</a></li>
                                            <li><a href="course-details.html">Information technology</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sf-submit">
                                    <input type="submit" value="Search Course">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

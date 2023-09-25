<?php $uid= base64_decode($_GET["token"]);
//echo $uid;die; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Narrateme | Courses</title>

<link rel="stylesheet" href="<?=base_url();?>user_panel/new/css/bootstrap.css">
<link rel="stylesheet" href="<?=base_url();?>user_panel/new/css/custom.css">
<link rel="stylesheet" href="<?=base_url();?>user_panel/new/css/menu.css">
<link rel="stylesheet" href="<?=base_url();?>user_panel/new/css/responsive-media.css">
<link rel="stylesheet" href="<?=base_url();?>user_panel/new/css/owl.carousel.min.css">
</head>

<body>

<div class="header">
<div class="top-section" id="myHeader">
    
<!--div class="top-header">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="top-right clearfix">
    <div class="search-detail">
        <div class="search-form-top">
        <input type="checkbox" id="searchBoxOpener">
                    <label for="searchBoxOpener">
                   <img src="<?=base_url();?>user_panel/new/images/search-icon.png" alt=""></label>
                   <div class="searchForm">                              
<div class="dgwt-wcas-search-wrapp dgwt-wcas-no-submit woocommerce">
<form>
<div class="dgwt-wcas-sf-wrapp">
    <svg version="1.1" class="dgwt-wcas-ico-magnifier" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 51.539 51.361" enable-background="new 0 0 51.539 51.361" xml:space="preserve">
<path d="M51.539,49.356L37.247,35.065c3.273-3.74,5.272-8.623,5.272-13.983c0-11.742-9.518-21.26-21.26-21.26
      S0,9.339,0,21.082s9.518,21.26,21.26,21.26c5.361,0,10.244-1.999,13.983-5.272l14.292,14.292L51.539,49.356z M2.835,21.082
      c0-10.176,8.249-18.425,18.425-18.425s18.425,8.249,18.425,18.425S31.436,39.507,21.26,39.507S2.835,31.258,2.835,21.082z"></path>
</svg>
    <input type="search" class="dgwt-wcas-search-input" name="" value="" placeholder="Search">
</div>
</form>
</div>                           </div>
                </div>
                <p>What you want to pursue?</p>
    </div>        	
            <div class="social-icon">
            	<ul>
                	<li><a href="#"><img src="<?=base_url();?>user_panel/new/images/facebook.png" alt=""></a></li>
                    <li><a href="#"><img src="<?=base_url();?>user_panel/new/images/twitter.png" alt=""></a></li>
                    <li><a href="#"><img src="<?=base_url();?>user_panel/new/images/linkedin.png" alt=""></a></li>
                    <li><a href="#"><img src="<?=base_url();?>user_panel/new/images/instagram.png" alt=""></a></li>
                    <li><a href="#"><img src="<?=base_url();?>user_panel/new/images/youtube.png" alt=""> </a></li>
                </ul>
            </div>
          
            <div class="Country-time">
            	<span class="flag-cty">
                	<img src="<?=base_url();?>user_panel/new/images/flag-1.png" alt="">
                   <p> 7:58:00 pm</p>
                </span>
                <span class="flag-cty">
                	<img src="<?=base_url();?>user_panel/new/images/flag-2.png" alt="">
                   <p> 2:59:00 pm</p>
                </span>
                <span class="flag-cty">
                	<img src="<?=base_url();?>user_panel/new/images/flag-3.png" alt="">
                  <p> 11:00:00 pm</p>
                </span>
            </div>
            <div class="menuTop">
            	<ul>
                    <li><a href="<?php echo base_url('vacancies')?>">Vacancy </a></li>
                         <li><a href="<?php echo base_url('blog')?>">Blog   </a></li>
                         <li><a href="<?php echo base_url('news/newslist')?>">News</a></li>
                         <li><a href="<?php echo base_url('faq')?>">FAQ</a></li>
                </ul>
            </div>
            
        </div>
</div>
</div>
</div>
</div-->
<div class="nav-header">
  <div class="container">
   <div class="row">
  	<div class="col-2">
    	<div class="top-logo"><a href="http://narrateme.com/new/index.php"><img src="<?=base_url();?>user_panel/new/images/logo.png" alt=""></a></div>
    </div>
    <div class="col-10">
      <div class="right-header">
      	
        <div class="header-menu clearfix">
          
            <div class="menu-bar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse iphonNav nav-top clearfix collapse navigation" id="myNavbar" style="display: block;">
                <div class="top-logo" style="display:none"><a href="<?=base_url();?>"><img src="<?=base_url();?>user_panel/new/images/nav-logo.png" alt=""></a></div>
                    <div class="menu-top-menu-container">
                        <ul>
                            <li><a href="http://narrateme.com/new/index.php">Home</a></li>
                            <li><a href="http://narrateme.com/new/page.php?id=17">About Us</a></li>
                            <li><a href="http://narrateme.com/new/page.php?id=18">Members</a></li>
                            <li><a href="http://narrateme.com/new/page.php?id=19">Individuals</a></li>
                            <li><a href="http://narrateme.com/new/php?id=20">Students</a></li>
                            <li><a href="http://narrateme.com/new/page.php?id=21">Educational Institutions</a></li>
                            <li><a href="http://narrateme.com/new/page.php?id=22">Instructional Facilities &amp; Schools</a></li>
                            <li><a href="http://narrateme.com/new/product_list.php">Products</a></li>
                            <li><a href="<?php echo base_url('courses')?>">Courses</a></li>
                            <li><a href="http://narrateme.com/new/contact.php?id=5">Contact Us</a></li>
                        </ul>
                       
                    </div>
                   
               
                </div>
                </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  </div>
</div>
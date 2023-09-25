

<div class="slider-banner">

	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
      
      <?php foreach($banners as $b){?>
    <div class="carousel-item <?php if ($i == '1'): ?>
                                active
                            <?php endif ?> ">
        <div class="slider-img">
            <img src="<?=base_url();?>user_panel/new/images/slider-1.jpg" alt="">
        </div>
        <div class="caption-banner">
    <div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="content-banner">
                	<div class="hd-banner">
                       <span><?= $b->banner_heading ?>!</span> 
                        <?= $b->banner_sub_heading ?>
                    </div>
                   
                    <div class="destinations-list">                    	
                        <?= $b->banner_description ?>
                    </div>
                    <div class="inquiryNow clearfix">
                    	 <a href="#" class="button-default orange">Read More</a>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    </div>
    </div>
    
       <?php $i++;} ?>
  </div>

  
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleFade" data-slide-to="1"></li>
  </ol>
</div>
    
</div>

</div>
<section class="about-section">
<div class="container-fluid">
	<div class="row">    	
        <div class="col-sm-5">
        	<div class="about-info">
              <h1><?php echo ($content[0]->content_title);?></h1>
             <p><?php echo ($content[0]->content_details);?></p>
             <span><?php echo ($content[0]->content_sub_title);?></span>
              <a href="#" class="button-default orange">Read More</a> <a href="#" data-toggle="modal" data-target="#myModal" class="button-default">Watch Video</a>
            </div>
        </div>
        <div class="col-sm-7">
        	<div class="ab-img">
            	<img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image;?>" alt="">
            </div>
        </div>
    </div>
</div>
</section>
<section class="upcoming-courses">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-center">
                    <div class="heading-md">
                        <?php echo ($content[0]->content_title_1);?> 
                    </div>
                        <p><?php echo ($content[0]->content_details_1);?></p>
                </div>
                <div class="courses-view">
                    <ul>
                        <?php if(is_array($eloca)): ?>
                            <?php
                            $ctn=1;
                            foreach($eloca as $i){
                            ?>
                        <li>
                            <div class="list-box">
                                <figure><img src="<?php echo base_url()?>uploads/courseimage/<?php echo $i->course_image?>" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3><?php echo $i->course_name;?></h3>
                                    <span class="name-bt"><?php 
                                $this->load->model('generalmodel'); 
                                $table_name = 'sm_category';
                                $primary_key = 'category_id';
                                $wheredata = $i->course_category;
                                $queryallcat = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
                                echo $queryallcat[0]->category_name;
                            ?></span>
                                </div>
                                <div class="price-view"><span>Price $<?php echo $i->price;?></span></div>
                                <div class="contentView">
                                    <p><?php echo $i->course_startDate;?> to <?php echo $i->course_endDate;?></br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="<?=base_url();?>courses/upcomingcoursedetails/<?php echo $i->course_id;?>" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                        <?php $ctn++;}?>
                          <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="courses-structure" style="background-image:url(<?=base_url();?>user_panel/new/images/courses-structure-bg.jpg)">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="structure-img">
                	<img src="<?=base_url();?>user_panel/new/images/laptop.png" alt="">
                </div>
            </div>
            <div class="col-md-6">
            	<div class="structure-content">
                	<h3><?php echo ($content[0]->content_title_2);?></h3>
                    <p><span><?php echo ($content[0]->content_sub_title_2);?> </span></p>
                    <p><?php echo ($content[0]->content_details_2);?> </p>
                      <a href="<?php echo ($content[0]->video_link_2);?>" data-toggle="modal" data-target="#myModal-1" class="button-default orange">Watch Video</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="corporate-section-part" style="background-image: url('<?=base_url();?>user_panel/new/images/on-campus-background.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="corporate-training">
                    <h3><?php echo ($content[0]->content_title_3);?></h3>
                    <ul>
                       
                        <li> <a href="#"><?php echo ($content[0]->content_details_3);?></a> </li>
                        <!--<li> <a href="#"> Eullam venenatis lectus quis elit dapibus accumsan.</a> </li>
                        <li> <a href="#"> Donec tincidunt nibh sit amet massa ultrices.</a> </li>
                        <li> <a href="#"> Cras et elit sed est accumsan feugiat.</a> </li>-->
                    </ul>
                    <a href="#" class="button">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="skils-private-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="private-online">
                    <figure><img src="<?php echo base_url()?>uploads/content/<?php echo $contents[0]->content_image;?>" alt=""></figure>
                    <h4><?php echo ($contents[0]->content_title);?></h4>
                    <ul>
                         <?php echo ($contents[0]->content_details);?>
                        <!--<li> Etiam sed nibh consequat, congue libero eu, porttitor nisl.</li>
                        <li> Eullam venenatis lectus quis elit dapibus accumsan.</li>
                        <li> Aenean eget odio luctus, gravida est sed, dignissim nunc.</li>
                        <li>Donec tincidunt nibh sit amet massa ultrices, non placerat arcu fringilla.</li>
                        <li>Curabitur nec arcu et elit ornare sollicitudin venenatis vitae ex. </li>-->
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="private-online">
                    <figure><img src="<?php echo base_url()?>uploads/content/<?php echo $contents[0]->content_image_1;?>" alt=""></figure>
                    <h4><?php echo ($contents[0]->content_title_1);?></h4>
                    <ul>
                        <?php echo ($contents[0]->content_details_1);?>
                        <!--<li> Etiam sed nibh consequat, congue libero eu, porttitor nisl.</li>
                        <li> Eullam venenatis lectus quis elit dapibus accumsan.</li>
                        <li> Aenean eget odio luctus, gravida est sed, dignissim nunc.</li>
                        <li>Donec tincidunt nibh sit amet massa ultrices, non placerat arcu fringilla.</li>
                        <li>Curabitur nec arcu et elit ornare sollicitudin venenatis vitae ex. </li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="corporate-section-part" style="background-image: url('<?=base_url();?>user_panel/new/images/corporate-background.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="corporate-training">
                    <h3><?php echo ($content[0]->content_title_4);?></h3>
                    <ul>
                        
                        <li> <a href="#"><?php echo ($content[0]->content_details_4);?></a> </li>
                       
                    </ul>
                    <a href="#" class="button">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="latest-newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="newsletter-part">
                    <div id="carouselHome" class="carousel slide" data-ride="carousel">
                        <!--<ol class="carousel-indicators">
                            <li data-target="#carouselHome" data-slide-to="0" class="active"></li>
                            
                        </ol>-->
                        <div class="carousel-inner">
                            
                             <?php
                             $i=1;
                             foreach ($testimonial as $key => $value) {  ?>
                            <div class="carousel-item <?php if ($i == '1'): ?>
                                active
                            <?php endif ?> ">
                                <img src="<?=base_url();?>user_panel/new/images/newsletter-men-img.jpg" alt="">
                                <h3><?php echo $value->testimonial_title; ?></h3>
                                <p><?php echo $value->testimonial_desc; ?> </p>
                                <span>“<?php echo $value->posted_by; ?>”</span>
                            </div>
                            <?php $i++ ;
                            }  ?>
                        </div>
                    </div>
                </div>
                <div class="latest-part-row">
                    <div class="latest-heading">
                        <h3><?php echo ($contents[0]->content_title_2);?></h3>
                        <?php echo ($contents[0]->content_details_2);?>
                    </div>
                    <div class="latest-slider-tab">
                        <div class="owl-carousel owl-carousel-review">
                            
                            <?php if($news!=''){
                                  foreach($news as $ns){
                            ?>

                            <div class="item">
                                <div class="latest-customer-deatils">
                                    <div class="date-year">
                                        9 JAN
                                    </div>
                                    <h4><?php echo $ns->news_title?></h4>
                                    <p><?php echo strip_tags(substr($ns->news_desc,0,100));?></p>   
                                    <span><img src="<?=base_url();?>user_panel/new/images/user-icon.png" alt=""><?php echo $ns->posted_by?></span>
                                </div>
                            </div>
                            
                            <?php }
                                }
                          ?>
  
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



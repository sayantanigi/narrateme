 <?php
     $content = $this->generalmodel->show_data_id("sm_page_content",6,"id","get","");
    //print($content[0]->page_title);die;
 ?>


<div class="inner-banner">
    <div class="blue-banenr">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner-hd-banenr">
                        About Us
                    </div>
                    <div class="badecame">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<section class="about-section about-section-inner">
    <div class="container-fluid">
        <div class="row">    	
            <div class="col-sm-6">
               <div class="about-detail-inner">
                   <h1><?php echo ($content[0]->content_title);?></h1>
                   <?php echo ($content[0]->content_details);?>
                    <a href="#" data-toggle="modal" data-target="#myModal" class="button-default">Watch Video</a>
               </div>
            </div>
            <div class="col-sm-6">
                <div class="ab-img">
                    <img src="<?=base_url();?>user_panel/new/images/about-inn-img.png" alt="">
                </div>
            </div>
        </div>
    </div>
    </section>

<section class="misson-section-inn">
    <div class="container">
    	<div class="row">
        	 <div class="col-md-6">
                 <div class="mission-left">
                     <img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image_1;?>" alt="">
                 </div>
            </div>
            <div class="col-md-6">
                <div class="about-detail-inner mission-content">
                    <h1><?php echo ($content[0]->content_title_1);?></h1>
                   <?php echo ($content[0]->content_details_1);?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="courses-structure vision-section" style="background-image:url(<?=base_url();?>user_panel/new/images/courses-structure-bg.jpg)">
	<div class="container-fluid">
    	<div class="row">
            <div class="col-md-6">
            	<div class="about-detail-inner">
                	<h3><?php echo ($content[0]->content_title_2);?></h3>
                   <?php echo ($content[0]->content_details_2);?>
                     
                </div>
            </div>
            <div class="col-md-6">
            	<div class="structure-img">
                	<img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image_2;?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="who-we-areDiv">
    <div class="container">
    	<div class="row">
        	 <div class="col-md-12">
                 <div class="main-heading">
                     <h3><?php echo ($content[0]->content_title_3);?></h3>
                   <?php echo ($content[0]->content_details_3);?>
                 </div>
                 <div class="who-weAre-detil">
                     <figure><img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image_3;?>" alt=""></figure>
                 </div>
            </div>
        </div>
    </div>
</section>
<section class="team_Section">
    <div class="container">
    	<div class="row">
        	 <div class="col-md-12">
                 <div class="main-heading">
                     <h3><?php echo ($content[0]->content_title_4);?></h3>
                   <?php echo ($content[0]->content_details_4);?>
                 </div>
            </div>
        </div>
        <div class="row">
            <?php if($team!=''){
                                  foreach($team as $ns){
                            ?>
            <div class="col-md-4">
                <div class="team-box">
                    <figure><a href="#"><img src="<?php echo base_url()?>uploads/team/<?php echo $ns->mem_image?>" alt=""></a></figure>
                    <div class="team-title">
                        <h4><a href="#"><?php echo $ns->mem_name?></a></h4>
                        <span><?php echo $ns->mem_desig?> </span>
                    </div>
                </div>
            </div>
            
            <?php }
                                }
                          ?>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="whyChoose-us">
                    <div class="images-choose">
                   <img src="<?=base_url();?>user_panel/new/images/why-choose-img.png" alt="">
                   
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>

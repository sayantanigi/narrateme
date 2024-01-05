<?php
     $content = $this->generalmodel->show_data_id("sm_page_content",8,"id","get","");
    //print($content[0]->page_title);die;
 ?>

<div class="inner-banner">
    <div class="blue-banenr">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner-hd-banenr">
                        Corporate Training
                    </div>
                    <div class="badecame">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Corporate Training</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<section class="empower-staff-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
               
                <div class="corporate-training">
                    <img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image;?>">
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
                        <?php echo ($content[0]->content_title);?>
                    </div>
                            <?php echo ($content[0]->content_details);?>          
                            </div>
                <div class="courses-view">
                    <ul>
                        <li>
                            <div class="list-box">
                                <figure><img src="<?=base_url();?>user_panel/new/images/Basic-Computer-Course.jpg" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3>Basic Computer Course</h3>
                                    <span class="name-bt">New York</span>
                                </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                    <p>1/5/2020 to 8/6/2020 <br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-box">
                                <figure><img src="<?=base_url();?>user_panel/new/images/Microsoft-Office.jpg" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3>Microsoft Office 365</h3>
                                    <span class="name-bt">New York</span>
                                </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                    <p>1/5/2020 to 8/6/2020<br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-box">
                                <figure><img src="<?=base_url();?>user_panel/new/images/Microsoft-Excel.jpg" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3>Microsoft Excel</h3>
                                    <span class="name-bt">New York</span>
                                </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                    <p>1/5/2020 to 8/6/2020<br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-box">
                                <figure><img src="<?=base_url();?>user_panel/new/images/Java-Programming.jpg" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3>Java Programming</h3>
                                    <span class="name-bt">New York</span>
                                </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                    <p>1/5/2020 to 8/6/2020<br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-box">
                                <figure><img src="<?=base_url();?>user_panel/new/images/HTML-CSS-JavaScript.jpg" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3>HTML, CSS, JavaScript</h3>
                                    <span class="name-bt">New York</span>
                                </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                    <p>1/5/2020 to 8/6/2020<br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-box">
                                <figure><img src="images/back-and-development.jpg" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3>Back End Development</h3>
                                    <span class="name-bt">New York</span>
                                </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                    <p>1/5/2020 to 8/6/2020<br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-box">
                                <figure><img src="images/sql.jpg" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3>SQL</h3>
                                    <span class="name-bt">New York</span>
                                </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                    <p>1/5/2020 to 8/6/2020<br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-box">
                                <figure><img src="<?=base_url();?>user_panel/new/images/cc++-java.jpg" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3>C++, Java, Python</h3>
                                    <span class="name-bt">New York</span>
                                </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                    <p>1/5/2020 to 8/6/2020<br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="list-box">
                                <figure><img src="<?=base_url();?>user_panel/new/images/mysqland-php.jpg" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3>MySQL and PHP</h3>
                                    <span class="name-bt">New York</span>
                                </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                    <p>1/5/2020 to 8/6/2020<br>
                                        Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt">
                                    <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a>
                                </div>
                            </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="register-as-business">
    <div class="container">
    	<div class="row">
        	 <div class="col-sm-12">
                <div class="title-center">
                    <div class="heading-md">
                        <?php echo ($content[0]->content_title_1);?>
                    </div>
                        <?php echo ($content[0]->content_details_1);?>
                     </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="register-box">
                    <div class="imgasBox">
                        <img src="<?=base_url();?>user_panel/new/images/01-blue.png" alt="">
                        <p>01</p>
                    </div>
                    <h4>Book one to Many employees in
                        one single course</h4>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="register-box">
                    <div class="imgasBox">
                        <img src="<?=base_url();?>user_panel/new/images/02-pink.png" alt="">
                        <p>02</p>
                    </div>
                    <h4>View Progress of your employees
                        through our portal</h4>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="register-box">
                    <div class="imgasBox">
                        <img src="<?=base_url();?>user_panel/new/images/03-sky.png" alt="">
                        <p>03</p>
                    </div>
                    <h4>Browse through our specific courses
                        designed for corporate clients</h4>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="register-box">
                    <div class="imgasBox">
                        <img src="<?=base_url();?>user_panel/new/images/04-yellow.png" alt="">
                        <p>04</p>
                    </div>
                    <h4>Special discounts to corporate
                        clients</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="some-industries">
                    <img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image_1;?>" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hire-expertsection" style="background-image: url('<?=base_url();?>user_panel/new/images/hire-expert-bg.jpg');">
    <div class="container">
    	<div class="row">
        	 <div class="col-sm-12">
                 <div class="hire-our-exprt">
                     <div class="expertHeading">
                        Hire our Experts
                     </div>
                     <img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image_2;?>" alt="">
                 </div>
            </div>
        </div>
    </div>
</section>

<section class="getIn-touch">
    <div class="container">
        <div class="get-in-touchForm">
            <div class="row">
                <div class="col-sm-7">
                    <div class="get-touch-form">
                        <div class="title-center">
                            <div class="heading-md">
                                <?php echo ($content[0]->content_title_2);?>
                            </div>
                                <?php echo ($content[0]->content_details_2);?>
                        </div>
                        <div class="gform_wrapper">
                            <form>
                                <div class="gform_body">
                                <ul class="gform_fields">
                                   <li class="gfield gf_left_half">
                                       <label class="gfield_label" for="">Company Name</label>
                                       <div class="ginput_container_text">
                                           <input name="" type="text" value="" class="medium">
                                       </div>
                                   </li>
                                   <li class="gfield gf_right_half">
                                       <label class="gfield_label" for="">Contact Name</label>
                                       <div class="ginput_container ginput_container_email">
                                           <input name="" type="text" value="" class="medium">
                                       </div>
                                   </li>
                                   <li class="gfield gf_left_half">
                                       <label class="gfield_label" for="">Position</label>
                                       <div class="ginput_container ginput_container_text">
                                           <input name="" type="text" value="" class="medium">
                                       </div>
                                   </li> 
                                   <li class="gfield gf_right_half">
                                        <label class="gfield_label" for="">Telephone Number</label>
                                        <div class="ginput_container ginput_container_text">
                                            <input name="" type="tel" value="" class="medium">
                                        </div>
                                    </li>  
                                    <li class="gfield gf_left_half">
                                        <label class="gfield_label" for="">Email Address</label>
                                        <div class="ginput_container ginput_container_text">
                                            <input name="" type="email" value="" class="medium">
                                        </div>
                                    </li> 
                                    <li class="gfield gf_right_half">
                                         <label class="gfield_label" for="">Website</label>
                                         <div class="ginput_container ginput_container_text">
                                             <input name="" type="text" value="" class="medium">
                                         </div>
                                     </li>                
                                   <li class="gfield gf_left_half">
                                       <label class="gfield_label" for="">Experts</label>
                                       <div class="ginput_container_text">
                                           <select type="text" class="medium" name="">
                                               <option>Select</option>
                                           </select>
                                       </div>
                                   </li> 
                                   <li class="gfield gf_left_half">
                                        <label class="gfield_label" for="">Method of Service Delivery</label>
                                        <div class="ginput_container_text">
                                            <select type="text" class="medium" name="">
                                                <option>Select</option>
                                            </select>
                                        </div>
                                    </li> 
                                   <li class="gfield">
                                       <label class="gfield_label" for="">Message</label>
                                      <div class="ginput_container ginput_container_textarea">
                                          <textarea name="" class="textarea medium"></textarea>
                                      </div>
                                   </li> 
                                 </ul>
                                </div>
                                <div class="gform_footer top_label"> 
                                <input type="submit" class="gform_button button" value="Submit"> 
                                 </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="get-inTouch-right">
                        <img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image_3;?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
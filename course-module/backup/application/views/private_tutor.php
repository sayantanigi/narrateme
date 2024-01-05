<div class="inner-banner">
    <div class="blue-banenr">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner-hd-banenr">
                        Private Tutor
                    </div>
                    <div class="badecame">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Private Tutor</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="hirePrivaie-tutor-sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="campusCourses-outer">
                <div class="campusCourses">
                    <div class="title-center">
                        <div class="heading-md">
                            <?php echo ($content[0]->content_title);?>
                        </div>
                        <p><?php echo ($content[0]->content_details);?></p>
                        <a href="#" class="button-default">Watch Video</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="privateStudies-div">
                    <div class="div-heading">
                        <h2><?php echo ($content[0]->content_title_1);?></h2>
                        <p><?php echo ($content[0]->content_details_1);?></p>
                    </div>
                    <div class="computerStudies-slide">
                        <div id="carouselHome" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="studyCaption">
                                       
                                       <figure> <img src="<?=base_url();?>user_panel/new/images/study-img.png" alt=""></figure>
                                       <div class="captionInn">
                                       <h3>Computer Studies</h3>
                                       <p>Donec hendrerit lacus non urna dictum bibendum. Fusce tristique dui vel tempor blandit. Ut ac eros tincidunt, vulputate justo non, ultricies libero.</p>
                                       <a href="#" class="button-default">Course Detail </a>
                                       </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="studyCaption">
                                       
                                       <figure> <img src="<?=base_url();?>user_panel/new/images/study-img.png" alt=""></figure>
                                       <div class="captionInn">
                                       <h3>Computer Studies</h3>
                                       <p>Donec hendrerit lacus non urna dictum bibendum. Fusce tristique dui vel tempor blandit. Ut ac eros tincidunt, vulputate justo non, ultricies libero.</p>
                                       <a href="#" class="button-default">Course Detail </a>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-arrow">
                                <a class="carousel-control-prev" href="#carouselHome" role="button" data-slide="prev">
                                </a>
                                <a class="carousel-control-next" href="#carouselHome" role="button" data-slide="next">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="privateStudies-right">
                    <div class="div-heading">
                        <h2><?php echo ($content[0]->content_title_2);?>:</h2>
                        <p><?php echo ($content[0]->content_details_2);?> </p>
                    </div>
                    <div class="privatTutor-forms">
                        <div class="wrapper-form">
                            <div class="gform_wrapper">
                             <form>
                                 <div class="gform_body">
                                 <ul class="gform_fields">
                                    <li class="gfield gf_left_half">
                                        <label class="gfield_label" for="">Select your subject</label>
                                        <div class="ginput_container_text">
                                            <select type="text" class="medium" name="" placeholder="Select">
                                                <option>Select</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="gfield gf_right_half">
                                        <label class="gfield_label" for="">Number of hours</label>
                                        <div class="ginput_container_text">
                                            <select type="text" class="medium" name="" placeholder="Select">
                                                <option>Select</option>
                                            </select>
                                        </div>
                                    </li> 
                                    <li class="gfield">
                                        <label class="gfield_label" for="">Write down the topic</label>
                                       <div class="ginput_container ginput_container_textarea">
                                           <textarea name="" class="textarea medium" placeholder="Write"></textarea>
                                       </div>
                                    </li>         
                                    <li class="gfield">
                                        <label class="gfield_label" for="">Delivery mode:</label>
                                       <div class="ginput_container ginput_container_radio">
                                           <div class="gfield_radio">
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" id="inlineRadio1" value="male">
                                                Online </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="gender" id="inlineRadio2" value="female">
                                                    On Campus </label>
                                            </div>
                                       </div>
                                    </li>                        
                                    <li class="gfield gf_left_half">
                                        <label class="gfield_label" for="">Contact #</label>
                                        <div class="ginput_container ginput_container_email">
                                            <input name="" type="text" value="" class="medium" placeholder="000 - 000 - 0000">
                                        </div>
                                    </li>    
                                    <li class="gfield gf_right_half">
                                        <label class="gfield_label" for="">Email</label>
                                        <div class="ginput_container ginput_container_text">
                                            <input name="" type="text" value="" class="medium" placeholder="Your email">
                                        </div>
                                    </li>                   
                                    
                                  </ul>
                                 </div>
                                 <div class="gform_footer top_label"> 
                                 <input type="submit" class="gform_button button" value="Call me for a quotation"> 
                                  </div>
                             </form>
                         </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ourExpert-sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="expert-md">
                    <div class="heading-md">
                       <?php echo ($content[0]->content_title_3);?>
                    </div>
                    <p><?php echo ($content[0]->content_details_3);?></p>
                </div>
           </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="expert-boxes">
                    <div class="expert-dtl">
                        <h3><?php echo ($contents[0]->content_title);?></h3>
                        <p><?php echo ($contents[0]->content_details);?></p>
                    </div>
                    <figure><img src="<?php echo base_url()?>uploads/content/<?php echo $contents[0]->content_image;?>" alt=""></figure>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="expert-boxes">
                    <div class="expert-dtl">
                        <h3><?php echo ($contents[0]->content_title_1);?></h3>
                        <p><?php echo ($contents[0]->content_details_1);?></p>
                    </div>
                    <figure><img src="<?php echo base_url()?>uploads/content/<?php echo $contents[0]->content_image_1;?>" alt=""></figure>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="expert-boxes">
                    <div class="expert-dtl">
                        <h3><?php echo ($contents[0]->content_title_2);?></h3>
                        <p><?php echo ($contents[0]->content_details_2);?></p>
                    </div>
                    <figure><img src="<?php echo base_url()?>uploads/content/<?php echo $contents[0]->content_image_2;?>" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="hire-an-expert-section">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="formExpert">
                <div class="form-heading">
                    <h3>
                        Hire an Expert
                    </h3>
                    <p> Drop us few lines about the course that you like, and we would do the rest: </p>
                </div>
                <div class="wrapper-form">
                            <div class="gform_wrapper">
                             <form>
                                 <div class="gform_body">
                                 <ul class="gform_fields">
                                    <li class="gfield gf_left_half">
                                        <label class="gfield_label" for="">Name</label>
                                        <div class="ginput_container_text">
                                            <input name="" type="text" value="" class="medium" placeholder="Your Name">
                                        </div>
                                    </li>
                                    <li class="gfield gf_right_half">
                                        <label class="gfield_label" for="">Contact #</label>
                                        <div class="ginput_container ginput_container_email">
                                            <input name="" type="text" value="" class="medium" placeholder="000 - 000 - 0000">
                                        </div>
                                    </li>
                                    <li class="gfield gf_left_half">
                                        <label class="gfield_label" for="">Email</label>
                                        <div class="ginput_container ginput_container_text">
                                            <input name="" type="text" value="" class="medium" placeholder="Your email">
                                        </div>
                                    </li>            
                                    <li class="gfield gf_right_half">
                                        <label class="gfield_label" for="">Problem</label>
                                        <div class="ginput_container_text">
                                            <select type="text" class="medium" name="" placeholder="Select">
                                                <option>Select</option>
                                            </select>
                                        </div>
                                    </li> 
                                    <li class="gfield">
                                        <label class="gfield_label" for="">Describe Problem</label>
                                       <div class="ginput_container ginput_container_textarea">
                                           <textarea name="" class="textarea medium" placeholder="Describe"></textarea>
                                       </div>
                                    </li> 
                                    <li class="gfield gfield_html">
                                        <div class="ginput_container_text">
                                        <label class="gfield_label" for="">Upload your files:</label>
                                        <input type="file" id="myfile" name="myfile">
                                    </div>
                                    </li>        
                                  </ul>
                                 </div>
                                 <div class="gform_footer top_label"> 
                                 <input type="submit" class="gform_button button" value="Call me for a quotation"> 
                                  </div>
                             </form>
                         </div>
                    </div>
             </div>
        </div>
    </div>
</div>

</section>

<section class="what-happen-next">
    <div class="container">
    	<div class="row">
        	 <div class="col-md-12">
                 <div class="what-happen-next-dtls">
                     <h3><?php echo ($content[0]->content_title_4);?></h3>
                     <ul>
                        <?php echo ($content[0]->content_details_4);?>
                     </ul>
                 </div>
            </div>
        </div>
    </div>
</section>
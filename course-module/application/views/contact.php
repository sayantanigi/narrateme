 <?php
     $content = $this->generalmodel->show_data_id("sm_cms",11,"id","get","");
   // print($content[0]->cms_heading);die;
 ?>

  </div>
        <div class="inner-banner">
            <div class="blue-banenr">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="inner-hd-banenr">
                                Contact Us
                            </div>
                            <div class="badecame">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Contact Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <section class="contact-page">
                <div class="container">
                   <div class="row">
                      <div class="col-sm-6">
                          <div class="main-form-div">
                              <div class="form-title">
                                  <h2><?php echo ($content[0]->cms_heading);?></h2>
                                  <?php echo ($content[0]->description);?>
                              </div>
                            <div class="gform_wrapper">
                            	<form>
                                	<div class="gform_body">
                                        <ul class="gform_fields">
                                            <li class="gfield gf_left_third">
                                                <label class="gfield_label" for="">First Name*<span class="gfield_required">*</span></label>
                                                <div class="ginput_container_text">
                                                    <input name="" type="text" value="" class="medium">
                                                </div>
                                            </li>
                                            <li class="gfield gf_middle_third">
                                                <label class="gfield_label" for="">Last  Name*<span class="gfield_required">*</span></label>
                                                <div class="ginput_container ginput_container_text">
                                                    <input name="" type="text" value="" class="medium">
                                                </div>
                                            </li>
                                            <li class="gfield gf_right_third">
                                                <label class="gfield_label" for="">Location</label>
                                                <div class="ginput_container ginput_container_text">
                                                <input name="" type="text" value="" class="medium">
                                                </div>
                                                </li>
                                            <li class="gfield gf_right_half">
                                                <label class="gfield_label" for="">Email*<span class="gfield_required">*</span></label>
                                                <div class="ginput_container ginput_container_text">
                                                    <input name="" type="text" value="" class="medium">
                                                </div>
                                            </li>
                                            <li class="gfield gf_left_half">
                                                <label class="gfield_label" for="">Phone #*<span class="gfield_required">*</span></label>
                                                <div class="ginput_container ginput_container_text">
                                                    <input name="" type="text" value="" class="medium">
                                                </div>
                                            </li>
                                            <li class="gfield gf_left_half">
                                                <label class="gfield_label" for="">Choose One Social Network ! </label>
                                                <div class="ginput_container_text">
                                                    <select type="text" class="medium" name="">
                                                        <option>Select</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="gfield gf_left_half">
                                                <label class="gfield_label" for="">Please Write Your Social Network ID: </label>
                                                <div class="ginput_container_text">
                                                    <select type="text" class="medium" name="">
                                                        <option>Select</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <li class="gfield">
                                                <label class="gfield_label" for="">Tell us about your background</label>
                                                <div class="ginput_container ginput_container_textarea">
                                                    <textarea name="" class="textarea medium"></textarea>
                                                </div>
                                            </li>
                                            <li class="gfield gf_left_half">
                                                <div class="captcha"><img src="<?=base_url();?>user_panel/new/images/captcha.png"></div>
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
                    </div>
                </div>
        </section>
        <section class="contact-page-location">
            <div class="container">
            	<div class="row">
            	    
            	    <?php //print_r($contactdetails);die;
             foreach ($contactdetails as $b) {
				//print_r($b);die;
					 ?>
					 
                	 <div class="col-md-6">
                         <div class="about-location">
                             <div class="location-heading">
                                 <h3><?php  echo $b->country_name; ?></h3>
                                 <img src="<?php echo base_url()?>uploads/contactdetails/<?php echo $b->country_image;?>" alt="">
                             </div>
                             <div class="contact-info-outer">
                                 <div class="contact-info-inter">
                                    <div class="address-col">
                                        <img src="<?=base_url();?>user_panel/new/images/add-icon.png" alt="">
                                        <p><span>Address:</span> <?php  echo $b->address; ?></p>
                                    </div>
                                    <div class="address-col mail-add">
                                        <img src="<?=base_url();?>user_panel/new/images/mail-icon.png" alt="">
                                        <p><span>Mail:</span> <a href="mailto: <?php  echo $b->mail; ?>"> <?php  echo $b->mail; ?></a></p>
                                    </div>
                                     <div class="address-col">
                                         <img src="<?=base_url();?>user_panel/new/images/phone-icon.png" alt="">
                                         <p><span>Phone:</span> <a href="tel: <?php  echo $b->phone; ?>"> <?php  echo $b->phone; ?></a></p>
                                     </div>
                                     
                                     <?php if($b->mobile!= ""){?>
                                     <div class="address-col">
                                        <img src="<?=base_url();?>user_panel/new/images/mobile-icon.png" alt="">
                                        <p><span>Mobile:</span> <a href="tel:<?php  echo $b->mobile; ?>"><?php  echo $b->mobile; ?></a></p>
                                    </div>
                                    <?php } else{?>
                                    
                                    <div class="address-col">
                                       <img src="<?=base_url();?>user_panel/new/images/whatsapp-icon.png" alt="">
                                       <p><span>What App:</span> <a href="tel:<?php  echo $b->whatapp; ?>"><?php  echo $b->whatapp; ?></a></p>
                                   </div>
                                   
                                   <?php }?>
                                 </div>
                             </div>
                         </div>
                    </div>
                    
                   
                    <?php } ?>
                </div>
            </div>
        </section>
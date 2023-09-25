<?php
     $content = $this->generalmodel->show_data_id("sm_page_content",7,"id","get","");
     $cont = $this->generalmodel->show_data_id("sm_cms",9,"id","get","");
    //print($content[0]->page_title);die;
 ?>

        <div class="inner-banner">
            <div class="blue-banenr">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="inner-hd-banenr">
                                Services
                            </div>
                            <div class="badecame">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Services</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="iec-vacancies-top-sec service-inn-page" style="background-image:url(<?=base_url();?>user_panel/new/images/section-bg-about.jpg);">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-center">
                    <div class="faq-heading-md">
                      <?php echo ($content[0]->content_title);?>
                    </div>
                    <?php echo ($content[0]->content_details);?>
                  </div>
                </div>
              </div>
            </div>
        </section>
    <section class="accommodation-service-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-center">
                        <div class="faq-heading-md">
                            <?php echo ($content[0]->content_title_1);?>
                        </div>
                           <?php echo ($content[0]->content_details_1);?>
                    </div>
                    <div class="accommodation-list-servies">
                        <ul>
                            <li>
                                <div class="apartments-text">
                                    <figure>
                                        <a href="#"> <img src="<?=base_url();?>user_panel/new/images/on-campus-icon.png" alt=""> </a>
                                    </figure>
                                    <h4> <a href="#">On-Campus</a> </h4>
                                </div>
                            </li>
                            <li>
                                <div class="apartments-text">
                                    <figure>
                                        <a href="#"> <img src="<?=base_url();?>user_panel/new/images/instraction-icon.png" alt=""> </a>
                                    </figure>
                                    <h4> <a href="#">Qualified Instructors</a> </h4>
                                </div>
                            </li>
                            <li>
                                <div class="apartments-text">
                                    <figure>
                                        <a href="#"> <img src="<?=base_url();?>user_panel/new/images/private-icon.png" alt=""> </a>
                                    </figure>
                                    <h4> <a href="#">Private</a> </h4>
                                </div>
                            </li>
                            <li>
                                <div class="apartments-text">
                                    <figure>
                                        <a href="#"> <img src="<?=base_url();?>user_panel/new/images/online-icon.png" alt=""> </a>
                                    </figure>
                                    <h4> <a href="#">Online</a> </h4>
                                </div>
                            </li>
                            <li>
                                <div class="apartments-text">
                                    <figure>
                                        <a href="#"> <img src="<?=base_url();?>user_panel/new/images/hire-expert-icon.png" alt=""> </a>
                                    </figure>
                                    <h4> <a href="#">Hire Our Experienced Experts</a> </h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-training-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-center">
                        <div class="faq-heading-md">
                        <?php echo ($content[0]->content_title_2);?>
                        </div>
                        <?php echo ($content[0]->content_details_2);?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="training-box">
                        <figure><img src="<?=base_url();?>user_panel/new/images/hard-copy.jpg" alt=""></figure>
                        <div class="training-box-dtl">
                            <h4><a href="#">Hard Copy and online access
                            to Training materials</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="training-box">
                        <figure><img src="<?=base_url();?>user_panel/new/images/hand-on-applied.jpg" alt=""></figure>
                        <div class="training-box-dtl">
                            <h4><a href="#">Hands On <br>
                            Applied Approach</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="training-box">
                        <figure><img src="<?=base_url();?>user_panel/new/images/learn-skills.jpg" alt=""></figure>
                        <div class="training-box-dtl">
                            <h4><a href="#">Learn Skills that <br>
                            really Matter</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="training-box">
                        <figure><img src="<?=base_url();?>user_panel/new/images/accredit-certificates.jpg" alt=""></figure>
                        <div class="training-box-dtl">
                            <h4><a href="#">Accredited Certificatesr</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="training-box">
                        <figure><img src="<?=base_url();?>user_panel/new/images/virtual-campus.jpg" alt=""></figure>
                        <div class="training-box-dtl">
                            <h4><a href="#">Campus and Virtual
                            interaction with instructors</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our-instructors-sec">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="title-center">
                        <div class="faq-heading-md">
                            <?php echo ($content[0]->content_title_3);?>
                        </div>
                        <?php echo ($content[0]->content_details_3);?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="ourInstructor-box">
                        <figure><img src="<?=base_url();?>user_panel/new/images/experience-icon.png" alt=""></figure>
                        <h4><a href="#">Experienced</a></h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="ourInstructor-box">
                        <figure><img src="<?=base_url();?>user_panel/new/images/checkmark.png" alt=""></figure>
                        <h4><a href="#">Verified</a></h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="ourInstructor-box">
                        <figure><img src="<?=base_url();?>user_panel/new/images/qualified-icon.png" alt=""></figure>
                        <h4><a href="#">Qualified</a></h4>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="ourInstructor-box">
                        <figure><img src="<?=base_url();?>user_panel/new/images/certified-icon.png" alt=""></figure>
                        <h4><a href="#">Certified</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="visa-main-section" style="background-image:url('<?=base_url();?>user_panel/new/images/visa-background-img.jpg')">
           <div class="visa-col-part">
              <div class="visa-ticket-details">
                 <h2> <?php echo ($content[0]->content_title_4);?> </h2>
                 <?php echo ($content[0]->content_details_4);?>
                 <ul class="visa-list">
                   <li>
                     <div class="visa-content">
                        <img src="<?=base_url();?>user_panel/new/images/your-campus-online.png" alt="">
                        <h4><a href="#">Your Campus / Online</a></h4>
                     </div>
                   </li>
                   <li>
                     <div class="visa-content">
                        <img src="<?=base_url();?>user_panel/new/images/experienced-img.png" alt="">
                        <h4><a href="#">Experienced</a></h4>
                     </div>
                   </li>
                   <li>
                     <div class="visa-content">
                        <img src="<?=base_url();?>user_panel/new/images/satisfaction-icon.png" alt="">
                        <h4><a href="#">100% Satisfaction
                        Promise</a></h4>
                     </div>
                   </li>
                  
                 </ul>
              </div>
           </div>
        </section>
    <section class="our-instructors-sec why-us-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-center">
                            <div class="faq-heading-md">
                           <?php echo ($cont[0]->cms_heading);?>
                            </div>
                            <?php echo ($cont[0]->description);?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="travel-box-1">
                            <figure>
                                <img src="<?=base_url();?>user_panel/new/images/why-us-01.jpg" alt="">
                            </figure>
                            <figcaption>
                                <h5><a href="#">100% Refunded if <br>
                                not satisfied</a></h5>
                            </figcaption>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="travel-box-1">
                            <figure>
                                <img src="<?=base_url();?>user_panel/new/images/why-us-02.jpg" alt="">
                            </figure>
                            <figcaption>
                                <h5><a href="#">Flexibility: On-Campus,
                                Private and Online</a></h5>
                            </figcaption>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="travel-box-1">
                            <figure>
                                <img src="<?=base_url();?>user_panel/new/images/why-us-03.jpg" alt="">
                            </figure>
                            <figcaption>
                                <h5><a href="#">Fair Price Guaranteed</a></h5>
                            </figcaption>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="travel-box-1">
                            <figure>
                                <img src="<?=base_url();?>user_panel/new/images/why-us-04.jpg" alt="">
                            </figure>
                            <figcaption>
                                <h5><a href="#">Accredited certificates</a></h5>
                            </figcaption>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
     $content = $this->generalmodel->show_data_id("sm_page_content",9,"id","get","");
    //print($content[0]->page_title);die;
 ?>  
  
       <div class="inner-banner">
            <div class="blue-banenr">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="inner-hd-banenr">
                                Vacancies
                            </div>
                            <div class="badecame">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Vacancies</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <section class="iec-vacancies-top-sec" style="background-image:url(<?=base_url();?>user_panel/new/images/section-bg-about.jpg);">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-center">
                    <div class="faq-heading-md">
                      <?php echo ($content[0]->content_title);?>
                    </div>
                   <?php echo ($content[0]->content_details);?>
<!--                    <a href="#" class="button-default">Read More</a>
-->                  </div>
                </div>
              </div>
            </div>
        </section>
        <section class="business-developr-USE">
          <div class="container">
            <div class="business-developr-USE-row">
              <div class="row">
                <div class="col-sm-7">
                  <div class="business-developr-USE-left">
                    <h1><?php echo ($content[0]->content_title_1);?>:</h1>
                    <?php echo ($content[0]->content_details_1);?>
                    <a href="<?php echo base_url('contact/collaboration')?>" class="button-default">Go To Collaboration Form</a>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="business-developr-right">
                    <img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image;?>" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="business-developr-USE-row">
              <div class="row invert">
                <div class="col-sm-7">
                  <div class="business-developr-USE-left">
                    <h2><?php echo ($content[0]->content_title_2);?>:</h2>
                    <?php echo ($content[0]->content_details_2);?>
                    <a href="<?php echo base_url('contact/collaboration')?>" class="button-default">Go To Collaboration Form</a>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="business-developr-right">
                    <img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image_1;?>" alt="">
                  </div>
                </div>
              </div>
            </div>
        </div>
        </section>
        <section class="faq-top-section visa-advisor-section" style="background-image:url(<?=base_url();?>user_panel/new/images/section-bg-about.jpg);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                      <div class="visa-advisorContent">
                        <div class="business-developr-USE-left">
                            <h2><?php echo ($content[0]->content_title_3);?>:</h2>
                            <?php echo ($content[0]->content_details_3);?>
                            <a href="<?php echo base_url('contact/collaboration')?>" class="button-default">Go To Collaboration Form</a>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="faq-right-image">
                            <img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image_2;?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="faq-top-section visa-advisor-section" style="background-image:url(<?=base_url();?>user_panel/new/images/section-bg-about.jpg);">
          <div class="container-fluid">
            <div class="row invert-div">
              <div class="col-sm-6">
                <div class="visa-advisorContent">
                  <div class="business-developr-USE-left">
                    <h3><?php echo ($content[0]->content_title_4);?>:</h3>
                    <?php echo ($content[0]->content_details_4);?>
                    <a href="<?php echo base_url('contact/collaboration')?>" class="button-default">Go To Collaboration Form</a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="faq-right-image">
                  <img src="<?php echo base_url()?>uploads/content/<?php echo $content[0]->content_image_3;?>" alt="">
                </div>
              </div>
            </div>
          </div>
        </section>
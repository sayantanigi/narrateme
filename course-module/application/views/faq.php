<?php
     $cont = $this->generalmodel->show_data_id("cms",10,"id","get","");
    //print($content[0]->page_title);die;
 ?>

        <div class="inner-banner">
            <div class="blue-banenr">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="inner-hd-banenr">
                                FAQ
                            </div>
                            <div class="badecame">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>faq</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <section class="faq-top-section" style="background-image:url(<?=base_url();?>user_panel/new/images/section-bg-about.jpg);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="faq-left-content">
                            <div>
                                <h1><?php echo ($cont[0]->cms_heading);?>
                                </h1>
                                <?php echo ($cont[0]->description);?>
                                <a href="#" class="button-default">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="faq-right-image">
                            <img src="<?php echo base_url()?>uploads/<?php echo $cont[0]->cms_img;?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="faq-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="faq-detail-col">
                            <div class="tabing-col">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" href="#aLL" role="tab" data-toggle="tab" aria-selected="true"> All</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#professregistration" role="tab" data-toggle="tab" aria-selected="false"> PROFESSIONAL REGISTRATION </a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#accommondation" role="tab" data-toggle="tab" aria-selected="false">ACCOMMODATION</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#visa" role="tab" data-toggle="tab" aria-selected="false">VISA </a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#course" role="tab" data-toggle="tab" aria-selected="false">COURSES</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#proces" role="tab" data-toggle="tab" aria-selected="false">PROCESS</a> </li>
                                </ul>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in active show" id="aLL">
                                <div class="faq-accordion" id="faqExample">
                                    <?php $ctn=1; foreach($faq as $fa){?>
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="collapsed" data-toggle="collapse" data-target="#collapseOne<?php echo $ctn;?>" aria-expanded="false" aria-controls="collapseOne"> <?php echo $fa->question?> </h5>
                                        </div>
                                        <div id="collapseOne<?php echo $ctn;?>" class="collapse<?php if($ctn==1){?>in<?php }?>" aria-labelledby="headingOne" data-parent="#faqExample" style="">
                                            <div class="card-body">
                                                <?php echo $fa->answer?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $ctn++;}?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="education-consultants education-consultants-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-heading-faq">
                            <div class="faq-heading-md">
                                Did not find your answer?
                            </div>
                            <p>Please fill the form below correctly and let us know about your query. One of<br>
                                our consultants would contact you.
                            </p>
                        </div>
                        <div class="find-answer">
                            <div class="wrapper-form">
                                <div class="gform_wrapper">
                                    <form>
                                        <div class="gform_body">
                                            <ul class="gform_fields">
                                                <li class="gfield gf_left_half">
                                                    <label class="gfield_label" for="">Your Name *</label>
                                                    <div class="ginput_container_text">
                                                        <input name="" type="text" value="" class="medium">
                                                    </div>
                                                </li>
                                                <li class="gfield gf_right_half">
                                                    <label class="gfield_label" for="">Your Email *</label>
                                                    <div class="ginput_container ginput_container_text">
                                                        <input name="" type="text" value="" class="medium">
                                                    </div>
                                                </li>
                                                <li class="gfield">
                                                    <label class="gfield_label" for="">Subject</label>
                                                    <div class="ginput_container_text">
                                                        <input name="" type="text" value="" class="medium">
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
                    </div>
                </div>
            </div>
        </section>
 <?php
    $this->db->select('*');
    $this->db->from('sm_course');
    $query = $this->db->get()->result();
     $content = $this->generalmodel->show_data_id("sm_page_content",3,"id","get","");

    //print($content[0]->page_title);die;

 
 ?>
<div class="inner-banner">
    <div class="blue-banenr">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner-hd-banenr">
                        Courses
                    </div>
                    <div class="badecame">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Courses</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="search-courses">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-center">
                    <div class="heading-md">
                       <?php echo ($content[0]->content_title);?>
                    </div>
                    <p><?php echo ($content[0]->content_details);?>.</p>
                </div>
                <div class="search-form-course clearfix">
                    <div class="col-form">
                        <label>Country</label>
                        <div class="field-select">
                        <select class="select-option" onchange="cityget(this);">
                            <option value="">-- Select Country --</option>
                              <?php if(is_array($categories) && count($categories)>0){
                                    foreach($categories as $cs){
                               ?>
                              <option value="<?=$cs->id?>"><?=$cs->country_name?></option>
                              <?php }} ?>
                        </select>
                    </div>
                    </div>
                    <div class="col-form">
                        <label>City</label>
                        <div class="field-select">
                        <select class="select-option" id="cityShow">
                            <option>-- Select City --</option>
                        </select>
                    </div>
                    </div>
                    <div class="col-form">
                        <label>Category </label>
                        <div class="field-select">
                        <select class="select-option" onchange="courseget(this);">
                            <option value="">-- Select Category --</option>
                              <?php if(is_array($coursepcategory) && count($coursepcategory)>0){
                                    foreach($coursepcategory as $cat){
                               ?>
                              <option value="<?=$cat->category_id?>"><?=$cat->category_name?></option>
                              <?php }} ?>
                        </select>
                    </div>
                    </div>
                    <div class="col-form col-name">
                        <label>Course name </label>
                        <div class="field-select">
                        <select class="select-option" id="courseshow">
                            <option>-- Select Course --</option>
                              
                        </select>
                    </div>
                    </div>
                    <div class="col-form">
                        <label>Level </label>
                        <div class="field-select">
                        <select class="select-option">
                            <option>-- Select Level --</option>
                              <?php if(is_array($levels) && count($levels)>0){
                                    foreach($levels as $lv){
                               ?>
                              <option value="<?=$lv->id?>"><?=$lv->level_title?></option>
                              <?php }} ?>
                        </select>
                    </div>
                    </div>
                    <div class="col-form buttonForm">
                        <button type="button" class="btn">Search</button>
                    </div>
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
                         <p><?php echo ($content[0]->content_details_1);?>.</p>
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
                                    <p><?php echo $i->course_startDate;?> to <?php echo $i->course_endDate;?> <!-- </br>
                                        Wednesday, 10:00am to 14:00pm --></p>
                                </div>
                                <div class="both-bt">
                                    <a href="http://narrateme.com/new/course-module/courses/upcomingcoursedetails/<?php echo $i->course_id;?>" class="button-default orange">Course Details</a> <a href="<?=base_url();?>courses/payment" class="button-default orange">Book Now</a>
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

<section class="other-courses">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-center">
                    <div class="heading-md">
                      <?php echo ($content[0]->content_title_2);?>
                    </div>
                         <p><?php echo ($content[0]->content_details_2);?>.</p>
                     </div>
                <div class="courses-view-other">
                    <ul>
                        <?php if(is_array($coming)): ?>
                            <?php
                            $cts=1;
                            foreach($coming as $i){
                            ?>
                        <li>
                            <div class="list-box-courses">
                                <figure><img src="<?php echo base_url()?>uploads/courseimage/<?php echo $i->course_image?>" alt=""></figure>
                                <div class="all-content">
                                <div class="hd-bt clearfix">
                                    <h3><?php echo $i->course_name;?></h3>
                                </div>
                               <div class="price-section clearfix">
                                   <div class="price-col">
                                   <p>Price</p> 
                                    <span class="amount-price">$<?php echo $i->price;?></span>
                                   </div>
                                   <!--<div class="totalHours-col">
                                   <p>Total Hours</p> 
                                    <span class="amount-price">48.00 hrs</span>
                                   </div>-->
                               </div>
                                <div class="both-bt">
                                    <a href="<?=base_url();?>courses/comingsooncoursedetails/<?php echo $i->course_id;?>" class="button-default">Course Detail </a> <a href="#" class="button-default orange">Register Your Interest </a>
                                </div>
                            </div>
                            </div>
                        </li>
                         <?php $cts++;}?>
                          <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="couldnt-find-course">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="formcourse">
            <div class="form-heading">
                <h3>
                    Couldn’t find your course?
                </h3>
                <p> Drop us few lines about the course that you like, and we would do the rest: </p>
                </div>
                <div class="wrapper-form">
                    <div class="gform_wrapper">
                     <form>
                         <div class="gform_body">
                         <ul class="gform_fields">
                         <li class="gfield">
                         <label class="gfield_label" for="">Name</label>
                         <div class="ginput_container_text">
                         <input name="" type="text" value="" class="medium" placeholder="Name">
                         </div>
                         </li>                       
                         <li class="gfield">
                         <label class="gfield_label" for="">Email</label>
                         <div class="ginput_container ginput_container_text">
                         <input name="" type="text" value="" class="medium" placeholder="Email">
                         </div>
                         </li>
                         <li class="gfield">
                         <label class="gfield_label" for="">Telephone Number</label>
                         <div class="ginput_container ginput_container_email">
                         <input name="" type="text" value="" class="medium" placeholder="Telephone Number">
                         </div>
                         </li>                       
                         <li class="gfield">
                         <label class="gfield_label" for="">Message</label>
                         <div class="ginput_container ginput_container_textarea">
                         <textarea name="" class="textarea medium" placeholder="Message"></textarea>
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


<style>
.list-box figure img {height: 215px !important;}
.price-view {text-align: justify !important;}
.upcoming-courses {padding: 0px !important;}
.couldnt-find-course {padding: 90px 0 90px !important;}
.search-courses {padding: 0 !important;}
.emply-resume-list{width: 100%; text-align: center; padding: 0px 0px 60px 0;}
.list-box {float: left; width: 100%; background: #ffffff; margin-top: 0px; box-shadow: 0 0 10px #ff9900; -moz-border-radius: 8px; -ms-border-radius: 8px; -o-border-radius: 8px; border-radius: 8px; overflow: hidden; padding: 0 0 25px 0px;}
.other-courses {background-size: 100% 475px !important; padding: 0 !important;}
.list-box-courses{float: left; width: 100%; background: #ffffff; margin-top: 0px; box-shadow: 0 0 10px #ff9900; -moz-border-radius: 8px; -ms-border-radius: 8px; -o-border-radius: 8px; border-radius: 8px; overflow: hidden; padding: 0 0 25px 0px;}
.list-box-courses figure {margin: 0 0 10px; padding: 0; border: 4px solid #ededf0;}
.courses-view-other {padding: 0 !important;}
.both-bt a.button-default {min-width: 46%; font-size: 18px; padding: 10px 6px 13px 6px;}
.price-view span {padding: 5px 15px 5px 15px; text-align: center; min-width: 180px; color: #ffffff; font-size: 16px; background: #2e3192; border-radius: 34px; line-height: normal; display: inline-block;}
.courses-view-other ul li {padding: 25px 24px !important;}
.formcourse .wrapper-form {padding: 0 !important;}
.users_name_err {display: none;}
.users_email_err {display: none;}
.users_phno_err {display: none;}
</style>
<div class="inner-banner">
    <div class="blue-banenr">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner-hd-banenr">
                        <?= $course->course_name ; ?>
                    </div>
                    <div class="badecame">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><?= $course->course_name ; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="microsoftword-section">
    <div class="container">
    	<div class="row">
        	 <div class="col-md-12">
                <div class="microWords-col">
                    <div class="tabing-col">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
							  <a class="nav-link active" href="#courseOverview" role="tab" data-toggle="tab" aria-selected="true">
								Course Overview</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#syllabus" role="tab" data-toggle="tab" aria-selected="false">
									Syllabus</a>
                              </li>
                              <li class="nav-item">
								<a class="nav-link" href="#reviews" role="tab" data-toggle="tab" aria-selected="false">
									Participant Reviews</a>
							  </li>
						</ul>
                    </div>
                    <div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active show" id="courseOverview">
                            <div class="overview-details">
                                <div class="price-detail-div">
                                    <p><strong>Course Price:</strong> £<?= $course->price ; ?></p>
                                    <p><strong>Location: </strong> <?= $batchSession[0]->session_location ; ?>,  Location City</p>
                                    <p><strong>Total Duration:</strong> <?= $batchlist->total_hour ; ?> hours</p>
                                    <p><strong>Total Sessions:</strong>  <?= $batchlist->total_session ; ?> </p>
                                    <p><strong>Course Level:</strong>
                                    <?php
                                    $this->load->model('generalmodel');
                                    $table_name = 'sm_levels';
                                    $primary_key = 'id';
                                    $wheredata = $course->course_level;
                                    $queryalllevels = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
                                    echo $queryalllevels[0]->level_title;
                                    ?>
                                    </p>
                                    <p><strong>Delivery Method: </strong> <?php
                                    $this->load->model('generalmodel');
                                    $table_name = 'sm_mode';
                                    $primary_key = 'id';
                                    $wheredata = $course->course_mode;
                                    $queryallmode = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
                                    echo $queryallmode[0]->mode_title;
                                    ?>
                                    </p>
                                    <p><strong>Certification:</strong> <?php echo $course->certificate;?></p>
                                    <p><strong>Course Instructor:</strong> Internet tend to repeat</p>
                                </div>
                                <div class="coursesContent">
                                    <h4>Course Overview:</h4>
                                    <p><?= $course->course_description ; ?> </p>
                                    <h4>Skills Required:</h4>
                                    <p><?= $course->entry_requirment ; ?></p>
                                    <h4>Who should Apply:</h4>
                                    <p><?= $course->who_should_apply ; ?>.</p>
                                    <h5>Timetable</h5>
                                    <div class="timetable">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                  <th>Session</th>
                                                  <th>Date</th>
                                                  <th>Start Time</th>
                                                  <th>End Time</th>
                                                  <th>Time Type</th>
                                                  <th>Session Objective</th>
                                                  <th>Location</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php $ctb=1; foreach($batchSession as $bs){?>
                                                  <tr>
                                                      <td><?php echo $ctb;?></td>
                                                      <td><?php echo $bs->date?></td>
                                                      <td><?php echo $bs->starttime?></td>
                                                      <td><?php echo $bs->endtime?></td>
                                                      <td><?php echo $bs->time_type?></td>
                                                      <td><?php echo $bs->session_objective?></td>
                                                      <td><?php echo $bs->session_location?></td>
                                                  </tr>
                                                  <?php $ctb++;}?>
                                              </tbody>
                                        </table>
                                    </div>
                                    <div class="tableButton">
                                        <a href="#" class="button-default">Add to my Basket</a>
                                        <a href="#" class="button-default">Book Now</a>
                                    </div>
                                    <div class="batches-courses">
                                        <p><strong>Next Level to Progress:</strong> Intermediate</p>
                                        <p><strong>Other Coming  Batches of this Course:</strong></p>
                                        <ul>
                                            <li>
                                                Microsoft Word Foundation 8th June London £150
                                            </li>
                                            <li>
                                                Microsoft Word Foundation 8th June London £150
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="events-sectionsInn">
                                        <h2>Customers who booked this course also booked following courses:</h2>
                                        <div class="courses-view">
                                            <ul>
                                                <?php
                                                $mylink = $_SERVER['REQUEST_URI'];
                                                $link_array = explode('/',$mylink);
                                                $lastpart = end($link_array);
                                                //print_r($lastpart);
                                                $query = $this->db->query("SELECT * FROM sm_course WHERE course_type = 'Upcoming Courses' AND course_id != '".$lastpart."'")->result_array();
                                                if(!empty($query)) {
                                                    $ctn = 1;
                                                foreach ($query as $i) { ?>
                                                <li>
                                                    <div class="list-box">
                                                        <figure><img src="<?php echo base_url() ?>uploads/courseimage/<?php echo $i['course_image'] ?>" alt=""></figure>
                                                        <div class="all-content">
                                                            <div class="hd-bt clearfix">
                                                                <h3><?php echo $i['course_name']; ?></h3>
                                                            </div>
                                                            <div class="price-view">
                                                                <span style="margin-left: 5px;">Price $<?php echo $i['price']; ?></span>
                                                                <span class="name-bt" style="margin-right: 5px;">
                                                                <?php
                                                                $queryallcat = $this->db->query("SELECT * FROM sm_category WHERE category_id = '".$i['course_category']."'")->row();
                                                                echo $category_name = $queryallcat->category_name;
                                                                ?>
                                                                </span>
                                                            </div>
                                                            <div class="contentView">
                                                                <p><?php echo date('jS M `y', strtotime($i['course_startDate'])); ?> to <?php echo date('jS M `y', strtotime($i['course_endDate'])); ?></p>
                                                            </div>
                                                            <div class="both-bt">
                                                                <a href="http://localhost/narrateme/course-module/courses/upcomingcoursedetails/<?php echo $i['course_id']; ?>" class="button-default orange">Course Details</a>
                                                                <!-- <a href="<?= base_url(); ?>courses/payment" class="button-default orange">Book Now</a> -->
                                                                <a href="#" class="button-default orange">Book Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php $ctn++;} } else { ?>
                                                    <li> No data found</li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="syllabus">
                            <div class="faq-accordion" id="faqExample">
                               <?php $ctn=1; foreach($querydesc as $fa){?>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="collapsed" data-toggle="collapse" data-target="#collapseOne<?php echo $ctn;?>" aria-expanded="false" aria-controls="collapseOne">
                                            <?php echo $fa->syllabus_name?>
                                        </h5>
                                    </div>
                                    <div id="collapseOne<?php echo $ctn;?>" class="collapse<?php if($ctn==1){?>in<?php }?>" aria-labelledby="headingOne" data-parent="#faqExample" style="">
                                        <div class="card-body">
                                            <?php echo $fa->syllabus_content?>
                                        </div>
                                    </div>
                                </div>
                                <?php $ctn++;}?>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in " id="reviews">
                            <div class="participantReviews">
                                <div class="reviews-row odd">
                                    <div class="reviews-row-content">
                                       <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                           <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row even">
                                    <div class="reviews-row-content">
                                       <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                                            injected humour, or randomised words which don't look even slightly believable. <strong>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</strong> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using <strong>'Content here, content here', default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</strong> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                                        <h4>William  </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                           <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row odd">
                                    <div class="reviews-row-content">
                                       <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                           <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row even">
                                    <div class="reviews-row-content">
                                       <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                           <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row odd">
                                    <div class="reviews-row-content">
                                       <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                           <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row even">
                                    <div class="reviews-row-content">
                                       <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                           <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="reviews-row odd">
                                    <div class="reviews-row-content">
                                       <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                        <h4>Matthew </h4>
                                        <div class="rating">
                                            <div class="star-rating">
                                           <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt="">
                                            </div>
                                            <span>04/12/2019</span>
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
</section>
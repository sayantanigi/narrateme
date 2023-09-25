  <div class="inner-banner">
    <div class="blue-banenr">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="inner-hd-banenr"> <?= $course->course_name ; ?></div>
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
                <li class="nav-item"> <a class="nav-link active" href="#courseOverview" role="tab" data-toggle="tab" aria-selected="true"> Course Overview</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#syllabus" role="tab" data-toggle="tab" aria-selected="false"> Syllabus</a> </li>
                <li class="nav-item"> <a class="nav-link" href="#reviews" role="tab" data-toggle="tab" aria-selected="false"> Participant Reviews</a> </li>
              </ul>
            </div>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active show" id="courseOverview">
                <div class="overview-details">
                  <div class="price-detail-div">
                    <p><strong>Course Price:</strong> £<?= $course->price ; ?></p>
                    <!--<p><strong>Total Duration:</strong> 6 hours</p>-->
                    <p><strong>Course Level:</strong> <?php 
                                $this->load->model('generalmodel'); 
                                $table_name = 'sm_levels';
                                $primary_key = 'id';
                                $wheredata = $course->course_level;
                                $queryalllevels = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
                                echo $queryalllevels[0]->level_title;
                            ?></p>
                                    <p><strong>Delivery Method: </strong> <?php 
                                $this->load->model('generalmodel'); 
                                $table_name = 'sm_mode';
                                $primary_key = 'id';
                                $wheredata = $course->course_mode;
                                $queryallmode = $this->generalmodel->getAllData($table_name,$primary_key,$wheredata,'','');
                                echo $queryallmode[0]->mode_title;
                            ?></p>
                                    <p><strong>Certification:</strong> <?php echo $course->certificate;?></p>
                  </div>
                  <div class="coursesContent">
                    <h4>Course Overview:</h4>
                                    <p><?= $course->course_description ; ?> </p>
                                    <h4>Skills Required:</h4>
                                    <p><?= $course->entry_requirment ; ?></p>
                                    <h4>Who should Apply:</h4>
                                    <p><?= $course->who_should_apply ; ?>.</p>
                    <div class="tableButton"> <a href="#" data-toggle="modal" data-target="#myModalx"  class="button-default button-default3">Add Me To <br>
                      Waiting List</a> </div>
                    <div class="events-sectionsInn" id="markmargin">
                      <h2>Customers who booked this course also booked following courses:</h2>
                      <div class="courses-view">
                        <ul>
                          <li>
                            <div class="list-box">
                              <figure><img src="<?=base_url();?>user_panel/new/images/Basic-Computer-Course.jpg" alt=""></figure>
                              <div class="all-content">
                                <div class="hd-bt clearfix">
                                  <h3>Basic Computer Course</h3>
                                  <span class="name-bt">New York</span> </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                  <p>1/5/2020 to 8/6/2020 <br>
                                    Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt"> <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a> </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="list-box">
                              <figure><img src="<?=base_url();?>user_panel/new/images/Microsoft-Office.jpg" alt=""></figure>
                              <div class="all-content">
                                <div class="hd-bt clearfix">
                                  <h3>Microsoft Office 365</h3>
                                  <span class="name-bt">New York</span> </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                  <p>1/5/2020 to 8/6/2020<br>
                                    Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt"> <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a> </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="list-box">
                              <figure><img src="<?=base_url();?>user_panel/new/images/Microsoft-Excel.jpg" alt=""></figure>
                              <div class="all-content">
                                <div class="hd-bt clearfix">
                                  <h3>Microsoft Excel</h3>
                                  <span class="name-bt">New York</span> </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                  <p>1/5/2020 to 8/6/2020<br>
                                    Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt"> <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a> </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="list-box">
                              <figure><img src="<?=base_url();?>user_panel/new/images/Java-Programming.jpg" alt=""></figure>
                              <div class="all-content">
                                <div class="hd-bt clearfix">
                                  <h3>Java Programming</h3>
                                  <span class="name-bt">New York</span> </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                  <p>1/5/2020 to 8/6/2020<br>
                                    Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt"> <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a> </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="list-box">
                              <figure><img src="<?=base_url();?>user_panel/new/images/HTML-CSS-JavaScript.jpg" alt=""></figure>
                              <div class="all-content">
                                <div class="hd-bt clearfix">
                                  <h3>HTML, CSS, JavaScript</h3>
                                  <span class="name-bt">New York</span> </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                  <p>1/5/2020 to 8/6/2020<br>
                                    Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt"> <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a> </div>
                              </div>
                            </div>
                          </li>
                          <li>
                            <div class="list-box">
                              <figure><img src="<?=base_url();?>user_panel/new/images/MySQL-and-PHP.jpg" alt=""></figure>
                              <div class="all-content">
                                <div class="hd-bt clearfix">
                                  <h3>MySQL and PHP</h3>
                                  <span class="name-bt">New York</span> </div>
                                <div class="price-view"><span>Price $225</span></div>
                                <div class="contentView">
                                  <p>1/5/2020 to 8/6/2020<br>
                                    Wednesday, 10:00am to 14:00pm</p>
                                </div>
                                <div class="both-bt"> <a href="#" class="button-default orange">Course Details</a> <a href="#" class="button-default orange">Book Now</a> </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="syllabus">
                            <div class="faq-accordion" id="faqExample">
                               <?php $ctn=1; foreach($querysyll as $fa){?>     
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
                        <div class="star-rating"> <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt=""> </div>
                        <span>04/12/2019</span> </div>
                    </div>
                  </div>
                  <div class="reviews-row even">
                    <div class="reviews-row-content">
                      <div class="quote-icon"> <img src="images/quote-icon.png" alt=""></div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by 
                        injected humour, or randomised words which don't look even slightly believable. <strong>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</strong> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. </p>
                      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using <strong>'Content here, content here', default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.</strong> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                      <h4>William </h4>
                      <div class="rating">
                        <div class="star-rating"> <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt=""> </div>
                        <span>04/12/2019</span> </div>
                    </div>
                  </div>
                  <div class="reviews-row odd">
                    <div class="reviews-row-content">
                      <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                      <h4>Matthew </h4>
                      <div class="rating">
                        <div class="star-rating"> <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt=""> </div>
                        <span>04/12/2019</span> </div>
                    </div>
                  </div>
                  <div class="reviews-row even">
                    <div class="reviews-row-content">
                      <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                      <h4>Matthew </h4>
                      <div class="rating">
                        <div class="star-rating"> <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt=""> </div>
                        <span>04/12/2019</span> </div>
                    </div>
                  </div>
                  <div class="reviews-row odd">
                    <div class="reviews-row-content">
                      <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                      <h4>Matthew </h4>
                      <div class="rating">
                        <div class="star-rating"> <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt=""> </div>
                        <span>04/12/2019</span> </div>
                    </div>
                  </div>
                  <div class="reviews-row even">
                    <div class="reviews-row-content">
                      <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                      <h4>Matthew </h4>
                      <div class="rating">
                        <div class="star-rating"> <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt=""> </div>
                        <span>04/12/2019</span> </div>
                    </div>
                  </div>
                  <div class="reviews-row odd">
                    <div class="reviews-row-content">
                      <div class="quote-icon"> <img src="<?=base_url();?>user_panel/new/images/quote-icon.png" alt=""></div>
                      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                      <h4>Matthew </h4>
                      <div class="rating">
                        <div class="star-rating"> <img src="<?=base_url();?>user_panel/new/images/star-img.png" alt=""> </div>
                        <span>04/12/2019</span> </div>
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
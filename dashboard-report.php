<?php 
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
$soc=getAnyTableWhereData('na_user_social_link', " AND id='".base64_decode($_REQUEST["member"])."' ");
?>

<section id="main"> 
  <?php include('lib/aside.php');?>
  <section id="content"> 
    <div class="container">
      <div class="block-header">
        <h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span>
		<small><?php if($view['ind'] ==1){ echo "Individual,";} if($view['std'] ==1){ echo "Student,";} if($view['edu'] ==1){ echo "Educational Institute,";} 
		if($view['edu'] ==1){echo "Instructional Facility or School";} 
		?></small>
		</h2>
      </div>
      <div id="profile-main" class="card">
        <div class="pm-overview c-overflow">
		
          <div class="pmo-pic">
            <div class="p-relative"> 
            	<a href="#">
                <?php
				if($view['userImage']!=''){
				?>
            		<img class="img-responsive" src="admin/useravatar/fullsize/<?php echo $view['userImage']?>" alt=""> 
                 <?php }else{?>
                 	<img class="img-responsive" src="img/no-image.png" alt=""> 
                 <?php }?>   
                </a> <!--<a href="#" class="pmop-edit"> <i class="zmdi zmdi-camera"></i> <span class="hidden-xs">Update Profile Picture</span> </a> -->
                  
            </div>
            
          </div>
          <div class="pmo-block pmo-contact hidden-xs"> 
            <h2>Contact</h2>
            <ul>
              <li><i class="zmdi zmdi-phone"></i><?=$view['phone_no']?></li>
              <li><i class="zmdi zmdi-email"></i><?=$view['email']?></li>
              <li><i class="zmdi zmdi-facebook-box"></i><a href="<?=$soc['fb_links']?>" target="_blank"><?=$soc['fb_links']?></a></li>
              <li><i class="zmdi zmdi-twitter"></i><a href="<?=$soc['twit_link']?>" target="_blank"><?=$soc['twit_link']?></a></li>
              <li> <i class="zmdi zmdi-pin"></i>
                <address class="m-b-0 ng-binding">
                <?=$view['address']?>,<br>
               <!-- Suite 900-->
                <?=$view['country']?>,<br>
                <?=$view['state']?> 
                <?=$view['phone_no']?> <br>
                </address>
              </li>
            </ul>
          </div>
        </div>
        <div class="pm-body clearfix">
		<?php  if($_GET['mail']=='send') { ?>
			  <div class="alert alert-success" style="text-align: center;">Mail Send Successfully.</div>
		  <?php } ?>
        <!--<a href="searchforuser.php" class="btn btn-danger" style="color:#FFF; float:right; margin:5px;">Search User</a>-->
            <div class="pmb-block"> 
              <div class="pmbb-header"> 
                <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true"> 
				
				<?php 
				 $q_prgm_detl=mysql_query("select * from na_eduinstitute_attended where ind_id='".base64_decode($_REQUEST["member"])."'");
				 if(mysql_num_rows($q_prgm_detl) > 0){

				?>
                  <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Program Details</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
						  while($fet_prgm_detl  =mysql_fetch_array($q_prgm_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Program Enrolled </dt>
                                <dd><?=$fet_prgm_detl['program_enroll'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Date Of Attendance</dt>
                                <dd><?=date("jS M Y", strtotime($fet_prgm_detl['attend_date']))?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Courses Taken</dt>
                                <dd><?=$fet_prgm_detl['course_taken'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Courses Enrolled</dt>
                                <dd><?=$fet_prgm_detl['course_enrolled'];?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
						  <?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
				 <?php } 
				 $q_sem_detl=mysql_query("select * from na_seminar_attend where ind_id='".base64_decode($_REQUEST["member"])."'");
				 if(mysql_num_rows($q_sem_detl) > 0){

				 ?>
				  <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Seminar Details</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_sem_detl  =mysql_fetch_array($q_sem_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Name </dt>
                                <dd><?=$fet_sem_detl['name'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_sem_detl['Description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Entry Date</dt>
                                <dd><?=date("jS M Y", strtotime($fet_sem_detl['entry_date']))?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Schedule Date</dt>
                                <dd><?=date("jS M Y", strtotime($fet_sem_detl['semi_schedule']))?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
				 <?php }
				$q_cc_detl=mysql_query("select * from na_current_course where ind_id='".base64_decode($_REQUEST["member"])."'");
				if(mysql_num_rows($q_cc_detl) > 0){


				 ?>
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Current Course Details</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_cc_detl  =mysql_fetch_array($q_cc_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Course Name </dt>
                                <dd><?=$fet_cc_detl['crs_name'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_cc_detl['crs_desc'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Start Date</dt>
                                <dd><?=$fet_cc_detl['crs_startdate']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>End Date</dt>
                                <dd><?=$fet_cc_detl['crs_enddate']?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
				<?php } 
				$q_t_detl=mysql_query("select * from na_teacher where ind_id='".base64_decode($_REQUEST["member"])."'");
				if(mysql_num_rows($q_t_detl) > 0){

				?>
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Teacher Details</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_t_detl=mysql_fetch_array($q_t_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Teacher Name </dt>
                                <dd><?=$fet_t_detl['teacher_name'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Learning Portal</dt>
                                <dd><?=$fet_t_detl['learning_portal']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Course</dt>
                                <dd><?=$fet_t_detl['course']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Program</dt>
                                <dd><?=$fet_t_detl['academic_program']?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
				<?php }
				 $q_vd_detl=mysql_query("select * from na_video_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
				 if(mysql_num_rows($q_vd_detl) > 0){


				?>
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Video Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_vd_detl  =mysql_fetch_array($q_vd_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_vd_detl['video_date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_vd_detl['description'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Record Video Link</dt>
                                <dd><?=$fet_vd_detl['link_rec_video'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments By Others</dt>
                                <dd><?=date("jS M Y", strtotime($fet_vd_detl['comments']))?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
				 <?php } 
				 $q_ad_detl=mysql_query("select * from na_video_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
				 if(mysql_num_rows($q_ad_detl) > 0){

				 ?>
				  <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Audio Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_ad_detl  =mysql_fetch_array($q_ad_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_ad_detl['audio_date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_ad_detl['description'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Record Audio Link</dt>
                                <dd><?=$fet_ad_detl['link_rec_audio'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments By Others</dt>
                                <dd><?=date("jS M Y", strtotime($fet_ad_detl['comments']))?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
				 <?php }
				 $q_rec_detl=mysql_query("select * from na_recomendation where ind_id='".base64_decode($_REQUEST["member"])."'");
				 if(mysql_num_rows($q_rec_detl) > 0){


				 ?>
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Recommendation Details</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_rec_detl  =mysql_fetch_array($q_rec_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Recommendation Person </dt>
                                <dd><?=$fet_rec_detl['recomendation_person'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Recommendation</dt>
                                <dd><?=$fet_rec_detl['recomendation'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Record Video Link</dt>
                                <dd><?=$fet_rec_detl['rec_video_link']?></dd>
                              </dl>
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
				 <?php }
				$q_av_detl=mysql_query("select * from na_individual_activity_video_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
				if(mysql_num_rows($q_av_detl) > 0){

				 ?>				  
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Activity Video Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_av_detl  =mysql_fetch_array($q_av_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_av_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_av_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Video Link</dt>
                                <dd><?=$fet_sem_detl['link_video']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_sem_detl['comments']?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
				<?php }
				$q_aa_detl=mysql_query("select * from na_individual_activity_audio_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
				if(mysql_num_rows($q_aa_detl) > 0 ){

				?>
				  <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Activity Audio Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_aa_detl  =mysql_fetch_array($q_aa_detl)){
						  ?>
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_aa_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_aa_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Audio Link</dt>
                                <dd><?=$fet_aa_detl['link_audio']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_aa_detl['comments']?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
				<?php } 
				 $q_sv_detl=mysql_query("select * from na_individual_sports_activity_video_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
					if(mysql_num_rows($q_sv_detl) > 0){
				?>
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Sports Video Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_sv_detl  =mysql_fetch_array($q_sv_detl)){
						  ?>
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_sv_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_sv_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Audio Link</dt>
                                <dd><?=$fet_sv_detl['link_video']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_sv_detl['comments']?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
					<?php }
					$q_sa_detl=mysql_query("select * from na_individual_sports_activity_audio_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
					if(mysql_num_rows($q_sa_detl) > 0){
					?>
				    <div class="panel panel-collapse">
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Sports Audio Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_sa_detl  =mysql_fetch_array($q_sa_detl)){
						  ?>
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_sa_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_sa_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Audio Link</dt>
                                <dd><?=$fet_sa_detl['link_audio']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_sa_detl['comments']?></dd>
                              </dl>
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
					<?php } 
					 $q_aa_detl=mysql_query("select * from na_individual_entertainment_activity_video_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
					 if(mysql_num_rows($q_aa_detl) > 0){
					?>
				   <div class="panel panel-collapse">
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Entertainment Video Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_aa_detl  =mysql_fetch_array($q_aa_detl)){
						  ?>
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_aa_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_aa_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Audio Link</dt>
                                <dd><?=$fet_aa_detl['link_video']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_aa_detl['comments']?></dd>
                              </dl>
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
					 <?php }
					 $q_ea_detl=mysql_query("select * from na_individual_entertainment_activity_audio_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
					 if(mysql_num_rows($q_ea_detl) > 0){
					 ?>
				  <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Entertainment Audio Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_ea_detl  =mysql_fetch_array($q_ea_detl)){
						  ?>
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_ea_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_ea_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Audio Link</dt>
                                <dd><?=$fet_ea_detl['link_audio']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_ea_detl['comments']?></dd>
                              </dl>
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
					 <?php } 
					 $q_asv_detl=mysql_query("select * from na_individual_arts_activity_video_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
					 if(mysql_num_rows($q_asv_detl) > 0){

					 ?>
				  <div class="panel panel-collapse">
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Arts & Science Video Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_asv_detl  =mysql_fetch_array($q_asv_detl)){
						  ?>
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_asv_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_asv_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Audio Link</dt>
                                <dd><?=$fet_asv_detl['link_video']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_asv_detl['comments']?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
					 <?php } 
					 $q_asa_detl=mysql_query("select * from na_individual_arts_activity_audio_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
					 if(mysql_num_rows($q_asa_detl) > 0){

					 ?>
				  <div class="panel panel-collapse">
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Arts & Science Audio Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_asa_detl  =mysql_fetch_array($q_asa_detl)){
						  ?>
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_asa_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_asa_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Audio Link</dt>
                                <dd><?=$fet_asa_detl['link_audio']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_asa_detl['comments']?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div>
					 <?php }
				$q_iv_detl=mysql_query("select * from na_individual_inst_video_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
				if(mysql_num_rows($q_iv_detl) > 0){
					 ?>				  
				  	  <div class="panel panel-collapse">
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Instructional Video Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_iv_detl  =mysql_fetch_array($q_iv_detl)){
						  ?>
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_iv_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_iv_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Audio Link</dt>
                                <dd><?=$fet_iv_detl['link_video']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_iv_detl['comments']?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
				<?php }
			 $q_ina_detl=mysql_query("select * from na_individual_inst_audio_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
			 if(mysql_num_rows($q_ina_detl)> 0){
				?>
				  	  <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Instructional Audio Presentation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_ina_detl  =mysql_fetch_array($q_ina_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_ina_detl['date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_ina_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Audio Link</dt>
                                <dd><?=$fet_ina_detl['link_audio']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_ina_detl['comments']?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
			 <?php }
			 $q_rvv_detl=mysql_query("select * from  na_reference where ind_id='".base64_decode($_REQUEST["member"])."'");
			 if(mysql_num_rows($q_rvv_detl) > 0){

			 ?>
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Personal/Academic/Professional References</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_rvv_detl  =mysql_fetch_array($q_rvv_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Reference Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_rvv_detl['dateofreference']))?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Information</dt>
                                <dd><?=$fet_rvv_detl['ref_recominfo']?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Recorded video Link</dt>
                                <dd><?=$fet_rvv_detl['ref_recomvideo'];?></dd>
                              </dl>
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
			 <?php } 
		$q_sem_detl=mysql_query("select * from na_seminar_attend where ind_id='".base64_decode($_REQUEST["member"])."'");
		if(mysql_num_rows($q_sem_detl) > 0){

			 ?>
				  	   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Personal/Academic/Professional References</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_sem_detl  =mysql_fetch_array($q_sem_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Name </dt>
                                <dd><?=$fet_sem_detl['name'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_sem_detl['Description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Entry Date</dt>
                                <dd><?=date("jS M Y", strtotime($fet_sem_detl['entry_date']))?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Schedule Date</dt>
                                <dd><?=date("jS M Y", strtotime($fet_sem_detl['semi_schedule']))?></dd>
                              </dl>
                              
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
							<hr/>
							<?php } ?>
                          </div>
                        </div>
                      </div>
                    </div> 
                  </div> 
		<?php } ?>
		
              </div> 
            </div> 
        </div> 
      </div> 
    </div> 
  </section>  
</section> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker/css/datepicker.css"/>
<script type="text/javascript" src="js/form-components.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php include('lib/inner_footer.php')?>
<script src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
    

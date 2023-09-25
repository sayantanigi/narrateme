<?php 
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."'");
$soc=getAnyTableWhereData('na_user_social_link', " AND id='".base64_decode($_REQUEST["member"])."' ");
?>

<section id="main"> 
  <?php include('lib/aside.php');?>
  <section id="content"> 
    <div class="container">
      <div class="block-header">
        <h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span>
		<small><?php if($view['std'] ==1){ echo "Student";}?></small>
		</h2>
      </div>
      <div id="profile-main" class="card">
        <div class="pm-overview c-overflow">
		<h2>Contact</h2>
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
				 $q_srdt_detl=mysql_query("select * from na_st_teacher where ind_id='".base64_decode($_REQUEST["member"])."'");
				 if(mysql_num_rows($q_srdt_detl) > 0){


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
						  while($fet_srdt_detl  =mysql_fetch_array($q_srdt_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Teacher Name</dt>
                                <dd><?=$fet_srdt_detl['teacher_name'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Information</dt>
                                <dd><?=$fet_srdt_detl['attend_date']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Learning Portal</dt>
                                <dd><?=$fet_srdt_detl['learning_portal'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Academic Program</dt>
                                <dd><?=$fet_srdt_detl['academic_program'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Course</dt>
                                <dd><?=$fet_srdt_detl['course'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Curriculum</dt>
                                <dd><?=$fet_srdt_detl['curriculum'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Syllabus</dt>
                                <dd><?=$fet_srdt_detl['syllabus'];?></dd>
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
				  $q_vd_detl=mysql_query("select * from na_st_video_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
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
                              <dl class="dl-horizontal">
                                <dt>Date</dt>
                                <dd><?=date("jS M Y", strtotime($fet_vd_detl['video_date']))?></dd>
                              </dl>
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Description </dt>
                                <dd><?=$fet_vd_detl['description'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Link Record Video</dt>
                                <dd><?=$fet_vd_detl['link_rec_video'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_vd_detl['comments']?></dd>
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
				  $q_stad_detl=mysql_query("select * from na_audio_sturec_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
				  if(mysql_num_rows($q_stad_detl) > 0){

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
							while($fet_stad_detl  =mysql_fetch_array($q_stad_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Date </dt>
                                <dd><?=date("jS M Y", strtotime($fet_stad_detl['audio_date']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_stad_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Recorded Audio Link</dt>
                                <dd><?=$fet_stad_detl['link_rec_audio']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Comments</dt>
                                <dd><?=$fet_stad_detl['comments']?></dd>
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
				   $q_str_detl=mysql_query("select * from na_st_recomendation where ind_id='".base64_decode($_REQUEST["member"])."'");
				   if(mysql_num_rows($q_str_detl) > 0){


				  ?>
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Recomendation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_str_detl  =mysql_fetch_array($q_str_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Recommend Name </dt>
                                <dd><?=$fet_str_detl['recomendation_person'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Recomendation Info</dt>
                                <dd><?=$fet_str_detl['recomendation']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Video Link</dt>
                                <dd><?=$fet_str_detl['rec_video_link']?></dd>
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
				  $q_stref_detl=mysql_query("select * from na_sturec_reference where ind_id='".base64_decode($_REQUEST["member"])."'");
				  if(mysql_num_rows($q_stref_detl) > 0){

				   ?>
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>References Link</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_stref_detl  =mysql_fetch_array($q_stref_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Reference Name </dt>
                                <dd><?=$fet_stref_detl['ref_name']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Reference Date</dt>
                                <dd><?=date("jS M Y", strtotime($fet_stref_detl['dateofreference']))?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Information</dt>
                                <dd><?=$fet_stref_detl['ref_recominfo'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Record Video Link</dt>
                                <dd><?=$fet_stref_detl['ref_recomvideo'];?></dd>
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
				   $q_stis_detl=mysql_query("select * from na_st_issuer_of_report where ind_id='".base64_decode($_REQUEST["member"])."'");
				   if(mysql_num_rows($q_stis_detl) > 0){
				  ?>
				  
				  <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Issuer Details</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_stis_detl  =mysql_fetch_array($q_stis_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Issuer Name </dt>
                                <dd><?=$fet_stis_detl['name'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Website</dt>
                                <dd><?=$fet_stis_detl['website'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>URL</dt>
                                <dd><?=$fet_stis_detl['link_rec_audio'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_stis_detl['description']?></dd>
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
				  $q_stcd_detl=mysql_query("select * from na_recomendation where ind_id='".base64_decode($_REQUEST["member"])."'");
				  if(mysql_num_rows($q_stcd_detl) > 0){

				   ?>				  
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Coach Details</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_stcd_detl  =mysql_fetch_array($q_stcd_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                              <dl class="dl-horizontal">
                                <dt>Coach Name </dt>
                                <dd><?=$fet_stcd_detl['coach_name'];?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_stcd_detl['description'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Sample</dt>
                                <dd><?=$fet_stcd_detl['sample']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Record Video Link</dt>
                                <dd><?=$fet_stcd_detl['video']?></dd>
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
				$q_stinst_detl=mysql_query("select * from na_individual_activity_video_presentation where ind_id='".base64_decode($_REQUEST["member"])."'");
				if(mysql_num_rows($q_stinst_detl) > 0){

				  
				  ?>
				   <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Institute Details</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_stinst_detl  =mysql_fetch_array($q_stinst_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                             <dl class="dl-horizontal">
                                <dt>Institute Name</dt>
                                <dd><?=$fet_stinst_detl['institute_name'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Description</dt>
                                <dd><?=$fet_stinst_detl['description']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Website</dt>
                                <dd><?=$fet_stinst_detl['website']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Domain Name</dt>
                                <dd><?=$fet_stinst_detl['domain_name']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>URL</dt>
                                <dd><?=$fet_stinst_detl['url']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Learning Portal</dt>
                                <dd><?=$fet_stinst_detl['learning_portal']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Schools </dt>
                                <dd><?=$fet_stinst_detl['schools']?></dd>
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
				 $q_stpr_detl=mysql_query("select * from na_sturec_personal_recommendations where ind_id='".base64_decode($_REQUEST["member"])."'");
				 if(mysql_num_rows($q_stpr_detl) > 0){

				?>
				  <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Personal Recomendation</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
						  <?php
							while($fet_stpr_detl  =mysql_fetch_array($q_stpr_detl)){

						  ?>
						  
                            <div class="pmbb-view">
                             <dl class="dl-horizontal">
                                <dt>Name</dt>
                                <dd><?=$fet_stpr_detl['per_prov_rec'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Recommendation </dt>
                                <dd><?=$fet_stpr_detl['recommendation'];?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Date</dt>
                                <dd><?=date("jS M Y", strtotime($fet_stpr_detl['recom_date']))?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Recorded Video Link</dt>
                                <dd><?=$fet_stpr_detl['recorded_video']?></dd>
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
    

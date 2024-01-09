<?php foreach($ecms as $i){?>

<div class="page-container" style="width:auto">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <?php $this->load->view('leftbar'); ?>
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->
      <div class="theme-panel hidden-xs hidden-sm">
        <div class="toggler"> </div>
        <div class="toggler-close"> </div>
        <div class="theme-options">
          <div class="theme-option theme-colors clearfix"> <span> THEME COLOR </span>
            <ul>
              <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
              <li class="color-darkblue tooltips" data-style="darkblue" data-container="body" data-original-title="Dark Blue"> </li>
              <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
              <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
              <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
              <li class="color-light2 tooltips" data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"> </li>
            </ul>
          </div>
          <div class="theme-option"> <span> Theme Style </span>
            <select class="layout-style-option form-control input-sm">
              <option value="square" selected="selected">Square corners</option>
              <option value="rounded">Rounded corners</option>
            </select>
          </div>
          <div class="theme-option"> <span> Layout </span>
            <select class="layout-option form-control input-sm">
              <option value="fluid" selected="selected">Fluid</option>
              <option value="boxed">Boxed</option>
            </select>
          </div>
          <div class="theme-option"> <span> Header </span>
            <select class="page-header-option form-control input-sm">
              <option value="fixed" selected="selected">Fixed</option>
              <option value="default">Default</option>
            </select>
          </div>
          <div class="theme-option"> <span> Top Menu Dropdown</span>
            <select class="page-header-top-dropdown-style-option form-control input-sm">
              <option value="light" selected="selected">Light</option>
              <option value="dark">Dark</option>
            </select>
          </div>
          <div class="theme-option"> <span> Sidebar Mode</span>
            <select class="sidebar-option form-control input-sm">
              <option value="fixed">Fixed</option>
              <option value="default" selected="selected">Default</option>
            </select>
          </div>
          <div class="theme-option"> <span> Sidebar Menu </span>
            <select class="sidebar-menu-option form-control input-sm">
              <option value="accordion" selected="selected">Accordion</option>
              <option value="hover">Hover</option>
            </select>
          </div>
          <div class="theme-option"> <span> Sidebar Style </span>
            <select class="sidebar-style-option form-control input-sm">
              <option value="default" selected="selected">Default</option>
              <option value="light">Light</option>
            </select>
          </div>
          <div class="theme-option"> <span> Sidebar Position </span>
            <select class="sidebar-pos-option form-control input-sm">
              <option value="left" selected="selected">Left</option>
              <option value="right">Right</option>
            </select>
          </div>
          <div class="theme-option"> <span> Footer </span>
            <select class="page-footer-option form-control input-sm">
              <option value="fixed">Fixed</option>
              <option value="default" selected="selected">Default</option>
            </select>
          </div>
        </div>
      </div>
      <!-- END THEME PANEL -->
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="index.html">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>User</span> </li>
        </ul>
        <div class="page-toolbar">
          <div class="btn-group pull-right">
            <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions <i class="fa fa-angle-down"></i> </button>
            <ul class="dropdown-menu pull-right" role="menu">
              <li> <a href="#"> <i class="icon-bell"></i> Action</a> </li>
              <li> <a href="#"> <i class="icon-shield"></i> Another action</a> </li>
              <li> <a href="#"> <i class="icon-user"></i> Something else here</a> </li>
              <li class="divider"> </li>
              <li> <a href="#"> <i class="icon-bag"></i> Separated link</a> </li>
            </ul>
          </div>
        </div>
      </div>
      <?php

                    $rdurl=$this->uri->segment(3);

                    $rdurl4=$this->uri->segment(4);

                    if($rdurl){

                    $imgpath="../../../images/";

                    } 

                    if($rdurl4 && $rdurl){

                    $imgpath="../../../../images/";

                    }

                    ?>
      <?php if($rdurl4=="indad" || $rdurl4=="inddr" || $rdurl4=="indins" || $rdurl4=="indreh" || $rdurl4=="indtea" || $rdurl4=="indrec" || $rdurl4=="indext" || $rdurl4=="indjob" || $rdurl4=="indcoa" || $rdurl4=="indvid"){?>
      <div class="page-bar">
        <div class="col-md-9 font-red">Individual Data Added Successfully </div>
      </div>
      <?php }?>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <h3 class="page-title"> User Profile
        <!--<small>user profile sample</small>-->
      </h3>
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="profile">
        <div class="tabbable-line tabbable-full-width">
          <ul class="nav nav-tabs">
            <li class="active"> <a href="#tab_1_1" data-toggle="tab"> Overview </a> </li>
            <li> <a href="#tab_1_3" data-toggle="tab"> Account </a> </li>
            <?php if($i->ind ==1){?>
            <li> <a href="#tab_1_6" data-toggle="tab"> Add Individual </a> </li>
            <?php }?>
            <?php if($i->std ==1){?>
            <li> <a href="#tab_1_7" data-toggle="tab"> Add Student Data </a> </li>
            <?php }?>
            <?php if($i->edu ==1){?>
            <li> <a href="#tab_1_8" data-toggle="tab"> Add Institution Data </a> </li>
            <?php }?>
            <?php if($i->fac ==1){?>
            <li> <a href="#tab_1_9" data-toggle="tab"> Add Faculty/School  Data </a> </li>
            <?php }?>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1_1">
              <div class="row">
                <div class="col-md-3">
                  <ul class="list-unstyled profile-nav">
                    <li>
                      <?php if($i->userImage!=""){?>
                      <img src="<?php echo $imgpath?>avatar3.jpg" class="img-responsive" alt="">
                      <?php }else{?>
                      <img src="<?php echo $imgpath?>noimage.png" class="img-responsive" alt="">
                      <?php }?>
                    </li>
                  </ul>
                  <?php

				  if(isset($_POST['optuser'])){

					  //echo $_POST['optuser'];

					  $postselect=$_POST['optuser'];

				  }else{

					  $postselect=1;

				  }

				  ?>
                  <?php if($postselect==1){?>
                  <ul class="list-unstyled profile-nav newleft">
                          
                          <li> <a href="#tab_1_51" data-toggle="tab">Educational Institutions </a> </li>
                          <li> <a href="#tab_1_52" data-toggle="tab">Seminars </a> </li>
                          <li> <a href="#tab_1_25" data-toggle="tab">Teachers</a> </li>
                          <li> <a href="#tab_1_30" data-toggle="tab">Video Presentation</a> </li>
                          <li> <a href="#tab_1_40" data-toggle="tab">Audio Presentation</a> </li>
                          <li> <a href="#tab_1_27" data-toggle="tab">Recomendation</a> </li>
                          <li class="activeleft"> <a href="#tab_1_11" data-toggle="tab">Award Won</a> </li>
                          <li> <a href="#tab_1_28" data-toggle="tab">Jobs</a> </li>
                          <li> <a href="#tab_1_42" data-toggle="tab">Reference</a> </li>
                          <li> <a href="#tab_1_35" data-toggle="tab">Issuer of Report </a> </li>
                          <li> <a href="#tab_1_26" data-toggle="tab">Coaches</a> </li>
                         <!-----------------------------------------------------------> 
                          <li> <a href="#tab_1_inj" data-toggle="tab">Injuries</a> </li>
                          <li> <a href="#tab_1_sur" data-toggle="tab">Surgeries</a> </li>
                          <li> <a href="#tab_1_56" data-toggle="tab">Procedures</a> </li>
                      	  <li> <a href="#tab_1_57" data-toggle="tab">Treatment</a> </li>
                          <!----------------------------------------------------------->
                          <li> <a href="#tab_1_24" data-toggle="tab">Rehabiliation</a> </li>
                          <li> <a href="#tab_1_22" data-toggle="tab">Drug Needed</a> </li>
                          <li> <a href="#tab_1_23" data-toggle="tab">Institute</a> </li>
                          <li> <a href="#tab_1_29" data-toggle="tab">Extra</a> </li>
                          <li> <a href="#tab_1_33" data-toggle="tab">Academic Transcript </a> </li> 
                          <li> <a href="#tab_1_34" data-toggle="tab">Educational Records </a> </li>
                          <li> <a href="#tab_1_36" data-toggle="tab">Reports </a> </li>
                          <li> <a href="#tab_1_37" data-toggle="tab">Messages </a> </li>
                          <li> <a href="#tab_1_41" data-toggle="tab">Personal Recommendation</a> </li>
                          <li> <a href="#tab_1_43" data-toggle="tab">Instructional Facilities</a> </li>
                    
                  </ul>
                  <?php }?>
                  <!-- Arup-6/4/16 -->
                  <?php if($postselect==2){?>
                  <ul class="list-unstyled profile-nav newleft">
                    <li class="activeleft"> <a href="#tab_1_11" data-toggle="tab">Award Won</a> </li>
                    <li> <a href="#tab_1_22" data-toggle="tab">Drug Needed</a> </li>
                    <li> <a href="#tab_1_23" data-toggle="tab">Institute</a> </li>
                    <li> <a href="#tab_1_24" data-toggle="tab">Rehabiliation</a> </li>
                    <li> <a href="#tab_1_25" data-toggle="tab">Teachers</a> </li>
                    <li> <a href="#tab_1_27" data-toggle="tab">Recomendation</a> </li>
                    <li> <a href="#tab_1_29" data-toggle="tab">Extra</a> </li>
                    <li> <a href="#tab_1_28" data-toggle="tab">Jobs</a> </li>
                    <li> <a href="#tab_1_26" data-toggle="tab">Coaches</a> </li>
                    <!-- Supratim starts 31-03-2016-->
                    <li> <a href="#tab_1_30" data-toggle="tab">Video Presentation</a> </li>
                    <!-- Supratim 31-03-2016 ends -->
                    <!---------------------------Debjit   1.4.16-------------------------->
                    <li> <a href="#tab_1_33" data-toggle="tab">Academic Transcript </a> </li>
                    <li> <a href="#tab_1_34" data-toggle="tab">Educational Records </a> </li>
                    <li> <a href="#tab_1_35" data-toggle="tab">Issuer of Report </a> </li>
                    <li> <a href="#tab_1_36" data-toggle="tab">Reports </a> </li>
                    <li> <a href="#tab_1_37" data-toggle="tab">Messages </a> </li>
                    <!---------------------------Debjit 1.4.16-------------------------->
                    <!--Supratim 01/04/2016-->
                    <li> <a href="#tab_1_40" data-toggle="tab">Audio Presentation</a> </li>
                    <!--Supratim 01/04/2016-->
                    <!--Supratim 01/04/2016 PERSONAL REC-->
                    <li> <a href="#tab_1_41" data-toggle="tab">Personal Recommendation</a> </li>
                    <!--Supratim 01/04/2016 PERSONAL REC-->
                    <!--Supratim 01/04/2016 Reference-->
                    <li> <a href="#tab_1_42" data-toggle="tab">Reference</a> </li>
                    <!--Supratim 01/04/2016 Reference-->
                    <!--Supratim 01/04/2016 Instructional Facilities-->
                    <li> <a href="#tab_1_43" data-toggle="tab">Instructional Facilities</a> </li>
                    <!--Supratim 01/04/2016 Instructional Facilities-->
                    <!-- Akash starts 01-04-2016-->
                    <li> <a href="#tab_1_51" data-toggle="tab">Educational Institutions </a> </li>
                    <li> <a href="#tab_1_52" data-toggle="tab">Seminars </a> </li>
                    <!-- Akash 01-04-2016 ends-->
                  </ul>
                  <?php }?>
                  <!-- Arup-6/4/16 -->
                  <!--------------   - - Debjit 6.4.16  Left bar start Institution      start --------------------------------->
                  <?php if($postselect==3){?>
                  <ul class="list-unstyled profile-nav newleft">
                    <li class="active"> <a data-toggle="tab" href="#tab_1_8_1_1"> Educational Institutions </a> </li>
                    <li> <a data-toggle="tab" href="#tab_1_8_2_2"> Instructor </a> </li>
                    <li> <a data-toggle="tab" href="#tab_1_8_3_3"> Schools/Divisions </a> </li>
                    <li> <a data-toggle="tab" href="#tab_1_8_4_4"> Curriculum </a> </li>
                    <!-- ======================= akash-5-4-16  Student Data sidebar ends -----------------============ -->
                    <!-- ======================= Debjit-5-4-16  Institution Data sidebarstarts -----------------============ -->
                    <li><a  href="#tab_1_8_15_15" data-toggle="tab">Academic Transcripts </a> </li>
                    <li> <a  href="#tab_1_8_13_13" data-toggle="tab">Other Educational </a> </li>
                  </ul>
                  <?php }?>
                  <!-- Akash 23.06.16 Faculty sidebar overview-->
                  <?php if($postselect==4){
				  ?>
                  <ul class="list-unstyled profile-nav newleft">
                    <li class="activeleft"> <a href="#tab_4_1" data-toggle="tab">Instructional Facilities</a> </li>
                    <li> <a data-toggle="tab" href="#tab_4_2"> Courses/Classes </a> </li>
                    <li> <a data-toggle="tab" href="#tab_4_3"> Classes and Lectures </a> </li>
                    <li> <a data-toggle="tab" href="#tab_4_4"> Instructors/Teachers/Proff </a> </li>
					<li> <a data-toggle="tab" href="#tab_4_5"> Schools/Divisions </a> </li>
                    
                    <li> <a data-toggle="tab" href="#tab_4_6"> Archived/Past  Lectures/Classes  </a> </li>
					<li> <a data-toggle="tab" href="#tab_4_7"> Curriculum </a> </li>
					<li> <a data-toggle="tab" href="#tab_4_8"> Other Education Institutions </a> </li>
                  </ul>
                  <?php } 
				  ?>
                  <!--  Akash  23.06.16 Faculty sidebar overview ends -->
                  <!---      Debjit 6.4.16 Institution      End --------------------------------->
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-8 profile-info">
                      <h1 class="font-green sbold uppercase"><?php echo $i->first_name." ".$i->last_name?></h1>
                      <p> <a href="javascript:;"> <?php echo $i->website?></a> </p>
                      <ul class="list-inline">
                        <li> <i class="fa fa-map-marker"></i> <?php echo $i->country?> </li>
                        <li> <i class="fa fa-calendar"></i>
						<?php 
                        foreach($inddata as $ied){
                        echo date('d M Y',strtotime($ied->dob));
                        }
                        ?>
                        </li>
                        <li> <i class="fa fa-user"></i></i>
                          <?php /*?><?php if($i->member_type==1){

																	echo "Individual";

																  }

																  else if($i->member_type==2){

																	  echo "Student";

																  }

																  else if($i->member_type==3){

																	  echo "Educational Institution";

																	  }

																  else if($i->member_type==4){

																	  echo "Instructional Facility /School";

																	  }

															?> <?php */?>
                        </li>
                        <li> <i class="fa fa-phone"></i> <?php echo $i->phone_no?> </li>
                      </ul>
                    </div>
                    <!--end col-md-8-->
                    <!--end col-md-4-->
                  </div>
                  <!--end row-->
                  <div class="col-md-4">
                    <form name="frmpost" method="post" action="">
                      <select name="optuser" class="form-control" onchange="this.form.submit()">
                        <option value="1" <?php if(@$_POST['optuser']==1){?> selected="selected"<?php }?>>Individual</option>
                        <option value="2" <?php if(@$_POST['optuser']==2){?> selected="selected"<?php }?>>Student</option>
                        <option value="3" <?php if(@$_POST['optuser']==3){?> selected="selected"<?php }?>>Institute</option>
                        <option value="4" <?php if(@$_POST['optuser']==4){?> selected="selected"<?php }?>>Faculty</option>
                      </select>
                    </form>
                  </div>
                  <div style="clear:both;">&nbsp;</div>
                  <?php if($postselect==1){?>
                  <div class="tabbable-line tabbable-custom-profile">
                    <div class="tab-content">
                    
                    <!-- Injuries 14-07-2016-------->
                      <div class="tab-pane" id="tab_1_inj">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Date</th>
                                  <th>Details</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($einj as $inj){?>
                                <tr>
                                  <td><?php echo $inj->name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($inj->date));?></td>
                                  <td><?php echo strip_tags(substr($inj->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                       <!-- Injuries 14-07-2016-------->
                       
                        
                       <!-- Surguries 14-07-2016-------->
                      <div class="tab-pane" id="tab_1_sur">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Date</th>
                                  <th>Details</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($esur as $sur){?>
                                <tr>
                                  <td><?php echo $sur->name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($sur->date));?></td>
                                  <td><?php echo strip_tags(substr($sur->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                       <!-- Surguries 14-07-2016-------->
                      <div class="tab-pane active" id="tab_1_11">
                      
                      
                        <div class="portlet-body">
                          <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                            <thead>
                              <tr>
                                <th>Award Name </th>
                                <th>Award Date </th>
                                <th>Details</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($eaward as $ew){?>
                              <tr>
                                <td><?php echo $ew->award_name;?></td>
                                <td><?php echo date('d-m-Y',strtotime($ew->award_date));?></td>
                                <td><?php echo strip_tags(substr($ew->award_description,0,30));?></td>
                                <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$ew->id?>/1" class="btn blue">Edit</a></td>
                              </tr>
                              <?php }?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_55">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Surgery Name </th>
                                  <th>Surgery Date </th>
                                  <th>Details</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($edsur as $sur){?>
                                <tr>
                                  <td><?php echo $sur->name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($sur->date));?></td>
                                  <td><?php echo strip_tags(substr($sur->description,0,30));?></td>
                                  <td><?php echo $sur->status;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      
                      <div class="tab-pane" id="tab_1_56">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Procedure Name </th>
                                  <th>Procedure Date </th>
                                  <th>Details</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($edpro as $pro){?>
                                <tr>
                                  <td><?php echo $pro->name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($pro->date));?></td>
                                  <td><?php echo strip_tags(substr($pro->description,0,30));?></td>
                                  <td><?php echo $pro->status;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab_1_57">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Treatment Name </th>
                                  <th>Treatment Date </th>
                                  <th>Details</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($edtrt as $trt){?>
                                <tr>
                                  <td><?php echo $trt->name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($trt->date));?></td>
                                  <td><?php echo strip_tags(substr($trt->description,0,30));?></td>
                                  <td><?php echo $trt->status;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab_1_22">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Drug Name </th>
                                  <th>Used Date </th>
                                  <th>Reason</th>
                                  <th>Outcome</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($edrug as $ed){?>
                                <tr>
                                  <td><?php echo $ed->drug_name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($ed->drug_date));?></td>
                                  <td><?php echo strip_tags(substr($ed->reason,0,30));?></td>
                                  <td><?php echo $ed->outcome;?></td>
                                  <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$ed->id?>/2" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_23">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Institute</th>
                                  <th>Instructor </th>
                                  <th>Address</th>
                                  <th>Contact No</th>
                                  <th>Email</th>
                                  <th>Website</th>
                                  <th>Portal</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($einst as $ei){?>
                                <tr>
                                  <td><?php echo $ei->institute_name;?></td>
                                  <td><?php echo $ei->instructor;?></td>
                                  <td><?php echo $ei->address;?></td>
                                  <td><?php echo $ei->tel_no;?></td>
                                  <td><?php echo $ei->email;?></td>
                                  <td><?php echo $ei->website;?></td>
                                  <td><?php echo $ei->learning_portal;?></td>
                                  <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$ei->id?>/3" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_24">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Date</th>
                                  <th>Details</th>
                                  <th>Outcome</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erehab as $era){?>
                                <tr>
                                  <td><?php echo $era->rehab_name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($era->rehab_date));?></td>
                                  <td><?php echo strip_tags(substr($era->description,0,30));?></td>
                                  <td><?php echo $era->outcome;?></td>
                                  <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$era->id?>/4" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_25">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Comtact No </th>
                                  <th>Email</th>
                                  <th>Portal</th>
                                  <th>Cources</th>
                                  <th>Program</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($eteacher as $et){?>
                                <tr>
                                  <td><?php echo $et->teacher_name;?></td>
                                  <td><?php echo $et->phone;?></td>
                                  <td><?php echo $et->email;?></td>
                                  <td><?php echo $et->learning_portal;?></td>
                                  <td><?php echo $et->course;?></td>
                                  <td><?php echo $et->academic_program;?></td>
                                  <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$et->id?>/5" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_26">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Contact No </th>
                                  <th>Email</th>
                                  <th>Sample</th>
                                  <th>Description</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($ecoach as $ec){?>
                                <tr>
                                  <td><?php echo $ec->coach_name;?></td>
                                  <td><?php echo $ec->phone;?></td>
                                  <td><?php echo $ec->email;?></td>
                                  <td><?php echo $ec->sample;?></td>
                                  <td><?php echo strip_tags(substr($ec->description,0,30));?></td>
                                  <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$ec->id?>/9" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <!-- injury listing 14-07-2016---->
                      <div class="tab-pane" id="tab_1_inj">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Date</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($einj as $inj){?>
                                <tr>
                                  <td><?php echo $inj->name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($inj->date));?></td>
                                  <td><?php echo strip_tags(substr($inj->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- injury listing 14-07-2016---->
                      <div class="tab-pane" id="tab_1_27">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Recomend Person</th>
                                  <th>Recomendation </th>
                                  <th>Video Link</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erecom as $erec){?>
                                <tr>
                                  <td><?php echo $erec->recomendation_person ;?></td>
                                  <td><?php echo $erec->recomendation ;?></td>
                                  <td><?php echo $erec->rec_video_link;?></td>
                                  <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$erec->id?>/6" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_28">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Company Name</th>
                                  <th>From </th>
                                  <th>To</th>
                                  <th>Position</th>
                                  <th>Description</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erjob as $ejob){?>
                                <tr>
                                  <td><?php echo $ejob->employer_name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($ejob->from_date));?></td>
                                  <td><?php echo date('d-m-Y',strtotime($ejob->to_date));?></td>
                                  <td><?php echo $ejob->position;?></td>
                                  <td><?php echo strip_tags(substr($ejob->job_description,0,30));?></td>
                                  <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$ejob->id?>/8" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- **********************************Arup*********************************************************  -->
                      <div class="tab-pane" id="tab_1_29">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>activity name</th>
                                  <th>from date </th>
                                  <th>activity description</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erextra as $ee){?>
                                <tr>
                                  <td><?php echo $ee->activity_name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($ee->from_date));?></td>
                                  <td><?php echo strip_tags(substr($ee->activity_description,0,30));?></td>
                                  <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$ee->id?>/7" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--                     **********************************Arup*********************************************************  -->
                      <!--Supratim-starts-->
                      <div class="tab-pane" id="tab_1_30">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Video Date</th>
                                  <th>Description</th>
                                  <th>Link Record Video</th>
                                  <th>IP Live Camera</th>
                                  <th>Comments</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($ervideo as $evideo){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($evideo->video_date));?></td>
                                  <td><?php echo strip_tags(substr($evideo->description,0,30));?></td>
                                  <td><?php echo $evideo->link_rec_video;?></td>
                                  <td><?php echo $evideo->ip_live_cam;?></td>
                                  <td><?php echo strip_tags(substr($evideo->comments,0,30));?></td>
                                  <td><a href="<?=base_url().'index.php/individual_edit/show_individual_id/'.$evideo->id?>/10" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016---------------->
                      <div class="tab-pane" id="tab_1_40">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Audio Date</th>
                                  <th>Description</th>
                                  <th>Link Record Audio</th>
                                  <th>IP Live Camera</th>
                                  <th>Comments</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($eraudio as $eaudio){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($eaudio->audio_date));?></td>
                                  <td><?php echo strip_tags(substr($eaudio->description,0,30));?></td>
                                  <td><?php echo $eaudio->link_rec_audio;?></td>
                                  <td><?php echo $eaudio->ip_live_cam;?></td>
                                  <td><?php echo strip_tags(substr($eaudio->comments,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016---------------->
                      <!----------------Supratim 01/04/2016 PERSONAL REC---------------->
                      <div class="tab-pane" id="tab_1_41">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Recommendation Date</th>
                                  <th>Person Providing Recommendation</th>
                                  <th>Recommendation</th>
                                  <th>Recorded Video For Recommendation</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erperrec as $eperrec){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($eperrec->recom_date));?></td>
                                  <td><?php echo strip_tags(substr($eperrec->per_prov_rec,0,30));?></td>
                                  <td><?php echo $eperrec->recommendation;?></td>
                                  <td><?php echo $eperrec->recorded_video;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016 PERSONAL REC---------------->
                      <!----------------Supratim 01/04/2016 Reference---------------->
                      <div class="tab-pane" id="tab_1_42">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Reference Date</th>
                                  <th>Reference Name</th>
                                  <th>Reference Position</th>
                                  <th>Reference Telephone No.</th>
                                  <th>Reference Email Address</th>
                                  <th>Relationship with Reference</th>
                                  <th>Reference Recommendation Letter/Information</th>
                                  <th>Reference Recorded video of recommendation</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erreference as $ereference){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($ereference->dateofreference));?></td>
                                  <td><?php echo strip_tags(substr($ereference->ref_name,0,30));?></td>
                                  <td><?php echo $ereference->ref_position;?></td>
                                  <td><?php echo $ereference->ref_phone;?></td>
                                  <td><?php echo $ereference->ref_emailaddress;?></td>
                                  <td><?php echo $ereference->ref_relationship;?></td>
                                  <td><?php echo $ereference->ref_recominfo;?></td>
                                  <td><?php echo $ereference->ref_recomvideo;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016 Reference---------------->
                      <!----------------Supratim 01/04/2016 Instructional Facilities---------------->
                      <div class="tab-pane" id="tab_1_43">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date of Attendance</th>
                                  <th>Program Enrolled </th>
                                  <th>Classes/Courses/Seminars taken</th>
                                  <th>Achievements</th>
                                  <th>Current Class/Course/Seminar Schedule</th>
                                  <th>Awards Conferred</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erinsfac as $einsfac){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($einsfac->datesofattendence));?></td>
                                  <td><?php echo strip_tags(substr($einsfac->prog_enrolled,0,30));?></td>
                                  <td><?php echo $einsfac->classes_taken;?></td>
                                  <td><?php echo $einsfac->achievements;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($einsfac->current_schedule));?></td>
                                  <td><?php echo $einsfac->awards_conferred;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016 Instructional facilities---------------->
                      <!--   -----------------------------------akash-1-04-2016 overview starts------------------------   -->
                      <div class="tab-pane" id="tab_1_51">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Attend Date </th>
                                  <th>Program Enroll</th>
                                  <th>Courses taken </th>
                                  <th>Grade(s) achieved </th>
                                  <th>Courses enrolled </th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($eduintattend as $edu){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($edu->attend_date));?></td>
                                  <td><?php echo $edu->program_enroll ;?></td>
                                  <td><?php echo $edu->course_taken;?></td>
                                  <td><?php echo $edu->Grades;?></td>
                                  <td><?php echo $edu->course_enrolled ;?></td>
                                  <td><?php echo $edu->status ;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab_1_52">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Seminar Name </th>
                                  <th>Description</th>
                                  <th>Seminar Schedule </th>
                                  <th>Entry Date</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($seminarattend as $semi){?>
                                <tr>
                                  <td><?=$semi->name;?></td>
                                  <td><?=stripcslashes($semi->Description);?></td>
                                  <td><?=date('d-m-Y',strtotime($semi->semi_schedule));?></td>
                                  <td><?=date('d-m-Y',strtotime($semi->entry_date));?></td>
                                  <td><?=$semi->status ;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--   -----------------------------------akash-1-04-2016 ends------------------------   -->
                      <!---------------------------------------Debjit   1.4.16      academic_transcript--------->
                      <div class="tab-pane" id="tab_1_33">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Grades</th>
                                  <th>Notes</th>
                                  <th>Comments</th>
                                  <th>Messages</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($eracademictranscript as $eacademictranscript){?>
                                <tr>
                                  <td><?php echo strip_tags(substr($eacademictranscript->grades,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eacademictranscript->notes,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eacademictranscript->comments,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eacademictranscript->messages,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16      academic_transcript--------->
                      <!---------------------------------------Debjit   1.4.16      educational_records--------->
                      <div class="tab-pane" id="tab_1_34">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Grades</th>
                                  <th>Notes</th>
                                  <th>Comments</th>
                                  <th>Messages</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($ereducationalrecords as $eeducationalrecords){?>
                                <tr>
                                  <td><?php echo strip_tags(substr($eeducationalrecords->grades,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eeducationalrecords->notes,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eeducationalrecords->comments,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eeducationalrecords->messages,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16      educational_records--------->
                      <!---------------------------------------Debjit   1.4.16      issuer_of_report --------->
                      <div class="tab-pane" id="tab_1_35">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Nmae</th>
                                  <th>Telephone No.</th>
                                  <th>Website</th>
                                  <th>URL</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erissuerofreport as $eissuerofreport){?>
                                <tr>
                                  <td><?php echo strip_tags(substr($eissuerofreport->name,0,30));?></td>
                                  <td><?php echo $eissuerofreport->tel_no;?></td>
                                  <td><?php echo strip_tags(substr($eissuerofreport->website,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eissuerofreport->url,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eissuerofreport->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16      issuer_of_report --------->
                      <!---------------------------------------Debjit   1.4.16     reports --------->
                      <div class="tab-pane" id="tab_1_36">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erreports as $ereports){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($ereports->report_date));?></td>
                                  <td><?php echo strip_tags(substr($ereports->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16     reports --------->
                      <!---------------------------------------Debjit   1.4.16     Messages --------->
                      <div class="tab-pane" id="tab_1_37">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($ermessages as $emessages){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($emessages->report_date));?></td>
                                  <td><?php echo strip_tags(substr($emessages->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16     Messages --------->
                    </div>
                  </div>
                  <!-- Arup-6/4/16 -->
                  <?php }else if($postselect==2){?>
                  <div class="tabbable-line tabbable-custom-profile">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1_11">
                        <div class="portlet-body">
                          <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                            <thead>
                              <tr>
                                <th>Award Name </th>
                                <th>Award Date </th>
                                <th>Details</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($eaward_st as $ew){?>
                              <tr>
                                <td><?php echo $ew->award_name;?></td>
                                <td><?php echo date('d-m-Y',strtotime($ew->award_date));?></td>
                                <td><?php echo strip_tags(substr($ew->award_description,0,30));?></td>
                              </tr>
                              <?php }?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_22">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Drug Name </th>
                                  <th>Used Date </th>
                                  <th>Reason</th>
                                  <th>Outcome</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($edrug_st as $ed){?>
                                <tr>
                                  <td><?php echo $ed->drug_name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($ed->drug_date));?></td>
                                  <td><?php echo strip_tags(substr($ed->reason,0,30));?></td>
                                  <td><?php echo $ed->outcome;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_23">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Institute</th>
                                  <th>Instructor </th>
                                  <th>Address</th>
                                  <th>Contact No</th>
                                  <th>Email</th>
                                  <th>Website</th>
                                  <th>Portal</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($einst_st as $ei){?>
                                <tr>
                                  <td><?php echo $ei->institute_name;?></td>
                                  <td><?php echo $ei->instructor;?></td>
                                  <td><?php echo $ei->address;?></td>
                                  <td><?php echo $ei->tel_no;?></td>
                                  <td><?php echo $ei->email;?></td>
                                  <td><?php echo $ei->website;?></td>
                                  <td><?php echo $ei->learning_portal;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_24">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Date</th>
                                  <th>Details</th>
                                  <th>Outcome</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erehab_st as $era){?>
                                <tr>
                                  <td><?php echo $era->rehab_name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($era->rehab_date));?></td>
                                  <td><?php echo strip_tags(substr($era->description,0,30));?></td>
                                  <td><?php echo $era->outcome;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_25">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Comtact No </th>
                                  <th>Email</th>
                                  <th>Portal</th>
                                  <th>Cources</th>
                                  <th>Program</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($eteacher_st as $et){?>
                                <tr>
                                  <td><?php echo $et->teacher_name;?></td>
                                  <td><?php echo $et->phone;?></td>
                                  <td><?php echo $et->email;?></td>
                                  <td><?php echo $et->learning_portal;?></td>
                                  <td><?php echo $et->course;?></td>
                                  <td><?php echo $et->academic_program;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_26">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Contact No </th>
                                  <th>Email</th>
                                  <th>Sample</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($ecoach_st as $ec){?>
                                <tr>
                                  <td><?php echo $ec->coach_name;?></td>
                                  <td><?php echo $ec->phone;?></td>
                                  <td><?php echo $ec->email;?></td>
                                  <td><?php echo $ec->sample;?></td>
                                  <td><?php echo strip_tags(substr($ec->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_27">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Recomend Person</th>
                                  <th>Recomendation </th>
                                  <th>Video Link</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erecom_st as $erec){?>
                                <tr>
                                  <td><?php echo $erec->recomendation_person ;?></td>
                                  <td><?php echo $erec->recomendation ;?></td>
                                  <td><?php echo $erec->rec_video_link;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <div class="tab-pane" id="tab_1_28">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Company Name</th>
                                  <th>From </th>
                                  <th>To</th>
                                  <th>Position</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erjob_st as $ejob){?>
                                <tr>
                                  <td><?php echo $ejob->employer_name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($ejob->from_date));?></td>
                                  <td><?php echo date('d-m-Y',strtotime($ejob->to_date));?></td>
                                  <td><?php echo $ejob->position;?></td>
                                  <td><?php echo strip_tags(substr($ejob->job_description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- **********************************Arup*********************************************************  -->
                      <div class="tab-pane" id="tab_1_29">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>activity name</th>
                                  <th>from date </th>
                                  <th>activity description</th>
                                  <!--<th>Position</th>

                                                                        <th>Description</th>-->
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erextra_st as $ee){?>
                                <tr>
                                  <td><?php echo $ee->activity_name;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($ee->from_date));?></td>
                                  <!--<td><?php echo date('d-m-Y',strtotime($ee->
                                  to_date));?>
                                  </td>
                                  <td><?php echo $ee->position;?></td>
                                  -->
                                  <td><?php echo strip_tags(substr($ee->activity_description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--                     **********************************Arup*********************************************************  -->
                      <!--Supratim-starts-->
                      <div class="tab-pane" id="tab_1_30">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Video Date</th>
                                  <th>Description</th>
                                  <th>Link Record Video</th>
                                  <th>IP Live Camera</th>
                                  <th>Comments</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($ervideo_st as $evideo){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($evideo->video_date));?></td>
                                  <td><?php echo strip_tags(substr($evideo->description,0,30));?></td>
                                  <td><?php echo $evideo->link_rec_video;?></td>
                                  <td><?php echo $evideo->ip_live_cam;?></td>
                                  <td><?php echo strip_tags(substr($evideo->comments,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016---------------->
                      <div class="tab-pane" id="tab_1_40">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Audio Date</th>
                                  <th>Description</th>
                                  <th>Link Record Audio</th>
                                  <th>IP Live Camera</th>
                                  <th>Comments</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($eraudio_st as $eaudio){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($eaudio->audio_date));?></td>
                                  <td><?php echo strip_tags(substr($eaudio->description,0,30));?></td>
                                  <td><?php echo $eaudio->link_rec_audio;?></td>
                                  <td><?php echo $eaudio->ip_live_cam;?></td>
                                  <td><?php echo strip_tags(substr($eaudio->comments,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016---------------->
                      <!----------------Supratim 01/04/2016 PERSONAL REC---------------->
                      <div class="tab-pane" id="tab_1_41">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Recommendation Date</th>
                                  <th>Person Providing Recommendation</th>
                                  <th>Recommendation</th>
                                  <th>Recorded Video For Recommendation</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erperrec_st as $eperrec){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($eperrec->recom_date));?></td>
                                  <td><?php echo strip_tags(substr($eperrec->per_prov_rec,0,30));?></td>
                                  <td><?php echo $eperrec->recommendation;?></td>
                                  <td><?php echo $eperrec->recorded_video;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016 PERSONAL REC---------------->
                      <!----------------Supratim 01/04/2016 Reference---------------->
                      <div class="tab-pane" id="tab_1_42">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Reference Date</th>
                                  <th>Reference Name</th>
                                  <th>Reference Position</th>
                                  <th>Reference Telephone No.</th>
                                  <th>Reference Email Address</th>
                                  <th>Relationship with Reference</th>
                                  <th>Reference Recommendation Letter/Information</th>
                                  <th>Reference Recorded video of recommendation</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erreference_st as $ereference){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($ereference->dateofreference));?></td>
                                  <td><?php echo strip_tags(substr($ereference->ref_name,0,30));?></td>
                                  <td><?php echo $ereference->ref_position;?></td>
                                  <td><?php echo $ereference->ref_phone;?></td>
                                  <td><?php echo $ereference->ref_emailaddress;?></td>
                                  <td><?php echo $ereference->ref_relationship;?></td>
                                  <td><?php echo $ereference->ref_recominfo;?></td>
                                  <td><?php echo $ereference->ref_recomvideo;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016 Reference---------------->
                      <!----------------Supratim 01/04/2016 Instructional Facilities---------------->
                      <div class="tab-pane" id="tab_1_43">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date of Attendance</th>
                                  <th>Program Enrolled </th>
                                  <th>Classes/Courses/Seminars taken</th>
                                  <th>Achievements</th>
                                  <th>Current Class/Course/Seminar Schedule</th>
                                  <th>Awards Conferred</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erinsfac_st as $einsfac){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($einsfac->datesofattendence));?></td>
                                  <td><?php echo strip_tags(substr($einsfac->prog_enrolled,0,30));?></td>
                                  <td><?php echo $einsfac->classes_taken;?></td>
                                  <td><?php echo $einsfac->achievements;?></td>
                                  <td><?php echo date('d-m-Y',strtotime($einsfac->current_schedule));?></td>
                                  <td><?php echo $einsfac->awards_conferred;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!----------------Supratim 01/04/2016 Instructional facilities---------------->
                      <!--   -----------------------------------akash-1-04-2016 overview starts------------------------   -->
                      <div class="tab-pane" id="tab_1_51">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Attend Date </th>
                                  <th>Program Enroll</th>
                                  <th>Courses taken </th>
                                  <th>Grade(s) achieved </th>
                                  <th>Courses enrolled </th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($eduintattend_st as $edu){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($edu->attend_date));?></td>
                                  <td><?php echo $edu->program_enroll ;?></td>
                                  <td><?php echo $edu->course_taken;?></td>
                                  <td><?php echo $edu->Grades;?></td>
                                  <td><?php echo $edu->course_enrolled ;?></td>
                                  <td><?php echo $edu->status ;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab_1_52">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Seminar Name </th>
                                  <th>Description</th>
                                  <th>Seminar Schedule </th>
                                  <th>Entry Date</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($seminarattend_st as $semi){?>
                                <tr>
                                  <td><?=$semi->name;?></td>
                                  <td><?=stripcslashes($semi->Description) ;?></td>
                                  <td><?=date('d-m-Y',strtotime($semi->semi_schedule));?></td>
                                  <td><?=date('d-m-Y',strtotime($semi->entry_date));?></td>
                                  <td><?=$semi->status ;?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!--   -----------------------------------akash-1-04-2016 ends------------------------   -->
                      <!---------------------------------------Debjit   1.4.16      academic_transcript--------->
                      <div class="tab-pane" id="tab_1_33">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Grades</th>
                                  <th>Notes</th>
                                  <th>Comments</th>
                                  <th>Messages</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($eracademictranscript_st as $eacademictranscript){?>
                                <tr>
                                  <td><?php echo strip_tags(substr($eacademictranscript->grades,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eacademictranscript->notes,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eacademictranscript->comments,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eacademictranscript->messages,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16      academic_transcript--------->
                      <!---------------------------------------Debjit   1.4.16      educational_records--------->
                      <div class="tab-pane" id="tab_1_34">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Grades</th>
                                  <th>Notes</th>
                                  <th>Comments</th>
                                  <th>Messages</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($ereducationalrecords_st as $eeducationalrecords){?>
                                <tr>
                                  <td><?php echo strip_tags(substr($eeducationalrecords->grades,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eeducationalrecords->notes,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eeducationalrecords->comments,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eeducationalrecords->messages,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16      educational_records--------->
                      <!---------------------------------------Debjit   1.4.16      issuer_of_report --------->
                      <div class="tab-pane" id="tab_1_35">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Nmae</th>
                                  <th>Telephone No.</th>
                                  <th>Website</th>
                                  <th>URL</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erissuerofreport_st as $eissuerofreport){?>
                                <tr>
                                  <td><?php echo strip_tags(substr($eissuerofreport->name,0,30));?></td>
                                  <td><?php echo $eissuerofreport->tel_no;?></td>
                                  <td><?php echo strip_tags(substr($eissuerofreport->website,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eissuerofreport->url,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eissuerofreport->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16      issuer_of_report --------->
                      <!---------------------------------------Debjit   1.4.16     reports --------->
                      <div class="tab-pane" id="tab_1_36">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($erreports_st as $ereports){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($ereports->report_date));?></td>
                                  <td><?php echo strip_tags(substr($ereports->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16     reports --------->
                      <!---------------------------------------Debjit   1.4.16     Messages --------->
                      <div class="tab-pane" id="tab_1_37">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($ermessages_st as $emessages){?>
                                <tr>
                                  <td><?php echo date('d-m-Y',strtotime($emessages->report_date));?></td>
                                  <td><?php echo strip_tags(substr($emessages->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!---------------------------------------Debjit   1.4.16     Messages --------->
                    </div>
                  </div>
                  <?php }?>
                  <!-- Arup-6/4/16 -->
                  <!-------------DEBJIT 6.4.16  Show Section start ----------Institution section--------------------->
                  <?php if($postselect==3){?>
                  <div class="tabbable-line tabbable-custom-profile">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_1_8_15_15">
                        <div class="portlet-body">
                          <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                            <thead>
                              <tr>
                                <th>Courses taken </th>
                                <th>Grades </th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($inscdmtrns as $at){?>
                              <tr>
                                <td><?php echo $at->courses_taken;?></td>
                                <td><?php echo $at->grade;?></td>
                              </tr>
                              <?php }?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <!-------------DEBJIT 6.4.16-----------Other Education--------------------->
                      <div class="tab-pane" id="tab_1_8_13_13">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Link video</th>
                                  <th>Link camera</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($insothedu as $eoe){?>
                                <tr>
                                  <td><?php echo strip_tags(substr($eoe->link_video,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eoe->link_camera,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-------------DEBJIT 6.4.16----------- Educational Institution --------------------->
                      <div class="tab-pane" id="tab_1_8_1_1">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>School Bulletin</th>
                                  <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($insedu as $ed){?>
                                <tr>
                                  <td><?php echo strip_tags(substr($ed->name,0,30));?></td>
                                  <td><?php echo strip_tags(substr($ed->school,0,30));?></td>
                                  <td><?php echo strip_tags(substr($ed->description,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-------------DEBJIT 6.4.16----------- show Instructor --------------------->
                      <div class="tab-pane" id="tab_1_8_2_2">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Course</th>
                                  <th>Telephone</th>
                                  <th>E-mail</th>
                                  <th>Website</th>
                                  <th>Address</th>
                                  <th>Bio and Information</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($instr as $eins){?>
                                <tr>
                                  <td><?php echo strip_tags(substr($eins->name,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eins->course,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eins->telephone,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eins->email,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eins->website,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eins->address,0,30));?></td>
                                  <td><?php echo strip_tags(substr($eins->information,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-------------DEBJIT 6.4.16----------- show Schools/Divisions --------------------->
                      <div class="tab-pane" id="tab_1_8_3_3">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Academic Programs</th>
                                  <th>Course/Program Bulletin</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($insch as $ins){?>
                                <tr>
                                  <td><?php echo $ins->program;?></td>
                                  <td><?php echo strip_tags(substr($ins->course,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-------------DEBJIT 6.4.16----------- show Curriculum --------------------->
                      <div class="tab-pane" id="tab_1_8_4_4">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Course</th>
                                  <th>Description/Syllabus</th>
                                  <th>Course/Class/Lecture Schedule</th>
                                  <th>Instructor</th>
                                  <th>Transfer Courses</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($inscur as $inscr){?>
                                <tr>
                                  <td><?php echo $inscr->course;?></td>
                                  <td><?php echo strip_tags(substr($inscr->description,0,30));?></td>
                                  <td><?php echo strip_tags(substr($inscr->course_schedule,0,30));?></td>
                                  <td><?php echo strip_tags(substr($inscr->instructor,0,30));?></td>
                                  <td><?php echo strip_tags(substr($inscr->educ_institute,0,30));?></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php }?>
                  <?php if($postselect==4){?>
                  <div class="tabbable-line tabbable-custom-profile">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab_4_1">
                        <div class="portlet-body">
                          <table class="table table-striped table-bordered table-advance table-hover responsive" style="background-color: white;">
                            <thead>
                              <tr>
                                <th>Action</th>
                                <th>School Name</th>
                                <th>School Bulletin</th>
                                <th>Teacher</th>
                                <th>Address</th>
                                <th>Phone No</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>IP Address</th>
                                <th>Websites</th>
                                <!--<th>Domain Name</th>
                                <th>URL</th>
                                <th>School Information</th>
                                <th>School Program Information</th>
                                <th>School web site</th>
                                <th>Programs</th>-->
                              </tr>
                            </thead>
                            <tbody>
                              <?php		 foreach($school as $sed){  
?>
                              <tr>
                                <td><a href="<?=base_url().'index.php/faculty_edit/faculty_teach/'.$sed->id?>/1" class="btn blue">Edit</a></td>
                                <td><?=$sed->school_name?></td>
                                <td><?=$sed->school_bulletin?></td>
                                <td><?=$sed->teacher?></td>
                                <td><?=$sed->address?></td>
                                <td><?=$sed->pnone_no?></td>
                                <td><?=$sed->email?></td>
                                <td><?=$sed->mobile?></td>
                                <td><?=$sed->ip_address?></td>
                                <td><?=$sed->websites?></td>
                                <!--<td><?=$sed->domain_name?></td>
                                <td><?=$sed->url?></td>
                                <td><?=$sed->school_information?></td>
                                <td><?=$sed->schoolprogram_information?></td>
                                <td><?=stripslashes($sed->schoolwebsite) ; ?></td>
                                <td><?=$sed->programs_div?></td>-->
                              </tr>
                              <?php   }   ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!--tab-pane-->
                      <!---------------------------------->
                      <div class="tab-pane" id="tab_4_2">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Instructor</th>
                                  <th>Course/Lecture Schedule</th>
                                  <th>Other Courses/Facilities</th>
                                  <th>Description/Syllabus</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($course as $cou){ ?>
                                <tr>
                                  <td><?php echo $cou->instructor ;?></td>
                                  <td><?php echo $cou->schedule;?></td>
                                  <td><?php echo $cou->facilities ;?></td>
                                  <td><?php echo $cou->description;?></td>
                                  <td><a href="<?=base_url().'index.php/faculty_edit/faculty_teach/'.$cou->id?>/2" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!------------- --------------------->
                      <div class="tab-pane" id="tab_4_3">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Link to recorded video/Audio</th>
                                  <th>Link to live camera/microphone</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($lecture as $lec){  ?>
                                <tr>
                                  <td><?php echo $lec->video ;?></td>
                                  <td><?php echo $lec->camera ;?></td>
                                  <td><a href="<?=base_url().'index.php/faculty_edit/faculty_teach/'.$lec->id?>/3" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab_4_4">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Course</th>
                                  <th>Telephone</th>
                                  <th>E-mail</th>
                                  <th>Website</th>
                                  <th>Address</th>
                                  <th>Bio and Information</th>
                                  <th> Action </th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($teacher as $tea){  ?>
                                <tr>
                                  <td><?php echo $tea->name ;?></td>
                                  <td><?php echo $tea->course ;?></td>
                                  <td><?php echo $tea->telephone ;?></td>
                                  <td><?php echo $tea->email ;?></td>
                                  <td><?php echo $tea->website ;?></td>
                                  <td><?php echo $tea->address ;?></td>
                                  <td><?php echo $tea->information ;?></td>
                                  <td><a href="<?=base_url().'index.php/faculty_edit/faculty_teach/'.$tea->id?>/4" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
					  
					   <div class="tab-pane" id="tab_4_5">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Link to recorded Program</th>
                                  <th>Link to Course</th>
								  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($division as $sch){  ?>
                                <tr>
                                  <td><?php echo $sch->program ;?></td>
                                  <td><?php echo $sch->course ;?></td>
                                 <td><a href="<?=base_url().'index.php/faculty_edit/faculty_teach/'.$sch->id?>/5" class="btn blue">Edit</a></td>
								 
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      
                      <!--  school/division--- 06-07-2016--> 
                      <!-- past lecture  -->
                       <div class="tab-pane" id="tab_4_6">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Link to recorded video/Audio</th>
                                  <th>Link to live camera/microphone</th>
								  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($pastlec as $past){  ?>
                                <tr>
                                  <td><?php echo $past->video ;?></td>
                                  <td><?php echo $past->camera ;?></td>
                                 <td><a href="<?=base_url().'index.php/faculty_edit/faculty_teach/'.$lec->id?>/6" class="btn blue">Edit</a></td>
								 
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!------------- --------------------->
					  <div class="tab-pane" id="tab_4_7">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Instructor</th>
                                  <th>Course</th>
                                  <th>Description</th>
                                  <th>Course Schedule</th>
                                  <th>Educational Institute</th>
                                  <th> Action </th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($curricullum as $cur){  ?>
                                <tr>
                                  <td><?php echo $cur->instructor ;?></td>
                                  <td><?php echo $cur->course ;?></td>
                                  <td><?php echo substr($cur->description,0,150) ;?>...</td>
                                  <td><?php echo $cur->course_schedule ;?></td>
                                  <td><?php echo $cur->educ_institute ;?></td>
                                  
                                  <td><a href="<?=base_url().'index.php/faculty_edit/faculty_teach/'.$cur->id?>/7" class="btn blue">Edit</a></td>
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
					  <!---- ------------------   -------------->
					  <div class="tab-pane" id="tab_4_8">
                        <div class="tab-pane active" id="tab_1_1_1">
                          <div class="portlet-body">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%" style="background-color: white;">
                              <thead>
                                <tr>
                                  <th> Action </th>
								  <th>Program Enroll</th>
                                  <th>Attandance Date</th>
                                  <th>Courses Taken</th>
                                  <th>Grade</th>
                                  <th>Courses Enroll</th>
                                  <th>Seminar Name</th>
                                  <th> Seminar Date </th>
								  <th> Seminar Desc </th>
								   <th> Course Schedule </th>
								   <th> Teacher Name </th>
								  <!-- <th> Teacher Phone </th>
								   <th> Teacher Email </th>
								   <th> Certificate Degree </th>-->
                                  
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach($edu_ins as $edu){  ?>
                                <tr>
                                  <td><a href="<?=base_url().'index.php/faculty_edit/faculty_teach/'.$edu->id?>/8" class="btn blue">Edit</a></td>
								  <td><?php echo $edu->program_enrolled ;?></td>
                                  <td><?php echo $edu->attandance_date ;?></td>
                                  <td><?php echo $edu->courses_taken ;?></td>
                                  <td><?php echo $edu->grade ;?></td>
                                  <td><?php echo $edu->courses_enrolled ;?></td>
                                  <td><?php echo $edu->seminar_name ;?></td>
                                  <td><?php echo $edu->seminar_date ;?></td>
								  <td><?php echo $edu->seminar_description ;?></td>
                                  <td><?php echo $edu->course_schedule ;?></td>
                                  <td><?php echo $edu->teacher_name ;?></td>
                                  <!--<td><?php echo $edu->teacher_phone ;?></td>
								  <td><?php echo $edu->teacher_email ;?></td>
                                  <td><?php echo $edu->Certificate_degree ;?></td>-->
                                  
                                </tr>
                                <?php }?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
					  <!----------------   ------------------->
                    </div>
                  </div>
                  <?php } ?>
                  <!--------------------------------------------------------------->
                </div>
              </div>
            </div>
            <!--tab_1_2-->
            <div class="tab-pane" id="tab_1_3">
              <div class="row profile-account">
                <div class="col-md-3">
                  <ul class="ver-inline-menu tabbable margin-bottom-10">
                    <li class="active"> <a data-toggle="tab" href="#tab_1-1"> <i class="fa fa-cog"></i> Personal info </a> <span class="after"> </span> </li>
                    <li> <a data-toggle="tab" href="#tab_2-2"> <i class="fa fa-picture-o"></i> Change Avatar </a> </li>
                    <li> <a data-toggle="tab" href="#tab_3-3"> <i class="fa fa-lock"></i> Change Password </a> </li>
                    <li> <a data-toggle="tab" href="#tab_4-4"> <i class="fa fa-eye"></i> Privacity Settings </a> </li>
                  </ul>
                </div>
                <div class="col-md-9">
                  <div class="tab-content">
                    <div id="tab_1-1" class="tab-pane active">
                    <form role="form" action="<?php echo base_url()?>index.php/member/edit_member" method="post">
                      <!--<div class="form-group">

                                                            <label class="control-label">Member Type</label>

                                                            <select name="member_type" class="form-control">

                                                            	<option value="1" <?php if($i->
                      member_type==1){?> selected
                      <?php }?>
                      >Individual
                      </option>
                      <option value="2" <?php if($i->member_type==2){?> selected<?php }?>>Student</option>
                      <option value="3" <?php if($i->member_type==3){?> selected<?php }?>>Educational Institution</option>
                      <option value="4" <?php if($i->member_type==4){?> selected<?php }?>>Instructional Facility /School</option>
                      </select>
                      </div>
                      -->
                      <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input type="text" name="first_name"  value="<?php echo $i->first_name?>" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">Last Name</label>
                        <input type="text" name="last_name"  value="<?php echo $i->last_name?>" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">Mobile Number</label>
                        <input type="text" name="phone_no"  value="<?php echo $i->phone_no?>" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="text" name="email" value="<?php echo $i->email?>" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">Address</label>
                        <input type="text" name="address" value="<?php echo $i->address?>" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">City</label>
                        <input type="text" name="city" value="<?php echo $i->city?>" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">State</label>
                        <input type="text" name="state" value="<?php echo $i->state?>" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">Zip Code</label>
                        <input type="text" name="zip_code" value="<?php echo $i->zip_code?>" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">Website Url</label>
                        <input type="text" name="website" value="<?php echo $i->website?>" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">Status</label>
                        <select name="status" class="form-control">
                          <option value="1" <?php if($i->status==1){?> selected<?php }?>>Active</option>
                          <option value="0" <?php if($i->status==0){?> selected<?php }?>>Inactive</option>
                        </select>
                      </div>
                      <input type="hidden" name="id" value="<?php echo $i->id?>" />
                      <div class="margiv-top-10">
                        <!--<a href="javascript:;" class="btn green"> Save Changes </a>-->
                        <input type="submit" name="subedit" value="Save Changes" class="btn green" />
                        <a href="javascript:;" class="btn default"> Cancel </a> </div>
                    </form>
                  </div>
                  <div id="tab_2-2" class="tab-pane">
                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. </p>
                    <form action="<?php echo base_url()?>index.php/member/edit_avatar" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                          <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                          <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select image </span> <span class="fileinput-exists"> Change </span>
                            <input type="file" name="userimage">
                            </span> <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>
                        </div>
                        <div class="clearfix margin-top-10"> <span class="label label-danger"> NOTE! </span> <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span> </div>
                      </div>
                      <div class="margin-top-10">
                        <!--<a href="javascript:;" class="btn green"> Submit </a>-->
                        <input type="text" name="id" value="<?php echo $i->id?>" />
                        <input type="submit" name="updateavatar" value="Submit" />
                        <a href="javascript:;" class="btn default"> Cancel </a> </div>
                    </form>
                  </div>
                  <div id="tab_3-3" class="tab-pane">
                    <form action="#">
                      <div class="form-group">
                        <label class="control-label">Current Password</label>
                        <input type="password" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">New Password</label>
                        <input type="password" class="form-control" />
                      </div>
                      <div class="form-group">
                        <label class="control-label">Re-type New Password</label>
                        <input type="password" class="form-control" />
                      </div>
                      <div class="margin-top-10"> <a href="javascript:;" class="btn green"> Change Password </a> <a href="javascript:;" class="btn default"> Cancel </a> </div>
                    </form>
                  </div>
                  <div id="tab_4-4" class="tab-pane">
                    <form action="#">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                          <td><label class="uniform-inline">
                            <input type="radio" name="optionsRadios1" value="option1" />
                            Yes </label>
                            <label class="uniform-inline">
                            <input type="radio" name="optionsRadios1" value="option2" checked/>
                            No </label></td>
                        </tr>
                        <tr>
                          <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                          <td><label class="uniform-inline">
                            <input type="checkbox" value="" />
                            Yes </label></td>
                        </tr>
                        <tr>
                          <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                          <td><label class="uniform-inline">
                            <input type="checkbox" value="" />
                            Yes </label></td>
                        </tr>
                        <tr>
                          <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                          <td><label class="uniform-inline">
                            <input type="checkbox" value="" />
                            Yes </label></td>
                        </tr>
                      </table>
                      <!--end profile-settings-->
                      <div class="margin-top-10"> <a href="javascript:;" class="btn green"> Save Changes </a> <a href="javascript:;" class="btn default"> Cancel </a> </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--end col-md-9-->
            </div>
          </div>
          <!--end tab-pane-->
          <!-- akash 23.06.16 starts faculty school Data overview sub-parts-->
          <?php // $this->load->view('faculty_overview.php')  ;  ?>
          <!-- akash 23.06.16  faculty overview sub-parts ends -->
          <div class="tab-pane" id="tab_1_6">
            <div class="row">
              <div class="col-md-3">
                <ul class="ver-inline-menu tabbable margin-bottom-10">
                      <li class="active"> <a data-toggle="tab" href="#tab_1"> <i class="fa fa-plus"></i> Add Individual Data </a> <span class="after"> </span> </li>
                      <li> <a data-toggle="tab" href="#tab_23"> <i class="fa fa-plus"></i>Educational Institutions </a> </li>
                      <li> <a data-toggle="tab" href="#tab_24"> <i class="fa fa-plus"></i>Seminars Attend </a> </li>
                      <li> <a data-toggle="tab" href="#tab_6"> <i class="fa fa-plus"></i> Add Teacher </a> </li>
                      <li> <a data-toggle="tab" href="#tab_11"> <i class="fa fa-plus"></i> Add Video Presentation </a> </li>
                      <li> <a data-toggle="tab" href="#tab_12"> <i class="fa fa-plus"></i> Add Audio Presentation </a> </li>
                      <li> <a data-toggle="tab" href="#tab_8"> <i class="fa fa-plus"></i> Add Recomendation </a> </li>
                      <li> <a data-toggle="tab" href="#tab_3"> <i class="fa fa-plus"></i> Add Award </a> </li>
                      <li> <a data-toggle="tab" href="#tab_10"> <i class="fa fa-plus"></i> Add Job </a> </li>
                      <li> <a data-toggle="tab" href="#tab_14"> <i class="fa fa-plus"></i> Add Reference</a> </li>
                      <li> <a data-toggle="tab" href="#tab_19"> <i class="fa fa-plus"></i> Add Issuer of Report </a> </li>
                      <li> <a data-toggle="tab" href="#tab_7"> <i class="fa fa-plus"></i> Add Coach </a> </li>
                      <!--======================================================================================-->
                      <li> <a data-toggle="tab" href="#tab_inj"> <i class="fa fa-plus"></i> Add Injuries </a> </li>
                      <li> <a data-toggle="tab" href="#tab_sur"> <i class="fa fa-plus"></i> Add Surgeries </a> </li>
                     <li> <a data-toggle="tab" href="#tab_27"> <i class="fa fa-plus"></i> Add Procedure </a> </li>
                  	<li> <a data-toggle="tab" href="#tab_28"> <i class="fa fa-plus"></i> Add Treatment </a> </li>
                      <!--======================================================================================-->
                      <li> <a data-toggle="tab" href="#tab_4"> <i class="fa fa-plus"></i> Add Rahab </a> </li>
                      <li> <a data-toggle="tab" href="#tab_2"> <i class="fa fa-plus"></i> Add Drug </a> <span class="after"> </span> </li>
                      <li> <a data-toggle="tab" href="#tab_5"> <i class="fa fa-plus"></i> Add Institute </a> </li>
                      <li> <a data-toggle="tab" href="#tab_9"> <i class="fa fa-plus"></i> Add Extra </a> </li>
                      <li> <a data-toggle="tab" href="#tab_17"> <i class="fa fa-plus"></i> Add Academic Transcript </a> </li>
                      <li> <a data-toggle="tab" href="#tab_18"> <i class="fa fa-plus"></i> Add Educational Records </a> </li>
                      <li> <a data-toggle="tab" href="#tab_20"> <i class="fa fa-plus"></i> Reports </a> </li>
                      <li> <a data-toggle="tab" href="#tab_21"> <i class="fa fa-plus"></i> Messages </a> </li>
                      <li> <a data-toggle="tab" href="#tab_13"> <i class="fa fa-plus"></i> Add Personal Recommend</a> </li>
                      <li> <a data-toggle="tab" href="#tab_15"> <i class="fa fa-plus"></i> Add Facilities</a> </li>
                </ul>
              </div>
              <div class="col-md-9">
                <div class="tab-content">
                  <div id="tab_1" class="tab-pane active">
                    <div id="accordion1" class="panel-group">
                      <div class="panel panel-default">
                        <div id="accordion1_1" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <?php

																if( !empty($inddata) ) {

																	foreach($inddata as $ied){

																?>
                            <form action="<?php echo base_url().'index.php/individual/add_individual' ?>" class="form-horizontal form-bordered" method="post" >
                              <input type="hidden" value="<?php echo $i->id?>" name="ind_id" />
                              <div class="form-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3">IP Address</label>
                                  <div class="col-md-8">
                                    <input type="text" name="ip_address" value="<?php echo $ied->ip_address?>" class="form-control" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Conference Id</label>
                                  <div class="col-md-8">
                                    <input type="text" name="conference_id" value="<?php echo $ied->conference_id?>" class="form-control" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Social Security Number</label>
                                  <div class="col-md-8">
                                    <input type="text" name="social_seq_no" value="<?php echo $ied->social_seq_no?>" class="form-control" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Date Of Birth</label>
                                  <div class="col-md-8">
                                    <input type="text" name="social_seq_no" value="<?php echo date('d-m-Y',strtotime($ied->dob))?>" class="form-control" />
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Gender</label>
                                  <div class="col-md-8">
                                    <input type="radio" name="gender" value="M" <?php if($ied->gender=='M'){?> checked="checked"<?php }?> />
                                    Male
                                    <input type="radio" name="gender" value="F" <?php if($ied->gender=='F'){?> checked="checked"<?php }?> />
                                    Female </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Description</label>
                                  <div class="col-md-8">
                                    <input type="text" id="cms_pagedes" name="description" value="<?php echo strip_tags($ied->description)?>" />
                                    <!-- <textarea name="description" class="form-control" id=""><?php //echo $ied->
                                    social_seq_no?>
                                    </textarea>
                                    --> </div>
                                </div>
                              </div>
                              <div class="form-actions">
                                <div class="row">
                                  <div class="col-md-offset-3 col-md-9">
                                    <?php $ind_num = end($this->uri->segment_array());?>
                                    <input type="hidden" name="ind_id" value="<?php echo $ind_num;?>" />
                                    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                                    <button type="button" class="btn default">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                            <?php }

																}else{

																?>
                            <form action="<?php echo base_url().'index.php/individual/add_individual' ?>" class="form-horizontal form-bordered" method="post" >
                              <input type="hidden" value="<?php echo $i->id?>" name="ind_id" />
                              <div class="form-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3">IP Address</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'ip_address', 'name' => 'ip_address','class'=>'form-control')); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Conference Id</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'conference_id', 'name' => 'conference_id','class'=>'form-control ')); ?> <?php echo form_error('conference_id'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Social Security Number</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'social_seq_no', 'name' => 'social_seq_no','class'=>'form-control')); ?> <?php echo form_error('social_seq_no'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Date Of Birth</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'dob', 'type'=>'date' ,'name' => 'dob','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('outcome'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Gender</label>
                                  <div class="col-md-8">
                                    <input type="radio" name="gender" value="M" />
                                    Male
                                    <input type="radio" name="gender" value="F" />
                                    Female
                                    <?php //echo form_error('social_seq_no'); ?>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Description</label>
                                  <div class="col-md-8"> <?php echo form_textarea(array('id' => 'cms_pagedes', 'name' => 'description','class'=>'form-control')); ?> </div>
                                </div>
                              </div>
                              <div class="form-actions">
                                <div class="row">
                                  <div class="col-md-offset-3 col-md-9">
                                    <?php $ind_num = end($this->uri->segment_array());?>
                                    <input type="hidden" name="ind_id" value="<?php echo $ind_num;?>" />
                                    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                                    <button type="button" class="btn default">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                            <?php }?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  -----------------------------  Akash-31-03-2016 starts-----------------------------    -->
                  <div id="tab_2" class="tab-pane">
                    <div id="accordion2" class="panel-group">
                      <div class="panel panel-default">
                        <div id="accordion1_2" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <form action="<?php echo base_url().'index.php/individual/add_drug' ?>" class="form-horizontal form-bordered" method="post" >
                              <div class="form-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3">Name</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'drug_name', 'name' => 'drug_name','class'=>'form-control')); ?> <?php echo form_error('drug_name'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Date</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'drug_date', 'name' => 'drug_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('drug_date'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Outcome</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'outcome', 'name' => 'outcome','class'=>'form-control')); ?> <?php echo form_error('outcome'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Description</label>
                                  <div class="col-md-8"> <?php echo form_textarea(array('id' => 'reason', 'name' => 'reason','class'=>'form-control')); ?> </div>
                                </div>
                              </div>
                              <div class="form-actions">
                                <div class="row">
                                  <div class="col-md-offset-3 col-md-9">
                                    <?php $ind_num = end($this->uri->segment_array());?>
                                    <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                                    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?> <a href="<?php echo base_url()?>index.php/member/view_member">
                                    <button type="button" class="btn default">Cancel</button>
                                    </a> </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="tab_3" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <div class="panel panel-default">
                        <div id="accordion1_3" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <form action="<?php echo base_url().'index.php/individual/add_award' ?>" class="form-horizontal form-bordered" method="post" >
                              <div class="form-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3">Award Name</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'award_name', 'name' => 'award_name','class'=>'form-controls')); ?> <?php echo form_error('award_name'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Award Date</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'award_date',  'name' => 'award_date','class'=>'form-controls form-control-inline date-picker')); ?> <?php echo form_error('award_date'); ?>
                                    <!--<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="" />-->
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Description</label>
                                  <div class="col-md-8">
                                    <?=form_textarea(array('id' => 'award_description', 'name' => 'award_description','class'=>'form-controls')); ?>
                                    <?php echo form_error('award_description'); ?> </div>
                                </div>
                              </div>
                              <div class="form-actions">
                                <div class="row">
                                  <div class="col-md-offset-3 col-md-9">
                                    <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                                    <?php //$ind_num = end($this->uri->segment_array());?>
                                    <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                                    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                                    <button type="button" class="btn default">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="tab_4" class="tab-pane">
                    <div id="accordion4" class="panel-group">
                      <div class="panel panel-default">
                        <div id="accordion1_4" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <form action="<?php echo base_url().'index.php/individual/add_rehab' ?>" class="form-horizontal form-bordered" method="post" >
                              <div class="form-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3">Name</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'rehab_name', 'name' => 'rehab_name','class'=>'form-control')); ?> <?php echo form_error('rehab_name'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Date</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'rehab_date', 'name' => 'rehab_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('rehab_date'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Outcome</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'outcome', 'name' => 'outcome','class'=>'form-control')); ?> <?php echo form_error('outcome'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Description</label>
                                  <div class="col-md-8"> <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-control')); ?> <?php echo form_error('description'); ?> </div>
                                </div>
                              </div>
                              <div class="form-actions">
                                <div class="row">
                                  <div class="col-md-offset-3 col-md-9">
                                    <?php $ind_num = end($this->uri->segment_array());?>
                                    <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                                    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                                    <button type="button" class="btn default">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                   <!-- Injuries 14-07-2016------->
                  <div id="tab_inj" class="tab-pane">
                    <div id="accordion4" class="panel-group">
                      <div class="panel panel-default">
                        <div id="accordion1_4" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <form action="<?php echo base_url().'index.php/individual/add_injuries' ?>" class="form-horizontal form-bordered" method="post" >
                              <div class="form-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3">Name</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control')); ?> <?php echo form_error('name'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Date</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'date', 'name' => 'date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('date'); ?> </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="control-label col-md-3">Description</label>
                                  <div class="col-md-8"> <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-control')); ?> <?php echo form_error('description'); ?> </div>
                                </div>
                              </div>
                              
                              <div class="form-actions">
                                <div class="row">
                                  <div class="col-md-offset-3 col-md-9">
                                    <?php $ind_num = end($this->uri->segment_array());?>
                                    <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                                    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                                    <button type="button" class="btn default">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Injuries 14-07-2016----->
                  
                  
                  <!-- Surguries 14-07-2016------->
                  <div id="tab_sur" class="tab-pane">
                    <div id="accordion4" class="panel-group">
                      <div class="panel panel-default">
                        <div id="accordion1_4" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <form action="<?php echo base_url().'index.php/individual/add_surgeries' ?>" class="form-horizontal form-bordered" method="post" >
                              <div class="form-body">
                                <div class="form-group">
                                  <label class="control-label col-md-3">Name</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control')); ?> <?php echo form_error('name'); ?> </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-md-3">Date</label>
                                  <div class="col-md-8"> <?php echo form_input(array('id' => 'date', 'name' => 'date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('date'); ?> </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="control-label col-md-3">Description</label>
                                  <div class="col-md-8"> <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-control')); ?> <?php echo form_error('description'); ?> </div>
                                </div>
                              </div>
                              
                              <div class="form-actions">
                                <div class="row">
                                  <div class="col-md-offset-3 col-md-9">
                                    <?php $ind_num = end($this->uri->segment_array());?>
                                    <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                                    <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                                    <button type="button" class="btn default">Cancel</button>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- Surguries 14-07-2016----->
                  
                       
                   <!--Procedures-->
                  <div id="tab_27" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_procedure' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Procedure Name </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'semi_name', 'name' => 'pro_name','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'description', 'name' => 'description','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Dates of Procedure </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'semi_schedule',  'name' => 'pro_date','class'=>'form-controls form-control-inline date-picker')); ?>  </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--Procedures-->
                  
                   <!--Treatment-->
                  <div id="tab_28" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_treatment' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Treatment Name </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'semi_name', 'name' => 'trt_name','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'description', 'name' => 'description','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Dates of Treatment </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'semi_schedule',  'name' => 'trt_date','class'=>'form-controls form-control-inline date-picker')); ?>  </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--Treatment-->
                  <div id="tab_5" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_institute' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'name', 'name' => 'institute_name','class'=>'form-controls')); ?> <?php echo form_error('institute_name'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'cms_pagedes', 'name' => 'description','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">School Bulletin</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'school_bulletin', 'name' => 'school_bulletin','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Instructor</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'instructor', 'name' => 'instructor','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'address', 'name' => 'address','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Telephone Number</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'tel_no', 'name' => 'tel_no','class'=>'form-controls','maxlength'=>'10')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'email', 'name' => 'email','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">SMS No</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'sms_no', 'name' => 'sms_no','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">IP Address</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'ip_address', 'name' => 'ip_address','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Website</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'website', 'name' => 'website','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Domain Name</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'domain_name', 'name' => 'domain_name','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">URL</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'url', 'name' => 'url','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Learning Portal</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'learning_portal', 'name' => 'learning_portal','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Schools</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'schools', 'name' => 'schools','class'=>'form-controls')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--  -----------------------------  Akash-31-03-2016 ends-----------------------------    -->
                  <!--***************************** Debjit************************************** -->
                  <div id="tab_6" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_teacher' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'name', 'name' => 'teacher_name','class'=>'form-controls')); ?> <?php echo form_error('teacher_name'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Telephone Number</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'phone', 'name' => 'phone','class'=>'form-controls','maxlength'=>'10')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'email', 'name' => 'email','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Learning Portal</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'learning_portal', 'name' => 'learning_portal','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Course</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'course', 'name' => 'course','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Program</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'academic_program', 'name' => 'academic_program','class'=>'form-controls')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div id="tab_7" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_coach' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'name', 'name' => 'coach_name','class'=>'form-controls')); ?> <?php echo form_error('coach_name'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Telephone Number</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'phone', 'name' => 'phone','class'=>'form-controls','maxlength'=>'10')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'email', 'name' => 'email','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Sample</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'sample', 'name' => 'sample','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'cms_pagedes', 'name' => 'description','class'=>'form-controls')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--***************************** Debjit************************************** -->
                  <!--***************************** ARUP************************************** -->
                  <div id="tab_8" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_recomendation' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Recomendation Person</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'recomendation_person', 'name' => 'recomendation_person','class'=>'form-control')); ?> <?php echo form_error('recomendation_person'); ?> </div>
                          </div>
                          <!--<div class="form-group">

                                                            <label class="control-label col-md-3">Date</label>

                                                            <div class="col-md-8">

																<?php echo form_input(array('id' => 'drug_date', 'name' => 'drug_date','class'=>'form-control form-control-inline date-picker')); ?>

                                                                <?php echo form_error('drug_date'); ?>

                                                            </div>

                                                            </div>-->
                          <div class="form-group">
                            <label class="control-label col-md-3">Video Link</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'rec_video_link', 'name' => 'rec_video_link','class'=>'form-control')); ?> <?php echo form_error('rec_video_link'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Recomendation </label>
                            <div class="col-md-8"> <?php echo form_textarea(array('id' => 'recomendation', 'name' => 'recomendation','class'=>'form-control')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div id="tab_9" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/addextra' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">activity name</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'activity_name', 'name' => 'activity_name','class'=>'form-control')); ?> <?php echo form_error('activity_name'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Date</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'from_date', 'name' => 'from_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('from_date'); ?> </div>
                          </div>
                          <!--<div class="form-group">

                                                            <label class="control-label col-md-3">Video Link</label>

                                                            <div class="col-md-8">

																<?php echo form_input(array('id' => 'rec_video_link', 'name' => 'rec_video_link','class'=>'form-control')); ?>

                                                                <?php echo form_error('rec_video_link'); ?>

                                                            </div>

                                                            </div>-->
                          <div class="form-group">
                            <label class="control-label col-md-3">Description </label>
                            <div class="col-md-8"> <?php echo form_textarea(array('id' => 'activity_description', 'name' => 'activity_description','class'=>'form-control')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div id="tab_10" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/addjob' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">employer name</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'employer_name', 'name' => 'employer_name','class'=>'form-control')); ?> <?php echo form_error('employer_name'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">from_date</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'from_date', 'name' => 'from_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('from_date'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">to date</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'to_date', 'name' => 'to_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('to_date'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">position</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'position', 'name' => 'position','class'=>'form-control')); ?> <?php echo form_error('position'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">job description </label>
                            <div class="col-md-8"> <?php echo form_textarea(array('id' => 'job_description', 'name' => 'job_description','class'=>'form-control')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--***************************** ARUP************************************** -->
                  <!-----SUPRATIM SEN 31/03/2016-------->
                  <div id="tab_11" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_video' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Date</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'video_date', 'name' => 'video_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('video_date'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Link To Record Videos</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'link_rec_video', 'name' => 'link_rec_video','class'=>'form-control')); ?>
                              <?php //echo form_error('link_rec_video'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">IP Address To Live Camera</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'ip_live_cam', 'name' => 'ip_live_cam','class'=>'form-control')); ?>
                              <?php //echo form_error('ip_live_cam'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-8"> <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-control')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Comments By Others</label>
                            <div class="col-md-8"> <?php echo form_textarea(array('id' => 'comments', 'name' => 'comments','class'=>'form-control')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-----SUPRATIM SEN 31/03/2016 ends-------->
                  <!--  -------\ Akash-1-04-2016 individual/Educational Institutions Attended starts /----------------    -->
                  <div id="tab_23" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/eduinst_attend' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Program Enrolled </label>
                            <div class="col-md-5">
                              <select name="program_enroll">
                                <option value=""> Courses </option>
                                <option value="diploma"> Diploma </option>
                                <option value="certificate">Certificate </option>
                                <option value="degree"> Degree </option>
                                <option value="educataion"> Educataion </option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Courses taken </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'course_taken', 'name' => 'course_taken','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Dates of Attendance </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'attend_date',  'name' => 'attend_date','class'=>'form-controls form-control-inline date-picker')); ?> <?php echo form_error('award_date'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Grade(s) Achieved </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'Grades', 'name' => 'Grades','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Courses Enrolled </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'course_enrolled', 'name' => 'course_enrolled','class'=>'form-controls')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div id="tab_24" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_seminar_attend' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Seminar Name </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'semi_name', 'name' => 'semi_name','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'description', 'name' => 'description','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Dates of Seminar </label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'semi_schedule',  'name' => 'semi_schedule','class'=>'form-controls form-control-inline date-picker')); ?> <?php echo form_error('award_date'); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--  -----------------------------  Akash-1-04-2016 ends-----------------------------    -->
                  <!-----SUPRATIM SEN 01/04/2016-------->
                  <div id="tab_12" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_audio' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Date</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'audio_date', 'name' => 'audio_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('audio_date'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Link To Record Audio</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'link_rec_audio', 'name' => 'link_rec_audio','class'=>'form-control')); ?>
                              <?php //echo form_error('link_rec_video'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">IP Address To Live Camera</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'ip_live_cam', 'name' => 'ip_live_cam','class'=>'form-control')); ?>
                              <?php //echo form_error('ip_live_cam'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-8"> <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-control')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Comments By Others</label>
                            <div class="col-md-8"> <?php echo form_textarea(array('id' => 'comments', 'name' => 'comments','class'=>'form-control')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-----SUPRATIM SEN 01/04/2016-------->
                  <!-----SUPRATIM SEN 01/04/2016 PERSONAL RECOMMENDATIONS-------->
                  <div id="tab_13" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_perrec' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Recommendation Date</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'recom_date', 'name' => 'recom_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('recom_date'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Personal Providing Recommendation</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'per_prov_rec', 'name' => 'per_prov_rec','class'=>'form-control')); ?>
                              <?php //echo form_error('link_rec_video'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Recommendation</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'recommendation', 'name' => 'recommendation','class'=>'form-control')); ?>
                              <?php //echo form_error('ip_live_cam'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Video For Recommendation</label>
                            <div class="col-md-8"> <?php echo form_textarea(array('id' => 'recorded_video', 'name' => 'recorded_video','class'=>'form-control')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-----SUPRATIM SEN 01/04/2016 PERSONAL RECOMMENDATIONS-------->
                  <!-----SUPRATIM SEN 01/04/2016 Reference-------->
                  <div id="tab_14" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_reference' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Reference Date</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'dateofreference', 'name' => 'dateofreference','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('dateofreference'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Reference Name</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'ref_name', 'name' => 'ref_name','class'=>'form-control')); ?>
                              <?php //echo form_error('link_rec_video'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Reference Position</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'ref_position', 'name' => 'ref_position','class'=>'form-control')); ?>
                              <?php //echo form_error('ip_live_cam'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Reference Telephone No.</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'ref_phone', 'name' => 'ref_phone','class'=>'form-control')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Reference Email Address</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'ref_emailaddress', 'name' => 'ref_emailaddress','class'=>'form-control')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Relationship with Reference</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'ref_relationship', 'name' => 'ref_relationship','class'=>'form-control')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Reference Recommendation Letter/Information</label>
                            <div class="col-md-8"> <?php echo form_textarea(array('id' => 'ref_recominfo', 'name' => 'ref_recominfo','class'=>'form-control')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Reference Recorded video of recommendation</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'ref_recomvideo', 'name' => 'ref_recomvideo','class'=>'form-control')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-----SUPRATIM SEN 01/04/2016 Reference-------->
                  <!-----SUPRATIM SEN 01/04/2016 Ins Fac-------->
                  <div id="tab_15" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_insfac' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Date of Attendance</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'datesofattendence', 'name' => 'datesofattendence','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('datesofattendence'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Program Enrolled</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'prog_enrolled', 'name' => 'prog_enrolled','class'=>'form-control')); ?>
                              <?php //echo form_error('link_rec_video'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Classes/Courses/Seminars taken</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'classes_taken', 'name' => 'classes_taken','class'=>'form-control')); ?>
                              <?php //echo form_error('ip_live_cam'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Achievements</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'achievements', 'name' => 'achievements','class'=>'form-control')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Current Class/Course/Seminar Schedule</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'current_schedule', 'name' => 'current_schedule','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('current_schedule'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Awards Conferred</label>
                            <div class="col-md-8"> <?php echo form_input(array('id' => 'awards_conferred', 'name' => 'awards_conferred','class'=>'form-control')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id;?>" />
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-----SUPRATIM SEN 01/04/2016 Ins Fac-------->
                  <!--*************************************************academic_transcript Debjit   1.4.16 ************************************** -->
                  <div id="tab_17" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_academic_transcript' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Grades</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'grades', 'name' => 'grades','class'=>'form-controls')); ?> <?php echo form_error('grades'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Notes</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'notes', 'name' => 'notes','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Comments</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'comments', 'name' => 'comments','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Messages</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'messages', 'name' => 'messages','class'=>'form-controls')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--*********************************************************academic_transcript Debjit   1.4.16 ************************************** -->
                  <!--********************************************************Educational Records   Debjit   1.4.16 ************************************** -->
                  <div id="tab_18" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_educational_records' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Grades</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'grades', 'name' => 'grades','class'=>'form-controls')); ?> <?php echo form_error('grades'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Notes</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'notes', 'name' => 'notes','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Comments</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'comments', 'name' => 'comments','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Messages</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'messages', 'name' => 'messages','class'=>'form-controls')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--*****************************Educational Records  Debjit   1.4.16 ************************************** -->
                  <!--********************************************************issuer_of_report   Debjit   1.4.16 ************************************** -->
                  <div id="tab_19" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_issuer_of_report' ?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-controls')); ?> <?php echo form_error('name'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Telephone No.</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'tel_no', 'name' => 'tel_no','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Website</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'website', 'name' => 'website','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">URL</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' => 'url', 'name' => 'url','class'=>'form-controls')); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-controls')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--*****************************issuer_of_report   Debjit   1.4.16 ************************************** -->
                  <!--********************************************************Reports   Debjit   1.4.16 ************************************** -->
                  <div id="tab_20" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_reports'?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Date</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' =>'report_date', 'name' => 'report_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('report_date'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-controls')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' =>'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--*****************************Reports   Debjit   1.4.16 ************************************** -->
                  <!--********************************************************Messages   Debjit   1.4.16 ************************************** -->
                  <div id="tab_21" class="tab-pane">
                    <div id="accordion3" class="panel-group">
                      <form action="<?php echo base_url().'index.php/individual/add_messages'?>" class="form-horizontal form-bordered" method="post" >
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Date</label>
                            <div class="col-md-5"> <?php echo form_input(array('id' =>'report_date', 'name' => 'report_date','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('report_date'); ?> </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-5"> <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-controls')); ?> </div>
                          </div>
                        </div>
                        <div class="form-actions">
                          <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                              <?php $ind_num = end($this->uri->segment_array());?>
                              <input type="hidden" name="ind_id" value="<?php echo $i->id?>" />
                              <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                              <?php echo form_submit(array('id' =>'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                              <button type="button" class="btn default">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!--*****************************Messages   Debjit   1.4.16 ************************************** -->
                </div>
              </div>
            </div>
          </div>
          <?php $this->load->view('student_record'); ?>
          <?php // include('student_record.php') ;   ?>
          <?php $this->load->view('institution_data') ;   ?>
          <?php $this->load->view('schooldata') ;   ?>
          <!--end tab-pane-->
        </div>
      </div>
    </div>
  </div>
  <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler"> <i class="icon-login"></i> </a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
  <div class="page-quick-sidebar">
    <ul class="nav nav-tabs">
      <li class="active"> <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users <span class="badge badge-danger">2</span> </a> </li>
      <li> <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts <span class="badge badge-success">7</span> </a> </li>
      <li class="dropdown"> <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More <i class="fa fa-angle-down"></i> </a>
        <ul class="dropdown-menu pull-right">
          <li> <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-bell"></i> Alerts </a> </li>
          <li> <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-info"></i> Notifications </a> </li>
          <li> <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-speech"></i> Activities </a> </li>
          <li class="divider"></li>
          <li> <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab"> <i class="icon-settings"></i> Settings </a> </li>
        </ul>
      </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
        <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
          <h3 class="list-heading">Staff</h3>
          <ul class="media-list list-items">
            <li class="media">
              <div class="media-status"> <span class="badge badge-success">8</span> </div>
              <img class="media-object" src="assets/layouts/layout/img/avatar3.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Bob Nilson</h4>
                <div class="media-heading-sub"> Project Manager </div>
              </div>
            </li>
            <li class="media"> <img class="media-object" src="assets/layouts/layout/img/avatar1.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Nick Larson</h4>
                <div class="media-heading-sub"> Art Director </div>
              </div>
            </li>
            <li class="media">
              <div class="media-status"> <span class="badge badge-danger">3</span> </div>
              <img class="media-object" src="assets/layouts/layout/img/avatar4.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Deon Hubert</h4>
                <div class="media-heading-sub"> CTO </div>
              </div>
            </li>
            <li class="media"> <img class="media-object" src="assets/layouts/layout/img/avatar2.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Ella Wong</h4>
                <div class="media-heading-sub"> CEO </div>
              </div>
            </li>
          </ul>
          <h3 class="list-heading">Customers</h3>
          <ul class="media-list list-items">
            <li class="media">
              <div class="media-status"> <span class="badge badge-warning">2</span> </div>
              <img class="media-object" src="assets/layouts/layout/img/avatar6.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Lara Kunis</h4>
                <div class="media-heading-sub"> CEO, Loop Inc </div>
                <div class="media-heading-small"> Last seen 03:10 AM </div>
              </div>
            </li>
            <li class="media">
              <div class="media-status"> <span class="label label-sm label-success">new</span> </div>
              <img class="media-object" src="assets/layouts/layout/img/avatar7.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Ernie Kyllonen</h4>
                <div class="media-heading-sub"> Project Manager, <br>
                  SmartBizz PTL </div>
              </div>
            </li>
            <li class="media"> <img class="media-object" src="assets/layouts/layout/img/avatar8.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Lisa Stone</h4>
                <div class="media-heading-sub"> CTO, Keort Inc </div>
                <div class="media-heading-small"> Last seen 13:10 PM </div>
              </div>
            </li>
            <li class="media">
              <div class="media-status"> <span class="badge badge-success">7</span> </div>
              <img class="media-object" src="assets/layouts/layout/img/avatar9.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Deon Portalatin</h4>
                <div class="media-heading-sub"> CFO, H&D LTD </div>
              </div>
            </li>
            <li class="media"> <img class="media-object" src="assets/layouts/layout/img/avatar10.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Irina Savikova</h4>
                <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
              </div>
            </li>
            <li class="media">
              <div class="media-status"> <span class="badge badge-danger">4</span> </div>
              <img class="media-object" src="assets/layouts/layout/img/avatar11.jpg" alt="...">
              <div class="media-body">
                <h4 class="media-heading">Maria Gomez</h4>
                <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                <div class="media-heading-small"> Last seen 03:10 AM </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="page-quick-sidebar-item">
          <div class="page-quick-sidebar-chat-user">
            <div class="page-quick-sidebar-nav"> <a href="javascript:;" class="page-quick-sidebar-back-to-list"> <i class="icon-arrow-left"></i>Back</a> </div>
            <div class="page-quick-sidebar-chat-user-messages">
              <div class="post out"> <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> When could you send me the report ? </span> </div>
              </div>
              <div class="post in"> <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:15</span> <span class="body"> Its almost done. I will be sending it shortly </span> </div>
              </div>
              <div class="post out"> <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:15</span> <span class="body"> Alright. Thanks! :) </span> </div>
              </div>
              <div class="post in"> <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:16</span> <span class="body"> You are most welcome. Sorry for the delay. </span> </div>
              </div>
              <div class="post out"> <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> No probs. Just take your time :) </span> </div>
              </div>
              <div class="post in"> <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Alright. I just emailed it to you. </span> </div>
              </div>
              <div class="post out"> <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Great! Thanks. Will check it right away. </span> </div>
              </div>
              <div class="post in"> <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Ella Wong</a> <span class="datetime">20:40</span> <span class="body"> Please let me know if you have any comment. </span> </div>
              </div>
              <div class="post out"> <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                <div class="message"> <span class="arrow"></span> <a href="javascript:;" class="name">Bob Nilson</a> <span class="datetime">20:17</span> <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span> </div>
              </div>
            </div>
            <div class="page-quick-sidebar-chat-user-form">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Type a message here...">
                <div class="input-group-btn">
                  <button type="button" class="btn green"> <i class="icon-paper-clip"></i> </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
        <div class="page-quick-sidebar-alerts-list">
          <h3 class="list-heading">General</h3>
          <ul class="feeds list-items">
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i> </span> </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> Just now </div>
              </div>
            </li>
            <li> <a href="javascript:;">
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-success"> <i class="fa fa-bar-chart-o"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> Finance Report for year 2013 has been released. </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 20 mins </div>
              </div>
              </a> </li>
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-danger"> <i class="fa fa-user"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 24 mins </div>
              </div>
            </li>
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-info"> <i class="fa fa-shopping-cart"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span> </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 30 mins </div>
              </div>
            </li>
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-success"> <i class="fa fa-user"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 24 mins </div>
              </div>
            </li>
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-info"> <i class="fa fa-bell-o"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> Web server hardware needs to be upgraded. <span class="label label-sm label-warning"> Overdue </span> </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 2 hours </div>
              </div>
            </li>
            <li> <a href="javascript:;">
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-default"> <i class="fa fa-briefcase"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> IPO Report for year 2013 has been released. </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 20 mins </div>
              </div>
              </a> </li>
          </ul>
          <h3 class="list-heading">System</h3>
          <ul class="feeds list-items">
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i> </span> </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> Just now </div>
              </div>
            </li>
            <li> <a href="javascript:;">
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-danger"> <i class="fa fa-bar-chart-o"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> Finance Report for year 2013 has been released. </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 20 mins </div>
              </div>
              </a> </li>
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-default"> <i class="fa fa-user"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 24 mins </div>
              </div>
            </li>
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-info"> <i class="fa fa-shopping-cart"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span> </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 30 mins </div>
              </div>
            </li>
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-success"> <i class="fa fa-user"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 24 mins </div>
              </div>
            </li>
            <li>
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-warning"> <i class="fa fa-bell-o"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> Web server hardware needs to be upgraded. <span class="label label-sm label-default "> Overdue </span> </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 2 hours </div>
              </div>
            </li>
            <li> <a href="javascript:;">
              <div class="col1">
                <div class="cont">
                  <div class="cont-col1">
                    <div class="label label-sm label-info"> <i class="fa fa-briefcase"></i> </div>
                  </div>
                  <div class="cont-col2">
                    <div class="desc"> IPO Report for year 2013 has been released. </div>
                  </div>
                </div>
              </div>
              <div class="col2">
                <div class="date"> 20 mins </div>
              </div>
              </a> </li>
          </ul>
        </div>
      </div>
      <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
        <div class="page-quick-sidebar-settings-list">
          <h3 class="list-heading">General Settings</h3>
          <ul class="list-items borderless">
            <li> Enable Notifications
              <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
            </li>
            <li> Allow Tracking
              <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF">
            </li>
            <li> Log Errors
              <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
            </li>
            <li> Auto Sumbit Issues
              <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
            </li>
            <li> Enable SMS Alerts
              <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF">
            </li>
          </ul>
          <h3 class="list-heading">System Settings</h3>
          <ul class="list-items borderless">
            <li> Security Level
              <select class="form-control input-inline input-sm input-small">
                <option value="1">Normal</option>
                <option value="2" selected>Medium</option>
                <option value="e">High</option>
              </select>
            </li>
            <li> Failed Email Attempts
              <input class="form-control input-inline input-sm input-small" value="5" />
            </li>
            <li> Secondary SMTP Port
              <input class="form-control input-inline input-sm input-small" value="3560" />
            </li>
            <li> Notify On System Error
              <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF">
            </li>
            <li> Notify On SMTP Error
              <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF">
            </li>
          </ul>
          <div class="inner-content">
            <button class="btn btn-success"> <i class="icon-settings"></i> Save Changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END QUICK SIDEBAR -->
</div>
<?php }?>

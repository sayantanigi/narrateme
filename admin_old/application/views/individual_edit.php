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
        $rdurl3=$this->uri->segment(3);
        $rdurl4=$this->uri->segment(4);
        if(@$rdurl){
        $imgpath="../../../images/";
        } 
        if(@$rdurl4 && @$rdurl){
        $imgpath="../../../../images/";
        }
        ?>
    <?php if($rdurl4=="indad"){?>
    <div class="page-bar">
      <div class="col-md-9 font-red">Individual Data Added Successfully </div>
    </div>
    <?php }?>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h3 class="page-title"> User Profile
      <!--<small>user profile sample</small>-->
    </h3>
    <?php // foreach($ecms as $i){ ?>
    <div class="tab-pane" id="tab_1_9">
      <div class="row">
        <div class="col-md-3">
          
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div id="tab_1_9_1" class="tab-pane<?php if($rdurl4 == 1){ ?>active<?php }?>">
              <div id="accordion1" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_1" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <?php
                        foreach($award as $awr){
                      ?>
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_award'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$awr->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$awr->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Award Name</label>
                            <div class="col-md-8">
                              <input type="text" name="award_name" value="<?=$awr->award_name?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Award Date</label>
                            <div class="col-md-8">
                              <input type="text" name="award_date" value="<?=date('d-m-Y',strtotime($awr->award_date));?>" class="form-control form-control-inline date-picker"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Award Description</label>
                            <div class="col-md-8">
                              <textarea type="text" name="award_description" class="form-control"/><?=$awr->award_description?></textarea>
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$awr->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                      <?php  
					  }
					  ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab_1_9_2" class="tab-pane <?php if($rdurl4 == 2){ ?>active<? }  ?>">
              <div id="accordion2" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_2" class="panel-collapse collapse in">
                    <?php
						foreach($drug as $dru){
					?>
                    <div class="panel-body">
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_drug'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$dru->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$dru->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Drug Name</label>
                            <div class="col-md-8">
                              <input type="text" name="drug_name" value="<?=$dru->drug_name?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Used Date</label>
                            <div class="col-md-8">
                              <input type="text" name="drug_date" value="<?=date('d-m-Y',strtotime($dru->drug_date));?>" class="form-control form-control-inline date-picker"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Reason</label>
                            <div class="col-md-8">
                              <textarea type="text" name="reason" class="form-control"/><?=$dru->reason?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Outcome</label>
                            <div class="col-md-8">
                              <textarea type="text" name="outcome" class="form-control"/><?=$dru->outcome?></textarea>
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$dru->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                    <?php  
							 } 
					?>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab_1_9_3" class="tab-pane <?php if($rdurl4 == 3){ ?>active<? }  ?>">
              <div id="accordion1" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_1" class="panel-collapse collapse in">
                    <?php
							foreach($institute as $ins){ 
							?>
                    <div class="panel-body">
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_institute'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$ins->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$ins->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Institute Name</label>
                            <div class="col-md-8">
                              <input type="text" name="institute_name" value="<?=$ins->institute_name?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-8">
                              <textarea type="text" name="description" class="form-control"><?=$ins->description?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">School Bulletin</label>
                            <div class="col-md-8">
                              <input type="text" name="school_bulletin" value="<?=$ins->school_bulletin?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Instructor</label>
                            <div class="col-md-8">
                              <input type="text" name="instructor" value="<?=$ins->instructor?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-8">
                              <textarea type="text" name="address" class="form-control"><?=$ins->address?></textarea>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Telephone Number</label>
                            <div class="col-md-8">
                              <input type="text" name="tel_no" value="<?=$ins->tel_no?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                              <input type="text" name="email" value="<?=$ins->email?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">SMS No</label>
                            <div class="col-md-8">
                              <input type="text" name="sms_no" value="<?=$ins->sms_no?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">IP Address</label>
                            <div class="col-md-8">
                              <input type="text" name="ip_address" value="<?=$ins->ip_address?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Website</label>
                            <div class="col-md-8">
                              <input type="text" name="website" value="<?=$ins->website?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Domain Name</label>
                            <div class="col-md-8">
                              <input type="text" name="domain_name" value="<?=$ins->domain_name?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">URL</label>
                            <div class="col-md-8">
                              <input type="text" name="url" value="<?=$ins->url?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Learning Portal</label>
                            <div class="col-md-8">
                              <input type="text" name="learning_portal" value="<?=$ins->learning_portal?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Schools</label>
                            <div class="col-md-8">
                              <input type="text" name="schools" value="<?=$ins->schools?>" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$ins->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                    <?php
						} 
					?>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab_1_9_4" class="tab-pane <?php if($rdurl4 == 4){ ?>active<? }  ?>">
              <div id="accordion1" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_1" class="panel-collapse collapse in">
                    <?php
							foreach($rehabilitation as $reh){ 
							?>
                    <div class="panel-body">
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_rehabilitation'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$reh->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$reh->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-8">
                              <input type="text" name="rehab_name" value="<?=$reh->rehab_name?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Date</label>
                            <div class="col-md-8">
                              <input type="text" name="rehab_date" value="<?=date('d-m-Y',strtotime($reh->rehab_date));?>" class="form-control form-control-inline date-picker"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Details</label>
                            <div class="col-md-8">
                              <textarea type="text" name="description" class="form-control"/><?=$reh->description?></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Outcome</label>
                            <div class="col-md-8">
                              <input type="text" name="outcome" value="<?=$reh->outcome?>" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$reh->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                    <?php    
					}    
					?>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab_1_9_5" class="tab-pane <?php if($rdurl4 == 5){ ?>active<?php }?>">
              <div id="accordion1" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_1" class="panel-collapse collapse in">
                    <?php
						foreach($teacher as $tea){ 
					?>
                    <div class="panel-body">
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_teacher'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$tea->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$tea->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-8">
                              <input type="text" name="teacher_name" value="<?=$tea->teacher_name?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Telephone No</label>
                            <div class="col-md-8">
                              <input type="text" name="phone" value="<?=$tea->phone?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                              <input type="text" name="email" value="<?=$tea->email?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Learning Portal</label>
                            <div class="col-md-8">
                              <input type="text" name="learning_portal" value="<?=$tea->learning_portal?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Course</label>
                            <div class="col-md-8">
                              <input type="text" name="course" value="<?=$tea->course?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Program</label>
                            <div class="col-md-8">
                              <input type="text" name="academic_program" value="<?=$tea->academic_program?>" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$tea->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                    <?php    
					}    
					?>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab_1_9_8"  class="tab-pane <?php if($rdurl4 == 6){ ?>active<? }  ?>">
              <div id="accordion1" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_1" class="panel-collapse collapse in">
                    <?php
							foreach($recomendation as $recom){ 
					?>
                    <div class="panel-body">
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_recomendation'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$recom->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$recom->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Recomend Person</label>
                            <div class="col-md-8">
                              <input type="text" name="recomendation_person" value="<?=$recom->recomendation_person?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">	Recomendation</label>
                            <div class="col-md-8">
                              <input type="text" name="recomendation" value="<?=$recom->recomendation?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">	Video Link</label>
                            <div class="col-md-8">
                              <input type="text" name="rec_video_link" value="<?=$recom->rec_video_link?>" class="form-control"/>
                            </div>
                          </div>
                        </div>
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$recom->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                    <?php    }    ?>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab_1_9_7" class="tab-pane <?php if($rdurl4 == 7){ ?>active<? }  ?>">
              <div id="accordion1" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_1" class="panel-collapse collapse in">
                    <?php
						foreach($extra as $ext){ 
					?>
                    <div class="panel-body">
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_extra'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$ext->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$ext->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Activity Name</label>
                            <div class="col-md-8">
                              <input type="text" name="activity_name" value="<?=$ext->activity_name?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">	From Date</label>
                            <div class="col-md-8">
                              <input type="text" name="from_date" value="<?=date('d-m-Y',strtotime($ext->from_date));?>" class="form-control form-control-inline date-picker"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">	Activity Description</label>
                            <div class="col-md-8">
                              <textarea type="text" name="activity_description" class="form-control"/><?=$ext->activity_description?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$ext->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                    <?php    
					}    
					?>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab_1_9_8" class="tab-pane <?php if($rdurl4 == 8){ ?>active<? }  ?>">
              <div id="accordion1" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_1" class="panel-collapse collapse in">
                    <?php
						foreach($job as $jo){ 
					?>
                    <div class="panel-body">
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_job'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$jo->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$jo->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Company Name</label>
                            <div class="col-md-8">
                              <input type="text" name="employer_name" value="<?=$jo->employer_name?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">From Date</label>
                            <div class="col-md-8">
                              <input type="text" name="from_date" value="<?=date('d-m-Y',strtotime($jo->from_date));?>" class="form-control form-control-inline date-picker"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">To Date</label>
                            <div class="col-md-8">
                              <input type="text" name="to_date" value="<?=date('d-m-Y',strtotime($jo->to_date));?>" class="form-control form-control-inline date-picker"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Position</label>
                            <div class="col-md-8">
                            <input type="text" name="position" value="<?=$jo->position?>" class="form-control"/>
                            
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-8">
                            <textarea type="text" name="job_description" class="form-control"/><?=$jo->job_description?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$jo->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                    <?php    
					}    
					?>
                  </div>
                </div>
              </div>
            </div>
            <div id="tab_1_9_9" class="tab-pane <?php if($rdurl4 == 9){ ?>active<? }  ?>">
              <div id="accordion1" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_1" class="panel-collapse collapse in">
                    <?php
						foreach($coach as $coa){ 
					?>
                    <div class="panel-body">
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_coach'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$coa->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$coa->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-8">
                              <input type="text" name="coach_name" value="<?=$coa->coach_name?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Contact No</label>
                            <div class="col-md-8">
                              <input type="text" name="phone" value="<?=$coa->phone?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                              <input type="text" name="email" value="<?=$coa->email?>" class="form-control"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Sample</label>
                            <div class="col-md-8">
                            <input type="text" name="sample" value="<?=$coa->sample?>" class="form-control"/>
                            
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-8">
                            <textarea type="text" name="description" class="form-control"/><?=$coa->description?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$coa->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                    <?php    
					}    
					?>
                  </div>
                </div>
              </div>
            </div>
            
            <div id="tab_1_9_10" class="tab-pane <?php if($rdurl4 == 10){ ?>active<? }  ?>">
              <div id="accordion1" class="panel-group">
                <div class="panel panel-default">
                  <div id="accordion1_1" class="panel-collapse collapse in">
                    <?php
						foreach($videop as $vid){ 
					?>
                    <div class="panel-body">
                      <form action="<?php echo base_url().'index.php/individual_edit/edit_video'?>" class="form-horizontal form-bordered" method="post">
                        <input type="hidden" value="<?=$vid->ind_id;?>" name="ind_id" />
                        <input type="hidden" value="<?=$vid->id;?>" name="id"/>
                        <div class="form-body">
                          <div class="form-group">
                            <label class="control-label col-md-3">Video Date</label>
                            <div class="col-md-8">
                              <input type="text" name="video_date" value="<?=date('d-m-Y',strtotime($vid->video_date));?>" class="form-control form-control-inline date-picker"/>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3">Link Record Video</label>
                            <div class="col-md-8">
                              <input type="text" name="link_rec_video" value="<?=$vid->link_rec_video?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">IP Live Camera</label>
                            <div class="col-md-8">
                              <input type="text" name="ip_live_cam" value="<?=$vid->ip_live_cam?>" class="form-control"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Description</label>
                            <div class="col-md-8">
                            <textarea type="text" name="description" class="form-control"/><?=$vid->description?></textarea>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3">Comments</label>
                            <div class="col-md-8">
                            <textarea type="text" name="comments" class="form-control"/><?=$vid->comments?></textarea>
                            </div>
                          </div>
                          
                        </div>
                        <div class="form-actions">
                        <div class="row">
                        <div class="col-md-offset-3 col-md-9"> 
						<?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red'));?> 
                        <a href="<?php echo base_url()?>index.php/userprofile/show_user/<?=$vid->ind_id?>">
                        <button type="button" class="btn default">Cancel</button>
                        </a>
                        </div>
                        </div>
                        </div>
                        
                      </form>
                    </div>
                    <?php    
					}    
					?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php // } ?>
  </div>
  <!-- END CONTENT BODY -->
</div>

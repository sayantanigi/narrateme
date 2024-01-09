<?php foreach($ecms as $i){?>

<div class="tab-pane" id="tab_1_7">

              <div class="row">

                <div class="col-md-3">

                  <ul class="ver-inline-menu tabbable margin-bottom-10">

                   <!-- ======================= akash-4-4-16  Student Data sidebarstarts -----------------============ --> 

                   

                   

                    <li class="active"> <a data-toggle="tab" href="#tab_1_71"> <i class="fa fa-plus"></i> Add Individual Data </a> <span class="after"> </span> </li>
					<li> <a data-toggle="tab" href="#tab_23_23"> <i class="fa fa-plus"></i>Educational Institutions </a> </li>
                    <li> <a data-toggle="tab" href="#tab_24_24"> <i class="fa fa-plus"></i>Seminars Attend </a> </li>
                    <li> <a data-toggle="tab" href="#tab_1_76"> <i class="fa fa-plus"></i> Add Teacher </a> </li>
                    <li> <a data-toggle="tab" href="#tab_11_11"> <i class="fa fa-plus"></i> Add Video Presentation </a> </li>
                    <li> <a data-toggle="tab" href="#tab_12_12"> <i class="fa fa-plus"></i> Add Audio Presentation </a> </li>
                    <li> <a data-toggle="tab" href="#tab_8_8"> <i class="fa fa-plus"></i> Add Recomendation </a> </li>
                    <li> <a data-toggle="tab" href="#tab_1_73"> <i class="fa fa-plus"></i> Add Award </a> </li>
                    <li> <a data-toggle="tab" href="#tab_10_10"> <i class="fa fa-plus"></i> Add Job </a> </li>
                    <li> <a data-toggle="tab" href="#tab_14_14"> <i class="fa fa-plus"></i> Add Reference</a> </li>
                    <li> <a data-toggle="tab" href="#tab_19_19"> <i class="fa fa-plus"></i> Add Issuer of Report </a> </li>
                   <li> <a data-toggle="tab" href="#tab_1_77"> <i class="fa fa-plus"></i> Add Coach </a> </li>
                    <li> <a data-toggle="tab" href="#tab_1_74"> <i class="fa fa-plus"></i> Add Rahab </a> </li>
                     <li> <a data-toggle="tab" href="#tab_1_72"> <i class="fa fa-plus"></i>Add Drug </a> </li>
                    <li> <a data-toggle="tab" href="#tab_1_75"> <i class="fa fa-plus"></i> Add Institute </a> </li>
                     <li> <a data-toggle="tab" href="#tab_9_9"> <i class="fa fa-plus"></i> Add Extra </a> </li>
                     <li> <a data-toggle="tab" href="#tab_17_17"> <i class="fa fa-plus"></i> Add Academic Transcript </a> </li>
                    <li> <a data-toggle="tab" href="#tab_18_18"> <i class="fa fa-plus"></i> Add Educational Records </a> </li>
                    <li> <a data-toggle="tab" href="#tab_20_20"> <i class="fa fa-plus"></i> Reports </a> </li>
                    <li> <a data-toggle="tab" href="#tab_21_21"> <i class="fa fa-plus"></i> Messages </a> </li>
                    <li> <a data-toggle="tab" href="#tab_13_13"> <i class="fa fa-plus"></i> Add Personal Recommend</a> </li>
                     <li> <a data-toggle="tab" href="#tab_1_720"> <i class="fa fa-plus"></i> Add Facilities</a> </li>
                   <!-- <li> <a data-toggle="tab" href="#tab_15_15"> <i class="fa fa-plus"></i> Add Facilities</a> </li>-->

              </ul>

                </div>

                <div class="col-md-9">

                  <div class="tab-content">

                  

                   <!-- ======================= akash-4-4-16  Student Data starts -----------------============ --> 

                   

                    <div id="tab_1_71" class="tab-pane active">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">

                            <div class="panel-body">

                           

                             

                              <form action="<?php echo base_url().'index.php/student_record/add_st_individual' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

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

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'dob', 'type'=>'text' ,'name' => 'dob','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('outcome'); ?> </div>

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

                                      <input type="hidden" name="ind_id" value="<?=$i->id ?>" />

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

                    

                 

                    <div id="tab_1_72" class="tab-pane">

                      <div id="accordion2" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_2" class="panel-collapse collapse in">

                            <div class="panel-body">

                              <form action="<?php echo base_url().'index.php/student_record/add_st_drug' ?>" class="form-horizontal form-bordered" method="post" >

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

                    <div id="tab_1_73" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_3" class="panel-collapse collapse in">

                            <div class="panel-body">

                            

                              <form action="<?php echo base_url().'index.php/student_record/add_st_award' ?>" class="form-horizontal form-bordered" method="post" >

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

                                      <?php $ind_num = end($this->uri->segment_array());?>

                                      <input type="hidden" name="ind_id" value="<?=$i->id ?>" />

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

                    <div id="tab_1_74" class="tab-pane">

                      <div id="accordion4" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_4" class="panel-collapse collapse in">

                            <div class="panel-body">

                              <form action="<?php echo base_url().'index.php/student_record/add_st_rehab' ?>" class="form-horizontal form-bordered" method="post" >

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

                    <div id="tab_1_75" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/add_st_institute' ?>" class="form-horizontal form-bordered" method="post" >

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

                    

                    

                    

                   

                    <div id="tab_1_76" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/add_st_teacher' ?>" class="form-horizontal form-bordered" method="post" >

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

                    <div id="tab_1_77" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/add_st_coach' ?>" class="form-horizontal form-bordered" method="post" >

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

                    

                    <div id="tab_1_720" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/add_st_insfac' ?>" class="form-horizontal form-bordered" method="post" >

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

             <!-- ======================= akash-4-4-16 Student Data ends -----------------============ --> 

             

               <!--***************************** ARUP************************************** -->

                     <!--  -----------------------------  Arup-4-4-2016 starts-----------------------------    -->

                    <div id="tab_8_8" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/add_recomendation' ?>" class="form-horizontal form-bordered" method="post" >

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

                     <!--  -----------------------------  Arup-4-4-2016 starts-----------------------------    -->

                     <!--  -----------------------------  Arup-4-4-2016 starts-----------------------------    -->

                    <div id="tab_9_9" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/addextra' ?>" class="form-horizontal form-bordered" method="post" >

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

                     <!--  -----------------------------  Arup-4-4-2016 starts-----------------------------    -->

                     <!--  -----------------------------  Arup-4-4-2016 starts-----------------------------    -->

                    <div id="tab_10_10" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/addjob' ?>" class="form-horizontal form-bordered" method="post" >

                        <?php echo form_input(array('id' => 'ind_id', 'name' => 'ind_id','type'=>'hidden','class'=>'form-control' ,'value'=>$this->uri->segment(3))); ?>

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

                     <!--  -----------------------------  Arup-4-4-2016 starts-----------------------------    -->

                    <!--***************************** ARUP************************************** --> 

                    

                     <!--  -----------------------------  Arup-4-4-2016 starts-----------------------------    -->

                    <div id="tab_11_11" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/add_video' ?>" class="form-horizontal form-bordered" method="post" >

                         <?php echo form_input(array('id' => 'ind_id', 'name' => 'ind_id','type'=>'hidden','class'=>'form-control' ,'value'=>$this->uri->segment(3))); ?>

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

                    

                    

												<div id="tab_17_17" class="tab-pane">

                                                    <div id="accordion3" class="panel-group">

                                                    

                                                    

                                                    <form action="<?php echo base_url().'index.php/student_record/add_academic_transcript' ?>" class="form-horizontal form-bordered" method="post" >

                                                                <div class="form-body">

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">Grades</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_input(array('id' => 'grades', 'name' => 'grades','class'=>'form-controls')); ?>

                                                                <?php echo form_error('grades'); ?>

                                                                </div>

                                                                </div>

                                                                 

                                                                 <div class="form-group">

                                                                <label class="control-label col-md-3">Notes</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_textarea(array('id' => 'notes', 'name' => 'notes','class'=>'form-controls')); ?>

                                                                </div>

                                                                </div>

                                                             <div class="form-group">

                                                                <label class="control-label col-md-3">Comments</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_textarea(array('id' => 'comments', 'name' => 'comments','class'=>'form-controls')); ?>

                                                                </div>

                                                                </div>

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">Messages</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_textarea(array('id' => 'messages', 'name' => 'messages','class'=>'form-controls')); ?>

                                                                </div>

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

                                                 

												<div id="tab_18_18" class="tab-pane">

                                                    <div id="accordion3" class="panel-group">

                                                    

                                                    

                                                    <form action="<?php echo base_url().'index.php/student_record/add_educational_records' ?>" class="form-horizontal form-bordered" method="post" >

                                                                <div class="form-body">

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">Grades</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_input(array('id' => 'grades', 'name' => 'grades','class'=>'form-controls')); ?>

                                                                <?php echo form_error('grades'); ?>

                                                                </div>

                                                                </div>

                                                                 

                                                                 <div class="form-group">

                                                                <label class="control-label col-md-3">Notes</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_textarea(array('id' => 'notes', 'name' => 'notes','class'=>'form-controls')); ?>

                                                                </div>

                                                                </div>

                                                             <div class="form-group">

                                                                <label class="control-label col-md-3">Comments</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_textarea(array('id' => 'comments', 'name' => 'comments','class'=>'form-controls')); ?>

                                                                </div>

                                                                </div>

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">Messages</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_textarea(array('id' => 'messages', 'name' => 'messages','class'=>'form-controls')); ?>

                                                                </div>

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

                                               

												<div id="tab_19_19" class="tab-pane">

                                                    <div id="accordion3" class="panel-group">

                                                    

                                                    

                                                    <form action="<?php echo base_url().'index.php/student_record/add_issuer_of_report' ?>" class="form-horizontal form-bordered" method="post" >

                                                                <div class="form-body">

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">Name</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_input(array('id' => 'name', 'name' => 'name','class'=>'form-controls')); ?>

                                                                <?php echo form_error('name'); ?>

                                                                </div>

                                                                </div>

                                                                 

                                                                 <div class="form-group">

                                                                <label class="control-label col-md-3">Telephone No.</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_input(array('id' => 'tel_no', 'name' => 'tel_no','class'=>'form-controls')); ?>

                                                                </div>

                                                                </div>

                                                             <div class="form-group">

                                                                <label class="control-label col-md-3">Website</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_input(array('id' => 'website', 'name' => 'website','class'=>'form-controls')); ?>

                                                                </div>

                                                                </div>

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">URL</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_input(array('id' => 'url', 'name' => 'url','class'=>'form-controls')); ?>

                                                                </div>

                                                                </div>

                                                                 <div class="form-group">

                                                                <label class="control-label col-md-3">Description</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-controls')); ?>

                                                                </div>

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

                                                

                                                 <div id="tab_23_23" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/eduinst_attend' ?>" class="form-horizontal form-bordered" method="post" >

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

                    

                     							 <div id="tab_24_24" class="tab-pane">

                      <div id="accordion3" class="panel-group">

                        <form action="<?php echo base_url().'index.php/student_record/add_seminar_attend' ?>" class="form-horizontal form-bordered" method="post" >

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

                    <!--  -----------------------------  Arup-4-4-2016 ends-----------------------------    --> 

                    

                    <!--   ------------------------sup-4-4-16 starts----------------------------   -->

                    <!-- Arup-6/4/16  -->

												<div id="tab_20_20" class="tab-pane">

                                                    <div id="accordion3" class="panel-group">

                                                    

                                                    

                                                    <form action="<?php echo base_url().'index.php/student_record/add_reports'?>" class="form-horizontal form-bordered" method="post" >

                                                                <div class="form-body">

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">Date</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_input(array('id' =>'report_date', 'name' => 'report_date','class'=>'form-control form-control-inline date-picker')); ?>

                                                                <?php echo form_error('report_date'); ?>

                                                                </div>

                                                                </div>

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">Description</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-controls')); ?>

                                                                </div>

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

                                                 

                                            	

												<div id="tab_21_21" class="tab-pane">

                                                    <div id="accordion3" class="panel-group">

                                                    

                                                    

                                                    <form action="<?php echo base_url().'index.php/student_record/add_messages'?>" class="form-horizontal form-bordered" method="post" >

                                                                <div class="form-body">

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">Date</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_input(array('id' =>'report_date', 'name' => 'report_date','class'=>'form-control form-control-inline date-picker')); ?>

                                                                <?php echo form_error('report_date'); ?>

                                                                </div>

                                                                </div>

                                                                <div class="form-group">

                                                                <label class="control-label col-md-3">Description</label>

                                                                <div class="col-md-5">

                                                                <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-controls')); ?>

                                                                </div>

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

                                                

                                                 <!-- Arup-6/4/16  -->

                                                <div id="tab_12_12" class="tab-pane">

                                                  <div id="accordion3" class="panel-group">

                                                    <form action="<?php echo base_url().'index.php/student_record/add_audio' ?>" class="form-horizontal form-bordered" method="post" >

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

                                               

                                                

                                             

                                                <div id="tab_13_13" class="tab-pane">

                                                  <div id="accordion3" class="panel-group">

                                                    <form action="<?php echo base_url().'index.php/student_record/add_perrec' ?>" class="form-horizontal form-bordered" method="post" >

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

                                               

                                                <div id="tab_14_14" class="tab-pane">

                                                  <div id="accordion3" class="panel-group">

                                                    <form action="<?php echo base_url().'index.php/student_record/add_reference' ?>" class="form-horizontal form-bordered" method="post" >

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

                                              

                                                <div id="tab_15_15" class="tab-pane">

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

                  

                                                

          <!--   ------------------------sup-4-4-16 ends----------------------------   -->

                                                 

                    

                         

                                                             

                                            

                    

                  </div>

                </div>

              </div>

             </div>

     <?php }?>
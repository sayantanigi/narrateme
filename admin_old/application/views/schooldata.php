<?php foreach($ecms as $i){?>

 	<div class="tab-pane" id="tab_1_9">

              <div class="row">

                <div class="col-md-3">

                  <ul class="ver-inline-menu tabbable margin-bottom-10">

                    <li class="active"> <a data-toggle="tab" href="#tab_1_9_1"> <i class="fa fa-plus"></i> Instructional Facilities </a> <span class="after"> </span> </li>

                    <li> <a data-toggle="tab" href="#tab_1_9_2"> <i class="fa fa-plus"></i> Courses/Classes  </a> <span class="after"> </span> </li>

                    <li> <a data-toggle="tab" href="#tab_1_9_3"> <i class="fa fa-plus"></i> Classes and Lectures </a> </li>
					
					 <li> <a data-toggle="tab" href="#tab_1_9_4"> <i class="fa fa-plus"></i>Instructors/Teachers/Proff</a> </li>
					<li> <a data-toggle="tab" href="#tab_1_9_5"> <i class="fa fa-plus"></i>Schools/Divisions</a> </li>
					<li> <a data-toggle="tab" href="#tab_1_9_6"> <i class="fa fa-plus"></i>Archived/Past Lectures/Classes: </a> </li>
					<li> <a data-toggle="tab" href="#tab_1_9_7"> <i class="fa fa-plus"></i>Curriculum</a> </li>
					<li> <a data-toggle="tab" href="#tab_1_9_8"> <i class="fa fa-plus"></i>Other Educational Institutions</a> </li>
                  </ul>

                </div>

                <div class="col-md-9">

                  <div class="tab-content">

                    

                    

                    <!--  -----------------------------  Akash-6-04-2016 starts-----------------------------    -->

                    <div id="tab_1_9_1" class="tab-pane active">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">

                            <div class="panel-body">

							<?php

                            /*	if( !empty($school) ) {

                            foreach($school as $sed){
								}*/
                            ?>

                              <form action="<?php echo base_url().'index.php/schooldata/add_instructional_facilities' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?php echo $i->id?>" name="ind_id" />

                                <div class="form-body">

                                  <div class="form-group">

                                    <label class="control-label col-md-3">School Name</label>

                                    <div class="col-md-8">

                                      <input type="text" name="school_name" value="<?=$sed->school_name?>" class="form-control" />

                                    </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3">School Bulletin</label>

                                    <div class="col-md-8">

                                      <input type="text" name="school_bulletin" value="<?=$sed->school_bulletin?>" class="form-control" />

                                    </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Teacher</label>

                                    <div class="col-md-8">

                                      <input type="text" name="teacher" value="<?=$sed->teacher?>" class="form-control" />

                                    </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Address</label>

                                    <div class="col-md-8">

                                      <input type="text" name="address" value="<?=$sed->address?>" class="form-control" />

                                    </div>

                                  </div>

                                  

                                   <div class="form-group">

                                    <label class="control-label col-md-3">Phone No</label>

                                    <div class="col-md-8">

                                      <input type="tel" name="pnone_no" value="<?=$sed->pnone_no?>" class="form-control" />

                                    </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Email</label>

                                    <div class="col-md-8">

                                      <input type="email" name="email" value="<?=$sed->email?>" class="form-control" />

                                    </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Mobile</label>

                                    <div class="col-md-8">

                                      <input type="tel" name="mobile" value="<?=$sed->mobile?>" class="form-control" />

                                    </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">IP Address</label>

                                    <div class="col-md-8">

                                      <input type="tel" name="ip_address" value="<?=$sed->ip_address?>" class="form-control" />

                                    </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Websites</label>

                                    <div class="col-md-8">

                                      <input type="tel" name="websites" value="<?=$sed->websites?>" class="form-control" />

                                    </div>

                                  </div>

                                  

                                   <div class="form-group">

                                    <label class="control-label col-md-3">Domain Name</label>

                                    <div class="col-md-8">

                                      <input type="tel" name="domain_name" value="<?=$sed->domain_name?>" class="form-control" />

                                    </div>

                                  </div>

                                  

                                   <div class="form-group">

                                    <label class="control-label col-md-3">URL</label>

                                    <div class="col-md-8">

                                      <input type="tel" name="url" value="<?=$sed->url?>" class="form-control" />

                                    </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">School Information</label>

                                    <div class="col-md-8">

                                      <!--<input type="text" id="cms_pagedes" name="school_information" value="" />-->

                                       <textarea name="school_information" id="cms_pagedes" class="form-control" ><?=$sed->school_information?></textarea> 

                                    </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">School Program Information</label>

                                    <div class="col-md-8">

                                      <!--<input type="text" id="cms_pagedes" name="school_information" value="" />-->

                                       <textarea name="schoolprogram_information" id="cms_pagedes" class="form-control"><?=$sed->schoolprogram_information?></textarea> 

                                    </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">School web site</label>

                                    <div class="col-md-8">

                                      <!--<input type="text" id="cms_pagedes" name="school_information" value="" />-->

                                       <textarea name="schoolwebsite" id="cms_pagedes" class="form-control"><?=stripslashes($sed->schoolwebsite) ; ?></textarea> 

                                    </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Programs  </label>

                                    <div class="col-md-8"> 

										<select name="programs_div" class="form-control"> 

                                    		<option value="diploma" <?php if($sed->programs_div=='diploma'){?>selected="selected"<? } ?> >Diploma </option>

                                            <option value="Certificate" <?php if($sed->programs_div=='Certificate'){?>selected="selected"<? } ?>>Certificate </option>

                                            <option value="degree" <?php if($sed->programs_div=='degree'){?>selected="selected"<? } ?>>Degree </option>

                                            <option value="Rank" <?php if($sed->programs_div=='Rank'){?>selected="selected"<? } ?>>Rank </option>

                                            <option value="Persuing" <?php if($sed->programs_div=='Persuing'){?>selected="selected"<? } ?>> Persuing Education </option>

                                          </select>

                                     </div>

                                  </div>
								  
								  <div class="form-group">

                                    <label class="control-label col-md-3">Affiliate Schools</label>

                                    <div class="col-md-8">

                                       <textarea name="affiliate" id="affiliate" class="form-control"></textarea> 

                                    </div>

                                  </div>
								  
								  <div class="form-group">

                                    <label class="control-label col-md-3">Division Scored</label>

                                    <div class="col-md-8">

                                       <textarea name="division" id="division" class="form-control"></textarea> 

                                    </div>

                                  </div>
								  <div class="form-group">

                                    <label class="control-label col-md-3">Past Alumini</label>

                                    <div class="col-md-8">

                                       <textarea name="alumini" id="alumini" class="form-control"></textarea> 

                                    </div>

                                  </div>
								  <div class="form-group">

                                    <label class="control-label col-md-3">	Transcripts</label>

                                    <div class="col-md-8">

                                       <textarea name="transcripts" id="transcripts" class="form-control"></textarea> 

                                    </div>

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

                              <?php // }
							   /*	}else{

														*/		?>

                             <!-- <form action="<?php echo base_url().'index.php/individual/add_individual' ?>" class="form-horizontal form-bordered" method="post" >

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

                              </form>-->

                             

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                    

                    <div id="tab_1_9_2" class="tab-pane">

                      <div id="accordion2" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_2" class="panel-collapse collapse in"> 
						    <?php
							/*if(isset($course)){
							foreach($course as $cou){
							}*/
							?>

                            <div class="panel-body">

                              <form action="<?=base_url().'index.php/schooldata/add_school_course';?>" class="form-horizontal form-bordered" method="post" >

                                <div class="form-body">

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Instructor</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'instructor', 'name' => 'instructor','class'=>'form-control'),$cou->instructor); ?> <?php echo form_error('outcome'); ?> </div>

                                  </div>

                                  

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Course/Lecture Schedule</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'schedule', 'name' => 'schedule','class'=>'form-control form-control-inline date-picker'),$cou->schedule); ?> <?php echo form_error('drug_date'); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Other Courses/Facilities</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'facilities', 'name' => 'facilities','class'=>'form-control'),$cou->facilities); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Description/Syllabus</label>

                                    <div class="col-md-8"> <?php echo form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-control'),$cou->description); ?> </div>

                                  </div>

                                  

                                </div>

                                <div class="form-actions">

                                  <div class="row">

                                    <div class="col-md-offset-3 col-md-9">

                                      <?php $ind_num = end($this->uri->segment_array());?>

                                      <input type="hidden" name="ind_id" value="<?php echo $i->id ;?>" />

                                      <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?> <a href="<?php echo base_url()?>index.php/member/view_member">

                                      <button type="button" class="btn default">Cancel</button>

                                      </a> </div>

                                  </div>

                                </div>

                              </form>

                            </div>
							<?php  
							// } 
							?>

                          </div>

                        </div>

                      </div>

                    </div>  

                    

                     <div id="tab_1_9_3" class="tab-pane">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">
						   <?php
							/*if(isset($lecture)){
							foreach($lecture as $lec){ 
							}*/
							?>

                            <div class="panel-body">

                    <form action="<?php echo base_url().'index.php/schooldata/add_school_lect' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?php echo $i->id?>" name="ind_id" />

                                <div class="form-body">

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Link to recorded video/Audio</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'video', 'name' => 'video','class'=>'form-control'),$lec->video); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Link to live camera/microphone</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'camera', 'name' => 'camera','class'=>'form-control '),$lec->camera); ?> <?php echo form_error('conference_id'); ?> </div>

                                  </div>

                                  

                                </div>

                                <div class="form-actions">

                                  <div class="row">

                                    <div class="col-md-offset-3 col-md-9">

                                      <?php $ind_num = end($this->uri->segment_array());?>

                                      <input type="hidden" name="ind_id" value="<?php echo $i->id ;?>" />

                                      <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>

                                      <button type="button" class="btn default">Cancel</button>

                                    </div>

                                  </div>

                                </div>

                              </form>

                      

                            </div>
							<?php
							// } ?>

                          </div>

                        </div>

                      </div>

                    </div>
					
					
					<div id="tab_1_9_4" class="tab-pane">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">
						   <?php
							/*if(isset($teacher)){
							foreach($teacher as $tea){ 
							}*/
							?>

                            <div class="panel-body">

							    <form action="<?php echo base_url().'index.php/schooldata/add_school_teacher' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

                                <div class="form-body">

                                 

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Name</label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control'),$tea->name); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Course </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'course', 'name' => 'course','class'=>'form-control'),$tea->course); ?> </div>

                                  </div>

                                  

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Telephone </label> 

                                    <div class="col-md-8"> <?=form_input(array('id' => 'telephone', 'name' => 'telephone','class'=>'form-control'),$tea->telephone); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">E-mail </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'email', 'name' => 'email','class'=>'form-control'),$tea->email); ?> </div>

                                  </div>

                                  

                                   <div class="form-group">

                                    <label class="control-label col-md-3">Website </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'website', 'name' => 'website','class'=>'form-control'),$tea->website); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Address  </label>

                                    <div class="col-md-8"> <?=form_textarea(array('id' => 'address', 'name' => 'address','class'=>'form-control'),$tea->address); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Bio and Information </label>

                                    <div class="col-md-8"> <?=form_textarea(array('id' => 'information', 'name' => 'information','class'=>'form-control'),$tea->information); ?> </div>

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
							<?php   // }    ?>

                          </div>

                        </div>

                      </div>

                    </div>


					<div id="tab_1_9_5" class="tab-pane">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">
						   <?php
							/*if(isset($lecture)){
							foreach($lecture as $lec){ 
							}*/
							?>

                            <div class="panel-body">

                    <form action="<?php echo base_url().'index.php/schooldata/add_school_sch' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?php echo $i->id?>" name="ind_id" />

                                <div class="form-body">

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Link to recorded Program</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'program', 'name' => 'program','class'=>'form-control'),$sch->program); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Link to live Course</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'course', 'name' => 'course','class'=>'form-control '),$sch->course); ?>  </div>

                                  </div>

                                  

                                </div>

                                <div class="form-actions">

                                  <div class="row">

                                    <div class="col-md-offset-3 col-md-9">

                                      <?php $ind_num = end($this->uri->segment_array());?>

                                      <input type="hidden" name="ind_id" value="<?php echo $i->id ;?>" />

                                      <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>

                                      <button type="button" class="btn default">Cancel</button>

                                    </div>

                                  </div>

                                </div>

                              </form>

                      

                            </div>
							<?php
							// } ?>

                          </div>

                        </div>

                      </div>

                    </div>
                    
                    <!--  school/division---06-07-2016----  -->
                    
                    <!--  past lectures---06-07-2016----  -->
                                            
						<div id="tab_1_9_6" class="tab-pane active">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">

                            <div class="panel-body">

                    <form action="<?php echo base_url().'index.php/schooldata/add_school_past' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?php echo $i->id?>" name="ind_id" />

                                <div class="form-body">

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Link to recorded video/Audio</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'video', 'name' => 'video','class'=>'form-control'),$past->video); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Link to live camera/microphone</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'camera', 'name' => 'camera','class'=>'form-control '),$past->camera); ?>  </div>

                                  </div>

                                  

                                </div>

                                <div class="form-actions">

                                  <div class="row">

                                    <div class="col-md-offset-3 col-md-9">

                                      <?php $ind_num = end($this->uri->segment_array());?>

                                      <input type="hidden" name="ind_id" value="<?php echo $i->id ;?>" />

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
                    
					<div id="tab_1_9_7" class="tab-pane">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">
						   <?php
							/*if(isset($teacher)){
							foreach($teacher as $tea){ 
							}*/
							?>

                            <div class="panel-body">

							    <form action="<?php echo base_url().'index.php/schooldata/add_school_curiculam' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

                                <div class="form-body">

                                 

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Instructor</label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'instructor', 'name' => 'instructor','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Course </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'course', 'name' => 'course','class'=>'form-control')); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Description  </label>

                                    <div class="col-md-8"> <?=form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-control')); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3"> Course Schedule  </label> 

                                    <div class="col-md-8"> <?=form_input(array('id' => 'course_schedule', 'name' => 'course_schedule','class'=>'form-control','type'=>'date')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3"> Educational Institute</label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'educ_institute', 'name' => 'educ_institute','class'=>'form-control')); ?> </div>

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
							<?php   // }    ?>

                          </div>

                        </div>

                      </div>

                    </div>
					
					<div id="tab_1_9_8" class="tab-pane">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">
						   <?php
							/*if(isset($teacher)){
							foreach($teacher as $tea){ 
							}*/
							?>

                            <div class="panel-body">

							    <form action="<?php echo base_url().'index.php/schooldata/add_school_other_edu' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

                                <div class="form-body">

                                 

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Program Enrolled</label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'program_enrolled', 'name' => 'program_enrolled','class'=>'form-control')); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3"> Attandance Date  </label> 

                                    <div class="col-md-8"> <?=form_input(array('id' => 'attandance_date', 'name' => 'attandance_date','class'=>'form-control','type'=>'date')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3"> Courses Taken </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'courses_taken', 'name' => 'courses_taken','class'=>'form-control')); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3"> Grade  </label>

                                    <div class="col-md-8"> <?=form_textarea(array('id' => 'grade', 'name' => 'grade','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3"> Courses Enrolled </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'courses_enrolled', 'name' => 'courses_enrolled','class'=>'form-control')); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3"> Seminar Name </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'seminar_name', 'name' => 'seminar_name','class'=>'form-control')); ?> </div>

                                  </div>
								  
								<div class="form-group">

                                    <label class="control-label col-md-3"> Seminar Date </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'seminar_date', 'name' => 'seminar_date','class'=>'form-control','type'=>'date')); ?> </div>

                                  </div>

                                   <div class="form-group">

                                    <label class="control-label col-md-3"> Seminar Description </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'seminar_description', 'name' =>'seminar_description','class'=>'form-control')); ?> </div>

                                  </div>
								  
 								<div class="form-group">

                                    <label class="control-label col-md-3"> Course Schedule </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'course_schedule', 'name' => 'course_schedule','class'=>'form-control','type'=>'date')); ?> </div>

                                  </div>

                                   <div class="form-group">

                                    <label class="control-label col-md-3"> Teacher Name </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'teacher_name', 'name' => 'teacher_name','class'=>'form-control')); ?> </div>

                                  </div>

                                    <div class="form-group">

                                    <label class="control-label col-md-3"> Teacher Phone </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'teacher_phone', 'name' => 'teacher_phone','class'=>'form-control')); ?> </div>

                                  </div>

                                   <div class="form-group">

                                    <label class="control-label col-md-3"> Teacher Email </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'teacher_email', 'name' => 'teacher_email','class'=>'form-control','type'=>'email')); ?> </div>

                                  </div>

                                   <div class="form-group">

                                    <label class="control-label col-md-3">Certificate Degree  </label>

                                    <div class="col-md-8"> 

										<select name="Certificate_degree" class="form-control"> 

                                    		<option value="diploma" <?php if($sed->programs_div=='diploma'){?>selected="selected"<? } ?> >Diploma </option>

                                            <option value="Certificate" <?php if($sed->programs_div=='Certificate'){?>selected="selected"<? } ?>>Certificate </option>

                                            <option value="degree" <?php if($sed->programs_div=='degree'){?>selected="selected"<? } ?>>Degree </option>

                                            <option value="Rank" <?php if($sed->programs_div=='Rank'){?>selected="selected"<? } ?>>Rank </option>

                                            <option value="Persuing" <?php if($sed->programs_div=='Persuing'){?>selected="selected"<? } ?>> Persuing Education </option>

                                          </select>

                                     </div>

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
							<?php   // }    ?>

                          </div>

                        </div>

                      </div>

                    </div>
                                            

                                            

                    

                  </div>

                </div>

              </div>

            </div>

           <?php }?>
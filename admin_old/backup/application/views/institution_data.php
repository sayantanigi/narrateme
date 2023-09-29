<?php foreach($ecms as $i){?>

<div class="tab-pane" id="tab_1_8">

              <div class="row">

                <div class="col-md-3">

                  <ul class="ver-inline-menu tabbable margin-bottom-10">

                   <!-- ======================= akash-5-4-16  Student Data sidebarstarts -----------------============ --> 

                   

                   

                    <li class="active"> <a data-toggle="tab" href="#tab_1_8_1"> <i class="fa fa-plus"></i> Educational Institutions </a> <span class="after"> </span> </li>

                    <li> <a data-toggle="tab" href="#tab_1_8_2"> <i class="fa fa-plus"></i>Teachers/Prof./Instructor  </a> <span class="after"> </span> </li>

                    <li> <a data-toggle="tab" href="#tab_1_8_3"> <i class="fa fa-plus"></i>Schools/Divisions  </a> </li>

                    <li> <a data-toggle="tab" href="#tab_1_8_4"> <i class="fa fa-plus"></i>Curriculum </a> </li>

                   

                    

            <!-- ======================= akash-5-4-16  Student Data sidebar ends -----------------============ --> 

             <!-- ======================= Debjit-5-4-16  Institution Data sidebarstarts -----------------============ --> 

             <li class="tab"> <a data-toggle="tab" href="#tab_1_8_15"> <i class="fa fa-plus"></i>Academic Transcripts  </a>  </li>

                    <li> <a data-toggle="tab" href="#tab_1_8_13"> <i class="fa fa-plus"></i>Accepted Substitute </a> </li>

                    

                <!-- ======================= Debjit-5-4-16  Institution Data sidebarstarts ends-----------------============ -->      

            

           

                    

                    

                    

                  </ul>

                </div>

                <div class="col-md-9">

                  <div class="tab-content">

                   <!-- ======================= akash-5-4-16  Student Data starts -----------------============ --> 

                   

                        <div id="tab_1_8_1" class="tab-pane active">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">

                            <div class="panel-body">

                           

                             

                              <form action="<?php echo base_url().'index.php/institution_data/add_edu' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

                                <div class="form-body">

                                 

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Name</label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">School Bulletin </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'school', 'name' => 'school','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Description</label>

                                    <div class="col-md-8"> <?=form_textarea(array('id' => 'description', 'name' => 'description','class'=>'form-control')); ?> </div>

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

                   

                   <div id="tab_1_8_2" class="tab-pane active">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">

                            <div class="panel-body">

                           

                             

                              <form action="<?php echo base_url().'index.php/institution_data/add_ins_edu' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

                                <div class="form-body">

                                 

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Name</label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'name', 'name' => 'name','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Course </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'course', 'name' => 'course','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Telephone </label> 

                                    <div class="col-md-8"> <?=form_input(array('id' => 'telephone', 'name' => 'telephone','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">E-mail </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'email', 'name' => 'email','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                   <div class="form-group">

                                    <label class="control-label col-md-3">Website </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'website', 'name' => 'website','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Address  </label>

                                    <div class="col-md-8"> <?=form_textarea(array('id' => 'address', 'name' => 'address','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Bio and Information </label>

                                    <div class="col-md-8"> <?=form_textarea(array('id' => 'information', 'name' => 'information','class'=>'form-control')); ?> </div>

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

                    

                    <div id="tab_1_8_3" class="tab-pane active">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">

                            <div class="panel-body">

                           

                             

                              <form action="<?php echo base_url().'index.php/institution_data/add_sch_div' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

                                <div class="form-body">

                                 

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Academic Programs </label>

                                    <div class="col-md-8"> 

										<select name="academic"> 

                                    		<option value="diploma">Diploma </option>

                                            <option value="Certificate">Certificate </option>

                                            <option value="degree">degree </option>

                                            <option value="Education"> Persuing Education </option>

                                          </select>

                                     </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Course/Program Bulletin </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'course', 'name' => 'course','class'=>'form-control')); ?> </div>

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

                    

                    <div id="tab_1_8_4" class="tab-pane active">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">

                            <div class="panel-body">

                           

                             

                              <form action="<?php echo base_url().'index.php/institution_data/add_curiculam' ?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

                                <div class="form-body">

                                 

                                 

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Course </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'course', 'name' => 'course','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Description/Syllabus </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'description', 'name' => 'description','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                   <div class="form-group">

                                    <label class="control-label col-md-3">Course/Class/Lecture Schedule</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'course_schedule', 'name' => 'course_schedule','class'=>'form-control form-control-inline date-picker')); ?> <?php echo form_error('drug_date'); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Instructor </label>

                                    <div class="col-md-8"> <?=form_input(array('id' => 'instructor', 'name' => 'instructor','class'=>'form-control')); ?> </div>

                                  </div>

                                  

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Accepted Transfer Courses/Other Educational Institutions </label>

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

                          </div>

                        </div>

                      </div>

                    </div>

                                                 

                    

                   <!-- ======================= akash-5-4-16  Student Data ends -----------------============ --> 

                    <!-- ======================= Debjit-5-4-16  Institution Data starts -----------------============ --> 

                   

                    <div id="tab_1_8_15" class="tab-pane active">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">

                            <div class="panel-body">

                           

                             

                              <form action="<?php echo base_url().'index.php/institution_data/add_academic_institution'?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

                                <div class="form-body">

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Courses taken</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'courses_taken', 'name' => 'courses_taken','class'=>'form-control')); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Grades</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'grade', 'name' => 'grade','class'=>'form-control ')); ?> <?php echo form_error('conference_id'); ?> </div>

                                  </div>

                                 

                                </div>

                                <div class="form-actions">

                                  <div class="row">

                                    <div class="col-md-offset-3 col-md-9">

                                      <?php //$ind_num = end($this->uri->segment_array());?>

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

                    

                    

                    

                    <div id="tab_1_8_13" class="tab-pane active">

                      <div id="accordion1" class="panel-group">

                        <div class="panel panel-default">

                          <div id="accordion1_1" class="panel-collapse collapse in">

                            <div class="panel-body">

                           

                             

                              <form action="<?php echo base_url().'index.php/institution_data/add_accepted_substitute'?>" class="form-horizontal form-bordered" method="post" >

                                <input type="hidden" value="<?=$i->id ; ?>" name="ind_id" />

                                <div class="form-body">

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Link to recorded video/audio</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'link_video', 'name' => 'link_video','class'=>'form-control')); ?> </div>

                                  </div>

                                  <div class="form-group">

                                    <label class="control-label col-md-3">Link to live camera/microphone</label>

                                    <div class="col-md-8"> <?php echo form_input(array('id' => 'link_camera', 'name' => 'link_camera','class'=>'form-control ')); ?> <?php echo form_error('conference_id'); ?> </div>

                                  </div>

                                 

                                </div>

                                <div class="form-actions">

                                  <div class="row">

                                    <div class="col-md-offset-3 col-md-9">

                                      <?php //$ind_num = end($this->uri->segment_array());?>

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

                    

                    

                   

          <!--   ------------------------Debjit-5-4-16 ends----------------------------   -->

                                                        

                                                             

                                            

                    

                  </div>

                </div>

              </div>

             </div>

     <?php }?>
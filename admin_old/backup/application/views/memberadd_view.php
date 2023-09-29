<div class="page-container">

  <!-- BEGIN SIDEBAR -->

  <div class="page-sidebar-wrapper">

    <!-- BEGIN SIDEBAR -->

    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->

    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->

    <?php //include"lib/leftbar.php"?>

   <?php $this->load->view('leftbar'); ?>

    <!-- END SIDEBAR -->

  </div>

  <!-- END SIDEBAR -->

  <!-- BEGIN CONTENT -->

  <div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->

    <div class="page-content">

      <!-- END THEME PANEL -->

      <!-- BEGIN PAGE TITLE-->

      <h3 class="page-title">

        <?//=$pagetitle?>

        <!--<small>classic page head option</small>-->

      </h3>

      <!-- END PAGE TITLE-->

      <!-- BEGIN PAGE BAR -->

      <div class="page-bar">

        <ul class="page-breadcrumb">

          <li> <a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i> </li>

          <li> <span>

            <?php echo @$title;//echo $this->session->flashdata('success_msg');; ?>

            </span> </li>

        </ul>

      </div>

      <!-- END PAGE BAR -->

     

      

      <?php //} ?>

		<?php

        //if($_REQUEST['mess'] == 'added') {

        ?>

      <div class="alert alert-success alert-dismissable" style="padding:10px;">

        <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>

        <?php echo @$h1title;//echo $this->session->flashdata('success_msg');; ?>

      </div>

      <?php // } ?>

      <div class="row">

        <div class="col-md-12">

          <!-- BEGIN PORTLET-->

          <div class="portlet box blue-hoki">

            <div class="portlet-title">

              <div class="caption"> <i class="fa fa-reorder"></i>

                <?//=$pagetitle?>

              </div>

              <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>

            </div>

            <div class="portlet-body form">

            

            

            <form action="<?php echo base_url().'index.php/member/add_member' ?>" class="form-horizontal form-bordered" method="post" >

                <div class="form-body">

                  <!--<div class="form-group">

                    <label class="control-label col-md-3">Member Type</label>

                    <div class="col-md-5">

                      <?php

						 $options = array(

							'1' => 'Individual',

							'2' => 'Student',

							'3' => 'Educational Institution',

							'4' => 'Instructional Facility /School',

							);

							

							echo form_dropdown('ind', $options, 'Computer Science Engineering', 'class="form-control"');

						?>

                        

                    </div>

                  </div>--> 

                  <div class="form-group">

                    <label class="control-label col-md-3">First Name</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'first_name', 'name' => 'first_name','class'=>'form-control','value' =>set_value('first_name'))); ?>

                      <?php echo form_error('first_name'); ?>

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Last Name</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'last_name', 'name' => 'last_name','class'=>'form-control','value' =>set_value('last_name'))); ?>

                      <?php echo form_error('last_name'); ?>

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Address</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'address', 'name' => 'address','class'=>'form-control','value' =>set_value('address'))); ?>

                      <?php echo form_error('address'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">City</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'city', 'name' => 'city','class'=>'form-control','value' =>set_value('city'))); ?>

                      <?php echo form_error('city'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">State</label>

                    <div class="col-md-5">

                     

                      <?php echo form_input(array('id' => 'state', 'name' => 'state','class'=>'form-control','value' =>set_value('state'))); ?>

                      <?php echo form_error('state'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Zip Code</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'zip_code', 'name' => 'zip_code','class'=>'form-control','value' =>set_value('zip_code'))); ?>

                      <?php echo form_error('zip_code'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Phone Number</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'phone_no', 'name' => 'phone_no','class'=>'form-control','maxlength'=>'10','value' =>set_value('phone_no'))); ?>

                      <?php echo form_error('phone_no'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Email Address</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'email', 'name' => 'email','class'=>'form-control','value' =>set_value('email'))); ?>

                      <?php echo form_error('email'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Text Number</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'text_no', 'name' => 'text_no','class'=>'form-control','value' =>set_value('text_no'))); ?>

                      <?php //echo form_error('text_no'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Website</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'website', 'name' => 'website','class'=>'form-control','value' =>set_value('website'))); ?>

                      <?php //echo form_error('website'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Domain Name</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'domain_name', 'name' => 'domain_name','class'=>'form-control','value' =>set_value('domain_name'))); ?>

                      <?php //echo form_error('domain_name'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Url</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'url', 'name' => 'url','class'=>'form-control','value' =>set_value('url'))); ?>

                      <?php //echo form_error('url'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">User Name</label>

                    <div class="col-md-5">

                      <?php echo form_input(array('id' => 'username', 'name' => 'username','class'=>'form-control','value' =>set_value('username'))); ?>

                      <?php echo form_error('username'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Member Type</label>

                    <div class="col-md-5">

                      <?php  echo "Individual ".form_checkbox('ind', 1, TRUE)."<br>"; ?>

                      <?php  echo "Student ".form_checkbox('std',1)."<br>";?>

                      <?php  echo "Educational Institution  ".form_checkbox('edu',1)."<br>"; ?>

                      <?php  echo "Instructional Facility / School ".form_checkbox('fac',1)."<br>";?>

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Password</label>

                    <div class="col-md-5">

                      <?php echo form_password(array('id' => 'password', 'name' => 'password','class'=>'form-control','value' =>set_value('password'))); ?>

                      <?php echo form_error('password'); ?>

                    </div>

                  </div>

                </div>

                <div class="form-actions">

                  <div class="row">

                    <div class="col-md-offset-3 col-md-9">

                      <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->

                      <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>

                      <button type="button" class="btn default">Cancel</button>

                    </div>

                  </div>

                </div>

              </form>

              <!-- BEGIN FORM-->

              <!-- END FORM-->

            </div>

          </div>

          <!-- END PORTLET-->

        </div>

      </div>

    </div>

    <!-- END CONTENT BODY -->

  </div>

  <!-- END CONTENT -->

  <!-- BEGIN QUICK SIDEBAR -->

  <!-- END QUICK SIDEBAR -->

</div>              
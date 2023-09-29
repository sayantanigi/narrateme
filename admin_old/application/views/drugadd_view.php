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

            <?php echo @$title; ?>

            </span> </li>

        </ul>

      </div>

      <!-- END PAGE BAR -->

      <div class="alert alert-success alert-dismissable" style="padding:10px;">

        <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>

        <?php //echo @$h1title;//echo $this->session->flashdata('success_msg');; ?>

		<?php 

        $last = end($this->uri->segments); 

        if($last=="rehabsuccess"){echo "Data Added Successfully ......";}

        if($last=="successdelete"){echo "Data Deleted Successfully ......";}

        ?>

      </div>

      <div class="row">

        <div class="col-md-12">

          <!-- BEGIN PORTLET-->

          <div class="portlet box blue-hoki">

            <div class="portlet-title">

              <div class="caption"> <i class="fa fa-reorder"></i>

               <?php echo isset($title) ? $title : 'Default Title' ; ?>

              </div>

              <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>

            </div>

            <div class="portlet-body form">

            

            

            <form action="<?php echo base_url().'index.php/individual/add_drug' ?>" class="form-horizontal form-bordered" method="post" >

                <div class="form-body">

                   

                  <div class="form-group">

                    <label class="control-label col-md-3">Name</label>

                    <div class="col-md-8">

                      <?php echo form_input(array('id' => 'name', 'name' => 'drug_name','class'=>'form-control')); ?>

                      <?php echo form_error('drug_name'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Date</label>

                    <div class="col-md-8">

                      <?php echo form_input(array('id' => 'drug_date', 'name' => 'drug_date','class'=>'form-control form-control-inline date-picker')); ?>

                      <?php echo form_error('drug_date'); ?>

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Outcome</label>

                    <div class="col-md-8">

                      <?php echo form_input(array('id' => 'outcome', 'name' => 'outcome','class'=>'form-control')); ?>

                      <?php echo form_error('outcome'); ?>

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Description</label>

                    <div class="col-md-8">

                      <?php echo form_textarea(array('id' => 'cms_pagedes', 'name' => 'reason','class'=>'form-control')); ?>

                    </div>

                  </div>

                </div>

                <div class="form-actions">

                  <div class="row">

                    <div class="col-md-offset-3 col-md-9">

                    <?php $ind_num = end($this->uri->segment_array());?>

                    <input type="hidden" name="ind_id" value="<?php echo $ind_num;?>" />

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

     
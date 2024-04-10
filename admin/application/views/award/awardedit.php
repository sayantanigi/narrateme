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
               <?php echo isset($title) ? $title : 'Default Title' ; ?>
              </div>
              <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
            </div>
            <div class="portlet-body form">
            
             <?php foreach($ecms as $i){?>
            <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url()?>index.php/studentaward/edit_award">
            <input type="hidden" class="form-control" id="id" value="<?php echo $i->id;?>" name="id">
                <div class="form-body">
                  <div class="form-group">
                    <label class="control-label col-md-3">Award Name</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="award_name" value="<?php echo $i->award_name;?>" name="award_name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Award Date</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control form-control-inline date-picker" id="award_date" value="<?php echo $i->award_date;?>" name="award_date">
                    </div>
                  </div>
                  
                   
                  <div class="form-group">
                    <label class="control-label col-md-3">Description</label>
                    <div class="col-md-5">
                      <textarea class="form-control" name="award_description" rows="6" id="cms_pagedes"><?php echo stripslashes($i->award_description);?></textarea>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3">Status</label>
                    <div class="col-md-5">
                      <select name="status">
                          <option value="1" <?php if($i->status==1){?> selected="selected"<?php }?>>Active</option>
                          <option value="0" <?php if($i->status==0){?> selected="selected"<?php }?>>Inactive</option>
                      </select>
                      
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                      <input type="submit" class="btn red" id="submit" value="Submit" name="update">
                      <button class="btn default" type="button">Cancel</button>
                    </div>
                  </div>
                </div>
              </form>
               <?php }?>
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
     
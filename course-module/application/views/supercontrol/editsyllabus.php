<?php //$this->load->view ('header');?>
<!-- BEGIN CONTAINER -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.datetimepicker.css"/>

<div class="page-container"> 
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper"> 
    <!-- BEGIN SIDEBAR --> 
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing --> 
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse"> 
      <!-- BEGIN SIDEBAR MENU --> 
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <?php $this->load->view ('supercontrol/leftbar');?>
      <!-- END SIDEBAR MENU --> 
      <!-- END SIDEBAR MENU --> 
    </div>
    <!-- END SIDEBAR --> 
  </div>
  <!-- END SIDEBAR --> 
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper"> 
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content"> 
      <!-- BEGIN PAGE HEADER--> 
      <!-- BEGIN THEME PANEL --> 
      
      <!-- END THEME PANEL --> 
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="<?php echo base_url(); ?>supercontrol/home">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>supercontrol panel</span> </li>
        </ul>
      </div>
      <!-- END PAGE BAR --> 
      <!-- BEGIN PAGE TITLE--> 
      <!-- END PAGE TITLE--> 
      <!-- END PAGE HEADER-->
      <div class="alert alert-success alert-dismissable" style="padding:10px;">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
        <strong>
        <?php 
				$last = end($this->uri->segments); 
				if($last=="success"){echo "Data Added Successfully ......";}
				if($last=="successdelete"){echo "Data Deleted Successfully ......";}
            ?>
            <?php if($this->session->flashdata('success')!=''){?><div class="alert alert-success text-center"><?php echo $this->session->flashdata('success');?></div><?php }?>
        </strong> </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-gift"></i>Add page</div>
                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                  </div>
                  <div class="portlet-body form"> 
                    <!-- BEGIN FORM-->
                    
                    <?php 
					if($slist!=''){
						foreach($slist as $ll){?>
                    		<form action="<?php echo base_url().'supercontrol/course/edit_syllabus'?>" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                      <div class="form-body">
                        
                        <div class="form-group">
                          <label class="control-label col-md-3">Syllabus Title</label>
                          <div class="col-md-8">  <input type="text" class="form-control" id="" name="syllabus_name" value="<?php echo $ll->syllabus_name;?>" name="syllabus_name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Syllabus Content</label>
                          <div class="col-md-8"> 
                          	<textarea class="form-control" name="syllabus_content" id="pagedes" rows="8" cols="16" id="cms_pagedes">
                            <?php echo $ll->syllabus_content;?>
                            </textarea>
                          </div>
                        </div>
                        
                       <!-- <div class="form-group">
                          <label class="control-label col-md-3">Syllabus Order</label>
                          <div class="col-md-8">  <input type="text" class="form-control" id="" value="<?php echo $ll->s_order;?>" name="s_order">
                          </div>
                        </div>-->
                        
                       <!-- <div class="form-group">
                          <label class="control-label col-md-3">Status</label>
                          <div class="col-md-8">
                          	<select name="status" class="form-control">
                            	<option value="1" <?php if($ll->status=='1'){?> selected="selected" <?php }?>>Active</option>
                                <option value="0" <?php if($ll->status=='0'){?> selected="selected" <?php }?>>Inactive</option>
                            </select>
                          </div>
                        </div>-->
                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9"> 
                            <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>--> 
                            <input type="hidden" name="syllabus_id" value="<?php echo $ll->syllabus_id;?>" />
                            <input type="hidden" name="course_id" value="<?php echo $ll->course_id;?>" />
                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                            <button type="button" class="btn default">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <?php }
					}
					?>
                    <!-- END FORM--> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END CONTENT BODY --> 
  </div>
  <!-- END CONTENT --> 
  <!-- BEGIN QUICK SIDEBAR --> 
  
  <!-- END QUICK SIDEBAR --> 
</div>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.datetimepicker.full.js"></script>
<script>
$.datetimepicker.setLocale('en');
$('#timepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});

$('#timepicker2').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});

$('#datetimepicker2').datetimepicker({
	format:'d-m-Y',
	timepicker:false,
	formatDate:'d-m-Y',
	minDate:'-2016/11/03', // yesterday is minimum date
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})
</script>
<!-- END CONTAINER -->
<?php //$this->load->view ('footer');?>

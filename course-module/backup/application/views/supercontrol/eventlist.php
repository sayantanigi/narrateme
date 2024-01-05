<style>
#sample_1_filter {
	padding: 8px;
	float: right;
}
#sample_1_length {
	padding: 8px;
}
#sample_1_info {
	padding: 8px;
}
#sample_1_paginate {
	float: right;
	padding: 8px;
}
</style>
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <?php $this->load->view ('supercontrol/leftbar');?>
      <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
  </div>
  <!-- END SIDEBAR -->
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="<?php echo base_url(); ?>user/dashboard">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>administrator Panel</span> <i class="fa fa-circle"></i> </li>
          <li> <span>Show CMS </span> </li>
        </ul>
      </div>
      <!-- END PAGE HEADER-->
      <?php if (isset($success_msg)) { echo $success_msg; } ?>
      <div class="row">
		<?php if($this->session->flashdata('success_add')!=''){?>
        	<div class="alert alert-success alert-dismissable" style="padding:10px;">
        		<button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
        		<strong> <?php echo $this->session->flashdata('success_add');?></strong>
        	</div>
        <?php }?>
		<?php if($this->session->flashdata('success_update')!=''){?>
            <div class="alert alert-success alert-dismissable" style="padding:10px;">
            	<button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
            	<strong> <?php echo $this->session->flashdata('success_update');?></strong>
            </div>
        <?php }?> 
		<?php if($this->session->flashdata('success_delete')!=''){?>
        	<div class="alert alert-success alert-dismissable" style="padding:10px;">
        		<button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
        		<strong> <?php echo $this->session->flashdata('success_delete');?></strong>
        	</div>
        <?php }?>    
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-gift"></i>Show CMS</div>
                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                  </div>
                  <div class="portlet-body form" style="padding:5px;">
                    <!-- BEGIN FORM-->
                    <table class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                      <thead>
                        <tr>
                          <th width="10" style="max-width:200px;">Sl No.</th>
                          <!--<th width="10" style="max-width:200px;">Image</th>-->
                          <th class="hidden-480">Event Name</th>
                          <th class="hidden-480">Location</th>
                          <th class="hidden-480">Start Date</th>
                          <th class="hidden-480">End Date</th>
                          <th class="hidden-480">Start Time</th>
                          <th class="hidden-480">End Time</th>
                          <th class="hidden-480">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
				  			$c=1;
							if(is_array($event)){
                			foreach(@$event as $i){
                		?>
                        <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                          <td class="hidden-480" style="max-width:200px;"><?php echo $c;?></td>
                          <!--<td  class="hidden-480">
						  	<?php if($i->event_image==""){?>
                            	No Image
                            <?php }else{?>
                            	<img src="<?php echo base_url()?>/uploads/event/<?php echo $i->event_image;?>" width="100" height="100" style="border: 2px solid #ddd;"/>
                            <?php }?>
                          </td>-->
                          <td  class="hidden-480"><?php echo $i->event_name;?></td>
                          <td  class="hidden-480"><?=substr($i->location,0,50)?></td>
                          <td  class="hidden-480"><?php echo date('d-M-Y',strtotime($i->start_date_time));?></td>
                          <td  class="hidden-480"><?php echo date('d-M-Y',strtotime($i->end_date_time));?></td>
                          <td  class="hidden-480"><?php echo date('H:i:a',strtotime($i->start_date_time));?></td>
                          <td  class="hidden-480"><?php echo date('H:i:a',strtotime($i->end_date_time));?></td>
                          <td class="hidden-480"><a style="margin:3px;" class="btn green btn-sm btn-outline sbold uppercase" href="<?php echo base_url()?>supercontrol/event/show_event_id/<?php echo $i->event_id; ?>">Edit</a><br>
                          <a style="margin:3px;" onclick="return confirm('Are you sure you want to delete this Event?');" class="btn red btn-sm btn-outline sbold uppercase" href="<?php echo base_url()?>supercontrol/event/delete_event/<?php echo $i->event_id; ?>">Delete</a><br>
                          </td>
                          
                        </tr>
                        <?php $c++; }}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php //$this->load->view ('header');?>
<!-- BEGIN CONTAINER -->
<link href="<?php echo base_url(); ?>css/datepicker.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,300,500&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/highlight.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker.en.js"></script>
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
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
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="index.html">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>administrator Panel</span> </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-gift"></i>Event Edit</div>
                  </div>
                  <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <?php foreach($eevent as $i){?>
                    <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url()?>supercontrol/event/edit_event" enctype="multipart/form-data">
                      <div class="form-body">
                        <input type="hidden" name="event_id" value="<?=$i->event_id;?>">
                        <input type="hidden" name="event_image" value="<?php echo $i->event_image;?>">
                        <!--<div class="form-group last">
                          <label class="control-label col-md-3">Image</label>
                          <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <?php if($i->event_image==''){ ?>
                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                <?php }else{?>
                                <img src="<?php echo base_url()?>/uploads/event/<?php echo $i->event_image;?>" alt="" />
                                <?php }?>
                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                              <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select image </span> <span class="fileinput-exists"> Change </span>
                                <?php
                                                            $file = array('type' => 'file','name' => 'userfile','onchange' => 'readURL(this);');
                                                            echo form_input($file);
                                                            ?>
                                </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>
                            </div>
                            <div class="clearfix margin-top-10"> <span class="label label-danger">Format</span> jpg, jpeg, png, gif </div>
                          </div>
                        </div>-->
                        <div class="form-group">
                          <label class="control-label col-md-3">Event Name</label>
                          <div class="col-md-5">
                            <input type="text" class="form-control" id="event_name" value="<?php echo $i->event_name;?>" name="event_name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Start Date Time</label>
                          <div class="col-md-5">
                            <input type="text" class="datepicker-here form-control" id="start_date_time" data-language="en" data-timepicker='true' value="<?php echo $i->start_date_time;?>" name="start_date_time">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">End Date Time</label>
                          <div class="col-md-5">
                            <input type="text" class="datepicker-here form-control" id="end_date_time" data-language="en" data-timepicker='true' value="<?php echo $i->end_date_time;?>" name="end_date_time">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Location</label>
                          <div class="col-md-8">
                            <textarea rows="10" cols="10" name="location" id="pagedes2" class="form-control"><?php echo $i->location;?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Status</label>
                          <div class="col-md-5">
                            <select name="status" class="form-control">
                              <option value="1" <?php if($i->status==1){?> selected="selected" <?php }?>>Active</option>
                              <option value="0" <?php if($i->status==0){?> selected="selected" <?php }?>>Inactive</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Description</label>
                          <div class="col-md-8">
                            <textarea rows="10" cols="10" id="pagedes" name="event_description"><?php echo $i->event_description;?></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                            <input type="submit" class="btn red" id="submit" value="Submit" name="update">
                            <button class="btn default" type="button">Cancel</button>
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
        </div>
      </div>
    </div>
  </div>
</div>

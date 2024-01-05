<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript">
$(function() {
setTimeout(function() { $("#testdiv").fadeOut(1500); }, 5000)
$('#btnclick').click(function() {
$('#testdiv').show();
setTimeout(function() { $("#testdiv").fadeOut(1500); }, 5000)
})
})
</script>
<style type="text/css">
.datepicker .active {
	background-color: #fff !important;
}
.datepicker {
	color: #333;
}
.datepicker .active:hover {
	background-color: #fff !important;
}
.datepicker--day-name {
	color: #67809f!important;
	font-weight: 600!important;
}
</style>
<link href="<?php echo base_url(); ?>css/datepicker.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,300,500&amp;subset=latin,cyrillic" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.9.1/highlight.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker.js"></script>
<script src="<?php echo base_url(); ?>js/datepicker.en.js"></script>
<div class="page-container">
  <div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
      <?php $this->load->view ('supercontrol/leftbar');?>
    </div>
  </div>
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>Administrator panel</span> </li>
        </ul>
      </div>
      <?php if (isset($success_msg)) { echo $success_msg; } ?>
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-gift"></i>Add Events</div>
                  </div>
                  <div class="portlet-body form">
                    <form action="<?php echo base_url().'supercontrol/event/add_event' ?>" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                      <div class="form-body">
                        <!--<div class="form-group last">
                          <label class="control-label col-md-3">Event Image</label>
                          <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                              <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select image </span> <span class="fileinput-exists"> Change </span>
								<?php
                                $file = array('id' => 'event', 'type' => 'file','name' => 'userfile', 'onchange' => 'readURL(this);' );
                                echo form_input($file);
                                ?>
                                </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>
                            </div>
                            <div class="clearfix margin-top-10"> <span class="label label-danger">Format</span> jpg, jpeg, png, gif </div>
                          </div>
                        </div>-->
                        <div class="form-group">
                          <label class="control-label col-md-3">Event Name</label>
                          <div class="col-md-8"> <?php echo form_input(array('id' => 'event_name', 'name' => 'event_name','class'=>'form-control' )); ?> <?php echo form_error('event_name'); ?> </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Start Date Time</label>
                          <div class="col-md-8"> <?php echo form_input(array('id' => 'start_date_time', 'placeholder'=>'10 AM', 'data-language'=>'en', 'name' => 'start_date_time', 'data-timepicker'=>'true','class'=>'datepicker-here form-control' )); ?> <?php echo form_error('start_date_time'); ?> </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">End Date Time</label>
                          <div class="col-md-8"> <?php echo form_input(array('id' => 'end_date_time', 'placeholder'=>'10 AM', 'data-language'=>'en', 'name' => 'end_date_time', 'data-timepicker'=>'true','class'=>'datepicker-here form-control' )); ?> <?php echo form_error('end_date_time'); ?> </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Location</label>
                          <div class="col-md-8">
                            <textarea rows="10" cols="10" name="location" id="pagedes2" class="form-control"></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-md-3">Event Description</label>
                          <div class="col-md-8"> <?php echo form_textarea(array('id' => 'pagedes', 'name' => 'event_description','class'=>'form-control')); ?> </div>
                        </div>
                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9"> <?php echo form_submit(array('id' => 'submit', 'name' => 'Submit' , 'value' => 'Submit' ,'class'=>'btn red')); ?>
                            <button type="button" class="btn default">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <script>
						$('INPUT[type="file"]').change(function () {
							var ext = this.value.match(/\.(.+)$/)[1];
							switch (ext) {
								case 'jpg':
								case 'jpeg':
								case 'png':
								case 'gif':
								$('#banner').attr('disabled', false);
								break;
								default:
								alert('This is not an allowed file type.');
								this.value = '';
							}
						});
						
            	 </script>
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
<!-- END CONTAINER -->
<?php //$this->load->view ('footer');?>

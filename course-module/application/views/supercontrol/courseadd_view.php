<?php //$this->load->view ('header');?>
<style type="text/css">
label {
  width: 125px;
  display: block;
  float: left;
}
label input {
  display: none;
}
label span {
  display: block;
  width: 17px;
  height: 17px;
  border: 1px solid black;
  float: left;
  margin: 0 5px 0 0;
  position: relative;
}
label.active span:after {
  content: " ";
  position: absolute;
  left: 3px;
  right: 3px;
  top: 3px;
  bottom: 3px;
  background: black;
}
.topul li {
  list-style-type:none;

}
</style>
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
          <li> <a href="<?php echo base_url(); ?>supercontrol/user/dashboard">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>Admin panel</span> </li>
        </ul>
      </div>
      <div class="alert alert-success alert-dismissable" style="padding:10px;">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
        <strong>
          <?php 
          if(@$success_msg!=''){echo @$success_msg;}
          $last = end($this->uri->segments); 
          if($last=="success"){echo "course Added Successfully ......";}
          if($last=="successdelete"){echo "course Deleted Successfully ......";}
          ?>
        </strong> </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tabbable-line boxless tabbable-reversed">
              <div class="tab-content">
                <div class="tab-pane active" id="tab_0">
                  <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                      <div class="caption"> <i class="fa fa-gift"></i>Add course</div>
                      <div class="tools"> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                    </div>
                    <div class="portlet-body form"> 
                      <!-- BEGIN FORM-->
                      <form action="<?php echo base_url().'supercontrol/course/add_my_course'?>" class="form-horizontal" method="post" enctype="multipart/form-data" onsubmit="check()">
                        <div class="form-body">
                            
                            
                            <div class="form-group">
                          <label class="control-label col-md-3">Course Image</label>
                          <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                              <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select image </span> <span class="fileinput-exists"> Change </span>
                                <?php
                                $file = array('type' => 'file','name' => 'userfile', 'onchange' => 'readURL(this);' );
                                echo form_input($file);
                                ?>
                                </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>
                            </div>
                            <div class="clearfix margin-top-10"> <span class="label label-danger">Format</span> jpg, jpeg, png, gif </div>
                          </div>
                        </div>
                            
                          <div class="form-group"> <b>
                            <label class="col-md-3 control-label">Select Category *</label>
                          </b>
                          <div class="col-md-8"> 
                            <select name="course_category" class="form-control">
                              <?php foreach($allcat as $ac){?>
                              <option value="<?php echo $ac->category_id?>"><?php echo $ac->category_name?></option>
                              <?php }?>
                            </select>
                            <label id="errorBox"></label>
                          </div>
                        </div>
                        <div class="form-group"> <b>
                          <label class="col-md-3 control-label">Course Name *</label>
                        </b>
                        <div class="col-md-8">
                          <input type="text" name="course_name" required="" id="title" class="form-control" placeholder="Course Name" onkeyup= "leftTrim(this)"/>
                          <label id="errorBox"></label>
                        </div>
                      </div>

                      <div class="form-group"> <b>
                        <label class="col-md-3 control-label">Price *</label>
                      </b>
                      <div class="col-md-8">
                        <input type="text" name="price" required="" id="price" class="form-control" placeholder="Price" onkeyup= "leftTrim(this)"/>
                        <label id="errorprice"></label>
                      </div>
                    </div>
                    <div class="form-group"> <b>
                          <label class="col-md-3 control-label">Course Type *</label>
                        </b>
                        <div class="col-md-8">
                         <select name="course_type" class="form-control">
                              <option value="Upcoming Courses">Upcoming Courses</option>
                              <option value="Coming Soon courses">Coming Soon courses</option>
                            </select>
                        </div>
                      </div>
                  <div class="form-group"> <b>
                          <label class="col-md-3 control-label">Course Certificate *</label>
                        </b>
                        <div class="col-md-8">
                         <select name="certificate" class="form-control">
                              <option value="Certificate of Completion">Certificate of Completion</option>
                              <option value="Certificate of Attendance">Certificate of Attendance</option>
                              <option value="BOTH">BOTH</option>
                            </select>
                        </div>
                      </div>
                  <div class="form-group"> <b>
                      <label class="col-md-3 control-label">Entry Requirement</label>
                    </b>
                    <div class="col-md-8">
                      <input type="text" required="" name="entry_requirment" id="entry_requirment" class="form-control" placeholder="Entry Requirement Details"/>
                      
                    </div>
                  </div>
                  <div class="form-group"> <b>
                      <label class="col-md-3 control-label">Who should Attend</label>
                    </b>
                    <div class="col-md-8">
                      <input type="text" required="" name="who_should_apply" id="who_should_apply" class="form-control" placeholder="Entry Requirement Details"/>
                      
                    </div>
                  </div>
               

                                    <div class="form-group">
                                       <b>
                                       <label class="col-md-3 control-label">Start Date *</label>
                                       </b>
                                       <div class="col-md-8">
                                          <input type="date" class="form-control" id="datetimepicker2" value="" name="start_date" required="required">
                                          <label id="errorBox"></label>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <b>
                                       <label class="col-md-3 control-label">End Date *</label>
                                       </b>
                                       <div class="col-md-8">
                                          <input type="date" name="end_date" required="" id="datetimepicker2e" class="form-control"/>
                                          <label id="errorBox"></label>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group">
                                       <b>
                                       <label class="col-md-3 control-label">Course Mode *</label>
                                       </b>
                                       <div class="col-md-8">
                                          <select name="course_mode" class="form-control">
                                            <option>-- Select Mode --</option>
                                              <?php //print_r($modes);die;
                                              if(is_array($modes) && count($modes)>0){
                                                    foreach($modes as $mo){
                                               ?>
                                              <option value="<?=$mo->id?>"><?=$mo->mode_title?></option>
                                              <?php }} ?>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <b>
                                       <label class="col-md-3 control-label">Course Level *</label>
                                       </b>
                                       <div class="col-md-8">
                                          <select name="course_level" class="form-control">
                                            <option>-- Select Level --</option>
                                              <?php if(is_array($levels) && count($levels)>0){
                                                    foreach($levels as $lv){
                                               ?>
                                              <option value="<?=$lv->id?>"><?=$lv->level_title?></option>
                                              <?php }} ?>
                              
                            
                                          </select>
                                       </div>
                                    </div>
  <div class="form-group"> <b>
    <label class="col-md-3 control-label">Description</label>
    </b>
    <div class="col-md-8">
    <textarea id="pagedes" class="form-control" name="course_description" cols="60" rows="10"  aria-hidden="true"></textarea>
    </div>
  </div>
 <!--  <div class="form-group">
    <label class="col-md-3 control-label"><b>Shift Details *
    </b></label>
    <div class="form-group col-md-2">
      <label for="inputEmail4">Start Time</label>
      <input type="time" name="start_time" class="form-control" id="start_time" placeholder="Email">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">End Time</label>
      <input type="time" name="end_time" class="form-control" id="end_time" placeholder="Password">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Day</label>
      <input type="text" name="day" class="form-control" id="day" placeholder="Password">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Shift Time</label>
      <input type="text" name="shift" class="form-control" id="shift" placeholder="Password">
    </div>
    <div class="form-group col-md-1" style="margin-top: 24px;">
      <button type="button" class="mtr-btn btn btn-primary" onclick="education_fields();"><span>Add More</span></button>
    </div>
  </div> -->
  <div class="clearfix"></div>
 <div id="education_fields"></div>
 <div id="startdate"></div>
</div>
<div class="form-actions">
  <div class="row">
    <div class="col-md-offset-3 col-md-9">
      <input type="submit" id="submit" value="Submit" class="btn red">
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
</div>
</div>
</div>
</div>
</div>

<style>
#errorBox{
  color:#F00;
}
</style>
<script src="<?php echo base_url(); ?>js/jquery.datetimepicker.full.js"></script>
<script>
   $.datetimepicker.setLocale('en');
   
   $('#datetimepicker_format').datetimepicker({value:'2015-04-15 05:03', format: $("#datetimepicker_format_value").val()});
   console.log($('#datetimepicker_format').datetimepicker('getValue'));
   
   $("#datetimepicker_format_change").on("click", function(e){
    $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
   });
   $("#datetimepicker_format_locale").on("change", function(e){
    $.datetimepicker.setLocale($(e.currentTarget).val());
   });
   
   $('#datetimepicker').datetimepicker({
    format:'d-m-Y H:i',
    dayOfWeekStart : 1,
    lang:'en',
    disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
    startDate:  '1986/01/05'
   });
   $('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});
   
   
   
   $('#datetimepicker19').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
    disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
    startDate:  '1986/01/05'
   });
   $('#datetimepicker19').datetimepicker({value:'2015/04/15 05:03',step:10});
   
   
   $('.some_class').datetimepicker();
   
   $('#default_datetimepicker').datetimepicker({
    formatTime:'H:i',
    formatDate:'d.m.Y',
    //defaultDate:'8.12.1986', // it's my birthday
    defaultDate:'+03.01.1970', // it's my birthday
    defaultTime:'10:00',
    timepickerScrollbar:false
   });
   
   $('#datetimepicker10').datetimepicker({
    step:5,
    inline:true
   });
   $('#datetimepicker_mask').datetimepicker({
    mask:'9999/19/39 29:59'
   });
   
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
    minDate:'-2016/11/03', 
   });
   $('#datetimepicker2e').datetimepicker({
    format:'d-m-Y',
    timepicker:false,
    formatDate:'d-m-Y',
    minDate:'-2016/11/03', 
   });
   $('#datetimepicker3').datetimepicker({
    inline:true
   });
   $('#datetimepicker4').datetimepicker();
   $('#open').click(function(){
    $('#datetimepicker4').datetimepicker('show');
   });
   $('#close').click(function(){
    $('#datetimepicker4').datetimepicker('hide');
   });
   $('#reset').click(function(){
    $('#datetimepicker4').datetimepicker('reset');
   });
   $('#datetimepicker5').datetimepicker({
    datepicker:false,
    allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
    step:5
   });
   $('#datetimepicker6').datetimepicker();
   $('#destroy').click(function(){
    if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
     $('#datetimepicker6').datetimepicker('destroy');
     this.value = 'create';
   }else{
     $('#datetimepicker6').datetimepicker();
     this.value = 'destroy';
   }
   });
   var logic = function( currentDateTime ){
    if (currentDateTime && currentDateTime.getDay() == 6){
     this.setOptions({
      minTime:'11:00'
   });
   }else
   this.setOptions({
     minTime:'8:00'
   });
   };
   $('#datetimepicker7').datetimepicker({
    onChangeDateTime:logic,
    onShow:logic
   });
   $('#datetimepicker8').datetimepicker({
    onGenerate:function( ct ){
     $(this).find('.xdsoft_date')
     .toggleClass('xdsoft_disabled');
   },
   minDate:'-1970/01/2',
   maxDate:'+1970/01/2',
   timepicker:false
   });
   $('#datetimepicker9').datetimepicker({
    onGenerate:function( ct ){
     $(this).find('.xdsoft_date.xdsoft_weekend')
     .addClass('xdsoft_disabled');
   },
   weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
   timepicker:false
   });
   var dateToDisable = new Date();
   dateToDisable.setDate(dateToDisable.getDate() + 2);
   $('#datetimepicker11').datetimepicker({
    beforeShowDay: function(date) {
     if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
      return [false, ""]
   }
   
   return [true, ""];
   }
   });
   $('#datetimepicker12').datetimepicker({
    beforeShowDay: function(date) {
     if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
      return [true, "custom-date-style"];
   }
   
   return [true, ""];
   }
   });
   $('#datetimepicker_dark').datetimepicker({theme:'dark'})
   
</script>
<script>

   $(document).ready(function() {
      $('#total_session').on("focusout",function(){
         var val = $(this).val();
         var html = '';
         for(var i=1; i<=val; i++){
            var html = '<div class="form-group"><b><label class="col-md-3 control-label">Session'+i+' Date *</label></b><div class="col-md-8"><input type="date" name="date[]" id="timepicker1"  class="form-control" /><label id="errorBox"></label></div></div><div class="form-group"><b><label class="col-md-3 control-label">Session'+i+' Start Time *</label></b><div class="col-md-8"><input type="time" name="startTime[]" id="timepicker1"  class="form-control" /><label id="errorBox"></label></div></div><div class="form-group"><b><label class="col-md-3 control-label">Session'+i+' End Time *</label></b><div class="col-md-8"><input type="time" name="endTime[]" id="timepicker1"  class="form-control" /><label id="errorBox"></label></div></div>';
         $('#startdate').append(html);
         }
         console.log(html);
      });
   });
   
</script>

<?php //$this->load->view ('footer');?>

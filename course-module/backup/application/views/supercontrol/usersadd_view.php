<?php //$this->load->view ('header');?>
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
<div class="page-container">
  <div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
      <?php $this->load->view ('supercontrol/leftbar');?>
    </div>
  </div>
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb"> <li> <a href="<?php echo base_url(); ?>supercontrol/home">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>supercontrol panel</span> </li>
        </ul>
      </div>
      <div class="alert alert-success alert-dismissable" style="padding:10px;">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
        <strong>
        <?php 
				$last = end($this->uri->segments); 
				if($last=="success"){echo "Data Added Successfully ......";}
				if($last=="successdelete"){echo "Data Deleted Successfully ......";}
            ?>
        </strong> </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-gift"></i>Add users</div>
                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                  </div>
                  <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form action="<?php echo base_url().'supercontrol/users/add_users' ?>" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                    <div class="form-body">
                    
                        <div class="form-group last">
                        <label class="control-label col-md-3">User Image</label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                           
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                  
                                    </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                    <span class="btn default btn-file">
                                        <span class="fileinput-new"> Select image </span>
                                        <span class="fileinput-exists"> Change </span>
                                        <!--<input type="file" name="...">-->
											<?php
                                            $file = array('type' => 'file','name' => 'userfile' ,'id' => 'chkimg' ,'onchange' => 'readURL(this);');
                                            echo form_input($file);
                                            ?>
                                    </span>
                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                </div>
                            </div>
                            <div class="clearfix margin-top-10">
                                <span class="label label-danger">Format</span> jpg, jpeg, png, gif </div>
                        </div>
                        </div>
                        
                        
                    <div class="form-group">
                    <label class="control-label col-md-3"> First Name</label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'first_name', 'name' => 'first_name','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    <?php echo form_error('first_name'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Last Name</label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'last_name', 'name' => 'last_name','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    <?php echo form_error('last_name'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Email</label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'email', 'type' => 'email', 'name' => 'email','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    <?php echo form_error('email'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Password </label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'password', 'type' => 'password', 'name' => 'password','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    <?php echo form_error('password'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Confirm Password </label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'conpassword', 'type' => 'password', 'name' => 'conpassword','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    <?php echo form_error('conpassword'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Phone</label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'phone', 'type' => 'text', 'name' => 'phone','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    <?php echo form_error('phone'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <b><label class="control-label col-md-3"> Time Zone</label></b>
                    <div class="col-md-8">
                    <select id="time_zone" name="time_zone" class="form-control">
                    <option value="">Select</option>
                    <option value="Perth">(GMT+08:00) Perth</option>
                    <option value="Adelaide">(GMT+09:30) Adelaide</option>
                    <option value="Darwin">(GMT+09:30) Darwin</option>
                    <option value="Brisbane">(GMT+10:00) Brisbane</option>
                    <option value="Canberra">(GMT+10:00) Canberra</option>
                    <option value="Hobart">(GMT+10:00) Hobart</option>
                    <option value="Melbourne">(GMT+10:00) Melbourne</option>
                    <option value="Sydney">(GMT+10:00) Sydney</option>
                    <option value="American Samoa">(GMT-11:00) American Samoa</option>
                    <option value="International Date Line West">(GMT-11:00) International Date Line West</option>
                    <option value="Midway Island">(GMT-11:00) Midway Island</option>
                    <option value="Samoa">(GMT-11:00) Samoa</option>
                    <option value="Hawaii">(GMT-10:00) Hawaii</option>
                    <option value="Alaska">(GMT-09:00) Alaska</option>
                    <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                    <option value="Tijuana">(GMT-08:00) Tijuana</option>
                    <option value="Arizona">(GMT-07:00) Arizona</option>
                    <option value="Chihuahua">(GMT-07:00) Chihuahua</option>
                    <option value="Mazatlan">(GMT-07:00) Mazatlan</option>
                    <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                    <option value="Central America">(GMT-06:00) Central America</option>
                    <option value="Central Time (US &amp; Canada)">(GMT-06:00) Central Time (US &amp; Canada)</option>
                    <option value="Guadalajara">(GMT-06:00) Guadalajara</option>
                    <option value="Mexico City">(GMT-06:00) Mexico City</option>
                    <option value="Monterrey">(GMT-06:00) Monterrey</option>
                    <option value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
                    <option value="Bogota">(GMT-05:00) Bogota</option>
                    <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                    <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                    <option value="Lima">(GMT-05:00) Lima</option>
                    <option value="Quito">(GMT-05:00) Quito</option>
                    <option value="Atlantic Time (Canada)">(GMT-04:00) Atlantic Time (Canada)</option>
                    <option value="Caracas">(GMT-04:00) Caracas</option>
                    <option value="Georgetown">(GMT-04:00) Georgetown</option>
                    <option value="La Paz">(GMT-04:00) La Paz</option>
                    <option value="Santiago">(GMT-04:00) Santiago</option>
                    <option value="Newfoundland">(GMT-03:30) Newfoundland</option>
                    <option value="Brasilia">(GMT-03:00) Brasilia</option>
                    <option value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
                    <option value="Greenland">(GMT-03:00) Greenland</option>
                    <option value="Montevideo">(GMT-03:00) Montevideo</option>
                    <option value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
                    <option value="Azores">(GMT-01:00) Azores</option>
                    <option value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
                    <option value="Casablanca">(GMT+00:00) Casablanca</option>
                    <option value="Dublin">(GMT+00:00) Dublin</option>
                    <option value="Edinburgh">(GMT+00:00) Edinburgh</option>
                    <option value="Lisbon">(GMT+00:00) Lisbon</option>
                    <option value="London">(GMT+00:00) London</option>
                    <option value="Monrovia">(GMT+00:00) Monrovia</option>
                    <option value="UTC">(GMT+00:00) UTC</option>
                    <option value="Amsterdam">(GMT+01:00) Amsterdam</option>
                    <option value="Belgrade">(GMT+01:00) Belgrade</option>
                    <option value="Berlin">(GMT+01:00) Berlin</option>
                    <option value="Bern">(GMT+01:00) Bern</option>
                    <option value="Bratislava">(GMT+01:00) Bratislava</option>
                    <option value="Brussels">(GMT+01:00) Brussels</option>
                    <option value="Budapest">(GMT+01:00) Budapest</option>
                    <option value="Copenhagen">(GMT+01:00) Copenhagen</option>
                    <option value="Ljubljana">(GMT+01:00) Ljubljana</option>
                    <option value="Madrid">(GMT+01:00) Madrid</option>
                    <option value="Paris">(GMT+01:00) Paris</option>
                    <option value="Prague">(GMT+01:00) Prague</option>
                    <option value="Rome">(GMT+01:00) Rome</option>
                    <option value="Sarajevo">(GMT+01:00) Sarajevo</option>
                    <option value="Skopje">(GMT+01:00) Skopje</option>
                    <option value="Stockholm">(GMT+01:00) Stockholm</option>
                    <option value="Vienna">(GMT+01:00) Vienna</option>
                    <option value="Warsaw">(GMT+01:00) Warsaw</option>
                    <option value="West Central Africa">(GMT+01:00) West Central Africa</option>
                    <option value="Zagreb">(GMT+01:00) Zagreb</option>
                    <option value="Athens">(GMT+02:00) Athens</option>
                    <option value="Bucharest">(GMT+02:00) Bucharest</option>
                    <option value="Cairo">(GMT+02:00) Cairo</option>
                    <option value="Harare">(GMT+02:00) Harare</option>
                    <option value="Helsinki">(GMT+02:00) Helsinki</option>
                    <option value="Jerusalem">(GMT+02:00) Jerusalem</option>
                    <option value="Kaliningrad">(GMT+02:00) Kaliningrad</option>
                    <option value="Kyiv">(GMT+02:00) Kyiv</option>
                    <option value="Pretoria">(GMT+02:00) Pretoria</option>
                    <option value="Riga">(GMT+02:00) Riga</option>
                    <option value="Sofia">(GMT+02:00) Sofia</option>
                    <option value="Tallinn">(GMT+02:00) Tallinn</option>
                    <option value="Vilnius">(GMT+02:00) Vilnius</option>
                    <option value="Baghdad">(GMT+03:00) Baghdad</option>
                    <option value="Istanbul">(GMT+03:00) Istanbul</option>
                    <option value="Kuwait">(GMT+03:00) Kuwait</option>
                    <option value="Minsk">(GMT+03:00) Minsk</option>
                    <option value="Moscow">(GMT+03:00) Moscow</option>
                    <option value="Nairobi">(GMT+03:00) Nairobi</option>
                    <option value="Riyadh">(GMT+03:00) Riyadh</option>
                    <option value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
                    <option value="Volgograd">(GMT+03:00) Volgograd</option>
                    <option value="Tehran">(GMT+03:30) Tehran</option>
                    <option value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                    <option value="Baku">(GMT+04:00) Baku</option>
                    <option value="Muscat">(GMT+04:00) Muscat</option>
                    <option value="Samara">(GMT+04:00) Samara</option>
                    <option value="Tbilisi">(GMT+04:00) Tbilisi</option>
                    <option value="Yerevan">(GMT+04:00) Yerevan</option>
                    <option value="Kabul">(GMT+04:30) Kabul</option>
                    <option value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
                    <option value="Islamabad">(GMT+05:00) Islamabad</option>
                    <option value="Karachi">(GMT+05:00) Karachi</option>
                    <option value="Tashkent">(GMT+05:00) Tashkent</option>
                    <option value="Chennai">(GMT+05:30) Chennai</option>
                    <option value="Kolkata">(GMT+05:30) Kolkata</option>
                    <option value="Mumbai">(GMT+05:30) Mumbai</option>
                    <option value="New Delhi">(GMT+05:30) New Delhi</option>
                    <option value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
                    <option value="Kathmandu">(GMT+05:45) Kathmandu</option>
                    <option value="Almaty">(GMT+06:00) Almaty</option>
                    <option value="Astana">(GMT+06:00) Astana</option>
                    <option value="Dhaka">(GMT+06:00) Dhaka</option>
                    <option value="Urumqi">(GMT+06:00) Urumqi</option>
                    <option value="Rangoon">(GMT+06:30) Rangoon</option>
                    <option value="Bangkok">(GMT+07:00) Bangkok</option>
                    <option value="Hanoi">(GMT+07:00) Hanoi</option>
                    <option value="Jakarta">(GMT+07:00) Jakarta</option>
                    <option value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                    <option value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
                    <option value="Beijing">(GMT+08:00) Beijing</option>
                    <option value="Chongqing">(GMT+08:00) Chongqing</option>
                    <option value="Hong Kong">(GMT+08:00) Hong Kong</option>
                    <option value="Irkutsk">(GMT+08:00) Irkutsk</option>
                    <option value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
                    <option value="Singapore">(GMT+08:00) Singapore</option>
                    <option value="Taipei">(GMT+08:00) Taipei</option>
                    <option value="Ulaanbaatar">(GMT+08:00) Ulaanbaatar</option>
                    <option value="Osaka">(GMT+09:00) Osaka</option>
                    <option value="Sapporo">(GMT+09:00) Sapporo</option>
                    <option value="Seoul">(GMT+09:00) Seoul</option>
                    <option value="Tokyo">(GMT+09:00) Tokyo</option>
                    <option value="Yakutsk">(GMT+09:00) Yakutsk</option>
                    <option value="Guam">(GMT+10:00) Guam</option>
                    <option value="Port Moresby">(GMT+10:00) Port Moresby</option>
                    <option value="Vladivostok">(GMT+10:00) Vladivostok</option>
                    <option value="Magadan">(GMT+11:00) Magadan</option>
                    <option value="New Caledonia">(GMT+11:00) New Caledonia</option>
                    <option value="Solomon Is.">(GMT+11:00) Solomon Is.</option>
                    <option value="Srednekolymsk">(GMT+11:00) Srednekolymsk</option>
                    <option value="Auckland">(GMT+12:00) Auckland</option>
                    <option value="Fiji">(GMT+12:00) Fiji</option>
                    <option value="Kamchatka">(GMT+12:00) Kamchatka</option>
                    <option value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
                    <option value="Wellington">(GMT+12:00) Wellington</option>
                    <option value="Chatham Is.">(GMT+12:45) Chatham Is.</option>
                    <option value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
                    <option value="Tokelau Is.">(GMT+13:00) Tokelau Is.</option>
                    </select>
                    <?php echo form_error('time_zone'); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <b> <label class="col-md-3 control-label"> Country </label> </b>
                    <div class="col-md-8">
                    <select name="country" id="" class="form-control" >
                    <option value="">Select a Country</option>
                    <?php foreach($cntry as $cn){ ?>
					<option value="<?php echo $cn->phonecode; ?>"><?php echo $cn->nicename; ?></option>
                    <?php }?>
                    </select>
                    <?php echo form_error('country'); ?>
                    </div>
                    </div>
                    <!--Checkbox Check-->
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Main User Type </label>
                    <div class="col-md-4"> <label style="display:inline-block;"><?php echo form_input(array('id' => 'radio', 'type' => 'radio', 'name' => 'user_type_main','class'=>'form-control', 'checked'=>'checked', 'value'=>'1')); ?> Normal User</label>
                    </div>
                    
                    <div class="col-md-4"><label style="display:inline-block;"><?php echo form_input(array('id' => 'radio1', 'type' => 'radio', 'name' => 'user_type_main','class'=>'form-control', 'value'=>'2')); ?> Exco User </label>
                    </div>
                    </div>
                    
                    <div id="a">
                    
                    <div class="form-group">
                    <b> <label class="col-md-3 control-label"> User Type </label> </b>
                    <div class="col-md-8">
                    <select name="user_type_sub" id="subtype" class="form-control" >
                    <option value="individual">I am an Individual</option>
					<option value="business">I am a Business</option>
                    </select>
                    </div>
                    </div>
                    
                    <!--Business Fields-->
                    <div id="bsns">
                    <!--Business Fields-->
                    <div class="form-group">
                    <label class="control-label col-md-3">Home Phone</label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'home_phone', 'type' => 'text', 'name' => 'home_phone','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <b> <label class="col-md-3 control-label"> Phone Preference </label> </b>
                    <div class="col-md-8">
                    <select name="phone_pref" id="" class="form-control" >
                    <option value="mobilephone">Mobile Phone</option>
					<option value="homephone">Home Phone</option>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Business Name </label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'business_name', 'type' => 'text', 'name' => 'business_name','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Billing Email </label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'billing_email', 'type' => 'text', 'name' => 'billing_email','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Default Message </label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'default_message', 'type' => 'text', 'name' => 'default_message','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    </div>
                    </div>
                    <!--Business Fields-->
                    </div>
                    <!--Business Fields-->
                    </div>
                    
                    <div id="b" style="display:none;">
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Home Address </label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'address', 'type' => 'text', 'name' => 'address','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    </div>
                    </div>
                    
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> ABN or ACN </label>
                    <div class="col-md-8"> <?php echo form_input(array('id' => 'abn_acn_num', 'type' => 'text', 'name' => 'abn_acn_num','class'=>'form-control' , 'onkeyup'=> 'leftTrim(this)')); ?>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <b> <label class="col-md-3 control-label"> Vehicle </label> </b>
                    <div class="col-md-8">
                    <select name="vehicle" id="" class="form-control" >
                        <option value="car">Car</option>
                        <option selected="selected" value="bike_scooter">Motorbike / Scooter</option>
                        <option value="push_bike">Push Bike</option>
                        <option value="van_truck">Van / Truck</option>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <b> <label class="col-md-3 control-label"> Contact Preference </label> </b>
                    <div class="col-md-8">
                    <select name="contact_preference" id="" class="form-control" >
                        <option selected="selected" value="call"> Call </option>
                        <option value="sms"> SMS </option>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <b> <label class="col-md-3 control-label"> Device </label> </b>
                    <div class="col-md-8">
                    <select name="device" id="" class="form-control" >
                        <option selected="selected" value="android"> Android </option>
                        <option value="ios"> iOS </option>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="control-label col-md-3"> Registered for GST </label>
                    <div class="col-md-4"> <label style="display:inline-block;"><?php echo form_input(array('id' => 'aa', 'type' => 'radio', 'name' => 'gst_status','class'=>'form-control', 'checked'=>'checked', 'value'=>'1')); ?> Yes</label>
                    </div>
                    
                    <div class="col-md-4"><label style="display:inline-block;"><?php echo form_input(array('id' => 'aa', 'type' => 'radio', 'name' => 'gst_status', 'class'=>'form-control', 'value'=>'0')); ?> No </label>
                    </div>
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
					<script>
                    $('INPUT[type="file"]').change(function () {
                    var ext = this.value.match(/\.(.+)$/)[1];
                    switch (ext) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                    case 'gif':
                    $('#chkimg').attr('disabled', false);
                    break;
                    default:
                    alert('This is not an allowed file type.');
                    this.value = '';
                    }
                    });
                    </script>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                    <script>
					$(document).ready(function() {
					$('input[type="radio"]').click(function() {
					if($(this).attr('id') == 'radio') {
					$('#a').show();
					$('#b').hide();
					}
					
					if($(this).attr('id') == 'radio1') {
					$('#b').show();
					$('#a').hide();
					}
					});
					});			
                    </script>
                    <script>
					$(function() {
					$('#bsns').hide(); 
					$('#subtype').change(function(){
					if($('#subtype').val() == 'business') {
					$('#bsns').show(); 
					} else {
					$('#bsns').hide(); 
					} 
					});
					});
					</script>
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
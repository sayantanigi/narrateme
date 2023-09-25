 <?php 
  	if($myprofile!=''){
		foreach($myprofile as $mf){
?>
<style>
.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    margin-right: 0.25em;
}
</style>
 <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12" id="content">
        <center>
          <h1 class="page-header1" id="at" >Add <font color="#005CA9">Member</font></h1>
        </center>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-sm-offset-3  lft-data">
            <div class="row">
              <div class="col-xs-12  toppad" >
                <div class="panel panel-info">
                  <div class="panel-body">
                    <div class="row">
                      <?php if($this->session->flashdata('success')!=''){?>
                      	 <div class=" col-md-12 col-lg-12"><?php echo $this->session->flashdata('success'); ?> </div>
            		  <?php }?>
                      <div class=" col-md-12 col-lg-12 ">
                      		<form method="post" action="<?php echo base_url()?>member/add_my_member">
                        		<div class="row">
                			<div class="col-sm-6">
                  <div class="form-group" style="margin-right:-6px;">
                    <label>First Name</label>
                    <input type="text" class="form-control" id="" placeholder="First Name" name="first_name" value="<?php echo set_value('first_name'); ?>">
                    <?php echo form_error('first_name', '<div class="error">', '</div>'); ?> </div>
                </div>
                			<div class="col-sm-6">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" id="" placeholder="Last Name" name="last_name" value="<?php echo set_value('last_name'); ?>">
                    <?php echo form_error('last_name', '<div class="error">', '</div>'); ?> </div>
                </div>
              			</div>
                          		<div class="form-group">
                            <label for="">Contact No:</label>
                            <input type="text" class="form-control" id="" placeholder="Contact Number" name="phoneno" value="<?php echo set_value('phoneno'); ?>">
                            <?php echo form_error('phoneno', '<div class="error">', '</div>'); ?> </div>
                          		<div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
                            <?php echo form_error('email', '<div class="error">', '</div>'); ?> </div>
                          		<div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="" placeholder="Password" name="password">
                            <?php echo form_error('password', '<div class="error">', '</div>'); ?> </div>
                          		<div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="" placeholder="Confirm Password" name="confirm_password">
                            <?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?> </div>
                          		<div class="form-group">
                            <label class="radio-inline" style="padding-left:0;">Gender :</label>
                            <label class="radio-inline" style="font-weight:normal;">
                              <input type="radio" name="gender" id="inlineRadio1" value="male">
                              Male </label>
                            <label class="radio-inline" style="font-weight:normal;">
                              <input type="radio" name="gender" id="inlineRadio2" value="female">
                              Female </label>
                          </div>
                          		<div class="form-group">
                            <div class="col-sm-4 col-sm-push-4 text-center">
                              <button style="font-size:14px;" type="submit" class="btn btn-default cstm_btn">Register</button>
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
        <!-- /.panel --> 
      </div>
      <!-- /.col-lg-6 --> 
    </div>
    <!-- /.row --> 
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <p>Copyright © OES  | <?= date('Y') ?></p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 d_by">
        <p>Developed & Designed By <a href="http://www.goigi.com/" target="_blank"> GOIGI.COM</a></p>
      </div>
    </div>
  </div>
<?php
		}
	}
?>  
  <!-- /#page-wrapper --> 
</div>
<!-- /#wrapper --> 

<!-- Bootstrap Core JavaScript --> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/metisMenu/dist/metisMenu.min.js"></script> 

<!-- Morris Charts JavaScript --> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/raphael/raphael-min.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/morrisjs/morris.min.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/js/morris-data.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/js/custom-file-input.js"></script> 
<!-- Custom Theme JavaScript --> 
<script src="<?php echo base_url()?>user_panel/student/dist/js/sb-admin-2.js"></script>
</body>
</html>
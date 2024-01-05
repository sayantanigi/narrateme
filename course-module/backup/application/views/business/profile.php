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
          <h1 class="page-header1" id="at" >Your <font color="#005CA9">Profile</font></h1>
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
                      <div class="col-md-12 col-lg-12 " align="center">
                        <div class="ch_pic">
                          <p class="p_img" id="circle"> 
                          <?php if($mf->profile_image==''){?>
                          <img src="<?php echo base_url()?>user_panel/student/img/Layer 5.jpg" class="img-circle" width="60"> </a>
                          <?php }else{?>
                          <img src="<?php echo base_url()?>uploads/profile/<?php echo $mf->profile_image?>" class="img-circle" width="60"> </a> 
                          <?php }?><span class="profile_name"><?php echo $mf->business_name?> </span></p>
                          <div class="box">
                          <?php echo form_open_multipart('member/profile_image');?>
                            <input type="file" name="userfiles" id="file-2" class="inputfile inputfile-2"  onchange="this.form.submit()" />
                            <label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                              <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                              </svg> <span>Choose a file&hellip;</span></label>
                              </form>
                          </div>
                        </div>
                      </div>
                      <?php if($this->session->flashdata('success')!=''){?>
                      	 <div class=" col-md-12 col-lg-12">
                          <div class="alert alert-success">
                          <a href="#" class="close" data-dismiss="alert">&times;</a>
                          <?php echo $this->session->flashdata('success'); ?>
                        </div> 
                      </div>
            		  <?php }?>
                      <div class=" col-md-12 col-lg-12"> </div>
                      <div class=" col-md-12 col-lg-12 ">
                        <table class="table table-user-information">
                          <tbody>
                            <tr>
                              <td>Business Name:</td>
                              <td><?php echo $mf->business_name?></td>
                            </tr>
                            <tr>
                              <td>Contact Name:</td>
                              <td><?php echo $mf->contact_name?></td>
                            </tr>
                            <tr>
                              <td>Position </td>
                              <td><?php echo $mf->contact_position?></td>
                            </tr>
                            <tr>
                              <td>Website</td>
                              <td><?php echo $mf->website?></td>
                            </tr>
                            
                            <form method="post" action="<?php echo base_url('member/update_profile')?>" name="">
                            
                            	<tr>
                              		<td>Email</td>
                              		<td style=" position: relative;"><a href="mailto:<?php echo $mf->email?>"><?php echo $mf->email?></a>
                                		<!--<input class="edit_fld" type="text" name="email"  id="edit_mail" />
                                		<a id="onedit" class="edit"><i class="fa fa-edit"></i>Edit</a>-->
                                    </td>
                            	</tr>
                            	<tr>
                              		<td>Phone Number</td>
                              		<td style="position: relative;"><a href="tel:<?php echo $mf->phoneno?>"><?php echo $mf->phoneno?></a>
                               	 		<input class="edit_fld" type="text" name="phoneno"  id="tel_edit" />
                                		<!--<button class="edit" id="onedit2" type="submit"	><i class="fa fa-edit"></i>Edit</button>-->
                                        <a id="onedit2" class="edit"><i class="fa fa-edit"></i>Edit</a>
                                    </td>
                            	</tr>
                            	<tr>
                              		<td>&nbsp;</td>
                              		<td><button class="apply" id="" type="submit">Apply Changes</button></td>
                            	</tr>
                            </form>
                            <tr>
                              <td>Change Password</td>
                              <td>
                                <button class="change_p" type="button" id="change_pass" >Yes</button>
                                <form method="post" action="<?php echo base_url('')?>member/update_currect_password">
                                	<div  id="password_modal" class="ch_pass" <?php if($this->uri->segment(2)=='update_currect_password'){?>style="display:block;" <?php }?>>
                                  <div class="form-horizontal" >
                                    <div class="control-group">
                                      <label for="current_password" class="control-label">Current Password</label>
                                      <div class="controls">
                                        <input type="password" name="current_password">
                                         <?php echo form_error('current_password', '<div class="error">', '</div>'); ?>
                                      </div>
                                    </div>
                                    <div class="control-group">
                                      <label for="new_password" class="control-label">New Password</label>
                                      <div class="controls">
                                        <input type="password" name="new_password">
                                         <?php echo form_error('new_password', '<div class="error">', '</div>'); ?>
                                      </div>
                                    </div>
                                    <div class="control-group">
                                      <label for="confirm_password" class="control-label">Confirm Password</label>
                                      <div class="controls">
                                        <input type="password" name="confirm_password">
                                         <?php echo form_error('confirm_password', '<div class="error">', '</div>'); ?>
                                      </div>
                                    </div>
                                    <div class="control-group">
                                      <button type="submit" class="btn btn-primary ch_p_btn" id="password_modal_save">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                                </form>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">
				$(document).ready(function() {
					$("#onedit").click(function() {
						$("#edit_mail").slideToggle("slow");
					});
					$("#onedit2").click(function() {
						$("#tel_edit").slideToggle("slow");
					});
					
					$("#change_pass").click(function() {
						$("#password_modal").slideToggle("slow");
					});
					
				});
		  </script> 
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
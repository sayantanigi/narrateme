 <?php 
  	if($myprofile!=''){
		foreach($myprofile as $mf){
?>
 <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12" id="content">
        <center>
          <h1 class="page-header1" id="at" >Profile <font color="#005CA9">Setting</font></h1>
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
                        <table class="table table-user-information">
                          <tbody>
                    
                                                    <tr>
                              <td>Change Password</td>
                              <td>
                               
                                <form method="post" action="<?php echo base_url()?>member/stdsetting">
                                	<div class="ch_pass" style="display:block;" >
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
                                        <button type="submit"  name="submit" value="submit" class="btn btn-primary ch_p_btn" id="password_modal_save">Save changes</button>
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
<script src="<?php echo base_url()?>user_panel/instructor/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="<?php echo base_url()?>user_panel/instructor/bower_components/metisMenu/dist/metisMenu.min.js"></script> 

<!-- Morris Charts JavaScript --> 
<script src="<?php echo base_url()?>user_panel/instructor/bower_components/raphael/raphael-min.js"></script> 
<script src="<?php echo base_url()?>user_panel/instructor/bower_components/morrisjs/morris.min.js"></script> 
<script src="<?php echo base_url()?>user_panel/instructor/js/morris-data.js"></script> 
<script src="<?php echo base_url()?>user_panel/instructor/js/custom-file-input.js"></script> 
<!-- Custom Theme JavaScript --> 
<script src="<?php echo base_url()?>user_panel/instructor/dist/js/sb-admin-2.js"></script>
</body>
</html>
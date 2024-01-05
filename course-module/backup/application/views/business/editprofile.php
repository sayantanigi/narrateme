 <?php 
  	if($myprofile!=''){
		foreach($myprofile as $mf){
?>
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
                     
                      <?php if($this->session->flashdata('success')!=''){?>
                      	 <div class=" col-md-12 col-lg-12"><?php echo $this->session->flashdata('success'); ?> </div>
            		  <?php }?>
                      <div class=" col-md-12 col-lg-12"> </div>
                      <div class=" col-md-12 col-lg-12 ">
                        <table class="table table-user-information">
                             <form method="post" action="<?php echo base_url('')?>member/editinstprf">
                          <tbody>
                            <tr>
                              <td>Contact Name:</td>
                              <td><input type="text" name="contact_name" value="<?php echo $mf->contact_name?>" ></td>
                            </tr>
                            <tr>
                              <td>Contact Position:</td>
                              <td><input type="text" name="last_name" value="<?php echo $mf->contact_position?>" ></td>
                            </tr>
                            <tr>
                              <td>Address:</td>
                              <td> <textarea class="form-control" rows="3" name="address"><?php echo $mf->address?></textarea>
                                 
                            </tr>
                            <tr>
                              <td>Website:</td>
                              <td> <input type="text" class="form-control" id="" name="website" value="<?php echo $mf->website?>"></td>
                            </tr>
                            
                           	<tr>
                              		<td>Email</td>
                              		<td style=" position: relative;"><a href="mailto:<?php echo $mf->email?>"><?php echo $mf->email?></a>
                                		<!--<input class="edit_fld" type="text" name="email"  id="edit_mail" />
                                		<a id="onedit" class="edit"><i class="fa fa-edit"></i>Edit</a>-->
                                    </td>
                            	</tr>
                            	<tr>
                              		<td>Phone Number</td>
                              		<td style="position: relative;">
                               	 		<input type="text" name="phoneno" value="<?php echo $mf->phoneno?>" >
                                    </td>
                            	</tr>
                            	<tr>
                              		<td>&nbsp;</td>
                                        <td><button  name="save" value="save" class="apply" id="" type="submit">Save Changes</button></td>
                            	</tr>
                            
                          </tbody>
                             </form>
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
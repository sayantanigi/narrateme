<style type="text/css">
.panel-heading {
	background-color:#075b82 !Important;
	color:#FFF !Important;
	font-weight:bold !Important;
}
</style>
<!-- Content design start here-->
<link href="<?=base_url();?>user_panel/css/custom.css" rel="stylesheet">
<div class="clearfix"></div>
<div class="container">
  <div class="register-panel">
    <section style="padding:4em 0;">
      <div class="container">
        <div class="col-sm-6 col-sm-push-3">
          <form class="form-horizontal frm" method="post" action="<?php echo base_url('auth/recoverpass')?>">
          
            <h1 class="sec-heading text-center" style="margin-top:0; margin-bottom:25px;">Forget Password</h1>
            <?php if($this->session->flashdata('msg')!=''){?>
            <div class="col-sm-12"><?php echo $this->session->flashdata('msg'); ?></div>
            <?php }?>
            <div class="col-sm-10 col-sm-push-1">
              
              <div class="form-group">
                <label for="emailforegt">Enter Registered Email address</label>
                <input type="email" name="email" class="form-control" value="<?php echo set_value('email')?>" id="emailforegt" placeholder="Email">
                <span class="error"><?php echo form_error('email'); ?> </span>
              </div>
             
              <div class="form-group">
                
                <p style="font-size:13px; text-align: right;" ><a style="color:#1769B2; text-decoration:underline;" href="<?php echo base_url('auth/login')?>">Login Here?</a></p>
              </div>
              <div class="form-group">
                <div class="col-sm-4 col-sm-push-4 text-center">
                  <button style="font-size:14px;" type="submit" class="btn btn-info cm_btn">Send Password</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Content design End here-->

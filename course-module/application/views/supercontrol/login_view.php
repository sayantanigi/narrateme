<style type="text/css">
.alert {
    padding: 0;
}
	hr, p {
    margin: 12px 0 12px 10px;
}
button.close {
    margin-top: 5px;
    padding: 10px;
}
</style>
<body class="login">
        <div class="menu-toggler sidebar-toggler"></div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGO -->
        <div class="logo" style="padding-bottom:0;">
        <!--<h3 style="color:#ffffff;text-shadow:2px 2px 3px #000; font-size:23px; font-weight:300;"><?//=strtoupper(PROJECT_NAME)?></h3>-->
        <h3 class="login-heading" style="color:#fff; font-weight:900;"><?php echo $title;?> SUPERCONTROL</h3>
            <a><!--<img src="assets/pages/img/logo-big.png" alt="" />--> <?php //echo $title;?></a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            
   	
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
         <?php echo form_open('supercontrol/main/login_validation'); ?>
                <h3 class="form-title font-green"><i class="fa fa-user"></i> Login to your account</h3>
                <!--<div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>-->
                 <?php if(validation_errors()){?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                      <span> <?php echo validation_errors(); ?>  </span>
                </div>
                <?php }?>
                <?php 
				if(@$error!=''){
				?>
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    <span> <?php echo @$error; ?>  </span>
                </div>
                <?php }?>
                
                <?php
					if($this->session->flashdata('logerror')!=''){
					?>	
						 <div class="alert alert-danger">
							 <button class="close" data-close="alert"></button>
							<span> <?php echo $this->session->flashdata('logerror'); ?> </span>
						</div>
					 <?php   
					}
					?>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                     <div>&nbsp;</div>
                
                <div class="create-account">
                	<div class="form-group2" style="text-align:left; margin-left:12%">
                        <input type="submit" class="btn green uppercase" value="Login" id="submitButton">
                    </div>
                </div>
          <?php echo form_close(); ?>
            
            <!-- END REGISTRATION FORM -->
        </div>
      

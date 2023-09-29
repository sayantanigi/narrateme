<style type="text/css">
.login .content {
    padding: 10px 30px 4px !important;
	box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.70);
}
</style>
<body class="login"  style="background-image:url(../../images/BG-NM-Login.jpg) !important; background-position:100%; background-repeat:no-repeat; background-size:cover;">
    <div class="menu-toggler sidebar-toggler"></div>
    <div class="logo" style="padding-bottom:0;">
        <img src="<?php echo base_url()?>images/logo.png" alt="" style="width:187px;" />
    </div>
    <div class="content" style="margin-top:25px; padding: 0 !important;">
        <form action="<?php echo base_url('main/login_validation'); ?>" method="post">
            <?php //echo form_open('main/login_validation'); ?>
            <h3 class="form-title font-green" style="font-weight:300 !important; margin-top: 30px !important; margin-bottom: 30px !important;"><i class="fa fa-lock"></i> Login to your account</h3>
            <?php if(validation_errors()) { ?>
            <div class="alert alert-danger" style="padding-top:0; padding-bottom:0; display: flex; align-items: center; justify-content: space-between; padding-left: 20px !important; padding-left: 20px !important;">
                <span> <?php echo validation_errors(); ?></span>
                <button class="close" data-close="alert" style="margin-top:5px;"></button>
            </div>
            <?php } ?>
            <div class="form-group" style="padding-left: 20px; padding-right: 20px; margin-bottom: 30px !important;">
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" style="width:100%;" required/>
            </div>
            <div class="form-group" style="padding-left: 20px; padding-right: 20px; margin-bottom: 30px !important;">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" style="width:100%;" required/>
            </div>
            <div style="background: #364150; width: 100%;">
                <label class="check" style="width: 100%; display: flex; flex-direction: row; justify-content: space-between; padding: 20px; margin: 0;">
                    <button class="btn green pull-right" type="submit" style="padding: 10px !important;">Login<i class="m-icon-swapright m-icon-white" style="margin-left: 5px;"></i></button>
                    <!-- <button class="btn green pull-right" type="submit" style="padding: 10px !important;">Forgot Password<i class="m-icon-swapright m-icon-white" style="margin-left: 5px;"></i></button> -->
                </label>
            </div>
        </form>
        <form class="forget-form" action="#" method="post">
            <h3 class="font-green" style="font-weight:300 !important;">Forget Password ?</h3>
            <p> Enter your e-mail address below to reset your password. </p>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" />
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn btn-default">Back</button>
                <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
            </div>
        </form>
    </div>
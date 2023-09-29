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
    <div class="content" style="margin-top:25px;">
        <form class="forget-form" action="main/login_validation" method="post">
        <?php //echo form_open('main/login_validation'); ?>
        <h3 class="form-title font-green" style="font-weight:300 !important;"><i class="fa fa-lock"></i> Login to your account</h3>
        <?php if(validation_errors()) { ?>
        <div class="alert alert-danger" style="padding-top:0; padding-bottom:0;">
            <button class="close" data-close="alert" style="margin-top:5px;"></button>
            <span> <?php echo validation_errors(); ?></span>
        </div>
        <?php } ?>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" style="width:100%;" />
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" style="width:100%;"  />
        </div>
        <div class="form-actions" style="padding: 21px 30px;">
            <div class="create-account" style="text-align:left !important; padding-left:41px;">
                <label class="rememberme check" style="margin:0;">
                    <button class="btn green pull-right" type="submit" style="padding: 7px 19px !important;">Login<i class="m-icon-swapright m-icon-white"></i></button>
                </label>
            </div>
        </div>
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
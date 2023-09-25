<style type="text/css">
	.login .content {
    padding: 10px 30px 4px !important;
	box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.70);
}
</style>
<body class="login"  style="background-image:url(../../images/BG-NM-Login.jpg) !important; background-position:100%; background-repeat:no-repeat; background-size:cover;">

        <div class="menu-toggler sidebar-toggler"></div>

        <!-- END SIDEBAR TOGGLER BUTTON -->

        <!-- BEGIN LOGO -->

        <div class="logo" style="padding-bottom:0;">

        <!--<h3 style="color:#ffffff;text-shadow:2px 2px 3px #000; font-size:23px; font-weight:300;"><?//=strtoupper(PROJECT_NAME)?></h3>-->


           <img src="<?php echo base_url()?>images/logo.png" alt="" style="width:187px;" />

        </div>

        <!-- END LOGO -->

        <!-- BEGIN LOGIN -->

        <div class="content" style="margin-top:25px;">

            <!-- BEGIN LOGIN FORM -->

            

   			<?php echo form_open('main/login_validation'); ?>

                <h3 class="form-title font-green" style="font-weight:300 !important;"><i class="fa fa-lock"></i> Login to your account</h3>

             <?php if(validation_errors()){?>

                <div class="alert alert-danger" style="padding-top:0; padding-bottom:0;">

                    <button class="close" data-close="alert" style="margin-top:5px;"></button>

                    <span> <?php echo validation_errors(); ?>  </span>

                </div>

                <?php }?>

              

                <div class="form-group">

                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

                    <label class="control-label visible-ie8 visible-ie9">Username</label>

                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" style="width:100%;" /> </div>

                <div class="form-group">

                    <label class="control-label visible-ie8 visible-ie9">Password</label>

                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" style="width:100%;"  /> </div>

                    <!--<div class="create-account" style="text-align:left !important; padding-left:42px;">-->

                		<div class="form-actions" style="padding: 21px 30px;">

                           <!-- <input type="submit" class="btn btnlog green uppercase pull-right" value="Login">-->

                            <div class="create-account" style="text-align:left !important; padding-left:41px;">

                        <label class="rememberme check" style="margin:0;">

                           <!-- <input type="checkbox" name="rem" value="yes" />Remember -->
                            <!--<input type="submit" class="btn btnlog green uppercase pull-right" style="margin-top:0px !important;" value="Login">-->
                            <button class="btn green pull-right" type="submit" style="padding: 7px 19px !important;">
                                Login
                                <i class="m-icon-swapright m-icon-white"></i>
                                </button>
                         </label>

                            </div>

                        <!--<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>-->

                            </div>

                	<!--</div>-->

               

                <!--<div class="create-account" style="text-align:left !important; padding-left:42px;">

                    <p>

                      

                        <a href="javascript:;" id="forget-password" class="uppercase" style="text-transform:none !important;">Forgot Password?</a>

                    </p>

                </div>-->

            </form>

            <!-- END LOGIN FORM -->

            <!-- BEGIN FORGOT PASSWORD FORM -->

            <form class="forget-form" action="#" method="post">

                <h3 class="font-green" style="font-weight:300 !important;">Forget Password ?</h3>

                <p> Enter your e-mail address below to reset your password. </p>

                <div class="form-group">

                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>

                <div class="form-actions">

                    <button type="button" id="back-btn" class="btn btn-default">Back</button>

                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>

                </div>

            </form>

            

            <!-- END REGISTRATION FORM -->

        </div>

      


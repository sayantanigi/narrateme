<div class="createAccount loginCol">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
	<div class="createAccount-outer">
		<div class="createAccount-col clearfix">
			<div class="logo-createAccount">
				 <a href="#"><img src="<?=base_url();?>user_panel/new/images/logo.png" alt=""></a></div>
			<h4>Login</h4>
			<div class="gform_wrapper">
				<p>If you are a registered user, please login your account.</p>
				
				<form method="post" id="login" method="post" action="<?php echo base_url('auth/member_login')?>">
				     <?php if($this->session->flashdata('msg')!=''){?>
            <div class="col-sm-12"><?php echo $this->session->flashdata('msg'); ?></div>
            <?php }?>
					<div class="gform_body">
                        <div id="checkboxes">
                            <input type="radio" name="user_type" value="std" id="r4" checked="checked">
                            <label class="whatever1 active" for="r4">Student</label>
                            <input type="radio" name="user_type" value="inst" id="r3">
                            <label class="whatever1" for="r3">Instructor</label>
                            <input type="radio" name="user_type" value="busi" id="r2">
                            <label class="whatever1" for="r2">Business</label>
                          </div>
						<ul class="gform_fields">
							
							<li class="gfield">
								<label class="gfield_label"> Email address <span class="red">*</span></label>						
								<div class="ginput_container">
									<input type="text" class="medium" name="email" id="email" value="">
									<span class="validation_error" id="email_mess"></span>
								</div>
							</li>
							<li class="gfield">
								<label class="gfield_label"> Password <span class="red">*</span></label>
								<div class="ginput_container">
									<input type="password" class="medium" name="password" id="password" value="">
									<span class="validation_error" id="password_mess"></span>
								</div>						
							</li>
							<li class="gfield">
								<div class="gform_footer">
									<input type="submit" name="" value="Login" class="button gform_button">
								</div>
								<div id="error"></div>
							</li>
						</ul>
					</div>
				</form>
			</div>
			<div class="privacyNotice">
                <p>By continuing, you agree to Shan Foods <a href="#">Terms of Use </a> and <a href="#">Privacy Policy</a>.</p>
                <div class="checkbox-stay clearfix">
                <p><input type="checkbox" name="" value="Stay signed in"> Stay signed in </p>
                <div class="Forgotpassword"><a href="<?php echo base_url('auth/forget')?>">Forgot your password?</a></div>
            </div>
			</div>
			<div class="newDOb">
				<h5><span>New to Skillogics?</span></h5>
			</div>
			<div class="newSkillogics">
				<a href="<?php echo base_url('auth/registration')?>" class="button gform_button">Create My Account</a>
			</div>
  		 </div>
            </div>
        </div>
    </div>
	</div>
</div>

</section>
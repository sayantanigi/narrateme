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


 <?php if(!$this->session->userdata('is_user_id')){?>
    

<div class="container">
  <div class="register-panel">
    <section style="padding:4em 0;">
      <div class="container">
        <div class="col-sm-6 col-sm-push-3">
          <form class="form-horizontal frm" method="post" action="<?php echo base_url('auth/member_login')?>">
          <?php if($this->session->flashdata('msg')!=''){?>
            <div class="col-sm-12"><?php echo $this->session->flashdata('msg'); ?></div>
            <?php }?>
            <h1 class="sec-heading text-center" style="margin-top:0; margin-bottom:15px;">Login</h1>
            <div class="col-sm-10 col-sm-push-1">
              <div class="form-group">
                  
                <div id="checkboxes">
                  <input type="radio" name="user_type" value="std" id="r4" checked="checked" />
                  <label class="whatever1 active" for="r4">Student</label>
                  <input type="radio" name="user_type" value="inst" id="r3" />
                  <label class="whatever1" for="r3">Instructor</label>
                  <input type="radio" name="user_type" value="busi" id="r2" />
                  <label class="whatever1" for="r2">Business</label>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <p style="font-size:13px">New User? <a style="color:#1769B2; text-decoration:underline;" href="<?php echo base_url('auth/registration')?>">Register Here</a></p>
                <p style="font-size:13px; text-align: right;" ><a style="color:#1769B2; text-decoration:underline;" href="<?php echo base_url('auth/forget')?>">Forget Password?</a></p>
              </div>
              <div class="form-group">
                <div class="col-sm-4 col-sm-push-4 text-center">
                  <button style="font-size:14px;" type="submit" class="btn btn-default cstm_btn">Sign in</button>
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
<?php } else {?>
    <div class="container" align="center"style=" width:fit-content; height: 60px;
    padding-top: 13px;">
        <button  type="button" class="btn btn-success"><a href="<?php echo base_url('member/profile')?>">Profile</a></button>
        <button type="button" class="btn btn-danger"><a href="<?php echo base_url('member/logout')?>">Logout</a></button>
    </div>
      <?php } ?>
<!-- Content design End here-->
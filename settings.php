<?php 
	include('lib/inner_header.php');
	sequre();
	$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."'");
	$viewsettings=getAnyTableWhereData('na_user_social_link', " AND userid='".$_SESSION["userid"]."' ");
	if(isset($_REQUEST['addsociallink'])){
	    strip_tags(mysql_real_escape_string(extract($_POST)));
		
		//====================Checking Existance===================
		$chechnum=checkExistance('na_user_social_link', "AND userid=".$_SESSION["userid"]."");
		//====================Checking Existance===================
		$data = array('fb_links'=>$fb_links,'gplus_link'=>$gplus_link,'twit_link'=>$twit_link,'inst_link'=>$inst_link,'linkd_link'=>$linkd_link,'userid'=>$_SESSION["userid"],'status'=>1);
		if($chechnum==0){
			$result=insertData($data, 'na_user_social_link') ;
			header('location:settings.php?op='.session_id().'&typ=add');
		}else{
			$result=updateData($data,'na_user_social_link', " userid='" . $_SESSION["userid"] . "' ") ;
			header('location:settings.php?op='.session_id().'&typ=up');
		}
	}
?>
<section id="main">
  <?php include('lib/aside.php');?>
  <section id="content">
    <div class="container">
      <div class="block-header">
        <h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span></h2>
      </div>
      <div id="profile-main" class="card">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" id="" onSubmit="return Submitpasscheck()">
        <div class="pmb-block">
        <div class="pmbb-header">
          <h2><i class="fa fa-key"></i>Change Settings</h2>
        </div>
        <div class="pmbb-body p-l-30">
        <?php 
             if(@$_REQUEST['op']==session_id() && $_REQUEST['typ']=='add'){
         ?>
        <p style="text-align:center; color:green;"> Social Link Added Successfully  !!</p>
        <?php } ?>
         <?php 
             if(@$_REQUEST['op']==session_id() && $_REQUEST['typ']=='up'){
         ?>
        <p style="text-align:center; color:#F00;">Social Link Updated Successfully  !!</p>
        <?php } ?>
        <div class="pmbb-edit" style="display:block;">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
          <dl class="dl-horizontal">
            <dt class="p-t-10">Facebook Link</dt>
            <dd>
              <div class="fg-line">
                <input type="text" class="form-control" id="fb_links" name="fb_links" value="<?php echo $viewsettings['fb_links']?>">
               </div>
            </dd>
          </dl>
          <dl class="dl-horizontal">
            <dt class="p-t-10">Google Plus Link</dt>
            <dd>
              <div class="fg-line">
                <input type="text" class="form-control" id="gplus_link" name="gplus_link" value="<?php echo $viewsettings['gplus_link']?>" >
              </div>
            </dd>
          </dl>
          <dl class="dl-horizontal">
            <dt class="p-t-10">Twitter Link</dt>
            <dd>
              <div class="fg-line">
                <input type="text" class="form-control" id="twit_link" name="twit_link" value="<?php echo $viewsettings['twit_link']?>">
                <label id="errorconpass"></label>
              </div>
            </dd>
          </dl>
          
          <dl class="dl-horizontal">
            <dt class="p-t-10">Instagram Link</dt>
            <dd>
              <div class="fg-line">
                <input type="text" class="form-control" id="inst_link" name="inst_link" value="<?php echo $viewsettings['inst_link']?>">
                <label id="errorconpass"></label>
              </div>
            </dd>
          </dl>
          
          <dl class="dl-horizontal">
            <dt class="p-t-10">Linkdin Link</dt>
            <dd>
              <div class="fg-line">
                <input type="text" class="form-control" id="linkd_link" name="linkd_link" value="<?php echo $viewsettings['linkd_link']?>">
              </div>
            </dd>
          </dl>
          <div class="m-t-30">
            <button type="submit" class="btn btn-primary btn-sm" name="addsociallink">Save</button>
            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
          </div>
        </form>
      </div>
    </div>
    </div>
    </form>
    <script>
		function Submitpasscheck(){
			var npasswrd = $("#newpas").val();
			var conpas = $("#confirm_password").val();
			var curpass = $("#curpass").val();
			var oldpass = $("#old_password").val();
			
			if($("#old_password").val() == "" ){
				$("#old_password").focus();
				$("#erroroldpass").html("Please Enter Your Current Password !!!");
				return false;
			}else{
				$("#erroroldpass").html("");
			}
			
			if($("#newpas").val() == "" ){
				$("#newpas").focus();
				$("#errornewpass").html("Please Enter New Password !!!");
				return false;
			}else{
				$("#errornewpass").html("");
			}
			
			if(npasswrd != conpas){
				$("#confirm_password").focus();
				$("#errorconpass").html("New Password And Confirm Password Must Be Same !!!");
				return false;
			}else{
				$("#errorconpass").html("");
			}
			
			if(curpass !=oldpass){
				$("#old_password").focus();
				$("#erroroldpass").html("Current Password Not Matching !!!");
				return false;
			}else{
				$("#erroroldpass").html("");
			}
		}
     </script>
    <style>
		   #erroroldpass{color:#F00;}
		   #errornewpass{color:#F00;}
		   #errorconpass{color:#F00;}
		   </style>
    </div>
  </section>
  </section>
  <?php include('lib/inner_footer.php')?>

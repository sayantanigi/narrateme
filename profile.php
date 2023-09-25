<?php
include('lib/header_inner.php');

    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    //echo $page = 

$username = end($link_array);
$view=getAnyTableWhereData('na_member', " AND username ='".$username."'");
$viewmain=getAnyTableWhereData('na_social_profile', " AND user_id='".$view["id"]."' ");

//============Friend List Fetch==============
//echo "SELECT * FROM `na_frnd_reqst` WHERE (from_id  ='".$view["id"]."' || to_id  ='".$view["id"]."') and (to_id  = '".$view['id']."' || from_id  = '".$view['id']."') and `frnd_status`=2"; exit();
//============Friend List Fetch==============

$frndlist = mysql_query("SELECT * FROM `na_frnd_reqst` WHERE (from_id  ='".$view["id"]."' || to_id  ='".$view["id"]."') and (to_id  = '".$view['id']."' || from_id  = '".$view['id']."') and `frnd_status`=2");
?>
<style>
.tv-header {
    padding: 16px 18px;
    border-bottom: 1px solid #eee;
    background: #F9F9F9;
}
</style>
<div class="container">
  <div class="block-header" style="padding-top:20px;">
    <h2 style="width: 240px;"><?=$view['first_name']." ".$view['last_name']?></h2>
  </div>
  <div class="card" id="profile-main">
    <div class="pm-overview c-overflow mCustomScrollbar _mCS_3 mCS-autoHide mCS_no_scrollbar" style="overflow: visible;">
      <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical_horizontal mCSB_outside" tabindex="0">
        <div id="mCSB_3_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y mCS_x_hidden mCS_no_scrollbar_x" style="position: relative; top: 0px; left: 0px; width: 100%;" dir="ltr">
          <div class="pmo-pic">
            <div class="p-relative"> <a href="#"> 
					<?php
                    if($view['userImage']!=''){
                    ?>
                    <img class="img-responsive mCS_img_loaded" src="<?php echo $baseurl;?>admin/useravatar/fullsize/<?php echo $view['userImage']?>" alt=""> 
                    <?php }else{?>
                    <img class="img-responsive mCS_img_loaded" src="<?php echo $baseurl;?>img/no-image.png" alt=""> 
                    <?php }?>
            	</a>
             </div>
          </div>
          <div class="pmo-block pmo-contact hidden-xs">
            <h2>Contact</h2>
            <ul>
              <li><i class="zmdi zmdi-phone"></i> <?php if($_SESSION['user_log_flag'] != 1) {?> <a href="<?php echo $baseurl?>register.php" target="_blank" style="color:#00C;">Register to view details</a> <?php }else {?><?php echo $view['phone_no']?><?php }?></li>
              <li><i class="zmdi zmdi-email"></i> <?php if($_SESSION['user_log_flag'] != 1) {?> <a href="<?php echo $baseurl?>register.php" target="_blank" style="color:#00C;">Register to view details</a> <?php }else {?><?php echo $view['email']?><?php }?></li>
              
              <li><i class="zmdi zmdi-facebook-box"></i> <?php echo $viewmain['social_link']; ?></li>
              <li><i class="zmdi zmdi-twitter"></i> <?php echo $viewmain['social_twitter']; ?> (<a href="http://<?php echo $viewmain['social_twitter']; ?>" target="_blank"><?php echo $viewmain['social_twitter']; ?></a>)</li>
              <li> <i class="zmdi zmdi-pin"></i>
                <address class="m-b-0 ng-binding">
                <?php echo $view['address'].",".$view['city'].",".$view['state'].",".$view['zip_code'].",".$view['country']?>
                </address>
              </li>
            </ul>
          </div>
          <!--<div class="pmo-block pmo-items hidden-xs">
            <h2>Connections</h2>
            <div class="pmob-body">
              <div class="row">
				<?php 
                while(@$mutualfriendfetch=mysql_fetch_array($frndlist)){
					$imagefetch=mysql_fetch_array(mysql_query("SELECT * FROM na_member WHERE id=".$mutualfriendfetch['to_id'].""));
                ?> 
              <a href="#" class="col-xs-2"> <img class="img-circle mCS_img_loaded" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'];?>:81/narrateme/admin/useravatar/fullsize/<?php echo $imagefetch['userImage']?>" alt=""> </a>
                 <?php 
				 }
				 ?> 
              </div>
            </div>
          </div>-->
        </div>
      </div>
      <div id="mCSB_3_scrollbar_vertical" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical" style="display: none;">
        <div class="mCSB_draggerContainer">
          <div id="mCSB_3_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 50px; height: 0px; top: 0px;" oncontextmenu="return false;">
            <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
          </div>
          <div class="mCSB_draggerRail"></div>
        </div>
      </div>
      <div id="mCSB_3_scrollbar_horizontal" class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_horizontal" style="display: none;">
        <div class="mCSB_draggerContainer">
          <div id="mCSB_3_dragger_horizontal" class="mCSB_dragger" style="position: absolute; min-width: 50px; width: 0px; left: 0px;" oncontextmenu="return false;">
            <div class="mCSB_dragger_bar"></div>
          </div>
          <div class="mCSB_draggerRail"></div>
        </div>
      </div>
    </div>
    <div class="pm-body clearfix">
      <ul class="tab-nav tn-justified">
        <li class="active waves-effect" role="presentation"><a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab" aria-expanded="true">Details</a></li>
        <li class="waves-effect"><a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab" aria-expanded="false">Timeline</a></li>
      </ul>
      <div class="tab-content p-20">
      <div role="tabpanel" class="tab-pane animated fadeIn active" id="tab-1">
      <div class="pmb-block">
        <div class="pmbb-header">
          <h2><i class="zmdi zmdi-equalizer m-r-5"></i> Summary</h2>
        </div>
        <div class="pmbb-body p-l-30">
          <div class="pmbb-view"> 
          <?php echo $viewmain['description']; ?>
          </div>
        </div>
      </div>
      <div class="pmb-block">
        <div class="pmbb-header">
          <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>
        </div>
        <div class="pmbb-body p-l-30">
          <div class="pmbb-view">
            <dl class="dl-horizontal">
              <dt>Full Name</dt>
              <dd><?=$view['first_name']." ".$view['last_name']?></dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Gender</dt>
              <dd><?=$view['gender']?></dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Birthday</dt>
              <dd><?=date("jS F, Y", strtotime($view['dateofbirth']))?></dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Martial Status</dt>
              <dd><?php echo $viewmain['marital_status']; ?></dd>
            </dl>
          </div>
        </div>
      </div>
      <div class="pmb-block">
        <div class="pmbb-header">
          <h2><i class="zmdi zmdi-phone m-r-5"></i> Contact Information</h2>
        </div>
        <div class="pmbb-body p-l-30">
          <div class="pmbb-view">
            <dl class="dl-horizontal">
              <dt>Mobile Phone</dt>
              
              <dd><?php if($_SESSION['user_log_flag'] != 1) {?> <a href="<?php echo $baseurl?>register.php" target="_blank" style="color:#00C;">Register to view details</a> <?php }else {?><?php echo $view['phone_no']?><?php }?></dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Email Address</dt>
              <dd><?php if($_SESSION['user_log_flag'] != 1) {?> <a href="<?php echo $baseurl?>register.php" target="_blank" style="color:#00C;">Register to view details</a> <?php }else {?><?php echo $view['email']?><?php }?></dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Twitter</dt>
              <dd><a href="http://<?php echo $viewmain['social_twitter']; ?>" target="_blank"><?php echo $viewmain['social_twitter']; ?></a></dd>
            </dl>
            <dl class="dl-horizontal">
              <dt>Skype</dt>
              <dd><a href="http://<?php echo $viewmain['social_skype']; ?>" target="_blank"><?php echo $viewmain['social_skype']; ?></dd>
            </dl>
          </div>
        </div>
      </div>
      </div>
      <div role="tabpanel" class="tab-pane animated fadeIn" id="tab-2">
      <?php 
      	$postfetch = mysql_query("SELECT * FROM `na_postdata` WHERE from_id=".$view['id']." ORDER BY pid DESC LIMIT 6");
		while(@$postdata=mysql_fetch_array($postfetch)){
			$imageandnamefetch=mysql_fetch_array(mysql_query("SELECT * FROM na_member WHERE id=".$postdata['from_id'].""));
	  ?>
        <div class="tv-header media">
        <a href="#" class="tvh-user pull-left col-xs-2">
            <img class="img-circle mCS_img_loaded" src="<?php echo $baseurl;?>admin/useravatar/fullsize/<?php echo $imageandnamefetch['userImage']?>" alt="" style="height:40px; width:40px;">
        </a>
        <div class="media-body p-t-5">
            <strong class="d-block"><?php echo $imageandnamefetch['first_name']." ".$imageandnamefetch['last_name'] ?></strong>
            <small class="c-gray"><?=date("jS F, Y", strtotime($postdata['post_date']))?> at <?=date("g:i A", strtotime($postdata['post_date']))?></small>
        </div>
        
        </div>
        <div class="tv-body">
        <p><?php echo $postdata['post_details']?></p>
        <div class="clearfix"></div>
        </div>
        <?php }?>
      </div>
      </div>
    </div>
  </div>
</div>
<?php
include('lib/footer_inner.php');
?>
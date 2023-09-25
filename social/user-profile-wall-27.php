<?php 
include('lib/header.php');
socialcheck();
sequre();
//$viewmain = getAnyTableWhereData('na_social_profile', " AND user_id='".$_SESSION["userid"]."' ");
//$viewmember = getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");

$view=getAnyTableWhereData('na_member', " AND first_name ='".$_SESSION['searchmember']."' OR email = '".$_SESSION['searchmember']."' ");
if(@$_REQUEST['opfrnd']){
	$toid=base64_decode($_REQUEST['to_id']);
	$data=array('from_id'=>$_SESSION['userid'],'to_id'=>$toid,'send_date '=>date('Y-m-d H:i:s'),'frnd_status'=>1,'status'=>1);
	
	$sqlcheckdata=mysql_query("select * from `na_frnd_reqst` where 'from_id'= ".$_SESSION['userid']." and to_id=".$toid."");
	$countchk=mysql_num_rows($sqlcheckdata);
	//exit();
	if($countchk >0){
		$xp=mysql_fetch_array($sqlcheckdata);
		print_r($xm);
		exit();
		$data=array('frnd_status'=>1);
		$result=updateData($data,'na_frnd_reqst', " from_id='" . $_SESSION['userid'] . "' and to_id='".$toid."' ") ;	
	}else{
		$result=insertData($data,'na_frnd_reqst');
	}
	if($result){
		$response="Friend Request Send....";
	}
}

if(@$_REQUEST['unfrnd']){
	$toid=base64_decode($_REQUEST['to_id']);
	
	$sqlcheckdata=mysql_query("SELECT * FROM `na_frnd_reqst` WHERE `to_id` =".$toid." AND `from_id` =".$_SESSION['userid']."");
	
	$countchk=mysql_num_rows($sqlcheckdata);
	if($countchk>0){
		$result=mysql_query("DELETE from `na_frnd_reqst` where `from_id`= ".$_SESSION['userid']." and `to_id`=".$toid."");
		//echo "DELETE from `na_frnd_reqst` where `from_id`= ".$_SESSION['userid']." and `to_id`=".$toid."";
		//exit();
	}else{
		$data=array('frnd_status'=>0);
		$result=updateData($data,'na_frnd_reqst', " from_id='" . $_SESSION['userid'] . "' and to_id='".$toid."' ") ;
	//$result=insertData($data,'na_frnd_reqst');
	}
	if($result){
		$response="Friend Remove From The List....";
	}
}
$viewmain = getAnyTableWhereData('na_social_profile', " AND user_id='".$view["userid"]."' ");

 $frndlist=checkExistance('na_frnd_reqst', " AND from_id  ='".$_SESSION['userid']."' and  to_id  = '".$view['id']."' and `frnd_status`=2");

 $frndsendlist=checkExistance('na_frnd_reqst', " AND from_id  ='".$_SESSION['userid']."' and  to_id  = '".$view['id']."' and `frnd_status`=1");
//exit();

$viewdeclinecheck=checkExistance('na_frnd_reqst', " AND from_id  ='".$_SESSION['userid']."' and  to_id  = '".$view['id']."' and `frnd_status`=0");
$count_connections=mysql_fetch_array(mysql_query("SELECT count(`id`) as connections FROM na_frnd_reqst WHERE (`from_id` =".$view['id']." OR `to_id` =".$view['id'].") AND `frnd_status` =2"));

//echo "SELECT count(`id`) as connections FROM na_frnd_reqst WHERE (`from_id` =".$view['id']." OR `to_id` =".$view['id'].") AND `frnd_status` =2";
?>
<section id="main">
  <?php include('lib/aside.php');?>
  <section id="content">
    <div class="container c-alt">
      <div class="card c-timeline" id="profile-main">
                        <div class="pm-overview c-overflow">
                            <div class="pmo-pic">
                                <div class="p-relative">
                                    <a href="#">
                                    	<?php
										if($view['userImage']!=''){
										?>
                                        <img class="img-responsive" src="../admin/useravatar/fullsize/<?php echo $view['userImage']?>" alt=""> 
                                        <?php }else{?>
                                        <img class="img-responsive" src="../img/no-image.png" alt=""> 
                                        <?php }?>
                                    </a>
                                </div>
                                
                                
                                <div class="pmo-stat">
                                    <h2 class="m-0 c-white"><?php echo $count_connections['connections']?></h2>
                                    Total Connections
                                </div>
                                <?php
								  if($frndsendlist==1){
								?>
                                <a href="user-profile-wall.php?unfrnd=1&to_id=<?php echo base64_encode($view['id'])?>" class="add_me">
                                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Request Already Sent  </span>
                                </a>
                                <?php
								 }else if($frndlist==1){
								?>
                                <a href="user-profile-wall.php?unfrnd=1&to_id=<?php echo base64_encode($view['id'])?>&frm_id=<?php echo $_SESSION['userid']?>" class="add_me">
                                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Friends </span>
                                </a>
                                <?php }else{?>
                                <a href="user-profile-wall.php?opfrnd=1&to_id=<?php echo base64_encode($view['id'])?>" class="add_me">
                                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Add Me </span>
                                </a>
                                <?php }?>
                                    <?php
									if(@$_REQUEST['opfrnd']){
										if($response!=''){
									?>
                                    <a><?php echo $response?></a>
                                    <?php }
									}?>
                            </div>
                            
                            <div class="pmo-block pmo-contact hidden-xs">
                                <h2>Contact</h2>
                                
                                <ul>
                                    <!--<li><i class="zmdi zmdi-phone"></i> 00971 12345678 9</li>-->
                                    <li><i class="zmdi zmdi-email"></i> <?php echo $view['email']?></li>
                                    <li><i class="zmdi zmdi-facebook-box"></i> <?php echo $viewmain['social_link ']?></li>
                                    <li><i class="zmdi zmdi-twitter"></i> <?php echo $viewmain['social_twitter']?></li>
                                    <li>
                                        <i class="zmdi zmdi-pin"></i>
                                        <address class="m-b-0 ng-binding">
                                           <?php echo $view['address']?>,<br>
                                            <?php echo $view['city']?>,<br>
                                            <?php //echo $view['city']?>
                                        </address>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="pmo-block pmo-items hidden-xs">
                                <h2>Connections</h2>
                                
                                <div class="pmob-body">
                                    <div class="row">
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/1.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/2.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/3.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/4.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/5.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/6.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/7.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/8.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/1.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/2.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/3.jpg" alt="">
                                        </a>
                                        <a href="#" class="col-xs-2">
                                            <img class="img-circle" src="img/profile-pics/4.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="pm-body clearfix">
                            <div class="col-md-12">
          <!--<div class="card wall-posting">
            <div class="card-body card-padding">
              <textarea class="wp-text" data-auto-size placeholder="Write Something..."></textarea>
              <div class="tab-content p-0">
                <div class="wp-media tab-pane" id="wpm-image"> Images - Coming soon... </div>
                <div class="wp-media tab-pane" id="wpm-video"> Video Links - Coming soon... </div>
                <div class="wp-media tab-pane" id="wpm-link"> Links - Coming soon... </div>
              </div>
            </div>
            <ul class="list-unstyled clearfix wpb-actions">
              <li class="wpba-attrs">
                <ul class="list-unstyled list-inline m-l-0 m-t-5">
                  <li><a data-wpba="image" data-toggle="tab" href="#" data-target="#wpm-image"><i class="zmdi zmdi-image"></i></a></li>
                  <li><a data-wpba="video" data-toggle="tab" href="#" data-target="#wpm-video"><i class="zmdi zmdi-play-circle"></i></a></li>
                  <li><a data-wpba="link" data-toggle="tab" href="#" data-target="#wpm-link"><i class="zmdi zmdi-link"></i></a></li>
                </ul>
              </li>
              <li class="pull-right">
                <button class="btn btn-primary btn-sm">Post</button>
              </li>
            </ul>
          </div>-->
          <div class="card">
            <div class="card-header">
              <div class="media">
                <div class="pull-left"> <img class="lv-img" src="images/img.jpg" alt=""> </div>
                <div class="media-body m-t-5">
                  <h2>Mallinda Hollaway <small>Posted on 31st Aug 2015 at 07:00</small></h2>
                </div>
              </div>
            </div>
            <div class="card-body card-padding">
              <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero, gravida vel diam ut, lobortis mollis quam. Morbi posuere egestas posuere. Curabitur in dui sollicitudin, lacinia magna at, laoreet sapien. Integer vitae eros nulla.</p>
              <?php
			  if($frndlist==1){
			  ?>
              <ul class="wall-attrs clearfix list-inline list-unstyled">
                <li class="wa-stats"> <span><i class="zmdi zmdi-comments"></i> 36</span> <span class="active"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 220</span> <span class=""><i class="fa fa-thumbs-down" aria-hidden="true"></i> 220</span> <span class="active"><i class="zmdi zmdi-share zmdi-hc-fw"></i> 220</span> </li>
              </ul>
              <a class="tvc-more" href="#"><i class="zmdi zmdi-mode-comment"></i> View all 54 Comments</a> </div>
              <?php }?>
            <div class="wall-comment-list"> 
              
              <!-- Comment Listing -->
              <div class="wcl-list">
                <div class="media"> <a href="#" class="pull-left"> <img src="images/img.jpg" alt="" class="lv-img-sm"> </a>
                  <div class="pull-right p-0">
                    <ul class="actions">
                      <li class="dropdown" dropdown=""> <a href="#" dropdown-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li> <a href="#">Report</a> </li>
                          <li> <a href="#">Delete</a> </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class="media-body"> <a href="#" class="a-title">David Nathan</a> <small class="c-gray m-l-10">3 mins ago...</small>
                    <p class="m-t-5 m-b-0">Maecenas dignissim in neque id commodo. Nam pretium a tortor a convallis. Curabitur in arcu quis nulla aliquam condimentum. Morbi eu cursus diam, vitae tristique dui.</p>
                  </div>
                </div>
              </div>
              
              <!-- Comment form -->
              <div class="wcl-form">
                <div class="wc-comment">
                  <div class="wcc-inner wcc-toggle"> Write Something... </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                            
                            
                            
                        </div>
                    </div>
      
    </div>
  </section>
</section>
<?php include('lib/footer.php')?>
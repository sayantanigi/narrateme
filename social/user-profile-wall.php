<?php 
include('lib/header.php');
socialcheck();
//sequre();
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
		//print_r($xm);
		//exit();
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
	//echo "DELETE from `na_frnd_reqst` where (`from_id`= ".$_SESSION['userid']." || `from_id`= ".$toid.") and (`to_id`=".$toid." || `to_id`=".$_SESSION['userid'].") and `frnd_status`=1";
	//exit();
	
		$result=mysql_query("DELETE from `na_frnd_reqst` where (`from_id`= ".$_SESSION['userid']." || `from_id`= ".$toid.") and (`to_id`=".$toid." || `to_id`=".$_SESSION['userid'].") and `frnd_status`=1");
	
	if($result){
		$response="Friend Remove From The List....";
	}
}
$viewmain = getAnyTableWhereData('na_social_profile', " AND user_id='".$view["userid"]."' ");

 $frndlist=checkExistance('na_frnd_reqst', " AND (from_id  ='".$_SESSION['userid']."' || to_id  ='".$_SESSION['userid']."') and  (to_id  = '".$view['id']."' || from_id  = '".$view['id']."') and `frnd_status`=2");

 $frndsendlist=checkExistance('na_frnd_reqst', " AND (from_id  ='".$_SESSION['userid']."' || to_id  ='".$_SESSION['userid']."') and  (to_id  = '".$view['id']."' || from_id  = '".$view['id']."') and `frnd_status`=1");
//exit();

$viewdeclinecheck=checkExistance('na_frnd_reqst', " AND from_id  ='".$_SESSION['userid']."' and  to_id  = '".$view['id']."' and `frnd_status`=0");
$count_connections=mysql_fetch_array(mysql_query("SELECT count(`id`) as connections FROM na_frnd_reqst WHERE (`from_id` =".$view['id']." OR `to_id` =".$view['id'].") AND `frnd_status` =2"));

//$viewrightsectionuserdata=getAnyTableWhereData('na_postdata', " AND from_id ='".$view['id']."'");
//==========================Like================================

			if($_REQUEST['post_id']!='') {
			$post_id = $_REQUEST['post_id'];
				
               	$like = "select * from `na_post_like_dislike` WHERE post_id = '".$_REQUEST['post_id']."' AND user = '".$_SESSION['userid']."'";
				$rslike = mysql_query($like);
				$rowlike = mysql_num_rows($rslike);
										
				if($rowlike==0)
							{
								 $inslike="insert into `na_post_like_dislike` set
																	post_id = '".$_REQUEST['post_id']."' ,
																	user = '".$_SESSION['userid']."' ,
																	likepost = '1' ,
																	status = 1";
								mysql_query($inslike);
								$deunlike=mysql_query("DELETE FROM `na_post_dislike` WHERE post_id=".$_REQUEST['post_id']." and `user` = ".$_SESSION['userid']."");
									
							}
				$valvalue='#'.$_REQUEST['val'];			
							
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='user-profile-wall.php?mess=likesuccessful&postid=".$_REQUEST['post_id']."& ".$valvalue."';\n";
				echo "</script>";
				exit();
							
			}
//===========================Like=================================
//==========================Unlike================================

			if($_REQUEST['postunlike_id']!='') {
			$postunlike_id = $_REQUEST['postunlike_id'];
				
               	$unlike = "select * from `na_post_dislike` WHERE post_id = '".$_REQUEST['postunlike_id']."' AND user = '".$_SESSION['userid']."'";
				$rsunlike = mysql_query($unlike);
				$rowunlike = mysql_num_rows($rsunlike);
										
				if($rowunlike==0)
							{
								  $insunlike="insert into `na_post_dislike` set
																	post_id = '".$_REQUEST['postunlike_id']."' ,
																	user = '".$_SESSION['userid']."' ,
																	dislike = 1 ,
																	status = 1";
								mysql_query($insunlike);
								$delike=mysql_query("DELETE FROM `na_post_like_dislike` WHERE post_id=".$_REQUEST['postunlike_id']." and `user` = ".$_SESSION['userid']."");
									
							}
				$valvalueun='#'.$_REQUEST['valun'];			
							
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='user-profile-wall.php?mess=unlike&postid=".$_REQUEST['postunlike_id']."& ".$valvalueun."';\n";
				echo "</script>";
				exit();
							
			}
//=======================Unlike=================================
//=======================Counting Number of Rows==============
$numrwsfrcss=checkExistance('na_post_like_dislike', " AND user  ='".$_SESSION['userid']."' AND likepost=1");
//=======================Counting Number of Rows==============
//==========================Post Comment========================
if(isset($_REQUEST['com_sub'])){

	 $insert = "INSERT INTO `na_post_reply` SET  from_id = '".$_SESSION['userid']."',
												 reply = '".$_REQUEST['reply']."',
	 											 post_id = '".$_REQUEST['id']."',
	 											 reply_date='".date('Y-m-d H:i:s')."',
	 											 status=1";

	$query_insert = mysql_query($insert) ;
	header('location:user-profile-wall.php?postid='.$_REQUEST['id'].'&comment=successful') ; 

}
//==========================Post Comment========================
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
								  if($frndsendlist >0 ){
								?>
                               <!-- href="user-profile-wall.php?unfrnd=1&to_id=<?php //echo base64_encode($view['id'])?>"-->
                               <?php
							   $sqlchkme = mysql_query("SELECT * FROM `na_frnd_reqst` WHERE from_id =".$view['id']." AND to_id =".$_SESSION['userid']." AND `frnd_status` =1");
							    $checkme=mysql_num_rows($sqlchkme);
								$rowchk=mysql_fetch_array($sqlchkme);
							   
							   ?>
                               <?php
							   if($checkme>0){
							   ?>
                              <div class="row">
                              	<div class="col-xs-6 req_btn">
                               <a href="<?php echo $current_url?>?op=acpt&to_id=<?php echo $_SESSION['userid']?>&from_id=<?php echo $view['id']?>&reqst_id=<?php echo $rowchk['id']?>" class="add_me" id="rsnd">
                                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Accept  </span>
                                </a>
                                </div>
                                <div class="col-xs-6 req_btn">
                                <a href="<?php echo $current_url?>?op=acpt&to_id=<?php echo $_SESSION['userid']?>&from_id=<?php echo $view['id']?>&reqst_id=<?php echo $rowchk['id']?>" class="add_me" id="rsnd">
                                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Decline  </span>
                                </a>
                                </div>
                                </div>
                                <?php
							   }else{
								?>
                                <a  class="add_me" id="rsnd">
                                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Request  Sent  </span>
                                </a>
                                <?php }?>
                                
                                <a  class="add_me" href="user-profile-wall.php?unfrnd=1&to_id=<?php echo base64_encode($view['id'])?>" id="unsndfrnd" style="display:none; margin-top:2px;">
                                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Remove Request  </span>
                                </a>
                                <script>
									$(document).ready(function(){
										$("#rsnd").click(function(){
											$("#unsndfrnd").toggle();
										});
									});
               					</script>
                                <?php
								 }else if($frndlist > 0){
								?>
                               
                                <a  class="add_me" id="frndsls">
                                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Friends </span>
                                </a>
                                <a  href=""  class="add_me" style="display:none; margin-top:2px;" id="unfrndls">
                                        <i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Unfriend </span>
                                </a>
                                
                                <script>
									$(document).ready(function(){
										$("#frndsls").click(function(){
											$("#unfrndls").toggle();
										});
									});
               					</script>
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
          <?php
			$ctn=1;
			$ctn1=1;
			$rightsidepostfetch="SELECT * FROM `na_postdata` WHERE from_id='".$view['id']."' LIMIT 0,3";
			$querypost=mysql_query($rightsidepostfetch);
			while($fetchpost=mysql_fetch_array($querypost)){
		 ?>
          <div class="card">
            <div class="card-header">
              <div class="media">
                <div class="pull-left"> <img class="lv-img" src="../admin/useravatar/fullsize/<?php echo $view['userImage']?>" alt=""> </div>
                <div class="media-body m-t-5">
                  <h2>
                    <?=$view['first_name']." ".$view['last_name']?>
                    <small>Posted on
                    <?=date("jS M Y",strtotime($fetchpost['post_date']))?>
                    at
                    <?=date("H:i:s",strtotime($fetchpost['post_date']))?>
                    </small></h2>
                </div>
              </div>
            </div>
            <div class="card-body card-padding">
              <p>
                <?=$fetchpost['post_details']?>
              </p>
              <?php
			  if($frndlist==1){
			  ?>
              <?php 
			//=====for no of likecount========
			$nooflike=mysql_fetch_array(mysql_query("SELECT count(likepost) as countlike FROM `na_post_like_dislike` WHERE `post_id`=".$fetchpost['pid'].""));
			//=====for no of likecount========
			//=====for no of unlikecount======
			$noofunlike=mysql_fetch_array(mysql_query("SELECT count(dislike) as countunlike FROM `na_post_dislike` WHERE `post_id`=".$fetchpost['pid'].""));
			//=====for no of unlikecount======
			$countpst=checkExistance('na_post_reply', " AND post_id='".$fetchpost["pid"]."'")
			?>
              <ul class="wall-attrs clearfix list-inline list-unstyled">
                <li class="wa-stats">
                <li class="wa-stats"> <span><i class="zmdi zmdi-comments"></i><?php echo $countpst;?></span> <span class="<?php if($numrwsfrcss>0) {?>active<?php }?>"><a href="user-profile-wall.php?post_id=<?=$fetchpost['pid']?>&val=<?php echo $ctn?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i><?php echo $nooflike['countlike'];?></a></span> <span class=""><a href="user-profile-wall.php?postunlike_id=<?=$fetchpost['pid']?>&valun=<?php echo $ctn1?>"><i class="fa fa-thumbs-down" aria-hidden="true"></i><?php echo $noofunlike['countunlike'];?></a></span>
              </ul>
            </div>
            <div class="wall-comment-list"> 
              <!-- Comment Listing -->
              <div id="cmtwrapper">
                <?php
				  $comment="SELECT m.*, pr.* FROM `na_member` as m INNER JOIN `na_post_reply` as pr on m.id=pr.from_id WHERE pr.post_id=".$fetchpost['pid']."  ORDER BY pr.id";
				  $commentfetch=mysql_query($comment);
				  while($fetchcmnt=mysql_fetch_array($commentfetch)){
			    ?>
               <div id="sd" class="wcl-list" style="margin-bottom:20px;">
               <div class="media"> 
               <a href="#" class="pull-left"><img src="../admin/useravatar/fullsize/<?=$fetchcmnt['userImage']?>" alt="" class="lv-img-sm"></a>
                    <div class="media-body"> <a href="#" class="a-title">
                      <?=$fetchcmnt['first_name']." ".$fetchcmnt['last_name']?>
                      </a> <small class="c-gray m-l-10">
                      <?=date("jS M Y",strtotime($fetchcmnt['reply_date']))?>
                      &nbsp; at &nbsp;
                      <?=date("h:i A",strtotime($fetchcmnt['reply_date']))?>
                      </small>
                      <p class="m-t-5 m-b-0">
                        <?=$fetchcmnt['reply']?>
                      </p>
                    </div>
                  </div>
                </div>
                
                <?php }?>
              </div>
            </div>
            <form role="form" name="comment_form" action="<?=$_SERVER['PHP_SELF']?>" style="padding:20px;">
              <input type="hidden" name="id" value="<?=$fetchpost['pid']?>"/>
              <div class="wcl-form">
                <div class="wc-comment">
                  <div class="wcc-inner">
                    <textarea class="wcci-text auto-size" placeholder="Write Something..." name="reply"></textarea>
                  </div>
                  <div class="m-t-15">
                    <button class="btn btn-sm btn-primary" type="submit" name="com_sub">Post</button>
                  </div>
                </div>
              </div>
            </form>
           </div> 
            <?php }?>
            <?php $ctn++;}?>
          
        </div>
      </div>
      
    </div>
    </div>
  </section>
</section>
<?php include('lib/footer.php')?>
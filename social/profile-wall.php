<?php include('lib/header.php');
socialcheck();
//sequre();
//==========================Adding Post=========================
if(isset($_POST['postcmt'])){

	strip_tags(mysql_real_escape_string(extract($_POST)));
	
	$data=array('from_id'=>$_SESSION['userid'],'post_details'=>$post_details,'post_date'=>date('Y-m-d H:i:s'),'status'=>1);
	
	$result=insertData($data, 'na_postdata');
	$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	header("location:".$actual_link."?post=add");

	}
//==========================Adding Post=========================

//==========================Post Comment========================
if(isset($_REQUEST['com_sub'])){
	$valvalue='#'.$_REQUEST['pos'];

	 $insert = "INSERT INTO `na_post_reply` SET  from_id = '".$_SESSION['userid']."',
												 reply = '".$_REQUEST['reply']."',
	 											 post_id = '".$_REQUEST['id']."',
	 											 reply_date='".date('Y-m-d H:i:s')."',
	 											 status=1";

	$query_insert = mysql_query($insert) ;
	header('location:profile-wall.php?postid='.$_REQUEST['id'].'&comment=successful&pst='.$_REQUEST['pos'].'&'.$valvalue) ; 

}
//==========================Post Comment========================
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
				$valvalue='#'.$_REQUEST['pos'];			
							
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='profile-wall.php?mess=likesuccessful&postid=".$_REQUEST['post_id']."& ".$valvalue."';\n";
				echo "</script>";
				exit();
							
			}
//=======================Like=================================
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
																	dislike = '1' ,
																	status = 1";
								mysql_query($insunlike);
								$delike=mysql_query("DELETE FROM `na_post_like_dislike` WHERE post_id=".$_REQUEST['postunlike_id']." and `user` = ".$_SESSION['userid']."");
									
							}
				$valvalueun='#'.$_REQUEST['pos'];			
							
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='profile-wall.php?mess=unlike&postid=".$_REQUEST['postunlike_id']."& ".$valvalueun."';\n";
				echo "</script>";
				exit();
							
			}
//=======================Unlike=================================
//=======================Counting Number of Rows==============
$numrwsfrcss=checkExistance('na_post_like_dislike', " AND user  ='".$_SESSION['userid']."' AND likepost=1");
//=======================Counting Number of Rows==============		
//$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");

?>

<section id="main">
  <?php include('lib/aside.php');?>

  <section id="content">
    <div class="container c-alt">
      <div class="block-header">
        <h2>Wall <!--<small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. .</small>--></h2>
        <?php 
		if($_REQUEST['post']=="add"){
		?>
        <h2 style="color:#D18C13; font-size:15px;">Posted Successfully!</h2>
        <?php } ?>
        <?php 
		if($_REQUEST['comment']=="successful"){
		?>
        <h2 style="color:#D18C13; font-size:15px;">Comment Posted Successfully!</h2>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-md-8">
          <form  name="frmpost" method="post" action="<?=$_SERVER['PHP_SELF']?>">
            <input type="hidden" value="<?=$_SESSION['userid']?>">
            <div class="card wall-posting">
              <div class="card-body card-padding">
                <textarea class="wp-text" name="post_details" data-auto-size placeholder="Write Something..."></textarea>
                <!--<div class="tab-content p-0">
                <div class="wp-media tab-pane" id="wpm-image"> Images - Coming soon... </div>
                <div class="wp-media tab-pane" id="wpm-video"> Video Links - Coming soon... </div>
                <div class="wp-media tab-pane" id="wpm-link"> Links - Coming soon... </div>
              </div>--> 
              </div>
              <ul class="list-unstyled clearfix wpb-actions">
                <li class="pull-right">
                  <button class="btn btn-primary btn-sm" type="submit" name="postcmt" value="Submit">Post</button>
                </li>
              </ul>
            </div>
          </form>
          <?php 
		  //==========================Wall Posts==========================
		  	$ctn = 1;
			$ctn1 = 1;
			//echo "SELECT * FROM `na_frnd_reqst` WHERE ( `to_id` =".$_SESSION['userid']." || `from_id` =".$_SESSION['userid'].") AND `frnd_status` =2";
			$checkfrndlst=mysql_query("SELECT * FROM `na_frnd_reqst` WHERE ( `to_id` =".$_SESSION['userid']." || `from_id` =".$_SESSION['userid'].") AND `frnd_status` =2");
			$countcheck=mysql_num_rows($checkfrndlst);
			if($countcheck==0){
				$sql1=mysql_fetch_array(mysql_query("SELECT * from `na_member` where id=".$_SESSION['userid'].""));
				$fetchposts = "SELECT * FROM na_postdata WHERE from_id =".$sql1['id']."";
			}else{
				$fetchfrndlst=mysql_fetch_array($checkfrndlst);
				$sql1=mysql_fetch_array(mysql_query("SELECT * from `na_member` where id=".$fetchfrndlst['from_id']." || id=".$fetchfrndlst['to_id'].""));
				$num = array( $fetchfrndlst['from_id'], $fetchfrndlst['to_id']);
				foreach ($num as $number)
				{
					$eNum = implode(' ,',$num);
				}
			
				  $fetchposts = "SELECT * FROM na_postdata WHERE from_id IN(".$eNum.") order by pid desc ";
			}	
				$GetQuery = mysql_query($fetchposts) or die(mysql_error());
				while($rowdest  = mysql_fetch_array($GetQuery)){
				$viewmember=getAnyTableWhereData('na_member', " AND id='".$rowdest["from_id"]."' ");
				if($viewmember['userImage'] == "")
				{
				$pic = "images/no-pic.png";
				}
				else if(!is_file("../useravatar/fullsize/".$viewmember['userImage']))
				{
				$pic = "images/no-pic.png";
				}
				else
				{
				$pic = "../useravatar/fullsize/".$viewmember['userImage'];
				}
			//==========================Wall Posts==========================
		  ?>
          <div class="card" id="<?php echo $ctn;?>">
            <div class="card-header">
              <div class="media">
                <div class="pull-left"> 
                  <!--<img class="lv-img" src="<?=$pic?>" style="height:50px; width:50px;" alt="">--> 
                  <img class="lv-img" src="../admin/useravatar/fullsize/<?php echo $viewmember['userImage']?>" alt=""> </div>
                <div class="media-body m-t-5">
                  <h2>
                    <?=$viewmember['first_name']." ".$viewmember['last_name']?>
                    <small>Posted on
                    <?=date("jS M Y",strtotime($rowdest['post_date']))?>
                    at
                    <?=date("H:i:s",strtotime($rowdest['post_date']))?>
                    </small></h2>
                </div>
              </div>
            </div>
            <div class="card-body card-padding">
              <p>
              <?=$rowdest['post_details']?>
              <?php 
			  $countpst=checkExistance('na_post_reply', " AND post_id='".$rowdest["pid"]."'")
			  ?>
              </p>
              <ul class="wall-attrs clearfix list-inline list-unstyled">
                <li class="wa-stats"> <span><i class="zmdi zmdi-comments"></i><?php echo $countpst;?></span>
                <?php if($_REQUEST['postid']==$rowdest['pid']) { ?>
                <a name="<?php echo $ctn?>">&nbsp;</a>
                <?php } ?> 
			<?php 
            //=====for no of likecount========
            $nooflike=mysql_fetch_array(mysql_query("SELECT count(likepost) as countlike FROM `na_post_like_dislike` WHERE `post_id`=".$rowdest['pid'].""));
            //=====for no of likecount========
            //=====for no of unlikecount======
            $noofunlike=mysql_fetch_array(mysql_query("SELECT count(dislike) as countunlike FROM `na_post_dislike` WHERE `post_id`=".$rowdest['pid'].""));
            //=====for no of unlikecount======
            ?>
            
            <span class="<?php if($numrwsfrcss>0) {?>active<?php }?>"><a name="<?php echo $rowdest['pid']?>" href="profile-wall.php?post_id=<?=$rowdest['pid']?>&val=<?php echo $rowdest['pid']?>&pos=<?php echo $ctn;?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i><?php echo $nooflike['countlike'];?></a></span> 
            
            <span class=""><a href="profile-wall.php?postunlike_id=<?=$rowdest['pid']?>&valun=<?php echo $ctn1?>&pos=<?php echo $ctn;?>"><i class="fa fa-thumbs-down" aria-hidden="true"></i><?php echo $noofunlike['countunlike'];?></a></span>
             
                </li>
              </ul>
            </div>
            <div class="wall-comment-list"> 
              <!-- Comment Listing -->
              <a id="cmt<?=$ctn;?>" style="margin-bottom:20px;"><i class="zmdi zmdi-mode-comment"></i>View Comments</a>
              <div id="cmtwrapper<?=$ctn;?>" style="display:none;">
              <?php 
				  $comment="SELECT m.*, pr.* FROM `na_member` as m INNER JOIN `na_post_reply` as pr on m.id=pr.from_id WHERE pr.post_id=".$rowdest['pid']."";
				  $commentfetch=mysql_query($comment);
				  while($fetchcmnt=mysql_fetch_array($commentfetch)){
				?>
              <div class="wcl-list" style="margin-bottom:20px;">
                <div class="media"> <a href="#" class="pull-left"><img src="../admin/useravatar/fullsize/<?=$fetchcmnt['userImage']?>" alt="" class="lv-img-sm"></a>
                  <div class="pull-right p-0">
                    <ul class="actions">
                    </ul>
                  </div>
                  <div class="media-body"> <a href="#" class="a-title">
                    <?=$fetchcmnt['first_name']." ".$fetchcmnt['last_name']?>
                    </a> 
                    <small class="c-gray m-l-10">
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
              
               
              <?php } ?>
               </div>
              <form role="form" name="comment_form" action="<?=$_SERVER['PHP_SELF']?>">
                <input type="hidden" name="id" value="<?=$rowdest['pid']?>"/>
                <input type="hidden" name="pos" value="<?=$ctn?>"/>
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
          </div>
          <script>
               		$(document).ready(function(){
                	$("#cmt<?=$ctn?>").click(function(){
					$("#cmtwrapper<?=$ctn?>").toggle();
                	});
                });
                </script>
          <?php $ctn++; } ?>
          <?php
		  if($_REQUEST['pst']){
		  ?>
           <script>
               		$(document).ready(function(){
                	$("#cmtwrapper<?=$_REQUEST['pst']?>").show();
                });
                </script>
          <?php }?>      
        </div>
        <div class="col-md-4 hidden-sm">
          <div class="card">
            <div class="card-header">
              <h2>About me</h2>
            </div>
            <div class="card-body card-padding"> 
            <?php 
				$view=getAnyTableWhereData('na_social_profile', " AND user_id=".$_SESSION["userid"]." ");
				$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");
			?>
			<?php echo $view['description'];?><a data-ui-sref="" href="profile-about.php"><small> &nbsp;Read more...</small></a> </div>
          </div>
          
          <div class="card">
            <div class="card-header">
             <!-- <h2>Contact Information <small>Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero</small></h2>-->
            </div>
            <div class="card-body card-padding">
              <div class="pmo-contact">
                <ul>
                  <li class="ng-binding"><i class="zmdi zmdi-email"></i> <?php echo $viewmember['email']?></li>
                  <li class="ng-binding"><i class="zmdi zmdi-facebook-box"></i> <?php echo $view['social_link']?></li>
                  <li class="ng-binding"><i class="zmdi zmdi-twitter"></i> <?php echo $view['social_twitter']?></li>
                  <li> <i class="zmdi zmdi-pin"></i>
                    <address class="m-b-0 ng-binding">
                    <?php echo $viewmember['address']?>,<br>
                    <?php echo $viewmember['city']?>,<br>
                    <?php echo $viewmember['state']?>,<br>
                    <?php echo $viewmember['zip_code']?>
                    </address>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>

<?php include('lib/footer.php')?>
<?php 
include('lib/header.php');
socialcheck();
sequre();
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

	 $insert = "INSERT INTO `na_post_reply` SET  from_id = '".$_SESSION['userid']."',
												 reply = '".$_REQUEST['reply']."',
	 											 post_id = '".$_REQUEST['id']."',
	 											 reply_date='".date('Y-m-d H:i:s')."',
	 											 status=1";

	$query_insert = mysql_query($insert) ;
	header('location:profile-wall.php?postid='.$_REQUEST['id'].'&comment=successful') ; 

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
									
							}
				$valvalue='#'.$_REQUEST['val'];			
							
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='profile-wall.php?mess=likesuccessful&postid=".$_REQUEST['post_id']."& ".$valvalue."';\n";
				echo "</script>";
				exit();
							
			}
//=======================Like=================================			
?>

<section id="main">
  <?php include('lib/aside.php');?>
  <section id="content">
    <div class="container c-alt">
      <div class="block-header">
        <h2>Wall <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. .</small></h2>
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
			 $sql=mysql_fetch_array(mysql_query("SELECT * from `na_frnd_reqst` where from_id=".$_SESSION['userid']." and `frnd_status`=1"));	
			$sql1=mysql_fetch_array(mysql_query("SELECT * from `na_member` where id=".$sql['from_id']." || id=".$sql['to_id'].""));
			
			$num = array( $sql['from_id'], $sql['to_id']);
				foreach ($num as $number)
				{
					$eNum = implode(' ,',$num);
				}
				$fetchposts = "SELECT * FROM na_postdata WHERE from_id IN(".$eNum.")";
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
          <div class="card">
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
				//echo "SELECT count(likepost) as countlike FROM `na_post_like_dislike` WHERE `post_id`=".$rowdest['pid']."";
				$nooflike=mysql_fetch_array(mysql_query("SELECT count(likepost) as countlike FROM `na_post_like_dislike` WHERE `post_id`=".$rowdest['pid'].""));
				
				//echo "SELECT pld.*, pd.* FROM `na_post_like_dislike` as pld INNER JOIN `na_postdata` as pd on pd.pid=pld.post_id";
				?>
                <span class="active"><a href="profile-wall.php?post_id=<?=$rowdest['pid']?>&val=<?php echo $ctn?>"><i class="fa fa-thumbs-up" aria-hidden="true"></i><?php echo $nooflike['countlike'];?></a></span> 
                <span class=""><i class="fa fa-thumbs-down" aria-hidden="true"></i> 220</span> 
                </li>
              </ul>
            </div>
            <div class="wall-comment-list"> 
              <!-- Comment Listing -->
              <a id="cmt<?=$ctn;?>" style="margin-bottom:20px;"><i class="zmdi zmdi-mode-comment"></i>View all</a>
              <div id="cmtwrapper<?=$ctn;?>" style="display:none;">
              <?php 
				  $comment="SELECT m.*, pr.* FROM `na_member` as m INNER JOIN `na_post_reply` as pr on m.id=pr.from_id WHERE pr.post_id=".$rowdest['pid']."";
				  $commentfetch=mysql_query($comment);
				  while($fetchcmnt=mysql_fetch_array($commentfetch)){
				?>
              <div id="sd<?=$ctn;?>" class="wcl-list" style="margin-bottom:20px;">
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
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
              <script>
               		$(document).ready(function(){
                		$("#cmt<?=$ctn;?>").click(function(){
						$("#cmtwrapper<?=$ctn;?>").toggle();
                	});
                });
                </script>
               
              <?php $ctn++;} ?>
               </div>
              <!-- Comment form --> 
              <!--<div class="wcl-form">
                <div class="wc-comment">
                  <div class="wcc-inner wcc-toggle"> Write Something... </div>
                </div>
              </div>-->
              <form role="form" name="comment_form" action="<?=$_SERVER['PHP_SELF']?>">
                <input type="hidden" name="id" value="<?=$rowdest['pid']?>"/>
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
          <?php $ctn++; } ?>
        </div>
        <div class="col-md-4 hidden-sm">
          <div class="card">
            <div class="card-header">
              <h2>About me</h2>
            </div>
            <div class="card-body card-padding"> Maecenas malesuada. Nam adipiscing. Etiam vitae tortor. Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem. <a data-ui-sref="" href="profile-about.html"><small>Read more...</small></a> </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h2>Recent Comments <small>Commodo vel pharetra nisi. Donec velit libero</small></h2>
            </div>
            <div class="listview">
              <div class="lv-body"> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">David Belle</div>
                    <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small> </div>
                </div>
                </a> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">Jonathan Morris</div>
                    <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small> </div>
                </div>
                </a> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">Fredric Mitchell Jr.</div>
                    <small class="lv-small">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small> </div>
                </div>
                </a> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">Glenn Jecobs</div>
                    <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small> </div>
                </div>
                </a> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">Bill Phillips</div>
                    <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small> </div>
                </div>
                </a> </div>
              <a class="lv-footer" href="">View All</a> </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h2>Contact Information <small>Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero</small></h2>
            </div>
            <div class="card-body card-padding">
              <div class="pmo-contact">
                <ul>
                  <li class="ng-binding"><i class="zmdi zmdi-phone"></i> 00971123456789</li>
                  <li class="ng-binding"><i class="zmdi zmdi-email"></i> abc.h@gmail.com</li>
                  <li class="ng-binding"><i class="zmdi zmdi-facebook-box"></i> abc.hollaway</li>
                  <li class="ng-binding"><i class="zmdi zmdi-twitter"></i> @abc (twitter.com/abc)</li>
                  <li> <i class="zmdi zmdi-pin"></i>
                    <address class="m-b-0 ng-binding">
                    44-46 Morningside Road,<br>
                    Edinburgh,<br>
                    Scotland
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
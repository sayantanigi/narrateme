<?php include('lib/header.php');
socialcheck();
$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");
/*if(isset($_REQUEST['postmessage'])){
	$url='user-chat.php?profchatid='.$_REQUEST['to_id'].'';
	$message=$_REQUEST['message'];
	$data=array('from_id'=>$_SESSION['userid'],'to_id'=>$_REQUEST['to_id'],'message'=>mysql_real_escape_string(stripcslashes($message)),'post_date_time'=>date('Y-m-d H:i:s'),'status'=>1);
	
	$result=insertData($data,'na_message') ;
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='".$url."';\n";
		echo "</script>";
}*/

?>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script>
	function sendData(profchatid)
	{
		var mesg=$("#postmessagedata").val(); 
		var regData=profchatid+"~"+mesg;
		//var data = new FormData($('#myFOrm')[0]);//this will select all the form data in the data variable.
 		
		$.ajax({
			type:"POST",
			url:"insertmsg.php",
			
			data: 'data='+regData,
			async:true,
/*            cache: false,
            processData: false,*/
			success:function(dta)
			{
				$('#mypostmessage').html(dta);
				document.getElementById("postmessagedata").innerHTML='';
				
			}
 
		});
	}
 
	</script>
<section id="main">
  <?php include('lib/aside.php');?>
  <section id="content">
                <div class="container">
                    <div class="block-header">
                        <h2>Messages</h2>
                    </div>
                    <div class="card m-b-0" id="messages-main">
                        <div class="ms-menu">
                            <div class="ms-block">
                                <div class="ms-user">
                                   <img src="../admin/useravatar/fullsize/<?php echo $viewmember['userImage']?>" alt=""> 
                                    <div>Signed in as <br/> <?php echo $viewmember['email']?></div>
                                </div>
                            </div>
                            
                            <div class="ms-block">
                                <div class="dropdown">
                                    <a class="btn btn-primary btn-block" href="#" data-toggle="dropdown">Messages <i class="caret m-l-5"></i></a>

                                    <!--<ul class="dropdown-menu dm-icon w-100">
                                        <li><a href="#"><i class="zmdi zmdi-email"></i> Messages</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-account"></i> Contacts</a></li>
                                        <li><a href="#"><i class="zmdi zmdi-format-list-bulleted"> </i>Todo Lists</a></li>
                                    </ul>-->
                                </div>
                            </div>
                            <div class="listview lv-user m-t-20">
                            	<?php
								$frndlst=mysql_query("SELECT * FROM `na_frnd_reqst` WHERE (`to_id` =".$_SESSION['userid']." || `from_id`=".$_SESSION['userid'].") AND `frnd_status` =2");
								if(mysql_num_rows($frndlst)>0){
									while($rowlist=mysql_fetch_array($frndlst)){
						 if($rowlist['from_id']==$_SESSION['userid']){
						 $friendid=$rowlist["to_id"];
						
					}else{
						$friendid=$rowlist["from_id"];
					}
										$viewmemberfrnd=getAnyTableWhereData('na_member', " AND id='".$friendid."' ");
										$viewsocial=getAnyTableWhereData('na_social_profile', " AND user_id='".$viewmemberfrnd["id"]."' ");
								?>
                                <a href="user-chat.php?profchatid=<?php echo $viewsocial['user_id']?>">
                                <div class="lv-item media active">
                                    <div class="lv-avatar pull-left">
                                    	<?php if($viewmemberfrnd['userImage']!=''){?>
                							<img src="../admin/useravatar/fullsize/<?php echo $viewmemberfrnd['userImage']?>" alt=""> 
											<?php }else{
                                            if($viewmemberfrnd['gender']=='Male'){
                                            ?>
                        					<img src="images/avatar-img-1.png" alt="">
                        					<?php }else{?>
                        					<img src="images/avatar-img-3.png" alt="">
                        					<?php }?>
                    					<?php }?>
                                        <!--<img src="images/img.jpg" alt="">-->
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title"><?php echo $viewsocial['myname']." ".$viewsocial['last_name']?></div>
                                        <div class="lv-small"><?php echo substr($viewsocial['description'],0,60)?></div>
                                    </div>
                                </div>
                                </a>
                                <?php
									}
								}
								?>
                              </div>

                            
                        </div>
                        
                        <div class="ms-body">
                            <div class="listview lv-message">
                                <div class="lv-header-alt clearfix">
                                    <div id="ms-menu-trigger">
                                        <div class="line-wrap">
                                            <div class="line top"></div>
                                            <div class="line center"></div>
                                            <div class="line bottom"></div>
                                        </div>
                                    </div>

                                    <!--<div class="lvh-label hidden-xs">
                                        <div class="lv-avatar pull-left">
                                            <img src="images/img.jpg" alt="">
                                        </div>
                                        <span class="c-black">David Parbell</span>
                                    </div>-->
                                    
                                    <!--<ul class="lv-actions actions">
                                        <li>
                                            <a href="#">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="zmdi zmdi-check"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="zmdi zmdi-time"></i>
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown" aria-expanded="true">
                                                <i class="zmdi zmdi-sort"></i>
                                            </a>
                                
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="#">Latest</a>
                                                </li>
                                                <li>
                                                    <a href="#">Oldest</a>
                                                </li>
                                            </ul>
                                        </li>                             
                                        <li class="dropdown">
                                            <a href="#" data-toggle="dropdown" aria-expanded="true">
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                                
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="#">Refresh</a>
                                                </li>
                                                <li>
                                                    <a href="#">Message Settings</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>-->
                                </div>
                                
                                <div class="lv-body" id="mypostmessage">  
                                	<?php
									$sqlmessagelist=mysql_query("SELECT * from `na_message` where (`from_id`=".$_SESSION['userid']." || `to_id`=".$_SESSION['userid'].") and (`to_id`=".$_REQUEST['profchatid']." || `from_id`=".$_REQUEST['profchatid'].") and `status`=1 ");
									$counter=1;
									while($rowmsglist=mysql_fetch_array($sqlmessagelist)){
									?>
                                    <div class="lv-item media <?php if($rowmsglist['from_id']==$_SESSION['userid']){ }else{?>right<?php }?>">
                                        <div class="lv-avatar pull-left">
                                        	<?php 
											$viewavatar=getAnyTableWhereData('na_member', " AND id='".$rowmsglist["from_id"]."' ");
											?>
                                            <img src="../admin/useravatar/fullsize/<?php echo $viewavatar['userImage']?>" alt=""> 
                                        </div>
                                        <div class="media-body">
                                            <div class="ms-item">
                                                <?php echo strip_tags($rowmsglist['message']);?>
                                            </div>
                                            <small class="ms-date"><i class="zmdi zmdi-time"></i> <?php echo date('d/m/Y',strtotime($rowmsglist['post_date_time']))?> at <?php echo date('H:i:A',strtotime($rowmsglist['post_date_time']))?></small>
                                        </div>
                                    </div>
                                    <?php }?>
                                    
                                    
                                   <!-- <div class="lv-item media right">
                                        <div class="lv-avatar pull-right">
                                            <img src="images/img.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="ms-item">
                                                Mauris volutpat magna nibh, et condimentum est rutrum a. Nunc sed turpis mi. In eu massa a sem pulvinar lobortis.
                                            </div>
                                            <small class="ms-date"><i class="zmdi zmdi-time"></i> 20/02/2015 at 09:30</small>
                                        </div>
                                    </div>
                                    
                                    <div class="lv-item media">
                                        <div class="lv-avatar pull-left">
                                            <img src="images/img.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="ms-item">
                                                Etiam ex arcumentum
                                            </div>
                                            <small class="ms-date"><i class="zmdi zmdi-time"></i> 20/02/2015 at 09:33</small>
                                        </div>
                                    </div>
                                    
                                    <div class="lv-item media right">
                                        <div class="lv-avatar pull-right">
                                            <img src="images/img.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="ms-item">
                                                Etiam nec facilisis lacus. Nulla imperdiet augue ullamcorper dui ullamcorper, eu laoreet sem consectetur. Aenean et ligula risus. Praesent sed posuere sem. Cum sociis natoque penatibus et magnis dis parturient montes,
                                            </div>
                                            <small class="ms-date"><i class="zmdi zmdi-time"></i> 20/02/2015 at 10:10</small>
                                        </div>
                                    </div>
                                    
                                    <div class="lv-item media">
                                        <div class="lv-avatar pull-left">
                                            <img src="images/img.jpg" alt="">
                                        </div>
                                        <div class="media-body">
                                            <div class="ms-item">
                                                Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam ac tortor ut elit sodales varius. Mauris id ipsum id mauris malesuada tincidunt. Vestibulum elit massa, pulvinar at sapien sed, luctus vestibulum eros. Etiam finibus tristique ante, vitae rhoncus sapien volutpat eget
                                            </div>
                                            <small class="ms-date"><i class="zmdi zmdi-time"></i> 20/02/2015 at 10:24</small>
                                        </div>
                                    </div>-->
                                </div>
                                
                                <div class="lv-footer ms-reply">
                               <form id="myFOrm" method="post">
                                    <textarea placeholder="What's on your mind..." id="postmessagedata" name="message"></textarea>
                                    <button type="button" name="postmessage" onClick="sendData(<?php echo $_GET['profchatid']?>)"><i class="zmdi zmdi-mail-send"></i></button>
                                    <!--<input type="button" onclick = "sendData()" name="submit" value="submit">-->
                                    <input type="hidden"  name="to_id" value="<?php echo $_GET['profchatid']?>">
                                 </form>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</section>
<?php include('lib/footer.php')?>
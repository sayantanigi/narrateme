<?php include('lib/header.php');
socialcheck();
if(isset($_REQUEST['unfriend'])) {
    $result=mysqli_query($con, "DELETE from `na_frnd_reqst` where (`from_id`= ".$_SESSION["userid"]." || `to_id`= ".$_SESSION["userid"].") and (`from_id`=".$_REQUEST['from_id']." || `to_id`=".$_REQUEST['from_id'].") and `frnd_status`=2");
	if($resultupdatefrnd) {
		$respondfrndmsg="Friend Removed From The List ...";
	}
}
?>
<section id="main">
    <?php include('lib/aside.php');?>
    <section id="content">
        <div class="container c-alt">
            <div class="block-header">
                <h2>Connected Member
                    <?php if(@$respondfrndmsg!='') { ?>
                    <small style="color: #f44336;"><?php echo @$respondfrndmsg;?></small>
                    <?php } ?>
                </h2>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card wall-posting">
                        <div class="p-header">
                            <ul class="p-menu">
                                <li><a href="#"><i class="zmdi zmdi-accounts hidden-xs"></i> Connected Member</a></li>
                            </ul>
                            <ul class="actions m-t-20 hidden-xs">
                                <li class="dropdown"> <a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li> <a href="#">Refresh</a> </li>
                                        <li> <a href="#">Settings</a> </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pmb-block">
                        <div class="contacts c-profile clearfix row">
                            <?php $frndlst=mysqli_query($con, "SELECT * FROM `na_frnd_reqst` WHERE (`from_id` =".$_SESSION['userid']." || `to_id` =".$_SESSION['userid'].") AND `frnd_status` =2");
                            if(mysqli_num_rows($frndlst) > 0) {
				            while($rowlist=mysqli_fetch_array($frndlst)) {
                            if($rowlist['from_id']==$_SESSION['userid']) {
                                $friendid=$rowlist["to_id"];
                            } else {
                                $friendid=$rowlist["from_id"];
                            }
        					$viewmemberfrnd=getAnyTableWhereData('na_member', " AND id='".$friendid."' ")."";
        					$viewmemberfrnd= mysqli_fetch_array(mysqli_query($con, "SELECT * from `na_member` where `id` =".$friendid.""));
                            ?>
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="c-item"> 
                                    <a href="member_list_profile.php?searchmember=<?php echo $viewmemberfrnd['id']?>" class="ci-avatar"> 
                                    <?php if(@$viewmemberfrnd['userImage']!='') { ?>
                                    <img src="../admin/useravatar/fullsize/<?php echo @$viewmemberfrnd['userImage']?>" alt="" style="height:136px;" title="<?php echo @$viewmemberfrnd['first_name']." ".@$viewmemberfrnd['last_name']?>"> 
                                    <?php } else {
                                        if(@$viewmemberfrnd['gender']=='Male') { ?>
                                        <img src="images/avatar-img-1.png" alt="">
                                        <?php } else {?>
                                        <img src="images/avatar-img-3.png" alt="">
                                        <?php } } ?>
                                    </a>
                                    <div class="c-info"> <strong><?php echo @$viewmemberfrnd['first_name']." ".@$viewmemberfrnd['last_name']?></strong> <small><?php echo @$viewmemberfrnd['email']?></small> </div>
                                    <div class="c-footer">
                                        <button class="waves-effect" id="showopt<?php echo $rowlist['id']?>"><i class="zmdi zmdi-face-add"></i> Friend</button>
                                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                            <button style="display:none; margin-top:2px;" type="submit" name="unfriend" onclick="return confirm('Are you sure you want to unfriend !!! ')"  class="waves-effect" id="remove<?php echo $rowlist['id']?>"><i class="zmdi zmdi-face-add"></i> Unfriend</button>
                                            <input type="hidden" name="id" value="<?php echo $rowlist['id']?>">
                                            <input type="hidden" name="to_id" value="<?php echo $rowlist['to_id']?>">
                                            <input type="hidden" name="from_id" value="<?php echo $rowlist['from_id']?>">
                                        </form>
                                        <script>
                                   		$(document).ready(function(){
                                    		$("#showopt<?php echo $rowlist['id']?>").click(function(){
                    							$("#remove<?php echo $rowlist['id']?>").toggle();
                                    		});
                                    	});
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <?php }
                            } else { ?> 
                            <div class="col-md-3 col-sm-4 col-xs-6">
                                <div class="c-item"> 
                                    <div class="c-info"> <strong>No Record Find</strong>  </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <div class="load-more"> <a href="#"><i class="zmdi zmdi-refresh-alt"></i> Load More...</a> </div>
                    </div>
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
			             <?php echo $view['description'];?><a data-ui-sref="" href="profile-about.php"><small> &nbsp;Read more...</small></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"></div>
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
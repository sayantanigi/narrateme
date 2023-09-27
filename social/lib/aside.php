<?php $viewloginm = getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' "); ?>
<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu"> 
        <a href="#">
            <div class="profile-pic text-center"> 
                <?php if($viewmemberlogin['userImage']!='') { ?>
                <img  src="../admin/useravatar/fullsize/<?php echo $viewmemberlogin['userImage']?>" alt=""> 
                <?php } else { ?>
                <img  src="../img/no-image.png" alt=""> 
                <?php } ?>
            </div>
            <div class="profile-info"> <?php echo $viewloginm['first_name']." ".$viewloginm['last_name']?><i class="zmdi zmdi-caret-down"></i> </div>
        </a>
        <ul class="main-menu ">
            <li> <a href="profile-about.php"> View Profile</a> </li>
            <li> <a href="../logout.php"> Logout</a> </li>
        </ul>
    </div>
    <ul class="main-menu social_page_menu">
        <li><a href="../dashboard.php"> Main Home <i class="zmdi zmdi-home zmdi-hc-fw"></i></a></li>
        <li><a href="profile-wall.php"> Wall Page <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i></a></li>
        <?php $msgsql=mysqli_query($con, "SELECT * FROM `na_frnd_reqst` WHERE (`to_id` =".$_SESSION['userid']." || `from_id`=".$_SESSION['userid'].") AND `frnd_status` =2");
        $countmsgfrnd=mysqli_num_rows($msgsql);
        $frndlstfrmsg=mysqli_fetch_array($msgsql);
		if(@$frndlstfrmsg['from_id']==$_SESSION['userid']){
            @$friendid=$frndlstfrmsg["to_id"];
		} else {
			@$friendid=$frndlstfrmsg["from_id"];
		} ?>
        <li>
            <?php if($countmsgfrnd>0) { ?>
            <a href="user-chat.php?profchatid=<?php echo $friendid?>">Message <i class="zmdi zmdi-comment-list zmdi-hc-fw"></i></a> 
            <?php } else { ?>
            <a href="user-chat.php">Message <i class="zmdi zmdi-comment-list zmdi-hc-fw"></i></a> 
            <?php } ?>
        </li>
        <li><a href="profile-member-list.php">All Member <i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i></a></li>
        <li class="active"> <a href="profile-about.php">About Me <i class="zmdi zmdi-account zmdi-hc-fw"></i></a></li>
    </ul>
</aside>
<aside id="chat" class="sidebar c-overflow">
    <div class="chat-search">
        <div class="fg-line">
            <input type="text" class="form-control" placeholder="Search People">
        </div>
    </div>
    <div class="listview"> 
	<?php
    $frndlst=mysqli_query($con, "SELECT * FROM `na_frnd_reqst` WHERE (`from_id` =".$_SESSION['userid']." || `to_id` =".$_SESSION['userid'].") AND `frnd_status` =2");
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
        <a class="lv-item" href="user-chat.php?profchatid=<?php echo $viewmemberfrnd['id']?>">
      		<div class="media">
        		<div class="pull-left p-relative"> 
                    <?php if($viewmemberfrnd['userImage']!='') { ?>
                	<img class="lv-img-sm" src="../admin/useravatar/fullsize/<?php echo $viewmemberfrnd['userImage']?>" alt=""> 
                    <?php } else {
						if($viewmemberfrnd['gender']=='Male') { ?>
                        <img class="lv-img-sm" src="images/avatar-img-1.png" alt="">
                        <?php } else { ?>
                        <img class="lv-img-sm" src="images/avatar-img-3.png" alt="">
                        <?php } ?>
                    <?php } ?>
                </div>
        		<div class="media-body">
          			<div class="lv-title"><?php echo $viewmemberfrnd['first_name']." ".$viewmemberfrnd['last_name']?></div>
          		</div>
      		</div>
      	</a> 
    <?php } } ?>
    </div>
</aside>
<?php 
include('../lib/application_top.php'); 
socialcheck();
$viewmemberlogin=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."'");
$current_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//=====================Accept Friend Request==========================
if(@$_REQUEST['op']=="acpt") {
	$data = array('frnd_status'=>2);
	$result=updateData($data,'na_frnd_reqst', " from_id='" . $_REQUEST['from_id'] . "' and to_id='".$_REQUEST['to_id']."' and id=".$_REQUEST['reqst_id']." ");
}
//=====================Accept Friend Request==========================

//=====================Reject Friend Request==========================
if(@$_REQUEST['op']=="rejct") {
	$result=mysqli_query($con, "DELETE from `na_frnd_reqst` where (`from_id`= ".$_REQUEST['to_id']." || `to_id`= ".$_REQUEST['to_id'].") and (`to_id`=".$_REQUEST['from_id']." || `from_id`=".$_REQUEST['from_id'].") and `frnd_status`=1");
}
//=====================Reject Friend Request==========================

if(@$_REQUEST['profchatid']!="") {
	$data = array('read_status'=>0);
	$result=updateData($data,'na_message', " to_id ='".$_SESSION["userid"]."' and read_status =1");
}

if(@$_REQUEST['decline']) {
	$result=mysqli_query($con, "DELETE from `na_frnd_reqst` where (`from_id`= ".$_REQUEST['to_id']." || `to_id`= ".$_REQUEST['to_id'].") and (`to_id`=".$_REQUEST['from_id']." || `from_id`=".$_REQUEST['from_id'].") and `frnd_status`=1");
	if($resultupdatefrnd){
	   $respondfrndmsg="Friend Removed From The List ...";
	}
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NarrateMe</title>
<link href="dashboard/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="dashboard/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
<link href="dashboard/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
<link href="dashboard/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
<link href="dashboard/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="dashboard/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="dashboard/css/app.min.1.css" rel="stylesheet">
<link href="dashboard/css/app.min.2.css" rel="stylesheet">
<style>
.form-group {margin-bottom: 30px;}
.clist.clist-check li {color: #D18C13; font-size: 16px; text-decoration: underline; font-weight: bold;}
.clist.clist-check > li:before {content: "\f26b"; background: #000; color: #fff; padding: 3px 5px; border-radius: 50%;}
</style>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
$(function() {
    $( "#skills" ).autocomplete({
        source: 'search.php'
    });
});
</script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body class="toggled sw-toggled">
<header id="header" class="clearfix" data-current-skin="blue">
    <ul class="header-inner">
        <li id="menu-trigger" data-trigger="#sidebar">
            <div class="line-wrap">
                <div class="line top"></div>
                <div class="line center"></div>
                <div class="line bottom"></div>
            </div>
        </li>
        <li class="logo hidden-xs"> <a href="<?php echo "http://" . $_SERVER['SERVER_NAME']?>/narrateme/index.php"><img style="width:208px; margin-top:-20px;" src="images/Logo.png"/></a> </li>
        <li class="pull-right">
            <ul class="top-menu">
                <li id="top-search" class="tsw-inner">
                    <div id="custom-search-input">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                            <div class="input-group col-md-12">
                                <input type="text" class="search-query form-control" placeholder="Search" id="skills" name="memberind" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="submit" name="searchmem"> <span class=" glyphicon glyphicon-search"></span> </button>
                                </span>
                            </div>
                        </form> 
                    </div>
                </li>
                <?php $sqlcountmsg = mysqli_fetch_array(mysqli_query($con, "select count(id) as countmsg from `na_message` where `to_id`=".$_SESSION['userid']." and `read_status`=1"));?>
                <li class="dropdown"> 
                    <a data-toggle="dropdown" href="#"> <i class="tm-icon zmdi zmdi-email"></i> <i class="tmn-counts"><?php echo $sqlcountmsg['countmsg']?></i> </a>
                    <div class="dropdown-menu dropdown-menu-lg pull-right">
                        <div class="listview">
                            <div class="lv-header"> Messages </div>
                            <div class="lv-body"> 
                                <?php $sqlmsglist=mysqli_query($con, "SELECT * FROM `na_message` where to_id=".$_SESSION["userid"]." and `read_status`=1");
            				    if(mysqli_num_rows($sqlmsglist)>0){
            				  	while($rowmsglst=mysqli_fetch_array($sqlmsglist)){
            						$viewmembermsg=getAnyTableWhereData('na_member', " AND id='".$rowmsglst['from_id']."' ");
            				    ?>
                                <a class="lv-item" href="user-chat.php?profchatid=<?php echo $rowmsglst['from_id']?>">
                                    <div class="media">
                                        <div class="pull-left"> 
                                            <?php if($viewmembermsg['userImage']!='') { ?>
                							<img class="lv-img-sm" src="../admin/useravatar/fullsize/<?php echo $viewmembermsg['userImage']?>" alt=""> 
											<?php } else {
                                            if($viewmembermsg['gender']=='Male') { ?>
                        					<img class="lv-img-sm" src="images/avatar-img-1.png" alt="">
                        					<?php } else { ?>
                        					<img class="lv-img-sm" src="images/avatar-img-3.png" alt="">
                        					<?php } } ?>
                                        </div>
                                  		<div class="media-body">
                                    		<div class="lv-title"><?php echo $viewmembermsg['first_name']." ".$viewmembermsg['last_name']?></div>
                                    		<small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small> 
                                       </div>
                    	           </div>
                                </a> 
                                <?php } } else { ?>  
                                <a class="lv-item" href="#">
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="lv-title">No Message To Display</div>
                                        </div>
                                    </div>
                                </a>
                                <?php }?>
                            </div>
                            <a class="lv-footer" href="#">View All</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" href="#"> <i class="zmdi zmdi-account-add zmdi-hc-fw"></i> <i class="tmn-counts">
                    <?php $sqlcountnot=mysqli_fetch_array(mysqli_query($con, "select count(id) as countnot from `na_frnd_reqst` where `to_id`=".$_SESSION['userid']." and `frnd_status`=1")); ?>
                    <?php echo $sqlcountnot['countnot']?></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg pull-right">
                        <div class="listview" id="notifications">
                            <div class="lv-header"> Member Request
                                <ul class="actions">
                                    <li class="dropdown"> <a href="#" data-clear="notification"> <i class="zmdi zmdi-check-all"></i> </a> </li>
                                </ul>
                            </div>
                            <div class="lv-body"> 
                                <?php $sqlrequestlist=mysqli_query($con, "SELECT * FROM `na_frnd_reqst` where `to_id`=".$_SESSION['userid']." and `frnd_status`=1");
                                if(mysqli_num_rows($sqlrequestlist) > 0) {
                                    while($rowfrndnot=mysqli_fetch_array($sqlrequestlist)) {
                                        $viewfrndnotlist=getAnyTableWhereData('na_member', " AND id='".$rowfrndnot['from_id']."' ");
                                ?>
                                <div class="media" style="padding-left:5px;">
                                    <div class="pull-left"> 
				                        <?php if($viewfrndnotlist['userImage']!='') { ?>
                                        <img class="lv-img-sm" src="../admin/useravatar/fullsize/<?php echo $viewfrndnotlist['userImage']?>" alt=""> 
                                        <?php } else { ?>
                                        <img class="lv-img-sm" src="../img/no-image.png" alt=""> 
                                        <?php } ?>
                                    </div>
                                    <div class="media-body">
                                        <div class="lv-title">
                                            <?php echo $viewfrndnotlist['first_name']." ".$viewfrndnotlist['first_name']?>
                                        </div>
                                        <div style="float:left; width:20%;">
                                            <a href="<?php echo $current_url?>?op=acpt&to_id=<?php echo $rowfrndnot['to_id']?>&from_id=<?php echo $rowfrndnot['from_id']?>&reqst_id=<?php echo $rowfrndnot['id']?>" class=""><i class="fa fa-check"></i>&nbsp;</a>
                                        </div> 
                                        <div style="float:left; width:20%;"> <a href="<?php echo $current_url?>?op=rejct&to_id=<?php echo $rowfrndnot['to_id']?>&from_id=<?php echo $rowfrndnot['from_id']?>" class=""><i class="fa fa-times"></i>&nbsp;</a></div>   
                                    </div>
                                </div>
                                <?php } } ?>  
                            </div>
                            <a class="lv-footer" href="#">View Previous</a> 
                        </div>
                    </div>
                </li>
                <li class="hidden-xs" id="chat-trigger" data-trigger="#chat"> <a href="user-chat.php"><i class="tm-icon zmdi zmdi-comment-alt-text"></i></a> </li>
            </ul>
        </li>
    </ul>
</header>
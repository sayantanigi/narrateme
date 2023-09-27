<?php 
include('lib/header.php');
socialcheckreg();
//echo "string"; die();
$view=getAnyTableWhereData('na_social_profile', " AND user_id='".$_SESSION["userid"]."' ");
$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");

if(isset($_REQUEST['editdesc'])){
	extract($_POST);
	$data = array('description'=>$description);
	$result = updateData($data,'na_social_profile', " user_id='" .$_SESSION["userid"]."'") ;
	if($result){
		$_SESSION['responsedesc']="Profile Updated ....";
		header('location:profile-about.php');
	}
}
	
if(isset($_REQUEST['editinfo1'])){
	extract($_POST);
	$dob =date('Y-m-d',strtotime($_REQUEST['dob']));
	$data = array('myname'=>$myname,'dob'=>$dob,'marital_status'=>$marital_status);
	$result = updateData($data,'na_social_profile', " user_id='" .$_SESSION["userid"]."'") ;
	if($result){
    	$_SESSION['responsedesc']="Profile Updated ....";
    	header('location:profile-about.php');
	}
}

if(isset($_REQUEST['editinfo1'])){
	extract($_POST);
	$dob =date('Y-m-d',strtotime($_REQUEST['dob']));
	$data = array('myname'=>$myname,'dob'=>$dob,'marital_status'=>$marital_status);
	$result = updateData($data,'na_social_profile', " user_id='" .$_SESSION["userid"]."'") ;
	if($result){
    	$_SESSION['responsedesc']="Profile Updated ....";
    	header('location:profile-about.php');
	}
}

if(isset($_REQUEST['editsocial'])){
	extract($_POST);
	$data = array('social_twitter'=>$social_twitter,'social_skype'=>$social_skype,'social_link'=>$social_link);
	$result = updateData($data,'na_social_profile', " user_id='" .$_SESSION["userid"]."'") ;
	if($result){
    	$_SESSION['responsedesc']="Profile Updated ....";
    	header('location:profile-about.php');
	}
}
?>
<section id="main">
<?php echo include('lib/aside.php')?>
    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2>About Me</h2>
            </div>
            <div class="card">
                <div class="card" id="profile-main">
                    <div class="pm-body clearfix"  style="padding:0;">
                        <div class="pmb-block">
                            <div class="col-sm-12" style="text-align:center;">
                            	<?php if(@$_SESSION['responsedesc']){ echo @$_SESSION['responsedesc']; } ?>
                            </div>
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-equalizer m-r-5"></i> Summary</h2>
                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a data-pmb-action="edit" href="#">Edit</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <?php echo strip_tags($view['description'])?>
                                </div>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                	<div class="pmbb-edit">
                                        <div class="fg-line">
                                            <textarea class="form-control" name="description" rows="5" placeholder="Summary..."> <?php echo strip_tags($view['description'])?></textarea>
                                        </div>
                                        <div class="m-t-10">
                                            <button class="btn btn-primary btn-sm" type="submit" name="editdesc">Save</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>
                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a data-pmb-action="edit" href="#">Edit</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <dl class="dl-horizontal">
                                        <dt>Full Name</dt>
                                        <dd><?php echo $view['myname']?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Gender</dt>
                                        <dd><?php echo $viewmember['gender']?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Birthday</dt>
                                        <dd><?php echo date('M d, Y',strtotime($view['dob']));?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Martial Status</dt>
                                        <dd><?php echo ucwords($view['marital_status'])?></dd>
                                    </dl>
                                </div>
                                <div class="pmbb-edit">
                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Full Name</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" name="myname" class="form-control" value="<?php echo $view['myname']?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Birthday</dt>
                                            <dd>
                                                <div class="dtp-container dropdown fg-line">
                                                    <input type="text" name="dob" class="form-control date-picker" value="<?php echo $view['dob'];?>">
                                                </div>
                                            </dd>
                                        </dl>
                                        
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Martial Status</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <select name="marital_status" class="form-control">
                                                        <option>Select One</option>
                                                        <option value="married" <?php if($view['marital_status']=='married'){?> selected<?php }?>>Married</option>
                                                        <option value="single" <?php if($view['marital_status']=='single'){?> selected<?php }?>>Single</option>
                                                        <option value="divorced" <?php if($view['marital_status']=='divorced'){?> selected<?php }?>>Divorced</option>
                                                    </select>
                                                </div>
                                            </dd>
                                        </dl>
                                        
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm" name="editinfo1">Save</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-phone m-r-5"></i> Contact Information</h2>
                                <ul class="actions">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a data-pmb-action="edit" href="#">Edit</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="pmbb-body p-l-30">
                                <div class="pmbb-view">
                                    <dl class="dl-horizontal">
                                        <dt>Email Address</dt>
                                        <dd><?php echo $viewmember['email']?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Twitter</dt>
                                        <dd><?php echo $view['social_twitter']?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Skype</dt>
                                        <dd><?php echo $view['social_skype']?></dd>
                                    </dl>
                                    <dl class="dl-horizontal">
                                        <dt>Facebook</dt>
                                        <dd><?php echo $view['social_link']?></dd>
                                    </dl>
                                </div>
                                <div class="pmbb-edit">
                                	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Twitter</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="social_twitter" value="<?php echo $view['social_twitter']?>" placeholder="eg. @abc">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Skype</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="social_skype" value="<?php echo $view['social_skype']?>" placeholder="eg. abc.hollaway">
                                                </div>
                                            </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Facebook</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="text" class="form-control" name="social_link" value="<?php echo $view['social_link']?>" placeholder="eg. abc.hollaway">
                                                </div>
                                            </dd>
                                        </dl>
                                        <div class="m-t-30">
                                            <button class="btn btn-primary btn-sm" name="editsocial">Save</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                        </div>
                                    </form>
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
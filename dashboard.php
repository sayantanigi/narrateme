<?php 
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
$soc=getAnyTableWhereData('na_user_social_link', " AND userid='".$_SESSION["userid"]."' ");
if (isset($_REQUEST['submit']) AND ($_REQUEST['submit']=="Update Userdata")){
	extract($_POST);
	$dateob=date('Y-m-d',strtotime($dateofbirth));
	$data=array('prefixname'=>$prefixname,'first_name'=>mysql_real_escape_string(stripcslashes($first_name)),'last_name'=>mysql_real_escape_string(stripcslashes($last_name)),'suffix'=>$suffix, 'fullname'=>$fullname , 'country'=>$country, 'dateofbirth'=>$dateob,'url'=>$url,'domain_name'=>$domain_name,'website'=>$website,'phone_no'=>$phone_no,'text_no'=>$text_no,'email'=>$email,'address'=>$address,'addr_st'=>$addr_st,'phone_st'=>$phone_st,'email_st'=>$email_st,'text_no_st'=>$text_no_st);
	$result=updateData($data,'na_member', " id='" . $id . "' ") ;
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='dashboard.php?update=success';\n";
	echo "</script>";
}
if(isset($_REQUEST['upimg'])) {
	if($_FILES['image']['name']!='') {
		$unlink_sql = "SELECT userImage FROM `na_member` WHERE id = '".$_SESSION["userid"]."'";
		$unlink_rs = mysql_query($unlink_sql) or mysql_error();
		$row_unlink = mysql_fetch_array($unlink_rs);
		$photo = "admin/useravatar/fullsize/".$row_unlink['userImage'];
		$thumb = "admin/useravatar/bigimg/".$row_unlink['userImage'];
		$thumb1 = "admin/useravatar/smallimg/".$row_unlink['userImage'];
		$thumb2 = "admin/useravatar/medium/".$row_unlink['userImage'];
		$thumb3 = "admin/useravatar/extbig/".$row_unlink['userImage'];
		
		if(file_exists($photo)) {
			@unlink($photo);
		}
		if(file_exists($thumb)) {
			@unlink($thumb);
		}
		if(file_exists($thumb1)) {
			@unlink($thumb1);
		}
		if(file_exists($thumb2)) {
			@unlink($thumb2);
		}
		if(file_exists($thumb3)) {
			@unlink($thumb3);
		}
		//Image uploadin start.
		$valid_exts = array('jpeg', 'jpg', 'png', 'gif');
		$max_file_size = 2000 * 1024; #200kb
		$ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
		if (in_array($ext, $valid_exts)) {
			//Upload image path...
			$imagename = uniqid() . '.' . $ext; //Concate with Uniqid id and extension.
			$path = 'admin/useravatar/bigimg/' . $imagename;
			$path1 = 'admin/useravatar/smallimg/' . $imagename;
			$pathfull = 'admin/useravatar/fullsize/' . $imagename;
			$thumb2 = 'admin/useravatar/medium/'.$imagename;
			$thumb3 = 'admin/useravatar/extbig/'.$imagename;
			$tmp = $_FILES['image']['tmp_name'];
			$size = getimagesize($tmp);
			$data = file_get_contents($tmp);
			move_uploaded_file($tmp, $path);
			move_uploaded_file($tmp, $path1);
			move_uploaded_file($tmp, $pathfull);
			move_uploaded_file($tmp, $thumb2);
			move_uploaded_file($tmp, $thumb3);
		} else {
			echo 'unknown problem!';
		} 
		$data=array('userImage'=>$imagename);

		$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
		header('location:dashboard.php');
		//$InsertRegSql=mysql_query("UPDATE `na_member` SET  UserImage = '".$imagename."' where id = '".$_SESSION["userid"]."' ");
	}	
}
$pagename = basename($_SERVER['PHP_SELF']);
if(isset($_REQUEST['type'])){
	$typedata=$_REQUEST['type'];
	if($typedata=='ind') {
		$data=array('ind'=>1);
		$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	} else if($typedata=='std') {
		$data=array('std'=>1);
		$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	} else if($typedata=='edu') {
		$data=array('edu'=>1);
		$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	} else if($typedata=='fac') {
		$data=array('fac'=>1);
		$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	} else if($typedata=='soc') {
		$data=array('soc'=>1);
		$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	} else if($typedata=='mpp') {
		$data=array('mpp'=>1);
		$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	}
}
?>
<section id="main"> 
	<?php include('lib/aside.php');?>
  	<section id="content"> 
    	<div class="container">
      		<div class="block-header">
        		<h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span><small><?php if($view['ind'] ==1){ echo "Individual,";} if($view['std'] ==1){ echo "Student,";} if($view['edu'] ==1){ echo "Educational Institute,";} 
				if($view['edu'] ==1){echo "Instructional Facility or School";} ?></small></h2>
      		</div>
      		<div id="profile-main" class="card">
        		<div class="pm-overview c-overflow">
          			<div class="pmo-pic">
            			<div class="p-relative"> 
            				<a href="#">
                				<?php if($view['userImage']!='') { ?>
            					<img class="img-responsive" src="admin/useravatar/fullsize/<?php echo $view['userImage']?>" alt=""> 
             					<?php } else { ?>
                 				<img class="img-responsive" src="img/no-image.png" alt=""> 
                 				<?php } ?>
                 			</a>
                 			<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" name="frmimage" id="uploadFileForm" enctype="multipart/form-data">
                    			<div class="n_img_block">
                    				<span class=""><i class="zmdi zmdi-camera"></i> Update Profile Picture</span>
                    				<input type="file" name="image" id="file-2" class="" onchange="this.form.submit()" />
                   	 			</div>
                    			<input type="hidden" name="upimg" value="1" />
                 			</form>   
            			</div>
            		</div>
          			<div class="pmo-block pmo-contact hidden-xs"> 
            			<h2>Contact</h2>
						<ul>
							<li><i class="zmdi zmdi-phone"></i><?=$view['phone_no']?></li>
							<li><i class="zmdi zmdi-email"></i><?=$view['email']?></li>
							<li><i class="zmdi zmdi-facebook-box"></i><a href="<?=$soc['fb_links']?>" target="_blank"><?=$soc['fb_links']?></a></li>
							<li><i class="zmdi zmdi-twitter"></i><a href="<?=$soc['twit_link']?>" target="_blank"><?=$soc['twit_link']?></a></li>
							<li> <i class="zmdi zmdi-pin"></i><address class="m-b-0 ng-binding"><?=$view['address']?>,<br><?=$view['country']?>,<br><?=$view['state']?> P: <?=$view['phone_no']?> <br></address></li>
						</ul>
          			</div>
        		</div>
        		<div class="pm-body clearfix">
        			<a href="searchforuser.php" class="btn btn-danger" style="color:#FFF; float:right; margin:5px;">Search User</a>
        			<div class="pmb-block">
        				<div class="pmbb-header"> 
                			<div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true"> 
                  				<div class="panel panel-collapse">
                  					<div class="panel-heading" role="tab">
                      					<h4 class="panel-title"><a>Basic Information</a></h4>
                      				</div>
                					<div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      					<div class="panel-body"> 
                        					<div class="pmb-block p-10  m-b-0"> 
                          						<div class="pmbb-body p-l-0"> 
                            						<div class="pmbb-view">
														<ul class="actions" style="position:static; float:right;">
															<li class="dropdown open">
																<ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0;">
																	<li> <a data-pmb-action="edit" href="#">Edit</a> </li>
																</ul>
															</li>
														</ul>
                              							<dl class="dl-horizontal">
                                							<dt>Full Name </dt>
                                							<dd><?=$view['prefixname']." ".$view['first_name']." ".$view['last_name']." ".$view['suffix']?></dd>
                              							</dl>
						                             	<dl class="dl-horizontal">
						                                	<dt>Country</dt>
							                                <dd><?=$view['country']?></dd>
						                              	</dl>
						                              	<dl class="dl-horizontal">
						                                	<dt>Address</dt>
							                                <dd><?=$view['address']?>
							                                	<span style="margin-left: 200px;color:green;">
						                                		<?php if($view['addr_st'] == '1') { 
						                                			echo "<i class='fa fa-globe' aria-hidden='true'></i>&nbsp Public"; 
						                                		} else if ($view['addr_st'] == '2') {
						                                			echo "<i class='fa fa-lock' aria-hidden='true'></i>&nbsp Private";
						                                		} else {
						                                			echo "<i class='fas fa-user' aria-hidden='true'></i>&nbsp Friends";
						                                		} ?>
							                                	</span>
							                                </dd>
						                              	</dl>
						                              	<dl class="dl-horizontal">
						                                	<dt>Telephone No.</dt>
							                                <dd><?=$view['phone_no']?> 
							                                	<span style="margin-left: 200px;color:green;">
							                                	<?php if($view['phone_st'] == '1') { 
							                                		echo "<i class='fa fa-globe' aria-hidden='true'></i>&nbsp Public";
							                                	} else if ($view['phone_st'] == '2') { 
							                                		echo "<i class='fa fa-lock' aria-hidden='true'></i>&nbsp Private";
							                                	} else {
							                                		echo "<i class='fa fa-user' aria-hidden='true'></i>&nbsp Friends";
							                                	} ?>
							                                	</span>
							                                </dd>
						                              	</dl>
														<dl class="dl-horizontal">
															<dt>E-mail Address</dt>
															<dd><?=$view['email']?>
																<span style="margin-left: 200px;color:green;">
																<?php if($view['email_st'] == '1') {
																	echo "<i class='fa fa-globe' aria-hidden='true'></i>&nbsp Public";
																} else if ($view['email_st'] == '2') {
																	echo "<i class='fa fa-lock' aria-hidden='true'></i>&nbsp Private";
																} else {
																	echo "<i class='fa fa-user' aria-hidden='true'></i>&nbsp Friends";
																} ?>
																</span>
															</dd>
														</dl>
						                              	<dl class="dl-horizontal">
							                                <dt>Text, Instant, SMS , or MMS message number</dt>
							                                <dd><?=$view['text_no']?>
							                                	<span style="margin-left: 200px;color:green;">
							                                	<?php if($view['text_no_st'] == '1') {
							                                		echo "<i class='fa fa-globe' aria-hidden='true'></i>&nbsp Public";
							                                	} else if($view['text_no_st'] == '2') {
							                                		echo "<i class='fa fa-lock' aria-hidden='true'></i>&nbsp Private";
							                                	} else {
							                                		echo "<i class='fa fa-user' aria-hidden='true'></i>&nbsp Friends";
							                                	} ?>
							                                	</span>
							                                </dd>
						                              	</dl>
						                              	<dl class="dl-horizontal">
						                                	<dt>IP Address</dt>
							                                <dd><?=$view['IpAddress']?></dd>
						                              	</dl>
						                              	<dl class="dl-horizontal">
						                                	<dt>Website</dt>
							                                <dd><?=$view['website']?></dd>
					                              		</dl>
						                              	<dl class="dl-horizontal">
							                                <dt>Domain Name</dt>
							                                <dd><?=$view['domain_name']?></dd>
						                              	</dl>
						                              	<dl class="dl-horizontal">
						                                	<dt>URL</dt>
							                                <dd><?=$view['url']?></dd>
						                              	</dl>
						                              	<dl class="dl-horizontal">
                                							<dt>Date of Birth</dt>
                                							<dd><?=$view['dateofbirth']?></dd>
                              							</dl>
                              							<div id="onnn" style="display:none; text-align:center;">
                                							<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                								<?php if($viewusr['ind']==0){?>
                                								<input type="checkbox" onchange="this.form.submit()" value="ind" name="type" <?php if($pagename=='individual.php'){?>checked<?php }?>>Individual
                                								<?php } 
                                								if($viewusr['std']==0) { ?>
                            									<input type="checkbox" name="type" value="std" onchange="this.form.submit()" <?php if($pagename=='student.php'){?>checked<?php }?>>Student
								                                <?php }
								                                if($viewusr['edu']==0) { ?>
                                								<input type="checkbox" value="edu" name="type" onchange="this.form.submit()" <?php if($pagename=='educationalinstitute.php'){?>checked<?php }?>>Educational Institute
                                								<?php }
                                								if($viewusr['fac']==0) { ?>
                            									<input type="checkbox" value="fac" name="type" onchange="this.form.submit()" <?php if($pagename=='instructional_facility.php'){?>checked<?php }?>>Instructional Facility
								                                <?php }
								                                if($viewusr['soc']==0) { ?>
                                								<input type="checkbox" value="soc" name="type" onchange="this.form.submit()" <?php if($pagename=='instructional_facility.php'){?>checked<?php }?>>Social Profile
								                                <?php }
								                                if($viewusr['mpp']==0) { ?>
								                                <input value="mpp" name="type" type="checkbox" onchange="this.form.submit()" <?php if($pagename=='mediaprovider-profile.php'){?> selected<?php }?>>Media Provider Profile
                                								<?php } ?>
                            								</form>
                                						</div>
                                					</div>
                        							<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="form1" onsubmit="return ValidateForm()">
                            							<input type="hidden" name="id" value="<?php echo $view['id'];?>" />
							                            <div class="pmbb-edit">
							                              	<dl class="dl-horizontal">
							                                	<dt class="p-t-10">Prefix</dt>
								                                <dd>
								                                  	<div class="fg-line">
									                                    <select class="form-control" name="prefixname" id="prefixname">
									                                    	<option name="" value="">Please Select</option>
									                                    	<option name="Mr." value="Mr." <?php if($view['prefixname']=="Mr.") {?>selected<?php }?>>Mr.</option>
									                                    	<option name="Mrs." value="Mrs." <?php if($view['prefixname']=="Mrs.") {?>selected<?php }?>>Mrs.</option>
									                                    	<option name="Miss." value="Miss." <?php if($view['prefixname']=="Miss.") {?>selected<?php }?>>Miss.</option>
									                                    	<option name="Dr." value="Dr." <?php if($view['prefixname']=="Dr.") {?>selected<?php }?>>Doctor</option>
									                                    </select>
								                                  	</div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
								                                <dt class="p-t-10">First Name</dt>
								                                <dd>
							                                  		<div class="fg-line">
								                                    	<input type="text" class="form-control" placeholder="First Name" value="<?=$view['first_name']?>" name="first_name">
								                                  	</div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
							                                	<dt class="p-t-10">Last Name</dt>
								                                <dd>
							                                  		<div class="fg-line">
								                                    	<input type="text" class="form-control" placeholder="Name" value="<?=$view['last_name']?>" name="last_name">
								                                  	</div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
								                                <dt class="p-t-10">Suffix</dt>
								                                <dd>
							                                  		<div class="fg-line">
								                                    	<input type="text" class="form-control" placeholder="Suffix" value="<?=$view['suffix']?>" name="suffix">
								                                  	</div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
							                                	<dt class="p-t-10">Name of Member:</dt>
								                                <dd>
							                                  		<div class="fg-line">
								                                    	<input type="text" class="form-control" placeholder="Full Name" value="<?=$view['fullname']?>" name="fullname">
								                                  	</div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
							                                	<dt class="p-t-10">Country</dt>
						                                		<dd>
							                                  		<div class="fg-line">
							                                    		<select class="form-control" name="country" id="country">
								                                    		<option name="" value="">Please Select Country</option>
							                                    			<?php $countrysql=mysql_query("SELECT * FROM `na_country`"); 
							                                    			while($countryfetch=mysql_fetch_array($countrysql)) {
								                                    		?>
								                                    		<option name="<?=$countryfetch['nicename']?>" value="<?=$countryfetch['nicename']?>" <?php if($countryfetch['nicename']==$view['country']) {?>selected<?php }?>><?=$countryfetch['nicename']?></option>
								                                    		<?php } ?>
							                                    		</select>
							                                  		</div>
							                                	</dd>
						                              		</dl>
							                              	<dl class="dl-horizontal">
							                                	<dt class="p-t-10">Address</dt>
							                                	<dd>
							                                  		<div class="fg-line" style="width:80%">
							                                    		<input type="text" class="form-control" placeholder="Address" value="<?=$view['address']?>" name="address">
							                                  		</div>
							                                  		<div class="fg-line" style="width:20%;display: contents;">
									                                    <select name="addr_st">
								                                      		<option value="1" <?php if($view['addr_st'] == '1') { echo "selected";}?>>Public</option>
								                                      		<option value="2" <?php if($view['addr_st'] == '2') { echo "selected";}?>>Private</option>
								                                      		<option value="3" <?php if($view['addr_st'] == '3') { echo "selected";}?>>Friends</option>
									                                    </select>
							                                  		</div>
							                                	</dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
								                                <dt class="p-t-10">Telephone Phone No.</dt>
								                                <dd>
							                                  		<div class="fg-line" style="width:80%;">
								                                    	<input type="text" class="form-control" placeholder="Phone No" value="<?=$view['phone_no']?>" name="phone_no">
								                                  	</div>
								                                   	<div class="fg-line" style="width:20%;display: contents;">
								                                    	<select name="phone_st">
								                                     		<option value="1" <?php if($view['phone_st'] == '1') {echo "selected";}?>>Public</option>
								                                      		<option value="2" <?php if($view['phone_st'] == '2') {echo "selected";}?>>Private</option>
								                                      		<option value="3" <?php if($view['phone_st'] == '3') {echo "selected";}?>>Friends</option>
								                                    	</select>
								                                  </div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
							                                	<dt class="p-t-10">Text or sms No.</dt>
								                                <dd>
							                                  		<div class="fg-line" style="width:80%;">
								                                    	<input type="text" class="form-control" placeholder="Text No" value="<?=$view['text_no']?>" name="text_no">
								                                  	</div>
								                                   	<div class="fg-line" style="width:20%;display: contents;">
								                                    	<select name="text_no_st">
								                                      		<option value="1" <?php if($view['text_no_st'] == '1') { echo "selected";} ?>>Public</option>
								                                      		<option value="2" <?php if($view['text_no_st'] == '2') { echo "selected";} ?>>Private</option>
								                                      		<option value="3" <?php if($view['text_no_st'] == '3') { echo "selected";} ?>>Friends</option>
								                                    	</select>
								                                  	</div>
								                                </dd>
						                             	 	</dl>
							                              	<dl class="dl-horizontal">
							                                	<dt class="p-t-10">E-mail Address</dt>
								                                <dd>
							                                  		<div class="fg-line" style="width:80%;">
								                                    	<input type="email" class="form-control" placeholder="Email" value="<?=$view['email']?>" name="email">
								                                  	</div>
								                                  	<div class="fg-line" style="width:20%;display: contents;">
									                                    <select name="email_st">
								                                       		<option value="1" <?php if($view['email_st'] == '1') {echo "selected";}?>>Public</option>
								                                      		<option value="2" <?php if($view['email_st'] == '2') {echo "selected";}?>>Private</option>
								                                      		<option value="3" <?php if($view['email_st'] == '3') {echo "selected";}?>>Friends</option>
									                                    </select>
								                                  	</div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
							                                	<dt class="p-t-10">Website</dt>
								                                <dd>
							                                  		<div class="fg-line">
								                                    	<input type="text" class="form-control" placeholder="Website" value="<?=$view['website']?>" name="website">
								                                  	</div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
								                                <dt class="p-t-10">Domain Name</dt>
								                                <dd>
							                                  		<div class="fg-line">
								                                    	<input type="text" class="form-control" placeholder="Domain Name" value="<?=$view['domain_name']?>" name="domain_name">
								                                  	</div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
								                                <dt class="p-t-10">URL</dt>
								                                <dd>
							                                  		<div class="fg-line">
								                                    	<input type="text" class="form-control" placeholder="URL" value="<?=$view['url']?>" name="url">
								                                  	</div>
								                                </dd>
							                              	</dl>
							                              	<dl class="dl-horizontal">
							                                	<dt class="p-t-10">Date of Birth</dt>
							                                	<dd>
							                                  		<div class="fg-line">
							                                    		<input type='text' class="form-control datepicker" id="example1" value="<?=date('Y-m-d', strtotime($view['dateofbirth']))?>" name="dateofbirth">
							                                  		</div>
							                                	</dd>
							                              	</dl>
							                              	<div class="m-t-30">
							                                	<button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Save</button>
							                                	<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
							                              	</div>
							                            </div>
                            						</form>
                      							</div>
                        					</div>
                      					</div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker/css/datepicker.css"/>
<script type="text/javascript" src="js/form-components.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>	
<?php include('lib/inner_footer.php')?>
<script src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
// When the document is ready
$(document).ready(function () {
	App.init();
    FormComponents.init();

    $("#leftactivate").click(function(){
    	$("#onnn").toggle();
    });

	$('#example1').datepicker({
		format: "yyyy-mm-dd",
		endDate: '+0d',
		autoclose: true
	}); 
});
</script>
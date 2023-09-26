<?php include('lib/headercms.php');

if(isset($_REQUEST['regsub'])) {
	strip_tags(mysqli_real_escape_string($con, extract($_POST)));
	//echo "SELECT * from `na_member` where `email`='".$email."'";
	$sqlcheck1 = mysqli_query($con, "SELECT * from `na_member` where `email`='".$email."'");
	$ctn1 = mysqli_num_rows($sqlcheck1);
	if($ctn1 == 1) {
		$response="Email Already Exists !!!";
	} else {
		$sqlcheck = mysqli_query($con, "SELECT * from `na_member` where `username`='".$username."'");
		$ctn = mysqli_num_rows($sqlcheck);
		if($ctn == 1) {
			$response1 = "Username Already Exists !!!";
		} else {
			$userlink = random_number(7);
			$IpAddress = getUserIP();
			if($_FILES['image']['name']!='') {
				if(!empty(@$_REQUEST['uid'])) {
					$unlink_sql = "SELECT UserImage FROM ".TABLE_PREFIX."user_registration WHERE Uid = '".@$_REQUEST['uid']."'";
					//echo "<pre>"; print_r($unlink_sql); die();
					$unlink_rs = mysqli_query($con, $unlink_sql) or mysqli_error();
					$row_unlink = mysqli_fetch_array($unlink_rs);
					$photo = "admin/useravatar/fullsize/".$row_unlink['UserImage'];
					$thumb = "admin/useravatar/bigimg/".$row_unlink['UserImage'];
					$thumb1 = "admin/useravatar/smallimg/".$row_unlink['UserImage'];
					$thumb2 = "admin/useravatar/medium/".$row_unlink['UserImage'];
					$thumb3 = "admin/useravatar/extbig/".$row_unlink['UserImage'];
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
				}
				
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
				$data=array('userlink'=>$userlink,'IpAddress'=>$IpAddress,'prefixname'=>$prefixname, 'first_name'=>$first_name,'last_name'=>$last_name,'suffix'=>$suffix,'fullname'=>$fullname,'country'=>$country,'address'=>$address,'city'=>$city, 'state'=>$state,'zip_code'=>$zip_code,'phone_no'=>$phone_no,'email'=>$email,'text_no'=>$text_no,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'username'=>$username,'password'=>base64_encode($password),'userImage'=>$imagename,'ind'=>@$ind,'std'=>@$std,'edu'=>@$edu,'fac'=>@$fac,'soc'=>1,'status'=>1);
			} else {
	 			$data=array('userlink'=>$userlink,'IpAddress'=>$IpAddress, 'prefixname'=>$prefixname,'first_name'=>$first_name,'last_name'=>$last_name,'suffix'=>$suffix,'fullname'=>$fullname, 'country'=>$country,'address'=>$address, 'city'=>$city,'state'=>$state,'zip_code'=>$zip_code,'phone_no'=>$phone_no,'email'=>$email,'text_no'=>$text_no,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'username'=>$username,'password'=>base64_encode($password),'ind'=>@$ind,'std'=>@$std,'edu'=>@$edu,'fac'=>@$fac,'soc'=>1,'status'=>1);
			} //==========Else End
			//echo "<pre>"; print_r($data); die();
			$result=insertData($data, 'na_member');
			$sid=mysqli_insert_id($con);
			$sdata=array('user_id'=>$sid,'myname'=>$fullname);
			$socialres=insertData($sdata,'na_social_profile');
			//======================Email Sending====================
			$BidSql = "SELECT * FROM na_admin_mail WHERE MailId = '1'";
			$BidSqlQuery = mysqli_query($con, $BidSql) or mysql_error();
			$BidFetch = mysqli_fetch_array($BidSqlQuery);
			$from = $BidFetch['MailAddress'];
			$to=$email;
			$sendingdate=date("Y-m-d");
			$sendingdate=date('F d ,  Y',strtotime($sendingdate));
			$subject="Welcome To Narrateme... Your Registration Done Successfully ";
			$message="<table width='790px' border='0' cellspacing='2' cellpadding='2' style='font-family:Arial; font-size:15px; color:#000000;><tr><td colspan='3'><img src='$siteimg/Logo.png' border='0'></td></tr><tr><td colspan='3'>&nbsp;</td></tr><tr><td colspan='3'><strong>Thank You For Registring In Narrateme.... </strong></td></tr><tr><td colspan='2'>&nbsp;</td><td width='611'>&nbsp;</td></tr><tr><td colspan='3'>Your Registration Details </td></tr><tr><td width='144'><b>Contact Name</b></td><td width='13'>*</td><td>$first_name $last_name</td></tr><tr><td><b>Username</b></td><td>*</td><td>$username</td></tr><tr><td><b>Password</b></td><td>*</td><td>$password</td></tr><tr><td colspan='3'>&nbsp;</td></tr><tr><td colspan='3'>Narrate Me</td></tr></table>";
			$headers  = "MIME-Version: 1.0\r\n";			
			$headers = "From: Contact ".$BidFetch['MailAddress']." \n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			mail($to, $subject, $message, $headers);
			//======================Email Sending====================
			header('location:thanks.php?op=add');
			exit;
			$response="Resistration Successfuly Done !!!";
		}
	}	
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<section>
  	<div class="container">
    	<div class="block-header text-center">
      		<h2>Member Registration</h2>
    	</div>
    	<div class="card">
      		<div class="card-header">
	        	<?php if(isset($_REQUEST['regsub'])) {
				if(@$response != '') { ?>
	        	<center style="color: red;"><?php echo @$response;?></center>
	        	<?php } else if (@$response1 != '') { ?>
	        	<center style="color: red;"><?php echo @$response1;?></center>
	        	<?php } } ?>
	        	<h2>Please enter the Member information requested below:</h2>
      		</div>
  			<div class="card-body card-padding">
        		<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"  onSubmit="return SubmitReg()" enctype="multipart/form-data">
	          		<div class="row">
		          		<div ng-app="">
		          			<div class="col-sm-3">
				            	<div class="form-group fg-line">
				                	<label>Prefix:</label>
					                <select class="form-control" name="prefixname" id="prefixname" ng-model="prefixname">
				                  		<option name="" value="">Please Select</option>
					                  	<option name="mr" value="Mr.">Mr.</option>
					                  	<option name="mrs" value="Mrs.">Mrs.</option>
					                  	<option name="miss" value="Miss.">Miss.</option>
					                  	<option name="dr" value="Dr.">Doctor</option>
					                </select>
				              	</div>
			              		<div style="color:red" id="errorprefixname"></div>
				            </div>
          					<div class="col-sm-3">
              					<div class="form-group fg-line">
                					<label>First Name </label>
            						<input type="text" id="firstname" name="first_name" ng-model="first_name" class="form-control input-sm" value="<?php if(@$_REQUEST['first_name']!=''){echo @$_REQUEST['first_name'];}?>">
                					<div style="color:red" id="errofname"></div>
              					</div>
            				</div>
				          	<div class="col-sm-3">
			              		<div class="form-group fg-line">
				                	<label>Last Name</label>
				                	<input type="text" placeholder="" id="lastname" name="last_name" ng-model="last_name"  value="<?php if(@$_REQUEST['last_name']!=''){ echo @$_REQUEST['last_name'];}?>" class="form-control input-sm">
                					<div style="color:red" id="errolname"></div>
              					</div>
            				</div>
          					<div class="col-sm-3">
								<div class="form-group fg-line">
									<label>Suffix</label>
									<input type="text" placeholder="" id="suffix" name="suffix" ng-model="suffix" value="<?php if(@$_REQUEST['suffix']!=''){ echo @$_REQUEST['suffix'];}?>" class="form-control input-sm">
									<div style="color:red" id="errorsuffix"></div>
								</div>
            				</div>
							<div class="col-sm-12">
								<div class="form-group fg-line">
									<label>Name of Member:</label>
									<input type="text" placeholder="Full Name Here" id="fullname" name="fullname" value="{{prefixname}} {{first_name}} {{last_name}} {{suffix}}" class="form-control input-sm">
									<div style="color:red" id="errorfullname"></div>
								</div>
							</div>  
						</div>
          				<div class="col-sm-3">
							<div class="form-group fg-line">
								<label>Country:</label>
								<select class="form-control" name="country" id="country">
									<option name="" value="">Please Select Country</option>
									<?php $countrysql=mysqli_query($con, "SELECT * FROM `na_country`"); 
									while($countryfetch=mysqli_fetch_array($countrysql)) { ?>
									<option name="<?=$countryfetch['nicename']?>" value="<?=$countryfetch['nicename']?>"><?=$countryfetch['nicename']?></option>
									<?php } ?>
								</select>
							</div>
	              			<div style="color:red" id="errorcountry"></div>
	            		</div>
						<div class="col-sm-3">
							<div class="form-group fg-line">
								<label>Address:</label>
								<textarea type="text" id="address" name="address" class="form-control input-sm"><?php if(@$_REQUEST['address']!=''){ echo @$_REQUEST['address'];}?></textarea>
							</div>
							<div style="color:red" id="erroraddress"></div>
						</div>  
						<div class="col-sm-3">
							<div class="form-group fg-line">
								<label>City:</label>
								<input type="text" placeholder="" id="" name="city" value="<?php if(@$_REQUEST['city']!=''){ echo @$_REQUEST['city'];}?>" class="form-control input-sm">
							</div>
						</div>
						<div class="col-sm-3">
							<div class="form-group fg-line">
								<label>State:</label>
								<input type="text" placeholder="" id="" name="state" value="<?php if(@$_REQUEST['state']!=''){ echo @$_REQUEST['state'];}?>" class="form-control input-sm">
							</div>
						</div>  
						<div class="col-sm-12">
							<div class="form-group fg-line" style="width:25%;">
								<label>Zip code:</label>
								<input type="text" placeholder="" id="" name="zip_code" class="form-control input-sm" value="<?php if(@$_REQUEST['zip_code']!=''){ echo @$_REQUEST['zip_code'];}?>">
							</div>
						</div>
					</div>
					<div class="row"></div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group fg-line">
								<label>Telephone No:</label>
								<input type="text" placeholder="" name="phone_no" id="" class="form-control input-sm" value="<?php if(@$_REQUEST['phone_no']!=''){ echo @$_REQUEST['phone_no'];}?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group fg-line">
								<label>Email:</label>
								<input type="email" placeholder="" name="email" id=""  value="<?php if(@$_REQUEST['email']!=''){ echo @$_REQUEST['email'];}?>" class="form-control input-sm" required>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group fg-line">
								<label>Text No:</label>
								<input type="text" placeholder="" id="" value="<?php if(@$_REQUEST['text_no']!=''){ echo @$_REQUEST['text_no'];}?>" name="text_no"class="form-control input-sm">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group fg-line">
								<label>Website(s):</label>
								<input type="text" placeholder="(e.g http://www.narrateme.com)" id="" name="website" class="form-control input-sm" value="<?php if(@$_REQUEST['website']!=''){ echo @$_REQUEST['website'];}?>">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group fg-line">
								<label>Domain Name(s):</label>
								<input type="text" placeholder="" id="" name="domain_name" value="<?php if(@$_REQUEST['website']!=''){ echo @$_REQUEST['website'];}?>" class="form-control input-sm">
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group fg-line">
								<label>URL(s):</label>
								<input type="text" placeholder="" id="" name="url" value="<?php if(@$_REQUEST['website']!=''){ echo @$_REQUEST['website'];}?>" class="form-control input-sm">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group fg-line">
								<label>User Name:</label>
								<input type="text" placeholder="" id="usrnamereg" value="<?php if(@$_REQUEST['username']!=''){ echo @$_REQUEST['username'];}?>" name="username" class="form-control input-sm">
								<div style="color:red" id="errousrnm"></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group fg-line">
								<label>Password:</label>
								<input type="password" placeholder="" id="passwordreg" value="<?php if(@$_REQUEST['password']!=''){ echo @$_REQUEST['password'];}?>" name="password" class="form-control input-sm">
								<div style="color:red" id="errorpassword"></div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group fg-line">
								<label class="c-black f-500 m-b-20 m-t-20">In addition to being a Member, I would like to be registered with NarrateMe.com as a:</label>
								<br>
								<label class="checkbox checkbox-inline m-r-20"><input type="checkbox" value="1" name="ind"><i class="input-helper"></i> Individual (Non-Student) </label>
								<label class="checkbox checkbox-inline m-r-20"><input type="checkbox" value="1" name="std"><i class="input-helper"></i> Student </label>
								<label class="checkbox checkbox-inline m-r-20"><input type="checkbox" value="1" name="edu"><i class="input-helper"></i> Educational Institution </label>
								<label class="checkbox checkbox-inline m-r-20"><input type="checkbox" value="1" name="fac"><i class="input-helper"></i> Instructional Facility or School </label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group fg-line">
								<label class="c-black f-500 m-b-20 m-t-20">Profile Image:</label>
								<div data-provides="fileinput" class="fileinput fileinput-new"> 
									<span class="btn bgm-gray btn-file m-r-10 waves-effect">
										<span class="fileinput-new">Select file</span> 
										<span class="fileinput-exists">Change</span>
										<input type="file" name="image">
									</span> 
									<span class="fileinput-filename"></span>
									<a data-dismiss="fileinput" class="close fileinput-exists" href="#">×</a>
								</div>
							</div>
						</div>
					</div>
					<button class="btn btn-primary m-t-10 waves-effect" name="regsub" type="submit">Submit</button>
				</form>
			</div>
		</div>
	</div>
</section>
<script>
function SubmitReg() {
	if($("#passwordreg").val() == "") {
		$("#passwordreg").focus();
		$("#errorpassword").html("Please Enter Password");
		return false;
	} else {
		$("#errorpassword").html("");
	}	

	if($("#prefixname").val() == "") {
   		$("#prefixname").focus();
	   	$("#errorprefixname").html("Please Select Name Prefix");
	   	return false;
  	} else {
	   	$("#errorprefixname").html("");
  	}

  	if($("#firstname").val() == "") {
	   	$("#userfild").focus();
	   	$("#errofname").html("Please Enter First Name");
	   	return false;
  	} else {
	   	$("#errofname").html("");
  	}

  	if($("#lastname").val() == "") {
  		$("#lastname").focus();
  		$("#errolname").html("Please Enter Last Name");
  		return false;
  	}else{
  		$("#errolname").html("");
  		return true;
  	}

  	if($("#fullname").val() == "") {
		$("#fullname").focus();
	   	$("#errorfullname").html("Please Enter Your Full Name");
	   	return false;
   	} else {
   		$("#errorfullname").html("");
  	}

  	if($("#country").val() == "") {
		$("#country").focus();
	   	$("#errorcountry").html("Please Select Country");
		return false;
	} else {
		$("#errorcountry").html("");
	}

	if($("#address").val() == "") {
		$("#address").focus();
	   	$("#erroraddress").html("Please Enter Address");
	   	return false;
	} else {
	   	$("#erroraddress").html("");
	}

	if($("#usrnamereg").val() == "") {
		$("#usrnamereg").focus();
		$("#errousrnm").html("Please Enter Username");
		return false;
	} else {
		$("#errousrnm").html("");
		return true;
	}	
}
</script>
<style>
#errofname{color:#F00;}
#errolname{color:#F00;}
#errousrnm{color:#F00;}
#erroupsw{color:#F00;}
#errorpassword{color:#F00;}
</style>
<?php include('lib/footercms.php'); ?>
<?php
include('application_top.php');
//$_SESSION["user_log_flag"] = 0; //login false
if(isset($_POST['login'])) {
	extract($_POST);   
	$username=mysqli_real_escape_string($con, strip_tags(trim(@$user)));
	$password=mysqli_real_escape_string($con, strip_tags(trim(base64_encode(@$pass))));	
	$query = "SELECT * FROM `na_member` WHERE username = '".$username."' AND password = '".$password."' ";
	$result = mysqli_query($con, $query);
	$counter=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	if($row >0) {
		$_SESSION["user_log_flag"] = 1;
		$_SESSION["username"] = $row['username']; 
		$_SESSION["useremail"] = $row['email'];
		$_SESSION["userid"] = $row['id'];//login true
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='".$daseurl."dashboard.php';\n";
		echo "</script>";
	} else {
		$_SESSION["user_log_flag"] = 0; //login false
		$MSGlogfalse="Invalid Username or Password";
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='".$daseurl."index.php?op=logfals';\n";
		echo "</script>";
	}
}
$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NarrateMe | Dashboard</title>
<link href="dashboard/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
<link href="<?php echo $baseurl?>css/font-awesome.css" rel="stylesheet"/>
<link href="dashboard/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.css" rel="stylesheet">
<link href="dashboard/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
<link href="dashboard/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="dashboard/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link href="dashboard/css/app.min.1.css" rel="stylesheet">
<?php if($actual_link != "http://narrateme.com/dev/dashboard.php") { ?>
<link href="dashboard/css/app.min.2.css" rel="stylesheet">
<link href="dashboard/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<?php } else { ?>

<?php } ?>
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
    	<li class="logo hidden-xs"> <a href="<?php echo $baseurl?>index.php"><img style="width:208px; margin-top:-20px;" src="images/Logo.png"/></a> </li>
    	<li class="pull-right">
      		<ul class="top-menu">
		        <li style="background:#3A5897;"><a href="#"><i class="zmdi zmdi-facebook zmdi-hc-fw"></i></a> </li>
		        <li style="background:#C53012;"><a href="#"><i class="zmdi zmdi-google-plus zmdi-hc-fw"></i></a> </li>
		        <li style="background:#2AA9DF;"><a href="#"><i class="zmdi zmdi-twitter zmdi-hc-fw"></i></a> </li>
		        <li style="background:#3D6C92;"><a href="#"><i class="zmdi zmdi-instagram zmdi-hc-fw"></i></a> </li>
		        <li style="background:#0073A4;"><a href="#"><i class="zmdi zmdi-linkedin-box zmdi-hc-fw"></i></a> </li>
		        <li><a data-toggle="dropdown" href="#"> <i class="tm-icon zmdi zmdi-time-restore"></i> </a> </li>
      		</ul>
    	</li>
  	</ul>
</header>
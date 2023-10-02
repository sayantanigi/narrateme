<?php
include('application_top.php');
$daseurl='http://localhost/narrateme/';
//$_SESSION["user_log_flag"] = 0; //login false
if(isset($_POST['login'])){
	extract($_POST);   
	$username=mysqli_real_escape_string($con, strip_tags(trim(@$user)));
	$password=mysqli_real_escape_string($con, strip_tags(trim(base64_encode(@$pass))));
    $query = "SELECT * FROM `na_member` WHERE username = '".$username."' AND password = '".$password."' ";
    $result = mysqli_query($con, $query);
    $counter=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
	//exit();
	if($row >0) {
		$_SESSION["user_log_flag"] = 1;
        $_SESSION["username"] = $row['username']; 
        $_SESSION["useremail"] = $row['email'];
        $_SESSION["userid"] = $row['id'];//login true
        $_SESSION["user_log_flag"];
        //exit();
		//header("location: dashboard.php");	 
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

if(@$_SESSION['user_log_flag']==1){
    $viewmember=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
}
?>

<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta charset="utf-8">
<title>NarrateMe</title>
<meta http-equiv="imagetoolbar" content="no">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="css/Narrate-Me-10-05-16.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet"/>
<link href="css/custom.css" rel="stylesheet"/>
<link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body data-spy="scroll">
	<header>
    	<div class="header_top">
        	<div class="container-fluid">
            	<div class="row">
            		<div class="col-lg-6 col-md-6 col-xs-12">
                		<div id="wb_Login-link">
                    		<span class="top-text">
								<?php
                                if(@$_SESSION['user_log_flag']==1){
                                ?>
                                <a class="link-foo-ha"  href="<?php echo $baseurl?>logout.php">Logout</a>
                                <?php }else{?>
                                <a href="#" class="link-foo-ha" onClick="$('#Login-area').modal('show');return false;">Log In</a>&nbsp;&nbsp;&nbsp; 
                                <?php }?>
                                <?php
                                if(@$_SESSION['user_log_flag']==1){
                                ?>
                                <a class="link-foo-ha"  href="<?php echo $baseurl?>dashboard.php"><?php echo $viewmember['first_name']." ".$viewmember['last_name']?></a>
                                <?php }else{?>
                                <a class="link-foo-ha"  href="<?php echo $baseurl?>register.php">Register / Sign Up</a>
                                <?php }?>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <form  method="post"  action="page_search.php" id="Search-site_form" name="Search-site_form">
                    	<input type="text" placeholder="Search this website" value="" name="pagetitle" id="Search-site">
                    	<input type="submit" value="SEARCH" name="searchsub"   id="Search-buttn">
                        </form>
                	</div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
        	<div class="container-fluid">
            	<div class="row">
                	<div class="col-lg-12 main_nav">
                    	<nav class="navbar navbar-default">
								<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
                                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                      </button>
                                    <a class="navbar-brand" href="<?php echo $baseurl?>index.php"><img src="images/Logo.png" class="" alt="logo"></a>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  									<ul class="nav navbar-nav">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="page.php?id=17">About Us</a></li>
                                        <li><a href="page.php?id=18">Members</a></li>
                                        <li><a href="page.php?id=19">Individuals</a></li>
                                        <li><a href="page.php?id=20">Students</a></li>
                                        <li><a href="page.php?id=21">Educational Institutions</a></li>
                                        <li><a href="page.php?id=22">Instructional Facilities &amp; Schools</a></li>
                                        <li><a href="product_list.php">Products</a></li>
                                        <?php if(@$viewmember['std']==1){ ?>
                                        <li><a href="http://narrateme.com/new/course-module/courses">Courses</a></li>
                                        <?php } ?>
                                        <li><a href="contact.php?id=5">Contact Us</a></li>
                                    </ul>
								</div><!-- /.navbar-collapse -->
                                
								</div><!-- /.container-fluid -->
						</nav>
                    </div>
                </div>
            </div>
        </div>      
    </header>
        
        
   
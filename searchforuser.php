<?php
ob_start();
?>	
<?php 
	//include('lib/application_top.php');
	include('lib/inner_header.php');
	sequre();
	if(isset($_REQUEST['searchmem'])){
	 $_SESSION['searchmember']=$_REQUEST['user'];
	 //$_SESSION['searchmember']=substr($_REQUEST['user'], 0, strrpos($_REQUEST['user'], ' '));
	 $view=getAnyTableWhereData('na_member', " AND first_name ='".$_SESSION['searchmember']."' OR email = '".$_SESSION['searchmember']."' ");
	 if($_SESSION['userid']== $view['id']){
	    header('location:social/profile-wall.php');
	 }else{
	 header('location:social/user-profile-wall.php');
	 }
}
	$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
	if (isset($_REQUEST['submit']) AND ($_REQUEST['submit']=="Update Userdata")){
	extract($_POST);
	$dateob=date('Y-m-d',strtotime($dateofbirth));
	
	$data=array('prefixname'=>$prefixname,'first_name'=>mysql_real_escape_string(stripcslashes($first_name)),'last_name'=>mysql_real_escape_string(stripcslashes($last_name)),'suffix'=>$suffix, 'fullname'=>$fullname , 'country'=>$country, 'dateofbirth'=>$dateob,'url'=>$url,'domain_name'=>$domain_name,'website'=>$website,'phone_no'=>$phone_no,'email'=>$email,'address'=>$address);
	$result=updateData($data,'na_member', " id='" . $id . "' ") ;
	
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='dashboard.php?update=success';\n";
	echo "</script>";
	
	}
	
	/*<input type="hidden" name="upimg" value="1" />*/
	$pagename = basename($_SERVER['PHP_SELF']);
	if(isset($_REQUEST['type'])){
	$typedata=$_REQUEST['type'];
	if($typedata=='ind'){
	$data=array('ind'=>1);
	$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	}else if($typedata=='std'){
	$data=array('std'=>1);
	$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	}else if($typedata=='edu'){
	$data=array('edu'=>1);
	$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	}else if($typedata=='fac'){
	$data=array('fac'=>1);
	$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	}else if($typedata=='soc'){
	$data=array('soc'=>1);
	$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	}else if($typedata=='mpp'){
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
	<h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span></h2>
	</div>
	<div id="profile-main" class="card">
	<div class="pm-body clearfix">
	<a href="dashboard.php" class="btn btn-danger" style="color:#FFF; float:right; margin:5px;">Back To Dashboard</a>
	<div class="pmb-block"> 
	<div class="pmbb-header"> 
	
	<div class="content">
	
	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
	<h1>Search Here</h1>
    <style>
	.twitter-typeahead{width:84%;}
	</style>
    <div style="display:inline-block;">
	<input type="text" name="user" size="30" class="user" placeholder="Search Here With Name" style="width:">
    <button class="btn btn-danger" type="submit" name="searchmem"> <span class=" glyphicon glyphicon-search" style="width:35%;"></span> </button>
	</div>
    </form>
	</div>
	
	</div> 
	</div> 
	</div> 
	</div> 
	</section>
	</section>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.js"></script> 
	<script>
	$(document).ready(function() {
	
	$('input.user').typeahead({
	name: 'user',
	remote: 'user.php?query=%QUERY'
	
	});
	
	})
	</script>
	<footer id="footer">
	<div class="col-sm-12">
	<div class="row">
	<div class="col-sm-3">
	<p>Copyright &copy; 2016 NarrateMe</p>
	</div>
	<div class="col-sm-6">
	<ul class="f-menu" style="margin:0;">
	<li><a href="index.php">Home</a></li>
	<li><a href="page.php?id=17">About Us</a></li>
	<li><a href="contact.php?id=5">Contact Us</a></li>
	<li><a href="faq.php">FAQ</a></li>
	<li><a href="page.php?id=4">Terms &amp; Conditions</a></li>
	</ul>
	</div>
	<div class="col-sm-3">
	<p> Designed &amp; Developed By <a href="http://www.goigi.com/" target="_blank">GOIGI.COM</a></p>
	</div>
	</div>
	</div>
	</footer>
	</body>
	</html>
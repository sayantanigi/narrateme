<?php
$viewusr=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");
 $currenturl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(@$_REQUEST['op']=='deltype'){
	//echo "hhhhhhhhhhhh";
	//exit();
	$fildname=$_REQUEST['type'];
	$data=array($fildname=>0);
	$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
	if($InsertRegSql){
		header('location:dashboard.php');
	}
}
?>
<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu"> <a href="dashboard.php">
      <div class="profile-pic text-center"> 
      <?php
			if($view['userImage']!=''){
	  ?>
      <img src="admin/useravatar/fullsize/<?php echo $view['userImage']?>" alt=""> 
      <?php }else{?>
     <img  src="img/no-image.png" alt="">
      <?php }?>
      </div>
      <div class="profile-info"> <?php echo $view['first_name']." ".$view['last_name']?><i class="zmdi zmdi-caret-down"></i> </div>
      </a>
      <ul class="main-menu">
        <li> <a href="dashboard.php"> View Profile</a> </li>
        <li> <a href="changepassword.php"> Change Password</a> </li>
        <li> <a href="settings.php"> Settings</a> </li>
        <li> <a href="productlist.php">Product</a> </li>
        <li> 
       	<?php if($_SESSION["user_log_flag"]==1){?>
        		<a href="logout.php"> Logout</a> 
            <?php }else{?>
            	<a href="register.php">Register</a> 
             <?php   
            }
            ?>
        </li>
      </ul>
    </div>
    <ul class="main-menu">
      <li><a href="dashboard.php"> Home</a></li>
	    <li><a href="member.php">Search</a></li>
      <?php
	  if($viewusr['ind']==1){
	  ?>
      <li><a href="individual.php">Individual</a></li>
	  <?php }?>
      <?php
	  if($viewusr['std']==1){
	  ?>
      <li><a href="student.php">Student</a></li>
      <?php }?>
      <?php
	  if($viewusr['edu']==1){
	  ?>
      <li><a href="educationalinstitute.php">Educational Institute</a></li>
      <?php }?>
      <?php
	  if($viewusr['fac']==1){
	  ?>
      <li><a href="instructional_facility.php">Instructional Facility or School</a></li>
      <?php }?>
      <?php
	  if($viewusr['soc']==1){
	  ?>
      <li><a href="social/profile-about.php">Social Profile</a></li>
      <?php }?>
       <?php
	  if($viewusr['mpp']==1){
	  ?>
      <li><a href="mediaprovider-profile.php">Media Provider Profile</a></li>
      <?php }?>
    </ul>
  </aside>
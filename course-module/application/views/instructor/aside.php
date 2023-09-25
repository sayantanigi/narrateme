<?php
if($myprofile!=''){
	foreach($myprofile as $mf){ 
?>
<div class="navbar-default sidebar" role="navigation">
    <p class="centered"> <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>user_panel/student/img/logo1.png" width= "100%"></a> </p>
    <div class="sidebar-nav navbar-collapse"> 
      <div  align="center">
        <p class="centered" id="circle"> <a href="#"><?php if($mf->profile_image==''){?>
    	<img src="<?php echo base_url()?>user_panel/student/img/Layer 5.jpg" width= "100%"> 
    <?php }else{?>
    	<img src="<?php echo base_url()?>uploads/profile/<?php echo $mf->profile_image?>" width="100%"> </a> 
    <?php }?> </a> <span class="profile_name"><?php echo $mf->first_name?> &nbsp; <?php echo $mf->last_name?> </span></p>

      </div>
      <ul class="nav cst_nav" id= "side-menu">
        <li class="bbg3 "> <a href="<?php echo base_url()?>member/profile"><i class="fa fa-dashboard fa-fw1"></i> Dashboard</a> </li>
        <li class="bbg "> 
        <a href="<?php echo base_url('')?>member/instructor_time_table">
        	<i class="fa fa-calendar fa-fw1" aria-hidden="true"></i>Time Table</a> 
            </li>
       <li data-toggle="collapse" data-target="#profile" class="bbg collapsed "> <a href="#"><i class="fa fa-user fa-fw1" aria-hidden="true"></i> Profile <span class="angle_1"><i class="fa fa-angle-left" aria-hidden="true"></i></span> <span class="angle_2"><i class="fa fa-angle-down" aria-hidden="true"></i></span> </a></li>
        <ul class="nav nav-second-level collapse" id="profile">
        <li class="bbg1 active"> <a href="<?php echo base_url()?>member/editinstprf" ><i class="fa fa-user fa-fw1" aria-hidden="true"></i>My profile </a> </li>
        <li class="bbg1"> <a href="<?php echo base_url()?>member/editinstpass"><i class="fa fa-cog fa-fw1" aria-hidden="true"></i>Settings </a> </li>
        
        </ul>
        <li  class="bbg"> <a href="<?=base_url();?>member/instructor_course"><i class="fa fa-book fa-fw1"></i>My Courses Class  </a></li>
       
        <!-- /.nav-second-level -->
        <!-- <li class="bbg "> <a href="#"><i class="fa fa-users fa-fw1"></i>My Groups</a> </li> -->
         <li class="bbg"> <a href="<?php echo base_url()?>member/announcement"><i class="fa fa-bullhorn fa-fw1"></i>Announcement</a> </li>
        <li class="bbg"> <a href="#"><i class="fa fa-trophy fa-fw1"></i>My Achievement</a> </li>
        <li class="bbg"> <a href="<?php echo base_url()?>member/chat_inst"><i class="fa fa-trophy fa-fw1"></i>My Chat</a> </li>
        
        </ul>
    </div>
    <!-- /.sidebar-collapse --> 
  </div>
 <?php
	}
}
 ?> 
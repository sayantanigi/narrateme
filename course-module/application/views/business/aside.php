<?php
if($myprofile!=''){
	foreach($myprofile as $mf){ 
?>
<div class="navbar-default sidebar" role="navigation">
    <p class="centered"> <img src="<?=base_url();?>user_panel/business/img/logo1.png" width="100%"> </p>
    <div class="sidebar-nav navbar-collapse"> 
      
      <!--<p class="centered">   
           <svg height="100" width="100">
             <circle cx="50" cy="50" r="40" stroke="#A2C827" stroke-width="3" fill="#fff" />
         
             </svg>
             </p>-->
      <div  align="center">
        <p class="centered" id="circle"> <a href="#"><?php if($mf->profile_image==''){?>
    	<img src="<?php echo base_url()?>user_panel/student/img/Layer 5.jpg" width= "100%"> 
    <?php }else{?>
    	<img src="<?php echo base_url()?>uploads/profile/<?php echo $mf->profile_image?>" width="100%"> </a> 
    <?php }?> <span class="profile_name"><?php echo $mf->business_name?>  </span></p>
      </div>
      <ul class="nav cst_nav" id= "side-menu">
        <li class="bbg3" style="background-color:#1B83C1 !important;"> <a href="<?=base_url();?>member/profile" style="background-color:#1B83C1 !important;"><i class="fa fa-dashboard fa-fw1"></i> Dashboard</a> </li>
        <li class="bbg"> <a href="<?=base_url();?>member/time_table_business"><i class="fa fa-calendar fa-fw1" aria-hidden="true"></i>Time Table</a> </li>
   <li data-toggle="collapse" data-target="#profile" class="bbg collapsed "> <a href="#"><i class="fa fa-user fa-fw1" aria-hidden="true"></i> Profile <span class="angle_1"><i class="fa fa-angle-left" aria-hidden="true"></i></span> <span class="angle_2"><i class="fa fa-angle-down" aria-hidden="true"></i></span> </a></li>
        <ul class="nav nav-second-level collapse" id="profile">
        <li class="bbg1 "> <a href="<?=base_url();?>member/editbusiprofile" style="background-color:#1B83C1 !important;" ><i class="fa fa-user fa-fw1" aria-hidden="true"></i>My profile </a> </li>
        <li class="bbg1"> <a href="<?=base_url();?>member/editbusipass"><i class="fa fa-cog fa-fw1" aria-hidden="true"></i>Settings </a> </li>
        
        </ul>       
        
         <li data-toggle="collapse" data-target="#member" class="bbg collapsed "> <a href="#"><i class="fa fa-user fa-fw1" aria-hidden="true"></i> Member <span class="angle_1"><i class="fa fa-angle-left" aria-hidden="true"></i></span> <span class="angle_2"><i class="fa fa-angle-down" aria-hidden="true"></i></span> </a></li>
        <ul class="nav nav-second-level collapse" id="member">
          <li class="bbg1 "> <a href="<?php echo base_url()?>member/add_member/" ><i class="fa fa-user fa-fw1" aria-hidden="true"></i>Add Member </a> </li>
          <!--<li class="bbg1 "> <a href="javascript:void(0)" ><i class="fa fa-user fa-fw1" aria-hidden="true"></i>Member Edit</a> </li>-->
          <li class="bbg1"> <a href="<?php echo base_url()?>member/business_member"><i class="fa fa-cog fa-fw1" aria-hidden="true"></i>View Member </a> </li>
        </ul>
        <li class="bbg1"> <a href="<?=base_url();?>member/current_student_business" ><i class="fa fa-book fa-fw1" aria-hidden="true"></i>Current Student</a> </li>
        <li class="bbg1"> <a href="<?=base_url();?>member/past_student_business"><i class="fa fa-book fa-fw1" aria-hidden="true"></i>Past Student</a> </li>
        <!--/ul--> 
        <!-- /.nav-second-level -->
        
        <li class="bbg"> <a href="<?=base_url();?>member/allcourses_business"><i class="fa fa-trophy fa-fw1"></i>All Courses</a> </li>
        <!--  <li class="bbg">
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i>my time Tables</a>
                        </li>
                        <li class="bbg2">
                            <a href="tables.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>-->
        
      </ul>
    </div>
    <!-- /.sidebar-collapse --> 
  </div> <?php
	}
}
 ?> 
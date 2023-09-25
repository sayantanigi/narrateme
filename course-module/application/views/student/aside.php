<!-- <?php
if($myprofile!=''){
	foreach($myprofile as $mf){ 
?>
<div class="navbar-default sidebar" role="navigation">
    <p class="centered"> <a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>user_panel/student/img/logo1.png" width= "100%"></a> </p>
    <div class="sidebar-nav navbar-collapse"> 
      <div  align="center">
        <p class="centered" id="circle"> <a href="#">
		<?php if($mf->profile_image==''){?>
    		<img src="<?php echo base_url()?>user_panel/student/img/Layer 5.jpg" width= "100%"> 
    	<?php }else{?>
    		<img src="<?php echo base_url()?>uploads/profile/<?php echo $mf->profile_image?>" width="100%"> </a> 
    	<?php }?> 
    </a> <span class="profile_name"><?php echo $mf->first_name?> &nbsp; <?php echo $mf->last_name?> </span></p>
      </div>
      <ul class="nav cst_nav" id= "side-menu">
        <li class=""><a href="<?php echo base_url('')?>member/profile"><i class="fa fa-dashboard fa-fw1"></i> Dashboard</a> </li>
        <li class="bbg"> <a href="<?php echo base_url('')?>member/time_table"><i class="fa fa-calendar fa-fw1" aria-hidden="true"></i>Time Table</a> </li>
        <!--li class="bbg active"> <a href="profile.html"><i class="fa fa-user fa-fw1"></i>Profile</a> </li-->
        <li data-toggle="collapse" data-target="#profile" class="bbg collapsed active"> <a href="#"><i class="fa fa-user fa-fw1" aria-hidden="true"></i> Profile <span class="angle_1"><i class="fa fa-angle-left" aria-hidden="true"></i></span> <span class="angle_2"><i class="fa fa-angle-down" aria-hidden="true"></i></span> </a></li>
        <ul class="nav nav-second-level collapse" id="profile">
        <li class="bbg1 active"> <a href="<?php echo base_url('')?>member/editstdprf" ><i class="fa fa-user fa-fw1" aria-hidden="true"></i>My profile </a> </li>
        <li class="bbg1"> <a href="<?php echo base_url('')?>member/stdsetting"><i class="fa fa-cog fa-fw1" aria-hidden="true"></i>Settings </a> </li>
        
        </ul>
        <li class="bbg1"> <a href="<?php echo base_url()?>member/current_course" ><i class="fa fa-book fa-fw1" aria-hidden="true"></i>Current Courses</a> </li>
        <li class="bbg1"> <a href="<?php echo base_url()?>member/std_past_course"><i class="fa fa-book fa-fw1" aria-hidden="true"></i>Past Courses</a> </li>
        <!-- /.nav-second-level -->
        
        <li class="bbg"> <a  href="<?php echo base_url()?>member/course_cirtificate"><i class="fa fa-trophy fa-fw1"></i>My Certificates</a> </li>
       <li class=""> <a style="background-color:#006eb2 !important;" href="<?php echo base_url()?>member/chat_student" ><i class="fa fa-book fa-fw1" aria-hidden="true"></i>My Chat</a> </li>
        
       <!--  <li class="bbg"> <a target="_blank" href="<?php echo base_url()?>member/get_cirtificates"><i class="fa fa-trophy fa-fw1"></i>My Cirtificates</a> </li> -->
       
      </ul>
    </div>
    <!-- /.sidebar-collapse --> 
  </div>-->
 <?php
//	}
//}
 ?> 

  <section>
        <div class="pro-cover">
        </div>
        <div class="pro-menu">
            <div class="container">
                <div class="col-md-9 col-md-offset-3">
                    <ul>
                        <li><a href="dashboard.html">My Dashboard</a></li>
                        <li><a href="db-profile.html" class="pro-act">Profile</a></li>
                        <li><a href="db-courses.html">Courses</a></li>
                        <li><a href="db-exams.html">Exams</a></li>
                        <li><a href="db-time-line.html">Time Line</a></li>
                       
                        <li><a href="#">Entry</a></li>
                        <li><a href="#">Notifications</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-3">
                    <div class="pro-user">
                        <img src="images/user.jpg" alt="user">
                    </div>
                    <div class="pro-user-bio">
                        <ul>
                            <li>
                                <h4>Emily Jessica</h4>
                            </li>
                            <li>Student Id: ST17241</li>
                            <li><a href="#!"><i class="fa fa-facebook"></i> Facebook: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-google-plus"></i> Google: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-twitter"></i> Twitter: my sample</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="udb">

                        <div class="udb-sec udb-prof">
                            <h4><img src="images/icon/db1.png" alt="" /> My Profile</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                to using 'Content here, content here', making it look like readable English.</p>
                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="responsive-table bordered">
                                    <tbody>
                                        <tr>
                                            <td>Student Name</td>
                                            <td>:</td>
                                            <td>Sam Anderson</td>
                                        </tr>
                                        <tr>
                                            <td>Student Id</td>
                                            <td>:</td>
                                            <td>ST17241</td>
                                        </tr>
                                        <tr>
                                            <td>Eamil</td>
                                            <td>:</td>
                                            <td>sam_anderson@gmail.com</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>:</td>
                                            <td>+01 4561 3214</td>
                                        </tr>
                                        <tr>
                                            <td>Date of birth</td>
                                            <td>:</td>
                                            <td>03 Jun 1990</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>:</td>
                                            <td>8800 Orchard The Centre, Farnham Road, Slough, SL1 4UT</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><span class="db-done">Active</span> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="sdb-bot-edit">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                                    <a href="#" class="waves-effect waves-light btn-large sdb-btn sdb-btn-edit"><i class="fa fa-pencil"></i> Edit my profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
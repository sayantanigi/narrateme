 <?php 
    if($myprofile!=''){
    foreach($myprofile as $mf){
?>
     <section>
        <div class="pro-cover">
        </div>
        <div class="pro-menu">
            <div class="container">
                <div class="col-md-9 offset-md-3">
                    <ul>
                        <li><a href="dashboard.html">My Dashboard</a></li>
                        <li><a href="db-profile.html"  class="pro-act">Profile</a></li>
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
               <div class="row">
                    <div class="col-md-3">
                    <div class="pro-user">
                        <img src="<?php echo base_url()?>uploads/profile/<?php echo $mf->profile_image?>" alt="user">
                    </div>
                    <div class="pro-user-bio">
                        <ul>
                            <li>
                                <h4><?php echo $mf->first_name?> &nbsp; <?php echo $mf->last_name?></h4>
                            </li>
                            <li>Eamil Id: <?php echo $mf->email?></li>
                            <li><a href="#!"><i class="fa fa-facebook"></i> Facebook: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-google-plus"></i> Google: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-twitter"></i> Twitter: my sample</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="udb">

                        <div class="udb-sec udb-prof">
                            <h4><img src="images/icon/db1.png" alt=""> My Profile</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                to using 'Content here, content here', making it look like readable English.</p>
                            <div class="sdb-tabl-com sdb-pro-table">
                                <table class="responsive-table bordered">
                                    <tbody>
                                        <tr>
                                            <td>Student Name</td>
                                            <td>:</td>
                                            <td><?php echo $mf->first_name?> &nbsp; <?php echo $mf->last_name?></td>
                                        </tr>
                                        <tr>
                                            <td>Eamil</td>
                                            <td>:</td>
                                            <td><?php echo $mf->email?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>:</td>
                                            <td><?php echo $mf->phoneno?></td>
                                        </tr>
                                        <tr>
                                            <td>Date of birth</td>
                                            <td>:</td>
                                            <td><?php echo $mf->dob?></td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>:</td>
                                            <td><?php echo $mf->address?></td>
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
        </div>
    </section>
      <?php } } ?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12" id="content">
      <center>
        <h1 class="page-header1" id="at" >Current <font color="#005CA9">Student</font></h1>
      </center>
    </div>
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> Current Student
          <div id="search">
          	<div class="row">
            	<div class="col-md-11">
            		<form action="" autocomplete="on">
              <input id="search"  class="myinput1" name="search" type="text" placeholder="Enter student Name">
              <button id="search_submit"  type="submit"><i class="fa fa-search" aria-hidden="true"></i> </button>
            </form>
            	</div>
                
            </div>
          </div>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Email Id</th>
                  <th>Join Date</th>
                  <th>Course Name</th>
                  <th>Course Assigned Date</th>
                  <th>Payment Status </th>
                </tr>
              </thead>
              <tbody>
              <?php 
			  if(!empty($currentstudents)){
				  foreach($currentstudents as $cs){
			  ?>
                <tr>
                  <td><?php echo $cs->first_name." ".$cs->last_name?></td>
                  <td><?php echo $cs->email?></td>
                  <td><?php echo date('d-m-Y',strtotime($cs->add_date))?></td>
                  <td><?php 
                    $email=$cs->email;
                    
                    $course_details=$this->generalmodel->fetch_single_join("Select * from sm_course_booking where student_id='$email'");
                    //print_r($course_details);
                    echo $course_details->course_name;
                   ?>
                    <!-- <div class="co_details">
                     <a href="#myModal6" role="button" class="btn btn-default" data-toggle="modal">View Courses </a>
                      
                     </div> -->
                   </td>
                    <td><?php echo date('d-m-Y',strtotime($course_details->book_date))?></td>
                    <td><?php echo $course_details->pay_status ?></td>
                </tr>
                <?php }
			  }else{
				?>
                <tr>
                  <td colspan="4">No member yet</td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <!-- /.table-responsive --> 
        </div>
        <!-- /.panel-body --> 
      </div>
      <!-- /.panel --> 
    </div>
    
    <!-- /.row --> 
    
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <p>Copyright © OES  | <?= date('Y') ?></p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 d_by">
        <p>Developed &amp; Designed By <a href="http://www.goigi.com/" target="_blank"> GOIGI.COM</a></p>
      </div>
    </div>
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper -->
</div>
<!-- Bootstrap Core JavaScript --> 
<script src="<?php echo base_url()?>user_panel/business/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="<?php echo base_url()?>user_panel/business/bower_components/metisMenu/dist/metisMenu.min.js"></script> 

<!-- Morris Charts JavaScript --> 
<script src="<?php echo base_url()?>user_panel/business/bower_components/raphael/raphael-min.js"></script> 
<script src="<?php echo base_url()?>user_panel/business/bower_components/morrisjs/morris.min.js"></script> 
<script src="<?php echo base_url()?>user_panel/business/js/morris-data.js"></script> 
<script src="<?php echo base_url()?>user_panel/business/js/custom-file-input.js"></script> 
<!-- Custom Theme JavaScript --> 
<script src="<?php echo base_url()?>user_panel/business/dist/js/sb-admin-2.js"></script>
</body></html>
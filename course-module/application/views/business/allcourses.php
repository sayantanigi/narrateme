  
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <center>
          <h1 class="page-header1" id="at" >Welcome Back <font color="#005CA9">Your Business</font></h1>
        </center>
      </div>
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading"> Current Student </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Email Id</th>                    
                    <th>Course Name</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
        if(!empty($currentstudents)){
          foreach($currentstudents as $current){ 
            $std_id=$current->student_id;
             $std_details=$this->generalmodel->fetch_single_join("Select * from sm_member where email='$std_id'");
             $id=$std_details->member_id;
             $certificate=$this->generalmodel->fetch_single_join("Select * from sm_generate_cirtificate where std_id='$id'");
             $student=$this->generalmodel->fetch_single_join("Select * from sm_member where member_id='$std_id'");
             if(empty($certificate))
             {
            ?>
                  <tr>
                    <td><?php echo $std_details->first_name." ".$std_details->last_name ?></td>
                    <td><?php echo $current->student_id; ?></td>
                    <td><?php echo $current->course_name; ?></td>
                  
                   
                  </tr>
                 <?php } }} else{ ?>
                    <tr>
                   <td colspan="4"> No Member</td>
                  </tr>
                <?php }  ?>
                 
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive --> 
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading"> Past Student </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Student Name</th>
                    <th>Email Id</th>                    
                    <th>Course Name</th>
                  </tr>
                </thead>
                <tbody>
                   <?php 
        if(!empty($paststudents)){
          foreach($paststudents as $current){ 
            $std_id=$current->student_id;
             $std_details=$this->generalmodel->fetch_single_join("Select * from sm_member where email='$std_id'");
             $id=$std_details->member_id;
             $certificate=$this->generalmodel->fetch_single_join("Select * from sm_generate_cirtificate where std_id='$id'");
             $student=$this->generalmodel->fetch_single_join("Select * from sm_member where member_id='$std_id'");
             if(!empty($certificate))
             {
            ?>
                  <tr>
                    <td><?php echo $std_details->first_name." ".$std_details->last_name ?></td>
                    <td><?php echo $current->student_id; ?></td>
                    <td><?php echo $current->course_name; ?></td>
                  
                   
                  </tr>
                 <?php } else{ ?>
                    <tr>
                   <td colspan="4"> No Member</td>
                  </tr>
                <?php }  } } ?>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive --> 
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
      
      <script type="text/javascript">
	 $(document).ready(function() { 
		$('#incfont').click(function(){	   
        curSize= parseInt($('#content').css('font-size')) + 2;
		if(curSize<=20)
        $('#content').css('font-size', curSize);
        });  
		$('#decfont').click(function(){	   
        curSize= parseInt($('#content').css('font-size')) - 2;
		if(curSize>=12)
        $('#content').css('font-size', curSize);
        });
		
		
		
		$('.btn-toggle').click(function() {
    $(this).find('.btn').toggleClass('active');  
    
    if ($(this).find('.btn-primary').size()>0) {
    	$(this).find('.btn').toggleClass('btn-primary');
    }
    if ($(this).find('.btn-danger').size()>0) {
    	$(this).find('.btn').toggleClass('btn-danger');
    }
    if ($(this).find('.btn-success').size()>0) {
    	$(this).find('.btn').toggleClass('btn-success');
    }
    if ($(this).find('.btn-info').size()>0) {
    	$(this).find('.btn').toggleClass('btn-info');
    }
    
    $(this).find('.btn').toggleClass('btn-default');
       
});

$('form').submit(function(){
	alert($(this["options"]).val());
    return false;
});
		
		
		 
	});
</script>
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"> SPECIAL OFFER </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="table-responsive" align="center">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Offer</th>
                    <th>Offer %</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(!empty($offer))
                    {
                      foreach ($offer as $off) {
                       
                   ?>
                  <tr>
                    <td><?php echo $off->discount_code; ?></td>
                    <td><?php  echo $off->percentage; ?></td>
                    <td><div class="co_details"> <a href="javascript:void(0);">Active </a></div>
                    </td>
                    
                  </tr>
                  <?php } } else {?>
                  <tr>
                    <td colspan="3">No Offer Yet</td>
                  </tr>
                  <?php } ?>
                  
                  
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive --> 
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>
      <!-- /.col-lg-6 --> 
      
      <!-- /.col-lg-6 --> 
    </div>
    <!-- /.row -->
    
    
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <p>Copyright © OES  | <?= date('Y') ?></p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 d_by">
        <p>Developed & Designed By <a href="http://www.goigi.com/" target="_blank"> GOIGI.COM</a></p>
      </div>
    </div>
  </div>
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper --> 

      <div id="myModal6" class="modal" data-easein="swoopIn"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             
            </div>
            <div class="modal-body">
              <div class="panel panel-default">
          <div class="panel-heading"> Course List </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="table-responsive" align="center">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Course name</th>
                    <th>Course Price</th>
                    <th>Course Start Date</th>
                    <th>Course End Dte</th>
                    <th>Remove Course</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>course_name</td>
                    <td>$300</td>
                    <td>05/06/2016</td>
                    <td>30/12/2016</td>
                     <td><button type="submit" class="remove_ico"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                  </tr><tr>
                    <td>course_name</td>
                    <td>$300</td>
                    <td>05/06/2016</td>
                    <td>30/12/2016</td>
                     <td><button type="submit" class="remove_ico"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                  </tr><tr>
                    <td>course_name</td>
                    <td>$300</td>
                    <td>05/06/2016</td>
                    <td>30/12/2016</td>
                     <td><button type="submit" class="remove_ico"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                  </tr><tr>
                    <td>course_name</td>
                    <td>$300</td>
                    <td>05/06/2016</td>
                    <td>30/12/2016</td>
                     <td><button type="submit" class="remove_ico"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                  </tr>
                  
                  
                  
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive --> 
          </div>
          <!-- /.panel-body --> 
        </div>
            </div>
            <!--<div class="modal-footer">
              <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
              <button class="btn btn-primary">Save changes</button>
          </div>-->
        </div>
        </div>
      </div>
<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url();?>user_panel/business/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="<?=base_url();?>user_panel/business/bower_components/metisMenu/dist/metisMenu.min.js"></script> 

<!-- Morris Charts JavaScript --> 
<script src="<?=base_url();?>user_panel/business/bower_components/raphael/raphael-min.js"></script> 
<script src="<?=base_url();?>user_panel/business/bower_components/morrisjs/morris.min.js"></script> 
<script src="<?=base_url();?>user_panel/business/js/morris-data.js"></script> 

<!-- Custom Theme JavaScript --> 
<script src="dist/js/sb-admin-2.js"></script>
</body>
</html>

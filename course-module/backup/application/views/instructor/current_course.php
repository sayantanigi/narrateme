<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12" id="content">
      <center>
        <h1 class="page-header1" id="at" >List of  <font color="#005CA9">Courses</font></h1>
      </center>
    </div>
    <div class="col-lg-12">
      <div class="row">
        <?php 
         //$this->load->model('generalmodel'); 
         //$this->load->model('admin_model'); 
		if(!empty($inst)){
		foreach($inst as $i){
		$cid = $i->course_id;
		$course= $this->instructor_model->show_course_id($cid); 
                
		?>
        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading" style="padding:5px"> <?php echo @$course[0]->course_name?> </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
                <table width="100%" border="1" class="table table-striped table-bordered table-hover">
                  <tr align="center">
                    <td colspan="2" valign="middle"><div class="c_img1"><img src="<?php echo base_url()?>user_panel/student/img/logo.jpg" class="img-responsive "> </div></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">Class Date</td>
                    <td align="left" valign="middle"><?php echo date('d-M-Y',strtotime($i->class_date))?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">Start Time Date</td>
                    <td align="left" valign="middle"><?php echo date('H:i',strtotime($i->start_time))?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">End Time</td>
                    <td align="left" valign="middle"><?php echo date('H:i',strtotime($i->end_time))?></td>
                  </tr>
                  
                 
                  <tr>
                    <td>Mode</td>
                    <td><?php
			$mid = $i->mode_id;
			$mode = $this->instructor_model->show_mode_id($mid);
			echo $mode[0]->mode_title;?></td>
                  </tr>
                  <tr>
                    <td>List Of Student</td>
                    <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">View Student</button></td>
                  </tr>
                </table>
                <div class="co_details"> <a href="<?php echo base_url()?>course/coursedescription/<?php echo $i->course_id?>">Course Description </a> </div>
              </div>
            </div>
          </div>
        </div>
           <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">List of Students</h4>
      </div>
      <div class="modal-body">
          <?php
          //$cid.
          $course_id=$course[0]->course_id;
         //echo $course_id;
          
         $colist=$this->generalmodel->fetch_all_join("Select student_id from sm_course_booking where course_id='$course_id'");
        
          
 //print_r($colist);
          ?>
          <table class="table-striped table-bordered" width="100%">
              <tr><td>Name</td> <td>Email</td></tr>
              <?php if(count($colist)>0) { 
                  
     foreach ($colist as $std) {
    
       //  print_r($std);
     $sd=$std->student_id;
    // echo $sd;
     //exit();
     $stdlist=$this->generalmodel->fetch_all_join("Select * from sm_member where email='$sd'");
     foreach($stdlist as $list){            
     ?>
              <tr><td><?php echo $list->first_name; ?> &nbsp; <?php echo $list->last_name; ?> </td><td><?php echo $list->email; ?></td></tr>
     <?php } } } else {
              ?>
              <tr><td colspan="2">No Student LIst</td></tr>
              <?php } ?>
          </table>
      
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
        <?php 
				}
			}
		?>
      </div>
       
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
</div>

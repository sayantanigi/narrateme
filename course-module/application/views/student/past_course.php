<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12" id="content">
      <center>
        <h1 class="page-header1" id="at" >Past <font color="#005CA9">Courses</font></h1>
      </center>
    </div>
    <div class="col-lg-12">
    	<?php
		$success=$this->session->flashdata('success');
		 if($success!=''){
		?>
        <div class="alert alert-success">
  			<strong>Success!</strong> <?php echo $this->session->flashdata('success')?>
		</div>
        <?php } ?>
    </div>
    <div class="col-lg-12">
      <div class="row">
        <?php 
			//if(!empty($details)){
        if(count($details)>=1){
				
        foreach($details as $dt){
           $cid=$dt->course_id;
    $coursedescription = $this->generalmodel->fetch_single_join("select * from sm_course_lesion where course_id='$cid'");

		?>
        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading" style="padding:5px"> <?php echo $dt->course_name?> </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
              <div class="table-responsive">
                <table width="100%" border="1" class="table table-striped table-bordered table-hover">
                  <tr align="center">
                    <td colspan="2" valign="middle"><div class="c_img1"><img src="<?php echo base_url()?>user_panel/student/img/logo.jpg" class="img-responsive "> </div></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">Starting Date</td>
                    <td align="left" valign="middle"><?php echo date('d-M-Y', strtotime($coursedescription->start_date))?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">Start Time Date</td>
                    <td align="left" valign="middle"><?php echo date('H:i', strtotime($coursedescription->start_time))?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">End Time</td>
                    <td align="left" valign="middle"><?php echo date('H:i', strtotime($coursedescription->end_time))?></td>
                  </tr>
                  
                  <tr>
                    <td align="left" valign="middle">Price</td>
                    <td align="left" valign="middle"><?php echo $dt->price?></td>
                  </tr>
                  <tr>
                    <td>Mode</td>
                    <td><?php echo $dt->mode?></td>
                  </tr>
                  <!--<tr>
                    <td>Attendance</td>
                    <td>90</td>
                  </tr>-->
                </table>
              <div class="co_details"> 
                 <button type="button" class="btn btn-info btn-lg btnfeedback" data-toggle="modal" data-target="#myModal<?php echo $dt->course_id?>">Feedback</button>
                
                </div> 
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="myModal<?php echo $dt->course_id?>" role="dialog">
    		<div class="modal-dialog modal-lg">
      			<div class="modal-content">
        			<div class="modal-header">
          				<button type="button" class="close" data-dismiss="modal">&times;</button>
          				<h4 class="modal-title">Feedback against <?php echo $dt->course_name?></h4>
        			</div>
                    <form method="post" action="<?php echo base_url()?>member/postfeedback" id="form<?php echo $dt->course_id?>">
        				<div class="modal-body">
          				<p><textarea style="resize:vertical;" class="form-control" id="feedbackcomment<?php echo $dt->course_id?>" placeholder="Message..." rows="6" name="comment" required=""></textarea>
                        <label id="errorfeedbackcomment<?php echo $dt->course_id?>"></label>
                        </p>
                        <input type="hidden" value="<?php echo $dt->course_id?>" name="course_id" />
                        <input type="hidden" value="<?php echo $user_id?>" name="user_id" />
        			</div>
        				<div class="modal-footer">
                        
                        
                        <input type="submit" class="btn btn-default" name="" value="Submit" onclick="return validatefeedback<?php echo $dt->course_id?>()" />
          				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			</div>
                    </form>
      			</div>
                <script>
				function validatefeedback<?php echo $dt->course_id?>(){
					if($("#feedbackcomment<?php echo $dt->course_id?>").val() == "" ){
						$("#feedbackcomment<?php echo $dt->course_id?>").focus();
						$("#errorfeedbackcomment<?php echo $dt->course_id?>").show();
						$('#feedbackcomment<?php echo $dt->course_id?>').css('border:','1px solid #EB2341 !important');
						$("#errorfeedbackcomment<?php echo $dt->course_id?>").html("Please Enter Your Comment");
						return false;
					}else{
						$("#form<?php echo $dt->course_id?>").submit();
					}
				}
				</script>
                <style>#errorfeedbackcomment<?php echo $dt->course_id?>{color:#F00;}</style>
    		</div>
  		</div>
        <?php 
				}
			} else{?>
		
          <p class="pre_course"> No Previous Courses Details</p>
          
                        <?php } ?>
 
      </div>
    </div>
    <?php /*?><script type="text/javascript">
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
	
	
</script><?php */?> 
    
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

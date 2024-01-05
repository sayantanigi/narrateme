<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12" id="content">
      <center>
        <h1 class="page-header1" id="at" > <font color="#005CA9"><?php echo $title;?></font></h1>
      </center>
    </div>
    <div class="col-lg-12">
      <div class="row">
        <?php 
			if(!empty($details)){
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
                    <td align="left" valign="middle"><?php echo date('d-M-Y',strtotime($coursedescription->start_date))?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">Start Time Date</td>
                    <td align="left" valign="middle"><?php echo date('H:i',strtotime($coursedescription->start_time))?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">End Time</td>
                    <td align="left" valign="middle"><?php echo date('H:i',strtotime($coursedescription->end_time))?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">Price</td>
                    <td align="left" valign="middle"><?php echo $dt->price?></td>
                  </tr>
                  <tr>
                    <td>Mode</td>
                    <td><?php echo $dt->mode?></td>
                  </tr>
                </table>
                <div class="co_details"> 

                	<?php
					$CI =& get_instance();
					$result = $CI->cirtificateexists($dt->course_id);
					if(!empty($result)){
					?>
                	<a href="<?php echo base_url()?>member/get_cirtificates/<?php echo $dt->course_id?>">Get Certificate </a>
                    <?php } else{ ?>
                    <p>Your Certificate generation is in process. Please Wait!  </p>
                    <?php } ?>
                </div>
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
        <p>Developed &amp; Designed By <a href="http://www.goigi.com/" target="_blank"> GOIGI.COM</a></p>
      </div>
    </div>
  </div>
  <!-- /#page-wrapper --> 
  
</div>
</div>

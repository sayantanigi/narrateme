<?php 
  	if($myprofile!=''){
		foreach($myprofile as $mf){
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12" id="content">
      <center>
        <h1 class="page-header1" id="at" >Your <font color="#005CA9">Certificates</font></h1>
      </center>
    </div>
    <div class="col-lg-12">
      <div class="col-md-12 col-lg-12 " align="center">
       		
        <?php 
			if($mycirtificates!=''){
				foreach($mycirtificates as $mcir){
		?>
        <div class="cirgen" id="cirgen">
         <link href="https://fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
         <div style="width:670px; height:955px; margin:0 auto; background:url(<?php echo base_url();?>images/bg.jpg) no-repeat; font-family:Arial, Helvetica, sans-serif;">
          <h2 style="text-align:center; padding-top:415px; color:#f00; font-size:62px; font-weight:400; font-family: 'Tangerine', cursive; font-style:italic; margin-bottom:0;"> <?php echo $profile_name;?> </h2>
          <h3 style="text-align:center; padding-top:40px; color:#2d5696; font-size:24px; font-weight:bold; margin-top:10px;"><?php echo $coursename;?></h3>
          <p style="text-align:right; margin-top:180px; font-size:13px; margin-right:90px;"><strong>Date:</strong> <?php echo date('d-m-Y',strtotime($mcir->issue_date))?></p>
        </div>
        
        <div style="width:670px; height:955px; margin:0 auto; background:url(<?php echo base_url();?>images/bgback.jpg) no-repeat; margin-top:20px;"></div>
        </div>
        
<script>
function printDiv(cirgen) {
    //$('body').css('background-image', 'url(../images/bgback.jpg)');
     var printContents = document.getElementById(cirgen).innerHTML;
     var originalContents = document.body.innerHTML;
   //document.body.style.background = "#f3f3f3 url('http://java2s.com/style/demo/border.png') no-repeat right top";
  //document.body.style.background="url('<?php echo base_url();?>images/bg.jpg')";
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>
<input type="button" onclick="printDiv('cirgen')" value="Print Your Certificate" style="background-color: #ff0; border: 1px solid;margin-top: 12px;padding: 10px;" />
<?php } 		} 	?>
      </div>
      <!-- /.panel --> 
    </div>
    <!-- /.col-lg-6 --> 
    
  </div>
  <!-- /.row --> 
  
  <!-- /.row -->
  <!--<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <p>Copyright © OES  | 2017</p>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 d_by">
      <p>Developed & Designed By <a href="http://www.goigi.com/" target="_blank"> GOIGI.COM</a></p>
    </div>
  </div>-->
</div>
<?php
		} 	} ?>
<!-- /#page-wrapper -->

</div>
<script src="<?php echo base_url()?>user_panel/student/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/metisMenu/dist/metisMenu.min.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/raphael/raphael-min.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/morrisjs/morris.min.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/js/morris-data.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/js/custom-file-input.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/dist/js/sb-admin-2.js"></script>
</body>
</html>
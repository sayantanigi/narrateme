<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12" id="content">
			<center>
				<h1 class="page-header1" id="at" >Past <font color="#005CA9">Student</font></h1>
			</center>
		</div>
		<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading" > Past Student <div id="search">
	<form action="" autocomplete="on">
	<input id="search" name="search" class="myinput1" type="text" placeholder="Enter student Name ?">
	<button id="search_submit"  type="submit"><i class="fa fa-search" aria-hidden="true"></i> </button>
	</form>
</div></div>
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
										<th>Payment Status</th>
										<th>Certificate Details</th>
									 
									</tr>
								</thead>
								<tbody>
										<?php 
				if(!empty($currentstudents)){
					foreach($currentstudents as $cs){
					//	print_r($currentstudents); 
						$std_id=$cs->student_id;
						 $std_details=$this->generalmodel->fetch_single_join("Select * from sm_member where email='$std_id'");
				?>
									<tr>
										<td><?php echo $std_details->first_name." ".$std_details->last_name ?></td>
										<td><?php echo $std_details->email?></td>
										<td><?php echo date('d-m-Y',strtotime($std_details->add_date))?></td>
										<td><?php echo $cs->course_name?></td>
										<td><?php echo date('d-m-Y',strtotime($cs->book_date))?></td>
										<td><?php  echo $cs->pay_status?></td>
										<td><?php
										$id=$std_details->member_id;
										$certificate=$this->generalmodel->fetch_single_join("Select * from sm_generate_cirtificate where std_id='$id'");
										if(!empty($certificate))
										{
											echo "Issued"." [Date:".$certificate->issue_date." ]";
										}
										else{
											echo "Not generated certificate";
										}
										//print_r($certificate);
										//echo $this->db->last_query(); exit();
									 // echo $certificate."asdasdasdas";
									//echo $this->db->last_query(); exit();

										 ?></td>
									
									 
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
				<p>Developed & Designed By <a href="http://www.goigi.com/" target="_blank"> GOIGI.COM</a></p>
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
</body>
</html>

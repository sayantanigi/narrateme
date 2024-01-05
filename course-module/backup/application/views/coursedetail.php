<style>
.cor-p1 h1 {
    font-size: 4rem;
	text-align:center;
	text-transform:uppercase;
	color:#0056a4;
}
.cor-p1 h1::before,
.cor-p1 h1::after {
    display: inline-block;
    content: "";
    border-top: .5rem solid #8bc34a;
    width: 4rem;
    margin: 0 1rem;
    transform: translateY(-1rem);
}
.table .thead-dark th {
    color: #fff;
    background-color: #343a40;
    border-color: #454d55;
	font-size:18px;
	font-weight:700;
}
.table tr td [type="radio"] + label {
    font-size:16px;
	font-weight:600;
	color:#232323;
}
.modal .modal-content {
    padding: 0;
}
	</style>   
    <!--SECTION START-->
    <section>
        <div class="container com-sp pad-bot-70 pg-inn">
            <div class="row">
                <div class="cor">
                    <div class="col-md-12">
                        <div class="cor-con-mid">
                            <div class="cor-p1">
                                <h1><?php echo $querycrs[0]->course_name;?></h1>
								<div class="cor-mid-img" style="margin:20px 0">
									<img src="<?php echo base_url();?>user_panel/new/images/course/<?php echo $querycrs[0]->course_image; ?>" alt="">
								</div>
								<h2>Basic Details</h2>
								 <p class="heading">Address : <span>Country: <?php echo $querycrs[0]->course_country;?></span> | <span>State: <?php echo $querycrs[0]->course_state;?></span>   | <span>City: <?php echo $querycrs[0]->course_city;?></span> | <span>Local Area: <?php echo $querycrs[0]->course_local_area;?></span></p> 
								 
								 <p class="heading">Course Date : <span>Start Date: <?php echo $querycrs[0]->start_date;?></span> | <span>End Date: <?php echo $querycrs[0]->end_date;?></p> 
								</span> 
								 
                            </div>
                            <div class="cor-p4">
                                <h3>Course Details:</h3>
                                <p><?php echo $querycrs[0]->course_description;?></p>
                                
                                <?php foreach ($querycrs as $value) {?>
                              <p class="heading1">CPD Accredited : <span> <?php echo $value->cpd;?></span></p>
                              <p class="heading1">Pre-Requisite : <span><?php echo $value->entry_requirment;?></span></p>
                              <?php }?>
                            </div>
                            <div class="cor-p5">
								<h3>Course Timetable</h3>
                                <table class="table table-bordered">
									<thead class="thead-dark">
									  <tr>
										<th scope="col">Morning</th>
										<th scope="col">Afternoon</th>
										<th scope="col">Evening</th>
									  </tr>
									</thead>
									<tbody>
									  <tr>
										<td>
											<div class="custom-control custom-radio">
											  <input type="radio" class="custom-control-input" name="time" id="defaultUnchecked1" data-toggle="modal" data-target="#myModal">
											  <label class="custom-control-label" for="defaultUnchecked1">9AM - 10AM</label>
											</div>
										</td>
										<td>
											<div class="custom-control custom-radio">
											  <input type="radio" class="custom-control-input" name="time" id="defaultUnchecked2" data-toggle="modal" data-target="#myModal">
											  <label class="custom-control-label" for="defaultUnchecked2">1PM - 2PM</label>
											</div>
										</td>
										<td>
											<div class="custom-control custom-radio">
											  <input type="radio" class="custom-control-input" name="time" id="defaultUnchecked3" data-toggle="modal" data-target="#myModal">
											  <label class="custom-control-label" for="defaultUnchecked3">5PM - 6PM</label>
											</div>
										</td>
									  </tr>
									  <tr>
										<td>
											<div class="custom-control custom-radio">
											  <input type="radio" class="custom-control-input" name="time" id="defaultUnchecked4" data-toggle="modal" data-target="#myModal">
											  <label class="custom-control-label" for="defaultUnchecked4">10AM - 11AM</label>
											</div>
										</td>
										<td>
											<div class="custom-control custom-radio">
											  <input type="radio" class="custom-control-input" name="time" id="defaultUnchecked5" data-toggle="modal" data-target="#myModal">
											  <label class="custom-control-label" for="defaultUnchecked5">2PM - 3PM</label>
											</div>
										</td>
										<td>
											<div class="custom-control custom-radio">
											  <input type="radio" class="custom-control-input" name="time" id="defaultUnchecked6" data-toggle="modal" data-target="#myModal">
											  <label class="custom-control-label" for="defaultUnchecked6">6PM - 7PM</label>
											</div>
										</td>
									  </tr>
									  <tr>
										<td>
											<div class="custom-control custom-radio">
											  <input type="radio" class="custom-control-input" name="time" id="defaultUnchecked7" data-toggle="modal" data-target="#myModal">
											  <label class="custom-control-label" for="defaultUnchecked7">11AM - 12PM</label>
											</div>
										</td>
										<td>
											<div class="custom-control custom-radio">
											  <input type="radio" class="custom-control-input" name="time" id="defaultUnchecked8" data-toggle="modal" data-target="#myModal">
											  <label class="custom-control-label" for="defaultUnchecked8">3PM - 4PM</label>
											</div>
										</td>
										<td>
											<div class="custom-control custom-radio">
											  <input type="radio" class="custom-control-input" name="time" id="defaultUnchecked9" data-toggle="modal" data-target="#myModal">
											  <label class="custom-control-label" for="defaultUnchecked9">7PM - 8PM</label>
											</div>
										</td>
									  </tr>
									</tbody>
									<tfoot>
										<tr>
											<td colspan="3">
												<div class="custom-control custom-radio text-center">
													<input type="radio" class="custom-control-input" name="time" id="customCheck100" data-toggle="modal" data-target="#myModalam">
													<label class="custom-control-label" for="customCheck100">Want to customize your own course and timing?</label>
												</div>
											</td>
										</tr>
									</tfoot>
								</table>
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->


  
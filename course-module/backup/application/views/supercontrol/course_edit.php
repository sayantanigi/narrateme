<?php //$this->load->view ('header');?>
<script>
        $(document).ready(function(){
            $("#check").click(function(){
                $("#drop").show(1000);
				$("#check").hide();
				$("#check2").show();
            });
			
			$("#check2").click(function(){
                $("#drop").hide(1000);
				$("#check").show();
				$("#check2").hide();
            });
            
        });
		
        </script>
<script>
			$(document).ready(function () {
				$('label').click(function() {
					$('.active').removeClass("active");
				$(this).addClass("active");
				});
			});
        </script>

<div class="page-container">
  <div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
      <?php $this->load->view ('supercontrol/leftbar');?>
    </div>
  </div>
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="<?php echo base_url(); ?>supercontrol/user/dashboard">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>Admin panel</span> </li>
        </ul>
      </div>
      <div class="alert alert-success alert-dismissable" style="padding:10px;">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
        <strong>
        <?php 
				if(@$success_msg!=''){echo @$success_msg;}
				$last = end($this->uri->segments); 
				if($last=="success"){echo "course Added Successfully ......";}
				if($last=="successdelete"){echo "course Deleted Successfully ......";}
            ?>
        </strong> </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-gift"></i>Edit course</div>
                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                  </div>
                  <div class="portlet-body form"> 
                    <!-- BEGIN FORM-->
                    <?php foreach($course as $c){?>
                    <form action="<?php echo base_url().'supercontrol/course/edit_course'?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="course_id" value="<?=$c->course_id;?>">
                    <input type="hidden" name="course_image" value="<?php echo $c->course_image;?>">
                      <div class="form-body">
                        <div class="form-group"> <b>
                          <label class="col-md-3 control-label">Select Category *</label>
                          </b>
                          <div class="col-md-8"> 
                          <select name="course_category" class="form-control">
                          <?php foreach($allcat as $ac){?>
                          	<option value="<?php echo $ac->category_id?>" <?php if($c->course_category==$ac->category_id){?> selected="selected" <?php }?>><?php echo $ac->category_name?></option>
                            <?php }?>
                          </select>
                            <label id="errorBox"></label>
                          </div>
                        </div>
                        
                        
                        <div class="form-group">
                    <label class="control-label col-md-3"> Course Image </label>
                    <div class="col-md-7">
                    <?php
                    $file = array('type' => 'file','name' => 'userfile','onchange' => 'readURL(this);');
					echo form_input($file);
                    ?>
                     <div id='default_img'><img id="select" src="<?php echo base_url()?>/uploads/courseimage/<?php echo $c->course_image;?>" alt="your image" style="width:150px;"/></div>
                    </div>
                  </div>

                      
                        
                        <div class="form-group"> <b>
                          <label class="col-md-3 control-label">Course Name *</label>
                          </b>
                          <div class="col-md-8">
                            <input type="text" name="course_name" id="title" value="<?=$c->course_name;?>" class="form-control" placeholder="Course Name" onkeyup= "leftTrim(this)"/>
                            <label id="errorBox"></label>
                          </div>
                        </div>
                        
                        <div class="form-group"> <b>
                          <label class="col-md-3 control-label">Price *</label>
                          </b>
                          <div class="col-md-8">
                            <input type="text" name="price" id="price" value="<?=$c->price;?>" class="form-control" placeholder="Price" onkeyup= "leftTrim(this)"/>
                            <label id="errorBox1"></label>
                          </div>
                        </div>
                        <div class="form-group"> <b>
                          <label class="col-md-3 control-label">Course Type *</label>
                        </b>
                        <div class="col-md-8">
                         <select name="course_type" class="form-control">
                              <option value="Upcoming Courses"   <?php if($c->course_type=='Upcoming Courses'){?> selected="selected" <?php }?>>Upcoming Courses</option>
                              <option value="Coming Soon courses"   <?php if($c->course_type=='Coming Soon courses'){?> selected="selected" <?php }?>>Coming Soon courses</option>
                            </select>
                        </div>
                      </div>

                        <div class="form-group"> <b>
                          <label class="col-md-3 control-label">Course Certificate *</label>
                        </b>
                        <div class="col-md-8">
                         <select name="certificate" class="form-control">
                              <option value="Certificate of Completion"  <?php if($c->certificate=='Certificate of Completion'){?> selected="selected" <?php }?>>Certificate of Completion</option>
                              <option value="Certificate of Attendance"  <?php if($c->certificate=='Certificate of Attendance'){?> selected="selected" <?php }?>>Certificate of Attendance</option>
                              <option value="BOTH"  <?php if($c->certificate=='BOTH'){?> selected="selected" <?php }?>>BOTH</option>
                            </select>
                        </div>
                      </div>
               
                  <div class="form-group"> <b>
                      <label class="col-md-3 control-label">Entry Requirement</label>
                    </b>
                    <div class="col-md-8">
                      <input type="text" required="" name="entry_requirment" id="entry_requirment" value="<?=$c->entry_requirment;?>" class="form-control" placeholder="Entry Requirement Details"/>
                      <!-- <label id="errorBox1"></label>-->
                    </div>
                  </div>
                   <div class="form-group"> <b>
                      <label class="col-md-3 control-label">Who should Attend</label>
                    </b>
                    <div class="col-md-8">
                      <input type="text" required="" name="who_should_apply" id="who_should_apply" value="<?=$c->who_should_apply;?>" class="form-control" placeholder="Entry Requirement Details"/>
                      
                    </div>
                  </div>
                  
                  
                  
                  
                   <div class="form-group"><b>
                                        <label class="col-md-3 control-label">Opening Date * </label></b>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="date" name="course_startDate" id="datetimepicker2" value="<?=$c->course_startDate;?>"  placeholder="Enter Day"  class="form-control"  data-format="dd-mm-yyyy">
                                            </div>
                                        </div>                                                                                                
                                    </div>
                                    
                                    <div class="form-group"><b>
                                        <label class="col-md-3 control-label">End  Date * </label></b>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="date" name="course_endDate" id="datetimepicker2e"  value="<?=$c->course_endDate;?>" placeholder="Last Day"  class="form-control"  data-format="dd-mm-yyyy">
                                            </div>
                                        </div>                                                                                                
                                    </div>
                  
                  <div class="form-group">
                                       <b>
                                       <label class="col-md-3 control-label">Course Mode *</label>
                                       </b>
                                       <div class="col-md-8">
                                          <select name="course_mode" class="form-control">
                                            <option>-- Select Mode --</option>
                                             <?php foreach($eallmode as $mod){?>
                              <option value="<?php echo $mod->id?>"  <?php if($mod->id == $c->course_mode){?> selected="selected" <?php }?> ><?=$mod->mode_title?></option>
                              <?php } ?>
                                          </select>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                       <b>
                                       <label class="col-md-3 control-label">Course Level *</label>
                                       </b>
                                       <div class="col-md-8">
                                          <select name="course_level" class="form-control">
                                            <option>-- Select Level --</option>
                                              <?php foreach($ealllevel as $lev){?>
                              <option value="<?php echo $lev->id?>"  <?php if($lev->id == $c->course_level){?> selected="selected" <?php }?> ><?=$lev->level_title?></option>
                              <?php } ?>
                                          </select>
                                       </div>
                                    </div>
                  
                  
                        <div class="form-group"> <b>
                          <label class="col-md-3 control-label">Description</label>
                          </b>
                          <div class="col-md-8">
                          <textarea id="pagedes" class="form-control" name="course_description" cols="60" rows="10"  aria-hidden="true"><?=$c->course_description;?></textarea>
                           
                          </div>
                        </div>
                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                            <input type="submit" id="submit" value="Submit" class="btn red">
                            <button type="button" class="btn default">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <?php }?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
		label {
  width: 125px;
  display: block;
  float: left;
}
label input {
  display: none;
}
label span {
  display: block;
  width: 17px;
  height: 17px;
  border: 1px solid black;
  float: left;
  margin: 0 5px 0 0;
  position: relative;
}
label.active span:after {
  content: " ";
  position: absolute;
  left: 3px;
  right: 3px;
  top: 3px;
  bottom: 3px;
  background: black;
}
		.topul li {
			list-style-type:none;
				
		}
		</style>
<script>
    	function check(){
    		if($("#title").val() == "" ){
    			$("#title").focus();
    			$("#errorBox").html("Please Enter Project Type or course");
    			return false;
    		}else{
    			$("#errorBox").html("");
    
   		 	}
    	}
    </script> 
<script>
		function leftTrim(element){
			if(element)
			element.value=element.value.replace(/^\s+/,"");
		}
	</script>
<style>
        #errorBox{
        color:#F00;
        }
        </style>
<?php //$this->load->view ('footer');?>

<?php
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."'");
//==========================SUPRATIM 15/07/2016===================

//==========================SUPRATIM 15/07/2016===================
$pagename = basename($_SERVER['PHP_SELF']);
?>

<section id="main">
<?php include('lib/aside.php');?>

<section id="content">
<div class="container">
<div class="block-header">
  <h2>Welcome Back <span style="color:#666; font-weight:400;">
    <?=ucfirst($_SESSION["username"])?>
    </span>	<small><?php if($view['ind'] ==1){ echo "Individual,";} if($view['std'] ==1){ echo "Student,";} if($view['edu'] ==1){ echo "Educational Institute,";} 
		if($view['edu'] ==1){echo "Instructional Facility or School";} 
		?></small></h2>
</div>
<div id="profile-main" class="card">
<div class="pm-body clearfix" style="margin:0; padding:0;">
<div class="pmb-block">
<div class="pmbb-header">
  <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
    <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="search_m" style="color:#FFF;">Search Members:</a></h4><br/>
    <div id="search_m_p" <?php if(@$_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
    <div class="panel panel-collapse">
     
      <div class="pmbb-header">
        <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
          <div class="panel panel-collapse">
            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
              <div class="panel-body">
                <div class="pmb-block p-10  m-b-0">
                  <div class="pmbb-body p-l-0">
                    <div class="pmbb-view">
                      <form action="search-member-result.php" method="post">
                         <dl class="dl-horizontal">
                          <dt class="p-t-10">By Member Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Name" value="" name="member_name">
                            </div>
                          </dd>
                        </dl>
						<dl class="dl-horizontal">
                          <dt class="p-t-10">By Member Type</dt>
                          <dd>
                            <div class="fg-line">
                              <select class="form-control" name="member_type">
							                  <option>Select an Option</option>
                                <option  value="1" >Individual</option>
								<option value="1" >Student</option>
                                <option value="1" >Educational Institution</option>
                                <option value="1" >Instructional Facility or School</option>
                                <option value="1">Others</option>
                              </select>
                            </div>
                          </dd>
                        </dl>
						<div class="m-t-30">
                          <button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Search</button>
                          <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
						</form>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
                $(document).ready(function(){
                $("#search_m").click(function(){
                $("#search_m_p").toggle(800);
                });
                });
                </script>
				
			<!-------- search individuals----------------->
			 <h4 style="cursor:pointer;" class="btn btn-success"><a id="search_ind" style="color:#FFF;">Search Individuals:</a></h4><br>
			   
    <div id="search_ind_p" <?php if(@$_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
    <div class="panel panel-collapse">
      
      <div class="pmbb-header">
        <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
          <div class="panel panel-collapse">
            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
              <div class="panel-body">
                <div class="pmb-block p-10  m-b-0">
                  <div class="pmbb-body p-l-0">
                    <div class="pmbb-view">
                     <form action="search-individual-result.php" method="post">
                         <dl class="dl-horizontal">
                          <dt class="p-t-10">By  Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Name" value="" name="ind_name">
                            </div>
                          </dd>
                        </dl>
						<div class="m-t-30">
                          <button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Search</button>
                          <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
						</form>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
                $(document).ready(function(){
                $("#search_ind").click(function(){
                $("#search_ind_p").toggle(800);
                });
                });
                </script>
				
				<!--============= Search students ============--->
							 <h4 style="cursor:pointer;" class="btn btn-success"><a id="search_stu" style="color:#FFF;">Search Students:</a></h4><br>
			   
    <div id="search_stu_p" <?php if(@$_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
    <div class="panel panel-collapse">
     
      <div class="pmbb-header">
        <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
          <div class="panel panel-collapse">
            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
              <div class="panel-body">
                <div class="pmb-block p-10  m-b-0">
                  <div class="pmbb-body p-l-0">
                    <div class="pmbb-view">
                      <form action="search-student-result.php" method="post">
                         <dl class="dl-horizontal">
                          <dt class="p-t-10">By Student Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Name" value="" name="student_name">
                            </div>
                          </dd>
                        </dl>
                        <div class="m-t-30">
                          <button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Search</button>
                          <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
						</form>
                     
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
                $(document).ready(function(){
                $("#search_stu").click(function(){
                $("#search_stu_p").toggle(800);
                });
                });
                </script>
				
				<!--==== search educational institution=======--------->

											 <h4 style="cursor:pointer;" class="btn btn-success"><a id="search_edu_inst" style="color:#FFF;">Search Educational Institution:</a></h4><br>
			   
    <div id="search_edu_inst_p" <?php if(@$_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
    <div class="panel panel-collapse">
     
      <div class="pmbb-header">
        <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
          <div class="panel panel-collapse">
            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
              <div class="panel-body">
                <div class="pmb-block p-10  m-b-0">
                  <div class="pmbb-body p-l-0">
                    <div class="pmbb-view">
                      <form action="search-institute-result.php" method="post">
                         <dl class="dl-horizontal">
                          <dt class="p-t-10">By Institute Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Institite Name" value="" name="inst_name">
                            </div>
                          </dd>
                        </dl>
						
						<div class="m-t-30">
                          <button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Search</button>
                          <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
						</form>
                     
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
                $(document).ready(function(){
                $("#search_edu_inst").click(function(){
                $("#search_edu_inst_p").toggle(800);
                });
                });
                </script>

			  
			  <!-----======== search Instructional facilities=====----->

<h4 style="cursor:pointer;" class="btn btn-success"><a id="search_inst_fac" style="color:#FFF;">Search Instructional Facilities and Schools:</a></h4><br>
			   
    <div id="search_inst_fac_p" <?php if(@$_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
    <div class="panel panel-collapse">
     
      <div class="pmbb-header">
        <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
          <div class="panel panel-collapse">
            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
              <div class="panel-body">
                <div class="pmb-block p-10  m-b-0">
                  <div class="pmbb-body p-l-0">
                    <div class="pmbb-view">
                      <form action="search-school-result.php" method="post">
                         <dl class="dl-horizontal">
                          <dt class="p-t-10">By School Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Name" value="" name="sch_name">
                            </div>
                          </dd>
                        </dl>
						
						<div class="m-t-30">
                          <button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Search</button>
                          <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
						</form>
                     
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
                $(document).ready(function(){
                $("#search_inst_fac").click(function(){
                $("#search_inst_fac_p").toggle(800);
                });
                });
                </script>
                 <!-----======== Search Programs=====----->



<h4 style="cursor:pointer;" class="btn btn-success"><a id="search_prgm" style="color:#FFF;">Search Programs:</a></h4><br>
			   
    <div id="search_prgm_p" <?php if(@$_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
    <div class="panel panel-collapse">
     
      <div class="pmbb-header">
        <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
          <div class="panel panel-collapse">
            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
              <div class="panel-body">
                <div class="pmb-block p-10  m-b-0">
                  <div class="pmbb-body p-l-0">
                    <div class="pmbb-view">
                      <form action="search-program-result.php" method="post">
                         <dl class="dl-horizontal">
                          <dt class="p-t-10">By Program Category </dt>
                          <dd>
                            <div class="fg-line">
                               <select class="form-control " id="program" name="program_type">
                                  <option value="">Select Your Option</option>
                                  <option value="Diploma">Diploma</option>
                                  <option value="Certificate">Certificate</option>
                                  <option value="Degree">Degree</option>
                                  <option value="Continuing Education">Continuing Education</option>
                                </select>
                            </div>
                          </dd>
                        </dl>
						
						<div class="m-t-30">
                          <button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Search</button>
                          <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
						</form>
                     
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
                $(document).ready(function(){
                $("#search_prgm").click(function(){
                $("#search_prgm_p").toggle(800);
                });
                });
                </script>

<!-----======== Search Courses  =====----->

<h4 style="cursor:pointer;" class="btn btn-success"><a href="http://narrateme.com/new/course-module/courses"  style="color:#FFF;">Search Courses:</a></h4><br>
			   
    <div id="search_corse_p" <?php if(@$_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
    <div class="panel panel-collapse">
     
      <div class="pmbb-header">
        <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
          <div class="panel panel-collapse">
            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
              <div class="panel-body">
                <div class="pmb-block p-10  m-b-0">
                  <div class="pmbb-body p-l-0">
                    <div class="pmbb-view">
                      <form action="search-student-result.php" method="post">
                         <dl class="dl-horizontal">
                          <dt class="p-t-10">By Institute Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Name" value="" name="inst_name">
                            </div>
                          </dd>
                        </dl>
						
						<div class="m-t-30">
                          <button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Search</button>
                          <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
						</form>
                     
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
                $(document).ready(function(){
                $("#search_corse").click(function(){
                $("#search_corse_p").toggle(800);
                });
                });
                </script>


<!-----======== Search Classes & Lectures  =====----->

<h4 style="cursor:pointer;" class="btn btn-success"><a id="search_clas_lec" style="color:#FFF;">Search Classes & Lectures:</a></h4><br>
			   
    <div id="search_clas_lec_p" <?php if(@$_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
    <div class="panel panel-collapse">
     
      <div class="pmbb-header">
        <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
          <div class="panel panel-collapse">
            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
              <div class="panel-body">
                <div class="pmb-block p-10  m-b-0">
                  <div class="pmbb-body p-l-0">
                    <div class="pmbb-view">
                      <form action="search-student-result.php" method="post">
                         <dl class="dl-horizontal">
                          <dt class="p-t-10">By Institute Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Name" value="" name="inst_name">
                            </div>
                          </dd>
                        </dl>
						
						<div class="m-t-30">
                          <button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Search</button>
                          <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
						</form>
                     
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
                $(document).ready(function(){
                $("#search_clas_lec").click(function(){
                $("#search_clas_lec_p").toggle(800);
                });
                });
                </script>

      </div>
    </div>
    </div>
  </section>
  </section>
  <?php include('lib/inner_footer.php')?>
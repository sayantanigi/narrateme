<?php
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."'");
//==========================SUPRATIM 15/07/2016===================
if ($_REQUEST['submit']=="Update Userdata"){
	 extract($_POST);
	 $dateob=date('Y-m-d',strtotime($dateofbirth));
	
$data=array('first_name'=>mysql_real_escape_string(stripcslashes($first_name)),'last_name'=>mysql_real_escape_string(stripcslashes($last_name)),'dateofbirth'=>$dateob,'gender'=>$gender,'url'=>$url,'domain_name'=>$domain_name,'website'=>$website,'phone_no'=>$phone_no,'email'=>$email,'address'=>$address,'informational_description'=>addslashes($informational_description), 'current_student'=>$current_student, 'cellularphone_no'=>$cellularphone_no, 'IpAddress'=>$IpAddress, 'skype_url'=>$skype_url, 'social_seq_no'=>$social_seq_no, 'lastedit' => date('Y-m-d H:i:s'));
$result=updateData($data,'na_member', "id='".$id."'") ;
	
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='individual.php?update=success';\n";
	echo "</script>";
	
	}
//==========================SUPRATIM 15/07/2016===================
if(isset($_REQUEST['type'])){

		$typedata=$_REQUEST['type'];

		if($typedata=='ind'){

			$data=array('ind'=>1);

			$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;

		}else if($typedata=='std'){

			$data=array('std'=>1);

			$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;

		}else if($typedata=='edu'){

			$data=array('edu'=>1);

			$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;

		}else if($typedata=='fac'){

			$data=array('fac'=>1);

			$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;

		}

	}

$pagename = basename($_SERVER['PHP_SELF']);

//================================SUPRATIM Individual Add/Update/view===================================



	//================================SUPRATIM Individual Add/Update/view===================================

	


	//================================SUPRATIM Individual Award Add/Update/view==============================

	//Delete Awards



	//================================SUPRATIM Individual Award Add/Update/view==============================

	

	//================================SUPRATIM Rehab Award Add/Update/view==============================

		

	//================================SUPRATIM Rehab Award Add/Update/view==============================

	

	//================================SUPRATIM Institute Award Add/Update/view==============================


	//================================SUPRATIM Institute Award Add/Update/view==============================

	

	//================================SUPRATIM Institute Teacher Add/Update/view==============================

	

	//================================SUPRATIM Institute Teacher Add/Update/view==============================

	//=========================Academic Transcript================================
	
	
	//=========================Academic Transcript================================
	
	//=========================Credit Report================================
	
	
	//=========================Credit Report================================
	
	//========================Credit Report Issuer Section=======================================

	//========================Credit Report Issuer Section=======================================

	//================================SUPRATIM coach Add/Update/view==============================


	//================================SUPRATIM Extra Add/Update/view==============================



);
    }
}
	//================================SUPRATIM issuerofreport Add/Update/view==============================

	

	//================================SUPRATIM report Add/Update/view==============================

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewreport = getAnyTableWhereData('na_reports', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	$studensreportssql = "SELECT * FROM na_reports WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery15 = mysql_query($studensreportssql) or mysql_error();

	$stunum15 = mysql_num_rows($resquery15);

	//================================SUPRATIM report Add/Update/view==============================

	

	


//================================= Injuries Ends ========================================

//================================ surgeries Starts=====================================


<style>

.slick-dots {
  text-align: center;
  margin: 0 0 10px 0;
  padding: 0;
}
.slick-dots li {
  display: inline-block;
  margin-left: 4px;
  margin-right: 4px;
}
.slick-dots li.slick-active button {
  background-color: black;
}
.slick-dots li button {
  font: 0/0 a;
  text-shadow: none;
  color: transparent;
  background-color: #999;
  border: none;
  width: 15px;
  height: 15px;
  border-radius: 50%;
}
.slick-dots li :hover {
  background-color: black;
}
.slick-slide img {
    display: block;
    width:100%;
}

#list{
    margin-bottom:40px;
    border-bottom:1px solid #ccc;
}
.action-box{
    margin-bottom:20px;
    right:0;
    text-align:right;
}
.action-box .dropdown-menu{right:0;
    left:auto;}

.friend-carousel-header{
    background: #232323;
    padding: 10px;
    font-size: 20px;
    color: #fff;
    margin-bottom: 20px;
    }
    /* The container */
.container-checkbox {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container-checkbox input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.container-checkbox .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #fff;
    box-shadow:0 0 5px #ccc;
}

/* On mouse-over, add a grey background color */
.container-checkbox:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-checkbox input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.container-checkbox .checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container-checkbox input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container-checkbox .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.add-frnd{
    position:absolute;
    top:15px;
    right:10px;
}
.fnd-box{
    position:relative;
    padding:10px;
}
</style>
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
    <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="pc" style="color:#FFF;">Personal & Contact Information:</a></h4>
    <div id="pci" <?php if($_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
    <div class="panel panel-collapse">
      <div class="panel-heading" role="tab">
        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">Personal & Contact Information</a> </h4>
      </div>
      <div class="pmbb-header">
        <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
          <div class="panel panel-collapse">
            <div id="accordionTeal-one" class="collapse in" role="tabpanel">
              <div class="panel-body">
                <div class="pmb-block p-10  m-b-0">
                  <div class="pmbb-body p-l-0">
                    <div class="pmbb-view">
                      <ul class="actions" style="position:static; float:right;">
                        <li class="dropdown open">
                          <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0;">
                            <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Edit</a> </li>
                          </ul>
                        </li>
                      </ul>
                      <dl class="dl-horizontal">
                        <dt>Name</dt>
                        <dd>
                          <?=$view['first_name']." ".$view['last_name']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Informational Description</dt>
                        <dd style="width:50%;">
                          <?=stripslashes($view['informational_description'])?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Currently Student</dt>
                        <dd>
                          <?php if($view['current_student']==1){?>
                          <p>Yes</p>
                          <?php } else {?>
                          <p>No</p>
                          <?php }?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Address</dt>
                        <dd>
                          <?=$view['address']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Telephone Phone No.</dt>
                        <dd>
                          <?=$view['phone_no']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Cellular/Mobile  telephone number</dt>
                        <dd>
                          <?=$view['cellularphone_no']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>E-mail address</dt>
                        <dd>
                          <?=$view['email']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Text, Instant, SMS , or MMS message number</dt>
                        <dd>
                          <?=$view['phone_no']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>IP Address</dt>
                        <dd>
                          <?=$view['IpAddress']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Website</dt>
                        <dd>
                          <?=$view['website']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Domain Name</dt>
                        <dd>
                          <?=$view['domain_name']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>URL</dt>
                        <dd>
                          <?=$view['url']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Video Conference (Skype or Google) No./IP address</dt>
                        <dd>
                          <?=$view['skype_url']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Gender</dt>
                        <dd>
                          <?=$view['gender']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Social Security No./Identification No.</dt>
                        <dd>
                          <?=$view['social_seq_no']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Date of Birth</dt>
                        <dd>
                          <?=$view['dateofbirth']?>
                        </dd>
                      </dl>
                      <dl class="dl-horizontal">
                        <dt>Track Date(Add/Edit)</dt>
                        <dd>
                          <?=date('jS F Y',strtotime($view['lastedit']))?>
                        </dd>
                      </dl>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" name="form1" onsubmit="return ValidateForm()">
                      <input type="hidden" name="id" value="<?php echo $view['id'];?>" />
                      <div class="pmbb-edit">
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">First Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="First Name" value="<?=$view['first_name']?>" name="first_name">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Last Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Name" value="<?=$view['last_name']?>" name="last_name">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Informational Description</dt>
                          <dd>
                            <div class="fg-line">
                              <textarea type="text" id="pagedes" class="form-control" placeholder="Informational Description" cols="4" name="informational_description"><?=$view['informational_description']?>
</textarea>
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Currently Student</dt>
                          <dd>
                            <div class="fg-line">
                              <select class="form-control" name="current_student">
                                <option value="1" <?php if($view['current_student']=='1') {echo "selected"; }?>>Yes</option>
                                <option value="0" <?php if($view['current_student']=='0') {echo "selected"; }?>>No</option>
                              </select>
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Address</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Address" value="<?=$view['address']?>" name="address">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Telephone Phone No.</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Phone No" value="<?=$view['phone_no']?>" name="phone_no" maxlength="13">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Cellular/Mobile  telephone number</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Phone No" value="<?=$view['cellularphone_no']?>" name="cellularphone_no" maxlength="13">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">E-mail Address</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="email" class="form-control" placeholder="Email" value="<?=$view['email']?>" name="email">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">IP Address</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="IpAddress" value="<?=$view['IpAddress']?>" name="IpAddress">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Website</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Website" value="<?=$view['website']?>" name="website">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Domain Name</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Domain Name" value="<?=$view['domain_name']?>" name="domain_name">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">URL</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="URL" value="<?=$view['url']?>" name="url">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Video Conference (Skype or Google) No./IP address</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Skype ID" value="<?=$view['skype_url']?>" name="skype_url">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Gender</dt>
                          <dd>
                            <div class="fg-line">
                              <select class="form-control" name="gender">
                                <option name="Male" <?php if($view['gender']=='Male') {echo "selected"; }?>>Male</option>
                                <option name="Female" <?php if($view['gender']=='Female') {echo "selected"; } ?>>Female</option>
                                <option name="Other" <?php if($view['gender']=='Other') {echo "selected"; } ?>>Other</option>
                              </select>
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Social Security No./Identification No</dt>
                          <dd>
                            <div class="fg-line">
                              <input type="text" class="form-control" placeholder="Social Security No" value="<?=$view['social_seq_no']?>" name="social_seq_no">
                            </div>
                          </dd>
                        </dl>
                        <dl class="dl-horizontal">
                          <dt class="p-t-10">Date of Birth</dt>
                          <dd>
                            <div class="dtp-container dropdown fg-line">
                              <input type='text' class="form-control date-picker" id="example1" data-toggle="dropdown" value="<?=date('d-m-Y', strtotime($view['dateofbirth']))?>" name="dateofbirth">
                            </div>
                            <script type="text/javascript">
									// When the document is ready
									$(document).ready(function () {
										
										$('#example1').datepicker({
											format: "dd/mm/yyyy"
										});  
									
									});
								</script>
                          </dd>
                        </dl>
                        <div class="m-t-30">
                          <button class="btn btn-primary btn-sm waves-effect" type="submit" name="submit" value="Update Userdata">Save</button>
                          <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>
                $(document).ready(function(){
                $("#pc").click(function(){
                $("#pci").toggle(800);
                });
                });
                </script>
  <!--==============Educational Institution===============-->

                 
               
               <!-- Activities & Talents  ends [GENERAL]-->
               
            
               <!-- Sports & Athletics Activities [04-11-2016]-->
               
              
              <!-- Entertainment Activities [04-11-2016]-->
             
               <!-- Entertainment Activities [04-11-2016]-->
             
              
              <!-- Arts & Sciences Activities [04-11-2016]-->
            
                <!--  Add Activity/Experience Type starts  -->
              
              	<div class="panel panel-collapse" id="spoathact">
                <div <?php if($_REQUEST['activityexppanel3']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityexppanel3">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-four3" aria-expanded="false"> Add Activity/Experience Type:
                    <?=$activityexppanel3?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-four3" <?php if($_REQUEST['activityexppanel3']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editactivityexp3']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date of the Activity/Experience</th>
                                  <th>Description of the Activity/Experience</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($viewactivityexp3 = mysql_fetch_array($resqueryactivityexp3)) {

								  ?>
                                <tr>
                                  <td><?=date('d-m-Y',strtotime($viewactivityexp3['date']));?></td>
                                  <td><?=$viewactivityexp3['description']?></td>
                                  <td><?php if($viewactivityexp3['status'] ==1){echo"Public";} else if($viewactivityexp3['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                  <td><?=date('jS F Y',strtotime($viewactivityexp3['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewactivityexp3['ind_id']?>&id=<?=$viewactivityexp3['id']?>&editactivityexp3=activityexps&accr=1&activityexppanel3=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure want to delete?');" href="individual.php?ind_id=<?=$viewactivityexp3['ind_id']?>&id=<?=$viewactivityexp3['id']?>&delactivityexp3=val&activityexppanel3=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="activityexpform3" id="activityexpform3" onsubmit="return activityexp3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="activityexppanel3" value="1" />
                          <input type="hidden" name="activityexpid3" value="<?=$viewactivityexp3['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date of the Activity/Experience*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type='text' class="form-control date-picker" id="date_acti3" name="date" value="<?=date('d-m-Y',strtotime($viewactivityexp3['date']))?>" placeholder="Date of the Activity/Experience">
                                </div>
                                <span id="activityexp_error2" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description of the Activity/Experience</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" class="form-control" id="pagedes773" name="description"><?=$viewactivityexp3['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewactivityexp3['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewactivityexp3['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewactivityexp3['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityexpsubmit3">Save</button>
                              <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="activityexpform3" id="activityexpform3" onsubmit="return activityexp3();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="activityexppanel3" value="1" />
                          <div class="pmbb-edit">
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date of the Activity/Experience*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type='text' class="form-control date-picker" id="date_acti3" name="date" placeholder="Date of the Activity/Experience">
                                </div>
                                <span id="activityexp_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description of the Activity/Experience</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" class="form-control" id="pagedes773" name="description"></textarea>
                                </div>
                              </dd>
                            </dl>
                             <dl class="dl-horizontal">
                            <dt class="p-t-10">Images/PDFs</dt>
                            <dd>
                              <div class="fg-line">
                                <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                              </div>
                            </dd>
                          </dl>
                            <dl class="dl-horizontal">
                                    <dt class="p-t-10">Status</dt>
                                    <dd>
                                      <div class="fg-line">
                                          <select name="status" class="form-control">
                                          <option value="1">Public</option>
                                          <option value="2">Private</option>
                                          <option value="3">Friends</option>
                                        </select>
                                      </div>
                                    </dd>
                                  </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityexpsubmit3">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
                            function activityexp3(){
								if($("#date_acti3").val() == "" ){
									$("#date_acti3").focus();
									$("#activityexp_error3").html("Please Enter Date of the Activity/Experience");
									return false;
                            	}else{
									$("#activityexp_error3").html("");
								}
                            }
                           </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              	<!--  Add Activity/Experience Type Ends  -->
              
              	<!-- Add coach starts -->
              
              	<div class="panel panel-collapse" id="saat">
                <div <?php if($_REQUEST['coachpanel3']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="coachpanel1">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sevencoach3" aria-expanded="false"> Add Coach:
                    <?=$coachpanel3?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sevencoach3" <?php if($_REQUEST['coachpanel3']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editcoach3']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Coach Name</th>
                                  <th>Coach Telephone No</th>
                                  <th style="width:510px;">Coach Email</th>
                                  <th style="width:510px;">Coach Sample</th>
                                  <th style="width:510px;">Coach Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
								<?php
                                while($viewcoach3 = mysql_fetch_array($resquery73)) {
                                ?>
                                <tr>
                                  <td><?=$viewcoach3['coach_name']?></td>
                                  <td><?=$viewcoach3['phone']?></td>
                                  <td><?=$viewcoach3['email']?></td>
                                  <td><?=$viewcoach3['sample']?></td>
                                  <td><?=$viewcoach3['description']?></td>
                                 <td><?php if($viewcoach3['status'] ==1){echo"Public";} else if($viewcoach3['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewcoach3['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewcoach3['ind_id']?>&id=<?=$viewcoach3['id']?>&editcoach3=coachs&accr3=1&coachpanel3=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewcoach3['ind_id']?>&id=<?=$viewcoach3['id']?>&delcoach3=val&coachpanel3=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="coachform3" id="coachform3" onsubmit="return coach3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="coachpanel3" value="1" />
                          <input type="hidden" name="coachid3" value="<?=$viewcoach3['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="coach_name3" name="coach_name" value="<?=$viewcoach3['coach_name']?>">
                                </div>
                                <span id="coach_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Phone</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="phone" name="phone" value="<?=$viewcoach3['phone']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Email</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="email" name="email" value="<?=$viewcoach3['email']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Sample</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="sample" name="sample" value="<?=$viewcoach3['sample']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes813" name="description"><?=$viewcoach3['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewcoach3['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewcoach3['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewcoach3['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coachsubmit3">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="coachform1" id="coachform1" onsubmit="return coach3();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="coachpanel3" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="coach_name2" name="coach_name" placeholder="Name">
                                </div>
                                <span id="coach_error2" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Phone</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Email</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Sample</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="sample" name="sample" placeholder="Coach Sample">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes813" name="description" placeholder="Coach Description"></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coachsubmit3">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              	<!-- Add coach Ends -->
              
                <!-- Add video presentation start -->
                
                <div class="panel panel-collapse" id="saat">		
                    <div <?php if($_REQUEST['activityvideopanel33']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityvideopanel33">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityvideo33" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Video Presentations: </a> </h4>
                    </div>
                    <div id="accordionTeal-activityvideo33" <?php if($_REQUEST['activityvideopanel33']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['editactivityvideo33']=='') { ?>
                            <div class="pmbb-view">
                              <ul class="actions" style="position:static; float:right;">
                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;
                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                  </ul>
                                </li>
                              </ul>
                              <dl class="dl-horizontal">
                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Date</th>
                                      <th>Description</th>
                                      <th>Sample</th>
                                      <th>Link to recorded video</th>
                                      <th>IP Address to live camera</th>
                                      <th>Comments by Others</th>
                                      <th>Status</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
								  	while($viewactivityvideo3 = mysql_fetch_array($resqueryactivityvideo3)) {
								  ?>
                                    <tr>
                                      <td><?=date('jS F Y',strtotime($viewactivityvideo3['date']));?></td>
                                      <td><?=$viewactivityvideo3['description'];?></td>
                                      <td><?=$viewactivityvideo3['sample'];?></td>
                                      <td><?=$viewactivityvideo3['link_video'];?></td>
                                      <td><?=$viewactivityvideo3['IP_Address'];?></td>
                                      <td><?=$viewactivityvideo3['comments'];?></td>
                                      <td><?php if($viewactivityvideo3['status'] ==1){echo"Public";} else if($viewactivityvideo3['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewactivityvideo3['lastedit']))?></td>
                                      <td><a href="individual.php?ind_id=<?=$viewactivityvideo3['ind_id']?>&id=<?=$viewactivityvideo3['id']?>&editactivityvideo33=awards&inst=1&activityvideopanel33=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewactivityvideo3['ind_id']?>&id=<?=$viewactivityvideo3['id']?>&delactivityvideo3=val&activityvideopanel33=1&gen=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                            </div>
                            <?php } else { ?>
                            <form name="activityvideoform33" id="activityvideoform33" onsubmit="return check93();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityvideopanel33" value="1" />
                            <input type="hidden" name="activityvideodid3" value="<?=$viewactivityvideo3['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="<?=date('d-m-Y', strtotime($viewactivityvideo3['date']))?>" id="date_activ2" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityvideo_error33" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes933" name="description"><?php echo $viewactivityvideo3['description']?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Sample</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo3['sample']?>" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Link to recorded video</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo3['link_video']?>" id="link_video" name="link_video" data-toggle="dropdown" placeholder="Link to recorded video">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">IP Address to live camera</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo3['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Comments by Others</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo3['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewactivityvideo3['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewactivityvideo3['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewactivityvideo3['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityvideosubmit3">Save</button>
                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                              </div>
                            </div>
                            </form>
                            <?php } ?>
                            <form name="activityvideoform3" id="activityvideoform3" onsubmit="return Submitactivityvideo33();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityvideopanel33" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="" id="date_activ3" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityvideo_error33" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes933" name="description"></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Sample</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Link to recorded video</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="link_video" name="link_video" data-toggle="dropdown" placeholder="Link to recorded video">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">IP Address to live camera</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Comments by Others</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">
                                  </div>
                                </dd>
                              </dl>
                               <dl class="dl-horizontal">
                                    <dt class="p-t-10">Status</dt>
                                    <dd>
                                      <div class="fg-line">
                                          <select name="status" class="form-control">
                                          <option value="1">Public</option>
                                          <option value="2">Private</option>
                                          <option value="3">Friends</option>
                                        </select>
                                      </div>
                                    </dd>
                                  </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityvideosubmit3">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                            </form>
                           <script>
                            function Submitactivityvideo33(){
								if($("#date_activ3").val() == "" ){
									$("#date_activ3").focus();
									$("#activityvideo_error33").html("Please Enter Date");
									return false;
                            	}else{
									$("#activityvideo_error33").html("");
								}
                            }
                           </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
              	<!-- Add video presentation end -->
                
                <!-- Add Audio presentation start -->
                
                <div class="panel panel-collapse" id="saat">		
                    <div <?php if($_REQUEST['activityaudiopanel3']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityaudiopanel3">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityaudio3" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Audio Presentations: </a> </h4>
                    </div>
                    <div id="accordionTeal-activityaudio3" <?php if($_REQUEST['activityaudiopanel3']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['editactivityaudio3']=='') { ?>
                            <div class="pmbb-view">
                              <ul class="actions" style="position:static; float:right;">
                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;
                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                  </ul>
                                </li>
                              </ul>
                              <dl class="dl-horizontal">
                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Date</th>
                                      <th>Description</th>
                                      <th>Sample</th>
                                      <th>Link to recorded Audio</th>
                                      <th>IP Address to live Microphone</th>
                                      <th>Comments by Others</th>
                                      <th>Status</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
								  //print_r($viewcoach);
								  	while($viewactivityaudio3 = mysql_fetch_array($resqueryactivityaudio3)) {
								  ?>
                                    <tr>
                                      <td><?=date('d-m-Y',strtotime($viewactivityaudio3['date']));?></td>
                                      <td><?=$viewactivityaudio3['description'];?></td>
                                      <td><?=$viewactivityaudio3['sample'];?></td>
                                      <td><?=$viewactivityaudio3['link_audio'];?></td>
                                      <td><?=$viewactivityaudio3['IP_Address'];?></td>
                                      <td><?=$viewactivityaudio3['comments'];?></td>
                                      <td><?php if($viewactivityaudio3['status'] ==1){echo"Public";} else if($viewactivityaudio3['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewactivityaudio3['lastedit']))?></td>
                                      <td><a href="individual.php?ind_id=<?=$viewactivityaudio3['ind_id']?>&id=<?=$viewactivityaudio3['id']?>&editactivityaudio3=awards&accr3=1&inst3=1&activityaudiopanel3=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewactivityaudio3['ind_id']?>&id=<?=$viewactivityaudio3['id']?>&delactivityaudio3=val&activityaudiopanel3=1&gen=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                            </div>
                            <?php } else { ?>
                            <form name="activityaudioform3" id="activityaudioform3" onsubmit="return check93();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityaudiopanel3" value="1" />
                            <input type="hidden" name="activityaudiodid3" value="<?=$viewactivityaudio3['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="<?=date('d-m-Y', strtotime($viewactivityaudio3['date']))?>" id="date_aud_acti3" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityaudio_error33" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes103" name="description"><?php echo $viewactivityaudio3['description']?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Sample</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio3['sample']?>" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Link to recorded Audio</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio3['link_audio']?>" id="link_audio" name="link_audio" data-toggle="dropdown" placeholder="Link to recorded Audio">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">IP Address to live camera</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio3['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Comments by Others</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio3['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewactivityaudio3['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewactivityaudio3['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewactivityaudio3['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityaudiosubmit3">Save</button>
                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                              </div>
                            </div>
                            </form>
                            <?php } ?>
                            <form name="activityaudioform3" id="activityaudioform3" onsubmit="return Submitactivityaudio33();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityaudiopanel3" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="" id="date_aud_acti3" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityaudio_error33" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes103" name="description"></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Sample</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Link to recorded Audio</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="link_audio" name="link_audio" data-toggle="dropdown" placeholder="Link to recorded Audio">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">IP Address to live camera</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Comments by Others</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                    <dt class="p-t-10">Status</dt>
                                    <dd>
                                      <div class="fg-line">
                                          <select name="status" class="form-control">
                                          <option value="1">Public</option>
                                          <option value="2">Private</option>
                                          <option value="3">Friends</option>
                                        </select>
                                      </div>
                                    </dd>
                                  </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityaudiosubmit3">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                            </form>
                           <script>
                            function Submitactivityaudio33(){
								if($("#date_aud_acti3").val() == "" ){
									$("#date_aud_acti3").focus();
									$("#activityaudio_error33").html("Please Enter Date");
									return false;
                            	}else{
									$("#activityaudio_error33").html("");
								}
                            }
                           </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
              	<!-- Add Audio presentation end -->
                </div>
                <script>
						$(document).ready(function(){
												   
							$("#spatac2").click(function(){
								$("#spoathact2").toggle(800);
							});
							
						});
				 </script>
                 
               <!-- Arts & Sciences Activities [04-11-2016]-->
              
               
              <!--  Instructional Information starts  -->
              <div>
                <h4 style="cursor:pointer;" class="btn btn-success"><a id="inst" style="color:#FFF;">Instructional Information :</a></h4>
              </div>
              <div id="inststart" <?php if($_REQUEST['inst']==1 || $_REQUEST['instructionalinfopanel']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>>
                <!-- Add instructional information start -->
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['instructionalinfopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="instructionalinfopanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalinfo" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Instructional Information: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalinfo" <?php if($_REQUEST['instructionalinfopanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editinstructionalinfo']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Program enrolled</th>
                                      <th>Dates of Attendance</th>
                                      <th>Classes/Courses/Seminars taken</th>
                                      <th>Achievements</th>
                                      <th>Current Class/Course/Seminar Schedule</th>
                                      <th>Awards Conferred</th>
                                      <th>Status</th>
									  <th>Track Date(Add/Edit)</th>	
                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewinstructionalinfo = mysql_fetch_array($resqueryinstructionalinfo)) {

								  ?>

                                    <tr>

                                      <td><?=$viewinstructionalinfo['Program_enrolled'];?></td>

                                      <td><?=date('d-m-Y',strtotime($viewinstructionalinfo['Dates_of_Attendance']));?></td>

                                      <td><?=$viewinstructionalinfo['classes'];?></td>

                                      <td><?=$viewinstructionalinfo['Achievements'];?></td>

                                      <td><?=date('d-m-Y',strtotime($viewinstructionalinfo['seminar_schedule']));?></td>

                                      <td><?=$viewinstructionalinfo['award'];?></td>
                                      
                                       <td><?php if($viewinstructionalinfo['status'] ==1){echo"Public";} else if($viewinstructionalinfo['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                     
                                      <td><?=date('jS F Y',strtotime($viewinstructionalinfo['lastedit']))?></td>
                                      
                                      <td><a href="individual.php?ind_id=<?=$viewinstructionalinfo['ind_id']?>&id=<?=$viewinstructionalinfo['id']?>&editinstructionalinfo=awards&accr=1&inst=1&instructionalinfopanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewinstructionalinfo['ind_id']?>&id=<?=$viewinstructionalinfo['id']?>&delinstructionalinfo=val&instructionalinfopanel=1&gen=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="instructionalinfoform" id="instructionalinfoform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalinfopanel" value="1" />

                            <input type="hidden" name="instructionalinfodid" value="<?=$viewinstructionalinfo['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Program Enrolled*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewinstructionalinfo['Program_enrolled']?>" id="Program_enrolled123" name="Program_enrolled" placeholder="Program Enrolled">

                                  </div>

                                   <span id="instructionalinfo_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Dates of Attendance</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewinstructionalinfo['Dates_of_Attendance']?>" id="Dates_of_Attendance" name="Dates_of_Attendance" data-toggle="dropdown" placeholder="Dates of Attendance">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Classes/Courses/Seminars taken</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewinstructionalinfo['classes']?>" id="classes" name="classes" data-toggle="dropdown" placeholder="Classes/Courses/Seminars taken">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Achievements</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewinstructionalinfo['Achievements']?>" id="Achievements" name="Achievements" data-toggle="dropdown" placeholder="Achievements">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Current Class/Course/Seminar Schedule</dt>

                                <dd>

                                  <div class="fg-line">

                                   <input type='text' class="form-control date-picker" value="<?php echo $viewinstructionalinfo['seminar_schedule']?>" id="seminar_schedule" name="seminar_schedule" data-toggle="dropdown" placeholder="Current Class/Course/Seminar Schedule">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Awards Conferred</dt>

                                <dd>

                                  <div class="fg-line">

                                   <input type='text' class="form-control" value="<?php echo $viewinstructionalinfo['award']?>" id="award" name="award" data-toggle="dropdown" placeholder="Awards Conferred">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewinstructionalinfo['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewinstructionalinfo['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewinstructionalinfo['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>



                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalinfosubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="instructionalinfoform" id="instructionalinfoform" onsubmit="return Submitinstructionalinfo3();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalinfopanel" value="1" />

                            <div class="pmbb-edit">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Program Enrolled*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="Program_enrolled123" name="Program_enrolled" placeholder="Program Enrolled">

                                  </div>

                                   <span id="instructionalinfo_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Dates of Attendance</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="Dates_of_Attendance" name="Dates_of_Attendance" data-toggle="dropdown" placeholder="Dates of Attendance">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Classes/Courses/Seminars taken</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="classes" name="classes" data-toggle="dropdown" placeholder="Classes/Courses/Seminars taken">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Achievements</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="Achievements" name="Achievements" data-toggle="dropdown" placeholder="Achievements">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Current Class/Course/Seminar Schedule</dt>

                                <dd>

                                  <div class="fg-line">

                                   <input type='text' class="form-control date-picker" value="" id="seminar_schedule" name="seminar_schedule" data-toggle="dropdown" placeholder="Current Class/Course/Seminar Schedule">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Awards Conferred</dt>

                                <dd>

                                  <div class="fg-line">

                                   <input type='text' class="form-control" value="" id="award" name="award" data-toggle="dropdown" placeholder="Awards Conferred">

                                  </div>

                                </dd>

                              </dl>
                               <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalinfosubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitinstructionalinfo3(){

								if($("#Program_enrolled123").val() == "" ){

									$("#Program_enrolled123").focus();

									$("#instructionalinfo_error3").html("Please Enter Program Enrolled");

									return false;

                            	}else{

									$("#instructionalinfo_error3").html("");

								}
                            }
                           </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
              	<!-- Add instructional information end -->
                
                <!-- Add Curriculum/Activity Transcript(Complete) start -->
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['completecurrpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-completecurr" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Curriculum/Activity Transcript (Complete): </a> </h4>

                    </div>

                    <div id="accordionTeal-completecurr" <?php if($_REQUEST['completecurrpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editcompletecurr']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Grades</th>
                                      <th>Notes</th>
                                      <th>Comments</th>
                                      <th>Messages</th>
                                      <th>Status</th>
								      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
								  	while($viewcompletecurr = mysql_fetch_array($resquerycompletecurr)) {
								  ?>
                                    <tr>
                                      <td><?=$viewcompletecurr['grades'];?></td>
                                      <td><?=$viewcompletecurr['notes'];?></td>
                                      <td><?=$viewcompletecurr['comments'];?></td>
                                      <td><?=$viewcompletecurr['messages'];?></td>
                                      <td><?php if($viewcompletecurr['status'] ==1){echo"Public";} else if($viewcompletecurr['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><?=date('jS F Y',strtotime($viewcompletecurr['lastedit']))?></td>
                                     
                                      <td><a href="individual.php?ind_id=<?=$viewcompletecurr['ind_id']?>&id=<?=$viewcompletecurr['id']?>&editcompletecurr=awards&accr=1&inst=1&completecurrpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewcompletecurr['ind_id']?>&id=<?=$viewcompletecurr['id']?>&delcompletecurr=val&completecurrpanel=1&gen=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="completecurrform" id="completecurrform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="completecurrpanel" value="1" />

                            <input type="hidden" name="completecurrdid" value="<?=$viewcompletecurr['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewcompletecurr['grades']?>" id="grades_123" name="grades" placeholder="Grades">

                                  </div>

                                   <span id="completecurr_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Notes</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewcompletecurr['notes']?>" id="notes" name="notes" data-toggle="dropdown" placeholder="Notes">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewcompletecurr['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Messages</dt>

                                <dd>

                                  <div class="fg-line">

                                   <input type='text' class="form-control" value="<?php echo $viewcompletecurr['messages']?>" id="messages" name="messages" data-toggle="dropdown" placeholder="Messages">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewcompletecurr['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewcompletecurr['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewcompletecurr['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>



                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="completecurrsubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="completecurrform" id="completecurrform" enctype="multipart/form-data" onsubmit="return Submitcompletecurr3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="completecurrpanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="grades_123" name="grades" placeholder="Grades">

                                  </div>

                                   <span id="completecurr_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Notes</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="notes" name="notes" data-toggle="dropdown" placeholder="Notes">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Messages</dt>

                                <dd>

                                  <div class="fg-line">

                                   <input type='text' class="form-control" value="" id="messages" name="messages" data-toggle="dropdown" placeholder="Messages">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                               <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                      <select name="status" class="form-control">
                                      <option value="1">Public</option>
                                      <option value="2">Private</option>
                                      <option value="3">Friends</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="completecurrsubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitcompletecurr3(){

								if($("#grades_123").val() == "" ){

									$("#grades_123").focus();

									$("#completecurr_error3").html("Please Enter Grade");

									return false;

                            	}else{

									$("#completecurr_error3").html("");

								}
                            }
                           </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
              	<!-- Add Curriculum/Activity Transcript(Complete) end -->
                
                <!-- Add Curriculum/Activity Transcript(Incomplete or ongoing program) start -->
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['incompletecurrpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-incompletecurr" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Curriculum/Activity Transcript (Incomplete or Ongoing Program): </a> </h4>

                    </div>

                    <div id="accordionTeal-incompletecurr" <?php if($_REQUEST['incompletecurrpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editincompletecurr']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Grades</th>
                                      <th>Notes</th>
                                      <th>Comments</th>
                                      <th>Messages</th>
                                      <th>Status</th>
									  <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
								  	while($viewincompletecurr = mysql_fetch_array($resqueryincompletecurr)) {
								  ?>

                                    <tr>

                                      <td><?=$viewincompletecurr['grades'];?></td>
                                      <td><?=$viewincompletecurr['notes'];?></td>
                                      <td><?=$viewincompletecurr['comments'];?></td>
                                      <td><?=$viewincompletecurr['messages'];?></td>
                                       <td><?php if($viewincompletecurr['status'] ==1){echo"Public";} else if($viewincompletecurr['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewincompletecurr['lastedit']))?></td>
                                     
                                      <td><a href="individual.php?ind_id=<?=$viewincompletecurr['ind_id']?>&id=<?=$viewincompletecurr['id']?>&editincompletecurr=awards&accr=1&inst=1&incompletecurrpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewincompletecurr['ind_id']?>&id=<?=$viewincompletecurr['id']?>&delincompletecurr=val&incompletecurrpanel=1&gen=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="incompletecurrform" id="incompletecurrform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="incompletecurrpanel" value="1" />

                            <input type="hidden" name="incompletecurrdid" value="<?=$viewincompletecurr['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewincompletecurr['grades']?>" id="grades_123cc" name="grades" placeholder="Grades">

                                  </div>

                                   <span id="incompletecurr_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Notes</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewincompletecurr['notes']?>" id="notes" name="notes" data-toggle="dropdown" placeholder="Notes">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewincompletecurr['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Messages</dt>

                                <dd>

                                  <div class="fg-line">

                                   <input type='text' class="form-control" value="<?php echo $viewincompletecurr['messages']?>" id="messages" name="messages" data-toggle="dropdown" placeholder="Messages">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewincompletecurr['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewincompletecurr['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewincompletecurr['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>



                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="incompletecurrsubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="incompletecurrform" id="incompletecurrform" enctype="multipart/form-data" onsubmit="return Submitincompletecurr3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="incompletecurrpanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="grades_123cc" name="grades" placeholder="Grades">

                                  </div>

                                   <span id="incompletecurr_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Notes</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="notes" name="notes" data-toggle="dropdown" placeholder="Notes">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Messages</dt>

                                <dd>

                                  <div class="fg-line">

                                   <input type='text' class="form-control" value="" id="messages" name="messages" data-toggle="dropdown" placeholder="Messages">

                                  </div>

                                </dd>

                              </dl>
                                     <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                               <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="incompletecurrsubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitincompletecurr3(){

								if($("#grades_123cc").val() == "" ){

									$("#grades_123cc").focus();

									$("#incompletecurr_error3").html("Please Enter Grade");

									return false;

                            	}else{

									$("#incompletecurr_error3").html("");

								}
                            }
                           </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
              	<!-- Add Curriculum/Activity Transcript(Incomplete or ongoing program) end -->
                
                 <!-- Add Instructional/Activity Records start -->
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['instructionalactpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalact" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Instructional/Activity Records: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalact" <?php if($_REQUEST['instructionalactpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editinstructionalact']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Identification Number</th>
                                      <th>Extracurricular Activities</th>
                                      <th>Projects</th>
                                      <th>Status</th>
									  <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php
								  	while($viewinstructionalact = mysql_fetch_array($resqueryinstructionalact)) {
								  ?>

                                    <tr>
                                      <td><?=$viewinstructionalact['identification_no'];?></td>
                                      <td><?=$viewinstructionalact['extracurricular_activity'];?></td>
                                      <td><?=$viewinstructionalact['projects'];?></td>
                                       <td><?php if($viewinstructionalact['status'] ==1){echo"Public";} else if($viewinstructionalact['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewinstructionalact['lastedit']))?></td>

                                      <td><a href="individual.php?ind_id=<?=$viewinstructionalact['ind_id']?>&id=<?=$viewinstructionalact['id']?>&editinstructionalact=awards&accr=1&inst=1&instructionalactpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewinstructionalact['ind_id']?>&id=<?=$viewinstructionalact['id']?>&delinstructionalact=val&instructionalactpanel=1&gen=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="instructionalactform" id="instructionalactform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalactpanel" value="1" />

                            <input type="hidden" name="instructionalactdid" value="<?=$viewinstructionalact['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Identification Number*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewinstructionalact['identification_no']?>" id="identification_no123" name="identification_no" placeholder="Identification Number">

                                  </div>

                                   <span id="instructionalact_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Extracurricular Activities</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewinstructionalact['extracurricular_activity']?>" id="extracurricular_activity" name="extracurricular_activity" data-toggle="dropdown" placeholder="Extracurricular Activities">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Projects</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewinstructionalact['projects']?>" id="projects" name="projects" data-toggle="dropdown" placeholder="Projects">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewinstructionalact['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewinstructionalact['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewinstructionalact['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalactsubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="instructionalactform" id="instructionalactform" onsubmit="return Submitinstructionalact3();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalactpanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Identification Number*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="identification_no123" name="identification_no" placeholder="Identification Number">

                                  </div>

                                   <span id="instructionalact_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Extracurricular Activities</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="extracurricular_activity" name="extracurricular_activity" data-toggle="dropdown" placeholder="Extracurricular Activities">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Projects</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="projects" name="projects" data-toggle="dropdown" placeholder="Projects">

                                  </div>

                                </dd>

                              </dl>
                                    <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                               <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalactsubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitinstructionalact3(){

								if($("#identification_no123").val() == "" ){

									$("#identification_no123").focus();

									$("#instructionalact_error3").html("Please Enter Identification Number");

									return false;

                            	}else{

									$("#instructionalact_error3").html("");

								}
                            }
                           </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
              	<!-- Add Instructional/Activity Records end -->
                
                <!-- Add video presentation start -->
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['instructionalvideopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalvideo" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Video Presentations: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalvideo" <?php if($_REQUEST['instructionalvideopanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editinstructionalvideo']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Date</th>
                                      <th>Description</th>
                                      <th>Link to recorded video</th>
                                      <th>IP Address to live camera</th>
                                      <th>Comments by Others</th>
                                      <th>Status</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php
								  	while($viewinstructionalvideo = mysql_fetch_array($resqueryinstructionalvideo)) {
								  ?>

                                    <tr>

                                      <td><?=date('d-m-Y',strtotime($viewinstructionalvideo['date']));?></td>
                                      <td><?=$viewinstructionalvideo['description'];?></td>
                                      <td><?=$viewinstructionalvideo['link_video'];?></td>
                                      <td><?=$viewinstructionalvideo['IP_Address'];?></td>
                                      <td><?=$viewinstructionalvideo['comments'];?></td>
                                      <td><?php if($viewinstructionalvideo['status'] ==1){echo"Public";} else if($viewinstructionalvideo['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewinstructionalvideo['lastedit']))?></td>

                                      <td><a href="individual.php?ind_id=<?=$viewinstructionalvideo['ind_id']?>&id=<?=$viewinstructionalvideo['id']?>&editinstructionalvideo=awards&accr=1&inst=1&instructionalvideopanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewinstructionalvideo['ind_id']?>&id=<?=$viewinstructionalvideo['id']?>&delinstructionalvideo=val&instructionalvideopanel=1&gen=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="instructionalvideoform" id="instructionalvideoform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalvideopanel" value="1" />

                            <input type="hidden" name="instructionalvideodid" value="<?=$viewinstructionalvideo['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewinstructionalvideo['date']?>" id="date_vid" name="date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   <span id="instructionalvideo_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes11" name="description"><?php echo $viewinstructionalvideo['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Link to recorded video</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewinstructionalvideo['link_video']?>" id="link_video" name="link_video" data-toggle="dropdown" placeholder="Link to recorded video">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">IP Address to live camera</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewinstructionalvideo['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments by Others</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewinstructionalvideo['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewinstructionalvideo['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewinstructionalvideo['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewinstructionalvideo['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalvideosubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="instructionalvideoform" id="instructionalvideoform" onsubmit="return Submitinstructionalvideo3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalvideopanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="date_vid" name="date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   <span id="instructionalvideo_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes11" name="description"></textarea>

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Link to recorded video</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="link_video" name="link_video" data-toggle="dropdown" placeholder="Link to recorded video">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">IP Address to live camera</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments by Others</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">

                                  </div>

                                </dd>

                              </dl>
                               <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalvideosubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitinstructionalvideo3(){

								if($("#date_vid").val() == "" ){

									$("#date_vid").focus();

									$("#instructionalvideo_error3").html("Please Enter Date");

									return false;

                            	}else{

									$("#instructionalvideo_error3").html("");

								}
                            }
                           </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
              	<!-- Add video presentation end -->
                
                <!-- Add Audio presentation start -->
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['instructionalaudiopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalaudio" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Audio Presentations: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalaudio" <?php if($_REQUEST['instructionalaudiopanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editinstructionalaudio']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Date</th>
                                      <th>Description</th>
                                      <th>Link to recorded Audio</th>
                                      <th>IP Address to live Microphone</th>
                                      <th>Comments by Others</th>
                                      <th>Status</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewinstructionalaudio = mysql_fetch_array($resqueryinstructionalaudio)) {

								  ?>

                                    <tr>

                                      <td><?=date('d-m-Y',strtotime($viewinstructionalaudio['date']));?></td>

                                      <td><?=$viewinstructionalaudio['description'];?></td>

                                      <td><?=$viewinstructionalaudio['link_audio'];?></td>
                                      
                                      <td><?=$viewinstructionalaudio['IP_Address'];?></td>
                                      
                                      <td><?=$viewinstructionalaudio['comments'];?></td>
                                       <td><?php if($viewinstructionalaudio['status'] ==1){echo"Public";} else if($viewinstructionalaudio['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      
                                      <td><?=date('jS F Y',strtotime($viewinstructionalaudio['lastedit']))?></td>

                                      <td><a href="individual.php?ind_id=<?=$viewinstructionalaudio['ind_id']?>&id=<?=$viewinstructionalaudio['id']?>&editinstructionalaudio=awards&accr=1&inst=1&instructionalaudiopanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewinstructionalaudio['ind_id']?>&id=<?=$viewinstructionalaudio['id']?>&delinstructionalaudio=val&instructionalaudiopanel=1&gen=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="instructionalaudioform" id="instructionalaudioform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalaudiopanel" value="1" />

                            <input type="hidden" name="instructionalaudiodid" value="<?=$viewinstructionalaudio['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="<?=date('d-m-Y',strtotime($viewinstructionalaudio['date']))?>" id="date_aud" name="date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   <span id="instructionalaudio_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes12" name="description"><?php echo $viewinstructionalaudio['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Link to recorded Audio</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewinstructionalaudio['link_audio']?>" id="link_audio" name="link_audio" data-toggle="dropdown" placeholder="Link to recorded Audio">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">IP Address to live camera</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewinstructionalaudio['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments by Others</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewinstructionalaudio['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                      <select name="status" class="form-control">
                                      <option value="1" <?php if($viewinstructionalaudio['status']==1){?> selected="selected"<?php }?>>Public</option>
                                      <option value="2" <?php if($viewinstructionalaudio['status']==2){?> selected="selected"<?php }?>>Private</option>
                                      <option value="3" <?php if($viewinstructionalaudio['status']==3){?> selected="selected"<?php }?>>Friends</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalaudiosubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="instructionalaudioform" id="instructionalaudioform" onsubmit="return Submitinstructionalaudio3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalaudiopanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="date_aud" name="date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   <span id="instructionalaudio_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes12" name="description"></textarea>

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Link to recorded Audio</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="link_audio" name="link_audio" data-toggle="dropdown" placeholder="Link to recorded Audio">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">IP Address to live camera</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments by Others</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">

                                  </div>

                                </dd>

                              </dl>
                               <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalaudiosubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitinstructionalaudio3(){

								if($("#date_aud").val() == "" ){

									$("#date_aud").focus();

									$("#instructionalaudio_error3").html("Please Enter Date");

									return false;

                            	}else{

									$("#instructionalaudio_error3").html("");

								}
                            }
                           </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
              	<!-- Add Audio presentation end -->
                
                <!-- Add Award start -->
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['instructionalawardpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalaward" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Honors and Awards: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalaward" <?php if($_REQUEST['instructionalawardpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editinstructionalaward']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Name/Type</th>
                                      <th>Date</th>
                                      <th>Description</th>
                                      <th>Status</th>
									  <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
								  	while($viewinstructionalaward = mysql_fetch_array($resqueryinstructionalaward)) {
								  ?>
                                    <tr>
                                      <td><?=$viewinstructionalaward['name'];?></td>
                                      
                                      <td><?=date('d-m-Y',strtotime($viewinstructionalaward['Date']));?></td>

                                      <td><?=$viewinstructionalaward['description'];?></td>
                                      <td><?php if($viewinstructionalaward['status'] ==1){echo"Public";} else if($viewinstructionalaward['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      
                                      <td><?=date('jS F Y',strtotime($viewinstructionalaward['lastedit']))?></td>

                                      <td><a href="individual.php?ind_id=<?=$viewinstructionalaward['ind_id']?>&id=<?=$viewinstructionalaward['id']?>&editinstructionalaward=awards&accr=1&inst=1&instructionalawardpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewinstructionalaward['ind_id']?>&id=<?=$viewinstructionalaward['id']?>&delinstructionalaward=val&instructionalawardpanel=1&gen=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="instructionalawardform" id="instructionalawardform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalawardpanel" value="1" />

                            <input type="hidden" name="instructionalawarddid" value="<?=$viewinstructionalaward['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


							  <dl class="dl-horizontal">

                                <dt class="p-t-10">Name/Type*</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewinstructionalaward['name']?>" id="name_type" name="name" data-toggle="dropdown" placeholder="Name/Type">

                                  </div>
                                  
								  <span id="instructionalaward_error3" style="color:#ff0000;">&nbsp;</span>
									
                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="<?=date('d-m-Y',strtotime($viewinstructionalaward['Date']))?>" id="Date" name="Date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes13" name="description"><?php echo $viewinstructionalaward['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewinstructionalaward['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewinstructionalaward['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewinstructionalaward['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>


                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalawardsubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="instructionalawardform" id="instructionalawardform"  enctype="multipart/form-data" onsubmit="return Submitinstructionalaward3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="instructionalawardpanel" value="1" />

                            <div class="pmbb-edit">

							  <dl class="dl-horizontal">

                                <dt class="p-t-10">Name/Type*</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="name_type" name="name" data-toggle="dropdown" placeholder="Name/Type">

                                  </div>
                                  
								  <span id="instructionalaward_error3" style="color:#ff0000;">&nbsp;</span>
									
                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="Date" name="Date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control" id="pagedes13" name="description"></textarea>

                                  </div>

                                </dd>

                              </dl>
                                  <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                               <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructionalawardsubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitinstructionalaward3(){

								if($("#name_type").val() == "" ){

									$("#name_type").focus();

									$("#instructionalaward_error3").html("Please Enter Name/Type");

									return false;

                            	}else{

									$("#instructionalaward_error3").html("");

								}
                            }
                           </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
              	<!-- Add Award end -->
              	
              </div>
              <script>
						$(document).ready(function(){
						$("#inst").click(function(){
						$("#inststart").toggle(1000);
						});
						});
                </script>
              <!--  Instructional Information ends  --> 
              <!--====================Award==================-->
               
              <!--====================Award==================-->
              <div><h4 style="cursor:pointer;" class="btn btn-success"><a id="wirkexp" style="color:#FFF;"> Work Experience:</a></h4></div> 
              <!--====================Job====================-->
              <div class="panel panel-collapse" id="swirkexp" <?php if($_REQUEST['jobpanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
                <div <?php if($_REQUEST['jobpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="jobpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-ten" aria-expanded="false"> Add Job:
                    <?=$jobpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-ten"  <?php if($_REQUEST['jobpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editjob']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Employer Name</th>
                                  <th>From Date</th>
                                  <th>To Date</th>
                                  <th>Position</th>
                                  <th>Job Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($viewjob = mysql_fetch_array($resquery10)) {

								  ?>
                                <tr>
                                  <td><?=$viewjob['employer_name']?></td>
                                  <td><?=date("jS M Y", strtotime($viewjob['from_date']))?></td>
                                  <td><?=date("jS M Y", strtotime($viewjob['to_date']))?></td>
                                  <td><?=$viewjob['position']?></td>
                                  <td><?=$viewjob['job_description']?></td>
                                  <td><?php if($viewjob['status'] ==1){echo"Public";} else if($viewjob['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewjob['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewjob['ind_id']?>&id=<?=$viewjob['id']?>&editjob=jobs&accr=1&jobpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewjob['ind_id']?>&id=<?=$viewjob['id']?>&deljob=val&jobpanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="jobform" id="jobform" onsubmit="return job();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="jobpanel" value="1" />
                          <input type="hidden" name="jobid" value="<?=$viewjob['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Employer Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="employer_name" name="employer_name" value="<?=$viewjob['employer_name']?>">
                                </div>
                                <span id="job_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">From Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="from_date" name="from_date" value="<?=date("d-m-Y", strtotime($viewjob['from_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">To Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="to_date" name="to_date" value="<?=date("d-m-Y", strtotime($viewjob['to_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Position</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="position" name="position" value="<?=$viewjob['position']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Job Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes14" name="job_description"><?=$viewextra['job_description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewextra['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewextra['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewextra['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="jobsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="jobform" id="jobform" onsubmit="return job();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="jobpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Employer Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="employer_name" name="employer_name">
                                </div>
                                <span id="job_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">From Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="from_date" name="from_date" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">To Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="to_date" name="to_date" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Position</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="position" name="position">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Job Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes14" name="job_description"></textarea>
                                </div>
                              </dd>
                            </dl>
                                 <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="jobsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			  <script>
                $(document).ready(function(){
                	$("#wirkexp").click(function(){
                		$("#swirkexp").toggle(800);
                	});
                });
                </script>
              <!--====================Job====================-->
              <!--====================Reference==============-->
                <div><h4 style="cursor:pointer;" class="btn btn-success"><a id="ref" style="color:#FFF;">References:</a></h4></div>              
                <div id="refstart"<?php if($_REQUEST['ref']==1 || $_REQUEST['referencepanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['ref']==1 || $_REQUEST['referencepanel']==1){?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="referencepanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-nineteen" aria-expanded="false"> Personal/Academic/Professional References: <?=$referencepanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-nineteen" <?php if($_REQUEST['ref']==1 || $_REQUEST['referencepanel']==1){?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editreference']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Reference Date</th>

                                      <th>Reference Name</th>

                                      <th>Reference Position</th>

								  <!--<th>Reference Telephone No.</th>

                                      <th>Reference Email Address</th>

                                      <th>Relationship with Reference</th>

                                      <th>Reference Recommendation Letter/Information</th>-->

                                      <th>Recorded video</th>
                                      <th>Status</th>
									  <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  	while($viewreference = mysql_fetch_array($resquery19)) {

								  ?>

                                    <tr>

                                      <td><?=date("jS M Y", strtotime($viewreference['dateofreference']))?></td>

                                      <td><?=$viewreference['ref_name']?></td>

                                      <td><?=$viewreference['ref_position']?></td>

								  <!--<td><?=$viewreference['ref_phone']?></td>

                                      <td><?=$viewreference['ref_emailaddress']?></td>

                                      <td><?=$viewreference['ref_relationship']?></td>

                                      <td><?=$viewreference['ref_recominfo']?></td>-->

                                      <td><?=$viewreference['ref_recomvideo']?></td>
                                      <td><?php if($viewreference['status'] ==1){echo"Public";} else if($viewreference['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      
                                      <td><?=date('jS F Y',strtotime($viewreference['lastedit']))?></td>

                                      <td><a href="individual.php?ind_id=<?=$viewreference['ind_id']?>&id=<?=$viewreference['id']?>&editreference=references&accr=1&referencepanel=1&ref=1&#ref">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewreference['ind_id']?>&id=<?=$viewreference['id']?>&delreference=val&referencepanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="referenceform" id="referenceform" onsubmit="return reference();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="referencepanel" value="1" />

                            <input type="hidden" name="referenceid" value="<?=$viewreference['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" id="dateofreference" name="dateofreference" value="<?=date("d-m-Y", strtotime($viewreference['dateofreference']))?>" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_name" name="ref_name" placeholder="" value="<?=$viewreference['ref_name']?>" >

                                  </div>

                                  <span id="reference_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Position</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_position" name="ref_position" placeholder="ref_position"  value="<?=$viewreference['ref_position']?>">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Telephone No.</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_phone" name="ref_phone" placeholder="ref_phone"  value="<?=$viewreference['ref_phone']?>">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email Address</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_emailaddress" name="ref_emailaddress" placeholder="ref_emailaddress"  value="<?=$viewreference['ref_emailaddress']?>">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Relationship</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_relationship" name="ref_relationship" placeholder="ref_relationship"  value="<?=$viewreference['ref_relationship']?>">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recommendation Letter/Information</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea type="text" class="form-control" id="pagedes15" name="ref_recominfo" placeholder="ref_recominfo"><?=$viewreference['ref_recominfo']?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recorded video</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_recomvideo" name="ref_recomvideo" placeholder="ref_recomvideo"  value="<?=$viewreference['ref_recomvideo']?>">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewreference['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewreference['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewreference['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="referencesubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="referenceform" id="referenceform" enctype="multipart/form-data" onsubmit="return reference();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="referencepanel" value="1" />

                            <div class="pmbb-edit">

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" id="dateofreference" name="dateofreference" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_name" name="ref_name" placeholder="ref name">

                                  </div>

                                  <span id="reference_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Position</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_position" name="ref_position" placeholder="ref position">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Telephone No.</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_phone" name="ref_phone" placeholder="ref phone">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email Address</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_emailaddress" name="ref_emailaddress" placeholder="ref emailaddress">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Relationship</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_relationship" name="ref_relationship" placeholder="ref relationship">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recommendation Letter/Information</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea type="text" class="form-control" id="pagedes15" name="ref_recominfo" placeholder="ref recominfo"></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recorded video</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="ref_recomvideo" name="ref_recomvideo" placeholder="ref recomvideo">

                                  </div>

                                </dd>

                              </dl>
                                  <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="referencesubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
                  </div>
                <script>
						$(document).ready(function(){
												   
							$("#ref").click(function(){
								$("#refstart").toggle(800);
							});
							
						});
				 </script>
              <!--====================Credit History Information==========-->
               <div><h4 style="cursor:pointer;" class="btn btn-success"><a id="chi" style="color:#FFF;">Credit History Information </a></h4></div>  
               <div class="panel panel-collapse"  id="schi" <?php if($_REQUEST['creditpanel']==1 || $_REQUEST['issuerofreportpanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
                    <!--======================Credit Report==================-->
                    <div <?php if($_REQUEST['creditpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="creditpanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-creditreport" aria-expanded="false"> Add Credit Report:
                    <?=$creditpanel?>
                    </a> </h4>
                    </div>
                    <div id="accordionTeal-creditreport" <?php if($_REQUEST['creditpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                    <div class="pmbb-body p-l-0">
                    <?php if($_REQUEST['editcreport']=='') { ?>
                    <div class="pmbb-view">
                    <ul class="actions" style="position:static; float:right;">
                    	<li class="dropdown open">
                    <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                    &nbsp;
                            <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                            </ul>
                    	</li>
                    </ul>
                   <?php
					if($_REQUEST['addissuer']!=1 && $_REQUEST['editissuer']!=1){
					?>
                    <dl class="dl-horizontal">
                    	<table class="table table-striped table-bordered table-advance table-hover" width="50%">
                        <thead>
                            <tr>
                                <th>Report Date</th>
                                <th>Report Link</th>
                                <th>Description</th>
                                <th>Add Issuer</th>
                                <th>View Issuer</th>
                                <th>Track Date(Add/Edit)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php
                    while($viewcreport = mysql_fetch_array($sqlcreport)) {
                    ?>
                    <tr>
                    <td><?=date('d-m-Y',strtotime($viewcreport['report_date']))?></td>
                    <td><?=$viewcreport['report_link']?></td>
                    <td><?=$viewcreport['description']?></td>
                    <td><a href="individual.php?addissuer=1&creditpanel=1&ind_id=<?=$viewcreport['ind_id']?>&id=<?=$viewcreport['id']?>"><img src="img/add.png" /></a></td>
                    <td><a id="si<?php echo $viewcreport['id']?>"><img src="img/show.png" /></a></td>
                    
                    <td><?=date('jS F Y',strtotime($viewcreport['lastedit']))?></td>
                    
                    <td><a href="individual.php?ind_id=<?=$viewcreport['ind_id']?>&id=<?=$viewcreport['id']?>&editcreport=creport&accr=1&creditpanel=1&creport=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="individual.php?ind_id=<?=$viewcreport['ind_id']?>&id=<?=$viewcreport['id']?>&delcreport=val&creport=1" style="color:#ff0000;">Delete</a></td>
                    </tr>
                    <tr style="display:none; background-color:#000;" id="bottomtr<?php echo $viewcreport['id']?>">
                    	<td colspan="6">
                        	<div style="col-sm-12">
                            	<table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                    <thead>
                                        <tr>
                                            <th>Issuer Name</th>
                                            <th>Phone</th>
                                            <th>Website</th>
                                            <th>Url</th>
                                            <th>Track Date(Add/Edit)</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php 
										//echo "select * from `na_credit_issuer_report` where `credit_report_id` =".$viewcreport['id']."";
										$sqlissuer=mysql_query("select * from `na_credit_issuer_report` where `credit_report_id` =".$viewcreport['id']."");
											while($rowissue=mysql_fetch_array($sqlissuer)){	
										?>
                                        <tr>
                                       		<td><?php echo $rowissue['issuer_name']?></td>
                                            <td><?php echo $rowissue['phone']?></td>
                                            <td><?php echo $rowissue['website']?></td>
                                            <td><?php echo $rowissue['url']?></td>
                                            <td><?=date('jS F Y',strtotime($rowissue['lastedit']))?></td>
                                            
                                            <td><a href="individual.php?ind_id=<?=$rowissue['ind_id']?>&id=<?=$rowissue['id']?>&editissuer=1&creditpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$rowissue['ind_id']?>&id=<?=$rowissue['id']?>&delissuercreditreport=val&creditpanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a> 
                                            </td>
                                        </tr>
                                        <?php }?>
                                        
                                    </thead>
                                   </table> 
                            </div>
                        </td>
                    </tr>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
					<script>
                    $(document).ready(function(){
                        $("#si<?php echo $viewcreport['id']?>").click(function(){
							
                            $("#bottomtr<?php echo $viewcreport['id']?>").toggle();
                        });
                        
                    });
                    </script>
                    <?php } ?>
                    </tbody>
                    </table>
                    </dl>
                    
                    <?php }?>
                    </div>
                    <?php } else { ?>
                    
                    <form name="issuerofreportform" id="issuerofreportform" onsubmit="return creditreport();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" name="creditpanel" value="1" />
                    <input type="hidden" name="creditreportid" value="<?=$viewcreporttedit['id']?>" />
                    <div class="pmbb-edit" style="display:block;">
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Report Date*</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control date-picker" id="report_date" name="report_date" value="<?=date('d-m-Y',strtotime($viewcreporttedit['report_date']))?>">
                    <span id="issuerofreport_error" style="color:#ff0000;">&nbsp;</span>
                    </div>
                     </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Report Link</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control" id="report_link" name="report_link" value="<?=$viewcreporttedit['report_link']?>">
                    </div>
                    </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Description</dt>
                    <dd>
                    <div class="fg-line">
                    <textarea type="text" class="form-control" id="pagedes16" name="description"><?=$viewcreporttedit['description']?>
                    </textarea>
                    </div>
                    </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Status</dt>
                    <dd>
                    <div class="fg-line">
                    <select class="form-control" name="status">
                    	<option value="1" <?php if($viewcreporttedit['status']==1){?> selected="selected"<?php }?>>Active</option>
                        <option value="0" <?php if($viewcreporttedit['status']==0){?> selected="selected"<?php }?>>Inactive</option>
                    </select>
                    </div>
                    </dd>
                    </dl>
                    <div class="m-t-30">
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="creditreportsubmit">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                    </div>
                    </div>
                    </form>
                    <?php } ?>
                    <form name="issuerofreportform" id="issuerofreportform" onsubmit="return creditreport();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="issuerofreportpanel" value="1" />
                        <div class="pmbb-edit">
                        	<dl class="dl-horizontal">
                        		<dt class="p-t-10">Report date*</dt>
                        		<dd>
                        			<div class="fg-line">
                        				<input type="text" class="form-control date-picker" id="report_date" name="report_date">
                                        <label id="crdateeddor"></label>
                                        <span id="issuerofreport_error" style="color:#ff0000;">&nbsp;</span>
                        			</div>
                        			 
                                </dd>
                       		 </dl>
                        	<dl class="dl-horizontal">
                            	<dt class="p-t-10">Report Link</dt>
                            	<dd>
                                	<div class="fg-line"><input type="text" class="form-control" id="report_link" name="report_link"></div>
                            	</dd>
                        	</dl>
                        	<dl class="dl-horizontal">
                            	<dt class="p-t-10">Description</dt>
                           
                        	<dd>
                        		<div class="fg-line">
                            		<textarea type="text" class="form-control" id="pagedes16" name="description"></textarea>
                        		</div>
                        	</dd>
                        		</dl> 
                        	  <dl class="dl-horizontal">
                            <dt class="p-t-10">Images/PDFs</dt>
                            <dd>
                              <div class="fg-line">
                                <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                              </div>
                            </dd>
                          </dl>	
                            <dl class="dl-horizontal">
                            <dt class="p-t-10">Status</dt>
                            <dd>
                            <div class="fg-line">
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            </div>
                            </dd>
                            </dl>
                            <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="creditreportsubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                        	</div>
                    	</form>
                    
					<script>
                            function creditreport(){
								if($("#report_date").val() == "" ){
									$("#report_date").focus();
									$("#crdateeddor").html("Please Enter Report Date");
									return false;
                            	}else{
									$("#crdateeddor").html("");
								}
                            }
                     </script>
					<style>
                    	#crdateeddor{ color:#F00;}
                    </style>
                    <?php
						if($_REQUEST['addissuer']==1){
				    ?>
                        <form name="issuerofreportform" id="issuerofreportform" onsubmit="return issuer();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="creditreportid" value="<?=$viewcreporttedit['id']?>" />
                        
                        <input type="hidden" name="credit_report_id" value="<?php echo $_REQUEST['id']?>" />
                        <div class="pmbb-edit" style="display:block;">
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Issuer Name*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="issuer_name" name="issuer_name" value="">
                        </div>
                        <span id="creditissuerreport_error" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Phone</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="phone" name="phone" value="">
                        </div>
                        </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Website</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="website" name="website" value="">
                        </div>
                        </dd>
                        </dl>
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">URL</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="url" name="url" value="">
                        </div>
                        </dd>
                        </dl>
                        <div class="m-t-30">
                            <button class="btn btn-primary btn-sm" name="submit" type="submit" value="creditissuerreportsubmit">Save</button>
                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </div>
                        </form>
                        <script>
                            function issuer(){
								if($("#issuer_name").val() == "" ){
									$("#issuer_name").focus();
									$("#creditissuerreport_error").html("Please Enter Issuer Name !!!");
									return false;
                            	}else{
									$("#creditissuerreport_error").html("");
								}
                            }
                       </script>
                    <?php
					}
					?>
                    <?php
						if($_REQUEST['editissuer']==1){
				    ?>
                        <form name="editissuerofreportform" id="editissuerofreportform" onsubmit="return issuer();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="cpd" value="<?=$_REQUEST['id']?>" />
                        <input type="hidden" name="credit_report_id" value="<?php echo $_REQUEST['id']?>" />
                        <input type="hidden" name="creditreportid" value="<?=$viewissuercreporttedit['credit_report_id']?>" />
                        <div class="pmbb-edit" style="display:block;">
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Issuer Name*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="issuer_name" name="issuer_name" value="<?=$viewissuercreporttedit['issuer_name']?>">
                        </div>
                        <span id="creditissuerreport_error" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Phone</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="phone" name="phone" value="<?=$viewissuercreporttedit['phone']?>">
                        </div>
                        </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Website</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="website" name="website" value="<?=$viewissuercreporttedit['website']?>">
                        </div>
                        </dd>
                        </dl>
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">URL</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="url" name="url" value="<?=$viewissuercreporttedit['url']?>">
                        </div>
                        </dd>
                        </dl>
                        <div class="m-t-30">
                            <button class="btn btn-primary btn-sm" name="submit" type="submit" value="creditissuerreportsubmit">Save</button>
                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </div>
                        </form>
                        <script>
                            function issuer(){
								if($("#issuer_name").val() == "" ){
									$("#issuer_name").focus();
									$("#creditissuerreport_error").html("Please Enter Issuer Name !!!");
									return false;
                            	}else{
									$("#creditissuerreport_error").html("");
								}
                            }
                       </script>
                    <?php
					}
					?>
                    </div>
                    </div>
                    </div>
                    </div>
                    <!--======================Issuer Report==================-->
                  
                  	<!--======================Issuer Report==================-->
                    <div <?php if($_REQUEST['issuerofreportpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="issuerofreportpanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-fourteen" aria-expanded="false"> Add Issuer of Report:
                    <?=$issuerofreportpanel?>
                    </a> </h4>
                    </div>
                    <div id="accordionTeal-fourteen" <?php if($_REQUEST['issuerofreportpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                    <div class="pmbb-body p-l-0">
                    <?php if($_REQUEST['editissuerofreport']=='') { ?>
                    <div class="pmbb-view">
                    <ul class="actions" style="position:static; float:right;">
                    <li class="dropdown open">
                    <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                    &nbsp;
                    <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                    </ul>
                    </li>
                    </ul>
                    <dl class="dl-horizontal">
                    <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                    <thead>
                    <tr>
                    <th>Name</th>
                    <th>Telephone No.</th>
                    <th>Website</th>
                    <th>URL</th>
                    <th>Description</th>
                    <th>Track Date(Add/Edit)</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    while($viewissuerofreport = mysql_fetch_array($resquery14)) {
                    
                    ?>
                    <tr>
                    <td><?=$viewissuerofreport['name']?></td>
                    <td><?=$viewissuerofreport['tel_no']?></td>
                    <td><?=$viewissuerofreport['website']?></td>
                    <td><?=$viewissuerofreport['url']?></td>
                    <td><?=$viewissuerofreport['description']?></td>
                    <td><?=date('jS F Y',strtotime($viewissuerofreport['lastedit']))?></td>
                    <td><a href="individual.php?ind_id=<?=$viewissuerofreport['ind_id']?>&id=<?=$viewissuerofreport['id']?>&editissuerofreport=issuerofreports&accr=1&issuerofreportpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewissuerofreport['ind_id']?>&id=<?=$viewissuerofreport['id']?>&delissuerofreport=val&issuerofreportpanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                    </dl>
                    </div>
                    <?php } else { ?>
                    <form name="issuerofreportform" id="issuerofreportform" onsubmit="return issuerofreport();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" name="issuerofreportpanel" value="1" />
                    <input type="hidden" name="issuerofreportid" value="<?=$viewissuerofreport['id']?>" />
                    <div class="pmbb-edit" style="display:block;">
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Name*</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control" id="name" name="name" value="<?=$viewissuerofreport['name']?>">
                    </div>
                    <span id="issuerofreport_error" style="color:#ff0000;">&nbsp;</span> </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Telephone No</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control" id="tel_no" name="tel_no" value="<?=$viewissuerofreport['tel_no']?>">
                    </div>
                    </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Website</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control" id="website" name="website" placeholder=""  value="<?=$viewissuerofreport['website']?>">
                    </div>
                    </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">URL</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control" id="url" name="url" placeholder=""  value="<?=$viewissuerofreport['url']?>">
                    </div>
                    </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Description</dt>
                    <dd>
                    <div class="fg-line">
                    <textarea type="text" class="form-control" id="pagedes17" name="description"><?=$viewissuerofreport['description']?>
                    </textarea>
                    </div>
                    </dd>
                    </dl>
                    <div class="m-t-30">
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="issuerofreportsubmit">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                    </div>
                    </div>
                    </form>
                    <?php } ?>
                    <form name="issuerofreportform" id="issuerofreportform" onsubmit="return issuerofreport();"  enctype="multipart/form-data"action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <input type="hidden" name="issuerofreportpanel" value="1" />
                    <div class="pmbb-edit">
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Name*</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <span id="issuerofreport_error" style="color:#ff0000;">&nbsp;</span> </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Telephone No</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control" id="tel_no" name="tel_no">
                    </div>
                    </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Website</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control" id="website" name="website" placeholder="">
                    </div>
                    </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">URL</dt>
                    <dd>
                    <div class="fg-line">
                    <input type="text" class="form-control" id="url" name="url" placeholder="">
                    </div>
                    </dd>
                    </dl>
                    <dl class="dl-horizontal">
                    <dt class="p-t-10">Description</dt>
                    <dd>
                    <div class="fg-line">
                    <textarea type="text" class="form-control" id="pagedes17" name="description" placeholder=""></textarea>
                    </div>
                    </dd>
                    </dl>
                        <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                    <div class="m-t-30">
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="issuerofreportsubmit">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                    </div>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    <!--======================Issuer Report==================-->
                  </div>
               <script>
						$(document).ready(function(){
												   
							$("#chi").click(function(){
								$("#schi").toggle(800);
							});
							
						});
				 </script>
              <!--====================Credit History Information==========-->

              <!--======================Injuries start===============-->
             
             <!-- Miscellaneous and Other Report -->
              <div>
                <h4 style="cursor:pointer;" class="btn btn-success"><a id="mis" style="color:#FFF;">Miscellaneous and Other Report: </a></h4>
              </div>
              <div id="misstart" <?php if($_REQUEST['mis']==1 || $_REQUEST['reportpanel']==1 || $_REQUEST['messagepanel']==1 || $_REQUEST['claimpanel']==1 || $_REQUEST['claimformpanel']==1 || $_REQUEST['evalpanel']==1 || $_REQUEST['acapanel']==1 || $_REQUEST['repcpanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
              <!--  Report Start  -->
              <div class="panel panel-collapse">
                <div <?php if($_REQUEST['reportpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="reportpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-fifteen" aria-expanded="false"> Add Reports:
                    <?=$reportpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-fifteen" <?php if($_REQUEST['reportpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editreport']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!-- <a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
								  while($viewreport = mysql_fetch_array($resquery15)) {
								?>
                                <tr>
                                  <td><?=date("jS M Y", strtotime($viewreport['report_date']))?></td>
                                  <td><?=$viewreport['description']?></td>
                                   <td><?php if($viewreport['status'] ==1){echo"Public";} else if($viewreport['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewreport['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewreport['ind_id']?>&id=<?=$viewreport['id']?>&editreport=reports&accr=1&reportpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewreport['ind_id']?>&id=<?=$viewreport['id']?>&delreport=val&reportpanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="reportform" id="reportform" onsubmit="return report();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="reportpanel" value="1" />
                          <input type="hidden" name="reportid" value="<?=$viewreport['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type="text" class="form-control date-picker" id="report_date" name="report_date" value="<?=date("d-m-Y", strtotime($viewreport['report_date']))?>" data-toggle="dropdown">
                                  
                                </div>
                               </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description*</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes18" name="description"><?=$viewreport['description']?>
</textarea>
								<span id="report_error" style="color:#ff0000;">&nbsp;</span>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewreport['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewreport['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewreport['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="reportsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="reportform" id="reportform" onsubmit="return report();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="reportpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type="text" class="form-control date-picker" id="report_date" name="report_date" data-toggle="dropdown">
                                  
                                </div>
                                 </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description*</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes18" name="description"></textarea>
                                  <span id="report_error" style="color:#ff0000;">&nbsp;</span>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                      <select name="status" class="form-control">
                                      <option value="1">Public</option>
                                      <option value="2">Private</option>
                                      <option value="3">Friends</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>
                                    <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="reportsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--  Report End  -->
              
              <!-- Message start -->
              <div class="panel panel-collapse">
                <div <?php if($_REQUEST['messagepanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="messagepanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen" aria-expanded="false"> Messages:
                    <?=$messagepanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen" <?php if($_REQUEST['messagepanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editmessage']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($viewmessage = mysql_fetch_array($resquery16)) {

								  ?>
                                <tr>
                                  <td><?=date("jS M Y", strtotime($viewmessage['report_date']))?></td>
                                  <td><?=$viewmessage['description']?></td>
                                  <td><?php if($viewmessage['status'] ==1){echo"Public";} else if($viewmessage['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewmessage['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewmessage['ind_id']?>&id=<?=$viewmessage['id']?>&editmessage=messages&accr=1&messagepanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewmessage['ind_id']?>&id=<?=$viewmessage['id']?>&delmessage=val&messagepanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="messageform" id="messageform" onsubmit="return message();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="messagepanel" value="1" />
                          <input type="hidden" name="messageid" value="<?=$viewmessage['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="msg_date" name="report_date" value="<?=date("d-m-Y", strtotime($viewmessage['report_date']))?>" data-toggle="dropdown">
                                  <span id="message_error" style="color:#ff0000;">&nbsp;</span>
                                </div>
                                 </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes19" name="description"><?=$viewmessage['description']?>
</textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewmessage['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewmessage['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewmessage['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="messagesubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="messageform" id="messageform" onsubmit="return message();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="messagepanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="msg_date" name="report_date" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                                <span id="message_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes19" name="description"></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="messagesubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Message end -->
              
              <!-- Claim start -->
              <div class="panel panel-collapse">
                <div <?php if($_REQUEST['claimpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="claimpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteenmis" aria-expanded="false">Add Claims:
                    <?=$claimpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteenmis" <?php if($_REQUEST['claimpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editclaim']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($viewclaim = mysql_fetch_array($resquery16mis)) {

								  ?>
                                <tr>
                                  <td><?=date("jS M Y", strtotime($viewclaim['report_date']))?></td>
                                  <td><?=$viewclaim['description']?></td>
                                   <td><?php if($viewclaim['status'] ==1){echo"Public";} else if($viewclaim['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewclaim['lastedit']))?></td>
                                  
                                  <td><a href="individual.php?ind_id=<?=$viewclaim['ind_id']?>&id=<?=$viewclaim['id']?>&mis=1&editclaim=claims&accr=1&claimpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewclaim['ind_id']?>&id=<?=$viewclaim['id']?>&delclaim=val&claimpanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="claimform" id="claimform" onsubmit="return claim();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="claimpanel" value="1" />
                          <input type="hidden" name="claimid" value="<?=$viewclaim['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="msg_datemiss" name="report_date" value="<?=date("d-m-Y", strtotime($viewclaim['report_date']))?>" data-toggle="dropdown">
                                  <span id="claim_error" style="color:#ff0000;">&nbsp;</span>
                                </div>
                                 </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes20" name="description"><?=$viewclaim['description']?>
</textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewclaim['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewclaim['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewclaim['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="claimsubmit">Save</button>
                              <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="claimform" id="claimform" onsubmit="return claim();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="claimpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="msg_datemiss" name="report_date" data-toggle="dropdown">
                                  <span id="claim_error" style="color:#ff0000;">&nbsp;</span>
                                </div>
                                 </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes20" name="description"></textarea>
                                </div>
                              </dd>
                            </dl>
                                  <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                             <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                      <select name="status" class="form-control">
                                      <option value="1">Public</option>
                                      <option value="2">Private</option>
                                      <option value="3">Friends</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="claimsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
						function claim(){
							if($("#msg_datemiss").val() == "" ){
									$("#msg_datemiss").focus();
									$("#claim_error").html("Please Enter Date");
									return false;
								}else{
									$("#claim_error").html("");
								}
							}
                      </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Claim end -->
              
              <!-- Claim form start -->
              <div class="panel panel-collapse">
                <div <?php if($_REQUEST['claimformpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="claimformpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-claimform-mis" aria-expanded="false">Add Claim Forms:
                    <?=$claimformpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-claimform-mis" <?php if($_REQUEST['claimformpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editclaimform']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($viewclaimform = mysql_fetch_array($resquery16claimformmis)) {

								  ?>
                                <tr>
                                  <td><?=date("jS M Y", strtotime($viewclaimform['report_date']))?></td>
                                  <td><?=$viewclaimform['description']?></td>
                                   <td><?php if($viewclaimform['status'] ==1){echo"Public";} else if($viewclaimform['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewclaimform['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewclaimform['ind_id']?>&id=<?=$viewclaimform['id']?>&mis=1&editclaimform=claimforms&accr=1&claimformpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewclaimform['ind_id']?>&id=<?=$viewclaimform['id']?>&delclaimform=val&claimformpanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="claimformform" id="claimformform" onsubmit="return claimform_submit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="claimformpanel" value="1" />
                          <input type="hidden" name="claimformid" value="<?=$viewclaimform['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="claimform_date" name="report_date" value="<?=date("d-m-Y", strtotime($viewclaimform['report_date']))?>" data-toggle="dropdown">
                                </div>
                                <span id="claimform_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
            <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes21" name="description"><?=$viewclaimform['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewclaimform['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewclaimform['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewclaimform['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="claimformsubmit">Save</button>
                              <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="claimformform" id="claimformform" onsubmit="return claimform_submit();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="claimformpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="claimform_date" name="report_date" data-toggle="dropdown">
                                </div>
                                <span id="claimform_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes21" name="description"></textarea>
                                </div>
                              </dd>
                            </dl>
                                  <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="claimformsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
						function claimform_submit(){
							if($("#claimform_date").val() == "" ){
									$("#claimform_date").focus();
									$("#claimform_error").html("Please Enter Date");
									return false;
								}else{
									$("#claimform_error").html("");
								}
							}
                      </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Claim form end -->
              
              <!-- Evaluation Report start -->
              <div class="panel panel-collapse">
                <div <?php if($_REQUEST['evalpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="evalpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-eval-mis" aria-expanded="false">Add Evaluation Report:
                    <?=$evalpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-eval-mis" <?php if($_REQUEST['evalpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editeval']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($vieweval = mysql_fetch_array($resquery16eval)) {

								  ?>
                                <tr>
                                  <td><?=date("jS M Y", strtotime($vieweval['report_date']))?></td>
                                  <td><?=$vieweval['description']?></td>
                                  <td><?php if($vieweval['status'] ==1){echo"Public";} else if($vieweval['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($vieweval['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$vieweval['ind_id']?>&id=<?=$vieweval['id']?>&mis=1&editeval=evals&accr=1&evalpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$vieweval['ind_id']?>&id=<?=$vieweval['id']?>&deleval=val&evalpanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="evalform" id="evalform" onsubmit="return eval_submit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="evalpanel" value="1" />
                          <input type="hidden" name="evalid" value="<?=$vieweval['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="eval_date" name="report_date" value="<?=date("d-m-Y", strtotime($vieweval['report_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                                <span id="eval_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes22" name="description"><?=$vieweval['description']?>
</textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($vieweval['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($vieweval['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($vieweval['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="evalsubmit">Save</button>
                              <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="evalform" id="evalform" onsubmit="return eval_submit();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="evalpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="eval_date" name="report_date" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                                <span id="eval_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes22" name="description"></textarea>
                                </div>
                              </dd>
                            </dl>
                                  <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                      <select name="status" class="form-control">
                                      <option value="1">Public</option>
                                      <option value="2">Private</option>
                                      <option value="3">Friends</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="evalsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
						function eval_submit(){
							if($("#eval_date").val() == "" ){
									$("#eval_date").focus();
									$("#eval_error").html("Please Enter Date");
									return false;
								}else{
									$("#eval_error").html("");
								}
							}
                      </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Evaluation Report end -->
              
              <!-- Training Report start -->
              <div class="panel panel-collapse">
                <div <?php if($_REQUEST['trnpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="trnpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-trn-mis" aria-expanded="false">Add Training Report:
                    <?=$trnpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-trn-mis" <?php if($_REQUEST['trnpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['edittrn']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($viewtrn = mysql_fetch_array($resquery16trn)) {

								  ?>
                                <tr>
                                  <td><?=date("jS M Y", strtotime($viewtrn['report_date']))?></td>
                                  <td><?=$viewtrn['description']?></td>
                                  <td><?php if($viewtrn['status'] ==1){echo"Public";} else if($viewtrn['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewtrn['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewtrn['ind_id']?>&id=<?=$viewtrn['id']?>&mis=1&edittrn=trns&accr=1&trnpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewtrn['ind_id']?>&id=<?=$viewtrn['id']?>&deltrn=val&trnpanel=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="trnform" id="trnform" onsubmit="return trn_submit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="trnpanel" value="1" />
                          <input type="hidden" name="trnid" value="<?=$viewtrn['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="trn_date" name="report_date" value="<?=date("d-m-Y", strtotime($viewtrn['report_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                                <span id="trn_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes23" name="description"><?=$viewtrn['description']?>
</textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewtrn['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewtrn['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewtrn['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>


                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="trnsubmit">Save</button>
                              <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="trnform" id="trnform" onsubmit="return trn_submit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="trnpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="trn_date" name="report_date" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                                <span id="trn_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes23" name="description"></textarea>
                                </div>
                              </dd>
                            </dl>
                                  <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                             <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="trnsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
						function trn_submit(){
							if($("#trn_date").val() == "" ){
									$("#trn_date").focus();
									$("#trn_error").html("Please Enter Date");
									return false;
								}else{
									$("#trn_error").html("");
								}
							}
                      </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Training Report end -->
              
              <!-- Academic Report start -->
              <div class="panel panel-collapse">
                <div <?php if($_REQUEST['acapanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="acapanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-aca-mis" aria-expanded="false">Add Academic Report:
                    <?=$acapanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-aca-mis" <?php if($_REQUEST['acapanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editaca']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
								  	while($viewaca = mysql_fetch_array($resquery16aca)) {
								?>
                                <tr>
                                  <td><?=date("jS M Y", strtotime($viewaca['report_date']))?></td>
                                  <td><?=$viewaca['description']?></td>
                                  <td><?php if($viewaca['status'] ==1){echo"Public";} else if($viewaca['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewaca['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewaca['ind_id']?>&id=<?=$viewaca['id']?>&mis=1&editaca=acas&accr=1&acapanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewaca['ind_id']?>&id=<?=$viewaca['id']?>&delaca=val&acapanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="acaform" id="acaform" onsubmit="return aca_submit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="acapanel" value="1" />
                          <input type="hidden" name="acaid" value="<?=$viewaca['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="aca_date" name="report_date" value="<?=date("d-m-Y", strtotime($viewaca['report_date']))?>" data-toggle="dropdown">
                                </div>
                                <span id="aca_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes24" name="description"><?=$viewaca['description']?>
</textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewaca['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewaca['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewaca['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                            <div class="m-t-30">
                            <button class="btn btn-primary btn-sm" name="submit" type="submit" value="acasubmit">Save</button>
                            <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="acaform" id="acaform" onsubmit="return aca_submit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="acapanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="aca_date" name="report_date" data-toggle="dropdown">
                                </div>
                                <span id="aca_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes24" name="description"></textarea>
                                </div>
                              </dd>
                            </dl>
                                  <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                      <select name="status" class="form-control">
                                      <option value="1">Public</option>
                                      <option value="2">Private</option>
                                      <option value="3">Friends</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="acasubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
						function aca_submit(){
							if($("#aca_date").val() == "" ){
									$("#aca_date").focus();
									$("#aca_error").html("Please Enter Date");
									return false;
								}else{
									$("#aca_error").html("");
								}
							}
                      </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Academic Report end -->
              
              <!-- Report Card start -->
              <div class="panel panel-collapse">
                <div <?php if($_REQUEST['repcpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="repcpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-repc-mis" aria-expanded="false">Add Report Card:
                    <?=$repcpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-repc-mis" <?php if($_REQUEST['repcpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['editrepc']=='') { ?>
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                              <thead>
                                <tr>
                                  <th>Date</th>
                                  <th>Information in report</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
								  	while($viewrepc = mysql_fetch_array($resquery16repc)) {
								?>
                                <tr>
                                  <td><?=date("jS M Y", strtotime($viewrepc['report_date']))?></td>
                                  <td><?=$viewrepc['description']?></td>
                                  <td><?php if($viewrepc['status'] ==1){echo"Public";} else if($viewrepc['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewrepc['lastedit']))?></td>
                                  
                                  <td><a href="individual.php?ind_id=<?=$viewrepc['ind_id']?>&id=<?=$viewrepc['id']?>&mis=1&editrepc=repcs&accr=1&repcpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewrepc['ind_id']?>&id=<?=$viewrepc['id']?>&delrepc=val&repcpanel=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="repcform" id="repcform" onsubmit="return repc_submit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="repcpanel" value="1" />
                          <input type="hidden" name="repcid" value="<?=$viewrepc['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="repc_date" name="report_date" value="<?=date("d-m-Y", strtotime($viewrepc['report_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                                <span id="repc_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Information in report</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes25" name="description"><?=$viewrepc['description']?>
</textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewrepc['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewrepc['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewrepc['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="repcsubmit">Save</button>
                              <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="repcform" id="repcform" onsubmit="return repc_submit();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="repcpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="repc_date" name="report_date" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                                <span id="repc_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Information in report</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" type="text" class="form-control" id="pagedes25" name="description"></textarea>
                                </div>
                              </dd>
                            </dl>
                                <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                            <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                      <select name="status" class="form-control">
                                      <option value="1">Public</option>
                                      <option value="2">Private</option>
                                      <option value="3">Friends</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="repcsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
						function repc_submit(){
							if($("#repc_date").val() == "" ){
									$("#repc_date").focus();
									$("#repc_error").html("Please Enter Date");
									return false;
								}else{
									$("#repc_error").html("");
								}
							}
                      </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Report Card end -->
              </div>
			  <script>
						$(document).ready(function(){
						$("#mis").click(function(){
						$("#misstart").toggle(1000);
						});
						});
                </script>
              <!-- Miscellaneous and Other Report -->
               
               <!-- Healthcare Records, Healthcare History Starts -->
              <div>
                <h4 style="cursor:pointer;" class="btn btn-success"><a id="health" style="color:#FFF;">Health Record, Health History:</a></h4>
              </div>
              <div id="injstart" <?php if($_REQUEST['inj']==1 || $_REQUEST['injuriespanel']==1 || $_REQUEST['surgeriespanel']==1 || $_REQUEST['procedurespanel']==1 || $_REQUEST['treatmentspanel']==1 || $_REQUEST['rehabilitationpanel']==1 || $_REQUEST['drugspanel']==1 || $_REQUEST['pdrugmedication']==1 || $_REQUEST['medicalout']==1 || $_REQUEST['wellness_actpanel']==1 || $_REQUEST['fitnesspanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
              <!--======================Injuries Starts===============-->
                <div class="panel panel-collapse">
                  <div <?php if($_REQUEST['injuriespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="injuriespanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-injuries" aria-expanded="false"> Add injuries:
                      <?=$injuriespanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-injuries" <?php if($_REQUEST['injuriespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['editinjuries']=='') { ?>
                          <div class="pmbb-view">
                            <ul class="actions" style="position:static; float:right;">
                              <li class="dropdown open">
                                <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                                &nbsp;
                                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                </ul>
                              </li>
                            </ul>
                            <dl class="dl-horizontal">
                              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                <thead>
                                  <tr>
                                    <th>Name/Activity </th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

								  	while($viewinjuries = mysql_fetch_array($resqueryinj)) {

								  ?>
                                  <tr>
                                    <td><?=$viewinjuries['name']?></td>
                                    <td><?=$viewinjuries['date']?></td>
                                    <td><?=$viewinjuries['description']?></td>
                                     <td><?php if($viewinjuries['status'] ==1){echo"Public";} else if($viewinjuries['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                    <td><?=date('jS F Y',strtotime($viewinjuries['lastedit']))?></td>
                                    
                                    <td><a href="individual.php?ind_id=<?=$viewinjuries['ind_id']?>&id=<?=$viewinjuries['id']?>&editinjuries=injuriess&accr=1&injuriespanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewinjuries['ind_id']?>&id=<?=$viewinjuries['id']?>&delinjuries=val&injuriespanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </dl>
                          </div>
                          <?php } else { ?>
                          <form name="injuriesform" id="injuriesform" onsubmit="return injuries();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="injuriespanel" value="1" />
                            <input type="hidden" name="injuriesid" value="<?=$viewinjuries['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Activity*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="name_inj" name="name" value="<?=$viewinjuries['name']?>">
                                  </div>
                                  <span id="injuries_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date" name="date" value="<?=$viewinjuries['date']?>">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea rows="5" cols="10" class="form-control" id="pagedes26" name="description"><?=$viewinjuries['description']?>
</textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewinjuries['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewinjuries['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewinjuries['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="injuriessubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <?php } ?>
                          <form name="injuriesform" id="injuriesform" onsubmit="return injuries();"   enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="injuriespanel" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Activity*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="name_inj" name="name" value="" placeholder="...........">
                                  </div>
                                  <span id="injuries_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date" name="date" value="" placeholder="...........">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea rows="5" cols="10" class="form-control" id="pagedes26" name="description"></textarea>
                                  </div>
                                </dd>
                              </dl>
                                <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="injuriessubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <script>

                            function injuries(){

								if($("#name_inj").val() == "" ){

									$("#name_inj").focus();

									$("#injuries_error").html("Please Enter Name/Activity");

									return false;

                            	}else{

									$("#injuries_error").html("");

								}

                            }

                            

                            </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--======================Injuries ends===============-->
                <!--======================Surgeries start===============-->
                <div class="panel panel-collapse">
                  <div <?php if($_REQUEST['surgeriespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="surgeriespanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-surgeries" aria-expanded="false"> Add surgeries:
                      <?=$surgeriespanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-surgeries" <?php if($_REQUEST['surgeriespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['editsurgeries']=='') { ?>
                          <div class="pmbb-view">
                            <ul class="actions" style="position:static; float:right;">
                              <li class="dropdown open">
                                <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                                &nbsp;
                                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                </ul>
                              </li>
                            </ul>
                            <dl class="dl-horizontal">
                              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                <thead>
                                  <tr>
                                    <th>Name/Activity </th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

								  	while($viewsurgeries = mysql_fetch_array($resqueryshj)) {

								  ?>
                                  <tr>
                                    <td><?=$viewsurgeries['name']?></td>
                                    <td><?=$viewsurgeries['date']?></td>
                                    <td><?=$viewsurgeries['description']?></td>
                                    <td><?php if($viewsurgeries['status'] ==1){echo"Public";} else if($viewsurgeries['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                    <td><?=date('jS F Y',strtotime($viewsurgeries['lastedit']))?></td>
                                    <td><a href="individual.php?ind_id=<?=$viewsurgeries['ind_id']?>&id=<?=$viewsurgeries['id']?>&editsurgeries=surgeriess&accr=1&surgeriespanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewsurgeries['ind_id']?>&id=<?=$viewsurgeries['id']?>&delsurgeries=val&surgeriespanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </dl>
                          </div>
                          <?php } else { ?>
                          <form name="surgeriesform" id="surgeriesform" onsubmit="return surgeries();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="surgeriespanel" value="1" />
                            <input type="hidden" name="surgeriesid" value="<?=$viewsurgeries['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Activity*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="name_shj" name="name" value="<?=$viewsurgeries['name']?>">
                                    <span id="surgeries_error" style="color:#ff0000;">&nbsp;</span>
                                  </div>
                                   </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date" name="date" value="<?=$viewsurgeries['date']?>">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea rows="5" cols="10" class="form-control" id="pagedes27" name="description"><?=$viewsurgeries['description']?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewsurgeries['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewsurgeries['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewsurgeries['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="surgeriessubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <?php } ?>
                          <form name="surgeriesform" id="surgeriesform" onsubmit="return surgeries();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="surgeriespanel" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Activity*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="name_shj" name="name">
                                  </div>
                                  <span id="surgeries_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date" name="date">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea rows="5" cols="10" class="form-control" id="pagedes27" name="description"></textarea>
                                  </div>
                                </dd>
                              </dl>
                               <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="surgeriessubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <script>

                            function surgeries(){

								if($("#name_shj").val() == "" ){

									$("#name_shj").focus();

									$("#surgeries_error").html("Please Enter Name/Activity");

									return false;

                            	}else{

									$("#surgeries_error").html("");

								}

                            }

                            

                            </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--======================Surgeries ends===============-->
                <!--======================Procedures start===============-->
                <div class="panel panel-collapse">
                  <div <?php if($_REQUEST['procedurespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="procedurespanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-procedures" aria-expanded="false"> Add procedures:
                      <?=$procedurespanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-procedures" <?php if($_REQUEST['procedurespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['editprocedures']=='') { ?>
                          <div class="pmbb-view">
                            <ul class="actions" style="position:static; float:right;">
                              <li class="dropdown open">
                                <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                                &nbsp;
                                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                </ul>
                              </li>
                            </ul>
                            <dl class="dl-horizontal">
                              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                <thead>
                                  <tr>
                                    <th>Name/Activity </th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

								  	while($viewprocedures = mysql_fetch_array($resquerypro)) {

								  ?>
                                  <tr>
                                    <td><?=$viewprocedures['name']?></td>
                                    <td><?=$viewprocedures['date']?></td>
                                    <td><?=$viewprocedures['description']?></td>
                                      <td><?php if($viewprocedures['status'] ==1){echo"Public";} else if($viewprocedures['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                    <td><?=date('jS F Y',strtotime($viewprocedures['lastedit']))?></td>
                                    <td><a href="individual.php?ind_id=<?=$viewprocedures['ind_id']?>&id=<?=$viewprocedures['id']?>&editprocedures=proceduress&accr=1&procedurespanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewprocedures['ind_id']?>&id=<?=$viewprocedures['id']?>&delprocedures=val&procedurespanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </dl>
                          </div>
                          <?php } else { ?>
                          <form name="proceduresform" id="proceduresform" onsubmit="return procedures();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="procedurespanel" value="1" />
                            <input type="hidden" name="proceduresid" value="<?=$viewprocedures['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Activity*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="name_pro" name="name" value="<?=$viewprocedures['name']?>">
                                  </div>
                                  <span id="procedures_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date" name="date" value="<?=$viewprocedures['date']?>">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea rows="5" cols="10" class="form-control" id="pagedes28" name="description"><?=$viewprocedures['description']?>
</textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewprocedures['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewprocedures['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewprocedures['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>


                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="proceduressubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <?php } ?>
                          <form name="proceduresform" id="proceduresform" onsubmit="return procedures();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="procedurespanel" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Activity*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="name_pro" name="name">
                                  </div>
                                  <span id="procedures_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date" name="date">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea rows="5" cols="10" class="form-control" id="pagedes28" name="description"></textarea>
                                  </div>
                                </dd>
                              </dl>
                                    <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                                        <dt class="p-t-10">Status</dt>
                                        <dd>
                                          <div class="fg-line">
                                              <select name="status" class="form-control">
                                              <option value="1">Public</option>
                                              <option value="2">Private</option>
                                              <option value="3">Friends</option>
                                            </select>
                                          </div>
                                        </dd>
                                      </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="proceduressubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <script>

                            function procedures(){

								if($("#name_pro").val() == "" ){

									$("#name_pro").focus();

									$("#procedures_error").html("Please Enter Name/Activity");

									return false;

                            	}else{

									$("#procedures_error").html("");

								}

                            }

                            

                            </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--======================Procedures ends===============-->
                <!--======================Treatments start===============-->
                <div class="panel panel-collapse">
                  <div <?php if($_REQUEST['treatmentspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="treatmentspanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-treatments" aria-expanded="false"> Add treatments:
                      <?=$treatmentspanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-treatments" <?php if($_REQUEST['treatmentspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['edittreatments']=='') { ?>
                          <div class="pmbb-view">
                            <ul class="actions" style="position:static; float:right;">
                              <li class="dropdown open">
                                <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                                &nbsp;
                                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                </ul>
                              </li>
                            </ul>
                            <dl class="dl-horizontal">
                              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                <thead>
                                  <tr>
                                    <th>Name/Activity </th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

								  	while($viewtreatments = mysql_fetch_array($resquerytrt)) {

								  ?>
                                  <tr>
                                    <td><?=$viewtreatments['name']?></td>
                                    <td><?=$viewtreatments['date']?></td>
                                    <td><?=$viewtreatments['description']?></td>
                                    <td><?php if($viewtreatments['status'] ==1){echo"Public";} else if($viewtreatments['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                    <td><?=date('jS F Y',strtotime($viewtreatments['lastedit']))?></td>
                                    <td><a href="individual.php?ind_id=<?=$viewtreatments['ind_id']?>&id=<?=$viewtreatments['id']?>&edittreatments=treatmentss&accr=1&treatmentspanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewtreatments['ind_id']?>&id=<?=$viewtreatments['id']?>&deltreatments=val&treatmentspanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </dl>
                          </div>
                          <?php } else { ?>
                          <form name="treatmentsform" id="treatmentsform" onsubmit="return treatments();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="treatmentspanel" value="1" />
                            <input type="hidden" name="treatmentsid" value="<?=$viewtreatments['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Activity*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="name_trt" name="name" value="<?=$viewtreatments['name']?>">
                                  </div>
                                  <span id="treatments_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date" name="date" value="<?=$viewtreatments['date']?>">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea rows="5" cols="10" class="form-control" id="pagedes29" name="description"><?=$viewtreatments['description']?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewtreatments['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewtreatments['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewtreatments['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="treatmentssubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <?php } ?>
                          <form name="treatmentsform" id="treatmentsform" onsubmit="return treatments();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="treatmentspanel" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Activity*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="name_trt" name="name">
                                  </div>
                                  <span id="treatments_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date" name="date">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea rows="5" cols="10" class="form-control" id="pagedes29" name="description"></textarea>
                                  </div>
                                </dd>
                              </dl>
                                   <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="treatmentssubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <script>

                            function treatments(){

								if($("#name_trt").val() == "" ){

									$("#name_trt").focus();

									$("#treatments_error").html("Please Enter Name/Activity");

									return false;

                            	}else{

									$("#treatments_error").html("");

								}

                            }

                            

                            </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--======================Treatments ends===============-->
                <!--====================Rehabiliation==========-->
                <div class="panel panel-collapse">
                  <div <?php if($_REQUEST['rehabilitationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="rehabilitationpanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-fourr" aria-expanded="false"> Add Rehabilitation:
                      <?=$rehabilitationpanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-fourr" <?php if($_REQUEST['rehabilitationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['editrehabilitation']=='') { ?>
                          <div class="pmbb-view">
                            <ul class="actions" style="position:static; float:right;">
                              <li class="dropdown open">
                                <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                                &nbsp;
                                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                </ul>
                              </li>
                            </ul>
                            <dl class="dl-horizontal">
                              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                <thead>
                                  <tr>
                                    <th>Rehabilitation Name</th>
                                    <th>Rehabilitation Date</th>
                                    <th style="width:522px;">Rehabilitation Description</th>
                                    <th style="width:522px;">Rehabilitation Outcome</th>
                                    <th>Status</th>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

								  	while($viewrehabilitation = mysql_fetch_array($resquery4)) {

								  ?>
                                  <tr>
                                    <td><?=$viewrehabilitation['rehab_name']?></td>
                                    <td><?php if($viewrehabilitation['rehab_date']!='') { ?>
                                      <?=date("jS M Y", strtotime($viewrehabilitation['rehab_date']))?>
                                      <?php } ?></td>
                                    <td><?=stripslashes($viewrehabilitation['description'])?></td>
                                    <td><?=stripslashes($viewrehabilitation['outcome'])?></td>
                                     <td><?php if($viewrehabilitation['status'] ==1){echo"Public";} else if($viewrehabilitation['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                    <td><?=date('jS F Y',strtotime($viewrehabilitation['lastedit']))?></td>
                                    <td><a href="individual.php?ind_id=<?=$viewrehabilitation['ind_id']?>&id=<?=$viewrehabilitation['id']?>&editrehabilitation=rehabilitations&accr=1&rehabilitationpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewrehabilitation['ind_id']?>&id=<?=$viewrehabilitation['id']?>&delrehabilitation=val&rehabilitationpanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </dl>
                          </div>
                          <?php } else { ?>
                          <form name="rehabilitationform" id="rehabilitationform" onsubmit="return rehabilitation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="rehabilitationpanel" value="1" />
                            <input type="hidden" name="rehabilitationid" value="<?=$viewrehabilitation['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="rehab_name" name="rehab_name" value="<?=$viewrehabilitation['rehab_name']?>">
                                  </div>
                                  <span id="award_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control date-picker" id="rehab_date" name="rehab_date" value="<?=date("d/m/Y", strtotime($viewrehabilitation['rehab_date']))?>" data-toggle="dropdown">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea  class="form-control" id="pagedes30" name="description"><?=stripslashes($viewrehabilitation['description'])?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Outcome</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" id="outcome" name="outcome" value="<?=$viewrehabilitation['outcome']?>" >
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewrehabilitation['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewrehabilitation['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewrehabilitation['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="rehabilitationsubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <?php } ?>
                          <form name="rehabilitationform" id="rehabilitationform" onsubmit="return rehabilitation();"    enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="rehabilitationpanel" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="rehab_name" name="rehab_name" value="<?=$viewrehabilitation['rehab_name']?>">
                                  </div>
                                  <span id="rehabilitation_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control date-picker" id="rehab_date" name="rehab_date" value="" data-toggle="dropdown">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea  class="form-control" id="pagedes30" name="description"></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Outcome</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type="text" class="form-control" id="outcome" name="outcome">
                                  </div>
                                </dd>
                              </dl>
                                    <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="rehabilitationsubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--====================Rehabiliation==========-->
                <!--====================Atheletics/sports/activities==========-->
                <div class="panel panel-collapse">
                  <div <?php if($_REQUEST['drugspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="drugspanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-two" aria-expanded="false"> Add Athletics/Sports/Activities:
                      <?=$drugspanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-two" <?php if($_REQUEST['drugspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['edit']=='') { ?>
                          <div class="pmbb-view">
                            <ul class="actions" style="position:static; float:right;">
                              <li class="dropdown open">
                                <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                                &nbsp;
                                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                </ul>
                              </li>
                            </ul>
                            <dl class="dl-horizontal">
                              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Used Date</th>
                                    <th>Outcome</th>
                                    <th style="width:522px;">Reason</th>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php

								  	while($viewdrigsfetch = mysql_fetch_array($resquery2)) {

								  ?>
                                  <tr>
                                    <td><?=$viewdrigsfetch['drug_name']?></td>
                                    <td><?=date("jS M Y", strtotime($viewdrigsfetch['drug_date']))?></td>
                                    <td><?=$viewdrigsfetch['outcome']?></td>
                                    <td><?=stripslashes($viewdrigsfetch['reason'])?></td>
                                    <td><?=date('jS F Y',strtotime($viewdrigsfetch['lastedit']))?></td>
                                    <td><a href="individual.php?ind_id=<?=$viewdrigsfetch['ind_id']?>&id=<?=$viewdrigsfetch['id']?>&edit=drugs&accr=1&drugspanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewdrigsfetch['ind_id']?>&id=<?=$viewdrigsfetch['id']?>&del=val&drugspanel=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </dl>
                          </div>
                          <?php } else { ?>
                          <form name="drugform" id="drugform" onsubmit="return drug();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="drugspanel" value="1" />
                            <input type="hidden" name="drugsid" value="<?=$viewdrugs['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="drug_name" name="drug_name" value="<?=$viewdrugs['drug_name']?>">
                                    <span id="drug_error" style="color:#ff0000;">&nbsp;</span>
                                  </div>
                                   </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control date-picker" id="drug_date" name="drug_date" value="<?=date("d/m/Y", strtotime($viewdrugs['drug_date']))?>" data-toggle="dropdown">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Outcome</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="outcome" name="outcome" value="<?=$viewdrugs['outcome']?>">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea  class="form-control" id="pagedes31" name="reason"><?=stripslashes($viewdrugs['reason'])?>
</textarea>
                                  </div>
                                  <span id="reason_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                                    <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" value="drugsubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <?php } ?>
                          <form name="drugform" id="drugform" onsubmit="return drug1234();"    enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="drugspanel" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="drug_name123" name="drug_name">
                                    <span id="issuerofreport_error3" style="color:#ff0000;">&nbsp;</span>
                                  </div>
                                   </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control date-picker" id="drug_date" name="drug_date" data-toggle="dropdown">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Outcome</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="outcome" name="outcome">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea  class="form-control" id="pagedes31" name="reason"></textarea>
                                  </div>
                                </dd>
                              </dl>
                              
      <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" value="drugsubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <script>
                            function drug1234(){
								if($("#drug_name123").val() == "" ){
									$("#drug_name123").focus();
									$("#issuerofreport_error3").html("Please Enter Name");
									return false;
                            	}else{
									$("#issuerofreport_error3").html("");
								}
                            }
                            </script>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--====================Atheletics/sports/activities==========-->
                <!--====================Prescription drugs/medication use =====================-->
                <div class="panel panel-collapse">
                  <div <?php if($_REQUEST['pdrugmedication']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="pdrugmedication">
                    <h4 class="panel-title"> 
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-pdrugmedication" aria-expanded="false">Prescription Drugs/Medication Use :
                      <?=$pdrugmedication?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-pdrugmedication" <?php if($_REQUEST['pdrugmedication']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel">
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['edit']=='') { ?>
                          	<?php if($_REQUEST['addpresmedi']!=1 || $_REQUEST['editpresdata']!=1){?>
                          		<div class="pmbb-view" <?php if($_REQUEST['addpresmedi']==1){?> style="display:none;" <?php }?>>
                            <ul class="actions" style="position:static; float:right;">
                              <li class="dropdown open">
                                &nbsp;
                                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                </ul>
                              </li>
                            </ul>
                            <dl class="dl-horizontal">
                              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                <thead>
                                  <tr>
                                    <th>Prescription</th>
                                    <th>Status</th>
                                    <th>Add Drug</th>
                                    <th>View Drug</th>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
								  //echo "SELECT * FROM `na_st_prescription` where `ind_id` =".$_SESSION["userid"]."";
								  $sqlpres=mysql_query("SELECT * FROM `na_st_prescription` where `ind_id` =".$_SESSION["userid"]."");
								  while($viewmepres= mysql_fetch_array($sqlpres)) {
								  ?>
                                  <tr>
                                    <td><?=$viewmepres['prescription_name']?></td>
                                    <td>
										<?php if($viewmepres['status']==1){?>
                                        	<span>Active</span>
                                        <?php }else{?>
                                        	<span>Inactive</span>
                                        <?php }?></td>
                                    <td><a href="individual.php?addpresmedi=1&pdrugmedication=1&preci_id=<?php echo $viewmepres['id']?>"><img src="img/add.png" /></a></td>
                                    <td><a id="sd<?php echo $viewmepres['id']?>"><img src="img/show.png" /></a></td>
                                    
                                    <td><?=date('jS F Y',strtotime($viewmepres['lastedit']))?></td>
                                    
                                    <td><a href="individual.php?ind_id=<?=$viewmepres['ind_id']?>&id=<?=$viewmepres['id']?>&edit=medical&accr=1&pdrugmedication=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete this ?');" href="individual.php?delprescr=val&ind_id=<?=$viewmepres['ind_id']?>&id=<?=$viewmepres['id']?>&del=val" style="color:#ff0000;">Delete</a></td>
                                  </tr>
                                  <?php //================****************==================*************===================?>
                                  			<tr style="display:none;background-color:#000;" id="bottomtrmedi<?php echo $viewmepres['id']?>">
                                                <td colspan="6">
                                                    <div style="col-sm-12">
                                                        <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Date Of Issue</th>
                                                                    <th>Description</th>
                                                                    <th>Status</th>
                                                                    <th>Track Date(Add/Edit)</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                <?php 
																//echo "select * from `na_st_precimedicine` where `preci_id` =".$viewmepres['id']."";
																$sqlimedi=mysql_query("select * from `na_st_precimedicine` where `preci_id` =".$viewmepres['id']."");
                                                                      while($rowmedi=mysql_fetch_array($sqlimedi)){	
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo date('d-m-Y',strtotime($rowmedi['date_of_issue']))?></td>
                                                                    <td><?php echo $rowmedi['description']?></td>
                                                                    <td><?php if($rowmedi['status'] ==1){echo"Public";} else if($rowmedi['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                                                    <td><?=date('jS F Y',strtotime($rowmedi['lastedit']))?></td>
                                                                    <td><a href="individual.php?pdrugmedication=1&edit=editpresdata&accr=1&id=<?php echo $rowmedi['id']?>&ind_id=<?php echo $_SESSION["userid"]?>&preci_id=<?=$rowmedi['preci_id']?>">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete this ?');" href="individual.php?delsubprescr=val&ind_id=<?=$rowmedi['ind_id']?>&id=<?=$rowmedi['id']?>&del=val" style="color:#ff0000;">Delete</a></td>
                                                                </tr>
                                                                <?php }?>
                                                            </thead>
                                                           </table> 
                                                    </div>
                                                </td>
                    						</tr>
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
											<script>
                                           		$(document).ready(function(){
                                            		$("#sd<?php echo $viewmepres['id']?>").click(function(){
                                            
                                            			$("#bottomtrmedi<?php echo $viewmepres['id']?>").toggle();
                                            		});
                                            
                                            	});
                                            </script>
                                  <?php //================****************==================***************===================?>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </dl>
                          </div>
                          	<?php }?>
                          <?php } else { ?>
                         <?php if($_REQUEST['edit']!='editpresdata'){?>
                          <form name="prescription" id="prescription"  action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="prescriptionpanel" value="1" />
                            <input type="hidden" name="prescriptionid" value="<?=$viewmepres['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Prescription Name*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="prescription_name" name="prescription_name" value="<?=$viewprescription['prescription_name']?>">
                                  </div>
                                  <span id="drug_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                    <select name="status" class="form-control
                                        <select name="status" class="form-control">
                                          <option value="1" <?php if($viewprescription['status']==1){?> selected="selected"<?php }?>>Public</option>
                                          <option value="2" <?php if($viewprescription['status']==2){?> selected="selected"<?php }?>>Private</option>
                                          <option value="3" <?php if($viewprescription['status']==3){?> selected="selected"<?php }?>>Friends</option>
                                        </select>
                                  </div>
                                  <span id="reason_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" value="prescriptionsubmit">Save</button>
                                <button onclick="window.location.href='individual.php?pdrugmedication=1'" data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <?php }?>
                          <?php } ?>
                          
                          	<form name="drugform" id="drugform" onsubmit="return prescription()" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="prescriptionpanel" value="" />
                            <input type="hidden" name="prescriptionid" value="<?php echo $_REQUEST['pdrugmedication']?>" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Prescription Name*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="prescription_name" name="prescription_name" value="<?=$viewprescription['prescription_name']?>">
                                    <label id="prescription_error3" style="color:#ff0000;">&nbsp;</label> 
                                  </div>
                                  
                                  </dd>
                              </dl>
                                <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                    <select name="status" class="form-control">
                                      <option value="1">Public</option>
                                      <option value="2">Private</option>
                                      <option value="3">Friends</option>
                                    </select>
                                    <span id="reason_error" style="color:#ff0000;">&nbsp;</span>
                                  </div>
                                   </dd>
                              </dl>
                              
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" value="prescriptionsubmit">Save</button>
                                <button onclick="window.location.href='individual.php?pdrugmedication=1'" data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          
							<script>
                            function prescription(){
                                if($("#prescription_name").val() == ""){
                                    $("#prescription_name").focus();
                                    $("#prescription_error3").html("Please Enter Prescription  Name");
                                    return false;
                                }else{
                                    $("#prescription_error3").html("");
                                }
                            }
                            </script>
                            <style>
							#prescription_error3{color:#F00;}
							</style>
                             <?php //=====================Edit subdata========================?>
                          	 <?php if($_REQUEST['edit']=='editpresdata'){?>
                        	<!--=============================-->
                            <?php 
							 $sqlsubpric = getAnyTableWhereData('na_st_precimedicine', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");
							 //print_r($sqlsubpric); exit();
							?>
                            <!--=============================-->
                        	<form name="drugform" id="drugform" onsubmit="return precimedi()" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="preci_id" value="<?=$_REQUEST['preci_id']?>" />
                            <input type="hidden" name="pmedi" value="">
                           
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date Of Issue*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date_of_issue" name="date_of_issue" value="<?=date('d-m-Y',strtotime($sqlsubpric['date_of_issue']))?>">
                                    <label id="prescriptionissue_error3" style="color:#ff0000;">&nbsp;</label>
                                  </div>
                                  </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                    <dd>
                                    <textarea name="description" class="form-control" id="pagedes32"><?php echo $sqlsubpric['description']?></textarea>
                                    </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                    <select name="status" class="form-control">
                                    	<option value="1" <?php if($sqlsubpric['status']==1){?> selected="selected" <?php }?>>Active</option>
                                        <option value="0" <?php if($sqlsubpric['status']==0){?> selected="selected" <?php }?>>Inactive</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" value="precimedisubmit">Save</button>
                                <button onclick="window.location.href='individual.php?pdrugmedication=1'" data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                              
                          </form>
                          <?php }?>
                          <script>
                            function precimedi(){
								if($("#date_of_issue").val() == "" ){
									$("#date_of_issue").focus();
									$("#prescriptionissue_error3").html("Please Enter Date Of Issue");
									return false;
                            	}else{
									$("#prescriptionissue_error3").html("");
								}
                            }
                            </script>
                            <style>
							#prescription_error3{color:#F00;}
							</style>
                        <!---->  
                        
                          	 <?php //=====================Edit Sub Data=======================?>
                             <?php if($_REQUEST['addpresmedi']==1){?>
                        	<!---->
                        	<form name="drugform" id="drugform" onsubmit="return precimedi()" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="pmedi" value="1">
                            <input type="hidden" name="preci_id" value="<?php echo $_REQUEST['preci_id']?>" />
                           
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date Of Issue*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control date-picker" id="date_of_issue" name="date_of_issue">
                                    <label id="prescriptionissue_error3" style="color:#ff0000;">&nbsp;</label>
                                  </div>
                                  </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                    <dd>
                                    <textarea name="description" class="form-control" id="pagedes32"></textarea>
                                    </dd>
                                </dl>
                              	<dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                    <select name="status" class="form-control">
                                      <option value="1">Public</option>
                                      <option value="2">Private</option>
                                      <option value="3">Friends</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" value="precimedisubmit">Save</button>
                                <button onclick="window.location.href='individual.php?pdrugmedication=1'" data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            
                          </form>
                          <script>
                            function precimedi(){
								if($("#date_of_issue").val() == "" ){

									$("#date_of_issue").focus();

									$("#prescriptionissue_error3").html("Please Enter Date Of Issue");

									return false;

                            	}else{

									$("#prescriptionissue_error3").html("");
								}
                            }

                            </script>
                            <style>
							#prescription_error3{color:#F00;}
							</style>
                        <!---->  
                        <?php }?>
                        </div>
                        
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!--====================Prescription drugs/medication use =====================-->
                <div class="panel panel-collapse">
                  <div <?php if($_REQUEST['medicalout']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="mediout">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-mediout" aria-expanded="false"> Over The Counter Drug / Medication Use :
                      <?=$medicalout?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-mediout" <?php if($_REQUEST['medicalout']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel">
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['edit']=='') { ?>
                          <div class="pmbb-view">
                            <ul class="actions" style="position:static; float:right;">
                              <li class="dropdown open">
                                <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                                &nbsp;
                                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                </ul>
                              </li>
                            </ul>
                            <dl class="dl-horizontal">
                              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Used Date</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
								    $sqlmediover = "SELECT * FROM na_st_medical_overcounter WHERE ind_id = '".$_SESSION["userid"]."'";
									$resquerymedi = mysql_query($sqlmediover) or mysql_error();
								  	while($viewmediover= mysql_fetch_array($resquerymedi)) {
								  ?>
                                  <tr>
                                    <td><?=$viewmediover['drug_name']?></td>
                                    <td><?=date("d-m-Y", strtotime($viewmediover['issue_date']))?></td>
                                    <td><?=stripslashes($viewmediover['reason'])?></td>
                                   <td><?php if($viewmediover['status'] ==1){echo"Public";} else if($viewmediover['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                    <td><?=date('jS F Y',strtotime($viewmediover['lastedit']))?></td>
                                    <td><a href="individual.php?ind_id=<?=$viewmediover['ind_id']?>&id=<?=$viewmediover['id']?>&edit=medical&accr=1&medicalout=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete this ?');" href="individual.php?delxxxx=1&ind_id=<?=$viewmediover['ind_id']?>&id=<?=$viewmediover['id']?>&del=val" style="color:#ff0000;">Delete</a></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </dl>
                          </div>
                          <?php } else { ?>
                          <form name="mediout" id="mediout"  action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="medioutpanel" value="1" />
                            <input type="hidden" name="medioutid" value="<?=$viewmediover['id']?>"/>
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="drug_name" name="drug_name" value="<?=$viewmediover['drug_name']?>">
                                    <span id="drug_error" style="color:#ff0000;">&nbsp;</span>
                                  </div>
                                   </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control date-picker" id="issue_date" name="issue_date" value="<?=date("d/m/Y", strtotime($viewmediover['issue_date']))?>" data-toggle="dropdown">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea  class="form-control" id="pagedes33" name="reason"><?=stripslashes($viewmediover['reason'])?>
</textarea>
                                  </div>
                                  <span id="reason_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                    <select name="status" class="form-control">
                      <option value="1" <?php if($viewmediover['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewmediover['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewmediover['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                                  </div>
                                  <span id="reason_error" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" value="drugsubmitout">Save</button>
                                <button onclick="window.location.href='individual.php?medicalout=1'" data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <?php } ?>
                          <form name="drugform" id="drugform" onsubmit="return mediout()"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="drugspanel" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="drug_name" name="drug_name">
                                  </div>
                                  <span id="mediout_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control date-picker" id="drug_date_outcome" name="issue_date" data-toggle="dropdown">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Outcome</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type="text" class="form-control" id="outcome" name="outcome">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="fg-line">
                                    <textarea  class="form-control" id="pagedes33" name="reason"></textarea>
                                  </div>
                                </dd>
                              </dl>
                               <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" value="drugsubmitout">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                          </form>
                          <script>
                            function mediout(){
								if($("#drug_name").val() == "" ){
									$("#drug_name").focus();
									$("#mediout_error3").html("Please Enter Drug Name");
									return false;
                            	}else{
									$("#mediout_error3").html("");
								}
                            }
                            </script>
                            <style>
							#mediout_error3{color:#F00;}
							</style>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- =================== Wellness Activity information starts ==================-->
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['wellness_actpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-wellness_act" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Wellness Activity information: </a> </h4>

                    </div>

                    <div id="accordionTeal-wellness_act" <?php if($_REQUEST['wellness_actpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if($_REQUEST['editwellness_act']=='') { ?>
                            <div class="pmbb-view">
                              <ul class="actions" style="position:static; float:right;">
                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;
                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                  </ul>
                                </li>
                              </ul>
                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Name/Type of Activity</th>
                                      <th>Instructional Facility or School</th>
                                      <th>Date of Use</th>
                                      <th>Description/Reason for use</th>
                                      <th>Outcome</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
								  	while($viewwellness_act = mysql_fetch_array($resquerywellness_act)) {
								  ?>

                                    <tr>
                                      <td><?=$viewwellness_act['name'];?></td>
                                      <td><?=$viewwellness_act['school'];?></td>
                                      <td><?=date('d-m-Y',strtotime($viewwellness_act['date_of_issue']));?></td>
                                      <td><?=$viewwellness_act['description'];?></td>
                                      <td><?=$viewwellness_act['outcome'];?></td>
                                      <td><?=date('jS F Y',strtotime($viewwellness_act['lastedit']))?></td>
                                      
                                      <td><a href="individual.php?ind_id=<?=$viewwellness_act['ind_id']?>&id=<?=$viewwellness_act['id']?>&editwellness_act=awards&accr=1&inj=1&wellness_actpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewwellness_act['ind_id']?>&id=<?=$viewwellness_act['id']?>&delwellness_act=val&wellness_actpanel=1&gen=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                            </div>
                            <?php } else { ?>

                            <form name="wellness_actform" id="wellness_actform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="wellness_actpanel" value="1" />
                            <input type="hidden" name="wellness_actdid" value="<?=$viewwellness_act['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Type of Activity*</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewwellness_act['name']?>" id="name_health" name="name" data-toggle="dropdown" placeholder="Name/Type of Activity">
                                    <span id="wellness_act_error3" style="color:#ff0000;">&nbsp;</span>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Instructional Facility or School</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewwellness_act['school']?>" id="school" name="school" data-toggle="dropdown" placeholder="Instructional Facility or School">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date of use</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="<?php echo $viewwellness_act['date_of_issue']?>" id="date_of_issue" name="date_of_issue" data-toggle="dropdown" placeholder="Date of use">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes34" name="description"><?php echo $viewwellness_act['description']?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Outcome</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewwellness_act['outcome']?>" id="outcome" name="outcome" data-toggle="dropdown" placeholder="Outcomea">
                                  </div>
                                </dd>
                              </dl>
                              <select name="status" class="form-control">
                      <option value="1" <?php if($viewwellness_act['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewwellness_act['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewwellness_act['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="wellness_actsubmit">Save</button>
                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                              </div>
                            </div>
                            </form>
                            <?php } ?>
                            <form name="wellness_actform" id="wellness_actform" onsubmit="return Submitwellness_act3();"   enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="wellness_actpanel" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Name/Type of Activity*</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="name_health" name="name" data-toggle="dropdown" placeholder="Name/Type of Activity">
                                    <span id="wellness_act_error3" style="color:#ff0000;">&nbsp;</span>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Instructional Facility or School</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="school" name="school" data-toggle="dropdown" placeholder="Instructional Facility or School">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date of use</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="" id="date_of_issue" name="date_of_issue" data-toggle="dropdown" placeholder="Date of use">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control" id="pagedes34" name="description"></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Outcome</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="" id="outcome" name="outcome" data-toggle="dropdown" placeholder="Outcomea">
                                  </div>
                                </dd>
                              </dl>
                                   <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1">Public</option>
                      <option value="2">Private</option>
                      <option value="3">Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="wellness_actsubmit">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                            </form>
                           <script>
                            function Submitwellness_act3(){
								if($("#name_health").val() == "" ){
									$("#name_health").focus();
									$("#wellness_act_error3").html("Please Enter Name/Type of Activity");
									return false;
                            	}else{
									$("#wellness_act_error3").html("");
								}
                            }
                           </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- =================== Wellness Activity information starts ==================-->
                
                <!-- =================== Fitness/Exercise/Training Activity information starts ==================-->
                <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['fitnesspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-fitness" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Fitness/Exercise/Training Activity information: </a> </h4>

                    </div>

                    <div id="accordionTeal-fitness" <?php if($_REQUEST['fitnesspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editfitness']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Name/Type of Activity</th>
                                      <th>Instructional Facility or School</th>
                                      <th>Date of Use</th>
                                      <th>Description/Reason for use</th>
                                      <th>Outcome</th>
                                      <th>Status</th>
                                      <th>Track Date(Add/Edit)</th>
                                      
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
								  	while($viewfitness = mysql_fetch_array($resqueryfitness)) {
								  ?>
                                    <tr>
                                      <td><?=$viewfitness['name'];?></td>
                                      <td><?=$viewfitness['school'];?></td>
                                      <td><?=date('d-m-Y',strtotime($viewfitness['date_of_issue']));?></td>
                                      <td><?=$viewfitness['description'];?></td>
                                      <td><?=$viewfitness['outcome'];?></td>
                                      <td><?php if($viewfitness['status'] ==1){echo"Public";} else if($viewfitness['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewfitness['lastedit']))?></td>
                                      
                                      <td><a href="individual.php?ind_id=<?=$viewfitness['ind_id']?>&id=<?=$viewfitness['id']?>&editfitness=awards&accr=1&inj=1&fitnesspanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewfitness['ind_id']?>&id=<?=$viewfitness['id']?>&delfitness=val&fitnesspanel=1&gen=1" style="color:#ff0000;" onclick="return confirm('are you sure want to delete?')">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="fitnessform" id="fitnessform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="fitnesspanel" value="1" />

                            <input type="hidden" name="fitnessdid" value="<?=$viewfitness['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name/Type of Activity*</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewfitness['name']?>" id="name_fitness" name="name" data-toggle="dropdown" placeholder="Name/Type of Activity">

                                  </div>
								<span id="fitness_error3" style="color:#ff0000;">&nbsp;</span>
                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Instructional Facility or School</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewfitness['school']?>" id="school" name="school" data-toggle="dropdown" placeholder="Instructional Facility or School">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date of use</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewfitness['date_of_issue']?>" id="date_of_issue" name="date_of_issue" data-toggle="dropdown" placeholder="Date of use">

                                  </div>

                                   

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes35" name="description"><?php echo $viewfitness['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Outcome</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewfitness['outcome']?>" id="" name="outcome" data-toggle="dropdown" placeholder="Outcome">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewfitness['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewfitness['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewfitness['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              
                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="fitnesssubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="fitnessform" id="fitnessform" onsubmit="return Submitfitness3();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="fitnesspanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name/Type of Activity*</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="name_fitness" name="name" data-toggle="dropdown" placeholder="Name/Type of Activity">

                                  </div>
								<span id="fitness_error3" style="color:#ff0000;">&nbsp;</span>
                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Instructional Facility or School</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="school" name="school" data-toggle="dropdown" placeholder="Instructional Facility or School">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date of use</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="date_of_issue" name="date_of_issue" data-toggle="dropdown" placeholder="Date of use">

                                  </div>

                                   

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control" id="pagedes35" name="description"></textarea>

                                  </div>

                                </dd>

                              </dl>
                                  <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="images[]" accept="image/pdf" multiple>
                  </div>
                </dd>
              </dl>
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Outcome</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="outcome" name="outcome" data-toggle="dropdown" placeholder="Outcomea">

                                  </div>

                                </dd>

                              </dl>
                                <dl class="dl-horizontal">
                                    <dt class="p-t-10">Status</dt>
                                    <dd>
                                      <div class="fg-line">
                                          <select name="status" class="form-control">
                                          <option value="1">Public</option>
                                          <option value="2">Private</option>
                                          <option value="3">Friends</option>
                                        </select>
                                      </div>
                                    </dd>
                                  </dl>
                              
                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="fitnesssubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitfitness3(){

								if($("#name_fitness").val() == "" ){

									$("#name_fitness").focus();

									$("#fitness_error3").html("Please Enter Name/Type of Activity");

									return false;

                            	}else{

									$("#fitness_error3").html("");

								}
                            }
                           </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
                
                <!-- =================== Fitness/Exercise/Training Activity information starts ==================-->
                
              </div>
              <script>
					$(document).ready(function(){
						$("#health").click(function(){
							$("#injstart").toggle(800);
						});
					});
				 </script>
			<!-- Healthcare Records, Healthcare History Ends -->
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  </section>
  <?php include('lib/inner_footer.php')?>
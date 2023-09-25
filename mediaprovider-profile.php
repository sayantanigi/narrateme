<?php
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
/*if(isset($_REQUEST['type'])){
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
		}else if($typedata=='mpp'){
			$data=array('mpp'=>1);
			$InsertRegSql=updateData($data,'na_member', " id='" .$_SESSION["userid"]. "' ") ;
		}
	}*/
$pagename = basename($_SERVER['PHP_SELF']);

//=================================================== Media Profile Info | SUPRATIM | 29-07-2016 ==============================================================
//Insert Media Profile Info Record
	if($_REQUEST['submit']=="mediasubmit") {
	extract($_POST);

	//Checking Data
	$mediasql = "SELECT * FROM na_media_information WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery = mysql_query($mediasql) or mysql_error();
	$stunum = mysql_num_rows($resquery);
	if($stunum==0) {

		$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'description'=>addslashes($description),'ipaddress'=>$ipaddress,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'news_information'=>addslashes($news_information),'news_reports'=>addslashes($news_reports),'published_reports'=>addslashes($published_reports),'study_reports'=>addslashes($study_reports),'programs'=>addslashes($programs),'television_programs'=>addslashes($television_programs),'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
		$result = insertData($data, 'na_media_information');

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='mediaprovider-profile.php?operation=successful';\n";
		echo "</script>";
	} else {

		$data = array('name'=>$name,'description'=>addslashes($description),'ipaddress'=>$ipaddress,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'news_information'=>addslashes($news_information),'news_reports'=>addslashes($news_reports),'published_reports'=>addslashes($published_reports),'study_reports'=>addslashes($study_reports),'programs'=>addslashes($programs),'television_programs'=>addslashes($television_programs),'lastedit'=>date('Y-m-d H:i:s'));
		$result = updateData($data,' na_media_information', " ind_id='" . $_SESSION["userid"] . "' ") ;

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='mediaprovider-profile.php?operation=successful';\n";
		echo "</script>";
	}
	}

	//Show Media Profile Info record
	$viewmediapro = getAnyTableWhereData('na_media_information', " AND ind_id='".$_SESSION["userid"]."' ");

	$mediasql = "SELECT * FROM na_media_information WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery = mysql_query($mediasql) or mysql_error();
	$stunum = mysql_num_rows($resquery);
//=================================================== Media Profile Info | SUPRATIM | 29-07-2016 ==============================================================
//=================================================== Media Marketing and Promotions | SUPRATIM | 29-07-2016===================================================
	//Insert Marketing and Promotions Record
	if($_REQUEST['submit']=="marketingsubmit") {
	extract($_POST);
		if($_REQUEST['marketingid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'advertisement_material'=>addslashes($advertisement_material),'marketing_material'=>addslashes($marketing_material),'commercials'=>$commercials,'video_clips'=>$video_clips,'infomercials'=>$infomercials,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_media_information_marketing');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='mediaprovider-profile.php?operation=successful&marketingpanel=".$marketingpanel."&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'advertisement_material'=>addslashes($advertisement_material),'marketing_material'=>addslashes($marketing_material),'commercials'=>$commercials,'video_clips'=>$video_clips,'infomercials'=>$infomercials, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_media_information_marketing', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['marketingid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='mediaprovider-profile.php?operation=successful&marketingpanel=".$marketingpanel."&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	//Delete Marketing and Promotions Record
	if($_REQUEST['delmarketing']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_media_information_marketing WHERE id = '".$_REQUEST['id']."'";
		mysql_query($delsql);

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='mediaprovider-profile.php?deloperation=successful&marketingpanel=".$_REQUEST['marketingpanel']."&accr=1';\n";
		echo "</script>";
	}
	
	//Show Media Marketing record
	$viewmediamarketing = getAnyTableWhereData('na_media_information_marketing', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");
	
	$marketingsql = "SELECT * FROM na_media_information_marketing WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery1 = mysql_query($marketingsql) or mysql_error();
	$stunum1 = mysql_num_rows($resquery1);
//=================================================== Media Marketing and Promotions | SUPRATIM | 29-07-2016===================================================
?>
<script type="text/javascript">
	function mediacheck(){
	 var name = document.getElementById("name").value;
	 if(name=='') {
		 	document.getElementById("name_error").innerHTML="Please Enter Name";
			document.getElementById("name").focus();
			return false;
	 } else {
		 document.getElementById("name_error").innerHTML="";
	 }
	}
</script>
<section id="main">
  <?php include('lib/aside.php');?>
  <section id="content">
    <div class="container">
      <div class="block-header">
        <h2>Welcome Back <span style="color:#666; font-weight:400;">
          <?=ucfirst($_SESSION["username"])?>
          </span><small>Designation</small></h2>
      </div>
      <div id="profile-main" class="card">
        <div class="pm-body clearfix" style="margin:0; padding:0;">
          <div class="pmb-block">
            <!--<div class="form-horizontal row">
              <div class="form-group" style="margin:0 0 20px 0;">
                <?php if($_REQUEST['operation']=="successful") { ?>
                <div class="col-sm-12 pmbb-header" style="margin-top:0; color:#D18C13;">Operation Successful</div>
                <?php } ?>
                <?php if($_REQUEST['deloperation']=="successful") { ?>
                <div class="col-sm-12 pmbb-header" style="margin-top:0; color:#D18C13;">Delete Operation Successful</div>
                <?php } ?>
                <div class="col-sm-4 pmbb-header">
                  <h2><i class="zmdi zmdi-select-all zmdi-hc-fw"></i> Select Record</h2>
                </div>
                <div class="col-sm-8">
                  <div class="select">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                      <select class="selectpicker" name="type" onchange="this.form.submit()">
                        <option>Select an option</option>
                        <?php if($viewusr['ind']==0){?>
                        <option value="ind" <?php if($pagename=='individual.php'){?> selected<?php }?>>Individual</option>
                        <?php }?>
                        <?php
                            if($viewusr['std']!=1){
                            ?>
                        <option value="std" <?php if($pagename=='student.php'){?> selected<?php }?>>Student</option>
                        <?php }?>
                        <?php
                            if($viewusr['edu']!=1){
                            ?>
                        <option value="edu" <?php if($pagename=='educationalinstitute.php'){?> selected<?php }?>>Educational Institute</option>
                        <?php }?>
                        <?php
                            if($viewusr['fac']!=1){
                            ?>
                        <option value="fac" <?php if($pagename=='instructional_facility.php'){?> selected<?php }?>>Instructional Facility</option>
                        <?php }?>
                        <?php
                            if($viewusr['soc']!=1){
                            ?>
                        <option value="soc" <?php if($pagename=='instructional_facility.php'){?> selected<?php }?>>Social Profile</option>
                        <?php }?>
                        <?php
                            if($viewusr['mpp']!=1){
                            ?>
                        <option value="mpp" <?php if($pagename=='mediaprovider-profile.php'){?> selected<?php }?>>Media Provider Profile</option>
                        <?php }?>
                      </select>
                    </form>
                  </div>
                </div>
              </div>
            </div>-->
            <div class="pmbb-header">
              <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
              <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="if" style="color:#FFF;">Information</a></h4>
              <div id="ifd">
                <!-- Media Profile Information Starts -->
                <div class="panel panel-collapse">
                  <div class="panel-heading" role="tab">
                    <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">Informations</a></h4>
                  </div>
                 <div id="accordionTeal-one" <?php if(isset($_REQUEST['accr'])==''){ ?> class="collapse in" <?php } else { ?> class="collapse " <?php } ?> role="tabpanel">
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <div class="pmbb-view">
                          <ul class="actions" style="position:static; float:right;">
                            <li class="dropdown open">
                              <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->
                              &nbsp;
                              <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0;">
                                <?php if($stunum==0) { ?>
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                <?php } else { ?>
                                <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Edit</a> </li>
                                <?php } ?>
                              </ul>
                            </li>
                          </ul>
                          <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd>
                              <?=$viewmediapro['name']?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>Description</dt>
                            <dd style="width:50%;">
                              <?=stripslashes($viewmediapro['description'])?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>IP Address(es)</dt>
                            <dd>
                              <?=$viewmediapro['ipaddress']?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>Website(s)</dt>
                            <dd>
                             <?=$viewmediapro['website']?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>Domain Name(s)</dt>
                            <dd>
                              <?=$viewmediapro['domain_name']?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>URL</dt>
                            <dd>
                              <?=$viewmediapro['url']?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>News Information</dt>
                            <dd style="width:50%;">
                              <?=stripslashes($viewmediapro['news_information'])?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>News Reports</dt>
                            <dd style="width:50%;">
                              <?=stripslashes($viewmediapro['news_reports'])?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>Published Reports</dt>
                            <dd style="width:50%;">
                              <?=stripslashes($viewmediapro['published_reports'])?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>Study Reports</dt>
                            <dd style="width:50%;">
                              <?=stripslashes($viewmediapro['study_reports'])?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>Programs</dt>
                            <dd style="width:50%;">
                              <?=stripslashes($viewmediapro['programs'])?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>Television Programs</dt>
                            <dd style="width:50%;">
                              <?=stripslashes($viewmediapro['television_programs'])?>
                            </dd>
                          </dl>
                          <dl class="dl-horizontal">
                            <dt>Track Date(Add/Edit)</dt>
                            <dd style="width:50%;">
                              <?=date('jS F Y',strtotime($viewmediapro['lastedit']))?>
                            </dd>
                          </dl>
                        </div>
                        <form name="mediaform" id="mediaform" onsubmit="return mediacheck();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" name="name" id="name" value="<?=$viewmediapro['name']?>" class="form-control" placeholder="Name">
                                </div>
                                <span id="name_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" name="description" cols="8" id="descriptionnnn" placeholder="Description" style="height:50px;"><?=$viewmediapro['description']?></textarea>
                                </div>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">IP Address(es)</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type="text" name="ipaddress" id="ipaddress" value="<?=$viewmediapro['ipaddress']?>" class="form-control" placeholder="IP Address(es)">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Website(s)</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" name="website" id="website" value="<?=$viewmediapro['ipaddress']?>" class="form-control" placeholder="Website(s)">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Domain Name(s)</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" name="domain_name" id="domain_name" value="<?=$viewmediapro['domain_name']?>" class="form-control" placeholder="Domain Name(s)">
                                </div>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">URL</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" name="url" id="url" value="<?=$viewmediapro['url']?>" class="form-control" placeholder="URL">
                                </div>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">News Information</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" name="news_information" id="news_informationnnn" cols="8" class="form-control" placeholder="News Information" style="height:50px;"><?=$viewmediapro['news_information']?></textarea>
                                </div>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">News Reports</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" name="news_reports" id="news_reports" cols="8" class="form-control" placeholder="News Reports" style="height:50px;"><?=$viewmediapro['news_reports']?></textarea>
                                </div>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Published Reports</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" name="published_reports" id="published_reportssss" cols="8" class="form-control" placeholder="Published Reports" style="height:50px;"><?=$viewmediapro['published_reports']?></textarea>
                                </div>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Study Reports</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" name="study_reports" id="study_reportssss" cols="8" class="form-control" placeholder="Study Reports" style="height:50px;"><?=$viewmediapro['study_reports']?></textarea>
                                </div>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Programs</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" name="programs" id="programssss" cols="8" class="form-control" placeholder="Programs" style="height:50px;"><?=$viewmediapro['programs']?></textarea>
                                </div>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Television Programs</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" name="television_programs" id="television_programssss" cols="8" class="form-control" placeholder="Television Programs" style="height:50px;"><?=$viewmediapro['television_programs']?></textarea>
                                </div>
                            </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" type="submit" name="submit" value="mediasubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              	<!-- Media Profile Information Starts -->
              	</div><br>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script>
        $(document).ready(function(){
        $("#if").click(function(){
        $("#ifd").toggle();
        	});
        });
        </script>
        
        		<h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="mp" style="color:#FFF;">Marketing and Promotion</a></h4>
                <div id="map" <?php if($_REQUEST['marketingpanel']==1) {?>style="display:block;"<?php }?> style="display:none;">
                <div class="panel panel-collapse">
                <div <?php if($_REQUEST['marketingpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
                  <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-mar" data-parent="#accordionTeal" data-toggle="collapse" class="">Marketing and Promotion:</a> </h4>
                </div>
                <div id="accordionTeal-mar" <?php if($_REQUEST['marketingpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if($_REQUEST['marketing']=='') { ?>
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
                                  <th>Advertisements/Advertisement Materials</th>
                                  <th>Marketing Materials or Information</th>
                                  <th>Commercials</th>
                                  <th>Video Clips</th>
                                  <th>Infomercials</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
								  	while($viewmediamarketing = mysql_fetch_array($resquery1)) {
								  ?>
                                <tr>
                                  <td><?=substr(stripslashes($viewmediamarketing['advertisement_material']),0,100)?></td>
                                  <td><?=substr(stripslashes($viewmediamarketing['marketing_material']),0,100)?></td>
                                  <td><?=$viewmediamarketing['commercials'];?></td>
                                  <td><?=$viewmediamarketing['video_clips'];?></td>
                                  <td><?=$viewmediamarketing['infomercials'];?></td>
                                  <td><?=date('jS F Y',strtotime($viewmediamarketing['lastedit']))?></td>
                                  
                                  <td><a href="mediaprovider-profile.php?ind_id=<?=$viewmediamarketing['ind_id']?>&id=<?=$viewmediamarketing['id']?>&marketing=awards&accr=1&marketingpanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="mediaprovider-profile.php?ind_id=<?=$viewmediamarketing['ind_id']?>&id=<?=$viewmediamarketing['id']?>&delmarketing=val&marketingpanel=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="marketingform" id="marketingform" onsubmit="return marketingcheck1();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="marketingpanel" value="1" />
                          <input type="hidden" name="marketingid" value="<?=$viewmediamarketing['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Advertisements/Advertisement Materials*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <textarea type='text' class="form-control" cols="8" id="advertisement_material" name="advertisement_material" data-toggle="dropdown" placeholder="Advertisements/Advertisement Materials" style="height:100px;"><?php echo $viewmediamarketing['advertisement_material']?></textarea>
                                </div>
                                <span id="ad1_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Marketing Materials or Information</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" cols="8" id="marketing_material" name="marketing_material" placeholder="Marketing Materials or Information" style="height:100px;"><?php echo $viewmediamarketing['marketing_material']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Commercials</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control " value="<?php echo $viewmediamarketing['commercials']?>" id="commercials" name="commercials" data-toggle="dropdown" placeholder="Commercials">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Video Clips</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control " value="<?php echo $viewmediamarketing['video_clips']?>" id="video_clips" name="video_clips" data-toggle="dropdown" placeholder="Video Clips">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Infomercials</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control " value="<?php echo $viewmediamarketing['infomercials']?>" id="infomercials" name="infomercials" data-toggle="dropdown" placeholder="Infomercials">
                                </div>
                              </dd>
                            </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="marketingsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
						<script>
                        function marketingcheck1(){
                        if($("#advertisement_material").val() == "" ){
                        $("#advertisement_material").focus();
                        $("#ad1_error").html("Please Enter Advertisement Materials");
                        return false;
                        }else{
                        $("#ad1_error").html("");
                        }
                        }
                        </script>
                        <?php } ?>
                        <form name="marketingform" id="marketingform" onsubmit="return marketingcheck2();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="marketingpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Advertisements/Advertisement Materials*</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <textarea type='text' class="form-control" cols="8" id="advertisement_material" name="advertisement_material" data-toggle="dropdown" placeholder="Advertisements/Advertisement Materials" style="height:100px;"></textarea>
                                </div>
                                <span id="ad2_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Marketing Materials or Information</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" cols="8" id="marketing_material" name="marketing_material" placeholder="Marketing Materials or Information" style="height:100px;"></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Commercials</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control"  id="commercials" name="commercials" data-toggle="dropdown" placeholder="Commercials">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Video Clips</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control" id="video_clips" name="video_clips" data-toggle="dropdown" placeholder="Video Clips">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Infomercials</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control" id="infomercials" name="infomercials" data-toggle="dropdown" placeholder="Infomercials">
                                </div>
                              </dd>
                            </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="marketingsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
                            function marketingcheck2(){
								if($("#advertisement_material1").val() == "" ){
									$("#advertisement_material1").focus();
									$("#ad2_error").html("Please Enter Advertisement Materials");
									return false;
                            	}else{
									$("#ad2_error").html("");
								}
                            }
                            </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
				</div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script>
				$(document).ready(function(){
				$("#mp").click(function(){
				$("#map").toggle();
					});
				});
				</script>
        
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  </section>
  <?php include('lib/inner_footer.php')?>
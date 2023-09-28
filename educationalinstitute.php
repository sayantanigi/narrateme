<?php
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
$pagename = basename($_SERVER['PHP_SELF']);

//================Geneal info starts=====================

if(@$_REQUEST['submit']=="generalinfosubmit") {
		extract($_POST);
		if(@$_REQUEST['generalinfodid']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'informational_description'=>$informational_description,'school_bulletin'=>$school_bulletin,'address'=>$address,'telephone_no'=>$telephone_no,'email'=>$email,'message'=>$message,'ip_address'=>$ip_address,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'link_to_portal'=>$link_to_portal,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_general_info');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&gen=1&generalinfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'informational_description'=>$informational_description,'school_bulletin'=>$school_bulletin,'address'=>$address,'telephone_no'=>$telephone_no,'email'=>$email,'message'=>$message,'ip_address'=>$ip_address,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'link_to_portal'=>$link_to_portal,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_general_info', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['generalinfodid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&gen=1&generalinfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delgeneralinfo']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_general_info WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&gen=1&generalinfopanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewgeneralinfo = getAnyTableWhereData('na_ins_general_info', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensgeneralinfosql = "SELECT * FROM na_ins_general_info WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquerygeneralinfo = mysqli_query($con, $studensgeneralinfosql) or mysqli_error();
	$stunumgeneralinfo = mysqli_num_rows($resquerygeneralinfo);
	
	
	//==========================ADD Sub Level=======================
	//=======ADD=============
if(@$_REQUEST['submit']=="instructordetsubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'igi_id'=>@$_REQUEST['id'], 'name'=>$name, 'course'=>$course, 'bioandinfo'=>addslashes($bioandinfo), 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_general_info_instructor');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&generalinfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="editinstructorsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name, 'course'=>$course, 'bioandinfo'=>addslashes($bioandinfo), 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_general_info_instructor', " ind_id='" . $_SESSION["userid"] . "' AND igii_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&generalinfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['delinstructor']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_general_info_instructor WHERE igii_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&generalinfopanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$queryinstructorfetch="SELECT * FROM `na_ins_general_info_instructor` WHERE ind_id='".$_SESSION["userid"]."' AND igii_id = '".@$_REQUEST['instructorid']."'";
		$executequeryinstructor=mysqli_query($con, $queryinstructorfetch);
		$fetchinstructor=mysqli_fetch_array($executequeryinstructor);
		
	//==========================ADD Sub Level End=======================
//================General info Ends=====================
//================Add Teacher / Professor / Instructor starts=====================
if(@$_REQUEST['submit']=="teachersubmit") {
		extract($_POST);
		if(@$_REQUEST['teacherdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'course'=>$course,'information'=>$information,'address'=>$address,'telephone'=>$telephone,'email'=>$email,'website'=>$website,'status'=>1);
			$result = insertData($data, 'na_ins_teacher');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&gen=1&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'course'=>$course,'information'=>$information,'address'=>$address,'telephone'=>$telephone,'email'=>$email,'website'=>$website);
			$result = updateData($data,'na_ins_teacher', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['teacherdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&gen=1&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delteacher']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_teacher WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&gen=1&teacherpanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewteacher = getAnyTableWhereData('na_ins_teacher', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensteachersql = "SELECT * FROM na_ins_teacher WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery1 = mysqli_query($con, $studensteachersql) or mysqli_error();
	$stunum1 = mysqli_num_rows($resquery1);
//================Add Teacher / Professor / Instructor Ends=====================




//================Add Schools/ Divisions starts=====================
if(@$_REQUEST['submit']=="schoolssubmit") {
		extract($_POST);
		if(@$_REQUEST['schoolsdid']=="") {
		    $uploads_dir = 'uploads/edu_doc/';
$imageArr = array();
foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $name = $_FILES["images"]["name"][$key];
          list($txt, $ext) = explode(".", $name);
           //date_default_timezone_set ("Asia/Calcutta"); 
           $currentdate=date("d M Y");  
           $file= time().substr(str_replace(" ", "_", $txt), 0);
           $info = pathinfo($file);
 
            $filename = $file.".".$ext;
        move_uploaded_file($tmp_name, "$uploads_dir/$filename");
        array_push($imageArr,$filename);
    }
}
			$data = array('ind_id'=>$_SESSION["userid"],'program'=>$program,'course'=>$course, 'curiculum'=>$curiculum ,'image'=>json_encode($imageArr),'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_schools');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'program'=>$program,'course'=>$course, 'curiculum'=>$curiculum, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_schools', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['schoolsdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delschools']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_schools WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&prog=1&schoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewschools = getAnyTableWhereData('na_ins_schools', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensschoolssql = "SELECT * FROM na_ins_schools WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery2 = mysqli_query($con, $studensschoolssql) or mysqli_error();
	$stunum2 = mysqli_num_rows($resquery2);
	
	
		//==========================ADD Sub Level=======================
	//=======ADD=============
if(@$_REQUEST['submit']=="crssubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'ins_schools_id'=>@$_REQUEST['id'], 'crsname'=>$crsname, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_schools_curiculum');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="editcoursesubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"],'crsname'=>$crsname, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_schools_curiculum', " ind_id='" . $_SESSION["userid"] . "' AND isc_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['delcourse']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_schools_curiculum WHERE isc_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&schoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$querycoursefetch="SELECT * FROM `na_ins_schools_curiculum` WHERE ind_id='".$_SESSION["userid"]."' AND isc_id = '".@$_REQUEST['courseid']."'";
		$executequerycourse=mysqli_query($con, $querycoursefetch);
		$fetchcourse=mysqli_fetch_array($executequerycourse);
	
	
		//==========================ADD Sub Level For Course Details=======================[DONE]
	
	//=======ADD=============
if(@$_REQUEST['submit']=="crsdetailssubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'isc_id'=>@$_REQUEST['id'], 'crs_desc'=>addslashes($crs_desc), 'crs_instructor'=>$crs_instructor,'crs_schedule'=>date('Y-m-d', strtotime($crs_schedule)), 'transferofinstitutions'=>$transferofinstitutions , 'clsandlec'=>$clsandlec , 'acceptedsuplyclasses'=>$acceptedsuplyclasses, 'pastlectures'=>$pastlectures ,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_schools_curiculum_details');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="crsdetailseditsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"],'isc_id'=>@$_REQUEST['id'], 'crs_desc'=>addslashes($crs_desc), 'crs_instructor'=>$crs_instructor,'crs_schedule'=>date('Y-m-d', strtotime($crs_schedule)), 'transferofinstitutions'=>$transferofinstitutions , 'clsandlec'=>$clsandlec , 'acceptedsuplyclasses'=>$acceptedsuplyclasses, 'pastlectures'=>$pastlectures, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_schools_curiculum_details', " ind_id='" . $_SESSION["userid"] . "' AND iscd_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['delcoursedetails']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_schools_curiculum_details WHERE iscd_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&schoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$querycoursedetfetch="SELECT * FROM `na_ins_schools_curiculum_details` WHERE ind_id='".$_SESSION["userid"]."' AND iscd_id = '".@$_REQUEST['coursedetid']."'";
		$executequerycoursedet=mysqli_query($con, $querycoursedetfetch);
		$fetchcoursedet=mysqli_fetch_array($executequerycoursedet);
		
	//==========================ADD Sub Level For Course Details=======================[Done]
	
			//==========================ADD Sub Level For Videos of classes or lectures=======================[DONE]
	
	//=======ADD=============
if(@$_REQUEST['submit']=="vdoclssubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'iscd_id'=>@$_REQUEST['id'], 'videosofclasses'=>$videosofclasses,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_schools_curiculum_details_videosofcls');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="vdoclseditsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"],'videosofclasses'=>$videosofclasses, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_schools_curiculum_details_videosofcls', " ind_id='" . $_SESSION["userid"] . "' AND iscdv_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['delvidlec']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_schools_curiculum_details_videosofcls WHERE iscdv_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&schoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$queryvidclsfetch="SELECT * FROM `na_ins_schools_curiculum_details_videosofcls` WHERE ind_id='".$_SESSION["userid"]."' AND iscdv_id = '".@$_REQUEST['vidclsid']."'";
		$executequeryvidcls=mysqli_query($con, $queryvidclsfetch);
		$fetchvidcls=mysqli_fetch_array($executequeryvidcls);
		
		
		//==========================ADD Sub Level For Past Recorded Lecture Link=======================[DONE]
	
	//=======ADD=============[DONE]
if(@$_REQUEST['submit']=="lnkfrpstrecvdosubmit") {  
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'iscdv_vidcls_id'=>@$_REQUEST['id'], 'linktorecvideo'=>$linktorecvideo,'linktolivecam'=>$linktolivecam ,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_schools_curiculum_details_videosofcls_recordedlink');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="lnkfrpstrecvdoeditsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"],'linktorecvideo'=>$linktorecvideo,'linktolivecam'=>$linktolivecam,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_schools_curiculum_details_videosofcls_recordedlink', " ind_id='" . $_SESSION["userid"] . "' AND iscdvr_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========[DONE]
	if(@$_REQUEST['deltwolinks']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_schools_curiculum_details_videosofcls_recordedlink WHERE iscdvr_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&schoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$query123fetch="SELECT * FROM `na_ins_schools_curiculum_details_videosofcls_recordedlink` WHERE ind_id='".$_SESSION["userid"]."' AND iscdvr_id = '".@$_REQUEST['twolinksid']."'";
		$executequery123=mysqli_query($con, $query123fetch);
		$fetch123=mysqli_fetch_array($executequery123);
		
	//==========================ADD Sub Level For Past Recorded Lecture Link=======================[DONE]
		
		
		
	//==========================ADD Sub Level For Videos of classes or lectures=======================[DONE]
	
	
	
	//==========================ADD Sub Level For Past Recorded Lecture Link=======================[DONE]
	
	//=======ADD=============
if(@$_REQUEST['submit']=="lnkfrrecvdosubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'iscd_id'=>@$_REQUEST['id'], 'linkforvideo'=>$linkforvideo,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_schools_curiculum_details_linkforpastrecvideo');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="lnkfrrecvdoeditsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'linkforvideo'=>$linkforvideo, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_schools_curiculum_details_linkforpastrecvideo', " ind_id='" . $_SESSION["userid"] . "' AND iscdl_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['delpstlnkrecvdo']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_schools_curiculum_details_linkforpastrecvideo WHERE iscdl_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&schoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$querypstrecfetch="SELECT * FROM `na_ins_schools_curiculum_details_linkforpastrecvideo` WHERE ind_id='".$_SESSION["userid"]."' AND iscdl_id = '".@$_REQUEST['pstlnkid']."'";
		$executequerypstrec=mysqli_query($con, $querypstrecfetch);
		$fetchpstrec=mysqli_fetch_array($executequerypstrec);
		
	//==========================ADD Sub Level For Past Recorded Lecture Link=======================[Done]
	
	
	
	
	
	//==========================ADD Sub Level End=======================
	
//================Add Schools/ Divisions Ends=====================




//================Add curriculum starts=====================
if(@$_REQUEST['submit']=="curriculumsubmit") {
		extract($_POST);
		if(@$_REQUEST['curriculumdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'course'=>$course,'description'=>$description,'course_schedule'=>date('Y-m-d',strtotime($course_schedule)),'educ_institute'=>$educ_institute,'status'=>1);
			$result = insertData($data, ' na_ins_curriculum');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&curriculumpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'course'=>$course,'description'=>$description,'course_schedule'=>date('Y-m-d',strtotime($course_schedule)),'educ_institute'=>$educ_institute);
			$result = updateData($data,' na_ins_curriculum', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['curriculumdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&curriculumpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delcurriculum']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_curriculum WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&prog=1&curriculumpanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewcurriculum = getAnyTableWhereData(' na_ins_curriculum', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenscurriculumsql = "SELECT * FROM  na_ins_curriculum WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery3 = mysqli_query($con, $studenscurriculumsql) or mysqli_error();
	$stunum3 = mysqli_num_rows($resquery3);
//================Add curriculum Ends=====================
//================Add  academic Transcript starts=====================
if(@$_REQUEST['submit']=="academictranscriptssubmit") {
		extract($_POST);
		if(@$_REQUEST['academictranscriptsdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'courses_taken'=>$courses_taken,'grade'=>$grade,'status'=>1);
			$result = insertData($data, ' na_inst_academic_transcripts');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&academictranscriptspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'courses_taken'=>$courses_taken,'grade'=>$grade);
			$result = updateData($data,' na_inst_academic_transcripts', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['academictranscriptsdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&academictranscriptspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delacademictranscripts']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_inst_academic_transcripts WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&academictranscriptspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewacademictranscripts = getAnyTableWhereData(' na_inst_academic_transcripts', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensacademictranscriptssql = "SELECT * FROM  na_inst_academic_transcripts WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery4 = mysqli_query($con, $studensacademictranscriptssql) or mysqli_error();
	$stunum4 = mysqli_num_rows($resquery4);
//================Add  academic Transcript Ends=====================
//================Add  accepted substitute starts=====================
if(@$_REQUEST['submit']=="acceptedsubstitutesubmit") {
		extract($_POST);
		if(@$_REQUEST['acceptedsubstitutedid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'link_video'=>$link_video,'link_camera'=>$link_camera,'status'=>1);
			$result = insertData($data, ' na_ins_accepted_substitute');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&acceptedsubstitutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'link_video'=>$link_video,'link_camera'=>$link_camera);
			$result = updateData($data,' na_ins_accepted_substitute', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['acceptedsubstitutedid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&acceptedsubstitutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delacceptedsubstitute']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_accepted_substitute WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&prog=1&acceptedsubstitutepanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewacceptedsubstitute = getAnyTableWhereData(' na_ins_accepted_substitute', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensacceptedsubstitutesql = "SELECT * FROM  na_ins_accepted_substitute WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery5 = mysqli_query($con, $studensacceptedsubstitutesql) or mysqli_error();
	$stunum5 = mysqli_num_rows($resquery5);
//================Add  accepted substitute Ends=====================
//================ Add affiliate  accepted substitute starts=============
if(@$_REQUEST['submit']=="aff_acceptedsubstitutesubmit") {
		extract($_POST);
		if(@$_REQUEST['aff_acceptedsubstitutedid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'link_video'=>$link_video,'link_camera'=>$link_camera,'status'=>1);
			$result = insertData($data, ' na_ins_affiliate_accepted_substitute');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&aff_acceptedsubstitutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'link_video'=>$link_video,'link_camera'=>$link_camera);
			$result = updateData($data,' na_ins_affiliate_accepted_substitute', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['aff_acceptedsubstitutedid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&aff_acceptedsubstitutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delaff_acceptedsubstitute']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_affiliate_accepted_substitute WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&aff=1&aff_acceptedsubstitutepanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewaff_acceptedsubstitute = getAnyTableWhereData(' na_ins_affiliate_accepted_substitute', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensaff_acceptedsubstitutesql = "SELECT * FROM  na_ins_affiliate_accepted_substitute WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery5aff = mysqli_query($con, $studensaff_acceptedsubstitutesql) or mysqli_error();
	$stunum5aff = mysqli_num_rows($resquery5aff);
//================ Add affiliate  accepted substitute ends=============
//================ Add past lecture starts=============
if(@$_REQUEST['submit']=="aff_pastlecturessubmit") {
		extract($_POST);
		if(@$_REQUEST['aff_pastlecturesdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera,'status'=>1);
			$result = insertData($data, ' na_ins_affiliate_past_lectures');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&aff_pastlecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera);
			$result = updateData($data,' na_ins_affiliate_past_lectures', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['aff_pastlecturesdid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&aff_pastlecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delaff_pastlectures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_affiliate_past_lectures WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&aff=1&aff_pastlecturespanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewaff_pastlectures = getAnyTableWhereData(' na_ins_affiliate_past_lectures', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensaff_pastlecturessql = "SELECT * FROM  na_ins_affiliate_past_lectures WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery9aff = mysqli_query($con, $studensaff_pastlecturessql) or mysqli_error();
	$stunum9aff = mysqli_num_rows($resquery9aff);
//================ Add past lecture ends=============


//================ Add Current Student starts=============[DONE {STUDENT SECTION}]

//======================ADD AND EDIT DONE[[DONE]]===================================
if(@$_REQUEST['submit']=="cur_studentsubmit") {
		extract($_POST);
		if(@$_REQUEST['cur_studentdid']=="") {
		    $uploads_dir = 'uploads/edu_doc/';
$imageArr = array();
foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $name = $_FILES["images"]["name"][$key];
          list($txt, $ext) = explode(".", $name);
           //date_default_timezone_set ("Asia/Calcutta"); 
           $currentdate=date("d M Y");  
           $file= time().substr(str_replace(" ", "_", $txt), 0);
           $info = pathinfo($file);
 
            $filename = $file.".".$ext;
        move_uploaded_file($tmp_name, "$uploads_dir/$filename");
        array_push($imageArr,$filename);
    }
}
			$data = array('ind_id'=>$_SESSION["userid"],'current_student'=>$current_student,'past_student'=>$past_student,'past_alumni'=>$past_alumni,'image'=>json_encode($imageArr),'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_current_student');
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&stud=1&cur_studentpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'current_student'=>$current_student,'past_student'=>$past_student,'past_alumni'=>$past_alumni,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_current_student', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['cur_studentdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&stud=1&cur_studentpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete [DONE]
	if(@$_REQUEST['delcur_student']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_current_student WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&stud=1&cur_studentpanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//=============[DONE SECTION]=================
	$viewcur_student = getAnyTableWhereData('na_ins_current_student', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenscur_studentsql = "SELECT * FROM  na_ins_current_student WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery9stud = mysqli_query($con, $studenscur_studentsql) or mysqli_error();
	$stunum9stud = mysqli_num_rows($resquery9stud);
	
	
//==========================ADD Sub Level For Transcript Detsils[DONE]=======================
	
	//=======ADD=============[DONE]
if(@$_REQUEST['submit']=="stutranscriptrecordsubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'ins_current_student_id'=>@$_REQUEST['id'],'stuid'=>$stuid, 'crstaken'=>$crstaken, 'crsgrade'=>$crsgrade, 'crsattendance'=>$crsattendance, 'crsdegree'=>$crsdegree, 'crsdateconferred'=>date('Y-m-d', strtotime($crsdateconferred)), 'crstranscript'=>$crstranscript, 'crsactivitytranscript'=>$crsactivitytranscript, 'crsmisc'=>addslashes($crsmisc),'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_edu_student_transcript_record');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&cur_studentpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="stutranscriptrecordeditsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"],'stuid'=>$stuid, 'crstaken'=>$crstaken, 'crsgrade'=>$crsgrade, 'crsattendance'=>$crsattendance, 'crsdegree'=>$crsdegree, 'crsdateconferred'=>date('Y-m-d', strtotime($crsdateconferred)), 'crstranscript'=>$crstranscript, 'crsactivitytranscript'=>$crsactivitytranscript, 'crsmisc'=>addslashes($crsmisc),'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_edu_student_transcript_record', " ind_id='" . $_SESSION["userid"] . "' AND tra_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&cur_studentpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========[DONE]
	if(@$_REQUEST['deltranscript']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_edu_student_transcript_record WHERE tra_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&cur_studentpanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$querytransfetch="SELECT * FROM `na_edu_student_transcript_record` WHERE ind_id='".$_SESSION["userid"]."' AND tra_id = '".@$_REQUEST['transid']."'";
		$executequerytrans=mysqli_query($con, $querytransfetch);
		$fetchtranscript=mysqli_fetch_array($executequerytrans);
//==========================ADD Sub Level For Transcript Detsils[DONE]=======================
	
//================ Add Current Student ends=============[DONE {STUDENT SECTION}]========


//================ Add Past Student starts=============
if(@$_REQUEST['submit']=="past_studentsubmit") {
		extract($_POST);
		if(@$_REQUEST['past_studentdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'student_id'=>$student_id,'courses_taken'=>$courses_taken,'grade'=>$grade,'attendance'=>$attendance,'date'=>date('Y-m-d',strtotime($date)),'academic_transcript'=>$academic_transcript,'activity_transcript'=>$activity_transcript,'status'=>1);
			$result = insertData($data, ' na_ins_past_student');
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&stud=1&past_studentpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'student_id'=>$student_id,'courses_taken'=>$courses_taken,'grade'=>$grade,'attendance'=>$attendance,'date'=>date('Y-m-d',strtotime($date)),'academic_transcript'=>$academic_transcript,'activity_transcript'=>$activity_transcript);
			$result = updateData($data,' na_ins_past_student', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['past_studentdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&stud=1&past_studentpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs

	if(@$_REQUEST['delpast_student']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_past_student WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&stud=1&past_studentpanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewpast_student = getAnyTableWhereData(' na_ins_past_student', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenspast_studentsql = "SELECT * FROM  na_ins_past_student WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery9stud_past = mysqli_query($con, $studenspast_studentsql) or mysqli_error();
	$stunum9stud_past = mysqli_num_rows($resquery9stud_past);
//================ Add Past Student ends=============
//================ Add Past Alumni starts=============
if(@$_REQUEST['submit']=="past_alumnisubmit") {
		extract($_POST);
		if(@$_REQUEST['past_alumnidid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'student_id'=>$student_id,'courses_taken'=>$courses_taken,'grade'=>$grade,'attendance'=>$attendance,'date'=>date('Y-m-d',strtotime($date)),'academic_transcript'=>$academic_transcript,'activity_transcript'=>$activity_transcript,'status'=>1);
			$result = insertData($data, ' na_ins_past_alumni');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&stud=1&past_alumnipanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'student_id'=>$student_id,'courses_taken'=>$courses_taken,'grade'=>$grade,'attendance'=>$attendance,'date'=>date('Y-m-d',strtotime($date)),'academic_transcript'=>$academic_transcript,'activity_transcript'=>$activity_transcript);
			$result = updateData($data,' na_ins_past_alumni', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['past_alumnidid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&stud=1&past_alumnipanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs

	if(@$_REQUEST['delpast_alumni']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_past_alumni WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&stud=1&past_alumnipanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewpast_alumni = getAnyTableWhereData(' na_ins_past_alumni', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenspast_alumnisql = "SELECT * FROM  na_ins_past_alumni WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery9stud_past_al = mysqli_query($con, $studenspast_alumnisql) or mysqli_error();
	$stunum9stud_past_al = mysqli_num_rows($resquery9stud_past_al);
//================ Add Past Alumni ends=============
//================ Add Academic Transcript student starts=============

if(@$_REQUEST['submit']=="stud_academictranscriptsubmit") {
		extract($_POST);
		if(@$_REQUEST['stud_academictranscriptdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'student_id'=>$student_id,'courses_taken'=>$courses_taken,'grade'=>$grade,'attendance'=>$attendance,'date'=>date('Y-m-d',strtotime($date)),'academic_transcript'=>$academic_transcript,'activity_transcript'=>$activity_transcript,'status'=>1);

			$result = insertData($data, ' na_ins_student_academic_transcript');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&stud=1&stud_academictranscriptpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'student_id'=>$student_id,'courses_taken'=>$courses_taken,'grade'=>$grade,'attendance'=>$attendance,'date'=>date('Y-m-d',strtotime($date)),'academic_transcript'=>$academic_transcript,'activity_transcript'=>$activity_transcript);

			$result = updateData($data,' na_ins_student_academic_transcript', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['stud_academictranscriptdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&stud=1&stud_academictranscriptpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delstud_academictranscript']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_student_academic_transcript WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&stud=1&stud_academictranscriptpanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewstud_academictranscript = getAnyTableWhereData(' na_ins_student_academic_transcript', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensstud_academictranscriptsql = "SELECT * FROM  na_ins_student_academic_transcript WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery9stud_past_ac = mysqli_query($con, $studensstud_academictranscriptsql) or mysqli_error();
	$stunum9stud_past_ac = mysqli_num_rows($resquery9stud_past_ac);
//================ Add Academic Transcript student ends=============
//================ Add Marketing and Promotion starts=============
if(@$_REQUEST['submit']=="marketsubmit") {
		extract($_POST);
		if(@$_REQUEST['marketdid']=="") {
		    $uploads_dir = 'uploads/edu_doc/';
$imageArr = array();
foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $name = $_FILES["images"]["name"][$key];
          list($txt, $ext) = explode(".", $name);
           //date_default_timezone_set ("Asia/Calcutta"); 
           $currentdate=date("d M Y");  
           $file= time().substr(str_replace(" ", "_", $txt), 0);
           $info = pathinfo($file);
 
            $filename = $file.".".$ext;
        move_uploaded_file($tmp_name, "$uploads_dir/$filename");
        array_push($imageArr,$filename);
    }
}

			$data = array('ind_id'=>$_SESSION["userid"],'Advertisements'=>$Advertisements,'Marketing_Material'=>$Marketing_Material,'Commercials'=>$Commercials,'Video'=>$Video,'Infomercials'=>$Infomercials,'image'=>json_encode($imageArr),'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, ' na_ins_market');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&market=1&marketpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'Advertisements'=>$Advertisements,'Marketing_Material'=>$Marketing_Material,'Commercials'=>$Commercials,'Video'=>$Video,'Infomercials'=>$Infomercials,'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,' na_ins_market', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['marketdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&market=1&marketpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delmarket']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_market WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&market=1&marketpanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewmarket = getAnyTableWhereData(' na_ins_market', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensmarketsql = "SELECT * FROM  na_ins_market WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery9market = mysqli_query($con, $studensmarketsql) or mysqli_error();
	$stunum9market = mysqli_num_rows($resquery9market);
//================ Add Marketing and Promotion ends=============
//================Add  Course starts=====================
if(@$_REQUEST['submit']=="coursesubmit") {
		extract($_POST);
		if(@$_REQUEST['coursedid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'description'=>$description,'schedule'=>date('Y-m-d',strtotime($schedule)),'facilities'=>$facilities,'status'=>1);

			$result = insertData($data, ' na_ins_course');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&coursepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'description'=>$description,'schedule'=>date('Y-m-d',strtotime($schedule)),'facilities'=>$facilities);

			$result = updateData($data,' na_ins_course', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['coursedid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&coursepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delcourse']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_course WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&prog=1&coursepanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewcourse = getAnyTableWhereData(' na_ins_course', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenscoursesql = "SELECT * FROM  na_ins_course WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery6 = mysqli_query($con, $studenscoursesql) or mysqli_error();
	$stunum6 = mysqli_num_rows($resquery6);
//================Add  Course Ends=====================
//================Add  classes and lecturess=====================
if(@$_REQUEST['submit']=="insedusubmit") {
		extract($_POST);
		if(@$_REQUEST['insedudid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'description'=>$description,'school'=>$school,'status'=>1);
			$result = insertData($data, ' na_ins_edu');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&insedupanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'description'=>$description,'school'=>$school);
			$result = updateData($data,' na_ins_edu', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['insedudid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&insedupanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delinsedu']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_edu WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&prog=1&insedupanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewinsedu = getAnyTableWhereData(' na_ins_edu', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensinsedusql = "SELECT * FROM  na_ins_edu WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery7 = mysqli_query($con, $studensinsedusql) or mysqli_error();
	$stunum7 = mysqli_num_rows($resquery7);
//================Add  classes and lectures=====================
//================Add  Videos of classes or lectures=====================
if(@$_REQUEST['submit']=="lecturessubmit") {
		extract($_POST);
		if(@$_REQUEST['lecturesdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera,'status'=>1);
			$result = insertData($data, ' na_ins_lectures');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera);
			$result = updateData($data,' na_ins_lectures', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['lecturesdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['dellectures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_lectures WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&prog=1&lecturespanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewlectures = getAnyTableWhereData(' na_ins_lectures', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenslecturessql = "SELECT * FROM  na_ins_lectures WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery8 = mysqli_query($con, $studenslecturessql) or mysqli_error();
	$stunum8 = mysqli_num_rows($resquery8);
//================Add  Videos of classes or lectures=====================
//================Add Past Lectures starts=====================
if(@$_REQUEST['submit']=="pastlecturessubmit") {
		extract($_POST);
		if(@$_REQUEST['pastlecturesdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera,'status'=>1);
			$result = insertData($data, ' na_ins_past_lectures');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&pastlecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera);
			$result = updateData($data,' na_ins_past_lectures', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['pastlecturesdid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&prog=1&pastlecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delpastlectures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_past_lectures WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&prog=1&pastlecturespanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewpastlectures = getAnyTableWhereData(' na_ins_past_lectures', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenspastlecturessql = "SELECT * FROM  na_ins_past_lectures WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery9 = mysqli_query($con, $studenspastlecturessql) or mysqli_error();
	$stunum9 = mysqli_num_rows($resquery9);
//================Add  Past lectures ends=====================




//================Add Affiliate Schools/Divisions starts=====================
if(@$_REQUEST['submit']=="affiliateschoolssubmit") {
		extract($_POST);
		if(@$_REQUEST['affiliateschoolsdid']=="") {
		    $uploads_dir = 'uploads/edu_doc/';
$imageArr = array();
foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $name = $_FILES["images"]["name"][$key];
          list($txt, $ext) = explode(".", $name);
           //date_default_timezone_set ("Asia/Calcutta"); 
           $currentdate=date("d M Y");  
           $file= time().substr(str_replace(" ", "_", $txt), 0);
           $info = pathinfo($file);
 
            $filename = $file.".".$ext;
        move_uploaded_file($tmp_name, "$uploads_dir/$filename");
        array_push($imageArr,$filename);
    }
}
		    
			$data = array('ind_id'=>$_SESSION["userid"],'program'=>$program,'course'=>$course, 'curriculum'=>$curriculum,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_affiliate_schools');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&aff=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'program'=>$program,'course'=>$course,'curriculum'=>$curriculum,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_affiliate_schools', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['affiliateschoolsdid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delaffiliateschools']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_affiliate_schools WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&aff=1&affiliateschoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewaffiliateschools = getAnyTableWhereData('na_ins_affiliate_schools', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensaffiliateschoolssql = "SELECT * FROM na_ins_affiliate_schools WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery10aff = mysqli_query($con, $studensaffiliateschoolssql) or mysqli_error();
	$stunum10aff = mysqli_num_rows($resquery10aff);
	
		//==========================ADD Sub Level For Courses Under Curricullum=======================[DONE]
	
	//=======ADD=============[DONE]
if(@$_REQUEST['submit']=="crsisubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'ias_id'=>@$_REQUEST['id'], 'courses'=>$courses,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_affiliate_schools_curiculum_details');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="crsiedtsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'courses'=>$courses, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_affiliate_schools_curiculum_details', " ind_id='" . $_SESSION["userid"] . "' AND iascd_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========[DONE]
	if(@$_REQUEST['delcoursei']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_affiliate_schools_curiculum_details WHERE iascd_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&affiliateschoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$querypstirecfetch="SELECT * FROM `na_ins_affiliate_schools_curiculum_details` WHERE ind_id='".$_SESSION["userid"]."' AND iascd_id = '".@$_REQUEST['courseiid']."'";
		$executequerypstreci=mysqli_query($con, $querypstirecfetch);
		$fetchpstrecii=mysqli_fetch_array($executequerypstreci);
		
		
		
	//==========================ADD Sub Level For Course Details=======================[DONE]
	
	//=======ADD=============[DONE]
if(@$_REQUEST['submit']=="crsdetailsisubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'iascd_id'=>@$_REQUEST['id'], 'crs_desc'=>addslashes($crs_desc), 'crs_instructor'=>$crs_instructor,'crs_schedule'=>date('Y-m-d', strtotime($crs_schedule)), 'transferofinstitutions'=>$transferofinstitutions , 'clsandlec'=>$clsandlec , 'acceptedsuplyclasses'=>$acceptedsuplyclasses, 'pastlectures'=>$pastlectures ,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_affiliate_curricullum_course_details');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="crsdetailseditisubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'crs_desc'=>addslashes($crs_desc), 'crs_instructor'=>$crs_instructor,'crs_schedule'=>date('Y-m-d', strtotime($crs_schedule)), 'transferofinstitutions'=>$transferofinstitutions , 'clsandlec'=>$clsandlec , 'acceptedsuplyclasses'=>$acceptedsuplyclasses, 'pastlectures'=>$pastlectures, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_affiliate_curricullum_course_details', " ind_id='" . $_SESSION["userid"] . "' AND iaccd_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========[DONE]
	if(@$_REQUEST['delcoursedetailsi']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_affiliate_curricullum_course_details WHERE iaccd_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&affiliateschoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$querycoursedetifetch="SELECT * FROM `na_ins_affiliate_curricullum_course_details` WHERE ind_id='".$_SESSION["userid"]."' AND iaccd_id = '".@$_REQUEST['coursedetiid']."'";
		$executequerycoursedeti=mysqli_query($con, $querycoursedetifetch);
		$fetchcoursedeti=mysqli_fetch_array($executequerycoursedeti);
		
		
		//==========================ADD Sub Level For Videos of classes or lectures=======================[DONE]
	
	//=======ADD=============[DONE]
if(@$_REQUEST['submit']=="vdoclsisubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'iaccd_id'=>@$_REQUEST['id'], 'videosofclasses'=>$videosofclasses,'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_affiliate_schools_curiculum_details_videosofcls');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="vdoclseditisubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"],'videosofclasses'=>$videosofclasses,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_affiliate_schools_curiculum_details_videosofcls', " ind_id='" . $_SESSION["userid"] . "' AND iascdv_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========[DONE]
	if(@$_REQUEST['delvidleci']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_affiliate_schools_curiculum_details_videosofcls WHERE iascdv_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&affiliateschoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$queryvidclsfetchi="SELECT * FROM `na_ins_affiliate_schools_curiculum_details_videosofcls` WHERE ind_id='".$_SESSION["userid"]."' AND iascdv_id = '".@$_REQUEST['vidclsiid']."'";
		$executequeryividcls=mysqli_query($con, $queryvidclsfetchi);
		$fetchvidclsi=mysqli_fetch_array($executequeryividcls);
		
		//==========================ADD Sub Level For Videos of classes or lectures=======================[DONE]
		
		//==========================ADD Sub Level For Lecture Link=======================[DONE]
	
	//=======ADD=============[DONE]
if(@$_REQUEST['submit']=="lnkfrpstrecvdoisubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'iascdv_videos_id'=>@$_REQUEST['id'], 'linktorecvideo'=>$linktorecvideo, 'linktolivecam'=>$linktolivecam, 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_affiliate_schools_curiculum_details_videosofcls_recordedlink');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="lnkfrpstrecvdoeditisubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"],'linktorecvideo'=>$linktorecvideo, 'linktolivecam'=>$linktolivecam, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_affiliate_schools_curiculum_details_videosofcls_recordedlink', " ind_id='" . $_SESSION["userid"] . "' AND iascdvr_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========[DONE]
	if(@$_REQUEST['deltwolinksi']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_affiliate_schools_curiculum_details_videosofcls_recordedlink WHERE iascdvr_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&affiliateschoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$querypstrecfetchi="SELECT * FROM `na_affiliate_schools_curiculum_details_videosofcls_recordedlink` WHERE ind_id='".$_SESSION["userid"]."' AND iascdvr_id = '".@$_REQUEST['twolinksiid']."'";
		$executequerypstreci=mysqli_query($con, $querypstrecfetchi);
		$fetchpstrecik=mysqli_fetch_array($executequerypstreci);
		
	//==========================ADD Sub Level For Lecture Link=======================[DONE]
	
		
	//==========================ADD Sub Level For Course Details=======================[DONE]
	
	
	//==========================ADD Sub Level For Past Recorded Lecture Link=======================[DONE]
	
	//=======ADD=============[DONE]
if(@$_REQUEST['submit']=="lnkfrrecvdoisubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'iaccd_pastlectures_id'=>@$_REQUEST['id'], 'linkforvideo'=>$linkforvideo,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_affiliate_curricullum_details_linkforpastrecvideo');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="lnkfrrecvdoeditisubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'linkforvideo'=>$linkforvideo, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_affiliate_curricullum_details_linkforpastrecvideo', " ind_id='" . $_SESSION["userid"] . "' AND iacdl_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========[DONE]
	if(@$_REQUEST['delpstlnkrecivdo']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_affiliate_curricullum_details_linkforpastrecvideo WHERE iacdl_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&affiliateschoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$querypstrecfetchi="SELECT * FROM `na_ins_affiliate_curricullum_details_linkforpastrecvideo` WHERE ind_id='".$_SESSION["userid"]."' AND iacdl_id = '".@$_REQUEST['pstlnkiid']."'";
		$executequerypstreci=mysqli_query($con, $querypstrecfetchi);
		$fetchpstreci=mysqli_fetch_array($executequerypstreci);
		
	//==========================ADD Sub Level For Past Recorded Lecture Link=======================[DONE]
	
		
	//==========================ADD Sub Level For Courses Under Curricullum=======================[DONE]
	
	
//================Add  Affiliate Schools/Divisions ends=====================




//================Add Friends and Followers starts=====================
if(@$_REQUEST['submit']=="friendssubmit") {
		extract($_POST);
		if(@$_REQUEST['friendsdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'link'=>$link,'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_friends');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&friendspanel=1&accordionTeal=".$accordionTeal."&soc=1&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'link'=>$link,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_friends', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['friendsdid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&friendspanel=1&accordionTeal=".$accordionTeal."&soc=1&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delfriends']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_friends WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&friendspanel=1&soc=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewfriends = getAnyTableWhereData('na_ins_friends', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensfriendssql = "SELECT * FROM na_ins_friends WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery11 = mysqli_query($con, $studensfriendssql) or mysqli_error();
	$stunum11 = mysqli_num_rows($resquery11);
//================Add  Friends and Followers ends=====================
//================Add External Friends and Followers starts=====================
if(@$_REQUEST['submit']=="extfriendssubmit") {
		extract($_POST);
		if(@$_REQUEST['extfriendsdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'link'=>$link,'status'=>1);
			$result = insertData($data, 'na_ins_ext_friends');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&extfriendspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'link'=>$link);
			$result = updateData($data,'na_ins_ext_friends', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['extfriendsdid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&extfriendspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delextfriends']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_ext_friends WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&extfriendspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewextfriends = getAnyTableWhereData('na_ins_ext_friends', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensextfriendssql = "SELECT * FROM na_ins_ext_friends WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery12 = mysqli_query($con, $studensextfriendssql) or mysqli_error();
	$stunum12 = mysqli_num_rows($resquery12);
//================Add  External Friends and Followers ends=====================
//=============Affiliate Curriculum starts==============================
if(@$_REQUEST['submit']=="affiliatecurriculumsubmit") {
		extract($_POST);
		if(@$_REQUEST['affiliatecurriculumdid']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'course'=>$course,'description'=>$description,'course_schedule'=>date('Y-m-d',strtotime($course_schedule)),'educ_institute'=>$educ_institute,'status'=>1);

			$result = insertData($data, ' na_ins_affiliate_curriculum');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&affiliatecurriculumpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'course'=>$course,'description'=>$description,'course_schedule'=>date('Y-m-d',strtotime($course_schedule)),'educ_institute'=>$educ_institute);
			$result = updateData($data,' na_ins_affiliate_curriculum', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['affiliatecurriculumdid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&affiliatecurriculumpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs
	if(@$_REQUEST['delaffiliatecurriculum']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from  na_ins_affiliate_curriculum WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&aff=1&affiliatecurriculumpanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewaffiliatecurriculum = getAnyTableWhereData(' na_ins_affiliate_curriculum', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensaffiliatecurriculumsql = "SELECT * FROM  na_ins_affiliate_curriculum WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery3aff = mysqli_query($con, $studensaffiliatecurriculumsql) or mysqli_error();
	$stunum3aff = mysqli_num_rows($resquery3aff);
//=============Affiliate Curriculum ends==============================


//=============Affiliate Course starts==============================

if(@$_REQUEST['submit']=="affiliatecoursesubmit") {

		extract($_POST);

		if(@$_REQUEST['affiliatecoursedid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'description'=>$description,'schedule'=>date('Y-m-d',strtotime($schedule)),'facilities'=>$facilities,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, ' na_ins_affiliate_course');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&affiliatecoursepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'description'=>$description,'schedule'=>date('Y-m-d',strtotime($schedule)),'facilities'=>$facilities);



			//print_r($data);

			//exit();

			$result = updateData($data,' na_ins_affiliate_course', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['affiliatecoursedid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&affiliatecoursepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delaffiliatecourse']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from  na_ins_affiliate_course WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&aff=1&affiliatecoursepanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewaffiliatecourse = getAnyTableWhereData(' na_ins_affiliate_course', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensaffiliatecoursesql = "SELECT * FROM  na_ins_affiliate_course WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery6aff = mysqli_query($con, $studensaffiliatecoursesql) or mysqli_error();

	$stunum6aff = mysqli_num_rows($resquery6aff);
	

//=============Affiliate Course ends==============================

//=============Affiliate classes and lectures starts==============================

if(@$_REQUEST['submit']=="affiliateedusubmit") {

		extract($_POST);

		if(@$_REQUEST['affiliateedudid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'description'=>$description,'school'=>$school,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, ' na_ins_affiliate_edu');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&affiliateedupanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'description'=>$description,'school'=>$school);



			//print_r($data);

			//exit();

			$result = updateData($data,' na_ins_affiliate_edu', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['affiliateedudid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&affiliateedupanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delaffiliateedu']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from  na_ins_affiliate_edu WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&aff=1&affiliateedupanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewaffiliateedu = getAnyTableWhereData(' na_ins_affiliate_edu', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensaffiliateedusql = "SELECT * FROM  na_ins_affiliate_edu WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery7aff = mysqli_query($con, $studensaffiliateedusql) or mysqli_error();

	$stunum7aff = mysqli_num_rows($resquery7aff);
	

//=============Affiliate classes and lectures ends==============================

//=============Affiliate Video classes and lectures starts==============================

if(@$_REQUEST['submit']=="affiliatelecturessubmit") {

		extract($_POST);

		if(@$_REQUEST['affiliatelecturesdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, ' na_ins_affiliate_lectures');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&affiliatelecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera);



			//print_r($data);

			//exit();

			$result = updateData($data,' na_ins_affiliate_lectures', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['affiliatelecturesdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='educationalinstitute.php?operation=successful&aff=1&affiliatelecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delaffiliatelectures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from  na_ins_affiliate_lectures WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&aff=1&affiliatelecturespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewaffiliatelectures = getAnyTableWhereData(' na_ins_affiliate_lectures', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensaffiliatelecturessql = "SELECT * FROM  na_ins_affiliate_lectures WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery8aff = mysqli_query($con, $studensaffiliatelecturessql) or mysqli_error();

	$stunum8aff = mysqli_num_rows($resquery8aff);

//=============Affiliate Video classes and lectures ends==============================

//===========News and Informations Starts===================== 
	if(@$_REQUEST['submit']=="newssubmit") {
			extract($_POST);
			if(@$_REQUEST['newsid']=="") {
			    $uploads_dir = 'uploads/edu_doc/';
$imageArr = array();
foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $name = $_FILES["images"]["name"][$key];
          list($txt, $ext) = explode(".", $name);
           //date_default_timezone_set ("Asia/Calcutta"); 
           $currentdate=date("d M Y");  
           $file= time().substr(str_replace(" ", "_", $txt), 0);
           $info = pathinfo($file);
 
            $filename = $file.".".$ext;
        move_uploaded_file($tmp_name, "$uploads_dir/$filename");
        array_push($imageArr,$filename);
    }
}
				$data = array('ind_id'=>$_SESSION["userid"],'newsname'=>addslashes($newsname),'newsdescription'=>addslashes($newsdescription),'image'=>json_encode($imageArr),'linktonews'=>$linktonews,'newsdate'=>date('Y-m-d', strtotime($newsdate)), 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
				$result = insertData($data, 'na_eduins_newsandinformation');
	
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='educationalinstitute.php?operation=successful&newsainfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
				echo "</script>";
			} else {
				$data = array('ind_id'=>$_SESSION["userid"],'newsname'=>addslashes($newsname),'newsdescription'=>addslashes($newsdescription),'linktonews'=>$linktonews,'newsdate'=>date('Y-m-d', strtotime($newsdate)), 'lastedit'=>date('Y-m-d H:i:s'));
				$result = updateData($data,'na_eduins_newsandinformation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['newsid']."' ") ;
	
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='educationalinstitute.php?operation=successful&newsainfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
				echo "</script>";
			}
		} 

	//Delete News and Information
	if(@$_REQUEST['delnews']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_eduins_newsandinformation WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='educationalinstitute.php?deloperation=successful&newsainfopanel=1&accr=1';\n";
		echo "</script>";
		}
	}

	$viewnews = getAnyTableWhereData('na_eduins_newsandinformation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	
	$newssql = "SELECT * FROM na_eduins_newsandinformation WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquerynews = mysqli_query($con, $newssql) or mysqli_error();
	$stunumnews = mysqli_num_rows($resquerynews);
	//===========News and Informations Ends=====================
?>
<section id="main">
  <?php include('lib/aside.php');?>
  <section id="content">
    <div class="container">
      <div class="block-header">
        <h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span>
        	<small><?php if($view['ind'] ==1){ echo "Individual,";} if($view['std'] ==1){ echo "Student,";} if($view['edu'] ==1){ echo "Educational Institute,";} 
		if($view['edu'] ==1){echo "Instructional Facility or School";} 
		?></small></h2>
      </div>
      <div id="profile-main" class="card">
        <div class="pm-body clearfix" style="margin:0; padding:0;">
          <div class="pmb-block">
          <!--<div class="form-horizontal row">

                <div class="form-group" style="margin:0 0 20px 0;">

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
          <div>
            <h4 class="btn btn-success"><a id="gen" style="cursor:pointer; color:#FFF;">General Information </a></h4>
          </div>
          <div id="genbody" <?php if(@$_REQUEST['gen']==1 || @$_REQUEST['generalinfopanel']==1 || @$_REQUEST['schoolspanel']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>> 
          <!-- General information start -->
          <div class="panel panel-collapse"> 
          <div <?php if(@$_REQUEST['generalinfopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
            <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-generalinfo" data-parent="#accordionTeal" data-toggle="collapse" class="">Add General Information: </a> </h4>
          </div>
          <div id="accordionTeal-generalinfo" <?php if(@$_REQUEST['generalinfopanel']!='') { ?> class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel"> 
          <div class="panel-body"> 
          <div class="pmb-block p-10  m-b-0"> 
          <div class="pmbb-body p-l-0"> 
          <?php if(@$_REQUEST['editgeneralinfo']=='') { ?>
          <div class="pmbb-view">
            <ul class="actions" style="position:static; float:right;">
              <li class="dropdown open">
                &nbsp;
                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                </ul>
              </li>
            </ul>
						<?php 
                        if(@@$_REQUEST['addgeninfoinstructor']==1){
                        ?>
                        <div>
                        <form  onsubmit="return instruvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="generalinfopanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Name*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="insnamea" name="name">
                        </div>
                        <span id="errorinsnamea" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Course</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="course">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Bio and Information</dt>
                        <dd>
                        <div class="fg-line">
                        <textarea type="text" class="form-control" name="bioandinfo" id="pagedes37" cols="6" style="height:100px;"></textarea>
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="instructordetsubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function instruvalde(){
                        if($("#insnamea").val() == "" ){
                        $("#insnamea").focus();
                        $("#errorinsnamea").html("Please Enter Instructors Name");
                        return false;
                        }else{
                        $("#errorinsnamea").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php if(@@$_REQUEST['editinstructorform']==1){ ?>
                        <div>
                        <form  onsubmit="return editinstruvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="generalinfopanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['instructorid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Name*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="instrunameedit" name="name" value="<?=$fetchinstructor['name']?>">
                        </div>
                        <span id="errorinstrunameedit" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Course</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="course" value="<?=$fetchinstructor['course']?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Bio and Information</dt>
                        <dd>
                        <div class="fg-line">
                        <textarea type="text" class="form-control" name="bioandinfo" id="pagedes37" cols="6" style="height:100px;"><?=stripslashes($fetchinstructor['bioandinfo'])?></textarea>
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="editinstructorsubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function editinstruvalde(){
                        if($("#instrunameedit").val() == "" ){
                        $("#instrunameedit").focus();
                        $("#errorinstrunameedit").html("Please Enter Name");
                        return false;
                        }else{
                        $("#errorinstrunameedit").html("");
                        }
                        }
                        </script>
                        </div>
                       <?php }?>
                              
            <?php if(@@$_REQUEST['addgeninfoinstructor']!=1 && @$_REQUEST['editinstructorform']!=1) { ?>
            <dl class="dl-horizontal">
              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Informational Description </th>
                    <th>School Bulletin</th>
                    <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Instructor</button><br>Add Instructor</td>
                    <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Instructor</button><br>View Instructor</td>
                    <th>Address</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Track Date<!--(Add/Edit)--></th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                while($viewgeneralinfo = mysqli_fetch_array($resquerygeneralinfo)) {
                ?>
                  <tr>
                    <td><?=$viewgeneralinfo['name'];?></td>
                    <td><?=$viewgeneralinfo['informational_description'];?></td>
                    <td><?=$viewgeneralinfo['school_bulletin'];?></td>
                    <!--**For Add and View**-->
                    
                    <td><a href="educationalinstitute.php?generalinfopanel=1&addgeninfoinstructor=1&ind_id=<?=$viewgeneralinfo['ind_id']?>&id=<?=$viewgeneralinfo['id']?>"><img src="img/add.png" /></a></td>
                    <td><a id="instr<?php echo $viewgeneralinfo['id']?>"><img src="img/show.png" /></a></td>
                    
                    <!--**For Add and View**-->
                    <td><?=$viewgeneralinfo['address'];?></td>
                    <td><?=$viewgeneralinfo['telephone_no'];?></td>
                    <td><?=$viewgeneralinfo['email'];?></td>
                    <td><?=date('jS M Y',strtotime($viewgeneralinfo['lastedit']))?></td>
                    
                    <td><a href="educationalinstitute.php?ind_id=<?=$viewgeneralinfo['ind_id']?>&id=<?=$viewgeneralinfo['id']?>&editgeneralinfo=awards&accr=1&gen=1&generalinfopanel=1">Edit</a>&nbsp;|&nbsp;<a href="educationalinstitute.php?ind_id=<?=$viewgeneralinfo['ind_id']?>&id=<?=$viewgeneralinfo['id']?>&delgeneralinfo=val&generalinfopanel=1&gen=1" style="color:#ff0000;">Delete</a></td>
                  </tr>
                  	<!--SUB LEVEL-->
                    <tr style="display:none; background-color:#000;" id="instructor<?php echo $viewgeneralinfo['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                              	<th>Instructor Name</th>
                                                <th>Courses</th>
                                                <th>Bio and Info</th>
                                                <th>Status</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
										$sqlinstructor=mysqli_query($con, "SELECT igi.*, igii.* FROM `na_ins_general_info` as igi INNER JOIN `na_ins_general_info_instructor` as igii on igi.id=igii.igi_id WHERE igii.igi_id='".$viewgeneralinfo['id']."'");
											  while($fetchinslist=mysqli_fetch_array($sqlinstructor)){	
										?>
                                              <tr>
                                                <td><?php echo $fetchinslist['name']?></td>
                                                <td><?php echo $fetchinslist['course']?></td>
                                                <td><?=substr(stripslashes($fetchinslist['bioandinfo']),0,20)?></td>
                                                <td><?php if($fetchinslist['status'] ==1){echo"Public";} else if($fetchinslist['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                                <td><?=date('jS F Y',strtotime($fetchinslist['lastedit']))?></td>
                                                <!--EDIT AND DELETE-->
                                                <td>
                                                <a href="educationalinstitute.php?ind_id=<?=$fetchinslist['ind_id']?>&instructorid=<?=$fetchinslist['igii_id']?>&editinstructorform=1&accr=1&generalinfopanel=1">Edit</a>&nbsp;|&nbsp;
                                                <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchinslist['ind_id']?>&id=<?=$fetchinslist['igii_id']?>&delinstructor=val&generalinfopanel=1" style="color:#ff0000;">Delete</a>
                                                <!--EDIT AND DELETE-->
                                                </td>
                                              </tr>
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div>
                                      </td>
                                    </tr>
                    <!--SUB LEVEL-->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
					<script>
                    $(document).ready(function(){
                    $("#instr<?php echo $viewgeneralinfo['id']?>").click(function(){
                    $("#instructor<?php echo $viewgeneralinfo['id']?>").toggle();
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
          <form name="generalinfoform" id="generalinfoform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="generalinfopanel" value="1" />
            <input type="hidden" name="generalinfodid" value="<?=$viewgeneralinfo['id']?>" />
            <div class="pmbb-edit" style="display:block;">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Name*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control " value="<?php echo $viewgeneralinfo['name']?>" id="name" name="name" placeholder="Name">
                  </div>
                  <span id="generalinfo_error3" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Informational Description</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <textarea rows="5" cols="10" id="pagedes36" name="informational_description"  class="form-control "><?php echo $viewgeneralinfo['informational_description']?></textarea>
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">School Bulletin</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <input type='text' class="form-control " value="<?php echo $viewgeneralinfo['school_bulletin']?>" id="school_bulletin" name="school_bulletin" data-toggle="dropdown" placeholder="School Bulletin">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Address</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <input type='text' class="form-control" value="<?php echo $viewgeneralinfo['address']?>" id="address" name="address" data-toggle="dropdown" placeholder="Address">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Telephone</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="<?php echo $viewgeneralinfo['telephone_no']?>" id="telephone_no" name="telephone_no" data-toggle="dropdown" placeholder="Telephone">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Email</dt>
                <dd>
                  <div class="fg-line">
                    <input type='email' class="form-control" value="<?php echo $viewgeneralinfo['email']?>" id="email" name="email" data-toggle="dropdown" placeholder="Email">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Message</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="<?php echo $viewgeneralinfo['message']?>" id="message" name="message" data-toggle="dropdown" placeholder="Message">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">ip Address</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="<?php echo $viewgeneralinfo['ip_address']?>" id="ip_address" name="ip_address" data-toggle="dropdown" placeholder="ip Address">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Website</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="<?php echo $viewgeneralinfo['website']?>" id="website" name="website" data-toggle="dropdown" placeholder="Website">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Domain Name</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="<?php echo $viewgeneralinfo['domain_name']?>" id="domain_name" name="domain_name" data-toggle="dropdown" placeholder="Domain Name">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">URL</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="<?php echo $viewgeneralinfo['url']?>" id="url" name="url" data-toggle="dropdown" placeholder="URL">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Link to Portal</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="<?php echo $viewgeneralinfo['link_to_portal']?>" id="link_to_portal" name="link_to_portal" data-toggle="dropdown" placeholder="ink to Portal">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewgeneralinfo['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewgeneralinfo['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewgeneralinfo['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
              <div class="m-t-30">
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="generalinfosubmit">Save</button>
                <a href="" onclick="javascript:history.go(-1)">
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </a> </div>
            </div>
          </form>
          <?php } ?>
          <form name="generalinfoform" id="generalinfoform" onsubmit="return Submitgeneralinfo3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="generalinfopanel" value="1" />
            <div class="pmbb-edit">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Name*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control " value="" id="name_gi" name="name" placeholder="Name">
                  </div>
                  <span id="generalinfo_error3" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Informational Description</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <textarea rows="5" cols="10" id="pagedes36" name="informational_description"  class="form-control "></textarea>
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">School Bulletin</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <input type='text' class="form-control" value="" id="school_bulletin" name="school_bulletin" data-toggle="dropdown" placeholder="School Bulletin">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Address</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <input type='text' class="form-control" value="" id="address" name="address" data-toggle="dropdown" placeholder="Address">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Telephone</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="" id="telephone_no" name="telephone_no" data-toggle="dropdown" placeholder="Telephone">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Email</dt>
                <dd>
                  <div class="fg-line">
                    <input type='email' class="form-control" value="" id="email" name="email" data-toggle="dropdown" placeholder="Email">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Message</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="" id="message" name="message" data-toggle="dropdown" placeholder="Message">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">ip Address</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="" id="ip_address" name="ip_address" data-toggle="dropdown" placeholder="ip Address">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Website</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="" id="website" name="website" data-toggle="dropdown" placeholder="Website">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Domain Name</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="" id="domain_name" name="domain_name" data-toggle="dropdown" placeholder="Domain Name">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">URL</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="" id="url" name="url" data-toggle="dropdown" placeholder="URL">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Link to Portal</dt>
                <dd>
                  <div class="fg-line">
                    <input type='text' class="form-control" value="" id="link_to_portal" name="link_to_portal" data-toggle="dropdown" placeholder="ink to Portal">
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
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="generalinfosubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
			<script>
            function Submitgeneralinfo3(){
            if($("#name_gi").val() == "" ){
            $("#name_gi").focus();
            $("#generalinfo_error3").html("Please Enter Name");
            return false;
            }else{
            $("#generalinfo_error3").html("");
            }
            }
            </script>
        </div>
      </div>
    </div>
    </div>
    </div>
    <!-- General info end -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>
    $(document).ready(function(){
    $("#gen").click(function(){
    $("#genbody").toggle(1000);
    });
    });
    </script>
    <div>
      <h4 class="btn btn-success"><a id="prog" style="cursor:pointer; color:#FFF;">Schools & Programs</a></h4>
    </div>
    <div id="progbody"<?php if(@$_REQUEST['prog']==1 || @$_REQUEST['schoolspanel']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>> 
    <!-- Add Schools/ Divisions -->
    <div class="panel panel-collapse">
      <div <?php if(@$_REQUEST['schoolspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
        <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-2" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Schools & Programs: </a> </h4>
      </div>
     <div id="accordionTeal-2" <?php if(@$_REQUEST['schoolspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
        <div class="panel-body">
          <div class="pmb-block p-10  m-b-0">
            <div class="pmbb-body p-l-0">
              <?php if(@$_REQUEST['editschools']=='') { ?>
              <div class="pmbb-view">
                <ul class="actions" style="position:static; float:right;">
                  <li class="dropdown open">
                    &nbsp;
                    <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                      <li><a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a></li>
                    </ul>
                  </li>
                </ul>
                		<?php 
                        if(@@$_REQUEST['addcourse']==1){
                        ?>
                        <div>
                        <form  onsubmit="return crsvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Courses*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="crsname" name="crsname">
                        </div>
                        <span id="errorcrs" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="crssubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function crsvalde(){
                        if($("#crsname").val() == "" ){
                        $("#crsname").focus();
                        $("#errorcrs").html("Please Enter Course");
                        return false;
                        }else{
                        $("#errorcrs").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php if(@@$_REQUEST['editcourseform']==1){ ?>
                        <div>
                        <form  onsubmit="return editcrsvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['courseid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Courses*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="crsnameedit" name="crsname" value="<?=$fetchcourse['crsname']?>">
                        </div>
                        <span id="errorcrsname" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="editcoursesubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function editcrsvalde(){
                        if($("#crsnameedit").val() == "" ){
                        $("#crsnameedit").focus();
                        $("#errorcrsname").html("Please Enter Course");
                        return false;
                        }else{
                        $("#errorcrsname").html("");
                        }
                        }
                        </script>
                        </div>
                       <?php }?>
                       <?php 
                        if(@@$_REQUEST['addcoursedetails']==1){
                        ?>
                        <div>
                        <form  onsubmit="return crsdetvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Description*</dt>
                        <dd>
                        <div class="fg-line">
                        <textarea type="text" class="form-control" id="crsdet" cols="6" style="height:100px;" name="crs_desc"></textarea>
                        </div>
                        <span id="errorcrsdet" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Instructor</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="crs_instructor">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Course Schedule</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control date-picker" name="crs_schedule">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Transfer of Institutions</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="transferofinstitutions">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Classes and Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="clsandlec">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Accepted Classes and Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="acceptedsuplyclasses">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Past Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="pastlectures">
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="crsdetailssubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function crsdetvalde(){
                        if($("#crsdet").val() == "" ){
                        $("#crsdet").focus();
                        $("#errorcrsdet").html("Please Enter Course Details");
                        return false;
                        }else{
                        $("#errorcrsdet").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['editcourdetform']==1){
                        ?>
                        <div>
                        <form  onsubmit="return crsdetedtvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['coursedetid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Description*</dt>
                        <dd>
                        <div class="fg-line">
                        <textarea type="text" class="form-control" id="crsdetedt" cols="6" style="height:100px;" name="crs_desc"><?=$fetchcoursedet['crs_desc']?></textarea>
                        </div>
                        <span id="errorcrsdetedt" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Instructor</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="crs_instructor" value="<?=$fetchcoursedet['crs_instructor']?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Course Schedule</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control date-picker" name="crs_schedule" value="<?=date('d-m-Y', strtotime($fetchcoursedet['crs_schedule']))?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Transfer of Institutions</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="transferofinstitutions" value="<?=$fetchcoursedet['transferofinstitutions']?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Classes and Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="clsandlec" value="<?=$fetchcoursedet['clsandlec']?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Accepted Classes and Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="acceptedsuplyclasses" value="<?=$fetchcoursedet['acceptedsuplyclasses']?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Past Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="pastlectures" value="<?=$fetchcoursedet['pastlectures']?>">
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="crsdetailseditsubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function crsdetedtvalde(){
                        if($("#crsdetedt").val() == "" ){
                        $("#crsdetedt").focus();
                        $("#errorcrsdetedt").html("Please Enter Course Details");
                        return false;
                        }else{
                        $("#errorcrsdetedt").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                       
                       <?php 
                        if(@@$_REQUEST['addvideosofclasses']==1){
                        ?>
                        <div>
                        <form  onsubmit="return videoslnkvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Videos of classes*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="videosofclasses" name="videosofclasses">
                        </div>
                        <span id="errorvideosofclasses" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="vdoclssubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function videoslnkvalde(){
                        if($("#videosofclasses").val() == "" ){
                        $("#videosofclasses").focus();
                        $("#errorvideosofclasses").html("Please Enter Videos of Classes");
                        return false;
                        }else{
                        $("#errorvideosofclasses").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['editvidclsform']==1){
                        ?>
                        <div>
                        <form  onsubmit="return videoslnkeditvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['vidclsid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Videos of classes*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="editvideosofclasses" name="videosofclasses" value="<?=$fetchvidcls['videosofclasses']?>">
                        </div>
                        <span id="erroreditvideosofclasses" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="vdoclseditsubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function videoslnkeditvalde(){
                        if($("#editvideosofclasses").val() == "" ){
                        $("#editvideosofclasses").focus();
                        $("#erroreditvideosofclasses").html("Please Enter Videos of Classes");
                        return false;
                        }else{
                        $("#erroreditvideosofclasses").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['addlinkforpastlecture']==1){
                        ?>
                        <div>
                        <form  onsubmit="return pstleclnkvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link for Video*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="linkforvideo" name="linkforvideo">
                        </div>
                        <span id="errorlnkfrrecvdo" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lnkfrrecvdosubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function pstleclnkvalde(){
                        if($("#linkforvideo").val() == "" ){
                        $("#linkforvideo").focus();
                        $("#errorlnkfrrecvdo").html("Please Enter Videos Link");
                        return false;
                        }else{
                        $("#errorlnkfrrecvdo").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['editpstlnkform']==1){
                        ?>
                        <div>
                        <form  onsubmit="return editpstleclnkvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['pstlnkid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link for Past Lecture*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="editlinkforvideo" name="linkforvideo" value="<?=$fetchpstrec['linkforvideo']?>">
                        </div>
                        <span id="erroreditlnkfrrecvdo" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lnkfrrecvdoeditsubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function editpstleclnkvalde(){
                        if($("#editlinkforvideo").val() == "" ){
                        $("#editlinkforvideo").focus();
                        $("#erroreditlnkfrrecvdo").html("Please Enter Videos Link");
                        return false;
                        }else{
                        $("#erroreditlnkfrrecvdo").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['addlinkforvidclsandlec']==1){
                        ?>
                        <div>
                        <form  onsubmit="return lnkfrvidclsvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link to recorded video/audio*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="linktorecvideo" name="linktorecvideo">
                        </div>
                        <span id="errorlnktorecvdo" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link to live camera/microphone</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="linktolivecam">
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lnkfrpstrecvdosubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function lnkfrvidclsvalde(){
                        if($("#linktorecvideo").val() == "" ){
                        $("#linktorecvideo").focus();
                        $("#errorlnktorecvdo").html("Please Enter Link");
                        return false;
                        }else{
                        $("#errorlnktorecvdo").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['edittwolinksform']==1){
                        ?>
                        <div>
                        <form  onsubmit="return lnkfrtwovalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="schoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['twolinksid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link to recorded video/audio*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="editlinktorecvideo" name="linktorecvideo" value="<?=$fetch123['linktorecvideo']?>">
                        </div>
                        <span id="erroreditlnktorecvdo" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link to live camera/microphone</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="linktolivecam" value="<?=$fetch123['linktolivecam']?>">
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lnkfrpstrecvdoeditsubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function lnkfrtwovalde(){
                        if($("#editlinktorecvideo").val() == "" ){
                        $("#editlinktorecvideo").focus();
                        $("#erroreditlnktorecvdo").html("Please Enter Link");
                        return false;
                        }else{
                        $("#erroreditlnktorecvdo").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        
                       
               <?php if(@@$_REQUEST['addcourse']!=1 && @$_REQUEST['editcourseform']!=1 && @$_REQUEST['addcoursedetails']!=1 && @$_REQUEST['editcourdetform']!=1 && @$_REQUEST['addvideosofclasses']!=1 && @$_REQUEST['editvidclsform']!=1 && @$_REQUEST['addlinkforpastlecture']!=1 && @$_REQUEST['editpstlnkform']!=1 && @$_REQUEST['addlinkforvidclsandlec']!=1 && @$_REQUEST['edittwolinksform']!=1) { ?>        
                <dl class="dl-horizontal">
                  <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                    <thead>
                      <tr>
                        <th>Academic Programs</th>
                        <th>Course/Program Bulletin</th>
                        <th>Curriculum</th>
                        <th>Status</th>
                        <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Cirriculum</button><br>Add Courses</td>
                    	<td><button class="btn btn-info btn-xs" style="pointer-events: none;">Cirriculum</button><br>View Courses</td>
                        <th>Track Date(Add/Edit)</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
                    while($viewschools = mysqli_fetch_array($resquery2)) {
                    ?>
                      <tr>
                        <td><?=$viewschools['program']?></td>
                        <td><?=$viewschools['course']?></td>
                        <td><?=$viewschools['curiculum']?></td>
                        <td><?php if($viewschools['status'] ==1){echo"Public";} else if($viewschools['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                        
                        <!--**For Add and View**-->
                        <td><a href="educationalinstitute.php?schoolspanel=1&addcourse=1&ind_id=<?=$viewschools['ind_id']?>&id=<?=$viewschools['id']?>"><img src="img/add.png" /></a></td>
                    	<td><a id="curri<?php echo $viewschools['id']?>"><img src="img/show.png" /></a></td>
                        <!--**For Add and View**-->
                        <td><?=date('jS F Y',strtotime($viewschools['lastedit']))?></td>
                        
                        <td><a href="educationalinstitute.php?ind_id=<?=$viewschools['ind_id']?>&id=<?=$viewschools['id']?>&prog=1&&editschools=awards&accr=1&schoolspanel=1">Edit</a>&nbsp;|&nbsp;<a href="educationalinstitute.php?ind_id=<?=$viewschools['ind_id']?>&id=<?=$viewschools['id']?>&prog=1&delschools=val&schoolspanel=1" style="color:#ff0000;">Delete</a></td>
                      </tr>
                        <!--SUB LEVEL-->
                        <tr style="display:none; background-color:#000;" id="curriculum<?php echo $viewschools['id']?>">
                          <td colspan="10"><div style="col-sm-12">
                              <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                <thead>
                                  <tr>
                                    <th>Courses</th>
                                    <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Course</button><br>Add Details</td>
                                    <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Course</button><br>View Details</td>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                  <?php
                            $sqlcourse=mysqli_query($con, "SELECT nis.*, isc.* FROM `na_ins_schools` as nis INNER JOIN `na_ins_schools_curiculum` as isc on nis.id=isc.ins_schools_id WHERE isc.ins_schools_id='".$viewschools['id']."'");
							
                                  while($fetchcourse=mysqli_fetch_array($sqlcourse)){	
                            ?>
                                  <tr>
                                    <td><?php echo $fetchcourse['crsname']?></td>
                                    
                                    <!--For Sub of the sub level add and show-->
                                    <td><a href="educationalinstitute.php?schoolspanel=1&addcoursedetails=1&ind_id=<?=$fetchcourse['ind_id']?>&id=<?=$fetchcourse['isc_id']?>"><img src="img/add.png" /></a></td>
                                    <td><a id="coud<?php echo $fetchcourse['isc_id']?>"><img src="img/show.png" /></a></td>
                                    <!--For Sub of the sub level add and show-->
                                    <td><?=date('jS F Y',strtotime($fetchcourse['lastedit']))?></td>
                                    <!--EDIT AND DELETE-->
                                    <td>
                                    <a href="educationalinstitute.php?ind_id=<?=$fetchcourse['ind_id']?>&courseid=<?=$fetchcourse['isc_id']?>&editcourseform=1&accr=1&schoolspanel=1">Edit</a>&nbsp;|&nbsp;
                                    <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchcourse['ind_id']?>&id=<?=$fetchcourse['isc_id']?>&delcourse=val&schoolspanel=1" style="color:#ff0000;">Delete</a>
                                    <!--EDIT AND DELETE-->
                                    </td>
                                  </tr>
                                  <!--Sub of the sub level-->
                                  		<tr style="display:none; background-color:#d9a773;" id="coudetails<?php echo $fetchcourse['isc_id']?>">
                                                <td colspan="10"><div style="col-sm-12">
                                                    <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                      <thead>
                                                        <tr>
                                                      <!--<th>Description</th>
													  	  <th>Instructor</th>
                                                          <th>Course Schedule</th>-->
                                                          <th>Classes and Lectures</th>
                                                          <!--Add & View-->
                                                          <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Classes and Lectures</button><br>Add Videos Link</td>
                    									  <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Classes and Lectures</button><br>View Videos Link</td>
                                                          <!--Add & View-->
                                                          <th>Past Lectures</th>
                                                          <!--Add & View-->
                                                          <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Past Lectures</button><br>Add Videos Link</td>
                    									  <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Past Lectures</button><br>View Videos Link</td>
                                                          <!--Add & View-->
                                                          <th>Track Date(Add/Edit)</th>
                                                          <th>Action</th>
                                                        </tr>
                                                        <?php
                                            $sqlcoudet=mysqli_query($con, "SELECT isc.*, iscd.* FROM `na_ins_schools_curiculum` as isc INNER JOIN `na_ins_schools_curiculum_details` as iscd on isc.isc_id=iscd.isc_id WHERE iscd.isc_id='".$fetchcourse['isc_id']."'");
                                                  while($fetchcoudet=mysqli_fetch_array($sqlcoudet)){	
                                            	  ?>
                                                        <tr>
                                                      <!--<td><?php echo substr(stripslashes($fetchcoudet['crs_desc']),0,5)?></td>
                                                          <td><?php echo $fetchcoudet['crs_instructor']?></td>
                                                          <td><?=date('d-M-Y', strtotime($fetchcoudet['crs_schedule']))?></td>-->
                                                          <td><?php echo $fetchcoudet['clsandlec']?></td>
                                                          <!--**Add & View**[Done]-->
                                                          <td><a href="educationalinstitute.php?schoolspanel=1&addvideosofclasses=1&ind_id=<?=$fetchcoudet['ind_id']?>&id=<?=$fetchcoudet['iscd_id']?>"><img src="img/add.png" /></a></td>
                    									  <td><a id="vidcls<?php echo $fetchcoudet['iscd_id']?>"><img src="img/show.png" /></a></td>
                                                          <!--**Add & View**[Done]-->
                                                          <td><?php echo $fetchcoudet['pastlectures']?></td>
                                                          <!--**Add & View**[Done]-->
                                                          <td><a href="educationalinstitute.php?schoolspanel=1&addlinkforpastlecture=1&ind_id=<?=$fetchcoudet['ind_id']?>&id=<?=$fetchcoudet['iscd_id']?>"><img src="img/add.png"/></a></td>
                    									  <td><a id="lnkfrpstlc<?php echo $fetchcoudet['iscd_id']?>"><img src="img/show.png" /></a></td>
                                                          <!--**Add & View**[Done]-->
                                                          <td><?=date('jS F Y',strtotime($fetchcoudet['lastedit']))?></td>
                                                          
                                                          <td><a href="educationalinstitute.php?ind_id=<?=$fetchcoudet['ind_id']?>&coursedetid=<?=$fetchcoudet['iscd_id']?>&editcourdetform=1&accr=1&schoolspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchcoudet['ind_id']?>&id=<?=$fetchcoudet['iscd_id']?>&delcoursedetails=val&schoolspanel=1" style="color:#ff0000;">Delete</a></td>
                                                        </tr>
                                                        <!--**Videos of classes and lectures[Course Details]**-->
                                                        <tr style="display:none; background-color:#000;" id="videoclass<?php echo $fetchcoudet['iscd_id']?>">
                                                              <td colspan="10"><div style="col-sm-12">
                                                                  <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Videos of classes or lectures</th>
                                                                        <!--Add & View[Done]-->
                                                                        <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Videos</button><br>Add Link</td>
                                                                        <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Videos</button><br>View Link</td>
                                                                         <!--Add & View[Done]-->
                                                                         <th>Track Date(Add/Edit)</th>
                                                                        <th>Action</th>
                                                                      </tr>
                                                                      <?php
                                                                $sqlcouvide=mysqli_query($con, "SELECT iscd.*, iscdv.* FROM `na_ins_schools_curiculum_details` as iscd INNER JOIN `na_ins_schools_curiculum_details_videosofcls` as iscdv on iscd.iscd_id=iscdv.iscd_id WHERE iscdv.iscd_id='".$fetchcoudet['iscd_id']."'");
                                                                      while($fetchcouvide=mysqli_fetch_array($sqlcouvide)){	
                                                                ?>
                                                                      <tr>
                                                                        <td><?php echo $fetchcouvide['videosofclasses']?></td>
                                                                        <!--**Add & View**[Work in progress]-->
                                                          				<td><a href="educationalinstitute.php?schoolspanel=1&addlinkforvidclsandlec=1&ind_id=<?=$fetchcouvide['ind_id']?>&id=<?=$fetchcouvide['iscdv_id']?>"><img src="img/add.png" /></a></td>
                    									                <td><a id="vid123<?php echo $fetchcouvide['iscdv_id']?>"><img src="img/show.png"/></a></td>
                                                          				<!--**Add & View**[Work in progress]-->
                                                                        <td><?=date('jS F Y',strtotime($fetchcouvide['lastedit']))?></td>
                                                                        <!--EDIT AND DELETE-->
                                                                        <td>
                                                                        <a href="educationalinstitute.php?ind_id=<?=$fetchcouvide['ind_id']?>&vidclsid=<?=$fetchcouvide['iscdv_id']?>&editvidclsform=1&accr=1&schoolspanel=1">Edit</a>&nbsp;|&nbsp;
                                                                        <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchcouvide['ind_id']?>&id=<?=$fetchcouvide['iscdv_id']?>&delvidlec=val&schoolspanel=1" style="color:#ff0000;">Delete</a>
                                                                        <!--EDIT AND DELETE-->
                                                                        </td>
                                                                      </tr>
                                                                      <!--**Links Under Videos of Classes and Lectures[Work In Progress]**-->
                                                                      
                                                                      	<tr style="display:none; background-color:#000;" id="vid1234<?php echo $fetchcouvide['iscdv_id']?>">
                                                                              <td colspan="10"><div style="col-sm-12">
                                                                                  <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                                                    <thead>
                                                                                      <tr>
                                                                                        <th>Link for Video</th>
                                                                                        <th>Link for Camera</th>
                                                                                        <th>Track Date(Add/Edit)</th>
                                                                                        <th>Action</th>
                                                                                      </tr>
                                                                                      <?php
                                                                                $sqlsublink=mysqli_query($con, "SELECT iscdv.*, iscdvr.* FROM `na_ins_schools_curiculum_details_videosofcls` as iscdv INNER JOIN `na_ins_schools_curiculum_details_videosofcls_recordedlink` as iscdvr on iscdv.iscdv_id=iscdvr.iscdv_vidcls_id WHERE iscdvr.iscdv_vidcls_id='".$fetchcouvide['iscdv_id']."'");
                                                                                      while($fetchsublink=mysqli_fetch_array($sqlsublink)){	
                                                                                ?>
                                                                                      <tr>
                                                                                        <td><?php echo $fetchsublink['linktorecvideo']?></td>
                                                                                        <td><?php echo $fetchsublink['linktolivecam']?></td>
                                                                                        <td><?=date('jS F Y',strtotime($fetchsublink['lastedit']))?></td>
                                                                                        <!--EDIT AND DELETE-->
                                                                                        <td>
                                                                                        <a href="educationalinstitute.php?ind_id=<?=$fetchsublink['ind_id']?>&twolinksid=<?=$fetchsublink['iscdvr_id']?>&edittwolinksform=1&accr=1&schoolspanel=1">Edit</a>&nbsp;|&nbsp;
                                                                                        <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchsublink['ind_id']?>&id=<?=$fetchsublink['iscdvr_id']?>&deltwolinks=val&schoolspanel=1" style="color:#ff0000;">Delete</a>
                                                                                        <!--EDIT AND DELETE-->
                                                                                        </td>
                                                                                      </tr>
                                                                                      <?php }?>
                                                                                    </thead>
                                                                                  </table>
                                                                                </div>
                                                                              </td>
                                                                            </tr>
                                                                      <!--**Links Under Videos of Classes and Lectures**-->
                                                                      	<!--**Script For Toggle**-->
                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
																		<script>
                                                                        $(document).ready(function(){
                                                                        $("#vid123<?php echo $fetchcouvide['iscdv_id']?>").click(function(){
                                                                        $("#vid1234<?php echo $fetchcouvide['iscdv_id']?>").toggle();
                                                                        });
                                                                        });
                                                                        </script>	
                                                                        <!--**Script For Toggle**-->
                                                                      <?php }?>
                                                                    </thead>
                                                                  </table>
                                                                </div>
                                                              </td>
                                    						</tr>
                                                        <!--**Videos of classes and lectures[Course Details]**-->
                                                        <!--**SCRIPT**-->
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
														<script>
                                                        $(document).ready(function(){
                                                        $("#vidcls<?php echo $fetchcoudet['iscd_id']?>").click(function(){
                                                        $("#videoclass<?php echo $fetchcoudet['iscd_id']?>").toggle();
                                                        });
                                                        });
                                                        </script>
                                                        <!--**SCRIPT**-->
                                                        
                                                        <!--**Past Recorded Lecture Link[Course Details]**-->
                                                        <tr style="display:none; background-color:#000;" id="linkforpastlecture<?php echo $fetchcoudet['iscd_id']?>">
                                                              <td colspan="10"><div style="col-sm-12">
                                                                  <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Link for Past Recorded Lectures</th>
                                                                        <th>Track Date(Add/Edit)</th>
                                                                        <th>Action</th>
                                                                      </tr>
                                                                      <?php
                                                                $sqllnkfrpstcrs=mysqli_query($con, "SELECT iscd.*, iscdl.* FROM `na_ins_schools_curiculum_details` as iscd INNER JOIN `na_ins_schools_curiculum_details_linkforpastrecvideo` as iscdl on iscd.iscd_id=iscdl.iscd_id WHERE iscdl.iscd_id='".$fetchcoudet['iscd_id']."'");
                                                                      while($fetchlnkpstcrs=mysqli_fetch_array($sqllnkfrpstcrs)){	
                                                                ?>
                                                                      <tr>
                                                                        <td><?php echo $fetchlnkpstcrs['linkforvideo']?></td>
                                                                        <td><?=date('jS F Y',strtotime($fetchlnkpstcrs['lastedit']))?></td>
                                                                        
                                                                        <!--EDIT AND DELETE-->
                                                                        <td>
                                                                        <a href="educationalinstitute.php?ind_id=<?=$fetchlnkpstcrs['ind_id']?>&pstlnkid=<?=$fetchlnkpstcrs['iscdl_id']?>&editpstlnkform=1&accr=1&schoolspanel=1">Edit</a>&nbsp;|&nbsp;
                                                                        <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchlnkpstcrs['ind_id']?>&id=<?=$fetchlnkpstcrs['iscdl_id']?>&delpstlnkrecvdo=val&schoolspanel=1" style="color:#ff0000;">Delete</a>
                                                                        <!--EDIT AND DELETE-->
                                                                        </td>
                                                                      </tr>
                                                                      <?php }?>
                                                                    </thead>
                                                                  </table>
                                                                </div>
                                                              </td>
                                    						</tr>
                                                        <!--**Past Recorded Lecture Link[Course Details]**-->
                                                        <!--**SCRIPT**-->
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
														<script>
                                                        $(document).ready(function(){
                                                        $("#lnkfrpstlc<?php echo $fetchcoudet['iscd_id']?>").click(function(){
                                                        $("#linkforpastlecture<?php echo $fetchcoudet['iscd_id']?>").toggle();
                                                        });
                                                        });
                                                        </script>
                                                        <!--**SCRIPT**-->
                                                        <?php }?>
                                                      </thead>
                                                    </table>
                                                  </div>
                                                </td>
                                              </tr>
                                            <!--Script for toggle-->
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                            <script>
                                            $(document).ready(function(){
                                            $("#coud<?php echo $fetchcourse['isc_id']?>").click(function(){
                                            $("#coudetails<?php echo $fetchcourse['isc_id']?>").toggle();
                                            });
                                            });
                                            </script>
                                            <!--Script for toggle--> 
                                  <!--Sub of the sub level-->
                                  <?php }?>
                                </thead>
                              </table>
                            </div>
                          </td>
                        </tr>
                        <!--SUB LEVEL-->
                        <!--Script for toggle-->
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                        <script>
                        $(document).ready(function(){
                        $("#curri<?php echo $viewschools['id']?>").click(function(){
                        $("#curriculum<?php echo $viewschools['id']?>").toggle();
                        });
                        });
                        </script>
                        <!--Script for toggle-->                      
                      <?php }?>
                    </tbody>
                  </table>
                </dl>
                <?php }?>
              </div>
              <?php } else { ?>
              <form name="schoolsform" id="schoolsform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="schoolspanel" value="1" />
                <input type="hidden" name="schoolsdid" value="<?=$viewschools['id']?>" />
                <div class="pmbb-edit" style="display:block;">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Academic Programs*</dt>
                    <dd>
                      <div class="fg-line">
                    <select class="form-control " id="programedt" name="program">
                      <option value="">Select Your Option</option>
                      <option value="Diploma" <?php if($viewschools['program']=="Diploma"){?> selected="selected" <?php }?>>Diploma</option>
                      <option value="Certificate" <?php if($viewschools['program']=="Certificate"){?> selected="selected" <?php }?>>Certificate</option>
                      <option value="Degree" <?php if($viewschools['program']=="Degree"){?> selected="selected" <?php }?>>Degree</option>
                      <option value="Continuing Education" <?php if($viewschools['program']=="Continuing Education"){?> selected="selected" <?php }?>>Continuing Education</option>
                    </select>
                      </div>
                      <span id="prgrmerr" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Course/Program Bulletin</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewschools['course']?>" id="course" name="course" placeholder="Course/Program Bulletin">
                      </div>
                    </dd>
                  </dl>
                  
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Curriculum</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewschools['curiculum']?>" name="curiculum">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewschools['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewschools['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewschools['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                  <div class="m-t-30">
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="schoolssubmit">Save</button>
                    <a href="" onclick="javascript:history.go(-1)">
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                    </a> </div>
                </div>
              </form>
              <script>
                function check9(){
                if($("#programedt").val() == "" ){
                $("#programedt").focus();
                $("#prgrmerr").html("Please Select Programs");
                return false;
                }else{
                $("#prgrmerr").html("");
                }
                }
                </script>
              <?php } ?>
              <form name="schoolsform" id="schoolsform" onsubmit="return Submitschools3();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="schoolspanel" value="1" />
                <div class="pmbb-edit">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Academic Programs*</dt>
                    <dd>
                      <div class="fg-line">
                        <select class="form-control " id="program" name="program">
                          <option value="">Select Your Option</option>
                          <option value="Diploma">Diploma</option>
                          <option value="Certificate">Certificate</option>
                          <option value="Degree">Degree</option>
                          <option value="Continuing Education">Continuing Education</option>
                        </select>
                      </div>
                      <span id="schools_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Course/Program Bulletin</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="" id="course" name="course" placeholder="Course/Program Bulletin">
                      </div>
                    </dd>
                  </dl>
                  
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Curriculum</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control" name="curiculum">
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
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="schoolssubmit">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                  </div>
                </div>
              </form>
			  <script>
                function Submitschools3(){
                if($("#program").val() == "" ){
                $("#program").focus();
                $("#schools_error3").html("Please Enter Academic Programs");
                return false;
                }else{
                $("#schools_error3").html("");
                }
                }
                </script>
            </div>
          </div>
        </div>
      </div> 
    </div>
    <!-- Add Schools/ Divisions -->
    </div>
	<script>
    $(document).ready(function(){
    $("#prog").click(function(){
    $("#progbody").toggle(1000);
    });
    });
    </script>
    <div>
      <h4 class="btn btn-success"><a id="aff" style="cursor:pointer; color:#FFF;">Affiliate Information</a></h4>
    </div>
    <div id="affbody" <?php if(@$_REQUEST['aff']==1 || @$_REQUEST['affiliateschoolspanel']==1){?>style="display:block;"<?php }else{ ?> style="display:none;" <?php }?>> 
    <!-- Affiliate school start--->
    <div class="panel panel-collapse">
      <div <?php if(@$_REQUEST['affiliateschoolspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
        <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-2aff" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Affiliate Information: </a> </h4>
      </div>
      <div id="accordionTeal-2aff" <?php if(@$_REQUEST['affiliateschoolspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
        <div class="panel-body">
          <div class="pmb-block p-10  m-b-0">
            <div class="pmbb-body p-l-0">
              <?php if(@$_REQUEST['editaffiliateschools']=='') { ?>
              <div class="pmbb-view">
                <ul class="actions" style="position:static; float:right;">
                  <li class="dropdown open">
                    &nbsp;
                    <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                      <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                    </ul>
                  </li>
                </ul>
                
                		<?php 
                        if(@@$_REQUEST['addcurdetailsundercur']==1){
                        ?>
                        <div>
                        <form  onsubmit="return crsivalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Courses*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="crsnamei" name="courses">
                        </div>
                        <span id="errorcrsi" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="crsisubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function crsivalde(){
                        if($("#crsnamei").val() == "" ){
                        $("#crsnamei").focus();
                        $("#errorcrsi").html("Please Enter Course");
                        return false;
                        }else{
                        $("#errorcrsi").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['editcourseiform']==1){
                        ?>
                        <div>
                        <form  onsubmit="return crsiedtvalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['courseiid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Courses*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="crsnameiedt" name="courses" value="<?=$fetchpstrecii['courses']?>">
                        </div>
                        <span id="errorcrsiedt" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="crsiedtsubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function crsiedtvalde(){
                        if($("#crsnameiedt").val() == "" ){
                        $("#crsnameiedt").focus();
                        $("#errorcrsiedt").html("Please Enter Course");
                        return false;
                        }else{
                        $("#errorcrsiedt").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        <?php 
                        if(@@$_REQUEST['addcoursedetailsi']==1){
                        ?>
                        <div>
                        <form  onsubmit="return crsdetivalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Description*</dt>
                        <dd>
                        <div class="fg-line">
                        <textarea type="text" class="form-control" id="crsdeti" cols="6" style="height:100px;" name="crs_desc"></textarea>
                        </div>
                        <span id="errorcrsdeti" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Instructor</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="crs_instructor">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Course Schedule</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control date-picker" name="crs_schedule">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Transfer of Institutions</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="transferofinstitutions">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Classes and Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="clsandlec">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Accepted Classes and Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="acceptedsuplyclasses">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Past Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="pastlectures">
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="crsdetailsisubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function crsdetivalde(){
                        if($("#crsdeti").val() == "" ){
                        $("#crsdeti").focus();
                        $("#errorcrsdeti").html("Please Enter Course Details");
                        return false;
                        }else{
                        $("#errorcrsdeti").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        <?php 
                        if(@@$_REQUEST['editcourdetiform']==1){
                        ?>
                        <div>
                        <form  onsubmit="return crsdetedtivalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['coursedetiid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Description*</dt>
                        <dd>
                        <div class="fg-line">
                        <textarea type="text" class="form-control" id="crsdetedti" cols="6" style="height:100px;" name="crs_desc"><?=$fetchcoursedeti['crs_desc']?></textarea>
                        </div>
                        <span id="errorcrsdetedti" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Instructor</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="crs_instructor" value="<?=$fetchcoursedeti['crs_instructor']?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Course Schedule</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control date-picker" name="crs_schedule" value="<?=date('d-m-Y', strtotime($fetchcoursedeti['crs_schedule']))?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Transfer of Institutions</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="transferofinstitutions" value="<?=$fetchcoursedeti['transferofinstitutions']?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Classes and Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="clsandlec" value="<?=$fetchcoursedeti['clsandlec']?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Accepted Classes and Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="acceptedsuplyclasses" value="<?=$fetchcoursedeti['acceptedsuplyclasses']?>">
                        </div>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Past Lectures</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="pastlectures" value="<?=$fetchcoursedeti['pastlectures']?>">
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="crsdetailseditisubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function crsdetedtivalde(){
                        if($("#crsdetedti").val() == "" ){
                        $("#crsdetedti").focus();
                        $("#errorcrsdetedti").html("Please Enter Course Details");
                        return false;
                        }else{
                        $("#errorcrsdetedti").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
						<?php 
                        if(@@$_REQUEST['addvideosofclassesi']==1){
                        ?>
                        <div>
                        <form  onsubmit="return videoslnkivalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Videos of classes*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="videosofclassesi" name="videosofclasses">
                        </div>
                        <span id="errorvideosofclassesi" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="vdoclsisubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function videoslnkivalde(){
                        if($("#videosofclassesi").val() == "" ){
                        $("#videosofclassesi").focus();
                        $("#errorvideosofclassesi").html("Please Enter Videos of Classes");
                        return false;
                        }else{
                        $("#errorvideosofclassesi").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['editvidclsiform']==1){
                        ?>
                        <div>
                        <form  onsubmit="return videoslnkeditivalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['vidclsiid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Videos of classes*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="editvideosofclassesi" name="videosofclasses" value="<?=$fetchvidclsi['videosofclasses']?>">
                        </div>
                        <span id="erroreditvideosofclassesi" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="vdoclseditisubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function videoslnkeditivalde(){
                        if($("#editvideosofclassesi").val() == "" ){
                        $("#editvideosofclassesi").focus();
                        $("#erroreditvideosofclassesi").html("Please Enter Videos of Classes");
                        return false;
                        }else{
                        $("#erroreditvideosofclassesi").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        <!---->
                        <?php 
                        if(@@$_REQUEST['addlinkforvidclsandleci']==1){
                        ?>
                        <div>
                        <form  onsubmit="return lnkfrvidclsivalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link to recorded video/audio*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="linktorecvideoi" name="linktorecvideo">
                        </div>
                        <span id="errorlnktorecvdoi" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link to live camera/microphone</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="linktolivecam">
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lnkfrpstrecvdoisubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function lnkfrvidclsivalde(){
                        if($("#linktorecvideoi").val() == ""){
                        $("#linktorecvideoi").focus();
                        $("#errorlnktorecvdoi").html("Please Enter Link");
                        return false;
                        }else{
                        $("#errorlnktorecvdoi").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['edittwolinksiform']==1){
                        ?>
                        <div>
                        <form  onsubmit="return lnkfrtwoivalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['twolinksiid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link to recorded video/audio*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="editlinktorecvideoi" name="linktorecvideo" value="<?=$fetchpstrecik['linktorecvideo']?>">
                        </div>
                        <span id="erroreditlnktorecvdoi" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link to live camera/microphone</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" name="linktolivecam" value="<?=$fetchpstrecik['linktolivecam']?>">
                        </div>
                        </dl>
                        
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lnkfrpstrecvdoeditisubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function lnkfrtwoivalde(){
                        if($("#editlinktorecvideoi").val() == "" ){
                        $("#editlinktorecvideoi").focus();
                        $("#erroreditlnktorecvdoi").html("Please Enter Link");
                        return false;
                        }else{
                        $("#erroreditlnktorecvdoi").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        <!---->
                        <?php 
                        if(@@$_REQUEST['addlinkforpastlecturei']==1){
                        ?>
                        <div>
                        <form  onsubmit="return pstleclnkivalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link for Video*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="linkforvideoi" name="linkforvideo">
                        </div>
                        <span id="errorlnkfrrecvdoi" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lnkfrrecvdoisubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function pstleclnkivalde(){
                        if($("#linkforvideoi").val() == "" ){
                        $("#linkforvideoi").focus();
                        $("#errorlnkfrrecvdoi").html("Please Enter Videos Link");
                        return false;
                        }else{
                        $("#errorlnkfrrecvdoi").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                        
                        <?php 
                        if(@@$_REQUEST['editpstlnkiform']==1){
                        ?>
                        <div>
                        <form  onsubmit="return editpstleclnkivalde();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                        <input type="hidden" name="affiliateschoolspanel" value="1" />
                        <input type="hidden" name="id" value="<?=@$_REQUEST['pstlnkiid']?>" />
                        <dl class="dl-horizontal">
                        <dt class="p-t-10">Link for Past Lecture*</dt>
                        <dd>
                        <div class="fg-line">
                        <input type="text" class="form-control" id="editlinkforvideoi" name="linkforvideo" value="<?=$fetchpstreci['linkforvideo']?>">
                        </div>
                        <span id="erroreditlnkfrrecvdoi" style="color:#ff0000;">&nbsp;</span> </dd>
                        </dl>
                        <div class="m-t-30">
                        <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lnkfrrecvdoeditisubmit">Save</button>
                        <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                        </div>
                        </form>
                        <script>
                        function editpstleclnkivalde(){
                        if($("#editlinkforvideoi").val() == "" ){
                        $("#editlinkforvideoi").focus();
                        $("#erroreditlnkfrrecvdoi").html("Please Enter Videos Link");
                        return false;
                        }else{
                        $("#erroreditlnkfrrecvdoi").html("");
                        }
                        }
                        </script>
                        </div>
                        <?php }?>
                
                
                <?php if(@@$_REQUEST['addcurdetailsundercur']!=1 && @$_REQUEST['editcourseiform']!=1 && @$_REQUEST['addcoursedetailsi']!=1 && @$_REQUEST['editcourdetiform']!=1 && @$_REQUEST['addvideosofclassesi']!=1 && @$_REQUEST['editvidclsiform']!=1 && @$_REQUEST['addlinkforvidclsandleci']!=1 && @$_REQUEST['edittwolinksiform']!=1 && @$_REQUEST['addlinkforpastlecturei']!=1 && @$_REQUEST['editpstlnkiform']!=1) { ?> 
                <dl class="dl-horizontal">
                  <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                    <thead>
                      <tr>
                        <th>Academic Programs</th>
                        <th>Course/Program Bulletin</th>
                        <th>Curricullum</th>
                        <th>Status</th>
                        <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Curricullum</button><br>Add Course</td>
                        <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Curricullum</button><br>View Course</td>
                        <th>Track Date(Add/Edit)</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
						while($viewaffiliateschools = mysqli_fetch_array($resquery10aff)) {
					  ?>
                      <tr>
                        <td><?=$viewaffiliateschools['program'];?></td>
                        <td><?=$viewaffiliateschools['course'];?></td>
                        <td><?=$viewaffiliateschools['curriculum'];?></td>
                        <td><?php if($viewaffiliateschools['status'] ==1){echo"Public";} else if($viewaffiliateschools['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                        
                        <!--**For Add and View Under Curricullum**-->
                        <td><a href="educationalinstitute.php?affiliateschoolspanel=1&addcurdetailsundercur=1&ind_id=<?=$viewaffiliateschools['ind_id']?>&id=<?=$viewaffiliateschools['id']?>"><img src="img/add.png" /></a></td>
                    	<td><a id="curricul<?php echo $viewaffiliateschools['id']?>"><img src="img/show.png"/></a></td>
                        <!--**For Add and View Under Curricullum**-->
                        <td><?=date('jS F Y',strtotime($viewaffiliateschools['lastedit']))?></td>
                        
                        <td><a href="educationalinstitute.php?ind_id=<?=$viewaffiliateschools['ind_id']?>&id=<?=$viewaffiliateschools['id']?>&aff=1&&editaffiliateschools=awards&accr=1&affiliateschoolspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$viewaffiliateschools['ind_id']?>&id=<?=$viewaffiliateschools['id']?>&prog=1&delaffiliateschools=val&affiliateschoolspanel=1" style="color:#ff0000;">Delete</a></td>
                      </tr>
                      <!--SUB LEVEL-->
                      <tr style="display:none; background-color:#000;" id="curriculumaa<?php echo $viewaffiliateschools['id']?>">
                          <td colspan="10"><div style="col-sm-12">
                              <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                <thead>
                                  <tr>
                                    <th>Courses</th>
                                    <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Course</button><br>Add Details</td>
                                    <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Course</button><br>View Details</td>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                  <?php
                            $sqlcoursei=mysqli_query($con, "SELECT ias.*, iascd.* FROM `na_ins_affiliate_schools` as ias INNER JOIN `na_ins_affiliate_schools_curiculum_details` as iascd on ias.id=iascd.ias_id WHERE iascd.ias_id='".$viewaffiliateschools['id']."'");
							
                                  while($fetchcoursei=mysqli_fetch_array($sqlcoursei)){	
                            ?>
                                  <tr>
                                    <td><?php echo $fetchcoursei['courses']?></td>
                                    
                                    <!--For Sub of the sub level add and show-->
                                    <td><a href="educationalinstitute.php?affiliateschoolspanel=1&addcoursedetailsi=1&ind_id=<?=$fetchcoursei['ind_id']?>&id=<?=$fetchcoursei['iascd_id']?>"><img src="img/add.png" /></a></td>
                                    <td><a id="coudi<?php echo $fetchcoursei['iascd_id']?>"><img src="img/show.png" /></a></td>
                                    <!--For Sub of the sub level add and show-->
                                    <td><?=date('jS F Y',strtotime($fetchcoursei['lastedit']))?></td>
                                    
                                    <!--EDIT AND DELETE-->
                                    <td>
                                    <a href="educationalinstitute.php?ind_id=<?=$fetchcoursei['ind_id']?>&courseiid=<?=$fetchcoursei['iascd_id']?>&editcourseiform=1&accr=1&affiliateschoolspanel=1">Edit</a>&nbsp;|&nbsp;
                                    <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchcoursei['ind_id']?>&id=<?=$fetchcoursei['iascd_id']?>&delcoursei=val&affiliateschoolspanel=1" style="color:#ff0000;">Delete</a>
                                    <!--EDIT AND DELETE-->
                                    </td>
                                  </tr>
									<!--****WORK ONGOING[16-08-2016]****-->
                                    	<!--Sub of the sub level-->
                                  		<tr style="display:none; background-color:#d9a773;" id="coudetailsi<?php echo $fetchcoursei['iascd_id']?>">
                                                <td colspan="10"><div style="col-sm-12">
                                                    <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                      <thead>
                                                        <tr>
                                                      <!--<th>Description</th>
													  	  <th>Instructor</th>
                                                          <th>Course Schedule</th>-->
                                                          <th>Classes and Lectures</th>
                                                          <!--Add & View-->
                                                          <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Classes and Lectures</button><br>Add Videos Link</td>
                    									  <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Classes and Lectures</button><br>View Videos Link</td>
                                                          <!--Add & View-->
                                                          <th>Past Lectures</th>
                                                          <!--Add & View-->
                                                          <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Past Lectures</button><br>Add Videos Link</td>
                    									  <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Past Lectures</button><br>View Videos Link</td>
                                                          <!--Add & View-->
                                                          <th>Track Date(Add/Edit)</th>
                                                          <th>Action</th>
                                                        </tr>
                                                        <?php
                                            	$sqlcoudeti=mysqli_query($con, "SELECT iascd.*, iaccd.* FROM `na_ins_affiliate_schools_curiculum_details` as iascd INNER JOIN `na_ins_affiliate_curricullum_course_details` as iaccd on iascd.iascd_id=iaccd.iascd_id WHERE iaccd.iascd_id='".$fetchcoursei['iascd_id']."'");
                                                  while($fetchcoudeti=mysqli_fetch_array($sqlcoudeti)){	
                                            	  ?>
                                                        <tr>
                                                      <!--<td><?php echo substr(stripslashes($fetchcoudet['crs_desc']),0,5)?></td>
                                                          <td><?php echo $fetchcoudet['crs_instructor']?></td>
                                                          <td><?=date('d-M-Y', strtotime($fetchcoudet['crs_schedule']))?></td>-->
                                                          <td><?php echo $fetchcoudeti['clsandlec']?></td>
                                                          <!--**Add & View**[DONE]-->
                                                          <td><a href="educationalinstitute.php?affiliateschoolspanel=1&addvideosofclassesi=1&ind_id=<?=$fetchcoudeti['ind_id']?>&id=<?=$fetchcoudeti['iaccd_id']?>"><img src="img/add.png" /></a></td>
                    									  <td><a id="vidclsi<?php echo $fetchcoudeti['iaccd_id']?>"><img src="img/show.png" /></a></td>
                                                          <!--**Add & View**[DONE]-->
                                                          <td><?php echo $fetchcoudeti['pastlectures']?></td>
                                                          <!--**Add & View**[DONE]-->
                                                          <td><a href="educationalinstitute.php?affiliateschoolspanel=1&addlinkforpastlecturei=1&ind_id=<?=$fetchcoudeti['ind_id']?>&id=<?=$fetchcoudeti['iaccd_id']?>"><img src="img/add.png"/></a></td>
                    									  <td><a id="lnkfrpstlci<?php echo $fetchcoudeti['iaccd_id']?>"><img src="img/show.png" /></a></td>
                                                          <!--**Add & View**[DONE]-->
                                                          <td><?=date('jS F Y',strtotime($fetchcoudeti['lastedit']))?></td>
                                                          
                                                          <td><a href="educationalinstitute.php?ind_id=<?=$fetchcoudeti['ind_id']?>&coursedetiid=<?=$fetchcoudeti['iaccd_id']?>&editcourdetiform=1&accr=1&affiliateschoolspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchcoudeti['ind_id']?>&id=<?=$fetchcoudeti['iaccd_id']?>&delcoursedetailsi=val&affiliateschoolspanel=1" style="color:#ff0000;">Delete</a></td>
                                                        </tr>
                                                        <!--**Videos of classes and lectures[Course Details][DONE]**-->
                                                        <tr style="display:none; background-color:#000;" id="videoclassi<?php echo $fetchcoudeti['iaccd_id']?>">
                                                              <td colspan="10"><div style="col-sm-12">
                                                                  <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Videos of classes or lectures</th>
                                                                        <!--Add & View[DONE]-->
                                                                        <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Videos</button><br>Add Link</td>
                                                                        <td><button class="btn btn-info btn-xs" style="pointer-events: none;">Videos</button><br>View Link</td>
                                                                         <!--Add & View[DONE]-->
                                                                         <th>Track Date(Add/Edit)</th>
                                                                        <th>Action</th>
                                                                      </tr>
                                                                      <?php
                                                                $sqlcouvidei=mysqli_query($con, "SELECT iaccd.*, iascdv.* FROM `na_ins_affiliate_curricullum_course_details` as iaccd INNER JOIN `na_ins_affiliate_schools_curiculum_details_videosofcls` as iascdv on iaccd.iaccd_id=iascdv.iaccd_id WHERE iascdv.iaccd_id='".$fetchcoudeti['iaccd_id']."'");
                                                                      while($fetchcouvidei=mysqli_fetch_array($sqlcouvidei)){	
                                                                ?>
                                                                      <tr>
                                                                        <td><?php echo $fetchcouvidei['videosofclasses']?></td>
                                                                        
                                                                        <!--**Add & View**[DONE]-->
                                                          				<td><a href="educationalinstitute.php?affiliateschoolspanel=1&addlinkforvidclsandleci=1&ind_id=<?=$fetchcouvidei['ind_id']?>&id=<?=$fetchcouvidei['iascdv_id']?>"><img src="img/add.png" /></a></td>
                    									                <td><a id="vid12345<?php echo $fetchcouvidei['iascdv_id']?>"><img src="img/show.png"/></a></td>
                                                          				<!--**Add & View**[DONE]-->
                                                                        <td><?=date('jS F Y',strtotime($fetchcouvidei['lastedit']))?></td>
                                                                        
                                                                        <!--EDIT AND DELETE-->
                                                                        <td>
                                                                        <a href="educationalinstitute.php?ind_id=<?=$fetchcouvidei['ind_id']?>&vidclsiid=<?=$fetchcouvidei['iascdv_id']?>&editvidclsiform=1&accr=1&affiliateschoolspanel=1">Edit</a>&nbsp;|&nbsp;
                                                                        <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchcouvidei['ind_id']?>&id=<?=$fetchcouvidei['iascdv_id']?>&delvidleci=val&affiliateschoolspanel=1" style="color:#ff0000;">Delete</a>
                                                                        <!--EDIT AND DELETE-->
                                                                        </td>
                                                                      </tr>
                                                                      <!--**Links Under Videos of Classes and Lectures[DONE]**-->
                                                                      	<tr style="display:none; background-color:#000;" id="vid123456<?php echo $fetchcouvidei['iascdv_id']?>">
                                                                              <td colspan="10"><div style="col-sm-12">
                                                                                  <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                                                    <thead>
                                                                                      <tr>
                                                                                        <th>Link for Video</th>
                                                                                        <th>Link for Camera</th>
                                                                                        <th>Track Date(Add/Edit)</th>
                                                                                        <th>Action</th>
                                                                                      </tr>
                                                                                      <?php
                                                                                $sqlsublinki=mysqli_query($con, "SELECT iascdv.*, ascdvr.* FROM `na_ins_affiliate_schools_curiculum_details_videosofcls` as iascdv INNER JOIN `na_affiliate_schools_curiculum_details_videosofcls_recordedlink` as ascdvr on iascdv.iascdv_id=ascdvr.iascdv_videos_id WHERE ascdvr.iascdv_videos_id='".$fetchcouvidei['iascdv_id']."'");
                                                                                      while($fetchsublinki=mysqli_fetch_array($sqlsublinki)){	
                                                                                ?>
                                                                                      <tr>
                                                                                        <td><?php echo $fetchsublinki['linktorecvideo']?></td>
                                                                                        <td><?php echo $fetchsublinki['linktolivecam']?></td>
                                                                                        <td><?=date('jS F Y',strtotime($fetchsublinki['lastedit']))?></td>
                                                                                        <!--EDIT AND DELETE-->
                                                                                        <td>
                                                                                        <a href="educationalinstitute.php?ind_id=<?=$fetchsublinki['ind_id']?>&twolinksiid=<?=$fetchsublinki['iascdvr_id']?>&edittwolinksiform=1&accr=1&affiliateschoolspanel=1">Edit</a>&nbsp;|&nbsp;
                                                                                        <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchsublinki['ind_id']?>&id=<?=$fetchsublinki['iascdvr_id']?>&deltwolinksi=val&affiliateschoolspanel=1" style="color:#ff0000;">Delete</a>
                                                                                        <!--EDIT AND DELETE-->
                                                                                        </td>
                                                                                      </tr>
                                                                                      <?php }?>
                                                                                    </thead>
                                                                                  </table>
                                                                                </div>
                                                                              </td>
                                                                            </tr>
                                                                      <!--**Links Under Videos of Classes and Lectures[Work In Progress]**-->
                                                                      	<!--**Script For Toggle**-->
                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
																		<script>
                                                                        $(document).ready(function(){
                                                                        $("#vid12345<?php echo $fetchcouvidei['iascdv_id']?>").click(function(){
                                                                        $("#vid123456<?php echo $fetchcouvidei['iascdv_id']?>").toggle();
                                                                        });
                                                                        });
                                                                        </script>	
                                                                        <!--**Script For Toggle**-->
                                                                      <?php }?>
                                                                    </thead>
                                                                  </table>
                                                                </div>
                                                              </td>
                                    						</tr>
                                                        <!--**Videos of classes and lectures[Course Details][DONE]**-->
                                                        <!--**SCRIPT**-->
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
														<script>
                                                        $(document).ready(function(){
                                                        $("#vidclsi<?php echo $fetchcoudeti['iaccd_id']?>").click(function(){
                                                        $("#videoclassi<?php echo $fetchcoudeti['iaccd_id']?>").toggle();
                                                        });
                                                        });
                                                        </script>
                                                        <!--**SCRIPT**-->
                                                        
                                                        <!--**Past Recorded Lecture Link[Course Details]**-->
                                                        <tr style="display:none; background-color:#000;" id="linkforpastlecturei<?php echo $fetchcoudeti['iaccd_id']?>">
                                                              <td colspan="10"><div style="col-sm-12">
                                                                  <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                                    <thead>
                                                                      <tr>
                                                                        <th>Link for Past Recorded Lectures</th>
                                                                        <th>Track Date(Add/Edit)</th>
                                                                        <th>Action</th>
                                                                      </tr>
                                                                      <?php
                                                                $sqllnkfrpstcrsi=mysqli_query($con, "SELECT iaccd.*, iascdl.* FROM `na_ins_affiliate_curricullum_course_details` as iaccd INNER JOIN `na_ins_affiliate_curricullum_details_linkforpastrecvideo` as iascdl on iaccd.iaccd_id=iascdl.iaccd_pastlectures_id WHERE iascdl.iaccd_pastlectures_id='".$fetchcoudeti['iaccd_id']."'");
                                                                      while($fetchlnkpstcrsi=mysqli_fetch_array($sqllnkfrpstcrsi)){	
                                                                ?>
                                                                      <tr>
                                                                        <td><?php echo $fetchlnkpstcrsi['linkforvideo']?></td>
                                                                        <td><?=date('jS F Y',strtotime($fetchlnkpstcrsi['lastedit']))?></td>
                                                                        <!--EDIT AND DELETE-->
                                                                        <td>
                                                                        <a href="educationalinstitute.php?ind_id=<?=$fetchlnkpstcrsi['ind_id']?>&pstlnkiid=<?=$fetchlnkpstcrsi['iacdl_id']?>&editpstlnkiform=1&accr=1&affiliateschoolspanel=1">Edit</a>&nbsp;|&nbsp;
                                                                        <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchlnkpstcrsi['ind_id']?>&id=<?=$fetchlnkpstcrsi['iacdl_id']?>&delpstlnkrecivdo=val&affiliateschoolspanel=1" style="color:#ff0000;">Delete</a>
                                                                        <!--EDIT AND DELETE-->
                                                                        </td>
                                                                      </tr>
                                                                      <?php }?>
                                                                    </thead>
                                                                  </table>
                                                                </div>
                                                              </td>
                                    						</tr>
                                                        <!--**Past Recorded Lecture Link[Course Details]**-->
                                                        <!--**SCRIPT**-->
                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
														<script>
                                                        $(document).ready(function(){
                                                        $("#lnkfrpstlci<?php echo $fetchcoudeti['iaccd_id']?>").click(function(){
                                                        $("#linkforpastlecturei<?php echo $fetchcoudeti['iaccd_id']?>").toggle();
                                                        });
                                                        });
                                                        </script>
                                                        <!--**SCRIPT**-->
                                                        <?php }?>
                                                      </thead>
                                                    </table>
                                                  </div>
                                                </td>
                                              </tr>
                                            <!--Script for toggle-->
                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                            <script>
                                            $(document).ready(function(){
                                            $("#coudi<?php echo $fetchcoursei['iascd_id']?>").click(function(){
                                            $("#coudetailsi<?php echo $fetchcoursei['iascd_id']?>").toggle();
                                            });
                                            });
                                            </script>
                                            <!--Script for toggle--> 
                                  <!--Sub of the sub level-->
                                    <!--****WORK ONGOING[16-08-2016]****-->
                                  <?php }?>
                                </thead>
                              </table>
                            </div>
                          </td>
                        </tr>
                      <!--SUB LEVEL-->
                      <!--Script for toggle-->
					  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                      <script>
                      $(document).ready(function(){
                      $("#curricul<?php echo $viewaffiliateschools['id']?>").click(function(){
                      $("#curriculumaa<?php echo $viewaffiliateschools['id']?>").toggle();
                      });
                      });
                    </script>
                    <!--Script for toggle-->
                      <?php } ?>
                    </tbody>
                  </table>
                </dl>
                <?php }?>
              </div>
              <?php } else { ?>
              <form name="affiliateschoolsform" id="affiliateschoolsform" onsubmit="return correctionediti();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="affiliateschoolspanel" value="1" />
                <input type="hidden" name="affiliateschoolsdid" value="<?=$viewaffiliateschools['id']?>" />
                <div class="pmbb-edit" style="display:block;">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Academic Programs*</dt>
                    <dd>
                      <div class="fg-line">
								
                        <select class="form-control " id="programedit" name="program">
                        <option value="">Select Your Option</option>
                        <option value="Diploma" <?php if($viewaffiliateschools['program']=="Diploma"){?> selected="selected" <?php }?>>Diploma</option>
                        <option value="Certificate" <?php if($viewaffiliateschools['program']=="Certificate"){?> selected="selected" <?php }?>>Certificate</option>
                        <option value="Degree" <?php if($viewaffiliateschools['program']=="Degree"){?> selected="selected" <?php }?>>Degree</option>
                        <option value="Continuing Education" <?php if($viewaffiliateschools['program']=="Continuing Education"){?> selected="selected" <?php }?>>Continuing Education</option>
                        </select>
                      </div>
                      <span id="errorrectifyi" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Course/Program Bulletin</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewaffiliateschools['course']?>" id="course" name="course" placeholder="Course/Program Bulletin">
                      </div>
                    </dd>
                  </dl>
                  
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Curriculum</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewaffiliateschools['curriculum']?>" name="curriculum">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewaffiliateschools['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewaffiliateschools['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewaffiliateschools['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                  <div class="m-t-30">
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="affiliateschoolssubmit">Save</button>
                    <a href="" onclick="javascript:history.go(-1)">
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                    </a> </div>
                </div>
              </form>
			  <script>
                function correctionediti(){
                if($("#programedit").val() == "" ){
                $("#programedit").focus();
                $("#errorrectifyi").html("Please Select Academic Programs");
                return false;
                }else{
                $("#errorrectifyi").html("");
                }
                }
                </script>
              <?php } ?>
              <form name="affiliateschoolsform" id="affiliateschoolsform"  enctype="multipart/form-data" onsubmit="return correctsubmit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="affiliateschoolspanel" value="1" />
                <div class="pmbb-edit">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Academic Programs*</dt>
                    <dd>
                      <div class="fg-line">
                        <select class="form-control " id="programee" name="program">
                          <option value="">Select Your Option</option>
                          <option value="Diploma">Diploma</option>
                          <option value="Certificate">Certificate</option>
                          <option value="Degree">Degree</option>
                          <option value="Continuing Education">Continuing Education</option>
                        </select>
                      </div>
                      <span id="errorcorrection" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Course/Program Bulletin</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="" id="course" name="course" placeholder="Course/Program Bulletin">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Curriculum</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control" name="curriculum">
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
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="affiliateschoolssubmit">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                  </div>
                </div>
              </form>
              <script>
				function correctsubmit(){
					if($("#programee").val() == "" ){
						$("#programee").focus();
						$("#errorcorrection").html("Please Select Academic Programs");
						return false;
					}else{
						$("#errorcorrection").html("");
					}
				}
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Affiliate school end--->
    </div>
	<script>
    $(document).ready(function(){
    $("#aff").click(function(){
    $("#affbody").toggle(1000);
    });
    });
    </script>
    <div>
      <h4 class="btn btn-success"><a id="stud" style="cursor:pointer; color:#FFF;">Students:</a></h4>
    </div>
    <div id="studbody" <?php if(@$_REQUEST['aff']==1 || @$_REQUEST['cur_studentpanel']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>> 
    <!----   Current Student starts  ----->
    <div class="panel panel-collapse">
      <div <?php if(@$_REQUEST['cur_studentpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
        <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-cur_student" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Current Students: </a> </h4>
      </div>
      <div id="accordionTeal-cur_student" <?php if(@$_REQUEST['cur_studentpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
        <div class="panel-body">
          <div class="pmb-block p-10  m-b-0">
            <div class="pmbb-body p-l-0">
              <?php if(@$_REQUEST['editcur_student']=='') { ?>
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
				if(@@$_REQUEST['addtranscriptrecord']==1){
				?>
				<div>
				<form  onsubmit="return transcriptformvalidate();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<input type="hidden" name="cur_studentpanel" value="1" />
				<input type="hidden" name="id" value="<?=@$_REQUEST['id']?>" />
				<dl class="dl-horizontal">
				<dt class="p-t-10">Student ID No*</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" id="stuid" name="stuid">
				</div>
				<span id="errorstuid" style="color:#ff0000;">&nbsp;</span> </dd>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Courses Taken</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crstaken">
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Grade</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crsgrade">
				</div>
				</dl>
                
                <dl class="dl-horizontal">
				<dt class="p-t-10">Attendance</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crsattendance">
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Degree Conferred</dt>
				<dd>
				<div class="fg-line">
                <select class="form-control" name="crsdegree">
                    <option value="">Select Your Option</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Certificate">Certificate</option>
                    <option value="Degree">Degree</option>
                </select>
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Date Conferred</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control date-picker" name="crsdateconferred">
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Academic Transcripts</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crstranscript">
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Activity Transcripts</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crsactivitytranscript">
				</div>
				</dl>
                
                <dl class="dl-horizontal">
				<dt class="p-t-10">Misc. and Other</dt>
				<dd>
				<div class="fg-line">
				<textarea type="text" class="form-control" cols="6" style="height:100px;" name="crsmisc" id="crsmisc"></textarea>
				</div>
				</dl>
				
				<div class="m-t-30">
				<button class="btn btn-primary btn-sm" name="submit" type="submit" value="stutranscriptrecordsubmit">Save</button>
				<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
				</div>
				</form>
				<script>
				function transcriptformvalidate(){
				if($("#stuid").val() == "" ){
				$("#stuid").focus();
				$("#errorstuid").html("Please Enter Student ID");
				return false;
				}else{
				$("#errorstuid").html("");
				}
				}
				</script>
				</div>
				<?php }?>
                
                <?php 
				if(@@$_REQUEST['edittranscriptrecord']==1){
				?>
				<div>
				<form  onsubmit="return transcriptformvalidatei();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
				<input type="hidden" name="cur_studentpanel" value="1" />
				<input type="hidden" name="id" value="<?=@$_REQUEST['transid']?>" />
				<dl class="dl-horizontal">
				<dt class="p-t-10">Student ID No*</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" id="stuidi" name="stuid" value="<?=$fetchtranscript['stuid']?>">
				</div>
				<span id="errorstuidi" style="color:#ff0000;">&nbsp;</span> </dd>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Courses Taken</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crstaken" value="<?=$fetchtranscript['crstaken']?>">
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Grade</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crsgrade" value="<?=$fetchtranscript['crsgrade']?>">
				</div>
				</dl>
                
                <dl class="dl-horizontal">
				<dt class="p-t-10">Attendance</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crsattendance" value="<?=$fetchtranscript['crsattendance']?>">
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Degree Conferred</dt>
				<dd>
				<div class="fg-line">
                <select class="form-control" name="crsdegree">
                      <option value="">Select Your Option</option>
                      <option value="Diploma" <?php if($fetchtranscript['crsdegree']=="Diploma"){?> selected="selected" <?php }?>>Diploma</option>
                      <option value="Certificate" <?php if($fetchtranscript['crsdegree']=="Certificate"){?> selected="selected" <?php }?>>Certificate</option>
                      <option value="Degree" <?php if($fetchtranscript['crsdegree']=="Degree"){?> selected="selected" <?php }?>>Degree</option>
                </select>
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Date Conferred</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control date-picker" name="crsdateconferred" value="<?=date('d-m-Y',strtotime($fetchtranscript['crsdateconferred']))?>">
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Academic Transcripts</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crstranscript" value="<?=$fetchtranscript['crstranscript']?>">
				</div>
				</dl>
				
				<dl class="dl-horizontal">
				<dt class="p-t-10">Activity Transcripts</dt>
				<dd>
				<div class="fg-line">
				<input type="text" class="form-control" name="crsactivitytranscript" value="<?=$fetchtranscript['crsactivitytranscript']?>">
				</div>
				</dl>
                
                <dl class="dl-horizontal">
				<dt class="p-t-10">Misc. and Other</dt>
				<dd>
				<div class="fg-line">
				<textarea type="text" class="form-control" cols="6" style="height:100px;" name="crsmisc" id="crsmiscc"><?=$fetchtranscript['crsmisc']?></textarea>
				</div>
				</dl>
				
				<div class="m-t-30">
				<button class="btn btn-primary btn-sm" name="submit" type="submit" value="stutranscriptrecordeditsubmit">Save</button>
				<button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
				</div>
				</form>
				<script>
				function transcriptformvalidatei(){
				if($("#stuidi").val() == "" ){
				$("#stuidi").focus();
				$("#errorstuidi").html("Please Enter Student ID");
				return false;
				}else{
				$("#errorstuidi").html("");
				}
				}
				</script>
				</div>
				<?php }?>
                        
                <?php if(@@$_REQUEST['addtranscriptrecord']!=1 && @$_REQUEST['edittranscriptrecord']!=1) { ?>
                <dl class="dl-horizontal">
                  <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                    <thead>
                      <tr>
                        <th>Current Students</th>
                        <th>Past Students</th>
                        <th>Past Alumni</th>
                        <th><button class="btn btn-info btn-xs" style="pointer-events: none;">Academic Transcripts</button><br>Add Record</th>
                        <th><button class="btn btn-info btn-xs" style="pointer-events: none;">Academic Transcripts</button><br>View Record</th>
                        <th>Track Date(Add/Edit)</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
					  	while($viewcur_student = mysqli_fetch_array($resquery9stud)) {
					  ?>
                      <tr>
                        <td><?=$viewcur_student['current_student'];?></td>
                        <td><?=$viewcur_student['past_student'];?></td>
                        <td><?=$viewcur_student['past_alumni'];?></td>
                        
                        <!--FOR ADD AND VIEW [DONE]-->
                        <td><a href="educationalinstitute.php?cur_studentpanel=1&addtranscriptrecord=1&ind_id=<?=$viewcur_student['ind_id']?>&id=<?=$viewcur_student['id']?>"><img src="img/add.png" /></a></td>
                    	<td><a id="trans<?php echo $viewcur_student['id']?>"><img src="img/show.png" /></a></td>
                        <!--FOR ADD AND VIEW [DONE]-->
                        
                        <td><?=date('jS F Y',strtotime($viewcur_student['lastedit']))?></td>
                        
                        <!--FOR EDIT AND DELETE-->
                        <td><a href="educationalinstitute.php?ind_id=<?=$viewcur_student['ind_id']?>&id=<?=$viewcur_student['id']?>&editcur_student=awards&stud=1&accr=1&cur_studentpanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$viewcur_student['ind_id']?>&id=<?=$viewcur_student['id']?>&delcur_student=val&cur_studentpanel=1" style="color:#ff0000;">Delete</a></td>
                        <!--FOR EDIT AND DELETE-->
                      </tr>
                      <!--SUB LEVEL-->
                      	<tr style="display:none; background-color:#000;" id="transscript<?php echo $viewcur_student['id']?>">
                          <td colspan="10"><div style="col-sm-12">
                              <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                <thead>
                                  <tr>
                                    <th>Student ID No.</th>
                                    <th>Courses Taken</th>
                                    <th>Grade(s)</th>
                                    <th>Attendance</th>
                                    <th>Degree Conferred</th>
                                    <th>Date Conferred</th>
                                    <th>Academic Transcripts</th>
                                    <!--<th>Activity Transcripts</th>-->
                                    <th>Misc. and Other</th>
                                    <th>Track Date(Add/Edit)</th>
                                    <th>Action</th>
                                  </tr>
                                  <?php
                            $sqltranscript=mysqli_query($con, "SELECT ics.*, estr.* FROM `na_ins_current_student` as ics INNER JOIN `na_edu_student_transcript_record` as estr on ics.id=estr.ins_current_student_id WHERE estr.ins_current_student_id='".$viewcur_student['id']."'");
                                  while($fetchtranscript=mysqli_fetch_array($sqltranscript)){	
                            ?>
                                  <tr>
                                    <td><?php echo $fetchtranscript['stuid']?></td>
                                    <td><?php echo $fetchtranscript['crstaken']?></td>
                                    <td><?php echo $fetchtranscript['crsgrade']?></td>
                                    <td><?php echo $fetchtranscript['crsattendance']?></td>
                                    <td><?php echo $fetchtranscript['crsdegree']?></td>
                                    <td><?=date('jS M Y', strtotime($fetchtranscript['crsdateconferred']))?></td>
                                    <td><?php echo $fetchtranscript['crstranscript']?></td>
                                    <!--<td><?php echo $fetchtranscript['crsactivitytranscript']?></td>-->
                                    <td><?=substr(stripslashes($fetchtranscript['crsmisc']),0,10)?></td>
                                    <td><?=date('jS F Y',strtotime($fetchtranscript['lastedit']))?></td>
                                    
                                    <!--EDIT AND DELETE-->
                                    <td>
                                    <a href="educationalinstitute.php?ind_id=<?=$fetchtranscript['ind_id']?>&transid=<?=$fetchtranscript['tra_id']?>&edittranscriptrecord=1&accr=1&cur_studentpanel=1">Edit</a>&nbsp;|&nbsp;
                                    <a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$fetchtranscript['ind_id']?>&id=<?=$fetchtranscript['tra_id']?>&deltranscript=val&cur_studentpanel=1" style="color:#ff0000;">Delete</a>
                                    <!--EDIT AND DELETE-->
                                    </td>
                                  </tr>
                                  <?php }?>
                                </thead>
                              </table>
                            </div>
                          </td>
                        </tr>
                      <!--SUB LEVEL-->
                      <!--**Script For Toggle**-->
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                        <script>
                        $(document).ready(function(){
                        $("#trans<?php echo $viewcur_student['id']?>").click(function(){
                        $("#transscript<?php echo $viewcur_student['id']?>").toggle();
                        });
                        });
                        </script>	
                       <!--**Script For Toggle**-->
                      <?php } ?>
                    </tbody>
                  </table>
                </dl>
                <?php }?>
              </div>
              <?php } else { ?>
              <form name="studentformthirdsection" id="studentformthirdsection" onsubmit="return studentvaldeforthrdces();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="cur_studentpanel" value="1" />
                <input type="hidden" name="cur_studentdid" value="<?=$viewcur_student['id']?>" />
                <div class="pmbb-edit" style="display:block;">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Current Student*</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewcur_student['current_student']?>" id="student_idforvalde" name="current_student" placeholder="Current Student">
                      </div>
                      <span id="cur_studenterror" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Past Student</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewcur_student['past_student']?>" name="past_student" placeholder="Past Student">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Past Alumni</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewcur_student['past_alumni']?>" name="past_alumni" placeholder="Past Alimni">
                      </div>
                    </dd>
                  </dl>
                  <div class="m-t-30">
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="cur_studentsubmit">Save</button>
                    <a href="" onclick="javascript:history.go(-1)">
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                    </a> </div>
                </div>
              </form>
              <script>
                function studentvaldeforthrdces(){
                if($("#student_idforvalde").val() == "" ){
                $("#student_idforvalde").focus();
                $("#cur_studenterror").html("Please Enter Current Student");
                return false;
                }else{
                $("#cur_studenterror").html("");
                }
                }
                </script>
              <?php } ?>
              <form name="studentformthirdsection" id="studentformthirdsection"  enctype="multipart/form-data" onsubmit="return Submitcur_student3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="cur_studentpanel" value="1" />
                <div class="pmbb-edit">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Current Student*</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control" id="student_idforvaldei" name="current_student" placeholder="Current Student">
                      </div>
                      <span id="cur_studenterrori" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Past Student</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control" name="past_student" placeholder="Past Student">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Past Alumni</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control" name="past_alumni" placeholder="Past Alimni">
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
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="cur_studentsubmit">Save</button>
                    <a href="" onclick="javascript:history.go(-1)">
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                    </a> </div>
                </div>
              </form>
			  <script>
                function Submitcur_student3(){
                if($("#student_idforvaldei").val() == "" ){
                $("#student_idforvaldei").focus();
                $("#cur_studenterrori").html("Please Enter Current Student");
                return false;
                }else{
                $("#cur_studenterrori").html("");
                }
                }
                </script>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!----   Current Student Ends  ----->
    </div>
	<script>
    $(document).ready(function(){
    $("#stud").click(function(){
    $("#studbody").toggle(1000);
    });
    });
    </script>
    <div>
      <h4 class="btn btn-success"><a id="market" style="cursor:pointer; color:#FFF;">Marketing and Promotion:</a></h4>
    </div>
    <div id="marketbody" <?php if(@$_REQUEST['aff']==1 || @$_REQUEST['marketpanel']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>>
    <div class="panel panel-collapse">
      <div <?php if(@$_REQUEST['marketpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
        <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-market" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Marketing and Promotion: </a> </h4>
      </div>
      <div id="accordionTeal-market" <?php if(@$_REQUEST['marketpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
        <div class="panel-body">
          <div class="pmb-block p-10  m-b-0">
            <div class="pmbb-body p-l-0">
              <?php if(@$_REQUEST['editmarket']=='') { ?>
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
                        <th>Track Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
							while($viewmarket = mysqli_fetch_array($resquery9market)) {
					  ?>
                      <tr>
                        <td><?=$viewmarket['Advertisements'];?></td>
                        <td><?=$viewmarket['Marketing_Material'];?></td>
                        <td><?=$viewmarket['Commercials'];?></td>
                        <td><?=$viewmarket['Video'];?></td>
                        <td><?=$viewmarket['Infomercials'];?></td>
                        <td><?=date('jS F Y',strtotime($viewmarket['lastedit']))?></td>
                        
                        <td><a href="educationalinstitute.php?ind_id=<?=$viewmarket['ind_id']?>&id=<?=$viewmarket['id']?>&editmarket=awards&market=1&accr=1&marketpanel=1">Edit</a>&nbsp;|&nbsp;<a href="educationalinstitute.php?ind_id=<?=$viewmarket['ind_id']?>&id=<?=$viewmarket['id']?>&delmarket=val&marketpanel=1" style="color:#ff0000;">Delete</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </dl>
              </div>
              <?php } else { ?>
              <form name="marketform" id="marketform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="marketpanel" value="1" />
                <input type="hidden" name="marketdid" value="<?=$viewmarket['id']?>" />
                <div class="pmbb-edit" style="display:block;">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Advertisements/Advertisement Materials *</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewmarket['Advertisements']?>" id="Advertisements_123" name="Advertisements" placeholder="Advertisements/Advertisement Materials">
                      </div>
                      <span id="market_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Marketing Materials or Information</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewmarket['Marketing_Material']?>" id="Marketing_Material" name="Marketing_Material" placeholder="Marketing Materials or Information">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Commercials</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewmarket['Commercials']?>" id="Commercials" name="Commercials" placeholder="Commercials">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Video Clips</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewmarket['Video']?>" id="Video" name="Video" placeholder="Video Clips">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Infomercials</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewmarket['Infomercials']?>" id="Infomercials" name="Infomercials" placeholder="Infomercials">
                      </div>
                    </dd>
                  </dl>
                  <div class="m-t-30">
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="marketsubmit">Save</button>
                    <a href="" onclick="javascript:history.go(-1)">
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                    </a> </div>
                </div>
              </form>
              <?php } ?>
              <form name="marketform" id="marketform" onsubmit="return Submitmarket3();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="marketpanel" value="1" />
                <div class="pmbb-edit">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Advertisements/Advertisement Materials *</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control " value="" id="Advertisements_123" name="Advertisements" placeholder="Advertisements/Advertisement Materials">
                      </div>
                      <span id="market_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Marketing Materials or Information</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="" id="Marketing_Material" name="Marketing_Material" placeholder="Marketing Materials or Information">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Commercials</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="" id="Commercials" name="Commercials" placeholder="Commercials">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Video Clips</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control " value="" id="Video" name="Video" placeholder="Video Clips">
                      </div>
                    </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Infomercials</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="" id="Infomercials" name="Infomercials" placeholder="Infomercials">
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
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="marketsubmit">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                  </div>
                </div>
              </form>
              <script>

                            function Submitmarket3(){

								if($("#Advertisements_123").val() == "" ){

									$("#Advertisements_123").focus();

									$("#market_error3").html("Please Enter Advertisements/Advertisement Materials");

									return false;

                            	}else{

									$("#market_error3").html("");

								}

                            }

                            
                            </script>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script>
				$(document).ready(function(){
				
					$("#market").click(function(){
					$("#marketbody").toggle(1000);
					});
				
				});
        </script>
        
            <!--****News and Information on 17-08-2016 [SUPRATIM]****-->
    <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="nws" style="color:#FFF;">News and Information</a></h4>
    <div id="news" <?php if(@$_REQUEST['newsainfopanel']==1) {?>style="display:block;"<?php }?>style="display:none;">
    <!--NEWS AND INFORMATION HERE-->
    <div class="panel panel-collapse">
    <div <?php if(@$_REQUEST['newsainfopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
    <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-news" data-parent="#accordionTeal" data-toggle="collapse" class="">News and Information: </a> </h4>
    </div>
    <div id="accordionTeal-news" <?php if(@$_REQUEST['newsainfopanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
    <div class="panel-body">
    <div class="pmb-block p-10  m-b-0">
    <div class="pmbb-body p-l-0">
    <?php if(@$_REQUEST['editnewsainfo']=='') { ?>
    <div class="pmbb-view">
    <ul class="actions" style="position:static; float:right;">
    <li class="dropdown open"> &nbsp;
      <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
        <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
      </ul>
    </li>
    </ul>
    <dl class="dl-horizontal">
    <table class="table table-striped table-bordered table-advance table-hover" width="50%">
      <thead>
        <tr>
          <th>News Name</th>
          <th>News Description</th>
          <th>Link to News</th>
          <th>News Date</th>
          <th>Track Date(Add/Edit)</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($viewnews = mysqli_fetch_array($resquerynews)) {
        ?>
        <tr>
          <td><?=$viewnews['newsname']?></td>
          <td><?=substr(stripslashes($viewnews['newsdescription']),0,30)?></td>
          <td><?=$viewnews['linktonews']?></td>
          <td><?=date('d-M-Y', strtotime($viewnews['newsdate']))?></td>
          <td><?=date('jS F Y',strtotime($viewnews['lastedit']))?></td>
          <!--FOR EDIT AND DELETE-->
          <td><a href="educationalinstitute.php?ind_id=<?=$viewnews['ind_id']?>&id=<?=$viewnews['id']?>&editnewsainfo=awards&accr=1&newsainfopanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="educationalinstitute.php?ind_id=<?=$viewnews['ind_id']?>&id=<?=$viewnews['id']?>&delnews=val&newsainfopanel=1" style="color:#ff0000;">Delete</a></td>
          <!--FOR EDIT AND DELETE-->
        </tr>
        <?php } ?>
      </tbody>
    </table>
    </dl>
    </div>
    <?php } else { ?>
    <form name="newsform" id="newsform" onsubmit="return newsedit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <input type="hidden" name="newsainfopanel" value="1" />
    <input type="hidden" name="newsid" value="<?=$viewnews['id']?>" />
    <div class="pmbb-edit" style="display:block;">
    <dl class="dl-horizontal">
      <dt class="p-t-10">News Name*</dt>
      <dd>
        <div class="fg-line">
          <input type="text" class="form-control" id="newsedit" name="newsname" placeholder="News Name" value="<?=stripslashes($viewnews['newsname'])?>">
        </div>
        <span id="errornews" style="color:#ff0000;">&nbsp;</span> </dd>
    </dl>
    <dl class="dl-horizontal">
      <dt class="p-t-10">News Description</dt>
      <dd>
        <div class="dtp-container dropdown fg-line">
          <textarea type='text' class="form-control" name="newsdescription" id="newsdescription" data-toggle="dropdown" placeholder="Description" cols="6" style="height:150px;"><?=stripslashes($viewnews['newsdescription'])?></textarea>
        </div>
      </dd>
    </dl>
    <dl class="dl-horizontal">
      <dt class="p-t-10">Link to News</dt>
      <dd>
        <div class="dtp-container dropdown fg-line">
          <input type='text' class="form-control" name="linktonews" data-toggle="dropdown" placeholder="Link" value="<?=$viewnews['linktonews']?>">
        </div>
      </dd>
    </dl>
    <dl class="dl-horizontal">
      <dt class="p-t-10">Date of News</dt>
      <dd>
        <div class="dtp-container dropdown fg-line">
          <input type='text' class="form-control date-picker" name="newsdate" data-toggle="dropdown" value="<?=date('d-m-Y', strtotime($viewnews['newsdate']))?>">
        </div>
      </dd>
    </dl>
    <div class="m-t-30">
      <button class="btn btn-primary btn-sm" name="submit" type="submit" value="newssubmit">Save</button>
      <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
    </div>
    </div>
    </form>
    <script>
    function newsedit(){
    if($("#newsedit").val() == "" ){
    $("#newsedit").focus();
    $("#errornews").html("Please Enter News Title");
    return false;
    }else{
    $("#errornews").html("");
    }
    }
    </script>
    <?php } ?>
    <form name="newsform" id="newsform" onsubmit="return newsadd();"   enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <input type="hidden" name="newsainfopanel" value="1" />
    <div class="pmbb-edit">
    <dl class="dl-horizontal">
      <dt class="p-t-10">News Name*</dt>
      <dd>
        <div class="fg-line">
          <input type="text" class="form-control" id="newsadde" name="newsname" placeholder="News Name">
        </div>
        <span id="erroranewsadd" style="color:#ff0000;">&nbsp;</span> </dd>
    </dl>
    <dl class="dl-horizontal">
      <dt class="p-t-10">News Description</dt>
      <dd>
        <div class="dtp-container dropdown fg-line">
          <textarea type='text' class="form-control" name="newsdescription" id="newsdescription" data-toggle="dropdown" placeholder="Description" cols="6" style="height:150px;"></textarea>
        </div>
      </dd>
    </dl>
    <dl class="dl-horizontal">
      <dt class="p-t-10">Link to News</dt>
      <dd>
        <div class="dtp-container dropdown fg-line">
          <input type='text' class="form-control" name="linktonews" data-toggle="dropdown">
        </div>
      </dd>
    </dl>
    <dl class="dl-horizontal">
      <dt class="p-t-10">Date of News</dt>
      <dd>
        <div class="dtp-container dropdown fg-line">
          <input type='text' class="form-control date-picker" name="newsdate" data-toggle="dropdown">
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
      <button class="btn btn-primary btn-sm" name="submit" type="submit" value="newssubmit">Save</button>
      <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
    </div>
    </div>
    </form>
    <script>
    function newsadd(){
    if($("#newsadde").val() == "" ){
    $("#newsadde").focus();
    $("#erroranewsadd").html("Please Enter News Title");
    return false;
    }else{
    $("#erroranewsadd").html("");
    }
    }
    </script>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!--NEWS AND INFORMATION HERE-->
    </div><br>
    <script>
    $(document).ready(function(){
    $("#nws").click(function(){
    $("#news").toggle();
    });
    });
    </script>
    <!--****News and Information on 17-08-2016 [SUPRATIM]****-->  
    <div>
      <h4 class="btn btn-success"><a id="soc" style="cursor:pointer; color:#FFF;">Link to NarrateMe Social Network Sites:</a></h4>
    </div>
    <div id="socbody" <?php if(@$_REQUEST['aff']==1 || @$_REQUEST['friendspanel']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>>
    <div class="panel panel-collapse">
      <div <?php if(@$_REQUEST['friendspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
        <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-11" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Friends/Followers: </a> </h4>
      </div>
      <div id="accordionTeal-11" <?php if(@$_REQUEST['friendspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
        <div class="panel-body">
          <div class="pmb-block p-10  m-b-0">
            <div class="pmbb-body p-l-0">
              <?php if(@$_REQUEST['editfriends']=='') { ?>
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
                        <th>Link to Page</th>
                        <th>Track Date(Add/Edit)</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
						while($viewfriends = mysqli_fetch_array($resquery11)) {
					  ?>
                      <tr>
                        <td><?=$viewfriends['name'];?></td>
                        <td><?=$viewfriends['link'];?></td>
                        <td><?=date('jS F Y',strtotime($viewfriends['lastedit']))?></td>
                        <td><a href="educationalinstitute.php?ind_id=<?=$viewfriends['ind_id']?>&id=<?=$viewfriends['id']?>&editfriends=awards&accr=1&friendspanel=1&soc=1">Edit</a>&nbsp;|&nbsp;<a href="educationalinstitute.php?ind_id=<?=$viewfriends['ind_id']?>&id=<?=$viewfriends['id']?>&delfriends=val&friendspanel=1" style="color:#ff0000;">Delete</a></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </dl>
              </div>
              <?php } else { ?>
              <form name="friendsform" id="friendsform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="friendspanel" value="1" />
                <input type="hidden" name="friendsdid" value="<?=$viewfriends['id']?>" />
                <div class="pmbb-edit" style="display:block;">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Name*</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewfriends['name']?>" id="name888" name="name" placeholder="Name">
                      </div>
                      <span id="friends_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Link to Page</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="<?php echo $viewfriends['link']?>" id="link" name="link" placeholder="Link to Page">
                      </div>
                    </dd>
                  </dl>
                  <div class="m-t-30">
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="friendssubmit">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                  </div>
                </div>
              </form>
              <?php } ?>
              <form name="friendsform" id="friendsform" onsubmit="return Submitfriends3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="hidden" name="friendspanel" value="1" />
                <div class="pmbb-edit">
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Name*</dt>
                    <dd>
                      <div class="fg-line">
                        <input type="text" class="form-control " value="" id="name888" name="name" placeholder="Name">
                      </div>
                      <span id="friends_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                  </dl>
                  <dl class="dl-horizontal">
                    <dt class="p-t-10">Link to Page</dt>
                    <dd>
                      <div class="dtp-container dropdown fg-line">
                        <input type="text" class="form-control " value="" id="link" name="link" placeholder="Link to Page">
                      </div>
                    </dd>
                  </dl>
                  <div class="m-t-30">
                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="friendssubmit">Save</button>
                    <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                  </div>
                </div>
              </form>
              <script>

                            function Submitfriends3(){

								if($("#name888").val() == "" ){

									$("#name888").focus();

									$("#friends_error3").html("Please Enter Name");

									return false;

                            	}else{

									$("#friends_error3").html("");

								}

                            }

                            

                            </script>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script>
				$(document).ready(function(){
				
					$("#soc").click(function(){
					$("#socbody").toggle(1000);
					});
				
				});
        </script>
    <div>
         <?php $uri = base64_encode($_SESSION['userid']); ?>
      <h4 class="btn btn-success"><a href="http://narrateme.com/new/course-module/supercontrol/home/<?php echo $uri; ?>"  style="cursor:pointer; color:#FFF;">Upload Courses</a></h4>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
  </section>
  </section>
  <?php include('lib/inner_footer.php')?>
<?php
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
$pagename = basename($_SERVER['PHP_SELF']);
//================Add instructional Information starts=====================
if(@$_REQUEST['submit']=="facilitiessubmit") {
	extract($_POST);
	if(@$_REQUEST['facilitiesdid']=="") {
		$data = array('ind_id'=>$_SESSION["userid"],'school_name'=>$school_name, 'informational_description'=>$informational_description , 'school_bulletin'=>$school_bulletin,'url'=>$url,'address'=>$address,'pnone_no'=>$pnone_no,'email'=>$email, 'text_message'=>$text_message , 'ip_address'=>$ip_address,'websites'=>$websites,'domain_name'=>$domain_name,'school_information'=>$school_information,'schoolprogram_information'=>$schoolprogram_information,'schoolwebsite'=>$schoolwebsite,'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_schools_facilities');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&facilitiespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	} else {
		$data = array('ind_id'=>$_SESSION["userid"],'school_name'=>$school_name, 'informational_description'=>$informational_description ,'school_bulletin'=>$school_bulletin,'teacher'=>$teacher,'url'=>$url,'address'=>$address,'pnone_no'=>$pnone_no,'email'=>$email, 'text_message'=>$text_message ,'ip_address'=>$ip_address,'websites'=>$websites,'domain_name'=>$domain_name,'school_information'=>$school_information,'schoolprogram_information'=>$schoolprogram_information,'schoolwebsite'=>$schoolwebsite,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_schools_facilities', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['facilitiesdid']."' ") ;
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&facilitiespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}
//Delete Drugs
if(@$_REQUEST['delfacilities']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_schools_facilities WHERE id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard) {	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&facilitiespanel=1&accr=1';\n";
		echo "</script>";
	}
}
$viewfacilities = getAnyTableWhereData('na_schools_facilities', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
$studensfacilitiessql = "SELECT * FROM na_schools_facilities WHERE ind_id = '".$_SESSION["userid"]."'";
$resquery1 = mysqli_query($con, $studensfacilitiessql) or mysqli_error();
$stunum1 = mysqli_num_rows($resquery1);
//================Add instructional Information Ends=====================

//=========== Instructional course starts===================== 
if(@$_REQUEST['submit']=="coursesubmit") {
	extract($_POST);
	if(@$_REQUEST['coursedid']=="") {
		$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'description'=>$description,'schedule'=>$schedule,'facilities'=>$facilities,'status'=>1);
		$result = insertData($data, 'na_sch_course');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&coursepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	} else {
		$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'description'=>$description,'schedule'=>$schedule,'facilities'=>$facilities);
		$result = updateData($data,'na_sch_course', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['coursedid']."' ") ;
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&coursepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}

//Delete Drugs
if(@$_REQUEST['delcourse']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_course WHERE id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard){	
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='instructional_facility.php?deloperation=successful&coursepanel=1&accr=1';\n";
	echo "</script>";
	}
}
$viewcourse = getAnyTableWhereData('na_sch_course', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
$studenscoursesql = "SELECT * FROM na_sch_course WHERE ind_id = '".$_SESSION["userid"]."'";
$resquery2 = mysqli_query($con, $studenscoursesql) or mysqli_error();
$stunum2 = mysqli_num_rows($resquery2);
//=========== Instructional course ends=====================

//=========== Instructional Lectures starts===================== 
if(@$_REQUEST['submit']=="lecturessubmit") {
	extract($_POST);
	if(@$_REQUEST['lecturesdid']=="") {
	    $uploads_dir = 'uploads/ins_doc/';
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
		$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'accepted_sub_classes'=>$accepted_sub_classes, 'archived_classes'=>$archived_classes,'image'=>json_encode($imageArr), 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
		$result = insertData($data, 'na_sch_lectures');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	} else {
		$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'accepted_sub_classes'=>$accepted_sub_classes, 'archived_classes'=>$archived_classes, 'lastedit'=>date('Y-m-d H:i:s'));
		$result = updateData($data,'na_sch_lectures', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['lecturesdid']."' ") ;
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
} 

//Delete Drugs
if(@$_REQUEST['dellectures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_lectures WHERE id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard){	
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='instructional_facility.php?deloperation=successful&lecturespanel=1&accr=1';\n";
	echo "</script>";
	}
}
$viewlectures = getAnyTableWhereData('na_sch_lectures', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
$studenslecturessql = "SELECT * FROM na_sch_lectures WHERE ind_id = '".$_SESSION["userid"]."'";
$resquery3 = mysqli_query($con, $studenslecturessql) or mysqli_error();
$stunum3 = mysqli_num_rows($resquery3);

//==========================ADD Sub Level=======================
if(@$_REQUEST['submit']=="lecsubmit") {
	extract($_POST);
	if(@$_REQUEST['id']!="") {
		$data = array('ind_id'=>$_SESSION["userid"], 'sch_lectures_id'=>$_REQUEST['id'], 'video_audio'=>$video_audio,'cam_microphone'=>$cam_microphone, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
		$result = insertData($data, 'na_sch_lec_link');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}

//==========EDIT===========
if(@$_REQUEST['submit']=="leceditsubmit") {
	extract($_POST);
	$data = array('ind_id'=>$_SESSION["userid"], 'video_audio'=>$video_audio, 'cam_microphone'=>$cam_microphone,'lastedit'=>date('Y-m-d H:i:s'));
	$result = updateData($data,'na_sch_lec_link', " ind_id='" . $_SESSION["userid"] . "' AND sll_id = '".@$_REQUEST['id']."'") ;
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='instructional_facility.php?operation=successful&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
	echo "</script>";
}

//============DELETE========
if(@$_REQUEST['dellecturespanellink']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_lec_link WHERE sll_id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard){	
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='instructional_facility.php?deloperation=successful&lecturespanel=1&accr=1';\n";
	echo "</script>";
	}
}

//===========FETCH==========
$querylink="SELECT * FROM `na_sch_lec_link` WHERE ind_id='".$_SESSION["userid"]."' AND sll_id = '".@$_REQUEST['linkid']."'";
$executequery=mysqli_query($con, $querylink);
$fetchlink=mysqli_fetch_array($executequery);
//==========================ADD Sub Level End===================

//==========================ADD Sub Level I=======================
if(@$_REQUEST['submit']=="lecsubmitsubclass") {
	extract($_POST);
	if(@$_REQUEST['id']!="") {
		$data = array('ind_id'=>$_SESSION["userid"], 'sch_lectures_id'=>$_REQUEST['id'], 'video_audio_subcls'=>$video_audio_subcls,'cam_microphone_subcls'=>$cam_microphone_subcls, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
		$result = insertData($data, 'na_sch_lec_subcls'); 
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}
//==========EDIT===========
if(@$_REQUEST['submit']=="leceditsubclssubmit") {
	extract($_POST);
	$data = array('ind_id'=>$_SESSION["userid"], 'video_audio_subcls'=>$video_audio_subcls, 'cam_microphone_subcls'=>$cam_microphone_subcls,'lastedit'=>date('Y-m-d H:i:s'));
	$result = updateData($data,'na_sch_lec_subcls', " ind_id='" . $_SESSION["userid"] . "' AND sls_id = '".@$_REQUEST['id']."'") ;
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='instructional_facility.php?operation=successful&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
	echo "</script>";
}
//============DELETE========
if(@$_REQUEST['dellecturespanelsubcls']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_lec_subcls WHERE sls_id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard) {	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&lecturespanel=1&accr=1';\n";
		echo "</script>";
	}
}
//===========FETCH==========
$querylink1="SELECT * FROM `na_sch_lec_subcls` WHERE ind_id='".$_SESSION["userid"]."' AND sls_id = '".@$_REQUEST['subclsid']."'";
$executequery1=mysqli_query($con, $querylink1);
$fetchsubcls=mysqli_fetch_array($executequery1);
//==========================ADD Sub Level End I===================

//==========================ADD Sub Level II=======================
if(@$_REQUEST['submit']=="lecsubmitarcclass") {
	extract($_POST);
	if(@$_REQUEST['id']!="") {
		$data = array('ind_id'=>$_SESSION["userid"], 'sch_lectures_id'=>$_REQUEST['id'], 'video_audio_arccls'=>$video_audio_arccls, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
		$result = insertData($data, 'na_sch_lec_arccls'); 

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}
//==========EDIT===========
if(@$_REQUEST['submit']=="leceditarcclssubmit") {
	extract($_POST);
	$data = array('ind_id'=>$_SESSION["userid"], 'video_audio_arccls'=>$video_audio_arccls,'lastedit'=>date('Y-m-d H:i:s'));
	$result = updateData($data,'na_sch_lec_arccls', " ind_id='" . $_SESSION["userid"] . "' AND sla_id = '".@$_REQUEST['id']."'") ;
	
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='instructional_facility.php?operation=successful&lecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
	echo "</script>";
}
//============DELETE========
if(@$_REQUEST['dellecturespanelarccls']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_lec_arccls WHERE sla_id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard){	
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='instructional_facility.php?deloperation=successful&lecturespanel=1&accr=1';\n";
	echo "</script>";
	}
}
//===========FETCH==========
$querylink2="SELECT * FROM `na_sch_lec_arccls` WHERE ind_id='".$_SESSION["userid"]."' AND sla_id = '".@$_REQUEST['arcclsid']."'";
$executequery2=mysqli_query($con, $querylink2);
$fetcharccls=mysqli_fetch_array($executequery2);
//==========================ADD Sub Level End II===================

//=========== Instructional Lectures ends===================== 

//=========== Instructional Schools/divitions starts===================== 
if(@$_REQUEST['submit']=="schoolssubmit") {
	extract($_POST);
	if(@$_REQUEST['schoolsdid']=="") {
	    $uploads_dir = 'uploads/ins_doc/';
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
		$data = array('ind_id'=>$_SESSION["userid"],'program'=>$program,'course'=>$course,'curriculum'=>$curriculum ,'image'=>json_encode($imageArr), 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
		$result = insertData($data, 'na_sch_schools');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	} else {
		$data = array('ind_id'=>$_SESSION["userid"],'program'=>$program,'course'=>$course,'curriculum'=>$curriculum, 'lastedit'=>date('Y-m-d H:i:s'));
		$result = updateData($data,'na_sch_schools', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['schoolsdid']."' ") ;
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}

//Delete Drugs
if(@$_REQUEST['delschools']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_schools WHERE id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard) {	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&schoolspanel=1&accr=1';\n";
		echo "</script>";
	}
}
$viewschools = getAnyTableWhereData('na_sch_schools', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
$studensschoolssql = "SELECT * FROM na_sch_schools WHERE ind_id = '".$_SESSION["userid"]."'";
$resquery4 = mysqli_query($con, $studensschoolssql) or mysqli_error();
$stunum4 = mysqli_num_rows($resquery4);
//==========================ADD Sub Level=======================
//=======ADD=============
if(@$_REQUEST['submit']=="coursesandclassessubmit") {
	extract($_POST);
	if(@$_REQUEST['id']!="") {
		$data = array('ind_id'=>$_SESSION["userid"], 'sch_schools_id'=>$_REQUEST['id'], 'coursesandclasses'=>$coursesandclasses, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
		$result = insertData($data, 'na_sch_schools_coursesandclasses');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}
//==========EDIT===========
if(@$_REQUEST['submit']=="editcoursesandclassessubmit") {
	extract($_POST);
	$data = array('ind_id'=>$_SESSION["userid"], 'coursesandclasses'=>$coursesandclasses,'lastedit'=>date('Y-m-d H:i:s'));
	$result = updateData($data,'na_sch_schools_coursesandclasses', " ind_id='" . $_SESSION["userid"] . "' AND ssc_id = '".@$_REQUEST['id']."'") ;
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='instructional_facility.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
	echo "</script>";
}
//============DELETE========
if(@$_REQUEST['delschoolspanelcourseandclass']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_schools_coursesandclasses WHERE ssc_id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&schoolspanel=1&accr=1';\n";
		echo "</script>";
	}
}
//===========FETCH==========
$querycourseandclassfetch="SELECT * FROM `na_sch_schools_coursesandclasses` WHERE ind_id='".$_SESSION["userid"]."' AND ssc_id = '".@$_REQUEST['courseandclassid']."'";
$executequerycourseandclass=mysqli_query($con, $querycourseandclassfetch);
$fetchlinkcourseandclass=mysqli_fetch_array($executequerycourseandclass);	
//==========================ADD Sub of the sub Level=======================
//=======ADD=============
if(@$_REQUEST['submit']=="descriptionsyllabussubmit") {
	extract($_POST);   
	if(@$_REQUEST['id']!="") {
		$data = array('ind_id'=>$_SESSION["userid"], 'sch_schools_coursesandclasses_id'=>$_REQUEST['id'], 'descriptionsyllabus'=>addslashes($descriptionsyllabus), 'instructor'=>$instructor, 'lectureschedule'=>date('Y-m-d', strtotime($lectureschedule)), 'otherinstructional'=>$otherinstructional , 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
		$result = insertData($data, 'na_sch_schools_coursesandclasses_subdes');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}
//==========EDIT===========
if(@$_REQUEST['submit']=="descriptionsyllabuseditsubmit") {
	extract($_POST);
	$data = array('ind_id'=>$_SESSION["userid"], 'descriptionsyllabus'=>addslashes($descriptionsyllabus), 'instructor'=>$instructor, 'lectureschedule'=>date('Y-m-d', strtotime($lectureschedule)), 'otherinstructional'=>$otherinstructional, 'lastedit'=>date('Y-m-d H:i:s'));
	$result = updateData($data,'na_sch_schools_coursesandclasses_subdes', " ind_id='" . $_SESSION["userid"] . "' AND sscs_id = '".@$_REQUEST['id']."'") ;
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='instructional_facility.php?operation=successful&schoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
	echo "</script>";
}
//============DELETE========
if(@$_REQUEST['delschoolspanelcrsdetlink']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_schools_coursesandclasses_subdes WHERE sscs_id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard) {	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&schoolspanel=1&accr=1';\n";
		echo "</script>";
	}
}
//===========FETCH==========
$querycourdetfetch="SELECT * FROM `na_sch_schools_coursesandclasses_subdes` WHERE ind_id='".$_SESSION["userid"]."' AND sscs_id = '".@$_REQUEST['subcrsdetid']."'";
$executequerycourdet=mysqli_query($con, $querycourdetfetch);
$fetchlinkcourdet=mysqli_fetch_array($executequerycourdet);
//==========================ADD Sub of the sub Level End===================
//==========================ADD Sub Level End=================== 
//=========== Instructional Schools/divitions ends=====================

//=========== Instructional Instructors/Teachers/Professors starts=====================
if(@$_REQUEST['submit']=="teachersubmit") {
	extract($_POST);
	if(@$_REQUEST['teacherdid']=="") {
		$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'course'=>$course,'information'=>$information,'address'=>$address,'telephone'=>$telephone,'email'=>$email,'website'=>$website,'status'=>1);
		$result = insertData($data, 'na_sch_teacher');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	} else {
		$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'course'=>$course,'information'=>$information,'address'=>$address,'telephone'=>$telephone,'email'=>$email,'website'=>$website);
		$result = updateData($data,'na_sch_teacher', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['teacherdid']."' ") ;
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}

//Delete Drugs
if(@$_REQUEST['delteacher']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_teacher WHERE id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard) {	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&teacherpanel=1&accr=1';\n";
		echo "</script>";
	}
}
$viewteacher = getAnyTableWhereData('na_sch_teacher', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
$studensteachersql = "SELECT * FROM na_sch_teacher WHERE ind_id = '".$_SESSION["userid"]."'";
$resquery5 = mysqli_query($con, $studensteachersql) or mysqli_error();
$stunum5 = mysqli_num_rows($resquery5);
//=========== Instructional Instructors/Teachers/Professors ends=====================

//=========== Instructional Archived/Past Recorded Lectures/Classes starts===================== 
if(@$_REQUEST['submit']=="pastlecturessubmit") {
	extract($_POST);
	if(@$_REQUEST['pastlecturesdid']=="") {
		$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera,'status'=>1);
		$result = insertData($data, 'na_sch_past__lectures');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&pastlecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	} else {
		$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera);
		$result = updateData($data,'na_sch_past__lectures', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['pastlecturesdid']."' ") ;
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&pastlecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
} 
//Delete Drugs
if(@$_REQUEST['delpastlectures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_past__lectures WHERE id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard) {
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&pastlecturespanel=1&accr=1';\n";
		echo "</script>";
	}
}
$viewpastlectures = getAnyTableWhereData('na_sch_past__lectures', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
$studenspastlecturessql = "SELECT * FROM na_sch_past__lectures WHERE ind_id = '".$_SESSION["userid"]."'";
$resquery6 = mysqli_query($con, $studenspastlecturessql) or mysqli_error();
$stunum6 = mysqli_num_rows($resquery6);
//=========== Instructional Archived/Past Recorded Lectures/Classes ends=====================

//=========== Instructional Curriculum starts===================== 
if(@$_REQUEST['submit']=="curriculumsubmit") {
	extract($_POST);
	if(@$_REQUEST['curriculumdid']=="") {
		$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'course'=>$course,'description'=>$description,'course_schedule'=>date('Y-m-d', strtotime($course_schedule)) ,'accepted_transfer'=>$accepted_transfer, 'status'=>1);
		$result = insertData($data, 'na_sch_curriculum');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&curriculumpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	} else {
		$data = array('ind_id'=>$_SESSION["userid"],'instructor'=>$instructor,'course'=>$course,'description'=>$description,'course_schedule'=>date('Y-m-d', strtotime($course_schedule)), 'accepted_transfer'=>$accepted_transfer);
		$result = updateData($data,'na_sch_curriculum', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['curriculumdid']."' ") ;
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&curriculumpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}

//Delete Drugs
if(@$_REQUEST['delcurriculum']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_curriculum WHERE id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard) {	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&curriculumpanel=1&accr=1';\n";
		echo "</script>";
	}
}
$viewcurriculum = getAnyTableWhereData('na_sch_curriculum', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
$studenscurriculumsql = "SELECT * FROM na_sch_curriculum WHERE ind_id = '".$_SESSION["userid"]."'";
$resquery7 = mysqli_query($con, $studenscurriculumsql) or mysqli_error();
$stunum7 = mysqli_num_rows($resquery7);
//=========== Instructional Curriculum ends=====================

//=========== Instructional Instructors/Teachers/Professors starts===================== 
if(@$_REQUEST['submit']=="othereducationsubmit") {
	extract($_POST);
	if(@$_REQUEST['othereducationdid']=="") {
		$data = array('ind_id'=>$_SESSION["userid"],'program_enrolled'=>$program_enrolled,'attandance_date'=>date('Y-m-d',strtotime($attandance_date)),'courses_taken'=>$courses_taken,'grade'=>$grade,'courses_enrolled'=>$courses_enrolled,'seminar_name'=>$seminar_name,'seminar_date'=>date('Y-m-d',strtotime($seminar_date)),'seminar_description'=>$seminar_description,'course_schedule'=>$course_schedule,'teacher_name'=>$teacher_name,'teacher_phone'=>$teacher_phone,'teacher_email'=>$teacher_email,'Certificate_degree'=>$Certificate_degree,'status'=>1);
		$result = insertData($data, 'na_sch_other_education');
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&othereducationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	} else {
		$data = array('ind_id'=>$_SESSION["userid"],'program_enrolled'=>$program_enrolled,'attandance_date'=>date('Y-m-d',strtotime($attandance_date)),'courses_taken'=>$courses_taken,'grade'=>$grade,'courses_enrolled'=>$courses_enrolled,'seminar_name'=>$seminar_name,'seminar_date'=>date('Y-m-d',strtotime($seminar_date)),'seminar_description'=>$seminar_description,'course_schedule'=>$course_schedule,'teacher_name'=>$teacher_name,'teacher_phone'=>$teacher_phone,'teacher_email'=>$teacher_email,'Certificate_degree'=>$Certificate_degree);
		$result = updateData($data,'na_sch_other_education', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['othereducationdid']."' ") ;
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?operation=successful&othereducationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
}

//Delete Drugs
if(@$_REQUEST['delothereducation']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
	$delsql = "DELETE from na_sch_other_education WHERE id = '".@$_REQUEST['id']."'";
	$ard=mysqli_query($con, $delsql);
	if($ard) {	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&othereducationpanel=1&accr=1';\n";
		echo "</script>";
	}
}
$viewothereducation = getAnyTableWhereData('na_sch_other_education', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
$studensothereducationsql = "SELECT * FROM na_sch_other_education WHERE ind_id = '".$_SESSION["userid"]."'";
$resquery8 = mysqli_query($con, $studensothereducationsql) or mysqli_error();
$stunum8 = mysqli_num_rows($resquery8);



//=========== Instructional Instructors/Teachers/Professors ends=====================

//=========== Instructional Video Lecture Start=====================

if(@$_REQUEST['submit']=="videolecturessubmit") {

		extract($_POST);

		if(@$_REQUEST['videolecturesdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, ' na_sch_videolectures');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='instructional_facility.php?operation=successful&videolecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'camera'=>$camera);



			//print_r($data);

			//exit();

			$result = updateData($data,' na_sch_videolectures', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['videolecturesdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='instructional_facility.php?operation=successful&videolecturespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delvideolectures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from  na_sch_videolectures WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='instructional_facility.php?deloperation=successful&videolecturespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewvideolectures = getAnyTableWhereData(' na_sch_videolectures', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensvideolecturessql = "SELECT * FROM  na_sch_videolectures WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryvideolectures = mysqli_query($con, $studensvideolecturessql) or mysqli_error();

	$stunumvideolectures = mysqli_num_rows($resqueryvideolectures);
//=========== Instructional Video lecture ends=====================

//=========== Accepted Substitute Start=====================


if(@$_REQUEST['submit']=="acceptedsubstitutesubmit") {

		extract($_POST);

		if(@$_REQUEST['acceptedsubstitutedid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'link_video'=>$link_video,'link_camera'=>$link_camera,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, ' na_sch_accepted_substitute');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='instructional_facility.php?operation=successful&acceptedsubstitutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'link_video'=>$link_video,'link_camera'=>$link_camera);



			//print_r($data);

			//exit();

			$result = updateData($data,' na_sch_accepted_substitute', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['acceptedsubstitutedid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='instructional_facility.php?operation=successful&acceptedsubstitutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delacceptedsubstitute']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from  na_sch_accepted_substitute WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='instructional_facility.php?deloperation=successful&acceptedsubstitutepanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewacceptedsubstitute = getAnyTableWhereData(' na_sch_accepted_substitute', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensacceptedsubstitutesql = "SELECT * FROM  na_sch_accepted_substitute WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryacceptedsubstitute = mysqli_query($con, $studensacceptedsubstitutesql) or mysqli_error();

	$stunumacceptedsubstitute = mysqli_num_rows($resqueryacceptedsubstitute);
	
//=========== Accepted Substitute ends=====================

//=========== Affiliate Schools/Divisions  Start=====================
if(@$_REQUEST['submit']=="affiliateschoolssubmit") {
		extract($_POST);
		if(@$_REQUEST['affiliateschoolsdid']=="") {
		    $uploads_dir = 'uploads/ins_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'program'=>$program,'course'=>$course, 'curriculum'=>$curriculum ,'image'=>json_encode($imageArr), 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			
			$result = insertData($data, 'na_sch_affiliate_schools');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'program'=>$program,'course'=>$course, 'curriculum'=>$curriculum, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_sch_affiliate_schools', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['affiliateschoolsdid']."' ") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Drugs

	if(@$_REQUEST['delaffiliateschools']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_sch_affiliate_schools WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&affiliateschoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewaffiliateschools = getAnyTableWhereData('na_sch_affiliate_schools', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensaffiliateschoolssql = "SELECT * FROM na_sch_affiliate_schools WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryaffiliateschools = mysqli_query($con, $studensaffiliateschoolssql) or mysqli_error();
	$stunumaffiliateschools = mysqli_num_rows($resqueryaffiliateschools);
	
	
	//==========================ADD Sub Level=======================
	//=======ADD=============
if(@$_REQUEST['submit']=="cocusubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'sch_affiliate_schools_id'=>$_REQUEST['id'], 'courses'=>$courses, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_sch_affiliate_schools_course');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="cocueditsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'courses'=>$courses,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_sch_affiliate_schools_course', " ind_id='" . $_SESSION["userid"] . "' AND sasc_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['delaffiliateschoolspanelcourse']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_sch_affiliate_schools_course WHERE sasc_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&affiliateschoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$querycoursefetch="SELECT * FROM `na_sch_affiliate_schools_course` WHERE ind_id='".$_SESSION["userid"]."' AND sasc_id = '".@$_REQUEST['courseid']."'";
		$executequerycourse=mysqli_query($con, $querycoursefetch);
		$fetchlinkcourse=mysqli_fetch_array($executequerycourse);
		
		
//==========================ADD Sub of the sub Level=======================
//=======ADD=============
if(@$_REQUEST['submit']=="syllabusonesubmit") {   
		extract($_POST);   
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'sch_affiliate_schools_course_id'=>$_REQUEST['id'], 'syllabus'=>addslashes($syllabus), 'lecturescheduleone'=>date('Y-m-d', strtotime($lecturescheduleone)), 'othereduins'=>$othereduins , 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_sch_affiliate_schools_course_details');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
//==========EDIT===========
		if(@$_REQUEST['submit']=="editcourafscsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'syllabus'=>addslashes($syllabus), 'lecturescheduleone'=>date('Y-m-d', strtotime($lecturescheduleone)), 'othereduins'=>$othereduins, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_sch_affiliate_schools_course_details', " ind_id='" . $_SESSION["userid"] . "' AND sascd_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
//============DELETE========
	if(@$_REQUEST['delcourafsclink']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_sch_affiliate_schools_course_details WHERE sascd_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&affiliateschoolspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
//===========FETCH==========
		$querycourafscfetch="SELECT * FROM `na_sch_affiliate_schools_course_details` WHERE ind_id='".$_SESSION["userid"]."' AND sascd_id = '".@$_REQUEST['courafscid']."'";
		$executequerycourafsc=mysqli_query($con, $querycourafscfetch);
		$fetchlinkcourafsc=mysqli_fetch_array($executequerycourafsc);
//==========================ADD Sub of the sub Level End===================

//==========================ADD Sub Level End===================
	
	
	
	
	
//=========== Affiliate Schools/Divisions  ends=====================
//===========Instructional Facilities Teachers Add==================
if(@$_REQUEST['submit']=="facilitiesteachersubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'schools_facilities_id'=>$_REQUEST['id'], 'name'=>$name,'course'=>$course, 'bioandinformation'=>addslashes($bioandinformation), 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_ins_info_teacherslist');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&facilitiespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
		if(@$_REQUEST['submit']=="editsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'name'=>$name,'course'=>$course, 'bioandinformation'=>$bioandinformation, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_ins_info_teacherslist', " ind_id='" . $_SESSION["userid"] . "' AND iit_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&facilitiespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
		
		$query="SELECT * FROM `na_ins_info_teacherslist` WHERE ind_id='".$_SESSION["userid"]."' AND iit_id = '".@$_REQUEST['innerid']."'";
		$execquery=mysqli_query($con, $query);
		$fetcharray=mysqli_fetch_array($execquery);
		
		//============Teacher==========
		if(@$_REQUEST['delfacilitiesteacher']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_ins_info_teacherslist WHERE iit_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&facilitiespanel=1&accr=1';\n";
		echo "</script>";
		}
	}
//===========Instructional Facilities Teachers Add==================



//=========== Instructional Lectures for Affiliate Schools/Divisions Starts===================== 
if(@$_REQUEST['submit']=="lecturessubmitforafsc") {
		extract($_POST);
		if(@$_REQUEST['lecturesforaffiliateschoolid']=="") {
		    $uploads_dir = 'uploads/ins_doc/';
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

			$datainsert = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'accepted_sub_classes'=>$accepted_sub_classes, 'archived_classes'=>$archived_classes,'image'=>json_encode($imageArr), 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($datainsert, 'na_sch_lectures_afschools');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolslecturepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$dataupdate = array('ind_id'=>$_SESSION["userid"],'video'=>$video,'accepted_sub_classes'=>$accepted_sub_classes, 'archived_classes'=>$archived_classes,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($dataupdate,'na_sch_lectures_afschools', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['lecturesforaffiliateschoolid']."' ") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolslecturepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	
	//Delete

	if(@$_REQUEST['delafsclectures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_sch_lectures_afschools WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&affiliateschoolslecturepanel=1&accr=1';\n";
		echo "</script>";
		}
	}

	 $viewlectures111 = getAnyTableWhereData('na_sch_lectures_afschools', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."'");

	 $studenslecturessql1 = "SELECT * FROM na_sch_lectures_afschools WHERE ind_id = '".$_SESSION["userid"]."'";
	 $resquery111 = mysqli_query($con, $studenslecturessql1) or mysqli_error();
	 $stunum3 = mysqli_num_rows($resquery111);

//==========================ADD Sub Level=======================[DONE]
if(@$_REQUEST['submit']=="lecafscsubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'sch_lectures_afschools_id'=>$_REQUEST['id'], 'video_audio'=>$video_audio,'cam_microphone'=>$cam_microphone, 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_sch_lec_link_afschools');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolslecturepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="leceditafscsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'video_audio'=>$video_audio, 'cam_microphone'=>$cam_microphone, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_sch_lec_link_afschools', " ind_id='" . $_SESSION["userid"] . "' AND slla_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolslecturepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['dellecturespanelafsclink']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_sch_lec_link_afschools WHERE slla_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&affiliateschoolslecturepanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$querylinkafsc="SELECT * FROM `na_sch_lec_link_afschools` WHERE ind_id='".$_SESSION["userid"]."' AND slla_id = '".@$_REQUEST['linkidafsc']."'";
		$executequeryafsc=mysqli_query($con, $querylinkafsc);
		$fetchlinkafsc=mysqli_fetch_array($executequeryafsc);
//==========================ADD Sub Level End===================[DONE]


//==========================ADD Sub Level I=======================[DONE]
if(@$_REQUEST['submit']=="lecafscsubmitsubclass") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'sch_lectures_afschools_id'=>$_REQUEST['id'], 'video_audio_subcls'=>$video_audio_subcls,'cam_microphone_subcls'=>$cam_microphone_subcls, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_sch_lec_subcls_afschools'); 

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolslecturepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="leceditsubclsafscsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'video_audio_subcls'=>$video_audio_subcls, 'cam_microphone_subcls'=>$cam_microphone_subcls,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_sch_lec_subcls_afschools', " ind_id='" . $_SESSION["userid"] . "' AND slsa_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolslecturepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['delaffiliateschoolssubclsafsc']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_sch_lec_subcls_afschools WHERE slsa_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&affiliateschoolslecturepanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$querylinkafsc1="SELECT * FROM `na_sch_lec_subcls_afschools` WHERE ind_id='".$_SESSION["userid"]."' AND slsa_id = '".@$_REQUEST['subclsafscid']."'";
		$executequeryafsc1=mysqli_query($con, $querylinkafsc1);
		$fetchsubclsafsc=mysqli_fetch_array($executequeryafsc1);
//==========================ADD Sub Level End I===================[DONE]

//==========================ADD Sub Level II=======================[DONE]
if(@$_REQUEST['submit']=="lecsubmitarcafscclass") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'sch_lectures_afschools_id'=>$_REQUEST['id'], 'video_audio_arccls'=>$video_audio_arccls, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_sch_lec_arccls_afschools'); 

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolslecturepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="leceditarcclsafscsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'video_audio_arccls'=>$video_audio_arccls, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_sch_lec_arccls_afschools', " ind_id='" . $_SESSION["userid"] . "' AND slaa_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&affiliateschoolslecturepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['dellecturespanelarcclsafsc']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_sch_lec_arccls_afschools WHERE slaa_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&affiliateschoolslecturepanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$querylinkafsc2="SELECT * FROM `na_sch_lec_arccls_afschools` WHERE ind_id='".$_SESSION["userid"]."' AND slaa_id = '".@$_REQUEST['arcclsafscid']."'";
		$executequeryafsc2=mysqli_query($con, $querylinkafsc2);
		$fetcharcclsafsc=mysqli_fetch_array($executequeryafsc2);
//==========================ADD Sub Level End II===================[DONE]
//===========Instructional Lectures for Affiliate Schools/Divisions Ends=====================



//===========Students for instructional facility Starts===================== 
if(@$_REQUEST['submit']=="studentsubmit") {
		extract($_POST);
		if(@$_REQUEST['studentsid']=="") {
		    $uploads_dir = 'uploads/ins_doc/';
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

			$datainsert = array('ind_id'=>$_SESSION["userid"],'cur_student'=>$cur_student,'past_student'=>$past_student, 'past_alumni'=>$past_alumni, 'records_all_students'=>$records_all_students,'image'=>json_encode($imageArr), 'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($datainsert, 'na_insfac_studentdetails');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&studentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$dataupdate = array('ind_id'=>$_SESSION["userid"],'cur_student'=>$cur_student,'past_student'=>$past_student, 'past_alumni'=>$past_alumni, 'records_all_students'=>$records_all_students, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($dataupdate,'na_insfac_studentdetails', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['studentsid']."' ") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&studentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	
	//Delete

	if(@$_REQUEST['delstudentspanel']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_insfac_studentdetails WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&studentspanel=1&accr=1';\n";
		echo "</script>";
		}
	}

	 $viewstudents = getAnyTableWhereData('na_insfac_studentdetails', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."'");

	 $studentsdetsql = "SELECT * FROM na_insfac_studentdetails WHERE ind_id = '".$_SESSION["userid"]."'";
	 $resquerystu = mysqli_query($con, $studentsdetsql) or mysqli_error();
	 $stunumstu = mysqli_num_rows($resquerystu);
	
	//==========================ADD Sub Level=======================[DONE]
	//========ADD==========[DONE]
if(@$_REQUEST['submit']=="addtransforstusubmit") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'insfac_studentdetails_id'=>$_REQUEST['id'], 'student_id'=>$student_id, 'coursesclasses_taken'=>$coursesclasses_taken, 'coursesclasses_enrolled'=>$coursesclasses_enrolled, 'degree_conferred'=>$degree_conferred, 'date_conferred'=>date('Y-m-d', strtotime($date_conferred)), 'transcripts'=>$transcripts , 'miscellaneous'=>addslashes($miscellaneous) ,'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_insfac_studentdetails_transcriptforstudents');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&studentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//========ADD==========[DONE]
	
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="tranforstueditsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'student_id'=>$student_id, 'coursesclasses_taken'=>$coursesclasses_taken, 'coursesclasses_enrolled'=>$coursesclasses_enrolled, 'degree_conferred'=>$degree_conferred, 'date_conferred'=>date('Y-m-d', strtotime($date_conferred)), 'transcripts'=>$transcripts , 'miscellaneous'=>addslashes($miscellaneous), 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_insfac_studentdetails_transcriptforstudents', " ind_id='" . $_SESSION["userid"] . "' AND ist_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&studentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============EDIT==========[DONE]
	
	//============DELETE========[DONE]
	if(@$_REQUEST['deltranforstulink']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_insfac_studentdetails_transcriptforstudents WHERE ist_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&studentspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$querytrafstu="SELECT * FROM `na_insfac_studentdetails_transcriptforstudents` WHERE ind_id='".$_SESSION["userid"]."' AND ist_id = '".@$_REQUEST['tranfstid']."'";
		$executequerytrafstu=mysqli_query($con, $querytrafstu);
		$fetchlinktrafstu=mysqli_fetch_array($executequerytrafstu);

	//==========================Sub of The Sub Level for Courses Taken Starts=======================[DONE]
	//========ADD==========[DONE]
if(@$_REQUEST['submit']=="tranforstuclasstakenadd") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'insfac_studentdetails_transcriptforstudents_id'=>$_REQUEST['id'], 'grades'=>$grades, 'attendance'=>$attendance,'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_insfac_studentdetails_transcriptforstudents_coursestaken');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&studentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//========ADD==========[DONE]
	
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="traforstuclstakensubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades, 'attendance'=>$attendance, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_insfac_studentdetails_transcriptforstudents_coursestaken', " ind_id='" . $_SESSION["userid"] . "' AND istc_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&studentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============EDIT==========[DONE]
	
	//============DELETE========[DONE]
	if(@$_REQUEST['deltraforstucoutaken']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_insfac_studentdetails_transcriptforstudents_coursestaken WHERE istc_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&studentspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$querytrafstucou="SELECT * FROM `na_insfac_studentdetails_transcriptforstudents_coursestaken` WHERE ind_id='".$_SESSION["userid"]."' AND istc_id = '".@$_REQUEST['coursetakenid']."'";
		$executequerytrafstucou=mysqli_query($con, $querytrafstucou);
		$fetchtrafstucou=mysqli_fetch_array($executequerytrafstucou);
	//==========================Sub of The Sub Level for Courses Taken Starts=======================[DONE]
	
	//==========================Sub of The Sub Level for Courses Taken Starts=======================[DONE]
	//========ADD==========[DONE]
if(@$_REQUEST['submit']=="tranforstuclassenroladd") {
		extract($_POST);
		if(@$_REQUEST['id']!="") {
			$data = array('ind_id'=>$_SESSION["userid"], 'insfac_studentdetails_transcriptforstudents_id'=>$_REQUEST['id'], 'gradesenrol'=>$gradesenrol, 'attendanceenroll'=>$attendanceenroll,'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_insfac_studentdetails_transcriptforstudents_coursesenrolled');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&studentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	//========ADD==========[DONE]
	
	//==========EDIT===========[DONE]
		if(@$_REQUEST['submit']=="traforstuclsenrolledsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'gradesenrol'=>$gradesenrol, 'attendanceenroll'=>$attendanceenroll,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_insfac_studentdetails_transcriptforstudents_coursesenrolled', " ind_id='" . $_SESSION["userid"] . "' AND istce_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&studentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============EDIT==========[DONE]
	
	//============DELETE========[DONE]
	if(@$_REQUEST['deltraforstucouenrolled']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_insfac_studentdetails_transcriptforstudents_coursesenrolled WHERE istce_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&studentspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========[DONE]
		$querytrafstucouen="SELECT * FROM `na_insfac_studentdetails_transcriptforstudents_coursesenrolled` WHERE ind_id='".$_SESSION["userid"]."' AND istce_id = '".@$_REQUEST['courseenrolledid']."'";
		$executequerytrafstucouen=mysqli_query($con, $querytrafstucouen);
		$fetchtrafstucouen=mysqli_fetch_array($executequerytrafstucouen);
	//==========================Sub of The Sub Level for Courses Taken Starts=======================[DONE]
	//==========================ADD Sub Level End===================[DONE]
	//===========Students for instructional facility Ends=====================
	
	
	//===========Marketing and Promotion Starts===================== 
	if(@$_REQUEST['submit']=="marketingsubmit") {
			extract($_POST);
			if(@$_REQUEST['marketingid']=="") {
			    $uploads_dir = 'uploads/ins_doc/';
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
				$data = array('ind_id'=>$_SESSION["userid"],'advertisement'=>addslashes($advertisement),'information'=>$information,'commercials'=>$commercials,'videoclips'=>$videoclips, 'infomercials'=>$infomercials,'image'=>json_encode($imageArr), 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
				$result = insertData($data, 'na_insfac_marketingpromotion');
	
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='instructional_facility.php?operation=successful&marketingpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
				echo "</script>";
			} else {
				$data = array('ind_id'=>$_SESSION["userid"],'advertisement'=>addslashes($advertisement),'information'=>$information,'commercials'=>$commercials,'videoclips'=>$videoclips, 'infomercials'=>$infomercials,'lastedit'=>date('Y-m-d H:i:s'));
				$result = updateData($data,'na_insfac_marketingpromotion', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['marketingid']."' ") ;
	
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='instructional_facility.php?operation=successful&marketingpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
				echo "</script>";
			}
		} 

	//Delete Marketing
	if(@$_REQUEST['delmarketing']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_insfac_marketingpromotion WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&marketingpanel=1&accr=1';\n";
		echo "</script>";
		}
	}

	$viewmarketing = getAnyTableWhereData('na_insfac_marketingpromotion', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	
	$marketingsql = "SELECT * FROM na_insfac_marketingpromotion WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquerymarketing = mysqli_query($con, $marketingsql) or mysqli_error();
	$stunummarketing = mysqli_num_rows($resquerymarketing);
	//===========Marketing and Promotion Ends=====================
	
	
	
	//===========News and Informations Starts===================== 
	if(@$_REQUEST['submit']=="newssubmit") {
			extract($_POST);
			if(@$_REQUEST['newsid']=="") {
				$data = array('ind_id'=>$_SESSION["userid"],'newsname'=>addslashes($newsname),'newsdescription'=>addslashes($newsdescription),'linktonews'=>$linktonews,'newsdate'=>date('Y-m-d', strtotime($newsdate)), 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
				$result = insertData($data, 'na_insfac_newsandinformation');
	
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='instructional_facility.php?operation=successful&newsainfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
				echo "</script>";
			} else {
				$data = array('ind_id'=>$_SESSION["userid"],'newsname'=>addslashes($newsname),'newsdescription'=>addslashes($newsdescription),'linktonews'=>$linktonews,'newsdate'=>date('Y-m-d', strtotime($newsdate)), 'lastedit'=>date('Y-m-d H:i:s'));
				$result = updateData($data,'na_insfac_newsandinformation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['newsid']."' ") ;
	
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='instructional_facility.php?operation=successful&newsainfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
				echo "</script>";
			}
		} 

	//Delete News and Information
	if(@$_REQUEST['delnews']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_insfac_newsandinformation WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&newsainfopanel=1&accr=1';\n";
		echo "</script>";
		}
	}

	$viewnews = getAnyTableWhereData('na_insfac_newsandinformation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	
	$newssql = "SELECT * FROM na_insfac_newsandinformation WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquerynews = mysqli_query($con, $newssql) or mysqli_error();
	$stunumnews = mysqli_num_rows($resquerynews);
	//===========News and Informations Ends=====================
	
	
	//===========Social Network Site Starts===================== 
if(@$_REQUEST['submit']=="socialsubmit") {
		extract($_POST);
		if(@$_REQUEST['socialid']=="") {

			$datainsert = array('ind_id'=>$_SESSION["userid"], 'friendsfollowers'=>$friendsfollowers, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($datainsert, 'na_insfac_social');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&socialpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$dataupdate = array('ind_id'=>$_SESSION["userid"],'friendsfollowers'=>$friendsfollowers,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($dataupdate,'na_insfac_social', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['socialid']."' ") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&socialpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	
	//Delete
	if(@$_REQUEST['delsocial']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_insfac_social WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&socialpanel=1&accr=1';\n";
		echo "</script>";
		}
	}

	 $viewsocial = getAnyTableWhereData('na_insfac_social', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."'");

	 $socialsql = "SELECT * FROM na_insfac_social WHERE ind_id = '".$_SESSION["userid"]."'";
	 $socialquery = mysqli_query($con, $socialsql) or mysqli_error();
	 $socialrows = mysqli_num_rows($socialquery);
	 
	 //==========================ADD Sub Level=======================
	 //=======ADD==========[DONE]
	if(@$_REQUEST['submit']=="socialdetaddsubmit") {
			extract($_POST);
			if(@$_REQUEST['id']!="") {
				$data = array('ind_id'=>$_SESSION["userid"], 'insfac_social_id'=>$_REQUEST['id'], 'name'=>$name,'linktopage'=>$linktopage, 'status'=>1,'lastedit'=>date('Y-m-d H:i:s'));
				$result = insertData($data, 'na_insfac_social_details');
	
				echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
				echo "window.top.location.href='instructional_facility.php?operation=successful&socialpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
				echo "</script>";
			}
		}
	//==========EDIT===========
		if(@$_REQUEST['submit']=="editsocialdetsubmit") {
			extract($_POST);
			$data = array('ind_id'=>$_SESSION["userid"], 'name'=>$name,'linktopage'=>$linktopage,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_insfac_social_details', " ind_id='" . $_SESSION["userid"] . "' AND isd_id = '".@$_REQUEST['id']."'") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='instructional_facility.php?operation=successful&socialpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
	}
	//============DELETE========
	if(@$_REQUEST['delsocialdet']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_insfac_social_details WHERE isd_id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='instructional_facility.php?deloperation=successful&socialpanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	//===========FETCH==========
		$querysocial="SELECT * FROM `na_insfac_social_details` WHERE ind_id='".$_SESSION["userid"]."' AND isd_id = '".@$_REQUEST['socialsubid']."'";
		$executequerysocial=mysqli_query($con, $querysocial);
		$fetchsocialdet=mysqli_fetch_array($executequerysocial);
//==========================ADD Sub Level End===================
//===========Social Network Site Ends=====================
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
            <div class="pmbb-header">
              <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">
                <!---->
                <!-- Add instructional Facilities -->
                <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="if" style="color:#FFF; cursor:pointer;">Information</a></h4>
                <div id="ifd" <?php if(@$_REQUEST['facilitiespanel']==1) {?> style="display:block;" <?php }?> style="display:none;">
                  <div class="panel panel-collapse">
                    <div <?php if(@$_REQUEST['facilitiespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-1" data-parent="#accordionTeal" data-toggle="collapse" class="">Information</a> </h4>
                    </div>
                    <div id="accordionTeal-1" <?php if(@$_REQUEST['facilitiespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                            <?php if(@$_REQUEST['editfacilities']==''){ ?>
                            <div class="pmbb-view">
                              <ul class="actions" style="position:static; float:right;">
                                <li class="dropdown open"> &nbsp;
                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                  </ul>
                                </li>
                              </ul>
							<?php 
                            if(@$_REQUEST['addinstrufac']==1){
                            ?>
                            <div>
                            <form  onsubmit="return block();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="facilitiesteacherpanel" value="1" />
                            <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                            <dl class="dl-horizontal">
                            <dt class="p-t-10">Name*</dt>
                            <dd>
                            <div class="fg-line">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <span id="error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                            <dt class="p-t-10">Course</dt>
                            <dd>
                            <div class="dtp-container dropdown fg-line">
                            <input type="text" class="form-control" id="course" name="course" placeholder="Course">
                            </div>
                            </dd>
                            </dl>
                            <dl class="dl-horizontal">
                            <dt class="p-t-10">Bio & Information</dt>
                            <dd>
                            <div class="dtp-container dropdown fg-line">
                            <textarea type='text' class="form-control" id="bioandinformation" name="bioandinformation" cols="4" placeholder="Bio and Information"></textarea>
                            </div>
                            </dd>
                            </dl>
                            <div class="m-t-30">
                            <button class="btn btn-primary btn-sm" name="submit" type="submit" value="facilitiesteachersubmit">Save</button>
                            <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                            </div>
                            </form>
                            <script>
                            function Submitfacilities3(){
                            if($("#name").val() == "" ){
                            $("#name").focus();
                            $("#error").html("Please Enter Name");
                            return false;
                            }else{
                            $("#error").html("");
                            }
                            }
                            </script>
                            </div>
                            <?php }?>
							<?php if(@$_REQUEST['editform']==1) {?>
                            <div>
                            <form name="abc" id="abc" onsubmit="return kkk();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="id" value="<?=$_REQUEST['innerid']?>" />
                            <dl class="dl-horizontal">
                            <dt class="p-t-10">Name*</dt>
                            <dd>
                            <div class="fg-line">
                            <input type="text" class="form-control " value="<?=$fetcharray['name']?>" id="name1" name="name" placeholder="Name">
                            </div>
                            <span id="error1" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                            <dt class="p-t-10">Course</dt>
                            <dd>
                            <div class="dtp-container dropdown fg-line">
                            <input type="text" class="form-control" value="<?=$fetcharray['course']?>" id="course" name="course" placeholder="Course">
                            </div>
                            </dd>
                            </dl>
                            <dl class="dl-horizontal">
                            <dt class="p-t-10">Bio & Information</dt>
                            <dd>
                            <div class="dtp-container dropdown fg-line">
                            <textarea type='text' class="form-control" id="bioandinformation" name="bioandinformation" cols="4" placeholder="Bio and Information"><?=$fetcharray['bioandinformation']?>
                            </textarea>
                            </div>
                            </dd>
                            </dl>
                            <div class="m-t-30">
                            <button class="btn btn-primary btn-sm" name="submit" type="submit" value="editsubmit">Save</button>
                            <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                            </div>
                            </form>
                            <script>
                            function kkk(){
                            if($("#name1").val() == "" ){
                            $("#name1").focus();
                            $("#error1").html("Please Enter Name");
                            return false;
                            }else{
                            $("#error1").html("");
                            }
                            }
                            </script>
                            </div>
                            <?php }?>
							<?php 
                            if(@$_REQUEST['addinstrufac']!=1 && @$_REQUEST['editform']!=1){
                            ?>
                              <dl class="dl-horizontal">
                                <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Informational Description</th>
                                      <th>School Bulletin</th>
                                      <th>Add Teachers</th>
                                      <th>View Teachers</th>
                                      <th>Address</th>
                                      <th>Phone no</th>
                                      <th>Email</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
							while($viewfacilities = mysqli_fetch_array($resquery1)) {
						  ?>
                                    <tr>
                                      <td><?=$viewfacilities['school_name'];?></td>
                                      <td style="width:70%;"><?=$viewfacilities['informational_description'];?></td>
                                      <td><?=$viewfacilities['school_bulletin'];?></td>
                                      <td><a href="instructional_facility.php?facilitiespanel=1&addinstrufac=1&creditpanel=1&addinstrufaccatch=1&ind_id=<?=$viewfacilities['ind_id']?>&id=<?=$viewfacilities['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="if<?php echo $viewfacilities['id']?>"><img src="img/show.png" /></a></td>
                                      <td><?=$viewfacilities['address'];?></td>
                                      <td><?=$viewfacilities['pnone_no'];?></td>
                                      <td><?=$viewfacilities['email'];?></td>
                                      <td><?=date('jS F Y',strtotime($viewfacilities['lastedit']))?></td>
                                      
                                      <td><a href="instructional_facility.php?ind_id=<?=$viewfacilities['ind_id']?>&id=<?=$viewfacilities['id']?>&editfacilities=awards&accr=1&facilitiespanel=1">Edit</a>&nbsp;|&nbsp;<a href="instructional_facility.php?ind_id=<?=$viewfacilities['ind_id']?>&id=<?=$viewfacilities['id']?>&delfacilities=val&facilitiespanel=1" style="color:#ff0000;">Delete</a></td>
                                    </tr>
                                    <!--Under Add Show-->
                                    <tr style="display:none; background-color:#000;" id="bottomtr<?php echo $viewfacilities['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Name</th>
                                                <th>Course</th>
                                                <th>Bio and Information</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
										$sqlissuer=mysqli_query($con, "SELECT nsf.*, niit.* FROM na_schools_facilities as nsf INNER JOIN na_ins_info_teacherslist as niit on nsf.id=niit.schools_facilities_id WHERE niit.schools_facilities_id='".$viewfacilities['id']."'");
											  while($rowissue=mysqli_fetch_array($sqlissuer)){	
										?>
                                              <tr>
                                                <td><?php echo $rowissue['name']?></td>
                                                <td><?php echo $rowissue['course']?></td>
                                                <td><?=stripslashes($rowissue['bioandinformation'])?></td>
                                                <td><?=date('jS F Y',strtotime($rowissue['lastedit']))?></td>
                                                
                                                <td><a href="instructional_facility.php?ind_id=<?=$rowissue['ind_id']?>&innerid=<?=$rowissue['iit_id']?>&editform=1&accr=1&facilitiespanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$rowissue['ind_id']?>&id=<?=$rowissue['iit_id']?>&delfacilitiesteacher=val&facilitiespanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
									<script>
                                    $(document).ready(function(){
                                    $("#if<?php echo $viewfacilities['id']?>").click(function(){
                                    $("#bottomtr<?php echo $viewfacilities['id']?>").toggle();
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
                            <form name="facilitiesform" id="facilitiesform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="facilitiespanel" value="1" />
                              <input type="hidden" name="facilitiesdid" value="<?=$viewfacilities['id']?>" />
                              <div class="pmbb-edit" style="display:block;">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Name*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type="text" class="form-control " value="<?php echo $viewfacilities['school_name']?>" id="school_name" name="school_name" placeholder="School Name">
                                    </div>
                                    <span id="facilities_error" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Informational Description</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <textarea type="text" class="form-control " value="" id="informational_description" name="informational_description" placeholder="Informational Description"><?php echo $viewfacilities['informational_description']?> </textarea>
                                    </div>
                                    <span id="facilities_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">School Bulletin</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type="text" class="form-control " value="<?php echo $viewfacilities['school_bulletin']?>" id="school_bulletin" name="school_bulletin" placeholder="School Bulletin">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Address</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control " value="<?php echo $viewfacilities['address']?>" id="address" name="address" data-toggle="dropdown" placeholder="Teacher">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Phone No</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="<?php echo $viewfacilities['pnone_no']?>" id="pnone_no" name="pnone_no" data-toggle="dropdown" placeholder="Phone No">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Email</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='email' class="form-control" value="<?php echo $viewfacilities['email']?>" id="email" name="email" data-toggle="dropdown" placeholder="Email">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Text message</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <textarea type='text' class="form-control" cols="6" id="text_message" name="text_message" data-toggle="dropdown" placeholder="Text Message"><?php echo $viewfacilities['text_message']?></textarea>
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Ip Address</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="<?php echo $viewfacilities['ip_address']?>" id="ip_address" name="ip_address" data-toggle="dropdown" placeholder="Ip Address">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Websites</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="<?php echo $viewfacilities['websites']?>" id="websites" name="websites" data-toggle="dropdown" placeholder="Websites">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Domain Name</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="<?php echo $viewfacilities['domain_name']?>" id="domain_name" name="domain_name" data-toggle="dropdown" placeholder="Domain Name">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">URL</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" value="<?php echo $viewfacilities['url']?>" id="url" name="url" data-toggle="dropdown" placeholder="URL">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Information regarding the Instructional Facilities or School</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="<?php echo $viewfacilities['school_information']?>" id="school_information" name="school_information" data-toggle="dropdown" placeholder="School Information">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Information regarding the Instructional Facilities or School Programs</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="<?php echo $viewfacilities['schoolprogram_information']?>" id="schoolprogram_information" name="schoolprogram_information" data-toggle="dropdown" placeholder="School Program Information">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Links/Hyperlinks to Instructional Facilities or School web site</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="<?php echo $viewfacilities['schoolwebsite']?>" id="schoolwebsite" name="schoolwebsite" data-toggle="dropdown" placeholder="School Website">
                                    </div>
                                  </dd>
                                </dl>
                                <div class="m-t-30">
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="facilitiessubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="window.history.back();">Cancel</button>
                                </div>
                              </div>
                            </form>
							<script>
                            function check9()(){
                            if($("#school_name").val() == "" ){
                            $("#school_name").focus();
                            $("#facilities_error").html("Please Enter Name");
                            return false;
                            }else{
                            $("#facilities_error").html("");
                            }
                            }
                            </script>
                            <?php } ?>
                            <form name="facilitiesform" id="facilitiesform" onsubmit="return Submitfacilities3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="facilitiespanel" value="1" />
                              <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Name*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type="text" class="form-control " value="" id="school_name" name="school_name" placeholder="School Name">
                                    </div>
                                    <span id="facilities_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Informational Description</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <textarea type="text" class="form-control " value="" id="informational_description" name="informational_description" placeholder="Informational Description"></textarea>
                                    </div>
                                    <span id="facilities_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">School Bulletin</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type="text" class="form-control " value="" id="school_bulletin" name="school_bulletin" placeholder="School Bulletin">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Address</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" value="" id="address" name="address" cols="8" data-toggle="dropdown" placeholder="Address">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Phone No</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="" id="pnone_no" name="pnone_no" data-toggle="dropdown" placeholder="Phone No">
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
                                  <dt class="p-t-10">Text message</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <textarea type='text' class="form-control" value="" id="text_message" name="text_message" data-toggle="dropdown" placeholder="Teat Message"></textarea>
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Ip Address</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="" id="ip_address" name="ip_address" data-toggle="dropdown" placeholder="Ip Address">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Websites</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="" id="websites" name="websites" data-toggle="dropdown" placeholder="Websites">
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
                                  <dt class="p-t-10">Information regarding the Instructional Facilities or School</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="" id="school_information" name="school_information" data-toggle="dropdown" placeholder="School Information">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Information regarding the Instructional Facilities or School Programs</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="" id="schoolprogram_information" name="schoolprogram_information" data-toggle="dropdown" placeholder="School Program Information">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Links/Hyperlinks to Instructional Facilities or School web site</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control" value="" id="schoolwebsite" name="schoolwebsite" data-toggle="dropdown" placeholder="School Website">
                                    </div>
                                  </dd>
                                </dl>
                                <div class="m-t-30">
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="facilitiessubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="window.history.back();">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <script>
							function Submitfacilities3(){
							if($("#school_name").val() == "" ){
							$("#school_name").focus();
							$("#facilities_error3").html("Please Enter School Name");
							return false;
							}else{
							$("#facilities_error3").html("");
							}
							}
                    		</script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><br>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <script>
				$(document).ready(function(){
				$("#if").click(function(){
				$("#ifd").toggle();
					});
				});
				</script>
                <!-- Add instructional Facilities -->
                <!-- Add Schools/Divisions -->
                <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="sd" style="color:#FFF;">Schools/Divisions</a></h4>
               <div id="sdsh" <?php if(@$_REQUEST['schoolspanel']==1 || @$_REQUEST['lecturespanel']==1){?> style="display:block;" <?php }?> style="display:none;">
                  <div class="panel panel-collapse">
                    <div <?php if(@$_REQUEST['schoolspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-4" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Schools/Divisions: </a> </h4>
                    </div>
                    <div id="accordionTeal-4" <?php if(@$_REQUEST['schoolspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                            <?php if(@$_REQUEST['editschools']=='') { ?>
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
                                if(@$_REQUEST['addinstrucurcourse']==1){
                                ?>
                              <div>
                                <form  onsubmit="return block123();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Courses/Classes*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="coursesandclasses" name="coursesandclasses" placeholder="Courses and Classes">
                                      </div>
                                      <span id="errorcoursesandclasses" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coursesandclassessubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function block123(){
                                if($("#coursesandclasses").val() == "" ){
                                $("#coursesandclasses").focus();
                                $("#errorcoursesandclasses").html("Please Enter Courses and Classes");
                                return false;
                                }else{
                                $("#errorcoursesandclasses").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editcourseandclassform']==1){ ?>
                              <div>
                                <form  onsubmit="return block234();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['courseandclassid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Courses/Classes*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="couracls" name="coursesandclasses" placeholder="Courses and Classes" value="<?=$fetchlinkcourseandclass['coursesandclasses']?>">
                                      </div>
                                      <span id="error1122" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="editcoursesandclassessubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function block234(){
                                if($("#couracls").val() == "" ){
                                $("#couracls").focus();
                                $("#error1122").html("Please Enter Courses and Classes");
                                return false;
                                }else{
                                $("#error1122").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['addinstrucrsdetails']==1) {?>
                              <div>
                                <form  onsubmit="return block345();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Description/Syllabus*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <textarea type="text" class="form-control" id="desorsyl" name="descriptionsyllabus" cols="6" placeholder="Description or Syllabus"></textarea>
                                      </div>
                                      <span id="errordesorsyl" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Instructor</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" name="instructor" placeholder="Instructor">
                                      </div>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Course/Class/Lecture Schedule</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control date-picker" name="lectureschedule" data-toggle="dropdown" placeholder="Lecture Schedule">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Accepted Transfer Courses/Other Instructional Facilities or School</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control" name="otherinstructional" placeholder="Other Instructional Facilities">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="descriptionsyllabussubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function block345(){
                                if($("#desorsyl").val() == "" ){
                                $("#desorsyl").focus();
                                $("#errordesorsyl").html("Please Enter Description or Syllabus");
                                return false;
                                }else{
                                $("#errordesorsyl").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php  if(@$_REQUEST['editcrsdetform']==1) {?>
                              <div>
                                <form  onsubmit="return block567();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['subcrsdetid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Description/Syllabus*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <textarea type="text" class="form-control" id="desorsyl1" name="descriptionsyllabus" cols="6" placeholder="Description or Syllabus"><?=$fetchlinkcourdet['descriptionsyllabus']?>
</textarea>
                                      </div>
                                      <span id="errordesorsyl1" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Instructor</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" name="instructor" placeholder="Instructor" value="<?=$fetchlinkcourdet['instructor']?>">
                                      </div>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Course/Class/Lecture Schedule</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control date-picker" name="lectureschedule" data-toggle="dropdown" value="<?=date('d-m-y', strtotime($fetchlinkcourdet['lectureschedule']))?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Accepted Transfer Courses/Other Instructional Facilities or School</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control" name="otherinstructional" placeholder="Other Instructional Facilities" value="<?=$fetchlinkcourdet['otherinstructional']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="descriptionsyllabuseditsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function block567(){
                                if($("#desorsyl1").val() == "" ){
                                $("#desorsyl1").focus();
                                $("#errordesorsyl1").html("Please Enter Description or Syllabus");
                                return false;
                                }else{
                                $("#errordesorsyl1").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['addinstrucurcourse']!=1 && @$_REQUEST['editcourseandclassform']!=1 && @$_REQUEST['addinstrucrsdetails']!=1 && @$_REQUEST['editcrsdetform']!=1) { ?>
                              <dl class="dl-horizontal">
                                <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Program</th>
                                      <th>Course/Program Bulletin</th>
                                      <th>Curriculum</th>
                                      <th>Add Classes Under Curriculum</th>
                                      <th>View Classes Under Curriculum</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    while($viewschools = mysqli_fetch_array($resquery4)) {
                                    ?>
                                    <tr>
                                      <td><?=$viewschools['program'];?></td>
                                      <td><?=$viewschools['course'];?></td>
                                      <td><?=$viewschools['curriculum'];?></td>
                                      <td><a href="instructional_facility.php?schoolspanel=1&addinstrucurcourse=1&addinstrufaccatch=1&ind_id=<?=$viewschools['ind_id']?>&id=<?=$viewschools['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="curc<?php echo $viewschools['id']?>"><img src="img/show.png" /></a></td>
                                      <td><?=date('jS F Y',strtotime($viewschools['lastedit']))?></td>
                                      
                                      <td><a href="instructional_facility.php?ind_id=<?=$viewschools['ind_id']?>&id=<?=$viewschools['id']?>&editschools=awards&accr=1&schoolspanel=1">Edit</a>&nbsp;|&nbsp;<a href="instructional_facility.php?ind_id=<?=$viewschools['ind_id']?>&id=<?=$viewschools['id']?>&delschools=val&schoolspanel=1" style="color:#ff0000;">Delete</a></td>
                                    </tr>
                                    <!--SUB LEVEL I-->
                                    <tr style="display:none; background-color:#000;" id="curcourse<?php echo $viewschools['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Courses/Classes</th>
                                                <th>Add Details</th>
                                                <th>View Details</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
										$sqlinscourseandclass=mysqli_query($con, "SELECT ss.*, ssc.* FROM na_sch_schools as ss INNER JOIN na_sch_schools_coursesandclasses as ssc on ss.id=ssc.sch_schools_id WHERE ssc.sch_schools_id='".$viewschools['id']."'");
											  while($fetchcourseandclass=mysqli_fetch_array($sqlinscourseandclass)){	
										?>
                                              <tr>
                                                <td><?php echo $fetchcourseandclass['coursesandclasses']?></td>
                                                <td><a href="instructional_facility.php?schoolspanel=1&addinstrucrsdetails=1&addinstrufaccatch=1&ind_id=<?=$fetchcourseandclass['ind_id']?>&id=<?=$fetchcourseandclass['ssc_id']?>"><img src="img/add.png" /></a></td>
                                                <td><a id="inner<?php echo $fetchcourseandclass['ssc_id']?>"><img src="img/show.png" /></a></td>
                                                <td><?=date('jS F Y',strtotime($fetchcourseandclass['lastedit']))?></td>
                                                
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchcourseandclass['ind_id']?>&courseandclassid=<?=$fetchcourseandclass['ssc_id']?>&editcourseandclassform=1&accr=1&schoolspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchcourseandclass['ind_id']?>&id=<?=$fetchcourseandclass['ssc_id']?>&delschoolspanelcourseandclass=val&schoolspanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <!--Sub of the sub level-->
                                              <tr style="display:none; background-color:#d9a773;" id="innertoggle<?php echo $fetchcourseandclass['ssc_id']?>">
                                                <td colspan="10"><div style="col-sm-12">
                                                    <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                      <thead>
                                                        <tr>
                                                          <th>Description/Syllabus</th>
                                                          <th>Instructor</th>
                                                          <th>Course/Class/Lecture Schedule</th>
                                                          <th>Accepted Transfer Courses/Other Instructional Facilities or School</th>
                                                          <th>Track Date(Add/Edit)</th>
                                                          <th>Action</th>
                                                        </tr>
                                                        <?php
												  
                                            $sqlinscourdet=mysqli_query($con, "SELECT ssco.*, sscs.* FROM na_sch_schools_coursesandclasses as ssco INNER JOIN na_sch_schools_coursesandclasses_subdes as sscs on ssco.ssc_id=sscs.sch_schools_coursesandclasses_id WHERE sscs.sch_schools_coursesandclasses_id='".$fetchcourseandclass['ssc_id']."'");
                                                  while($fetchcourdet=mysqli_fetch_array($sqlinscourdet)){	
                                            ?>
                                                        <tr>
                                                          <td><?php echo substr(stripslashes($fetchcourdet['descriptionsyllabus']),0,200)?></td>
                                                          <td><?php echo $fetchcourdet['instructor']?></td>
                                                          <td><?=date('Y-m-d', strtotime($fetchcourdet['lectureschedule']))?></td>
                                                          <td><?php echo $fetchcourdet['otherinstructional']?></td>
                                                          <td><?=date('jS F Y',strtotime($fetchcourdet['lastedit']))?></td>
                                                          
                                                          <td><a href="instructional_facility.php?ind_id=<?=$fetchcourdet['ind_id']?>&subcrsdetid=<?=$fetchcourdet['sscs_id']?>&editcrsdetform=1&accr=1&schoolspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchcourdet['ind_id']?>&id=<?=$fetchcourdet['sscs_id']?>&delschoolspanelcrsdetlink=val&schoolspanel=1" style="color:#ff0000;">Delete</a></td>
                                                        </tr>
                                                        <?php }?>
                                                      </thead>
                                                    </table>
                                                  </div></td>
                                              </tr>
                                              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                              <script>
												$(document).ready(function(){
													$("#inner<?php echo $fetchcourseandclass['ssc_id']?>").click(function(){
													$("#innertoggle<?php echo $fetchcourseandclass['ssc_id']?>").toggle();
													});
												});
                                              </script>
                                              <!--Sub of the sub level-->
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                    $(document).ready(function(){
                                    $("#curc<?php echo $viewschools['id']?>").click(function(){
                                    $("#curcourse<?php echo $viewschools['id']?>").toggle();
                                    });
                                    });
                                    </script>
                                    <!--SUB LEVEL I-->
                                    <?php } ?>
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
                                  <div class="col-md-2">
                                    <dt class="p-t-10">Program*</dt>
                                  </div>
                                  <div class="col-md-5">
                                    <select class="form-control" name="program" id="program">
                                      <option value="">Please Select</option>
                                      <option value="diploma" name="diploma" <?php if("diploma"==$viewschools['program']){ echo 'selected' ; }?>>Diploma</option>
                                      <option value="certificate" name="certificate" <?php if("certificate"==$viewschools['program']){ echo 'selected' ; }?>>Certificate</option>
                                      <option value="rankorlevel" name="rankorlevel" <?php if("rankorlevel"==$viewschools['program']) { echo 'selected' ; }?>>Rank or Level</option>
                                      <option value="continuingeducation" name="continuingeducation" <?php if("continuingeducation"==$viewschools['program']) { echo 'selected' ; }?>>Continuing Education</option>
                                    </select>
                                    <span id="schoolserror" style="color:#F00;">&nbsp;</span> </div>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Course/Program Bulletin</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control " value="<?php echo $viewschools['course']?>" id="course" name="course" data-toggle="dropdown" placeholder="Course">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Curriculum</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control " value="<?php echo $viewschools['curriculum']?>" id="curriculum" name="curriculum" placeholder="Curriculum">
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
                            function check9(){
                            if($("#prgrm").val() == "" ){
                            $("#prgrm").focus();
                            $("#schoolserror").html("Please Select Program");
                            return false;
                            }else{
                            $("#schoolserror").html("");
                            }
                            }
                            </script>
                            <?php } ?>
                            <form name="schoolsform" id="schoolsform"  enctype="multipart/form-data" onsubmit="return Submitschools3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="schoolspanel" value="1" />
                              <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                  <div class="col-md-2">
                                    <dt class="p-t-10">Program*</dt>
                                  </div>
                                  <div class="col-md-5">
                                    <select class="form-control" name="program" id="program">
                                      <option value="">Please Select</option>
                                      <option value="diploma" name="diploma">Diploma</option>
                                      <option value="certificate" name="certificate">Certificate</option>
                                      <option value="rankorlevel" name="rankorlevel">Rank or Level</option>
                                      <option value="continuingeducation" name="continuingeducation">Continuing Education</option>
                                    </select>
                                    <span id="schools_error3" style="color:#F00;">&nbsp;</span> </div>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Course/Program Bulletin</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control"  id="course" name="course" data-toggle="dropdown" placeholder="Course">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Curriculum</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" id="curriculum" name="curriculum" placeholder="Curriculum">
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
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="schoolssubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
							<script>
                            function Submitschools3(){
                            if($("#program").val() == "" ){
                            $("#program").focus();
                            $("#schools_error3").html("Please Select Program");
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
                  <!-- Add Lectures -->
                  <div class="panel panel-collapse">
                    <div <?php if(@$_REQUEST['lecturespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-3" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Classes and Lectures: </a> </h4>
                    </div>
                    <div id="accordionTeal-3" <?php if(@$_REQUEST['lecturespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                            <?php if(@$_REQUEST['editlectures']=='') { ?>
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
                                if(@$_REQUEST['addinstrulec']==1){
                                ?>
                              	<div>
                                <form  onsubmit="return block();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="name" name="video_audio" placeholder="Link">
                                      </div>
                                      <span id="error" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to live camera/microphone</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" id="cam_microphone" name="cam_microphone" placeholder="Link">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                            function block(){
                                            if($("#name").val() == "" ){
                                            $("#name").focus();
                                            $("#error").html("Please Enter Link");
                                            return false;
                                            }else{
                                            $("#error").html("");
                                            }
                                            }
                                            </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editleclinkform']==1) {?>
                              	<div>
                                <form  onsubmit="return block1();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['linkid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="nameee" name="video_audio" placeholder="Link" value="<?=$fetchlink['video_audio']?>">
                                      </div>
                                      <span id="errorrr" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to live camera/microphone</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" id="cam_microphone" name="cam_microphone" placeholder="Link" value="<?=$fetchlink['cam_microphone']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="leceditsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                            function block1(){
                                            if($("#nameee").val() == "" ){
                                            $("#nameee").focus();
                                            $("#errorrr").html("Please Enter Link");
                                            return false;
                                            }else{
                                            $("#errorrr").html("");
                                            }
                                            }
                                            </script>
                              </div>
                              <?php }?>
								<?php 
                                if(@$_REQUEST['addinstrusubcls']==1){
                                ?>
                              <div>
                                <form  onsubmit="return block2();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="name2" name="video_audio_subcls" placeholder="Link">
                                      </div>
                                      <span id="error11" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to live camera/microphone</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" id="cam_microphone" name="cam_microphone_subcls" placeholder="Link">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecsubmitsubclass">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                            function block2(){
                                            if($("#name2").val() == "" ){
                                            $("#name2").focus();
                                            $("#error11").html("Please Enter Link");
                                            return false;
                                            }else{
                                            $("#error11").html("");
                                            }
                                            }
                                            </script>
                              </div>
                              <?php }?>
								<?php 
                                if(@$_REQUEST['editlecsubclsform']==1){
                                ?>
                              <div>
                                <form  onsubmit="return block3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['subclsid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="namea" name="video_audio_subcls" placeholder="Link" value="<?=$fetchsubcls['video_audio_subcls']?>">
                                      </div>
                                      <span id="errora" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to live camera/microphone</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" id="cam_microphone_subcls" name="cam_microphone_subcls" placeholder="Link" value="<?=$fetchsubcls['cam_microphone_subcls']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="leceditsubclssubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                            function block3(){
                                            if($("#namea").val() == "" ){
                                            $("#namea").focus();
                                            $("#errora").html("Please Enter Link");
                                            return false;
                                            }else{
                                            $("#errora").html("");
                                            }
                                            }
                                            </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['addinstruarccls']==1) {?>
                              <div>
                                <form  onsubmit="return block4();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="name5" name="video_audio_arccls" placeholder="Link">
                                      </div>
                                      <span id="error5" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecsubmitarcclass">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                            function block4(){
                                            if($("#name5").val() == "" ){
                                            $("#name5").focus();
                                            $("#error5").html("Please Enter Link");
                                            return false;
                                            }else{
                                            $("#error5").html("");
                                            }
                                            }
                                            </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editlecarcclsform']==1) {?>
                              <div>
                                <form  onsubmit="return block5();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['arcclsid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="namearc" name="video_audio_arccls" placeholder="Link" value="<?=$fetcharccls['video_audio_arccls']?>">
                                      </div>
                                      <span id="errorarc" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="leceditarcclssubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                            function block5(){
                                            if($("#namearc").val() == "" ){
                                            $("#namearc").focus();
                                            $("#errorarc").html("Please Enter Link");
                                            return false;
                                            }else{
                                            $("#errorarc").html("");
                                            }
                                            }
                                            </script>
                              </div>
                              <?php }?>
                              <?php 
                                        if(@$_REQUEST['addinstrulec']!=1 && @$_REQUEST['editleclinkform']!=1 && @$_REQUEST['addinstrusubcls']!=1 && @$_REQUEST['editlecsubclsform']!=1 && @$_REQUEST['addinstruarccls']!=1 && @$_REQUEST['editlecarcclsform']!=1){
                                        ?>
                              <dl class="dl-horizontal">
                                <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Videos of classes</th>
                                      <th>Add Links</th>
                                      <th>View Links</th>
                                      <th>Accepted Substitute Classes</th>
                                      <th>Add Links for Classes</th>
                                      <th>View Links for Classes</th>
                                      <th>Archived Classes</th>
                                      <th>Add Links for Past Classes</th>
                                      <th>View Links for Past Classes</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                                while($viewlectures = mysqli_fetch_array($resquery3)) {
                                              ?>
                                    <tr>
                                      <td><?=$viewlectures['video'];?></td>
                                      <td><a href="instructional_facility.php?lecturespanel=1&addinstrulec=1&addinstrufaccatch=1&ind_id=<?=$viewlectures['ind_id']?>&id=<?=$viewlectures['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="lin<?php echo $viewlectures['id']?>"><img src="img/show.png" /></a></td>
                                      <td><?=$viewlectures['accepted_sub_classes'];?></td>
                                      <td><a href="instructional_facility.php?lecturespanel=1&addinstrusubcls=1&addinstrufaccatch=1&ind_id=<?=$viewlectures['ind_id']?>&id=<?=$viewlectures['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="sub<?php echo $viewlectures['id']?>"><img src="img/show.png" /></a></td>
                                      <td><?=$viewlectures['archived_classes'];?></td>
                                      <td><a href="instructional_facility.php?lecturespanel=1&addinstruarccls=1&addinstrufaccatch=1&ind_id=<?=$viewlectures['ind_id']?>&id=<?=$viewlectures['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="arc<?php echo $viewlectures['id']?>"><img src="img/show.png" /></a></td>
                                      <td><?=date('jS F Y',strtotime($viewlectures['lastedit']))?></td>
                                      
                                      <td><a href="instructional_facility.php?ind_id=<?=$viewlectures['ind_id']?>&id=<?=$viewlectures['id']?>&editlectures=awards&accr=1&lecturespanel=1">Edit</a>&nbsp;|&nbsp;<a href="instructional_facility.php?ind_id=<?=$viewlectures['ind_id']?>&id=<?=$viewlectures['id']?>&dellectures=val&lecturespanel=1" style="color:#ff0000;">Delete</a></td>
                                    </tr>
                                    <!--SUB LEVEL I-->
                                    <tr style="display:none; background-color:#000;" id="link<?php echo $viewlectures['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Link to recorded video/audio</th>
                                                <th>Link to live camera/microphone</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
                                                    $sqlinslec=mysqli_query($con, "SELECT sl.*, sll.* FROM na_sch_lectures as sl INNER JOIN na_sch_lec_link as sll on sl.id=sll.sch_lectures_id WHERE sll.sch_lectures_id='".$viewlectures['id']."'");
                                                          while($fetchleclink=mysqli_fetch_array($sqlinslec)){	
                                                    ?>
                                              <tr>
                                                <td><?php echo $fetchleclink['video_audio']?></td>
                                                <td><?php echo $fetchleclink['cam_microphone']?></td>
                                                <td><?=date('jS F Y',strtotime($fetchleclink['lastedit']))?></td>
                                                
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchleclink['ind_id']?>&linkid=<?=$fetchleclink['sll_id']?>&editleclinkform=1&accr=1&lecturespanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchleclink['ind_id']?>&id=<?=$fetchleclink['sll_id']?>&dellecturespanellink=val&lecturespanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                                $(document).ready(function(){
                                                $("#lin<?php echo $viewlectures['id']?>").click(function(){
                                                $("#link<?php echo $viewlectures['id']?>").toggle();
                                                });
                                                });
                                                </script>
                                    <!--SUB LEVEL I-->
                                    <!--SUB LEVEL II -->
                                    <tr style="display:none; background-color:#000;" id="subcls<?php echo $viewlectures['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Link to recorded video/audio</th>
                                                <th>Link to live camera/microphone</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
                                                    $sqlinssub=mysqli_query($con, "SELECT sl.*, sls.* FROM na_sch_lectures as sl INNER JOIN na_sch_lec_subcls as sls on sl.id=sls.sch_lectures_id WHERE sls.sch_lectures_id='".$viewlectures['id']."'");
                                                          while($fetchlecsub=mysqli_fetch_array($sqlinssub)){	
                                                    ?>
                                              <tr>
                                                <td><?php echo $fetchlecsub['video_audio_subcls']?></td>
                                                <td><?php echo $fetchlecsub['cam_microphone_subcls']?></td>
                                                <td><?=date('jS F Y',strtotime($fetchlecsub['lastedit']))?></td>
                                                
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchlecsub['ind_id']?>&subclsid=<?=$fetchlecsub['sls_id']?>&editlecsubclsform=1&accr=1&lecturespanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchlecsub['ind_id']?>&id=<?=$fetchlecsub['sls_id']?>&dellecturespanelsubcls=val&lecturespanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                                $(document).ready(function(){
                                                $("#sub<?php echo $viewlectures['id']?>").click(function(){
                                                $("#subcls<?php echo $viewlectures['id']?>").toggle();
                                                });
                                                });
                                                </script>
                                    <!--SUB LEVEL II -->
                                    <!--SUB LEVEL III -->
                                    <tr style="display:none; background-color:#000;" id="arccls<?php echo $viewlectures['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Link to recorded video/audio</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
                                                    $sqlinsarc=mysqli_query($con, "SELECT sl.*, sla.* FROM na_sch_lectures as sl INNER JOIN na_sch_lec_arccls as sla on sl.id=sla.sch_lectures_id WHERE sla.sch_lectures_id='".$viewlectures['id']."'");
                                                          while($fetchlecarc=mysqli_fetch_array($sqlinsarc)){	
                                                    ?>
                                              <tr>
                                                <td><?php echo $fetchlecarc['video_audio_arccls']?></td>
                                                <td><?=date('jS F Y',strtotime($fetchlecarc['lastedit']))?></td>
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchlecarc['ind_id']?>&arcclsid=<?=$fetchlecarc['sla_id']?>&editlecarcclsform=1&accr=1&lecturespanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchlecarc['ind_id']?>&id=<?=$fetchlecarc['sla_id']?>&dellecturespanelarccls=val&lecturespanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                                $(document).ready(function(){
                                                $("#arc<?php echo $viewlectures['id']?>").click(function(){
                                                $("#arccls<?php echo $viewlectures['id']?>").toggle();
                                                });
                                                });
                                                </script>
                                    <!--SUB LEVEL III -->
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                              <?php }?>
                            </div>
                            <?php } else { ?>
                            <form name="lecturesform" id="lecturesform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="lecturespanel" value="1" />
                              <input type="hidden" name="lecturesdid" value="<?=$viewlectures['id']?>" />
                              <div class="pmbb-edit" style="display:block;">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Videos of classes*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type="text" class="form-control " value="<?php echo $viewlectures['video']?>" id="video" name="video" placeholder="Video Link">
                                    </div>
                                    <span id="lectures_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Accepted Substitute Classes</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control " value="<?php echo $viewlectures['accepted_sub_classes']?>" id="accepted_sub_classes" name="accepted_sub_classes" data-toggle="dropdown" placeholder="Accepted Substitute Classes">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Archived Classes</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control " value="<?php echo $viewlectures['archived_classes']?>" id="archived_classes" name="archived_classes" data-toggle="dropdown" placeholder="Archived Classes">
                                    </div>
                                  </dd>
                                </dl>
                                <div class="m-t-30">
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecturessubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <?php } ?>
                            <form name="lecturesform" id="lecturesform" onsubmit="return Submitlectures3();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="lecturespanel" value="1" />
                              <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Videos of classes*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type="text" class="form-control" id="video" name="video" placeholder="Video Link">
                                    </div>
                                    <span id="lectures_error3" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Accepted Substitute Classes</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" id="accepted_sub_classes" name="accepted_sub_classes" data-toggle="dropdown" placeholder="Accepted Substitute Classes">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Archived Classes</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control"  id="archived_classes" name="archived_classes" data-toggle="dropdown" placeholder="Archived Classes">
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
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecturessubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <script>
                                        function Submitlectures3(){
                                        if($("#video").val() == "" ){
                                        $("#video").focus();
                                        $("#lectures_error3").html("Please Enter Video Link");
                                        return false;
                                        }else{
                                        $("#lectures_error3").html("");
                                        }
                                        }
                                        </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  Add Lectures  -->
                </div><br>
                <script>
                $(document).ready(function(){
                $("#sd").click(function(){
                $("#sdsh").toggle();
                });
                });
                </script>
                <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="asd" style="color:#FFF;">Affiliate Schools/Divisions</a></h4>
               <div id="asdi" <?php if(@$_REQUEST['affiliateschoolspanel']==1 || @$_REQUEST['affiliateschoolslecturepanel']==1) {?> style="display:block;" <?php }?> style="display:none;">
                  <!-- Add Affiliate  Schools/ Divisions -->
                  <div class="panel panel-collapse">
                    <div <?php if(@$_REQUEST['affiliateschoolspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-affiliateschools" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Affiliateschools/Divisions: </a> </h4>
                    </div>
                    <div id="accordionTeal-affiliateschools" <?php if(@$_REQUEST['affiliateschoolspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                            <?php if(@$_REQUEST['editaffiliateschools']=='') { ?>
                            <div class="pmbb-view">
                              <ul class="actions" style="position:static; float:right;">
                                <li class="dropdown open"> &nbsp;
                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                    <li><a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                  </ul>
                                </li>
                              </ul>
                              <?php 
                                if(@$_REQUEST['addinstrucocu']==1){
                                ?>
                              <div>
                                <form  onsubmit="return cocu();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Courses*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="courses" name="courses" placeholder="Course">
                                      </div>
                                      <span id="error_courses" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="cocusubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function cocu(){
                                if($("#courses").val() == "" ){
                                $("#courses").focus();
                                $("#error_courses").html("Please Enter Courses");
                                return false;
                                }else{
                                $("#error_courses").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php 
                                if(@$_REQUEST['editcourseform']==1){
                                ?>
                              <div>
                                <form  onsubmit="return cocu1();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['courseid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Courses*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="courses1" name="courses" placeholder="Course" value="<?=$fetchlinkcourse['courses']?>">
                                      </div>
                                      <span id="error_courses1" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="cocueditsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function cocu1(){
                                if($("#courses1").val() == "" ){
                                $("#courses1").focus();
                                $("#error_courses1").html("Please Enter Courses");
                                return false;
                                }else{
                                $("#error_courses1").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['addinstrucourcur']==1) {?>
                              <div>
                                <form  onsubmit="return block789();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Syllabus*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <textarea type="text" class="form-control" id="syllabus" name="syllabus" cols="6" placeholder="Syllabus"></textarea>
                                      </div>
                                      <span id="errorsyllabus" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Course/Class/Lecture Schedule</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control date-picker" name="lecturescheduleone" data-toggle="dropdown" placeholder="Lecture Schedule">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Accepted Transfer Courses/Other Educational Institutions</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control" name="othereduins" placeholder="Other Educational Institutions">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="syllabusonesubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function block789(){
                                if($("#syllabus").val() == "" ){
                                $("#syllabus").focus();
                                $("#errorsyllabus").html("Please Enter Syllabus");
                                return false;
                                }else{
                                $("#errorsyllabus").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editcourafscform']==1) {?>
                              <div>
                                <form  onsubmit="return block221();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['courafscid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Syllabus*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <textarea type="text" class="form-control" id="syllabus1" name="syllabus" cols="6" placeholder="Syllabus"><?=stripslashes($fetchlinkcourafsc['syllabus'])?>
</textarea>
                                      </div>
                                      <span id="errorsyllabus1" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Course/Class/Lecture Schedule</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control date-picker" name="lecturescheduleone" data-toggle="dropdown" value="<?=date('d-m-Y', strtotime($fetchlinkcourafsc['lecturescheduleone']))?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Accepted Transfer Courses/Other Educational Institutions</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control" name="othereduins" value="<?=$fetchlinkcourafsc['othereduins']?>" placeholder="Other Educational Institutions">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="editcourafscsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function block221(){
                                if($("#syllabus1").val() == "" ){
                                $("#syllabus1").focus();
                                $("#errorsyllabus1").html("Please Enter Syllabus");
                                return false;
                                }else{
                                $("#errorsyllabus1").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['addinstrucocu']!=1 && @$_REQUEST['editcourseform']!=1 && @$_REQUEST['addinstrucourcur']!=1 && @$_REQUEST['editcourafscform']!=1) {?>
                              <dl class="dl-horizontal">
                                <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Academic Programs</th>
                                      <th>Course/Program Bulletin</th>
                                      <th>Curriculum</th>
                                      <th>Add Course for Curriculum</th>
                                      <th>View Course for Curriculum</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                while($viewaffiliateschools = mysqli_fetch_array($resqueryaffiliateschools)) {
                                ?>
                                    <tr>
                                      <td><?=$viewaffiliateschools['program'];?></td>
                                      <td><?=$viewaffiliateschools['course'];?></td>
                                      <td><?=$viewaffiliateschools['curriculum'];?></td>
                                      
                                      <td><a href="instructional_facility.php?affiliateschoolspanel=1&addinstrucocu=1&addinstrufaccatch=1&ind_id=<?=$viewaffiliateschools['ind_id']?>&id=<?=$viewaffiliateschools['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="course<?php echo $viewaffiliateschools['id']?>"><img src="img/show.png" /></a></td>
                                      <td><?=date('jS F Y',strtotime($viewaffiliateschools['lastedit']))?></td>
                                      
                                      <td><a href="instructional_facility.php?ind_id=<?=$viewaffiliateschools['ind_id']?>&id=<?=$viewaffiliateschools['id']?>&editaffiliateschools=awards&accr=1&affiliateschoolspanel=1">Edit</a>&nbsp;|&nbsp;<a href="instructional_facility.php?ind_id=<?=$viewaffiliateschools['ind_id']?>&id=<?=$viewaffiliateschools['id']?>&delaffiliateschools=val&affiliateschoolspanel=1" style="color:#ff0000;">Delete</a></td>
                                    </tr>
                                    <!--SUB LEVEL I-->
                                    <tr style="display:none; background-color:#000;" id="courses<?php echo $viewaffiliateschools['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Courses</th>
                                                <th>Add Details</th>
                                                <th>View Details</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
                                                $sqlinscourse=mysqli_query($con, "SELECT sas.*, sasc.* FROM na_sch_affiliate_schools as sas INNER JOIN na_sch_affiliate_schools_course as sasc on sas.id=sasc.sch_affiliate_schools_id WHERE sasc.sch_affiliate_schools_id='".$viewaffiliateschools['id']."'");
                                                while($fetchleccourse=mysqli_fetch_array($sqlinscourse)){	
                                                ?>
                                              <tr>
                                                <td><?php echo $fetchleccourse['courses']?></td>
                                                <td><a href="instructional_facility.php?affiliateschoolspanel=1&addinstrucourcur=1&addinstrufaccatch=1&ind_id=<?=$fetchleccourse['ind_id']?>&id=<?=$fetchleccourse['sasc_id']?>"><img src="img/add.png" /></a></td>
                                                <td><a id="frafsc<?php echo $fetchleccourse['sasc_id']?>"><img src="img/show.png" /></a></td>
                                                <td><?=date('jS F Y',strtotime($fetchleccourse['lastedit']))?></td>
                                                
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchleccourse['ind_id']?>&courseid=<?=$fetchleccourse['sasc_id']?>&editcourseform=1&accr=1&affiliateschoolspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchleccourse['ind_id']?>&id=<?=$fetchleccourse['sasc_id']?>&delaffiliateschoolspanelcourse=val&affiliateschoolspanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <!--Sub of the sub level-->
                                              <tr style="display:none; background-color:#d9a773;" id="coursefrafsc<?php echo $fetchleccourse['sasc_id']?>">
                                                <td colspan="10"><div style="col-sm-12">
                                                    <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                      <thead>
                                                        <tr>
                                                          <th>Syllabus</th>
                                                          <th>Course/Class/Lecture Schedule</th>
                                                          <th>Accepted Transfer Courses/Other Educational Institutions</th>
                                                          <th>Track Date(Add/Edit)</th>
                                                          <th>Action</th>
                                                        </tr>
                                                        <?php
                                            $sqlinscourafsc=mysqli_query($con, "SELECT sasc.*, sascd.* FROM na_sch_affiliate_schools_course as sasc INNER JOIN na_sch_affiliate_schools_course_details as sascd on sasc.sasc_id=sascd.sch_affiliate_schools_course_id WHERE sascd.sch_affiliate_schools_course_id='".$fetchleccourse['sasc_id']."'");
                                                  while($fetchcourafsc=mysqli_fetch_array($sqlinscourafsc)){	
                                            	  ?>
                                                        <tr>
                                                          <td><?php echo substr(stripslashes($fetchcourafsc['syllabus']),0,200)?></td>
                                                          <td><?=date('Y-m-d', strtotime($fetchcourafsc['lecturescheduleone']))?></td>
                                                          <td><?php echo $fetchcourafsc['othereduins']?></td>
                                                          <td><?=date('jS F Y',strtotime($fetchcourafsc['lastedit']))?></td>
                                                          <td><a href="instructional_facility.php?ind_id=<?=$fetchcourafsc['ind_id']?>&courafscid=<?=$fetchcourafsc['sascd_id']?>&editcourafscform=1&accr=1&affiliateschoolspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchcourafsc['ind_id']?>&id=<?=$fetchcourafsc['sascd_id']?>&delcourafsclink=val&affiliateschoolspanel=1" style="color:#ff0000;">Delete</a></td>
                                                        </tr>
                                                        <?php }?>
                                                      </thead>
                                                    </table>
                                                  </div></td>
                                              </tr>
                                              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                              <script>
												$(document).ready(function(){
													$("#frafsc<?php echo $fetchleccourse['sasc_id']?>").click(function(){
													$("#coursefrafsc<?php echo $fetchleccourse['sasc_id']?>").toggle();
													});
												});
                                              </script>
                                              <!--Sub of the sub level-->
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                    $(document).ready(function(){
                                    $("#course<?php echo $viewaffiliateschools['id']?>").click(function(){
                                    $("#courses<?php echo $viewaffiliateschools['id']?>").toggle();
                                    });
                                    });
                                    </script>
                                    <!--SUB LEVEL I-->
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                              <?php }?>
                            </div>
                            <?php } else { ?>
                            <form name="affiliateschoolsform" id="affiliateschoolsform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="affiliateschoolspanel" value="1" />
                              <input type="hidden" name="affiliateschoolsdid" value="<?=$viewaffiliateschools['id']?>" />
                              <div class="pmbb-edit" style="display:block;">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Academic Programs*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <select class="form-control" name="program" id="program">
                                        <option value="">Please Select</option>
                                        <option value="diploma" <?php if("diploma"==$viewaffiliateschools['program']){ echo 'selected' ; }?>>Diploma</option>
                                        <option value="certificate" <?php if("certificate"==$viewaffiliateschools['program']){ echo 'selected' ; }?>>Certificate</option>
                                        <option value="degree" <?php if("degree"==$viewaffiliateschools['program']) { echo 'selected' ; }?>>Degree</option>
                                      </select>
                                    </div>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Course/Program Bulletin</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type="text" class="form-control " value="<?php echo $viewaffiliateschools['course']?>" id="course" name="course" placeholder="Course">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Curriculum</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type="text" class="form-control " value="<?php echo $viewaffiliateschools['curriculum']?>" id="curriculum" name="curriculum" placeholder="Curriculum">
                                    </div>
                                  </dd>
                                </dl>
                                <div class="m-t-30">
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="affiliateschoolssubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <?php } ?>
                            <form name="affiliateschoolsform" id="affiliateschoolsform"  enctype="multipart/form-data" onsubmit="return Submitaffiliateschools3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="affiliateschoolspanel" value="1" />
                              <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Academic Programs*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <select class="form-control" name="program" id="program">
                                        <option value="">Please Select</option>
                                        <option value="diploma" name="diploma">Diploma</option>
                                        <option value="certificate" name="certificate">Certificate</option>
                                        <option value="degree" name="degree">Degree</option>
                                      </select>
                                    </div>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Course/Program Bulletin</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type="text" class="form-control " value="" id="course" name="course" placeholder="Course">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Curriculum</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type="text" class="form-control" id="curriculum" name="curriculum" placeholder="Curriculum">
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
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="affiliateschoolssubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <!--<script>
                            function Submitaffiliateschools3(){
                            if($("#program123").val() == "" ){
                            $("#program123").focus();
                            $("#affiliateschools_error3").html("Please Enter program");
                            return false;
                            }else{
                            $("#affiliateschools_error3").html("");
                            }
                            }
                            </script>-->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Add Affiliate  Schools/ Divisions -->
                  <!-- Add Lectures -->
                  <div class="panel panel-collapse">
                    <div <?php if(@$_REQUEST['affiliateschoolslecturepanel']!='') { ?>class="panel-heading active"<?php } else { ?>class="panel-heading"<?php } ?> role="tab" id="awardpanel">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-affiliateschoolslecture" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Classes and Lectures: </a> </h4>
                    </div>
                    <div id="accordionTeal-affiliateschoolslecture" <?php if(@$_REQUEST['affiliateschoolslecturepanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                            <?php if(@$_REQUEST['editaffiliateschools']=='') { ?>
                            <div class="pmbb-view">
                              <ul class="actions" style="position:static; float:right;">
                                <li class="dropdown open"> &nbsp;
                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                  </ul>
                                </li>
                              </ul>
                              <?php if(@$_REQUEST['addinstrulecafsc']==1){
                                ?>
                              <div>
                                <form  onsubmit="return addinstrulecafsc();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="nameafsc" name="video_audio" placeholder="Link">
                                      </div>
                                      <span id="errorafsc" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to live camera/microphone</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" id="cam_microphone" name="cam_microphone" placeholder="Link">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecafscsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function addinstrulecafsc(){
                                if($("#nameafsc").val() == "" ){
                                $("#nameafsc").focus();
                                $("#errorafsc").html("Please Enter Link");
                                return false;
                                }else{
                                $("#errorafsc").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editleclinkafscform']==1) {?>
                              <div>
                                <form  onsubmit="return editleclinkafscform();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['linkidafsc']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="nameafsc" name="video_audio" placeholder="Link" value="<?=$fetchlinkafsc['video_audio']?>">
                                      </div>
                                      <span id="errorafsc" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to live camera/microphone</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" id="cam_microphone" name="cam_microphone" placeholder="Link" value="<?=$fetchlinkafsc['cam_microphone']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="leceditafscsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function editleclinkafscform(){
                                if($("#nameafsc").val() == "" ){
                                $("#nameafsc").focus();
                                $("#errorafsc").html("Please Enter Link");
                                return false;
                                }else{
                                $("#errorafsc").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['addinstrusubclsafsc']==1){
                                ?>
                              <div>
                                <form  onsubmit="return addinstrusubclsafsc();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="nameafsc1" name="video_audio_subcls" placeholder="Link">
                                      </div>
                                      <span id="errorafsc1" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to live camera/microphone</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" id="cam_microphone" name="cam_microphone_subcls" placeholder="Link">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecafscsubmitsubclass">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function addinstrusubclsafsc(){
                                if($("#nameafsc1").val() == "" ){
                                $("#nameafsc1").focus();
                                $("#errorafsc1").html("Please Enter Link");
                                return false;
                                }else{
                                $("#errorafsc1").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editlecsubclsafscform']==1){
                                ?>
                              <div>
                                <form  onsubmit="return editlecsubclsafscform();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="facilitiesteacherpanel" value="1" />
                                  <input type="hidden" name="id" value="<?=$_REQUEST['subclsafscid']?>"/>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="nameafsc2" name="video_audio_subcls" placeholder="Link" value="<?=$fetchsubclsafsc['video_audio_subcls']?>">
                                      </div>
                                      <span id="errorafsc2" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to live camera/microphone</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" id="cam_microphone_subcls" name="cam_microphone_subcls" placeholder="Link" value="<?=$fetchsubclsafsc['cam_microphone_subcls']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="leceditsubclsafscsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function editlecsubclsafscform(){
                                if($("#nameafsc2").val() == "" ){
                                $("#nameafsc2").focus();
                                $("#errorafsc2").html("Please Enter Link");
                                return false;
                                }else{
                                $("#errorafsc2").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['addinstruarcclsafsc']==1) {?>
                              <div>
                                <form  onsubmit="return addinstruarcclsafsc();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="nameaddinstruarcclsafsc" name="video_audio_arccls" placeholder="Link">
                                      </div>
                                      <span id="erroraddinstruarcclsafsc" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecsubmitarcafscclass">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function addinstruarcclsafsc(){
                                if($("#nameaddinstruarcclsafsc").val() == "" ){
                                $("#nameaddinstruarcclsafsc").focus();
                                $("#erroraddinstruarcclsafsc").html("Please Enter Link");
                                return false;
                                }else{
                                $("#erroraddinstruarcclsafsc").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editlecarcclsafscform']==1) {?>
                              <div>
                                <form  onsubmit="return editlecarcclsafscform();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['arcclsafscid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to recorded video/audio*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="nameeditlecarcclsafscform" name="video_audio_arccls" placeholder="Link" value="<?=$fetcharcclsafsc['video_audio_arccls']?>">
                                      </div>
                                      <span id="erroreditlecarcclsafscform" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="leceditarcclsafscsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function editlecarcclsafscform(){
                                if($("#nameeditlecarcclsafscform").val() == "" ){
                                $("#nameeditlecarcclsafscform").focus();
                                $("#erroreditlecarcclsafscform").html("Please Enter Link");
                                return false;
                                }else{
                                $("#erroreditlecarcclsafscform").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php 
                            if(@$_REQUEST['addinstrulecafsc']!=1 && @$_REQUEST['editleclinkafscform']!=1 && @$_REQUEST['addinstrusubclsafsc']!=1 && @$_REQUEST['editlecsubclsafscform']!=1 && @$_REQUEST['addinstruarcclsafsc']!=1 && @$_REQUEST['editlecarcclsafscform']!=1){
                            ?>
                              <dl class="dl-horizontal">
                                <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Videos of classes</th>
                                      <th>Add Links</th>
                                      <th>View Links</th>
                                      <th>Accepted Substitute Classes</th>
                                      <th>Add Links for Classes</th>
                                      <th>View Links for Classes</th>
                                      <th>Archived Classes</th>
                                      <th>Add Links for Past Classes</th>
                                      <th>View Links for Past Classes</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
								  	while($viewlectures111 = mysqli_fetch_array($resquery111)) {
								  ?>
                                    <tr>
                                      <td><?=$viewlectures111['video'];?></td>
                                      <!--DONE-->
                                      <td><a href="instructional_facility.php?affiliateschoolslecturepanel=1&addinstrulecafsc=1&addinstrufaccatch=1&ind_id=<?=$viewlectures111['ind_id']?>&id=<?=$viewlectures111['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="linafsc<?php echo $viewlectures111['id']?>"><img src="img/show.png" /></a></td>
                                      <!--DONE-->
                                      <td><?=$viewlectures111['accepted_sub_classes'];?></td>
                                      <!--DONE-->
                                      <td><a href="instructional_facility.php?affiliateschoolslecturepanel=1&addinstrusubclsafsc=1&addinstrufaccatch=1&ind_id=<?=$viewlectures111['ind_id']?>&id=<?=$viewlectures111['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="subafsc<?php echo $viewlectures111['id']?>"><img src="img/show.png" /></a></td>
                                      <!--DONE-->
                                      <td><?=$viewlectures111['archived_classes'];?></td>
                                      <!--DONE-->
                                      <td><a href="instructional_facility.php?affiliateschoolslecturepanel=1&addinstruarcclsafsc=1&addinstrufaccatch=1&ind_id=<?=$viewlectures111['ind_id']?>&id=<?=$viewlectures111['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="arcafsc<?php echo $viewlectures111['id']?>"><img src="img/show.png" /></a></td>
                                      <!--DONE-->
                                      <td><?=date('jS F Y',strtotime($viewlectures111['lastedit']))?></td>
                                      <td><a href="instructional_facility.php?ind_id=<?=$viewlectures111['ind_id']?>&id=<?=$viewlectures111['id']?>&editaffiliateschools=awards&accr=1&affiliateschoolslecturepanel=1">Edit</a>&nbsp;|&nbsp;<a href="instructional_facility.php?ind_id=<?=$viewlectures111['ind_id']?>&id=<?=$viewlectures111['id']?>&delafsclectures=val&affiliateschoolslecturepanel=1" style="color:#ff0000;">Delete</a></td>
                                    </tr>
                                    <!--SUB LEVEL I-->
                                    <tr style="display:none; background-color:#000;" id="linkafsc<?php echo $viewlectures111['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Link to recorded video/audio</th>
                                                <th>Link to live camera/microphone</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
										$sqlinslecafsc=mysqli_query($con, "SELECT sla.*, slla.* FROM na_sch_lectures_afschools as sla INNER JOIN na_sch_lec_link_afschools as slla on sla.id=slla.sch_lectures_afschools_id WHERE slla.sch_lectures_afschools_id='".$viewlectures111['id']."'");
											  while($fetchleclinkafsc=mysqli_fetch_array($sqlinslecafsc)){	
										?>
                                              <tr>
                                                <td><?php echo $fetchleclinkafsc['video_audio']?></td>
                                                <td><?php echo $fetchleclinkafsc['cam_microphone']?></td>
                                                <td><?=date('jS F Y',strtotime($fetchleclinkafsc['lastedit']))?></td>
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchleclinkafsc['ind_id']?>&linkidafsc=<?=$fetchleclinkafsc['slla_id']?>&editleclinkafscform=1&accr=1&affiliateschoolslecturepanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchleclinkafsc['ind_id']?>&id=<?=$fetchleclinkafsc['slla_id']?>&dellecturespanelafsclink=val&affiliateschoolslecturepanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                    $(document).ready(function(){
                                    $("#linafsc<?php echo $viewlectures111['id']?>").click(function(){
                                    $("#linkafsc<?php echo $viewlectures111['id']?>").toggle();
                                    });
                                    });
                                    </script>
                                    <!--SUB LEVEL I-->
                                    <!--SUB LEVEL II -->
                                    <tr style="display:none; background-color:#000;" id="subclsafsc<?php echo $viewlectures111['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Link to recorded video/audio</th>
                                                <th>Link to live camera/microphone</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
										$sqlinssubafsc=mysqli_query($con, "SELECT sla.*, slsa.* FROM na_sch_lectures_afschools as sla INNER JOIN na_sch_lec_subcls_afschools as slsa on sla.id=slsa.sch_lectures_afschools_id WHERE slsa.sch_lectures_afschools_id='".$viewlectures111['id']."'");
											  while($fetchlecsubafsc=mysqli_fetch_array($sqlinssubafsc)){	
										?>
                                              <tr>
                                                <td><?php echo $fetchlecsubafsc['video_audio_subcls']?></td>
                                                <td><?php echo $fetchlecsubafsc['cam_microphone_subcls']?></td>
                                                <td><?=date('jS F Y',strtotime($fetchlecsubafsc['lastedit']))?></td>
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchlecsubafsc['ind_id']?>&subclsafscid=<?=$fetchlecsubafsc['slsa_id']?>&editlecsubclsafscform=1&accr=1&affiliateschoolslecturepanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchlecsubafsc['ind_id']?>&id=<?=$fetchlecsubafsc['slsa_id']?>&delaffiliateschoolssubclsafsc=val&affiliateschoolslecturepanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                    $(document).ready(function(){
                                    $("#subafsc<?php echo $viewlectures111['id']?>").click(function(){
                                    $("#subclsafsc<?php echo $viewlectures111['id']?>").toggle();
                                    });
                                    });
                                    </script>
                                    <!--SUB LEVEL II -->
                                    <!--SUB LEVEL III -->
                                    <tr style="display:none; background-color:#000;" id="arcclsafsc<?php echo $viewlectures111['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Link to recorded video/audio</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
										$sqlinsarcafsc=mysqli_query($con, "SELECT sla.*, slaa.* FROM na_sch_lectures_afschools as sla INNER JOIN na_sch_lec_arccls_afschools as slaa on sla.id=slaa.sch_lectures_afschools_id WHERE slaa.sch_lectures_afschools_id='".$viewlectures111['id']."'");
											  while($fetchlecarcafsc=mysqli_fetch_array($sqlinsarcafsc)){	
										?>
                                              <tr>
                                                <td><?php echo $fetchlecarcafsc['video_audio_arccls']?></td>
                                                <td><?=date('jS F Y',strtotime($fetchlecarcafsc['lastedit']))?></td>
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchlecarcafsc['ind_id']?>&arcclsafscid=<?=$fetchlecarcafsc['slaa_id']?>&editlecarcclsafscform=1&accr=1&affiliateschoolslecturepanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchlecarcafsc['ind_id']?>&id=<?=$fetchlecarcafsc['slaa_id']?>&dellecturespanelarcclsafsc=val&affiliateschoolslecturepanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                    $(document).ready(function(){
                                    $("#arcafsc<?php echo $viewlectures111['id']?>").click(function(){
                                    $("#arcclsafsc<?php echo $viewlectures111['id']?>").toggle();
                                    });
                                    });
                                    </script>
                                    <!--SUB LEVEL III -->
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                              <?php }?>
                            </div>
                            <?php } else { ?>
                            <form name="affiliateschoolslectureform" id="affiliateschoolslectureform" onsubmit="return blankvalidation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="affiliateschoolslecturepanel" value="1" />
                              <input type="hidden" name="lecturesforaffiliateschoolid" value="<?=$viewlectures111['id']?>" />
                              <div class="pmbb-edit" style="display:block;">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Videos of classes*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control " value="<?php echo $viewlectures111['video']?>" id="videoafscedit" name="video" placeholder="Video Link">
                                    </div>
                                    <span id="lecturesafsclecedit" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Accepted Substitute Classes</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control " value="<?php echo $viewlectures111['accepted_sub_classes']?>" id="accepted_sub_classes" name="accepted_sub_classes" placeholder="Accepted Substitute Classes">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Archived Classes</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control " value="<?php echo $viewlectures111['archived_classes']?>" id="archived_classes" name="archived_classes" data-toggle="dropdown" placeholder="Archived Classes">
                                    </div>
                                  </dd>
                                </dl>
                                <div class="m-t-30">
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecturessubmitforafsc">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <script>
                            function blankvalidation(){
                            if($("#videoafscedit").val() == "" ){
                            $("#videoafscedit").focus();
                            $("#lecturesafsclecedit").html("Please Enter Video Link");
                            return false;
                            }else{
                            $("#lecturesafsclecedit").html("");
                            }
                            }
                            </script>
                            <?php } ?>
                            <form name="affiliateschoolslectureform" id="affiliateschoolslectureform"  enctype="multipart/form-data" onsubmit="return validation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="affiliateschoolslecturepanel" value="1" />
                              <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Videos of classes*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type="text" class="form-control" id="videoafsc" name="video" placeholder="Video Link">
                                    </div>
                                    <span id="lecturesafsclec" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Accepted Substitute Classes</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" id="accepted_sub_classes" name="accepted_sub_classes" data-toggle="dropdown" placeholder="Accepted Substitute Classes">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Archived Classes</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control"  id="archived_classes" name="archived_classes" data-toggle="dropdown" placeholder="Archived Classes">
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
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="lecturessubmitforafsc">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <script>
                            function validation(){
                            if($("#videoafsc").val() == "" ){
                            $("#videoafsc").focus();
                            $("#lecturesafsclec").html("Please Enter Video Link");
                            return false;
                            }else{
                            $("#lecturesafsclec").html("");
                            }
                            }
                            </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--  Add Lectures  -->
                </div><br>
                <script>
                $(document).ready(function(){
                $("#asd").click(function(){
                $("#asdi").toggle();
                });
                });
                </script>
                <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="stu" style="color:#FFF;">Students</a></h4>
                <div id="stud" <?php if(@$_REQUEST['studentspanel']==1) {?> style="display:block;" <?php }?> style="display:none;">
                  <!--ADD STUDENTS-->
                  <div class="panel panel-collapse">
                    <div <?php if(@$_REQUEST['studentspanel']!='') { ?>class="panel-heading active"<?php } else { ?>class="panel-heading"<?php } ?> role="tab" id="awardpanel">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-students" data-parent="#accordionTeal" data-toggle="collapse" class=""> Students: </a> </h4>
                    </div>
                    <div id="accordionTeal-students" <?php if(@$_REQUEST['studentspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                            <?php if(@$_REQUEST['editstudents']=='') { ?>
                            <div class="pmbb-view">
                              <ul class="actions" style="position:static; float:right;">
                                <li class="dropdown open"> &nbsp;
                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                  </ul>
                                </li>
                              </ul>
                              <!--New-->
                              <?php if(@$_REQUEST['addtransforstu']==1){
                                ?>
                              <div>
                                <form  onsubmit="return addtransforstu();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Student ID No*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="stuidfortranscript" name="student_id" placeholder="Student ID No">
                                      </div>
                                      <span id="errorstuidfortranscript" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Courses/Classes taken</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="coursesclasses_taken" placeholder="Courses/Classes Taken">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Courses/Classes Enrolled</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="coursesclasses_enrolled" placeholder="Courses/Classes Enrolled">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Diploma, Certificate, or Degree Conferred</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="degree_conferred" placeholder="Degree Conferred">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Date Conferred</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control date-picker" name="date_conferred" data-toggle="dropdown" placeholder="Date Conferred">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Transcripts/Record</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="transcripts" placeholder="Transcripts/Record">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Misc. and Other</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <textarea type="text" class="form-control" name="miscellaneous" id="miscellaneous" placeholder="Miscellaneous" cols="8"></textarea>
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="addtransforstusubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function addtransforstu(){
                                if($("#stuidfortranscript").val() == "" ){
                                $("#stuidfortranscript").focus();
                                $("#errorstuidfortranscript").html("Please Enter Student ID");
                                return false;
                                }else{
                                $("#errorstuidfortranscript").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['edittranscriptform']==1) {?>
                              <div>
                                <form  onsubmit="return edittranscriptform();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['tranfstid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Student ID No*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="stuidfortranscriptedit" name="student_id" placeholder="Student ID No" value="<?=$fetchlinktrafstu['student_id']?>">
                                      </div>
                                      <span id="errorstuidfortranscriptedit" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Courses/Classes taken</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="coursesclasses_taken" placeholder="Courses/Classes Taken" value="<?=$fetchlinktrafstu['coursesclasses_taken']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Courses/Classes Enrolled</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="coursesclasses_enrolled" placeholder="Courses/Classes Enrolled" value="<?=$fetchlinktrafstu['coursesclasses_enrolled']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Diploma, Certificate, or Degree Conferred</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="degree_conferred" placeholder="Degree Conferred" value="<?=$fetchlinktrafstu['degree_conferred']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Date Conferred</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type='text' class="form-control date-picker" name="date_conferred" data-toggle="dropdown" placeholder="Date Conferred" value="<?=date('d-m-Y', strtotime($fetchlinktrafstu['date_conferred']))?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Transcripts/Record</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="transcripts" placeholder="Transcripts/Record" value="<?=$fetchlinktrafstu['transcripts']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Misc. and Other</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <textarea type="text" class="form-control" name="miscellaneous" id="miscellaneous" placeholder="Miscellaneous" cols="8"><?=$fetchlinktrafstu['miscellaneous']?>
</textarea>
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="tranforstueditsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function edittranscriptform(){
                                if($("#stuidfortranscriptedit").val() == "" ){
                                $("#stuidfortranscriptedit").focus();
                                $("#errorstuidfortranscriptedit").html("Please Enter Student ID");
                                return false;
                                }else{
                                $("#errorstuidfortranscriptedit").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['addcoursetaken']==1){
                                ?>
                              <div>
                                <form  onsubmit="return addcoursetaken();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Grade(s)/Scores/Achievements*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="gradescore" name="grades" placeholder="Grade(s)/Scores/Achievements">
                                      </div>
                                      <span id="errorgradescore" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Course/Class Attendance</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="attendance" placeholder="Class Attendance">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="tranforstuclasstakenadd">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function addcoursetaken(){
                                if($("#gradescore").val() == "" ){
                                $("#gradescore").focus();
                                $("#errorgradescore").html("Please Enter Grades");
                                return false;
                                }else{
                                $("#errorgradescore").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editcourtakform']==1){
                                ?>
                              <div>
                                <form  onsubmit="return editcourtakform();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['coursetakenid']?>"/>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Grade(s)/Scores/Achievements*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="gradescoreedit" name="grades" placeholder="Grade(s)/Scores/Achievements" value="<?=$fetchtrafstucou['grades']?>">
                                      </div>
                                      <span id="errorgradescoreedit" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Course/Class Attendance</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="attendance" placeholder="Class Attendance" value="<?=$fetchtrafstucou['attendance']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="traforstuclstakensubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function editcourtakform(){
                                if($("#gradescoreedit").val() == "" ){
                                $("#gradescoreedit").focus();
                                $("#errorgradescoreedit").html("Please Enter Link");
                                return false;
                                }else{
                                $("#errorgradescoreedit").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['addcourseenrol']==1) {
                                ?>
                              <div>
                                <form  onsubmit="return addcourseenrol();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Grade(s)/Scores/Achievements*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="gradescoreenrol" name="gradesenrol" placeholder="Grade(s)/Scores/Achievements">
                                      </div>
                                      <span id="errorgradescoreenrol" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Course/Class Attendance</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="attendanceenroll" placeholder="Class Attendance">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="tranforstuclassenroladd">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function addcourseenrol(){
                                if($("#gradescoreenrol").val() == "" ){
                                $("#gradescoreenrol").focus();
                                $("#errorgradescoreenrol").html("Please Enter Grades");
                                return false;
                                }else{
                                $("#errorgradescoreenrol").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editcourenrform']==1) {?>
                              <div>
                                <form  onsubmit="return editcourenrform();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['courseenrolledid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Grade(s)/Scores/Achievements*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="gradescoreenroledit" name="gradesenrol" placeholder="Grade(s)/Scores/Achievements" value="<?=$fetchtrafstucouen['gradesenrol']?>">
                                      </div>
                                      <span id="errorgradescoreenroledit" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Course/Class Attendance</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="attendanceenroll" placeholder="Class Attendance" value="<?=$fetchtrafstucouen['attendanceenroll']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="traforstuclsenrolledsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function editcourenrform(){
                                if($("#gradescoreenroledit").val() == "" ){
                                $("#gradescoreenroledit").focus();
                                $("#errorgradescoreenroledit").html("Please Enter Grades");
                                return false;
                                }else{
                                $("#errorgradescoreenroledit").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <!--New-->
                              <?php 
                            if(@$_REQUEST['addtransforstu']!=1 && @$_REQUEST['edittranscriptform']!=1 && @$_REQUEST['addcoursetaken']!=1 && @$_REQUEST['editcourtakform']!=1 && @$_REQUEST['addcourseenrol']!=1 && @$_REQUEST['editcourenrform']!=1){
                            ?>
                              <dl class="dl-horizontal">
                                <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Current Students</th>
                                      <th>Past Students</th>
                                      <th>Past Alumni</th>
                                      <th>Records for all past and present Students</th>
                                      <th>Add Transcripts for Students</th>
                                      <th>View Transcripts for Students</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
								  	while($viewstudents = mysqli_fetch_array($resquerystu)) {
								  ?>
                                    <tr>
                                      <td><?=$viewstudents['cur_student'];?></td>
                                      <td><?=$viewstudents['past_student'];?></td>
                                      <td><?=$viewstudents['past_alumni'];?></td>
                                      <td><?=$viewstudents['records_all_students'];?></td>
                                      <!--Add & View Transscript for students Starts-->
                                      <td><a href="instructional_facility.php?studentspanel=1&addtransforstu=1&addinstrufaccatch=1&ind_id=<?=$viewstudents['ind_id']?>&id=<?=$viewstudents['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="trans<?php echo $viewstudents['id']?>"><img src="img/show.png" /></a></td>
                                      <!--Add & View Transscript for students Ends-->
                                      <td><?=date('jS F Y',strtotime($viewstudents['lastedit']))?></td>
                                      <td><a href="instructional_facility.php?ind_id=<?=$viewstudents['ind_id']?>&id=<?=$viewstudents['id']?>&editstudents=awards&accr=1&studentspanel=1">Edit</a>&nbsp;|&nbsp;<a href="instructional_facility.php?ind_id=<?=$viewstudents['ind_id']?>&id=<?=$viewstudents['id']?>&delstudentspanel=val&studentspanel=1" style="color:#ff0000;">Delete</a></td>
                                    </tr>
                                    <!--SUB LEVEL FOR TRANSCRIPT FOR STUDENTS-->
                                    <tr style="display:none; background-color:#000;" id="transcript<?php echo $viewstudents['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Student ID No.</th>
                                                <th>Courses/Classes taken</th>
                                                <!--ADD & VIEW-->
                                                <th>Add Course Taken Details</th>
                                                <th>View Course Taken Details</th>
                                                <!--ADD & VIEW-->
                                                <th>Courses/Classes enrolled</th>
                                                <!--ADD & VIEW-->
                                                <th>Add Course Enrolled Details</th>
                                                <th>View Course Enrolled Details</th>
                                                <!--ADD & VIEW-->
                                                <!--<th>Diploma, Certificate, or Degree Conferred</th>-->
                                                <!--<th>Date Conferred</th>-->
                                                <!--<th>Transcripts/Record</th>
                                                <th>Misc. and Other</th>-->
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
										$sqltraforstu=mysqli_query($con, "SELECT nis.*, ist.* FROM `na_insfac_studentdetails` as nis INNER JOIN `na_insfac_studentdetails_transcriptforstudents` as ist on nis.id=ist.insfac_studentdetails_id WHERE ist.insfac_studentdetails_id='".$viewstudents['id']."'");
											  while($fetchtraforstu=mysqli_fetch_array($sqltraforstu)){	
										?>
                                              <tr>
                                                <td><?php echo $fetchtraforstu['student_id']?></td>
                                                <td><?php echo $fetchtraforstu['coursesclasses_taken']?></td>
                                                <!--ADD & VIEW-->
                                                <td><a href="instructional_facility.php?studentspanel=1&addcoursetaken=1&addinstrufaccatch=1&ind_id=<?=$fetchtraforstu['ind_id']?>&id=<?=$fetchtraforstu['ist_id']?>"><img src="img/add.png" /></a></td>
                                                <td><a id="adcrstk<?php echo $fetchtraforstu['ist_id']?>"><img src="img/show.png" /></a></td>
                                                <!--ADD & VIEW-->
                                                <td><?php echo $fetchtraforstu['coursesclasses_enrolled']?></td>
                                                <!--ADD & VIEW-->
                                                <td><a href="instructional_facility.php?studentspanel=1&addcourseenrol=1&addinstrufaccatch=1&ind_id=<?=$fetchtraforstu['ind_id']?>&id=<?=$fetchtraforstu['ist_id']?>"><img src="img/add.png" /></a></td>
                                                <td><a id="adcrsen<?php echo $fetchtraforstu['ist_id']?>"><img src="img/show.png" /></a></td>
                                                <!--ADD & VIEW-->
                                                <!--<td><?php echo $fetchtraforstu['degree_conferred']?></td>-->
                                                <!--<td><?php echo date('Y-m-d', strtotime($fetchtraforstu['date_conferred']))?></td>-->
                                                <!--<td><?php echo $fetchtraforstu['transcripts']?></td>
                                                <td><?php echo stripslashes($fetchtraforstu['miscellaneous'])?></td>-->
                                                <td><?=date('jS F Y',strtotime($fetchtraforstu['lastedit']))?></td>
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchtraforstu['ind_id']?>&tranfstid=<?=$fetchtraforstu['ist_id']?>&edittranscriptform=1&accr=1&studentspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchtraforstu['ind_id']?>&id=<?=$fetchtraforstu['ist_id']?>&deltranforstulink=val&studentspanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <!--SUB OF THE SUB LEVEL FOR COURSES TAKEN UNDER TRANSCRIPT FOR STUDENTS-->
                                              <tr style="display:none; background-color:#d9a773;" id="addcoursetaken<?php echo $fetchtraforstu['ist_id']?>">
                                                <td colspan="10"><div style="col-sm-12">
                                                    <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                      <thead>
                                                        <tr>
                                                          <th>Grade(s)/Scores/Achievements</th>
                                                          <th>Course/Class Attendance</th>
                                                          <th>Track Date(Add/Edit)</th>
                                                          <th>Action</th>
                                                        </tr>
                                                        <?php
                                            $sqltrafstucoutaken=mysqli_query($con, "SELECT ist.*, istc.* FROM na_insfac_studentdetails_transcriptforstudents as ist INNER JOIN na_insfac_studentdetails_transcriptforstudents_coursestaken as istc on ist.ist_id=istc.insfac_studentdetails_transcriptforstudents_id WHERE istc.insfac_studentdetails_transcriptforstudents_id='".$fetchtraforstu['ist_id']."'");
                                                  while($fetchtrafstucoutaken=mysqli_fetch_array($sqltrafstucoutaken)){	
                                            	  ?>
                                                        <tr>
                                                          <td><?php echo $fetchtrafstucoutaken['grades']?></td>
                                                          <td><?php echo $fetchtrafstucoutaken['attendance']?></td>
                                                          <td><?=date('jS F Y',strtotime($fetchtrafstucoutaken['lastedit']))?></td>
                                                          <td><a href="instructional_facility.php?ind_id=<?=$fetchtrafstucoutaken['ind_id']?>&coursetakenid=<?=$fetchtrafstucoutaken['istc_id']?>&editcourtakform=1&accr=1&studentspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchtrafstucoutaken['ind_id']?>&id=<?=$fetchtrafstucoutaken['istc_id']?>&deltraforstucoutaken=val&studentspanel=1" style="color:#ff0000;">Delete</a></td>
                                                        </tr>
                                                        <?php }?>
                                                      </thead>
                                                    </table>
                                                  </div></td>
                                              </tr>
                                              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                              <script>
												$(document).ready(function(){
													$("#adcrstk<?php echo $fetchtraforstu['ist_id']?>").click(function(){
													$("#addcoursetaken<?php echo $fetchtraforstu['ist_id']?>").toggle();
													});
												});
                                              </script>
                                              <!--SUB OF THE SUB LEVEL FOR COURSES TAKEN UNDER TRANSCRIPT FOR STUDENTS-->
                                              <!--SECOND SUB OF THE SUB LEVEL-->
                                              <!--SUB OF THE SUB LEVEL FOR COURSES ENROLLED UNDER TRANSCRIPT FOR STUDENTS-->
                                              <tr style="display:none; background-color:#d9a773;" id="addcourseenrolled<?php echo $fetchtraforstu['ist_id']?>">
                                                <td colspan="10"><div style="col-sm-12">
                                                    <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                                      <thead>
                                                        <tr>
                                                          <th>Grade(s)/Scores/Achievements</th>
                                                          <th>Course/Class Attendance</th>
                                                          <th>Track Date(Add/Edit)</th>
                                                          <th>Action</th>
                                                        </tr>
                                                        <?php
                                            $sqltrafstucouenrolled=mysqli_query($con, "SELECT ist.*, istce.* FROM na_insfac_studentdetails_transcriptforstudents as ist INNER JOIN na_insfac_studentdetails_transcriptforstudents_coursesenrolled as istce on ist.ist_id=istce.insfac_studentdetails_transcriptforstudents_id WHERE istce.insfac_studentdetails_transcriptforstudents_id='".$fetchtraforstu['ist_id']."'");
                                                  while($fetchtrafstucouenrolled=mysqli_fetch_array($sqltrafstucouenrolled)){	
                                            	  ?>
                                                        <tr>
                                                          <td><?php echo $fetchtrafstucouenrolled['gradesenrol']?></td>
                                                          <td><?php echo $fetchtrafstucouenrolled['attendanceenroll']?></td>
                                                          <td><?=date('jS F Y',strtotime($fetchtrafstucouenrolled['lastedit']))?></td>
                                                          <td><a href="instructional_facility.php?ind_id=<?=$fetchtrafstucouenrolled['ind_id']?>&courseenrolledid=<?=$fetchtrafstucouenrolled['istce_id']?>&editcourenrform=1&accr=1&studentspanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchtrafstucouenrolled['ind_id']?>&id=<?=$fetchtrafstucouenrolled['istce_id']?>&deltraforstucouenrolled=val&studentspanel=1" style="color:#ff0000;">Delete</a></td>
                                                        </tr>
                                                        <?php }?>
                                                      </thead>
                                                    </table>
                                                  </div></td>
                                              </tr>
                                              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                              <script>
												$(document).ready(function(){
													$("#adcrsen<?php echo $fetchtraforstu['ist_id']?>").click(function(){
													$("#addcourseenrolled<?php echo $fetchtraforstu['ist_id']?>").toggle();
													});
												});
                                              </script>
                                              <!--SUB OF THE SUB LEVEL FOR COURSES ENROLLED UNDER TRANSCRIPT FOR STUDENTS-->
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                    $(document).ready(function(){
                                    $("#trans<?php echo $viewstudents['id']?>").click(function(){
                                    $("#transcript<?php echo $viewstudents['id']?>").toggle();
                                    });
                                    });
                                    </script>
                                    <!--SUB LEVEL FOR TRANSCRIPT FOR STUDENTS-->
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                              <?php }?>
                            </div>
                            <?php } else { ?>
                            <form name="studentsform" id="studentsform" onsubmit="return blankvalidationedit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="studentspanel" value="1" />
                              <input type="hidden" name="studentsid" value="<?=$viewstudents['id']?>" />
                              <div class="pmbb-edit" style="display:block;">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Current Students*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type="text" class="form-control" id="curstued" name="cur_student" placeholder="Current Students" value="<?=$viewstudents['cur_student']?>">
                                    </div>
                                    <span id="errorcurstued" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Past Students</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="past_student" data-toggle="dropdown" placeholder="Past Students" value="<?=$viewstudents['past_student']?>">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Past Alumni</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="past_alumni" data-toggle="dropdown" placeholder="Past Alumni" value="<?=$viewstudents['past_alumni']?>">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Records for all past and present Students</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="records_all_students" placeholder="Records for all past and present Students" value="<?=$viewstudents['records_all_students']?>">
                                    </div>
                                  </dd>
                                </dl>
                                <div class="m-t-30">
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="studentsubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <script>
                            function blankvalidationedit(){
                            if($("#curstued").val() == "" ){
                            $("#curstued").focus();
                            $("#errorcurstued").html("Please Enter Student");
                            return false;
                            }else{
                            $("#errorcurstued").html("");
                            }
                            }
                            </script>
                            <?php } ?>
                            <form name="studentsform" id="studentsform" onsubmit="return validationstudent();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="studentspanel" value="1" />
                              <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Current Students*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type="text" class="form-control" id="curstu" name="cur_student" placeholder="Current Students">
                                    </div>
                                    <span id="errorcurstu" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Past Students</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="past_student" data-toggle="dropdown" placeholder="Past Students">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Past Alumni</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="past_alumni" data-toggle="dropdown" placeholder="Past Alumni">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Records for all past and present Students</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="records_all_students" placeholder="Records for all past and present Students">
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
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="studentsubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <script>
                            function validationstudent(){
                            if($("#curstu").val() == "" ){
                            $("#curstu").focus();
                            $("#errorcurstu").html("Please Enter Student");
                            return false;
                            }else{
                            $("#errorcurstu").html("");
                            }
                            }
                            </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--ADD STUDENTS-->
                </div><br>
                <script>
                $(document).ready(function(){
                $("#stu").click(function(){
                $("#stud").toggle();
                });
                });
                </script>
                <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="map" style="color:#FFF;">Marketing and Promotion</a></h4>
                <div id="maanpr" <?php if(@$_REQUEST['marketingpanel']==1) {?>style="display:block;"<?php }?> style="display:none;">
                  <!--MARKETING & PROMOTION STARTS HERE-->
                  <div class="panel panel-collapse">
                    <div <?php if(@$_REQUEST['marketingpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-marketing" data-parent="#accordionTeal" data-toggle="collapse" class="">Marketing and Promotion: </a> </h4>
                    </div>
                    <div id="accordionTeal-marketing" <?php if(@$_REQUEST['marketingpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                            <?php if(@$_REQUEST['editmarketing']=='') { ?>
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
                while($viewmarketing = mysqli_fetch_array($resquerymarketing)) {
                ?>
                                    <tr>
                                      <td><?=stripslashes($viewmarketing['advertisement'])?></td>
                                      <td><?=$viewmarketing['information'];?></td>
                                      <td><?=$viewmarketing['commercials'];?></td>
                                      <td><?=$viewmarketing['videoclips'];?></td>
                                      <td><?=$viewmarketing['infomercials'];?></td>
                                      <td><?=date('jS F Y',strtotime($viewmarketing['lastedit']))?></td>
                                      <!--FOR EDIT AND DELETE-->
                                      <td><a href="instructional_facility.php?ind_id=<?=$viewmarketing['ind_id']?>&id=<?=$viewmarketing['id']?>&editmarketing=awards&accr=1&marketingpanel=1">Edit</a>&nbsp;|&nbsp;<a href="instructional_facility.php?ind_id=<?=$viewmarketing['ind_id']?>&id=<?=$viewmarketing['id']?>&delmarketing=val&marketingpanel=1" style="color:#ff0000;">Delete</a></td>
                                      <!--FOR EDIT AND DELETE-->
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                            </div>
                            <?php } else { ?>
                            <form name="marketingform" id="marketingform" onsubmit="return maekrtingedit();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="marketingpanel" value="1" />
                              <input type="hidden" name="marketingid" value="<?=$viewmarketing['id']?>" />
                              <div class="pmbb-edit" style="display:block;">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Advertisements/Advertisement Materials*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <textarea type="text" class="form-control" id="advertisementedit" name="advertisement" placeholder="Advertisement" cols="8"><?=stripslashes($viewmarketing['advertisement'])?>
</textarea>
                                    </div>
                                    <span id="erroradvertisementedit" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Marketing Materials or Information</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="information" data-toggle="dropdown" placeholder="Information" value="<?=$viewmarketing['information']?>">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Commercials</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="commercials" data-toggle="dropdown" placeholder="Commercials" value="<?=$viewmarketing['commercials']?>">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Video Clips</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="videoclips" data-toggle="dropdown" placeholder="Video Clips" value="<?=$viewmarketing['videoclips']?>">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Infomercials</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="infomercials" data-toggle="dropdown" placeholder="Infomercials" value="<?=$viewmarketing['infomercials']?>">
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
                function maekrtingedit(){
                if($("#advertisementedit").val() == "" ){
                $("#advertisementedit").focus();
                $("#erroradvertisementedit").html("Please Enter Advertisement");
                return false;
                }else{
                $("#erroradvertisementedit").html("");
                }
                }
                </script>
                            <?php } ?>
                            <form name="marketingform" id="marketingform"  enctype="multipart/form-data" onsubmit="return marketing();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="marketingpanel" value="1" />
                              <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Advertisements/Advertisement Materials*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <textarea type="text" class="form-control" id="advertisement" name="advertisement" placeholder="Advertisement" cols="8"></textarea>
                                    </div>
                                    <span id="erroradvertisement" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Marketing Materials or Information</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="information" data-toggle="dropdown" placeholder="Information">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Commercials</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="commercials" data-toggle="dropdown" placeholder="Commercials">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Video Clips</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="videoclips" data-toggle="dropdown" placeholder="Video Clips">
                                    </div>
                                  </dd>
                                </dl>
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Infomercials</dt>
                                  <dd>
                                    <div class="dtp-container dropdown fg-line">
                                      <input type='text' class="form-control" name="infomercials" data-toggle="dropdown" placeholder="Infomercials">
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
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="marketingsubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <script>
                function marketing(){
                if($("#advertisement").val() == "" ){
                $("#advertisement").focus();
                $("#erroradvertisement").html("Please Enter Advertisement");
                return false;
                }else{
                $("#erroradvertisement").html("");
                }
                }
                </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--MARKETING & PROMOTION ENDS HERE-->
                </div><br>
                <script>
                $(document).ready(function(){
                $("#map").click(function(){
                $("#maanpr").toggle();
                });
                });
                </script>
                
                <!--****News and Information on 10-08-2016 [SUPRATIM]****-->
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
                                      <td><a href="instructional_facility.php?ind_id=<?=$viewnews['ind_id']?>&id=<?=$viewnews['id']?>&editnewsainfo=awards&accr=1&newsainfopanel=1">Edit</a>&nbsp;|&nbsp;<a href="instructional_facility.php?ind_id=<?=$viewnews['ind_id']?>&id=<?=$viewnews['id']?>&delnews=val&newsainfopanel=1" style="color:#ff0000;">Delete</a></td>
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
                            <form name="newsform" id="newsform" onsubmit="return newsadd();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
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
                <!--****News and Information on 10-08-2016 [SUPRATIM]****-->
                
                <h4 style="padding-bottom:10px; cursor:pointer;" class="btn btn-success"><a id="sns" style="color:#FFF;">Link to NarrateMe Social Network Site</a></h4>
                <div id="sonesi" <?php if(@$_REQUEST['socialpanel']==1) {?>style="display:block;"<?php }?> style="display:none;">
                  <!--Friends and Followers-->
                  <div class="panel panel-collapse">
                    <div <?php if(@$_REQUEST['socialpanel']!='') { ?>class="panel-heading active"<?php } else { ?>class="panel-heading"<?php } ?> role="tab" id="awardpanel">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-social" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Friends and Followers: </a> </h4>
                    </div>
                    <div id="accordionTeal-social" <?php if(@$_REQUEST['socialpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                            <?php if(@$_REQUEST['editsocial']=='') { ?>
                            <div class="pmbb-view">
                              <ul class="actions" style="position:static; float:right;">
                                <li class="dropdown open"> &nbsp;
                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                                    <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                                  </ul>
                                </li>
                              </ul>
                              <?php if(@$_REQUEST['addsocialdet']==1){
                                ?>
                              <div>
                                <form  onsubmit="return addsocialdet();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Name*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="socialname" name="name" placeholder="Name">
                                      </div>
                                      <span id="errorsocialname" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to Page</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="linktopage" placeholder="Link to Page">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="socialdetaddsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function addsocialdet(){
                                if($("#socialname").val() == "" ){
                                $("#socialname").focus();
                                $("#errorsocialname").html("Please Enter Name");
                                return false;
                                }else{
                                $("#errorsocialname").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php if(@$_REQUEST['editsocialform']==1) {?>
                              <div>
                                <form  onsubmit="return editsocialform();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                  <input type="hidden" name="id" value="<?=$_REQUEST['socialsubid']?>" />
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Name*</dt>
                                    <dd>
                                      <div class="fg-line">
                                        <input type="text" class="form-control" id="editnamede" name="name" placeholder="Name" value="<?=$fetchsocialdet['name']?>">
                                      </div>
                                      <span id="erroreditnamede" style="color:#ff0000;">&nbsp;</span> </dd>
                                  </dl>
                                  <dl class="dl-horizontal">
                                    <dt class="p-t-10">Link to Page</dt>
                                    <dd>
                                      <div class="dtp-container dropdown fg-line">
                                        <input type="text" class="form-control" name="linktopage" placeholder="Link to Page" value="<?=$fetchsocialdet['linktopage']?>">
                                      </div>
                                    </dd>
                                  </dl>
                                  <div class="m-t-30">
                                    <button class="btn btn-primary btn-sm" name="submit" type="submit" value="editsocialdetsubmit">Save</button>
                                    <button data-pmb-action="reset" class="btn btn-link btn-sm" onclick="history.go(-1);">Cancel</button>
                                  </div>
                                </form>
                                <script>
                                function editsocialform(){
                                if($("#editnamede").val() == "" ){
                                $("#editnamede").focus();
                                $("#erroreditnamede").html("Please Enter Name");
                                return false;
                                }else{
                                $("#erroreditnamede").html("");
                                }
                                }
                                </script>
                              </div>
                              <?php }?>
                              <?php 
                            if(@$_REQUEST['addsocialdet']!=1 && @$_REQUEST['editsocialform']!=1){
                            ?>
                              <dl class="dl-horizontal">
                                <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                                  <thead>
                                    <tr>
                                      <th>Friends or Followers</th>
                                      <th>Add Details</th>
                                      <th>View Details</th>
                                      <th>Track Date(Add/Edit)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
								  	while($viewsocial = mysqli_fetch_array($socialquery)) {
								  ?>
                                    <tr>
                                      <td><?=$viewsocial['friendsfollowers'];?></td>
                                      <!--DONE-->
                                      <td><a href="instructional_facility.php?socialpanel=1&addsocialdet=1&addinstrufaccatch=1&ind_id=<?=$viewsocial['ind_id']?>&id=<?=$viewsocial['id']?>"><img src="img/add.png" /></a></td>
                                      <td><a id="soci<?php echo $viewsocial['id']?>"><img src="img/show.png" /></a></td>
                                      <!--DONE-->
                                      <td><?=date('jS F Y',strtotime($viewsocial['lastedit']))?></td>
                                      <td><a href="instructional_facility.php?ind_id=<?=$viewsocial['ind_id']?>&id=<?=$viewsocial['id']?>&editsocial=awards&accr=1&socialpanel=1">Edit</a>&nbsp;|&nbsp;<a href="instructional_facility.php?ind_id=<?=$viewsocial['ind_id']?>&id=<?=$viewsocial['id']?>&delsocial=val&socialpanel=1" style="color:#ff0000;">Delete</a></td>
                                    </tr>
                                    <!--SUB LEVEL I-->
                                    <tr style="display:none; background-color:#000;" id="social<?php echo $viewsocial['id']?>">
                                      <td colspan="10"><div style="col-sm-12">
                                          <table class="table table-striped table-bordered table-advance table-hover" width="100%">
                                            <thead>
                                              <tr>
                                                <th>Name</th>
                                                <th>Link to Page</th>
                                                <th>Track Date(Add/Edit)</th>
                                                <th>Action</th>
                                              </tr>
                                              <?php
											  $sqlsocialsub=mysqli_query($con, "SELECT nis.*, isd.* FROM na_insfac_social as nis INNER JOIN na_insfac_social_details as isd on nis.id=isd.insfac_social_id WHERE isd.insfac_social_id='".$viewsocial['id']."'");
											  while($fetchsocialsub=mysqli_fetch_array($sqlsocialsub)){	
											  ?>
                                              <tr>
                                                <td><?php echo $fetchsocialsub['name']?></td>
                                                <td><?php echo $fetchsocialsub['linktopage']?></td>
                                                <td><?=date('jS F Y',strtotime($fetchsocialsub['lastedit']))?></td>
                                                <td><a href="instructional_facility.php?ind_id=<?=$fetchsocialsub['ind_id']?>&socialsubid=<?=$fetchsocialsub['isd_id']?>&editsocialform=1&accr=1&socialpanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure you want to delete?');" href="instructional_facility.php?ind_id=<?=$fetchsocialsub['ind_id']?>&id=<?=$fetchsocialsub['isd_id']?>&delsocialdet=val&socialpanel=1" style="color:#ff0000;">Delete</a></td>
                                              </tr>
                                              <?php }?>
                                            </thead>
                                          </table>
                                        </div></td>
                                    </tr>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <script>
                                    $(document).ready(function(){
                                    $("#soci<?php echo $viewsocial['id']?>").click(function(){
                                    $("#social<?php echo $viewsocial['id']?>").toggle();
                                    });
                                    });
                                    </script>
                                    <!--SUB LEVEL I-->
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                              <?php }?>
                            </div>
                            <?php } else { ?>
                            <form name="socialform" id="socialform" onsubmit="return editsocial();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="socialpanel" value="1" />
                              <input type="hidden" name="socialid" value="<?=$viewsocial['id']?>" />
                              <div class="pmbb-edit" style="display:block;">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Friends or Followers*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type='text' class="form-control " value="<?php echo $viewsocial['friendsfollowers']?>" id="editfriendsfollowers" name="friendsfollowers" placeholder="Friends or Followers">
                                    </div>
                                    <span id="errorfriendsfollowersedit" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <div class="m-t-30">
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="socialsubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <script>
                            function blankvalidation(){
                            if($("#editfriendsfollowers").val() == "" ){
                            $("#editfriendsfollowers").focus();
                            $("#errorfriendsfollowersedit").html("Please Enter Friend Name");
                            return false;
                            }else{
                            $("#errorfriendsfollowersedit").html("");
                            }
                            }
                            </script>
                            <?php } ?>
                            <form name="socialform" id="socialform" onsubmit="return social();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                              <input type="hidden" name="socialpanel" value="1" />
                              <div class="pmbb-edit">
                                <dl class="dl-horizontal">
                                  <dt class="p-t-10">Friends or Followers*</dt>
                                  <dd>
                                    <div class="fg-line">
                                      <input type="text" class="form-control" id="frndfler" name="friendsfollowers" placeholder="Friends or Followers">
                                    </div>
                                    <span id="errorfrndfler" style="color:#ff0000;">&nbsp;</span> </dd>
                                </dl>
                                <div class="m-t-30">
                                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="socialsubmit">Save</button>
                                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                            <script>
                        function social(){
                        if($("#frndfler").val() == "" ){
                        $("#frndfler").focus();
                        $("#errorfrndfler").html("Please Enter Friend Name");
                        return false;
                        }else{
                        $("#errorfrndfler").html("");
                        }
                        }
                        </script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Friends and Followers-->
                </div>
                <script>
                $(document).ready(function(){
                $("#sns").click(function(){
                $("#sonesi").toggle();
                });
                });
                </script>
                <!--BREAK POINT-->
                <hr style="color:#F00;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </section>
  <?php include('lib/inner_footer.php')?>

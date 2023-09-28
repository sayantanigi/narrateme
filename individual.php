<?php
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."'");
//==========================SUPRATIM 15/07/2016===================
if (@$_REQUEST['submit']=="Update Userdata"){
 	extract($_POST);
 	$dateob=date('Y-m-d',strtotime($dateofbirth));
	$data=array('first_name'=>mysqli_real_escape_string($con, stripcslashes($first_name)),'last_name'=>mysqli_real_escape_string($con, stripcslashes($last_name)),'dateofbirth'=>$dateob,'gender'=>$gender,'url'=>$url,'domain_name'=>$domain_name,'website'=>$website,'phone_no'=>$phone_no,'email'=>$email,'address'=>$address,'informational_description'=>addslashes($informational_description), 'current_student'=>$current_student, 'cellularphone_no'=>$cellularphone_no, 'IpAddress'=>$IpAddress, 'skype_url'=>$skype_url, 'social_seq_no'=>$social_seq_no, 'lastedit' => date('Y-m-d H:i:s'));
	$result=updateData($data,'na_member', "id='".$id."'") ;	
	echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
	echo "window.top.location.href='individual.php?update=success';\n";
	echo "</script>";
}
//==========================SUPRATIM 15/07/2016===================
if(@$_REQUEST['type']){
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

$viewind=getAnyTableWhereData('na_individual', " AND ind_id='".$_SESSION["userid"]."' ");
if (isset($_REQUEST['addindividualdata']) AND ($_REQUEST['addindividualdata']=="ADDIND")){
	extract($_POST);
	// Function to get the client IP address
	function get_client_ip() {
		$ipaddress = '';
		if ($_SERVER['HTTP_CLIENT_IP'])
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if($_SERVER['HTTP_X_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if($_SERVER['HTTP_X_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if($_SERVER['HTTP_FORWARDED_FOR'])
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if($_SERVER['HTTP_FORWARDED'])
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if($_SERVER['REMOTE_ADDR'])

			$ipaddress = $_SERVER['REMOTE_ADDR'];

		else

			$ipaddress = 'UNKNOWN';

		return $ipaddress;

	}

	$ipaddress = get_client_ip();

	

	//Checking Data

	$studensql = "SELECT * FROM `na_individual` WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery = mysqli_query($con, $studensql) or mysqli_error();

	$stunum = mysqli_num_rows($resquery);

	

	if($stunum==0) {

		

		$dateofbirth = explode("-",$_REQUEST['dateofbirth']);

		$formatdateofbirth = $dateofbirth[2]."-".$dateofbirth[1]."-".$dateofbirth[0];

								

		$data = array('ind_id'=>$_SESSION["userid"],'dob'=>$formatdateofbirth,'gender'=>$gender,'conference_id'=>$conference_id,'social_seq_no'=>$social_seq_no,'ip_address'=>$ipaddress,'description'=>addslashes($description));

		//print_r($data);

		//exit();

		$result = insertData($data, '`na_individual`');

		

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?operation=successful';\n";

		echo "</script>";

		

	} else {

		

		$dateofbirth = explode("-",$_REQUEST['dateofbirth']);

		$formatdateofbirth = $dateofbirth[2]."-".$dateofbirth[1]."-".$dateofbirth[0];

		

		$data = array('dob'=>$formatdateofbirth,'gender'=>$gender,'conference_id'=>$conference_id,'social_seq_no'=>$social_seq_no,'ip_address'=>$ipaddress,'description'=>addslashes($description));

	         

		$result = updateData($data,' `na_individual`', " ind_id='" . $_SESSION["userid"] . "' ") ;

		

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?operation=successful';\n";

		echo "</script>";

	}

		

	}

	

	$query = "SELECT * FROM `na_individual` WHERE ind_id = '".$_SESSION['userid']."'";

	$result = mysqli_query($con, $query);

	$counter=mysqli_num_rows($result);

	//================================SUPRATIM Individual Add/Update/view===================================

	


	//================================SUPRATIM Individual Award Add/Update/view==============================

	if(@$_REQUEST['submit']=="awardsubmit") {
	extract($_POST);
	$formataward_date = date('Y-m-d',strtotime($_REQUEST['award_date']));
	if(@$_REQUEST['awardid']=="") {
	    $uploads_dir = 'uploads/ind_doc/';
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
		$data = array('ind_id'=>$_SESSION["userid"],'award_date'=>$formataward_date,'award_name'=>$award_name,'award_description'=>addslashes($award_description),'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_individual_award');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&awardpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'award_date'=>date('Y-m-d',strtotime($_REQUEST['award_date1'])),'award_name'=>$award_name,'award_description'=>addslashes($award_description),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_individual_award', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['awardid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&awardpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	

	//Delete Awards

	if(@$_REQUEST['delawards']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_award WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&awardpanel=".$_REQUEST['awardpanel']."&accr=1';\n";
		echo "</script>";
	}
	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewawards = getAnyTableWhereData('na_individual_award', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensawardssql = "SELECT * FROM na_individual_award WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery3 = mysqli_query($con, $studensawardssql) or mysqli_error();
	$stunum3 = mysqli_num_rows($resquery3);

	//================================SUPRATIM Individual Award Add/Update/view==============================

	

	//================================SUPRATIM Rehab Award Add/Update/view==============================

	if(@$_REQUEST['submit']=="rehabilitationsubmit") {
	extract($_POST);
		//$award_date = explode("/",$_REQUEST['award_date']);

		$formatrehabilitation_date = date('Y-m-d',strtotime($_REQUEST['rehab_date']));

		

		if(@$_REQUEST['rehabilitationid']=="") {

								
$uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'rehab_date'=>$formatrehabilitation_date,'rehab_name'=>$rehab_name,'description'=>addslashes($description),'image'=>json_encode($imageArr),'outcome'=>$outcome,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_rehabilitation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&rehabilitationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'rehab_date'=>$formatrehabilitation_date,'rehab_name'=>$rehab_name,'description'=>addslashes($description),'outcome'=>$outcome,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_rehabilitation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['rehabilitationid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&rehabilitationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Awards

	if(@$_REQUEST['delrehabilitation']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_rehabilitation WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&rehabilitationpanel=".$_REQUEST['rehabilitationpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewrehabilitation = getAnyTableWhereData('na_rehabilitation', " AND ind_id='".@$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensrehabilitationssql = "SELECT * FROM na_rehabilitation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery4 = mysqli_query($con, $studensrehabilitationssql) or mysqli_error();

	$stunum4 = mysqli_num_rows($resquery4);

	//================================SUPRATIM Rehab Award Add/Update/view==============================

	

	//================================SUPRATIM Institute Award Add/Update/view==============================

	if(@$_REQUEST['submit']=="institutesubmit") {

		

		extract($_POST);

		

			// Function to get the client IP address

	function get_client_ip() {

		$ipaddress = '';

		if ($_SERVER['HTTP_CLIENT_IP'])

			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];

		else if($_SERVER['HTTP_X_FORWARDED_FOR'])

			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];

		else if($_SERVER['HTTP_X_FORWARDED'])

			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];

		else if($_SERVER['HTTP_FORWARDED_FOR'])

			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];

		else if($_SERVER['HTTP_FORWARDED'])

			$ipaddress = $_SERVER['HTTP_FORWARDED'];

		else if($_SERVER['REMOTE_ADDR'])

			$ipaddress = $_SERVER['REMOTE_ADDR'];

		else

			$ipaddress = 'UNKNOWN';

		return $ipaddress;

	}

	$ipaddress = get_client_ip();

		

		if(@$_REQUEST['instituteid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'institute_name'=>$institute_name,'description'=>$description,'school_bulletin'=>addslashes($school_bulletin),'instructor'=>$instructor,'address'=>$address, 'tel_no'=>$tel_no, 'email'=>$email, 'sms_no'=>$sms_no, 'ip_address'=>$ipaddress, 'website'=>$website, 'domain_name'=>$domain_name, 'url'=>$url , 'learning_portal'=>$learning_portal, 'schools'=>$schools,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_eduinstitute');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&institutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'institute_name'=>$institute_name,'description'=>$description,'school_bulletin'=>addslashes($school_bulletin),'instructor'=>$instructor,'address'=>$address, 'tel_no'=>$tel_no, 'email'=>$email, 'sms_no'=>$sms_no, 'ip_address'=>$ipaddress, 'website'=>$website, 'domain_name'=>$domain_name, 'url'=>$url , 'learning_portal'=>$learning_portal, 'schools'=>$schools);

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_eduinstitute', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['instituteid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&institutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Awards

	if(@$_REQUEST['delinstitute']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_eduinstitute WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&institutepanel=".$_REQUEST['institutepanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewinstitute = getAnyTableWhereData('na_eduinstitute', " AND ind_id='".@$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensinstitutessql = "SELECT * FROM na_eduinstitute WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery5 = mysqli_query($con, $studensinstitutessql) or mysqli_error();

	$stunum5 = mysqli_num_rows($resquery5);

	//================================SUPRATIM Institute Award Add/Update/view==============================

	

	//================================SUPRATIM Institute Teacher Add/Update/view==============================

	if(@$_REQUEST['submit']=="teachersubmit") {
	extract($_POST);

		if(@$_REQUEST['teacherid']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'teacher_name'=>$teacher_name,'phone'=>$phone,'email'=>$email,'learning_portal'=>$learning_portal, 'course'=>$course, 'academic_program'=>$academic_program,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

			$result = insertData($data, 'na_teacher');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'teacher_name'=>$teacher_name,'phone'=>$phone,'email'=>$email,'learning_portal'=>$learning_portal, 'course'=>$course, 'academic_program'=>$academic_program,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_teacher', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['teacherid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Teacher

	if(@$_REQUEST['delteacher']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_teacher WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&teacherpanel=".$_REQUEST['teacherpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewteacher = getAnyTableWhereData('na_teacher', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensteacherssql = "SELECT * FROM na_teacher WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery6 = mysqli_query($con, $studensteacherssql) or mysqli_error();
	$stunum6 = mysqli_num_rows($resquery6);

	//================================SUPRATIM Institute Teacher Add/Update/view==============================

	//=========================Academic Transcript================================
	if(@$_REQUEST['submit']=="atranscriptsubmit"){
		$grade = $_REQUEST['grade'];
		$note = $_REQUEST['note'];
		$message = $_REQUEST['message'];
		$academic_status=$_REQUEST['academic_status'];
		$comment=$_REQUEST['comment'];
		
		if(@$_REQUEST['atranscriptid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'grade'=>$grade,'note'=>$note,'comment'=>$comment,'message'=>$message,'image'=>json_encode($imageArr), 'academic_status'=>$academic_status,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_st_academintranscript');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&atranscript=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'grade'=>$grade,'note'=>$note,'comment'=>$comment,'message'=>$message, 'academic_status'=>$academic_status,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_st_academintranscript', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['atranscriptid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&atranscript=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		
		}
	}
	$sqlatranscript=mysqli_query($con, "SELECT * from `na_st_academintranscript` where `ind_id` =".$_SESSION["userid"]."");
	$viewatranscriptedit = getAnyTableWhereData('na_st_academintranscript', "AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	if(@$_REQUEST['delatranscript']){
		
		mysqli_query($con, "DELETE FROM `na_st_academintranscript` WHERE `id` = ".$_REQUEST['id']." and `ind_id`=".$_SESSION['userid']."");
		
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		
		echo "window.top.location.href='individual.php?operation=successful&atranscript=1&accordionTeal=&accr=1';\n";
		
		echo "</script>";
		
		
		exit();
	}
	
	//=========================Academic Transcript================================
	
	//=========================Credit Report================================
	if(@$_REQUEST['submit']=="creditreportsubmit"){
		$report_date = date('Y-m-d',strtotime($_REQUEST['report_date']));
		$report_link = $_REQUEST['report_link'];
		$description = $_REQUEST['description'];
		
		
		if(@$_REQUEST['creditreportid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$report_date,'report_link'=>$report_link,'description'=>mysql_real_escape_string(stripcslashes($description)),'image'=>json_encode($imageArr),'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_credit_roport');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&creditpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$status = $_REQUEST['status'];
			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$report_date,'report_link'=>$report_link,'description'=>mysql_real_escape_string(stripcslashes($description)),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			
			//print_r($data);
			//exit();

			$result = updateData($data,'na_credit_roport', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['creditreportid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&creditpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";
		
		}
	
	
		
	}
	$sqlcreport=mysqli_query($con, "SELECT * from `na_credit_roport` where `ind_id` =".$_SESSION["userid"]."");
	//echo "SELECT * from `na_credit_roport` where `ind_id` =".$_SESSION["userid"]." and id = '".@$_REQUEST['id']."'";
	//exit();
	 $viewcreporttedit=mysqli_fetch_array(mysqli_query($con, "SELECT * from `na_credit_roport` where `ind_id` =".@$_SESSION["userid"]." and id = '".@$_REQUEST['id']."'"));
	//$viewcreporttedit = getAnyTableWhereData('na_credit_roport', "AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	if(@$_REQUEST['delcreport']){
		
		mysqli_query($con, "DELETE FROM `na_credit_roport` WHERE `id` = ".$_REQUEST['id']." and `ind_id`=".$_SESSION['userid']."");
		
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		
		echo "window.top.location.href='individual.php?operation=successful&creditpanel=1&accordionTeal=&accr=1';\n";
		
		echo "</script>";
		
		
		exit();
	}
	
	//=========================Credit Report================================
	
	//========================Credit Report Issuer Section=======================================
	if(@$_REQUEST['submit']=="creditissuerreportsubmit"){
		extract($_POST);
		
		if(@$_REQUEST['cpd']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'credit_report_id'=>$credit_report_id,'issuer_name'=>$issuer_name,'phone'=>$phone,'website'=>$website, 'url'=>$url,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_credit_issuer_report');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&creditpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'credit_report_id'=>$creditreportid,'issuer_name'=>$issuer_name,'phone'=>$phone,'website'=>$website, 'url'=>$url,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_credit_issuer_report', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['cpd']."' ") ;
			//echo "jhgjhg".">>>>";
			//exit();
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&creditpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	}
	
	$sqlcreportissuename=mysqli_query($con, "SELECT * from `na_credit_issuer_report` where `ind_id` =".$_SESSION["userid"]."");
	$viewissuercreporttedit=mysqli_fetch_array(mysqli_query($con, "SELECT * from `na_credit_issuer_report` where `ind_id` =".$_SESSION["userid"]." and id = '".@$_REQUEST['id']."'"));
	if(@$_REQUEST['delissuercreditreport']){
		mysqli_query($con, "DELETE FROM `na_credit_issuer_report` WHERE `id` = ".@$_REQUEST['id']." and `ind_id`=".$_SESSION['userid']."");
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?operation=successful&creditpanel=1&accordionTeal=&accr=1';\n";
		echo "</script>";
		exit();
	}
	//========================Credit Report Issuer Section=======================================

	//================================SUPRATIM coach Add/Update/view==============================

	if(@$_REQUEST['submit']=="coachsubmit") {
		extract($_POST);
		if(@$_REQUEST['coachid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'phone'=>$phone,'email'=>$email,'sample'=>$sample,'image'=>json_encode($imageArr), 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_coach');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&coachpanel=1&accordionTeal=".$accordionTeal."&accrr=1';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'phone'=>$phone,'email'=>$email,'sample'=>$sample, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_coach', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['coachid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&coachpanel=1&accordionTeal=".$accordionTeal."&accrr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Coach

	if(@$_REQUEST['delcoach']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_coach WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&coachpanel=".$_REQUEST['coachpanel']."&accrr=1';\n";
		echo "</script>";
	}

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewcoach = getAnyTableWhereData('na_coach', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenscoachssql = "SELECT * FROM na_coach WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery7 = mysqli_query($con, $studenscoachssql) or mysqli_error();
	$stunum7 = mysqli_num_rows($resquery7);
	//================================SUPRATIM coach Add/Update/view==============================
	//================================SUPRATIM Recomendation Add/Update/view==============================
	if(@$_REQUEST['submit']=="recomendationsubmit") {
	extract($_POST);
	if(@$_REQUEST['recomendationid']=="") {
		$data = array('ind_id'=>$_SESSION["userid"],'recomendation_person'=>$recomendation_person,'recomendation'=>$recomendation,'rec_video_link'=>$rec_video_link,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_recomendation');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&recomendationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'recomendation_person'=>$recomendation_person,'recomendation'=>$recomendation,'rec_video_link'=>$rec_video_link,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));


			$result = updateData($data,'na_recomendation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['recomendationid']."'") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&recomendationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	//Delete Coach

	if(@$_REQUEST['delrecomendation']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_recomendation WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&recomendationpanel=".$_REQUEST['recomendationpanel']."&accr=1';\n";
		echo "</script>";
	}

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewrecomendation = getAnyTableWhereData('na_recomendation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensrecomendationssql = "SELECT * FROM na_recomendation WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery8 = mysqli_query($con, $studensrecomendationssql) or mysqli_error();
	$stunum8 = mysqli_num_rows($resquery8);
	//================================SUPRATIM Recomendation Add/Update/view==============================

	//================================SUPRATIM Extra Add/Update/view==============================

	if(@$_REQUEST['submit']=="extrasubmit") {
	extract($_POST);
		$formatextra_date = date('Y-m-d',strtotime($_REQUEST['from_date']));

		if(@$_REQUEST['extraid']=="") {

	$uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'activity_name'=>$activity_name,'from_date'=>$formatextra_date,'activity_description'=>$activity_description,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_extracurricullam');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&extrapanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'activity_name'=>$activity_name,'from_date'=>$formatextra_date,'activity_description'=>$activity_description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_extracurricullam', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['extraid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&extrapanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Extra

	if(@$_REQUEST['delextra']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_extracurricullam WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&extrapanel=".@$_REQUEST['extrapanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewextra = getAnyTableWhereData('na_extracurricullam', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensextrassql = "SELECT * FROM na_extracurricullam WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery9 = mysqli_query($con, $studensextrassql) or mysqli_error();

	$stunum9 = mysqli_num_rows($resquery9);

	//================================SUPRATIM Extra Add/Update/view==============================

	

	//================================SUPRATIM Job Add/Update/view==============================

		if(@$_REQUEST['submit']=="jobsubmit") {

		

	extract($_POST);

		$formatjobfrom_date = date('Y-m-d',strtotime($_REQUEST['from_date']));

		$formatjobto_date = date('Y-m-d',strtotime($_REQUEST['to_date']));

		if(@$_REQUEST['jobid']=="") { 

								$uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'employer_name'=>$employer_name,'from_date'=>$formatjobfrom_date,'to_date'=>$formatjobto_date,'image'=>json_encode($imageArr), 'position'=>$position, 'job_description'=>$job_description,'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

			$result = insertData($data, 'na_student_experience');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&jobpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'employer_name'=>$employer_name,'from_date'=>$formatjobfrom_date,'to_date'=>$formatjobto_date, 'position'=>$position, 'job_description'=>$job_description,'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

			$result = updateData($data,'na_student_experience', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['jobid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&jobpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete JOB

	if(@$_REQUEST['deljob']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_student_experience WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&jobpanel=".$_REQUEST['jobpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewjob = getAnyTableWhereData('na_student_experience', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensjobssql = "SELECT * FROM na_student_experience WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery10 = mysqli_query($con, $studensjobssql) or mysqli_error();

	$stunum10 = mysqli_num_rows($resquery10);

	//================================SUPRATIM Job Add/Update/view==============================

	

	//================================SUPRATIM Video Presentation Add/Update/view==============================

	if(@$_REQUEST['submit']=="videopresentationsubmit") {
	extract($_POST);

		$formatvideopresentation_date = date('Y-m-d',strtotime(@$_REQUEST['video_date']));

		if(@$_REQUEST['videopresentationid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'video_date'=>$formatvideopresentation_date,'description'=>$description,'link_rec_video'=>$link_rec_video, 'ip_live_cam'=>$ip_live_cam, 'comments'=>$comments,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_video_presentation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&videopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'video_date'=>$formatvideopresentation_date,'description'=>$description,'link_rec_video'=>$link_rec_video, 'ip_live_cam'=>$ip_live_cam, 'comments'=>$comments,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_video_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['videopresentationid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&videopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete videopresentation

	if(@$_REQUEST['delvideopresentation']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_video_presentation WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&videopresentationpanel=".@$_REQUEST['videopresentationpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewvideopresentation = getAnyTableWhereData('na_video_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensvideopresentationssql = "SELECT * FROM na_video_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery11 = mysqli_query($con, $studensvideopresentationssql) or mysqli_error();

	$stunum11 = mysqli_num_rows($resquery11);

	//================================SUPRATIM Video Presentation Add/Update/view==============================
	//================================SUPRATIM Academic Transcript Add/Update/view==============================

	if(@$_REQUEST['submit']=="academictranscriptsubmit") {
	  extract($_POST);
		if(@$_REQUEST['academictranscriptid']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments, 'messages'=>$messages,'status'=>1);
			$result = insertData($data, 'na_academic_transcript');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&academictranscriptpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments, 'messages'=>$messages);
			$result = updateData($data,'na_academic_transcript', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['academictranscriptid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&academictranscriptpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	//Delete academictranscript

	if(@$_REQUEST['delacademictranscript']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_academic_transcript WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&academictranscriptpanel=".$_REQUEST['academictranscriptpanel']."&accr=1';\n";
		echo "</script>";

	}

	$viewacademictranscript = getAnyTableWhereData('na_academic_transcript', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensacademictranscriptssql = "SELECT * FROM na_academic_transcript WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery12 = mysqli_query($con, $studensacademictranscriptssql) or mysqli_error();
	$stunum12 = mysqli_num_rows($resquery12);

	//================================SUPRATIM Academic Transcript Add/Update/view==============================

	

	//================================SUPRATIM educationalrecord Add/Update/view==============================

	if(@$_REQUEST['submit']=="educationalrecordsubmit") {

		

	extract($_POST);

	



		//$formatvideopresentation_date = date('Y-m-d',strtotime($_REQUEST['video_date']));

		if(@$_REQUEST['educationalrecordid']=="") {

			$uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments, 'messages'=>$messages,'status'=>$status,'image'=>json_encode($imageArr), 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_educational_records');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&educationalrecordpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments, 'messages'=>$messages,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_educational_records', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['educationalrecordid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&educationalrecordpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete educationalrecord

	if(@$_REQUEST['deleducationalrecord']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_educational_records WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&educationalrecordpanel=".$_REQUEST['educationalrecordpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$vieweducationalrecord = getAnyTableWhereData('na_educational_records', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studenseducationalrecordssql = "SELECT * FROM na_educational_records WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery13 = mysqli_query($con, $studenseducationalrecordssql) or mysqli_error();

	$stunum13 = mysqli_num_rows($resquery13);

	//================================SUPRATIM educationalrecord Add/Update/view==============================

	

	//================================SUPRATIM issuerofreport Add/Update/view==============================

		if(@$_REQUEST['submit']=="issuerofreportsubmit") {
		extract($_POST);
		//$formatvideopresentation_date = date('Y-m-d',strtotime($_REQUEST['video_date']));

		if(@$_REQUEST['issuerofreportid']=="") {

								
$uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'tel_no'=>$tel_no,'website'=>$website, 'url'=>$url,'description'=>$description,'image'=>json_encode($imageArr),'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_issuer_of_report');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&issuerofreportpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'tel_no'=>$tel_no,'website'=>$website, 'url'=>$url,'description'=>$description, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_issuer_of_report', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['issuerofreportid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&issuerofreportpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete issuerofreport

	if(@$_REQUEST['delissuerofreport']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_issuer_of_report WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&issuerofreportpanel=".$_REQUEST['issuerofreportpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewissuerofreport = getAnyTableWhereData('na_issuer_of_report', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensissuerofreportssql = "SELECT * FROM na_issuer_of_report WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery14 = mysqli_query($con, $studensissuerofreportssql) or mysqli_error();

	$stunum14 = mysqli_num_rows($resquery14);

	//================================SUPRATIM issuerofreport Add/Update/view==============================

	

	//================================SUPRATIM report Add/Update/view==============================

	if(@$_REQUEST['submit']=="reportsubmit") {
		extract($_POST);
		$formatreport_date = date('Y-m-d',strtotime($_REQUEST['report_date']));
		if(@$_REQUEST['reportid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
		    
			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatreport_date, 'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_reports');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&reportpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatreport_date, 'description'=>$description,'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_reports', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['reportid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&reportpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	//Delete report
	if(@$_REQUEST['delreport']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_reports WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&reportpanel=".$_REQUEST['reportpanel']."&accr=1';\n";
		echo "</script>";
	}

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewreport = getAnyTableWhereData('na_reports', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensreportssql = "SELECT * FROM na_reports WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery15 = mysqli_query($con, $studensreportssql) or mysqli_error();

	$stunum15 = mysqli_num_rows($resquery15);

	//================================SUPRATIM report Add/Update/view==============================

	

	//================================SUPRATIM message Add/Update/view==============================

	if(@$_REQUEST['submit']=="messagesubmit") {
	
	extract($_POST);

		$formatmessage_date = date('Y-m-d',strtotime($_REQUEST['report_date']));

		if(@$_REQUEST['messageid']=="") {
			
			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatmessage_date, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_messages');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&messagepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatmessage_date, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_messages', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['messageid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&messagepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	

	//Delete message

	if(@$_REQUEST['delmessage']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_messages WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&messagepanel=".@$_REQUEST['messagepanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewmessage = getAnyTableWhereData('na_messages', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensmessagessql = "SELECT * FROM na_messages WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery16 = mysqli_query($con, $studensmessagessql) or mysqli_error();

	$stunum16 = mysqli_num_rows($resquery16);

	//================================SUPRATIM message Add/Update/view==============================

	

	//================================SUPRATIM Audio Presentation Add/Update/view==============================

		if(@$_REQUEST['submit']=="audiopresentationsubmit") {

		

		extract($_POST);

	

		$formataudiopresentation_date = date('Y-m-d',strtotime($_REQUEST['audio_date']));

		if(@$_REQUEST['audiopresentationid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'audio_date'=>$formataudiopresentation_date,'description'=>$description,'link_rec_audio'=>$link_rec_audio, 'ip_live_cam'=>$ip_live_cam, 'comments'=>$comments,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_audio_presentation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&audiopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'audio_date'=>$formataudiopresentation_date,'description'=>$description,'link_rec_audio'=>$link_rec_audio, 'ip_live_cam'=>$ip_live_cam, 'comments'=>$comments,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_audio_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['audiopresentationid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&audiopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete audiopresentation

	if(@$_REQUEST['delaudiopresentation']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_audio_presentation WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&audiopresentationpanel=".@$_REQUEST['audiopresentationpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewaudiopresentation = getAnyTableWhereData('na_audio_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensaudiopresentationssql = "SELECT * FROM na_audio_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery17 = mysqli_query($con, $studensaudiopresentationssql) or mysqli_error();

	$stunum17 = mysqli_num_rows($resquery17);

	//================================SUPRATIM Audio Presentation Add/Update/view==============================

	

	//================================SUPRATIM personalrecomendation Add/Update/view==============================

		if(@$_REQUEST['submit']=="personalrecomendationsubmit") {

		

		extract($_POST);

	

		$formatpersonalrecomendation_date = date('Y-m-d',strtotime($_REQUEST['recom_date']));

		

		if(@$_REQUEST['personalrecomendationid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"], 'recom_date'=>$formatpersonalrecomendation_date, 'per_prov_rec'=>$per_prov_rec, 'recommendation'=>$recommendation,'recorded_video'=>$recorded_video, 'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_personal_recommendations');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&personalrecomendationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"], 'recom_date'=>$formatpersonalrecomendation_date, 'per_prov_rec'=>$per_prov_rec, 'recommendation'=>$recommendation,'recorded_video'=>$recorded_video);

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_personal_recommendations', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['personalrecomendationid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&personalrecomendationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete personalrecomendation

	if(@$_REQUEST['delpersonalrecomendation']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_personal_recommendations WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&personalrecomendationpanel=".$_REQUEST['personalrecomendationpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewpersonalrecomendation = getAnyTableWhereData('na_personal_recommendations', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studenspersonalrecomendationssql = "SELECT * FROM na_personal_recommendations WHERE ind_id = '".@$_SESSION["userid"]."'";

	$resquery18 = mysqli_query($con, $studenspersonalrecomendationssql) or mysqli_error();

	$stunum18 = mysqli_num_rows($resquery18);

	//================================SUPRATIM personalrecomendation Add/Update/view==============================

	

		//================================SUPRATIM reference Add/Update/view==============================

	
		if(@$_REQUEST['submit']=="referencesubmit") {

		

		extract($_POST);

	

		$formatreference_date = date('Y-m-d',strtotime($_REQUEST['dateofreference']));

		

		if(@$_REQUEST['referenceid']=="") {

			$uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"], 'dateofreference'=>$formatreference_date, 'ref_name'=>$ref_name, 'ref_position'=>$ref_position,'ref_phone'=>$ref_phone, 'ref_emailaddress'=>$ref_emailaddress, 'ref_relationship'=>$ref_relationship, 'ref_recomvideo'=>$ref_recomvideo,'image'=>json_encode($imageArr), 'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_reference');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&ref=1&#ref&referencepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"], 'dateofreference'=>$formatreference_date, 'ref_name'=>$ref_name, 'ref_position'=>$ref_position,'ref_phone'=>$ref_phone, 'ref_emailaddress'=>$ref_emailaddress, 'ref_relationship'=>$ref_relationship, 'ref_recomvideo'=>$ref_recomvideo,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_reference', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['referenceid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&referencepanel=1&ref=1&#ref&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete reference

	if(@$_REQUEST['delreference']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_reference WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&ref=1&#ref&referencepanel=".@$_REQUEST['referencepanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewreference = getAnyTableWhereData('na_reference', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensreferencessql = "SELECT * FROM na_reference WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery19 = mysqli_query($con, $studensreferencessql) or mysqli_error();

	$stunum19 = mysqli_num_rows($resquery19);


	//================================SUPRATIM reference Add/Update/view==============================

	

	//================================SUPRATIM instructionalfacilities Add/Update/view============================== 

	if(@$_REQUEST['submit']=="instructionalfacilitiessubmit") {

		

		extract($_POST);

	

		$formatdatesofattendence_date = date('Y-m-d',strtotime($_REQUEST['datesofattendence']));

		$formatcurrent_schedule_date = date('Y-m-d',strtotime($_REQUEST['current_schedule']));

		

		if(@$_REQUEST['instructionalfacilitiesid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"], 'datesofattendence'=>$formatdatesofattendence_date, 'prog_enrolled'=>$prog_enrolled, 'classes_taken'=>$classes_taken,'achievements'=>$achievements, 'current_schedule'=>$formatcurrent_schedule_date, 'awards_conferred'=>$awards_conferred,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_ins_facilities');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&instructionalfacilitiespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"], 'datesofattendence'=>$formatdatesofattendence_date, 'prog_enrolled'=>$prog_enrolled, 'classes_taken'=>$classes_taken,'achievements'=>$achievements, 'current_schedule'=>$formatcurrent_schedule_date, 'awards_conferred'=>$awards_conferred);

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_ins_facilities', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['instructionalfacilitiesid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&instructionalfacilitiespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete instructionalfacilities

	if(@$_REQUEST['delinstructionalfacilities']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_ins_facilities WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&instructionalfacilitiespanel=".$_REQUEST['instructionalfacilitiespanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewinstructionalfacilities = getAnyTableWhereData('na_ins_facilities', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensinstructionalfacilitiesssql = "SELECT * FROM na_ins_facilities WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery20 = mysqli_query($con, $studensinstructionalfacilitiesssql) or mysqli_error();

	$stunum20 = mysqli_num_rows($resquery20);

	//================================SUPRATIM instructionalfacilities Add/Update/view==============================

	

	//================================SUPRATIM educationalinstitution Add/Update/view==============================

	if(@$_REQUEST['submit']=="educationalinstitutionsubmit") {
		extract($_POST);
		$formatattenddates_date = date('Y-m-d',strtotime($_REQUEST['attend_date']));
		
if(@$_REQUEST['educationalinstitutionid']=="") {
    
 $uploads_dir = 'uploads/ind_doc/';
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
  		$data = array('ind_id'=>$_SESSION["userid"], 'attend_date'=>$formatattenddates_date,'image'=>json_encode($imageArr), 'program_enroll'=>$program_enroll, 'course_taken'=>$course_taken, 'Grades'=>$Grades,'	course_enrolled'=>$course_enrolled, 'status'=>$status, 'lastedit'=> date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();

			$result = insertData($data, 'na_eduinstitute_attended');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&eduins=1&educationalinstitutionpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	else {

			$data = array('ind_id'=>$_SESSION["userid"], 'attend_date'=>$formatattenddates_date, 'program_enroll'=>$program_enroll, 'course_taken'=>$course_taken, 'Grades'=>$Grades, 'course_enrolled'=>$course_enrolled, 'status'=>$status,'lastedit'=> date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_eduinstitute_attended', " ind_id='" . $_SESSION["userid"] . "' AND st_id = '".@$_REQUEST['educationalinstitutionid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&educationalinstitutionpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete educationalinstitution

	if(@$_REQUEST['deleducationalinstitution']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_eduinstitute_attended WHERE st_id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&educationalinstitutionpanel=".$_REQUEST['educationalinstitutionpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$vieweducationalinstitution = getAnyTableWhereData('na_eduinstitute_attended', " AND ind_id='".$_SESSION["userid"]."' AND st_id = '".@$_REQUEST['id']."' ");

	//print_r($vieweducationalinstitution); exit();

	$studenseducationalinstitutionssql = "SELECT * FROM na_eduinstitute_attended WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery21 = mysqli_query($con, $studenseducationalinstitutionssql) or mysqli_error();

	$stunum21 = mysqli_num_rows($resquery21);

	//================================SUPRATIM educationalinstitution Add/Update/view==============================

	

	//================================SUPRATIM seminarattend Add/Update/view==============================

	if(@$_REQUEST['submit']=="seminarattendsubmit") {

		

		extract($_POST);

	

		$formsemi_schedule_date = date('Y-m-d',strtotime($_REQUEST['semi_schedule']));

		

		$formentry_date_date = date('Y-m-d',strtotime($_REQUEST['entry_date']));

		

		if(@$_REQUEST['seminarattendid']=="") {

			 $uploads_dirsem = 'uploads/ind_doc/';
            $imageArrsem = array();
            foreach ($_FILES["imagessem"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_namesem = $_FILES["imagessem"]["tmp_name"][$key];
                    $namesem = $_FILES["imagessem"]["name"][$key];
                      list($txt, $ext) = explode(".", $namesem);
                       //date_default_timezone_set ("Asia/Calcutta"); 
                       $currentdate=date("d M Y");  
                       $filesem= time().substr(str_replace(" ", "_", $txt), 0);
                       $info = pathinfo($filesem);
             
                       $filenamesem = $filesem.".".$ext;
                    move_uploaded_file($tmp_namesem, "$uploads_dirsem/$filenamesem");
                    array_push($imageArrsem,$filenamesem);
                }
            }					

			$data = array('ind_id'=>$_SESSION["userid"], 'semi_schedule'=>$formsemi_schedule_date, 'entry_date'=>$formentry_date_date,'image'=>json_encode($imageArrsem), 'name'=>$name, 'Description'=>$Description, 'status'=>$status, 'entry_date'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_seminar_attend');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&seminarattendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"], 'semi_schedule'=>$formsemi_schedule_date, 'entry_date'=>$formentry_date_date, 'name'=>$name, 'Description'=>$Description,'status'=>$status, 'entry_date'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_seminar_attend', " ind_id='" . $_SESSION["userid"] . "' AND semi_id = '".@$_REQUEST['seminarattendid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&seminarattendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete seminarattend

	if(@$_REQUEST['delseminarattend']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_seminar_attend WHERE semi_id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&seminarattendpanel=".@$_REQUEST['seminarattendpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewseminarattend = getAnyTableWhereData('na_seminar_attend', " AND ind_id='".$_SESSION["userid"]."' AND semi_id = '".@$_REQUEST['id']."' ");

	//print_r($vieweducationalinstitution); exit();

	$studensseminarattendssql = "SELECT * FROM na_seminar_attend WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery22 = mysqli_query($con, $studensseminarattendssql) or mysqli_error();

	$stunum22 = mysqli_num_rows($resquery22);

	//================================SUPRATIM seminarattend Add/Update/view==============================
	
	
	
	
	
//================================SUPRATIM Current Course Add/Update/view==============================
	if(@$_REQUEST['submit']=="curcrssubmit") {
		extract($_POST);
		$crs_startdate = date('Y-m-d',strtotime($_REQUEST['crs_startdate']));
		$crs_enddate = date('Y-m-d',strtotime($_REQUEST['crs_enddate']));
		if(@$_REQUEST['curcrsid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"], 'crs_startdate'=>$crs_startdate, 'crs_enddate'=>$crs_enddate,'image'=>json_encode($imageArr), 'crs_name'=>$crs_name, 'crs_desc'=>addslashes($crs_desc), 'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_current_course');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&curcrspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"], 'crs_startdate'=>$crs_startdate, 'crs_enddate'=>$crs_enddate, 'crs_name'=>$crs_name, 'crs_desc'=>addslashes($crs_desc),'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_current_course', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['curcrsid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&curcrspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Current Course
	if(@$_REQUEST['delcurcrs']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_current_course WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&curcrspanel=".@$_REQUEST['curcrspanel']."&accr=1';\n";
		echo "</script>";
	}
	
	$viewcurcrs = getAnyTableWhereData('na_current_course', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenscurcrssql = "SELECT * FROM na_current_course WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquerycurcrs = mysqli_query($con, $studenscurcrssql) or mysqli_error();
	$stunumcurcrs = mysqli_num_rows($resquerycurcrs);
	//================================SUPRATIM Current Course Add/Update/view==============================
	
	
	
	//================================SUPRATIM Diploma, Certificate, Degree awarded or conferred Add/Update/view==============================
	if(@$_REQUEST['submit']=="degreesubmit") {
		extract($_POST);
		if(@$_REQUEST['degreeid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
		    
			$data = array('ind_id'=>$_SESSION["userid"], 'degname'=>$degname,'image'=>json_encode($imageArr), 'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_degdipcer_conferred');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&degreepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"], 'degname'=>$degname, 'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_degdipcer_conferred', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['degreeid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&degreepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	//Delete Current Course
	if(@$_REQUEST['deldegree']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {
		$delsql = "DELETE from na_degdipcer_conferred WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&degreepanel=".$_REQUEST['degreepanel']."&accr=1';\n";
		echo "</script>";
	}
	
	$viewdegree = getAnyTableWhereData('na_degdipcer_conferred', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$degreesql = "SELECT * FROM na_degdipcer_conferred WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquerydegree = mysqli_query($con, $degreesql) or mysqli_error();
	$stunumdegree = mysqli_num_rows($resquerydegree);
	//================================SUPRATIM Diploma, Certificate, Degree awarded or conferred Add/Update/view==============================
	

//================================ Injuries Starts=====================================

if(@$_REQUEST['submit']=="injuriessubmit") {

		extract($_POST);
//echo $_REQUEST['injuriesid'].">>>>>"; exit();
		if(@$_REQUEST['injuriesid']=="") {

				$uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status,'image'=>json_encode($imageArr),'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_individual_injuries');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&injuriespanel=1&inj=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));



			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_injuries', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['injuriesid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&injuriespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delinjuries']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_individual_injuries WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&injuriespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewinjuries = getAnyTableWhereData('na_individual_injuries', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensinjuriessql = "SELECT * FROM na_individual_injuries WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryinj = mysqli_query($con, $studensinjuriessql) or mysqli_error();

	$stunuminj = mysqli_num_rows($resqueryinj);
	

//================================= Injuries Ends ========================================

//================================ surgeries Starts=====================================

if(@$_REQUEST['submit']=="surgeriessubmit") {

		extract($_POST);
//echo $_REQUEST['surgeriesid'].">>>>>"; exit();
		if(@$_REQUEST['surgeriesid']=="") {

				$uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_individual_surgeries');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&surgeriespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));



			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_surgeries', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['surgeriesid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&surgeriespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delsurgeries']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_individual_surgeries WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&surgeriespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewsurgeries = getAnyTableWhereData('na_individual_surgeries', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studenssurgeriessql = "SELECT * FROM na_individual_surgeries WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryshj = mysqli_query($con, $studenssurgeriessql) or mysqli_error();

	$stunumshj = mysqli_num_rows($resqueryshj);
	

//================================= surgeries Ends ========================================


//================================ Procedures  Starts=====================================

if(@$_REQUEST['submit']=="proceduressubmit") {

		extract($_POST);
//echo $_REQUEST['proceduresid'].">>>>>"; exit();
		if(@$_REQUEST['proceduresid']=="") {

					$uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status,'image'=>json_encode($imageArr), 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_individual_procedures');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&procedurespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));



			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_procedures', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['proceduresid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&procedurespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delprocedures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_individual_procedures WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&procedurespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewprocedures = getAnyTableWhereData('na_individual_procedures', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensproceduressql = "SELECT * FROM na_individual_procedures WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquerypro = mysqli_query($con, $studensproceduressql) or mysqli_error();

	$stunumpro = mysqli_num_rows($resquerypro);
	

//================================= Procedures  Ends ========================================

//================================ Treatments   Starts=====================================

if(@$_REQUEST['submit']=="treatmentssubmit") {

		extract($_POST);
//echo $_REQUEST['treatmentsid'].">>>>>"; exit();
		if(@$_REQUEST['treatmentsid']=="") {
$uploads_dir = 'uploads/ind_doc/';
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
								

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_individual_treatments');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&treatmentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));



			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_treatments', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['treatmentsid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&treatmentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['deltreatments']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_treatments WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&treatmentspanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewtreatments = getAnyTableWhereData('na_individual_treatments', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenstreatmentssql = "SELECT * FROM na_individual_treatments WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquerytrt = mysqli_query($con, $studenstreatmentssql) or mysqli_error();
	$stunumtrt = mysqli_num_rows($resquerytrt);
//================================= Treatments   Ends ========================================


//================================Add Outcounter Medicine==============================



if(@$_REQUEST['submit']=="drugsubmitout") {

	extract($_POST);
	if(@$_REQUEST['medioutpanel']=="") {
	    $uploads_dir = 'uploads/ind_doc/';
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

		$data = array('ind_id'=>$_SESSION["userid"],'drug_name'=>$drug_name,'issue_date'=>date('Y-m-d',strtotime($issue_date)),'reason'=>$reason,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
		$result = insertData($data, 'na_st_medical_overcounter');
		
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?operation=successful&medicalout=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	} else {
		$data = array('ind_id'=>$_SESSION["userid"],'drug_name'=>$drug_name,'issue_date'=>date('Y-m-d',strtotime($issue_date)),'reason'=>$reason,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
		
		$result = updateData($data,'na_st_medical_overcounter', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['medioutid']."' ") ;
		
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?operation=successful&medicalout=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
	}
} 
	
$viewmediover = getAnyTableWhereData('na_st_medical_overcounter', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
$sqlmediover = "SELECT * FROM na_st_medical_overcounter WHERE ind_id = '".$_SESSION["userid"]."'";
$resquerymedi = mysqli_query($con, $sqlmediover) or mysqli_error();
$stunumtrt = mysqli_num_rows($resquerymedi);
//================================Add Outcounter Medicine==============================

if(@$_REQUEST['delxxxx']!='') {
		 $delsql = "DELETE from na_st_medical_overcounter WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?operation=successful&medicalout=1&accr=1';\n";
		echo "</script>";
		}
	}
	
	
	//================================SUPRATIM Individual Drug Add/Update/view==============================
	
	//================================Prescription  Area================================================
	if(@$_REQUEST['submit']=="prescriptionsubmit") {
		extract($_POST);
		if(@$_REQUEST['prescriptionpanel']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'prescription_name'=>$prescription_name,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();
			$result = insertData($data, 'na_st_prescription');
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&pdrugmedication=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		
		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'prescription_name'=>$prescription_name,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = updateData($data,'na_st_prescription', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['prescriptionid']."' ") ;
			
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&pdrugmedication=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	
			$viewprescription = getAnyTableWhereData('na_st_prescription', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
			$sqlmediover = "SELECT * FROM na_st_prescription WHERE ind_id = '".$_SESSION["userid"]."'";
			$resquerymedi = mysqli_query($con, $sqlmediover) or mysqli_error();
			$stunumtrt = mysqli_num_rows($resquerymedi);


	if(@$_REQUEST['delprescr']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_st_prescription WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);

		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?operation=successful&pdrugmedication=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
		}
	}
	
	//================================Precimedicine Area================================================
	if(@$_REQUEST['submit']=="precimedisubmit") {
		extract($_POST);
		if(@$_REQUEST['pmedi']==1) {
			$data = array('ind_id'=>$_SESSION["userid"],'preci_id'=>$_REQUEST['preci_id'],'date_of_issue'=>date('Y-m-d',strtotime($date_of_issue)),'description'=>$description,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_st_precimedicine');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&pdrugmedication=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'preci_id'=>$_REQUEST['preci_id'],'date_of_issue'=>date('Y-m-d',strtotime($date_of_issue)),'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			
			//print_r($data); 
			//exit();
			
			$result = updateData($data,'na_st_precimedicine', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['preci_id']."'") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&pdrugmedication=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 
	
	$viewprescription = getAnyTableWhereData('na_st_prescription', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$sqlmediover = "SELECT * FROM na_st_prescription WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquerymedi = mysqli_query($con, $sqlmediover) or mysqli_error();
	$stunumtrt = mysqli_num_rows($resquerymedi);


	if(@$_REQUEST['delsubprescr']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from `na_st_precimedicine` WHERE `id` = '".@$_REQUEST['id']."'";
		$arddd=mysqli_query($con, $delsql);

		if($arddd){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?operation=successful&pdrugmedication=1&accordionTeal=".$accordionTeal."&accr=1';\n";
		echo "</script>";
		}
	}
	//================================Precimedicine Area================================================
	//================================Prescription  Area================================================

if(@$_REQUEST['submit']=="drugsubmit") {
	extract($_POST);

		

		//$drug_date = explode("/",$_REQUEST['drug_date']);

		//$formatdrug_date = $drug_date[2]."-".$drug_date[1]."-".$drug_date[0];

		$formatdrug_date=date('Y-m-d',strtotime($_REQUEST['drug_date']));

		

		if(@$_REQUEST['drugsid']=="") {
$uploads_dir = 'uploads/ind_doc/';
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
								

			$data = array('ind_id'=>$_SESSION["userid"],'drug_date'=>$formatdrug_date,'drug_name'=>$drug_name,'outcome'=>$outcome,'image'=>json_encode($imageArr),'reason'=>addslashes($reason), 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_drug');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&drugspanel=".$drugspanel."&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'drug_date'=>$formatdrug_date,'drug_name'=>$drug_name,'outcome'=>$outcome,'reason'=>addslashes($reason), 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,' na_drug', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['drugsid']."' ");

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&drugspanel=".$drugspanel."&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	}

	//Delete Drugs

	if(@$_REQUEST['del']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_drug WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&drugspanel=".$_REQUEST['drugspanel']."&accr=1';\n";

		echo "</script>";

	}

	$viewdrugs = getAnyTableWhereData('na_drug', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensdrugsql = "SELECT * FROM na_drug WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery2 = mysqli_query($con, $studensdrugsql) or mysqli_error();
	$stunum2 = mysqli_num_rows($resquery2);
	//================================SUPRATIM Individual Drug Add/Update/view===================================	



//================================ Claim Add/Update/view start==============================
	
if(@$_REQUEST['submit']=="claimsubmit") {
	
	extract($_POST);

		$formatclaim_date = date('Y-m-d',strtotime($_REQUEST['report_date']));

		if(@$_REQUEST['claimid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatclaim_date, 'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_individual_claim');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&mis=1&claimpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatclaim_date, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_individual_claim', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['claimid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&mis=1&claimpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete claim

	if(@$_REQUEST['delclaim']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_individual_claim WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&mis=1&claimpanel=".$_REQUEST['claimpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewclaim = getAnyTableWhereData('na_individual_claim', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensclaimssql = "SELECT * FROM na_individual_claim WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery16mis = mysqli_query($con, $studensclaimssql) or mysqli_error();

	$stunum16mis = mysqli_num_rows($resquery16mis);
	
//================================ Claim Add/Update/view end==============================

//================================ Claim form Add/Update/view start==============================
	
if(@$_REQUEST['submit']=="claimformsubmit") {
	
	extract($_POST);

		$formatclaimform_date = date('Y-m-d',strtotime($_REQUEST['report_date']));

		if(@$_REQUEST['claimformid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatclaimform_date, 'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_claim_form');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&mis=1&claimformpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatclaimform_date, 'description'=>$description,'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_individual_claim_form', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['claimformid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&mis=1&claimformpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	

	//Delete claimform

	if(@$_REQUEST['delclaimform']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_individual_claim_form WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&mis=1&claimformpanel=".$_REQUEST['claimformpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewclaimform = getAnyTableWhereData('na_individual_claim_form', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensclaimformssql = "SELECT * FROM na_individual_claim_form WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery16claimformmis = mysqli_query($con, $studensclaimformssql) or mysqli_error();

	$stunum16claimformmis = mysqli_num_rows($resquery16claimformmis);
	
//================================ Claim form Add/Update/view end==============================

//================================ Evaluation Report Add/Update/view start==============================
	
if(@$_REQUEST['submit']=="evalsubmit") {
	
	extract($_POST);

		$formateval_date = date('Y-m-d',strtotime($_REQUEST['report_date']));

		if(@$_REQUEST['evalid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formateval_date, 'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_individual_evaluation_report');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&mis=1&evalpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formateval_date, 'description'=>$description,'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_evaluation_report', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['evalid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&mis=1&evalpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	

	//Delete eval

	if(@$_REQUEST['deleval']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_individual_evaluation_report WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&mis=1&evalpanel=".$_REQUEST['evalpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$vieweval = getAnyTableWhereData('na_individual_evaluation_report', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensevalssql = "SELECT * FROM na_individual_evaluation_report WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery16eval = mysqli_query($con, $studensevalssql) or mysqli_error();

	$stunum16eval = mysqli_num_rows($resquery16eval);
	
//================================ Evaluation Report Add/Update/view end==============================

//================================ Training Report Add/Update/view start==============================
if(@$_REQUEST['submit']=="trnsubmit") {
	extract($_POST);
		$formattrn_date = date('Y-m-d',strtotime($_REQUEST['report_date']));
		if(@$_REQUEST['trnid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formattrn_date, 'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_individual_training_report');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&mis=1&trnpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formattrn_date, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_training_report', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['trnid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&mis=1&trnpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	//Delete trn
	if(@$_REQUEST['deltrn']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_training_report WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&mis=1&trnpanel=".$_REQUEST['trnpanel']."&accr=1';\n";
		echo "</script>";
	}
	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewtrn = getAnyTableWhereData('na_individual_training_report', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenstrnssql = "SELECT * FROM na_individual_training_report WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery16trn = mysqli_query($con, $studenstrnssql) or mysqli_error();
	$stunum16trn = mysqli_num_rows($resquery16trn);
//================================ Training Report Add/Update/view end==============================

//================================ Academic Report [GUPI-Correction] Add/Update/view start==============================
if(@$_REQUEST['submit']=="acasubmit") {
	extract($_POST);
		$formattrn_date = date('Y-m-d',strtotime($_REQUEST['report_date']));
		if(@$_REQUEST['acaid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formattrn_date, 'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status,'lastedit'=>date('Y-m-d H:i:s'));
			$result = insertData($data, 'na_individual_academic_report');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&mis=1&acapanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formattrn_date, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_academic_report', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['acaid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&mis=1&acapanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	//Delete trn
	if(@$_REQUEST['delaca']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_academic_report WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&mis=1&acapanel=".$_REQUEST['acapanel']."&accr=1';\n";
		echo "</script>";
	}
	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewaca = getAnyTableWhereData('na_individual_academic_report', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensacasql = "SELECT * FROM na_individual_academic_report WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery16aca = mysqli_query($con, $studensacasql) or mysqli_error();
	$stunum16aca = mysqli_num_rows($resquery16aca);
//================================ Academic Report [GUPI-Correction] Add/Update/view end==============================

//================================ Academic Report Add/Update/view start==============================
	
if(@$_REQUEST['submit']=="repcsubmit") {
	
	extract($_POST);

		$formatrepc_date = date('Y-m-d',strtotime($_REQUEST['report_date']));

		if(@$_REQUEST['repcid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatrepc_date, 'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_individual_report_card');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&mis=1&repcpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>$formatrepc_date, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_individual_report_card', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['repcid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&mis=1&repcpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete repc

	if(@$_REQUEST['delrepc']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_individual_report_card WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&mis=1&repcpanel=".$_REQUEST['repcpanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewrepc = getAnyTableWhereData('na_individual_report_card', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensrepcssql = "SELECT * FROM na_individual_report_card WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery16repc = mysqli_query($con, $studensrepcssql) or mysqli_error();

	$stunum16repc = mysqli_num_rows($resquery16repc);
	
//================================ Academic Report Add/Update/view end==============================

//================================= Instructional Information starts======================================


if(@$_REQUEST['submit']=="instructionalinfosubmit") {

		extract($_POST);

		if(@$_REQUEST['instructionalinfodid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'Program_enrolled'=>$Program_enrolled,'Dates_of_Attendance'=>date('Y-m-d',strtotime($Dates_of_Attendance)),'image'=>json_encode($imageArr),'classes'=>$classes,'Achievements'=>$Achievements,'seminar_schedule'=>date('Y-m-d',strtotime($seminar_schedule)),'award'=>$award,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_instructional_info');
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalinfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'Program_enrolled'=>$Program_enrolled,'Dates_of_Attendance'=>date('Y-m-d',strtotime($Dates_of_Attendance)),'classes'=>$classes,'Achievements'=>$Achievements,'seminar_schedule'=>date('Y-m-d',strtotime($seminar_schedule)),'award'=>$award,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_instructional_info', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['instructionalinfodid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalinfopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs

	if(@$_REQUEST['delinstructionalinfo']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_instructional_info WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&inst=1&instructionalinfopanel=1&accr=1';\n";
		echo "</script>";
		}
	}
	$viewinstructionalinfo = getAnyTableWhereData('na_individual_instructional_info', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensinstructionalinfosql = "SELECT * FROM na_individual_instructional_info WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryinstructionalinfo = mysqli_query($con, $studensinstructionalinfosql) or mysqli_error();
	$stunuminstructionalinfo = mysqli_num_rows($resqueryinstructionalinfo);

//================================= Instructional Information ends======================================

//================================= Curriculum/Activity Transcript(Complete) starts ======================================


if(@$_REQUEST['submit']=="completecurrsubmit") {

		extract($_POST);

		if(@$_REQUEST['completecurrdid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_complete_curriculam');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&completecurrpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_complete_curriculam', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['completecurrdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&completecurrpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs

	if(@$_REQUEST['delcompletecurr']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_complete_curriculam WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&inst=1&completecurrpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewcompletecurr = getAnyTableWhereData('na_individual_complete_curriculam', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studenscompletecurrsql = "SELECT * FROM na_individual_complete_curriculam WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquerycompletecurr = mysqli_query($con, $studenscompletecurrsql) or mysqli_error();

	$stunumcompletecurr = mysqli_num_rows($resquerycompletecurr);
	

//================================= Curriculum/Activity Transcript(Complete) ends ======================================

//================================= Curriculum/Activity Transcript(Incomplete or ongoing program) starts ======================================


if(@$_REQUEST['submit']=="incompletecurrsubmit") {
		extract($_POST);
		if(@$_REQUEST['incompletecurrdid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_incomplete_curriculam');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&incompletecurrpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_incomplete_curriculam', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['incompletecurrdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&incompletecurrpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs

	if(@$_REQUEST['delincompletecurr']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_incomplete_curriculam WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&inst=1&incompletecurrpanel=1&accr=1';\n";
		echo "</script>";
		}
	}

	$viewincompletecurr = getAnyTableWhereData('na_individual_incomplete_curriculam', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensincompletecurrsql = "SELECT * FROM na_individual_incomplete_curriculam WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryincompletecurr = mysqli_query($con, $studensincompletecurrsql) or mysqli_error();
	$stunumincompletecurr = mysqli_num_rows($resqueryincompletecurr);

//================================= Curriculum/Activity Transcript(Incomplete or ongoing program) ends ======================================

//=================================Instructional/Activity Records starts ======================================


if(@$_REQUEST['submit']=="instructionalactsubmit") {
		extract($_POST);
		if(@$_REQUEST['instructionalactdid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'identification_no'=>$identification_no,'extracurricular_activity'=>$extracurricular_activity,'projects'=>$projects,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_instructional_activity');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalactpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'identification_no'=>$identification_no,'extracurricular_activity'=>$extracurricular_activity,'projects'=>$projects,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_instructional_activity', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['instructionalactdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalactpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";
			echo "</script>";

		}

	} 

	//Delete Drugs

	if(@$_REQUEST['delinstructionalact']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_instructional_activity WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&inst=1&instructionalactpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewinstructionalact = getAnyTableWhereData('na_individual_instructional_activity', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensinstructionalactsql = "SELECT * FROM na_individual_instructional_activity WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryinstructionalact = mysqli_query($con, $studensinstructionalactsql) or mysqli_error();

	$stunuminstructionalact = mysqli_num_rows($resqueryinstructionalact);
	

//================================= Instructional/Activity Records ends ======================================

//=================================Video Presentation inst starts ======================================


if(@$_REQUEST['submit']=="instructionalvideosubmit") {

		extract($_POST);

		if(@$_REQUEST['instructionalvideodid']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

			$result = insertData($data, 'na_individual_inst_video_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalvideopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_inst_video_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['instructionalvideodid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalvideopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

	} 

	//Delete Drugs

	if(@$_REQUEST['delinstructionalvideo']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_inst_video_presentation WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&inst=1&instructionalvideopanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewinstructionalvideo = getAnyTableWhereData('na_individual_inst_video_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensinstructionalvideosql = "SELECT * FROM na_individual_inst_video_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryinstructionalvideo = mysqli_query($con, $studensinstructionalvideosql) or mysqli_error();

	$stunuminstructionalvideo = mysqli_num_rows($resqueryinstructionalvideo);
	


//================================= Video Presentation inst ends ======================================

//=================================Audio Presentation inst starts ======================================


if(@$_REQUEST['submit']=="instructionalaudiosubmit") {

		extract($_POST);

		if(@$_REQUEST['instructionalaudiodid']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

			$result = insertData($data, 'na_individual_inst_audio_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalaudiopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_inst_audio_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['instructionalaudiodid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalaudiopanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

	} 

	//Delete Drugs

	if(@$_REQUEST['delinstructionalaudio']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_inst_audio_presentation WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&inst=1&instructionalaudiopanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewinstructionalaudio = getAnyTableWhereData('na_individual_inst_audio_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensinstructionalaudiosql = "SELECT * FROM na_individual_inst_audio_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryinstructionalaudio = mysqli_query($con, $studensinstructionalaudiosql) or mysqli_error();

	$stunuminstructionalaudio = mysqli_num_rows($resqueryinstructionalaudio);
	


//================================= Audio Presentation inst ends ======================================

//=================================Award inst starts ======================================


if(@$_REQUEST['submit']=="instructionalawardsubmit") {

		extract($_POST);

		if(@$_REQUEST['instructionalawarddid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'Date'=>date('Y-m-d',strtotime($Date)),'description'=>$description,'name'=>$name,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

			$result = insertData($data, 'na_individual_inst_award');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalawardpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'Date'=>date('Y-m-d',strtotime($Date)),'description'=>$description,'name'=>$name,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_inst_award', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['instructionalawarddid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inst=1&instructionalawardpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

	} 

	//Delete Drugs

	if(@$_REQUEST['delinstructionalaward']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_inst_award WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&inst=1&instructionalawardpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewinstructionalaward = getAnyTableWhereData('na_individual_inst_award', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensinstructionalawardsql = "SELECT * FROM na_individual_inst_award WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryinstructionalaward = mysqli_query($con, $studensinstructionalawardsql) or mysqli_error();

	$stunuminstructionalaward = mysqli_num_rows($resqueryinstructionalaward);


//================================= Award inst ends ======================================

//================================ Activity/Experience Type Add/Update/view starts==============================


if(@$_REQUEST['submit']=="activityexpsubmit") {
	extract($_POST);
		if(@$_REQUEST['activityexpid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();
			$result = insertData($data, 'na_individual_activity_exp');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&activityexppanel=1&accordionTeal=".$accordionTeal."&accrr=1';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();

			$result = updateData($data,'na_individual_activity_exp', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityexpid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&activityexppanel=1&accordionTeal=".$accordionTeal."&accrr=1';\n";
			echo "</script>";
		}
	} 
	//Delete activityexp

	if(@$_REQUEST['delactivityexp']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_activity_exp WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&activityexppanel=".$_REQUEST['activityexppanel']."&accrr=1';\n";
		echo "</script>";
	}

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewactivityexp = getAnyTableWhereData('na_individual_activity_exp', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensactivityexpssql = "SELECT * FROM na_individual_activity_exp WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityexp = mysqli_query($con, $studensactivityexpssql) or mysqli_error();
	$stunumactivityexp = mysqli_num_rows($resqueryactivityexp);
	
//================================ Activity/Experience Type Add/Update/view ends==============================

//================================ Activity video presentation starts==============================


if(@$_REQUEST['submit']=="activityvideosubmit") {

		extract($_POST);

		if(@$_REQUEST['activityvideodid']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_activity_video_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&activityvideopanel=1&accordionTeal=".$accordionTeal."&accrr=1';\n";
			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_activity_video_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityvideodid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&activityvideopanel=1&accordionTeal=".$accordionTeal."&accrr=1';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs

	if(@$_REQUEST['delactivityvideo']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_activity_video_presentation WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&inst=1&activityvideopanel=1&accrr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewactivityvideo = getAnyTableWhereData('na_individual_activity_video_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensactivityvideosql = "SELECT * FROM na_individual_activity_video_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryactivityvideo = mysqli_query($con, $studensactivityvideosql) or mysqli_error();

	$stunumactivityvideo = mysqli_num_rows($resqueryactivityvideo);
	

	
//================================ Activity video presentation ends==============================

//================================ Activity Audio Presentation inst starts ======================================


if(@$_REQUEST['submit']=="activityaudiosubmit") {

		extract($_POST);

		if(@$_REQUEST['activityaudiodid']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_activity_audio_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&activityaudiopanel=1&accordionTeal=".$accordionTeal."&accrr=1';\n";
			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_activity_audio_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityaudiodid']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst=1&activityaudiopanel=1&accordionTeal=".$accordionTeal."&accrr=1';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs

	if(@$_REQUEST['delactivityaudio']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_activity_audio_presentation WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&inst=1&activityaudiopanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewactivityaudio = getAnyTableWhereData('na_individual_activity_audio_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensactivityaudiosql = "SELECT * FROM na_individual_activity_audio_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryactivityaudio = mysqli_query($con, $studensactivityaudiosql) or mysqli_error();

	$stunumactivityaudio = mysqli_num_rows($resqueryactivityaudio);
	


//================================= Activity Audio Presentation inst ends ======================================

//==============================[04-11-2016]========================================

//================================ Activity/Experience Type1 Add/Update/view starts==============================


if(@$_REQUEST['submit']=="activityexpsubmit1") {
	extract($_POST);
		if(@$_REQUEST['activityexpid1']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();
			$result = insertData($data, 'na_individual_sports_activity_exp');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&activityexppanel1=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();

			$result = updateData($data,'na_individual_sports_activity_exp', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityexpid1']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&activityexppanel1=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 
	//Delete activityexp

	if(@$_REQUEST['delactivityexp1']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_sports_activity_exp WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&activityexppanel1=".$_REQUEST['activityexppanel1']."';\n";
		echo "</script>";
	}

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewactivityexp1 = getAnyTableWhereData('na_individual_sports_activity_exp', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensactivityexpssql1 = "SELECT * FROM na_individual_sports_activity_exp WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityexp1 = mysqli_query($con, $studensactivityexpssql1) or mysqli_error();
	$stunumactivityexp1 = mysqli_num_rows($resqueryactivityexp1);
	
//================================ Activity/Experience Type Add/Update/view ends==============================

//================================SUPRATIM coach1 Add/Update/view==============================

	if(@$_REQUEST['submit']=="coachsubmit1") {
		extract($_POST);
		if(@$_REQUEST['coachid1']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'phone'=>$phone,'email'=>$email,'sample'=>$sample, 'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_sports_coach');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&coachpanel1=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'phone'=>$phone,'email'=>$email,'sample'=>$sample, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_sports_coach', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['coachid1']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&coachpanel1=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 
	//Delete Coach

	if(@$_REQUEST['delcoach1']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_sports_coach WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&coachpanel1=".$_REQUEST['coachpanel1']."';\n";
		echo "</script>";
	}

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewcoach1 = getAnyTableWhereData('na_sports_coach', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenscoachssql1 = "SELECT * FROM na_sports_coach WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery71 = mysqli_query($con, $studenscoachssql1) or mysqli_error();
	$stunum71 = mysqli_num_rows($resquery71);
	//================================SUPRATIM coach1 Add/Update/view==============================

//================================ Activity video presentation1 starts==============================
if(@$_REQUEST['submit']=="activityvideosubmit1") {
		extract($_POST);
		if(@$_REQUEST['activityvideodid1']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_sports_activity_video_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst1=1&activityvideopanel11=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_sports_activity_video_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityvideodid1']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst1=1&activityvideopanel11=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs
	if(@$_REQUEST['delactivityvideo1']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_sports_activity_video_presentation WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation1=successful&inst1=1&activityvideopanel11=1';\n";
		echo "</script>";
		}
	}

	$viewactivityvideo1 = getAnyTableWhereData('na_individual_sports_activity_video_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensactivityvideosql1 = "SELECT * FROM na_individual_sports_activity_video_presentation WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityvideo1 = mysqli_query($con, $studensactivityvideosql1) or mysqli_error();
	$stunumactivityvideo1 = mysqli_num_rows($resqueryactivityvideo1);
//================================ Activity video presentation1 ends==============================


//================================ Activity Audio Presentation1 inst starts ======================================
if(@$_REQUEST['submit']=="activityaudiosubmit1") {
		extract($_POST);
		if(@$_REQUEST['activityaudiodid1']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_sports_activity_audio_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst1=1&activityaudiopanel1=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_sports_activity_audio_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityaudiodid1']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst1=1&activityaudiopanel1=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs
	if(@$_REQUEST['delactivityaudio1']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_sports_activity_audio_presentation WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&inst1=1&activityaudiopanel1=1';\n";
		echo "</script>";
		}
	}

	$viewactivityaudio1 = getAnyTableWhereData('na_individual_sports_activity_audio_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensactivityaudiosql1 = "SELECT * FROM na_individual_sports_activity_audio_presentation WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityaudio1 = mysqli_query($con, $studensactivityaudiosql1) or mysqli_error();
	$stunumactivityaudio1 = mysqli_num_rows($resqueryactivityaudio1);
//================================= Activity Audio Presentation1 inst ends ======================================


//================================ Activity/Experience Type2 Add/Update/view starts==============================


if(@$_REQUEST['submit']=="activityexpsubmit2") {
		extract($_POST);
		if(@$_REQUEST['activityexpid2']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();
			$result = insertData($data, 'na_individual_entertainment_activity_exp');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&activityexppanel2=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();

			$result = updateData($data,'na_individual_entertainment_activity_exp', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityexpid2']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&activityexppanel2=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 
	//Delete activityexp

	if(@$_REQUEST['delactivityexp2']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_entertainment_activity_exp WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&activityexppanel2=".$_REQUEST['activityexppanel2']."';\n";
		echo "</script>";
	}

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewactivityexp2 = getAnyTableWhereData('na_individual_entertainment_activity_exp', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensactivityexpssql2 = "SELECT * FROM na_individual_entertainment_activity_exp WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityexp2 = mysqli_query($con, $studensactivityexpssql2) or mysqli_error();
	$stunumactivityexp2 = mysqli_num_rows($resqueryactivityexp2);
	
//================================ Activity/Experience Type2 Add/Update/view ends==============================


//================================SUPRATIM coach2 Add/Update/view==============================

	if(@$_REQUEST['submit']=="coachsubmit2") {
		extract($_POST);
		if(@$_REQUEST['coachid2']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'phone'=>$phone,'email'=>$email,'sample'=>$sample,'image'=>json_encode($imageArr),'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_entertainment_coach');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&coachpanel2=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'phone'=>$phone,'email'=>$email,'sample'=>$sample, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_entertainment_coach', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['coachid2']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&coachpanel2=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 
	//Delete Coach

	if(@$_REQUEST['delcoach2']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_entertainment_coach WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&coachpanel2=".$_REQUEST['coachpanel2']."';\n";
		echo "</script>";
	}

	$viewcoach2 = getAnyTableWhereData('na_entertainment_coach', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenscoachssql2 = "SELECT * FROM na_entertainment_coach WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery72 = mysqli_query($con, $studenscoachssql2) or mysqli_error();
	$stunum72 = mysqli_num_rows($resquery72);
	//================================SUPRATIM coach2 Add/Update/view==============================


//================================ Activity video presentation2 starts==============================
if(@$_REQUEST['submit']=="activityvideosubmit2") {
		extract($_POST);
		if(@$_REQUEST['activityvideodid2']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_entertainment_activity_video_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst2=1&activityvideopanel22=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_entertainment_activity_video_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityvideodid2']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst2=1&activityvideopanel22=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs
	if(@$_REQUEST['delactivityvideo2']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_entertainment_activity_video_presentation WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation2=successful&inst2=1&activityvideopanel22=1';\n";
		echo "</script>";
		}
	}

	$viewactivityvideo2 = getAnyTableWhereData('na_individual_entertainment_activity_video_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensactivityvideosql2 = "SELECT * FROM na_individual_entertainment_activity_video_presentation WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityvideo2 = mysqli_query($con, $studensactivityvideosql2) or mysqli_error();
	$stunumactivityvideo2 = mysqli_num_rows($resqueryactivityvideo2);
//================================ Activity video presentation2 ends==============================


//================================ Activity Audio Presentation2 inst starts ======================================
if(@$_REQUEST['submit']=="activityaudiosubmit2") {
		extract($_POST);
		if(@$_REQUEST['activityaudiodid2']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>1, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_entertainment_activity_audio_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst2=1&activityaudiopanel2=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_entertainment_activity_audio_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityaudiodid2']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst2=1&activityaudiopanel2=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs
	if(@$_REQUEST['delactivityaudio2']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_entertainment_activity_audio_presentation WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&inst2=1&activityaudiopanel2=1';\n";
		echo "</script>";
		}
	}

	$viewactivityaudio2 = getAnyTableWhereData('na_individual_entertainment_activity_audio_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensactivityaudiosql2 = "SELECT * FROM na_individual_entertainment_activity_audio_presentation WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityaudio2 = mysqli_query($con, $studensactivityaudiosql2) or mysqli_error();
	$stunumactivityaudio2 = mysqli_num_rows($resqueryactivityaudio2);
//================================= Activity Audio Presentation2 inst ends ======================================

//================================ Activity/Experience Type3 Add/Update/view starts==============================


if(@$_REQUEST['submit']=="activityexpsubmit3") {
		extract($_POST);
		if(@$_REQUEST['activityexpid3']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();
			$result = insertData($data, 'na_individual_arts_activity_exp');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&activityexppanel3=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);
			//exit();

			$result = updateData($data,'na_individual_arts_activity_exp', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityexpid3']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&activityexppanel3=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 
	//Delete activityexp

	if(@$_REQUEST['delactivityexp3']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_arts_activity_exp WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&activityexppanel3=".$_REQUEST['activityexppanel3']."';\n";
		echo "</script>";
	}

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");
	$viewactivityexp3 = getAnyTableWhereData('na_individual_arts_activity_exp', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studensactivityexpssql3 = "SELECT * FROM na_individual_arts_activity_exp WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityexp3 = mysqli_query($con, $studensactivityexpssql3) or mysqli_error();
	$stunumactivityexp3 = mysqli_num_rows($resqueryactivityexp3);
	
//================================ Activity/Experience Type3 Add/Update/view ends==============================

//================================SUPRATIM coach3 Add/Update/view==============================

	if(@$_REQUEST['submit']=="coachsubmit3") {
		extract($_POST);
		if(@$_REQUEST['coachid3']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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
		    
			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'phone'=>$phone,'email'=>$email,'sample'=>$sample, 'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_arts_coach');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&coachpanel3=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'phone'=>$phone,'email'=>$email,'sample'=>$sample, 'description'=>$description,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_arts_coach', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['coachid3']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&coachpanel3=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 
	//Delete Coach

	if(@$_REQUEST['delcoach3']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_arts_coach WHERE id = '".@$_REQUEST['id']."'";
		mysqli_query($con, $delsql);
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&coachpanel3=".$_REQUEST['coachpanel3']."';\n";
		echo "</script>";
	}

	$viewcoach3 = getAnyTableWhereData('na_arts_coach', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
	$studenscoachssql3 = "SELECT * FROM na_arts_coach WHERE ind_id = '".$_SESSION["userid"]."'";
	$resquery73 = mysqli_query($con, $studenscoachssql3) or mysqli_error();
	$stunum73 = mysqli_num_rows($resquery73);
	//================================SUPRATIM coach2 Add/Update/view==============================


//================================ Activity video presentation3 starts==============================
if(@$_REQUEST['submit']=="activityvideosubmit3") {
		extract($_POST);
		if(@$_REQUEST['activityvideodid3']=="") {
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_arts_activity_video_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst3=1&activityvideopanel33=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		} else {
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_video'=>$link_video,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = updateData($data,'na_individual_arts_activity_video_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityvideodid3']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst3=1&activityvideopanel33=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs
	if(@$_REQUEST['delactivityvideo3']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_arts_activity_video_presentation WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation3=successful&inst3=1&activityvideopanel33=1';\n";
		echo "</script>";
		}
	}

	$viewactivityvideo3 = getAnyTableWhereData('na_individual_arts_activity_video_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensactivityvideosql3 = "SELECT * FROM na_individual_arts_activity_video_presentation WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityvideo3 = mysqli_query($con, $studensactivityvideosql3) or mysqli_error();
	$stunumactivityvideo3 = mysqli_num_rows($resqueryactivityvideo3);
//================================ Activity video presentation3 ends==============================

//================================ Activity Audio Presentation3 inst starts ======================================
if(@$_REQUEST['submit']=="activityaudiosubmit3") {
		extract($_POST);
		if(@$_REQUEST['activityaudiodid3']=="") {

			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			$result = insertData($data, 'na_individual_arts_activity_audio_presentation');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst3=1&activityaudiopanel3=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'link_audio'=>$link_audio,'IP_Address'=>$IP_Address,'comments'=>$comments,'sample'=>$sample,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_arts_activity_audio_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['activityaudiodid3']."' ") ;
			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='individual.php?operation=successful&inst3=1&activityaudiopanel3=1&accordionTeal=".$accordionTeal."';\n";
			echo "</script>";
		}
	} 

	//Delete Drugs
	if(@$_REQUEST['delactivityaudio3']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {
		$delsql = "DELETE from na_individual_arts_activity_audio_presentation WHERE id = '".@$_REQUEST['id']."'";
		$ard=mysqli_query($con, $delsql);
		if($ard){	
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
		echo "window.top.location.href='individual.php?deloperation=successful&inst3=1&activityaudiopanel3=1';\n";
		echo "</script>";
		}
	}

	$viewactivityaudio3 = getAnyTableWhereData('na_individual_arts_activity_audio_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensactivityaudiosql3 = "SELECT * FROM na_individual_arts_activity_audio_presentation WHERE ind_id = '".$_SESSION["userid"]."'";
	$resqueryactivityaudio3 = mysqli_query($con, $studensactivityaudiosql3) or mysqli_error();
	$stunumactivityaudio3 = mysqli_num_rows($resqueryactivityaudio3);
//================================= Activity Audio Presentation3 inst ends ======================================

//==============================[04-11-2016]========================================

//================================ Wellness Activity information starts ======================================


if(@$_REQUEST['submit']=="wellness_actsubmit") {

		extract($_POST);

		if(@$_REQUEST['wellness_actdid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'date_of_issue'=>date('Y-m-d',strtotime($date_of_issue)),'description'=>$description,'image'=>json_encode($imageArr),'name'=>$name,'school'=>$school,'outcome'=>$outcome,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

			$result = insertData($data, 'na_individual_wellness_act');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inj=1&wellness_actpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'date_of_issue'=>date('Y-m-d',strtotime($date_of_issue)),'description'=>$description,'name'=>$name,'status'=>$status,'school'=>$school,'outcome'=>$outcome, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_wellness_act', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['wellness_actdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inj=1&wellness_actpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

	} 

	//Delete Drugs

	if(@$_REQUEST['delwellness_act']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_wellness_act WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&inj=1&wellness_actpanel=1&accr=1';\n";

		echo "</script>";

		}

	}

	$viewwellness_act = getAnyTableWhereData('na_individual_wellness_act', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studenswellness_actsql = "SELECT * FROM na_individual_wellness_act WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquerywellness_act = mysqli_query($con, $studenswellness_actsql) or mysqli_error();

	$stunumwellness_act = mysqli_num_rows($resquerywellness_act);
	

//=================================Wellness Activity information ends ======================================

//================================ Fitness/Exercise/Training Activity information starts ======================================


if(@$_REQUEST['submit']=="fitnesssubmit") {

		extract($_POST);

		if(@$_REQUEST['fitnessdid']=="") {
		    $uploads_dir = 'uploads/ind_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'date_of_issue'=>date('Y-m-d',strtotime($date_of_issue)),'description'=>$description,'image'=>json_encode($imageArr),'name'=>$name,'school'=>$school,'outcome'=>$outcome,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));

			//print_r($data);

			//exit();

			$result = insertData($data, 'na_individual_fitness');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inj=1&fitnesspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		} else {
			
			$data = array('ind_id'=>$_SESSION["userid"],'date_of_issue'=>date('Y-m-d',strtotime($date_of_issue)),'description'=>$description,'name'=>$name,'school'=>$school,'outcome'=>$outcome,'status'=>$status, 'lastedit'=>date('Y-m-d H:i:s'));
			//print_r($data);

			//exit();

			$result = updateData($data,'na_individual_fitness', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['fitnessdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='individual.php?operation=successful&inj=1&fitnesspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

	} 

	//Delete Drugs

	if(@$_REQUEST['delfitness']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		$delsql = "DELETE from na_individual_fitness WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='individual.php?deloperation=successful&inj=1&fitnesspanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewfitness = getAnyTableWhereData('na_individual_fitness', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensfitnesssql = "SELECT * FROM na_individual_fitness WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryfitness = mysqli_query($con, $studensfitnesssql) or mysqli_error();

	$stunumfitness = mysqli_num_rows($resqueryfitness);

//=================================Fitness/Exercise/Training Activity information ends ======================================

?>
<script type="text/javascript">

	function check(){

	 var conference_id = document.getElementById("conference_id").value;

	 var social_seq_no = document.getElementById("social_seq_no").value;

	 

	 if(conference_id=='') {

		 	document.getElementById("con_error").innerHTML="Please Type Conference Id";

			document.getElementById("conference_id").focus();

			return false;

	 } else {

		 document.getElementById("con_error").innerHTML="";

	 }

	 

	 if(social_seq_no=='') {

		 	document.getElementById("con_error2").innerHTML="Please Type Social Security Number";

			document.getElementById("social_seq_no").focus();

			return false;

	 } else {

		 document.getElementById("con_error2").innerHTML="";

	 }

	 if(isNaN(social_seq_no)) {

		 	document.getElementById("con_error2").innerHTML="Please Type Social Security Number in Digit only";

			document.getElementById("social_seq_no").value="";

			document.getElementById("social_seq_no").focus();

			return false;

	 }

	}





	function drug(){

		

		var drug_name = document.getElementById("drug_name").value;

		var reason = document.getElementById("reason").value;

		if(drug_name=='') {

		 	document.getElementById("drug_error").innerHTML="Please Enter Drug Name";

			document.getElementById("drug_name").focus();

			return false;

	 } else {

		 document.getElementById("drug_error").innerHTML="";

	 }

	 if(reason=='') {

		 	document.getElementById("reason_error").innerHTML="Please Enter Reason";

			document.getElementById("reason").focus();

			return false;

	 } else {

		 document.getElementById("reason_error").innerHTML="";

	 }

		}

		

	function award(){

		

		var award_name = document.getElementById("award_name").value;

		if(award_name=='') {

		 	document.getElementById("award_error").innerHTML="Please Enter Award Name";

			document.getElementById("award_name").focus();

			return false;

	 } else {

		 document.getElementById("award_error").innerHTML="";

	 }

		}  

		

	function rehabilitation(){

		

		var rehab_name = document.getElementById("rehab_name").value;

		if(rehab_name=='') {

		 	document.getElementById("rehabilitation_error").innerHTML="Please Enter Rehab Name";

			document.getElementById("rehab_name").focus();

			return false;

	 } else {

		 document.getElementById("rehabilitation_error").innerHTML="";

	 }

	 

		}

		

	function institute(){

		

		var institute_name = document.getElementById("institute_name").value;

		if(institute_name=='') {

		 	document.getElementById("institute_error").innerHTML="Please Enter Institute Name";

			document.getElementById("institute_name").focus();

			return false;

	 } else {

		 document.getElementById("institute_error").innerHTML="";

	 }

	 

		}

	function teacher(){

		

		var teacher_name = document.getElementById("teacher_name").value;

		if(teacher_name=='') {

		 	document.getElementById("teacher_error").innerHTML="Please Enter Teacher Name";

			document.getElementById("teacher_name").focus();

			return false;

	 } else {

		 document.getElementById("teacher_error").innerHTML="";

	 }

	 

		}

		

	function coach(){
		var coach_name = document.getElementById("coach_name").value;
		if(coach_name=='') {
		 	document.getElementById("coach_error").innerHTML="Please Enter Coach Name";
			document.getElementById("coach_name").focus();
			return false;
	 } else {
		 document.getElementById("coach_error").innerHTML="";
	 }
		}

	
		function coach1(){
		var coach_name1 = document.getElementById("coach_name1").value;
		if(coach_name1=='') {
		 	document.getElementById("coach_error1").innerHTML="Please Enter Coach Name";
			document.getElementById("coach_name1").focus();
			return false;
	 } else {
		 document.getElementById("coach_error1").innerHTML="";
	 }
		}
		
		function coach2(){
		var coach_name2 = document.getElementById("coach_name2").value;
		if(coach_name2=='') {
		 	document.getElementById("coach_error2").innerHTML="Please Enter Coach Name";
			document.getElementById("coach_name2").focus();
			return false;
	 } else {
		 document.getElementById("coach_error2").innerHTML="";
	 }
		}
		
	function coach3(){
		var coach_name3 = document.getElementById("coach_name3").value;
		if(coach_name3=='') {
		 	document.getElementById("coach_error3").innerHTML="Please Enter Coach Name";
			document.getElementById("coach_name3").focus();
			return false;
	 } else {
		 document.getElementById("coach_error3").innerHTML="";
	 }
		}

	function recomendationgg(){

		//alert("kkkk");

		

		var recomendation_person = document.getElementById("recomendation_person").value;

		if(recomendation_person=='') {


		 	document.getElementById("recomendation_error").innerHTML="Please Enter Recomendation Person Name";

			document.getElementById("recomendation_person").focus();

			return false;

	 } else {

		 document.getElementById("recomendation_error").innerHTML="";

	 }

	 

		}

		

	function extraaa(){

		//alert("kkkk");

		

		var activity_name = document.getElementById("activity_name").value;

		if(activity_name=='') {

		 	document.getElementById("extra_error").innerHTML="Please Enter Activity Name";

			document.getElementById("activity_name").focus();

			return false;

	 } else {

		 document.getElementById("extra_error").innerHTML="";

	 }

	 

		}

		

		

	function job(){

		//alert("kkkk");

		

		var employer_name = document.getElementById("employer_name").value;

		if(employer_name=='') {

		 	document.getElementById("job_error").innerHTML="Please Enter Employer Name";

			document.getElementById("employer_name").focus();

			return false;

	 } else {

		 document.getElementById("job_error").innerHTML="";

	 }

	 

		}

		

	function videopresentation(){

		//alert("kkkk");

		

		var link_rec_video = document.getElementById("link_rec_video").value;

		if(link_rec_video=='') {

		 	document.getElementById("videopresentation_error").innerHTML="Please Enter Video Link";

			document.getElementById("link_rec_video").focus();

			return false;

	 } else {

		 document.getElementById("videopresentation_error").innerHTML="";

	 }

	 

		}

		

		function academictranscript(){

		//alert("kkkk");

		

		var grades = document.getElementById("grades").value;

		if(grades=='') {

		 	document.getElementById("academictranscript_error").innerHTML="Please Enter Grade";

			document.getElementById("grades").focus();

			return false;

	 } else {

		 document.getElementById("academictranscript_error").innerHTML="";

	 }

	 

		}

		

	function educationalrecorddd(){

		//alert("kkkk");

		

		var gradess = document.getElementById("gradess").value;

		if(gradess=='') {

		 	document.getElementById("educationalrecord_error").innerHTML="Please Enter Grade";

			document.getElementById("gradess").focus();

			return false;

	 } else {

		 document.getElementById("educationalrecord_error").innerHTML="";

	 }

	 

		}

		

		

	function issuerofreport(){

		//alert("kkkk");

		

		var name = document.getElementById("name").value;

		if(name=='') {

		 	document.getElementById("issuerofreport_error").innerHTML="Please Enter Name";

			document.getElementById("name").focus();

			return false;

	 } else {

		 document.getElementById("issuerofreport_error").innerHTML="";

	 }

	 

		}

		

	function report(){
		//alert("kkkk");
		var pagedes18 = document.getElementById("pagedes18").value;
		if(pagedes18=='') {
		 	document.getElementById("report_error").innerHTML="Please Enter Description";
			document.getElementById("pagedes18").focus();
			return false;
	 } else {
		 document.getElementById("report_error").innerHTML="";
	 }
		}

	function message(){

		//alert("kkkk");

		

		var msg_date = document.getElementById("msg_date").value;

		if(msg_date=='') {

		 	document.getElementById("message_error").innerHTML="Please Select Date";

			document.getElementById("msg_date").focus();

			return false;

	 } else {

		 document.getElementById("message_error").innerHTML="";

	 }

	 

		}

		

	function audiopresentation(){

		//alert("kkkk");

		

		var link_rec_audio = document.getElementById("link_rec_audio").value;

		if(link_rec_audio=='') {

		 	document.getElementById("audiopresentation_error").innerHTML="Please Enter Audio Link";

			document.getElementById("link_rec_audio").focus();

			return false;

	 } else {

		 document.getElementById("audiopresentation_error").innerHTML="";

	 }

	 

		}

		

	function personalrecomendation(){

		//alert("kkkk");

		

		var per_prov_rec = document.getElementById("per_prov_rec").value;

		if(per_prov_rec=='') {

		 	document.getElementById("personalrecomendation_error").innerHTML="Please Enter Persons Name";

			document.getElementById("per_prov_rec").focus();

			return false;

	 } else {

		 document.getElementById("personalrecomendation_error").innerHTML="";

	 }

	 

		}

		

	function reference(){

		//alert("kkkk");

		

		var ref_name = document.getElementById("ref_name").value;

		if(ref_name=='') {

		 	document.getElementById("reference_error").innerHTML="Please Enter Reference";

			document.getElementById("ref_name").focus();

			return false;

	 } else {

		 document.getElementById("reference_error").innerHTML="";

	 }

	 

		}

		

	function instructionalfacilities(){

		//alert("kkkk");

		

		var prog_enrolled = document.getElementById("prog_enrolled").value;

		if(prog_enrolled=='') {

		 	document.getElementById("instructionalfacilities_error").innerHTML="Please Enter Enrolled Program";

			document.getElementById("prog_enrolled").focus();

			return false;

	 } else {

		 document.getElementById("instructionalfacilities_error").innerHTML="";

	 }

	 

		}	

		

		

	function educationalinstitution(){

		//alert("kkkk");

		

		var program_enroll = document.getElementById("program_enroll").value;

		if(program_enroll=='') {

		 	document.getElementById("educationalinstitution_error").innerHTML="Please Enter Enrolled Program";

			document.getElementById("program_enroll").focus();

			return false;

	 } else {

		 document.getElementById("educationalinstitution_error").innerHTML="";

	 }

	 

		}

		

	function seminarattendaaa(){

		//alert("kkkk");

		

		var nameaaa = document.getElementById("nameaaa").value;

		if(nameaaa=='') {

		 	document.getElementById("seminarattend_error").innerHTML="Please Enter Name";

			document.getElementById("nameaaa").focus();

			return false;

	 } else {

		 document.getElementById("seminarattend_error").innerHTML="";

	 }

	 

		}	

</script>
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
    <div id="pci" <?php if(@$_REQUEST['update']=="success") {?> style="display:block;" <?php }?> style="display:none;">
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <div class="panel panel-collapse">
    <h4 style="cursor:pointer;" class="btn btn-success"><a id="ed" style="color:#FFF;">Educational & Academic Information:</a></h4>
    <div id="ead" <?php if(@$_REQUEST['eduins']==1 || @$_REQUEST['educationalinstitutionpanel']==1 || @$_REQUEST['seminarattendpanel']==1 || @$_REQUEST['teacherpanel']==1 || @$_REQUEST['atranscript']==1 || @$_REQUEST['educationalrecordpanel']==1 || @$_REQUEST['educationalrecordpanel']==1 || @$_REQUEST['extrapanel']==1 || @$_REQUEST['videopresentationpanel']==1 || @$_REQUEST['audiopresentationpanel']==1 || @$_REQUEST['recomendationpanel']==1 || @$_REQUEST['awardpanel']==1 || @$_REQUEST['curcrspanel']==1 || @$_REQUEST['degreepanel']==1) {?> style="display:block;" <?php }else{?> style="display:none;"<?php }?>>
    <div <?php if(@$_REQUEST['educationalinstitutionpanel']!=''){?> class="panel-heading active" <?php }else{?> class="panel-heading" <?php } ?> role="tab" id="educationalinstitutionpanel">        
    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-twentyone" aria-expanded="false">Information:
      <?=$educationalinstitutionpanel?>
      </a> </h4>
  </div>
  <div id="accordionTeal-twentyone" <?php if(@$_REQUEST['educationalinstitutionpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel">
    <div class="panel-body">
      <div class="pmb-block p-10  m-b-0">
        <div class="pmbb-body p-l-0">
          <?php if(@$_REQUEST['editeducationalinstitution']=='') { ?>
          <div class="pmbb-view">
            <div class="action-box">
                <div class="dropdown">
                  <button class="btn btn-info" type="button" data-pmb-action="edit"><i class="fa fa-plus"></i> Add Info</button>
                </div>
            </div>
                
            <dl class="dl-horizontal">
              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                <thead>
                  <tr>
                    <th>Student ID No</th>
                    <th>Program Enrolled</th>
                    <th>Dates of Attendance</th>
                    <th>Courses taken</th>
                    <th>Grade(s) achieved</th>
                    <th>Courses enrolled</th>
                    <th>Status</th>
                    <th>Track Date(Add/Edit)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

					while($vieweducationalinstitution = mysql_fetch_array($resquery21)) {

								  ?>
                  <tr>
                    <td><?=$vieweducationalinstitution['st_id']?></td>
                    <td><?=$vieweducationalinstitution['program_enroll']?></td>
                    <td><?=date("jS M Y", strtotime($vieweducationalinstitution['attend_date']))?></td>
                    <td><?=$vieweducationalinstitution['course_taken']?></td>
                    <td><?=$vieweducationalinstitution['Grades']?></td>
                    <td><?=$vieweducationalinstitution['course_enrolled']?></td>
                    <td><?php if($vieweducationalinstitution['status'] ==1){echo"Public";} else if($vieweducationalinstitution['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                    <td><?=date('jS F Y',strtotime($vieweducationalinstitution['lastedit']))?></td>
                    <td><a href="individual.php?ind_id=<?=$vieweducationalinstitution['ind_id']?>&id=<?=$vieweducationalinstitution['st_id']?>&editeducationalinstitution=educationalinstitutions&accr=1&educationalinstitutionpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$vieweducationalinstitution['ind_id']?>&id=<?=$vieweducationalinstitution['st_id']?>&deleducationalinstitution=val&educationalinstitutionpanel=1" style="color:#ff0000;">Delete</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </dl>
          </div>
          <?php } else { ?>
          <form name="educationalinstitutionform" id="educationalinstitutionform" onsubmit="return educationalinstitution();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="educationalinstitutionpanel" value="1" />
            <input type="hidden" name="educationalinstitutionid" value="<?=$vieweducationalinstitution['st_id']?>" />
            <div class="pmbb-edit" style="display:block;">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Attended Date</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <input type='text' class="form-control date-picker" id="attend_date" name="attend_date" value="<?=date("d-m-Y", strtotime($vieweducationalinstitution['attend_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Program Enrolled*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="program_enroll" name="program_enroll" placeholder="" value="<?=$vieweducationalinstitution['program_enroll']?>" >
                  </div>
                  <span id="educationalinstitution_error" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Courses Taken</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="course_taken" name="course_taken" placeholder="course_taken"  value="<?=$vieweducationalinstitution['course_taken']?>">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Grade(s) Achieved</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="Grades" name="Grades" placeholder="Grades"  value="<?=$vieweducationalinstitution['Grades']?>">
                  </div>
                </dd>
              </dl>
             
               <dl class="dl-horizontal">
                <dt class="p-t-10">Courses Enrolled</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="course_enrolled" name="course_enrolled" placeholder="course_enrolled"  value="<?=$vieweducationalinstitution['course_enrolled']?>">
                  </div>
                </dd>
              </dl>
               <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($vieweducationalinstitution['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($vieweducationalinstitution['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($vieweducationalinstitution['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
              <div class="m-t-30">
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="educationalinstitutionsubmit">Save</button>
                <a href="individual.php">
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </a> </div>
            </div>
          </form>
          <?php } ?>
          <form name="educationalinstitutionform" id="educationalinstitutionform" onsubmit="return educationalinstitution();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="educationalinstitutionpanel" value="1" />
            <div class="pmbb-edit">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Attended Date</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <input type='text' class="form-control date-picker" id="attend_date" name="attend_date" data-toggle="dropdown" placeholder="Click here...">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Program Enrolled*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="program_enroll" name="program_enroll" placeholder="">
                  </div>
                  <span id="educationalinstitution_error" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Courses Taken</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="course_taken" name="course_taken" placeholder="course_taken" >
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Grade(s) Achieved</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="Grades" name="Grades" placeholder="Grades">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Courses Enrolled</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="course_enrolled" name="course_enrolled" placeholder="course_enrolled">
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
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="educationalinstitutionsubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--==============Seminar===============-->
  <div class="panel panel-collapse">
    <div <?php if(@$_REQUEST['seminarattendpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="seminarattendpanel">
      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-twentytwo" aria-expanded="false">Seminars Attend:
        <?=$seminarattendpanel?>
        </a> </h4>
    </div>
    <div id="accordionTeal-twentytwo" <?php if(@$_REQUEST['seminarattendpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
      <div class="panel-body">
        <div class="pmb-block p-10  m-b-0">
          <div class="pmbb-body p-l-0">
            <?php if(@$_REQUEST['editseminarattend']=='') { ?>
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
                      <th>Seminar Name</th>
                      <th>Entry Date</th>
                      <th>Description</th>
                      <th>Seminar Schedule</th>
                      <th>Status</th>
                      <th>Track Date(Add/Edit)</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

								  	while($viewseminarattend = mysql_fetch_array($resquery22)) {

								  ?>
                    <tr>
                      <td><?=$viewseminarattend['name']?></td>
                      <td><?=date("jS M Y", strtotime($viewseminarattend['entry_date']))?></td>
                      <td><?=$viewseminarattend['Description']?></td>
                      <td><?=date("jS M Y", strtotime($viewseminarattend['semi_schedule']))?></td>
                      <td><?php if($viewseminarattend['status'] ==1){echo"Public";} else if($viewseminarattend['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                      <td><?=date('jS F Y',strtotime($viewseminarattend['entry_date']))?></td>
                      <td><a href="individual.php?ind_id=<?=$viewseminarattend['ind_id']?>&id=<?=$viewseminarattend['semi_id']?>&editseminarattend=seminarattends&accr=1&seminarattendpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewseminarattend['ind_id']?>&id=<?=$viewseminarattend['semi_id']?>&delseminarattend=val&seminarattendpanel=1" style="color:#ff0000;">Delete</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </dl>
            </div>
            <?php } else { ?>
            <form name="seminarattendform" id="seminarattendform" onsubmit="return seminarattendaaa();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <input type="hidden" name="seminarattendpanel" value="1" />
              <input type="hidden" name="seminarattendid" value="<?=$viewseminarattend['semi_id']?>" />
              <div class="pmbb-edit" style="display:block;">
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Seminar Name*</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="nameaaa" name="name" value="<?=$viewseminarattend['name']?>" >
                    </div>
                    <span id="seminarattend_error" style="color:#ff0000;">&nbsp;</span> </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Entry Date</dt>
                  <dd>
                    <div class="dtp-container dropdown fg-line">
                      <input type='text' class="form-control date-picker" id="entry_date" name="entry_date" value="<?=date("d-m-Y", strtotime($viewseminarattend['entry_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Description</dt>
                  <dd>
                    <div class="fg-line">
                      <textarea type="text" class="form-control" id="pagedes1" name="Description" placeholder="Description" ><?=$viewseminarattend['Description']?></textarea>
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Seminar Schedule</dt>
                  <dd>
                    <div class="dtp-container dropdown fg-line">
                      <input type='text' class="form-control date-picker" id="semi_schedule" name="semi_schedule" value="<?=date("d-m-Y", strtotime($viewseminarattend['semi_schedule']))?>" data-toggle="dropdown" placeholder="Click here...">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewseminarattend['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewseminarattend['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewseminarattend['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                <div class="m-t-30">
                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="seminarattendsubmit">Save</button>
                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </div>
              </div>
            </form>
            <?php } ?>
            <form name="seminarattendform" id="seminarattendform" onsubmit="return seminarattendaaa();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <input type="hidden" name="seminarattendpanel" value="1" />
              <div class="pmbb-edit">
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Seminar Name*</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="nameaaa" name="name">
                    </div>
                    <span id="seminarattend_error" style="color:#ff0000;">&nbsp;</span> </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Entry Date</dt>
                  <dd>
                    <div class="dtp-container dropdown fg-line">
                      <input type='text' class="form-control date-picker" id="entry_date" name="entry_date" data-toggle="dropdown" placeholder="Click here...">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Description</dt>
                  <dd>
                    <div class="fg-line">
                      <textarea type="text" class="form-control" id="pagedes1" name="Description" placeholder="Description"></textarea>
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Seminar Schedule</dt>
                  <dd>
                    <div class="dtp-container dropdown fg-line">
                      <input type='text' class="form-control date-picker" id="semi_schedule" name="semi_schedule" data-toggle="dropdown" placeholder="Click here...">
                    </div>
                  </dd>
                </dl>
                  <dl class="dl-horizontal">
                <dt class="p-t-10">Images/PDFs</dt>
                <dd>
                  <div class="fg-line">
                    <input type="file" class="form-control"  name="imagessem[]" accept="image/pdf" multiple>
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
                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="seminarattendsubmit">Save</button>
                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--==============Seminar===============-->
  <!--==============Current Course Date and Time===============-->
  <div class="panel panel-collapse">
    <div <?php if(@$_REQUEST['curcrspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="curcrspanel">
      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-curcrs" aria-expanded="false">Current Course:
        <?=$curcrspanel?>
        </a> </h4>
    </div>
    <div id="accordionTeal-curcrs" <?php if(@$_REQUEST['curcrspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
      <div class="panel-body">
        <div class="pmb-block p-10  m-b-0">
          <div class="pmbb-body p-l-0">
            <?php if(@$_REQUEST['editcurcrs']=='') { ?>
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
                      <th>Course Name</th>
                      <th>Course Description</th>
                      <th>Course Start Date</th>
                      <th>Course End Date</th>
                      <th>Status</th>
                      <th>Track Date(Add/Edit)</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
						while($viewcurcrs = mysql_fetch_array($resquerycurcrs)) {
					?>
                    <tr>
                      <td><?=$viewcurcrs['crs_name']?></td>
                      <td><?=substr(stripslashes($viewcurcrs['crs_desc']),0,20)?></td>
                      <td><?=date("jS M Y", strtotime($viewcurcrs['crs_startdate']))?></td>
                      <td><?=date("jS M Y", strtotime($viewcurcrs['crs_enddate']))?></td>
                      <td><?php if($viewcurcrs['status'] ==1){echo"Public";} else if($viewcurcrs['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                      <td><?=date('jS F Y',strtotime($viewcurcrs['lastedit']))?></td>
                      <td><a href="individual.php?ind_id=<?=$viewcurcrs['ind_id']?>&id=<?=$viewcurcrs['id']?>&editcurcrs=curcrs&accr=1&curcrspanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewcurcrs['ind_id']?>&id=<?=$viewcurcrs['id']?>&delcurcrs=val&curcrspanel=1" style="color:#ff0000;">Delete</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </dl>
            </div>
            <?php } else { ?>
            <form name="curcrsform" id="curcrsform" onsubmit="return curcrsvald();"  action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <input type="hidden" name="curcrspanel" value="1" />
              <input type="hidden" name="curcrsid" value="<?=$viewcurcrs['id']?>" />
              <div class="pmbb-edit" style="display:block;">
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course Name*</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="curcrsname" name="crs_name" value="<?=$viewcurcrs['crs_name']?>" >
                    </div>
                    <span id="curcrserror" style="color:#ff0000;">&nbsp;</span> </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course Description</dt>
                  <dd>
                    <div class="fg-line">
                      <textarea type="text" class="form-control" name="crs_desc" id="pagedes2" cols="6" style="height:150px;"><?=stripslashes($viewcurcrs['crs_desc'])?>
</textarea>
                    </div>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course Start Date</dt>
                  <dd>
                    <div class="dtp-container dropdown fg-line">
                      <input type='text' class="form-control date-picker" name="crs_startdate" value="<?=date("d-m-Y", strtotime($viewcurcrs['crs_startdate']))?>" data-toggle="dropdown">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course End Date</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control date-picker" name="crs_enddate"  value="<?=date('d-m-Y', strtotime($viewcurcrs['crs_enddate']))?>">
                    </div>
                  </dd>
                </dl>
                
                <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewcurcrs['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewcurcrs['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewcurcrs['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                <div class="m-t-30">
                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="curcrssubmit">Save</button>
                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </div>
              </div>
            </form>
            <script>
                            function curcrsvald(){
                            if($("#curcrsname").val() == "" ){
                            $("#curcrsname").focus();
                            $("#curcrserror").html("Please Enter Course Name");
                            return false;
                            }else{
                            $("#curcrserror").html("");
                            }
                            }
                            </script>
            <?php } ?>
            <form name="curcrsform" id="curcrsform" onsubmit="return curcrsformedit();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <input type="hidden" name="curcrspanel" value="1" />
              <div class="pmbb-edit">
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course Name*</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="curcrsnameedit" name="crs_name">
                    </div>
                    <span id="curcrsedit_error" style="color:#ff0000;">&nbsp;</span> </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course Description</dt>
                  <dd>
                    <div class="fg-line">
                      <textarea type="text" class="form-control" name="crs_desc" id="pagedes2" cols="6" style="height:150px;"></textarea>
                    </div>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course Start Date</dt>
                  <dd>
                    <div class="dtp-container dropdown fg-line">
                      <input type='text' class="form-control date-picker" name="crs_startdate" data-toggle="dropdown">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course End Date</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control date-picker" name="crs_enddate">
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
                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="curcrssubmit">Save</button>
                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </div>
              </div>
            </form>
            <script>
                            function curcrsformedit(){
                            if($("#curcrsnameedit").val() == "" ){
                            $("#curcrsnameedit").focus();
                            $("#curcrsedit_error").html("Please Enter Course Name");
                            return false;
                            }else{
                            $("#curcrsedit_error").html("");
                            }
                            }
                            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--==============Current Course Date and Time===============-->
  <!--==============Teacher================-->
  <div class="panel panel-collapse">
    <div id="cur"<?php if(@$_REQUEST['eduins']=1) {?> style="display:block;" <?php }else{?> style="display:none;"<?php }?>>
    <div <?php if(@$_REQUEST['teacherpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="teacherpanel">
      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-atrans" aria-expanded="false"> Teacher:
        <?=$teacherpanel?>
        </a> </h4>
    </div>
    <div id="accordionTeal-atrans" <?php if(@$_REQUEST['teacherpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
      <div class="panel-body">
        <div class="pmb-block p-10  m-b-0">
          <div class="pmbb-body p-l-0">
            <?php if(@$_REQUEST['editteacher']=='') { ?>
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
                      <th>Teacher Name</th>
                      <th>Teacher Telephone No</th>
                      <th style="width:510px;">Teacher Email</th>
                      <th style="width:510px;">Learning Portal</th>
                      <th style="width:510px;">Course</th>
                      <th style="width:510px;">Program</th>
                      <th>Status</th>
                      <th>Track Date(Add/Edit)</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

								  	while($viewteacher = mysql_fetch_array($resquery6)) {

								  ?>
                    <tr>
                      <td><?=$viewteacher['teacher_name']?></td>
                      <td><?=$viewteacher['phone']?></td>
                      <td><?=$viewteacher['email']?></td>
                      <td><?=$viewteacher['learning_portal']?></td>
                      <td><?=$viewteacher['course']?></td>
                      <td><?=$viewteacher['academic_program']?></td>
                      <td><?php if($viewteacher['status'] ==1){echo"Public";} else if($viewteacher['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                      <td><?=date('jS F Y',strtotime($viewteacher['lastedit']))?></td>
                      <td><a href="individual.php?ind_id=<?=$viewteacher['ind_id']?>&id=<?=$viewteacher['id']?>&editteacher=teachers&accr=1&teacherpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewteacher['ind_id']?>&id=<?=$viewteacher['id']?>&delteacher=val&teacherpanel=1" style="color:#ff0000;">Delete</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </dl>
            </div>
            <?php } else { ?>
            <form name="teacherform" id="teacherform" onsubmit="return teacher();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <input type="hidden" name="teacherpanel" value="1" />
              <input type="hidden" name="teacherid" value="<?=$viewteacher['id']?>" />
              <div class="pmbb-edit" style="display:block;">
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Name*</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="<?=$viewteacher['teacher_name']?>">
                    </div>
                    <span id="teacher_error" style="color:#ff0000;">&nbsp;</span> </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Phone</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="phone" name="phone" value="<?=$viewteacher['phone']?>">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Email</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="email" name="email" value="<?=$viewteacher['email']?>">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Learning Portal</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="learning_portal" name="learning_portal" value="<?=$viewteacher['learning_portal']?>">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="course" name="course" value="<?=$viewteacher['course']?>">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Program</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="academic_program" name="academic_program" value="<?=$viewteacher['academic_program']?>">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewteacher['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewteacher['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewteacher['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                <div class="m-t-30">
                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="teachersubmit">Save</button>
                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </div>
              </div>
            </form>
            <?php } ?>
            <form name="teacherform" id="teacherform" onsubmit="return teacher();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <input type="hidden" name="teacherpanel" value="1" />
              <div class="pmbb-edit">
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Name*</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="teacher_name" name="teacher_name" placeholder="Name">
                    </div>
                    <span id="teacher_error" style="color:#ff0000;">&nbsp;</span> </dd>
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
                  <dt class="p-t-10">Learning Portal</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="learning_portal" name="learning_portal" placeholder="Learning Portal">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Course</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="course" name="course" placeholder="Course">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Program</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="academic_program" name="academic_program" placeholder="Program">
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
                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="teachersubmit">Save</button>
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
<!--==============Teacher================-->
<!--==============Diploma, Certificate, Degree awarded or conferred===============-->
<div class="panel panel-collapse">
  <div <?php if(@$_REQUEST['degreepanel']!='') { ?> class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="degreepanel">
    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-degree" aria-expanded="false">Diploma, Certificate, Degree awarded or conferred:
      <?=$degreepanel?>
      </a> </h4>
  </div>
  <div id="accordionTeal-degree" <?php if(@$_REQUEST['degreepanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
    <div class="panel-body">
      <div class="pmb-block p-10  m-b-0">
        <div class="pmbb-body p-l-0">
          <?php if(@$_REQUEST['editdegree']=='') { ?>
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
                    <th>Degree Name</th>
                    <th>Status</th>
                    <th>Track Date(Add/Edit)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

								  	while($viewdegree = mysql_fetch_array($resquerydegree)) {

								  ?>
                  <tr>
                    <td><?=$viewdegree['degname']?></td>
                    <td><?php if($viewdegree['status'] ==1){echo"Public";} else if($viewdegree['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                    <td><?=date('jS F Y',strtotime($viewdegree['lastedit']))?></td>
                    <td><a href="individual.php?ind_id=<?=$viewdegree['ind_id']?>&id=<?=$viewdegree['id']?>&editdegree=degree&accr=1&degreepanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewdegree['ind_id']?>&id=<?=$viewdegree['id']?>&deldegree=val&degreepanel=1" style="color:#ff0000;">Delete</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </dl>
          </div>
          <?php } else { ?>
          <form name="degreeform" id="degreeform" onsubmit="return degreevald();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="degreepanel" value="1" />
            <input type="hidden" name="degreeid" value="<?=$viewdegree['id']?>" />
            <div class="pmbb-edit" style="display:block;">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Degree Name*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="degname" name="degname" value="<?=$viewdegree['degname']?>" >
                  </div>
                  <span id="degreeerror" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewdegree['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewdegree['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewdegree['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

              <div class="m-t-30">
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="degreesubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
          <script>
                            function degreevald(){
                            if($("#degname").val() == "" ){
                            $("#degname").focus();
                            $("#degreeerror").html("Please Enter Degree Name");
                            return false;
                            }else{
                            $("#degreeerror").html("");
                            }
                            }
                            </script>
          <?php } ?>
          <form name="degreeform" id="degreeform" onsubmit="return degreeformedit();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="degreepanel" value="1" />
            <div class="pmbb-edit">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Degree Name*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="degnameedit" name="degname">
                  </div>
                  <span id="degedterror" style="color:#ff0000;">&nbsp;</span> </dd>
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
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="degreesubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
          <script>
                            function degreeformedit(){
                            if($("#degnameedit").val() == "" ){
                            $("#degnameedit").focus();
                            $("#degedterror").html("Please Enter Degree Name");
                            return false;
                            }else{
                            $("#degedterror").html("");
                            }
                            }
                            </script>
        </div>
      </div>
    </div>
  </div>
</div>
<!--==============Diploma, Certificate, Degree awarded or conferred===============-->
<!--==============Acedemic Transcript===============-->
<div class="panel panel-collapse">
  <div <?php if(@$_REQUEST['atranscriptid']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="teacherpanel">
    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-six" aria-expanded="false"> Academic Transcript:
      <?=$teacherpanel?>
      </a> </h4>
  </div>
  <div id="accordionTeal-six" <?php if(@$_REQUEST['atranscript']!=''){?>class="collapse in" <?php } else{?>class="collapse"<?php }?>role="tabpanel">
    <div class="panel-body">
      <div class="pmb-block p-10  m-b-0">
        <div class="pmbb-body p-l-0">
          <?php if(@$_REQUEST['edittranscript']=='') { ?>
          <div class="pmbb-view">
            <ul class="actions" style="position:static; float:right;">
              <li class="dropdown open">
                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">
                  <li> <a data-pmb-action="edit" href="#" class="btn btn-info" style="color:#FFF;">Add Info</a> </li>
                </ul>
              </li>
            </ul>
            <dl class="dl-horizontal">
              <table class="table table-striped table-bordered table-advance table-hover" width="50%">
                <thead>
                  <tr>
                    <th>Grade</th>
                    <th>Note</th>
                    <th>Comment</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Academic Start</th>
                    <th>Track Date(Add/Edit)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
									    while($viewatranscript = mysql_fetch_array($sqlatranscript)) {
                                      ?>
                  <tr>
                    <td><?=$viewatranscript['grade']?></td>
                    <td><?=$viewatranscript['note']?></td>
                    <td><?=$viewatranscript['comment']?></td>
                    <td><?=$viewatranscript['message']?></td>
                    <td><?php if($viewatranscript['status'] ==1){echo"Public";} else if($viewatranscript['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                    <td><?php 
                        if($viewatranscript['academic_status']=='1'){?>
                      <span>Complete</span>
                      <?php }else if($viewatranscript['academic_status']=='2'){?>
                      <span>Incomplete</span>
                      <?php }else if($viewatranscript['academic_status']=='3'){?>
                      <span>Ongoing</span>
                      <?php }?></td>
                    <td><?=date('jS F Y',strtotime($viewatranscript['lastedit']))?></td>  
                    <td><a href="individual.php?ind_id=<?=$viewatranscript['ind_id']?>&id=<?=$viewatranscript['id']?>&edittranscript=atranscript&accr=1&atranscript=1">Edit</a>&nbsp;|&nbsp; <a onclick="return confirm('Are you sure you want to delete');" href="individual.php?ind_id=<?=$viewatranscript['ind_id']?>&id=<?=$viewatranscript['id']?>&delatranscript=val&atranscript=1" style="color:#ff0000;">Delete</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </dl>
          </div>
          <?php } else { ?>
          <form name="atranscriptform" id="atranscriptform"  action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="atranscript" value="1" />
            <input type="hidden" name="atranscriptid" value="<?=$viewatranscriptedit['id']?>" />
            <div class="pmbb-edit" style="display:block;">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Grade*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="grade" name="grade" value="<?=$viewatranscriptedit['grade']?>">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Notes</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="note" name="note" value="<?=$viewatranscriptedit['note']?>">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Comments</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="comment" name="comment" value="<?=$viewatranscriptedit['comment']?>">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Message</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="message" name="message" value="<?=$viewatranscriptedit['message']?>">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Course</dt>
                <dd>
                  <div class="fg-line">
                    <select name="academic_status" class="form-control">
                      <option value="1" <?php if($viewatranscriptedit['academic_status']==1){?> selected="selected"<?php }?>>Complete</option>
                      <option value="2" <?php if($viewatranscriptedit['academic_status']==2){?> selected="selected"<?php }?>>Incomplete</option>
                      <option value="3" <?php if($viewatranscriptedit['academic_status']==3){?> selected="selected"<?php }?>>Ongoing</option>
                    </select>
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewatranscriptedit['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewatranscriptedit['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewatranscriptedit['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
              <div class="m-t-30">
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="atranscriptsubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
          <?php } ?>
          <form name="atranscriptform" id="atranscriptform" onsubmit="return atranscript();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="atranscript" value="1" />
            <div class="pmbb-edit">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Grade*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="grade" name="grade" placeholder="Grade">
                  </div>
                  <span id="teacher_error" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Note</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="note" name="note" placeholder="Note">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Comment</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="comment" name="comment" placeholder="Comment">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Message</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="message" name="message" placeholder="Message">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Academic Status</dt>
                <dd>
                  <div class="fg-line">
                    <select name="academic_status" class="form-control">
                      <option value="1">Complete</option>
                      <option value="2">Incomplete</option>
                      <option value="3">Ongoing</option>
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
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="atranscriptsubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--==============Acedemic Transcript===============-->
<!--====================Educational Record======================-->
<div class="panel panel-collapse">
  <div <?php if(@$_REQUEST['educationalrecordpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="educationalrecordpanel">
    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-thirteen" aria-expanded="false"> Educational Records:
      <?=$educationalrecordpanel?>
      </a> </h4>
  </div>
  <div id="accordionTeal-thirteen" <?php if(@$_REQUEST['educationalrecordpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
    <div class="panel-body">
      <div class="pmb-block p-10  m-b-0">
        <div class="pmbb-body p-l-0">
          <?php if(@$_REQUEST['editeducationalrecord']=='') { ?>
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
                    <th>Grades</th>
                    <th>Notes</th>
                    <th>Comments</th>
                    <th>Messages</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Track Date(Add/Edit)</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

								  	while($vieweducationalrecord = mysql_fetch_array($resquery13)) {

								  ?>
                  <tr>
                    <td><?=$vieweducationalrecord['grades']?></td>
                    <td><?=$vieweducationalrecord['notes']?></td>
                    <td><?=$vieweducationalrecord['comments']?></td>
                    <td><?=$vieweducationalrecord['messages']?></td>
                    <td><?php if($vieweducationalrecord['status'] ==1){echo"Public";} else if($vieweducationalrecord['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                    <td><?=date('jS F Y',strtotime($vieweducationalrecord['lastedit']))?></td>
                    <td><a href="individual.php?ind_id=<?=$vieweducationalrecord['ind_id']?>&id=<?=$vieweducationalrecord['id']?>&editeducationalrecord=educationalrecords&accr=1&educationalrecordpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$vieweducationalrecord['ind_id']?>&id=<?=$vieweducationalrecord['id']?>&deleducationalrecord=val&educationalrecordpanel=1" style="color:#ff0000;">Delete</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </dl>
          </div>
          <?php } else { ?>
          <form name="educationalrecordform" id="educationalrecordform" onsubmit="return educationalrecorddd();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="educationalrecordpanel" value="1" />
            <input type="hidden" name="educationalrecordid" value="<?=$vieweducationalrecord['id']?>" />
            <div class="pmbb-edit" style="display:block;">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Grades*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="gradess" name="grades" value="<?=$vieweducationalrecord['grades']?>">
                  </div>
                  <span id="educationalrecord_error" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Notes</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="notes" name="notes" value="<?=$vieweducationalrecord['notes']?>">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Comments</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="comments" name="comments" placeholder=""  value="<?=$vieweducationalrecord['comments']?>">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Messages</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="messages" name="messages" placeholder=""  value="<?=$vieweducationalrecord['messages']?>">
                  </div>
                </dd>
              </dl>
        
              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($vieweducationalrecord['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($vieweducationalrecord['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($vieweducationalrecord['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
              <div class="m-t-30">
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="educationalrecordsubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
          <?php } ?>
          <form name="educationalrecordform" id="educationalrecordform" onsubmit="return educationalrecorddd();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="educationalrecordpanel" value="1" />
            <div class="pmbb-edit">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Grades*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="gradess" name="grades">
                  </div>
                  <span id="educationalrecord_error" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Notes</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="notes" name="notes">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Comments</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="comments" name="comments" placeholder="">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Messages</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="messages" name="messages" placeholder="">
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
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="educationalrecordsubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--====================Educational Record======================-->
<!-- Extra start  -->
<div class="panel panel-collapse">
  <div <?php if(@$_REQUEST['extrapanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="extrapanel">
    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-nine" aria-expanded="false"> Extracurricullam:
      <?=$extrapanel?>
      </a> </h4>
  </div>
  <div id="accordionTeal-nine" <?php if(@$_REQUEST['extrapanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
    <div class="panel-body">
      <div class="pmb-block p-10  m-b-0">
        <div class="pmbb-body p-l-0">
          <?php if(@$_REQUEST['editextra']=='') { ?>
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
                    <th>Activity Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Track Date(Add/Edit)</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

								  	while($viewextra = mysql_fetch_array($resquery9)) {

								  ?>
                  <tr>
                    <td><?=$viewextra['activity_name']?></td>
                    <td><?=date("jS M Y", strtotime($viewextra['from_date']))?></td>
                    <td><?=$viewextra['activity_description']?></td>
                    <td><?php if($viewextra['status'] ==1){echo"Public";} else if($viewextra['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                    <td><?=date('jS F Y',strtotime($viewextra['lastedit']))?></td>
                    <td><a href="individual.php?ind_id=<?=$viewextra['ind_id']?>&id=<?=$viewextra['id']?>&editextra=extras&accr=1&extrapanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewextra['ind_id']?>&id=<?=$viewextra['id']?>&delextra=val&extrapanel=1" style="color:#ff0000;">Delete</a></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </dl>
          </div>
          <?php } else { ?>
          <form name="extraform" id="extraform" onsubmit="return extraaa();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="extrapanel" value="1" />
            <input type="hidden" name="extraid" value="<?=$viewextra['id']?>" />
            <div class="pmbb-edit" style="display:block;">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Activity Name*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="activity_name" name="activity_name" value="<?=$viewextra['activity_name']?>">
                  </div>
                  <span id="extra_error" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Date</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <input type='text' class="form-control date-picker" id="from_date" name="from_date" value="<?=date("d-m-Y", strtotime($viewextra['from_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Description</dt>
                <dd>
                  <div class="fg-line">
                    <textarea type="text" class="form-control" id="pagedes3" name="activity_description"><?=$viewextra['activity_description']?></textarea>
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
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="extrasubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
          <?php } ?>
          <form name="extraform" id="extraform" onsubmit="return extraaa();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="extrapanel" value="1" />
            <div class="pmbb-edit">
              <dl class="dl-horizontal">
                <dt class="p-t-10">Activity Name*</dt>
                <dd>
                  <div class="fg-line">
                    <input type="text" class="form-control" id="activity_name" name="activity_name">
                  </div>
                  <span id="extra_error" style="color:#ff0000;">&nbsp;</span> </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Date</dt>
                <dd>
                  <div class="dtp-container dropdown fg-line">
                    <input type='text' class="form-control date-picker" id="from_date" name="from_date" data-toggle="dropdown" placeholder="Click here...">
                  </div>
                </dd>
              </dl>
              <dl class="dl-horizontal">
                <dt class="p-t-10">Description</dt>
                <dd>
                  <div class="fg-line">
                    <textarea type="text" class="form-control" id="pagedes3" name="activity_description" placeholder="Description"></textarea>
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
                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="extrasubmit">Save</button>
                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--  extra end-->
<!--  video presentation starts -->
<div class="panel panel-collapse">
  <!--==============Video Presentation===========-->
  <div class="panel panel-collapse">
    <div <?php if(@$_REQUEST['videopresentationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="videopresentationpanel">
      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-eleven" aria-expanded="false">Video Presentation:
        <?=$videopresentationpanel?>
        </a> </h4>
    </div>
    <div id="accordionTeal-eleven" <?php if(@$_REQUEST['videopresentationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
      <div class="panel-body">
        <div class="pmb-block p-10  m-b-0">
          <div class="pmbb-body p-l-0">
            <?php if(@$_REQUEST['editvideopresentation']=='') { ?>
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
                      <th>Link To Record Videos</th>
                      <th>IP Address To Live Camera</th>
                      <th>Description</th>
                      <th>Comments By Others</th>
                      <th>Status</th>
                      <th>Track Date(Add/Edit)</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

								  	while($viewvideopresentation = mysql_fetch_array($resquery11)) {

								  ?>
                    <tr>
                      <td><?=date("jS M Y", strtotime($viewvideopresentation['video_date']))?></td>
                      <td><?=$viewvideopresentation['link_rec_video']?></td>
                      <td><?=$viewvideopresentation['ip_live_cam']?></td>
                      <td><?=$viewvideopresentation['description']?></td>
                      <td><?=$viewvideopresentation['comments']?></td>
                      <td><?php if($viewvideopresentation['status'] ==1){echo"Public";} else if($viewvideopresentation['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                      <td><?=date('jS F Y',strtotime($viewvideopresentation['lastedit']))?></td>
                      <td><a href="individual.php?ind_id=<?=$viewvideopresentation['ind_id']?>&id=<?=$viewvideopresentation['id']?>&editvideopresentation=videopresentations&accr=1&videopresentationpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewvideopresentation['ind_id']?>&id=<?=$viewvideopresentation['id']?>&delvideopresentation=val&videopresentationpanel=1" style="color:#ff0000;">Delete</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </dl>
            </div>
            <?php } else { ?>
            <form name="videopresentationform" id="videopresentationform" onsubmit="return videopresentation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <input type="hidden" name="videopresentationpanel" value="1" />
              <input type="hidden" name="videopresentationid" value="<?=$viewvideopresentation['id']?>" />
              <div class="pmbb-edit" style="display:block;">
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Date</dt>
                  <dd>
                    <div class="dtp-container dropdown fg-line">
                      <input type='text' class="form-control date-picker" id="video_date" name="video_date" value="<?=date("d-m-Y", strtotime($viewvideopresentation['video_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Link To Record Videos*</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="link_rec_video" name="link_rec_video" value="<?=$viewvideopresentation['link_rec_video']?>">
                    </div>
                    <span id="videopresentation_error" style="color:#ff0000;">&nbsp;</span> </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">IP Address To Live Camera</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="ip_live_cam" name="ip_live_cam" placeholder=""  value="<?=$viewvideopresentation['ip_live_cam']?>">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Description</dt>
                  <dd>
                    <div class="fg-line">
                      <textarea type="text" class="form-control" id="pagedes4" name="description"><?=$viewvideopresentation['description']?></textarea>
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Comments By Others</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="comments" name="comments" placeholder=""  value="<?=$viewvideopresentation['comments']?>">
                    </div>
                  </dd>
                </dl>
           <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewvideopresentation['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewvideopresentation['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewvideopresentation['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                <div class="m-t-30">
                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="videopresentationsubmit">Save</button>
                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </div>
              </div>
            </form>
            <?php } ?>
            <form name="videopresentationform" id="videopresentationform" onsubmit="return videopresentation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <input type="hidden" name="videopresentationpanel" value="1" />
              <input type="hidden" name="videopresentationid" value="<?=$viewvideopresentation['id']?>" />
              <div class="pmbb-edit">
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Date</dt>
                  <dd>
                    <div class="dtp-container dropdown fg-line">
                      <input type='text' class="form-control date-picker" id="video_date" name="video_date" data-toggle="dropdown" placeholder="Click here...">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Link To Record Videos*</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="link_rec_video" name="link_rec_video" value="<?=$viewvideopresentation['link_rec_video']?>">
                    </div>
                    <span id="videopresentation_error" style="color:#ff0000;">&nbsp;</span> </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">IP Address To Live Camera</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="ip_live_cam" name="ip_live_cam" placeholder="IP Address To Live Camera">
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Description</dt>
                  <dd>
                    <div class="fg-line">
                      <textarea type="text" class="form-control" id="pagedes4" name="description" placeholder="Description"></textarea>
                    </div>
                  </dd>
                </dl>
                <dl class="dl-horizontal">
                  <dt class="p-t-10">Comments By Others</dt>
                  <dd>
                    <div class="fg-line">
                      <input type="text" class="form-control" id="comments" name="comments" placeholder="Comments By Others">
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
                  <button class="btn btn-primary btn-sm" name="submit" type="submit" value="videopresentationsubmit">Save</button>
                  <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===============Video Presentation==========-->
</div>
<!--  video presentation End -->
<!--  Audio presentation starts -->
<div class="panel panel-collapse">
 	<!----=============Audio Presentation==========-->
              <div class="panel panel-collapse">
                <div <?php if(@$_REQUEST['audiopresentationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="audiopresentationpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-seventeen" aria-expanded="false">Audio Presentation:
                    <?=$audiopresentationpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-seventeen" <?php if(@$_REQUEST['audiopresentationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editaudiopresentation']=='') { ?>
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
                                  <th>Audio Date</th>
                                  <th>Link To Record Audio</th>
                                  <th>IP Live Camera</th>
                                  <th>Description</th>
                                  <th>Comments</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($viewaudiopresentation = mysql_fetch_array($resquery17)) {

								  ?>
                                <tr>
                                  <td><?=date("jS M Y", strtotime($viewaudiopresentation['audio_date']))?></td>
                                  <td><?=$viewaudiopresentation['link_rec_audio']?></td>
                                  <td><?=$viewaudiopresentation['ip_live_cam']?></td>
                                  <td><?=$viewaudiopresentation['description']?></td>
                                  <td><?=$viewaudiopresentation['comments']?></td>
                                   <td><?php if($viewaudiopresentation['status'] ==1){echo"Public";} else if($viewaudiopresentation['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewaudiopresentation['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewaudiopresentation['ind_id']?>&id=<?=$viewaudiopresentation['id']?>&editaudiopresentation=audiopresentations&accr=1&audiopresentationpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewaudiopresentation['ind_id']?>&id=<?=$viewaudiopresentation['id']?>&delaudiopresentation=val&audiopresentationpanel=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="audiopresentationform" id="audiopresentationform" onsubmit="return audiopresentation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="audiopresentationpanel" value="1" />
                          <input type="hidden" name="audiopresentationid" value="<?=$viewaudiopresentation['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="audio_date" name="audio_date" value="<?=date("d-m-Y", strtotime($viewaudiopresentation['audio_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Link To Record Audio*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="link_rec_audio" name="link_rec_audio" value="<?=$viewaudiopresentation['link_rec_audio']?>">
                                </div>
                                <span id="audiopresentation_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">IP Address To Live Camera</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="ip_live_cam" name="ip_live_cam" placeholder=""  value="<?=$viewaudiopresentation['ip_live_cam']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes5" name="description"><?=$viewaudiopresentation['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Comments</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="comments" name="comments" placeholder=""  value="<?=$viewaudiopresentation['comments']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewaudiopresentation['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewaudiopresentation['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewaudiopresentation['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="audiopresentationsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="audiopresentationform" id="audiopresentationform" onsubmit="return audiopresentation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="audiopresentationpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="audio_date" name="audio_date" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Link To Record Audio*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="link_rec_audio" name="link_rec_audio" placeholder="Link To Record Audio">
                                </div>
                                <span id="audiopresentation_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">IP Address To Live Camera</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="ip_live_cam" name="ip_live_cam" placeholder="IP Address To Live Camera">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes5" name="description" placeholder="Description"></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Comments</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="comments" name="comments" placeholder="Comments">
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
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="audiopresentationsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--===============Audio Presentation==========-->
              </div>
             <!--  Audio presentation end -->
                
              
              <!--===============Personal Recomendation======-->
              <div class="panel panel-collapse">
                <div <?php if(@$_REQUEST['recomendationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="recomendationpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-eight" aria-expanded="false"> Add Recommendation:
                    <?=$recomendationpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-eight" <?php if(@$_REQUEST['recomendationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editrecomendation']=='') { ?>
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
                                  <th>Recommendation Person</th>
                                  <th>Video Link</th>
                                  <th>Recommendation</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($viewrecomendation = mysql_fetch_array($resquery8)) {

								  ?>
                                <tr>
                                  <td><?=$viewrecomendation['recomendation_person']?></td>
                                  <td><?=$viewrecomendation['rec_video_link']?></td>
                                  <td><?=$viewrecomendation['recomendation']?></td>
                                   <td><?php if($viewrecomendation['status'] ==1){echo"Public";} else if($viewrecomendation['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewrecomendation['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewrecomendation['ind_id']?>&id=<?=$viewrecomendation['id']?>&editrecomendation=recomendations&accr=1&recomendationpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewrecomendation['ind_id']?>&id=<?=$viewrecomendation['id']?>&delrecomendation=val&recomendationpanel=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="recomendationform" id="recomendationform" onsubmit="return recomendationgg();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="recomendationpanel" value="1" />
                          <input type="hidden" name="recomendationid" value="<?=$viewrecomendation['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Recomendation Person*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="recomendation_person" name="recomendation_person" placeholder="Recomendation Person" value="<?=$viewrecomendation['recomendation_person']?>">
                                </div>
                                <span id="recomendation_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Video Link</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="rec_video_link" name="rec_video_link" placeholder="Video Link" value="<?=$viewrecomendation['rec_video_link']?>" >
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Recomendation</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="recomendation" name="recomendation" placeholder="Recomendation"  value="<?=$viewrecomendation['recomendation']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewrecomendation['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewrecomendation['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewrecomendation['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="recomendationsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="recomendationform" id="recomendationform" onsubmit="return recomendationgg();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="recomendationpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Recomendation Person*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="recomendation_person" name="recomendation_person" placeholder="Recomendation Person">
                                </div>
                                <span id="recomendation_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Video Link</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="rec_video_link" name="rec_video_link" placeholder="Video Link">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Recomendation</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="recomendation" name="recomendation" placeholder="Recomendation">
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
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="recomendationsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!---==============Personal Recomendation======-->
              
               <!--===============Award Section===============-->
                <div <?php if(@$_REQUEST['awardpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-three" aria-expanded="false"> Award:
                    <?=$awardpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-three" <?php if(@$_REQUEST['awardpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editaward']=='') { ?>
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
                                  <th>Award Name</th>
                                  <th>Award Date</th>
                                  <th style="width:522px;">Description</th>
                                  <th>Status</th>
                                  <th>Track Date(Add/Edit)</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php

								  	while($viewawards = mysql_fetch_array($resquery3)) {

								  ?>
                                <tr>
                                  <td><?=$viewawards['award_name']?></td>
                                  <td><?php if($viewawards['award_date']!='') { ?>
                                    <?=date("jS M Y", strtotime($viewawards['award_date']))?>
                                    <?php } ?></td>
                                    
                                  <td><?=stripslashes($viewawards['award_description'])?></td>
                                   <td><?php if($viewawards['status'] ==1){echo"Public";} else if($viewawards['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewawards['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewawards['ind_id']?>&id=<?=$viewawards['id']?>&editaward=awards&accr=1&awardpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewawards['ind_id']?>&id=<?=$viewawards['id']?>&delawards=val&awardpanel=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="awardform" id="awardform" onsubmit="return award();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="awardpanel" value="1" />
                          <input type="hidden" name="awardid" value="<?=$viewawards['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="award_name" name="award_name" value="<?=$viewawards['award_name']?>" placeholder="...........">
                                </div>
                                <span id="award_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="award_date1" name="award_date1" value="<?=date("d/m/Y", strtotime($viewawards['award_date']))?>" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
           	<textarea  class="form-control" id="pagedes6" name="award_description"><?=stripslashes($viewawards['award_description'])?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewawards['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewawards['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewawards['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="awardsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="awardform" id="awardform" onsubmit="return award();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="awardpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="award_name" name="award_name" value="<?=$viewawards['award_name']?>" placeholder="...........">
                                </div>
                                <span id="award_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date</dt>
                              <dd>
                                <div class="dtp-container dropdown fg-line">
                                  <input type='text' class="form-control date-picker" id="award_date" name="award_date" data-toggle="dropdown" placeholder="Click here...">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea  class="form-control" id="pagedes6" name="award_description"></textarea>
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
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="awardsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <!--===============Award Section===============-->   
                </div>  
			  <script>
                $(document).ready(function(){
                $("#ed").click(function(){
                $("#ead").toggle(800);
                });
                
                });
                </script>	
              </div>
              <!--==============Educational Institution===============-->
              <!-- Activities & Talents  starts [GENERAL]-->
              <div><h4 style="cursor:pointer;" class="btn btn-success"><a id="aat" style="color:#FFF;">Activities &amp; Talents:</a></h4></div>  
              <div id="saat" <?php if(@$_REQUEST['accrr']==1 || @$_REQUEST['activityexppanel']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>>
              	<!--  Add Activity/Experience Type starts  -->
              
              	<div class="panel panel-collapse" id="saat">
                <div <?php if(@$_REQUEST['activityexppanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityexppanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-four" aria-expanded="false"> Add Activity/Experience Type:
                    <?=$activityexppanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-four" <?php if(@$_REQUEST['activityexppanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editactivityexp']=='') { ?>
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

								  	while($viewactivityexp = mysql_fetch_array($resqueryactivityexp)) {

								  ?>
                                <tr>
                                  <td><?=date('d-m-Y',strtotime($viewactivityexp['date']));?></td>
                                  <td><?=$viewactivityexp['description']?></td>
                                   <td><?php if($viewactivityexp['status'] ==1){echo"Public";} else if($viewactivityexp['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewactivityexp['lastedit']))?></td>
                                   <td><a href="individual.php?ind_id=<?=$viewactivityexp['ind_id']?>&id=<?=$viewactivityexp['id']?>&editactivityexp=activityexps&accr=1&activityexppanel=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure want to delete?');" href="individual.php?ind_id=<?=$viewactivityexp['ind_id']?>&id=<?=$viewactivityexp['id']?>&delactivityexp=val&activityexppanel=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="activityexpform" id="activityexpform" onsubmit="return activityexp();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="activityexppanel" value="1" />
                          <input type="hidden" name="activityexpid" value="<?=$viewactivityexp['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date of the Activity/Experience*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type='text' class="form-control date-picker" id="date_acti" name="date" value="<?=date('d-m-Y',strtotime($viewactivityexp['date']))?>" placeholder="Date of the Activity/Experience">
                                </div>
                                <span id="activityexp_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description of the Activity/Experience</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" class="form-control" id="pagedes7" name="description"><?=$viewactivityexp['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewactivityexp['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewactivityexp['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewactivityexp['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityexpsubmit">Save</button>
                              <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="activityexpform" id="activityexpform" onsubmit="return activityexp();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="activityexppanel" value="1" />
                          <div class="pmbb-edit">
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date of the Activity/Experience*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type='text' class="form-control date-picker" id="date_acti" name="date" value="" placeholder="Date of the Activity/Experience">
                                </div>
                                <span id="activityexp_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description of the Activity/Experience</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" class="form-control" id="pagedes7" name="description"></textarea>
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
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityexpsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
                            function activityexp(){

								if($("#date_acti").val() == "" ){

									$("#date_acti").focus();

									$("#activityexp_error").html("Please Enter Date of the Activity/Experience");

									return false;

                            	}else{

									$("#activityexp_error").html("");

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
                <div <?php if(@$_REQUEST['coachpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="coachpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sevencoach" aria-expanded="false"> Add Coach:
                    <?=$coachpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sevencoach" <?php if(@$_REQUEST['coachpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editcoach']=='') { ?>
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

								  	while($viewcoach = mysql_fetch_array($resquery7)) {

								  ?>
                                <tr>
                                  <td><?=$viewcoach['coach_name']?></td>
                                  <td><?=$viewcoach['phone']?></td>
                                  <td><?=$viewcoach['email']?></td>
                                  <td><?=$viewcoach['sample']?></td>
                                  <td><?=$viewcoach['description']?></td>
                                  <td><?php if($viewcoach['status'] ==1){echo"Public";} else if($viewcoach['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewcoach['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewcoach['ind_id']?>&id=<?=$viewcoach['id']?>&editcoach=coachs&accr=1&coachpanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewcoach['ind_id']?>&id=<?=$viewcoach['id']?>&delcoach=val&coachpanel=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="coachform" id="coachform" onsubmit="return coach();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="coachpanel" value="1" />
                          <input type="hidden" name="coachid" value="<?=$viewcoach['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="coach_name" name="coach_name" value="<?=$viewcoach['coach_name']?>">
                                </div>
                                <span id="coach_error" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Phone</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="phone" name="phone" value="<?=$viewcoach['phone']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Email</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="email" name="email" value="<?=$viewcoach['email']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Sample</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="sample" name="sample" value="<?=$viewcoach['sample']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes8" name="description"><?=$viewcoach['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewcoach['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewcoach['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewcoach['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coachsubmit">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="coachform" id="coachform" onsubmit="return coach();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="coachpanel" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="coach_name" name="coach_name" placeholder="Name">
                                </div>
                                <span id="coach_error" style="color:#ff0000;">&nbsp;</span> </dd>
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
                                  <textarea type="text" class="form-control" id="pagedes8" name="description" placeholder="Coach Description"></textarea>
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
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coachsubmit">Save</button>
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

                    <div <?php if(@$_REQUEST['activityvideopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityvideopanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityvideo" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Video Presentations: </a> </h4>

                    </div>

                    <div id="accordionTeal-activityvideo" <?php if(@$_REQUEST['activityvideopanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editactivityvideo']=='') { ?>

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
								  	while($viewactivityvideo = mysql_fetch_array($resqueryactivityvideo)) {
								  ?>
                                    <tr>
                                      <td><?=date('jS F Y',strtotime($viewactivityvideo['date']));?></td>
                                      <td><?=$viewactivityvideo['description'];?></td>
                                      <td><?=$viewactivityvideo['sample'];?></td>
                                      <td><?=$viewactivityvideo['link_video'];?></td>
                                      <td><?=$viewactivityvideo['IP_Address'];?></td>
                                      <td><?=$viewactivityvideo['comments'];?></td>
                                       <td><?php if($viewactivityvideo['status'] ==1){echo"Public";} else if($viewactivityvideo['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewactivityvideo['lastedit']))?></td>
                                      <td><a href="individual.php?ind_id=<?=$viewactivityvideo['ind_id']?>&id=<?=$viewactivityvideo['id']?>&editactivityvideo=awards&accr=1&inst=1&activityvideopanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewactivityvideo['ind_id']?>&id=<?=$viewactivityvideo['id']?>&delactivityvideo=val&activityvideopanel=1&gen=1" style="color:#ff0000;">Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                            </div>
                            <?php } else { ?>

                            <form name="activityvideoform" id="activityvideoform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="activityvideopanel" value="1" />

                            <input type="hidden" name="activityvideodid" value="<?=$viewactivityvideo['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewactivityvideo['date']?>" id="date_activ" name="date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   <span id="activityvideo_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes9" name="description"><?php echo $viewactivityvideo['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Sample</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo['sample']?>" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Link to recorded video</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo['link_video']?>" id="link_video" name="link_video" data-toggle="dropdown" placeholder="Link to recorded video">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">IP Address to live camera</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments by Others</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Status</dt>
                                <dd>
                                  <div class="fg-line">
                                      <select name="status" class="form-control">
                                      <option value="1" <?php if($viewactivityvideo['status']==1){?> selected="selected"<?php }?>>Public</option>
                                      <option value="2" <?php if($viewactivityvideo['status']==2){?> selected="selected"<?php }?>>Private</option>
                                      <option value="3" <?php if($viewactivityvideo['status']==3){?> selected="selected"<?php }?>>Friends</option>
                                    </select>
                                  </div>
                                </dd>
                              </dl>


                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityvideosubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="activityvideoform" id="activityvideoform" onsubmit="return Submitactivityvideo3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="activityvideopanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="date_activ" name="date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   <span id="activityvideo_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes9" name="description"></textarea>

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityvideosubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitactivityvideo3(){

								if($("#date_activ").val() == "" ){

									$("#date_activ").focus();

									$("#activityvideo_error3").html("Please Enter Date");

									return false;

                            	}else{

									$("#activityvideo_error3").html("");

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

                    <div <?php if(@$_REQUEST['activityaudiopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityaudiopanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityaudio" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Audio Presentations: </a> </h4>

                    </div>

                    <div id="accordionTeal-activityaudio" <?php if(@$_REQUEST['activityaudiopanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editactivityaudio']=='') { ?>

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

								  	while($viewactivityaudio = mysql_fetch_array($resqueryactivityaudio)) {

								  ?>

                                    <tr>

                                      <td><?=date('d-m-Y',strtotime($viewactivityaudio['date']));?></td>

                                      <td><?=$viewactivityaudio['description'];?></td>
                                      
                                      <td><?=$viewactivityaudio['sample'];?></td>

                                      <td><?=$viewactivityaudio['link_audio'];?></td>
                                      
                                      <td><?=$viewactivityaudio['IP_Address'];?></td>
                                      
                                      <td><?=$viewactivityaudio['comments'];?></td>
                                      
                                      <td><?php if($viewactivityaudio['status'] ==1){echo"Public";} else if($viewactivityaudio['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      
                                      <td><?=date('jS F Y',strtotime($viewactivityaudio['lastedit']))?></td>

                                      <td><a href="individual.php?ind_id=<?=$viewactivityaudio['ind_id']?>&id=<?=$viewactivityaudio['id']?>&editactivityaudio=awards&accr=1&inst=1&activityaudiopanel=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewactivityaudio['ind_id']?>&id=<?=$viewactivityaudio['id']?>&delactivityaudio=val&activityaudiopanel=1&gen=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="activityaudioform" id="activityaudioform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="activityaudiopanel" value="1" />

                            <input type="hidden" name="activityaudiodid" value="<?=$viewactivityaudio['id']?>" />

                            <div class="pmbb-edit" style="display:block;">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewactivityaudio['date']?>" id="date_aud_acti" name="date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   <span id="activityaudio_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes10" name="description"><?php echo $viewactivityaudio['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Sample</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio['sample']?>" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Link to recorded Audio</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio['link_audio']?>" id="link_audio" name="link_audio" data-toggle="dropdown" placeholder="Link to recorded Audio">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">IP Address to live camera</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">

                                  </div>

                                </dd>

                              </dl>
                              
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments by Others</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewactivityaudio['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewactivityaudio['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewactivityaudio['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityaudiosubmit">Save</button>

                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="activityaudioform" id="activityaudioform" onsubmit="return Submitactivityaudio3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="activityaudiopanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="date_aud_acti" name="date" data-toggle="dropdown" placeholder="Date">

                                  </div>

                                   <span id="activityaudio_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea rows="5" cols="10" class="form-control " id="pagedes10" name="description"></textarea>

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityaudiosubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                           <script>
                            function Submitactivityaudio3(){

								if($("#date_aud_acti").val() == "" ){

									$("#date_aud_acti").focus();

									$("#activityaudio_error3").html("Please Enter Date");

									return false;

                            	}else{

									$("#activityaudio_error3").html("");

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
												   
							$("#aat").click(function(){
								$("#saat").toggle(800);
							});
							
						});
				 </script>
                 
               
               <!-- Activities & Talents  ends [GENERAL]-->
               
               <!-- Sports & Athletics Activities [04-11-2016]-->
              <div><h4 style="cursor:pointer;" class="btn btn-success"><a id="spatac" style="color:#FFF;">Sports &amp; Athletics Activities:</a></h4></div>  
              <div id="spoathact" <?php if(@$_REQUEST['activityexppanel1']==1 || @$_REQUEST['coachpanel1']==1 || @$_REQUEST['activityvideopanel11']==1 || @$_REQUEST['activityaudiopanel1']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>>
              	
                <!--  Add Activity/Experience Type starts  -->
              
              	<div class="panel panel-collapse" id="spoathact">
                <div <?php if(@$_REQUEST['activityexppanel1']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityexppanel1">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-four1" aria-expanded="false"> Add Activity/Experience Type:
                    <?=$activityexppanel1?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-four1" <?php if(@$_REQUEST['activityexppanel1']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editactivityexp1']=='') { ?>
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

								  	while($viewactivityexp1 = mysql_fetch_array($resqueryactivityexp1)) {

								  ?>
                                <tr>
                                  <td><?=date('d-m-Y',strtotime($viewactivityexp1['date']));?></td>
                                  <td><?=$viewactivityexp1['description']?></td>
                                   <td><?php if($viewactivityexp1['status'] ==1){echo"Public";} else if($viewactivityexp1['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewactivityexp1['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewactivityexp1['ind_id']?>&id=<?=$viewactivityexp1['id']?>&editactivityexp1=activityexps&accr=1&activityexppanel1=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure want to delete?');" href="individual.php?ind_id=<?=$viewactivityexp1['ind_id']?>&id=<?=$viewactivityexp1['id']?>&delactivityexp1=val&activityexppanel1=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="activityexpform1" id="activityexpform1" onsubmit="return activityexp1();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="activityexppanel1" value="1" />
                          <input type="hidden" name="activityexpid1" value="<?=$viewactivityexp1['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date of the Activity/Experience*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type='text' class="form-control date-picker" id="date_acti1" name="date" value="<?=date('d-m-Y',strtotime($viewactivityexp1['date']))?>" placeholder="Date of the Activity/Experience">
                                </div>
                                <span id="activityexp_error1" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description of the Activity/Experience</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" class="form-control" id="pagedes77" name="description"><?=$viewactivityexp1['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                            <dt class="p-t-10">Status</dt>
                            <dd>
                              <div class="fg-line">
                                  <select name="status" class="form-control">
                                  <option value="1" <?php if($viewactivityexp1['status']==1){?> selected="selected"<?php }?>>Public</option>
                                  <option value="2" <?php if($viewactivityexp1['status']==2){?> selected="selected"<?php }?>>Private</option>
                                  <option value="3" <?php if($viewactivityexp1['status']==3){?> selected="selected"<?php }?>>Friends</option>
                                </select>
                              </div>
                            </dd>
                          </dl>

                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityexpsubmit1">Save</button>
                              <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="activityexpform1" id="activityexpform1" onsubmit="return activityexp1();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="activityexppanel1" value="1" />
                          <div class="pmbb-edit">
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date of the Activity/Experience*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type='text' class="form-control date-picker" id="date_acti1" name="date" value="" placeholder="Date of the Activity/Experience">
                                </div>
                                <span id="activityexp_error1" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description of the Activity/Experience</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" class="form-control" id="pagedes78" name="description"></textarea>
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
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityexpsubmit1">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
                            function activityexp1(){

								if($("#date_acti1").val() == "" ){

									$("#date_acti1").focus();

									$("#activityexp_error1").html("Please Enter Date of the Activity/Experience");

									return false;

                            	}else{

									$("#activityexp_error1").html("");

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
                <div <?php if(@$_REQUEST['coachpanel1']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="coachpanel1">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sevencoach1" aria-expanded="false"> Add Coach:
                    <?=$coachpanel1?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sevencoach1" <?php if(@$_REQUEST['coachpanel1']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editcoach1']=='') { ?>
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

								  	while($viewcoach1 = mysql_fetch_array($resquery71)) {

								  ?>
                                <tr>
                                  <td><?=$viewcoach1['coach_name']?></td>
                                  <td><?=$viewcoach1['phone']?></td>
                                  <td><?=$viewcoach1['email']?></td>
                                  <td><?=$viewcoach1['sample']?></td>
                                  <td><?=$viewcoach1['description']?></td>
                                  <td><?php if($viewcoach1['status'] ==1){echo"Public";} else if($viewcoach1['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewcoach1['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewcoach1['ind_id']?>&id=<?=$viewcoach1['id']?>&editcoach1=coachs&accr=1&coachpanel1=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewcoach1['ind_id']?>&id=<?=$viewcoach1['id']?>&delcoach1=val&coachpanel1=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="coachform1" id="coachform1" onsubmit="return coach1();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="coachpanel1" value="1" />
                          <input type="hidden" name="coachid1" value="<?=$viewcoach1['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="coach_name1" name="coach_name" value="<?=$viewcoach1['coach_name']?>">
                                </div>
                                <span id="coach_error1" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Phone</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="phone" name="phone" value="<?=$viewcoach1['phone']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Email</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="email" name="email" value="<?=$viewcoach1['email']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Sample</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="sample" name="sample" value="<?=$viewcoach1['sample']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes81" name="description"><?=$viewcoach1['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewcoach1['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewcoach1['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewcoach1['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coachsubmit1">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="coachform1" id="coachform1" onsubmit="return coach1();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="coachpanel1" value="1" />
                          <div class="pmbb-edit">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="coach_name1" name="coach_name" placeholder="Name">
                                </div>
                                <span id="coach_error1" style="color:#ff0000;">&nbsp;</span> </dd>
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
                                  <textarea type="text" class="form-control" id="pagedes82" name="description" placeholder="Coach Description"></textarea>
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
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coachsubmit1">Save</button>
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
                    <div <?php if(@$_REQUEST['activityvideopanel11']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityvideopanel11">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityvideo11" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Video Presentations: </a> </h4>
                    </div>
                    <div id="accordionTeal-activityvideo11" <?php if(@$_REQUEST['activityvideopanel11']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editactivityvideo11']=='') { ?>
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
								  	while($viewactivityvideo1 = mysql_fetch_array($resqueryactivityvideo1)) {
								  ?>
                                    <tr>
                                      <td><?=date('jS F Y',strtotime($viewactivityvideo1['date']));?></td>
                                      <td><?=$viewactivityvideo1['description'];?></td>
                                      <td><?=$viewactivityvideo1['sample'];?></td>
                                      <td><?=$viewactivityvideo1['link_video'];?></td>
                                      <td><?=$viewactivityvideo1['IP_Address'];?></td>
                                      <td><?=$viewactivityvideo1['comments'];?></td>
                                     <td><?php if($viewactivityvideo1['status'] ==1){echo"Public";} else if($viewactivityvideo1['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewactivityvideo1['lastedit']))?></td>
                                      <td><a href="individual.php?ind_id=<?=$viewactivityvideo1['ind_id']?>&id=<?=$viewactivityvideo1['id']?>&editactivityvideo11=awards&inst=1&activityvideopanel11=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewactivityvideo1['ind_id']?>&id=<?=$viewactivityvideo1['id']?>&delactivityvideo1=val&activityvideopanel11=1&gen=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                            </div>
                            <?php } else { ?>
                            <form name="activityvideoform11" id="activityvideoform11" onsubmit="return check91();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityvideopanel11" value="1" />
                            <input type="hidden" name="activityvideodid1" value="<?=$viewactivityvideo1['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="<?php echo $viewactivityvideo1['date']?>" id="date_activ1" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityvideo_error31" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes91" name="description"><?php echo $viewactivityvideo1['description']?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Sample</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo1['sample']?>" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Link to recorded video</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo1['link_video']?>" id="link_video" name="link_video" data-toggle="dropdown" placeholder="Link to recorded video">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">IP Address to live camera</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo1['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Comments by Others</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo1['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                            <dt class="p-t-10">Status</dt>
                            <dd>
                              <div class="fg-line">
                                  <select name="status" class="form-control">
                                  <option value="1" <?php if($viewactivityvideo1['status']==1){?> selected="selected"<?php }?>>Public</option>
                                  <option value="2" <?php if($viewactivityvideo1['status']==2){?> selected="selected"<?php }?>>Private</option>
                                  <option value="3" <?php if($viewactivityvideo1['status']==3){?> selected="selected"<?php }?>>Friends</option>
                                </select>
                              </div>
                            </dd>
                          </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityvideosubmit1">Save</button>
                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                              </div>
                            </div>
                            </form>
                            <?php } ?>
                            <form name="activityvideoform" id="activityvideoform" onsubmit="return Submitactivityvideo31();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityvideopanel11" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="" id="date_activ1" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityvideo_error31" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes91" name="description"></textarea>
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
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityvideosubmit1">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                            </form>
                           <script>
                            function Submitactivityvideo31(){
								if($("#date_activ1").val() == "" ){
									$("#date_activ1").focus();
									$("#activityvideo_error31").html("Please Enter Date");
									return false;
                            	}else{
									$("#activityvideo_error31").html("");
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
                    <div <?php if(@$_REQUEST['activityaudiopanel1']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityaudiopanel1">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityaudio1" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Audio Presentations: </a> </h4>
                    </div>
                    <div id="accordionTeal-activityaudio1" <?php if(@$_REQUEST['activityaudiopanel1']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editactivityaudio1']=='') { ?>
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
								  	while($viewactivityaudio1 = mysql_fetch_array($resqueryactivityaudio1)) {
								  ?>
                                    <tr>
                                      <td><?=date('d-m-Y',strtotime($viewactivityaudio1['date']));?></td>
                                      <td><?=$viewactivityaudio1['description'];?></td>
                                      <td><?=$viewactivityaudio1['sample'];?></td>
                                      <td><?=$viewactivityaudio1['link_audio'];?></td>
                                      <td><?=$viewactivityaudio1['IP_Address'];?></td>
                                      <td><?=$viewactivityaudio1['comments'];?></td>
                                      <td><?php if($viewactivityaudio1['status'] ==1){echo"Public";} else if($viewactivityaudio1['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewactivityaudio1['lastedit']))?></td>
                                      <td><a href="individual.php?ind_id=<?=$viewactivityaudio1['ind_id']?>&id=<?=$viewactivityaudio1['id']?>&editactivityaudio1=awards&accr1=1&inst1=1&activityaudiopanel1=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewactivityaudio1['ind_id']?>&id=<?=$viewactivityaudio1['id']?>&delactivityaudio1=val&activityaudiopanel1=1&gen=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                            </div>
                            <?php } else { ?>
                            <form name="activityaudioform1" id="activityaudioform1" onsubmit="return check91();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityaudiopanel1" value="1" />
                            <input type="hidden" name="activityaudiodid1" value="<?=$viewactivityaudio1['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="<?=date('d-m-Y', strtotime($viewactivityaudio1['date']))?>" id="date_aud_acti1" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityaudio_error31" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes101" name="description"><?php echo $viewactivityaudio1['description']?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Sample</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio1['sample']?>" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Link to recorded Audio</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio1['link_audio']?>" id="link_audio" name="link_audio" data-toggle="dropdown" placeholder="Link to recorded Audio">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">IP Address to live camera</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio1['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Comments by Others</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio1['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewactivityaudio1['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewactivityaudio1['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewactivityaudio1['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityaudiosubmit1">Save</button>
                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                              </div>
                            </div>
                            </form>
                            <?php } ?>
                            <form name="activityaudioform" id="activityaudioform" onsubmit="return Submitactivityaudio31();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityaudiopanel1" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="" id="date_aud_acti1" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityaudio_error31" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes101" name="description"></textarea>
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
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityaudiosubmit1">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                            </form>
                           <script>
                            function Submitactivityaudio31(){
								if($("#date_aud_acti1").val() == "" ){
									$("#date_aud_acti1").focus();
									$("#activityaudio_error31").html("Please Enter Date");
									return false;
                            	}else{
									$("#activityaudio_error31").html("");
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
												   
							$("#spatac").click(function(){
								$("#spoathact").toggle(800);
							});
							
						});
				 </script>
                 
               <!-- Sports & Athletics Activities [04-11-2016]-->
               
              
              <!-- Entertainment Activities [04-11-2016]-->
              <div><h4 style="cursor:pointer;" class="btn btn-success"><a id="spatac1" style="color:#FFF;">Entertainment Activities:</a></h4></div>  
              <div id="spoathact1" <?php if(@$_REQUEST['activityexppanel2']==1 || @$_REQUEST['coachpanel2']==1 || @$_REQUEST['activityvideopanel22']==1 || @$_REQUEST['activityaudiopanel2']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>>
              	
                <!--  Add Activity/Experience Type starts  -->
              
              	<div class="panel panel-collapse" id="spoathact">
                <div <?php if(@$_REQUEST['activityexppanel2']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityexppanel2">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-four2" aria-expanded="false"> Add Activity/Experience Type:
                    <?=$activityexppanel2?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-four2" <?php if(@$_REQUEST['activityexppanel2']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editactivityexp2']=='') { ?>
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

								  	while($viewactivityexp2 = mysql_fetch_array($resqueryactivityexp2)) {

								  ?>
                                <tr>
                                  <td><?=date('d-m-Y',strtotime($viewactivityexp2['date']));?></td>
                                  <td><?=$viewactivityexp2['description']?></td>
                                  <td><?=date('jS F Y',strtotime($viewactivityexp2['lastedit']))?></td>
                                  <td><?php if($viewactivityexp2['status'] ==1){echo"Public";} else if($viewactivityexp2['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewactivityexp2['ind_id']?>&id=<?=$viewactivityexp2['id']?>&editactivityexp2=activityexps&accr=1&activityexppanel2=1">Edit</a>&nbsp;|&nbsp;<a onclick="return confirm('Are you sure want to delete?');" href="individual.php?ind_id=<?=$viewactivityexp2['ind_id']?>&id=<?=$viewactivityexp2['id']?>&delactivityexp2=val&activityexppanel2=1" style="color:#ff0000;">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="activityexpform2" id="activityexpform2" onsubmit="return activityexp2();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="activityexppanel2" value="1" />
                          <input type="hidden" name="activityexpid2" value="<?=$viewactivityexp2['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date of the Activity/Experience*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type='text' class="form-control date-picker" id="date_acti2" name="date" value="<?=date('d-m-Y',strtotime($viewactivityexp2['date']))?>" placeholder="Date of the Activity/Experience">
                                </div>
                                <span id="activityexp_error2" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description of the Activity/Experience</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" class="form-control" id="pagedes772" name="description"><?=$viewactivityexp2['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewactivityexp2['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewactivityexp2['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewactivityexp2['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityexpsubmit2">Save</button>
                              <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="activityexpform2" id="activityexpform2" onsubmit="return activityexp2();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="activityexppanel2" value="1" />
                          <div class="pmbb-edit">
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Date of the Activity/Experience*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type='text' class="form-control date-picker" id="date_acti2" name="date" placeholder="Date of the Activity/Experience">
                                </div>
                                <span id="activityexp_error2" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                           
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Description of the Activity/Experience</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea rows="5" cols="10" class="form-control" id="pagedes782" name="description"></textarea>
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
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityexpsubmit2">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <script>
                            function activityexp2(){
								if($("#date_acti2").val() == "" ){
									$("#date_acti2").focus();
									$("#activityexp_error2").html("Please Enter Date of the Activity/Experience");
									return false;
                            	}else{
									$("#activityexp_error2").html("");
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
                <div <?php if(@$_REQUEST['coachpanel2']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="coachpanel1">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sevencoach2" aria-expanded="false"> Add Coach:
                    <?=$coachpanel2?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sevencoach2" <?php if(@$_REQUEST['coachpanel2']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editcoach2']=='') { ?>
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
                                while($viewcoach2 = mysql_fetch_array($resquery72)) {
                                ?>
                                <tr>
                                  <td><?=$viewcoach2['coach_name']?></td>
                                  <td><?=$viewcoach2['phone']?></td>
                                  <td><?=$viewcoach2['email']?></td>
                                  <td><?=$viewcoach2['sample']?></td>
                                  <td><?=$viewcoach2['description']?></td>
                                  <td><?php if($viewcoach2['status'] ==1){echo"Public";} else if($viewcoach2['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                  <td><?=date('jS F Y',strtotime($viewcoach2['lastedit']))?></td>
                                  <td><a href="individual.php?ind_id=<?=$viewcoach2['ind_id']?>&id=<?=$viewcoach2['id']?>&editcoach2=coachs&accr2=1&coachpanel2=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewcoach2['ind_id']?>&id=<?=$viewcoach2['id']?>&delcoach2=val&coachpanel2=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </dl>
                        </div>
                        <?php } else { ?>
                        <form name="coachform2" id="coachform2" onsubmit="return coach2();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="coachpanel2" value="1" />
                          <input type="hidden" name="coachid2" value="<?=$viewcoach2['id']?>" />
                          <div class="pmbb-edit" style="display:block;">
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Name*</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="coach_name2" name="coach_name" value="<?=$viewcoach2['coach_name']?>">
                                </div>
                                <span id="coach_error2" style="color:#ff0000;">&nbsp;</span> </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Phone</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="phone" name="phone" value="<?=$viewcoach2['phone']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Email</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="email" name="email" value="<?=$viewcoach2['email']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Sample</dt>
                              <dd>
                                <div class="fg-line">
                                  <input type="text" class="form-control" id="sample" name="sample" value="<?=$viewcoach2['sample']?>">
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                              <dt class="p-t-10">Coach Description</dt>
                              <dd>
                                <div class="fg-line">
                                  <textarea type="text" class="form-control" id="pagedes811" name="description"><?=$viewcoach2['description']?></textarea>
                                </div>
                              </dd>
                            </dl>
                            <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewcoach2['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewcoach2['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewcoach2['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>
                            <div class="m-t-30">
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coachsubmit2">Save</button>
                              <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                            </div>
                          </div>
                        </form>
                        <?php } ?>
                        <form name="coachform1" id="coachform1" onsubmit="return coach2();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                          <input type="hidden" name="coachpanel1" value="1" />
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
                                  <textarea type="text" class="form-control" id="pagedes811" name="description" placeholder="Coach Description"></textarea>
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
                              <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coachsubmit2">Save</button>
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
                    <div <?php if(@$_REQUEST['activityvideopanel22']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityvideopanel22">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityvideo22" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Video Presentations: </a> </h4>
                    </div>
                    <div id="accordionTeal-activityvideo22" <?php if(@$_REQUEST['activityvideopanel22']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editactivityvideo22']=='') { ?>
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
								  	while($viewactivityvideo2 = mysql_fetch_array($resqueryactivityvideo2)) {
								  ?>
                                    <tr>
                                      <td><?=date('jS F Y',strtotime($viewactivityvideo2['date']));?></td>
                                      <td><?=$viewactivityvideo2['description'];?></td>
                                      <td><?=$viewactivityvideo2['sample'];?></td>
                                      <td><?=$viewactivityvideo2['link_video'];?></td>
                                      <td><?=$viewactivityvideo2['IP_Address'];?></td>
                                      <td><?=$viewactivityvideo2['comments'];?></td>
                                      <td><?php if($viewactivityvideo2['status'] ==1){echo"Public";} else if($viewactivityvideo2['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewactivityvideo2['lastedit']))?></td>
                                      <td><a href="individual.php?ind_id=<?=$viewactivityvideo2['ind_id']?>&id=<?=$viewactivityvideo2['id']?>&editactivityvideo22=awards&inst=1&activityvideopanel22=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewactivityvideo2['ind_id']?>&id=<?=$viewactivityvideo2['id']?>&delactivityvideo2=val&activityvideopanel22=1&gen=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                            </div>
                            <?php } else { ?>
                            <form name="activityvideoform22" id="activityvideoform22" onsubmit="return check92();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityvideopanel22" value="1" />
                            <input type="hidden" name="activityvideodid2" value="<?=$viewactivityvideo2['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="<?=date('d-m-Y', strtotime($viewactivityvideo2['date']))?>" id="date_activ2" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityvideo_error32" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes922" name="description"><?php echo $viewactivityvideo2['description']?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Sample</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo2['sample']?>" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Link to recorded video</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo2['link_video']?>" id="link_video" name="link_video" data-toggle="dropdown" placeholder="Link to recorded video">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">IP Address to live camera</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo2['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Comments by Others</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityvideo2['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                        <dt class="p-t-10">Status</dt>
                        <dd>
                          <div class="fg-line">
                              <select name="status" class="form-control">
                              <option value="1" <?php if($viewactivityvideo2['status']==1){?> selected="selected"<?php }?>>Public</option>
                              <option value="2" <?php if($viewactivityvideo2['status']==2){?> selected="selected"<?php }?>>Private</option>
                              <option value="3" <?php if($viewactivityvideo2['status']==3){?> selected="selected"<?php }?>>Friends</option>
                            </select>
                          </div>
                        </dd>
                      </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityvideosubmit2">Save</button>
                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                              </div>
                            </div>
                            </form>
                            <?php } ?>
                            <form name="activityvideoform" id="activityvideoform" onsubmit="return Submitactivityvideo32();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityvideopanel22" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="" id="date_activ2" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityvideo_error32" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes922" name="description"></textarea>
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
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityvideosubmit2">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                            </form>
                           <script>
                            function Submitactivityvideo32(){
								if($("#date_activ2").val() == "" ){
									$("#date_activ2").focus();
									$("#activityvideo_error32").html("Please Enter Date");
									return false;
                            	}else{
									$("#activityvideo_error32").html("");
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
                    <div <?php if(@$_REQUEST['activityaudiopanel2']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityaudiopanel2">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityaudio2" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Audio Presentations: </a> </h4>
                    </div>
                    <div id="accordionTeal-activityaudio2" <?php if(@$_REQUEST['activityaudiopanel2']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editactivityaudio2']=='') { ?>
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
								  	while($viewactivityaudio2 = mysql_fetch_array($resqueryactivityaudio2)) {
								  ?>
                                    <tr>
                                      <td><?=date('d-m-Y',strtotime($viewactivityaudio2['date']));?></td>
                                      <td><?=$viewactivityaudio2['description'];?></td>
                                      <td><?=$viewactivityaudio2['sample'];?></td>
                                      <td><?=$viewactivityaudio2['link_audio'];?></td>
                                      <td><?=$viewactivityaudio2['IP_Address'];?></td>
                                      <td><?=$viewactivityaudio2['comments'];?></td>
                                      <td><?php if($viewactivityaudio2['status'] ==1){echo"Public";} else if($viewactivityaudio2['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>
                                      <td><?=date('jS F Y',strtotime($viewactivityaudio2['lastedit']))?></td>
                                      <td><a href="individual.php?ind_id=<?=$viewactivityaudio2['ind_id']?>&id=<?=$viewactivityaudio2['id']?>&editactivityaudio2=awards&accr2=1&inst2=1&activityaudiopanel2=1">Edit</a>&nbsp;|&nbsp;<a href="individual.php?ind_id=<?=$viewactivityaudio2['ind_id']?>&id=<?=$viewactivityaudio2['id']?>&delactivityaudio2=val&activityaudiopanel2=1&gen=1" style="color:#ff0000;" onclick="return confirm('Are you sure want to delete?');">Delete</a> </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </dl>
                            </div>
                            <?php } else { ?>
                            <form name="activityaudioform2" id="activityaudioform2" onsubmit="return check92();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityaudiopanel2" value="1" />
                            <input type="hidden" name="activityaudiodid2" value="<?=$viewactivityaudio2['id']?>" />
                            <div class="pmbb-edit" style="display:block;">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="<?=date('d-m-Y', strtotime($viewactivityaudio2['date']))?>" id="date_aud_acti2" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityaudio_error32" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes102" name="description"><?php echo $viewactivityaudio2['description']?></textarea>
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Sample</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio2['sample']?>" id="sample" name="sample" data-toggle="dropdown" placeholder="Sample">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Link to recorded Audio</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio2['link_audio']?>" id="link_audio" name="link_audio" data-toggle="dropdown" placeholder="Link to recorded Audio">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">IP Address to live camera</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio2['IP_Address']?>" id="IP_Address" name="IP_Address" data-toggle="dropdown" placeholder="IP Address to live camera">
                                  </div>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Comments by Others</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <input type='text' class="form-control" value="<?php echo $viewactivityaudio2['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments by Others">
                                  </div>
                                </dd>
                              </dl>
                              <div class="m-t-30">
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityaudiosubmit2">Save</button>
                                <a href="" onclick="javascript:history.go(-1)"><button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button></a>
                              </div>
                            </div>
                            </form>
                            <?php } ?>
                            <form name="activityaudioform" id="activityaudioform" onsubmit="return Submitactivityaudio32();" action="<?=$_SERVER['PHP_SELF']?>" method="post">
                            <input type="hidden" name="activityaudiopanel2" value="1" />
                            <div class="pmbb-edit">
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Date*</dt>
                                <dd>
                                  <div class="fg-line">
                                    <input type='text' class="form-control date-picker" value="" id="date_aud_acti2" name="date" data-toggle="dropdown" placeholder="Date">
                                  </div>
                                   <span id="activityaudio_error32" style="color:#ff0000;">&nbsp;</span>
                                </dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt class="p-t-10">Description</dt>
                                <dd>
                                  <div class="dtp-container dropdown fg-line">
                                    <textarea rows="5" cols="10" class="form-control " id="pagedes102" name="description"></textarea>
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
                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="activityaudiosubmit2">Save</button>
                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                              </div>
                            </div>
                            </form>
                           <script>
                            function Submitactivityaudio32(){
								if($("#date_aud_acti2").val() == "" ){
									$("#date_aud_acti2").focus();
									$("#activityaudio_error32").html("Please Enter Date");
									return false;
                            	}else{
									$("#activityaudio_error32").html("");
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
												   
							$("#spatac1").click(function(){
								$("#spoathact1").toggle(800);
							});
							
						});
				 </script>
                 
               <!-- Entertainment Activities [04-11-2016]-->
             
              
              <!-- Arts & Sciences Activities [04-11-2016]-->
              <div><h4 style="cursor:pointer;" class="btn btn-success"><a id="spatac2" style="color:#FFF;">Arts & Sciences Activities:</a></h4></div>  
              <div id="spoathact2" <?php if(@$_REQUEST['activityexppanel3']==1 || @$_REQUEST['coachpanel3']==1 || @$_REQUEST['activityvideopanel33']==1 || @$_REQUEST['activityaudiopanel3']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>>
              	
                <!--  Add Activity/Experience Type starts  -->
              
              	<div class="panel panel-collapse" id="spoathact">
                <div <?php if(@$_REQUEST['activityexppanel3']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityexppanel3">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-four3" aria-expanded="false"> Add Activity/Experience Type:
                    <?=$activityexppanel3?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-four3" <?php if(@$_REQUEST['activityexppanel3']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editactivityexp3']=='') { ?>
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
                <div <?php if(@$_REQUEST['coachpanel3']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="coachpanel1">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sevencoach3" aria-expanded="false"> Add Coach:
                    <?=$coachpanel3?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sevencoach3" <?php if(@$_REQUEST['coachpanel3']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editcoach3']=='') { ?>
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
                    <div <?php if(@$_REQUEST['activityvideopanel33']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityvideopanel33">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityvideo33" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Video Presentations: </a> </h4>
                    </div>
                    <div id="accordionTeal-activityvideo33" <?php if(@$_REQUEST['activityvideopanel33']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editactivityvideo33']=='') { ?>
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
                    <div <?php if(@$_REQUEST['activityaudiopanel3']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="activityaudiopanel3">
                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-activityaudio3" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Audio Presentations: </a> </h4>
                    </div>
                    <div id="accordionTeal-activityaudio3" <?php if(@$_REQUEST['activityaudiopanel3']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editactivityaudio3']=='') { ?>
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
              <div id="inststart" <?php if(@$_REQUEST['inst']==1 || @$_REQUEST['instructionalinfopanel']==1){?>style="display:block;"<?php }else{?> style="display:none;" <?php }?>>
                <!-- Add instructional information start -->
                <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['instructionalinfopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="instructionalinfopanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalinfo" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Instructional Information: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalinfo" <?php if(@$_REQUEST['instructionalinfopanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editinstructionalinfo']=='') { ?>

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

                    <div <?php if(@$_REQUEST['completecurrpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-completecurr" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Curriculum/Activity Transcript (Complete): </a> </h4>

                    </div>

                    <div id="accordionTeal-completecurr" <?php if(@$_REQUEST['completecurrpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editcompletecurr']=='') { ?>

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

                    <div <?php if(@$_REQUEST['incompletecurrpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-incompletecurr" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Curriculum/Activity Transcript (Incomplete or Ongoing Program): </a> </h4>

                    </div>

                    <div id="accordionTeal-incompletecurr" <?php if(@$_REQUEST['incompletecurrpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editincompletecurr']=='') { ?>

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

                    <div <?php if(@$_REQUEST['instructionalactpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalact" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Instructional/Activity Records: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalact" <?php if(@$_REQUEST['instructionalactpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editinstructionalact']=='') { ?>

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

                    <div <?php if(@$_REQUEST['instructionalvideopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalvideo" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Video Presentations: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalvideo" <?php if(@$_REQUEST['instructionalvideopanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editinstructionalvideo']=='') { ?>

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

                    <div <?php if(@$_REQUEST['instructionalaudiopanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalaudio" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Audio Presentations: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalaudio" <?php if(@$_REQUEST['instructionalaudiopanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editinstructionalaudio']=='') { ?>

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

                    <div <?php if(@$_REQUEST['instructionalawardpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-instructionalaward" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Honors and Awards: </a> </h4>

                    </div>

                    <div id="accordionTeal-instructionalaward" <?php if(@$_REQUEST['instructionalawardpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editinstructionalaward']=='') { ?>

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
              <div class="panel panel-collapse" id="swirkexp" <?php if(@$_REQUEST['jobpanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
                <div <?php if(@$_REQUEST['jobpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="jobpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-ten" aria-expanded="false"> Add Job:
                    <?=$jobpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-ten"  <?php if(@$_REQUEST['jobpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editjob']=='') { ?>
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
                <div id="refstart"<?php if(@$_REQUEST['ref']==1 || @$_REQUEST['referencepanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
                <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['ref']==1 || @$_REQUEST['referencepanel']==1){?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="referencepanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-nineteen" aria-expanded="false"> Personal/Academic/Professional References: <?=$referencepanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-nineteen" <?php if(@$_REQUEST['ref']==1 || @$_REQUEST['referencepanel']==1){?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editreference']=='') { ?>

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
               <div class="panel panel-collapse"  id="schi" <?php if(@$_REQUEST['creditpanel']==1 || @$_REQUEST['issuerofreportpanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
                    <!--======================Credit Report==================-->
                    <div <?php if(@$_REQUEST['creditpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="creditpanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-creditreport" aria-expanded="false"> Add Credit Report:
                    <?=$creditpanel?>
                    </a> </h4>
                    </div>
                    <div id="accordionTeal-creditreport" <?php if(@$_REQUEST['creditpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                    <div class="pmbb-body p-l-0">
                    <?php if(@$_REQUEST['editcreport']=='') { ?>
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
					if(@$_REQUEST['addissuer']!=1 && $_REQUEST['editissuer']!=1){
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
										$sqlissuer=mysqli_query($con, "select * from `na_credit_issuer_report` where `credit_report_id` =".$viewcreport['id']."");
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
						if(@$_REQUEST['addissuer']==1){
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
						if(@$_REQUEST['editissuer']==1){
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
                    <div <?php if(@$_REQUEST['issuerofreportpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="issuerofreportpanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-fourteen" aria-expanded="false"> Add Issuer of Report:
                    <?=$issuerofreportpanel?>
                    </a> </h4>
                    </div>
                    <div id="accordionTeal-fourteen" <?php if(@$_REQUEST['issuerofreportpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                    <div class="pmbb-body p-l-0">
                    <?php if(@$_REQUEST['editissuerofreport']=='') { ?>
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
              <div id="misstart" <?php if(@$_REQUEST['mis']==1 || @$_REQUEST['reportpanel']==1 || @$_REQUEST['messagepanel']==1 || @$_REQUEST['claimpanel']==1 || @$_REQUEST['claimformpanel']==1 || @$_REQUEST['evalpanel']==1 || @$_REQUEST['acapanel']==1 || @$_REQUEST['repcpanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
              <!--  Report Start  -->
              <div class="panel panel-collapse">
                <div <?php if(@$_REQUEST['reportpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="reportpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-fifteen" aria-expanded="false"> Add Reports:
                    <?=$reportpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-fifteen" <?php if(@$_REQUEST['reportpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editreport']=='') { ?>
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
                <div <?php if(@$_REQUEST['messagepanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="messagepanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen" aria-expanded="false"> Messages:
                    <?=$messagepanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen" <?php if(@$_REQUEST['messagepanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editmessage']=='') { ?>
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
                <div <?php if(@$_REQUEST['claimpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="claimpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteenmis" aria-expanded="false">Add Claims:
                    <?=$claimpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteenmis" <?php if(@$_REQUEST['claimpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editclaim']=='') { ?>
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
                <div <?php if(@$_REQUEST['claimformpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="claimformpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-claimform-mis" aria-expanded="false">Add Claim Forms:
                    <?=$claimformpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-claimform-mis" <?php if(@$_REQUEST['claimformpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editclaimform']=='') { ?>
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
                <div <?php if(@$_REQUEST['evalpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="evalpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-eval-mis" aria-expanded="false">Add Evaluation Report:
                    <?=$evalpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-eval-mis" <?php if(@$_REQUEST['evalpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editeval']=='') { ?>
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
                <div <?php if(@$_REQUEST['trnpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="trnpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-trn-mis" aria-expanded="false">Add Training Report:
                    <?=$trnpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-trn-mis" <?php if(@$_REQUEST['trnpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['edittrn']=='') { ?>
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
                <div <?php if(@$_REQUEST['acapanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="acapanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-aca-mis" aria-expanded="false">Add Academic Report:
                    <?=$acapanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-aca-mis" <?php if(@$_REQUEST['acapanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editaca']=='') { ?>
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
                <div <?php if(@$_REQUEST['repcpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="repcpanel">
                  <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-sixteen-repc-mis" aria-expanded="false">Add Report Card:
                    <?=$repcpanel?>
                    </a> </h4>
                </div>
                <div id="accordionTeal-sixteen-repc-mis" <?php if(@$_REQUEST['repcpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                  <div class="panel-body">
                    <div class="pmb-block p-10  m-b-0">
                      <div class="pmbb-body p-l-0">
                        <?php if(@$_REQUEST['editrepc']=='') { ?>
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
              <div id="injstart" <?php if(@$_REQUEST['inj']==1 || @$_REQUEST['injuriespanel']==1 || @$_REQUEST['surgeriespanel']==1 || @$_REQUEST['procedurespanel']==1 || @$_REQUEST['treatmentspanel']==1 || @$_REQUEST['rehabilitationpanel']==1 || @$_REQUEST['drugspanel']==1 || @$_REQUEST['pdrugmedication']==1 || @$_REQUEST['medicalout']==1 || @$_REQUEST['wellness_actpanel']==1 || @$_REQUEST['fitnesspanel']==1){?> style="display:block;" <?php }else{?> style="display:none;" <?php }?>>
              <!--======================Injuries Starts===============-->
                <div class="panel panel-collapse">
                  <div <?php if(@$_REQUEST['injuriespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="injuriespanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-injuries" aria-expanded="false"> Add injuries:
                      <?=$injuriespanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-injuries" <?php if(@$_REQUEST['injuriespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editinjuries']=='') { ?>
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
                  <div <?php if(@$_REQUEST['surgeriespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="surgeriespanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-surgeries" aria-expanded="false"> Add surgeries:
                      <?=$surgeriespanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-surgeries" <?php if(@$_REQUEST['surgeriespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editsurgeries']=='') { ?>
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
                  <div <?php if(@$_REQUEST['procedurespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="procedurespanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-procedures" aria-expanded="false"> Add procedures:
                      <?=$procedurespanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-procedures" <?php if(@$_REQUEST['procedurespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editprocedures']=='') { ?>
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
                  <div <?php if(@$_REQUEST['treatmentspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="treatmentspanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-treatments" aria-expanded="false"> Add treatments:
                      <?=$treatmentspanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-treatments" <?php if(@$_REQUEST['treatmentspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['edittreatments']=='') { ?>
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
                  <div <?php if(@$_REQUEST['rehabilitationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="rehabilitationpanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-fourr" aria-expanded="false"> Add Rehabilitation:
                      <?=$rehabilitationpanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-fourr" <?php if(@$_REQUEST['rehabilitationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editrehabilitation']=='') { ?>
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
                  <div <?php if(@$_REQUEST['drugspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="drugspanel">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-two" aria-expanded="false"> Add Athletics/Sports/Activities:
                      <?=$drugspanel?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-two" <?php if(@$_REQUEST['drugspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['edit']=='') { ?>
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
                  <div <?php if(@$_REQUEST['pdrugmedication']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="pdrugmedication">
                    <h4 class="panel-title"> 
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-pdrugmedication" aria-expanded="false">Prescription Drugs/Medication Use :
                      <?=$pdrugmedication?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-pdrugmedication" <?php if(@$_REQUEST['pdrugmedication']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel">
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['edit']=='') { ?>
                          	<?php if(@$_REQUEST['addpresmedi']!=1 || @$_REQUEST['editpresdata']!=1){?>
                          		<div class="pmbb-view" <?php if(@$_REQUEST['addpresmedi']==1){?> style="display:none;" <?php }?>>
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
								  $sqlpres=mysqli_query($con, "SELECT * FROM `na_st_prescription` where `ind_id` =".$_SESSION["userid"]."");
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
																$sqlimedi=mysqli_query($con, "select * from `na_st_precimedicine` where `preci_id` =".$viewmepres['id']."");
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
                         <?php if(@$_REQUEST['edit']!='editpresdata'){?>
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
                          	 <?php if(@$_REQUEST['edit']=='editpresdata'){?>
                        	<!--=============================-->
                            <?php 
							 $sqlsubpric = getAnyTableWhereData('na_st_precimedicine', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");
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
                             <?php if(@$_REQUEST['addpresmedi']==1){?>
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
                  <div <?php if(@$_REQUEST['medicalout']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="mediout">
                    <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-mediout" aria-expanded="false"> Over The Counter Drug / Medication Use :
                      <?=$medicalout?>
                      </a> </h4>
                  </div>
                  <div id="accordionTeal-mediout" <?php if(@$_REQUEST['medicalout']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel">
                    <div class="panel-body">
                      <div class="pmb-block p-10  m-b-0">
                        <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['edit']=='') { ?>
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
									$resquerymedi = mysqli_query($con, $sqlmediover) or mysqli_error();
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

                    <div <?php if(@$_REQUEST['wellness_actpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-wellness_act" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Wellness Activity information: </a> </h4>

                    </div>

                    <div id="accordionTeal-wellness_act" <?php if(@$_REQUEST['wellness_actpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >
                      <div class="panel-body">
                        <div class="pmb-block p-10  m-b-0">
                          <div class="pmbb-body p-l-0">
                          <?php if(@$_REQUEST['editwellness_act']=='') { ?>
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

                    <div <?php if(@$_REQUEST['fitnesspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-fitness" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Fitness/Exercise/Training Activity information: </a> </h4>

                    </div>

                    <div id="accordionTeal-fitness" <?php if(@$_REQUEST['fitnesspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editfitness']=='') { ?>

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
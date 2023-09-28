<?php
include('lib/inner_header.php');
sequre();

$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");

/*if(isset(@$_REQUEST['type'])){

		$typedata=@$_REQUEST['type'];

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



//Insert Individual Record

	if(@@$_REQUEST['submit']=="indsubmit") {

		

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

	$studensql = "SELECT * FROM na_st_individual WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery = mysqli_query($con, $studensql) or mysqli_error();

	$stunum = mysqli_num_rows($resquery);

	

	if($stunum==0) {

		

		$dateofbirth = explode("-",@$_REQUEST['dateofbirth']);

		$formatdateofbirth = $dateofbirth[2]."-".$dateofbirth[1]."-".$dateofbirth[0];

								

		$data = array('ind_id'=>$_SESSION["userid"],'dob'=>$formatdateofbirth,'gender'=>$gender,'conference_id'=>$conference_id,'social_seq_no'=>$social_seq_no,'ip_address'=>$ipaddress,'status'=>$status,'description'=>addslashes($description));

		//print_r($data);

		//exit();

		$result = insertData($data, 'na_st_individual');

		

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?operation=successful';\n";

		echo "</script>";

		

	} else {

		

		$dateofbirth = explode("-",@$_REQUEST['dateofbirth']);

		$formatdateofbirth = $dateofbirth[2]."-".$dateofbirth[1]."-".$dateofbirth[0];

		

		$data = array('dob'=>$formatdateofbirth,'gender'=>$gender,'conference_id'=>$conference_id,'social_seq_no'=>$social_seq_no,'ip_address'=>$ipaddress,'status'=>$status,'description'=>addslashes($description));

	         

		$result = updateData($data,' na_st_individual', " ind_id='" . $_SESSION["userid"] . "' ") ;

		

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?operation=successful';\n";

		echo "</script>";

	}

		

	}

	

	//Show Individula record

	$viewindiv = getAnyTableWhereData('na_st_individual', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$studensql = "SELECT * FROM na_st_individual WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery = mysqli_query($con, $studensql) or mysqli_error();

	$stunum = mysqli_num_rows($resquery);

	

	

	//Insert Drugs Record

	if(@@$_REQUEST['submit']=="drugsubmit") {

		

	extract($_POST);

		

		$drug_date = explode("-",@$_REQUEST['drug_date']);

		$formatdrug_date = $drug_date[2]."-".$drug_date[1]."-".$drug_date[0];

		

		if(@$_REQUEST['drugsid']=="") {

			$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'drug_date'=>$formatdrug_date,'drug_name'=>$drug_name,'outcome'=>$outcome,'image'=>json_encode($imageArr),'reason'=>addslashes($reason),'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_drug');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&drugspanel=".$drugspanel."&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'drug_date'=>$formatdrug_date,'drug_name'=>$drug_name,'outcome'=>$outcome,'reason'=>addslashes($reason),'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = updateData($data,' na_st_drug', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['drugsid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&drugspanel=".$drugspanel."&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['del']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_drug WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&drugspanel=".@$_REQUEST['drugspanel']."&accr=1';\n";

		echo "</script>";

	}

		

	

	//Show Drugs record

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewdrugs = getAnyTableWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensdrugsql = "SELECT * FROM na_st_drug WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery2 = mysqli_query($con, $studensdrugsql) or mysqli_error();

	$stunum2 = mysqli_num_rows($resquery2);

	

	//========================Drug Panel End==========================

	//========================Award Panel Starts======================

	//Insert Drugs Record

	//Insert Drugs Record

	if(@@$_REQUEST['submit']=="awardsubmit") {

		

	extract($_POST);

	

		//$award_date = explode("/",@$_REQUEST['award_date']);

		$formataward_date = date('Y-m-d',strtotime(@$_REQUEST['award_date']));

		

		if(@$_REQUEST['awardid']=="") {

			$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'award_date'=>$formataward_date,'award_name'=>$award_name,'award_description'=>addslashes($award_description),'image'=>json_encode($imageArr),'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_award');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&awardpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$award_date = explode("-",@$_REQUEST['award_date1']);

		     //$formataward_date = $award_date[2]."-".$award_date[1]."-".$award_date[0];

			  $formataward_date=date('Y-m-d',strtotime(@$_REQUEST['award_date']));

			

			$data = array('ind_id'=>$_SESSION["userid"],'award_date'=>$formataward_date,'award_name'=>$award_name,'status'=>$status,'award_description'=>addslashes($award_description));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_st_award', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['awardid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&awardpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delaward']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_award WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&&awardpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	

	//Show Drugs record

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewawards = getAnyTableWhereData('na_st_award', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensawardssql = "SELECT * FROM na_st_award WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery3 = mysqli_query($con, $studensawardssql) or mysqli_error();

	$stunum3 = mysqli_num_rows($resquery3);



	//========================Award Panel Ends========================

	

	//========================Rehabiliation Panel Starts======================

if(@@$_REQUEST['submit']=="rehabilitationsubmit") {

		extract($_POST);

		if(@$_REQUEST['rehabilitationdid']=="") {

			$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'rehab_date'=>date('Y-m-d',strtotime($rehab_date)),'rehab_name'=>$rehab_name,'image'=>json_encode($imageArr),'description'=>$description,'outcome'=>$outcome,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_rehabilitation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&rehabilitationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'rehab_date'=>date('Y-m-d',strtotime($rehab_date)),'rehab_name'=>$rehab_name,'description'=>$description,'outcome'=>$outcome,'status'=>$status);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_rehabilitation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['rehabilitationdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&rehabilitationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delrehabilitation']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_rehabilitation WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&rehabilitationpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewrehabilitation = getAnyTableWhereData('na_st_rehabilitation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensrehabilitationsql = "SELECT * FROM na_st_rehabilitation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryrehabilitation = mysqli_query($con, $studensrehabilitationsql) or mysqli_error();

	$stunumrehabilitation = mysqli_num_rows($resqueryrehabilitation);

	//========================Rehabiliation Panel Ends======================

	

	//========================Institute Panel Starts======================

	//Insert Drugs Record

	//Insert Drugs Record

	if(@@$_REQUEST['submit']=="institutesubmit") {

		

	extract($_POST);

	//echo @$_REQUEST['rehab_name'].">>>>>>";

	

		//$award_date = explode("/",@$_REQUEST['award_date']);

		

		

		if(@$_REQUEST['institutedid']=="") {

				$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'institute_name'=>$institute_name,'description'=>$description,'image'=>json_encode($imageArr),'school_bulletin'=>addslashes($school_bulletin),'instructor'=>$instructor,'address'=>$address,'tel_no'=>$tel_no,'email'=>$email,'sms_no'=>$sms_no,'ip_address'=>$ip_address,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'schools'=>$schools,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_eduinstitute');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&institutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			//$award_date = explode("/",@$_REQUEST['award_date1']);

		     //$formataward_date = $award_date[2]."-".$award_date[1]."-".$award_date[0];

			  //$formatrahab_date=date('Y-m-d',strtotime(@$_REQUEST['rehab_date']));

			

			$data = array('ind_id'=>$_SESSION["userid"],'institute_name'=>$institute_name,'description'=>$description,'school_bulletin'=>addslashes($school_bulletin),'instructor'=>$instructor,'address'=>$address,'tel_no'=>$tel_no,'email'=>$email,'sms_no'=>$sms_no,'ip_address'=>$ip_address,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'schools'=>$schools,'status'=>$status);



			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_st_eduinstitute', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['institutedid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&institutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delinstitute']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_eduinstitute WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&institutepanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	

	//Show Drugs record

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewinstitute = getAnyTableWhereData('na_st_eduinstitute', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensinstitutesql = "SELECT * FROM na_st_eduinstitute WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery5 = mysqli_query($con, $studensinstitutesql) or mysqli_error();

	$stunum5 = mysqli_num_rows($resquery5);



	//========================Instituite Panel Ends======================

	

	//========================Teacher Panel Starts======================

	//Insert Drugs Record

	//Insert Drugs Record

	if(@@$_REQUEST['submit']=="teachersubmit") {

		

	extract($_POST);

	//echo @$_REQUEST['rehab_name'].">>>>>>";

	

		//$award_date = explode("/",@$_REQUEST['award_date']);

		

		

		if(@$_REQUEST['teacherdid']=="") {

			$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'teacher_name'=>$teacher_name,'information'=>$information,'image'=>json_encode($imageArr),'status'=>$status,'address'=>addslashes($address),'phone'=>$phone,'email'=>$email,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_teacher');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			//$award_date = explode("/",@$_REQUEST['award_date1']);

		     //$formataward_date = $award_date[2]."-".$award_date[1]."-".$award_date[0];

			  //$formatrahab_date=date('Y-m-d',strtotime(@$_REQUEST['rehab_date']));

			

			$data = array('ind_id'=>$_SESSION["userid"],'teacher_name'=>$teacher_name,'information'=>$information,'address'=>addslashes($address),'status'=>$status,'phone'=>$phone,'email'=>$email,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus);



			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_st_teacher', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['teacherdid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delteacher']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_teacher WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&teacherpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

		

	$viewteacher = getAnyTableWhereData('na_st_teacher', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensteachersql = "SELECT * FROM na_st_teacher WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery6 = mysqli_query($con, $studensteachersql) or mysqli_error();

	$stunum6 = mysqli_num_rows($resquery6);



	//========================Teacher Panel Ends======================

	

	//========================Coach Starts======================

	//Insert Drugs Record

	//Insert Drugs Record

	if(@@$_REQUEST['submit']=="coachsubmit") {
	extract($_POST);


		if(@$_REQUEST['coachdid']=="") {

			$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'description'=>addslashes($description),'sample'=>$sample,'phone'=>$phone,'image'=>json_encode($imageArr),'email'=>$email,'video'=>$video,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_coach');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&coachpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'description'=>addslashes($description),'sample'=>$sample,'phone'=>$phone,'email'=>$email,'video'=>$video,'status'=>$status);



	

			$result = updateData($data,'na_st_coach', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['coachdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&coachpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delcoach']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_coach WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&coachpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewcoach = getAnyTableWhereData('na_st_coach', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studenscoachsql = "SELECT * FROM na_st_coach WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery7 = mysqli_query($con, $studenscoachsql) or mysqli_error();

	$stunum7 = mysqli_num_rows($resquery7);



	//========================Coach Ends================================

	

	//========================Recomendation Starts======================

	//Insert Coach Record

	//Insert Recomend Record

	if(@@$_REQUEST['submit']=="recomendsubmit") {

		

	extract($_POST);

			

		if(@$_REQUEST['recomenddid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'recomendation_person'=>$recomendation_person,'recomendation'=>addslashes($recomendation),'rec_video_link'=>$rec_video_link,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_recomendation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&recomendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'recomendation_person'=>$recomendation_person,'recomendation'=>addslashes($recomendation),'rec_video_link'=>$rec_video_link,'status'=>$status);



	//print_r($data);

			//exit();

			$result = updateData($data,'na_st_recomendation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['recomenddid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&recomendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Recomemnd

	if(@$_REQUEST['delrecomend']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_recomendation WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&recomendpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewrecomend = getAnyTableWhereData('na_st_recomendation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensrecomendsql = "SELECT * FROM na_st_recomendation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery8 = mysqli_query($con, $studensrecomendsql) or mysqli_error();

	$stunum8 = mysqli_num_rows($resquery8);



	//========================Recomendation Ends======================

	

	//========================Extra Starts======================
/*
	//Insert Recomend Record

	//Insert Extra Record

	if(@@$_REQUEST['submit']=="extrasubmit") {

		extract($_POST);

		if(@$_REQUEST['extradid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'activity_name'=>$activity_name,'from_date'=>date('Y-m-d',strtotime($from_date)),'activity_description'=>$activity_description);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_extracurricullam');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&extrapanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'activity_name'=>$activity_name,'from_date'=>date('Y-m-d',strtotime($from_date)),'activity_description'=>$activity_description,'status'=>1);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_extracurricullam', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['extradid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&extrapanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delextra']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_extracurricullam WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&extrapanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewextra = getAnyTableWhereData('na_st_extracurricullam', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensextrasql = "SELECT * FROM na_st_extracurricullam WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery9 = mysqli_query($con, $studensextrasql) or mysqli_error();

	$stunum9 = mysqli_num_rows($resquery9);
*/


	//========================Extra Ends======================

	

	//========================Job Starts======================

	//Insert Recomend Record

	//Insert job Record

	if(@@$_REQUEST['submit']=="jobsubmit") {

		extract($_POST);

		if(@$_REQUEST['jobdid']=="") {

				$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'employer_name'=>$employer_name,'from_date'=>date('Y-m-d',strtotime($from_date)),'image'=>json_encode($imageArr),'to_date'=>date('Y-m-d',strtotime($to_date)),'position'=>$position,'job_description'=>$job_description,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_student_experience');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&jobpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'employer_name'=>$employer_name,'from_date'=>date('Y-m-d',strtotime($from_date)),'to_date'=>date('Y-m-d',strtotime($to_date)),'position'=>$position,'job_description'=>$job_description,'status'=>$status);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_student_experience', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['jobdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&jobpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['deljob']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_student_experience WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&jobpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewjob = getAnyTableWhereData('na_student_experience', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensjobsql = "SELECT * FROM na_student_experience WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery10 = mysqli_query($con, $studensjobsql) or mysqli_error();

	$stunum10 = mysqli_num_rows($resquery10);



	//========================Job Ends======================

	

	//=================Video Presentation Starts=====================

	

	//========================videopresentation Starts======================

	//Insert Recomend Record

	//Insert videopresentation Record

	if(@@$_REQUEST['submit']=="videopresentationsubmit") {

		extract($_POST);

		if(@$_REQUEST['videopresentationdid']=="") {

				$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'video_date'=>date('Y-m-d',strtotime($video_date)),'description'=>$description,'status'=>$status,'link_rec_video'=>$link_rec_video,'ip_live_cam'=>$ip_live_cam,'image'=>json_encode($imageArr),'comments'=>$comments,'status'=>1);

			$result = insertData($data, 'na_st_video_presentation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&videopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'video_date'=>date('Y-m-d',strtotime($video_date)),'status'=>$status,'description'=>$description,'link_rec_video'=>$link_rec_video,'ip_live_cam'=>$ip_live_cam,'comments'=>$comments);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_video_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['videopresentationdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&videopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delvideopresentation']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_video_presentation WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&videopresentationpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewvideopresentation = getAnyTableWhereData('na_st_video_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensvideopresentationsql = "SELECT * FROM na_st_video_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery11 = mysqli_query($con, $studensvideopresentationsql) or mysqli_error();

	$stunum11 = mysqli_num_rows($resquery11);



	//========================videopresentation Ends======================

	

	//===================Video Presentation Ends=======================

	

	

	//========================academictranscript Starts======================

	//Insert Recomend Record

	//Insert academictranscript Record

	if(@@$_REQUEST['submit']=="academictranscriptsubmit") {

		extract($_POST);

		if(@$_REQUEST['academictranscriptdid']=="") {

				$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'image'=>json_encode($imageArr),'messages'=>$messages,'phone'=>$phone,'email'=>$email,'ipaddress'=>$ipaddress,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_academic_transcript');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&academictranscriptpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'phone'=>$phone,'email'=>$email,'ipaddress'=>$ipaddress,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_academic_transcript', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['academictranscriptdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&academictranscriptpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delacademictranscript']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_academic_transcript WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&academictranscriptpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewacademictranscript = getAnyTableWhereData('na_st_academic_transcript', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensacademictranscriptsql = "SELECT * FROM na_st_academic_transcript WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery12 = mysqli_query($con, $studensacademictranscriptsql) or mysqli_error();

	$stunum12 = mysqli_num_rows($resquery12);



	//========================academictranscript Ends======================

	

	//========================educationalrecords Starts======================

	//Insert Recomend Record

	//Insert educationalrecords Record

	if(@@$_REQUEST['submit']=="educationalrecordssubmit") {

		extract($_POST);

		if(@$_REQUEST['educationalrecordsdid']=="") {

				$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'image'=>json_encode($imageArr),'phone'=>$phone,'email'=>$email,'ipaddress'=>$ipaddress,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_educational_records');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&educationalrecordspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'phone'=>$phone,'email'=>$email,'ipaddress'=>$ipaddress,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus,'status'=>$status);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_educational_records', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['educationalrecordsdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&educationalrecordspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['deleducationalrecords']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_educational_records WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&educationalrecordspanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$vieweducationalrecords = getAnyTableWhereData('na_st_educational_records', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studenseducationalrecordssql = "SELECT * FROM na_st_educational_records WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery13 = mysqli_query($con, $studenseducationalrecordssql) or mysqli_error();

	$stunum13 = mysqli_num_rows($resquery13);



	//========================educationalrecords Ends======================

	

	

	//========================issuerofreport Starts======================

	//Insert Recomend Record

	//Insert issuerofreport Record

	if(@@$_REQUEST['submit']=="issuerofreportsubmit") {

		extract($_POST);

		if(@$_REQUEST['issuerofreportdid']=="") {

			$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'tel_no'=>$tel_no,'website'=>$website,'url'=>$url,'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_issuer_of_report');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&issuerofreportpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'tel_no'=>$tel_no,'website'=>$website,'url'=>$url,'description'=>$description,'status'=>$status);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_issuer_of_report', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['issuerofreportdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&issuerofreportpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delissuerofreport']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_issuer_of_report WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&issuerofreportpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewissuerofreport = getAnyTableWhereData('na_st_issuer_of_report', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensissuerofreportsql = "SELECT * FROM na_st_issuer_of_report WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery14 = mysqli_query($con, $studensissuerofreportsql) or mysqli_error();

	$stunum14 = mysqli_num_rows($resquery14);



	//========================issuerofreport Ends======================

	

	//========================reports Starts======================

	//Insert Recomend Record

	//Insert reports Record

	if(@@$_REQUEST['submit']=="reportssubmit") {

		extract($_POST);

		if(@$_REQUEST['reportsdid']=="") {

				$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>date('Y-m-d',strtotime($report_date)),'image'=>json_encode($imageArr),'description'=>$description,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_reports');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&reportspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>date('Y-m-d',strtotime($report_date)),'description'=>$description,'status'=>$status);

			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_reports', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['reportsdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&reportspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delreports']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_reports WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&reportspanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewreports = getAnyTableWhereData('na_st_reports', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensreportssql = "SELECT * FROM na_st_reports WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery15 = mysqli_query($con, $studensreportssql) or mysqli_error();

	$stunum15 = mysqli_num_rows($resquery15);



	//========================reports Ends======================

	

	

	//========================messages Starts======================

	//Insert Recomend Record

	//Insert messages Record

	if(@@$_REQUEST['submit']=="messagessubmit") {

		extract($_POST);

		if(@$_REQUEST['messagesdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>date('Y-m-d',strtotime($report_date)),'description'=>$description,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_messages');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&messagespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>date('Y-m-d',strtotime($report_date)),'description'=>$description,'status'=>$status);

			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_messages', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['messagesdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&messagespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delmessages']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_messages WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&messagespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewmessages = getAnyTableWhereData('na_st_messages', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensmessagessql = "SELECT * FROM na_st_messages WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery16 = mysqli_query($con, $studensmessagessql) or mysqli_error();

	$stunum16 = mysqli_num_rows($resquery16);



	//========================messages Ends======================

	

	

	//========================audiopresentation Starts======================

	//Insert Recomend Record

	//Insert audiopresentation Record

	if(@@$_REQUEST['submit']=="audiopresentationsubmit") {

		extract($_POST);

	if(@$_REQUEST['audiopresentationdid']=="") {
    $uploads_dir = 'uploads/student_doc/';
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
								

			$data = array('ind_id'=>$_SESSION["userid"],'audio_date'=>date('Y-m-d',strtotime($audio_date)),'description'=>$description,'link_rec_audio'=>$link_rec_audio,'image'=>json_encode($imageArr),'ip_live_cam'=>$ip_live_cam,'comments'=>$comments,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_audio_sturec_presentation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&audiopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'audio_date'=>date('Y-m-d',strtotime($audio_date)),'description'=>$description,'link_rec_audio'=>$link_rec_audio,'ip_live_cam'=>$ip_live_cam,'comments'=>$comments,'status'=>$status);

			//print_r($data);

			//exit();

			$result = updateData($data,'na_audio_sturec_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['audiopresentationdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&audiopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delaudiopresentation']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_audio_sturec_presentation WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&audiopresentationpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewaudiopresentation = getAnyTableWhereData('na_audio_sturec_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensaudiopresentationsql = "SELECT * FROM na_audio_sturec_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery17 = mysqli_query($con, $studensaudiopresentationsql) or mysqli_error();

	$stunum17 = mysqli_num_rows($resquery17);



	//========================audiopresentation Ends======================

	

	//========================seminar Starts======================

	//Insert Recomend Record

	//Insert seminar Record

	if(@@$_REQUEST['submit']=="seminarsubmit") {

		extract($_POST);

		if(@$_REQUEST['seminardid']=="") {
		    $uploads_dir = 'uploads/student_doc/';
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

								

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'semi_schedule'=>date('Y-m-d',strtotime($semi_schedule)),'image'=>json_encode($imageArr),'entry_date'=>date('Y-m-d',strtotime($entry_date)),'Description'=>$Description,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_seminar_attend');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&seminarpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'semi_schedule'=>date('Y-m-d',strtotime($semi_schedule)),'entry_date'=>date('Y-m-d',strtotime($entry_date)),'Description'=>$Description);

			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_seminar_attend', " ind_id='" . $_SESSION["userid"] . "' AND semi_id = '".@$_REQUEST['seminardid']."' ") ;

			if($result){

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&seminarpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

			}

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delseminar']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_seminar_attend WHERE semi_id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&seminarpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewseminar = getAnyTableWhereData('na_st_seminar_attend', " AND ind_id='".$_SESSION["userid"]."' AND semi_id = '".@$_REQUEST['id']."' ");

	

	 $studensseminarsql = "SELECT * FROM na_st_seminar_attend WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery24 = mysqli_query($con, $studensseminarsql) or mysqli_error();

	$stunum24 = mysqli_num_rows($resquery24);



	//========================seminar Ends======================

	

	//========================Institute Attended================

	//========================eduattend Starts======================

	

	if(@@$_REQUEST['submit']=="eduinstituteattendedsubmit") {

		extract($_POST);

		if(@$_REQUEST['eduinstituteattendeddid']=="") {
		    $uploads_dir = 'uploads/student_doc/';
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

								

			$data = array('ind_id'=>$_SESSION["userid"],'attend_date'=>date('Y-m-d',strtotime($attend_date)),'program_enroll'=>$program_enroll,'status'=>$status,'image'=>json_encode($imageArr),'course_taken'=>$course_taken,'Grades'=>$Grades,'course_enrolled'=>$course_enrolled,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_eduinstitute_attended');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&eduinstituteattendedpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'attend_date'=>date('Y-m-d',strtotime($attend_date)),'program_enroll'=>$program_enroll,'status'=>$status,'course_taken'=>$course_taken,'Grades'=>$Grades,'course_enrolled'=>$course_enrolled);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_eduinstitute_attended', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['eduinstituteattendeddid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&eduinstituteattendedpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['deleduinstituteattended']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_eduinstitute_attended WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&eduinstituteattendedpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$vieweduinstituteattended = getAnyTableWhereData('na_st_eduinstitute_attended', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studenseduinstituteattendedsql = "SELECT * FROM na_st_eduinstitute_attended WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryeduinstituteattended = mysqli_query($con, $studenseduinstituteattendedsql) or mysqli_error();

	$stunumeduinstituteattended = mysqli_num_rows($resqueryeduinstituteattended);
	



	//========================eduattend Ends======================

	//========================Institute Attended==================

	

	//========================facilities Starts======================

	//Insert Recomend Record

	//Insert facilities Record

	if(@@$_REQUEST['submit']=="facilitiessubmit") {

		extract($_POST);

		if(@$_REQUEST['facilitiesdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'prog_enrolled'=>$prog_enrolled,'datesofattendence'=>date('Y-m-d',strtotime($datesofattendence)),'classes_taken'=>$classes_taken,'achievements'=>$achievements,'current_schedule'=>date('Y-m-d',strtotime($current_schedule)),'awards_conferred'=>$awards_conferred,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_facilities');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&facilitiespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'prog_enrolled'=>$prog_enrolled,'datesofattendence'=>date('Y-m-d',strtotime($datesofattendence)),'classes_taken'=>$classes_taken,'achievements'=>$achievements,'current_schedule'=>$current_schedule,'awards_conferred'=>$awards_conferred);

			//print_r($data);

			//exit();



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_facilities', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['facilitiesdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&facilitiespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delfacilities']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from  na_st_facilities WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&facilitiespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewfacilities = getAnyTableWhereData('na_st_facilities', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	$studensfacilitiessql = "SELECT * FROM  na_st_facilities WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery22 = mysqli_query($con, $studensfacilitiessql) or mysqli_error();

	$stunum22 = mysqli_num_rows($resquery22);



	//========================facilities Ends======================

	

	//========================reference Starts======================

	//Insert Recomend Record

	//Insert reference Record

	if(@@$_REQUEST['submit']=="referencessubmit") {

		extract($_POST);

		if(@$_REQUEST['referencesdid']=="") {

				$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'ref_name'=>$ref_name,'dateofreference'=>date('Y-m-d',strtotime($dateofreference)),'image'=>json_encode($imageArr),'ref_position'=>$ref_position,'ref_phone'=>$ref_phone,'ref_emailaddress'=>$ref_emailaddress,'ref_relationship'=>$ref_relationship,'ref_recominfo'=>$ref_recominfo,'ref_recomvideo'=>$ref_recomvideo,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_sturec_reference');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&referencespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'ref_name'=>$ref_name,'dateofreference'=>date('Y-m-d',strtotime($dateofreference)),'ref_position'=>$ref_position,'ref_phone'=>$ref_phone,'ref_emailaddress'=>$ref_emailaddress,'ref_relationship'=>$ref_relationship,'ref_recominfo'=>$ref_recominfo,'ref_recomvideo'=>$ref_recomvideo,'status'=>$status);

			//print_r($data);

			//exit();



			$result = updateData($data,'na_sturec_reference', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['referencesdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&referencespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delreferences']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		echo $delsql = "DELETE from  na_sturec_reference WHERE id = '".@$_REQUEST['id']."'";

		

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&referencespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewreference1 = getAnyTableWhereData('na_sturec_reference', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	print_r($viewreference);

	$studensreferencesql = "SELECT * FROM  na_sturec_reference WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery21 = mysqli_query($con, $studensreferencesql) or mysqli_error();

	$stunum21 = mysqli_num_rows($resquery21);



	//========================reference Ends======================

	

	//========================P Recomendation Starts======================

	

	if(@@$_REQUEST['submit']=="precomendsubmit") {

		extract($_POST);

		if(@$_REQUEST['precomenddid']=="") {
$uploads_dir = 'uploads/student_doc/';
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
								

			$data = array('ind_id'=>$_SESSION["userid"],'per_prov_rec'=>$per_prov_rec,'recommendation'=>$recommendation,'image'=>json_encode($imageArr),'recorded_video'=>$recorded_video,'recom_date'=>date('Y-m-d',strtotime($recom_date)),'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, ' na_sturec_personal_recommendations');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&precomendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'per_prov_rec'=>$per_prov_rec,'recommendation'=>$recommendation,'recorded_video'=>$recorded_video,'recom_date'=>date('Y-m-d',strtotime($recom_date)),'status'=>1);

			//print_r($data);

			//exit();



			$result = updateData($data,' na_sturec_personal_recommendations', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['precomenddid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&precomendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delprecomend']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		echo $delsql = "DELETE from   na_sturec_personal_recommendations WHERE id = '".@$_REQUEST['id']."'";

		

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&precomendpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewprecomend1 = getAnyTableWhereData(' na_sturec_personal_recommendations', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	//print_r($viewreference);

	$studensprecomendql = "SELECT * FROM   na_sturec_personal_recommendations WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery20 = mysqli_query($con, $studensprecomendql) or mysqli_error();

	$stunum20 = mysqli_num_rows($resquery20);



	//========================P Recomendation Ends======================

//============= Injuries starts===========================


if(@@$_REQUEST['submit']=="injuriessubmit") {

		extract($_POST);
//echo @$_REQUEST['injuriesid'].">>>>>"; exit();
		if(@$_REQUEST['injuriesid']=="") {
$uploads_dir = 'uploads/student_doc/';
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
								

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_injuries');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&injuriespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_injuries', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['injuriesid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&injuriespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delinjuries']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_injuries WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&injuriespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewinjuries = getAnyTableWhereData('na_st_injuries', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensinjuriessql = "SELECT * FROM na_st_injuries WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryinj = mysqli_query($con, $studensinjuriessql) or mysqli_error();

	$stunuminj = mysqli_num_rows($resqueryinj);
	
//================Injuries ends============================


//============= Surguries starts===========================

if(@@$_REQUEST['submit']=="surgeriessubmit") {

		extract($_POST);
//echo @$_REQUEST['surgeriesid'].">>>>>"; exit();
		if(@$_REQUEST['surgeriesid']=="") {
$uploads_dir = 'uploads/student_doc/';
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
								

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_surgeries');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&surgeriespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_surgeries', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['surgeriesid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&surgeriespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delsurgeries']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_surgeries WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&surgeriespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewsurgeries = getAnyTableWhereData('na_st_surgeries', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studenssurgeriessql = "SELECT * FROM na_st_surgeries WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryshj = mysqli_query($con, $studenssurgeriessql) or mysqli_error();

	$stunumshj = mysqli_num_rows($resqueryshj);
	
	
//================Surguries ends============================

//================================ Procedures  Starts=====================================

if(@@$_REQUEST['submit']=="proceduressubmit") {

		extract($_POST);
//echo @$_REQUEST['proceduresid'].">>>>>"; exit();
		if(@$_REQUEST['proceduresid']=="") {

			$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_procedures');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&procedurespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_procedures', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['proceduresid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&procedurespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['delprocedures']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_procedures WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&procedurespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewprocedures = getAnyTableWhereData('na_st_procedures', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studensproceduressql = "SELECT * FROM na_st_procedures WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquerypro = mysqli_query($con, $studensproceduressql) or mysqli_error();

	$stunumpro = mysqli_num_rows($resquerypro);
	

//================================= Procedures  Ends ========================================

//================================ Treatments   Starts=====================================


if(@@$_REQUEST['submit']=="treatmentssubmit") {

		extract($_POST);
//echo @$_REQUEST['treatmentsid'].">>>>>"; exit();
		if(@$_REQUEST['treatmentsid']=="") {

			$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'image'=>json_encode($imageArr),'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_treatments');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&treatmentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'date'=>date('Y-m-d',strtotime($date)),'description'=>$description,'status'=>$status);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_treatments', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['treatmentsid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&treatmentspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if(@$_REQUEST['deltreatments']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_treatments WHERE id = '".@$_REQUEST['id']."'";

		$ard=mysqli_query($con, $delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&treatmentspanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewtreatments = getAnyTableWhereData('na_st_treatments', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	 $studenstreatmentssql = "SELECT * FROM na_st_treatments WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquerytrt = mysqli_query($con, $studenstreatmentssql) or mysqli_error();

	$stunumtrt = mysqli_num_rows($resquerytrt);
	

//================================= Treatments   Ends ========================================
//================================= Extra   start ========================================


	if(@@$_REQUEST['submit']=="extrasubmit") {

	extract($_POST);

		$formatextra_date = date('Y-m-d',strtotime(@$_REQUEST['from_date']));

		if(@$_REQUEST['extraid']=="") {

$uploads_dir = 'uploads/student_doc/';
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

			$data = array('ind_id'=>$_SESSION["userid"],'activity_name'=>$activity_name,'from_date'=>$formatextra_date,'activity_description'=>$activity_description,'image'=>json_encode($imageArr),'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_extracurricullam');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&extrapanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'activity_name'=>$activity_name,'from_date'=>$formatextra_date,'activity_description'=>$activity_description,'status'=>$status);

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_st_extracurricullam', " ind_id='" . $_SESSION["userid"] . "' AND id = '".@$_REQUEST['extraid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&extrapanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Extra

	if(@$_REQUEST['delextra']!='' && @$_REQUEST['ind_id']!='' && @$_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_extracurricullam WHERE id = '".@$_REQUEST['id']."'";

		mysqli_query($con, $delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&extrapanel=".@$_REQUEST['extrapanel']."&accr=1';\n";

		echo "</script>";

	}

		



	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewextra = getAnyTableWhereData('na_st_extracurricullam', " AND ind_id='".$_SESSION["userid"]."' AND id = '".@$_REQUEST['id']."' ");

	

	$studensextrassql = "SELECT * FROM na_st_extracurricullam WHERE ind_id = '".$_SESSION["userid"]."'";

	$resqueryextra = mysqli_query($con, $studensextrassql) or mysqli_error();

	$stunumextra = mysqli_num_rows($resqueryextra);
	
	
	//================================= Extra   Ends ========================================

?>

<script type="text/javascript">

	function check(){

		/*var ipaddress = document.getElementById("ip_address");

		var ipformat = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;  

	 if(ipaddress.value.match(ipformat))  

	 {  

	 ipaddress.focus();  

	 return true;  

	 }  

	 else  

	 {  

	 alert("You have entered an invalid IP address!");  

	 ipaddress.focus();

	 return false;  

	 }  	*/ 

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

  function check2(){

	  

	 var drug_name = document.getElementById("drug_name").value;

	 

	 if(drug_name=='') {

		 	document.getElementById("con_error3").innerHTML="Please Enter Drug Name";

			document.getElementById("drug_name").focus();

			return false;

	 } else {

		 document.getElementById("con_error3").innerHTML="";

	 }

	 

	}

</script>

<section id="main">

  <?php include('lib/aside.php');?>

  <section id="content">

    <div class="container">

      <div class="block-header">

        <h2>Welcome Back <span style="color:#666; font-weight:400;"><?=ucfirst($_SESSION["username"])?></span>
        	<small><?php if($view['ind'] ==1){ echo "Individual,";} if($view['std'] ==1){ echo "Student,";} if($view['edu'] ==1){ echo "Educational Institute,";} 
		if($view['edu'] ==1){echo "Instructional Facility or School";} 
		?></small></h2>

      </div>

      <div id="profile-main" class="card">

        

        <div class="pm-body clearfix" style="margin:0; padding:0;">

            <div class="pmb-block">

              <!--<div class="form-horizontal row">

                <div class="form-group" style="margin:0 0 20px 0;">

                <?php if(@$_REQUEST['operation']=="successful") { ?>

                 <div class="col-sm-12 pmbb-header" style="margin-top:0; color:#D18C13;">Operation Successful</div>

                 <?php } ?>

                 <?php if(@$_REQUEST['deloperation']=="successful") { ?>

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
                     <!--div class="panel-heading" role="tab">
                         <?php $uri = base64_encode($_SESSION['userid']); ?>
                     <h4 class="panel-title"> <a href="http://narrateme.com/new/course-module/courses?token=<?php echo $uri?>" > View Course List </a> </h4>
                     </div-->
				<!-- individual -->
                  <div class="panel panel-collapse">

                    <div class="panel-heading" role="tab">

                      <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true"> Add Individual Data </a> </h4>

                    </div>

                    <div id="accordionTeal-one" <?php if(@$_REQUEST['accr']==''){ ?> class="collapse in" <?php } else { ?> class="collapse " <?php } ?> role="tabpanel">

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>--> &nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0;">

                                  <?php if($stunum==0) { ?>

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                    <?php } else { ?>

                                     <li> <a data-pmb-action="edit" href="#">Edit</a> </li>

                                     <?php } ?>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                                <dt>IP Address</dt>

                                <dd><?=@$viewindiv['ip_address']?></dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt>Conference Id</dt>

                                <dd><?=@$viewindiv['conference_id']?></dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt>Social Security Number</dt>

                                <dd><?=@$viewindiv['social_seq_no']?></dd>

                              </dl> 

                              <dl class="dl-horizontal">

                                <dt>Date of Birth</dt>

                                <dd><?php if(@$viewindiv['dob']!='') { ?><?=date("jS M Y", strtotime(@$viewindiv['dob']))?><?php } ?></dd>

                              </dl>                            

                              <dl class="dl-horizontal">

                                <dt>Gender</dt>

                                <dd><?=@$viewindiv['gender']?></dd>

                              </dl>



                              <dl class="dl-horizontal">

                                <dt>Description</dt>

                                <dd><?=stripslashes(@$viewindiv['description'])?></dd>

                              </dl>

                            </div>

                            <form name="indform" id="indform" onsubmit="return check();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <div class="pmbb-edit">

                              <!--<dl class="dl-horizontal">

                                <dt class="p-t-10">IP Address</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" name="ip_address" id="ip_address" class="form-control" placeholder="...........">

                                  </div>

                                </dd>

                              </dl>-->

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Conference Id*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" name="conference_id" id="conference_id" value="<?=$viewindiv['conference_id']?>" class="form-control" placeholder="...........">

                                  </div>

                                   <span id="con_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                                

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Social Security Number*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" name="social_seq_no"  value="<?=$viewindiv['social_seq_no']?>" id="social_seq_no" placeholder="...........">

                                  </div>

                                   <span id="con_error2" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                               

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date of Birth</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" name="dateofbirth" id="dateofbirth" data-toggle="dropdown" value="<?php if($viewindiv['dob']!='') { ?><?=date("d/m/Y", strtotime($viewindiv['dob']))?><?php } else { ?><?=date("d/m/Y")?><?php } ?>" placeholder="<?=date("d/m/Y")?>">

                                  </div>

                                </dd>

                              </dl>

                              

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Gender</dt>

                                <dd>

                                  <div class="fg-line">

                                    <select class="form-control" name="gender">

                                      <option value="M" <?php if($viewindiv['gender']=="M"){ ?> selected<?php } ?>>Male</option>

                                      <option value="F" <?php if($viewindiv['gender']=="F"){ ?> selected<?php } ?>>Female</option>

                                      <option value="O" <?php if($viewindiv['gender']=="O"){ ?> selected<?php } ?>>Other</option>

                                    </select>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <!--<input type="text" class="form-control" name="description" id="description"  value="<?=stripslashes($viewindiv['description'])?>" placeholder="...........">-->

                                     <textarea   name="description" id="description"class="form-control" placeholder="..........."><?=stripslashes($viewindiv['description'])?></textarea>

                                  </div>

                                   <span id="con_error2" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewindiv['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewindiv['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewindiv['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" type="submit" name="submit" value="indsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
				<!-- individual -->
                
                 <!---Education attend starts--->

                  <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['eduinstituteattendedpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-edu" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Educational Institute Attend: </a> </h4>

                    </div>

                    <div id="accordionTeal-edu" <?php if(@$_REQUEST['eduinstituteattendedpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editeduinstituteattended']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Program Enroll</th>

                                      <th>Attend Date</th>

                                      <th>Course Taken</th>

                                      <th>Grades</th>

                                      <th>Course Enrolled</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($vieweduinstituteattended = mysql_fetch_array($resqueryeduinstituteattended)) {

								  ?>

                                    <tr>
									  
                                      <td><?=$vieweduinstituteattended['program_enroll'];?></td>
                                      
                                      <td><?=date('d-m-Y',strtotime($vieweduinstituteattended['attend_date']));?></td>

                                      <td><?=$vieweduinstituteattended['course_taken'];?></td>

                                      <td><?=$vieweduinstituteattended['Grades'];?></td>

                                      <td><?=$vieweduinstituteattended['course_enrolled'];?></td>
                                      <td><?php if($vieweduinstituteattended['status'] ==1){echo"Public";} else if($vieweduinstituteattended['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      

                                      <td><a href="student.php?ind_id=<?=$vieweduinstituteattended['ind_id']?>&id=<?=$vieweduinstituteattended['id']?>&editeduinstituteattended=awards&accr=1&eduinstituteattendedpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$vieweduinstituteattended['ind_id']?>&id=<?=$vieweduinstituteattended['id']?>&deleduinstituteattended=val&eduinstituteattendedpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="eduinstituteattendedform" id="eduinstituteattendedform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="eduinstituteattendedpanel" value="1" />

                            <input type="hidden" name="eduinstituteattendeddid" value="<?=$vieweduinstituteattended['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             <dl class="dl-horizontal">

                                <dt class="p-t-10">Program Enroll*</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $vieweduinstituteattended['program_enroll']?>" id="program_enrolledu" name="program_enroll" data-toggle="dropdown" placeholder="Program Enroll">

                                  </div>
<span id="eduinstituteattended_error3" style="color:#ff0000;">&nbsp;</span>
                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Attend Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="<?php echo $vieweduinstituteattended['attend_date']?>" id="attend_date" name="attend_date" placeholder="Attend Date">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course Taken</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea name="course_taken" id="course_taken" rows="5" cols="10" class="form-control"><?php echo $vieweduinstituteattended['course_taken']?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $vieweduinstituteattended['Grades']?>" id="Grades" name="Grades" data-toggle="dropdown" placeholder="Grades">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course Enrolled</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea name="course_enrolled" id="course_enrolled" rows="5" cols="10" class="form-control"><?php echo $vieweduinstituteattended['course_enrolled']?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($vieweduinstituteattended['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($vieweduinstituteattended['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($vieweduinstituteattended['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="eduinstituteattendedsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="eduinstituteattendedform" id="eduinstituteattendedform" enctype="multipart/form-data" onsubmit="return Submiteduinstituteattended();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="eduinstituteattendedpanel" value="1" />

                            <div class="pmbb-edit">
                             <dl class="dl-horizontal">

                                <dt class="p-t-10">Program Enroll*</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="program_enrolledu" name="program_enroll" data-toggle="dropdown" placeholder="Program Enroll">

                                  </div>
<span id="eduinstituteattended_error3" style="color:#ff0000;">&nbsp;</span>
                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Attend Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="" id="attend_date" name="attend_date" placeholder="Attend Date">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course Taken</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea name="course_taken" id="course_taken" rows="5" cols="10" class="form-control"></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="Grades" name="Grades" data-toggle="dropdown" placeholder="Grades">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course Enrolled</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea name="course_enrolled" id="course_enrolled" rows="5" cols="10" class="form-control"></textarea>

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="eduinstituteattendedsubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submiteduinstituteattended(){

								if($("#program_enrolledu").val() == "" ){

									$("#program_enrolledu").focus();

									$("#eduinstituteattended_error3").html("Please Enter Program Enroll");

									return false;

                            	}else{

									$("#eduinstituteattended_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  <!---Education attend ends--->
                
                
                <!--Seminar starts--->	
                    
                  <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['seminarpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-24" data-parent="#accordionTeal" data-toggle="collapse" class="">Add Seminars Attended: </a> </h4>

                    </div>

                    <div id="accordionTeal-24" <?php if(@$_REQUEST['seminarpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editseminar']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>--> &nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Seminars Name</th>

                                      <th>Schedule</th>

                                      <th>Entry_date</th>

                                      <th>Description</th>
                                      <th>Status</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewseminar = mysql_fetch_array($resquery24)) {

								  ?>

                                    <tr>

                                      <td><?=$viewseminar['name']?></td>

                                      <td><?=$viewseminar['semi_schedule']?></td>

                                      <td><?=$viewseminar['entry_date']?></td>

                                      <td><?=$viewseminar['Description']?></td>
                                      <td><?php if($viewseminar['status'] ==1){echo"Public";} else if($viewseminar['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                       <td><a href="student.php?ind_id=<?=$viewseminar['ind_id']?>&id=<?=$viewseminar['semi_id']?>&editseminar=awards&accr=1&seminarpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewseminar['ind_id']?>&id=<?=$viewseminar['semi_id']?>&delseminar=val&seminarpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="seminarform" id="seminarform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="seminarpanel" value="1" />

                            

                            <input type="hidden" name="seminardid" value="<?=$viewseminar['semi_id']?>" />

                             <input type="hidden" name="id" value="<?=$viewseminar['semi_id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Seminars Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="<?php echo $viewseminar['name']?>" id="seminars_person" name="name" value="" placeholder="Seminar Name">

                                  </div>

                                   <span id="coach_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Schedule</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewseminar['semi_schedule']?>" id="semi_schedule" name="semi_schedule" data-toggle="dropdown" placeholder="Schedule">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Entry Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewseminar['entry_date']?>" id="entry_date" name="entry_date" data-toggle="dropdown" placeholder="Entry date">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Descripton</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                   

                                    <textarea name="Description" class="form-control"><?php echo $viewseminar['Description']?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewseminar['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewseminar['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewseminar['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="seminarsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="seminarform" id="seminarform" onsubmit="return Submitseminar();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="seminarpanel" value="1" />

                            <div class="pmbb-edit">

                            

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Seminars Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="" id="seminars_person" name="name" value="" placeholder="Seminar Name">

                                  </div>

                                   <span id="seminar_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Schedule</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="semi_schedule" name="semi_schedule" data-toggle="dropdown" placeholder="Schedule">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Entry Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="entry_date" name="entry_date" data-toggle="dropdown" placeholder="Entry date">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Descripton</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                   

                                    <textarea name="Description" class="form-control"></textarea>

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="seminarsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitseminar(){

								if($("#seminars_person").val() == "" ){

									$("#seminars_person").focus();

									$("#seminar_error3").html("Please Enter Seminar Name");

									return false;

                            	}else{

									$("#seminar_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>
                  
                  <!---Seminar ends--->	
                
                
                 <!--Teacher Panel Starts-->

                  		<div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['teacherpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-six" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Teacher: </a> </h4>

                    </div>

                    <div id="accordionTeal-six" <?php if(@$_REQUEST['teacherpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editteacher']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Teacher</th>

                                      <th>Information</th>

                                      <th>Address</th>

                                      <th>Phone</th>

                                      <th>Email</th>

                                      <th>Portal</th>

                                      <th>Academic</th>
                                      <th>Status</th>

                                      

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  	while($viewteacher = mysql_fetch_array($resquery6)) {

								  ?>

                                    <tr>

                                      <td><?=$viewteacher['teacher_name']?></td>

                                      <td><?=$viewteacher['information']?></td>

                                      <td><?=$viewteacher['address']?></td>

                                      <td><?=$viewteacher['phone']?></td>

                                      <td><?=$viewteacher['email']?></td>

                                      <td><?=$viewteacher['learning_portal']?></td>

                                      <td><?=$viewteacher['academic_program']?></td>
                                      
                                      <td><?php if($viewteacher['status'] ==1){echo"Public";} else if($viewteacher['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      

                                       <td><a href="student.php?ind_id=<?=$viewrehab['ind_id']?>&id=<?=$viewteacher['id']?>&editteacher=awards&accr=1&teacherpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewteacher['ind_id']?>&id=<?=$viewteacher['id']?>&delteacher=val&teacherpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="rehabform" id="rehabform" onsubmit="return check4();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="rehabpanel" value="1" />

                            <input type="hidden" name="teacherdid" value="<?=$viewteacher['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Teacher Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="<?=$viewteacher['teacher_name']?>" placeholder="Teacher Name">

                                  </div>

                                   <span id="teacher_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Information</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?=$viewteacher['information']?>" id="information" name="information" data-toggle="dropdown" placeholder="Information">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Address</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' value="<?=$viewteacher['address']?>" class="form-control" id="address" name="address" data-toggle="dropdown" placeholder="Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Pnone No</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' value="<?=$viewteacher['phone']?>" class="form-control" id="phone" name="phone" data-toggle="dropdown" placeholder="Phone No">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?=$viewteacher['email']?>" id="email" name="email" data-toggle="dropdown" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Learning Portal</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' value="<?=$viewteacher['learning_portal']?>" class="form-control" id="learning_portal" name="learning_portal" data-toggle="dropdown" placeholder="Learning Portal">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Academic Program</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' value="<?=$viewteacher['academic_program']?>" class="form-control" id="academic_program" name="academic_program" data-toggle="dropdown" placeholder="Academic Program">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' value="<?=$viewteacher['course']?>" class="form-control" id="course" name="course" data-toggle="dropdown" placeholder="Course">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Curriculum</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text'  value="<?=$viewteacher['curriculum']?>" class="form-control" id="curriculum" name="curriculum" data-toggle="dropdown" placeholder="Curriculum">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Syllabus</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' value="<?=$viewteacher['syllabus']?>" class="form-control" id="syllabus" name="syllabus" data-toggle="dropdown" placeholder="Syllabus">

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

                            <form name="teacherform" id="teacherform" onsubmit="return Submitteachert();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="teacherpanel" value="1" />

                            <div class="pmbb-edit">

                            

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Teacher Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="teacher_name" name="teacher_name" value="" placeholder="Teacher Name">

                                  </div>

                                   <span id="teacher_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Information</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" id="information" name="information" data-toggle="dropdown" placeholder="Information">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Address</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="address" name="address" data-toggle="dropdown" placeholder="Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Pnone No</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="phone" name="phone" data-toggle="dropdown" placeholder="Phone No">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="email" name="email" data-toggle="dropdown" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Learning Portal</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="learning_portal" name="learning_portal" data-toggle="dropdown" placeholder="Learning Portal">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Academic Program</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="academic_program" name="academic_program" data-toggle="dropdown" placeholder="Academic Program">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="course" name="course" data-toggle="dropdown" placeholder="Course">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Curriculum</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="curriculum" name="curriculum" data-toggle="dropdown" placeholder="Curriculum">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Syllabus</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="syllabus" name="syllabus" data-toggle="dropdown" placeholder="Syllabus">

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="teachersubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitteachert(){

								if($("#teacher_name").val() == "" ){

									$("#teacher_name").focus();

									$("#teacher_error3").html("Please Enter Teacher Name");

									return false;

                            	}else{

									$("#teacher_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                   <!--Teacher Panel Ends-->
                
                
                 <!-- Video Presectation -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['videopresentationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-11" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Video Presentation: </a> </h4>

                    </div>

                    <div id="accordionTeal-11" <?php if(@$_REQUEST['videopresentationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editvideopresentation']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Video Date</th>

                                      <th>Description</th>

                                      <th>Link Video</th>

                                      <th>Ip Live Cam</th>

                                      <th>Comments</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewvideopresentation = mysql_fetch_array($resquery11)) {

								  ?>

                                    <tr>

                                      <td><?=date('d-m-Y',strtotime($viewvideopresentation['video_date']));?></td>

                                      <td><?=$viewvideopresentation['description'];?></td>

                                      <td><?=$viewvideopresentation['link_rec_video'];?></td>

                                      <td><?=$viewvideopresentation['ip_live_cam'];?></td>

                                      <td><?=$viewvideopresentation['comments'];?></td>
                                      <td><?php if($viewvideopresentation['status'] ==1){echo"Public";} else if($viewvideopresentation['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewvideopresentation['ind_id']?>&id=<?=$viewvideopresentation['id']?>&editvideopresentation=awards&accr=1&videopresentationpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewvideopresentation['ind_id']?>&id=<?=$viewvideopresentation['id']?>&delvideopresentation=val&videopresentationpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="videopresentationform" id="videopresentationform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="videopresentationpanel" value="1" />

                            <input type="hidden" name="videopresentationdid" value="<?=$viewvideopresentation['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Video Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="<?php echo $viewvideopresentation['video_date']?>" id="video_date" name="video_date" placeholder="videopresentationation Person">

                                  </div>

                                   <span id="videopresentation_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea name="description" id="description" rows="5" cols="10" class="form-control"><?php echo $viewvideopresentation['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Link Video</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewvideopresentation['link_rec_video']?>" id="link_rec_video" name="link_rec_video" data-toggle="dropdown" placeholder="Link Video">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Ip Live Cam</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewvideopresentation['ip_live_cam']?>" id="ip_live_cam" name="ip_live_cam" data-toggle="dropdown" placeholder="Ip Live Cam">

                                  </div>

                                </dd>

                              </dl>

                              

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea name="comments" class="form-control" rows="5" cols="10"><?php echo $viewvideopresentation['comments']?></textarea>

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

                            <form name="videopresentationform" id="videopresentationform"  enctype="multipart/form-data" onsubmit="return Submitvideopresentation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="videopresentationpanel" value="1" />

                            <div class="pmbb-edit">

                            

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Video Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="" id="video_date" name="video_date" placeholder="Video Date">

                                  </div>

                                   <span id="videopresentation_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea name="description" id="description" rows="5" cols="10" class="form-control"></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Link Video</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="link_rec_video" name="link_rec_video" data-toggle="dropdown" placeholder="Link Video">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Ip Live Cam</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="ip_live_cam" name="ip_live_cam" data-toggle="dropdown" placeholder="Ip Live Cam">

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

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea name="comments" class="form-control" rows="5" cols="10"></textarea>

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

                            <script>

                            function Submitvideopresentation(){

								if($("#video_date").val() == "" ){

									$("#video_date").focus();

									$("#videopresentation_error3").html("Please Enter Video Date");

									return false;

                            	}else{

									$("#videopresentation_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  

                  <!-- Video Presectation -->
                  
                  
                  
                   <!-- Audio Presentation -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['audiopresentationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-17" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Audio Presentation: </a> </h4>

                    </div>

                    <div id="accordionTeal-17" <?php if(@$_REQUEST['audiopresentationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editaudiopresentation']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Audio Date</th>

                                      <th>Description</th>

                                      <th>Link Audio</th>

                                      <th>Ip Live Cam</th>

                                      <th>Comments</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewaudiopresentation = mysql_fetch_array($resquery17)) {

								  ?>

                                    <tr>

                                      <td><?=date('d-m-Y',strtotime($viewaudiopresentation['audio_date']));?></td>

                                      <td><?=$viewaudiopresentation['description'];?></td>

                                      <td><?=$viewaudiopresentation['link_rec_audio'];?></td>

                                      <td><?=$viewaudiopresentation['ip_live_cam'];?></td>

                                      <td><?=$viewaudiopresentation['comments'];?></td>
                                      <td><?php if($viewaudiopresentation['status'] ==1){echo"Public";} else if($viewaudiopresentation['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewaudiopresentation['ind_id']?>&id=<?=$viewaudiopresentation['id']?>&editaudiopresentation=awards&accr=1&audiopresentationpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewaudiopresentation['ind_id']?>&id=<?=$viewaudiopresentation['id']?>&delaudiopresentation=val&audiopresentationpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="audiopresentationform" id="audiopresentationform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="audiopresentationpanel" value="1" />

                            <input type="hidden" name="audiopresentationdid" value="<?=$viewaudiopresentation['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Audio Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="<?php echo $viewaudiopresentation['audio_date']?>" id="audio_date" name="audio_date" placeholder="Audio Date">

                                  </div>

                                   <span id="audiopresentation_error3" style="color:#ff0000;">&nbsp;</span>



                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea class="form-control" rows="5" cols="10" name="description" id="description"><?php echo $viewaudiopresentation['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Link Audio</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewaudiopresentation['link_rec_audio']?>" id="link_rec_audio" name="link_rec_audio" placeholder="Link Audio">

                                  </div>



                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Ip Live Cam</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewaudiopresentation['ip_live_cam']?>" id="ip_live_cam" name="ip_live_cam" placeholder="Ip Live Cam">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea class="form-control" rows="5" cols="10" name="comments" id="comments"><?php echo $viewaudiopresentation['comments']?></textarea>

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

                            <form name="audiopresentationform" id="audiopresentationform"  enctype="multipart/form-data" onsubmit="return Submitaudiopresentation3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="audiopresentationpanel" value="1" />

                            <div class="pmbb-edit">

                            

                              

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Audio Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="" id="audio_date" name="audio_date" placeholder="Audio Date">

                                  </div>

                                   <span id="audiopresentation_error3" style="color:#ff0000;">&nbsp;</span>



                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea class="form-control" rows="5" cols="10" name="description" id="description"></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Link Audio</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="link_rec_audio" name="link_rec_audio" placeholder="Link Audio">

                                  </div>



                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Ip Live Cam</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="ip_live_cam" name="ip_live_cam" placeholder="Ip Live Cam">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea class="form-control" rows="5" cols="10" name="comments" id="comments"></textarea>

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="audiopresentationsubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitaudiopresentation3(){

								if($("#audio_date").val() == "" ){

									$("#audio_date").focus();

									$("#audiopresentation_error3").html("Please Enter Audio Date");

									return false;

                            	}else{

									$("#audiopresentation_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  




                  <!-- Audio Presentation -->
                  
                  
                  <!--Recomend Panel Starts-->

                  		<div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['recomendpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-8" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Recomendation: </a> </h4>

                    </div>

                    <div id="accordionTeal-8" <?php if(@$_REQUEST['recomendpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editrecomend']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>--> &nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Recomendation Person</th>

                                      <th>Recomendation</th>

                                      <th>Video Link</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewrecomend = mysql_fetch_array($resquery8)) {

								  ?>

                                    <tr>

                                      <td><?=$viewrecomend['recomendation_person']?></td>

                                      <td><?=$viewrecomend['recomendation']?></td>

                                      <td><?=$viewrecomend['rec_video_link']?></td>
                                      <td><?php if($viewrecomend['status'] ==1){echo"Public";} else if($viewrecomend['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                       <td><a href="student.php?ind_id=<?=$viewrecomend['ind_id']?>&id=<?=$viewrecomend['id']?>&editrecomend=awards&accr=1&recomendpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewrecomend['ind_id']?>&id=<?=$viewrecomend['id']?>&delrecomend=val&recomendpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="recomendform" id="recomendform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="recomendpanel" value="1" />

                            

                            <input type="hidden" name="recomenddid" value="<?=$viewrecomend['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recomendation Person*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="<?php echo $viewrecomend['recomendation_person']?>" id="recomendation_person" name="recomendation_person" value="" placeholder="Recomendation Person">

                                  </div>

                                   <span id="coach_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recomendation</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewrecomend['recomendation']?>" id="recomendation" name="recomendation" data-toggle="dropdown" placeholder="Recomendation">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">video Link</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewrecomend['rec_video_link']?>" id="rec_video_link" name="rec_video_link" data-toggle="dropdown" placeholder="Video Link">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewrecomend['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewrecomend['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewrecomend['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="recomendsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="recomendform" id="recomendform" onsubmit="return Submitrecomend();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="recomendpanel" value="1" />

                            <div class="pmbb-edit">

                            

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recommend Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="recomendation_person" name="recomendation_person" value="" placeholder="Recomendation Person">

                                  </div>

                                   <span id="recomend_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recomendation</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" id="recomendation" name="recomendation" data-toggle="dropdown" placeholder="Information">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Video Link</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="rec_video_link" name="rec_video_link" data-toggle="dropdown" placeholder="Video Link">

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="recomendsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitrecomend(){

								if($("#recomendation_person").val() == "" ){

									$("#recomendation_person").focus();

									$("#recomend_error3").html("Please Enter Recomend Person");

									return false;

                            	}else{

									$("#recomend_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  	<!--Recomend Panel end-->
                  
                  <!--Award Panel Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['awardpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-three" aria-expanded="false"> Add Award: <?=$awardpanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-three" <?php if(@$_REQUEST['awardpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editaward']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  	while($viewawards = mysql_fetch_array($resquery3)) {

								  ?>

                                    <tr>

                                      <td><?=$viewawards['award_name']?></td>

                                      <td><?php if($viewawards['award_date']!='') { ?><?=date("jS M Y", strtotime($viewawards['award_date']))?><?php } ?></td>

                                      <td><?=stripslashes($viewawards['award_description'])?></td>
                                      <td><?php if($viewawards['status'] ==1){echo"Public";} else if($viewawards['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                       <td><a href="student.php?ind_id=<?=$viewawards['ind_id']?>&id=<?=$viewawards['id']?>&editaward=awards&accr=1&awardpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewawards['ind_id']?>&id=<?=$viewawards['id']?>&delaward=val&awardpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="awardform" id="awardform" onsubmit="return check3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="awardpanel" value="1" />

                            <input type="hidden" name="awardid" value="<?=$viewawards['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="award_name" name="award_name" value="<?=$viewawards['award_name']?>" placeholder="...........">

                                  </div>

                                   <span id="con_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" id="award_date" name="award_date" value="<?=date("d-m-Y", strtotime($viewawards['award_date']))?>" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description1</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea  class="form-control" id="award_description" name="award_description" placeholder="..........."><?=stripslashes($viewawards['award_description'])?></textarea>

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

                            <form name="awardform" id="awardform" onsubmit="return check3();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="awardpanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="award_name" name="award_name" value="<?=$viewawards['award_name']?>" placeholder="...........">

                                  </div>

                                   <span id="con_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

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

                                    <textarea  class="form-control" id="award_description" name="award_description" placeholder="..........."></textarea>

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

                  </div>

                   <!--Award Panel Ends-->
                  
                  
                  <!--job Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['jobpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-10" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add job: </a> </h4>

                    </div>

                    <div id="accordionTeal-10" <?php if(@$_REQUEST['jobpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editjob']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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

                                      <th>Description</th>
                                      <th>Status</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewjob = mysql_fetch_array($resquery10)) {

								  ?>

                                    <tr>

                                      <td><?=$viewjob['employer_name'];?></td>

                                      <td><?=date('d-m-Y',strtotime($viewjob['from_date']));?></td>

                                      <td><?=date('d-m-Y',strtotime($viewjob['to_date']));?></td>

                                      <td><?=$viewjob['position'];?></td>

                                      <td><?=substr($viewjob['job_description'],0,100);?></td>
                                      <td><?php if($viewjob['status'] ==1){echo"Public";} else if($viewjob['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewjob['ind_id']?>&id=<?=$viewjob['id']?>&editjob=awards&accr=1&jobpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewjob['ind_id']?>&id=<?=$viewjob['id']?>&deljob=val&jobpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="jobform" id="jobform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="jobpanel" value="1" />

                            <input type="hidden" name="jobdid" value="<?=$viewjob['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Employer Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="<?php echo $viewjob['employer_name']?>" id="employer_name" name="employer_name" value="" placeholder="jobation Person">

                                  </div>

                                   <span id="coach_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">From Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewjob['from_date']?>" id="from_date" name="from_date" data-toggle="dropdown" placeholder="From Date">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">To Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewjob['to_date']?>" id="to_date" name="to_date" data-toggle="dropdown" placeholder="To Date">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Position</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewjob['position']?>" id="position" name="position" data-toggle="dropdown" placeholder="Position">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Job Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea name="job_description" class="form-control"><?php echo $viewjob['job_description']?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewjob['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewjob['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewjob['status']==3){?> selected="selected"<?php }?>>Friends</option>
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

                            <form name="jobform" id="jobform" onsubmit="return Submitjob();" action="<?=$_SERVER['PHP_SELF']?>"  enctype="multipart/form-data" method="post">

                            <input type="hidden" name="jobpanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Employer Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="" id="employer_name" name="employer_name" value="" placeholder="jobation Person">

                                  </div>

                                   <span id="job_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">From Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="from_date" name="from_date" data-toggle="dropdown" placeholder="From Date">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">To Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="to_date" name="to_date" data-toggle="dropdown" placeholder="To Date">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Position</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="position" name="position" data-toggle="dropdown" placeholder="Position">

                                  </div>

                                </dd>

                              </dl>

                              

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Job Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea name="job_description" class="form-control"></textarea>

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

                            <script>

                            function Submitjob(){

								if($("#employer_name").val() == "" ){

									$("#employer_name").focus();

									$("#job_error3").html("Please Enter Employer Name");

									return false;

                            	}else{

									$("#job_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  	<!--job Ends-->
                  
                    <!---reference  starts--->

                  <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['referencespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="referencespanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-21" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add references: </a> </h4>

                    </div>

                    <div id="accordionTeal-21" <?php if(@$_REQUEST['referencespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editreferences']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Reference Name</th>

                                      <th>Position</th>

                                      <th>Phone</th>

                                      <th>Email</th>

                                      <th>Relationship</th>

                                      <th>Info</th>

                                      <th>Video</th>

                                      <th>Reference Date</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewreferences = mysql_fetch_array($resquery21)) {

								  ?>

                                    <tr>

                                      <td><?=$viewreferences['ref_name'];?></td>

                                      <td><?=$viewreferences['ref_position'];?></td>

                                      <td><?=$viewreferences['ref_phone'];?></td>

                                      <td><?=$viewreferences['ref_emailaddress'];?></td>

                                      <td><?=$viewreferences['ref_relationship'];?></td>

                                      <td><?=$viewreferences['ref_recominfo'];?></td>

                                      <td><?=$viewreferences['ref_recomvideo'];?></td>

                                      <td><?=$viewreferences['dateofreference'];?></td>
                                      <td><?php if($viewreferences['status'] ==1){echo"Public";} else if($viewreferences['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewreferences['ind_id']?>&id=<?=$viewreferences['id']?>&editreferences=referencess&accr=1&referencespanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewreferences['ind_id']?>&id=<?=$viewreferences['id']?>&delreferences=val&referencespanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="referencesform" id="referencesform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="referencespanel" value="1" />

                            <input type="hidden" name="referencesdid" value="<?=$viewreference1['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                            

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="<?php echo $viewreference1['ref_name']?>" id="ref_name" name="ref_name"  placeholder="Reference Name">

                                  </div>

                                   

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="<?php echo $viewreference1['dateofreference']?>" id="dateofreference" name="dateofreference"  placeholder="Reference Name">

                                  </div>

                                   

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Position</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewreference1['ref_position']?>" id="ref_position" name="ref_position" data-toggle="dropdown" placeholder="Position">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Phone </dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewreference1['ref_phone']?>" id="ref_phone" name="ref_phone" data-toggle="dropdown" placeholder="Classes Taken">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewreference1['ref_emailaddress']?>" id="ref_emailaddress" name="ref_emailaddress" data-toggle="dropdown" placeholder="Position">

                                  </div>

                                </dd>

                              </dl>

                              

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Relationship</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewreference1['ref_relationship']?>" id="ref_relationship" name="ref_relationship" data-toggle="dropdown" placeholder="Reference Info">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Info</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewreference1['ref_recominfo']?>" id="ref_recominfo" name="ref_recominfo" data-toggle="dropdown" placeholder="Reference Info">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Video</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewreference1['ref_recomvideo']?>" id="ref_recomvideo" name="ref_recomvideo" data-toggle="dropdown" placeholder="Video Link">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewreference1['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewreference1['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewreference1['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="referencessubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="referencesform" id="referencesform" onsubmit="return Submitreferences();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="referencespanel" value="1" />

                            <div class="pmbb-edit">

                            

 							  <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="" id="ref_name" name="ref_name"  placeholder="Reference Name">

                                  </div>

                                   <span id="references_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="" id="dateofreference" name="dateofreference"  placeholder="Reference Date">

                                  </div>

                                   

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Position</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="ref_position" name="ref_position" data-toggle="dropdown" placeholder="Position">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Reference Phone </dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="ref_phone" name="ref_phone" data-toggle="dropdown" placeholder="Classes Taken">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="ref_emailaddress" name="ref_emailaddress" data-toggle="dropdown" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Relationship</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="ref_relationship" name="ref_relationship" data-toggle="dropdown" placeholder="Relationship">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Info</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="ref_recominfo" name="ref_recominfo" data-toggle="dropdown" placeholder="Reference Info">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Video</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="ref_recomvideo" name="ref_recomvideo" data-toggle="dropdown" placeholder="Video Link">

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="referencessubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitreferences(){

								if($("#ref_name").val() == "" ){

									$("#ref_name").focus();

									$("#references_error3").html("Please Enter Reference Name");

									return false;

                            	}else{

									$("#references_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  <!---reference  ends--->
                  
                  
                   <!-- Issuar of Report -->

                        <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['issuerofreportpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-14" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Issuer Report: </a> </h4>

                    </div>

                    <div id="accordionTeal-14" <?php if(@$_REQUEST['issuerofreportpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editissuerofreport']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Name</th>

                                      <th>Telephone no.</th>

                                      <th>Website</th>

                                      <th>URL</th>

                                      <th>Description</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewissuerofreport = mysql_fetch_array($resquery14)) {

								  ?>

                                    <tr>

                                      <td><?=$viewissuerofreport['name'];?></td>

                                      <td><?=$viewissuerofreport['tel_no'];?></td>

                                      <td><?=$viewissuerofreport['website'];?></td>

                                      <td><?=$viewissuerofreport['url'];?></td>

                                      <td><?=$viewissuerofreport['description'];?></td>
                                      <td><?php if($viewissuerofreport['status'] ==1){echo"Public";} else if($viewissuerofreport['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewissuerofreport['ind_id']?>&id=<?=$viewissuerofreport['id']?>&editissuerofreport=awards&accr=1&issuerofreportpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewissuerofreport['ind_id']?>&id=<?=$viewissuerofreport['id']?>&delissuerofreport=val&issuerofreportpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="issuerofreportform" id="issuerofreportform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="issuerofreportpanel" value="1" />

                            <input type="hidden" name="issuerofreportdid" value="<?=$viewissuerofreport['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewissuerofreport['name']?>" id="name" name="name" placeholder="Name">

                                  </div>

                                   <span id="issuerofreport_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Teliphone no.</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewissuerofreport['tel_no']?>" id="tel_no" name="tel_no" placeholder="Teliphone no.">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Website</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewissuerofreport['website']?>" id="website" name="website" data-toggle="dropdown" placeholder="Website">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">URL</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewissuerofreport['url']?>" id="url" name="url" data-toggle="dropdown" placeholder="URL">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea rows="5" cols="10" name="description" id="description" class="form-control"><?php echo $viewissuerofreport['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>
       <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewissuerofreport['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewissuerofreport['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewissuerofreport['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
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

                            <form name="issuerofreportform" id="issuerofreportform" onsubmit="return Submitissuerofreport3();"   enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="issuerofreportpanel" value="1" />

                            <div class="pmbb-edit">

                            

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="name123" name="name" placeholder="Name">

                                  </div>

                                   <span id="issuerofreport_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Teliphone no.</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="" id="tel_no" name="tel_no" placeholder="Teliphone no.">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Website</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="website" name="website" data-toggle="dropdown" placeholder="Website">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">URL</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="url" name="url" data-toggle="dropdown" placeholder="URL">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea rows="5" cols="10" name="description" id="description" class="form-control"></textarea>

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="issuerofreportsubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitissuerofreport3(){

								if($("#name123").val() == "" ){

									$("#name123").focus();

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


                  <!-- Issuar of Report -->
                  
                   <!--Coach Panel Starts-->

                  		<div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['coachpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-7" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Coach: </a> </h4>

                    </div>

                    <div id="accordionTeal-7" <?php if(@$_REQUEST['coachpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editcoach']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Coach Name</th>

                                      <th>Sample</th>

                                      <th>Phone</th>

                                      <th>Email</th>

                                      <th>Video</th>

                                      <th>Description</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewcoach = mysql_fetch_array($resquery7)) {

								  ?>

                                    <tr>

                                      <td><?=$viewcoach['coach_name']?></td>

                                      <td><?=$viewcoach['sample']?></td>

                                      <td><?=$viewcoach['phone']?></td>

                                      <td><?=$viewcoach['email']?></td>

                                      <td><?=$viewcoach['video']?></td>

                                      <td><?=substr($viewcoach['description'],0,100);?></td>
                                      <td><?php if($viewcoach['status'] ==1){echo"Public";} else if($viewcoach['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                       <td><a href="student.php?ind_id=<?=$viewcoach['ind_id']?>&id=<?=$viewcoach['id']?>&editcoach=awards&accr=1&coachpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewcoach['ind_id']?>&id=<?=$viewcoach['id']?>&delcoach=val&coachpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="coachform" id="coachform" onsubmit="return check8();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="coachpanel" value="1" />

                            <input type="hidden" name="coachdid" value="<?=$viewcoach['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Coach Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="<?php echo $viewcoach['coach_name']?>" id="coach_name" name="coach_name" value="" placeholder="Coach Name">

                                  </div>

                                   <span id="coach_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Sample</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewcoach['sample']?>" id="sample" name="sample" data-toggle="dropdown" placeholder="Information">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Phone</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewcoach['phone']?>" id="phone" name="phone" data-toggle="dropdown" placeholder="Phone">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewcoach['email']?>" id="email" name="email" data-toggle="dropdown" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Video</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewcoach['video']?>" id="video" name="video" data-toggle="dropdown" placeholder="Video Link">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    

                                    <textarea name="description" class="form-control"><?php echo $viewcoach['description']?></textarea>

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

                            <form name="coachform" id="coachform" onsubmit="return Submitcoach();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="coachpanel" value="1" />

                            <div class="pmbb-edit">

                            

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Coach Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="coach_name" name="coach_name" value="" placeholder="Coach Name">

                                  </div>

                                   <span id="coach_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Sample</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" id="sample" name="sample" data-toggle="dropdown" placeholder="Information">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Phone</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="phone" name="phone" data-toggle="dropdown" placeholder="Phone">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="email" name="email" data-toggle="dropdown" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Video</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="video" name="video" data-toggle="dropdown" placeholder="Video Link">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    

                                    <textarea name="description" class="form-control"></textarea>

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

                            <script>

                            function Submitcoach(){

								if($("#coach_name").val() == "" ){

									$("#coach_name").focus();

									$("#coach_error3").html("Please Enter Coach Name");

									return false;

                            	}else{

									$("#coach_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                    <!--Coach Panel Ends-->
                  
                  
                  <!--  Injuries starts -->
                 
                  <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['injuriespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="injuriespanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-injuries" aria-expanded="false"> Add injuries: <?=$injuriespanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-injuries" <?php if(@$_REQUEST['injuriespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editinjuries']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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

                                       <td><a href="student.php?ind_id=<?=$viewinjuries['ind_id']?>&id=<?=$viewinjuries['id']?>&editinjuries=injuriess&accr=1&injuriespanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewinjuries['ind_id']?>&id=<?=$viewinjuries['id']?>&delinjuries=val&injuriespanel=1" style="color:#ff0000;">Delete</a> </td>

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

                                    <input type="text" class="form-control" id="name_inj" name="name" value="<?=$viewinjuries['name']?>" placeholder="...........">

                                  </div>

                                   <span id="injuries_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" id="date" name="date" value="<?=$viewinjuries['date']?>" placeholder="...........">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">
                                 
                                    <textarea rows="5" cols="10" class="form-control" id="description" name="description"><?=$viewinjuries['description']?></textarea>

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

                            <form name="injuriesform" id="injuriesform" onsubmit="return injuries();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="injuriespanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name/Activity*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="name_inj" name="name" value="" placeholder="...........">

                                  </div>

                                   <span id="injuries_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

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
                                 
                                    <textarea rows="5" cols="10" class="form-control" id="description" name="description"></textarea>

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
                 
                  <!--  Injuries ends -->
                  
                   <!--  Surgaries starts -->
                 
                  <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['surgeriespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="surgeriespanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-surgeries" aria-expanded="false"> Add surgeries: <?=$surgeriespanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-surgeries" <?php if(@$_REQUEST['surgeriespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editsurgeries']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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

                                       <td><a href="student.php?ind_id=<?=$viewsurgeries['ind_id']?>&id=<?=$viewsurgeries['id']?>&editsurgeries=surgeriess&accr=1&surgeriespanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewsurgeries['ind_id']?>&id=<?=$viewsurgeries['id']?>&delsurgeries=val&surgeriespanel=1" style="color:#ff0000;">Delete</a> </td>

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

                                    <input type="text" class="form-control" id="name_shj" name="name" value="<?=$viewsurgeries['name']?>" placeholder="...........">

                                  </div>

                                   <span id="surgeries_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" id="date" name="date" value="<?=$viewsurgeries['date']?>" placeholder="...........">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">
                                 
                                    <textarea rows="5" cols="10" class="form-control" id="description" name="description"><?=$viewsurgeries['description']?></textarea>

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

                            <form name="surgeriesform" id="surgeriesform" onsubmit="return surgeries();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="surgeriespanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name/Activity*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="name_shj" name="name" value="" placeholder="...........">

                                  </div>

                                   <span id="surgeries_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

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
                                 
                                    <textarea rows="5" cols="10" class="form-control" id="description" name="description"></textarea>

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
                 
                  <!--  Surgaries ends -->
                  
                  
                  <!--======================Procedures   start===============-->
                
                <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['procedurespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="procedurespanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-procedures" aria-expanded="false"> Add procedures: <?=$procedurespanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-procedures" <?php if(@$_REQUEST['procedurespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editprocedures']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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

                                       <td><a href="student.php?ind_id=<?=$viewprocedures['ind_id']?>&id=<?=$viewprocedures['id']?>&editprocedures=proceduress&accr=1&procedurespanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewprocedures['ind_id']?>&id=<?=$viewprocedures['id']?>&delprocedures=val&procedurespanel=1" style="color:#ff0000;">Delete</a> </td>

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

                                    <input type="text" class="form-control" id="name_pro" name="name" value="<?=$viewprocedures['name']?>" placeholder="...........">

                                  </div>

                                   <span id="procedures_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" id="date" name="date" value="<?=$viewprocedures['date']?>" placeholder="...........">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">
                                 
                                    <textarea rows="5" cols="10" class="form-control" id="description" name="description"><?=$viewprocedures['description']?></textarea>

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

                            <form name="proceduresform" id="proceduresform" onsubmit="return procedures();"   enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="procedurespanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name/Activity*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="name_pro" name="name" value="" placeholder="...........">

                                  </div>

                                   <span id="procedures_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

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
                                 
                                    <textarea rows="5" cols="10" class="form-control" id="description" name="description"></textarea>

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
                  
                <!--======================Procedures   ends===============--> 
                 
                 
                 <!--======================Treatments    start===============-->
                
                <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['treatmentspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="treatmentspanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-treatments" aria-expanded="false"> Add treatments: <?=$treatmentspanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-treatments" <?php if(@$_REQUEST['treatmentspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['edittreatments']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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
                                      <th>status</th>

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

                                       <td><a href="student.php?ind_id=<?=$viewtreatments['ind_id']?>&id=<?=$viewtreatments['id']?>&edittreatments=treatmentss&accr=1&treatmentspanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewtreatments['ind_id']?>&id=<?=$viewtreatments['id']?>&deltreatments=val&treatmentspanel=1" style="color:#ff0000;">Delete</a> </td>

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

                                    <input type="text" class="form-control" id="name_trt" name="name" value="<?=$viewtreatments['name']?>" placeholder="...........">

                                  </div>

                                   <span id="treatments_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" id="date" name="date" value="<?=$viewtreatments['date']?>" placeholder="...........">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">
                                 
                                    <textarea rows="5" cols="10" class="form-control" id="description" name="description"><?=$viewtreatments['description']?></textarea>

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

                            <form name="treatmentsform" id="treatmentsform" onsubmit="return treatments();"   enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="treatmentspanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name/Activity*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="name_trt" name="name" value="" placeholder="...........">

                                  </div>

                                   <span id="treatments_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

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
                                 
                                    <textarea rows="5" cols="10" class="form-control" id="description" name="description"></textarea>

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
                  
                <!--======================Treatments    ends===============-->  
                  
                  <!--Rehabiliation Panel Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['rehabilitationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-reh" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Rehabilitation: </a> </h4>

                    </div>

                    <div id="accordionTeal-reh" <?php if(@$_REQUEST['rehabilitationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editrehabilitation']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Rehab Name</th>

                                      <th>Rehab Date</th>

                                      <th>Description</th>

                                      <th>outcome</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewrehabilitation = mysql_fetch_array($resqueryrehabilitation)) {

								  ?>

                                    <tr>
									  
                                      <td><?=$viewrehabilitation['rehab_name'];?></td>
                                      
                                      <td><?=date('d-m-Y',strtotime($viewrehabilitation['rehab_date']));?></td>

                                      <td><?=$viewrehabilitation['description'];?></td>

                                      <td><?=$viewrehabilitation['outcome'];?></td>
                                      <td><?php if($viewrehabilitation['status'] ==1){echo"Public";} else if($viewrehabilitation['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewrehabilitation['ind_id']?>&id=<?=$viewrehabilitation['id']?>&editrehabilitation=awards&accr=1&rehabilitationpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewrehabilitation['ind_id']?>&id=<?=$viewrehabilitation['id']?>&delrehabilitation=val&rehabilitationpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="rehabilitationform" id="rehabilitationform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="rehabilitationpanel" value="1" />

                            <input type="hidden" name="rehabilitationdid" value="<?=$viewrehabilitation['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             <dl class="dl-horizontal">

                                <dt class="p-t-10">Rehab Name*</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewrehabilitation['rehab_name']?>" id="rehab_namereh" name="rehab_name" data-toggle="dropdown" placeholder="Rehab Name">

                                  </div>
<span id="rehabilitation_error3" style="color:#ff0000;">&nbsp;</span>
                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Rehab Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="<?php echo $viewrehabilitation['rehab_date']?>" id="rehab_date" name="rehab_date" placeholder="Rehab Date">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea name="description" id="description" rows="5" cols="10" class="form-control"><?php echo $viewrehabilitation['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Outcome</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewrehabilitation['outcome']?>" id="outcome" name="outcome" data-toggle="dropdown" placeholder="Outcome">

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

                            <?php } ?>

                            <form name="rehabilitationform" id="rehabilitationform" onsubmit="return Submitrehabilitation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="rehabilitationpanel" value="1" />

                            <div class="pmbb-edit">


                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Rehab Name*</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewrehabilitation['rehab_name']?>" id="rehab_namereh" name="rehab_name" data-toggle="dropdown" placeholder="Rehab Name">

                                  </div>
<span id="rehabilitation_error3" style="color:#ff0000;">&nbsp;</span>
                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Rehab Date</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="<?php echo $viewrehabilitation['rehab_date']?>" id="rehab_date" name="rehab_date" placeholder="Rehab Date">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea name="description" id="description" rows="5" cols="10" class="form-control"><?php echo $viewrehabilitation['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Outcome</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewrehabilitation['outcome']?>" id="outcome" name="outcome" data-toggle="dropdown" placeholder="Outcome">

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

                            <script>

                            function Submitrehabilitation(){

								if($("#rehab_namereh").val() == "" ){

									$("#rehab_namereh").focus();

									$("#rehabilitation_error3").html("Please Enter Rehab Name");

									return false;

                            	}else{

									$("#rehabilitation_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                   <!--Rehabiliation Panel Ends-->
                  
                   <!--Drug Panel Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['drugspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="drugspanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-two" aria-expanded="false"> Add Athletics/Sports/Activities: <?=$drugspanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-two" <?php if(@$_REQUEST['drugspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['edit']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  	while($viewdrigsfetch = mysql_fetch_array($resquery2)) {

								  ?>

                                    <tr>

                                      <td><?=$viewdrigsfetch['drug_name']?></td>

                                      <td><?php if($viewdrigsfetch['drug_date']!='') { ?><?=date("jS M Y", strtotime($viewdrigsfetch['drug_date']))?><?php } ?></td>

                                      <td><?=$viewdrigsfetch['outcome']?></td>

                                      <td><?=stripslashes($viewdrigsfetch['reason'])?></td>
                                      <td><?php if($viewdrigsfetch['status'] ==1){echo"Public";} else if($viewdrigsfetch['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                       <td><a href="student.php?ind_id=<?=$viewdrigsfetch['ind_id']?>&id=<?=$viewdrigsfetch['id']?>&edit=drugs&accr=1&drugspanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewdrigsfetch['ind_id']?>&id=<?=$viewdrigsfetch['id']?>&del=val&drugspanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                              

                               

                              <!--<dl class="dl-horizontal">

                                <dt>Date</dt>

                                <dd>May 21, 1992</dd>

                              </dl>                            

                              <dl class="dl-horizontal">

                                <dt>Outcome</dt>

                                <dd>..............</dd>

                              </dl>

                              

                              

                              <dl class="dl-horizontal">

                                <dt>Description</dt>

                                <dd>The reason this works is because CI is nice enough to............</dd>

                              </dl>-->

                            </div>

                            <?php } else { ?>

                            <form name="drugform" id="drugform" onsubmit="return check2();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="drugspanel" value="1" />

                            <input type="hidden" name="drugsid" value="<?=$viewdrugs['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="drug_name" name="drug_name" value="<?=$viewdrugs['drug_name']?>" placeholder="...........">

                                  </div>

                                   <span id="con_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" id="drug_date" name="drug_date" value="<?=date("d/m/Y", strtotime($viewdrugs['drug_date']))?>" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Outcome</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="outcome" name="outcome" value="<?=$viewdrugs['outcome']?>" placeholder="...........">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea  class="form-control" id="reason" name="reason" placeholder="..........."><?=stripslashes($viewdrugs['reason'])?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewdrugs['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewdrugs['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewdrugs['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>



                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" value="drugsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="drugform" id="drugform" onsubmit="return check2();"   enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="drugspanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="drug_name" name="drug_name" value="<?=$viewdrigsfetch['drug_name']?>" placeholder="...........">

                                  </div>

                                   <span id="con_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" id="drug_date" name="drug_date" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Outcome</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="outcome" name="outcome" placeholder="...........">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea  class="form-control" id="reason" name="reason" placeholder="..........."></textarea>

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

                                <button class="btn btn-primary btn-sm" name="submit" value="drugsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                   <!--Drug Panel Ends-->

                  

                   

                   

                   

                   

                   <!--Institute Panel Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['institutepanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-five" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Institute: </a> </h4>

                    </div>

                    <div id="accordionTeal-five" <?php if(@$_REQUEST['institutepanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editinstitute']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Institute Name</th>

                                      <th>Bulletin</th>

                                      <th>Instructor</th>

                                      <th>Address</th>

                                      <th>Tel No</th>

                                      <th>Email</th>

                                      <th>SMS No</th>

                                      <th>Website</th>

                                      <th>School</th>

                                      <th>Portal</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  	while($viewinstitute = mysql_fetch_array($resquery5)) {

								  ?>

                                    <tr>

                                      <td><?=$viewinstitute['institute_name']?></td>

                                      <td><?=$viewinstitute['school_bulletin']?></td>

                                      <td><?=$viewinstitute['instructor']?></td>

                                      <td><?=$viewinstitute['address']?></td>

                                      <td><?=$viewinstitute['tel_no']?></td>

                                      <td><?=$viewinstitute['email']?></td>

                                      <td><?=$viewinstitute['sms_no']?></td>

                                      <td><?=$viewinstitute['website']?></td>

                                      <td><?=$viewinstitute['schools']?></td>

                                      <td><?=$viewinstitute['portal']?></td>
                                      <td><?php if($viewinstitute['status'] ==1){echo"Public";} else if($viewinstitute['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewinstitute['ind_id']?>&id=<?=$viewinstitute['id']?>&editinstitute=awards&accr=1&institutepanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewinstitute['ind_id']?>&id=<?=$viewinstitute['id']?>&delinstitute=val&institutepanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="instituteform" id="instituteform" onsubmit="return check5();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="institutepanel" value="1" />

                            <input type="text" name="institutedid" value="<?=$viewinstitute['id']?>" />

                            	<div class="pmbb-edit" style="display:block;">

                            

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Institute Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="institute_name" name="institute_name" value="<?=$viewinstitute['institute_name']?>" placeholder="...........">

                                  </div>

                                   <span id="con_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">School Bulletin</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" id="school_bulletin" name="school_bulletin" value="<?php echo $viewinstitute['school_bulletin']?>" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Instructor</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="instructor" name="instructor" value="<?php echo $viewinstitute['instructor']?>" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea  class="form-control" id="description" name="description" placeholder="..........."><?=stripslashes($viewinstitute['description'])?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Address</dt>

                                <dd>

                                  <div class="fg-line">

                                    

                                    <input type="text" name="address"  class="form-control" id="address" value="<?=stripslashes($viewinstitute['address'])?>" name="tel_no" placeholder="Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Tel No</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="tel_no" value="<?=stripslashes($viewinstitute['tel_no'])?>" name="tel_no" placeholder="Telephone No">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="email" value="<?=stripslashes($viewinstitute['email'])?>" name="email" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">SMS NO</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="sms_no" value="<?=stripslashes($viewinstitute['sms_no'])?>" name="sms_no" placeholder="SMS NO">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">IP Address</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="ip_address" value="<?=stripslashes($viewinstitute['ip_address'])?>" name="ip_address" placeholder="IP Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Website</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="website" value="<?=stripslashes($viewinstitute['website'])?>" name="website" placeholder="Website">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Domain Name</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="domain_name" value="<?=stripslashes($viewinstitute['domain_name'])?>" name="domain_name" placeholder="Domain Name">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Url</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="url" value="<?=stripslashes($viewinstitute['url'])?>" name="url" placeholder="url">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Learning Portal</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="learning_portal" value="<?=stripslashes($viewinstitute['learning_portal'])?>" name="learning_portal" placeholder="Learning Portal">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Schools</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="schools" value="<?=stripslashes($viewinstitute['schools'])?>" name="schools" placeholder="Schools">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewinstitute['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewinstitute['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewinstitute['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="institutesubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="instituteform" id="instituteform" onsubmit="return Submitinst();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="institutepanel" value="1" />

                            	<div class="pmbb-edit">

                            

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Institute Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="institute_name" name="institute_name" value="" placeholder="...........">

                                  </div>

                                   <span id="inst_error3" style="color:#F00;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">School Bulletin</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" id="school_bulletin" name="school_bulletin" value="" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Instructor</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" id="instructor" name="instructor" value="" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea  class="form-control" id="description" name="description" placeholder="..........."></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Address</dt>

                                <dd>

                                  <div class="fg-line">

                                    

                                    <input type="text" name="address"  class="form-control" id="address" value="" name="tel_no" placeholder="Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Tel No</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="tel_no" value="" name="tel_no" placeholder="Telephone No">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="email" value="" name="email" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">SMS NO</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="sms_no" value="" name="sms_no" placeholder="SMS NO">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">IP Address</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="ip_address" value="" name="ip_address" placeholder="IP Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Website</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="website" value="" name="website" placeholder="Website">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Domain Name</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="domain_name" value="" name="domain_name" placeholder="Domain Name">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Url</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="url" value="" name="url" placeholder="url">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Learning Portal</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="learning_portal" value="" name="learning_portal" placeholder="Learning Portal">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Schools</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text"  class="form-control" id="schools" value="" name="schools" placeholder="Schools">

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="institutesubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            

							<script>

                            function Submitinst(){

								if($("#institute_name").val() == "" ){

									$("#institute_name").focus();

									$("#inst_error3").html("Please Enter Institute Name");

									return false;

                            	}else{

									$("#inst_error3").html("Please Enter Institute Name");

								}

                            }

                            

                            </script>

							<style>

                           /* #con_error3{

                             color:#F00;

                             }*/

                            </style>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                   <!--Institute Panel Ends-->

                  

                   

                   

                    

                    <!--Extra Starts-->

                  	
						<div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['extrapanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="extrapanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-nine" aria-expanded="false"> Add Extracurricullam: <?=$extrapanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-nine" <?php if(@$_REQUEST['extrapanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editextra']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  	while($viewextra = mysql_fetch_array($resqueryextra)) {

								  ?>

                                    <tr>

                                      <td><?=$viewextra['activity_name']?></td>

                                      <td><?=date("jS M Y", strtotime($viewextra['from_date']))?></td>

                                      <td><?=$viewextra['activity_description']?></td>
                                      <td><?php if($viewextra['status'] ==1){echo"Public";} else if($viewextra['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                       <td><a href="student.php?ind_id=<?=$viewextra['ind_id']?>&id=<?=$viewextra['id']?>&editextra=extras&accr=1&extrapanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewextra['ind_id']?>&id=<?=$viewextra['id']?>&delextra=val&extrapanel=1" style="color:#ff0000;">Delete</a> </td>

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

                                   <span id="extra_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

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

                                    <input type="text" class="form-control" id="activity_description" name="activity_description" placeholder=""  value="<?=$viewextra['activity_description']?>">

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

                            <form name="extraform" id="extraform" onsubmit="return extraaa();"  enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="extrapanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Activity Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="activity_name" name="activity_name">

                                  </div>

                                   <span id="extra_error" style="color:#ff0000;">&nbsp;</span>

                                </dd>

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

                                    <input type="text" class="form-control" id="activity_description" name="activity_description" placeholder="Description" >

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
                  
                  <!-- Extra ends-->
                 

                   <!-- Academic Transcript -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['academictranscriptpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-12" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Academic Transcript: </a> </h4>

                    </div>

                    <div id="accordionTeal-12" <?php if(@$_REQUEST['academictranscriptpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editacademictranscript']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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

                                      <th>Phone</th>

                                      <th>Email</th>

                                      <th>Ip Address</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                      <!--<th>Website</th>

                                      <th>Domain Name</th>

                                      <th>URL</th>

                                      <th>Learning Portal</th>

                                      <th>Academic Program</th>

                                      <th>Course</th>

                                      <th>Curriculum</th>

                                      <th>Syllabus</th>-->

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewacademictranscript = mysql_fetch_array($resquery12)) {

								  ?>

                                    <tr>

                                      <td><?=$viewacademictranscript['grades'];?></td>

                                      <td><?=$viewacademictranscript['notes'];?></td>

                                      <td><?=$viewacademictranscript['comments'];?></td>

                                      <td><?=$viewacademictranscript['messages'];?></td>

                                      <td><?=$viewacademictranscript['phone'];?></td>

                                      <td><?=$viewacademictranscript['email'];?></td>

                                      <td><?=$viewacademictranscript['ipaddress'];?></td>
                                      <td><?php if($viewacademictranscript['status'] ==1){echo"Public";} else if($viewacademictranscript['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <!--<td><?=$viewacademictranscript['website'];?></td>

                                      <td><?=$viewacademictranscript['domain_name'];?></td>

                                      <td><?=$viewacademictranscript['url'];?></td>

                                      <td><?=$viewacademictranscript['learning_portal'];?></td>

                                      <td><?=$viewacademictranscript['academic_program'];?></td>

                                      <td><?=$viewacademictranscript['course'];?></td>

                                      <td><?=$viewacademictranscript['curriculum'];?></td>

                                      <td><?=$viewacademictranscript['syllabus'];?></td>-->

                                      <td><a href="student.php?ind_id=<?=$viewacademictranscript['ind_id']?>&id=<?=$viewacademictranscript['id']?>&editacademictranscript=awards&accr=1&academictranscriptpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewacademictranscript['ind_id']?>&id=<?=$viewacademictranscript['id']?>&delacademictranscript=val&academictranscriptpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="academictranscriptform" id="academictranscriptform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="academictranscriptpanel" value="1" />

                            <input type="hidden" name="academictranscriptdid" value="<?=$viewacademictranscript['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewacademictranscript['grades']?>" id="grades" name="grades" placeholder="Grades">

                                  </div>

                                   <span id="academictranscript_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Notes</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewacademictranscript['notes']?>" id="notes" name="notes" placeholder="Notes">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewacademictranscript['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Messages</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewacademictranscript['messages']?>" id="messages" name="messages" data-toggle="dropdown" placeholder="Messages">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Phone</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewacademictranscript['phone']?>" id="phone" name="phone" data-toggle="dropdown" placeholder="Phone">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="email" class="form-control " value="<?php echo $viewacademictranscript['email']?>" id="email" name="email" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Ip Address</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewacademictranscript['ipaddress']?>" id="ipaddress" name="ipaddress" placeholder="Ip Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Website</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewacademictranscript['website']?>" id="website" name="website" data-toggle="dropdown" placeholder="Website">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Domain Name</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewacademictranscript['domain_name']?>" id="domain_name" name="domain_name" data-toggle="dropdown" placeholder="Domain Name">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">URL</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewacademictranscript['url']?>" id="url" name="url" data-toggle="dropdown" placeholder="URL">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Learning Portal</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewacademictranscript['learning_portal']?>" id="learning_portal" name="learning_portal" placeholder="Learning Portal">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Academic Program</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="<?php echo $viewacademictranscript['academic_program']?>" id="academic_program" name="academic_program" placeholder="Academic Program">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $viewacademictranscript['course']?>" id="course" name="course" data-toggle="dropdown" placeholder="Course">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Curriculum</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewacademictranscript['curriculum']?>" id="curriculum" name="curriculum" data-toggle="dropdown" placeholder="Curriculum">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Syllabus</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewacademictranscript['syllabus']?>" id="syllabus" name="syllabus" data-toggle="dropdown" placeholder="Syllabus">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewacademictranscript['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewacademictranscript['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewacademictranscript['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="academictranscriptsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="academictranscriptform" id="academictranscriptform"  enctype="multipart/form-data" onsubmit="return Submitacademictranscript();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="academictranscriptpanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="grades" name="grades" placeholder="Grades">

                                  </div>

                                   <span id="academictranscript_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Notes</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="" id="notes" name="notes" placeholder="Notes">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Messages</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="messages" name="messages" data-toggle="dropdown" placeholder="Messages">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Phone</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="" id="phone" name="phone" data-toggle="dropdown" placeholder="Phone">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="email" class="form-control " value="" id="email" name="email" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Ip Address</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="" id="ipaddress" name="ipaddress" placeholder="Ip Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Website</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="website" name="website" data-toggle="dropdown" placeholder="Website">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Domain Name</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

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

                                <dt class="p-t-10">Learning Portal</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="learning_portal" name="learning_portal" placeholder="Learning Portal">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Academic Program</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="" id="academic_program" name="academic_program" placeholder="Academic Program">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="course" name="course" data-toggle="dropdown" placeholder="Course">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Curriculum</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="curriculum" name="curriculum" data-toggle="dropdown" placeholder="Curriculum">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Syllabus</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="" id="syllabus" name="syllabus" data-toggle="dropdown" placeholder="Syllabus">

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="academictranscriptsubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitacademictranscript(){

								if($("#grades").val() == "" ){

									$("#grades").focus();

									$("#academictranscript_error3").html("Please Enter Grade");

									return false;

                            	}else{

									$("#academictranscript_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  

                  <!-- Academic Transcript -->

                  <!-- Educational Record -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['educationalrecordspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-13" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Educational Record: </a> </h4>

                    </div>

                    <div id="accordionTeal-13" <?php if(@$_REQUEST['educationalrecordspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editeducationalrecords']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

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

                                      <th>Phone</th>

                                      <th>Email</th>

                                      <th>Ip Address</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                      <!--<th>Website</th>

                                      <th>Domain Name</th>

                                      <th>URL</th>

                                      <th>Learning Portal</th>

                                      <th>Academic Program</th>

                                      <th>Course</th>

                                      <th>Curriculum</th>

                                      <th>Syllabus</th>-->

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($vieweducationalrecords = mysql_fetch_array($resquery13)) {

								  ?>

                                    <tr>

                                      <td><?=$vieweducationalrecords['grades'];?></td>

                                      <td><?=$vieweducationalrecords['notes'];?></td>

                                      <td><?=$vieweducationalrecords['comments'];?></td>

                                      <td><?=$vieweducationalrecords['messages'];?></td>

                                      <td><?=$vieweducationalrecords['phone'];?></td>

                                      <td><?=$vieweducationalrecords['email'];?></td>

                                      <td><?=$vieweducationalrecords['ipaddress'];?></td>
                                      <td><?php if($vieweducationalrecords['status'] ==1){echo"Public";} else if($vieweducationalrecords['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <!--<td><?=$vieweducationalrecords['website'];?></td>

                                      <td><?=$vieweducationalrecords['domain_name'];?></td>

                                      <td><?=$vieweducationalrecords['url'];?></td>

                                      <td><?=$vieweducationalrecords['learning_portal'];?></td>

                                      <td><?=$vieweducationalrecords['academic_program'];?></td>

                                      <td><?=$vieweducationalrecords['course'];?></td>

                                      <td><?=$vieweducationalrecords['curriculum'];?></td>

                                      <td><?=$vieweducationalrecords['syllabus'];?></td>-->

                                      <td><a href="student.php?ind_id=<?=$vieweducationalrecords['ind_id']?>&id=<?=$vieweducationalrecords['id']?>&editeducationalrecords=awards&accr=1&educationalrecordspanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$vieweducationalrecords['ind_id']?>&id=<?=$vieweducationalrecords['id']?>&deleducationalrecords=val&educationalrecordspanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="educationalrecordsform" id="educationalrecordsform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="educationalrecordspanel" value="1" />

                            <input type="hidden" name="educationalrecordsdid" value="<?=$vieweducationalrecords['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $vieweducationalrecords['grades']?>" id="grades" name="grades" placeholder="Grades">

                                  </div>

                                   <span id="educationalrecords_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Notes</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="<?php echo $vieweducationalrecords['notes']?>" id="notes" name="notes" placeholder="Notes">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $vieweducationalrecords['comments']?>" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Messages</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $vieweducationalrecords['messages']?>" id="messages" name="messages" data-toggle="dropdown" placeholder="Messages">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Phone</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $vieweducationalrecords['phone']?>" id="phone" name="phone" data-toggle="dropdown" placeholder="Phone">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="email" class="form-control " value="<?php echo $vieweducationalrecords['email']?>" id="email" name="email" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Ip Address</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="<?php echo $vieweducationalrecords['ipaddress']?>" id="ipaddress" name="ipaddress" placeholder="Ip Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Website</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $vieweducationalrecords['website']?>" id="website" name="website" data-toggle="dropdown" placeholder="Website">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Domain Name</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $vieweducationalrecords['domain_name']?>" id="domain_name" name="domain_name" data-toggle="dropdown" placeholder="Domain Name">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">URL</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $vieweducationalrecords['url']?>" id="url" name="url" data-toggle="dropdown" placeholder="URL">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Learning Portal</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="<?php echo $vieweducationalrecords['learning_portal']?>" id="learning_portal" name="learning_portal" placeholder="Learning Portal">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Academic Program</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="<?php echo $vieweducationalrecords['academic_program']?>" id="academic_program" name="academic_program" placeholder="Academic Program">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="<?php echo $vieweducationalrecords['course']?>" id="course" name="course" data-toggle="dropdown" placeholder="Course">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Curriculum</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $vieweducationalrecords['curriculum']?>" id="curriculum" name="curriculum" data-toggle="dropdown" placeholder="Curriculum">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Syllabus</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="<?php echo $vieweducationalrecords['syllabus']?>" id="syllabus" name="syllabus" data-toggle="dropdown" placeholder="Syllabus">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($vieweducationalrecords['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($vieweducationalrecords['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($vieweducationalrecords['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="educationalrecordssubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="educationalrecordsform" id="educationalrecordsform"  enctype="multipart/form-data" onsubmit="return Submiteducationalrecords31();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="educationalrecordspanel" value="1" />

                            <div class="pmbb-edit">

                            

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="grades1" name="grades" placeholder="Grades">

                                  </div>

                                   <span id="educationalrecords_error31" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Notes</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="" id="notes" name="notes" placeholder="Notes">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="comments" name="comments" data-toggle="dropdown" placeholder="Comments">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Messages</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="messages" name="messages" data-toggle="dropdown" placeholder="Messages">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Phone</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="" id="phone" name="phone" data-toggle="dropdown" placeholder="Phone">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Email</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="email" class="form-control " value="" id="email" name="email" placeholder="Email">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Ip Address</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="" id="ipaddress" name="ipaddress" placeholder="Ip Address">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Website</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="website" name="website" data-toggle="dropdown" placeholder="Website">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Domain Name</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

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

                                <dt class="p-t-10">Learning Portal</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control " value="" id="learning_portal" name="learning_portal" placeholder="Learning Portal">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Academic Program</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type="text" class="form-control " value="" id="academic_program" name="academic_program" placeholder="Academic Program">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control " value="" id="course" name="course" data-toggle="dropdown" placeholder="Course">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Curriculum</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="curriculum" name="curriculum" data-toggle="dropdown" placeholder="Curriculum">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Syllabus</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type='text' class="form-control" value="" id="syllabus" name="syllabus" data-toggle="dropdown" placeholder="Syllabus">

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="educationalrecordssubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submiteducationalrecords31(){

								if($("#grades1").val() == "" ){

									$("#grades1").focus();

									$("#educationalrecords_error31").html("Please Enter Grade");

									return false;

                            	}else{

									$("#educationalrecords_error31").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  

                  <!-- Educational Record -->

                  

                 

                  <!-- Report -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['reportspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-15" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Report: </a> </h4>

                    </div>

                    <div id="accordionTeal-15" <?php if(@$_REQUEST['reportspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editreports']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Report Date</th>

                                      <th>Description</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewreports = mysql_fetch_array($resquery15)) {

								  ?>

                                    <tr>

                                      <td><?=date('d-m-Y',strtotime($viewreports['report_date']));?></td>

                                      <td><?=$viewreports['description'];?></td>
                                      <td><?php if($viewreports['status'] ==1){echo"Public";} else if($viewreports['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewreports['ind_id']?>&id=<?=$viewreports['id']?>&editreports=awards&accr=1&reportspanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewreports['ind_id']?>&id=<?=$viewreports['id']?>&delreports=val&reportspanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="reportsform" id="reportsform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="reportspanel" value="1" />

                            <input type="hidden" name="reportsdid" value="<?=$viewreports['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Report Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="<?php echo $viewreports['report_date']?>" id="report_date" name="report_date" placeholder="Report Date">

                                  </div>

                                   <span id="reports_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea class="form-control" rows="5" cols="10" name="description" id="description"><?php echo $viewreports['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewreports['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewreports['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewreports['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="reportssubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="reportsform" id="reportsform" onsubmit="return Submitreports3();" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="reportspanel" value="1" />

                            <div class="pmbb-edit">

                            

                              

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Report Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="" id="report_date123" name="report_date" placeholder="Report Date">

                                  </div>

                                   <span id="reports_error3123" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                   <textarea class="form-control" rows="5" cols="10" name="description" id="description"></textarea>

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="reportssubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitreports3(){

								if($("#report_date123").val() == "" ){

									$("#report_date123").focus();

									$("#reports_error3123").html("Please Enter Report Date");

									return false;

                            	}else{

									$("#reports_error3123").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  



                  <!-- Report -->

                  <!-- Messages -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['messagespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-16" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Messages: </a> </h4>

                    </div>

                    <div id="accordionTeal-16" <?php if(@$_REQUEST['messagespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editmessages']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Report Date</th>

                                      <th>Description</th>
                                      <th>Status</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewmessages = mysql_fetch_array($resquery16)) {

								  ?>

                                    <tr>

                                      <td><?=date('d-m-Y',strtotime($viewmessages['report_date']));?></td>

                                      <td><?=$viewmessages['description'];?></td>
                                      <td><?php if($viewmessages['status'] ==1){echo"Public";} else if($viewmessages['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewmessages['ind_id']?>&id=<?=$viewmessages['id']?>&editmessages=awards&accr=1&messagespanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewmessages['ind_id']?>&id=<?=$viewmessages['id']?>&delmessages=val&messagespanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="messagesform" id="messagesform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="messagespanel" value="1" />

                            <input type="hidden" name="messagesdid" value="<?=$viewmessages['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Report Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="<?php echo $viewmessages['report_date']?>" id="report_date" name="report_date" placeholder="Report Date">

                                  </div>

                                   <span id="messages_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <textarea class="form-control" rows="5" cols="10" name="description" id="description"><?php echo $viewmessages['description']?></textarea>

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewmessages['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewmessages['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewmessages['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="messagessubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="messagesform" id="messagesform" onsubmit="return Submitmessages3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="messagespanel" value="1" />

                            <div class="pmbb-edit">

                            

                              

                              <dl class="dl-horizontal">



                                <dt class="p-t-10">Report Date*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control date-picker" value="" id="report_date1234" name="report_date" placeholder="Report Date">

                                  </div>

                                   <span id="messages_error31234" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                   <textarea class="form-control" rows="5" cols="10" name="description" id="description"></textarea>

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="messagessubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitmessages3(){

								if($("#report_date1234").val() == "" ){

									$("#report_date1234").focus();

									$("#messages_error31234").html("Please Enter Report Date");

									return false;

                            	}else{

									$("#messages_error31234").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  



                  <!-- Messages -->

                 

                  <!---Personal recomendation  starts--->

                  <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['precomendpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="precomendpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-20" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Personal Recomendation: </a> </h4>

                    </div>

                    <div id="accordionTeal-20" <?php if(@$_REQUEST['precomendpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editprecomend']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Recomendation Name</th>

                                      <th>Recomendation</th>

                                      <th>Recomendation Video</th>

                                      <th>Recomendation Date</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  	while($viewprecomend = mysql_fetch_array($resquery20)) {

								  ?>

                                    <tr>

                                      <td><?=$viewprecomend['per_prov_rec'];?></td>

                                      <td><?=$viewprecomend['recommendation'];?></td>

                                      <td><?=$viewprecomend['recorded_video'];?></td>

                                      <td><?=$viewprecomend['recom_date'];?></td>

                                      <td><a href="student.php?ind_id=<?=$viewprecomend['ind_id']?>&id=<?=$viewprecomend['id']?>&editprecomend=precomends&accr=1&precomendpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewprecomend['ind_id']?>&id=<?=$viewprecomend['id']?>&delprecomend=val&precomendpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="precomendform" id="precomendform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="precomendpanel" value="1" />

                            <input type="hidden" name="precomenddid" value="<?=$viewprecomend1['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                            

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="<?php echo $viewprecomend1['per_prov_rec']?>" id="per_prov_rec" name="per_prov_rec"  placeholder="Reference Name">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recommendation</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="<?php echo $viewprecomend1['recommendation']?>" id="recommendation" name="recommendation"  placeholder="Recommendation">

                                  </div>

                                   

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recorded video</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewprecomend1['recorded_video']?>" id="recorded_video" name="recorded_video" data-toggle="dropdown" placeholder="Recorded Video">

                                  </div>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recomendation Date </dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewprecomend1['recom_date']?>" id="recom_date" name="recom_date" data-toggle="dropdown" placeholder="Recomendation Date">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewprecomend1['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewprecomend1['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewprecomend1['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="precomendsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="precomendform" id="precomendform"   enctype="multipart/form-data" onsubmit="return Submitprecomend();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="precomendpanel" value="1" />

                            <div class="pmbb-edit">

                            

 							  <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="" id="per_prov_rec" name="per_prov_rec"  placeholder="Recomendation Name">

                                    <label id="precomend_error3" style="color:#F00;"></label>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recommendation</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="" id="recommendation" name="recommendation"  placeholder="Recommendation">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recorded video</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="recorded_video" name="recorded_video" data-toggle="dropdown" placeholder="Recorded Video">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Recomendation Date </dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="recom_date" name="recom_date" data-toggle="dropdown" placeholder="Recomendation Date">

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="precomendsubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitprecomend(){

								if($("#per_prov_rec").val() == "" ){

									$("#per_prov_rec").focus();

									$("#precomend_error3").html("Please Enter Personal Recomendation Name");

									return false;

                            	}else{

									$("#precomend_error3").html("");

								}

                            }

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  <!---Personal recomendation  ends--->

                
                  
				<!---Facilities  starts--->
                
                  <div class="panel panel-collapse">		

                    <div <?php if(@$_REQUEST['facilitiespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="facilitiespanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-22" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Facilities: </a> </h4>

                    </div>

                    <div id="accordionTeal-22" <?php if(@$_REQUEST['facilitiespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if(@$_REQUEST['editfacilities']=='') { ?>

                            <div class="pmbb-view">

                              <ul class="actions" style="position:static; float:right;">

                                <li class="dropdown open"> <!--<a href="#" data-toggle="dropdown"> <i class="zmdi zmdi-more-vert"></i> </a>-->&nbsp;

                                  <ul class="dropdown-menu dropdown-menu-right" style="min-width: 62px; padding: 0; margin-top: -41px;">

                                    <li> <a data-pmb-action="edit" href="#">Add Info</a> </li>

                                  </ul>

                                </li>

                              </ul>

                              <dl class="dl-horizontal">

                               <table class="table table-striped table-bordered table-advance table-hover" width="50%">

                                  <thead>

                                    <tr>

                                      <th>Program Enrolled</th>

                                      <th>Attendance Date</th>

                                      <th>Classes Taken</th>

                                      <th>Achievements </th>

                                      <th>Current Schedule</th>

                                      <th>Awards Conferred</th>
                                      <th>Status</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($viewcoach);

								  	while($viewfacilities = mysql_fetch_array($resquery22)) {

								  ?>

                                    <tr>

                                      <td><?=$viewfacilities['prog_enrolled'];?></td>

                                      <td><?=date('d-m-Y',strtotime($viewfacilities['datesofattendence']));?></td>

                                      <td><?=$viewfacilities['classes_taken'];?></td>

                                      <td><?=$viewfacilities['achievements'];?></td>

                                      <td><?=date('d-m-Y',strtotime($viewfacilities['current_schedule']));?></td>

                                      <td><?=$viewfacilities['awards_conferred'];?></td>
                                      <td><?php if($viewfacilities['status'] ==1){echo"Public";} else if($viewfacilities['status'] ==2){ echo"Private";}else{ echo"Friends";}?></td>

                                      <td><a href="student.php?ind_id=<?=$viewfacilities['ind_id']?>&id=<?=$viewfacilities['id']?>&editfacilities=facilitiess&accr=1&facilitiespanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewfacilities['ind_id']?>&id=<?=$viewfacilities['id']?>&delfacilities=val&facilitiespanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="facilitiesform" id="facilitiesform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="facilitiespanel" value="1" />

                            <input type="hidden" name="facilitiesdid" value="<?=$viewfacilities['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Program Enrolled*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="<?php echo $viewfacilities['prog_enrolled']?>" id="prog_enrolled" name="prog_enrolled" value="" placeholder="Program Enrolled">

                                  </div>

                                   <span id="facilities_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Attendance Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewfacilities['datesofattendence']?>" id="datesofattendence" name="datesofattendence" data-toggle="dropdown" placeholder="Date Of Attendance">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Classes Taken </dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewfacilities['classes_taken ']?>" id="classes_taken" name="classes_taken" data-toggle="dropdown" placeholder="Classes Taken">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Achievements</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewfacilities['achievements']?>" id="achievements" name="achievements" data-toggle="dropdown" placeholder="Position">

                                  </div>

                                </dd>

                              </dl>

                              

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Current Schedule </dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewfacilities['current_schedule']?>" id="current_schedule" name="current_schedule" data-toggle="dropdown" placeholder="Current Schedule ">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Awards Conferred</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewfacilities['awards_conferred']?>" id="awards_conferred" name="awards_conferred" data-toggle="dropdown" placeholder="Awards Conferred">

                                  </div>

                                </dd>

                              </dl>
                              <dl class="dl-horizontal">
                <dt class="p-t-10">Status</dt>
                <dd>
                  <div class="fg-line">
                      <select name="status" class="form-control">
                      <option value="1" <?php if($viewfacilities['status']==1){?> selected="selected"<?php }?>>Public</option>
                      <option value="2" <?php if($viewfacilities['status']==2){?> selected="selected"<?php }?>>Private</option>
                      <option value="3" <?php if($viewfacilities['status']==3){?> selected="selected"<?php }?>>Friends</option>
                    </select>
                  </div>
                </dd>
              </dl>

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="facilitiessubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="facilitiesform" id="facilitiesform" onsubmit="return Submitfacilities();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="facilitiespanel" value="1" />

                            <div class="pmbb-edit">

                            

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Program Enrolled*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="" id="prog_enrolled" name="prog_enrolled" value="" placeholder="Program Enrolled">

                                  </div>

                                  

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Attendance Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="datesofattendence" name="datesofattendence" data-toggle="dropdown" placeholder="Date Of Attendance">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Classes Taken </dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="classes_taken" name="classes_taken" data-toggle="dropdown" placeholder="Classes Taken">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Achievements</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="achievements" name="achievements" data-toggle="dropdown" placeholder="Position">

                                  </div>

                                </dd>

                              </dl>

                              

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Current Schedule </dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="current_schedule" name="current_schedule" data-toggle="dropdown" placeholder="Current Schedule ">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Awards Conferred</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="awards_conferred" name="awards_conferred" data-toggle="dropdown" placeholder="Awards Conferred">

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

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="facilitiessubmit">Save</button>



                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submitfacilities(){

								if($("#prog_enrolled").val() == "" ){

									$("#prog_enrolled").focus();

									$("#facilities_error3").html("Please Enter Program Enrolled");

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
                  
				<!---Facilities  ends--->
                
                
                 


				  

                </div>

              </div>

            </div>

        </div>

      </div>

    </div>

  </section>

</section>

<?php include('lib/inner_footer.php')?>
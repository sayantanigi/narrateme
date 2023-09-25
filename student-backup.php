<?php
include('lib/inner_header.php');
sequre();

$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");

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



//Insert Individual Record

	if($_REQUEST['submit']=="indsubmit") {

		

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

	$resquery = mysql_query($studensql) or mysql_error();

	$stunum = mysql_num_rows($resquery);

	

	if($stunum==0) {

		

		$dateofbirth = explode("-",$_REQUEST['dateofbirth']);

		$formatdateofbirth = $dateofbirth[2]."-".$dateofbirth[1]."-".$dateofbirth[0];

								

		$data = array('ind_id'=>$_SESSION["userid"],'dob'=>$formatdateofbirth,'gender'=>$gender,'conference_id'=>$conference_id,'social_seq_no'=>$social_seq_no,'ip_address'=>$ipaddress,'description'=>addslashes($description));

		//print_r($data);

		//exit();

		$result = insertData($data, 'na_st_individual');

		

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?operation=successful';\n";

		echo "</script>";

		

	} else {

		

		$dateofbirth = explode("-",$_REQUEST['dateofbirth']);

		$formatdateofbirth = $dateofbirth[2]."-".$dateofbirth[1]."-".$dateofbirth[0];

		

		$data = array('dob'=>$formatdateofbirth,'gender'=>$gender,'conference_id'=>$conference_id,'social_seq_no'=>$social_seq_no,'ip_address'=>$ipaddress,'description'=>addslashes($description));

	         

		$result = updateData($data,' na_st_individual', " ind_id='" . $_SESSION["userid"] . "' ") ;

		

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?operation=successful';\n";

		echo "</script>";

	}

		

	}

	

	//Show Individula record

	$viewindiv = getAnyTableWhereData('na_st_individual', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$studensql = "SELECT * FROM na_st_individual WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery = mysql_query($studensql) or mysql_error();

	$stunum = mysql_num_rows($resquery);

	

	

	//Insert Drugs Record

	if($_REQUEST['submit']=="drugsubmit") {

		

	extract($_POST);

		

		$drug_date = explode("-",$_REQUEST['drug_date']);

		$formatdrug_date = $drug_date[2]."-".$drug_date[1]."-".$drug_date[0];

		

		if($_REQUEST['drugsid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'drug_date'=>$formatdrug_date,'drug_name'=>$drug_name,'outcome'=>$outcome,'reason'=>addslashes($reason));

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_drug');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&drugspanel=".$drugspanel."&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'drug_date'=>$formatdrug_date,'drug_name'=>$drug_name,'outcome'=>$outcome,'reason'=>addslashes($reason));

			//print_r($data);

			//exit();

	

			$result = updateData($data,' na_st_drug', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['drugsid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&drugspanel=".$drugspanel."&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['del']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_drug WHERE id = '".$_REQUEST['id']."'";

		mysql_query($delsql);

			

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&drugspanel=".$_REQUEST['drugspanel']."&accr=1';\n";

		echo "</script>";

	}

		

	

	//Show Drugs record

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewdrugs = getAnyTableWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	$studensdrugsql = "SELECT * FROM na_st_drug WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery2 = mysql_query($studensdrugsql) or mysql_error();

	$stunum2 = mysql_num_rows($resquery2);

	

	//========================Drug Panel End==========================

	//========================Award Panel Starts======================

	//Insert Drugs Record

	//Insert Drugs Record

	if($_REQUEST['submit']=="awardsubmit") {

		

	extract($_POST);

	

		//$award_date = explode("/",$_REQUEST['award_date']);

		$formataward_date = date('Y-m-d',strtotime($_REQUEST['award_date']));

		

		if($_REQUEST['awardid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'award_date'=>$formataward_date,'award_name'=>$award_name,'award_description'=>addslashes($award_description),'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_award');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&awardpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$award_date = explode("-",$_REQUEST['award_date1']);

		     //$formataward_date = $award_date[2]."-".$award_date[1]."-".$award_date[0];

			  $formataward_date=date('Y-m-d',strtotime($_REQUEST['award_date']));

			

			$data = array('ind_id'=>$_SESSION["userid"],'award_date'=>$formataward_date,'award_name'=>$award_name,'award_description'=>addslashes($award_description));

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_st_award', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['awardid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&awardpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delaward']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_award WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&&awardpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	

	//Show Drugs record

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewawards = getAnyTableWhereData('na_st_award', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	$studensawardssql = "SELECT * FROM na_st_award WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery3 = mysql_query($studensawardssql) or mysql_error();

	$stunum3 = mysql_num_rows($resquery3);



	//========================Award Panel Ends========================

	

	//========================Rehabiliation Panel Starts======================

	//Insert Drugs Record

	//Insert Drugs Record

	if($_REQUEST['submit']=="rehabsubmit") {

		

	extract($_POST);

	//echo $_REQUEST['rehab_name'].">>>>>>";

	

		//$award_date = explode("/",$_REQUEST['award_date']);

		$formatrahab_date = date('Y-m-d',strtotime($_REQUEST['rehab_date']));

		

		if($_REQUEST['rehabdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'rehab_date'=>$formatrahab_date,'rehab_name'=>$rehab_name,'description'=>addslashes($description),'status'=>1,'outcome'=>$outcome);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_rehabilitation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&rehabpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			//$award_date = explode("/",$_REQUEST['award_date1']);

		     //$formataward_date = $award_date[2]."-".$award_date[1]."-".$award_date[0];

			  $formatrahab_date=date('Y-m-d',strtotime($_REQUEST['rehab_date']));

			

			$data = array('ind_id'=>$_SESSION["userid"],'rehab_date'=>$formatrahab_date,'rehab_name'=>$rehab_name,'description'=>addslashes($description),'outcome'=>$outcome);

			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_st_rehabilitation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['rehabdid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&rehabpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delrehab']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_rehabilitation WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&&rehabpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	

	//Show Drugs record

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewrehab = getAnyTableWhereData('na_st_rehabilitation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	$studensrehabsql = "SELECT * FROM na_st_rehabilitation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery4 = mysql_query($studensrehabsql) or mysql_error();

	$stunum4 = mysql_num_rows($resquery4);



	//========================Rehabiliation Panel Ends======================

	

	//========================Institute Panel Starts======================

	//Insert Drugs Record

	//Insert Drugs Record

	if($_REQUEST['submit']=="institutesubmit") {

		

	extract($_POST);

	//echo $_REQUEST['rehab_name'].">>>>>>";

	

		//$award_date = explode("/",$_REQUEST['award_date']);

		

		

		if($_REQUEST['institutedid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'institute_name'=>$institute_name,'description'=>$description,'school_bulletin'=>addslashes($school_bulletin),'instructor'=>$instructor,'address'=>$address,'tel_no'=>$tel_no,'email'=>$email,'sms_no'=>$sms_no,'ip_address'=>$ip_address,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'schools'=>$schools,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_eduinstitute');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&institutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			//$award_date = explode("/",$_REQUEST['award_date1']);

		     //$formataward_date = $award_date[2]."-".$award_date[1]."-".$award_date[0];

			  //$formatrahab_date=date('Y-m-d',strtotime($_REQUEST['rehab_date']));

			

			$data = array('ind_id'=>$_SESSION["userid"],'institute_name'=>$institute_name,'description'=>$description,'school_bulletin'=>addslashes($school_bulletin),'instructor'=>$instructor,'address'=>$address,'tel_no'=>$tel_no,'email'=>$email,'sms_no'=>$sms_no,'ip_address'=>$ip_address,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'schools'=>$schools);



			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_st_eduinstitute', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['institutedid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&institutepanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delinstitute']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_eduinstitute WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&institutepanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	

	//Show Drugs record

	//$viewdrigs = getAlldataWhereData('na_st_drug', " AND ind_id='".$_SESSION["userid"]."' ");

	

	$viewinstitute = getAnyTableWhereData('na_st_eduinstitute', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	$studensinstitutesql = "SELECT * FROM na_st_eduinstitute WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery5 = mysql_query($studensinstitutesql) or mysql_error();

	$stunum5 = mysql_num_rows($resquery5);



	//========================Instituite Panel Ends======================

	

	//========================Teacher Panel Starts======================

	//Insert Drugs Record

	//Insert Drugs Record

	if($_REQUEST['submit']=="teachersubmit") {

		

	extract($_POST);

	//echo $_REQUEST['rehab_name'].">>>>>>";

	

		//$award_date = explode("/",$_REQUEST['award_date']);

		

		

		if($_REQUEST['teacherdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'teacher_name'=>$teacher_name,'information'=>$information,'address'=>addslashes($address),'phone'=>$phone,'email'=>$email,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_teacher');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			//$award_date = explode("/",$_REQUEST['award_date1']);

		     //$formataward_date = $award_date[2]."-".$award_date[1]."-".$award_date[0];

			  //$formatrahab_date=date('Y-m-d',strtotime($_REQUEST['rehab_date']));

			

			$data = array('ind_id'=>$_SESSION["userid"],'teacher_name'=>$teacher_name,'information'=>$information,'address'=>addslashes($address),'phone'=>$phone,'email'=>$email,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus);



			//print_r($data);

			//exit();

	

			$result = updateData($data,'na_st_teacher', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['teacherdid']."' ") ;

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&teacherpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delteacher']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_teacher WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&teacherpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

		

	$viewteacher = getAnyTableWhereData('na_st_teacher', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	$studensteachersql = "SELECT * FROM na_st_teacher WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery6 = mysql_query($studensteachersql) or mysql_error();

	$stunum6 = mysql_num_rows($resquery6);



	//========================Teacher Panel Ends======================

	

	//========================Coach Starts======================

	//Insert Drugs Record

	//Insert Drugs Record

	if($_REQUEST['submit']=="coachsubmit") {

		

		

	extract($_POST);

			

		if($_REQUEST['coachdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'description'=>addslashes($description),'sample'=>$sample,'phone'=>$phone,'email'=>$email,'video'=>$video,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_coach');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&coachpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'coach_name'=>$coach_name,'description'=>addslashes($description),'sample'=>$sample,'phone'=>$phone,'email'=>$email,'video'=>$video);



	

			$result = updateData($data,'na_st_coach', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['coachdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&coachpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delcoach']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_coach WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&coachpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewcoach = getAnyTableWhereData('na_st_coach', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	$studenscoachsql = "SELECT * FROM na_st_coach WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery7 = mysql_query($studenscoachsql) or mysql_error();

	$stunum7 = mysql_num_rows($resquery7);



	//========================Coach Ends================================

	

	//========================Recomendation Starts======================

	//Insert Coach Record

	//Insert Recomend Record

	if($_REQUEST['submit']=="recomendsubmit") {

		

	extract($_POST);

			

		if($_REQUEST['recomenddid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'recomendation_person'=>$recomendation_person,'recomendation'=>addslashes($recomendation),'rec_video_link'=>$rec_video_link,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_recomendation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&recomendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'recomendation_person'=>$recomendation_person,'recomendation'=>addslashes($recomendation),'rec_video_link'=>$rec_video_link);



	//print_r($data);

			//exit();

			$result = updateData($data,'na_st_recomendation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['recomenddid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&recomendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Recomemnd

	if($_REQUEST['delrecomend']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_recomendation WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&recomendpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewrecomend = getAnyTableWhereData('na_st_recomendation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	$studensrecomendsql = "SELECT * FROM na_st_recomendation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery8 = mysql_query($studensrecomendsql) or mysql_error();

	$stunum8 = mysql_num_rows($resquery8);



	//========================Recomendation Ends======================

	

	//========================Extra Starts======================

	//Insert Recomend Record

	//Insert Extra Record

	if($_REQUEST['submit']=="extrasubmit") {

		extract($_POST);

		if($_REQUEST['extradid']=="") {

								

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

			$result = updateData($data,'na_st_extracurricullam', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['extradid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&extrapanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delextra']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_extracurricullam WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&extrapanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewextra = getAnyTableWhereData('na_st_extracurricullam', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	 $studensextrasql = "SELECT * FROM na_st_extracurricullam WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery9 = mysql_query($studensextrasql) or mysql_error();

	$stunum9 = mysql_num_rows($resquery9);



	//========================Extra Ends======================

	

	//========================Job Starts======================

	//Insert Recomend Record

	//Insert job Record

	if($_REQUEST['submit']=="jobsubmit") {

		extract($_POST);

		if($_REQUEST['jobdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'employer_name'=>$employer_name,'from_date'=>date('Y-m-d',strtotime($from_date)),'to_date'=>date('Y-m-d',strtotime($to_date)),'position'=>$position,'job_description'=>$job_description,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_student_experience');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&jobpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'employer_name'=>$employer_name,'from_date'=>date('Y-m-d',strtotime($from_date)),'to_date'=>date('Y-m-d',strtotime($to_date)),'position'=>$position,'job_description'=>$job_description);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_student_experience', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['jobdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&jobpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['deljob']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_student_experience WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&jobpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewjob = getAnyTableWhereData('na_student_experience', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	 $studensjobsql = "SELECT * FROM na_student_experience WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery10 = mysql_query($studensjobsql) or mysql_error();

	$stunum10 = mysql_num_rows($resquery10);



	//========================Job Ends======================

	

	//=================Video Presentation Starts=====================

	

	//========================videopresentation Starts======================

	//Insert Recomend Record

	//Insert videopresentation Record

	if($_REQUEST['submit']=="videopresentationsubmit") {

		extract($_POST);

		if($_REQUEST['videopresentationdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'video_date'=>date('Y-m-d',strtotime($video_date)),'description'=>$description,'description'=>$description,'link_rec_video'=>$link_rec_video,'ip_live_cam'=>$ip_live_cam,'comments'=>$comments,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_video_presentation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&videopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'video_date'=>date('Y-m-d',strtotime($video_date)),'description'=>$description,'description'=>$description,'link_rec_video'=>$link_rec_video,'ip_live_cam'=>$ip_live_cam,'comments'=>$comments);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_video_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['videopresentationdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&videopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delvideopresentation']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_video_presentation WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&videopresentationpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewvideopresentation = getAnyTableWhereData('na_st_video_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	 $studensvideopresentationsql = "SELECT * FROM na_st_video_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery11 = mysql_query($studensvideopresentationsql) or mysql_error();

	$stunum11 = mysql_num_rows($resquery11);



	//========================videopresentation Ends======================

	

	//===================Video Presentation Ends=======================

	

	

	//========================academictranscript Starts======================

	//Insert Recomend Record

	//Insert academictranscript Record

	if($_REQUEST['submit']=="academictranscriptsubmit") {

		extract($_POST);

		if($_REQUEST['academictranscriptdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'phone'=>$phone,'email'=>$email,'ipaddress'=>$ipaddress,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus,'status'=>1);

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

			$result = updateData($data,'na_st_academic_transcript', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['academictranscriptdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&academictranscriptpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delacademictranscript']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_academic_transcript WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&academictranscriptpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewacademictranscript = getAnyTableWhereData('na_st_academic_transcript', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	 $studensacademictranscriptsql = "SELECT * FROM na_st_academic_transcript WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery12 = mysql_query($studensacademictranscriptsql) or mysql_error();

	$stunum12 = mysql_num_rows($resquery12);



	//========================academictranscript Ends======================

	

	//========================educationalrecords Starts======================

	//Insert Recomend Record

	//Insert educationalrecords Record

	if($_REQUEST['submit']=="educationalrecordssubmit") {

		extract($_POST);

		if($_REQUEST['educationalrecordsdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'phone'=>$phone,'email'=>$email,'ipaddress'=>$ipaddress,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_educational_records');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&educationalrecordspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'grades'=>$grades,'notes'=>$notes,'comments'=>$comments,'messages'=>$messages,'phone'=>$phone,'email'=>$email,'ipaddress'=>$ipaddress,'website'=>$website,'domain_name'=>$domain_name,'url'=>$url,'learning_portal'=>$learning_portal,'academic_program'=>$academic_program,'course'=>$course,'curriculum'=>$curriculum,'syllabus'=>$syllabus);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_educational_records', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['educationalrecordsdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&educationalrecordspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['deleducationalrecords']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_educational_records WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&educationalrecordspanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$vieweducationalrecords = getAnyTableWhereData('na_st_educational_records', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	 $studenseducationalrecordssql = "SELECT * FROM na_st_educational_records WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery13 = mysql_query($studenseducationalrecordssql) or mysql_error();

	$stunum13 = mysql_num_rows($resquery13);



	//========================educationalrecords Ends======================

	

	

	//========================issuerofreport Starts======================

	//Insert Recomend Record

	//Insert issuerofreport Record

	if($_REQUEST['submit']=="issuerofreportsubmit") {

		extract($_POST);

		if($_REQUEST['issuerofreportdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'tel_no'=>$tel_no,'website'=>$website,'url'=>$url,'description'=>$description,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_issuer_of_report');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&issuerofreportpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'tel_no'=>$tel_no,'website'=>$website,'url'=>$url,'description'=>$description);



			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_issuer_of_report', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['issuerofreportdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&issuerofreportpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delissuerofreport']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_issuer_of_report WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&issuerofreportpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewissuerofreport = getAnyTableWhereData('na_st_issuer_of_report', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	 $studensissuerofreportsql = "SELECT * FROM na_st_issuer_of_report WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery14 = mysql_query($studensissuerofreportsql) or mysql_error();

	$stunum14 = mysql_num_rows($resquery14);



	//========================issuerofreport Ends======================

	

	//========================reports Starts======================

	//Insert Recomend Record

	//Insert reports Record

	if($_REQUEST['submit']=="reportssubmit") {

		extract($_POST);

		if($_REQUEST['reportsdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>date('Y-m-d',strtotime($report_date)),'description'=>$description,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_reports');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&reportspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>date('Y-m-d',strtotime($report_date)),'description'=>$description);

			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_reports', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['reportsdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&reportspanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delreports']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_reports WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&reportspanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewreports = getAnyTableWhereData('na_st_reports', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	 $studensreportssql = "SELECT * FROM na_st_reports WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery15 = mysql_query($studensreportssql) or mysql_error();

	$stunum15 = mysql_num_rows($resquery15);



	//========================reports Ends======================

	

	

	//========================messages Starts======================

	//Insert Recomend Record

	//Insert messages Record

	if($_REQUEST['submit']=="messagessubmit") {

		extract($_POST);

		if($_REQUEST['messagesdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>date('Y-m-d',strtotime($report_date)),'description'=>$description,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_st_messages');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&messagespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'report_date'=>date('Y-m-d',strtotime($report_date)),'description'=>$description);

			//print_r($data);

			//exit();

			$result = updateData($data,'na_st_messages', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['messagesdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&messagespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delmessages']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_messages WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&messagespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewmessages = getAnyTableWhereData('na_st_messages', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	 $studensmessagessql = "SELECT * FROM na_st_messages WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery16 = mysql_query($studensmessagessql) or mysql_error();

	$stunum16 = mysql_num_rows($resquery16);



	//========================messages Ends======================

	

	

	//========================audiopresentation Starts======================

	//Insert Recomend Record

	//Insert audiopresentation Record

	if($_REQUEST['submit']=="audiopresentationsubmit") {

		extract($_POST);

		if($_REQUEST['audiopresentationdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'audio_date'=>date('Y-m-d',strtotime($audio_date)),'description'=>$description,'link_rec_audio'=>$link_rec_audio,'ip_live_cam'=>$ip_live_cam,'comments'=>$comments,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_audio_sturec_presentation');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&audiopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'audio_date'=>date('Y-m-d',strtotime($audio_date)),'description'=>$description,'link_rec_audio'=>$link_rec_audio,'ip_live_cam'=>$ip_live_cam,'comments'=>$comments);

			//print_r($data);

			//exit();

			$result = updateData($data,'na_audio_sturec_presentation', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['audiopresentationdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&audiopresentationpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delaudiopresentation']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_audio_sturec_presentation WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&audiopresentationpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewaudiopresentation = getAnyTableWhereData('na_audio_sturec_presentation', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	

	 $studensaudiopresentationsql = "SELECT * FROM na_audio_sturec_presentation WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery17 = mysql_query($studensaudiopresentationsql) or mysql_error();

	$stunum17 = mysql_num_rows($resquery17);



	//========================audiopresentation Ends======================

	

	//========================seminar Starts======================

	//Insert Recomend Record

	//Insert seminar Record

	if($_REQUEST['submit']=="seminarsubmit") {

		extract($_POST);

		if($_REQUEST['seminardid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'name'=>$name,'semi_schedule'=>date('Y-m-d',strtotime($semi_schedule)),'entry_date'=>date('Y-m-d',strtotime($entry_date)),'Description'=>$Description,'status'=>1);

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

			$result = updateData($data,'na_st_seminar_attend', " ind_id='" . $_SESSION["userid"] . "' AND semi_id = '".$_REQUEST['seminardid']."' ") ;

			if($result){

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&seminarpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

			}

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delseminar']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_seminar_attend WHERE semi_id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&seminarpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewseminar = getAnyTableWhereData('na_st_seminar_attend', " AND ind_id='".$_SESSION["userid"]."' AND semi_id = '".$_REQUEST['id']."' ");

	

	 $studensseminarsql = "SELECT * FROM na_st_seminar_attend WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery24 = mysql_query($studensseminarsql) or mysql_error();

	$stunum24 = mysql_num_rows($resquery24);



	//========================seminar Ends======================

	

	//========================Institute Attended================

	//========================eduattend Starts======================

	//Insert Recomend Record

	//Insert eduattend Record

	if($_REQUEST['submit']=="eduattendedsubmit") {

		extract($_POST);

		//echo $_REQUEST['eduattendeddid']=="";

		//exit();

		if($_REQUEST['editeduattended']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'program_enroll'=>$program_enroll,'attend_date'=>date('Y-m-d',strtotime($attend_date)),'course_taken'=>$course_taken,'Grades'=>$Grades,'course_enrolled'=>course_enrolled,'status'=>1);

			//print_r($data).">>>>";

			//echo "======ppppppppp===";

			//exit();

	

			$result = insertData($data, 'na_st_eduinstitute_attended');

			

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&eduattendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'program_enroll'=>$program_enroll,'attend_date'=>date('Y-m-d',strtotime($attend_date)),'course_taken'=>$course_taken,'Grades'=>$Grades,'course_enrolled'=>course_enrolled);

			print_r($data);

			echo "===========";

			exit();

			$result = updateData($data,'na_st_eduinstitute_attended', " ind_id='" . $_SESSION["userid"] . "' AND st_id = '".$_REQUEST['eduattenddid']."' ") ;

			if($result){

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&eduattendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

			}

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['deleduattend']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from na_st_eduinstitute_attended WHERE semi_id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&eduattendpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$vieweduattend = getAnyTableWhereData('na_st_eduinstitute_attended', " AND ind_id='".$_SESSION["userid"]."' AND st_id = '".$_REQUEST['id']."' ");

	//print_r($vieweduattend);

	

	$studenseduattendsql = "SELECT * FROM na_st_eduinstitute_attended WHERE ind_id = '".$_SESSION["userid"]."'";

	//exit();

	$resquery23 = mysql_query($studenseduattendsql) or mysql_error();

	$stunum23 = mysql_num_rows($resquery23);



	//========================eduattend Ends======================

	//========================Institute Attended==================

	

	//========================facilities Starts======================

	//Insert Recomend Record

	//Insert facilities Record

	if($_REQUEST['submit']=="facilitiessubmit") {

		extract($_POST);

		if($_REQUEST['facilitiesdid']=="") {

								

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

			$result = updateData($data,'na_st_facilities', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['facilitiesdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&facilitiespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delfacilities']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		$delsql = "DELETE from  na_st_facilities WHERE id = '".$_REQUEST['id']."'";

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&facilitiespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewfacilities = getAnyTableWhereData('na_st_facilities', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	$studensfacilitiessql = "SELECT * FROM  na_st_facilities WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery22 = mysql_query($studensfacilitiessql) or mysql_error();

	$stunum22 = mysql_num_rows($resquery22);



	//========================facilities Ends======================

	

	//========================reference Starts======================

	//Insert Recomend Record

	//Insert reference Record

	if($_REQUEST['submit']=="referencessubmit") {

		extract($_POST);

		if($_REQUEST['referencesdid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'ref_name'=>$ref_name,'dateofreference'=>date('Y-m-d',strtotime($dateofreference)),'ref_position'=>$ref_position,'ref_phone'=>$ref_phone,'ref_emailaddress'=>$ref_emailaddress,'ref_relationship'=>$ref_relationship,'ref_recominfo'=>$ref_recominfo,'ref_recomvideo'=>$ref_recomvideo,'status'=>1);

			//print_r($data);

			//exit();

	

			$result = insertData($data, 'na_sturec_reference');

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&referencespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		} else {

			$data = array('ind_id'=>$_SESSION["userid"],'ref_name'=>$ref_name,'dateofreference'=>date('Y-m-d',strtotime($dateofreference)),'ref_position'=>$ref_position,'ref_phone'=>$ref_phone,'ref_emailaddress'=>$ref_emailaddress,'ref_relationship'=>$ref_relationship,'ref_recominfo'=>$ref_recominfo,'ref_recomvideo'=>$ref_recomvideo);

			//print_r($data);

			//exit();



			$result = updateData($data,'na_sturec_reference', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['referencesdid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&referencespanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delreferences']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		echo $delsql = "DELETE from  na_sturec_reference WHERE id = '".$_REQUEST['id']."'";

		

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&referencespanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewreference1 = getAnyTableWhereData('na_sturec_reference', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	print_r($viewreference);

	$studensreferencesql = "SELECT * FROM  na_sturec_reference WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery21 = mysql_query($studensreferencesql) or mysql_error();

	$stunum21 = mysql_num_rows($resquery21);



	//========================reference Ends======================

	

	//========================P Recomendation Starts======================

	

	if($_REQUEST['submit']=="precomendsubmit") {

		extract($_POST);

		if($_REQUEST['precomenddid']=="") {

								

			$data = array('ind_id'=>$_SESSION["userid"],'per_prov_rec'=>$per_prov_rec,'recommendation'=>$recommendation,'recorded_video'=>$recorded_video,'recom_date'=>date('Y-m-d',strtotime($recom_date)),'status'=>1);

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



			$result = updateData($data,' na_sturec_personal_recommendations', " ind_id='" . $_SESSION["userid"] . "' AND id = '".$_REQUEST['precomenddid']."' ") ;

			echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

			echo "window.top.location.href='student.php?operation=successful&precomendpanel=1&accordionTeal=".$accordionTeal."&accr=1';\n";

			echo "</script>";

		}

		

	} 

	

	//Delete Drugs

	if($_REQUEST['delprecomend']!='' && $_REQUEST['ind_id']!='' && $_REQUEST['id']!='') {

		

		echo $delsql = "DELETE from   na_sturec_personal_recommendations WHERE id = '".$_REQUEST['id']."'";

		

		$ard=mysql_query($delsql);

		if($ard){	

		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";

		echo "window.top.location.href='student.php?deloperation=successful&precomendpanel=1&accr=1';\n";

		echo "</script>";

		

		}

	}

		

	$viewprecomend1 = getAnyTableWhereData(' na_sturec_personal_recommendations', " AND ind_id='".$_SESSION["userid"]."' AND id = '".$_REQUEST['id']."' ");

	//print_r($viewreference);

	$studensprecomendql = "SELECT * FROM   na_sturec_personal_recommendations WHERE ind_id = '".$_SESSION["userid"]."'";

	$resquery20 = mysql_query($studensprecomendql) or mysql_error();

	$stunum20 = mysql_num_rows($resquery20);



	//========================P Recomendation Ends======================



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

        <h2>Welcome Back <span style="color:#666; font-weight:400;"><?=ucfirst($_SESSION["username"])?></span><small>Designation</small></h2>

      </div>

      <div id="profile-main" class="card">

        

        <div class="pm-body clearfix" style="margin:0; padding:0;">

            <div class="pmb-block">

              <div class="form-horizontal row">

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
                          </select>
                      </form>

                    </div>

                  </div>

                </div>

              </div>

              <div class="pmbb-header">

                <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true">

                  <div class="panel panel-collapse">

                    <div class="panel-heading" role="tab">

                      <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true"> Add Individual Data </a> </h4>

                    </div>

                    <div id="accordionTeal-one" <?php if(isset($_REQUEST['accr'])==''){ ?> class="collapse in" <?php } else { ?> class="collapse " <?php } ?> role="tabpanel">

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

                                <dd><?=$viewindiv['ip_address']?></dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt>Conference Id</dt>

                                <dd><?=$viewindiv['conference_id']?></dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt>Social Security Number</dt>

                                <dd><?=$viewindiv['social_seq_no']?></dd>

                              </dl> 

                              <dl class="dl-horizontal">

                                <dt>Date of Birth</dt>

                                <dd><?php if($viewindiv['dob']!='') { ?><?=date("jS M Y", strtotime($viewindiv['dob']))?><?php } ?></dd>

                              </dl>                            

                              <dl class="dl-horizontal">

                                <dt>Gender</dt>

                                <dd><?=$viewindiv['gender']?></dd>

                              </dl>



                              <dl class="dl-horizontal">

                                <dt>Description</dt>

                                <dd><?=stripslashes($viewindiv['description'])?></dd>

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

                   <!--Drug Panel Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['drugspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="drugspanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-two" aria-expanded="false"> Add Athletics/Sports/Activities: <?=$drugspanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-two" <?php if($_REQUEST['drugspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['edit']=='') { ?>

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



                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" value="drugsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="drugform" id="drugform" onsubmit="return check2();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                  

                   <!--Award Panel Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['awardpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a class="collapsed" data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-three" aria-expanded="false"> Add Award: <?=$awardpanel?> </a> </h4>

                    </div>

                    <div id="accordionTeal-three" <?php if($_REQUEST['awardpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editaward']=='') { ?>

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

                            <input type="text" name="awardid" value="<?=$viewawards['id']?>" />

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



                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="awardsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="awardform" id="awardform" onsubmit="return check3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                   

                   <!--Rehabiliation Panel Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['rehabpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-4" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Rehabilitation: </a> </h4>

                    </div>

                    <div id="accordionTeal-4" <?php if($_REQUEST['rehabpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editrehab']=='') { ?>

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

                                      <th>Outcome</th>

                                      <th style="width:522px;">Description</th>

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  	while($viewrehab = mysql_fetch_array($resquery4)) {

								  ?>

                                    <tr>

                                      <td><?=$viewrehab['rehab_name']?></td>

                                      <td><?php if($viewrehab['rehab_date']!='') { ?><?=date("jS M Y", strtotime($viewrehab['rehab_date']))?><?php } ?></td>

                                       <td><?=$viewrehab['outcome']?></td>

                                      <td><?=stripslashes($viewrehab['description'])?></td>

                                       <td><a href="student.php?ind_id=<?=$viewrehab['ind_id']?>&id=<?=$viewrehab['id']?>&editrehab=awards&accr=1&rehabpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$viewrehab['ind_id']?>&id=<?=$viewrehab['id']?>&delrehab=val&rehabpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="rehabform" id="rehabform" onsubmit="return check4();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="rehabpanel" value="1" />

                            <input type="text" name="rehabdid" value="<?=$viewrehab['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="rehab_name" name="rehab_name" value="<?=$viewrehab['rehab_name']?>" placeholder="...........">

                                  </div>

                                   <span id="con_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" id="rehab_date" name="rehab_date" value="<?=date("d-m-Y", strtotime($viewrehab['rehab_date']))?>" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Outcome</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea  class="form-control" id="award_description" name="award_description" placeholder="..........."><?=stripslashes($viewrehab['outcome'])?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Description</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea  class="form-control" id="description" name="description" placeholder="..........."><?=stripslashes($viewawards['description'])?></textarea>

                                  </div>

                                </dd>

                              </dl>

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="rehabsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="awardform" id="awardform" onsubmit="return check3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="awardpanel" value="1" />

                            <div class="pmbb-edit">

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" id="rehab_name" name="rehab_name" value="<?=$viewawards['rehab_name']?>" placeholder="...........">

                                  </div>

                                   <span id="con_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" id="rehab_date" name="rehab_date" data-toggle="dropdown" placeholder="Click here...">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Outcome</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea  class="form-control" id="outcome" name="outcome" placeholder="..........."></textarea>

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



                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="rehabsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                   <!--Rehabiliation Panel Ends-->

                   

                   <!--Institute Panel Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['institutepanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-five" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Institute: </a> </h4>

                    </div>

                    <div id="accordionTeal-five" <?php if($_REQUEST['institutepanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editinstitute']=='') { ?>

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

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="institutesubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="instituteform" id="instituteform" onsubmit="return Submitinst();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                  

                   <!--Teacher Panel Starts-->

                  		<div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['teacherpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-six" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Teacher: </a> </h4>

                    </div>

                    <div id="accordionTeal-six" <?php if($_REQUEST['teacherpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editteacher']=='') { ?>

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

                                      <th>Course</th>

                                      <th>Curriculum</th>

                                      <th>Syllabus</th>

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

                                      <td><?=$viewteacher['course']?></td>

                                      <td><?=$viewteacher['curriculum']?></td>

                                      <td><?=$viewteacher['syllabus']?></td>

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

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="teachersubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="teacherform" id="teacherform" onsubmit="return Submitteachert();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                    <!--Coach Panel Starts-->

                  		<div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['coachpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-7" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Coach: </a> </h4>

                    </div>

                    <div id="accordionTeal-7" <?php if($_REQUEST['coachpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editcoach']=='') { ?>

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

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="coachsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="coachform" id="coachform" onsubmit="return Submitcoach();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                    <!--Recomend Panel Starts-->

                  		<div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['recomendpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-8" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Recomend: </a> </h4>

                    </div>

                    <div id="accordionTeal-8" <?php if($_REQUEST['recomendpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editrecomend']=='') { ?>

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

                            <?php print_r($viewrecomend);?>

                            <input type="text" name="recomenddid" value="<?=$viewrecomend['id']?>" />

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

                  	<!--Recomend Panel Starts-->

                    <!--Extra Starts-->

                  	<!--job Starts-->

                  	<div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['jobpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-10" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add job: </a> </h4>

                    </div>

                    <div id="accordionTeal-10" <?php if($_REQUEST['jobpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editjob']=='') { ?>

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

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="jobsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="jobform" id="jobform" onsubmit="return Submitjob();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                  <!-- Video Presectation -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['videopresentationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-11" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Video Presentation: </a> </h4>

                    </div>

                    <div id="accordionTeal-11" <?php if($_REQUEST['videopresentationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editvideopresentation']=='') { ?>

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

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="videopresentationsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="videopresentationform" id="videopresentationform" onsubmit="return Submitvideopresentation();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                                <dt class="p-t-10">Comments</dt>

                                <dd>

                                  <div class="fg-line">

                                    <textarea name="comments" class="form-control" rows="5" cols="10"></textarea>

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

                   <!-- Academic Transcript -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['academictranscriptpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-12" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Academic Transcript: </a> </h4>

                    </div>

                    <div id="accordionTeal-12" <?php if($_REQUEST['academictranscriptpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editacademictranscript']=='') { ?>

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

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="academictranscriptsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="academictranscriptform" id="academictranscriptform" onsubmit="return Submitacademictranscript();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                    <div <?php if($_REQUEST['educationalrecordspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-13" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Educational Record: </a> </h4>

                    </div>

                    <div id="accordionTeal-13" <?php if($_REQUEST['educationalrecordspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editeducationalrecords']=='') { ?>

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

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="educationalrecordssubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="educationalrecordsform" id="educationalrecordsform" onsubmit="return Submiteducationalrecords31();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                  

                  <!-- Issuar of Report -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['issuerofreportpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-14" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Issuar Of Report: </a> </h4>

                    </div>

                    <div id="accordionTeal-14" <?php if($_REQUEST['issuerofreportpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editissuerofreport']=='') { ?>

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

                                      <th>Teliphone no.</th>

                                      <th>Website</th>

                                      <th>URL</th>

                                      <th>Description</th>

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

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="issuerofreportsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="issuerofreportform" id="issuerofreportform" onsubmit="return Submitissuerofreport3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                  <!-- Report -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['reportspanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-15" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Report: </a> </h4>

                    </div>

                    <div id="accordionTeal-15" <?php if($_REQUEST['reportspanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editreports']=='') { ?>

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

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="reportssubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="reportsform" id="reportsform" onsubmit="return Submitreports3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                    <div <?php if($_REQUEST['messagespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-16" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Messages: </a> </h4>

                    </div>

                    <div id="accordionTeal-16" <?php if($_REQUEST['messagespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editmessages']=='') { ?>

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

                  <!-- Audio Presentation -->

                	

                        <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['audiopresentationpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-17" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Audio Presentation: </a> </h4>

                    </div>

                    <div id="accordionTeal-17" <?php if($_REQUEST['audiopresentationpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editaudiopresentation']=='') { ?>

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





                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="audiopresentationsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="audiopresentationform" id="audiopresentationform" onsubmit="return Submitaudiopresentation3();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                  

                  <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['precomendpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="precomendpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-20" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Personal Recomendation: </a> </h4>

                    </div>

                    <div id="accordionTeal-20" <?php if($_REQUEST['precomendpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editprecomend']=='') { ?>

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

                                      <tr>Action</tr>

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

                            <input type="text" name="precomenddid" value="<?=$viewprecomend1['id']?>" />

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

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="precomendsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="precomendform" id="precomendform" onsubmit="return Submitprecomend();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                  

                  

                  <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['referencespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="referencespanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-21" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add references: </a> </h4>

                    </div>

                    <div id="accordionTeal-21" <?php if($_REQUEST['referencespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editreferences']=='') { ?>

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

                                      <tr>Action</tr>

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

                            <input type="text" name="referencesdid" value="<?=$viewreference1['id']?>" />

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

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="referencessubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="referencesform" id="referencesform" onsubmit="return Submitreferences();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                  

                  <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['facilitiespanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="facilitiespanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-22" data-parent="#accordionTeal" data-toggle="collapse" class=""> Add Facilities: </a> </h4>

                    </div>

                    <div id="accordionTeal-22" <?php if($_REQUEST['facilitiespanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editfacilities']=='') { ?>

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

                  

                  <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['eduattendpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-23" data-parent="#accordionTeal" data-toggle="collapse" class=""> eduattendeds Attended: </a> </h4>

                    </div>

                    <div id="accordionTeal-23" <?php if($_REQUEST['eduattendpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editeduattended']=='') { ?>

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

                                      <th>Action</th>

                                    </tr>

                                  </thead>

                                  <tbody>

                                  <?php

								  //print_r($vieweduattended);

								   $studenseduattendsql = "SELECT * FROM na_st_eduinstitute_attended WHERE ind_id = '".$_SESSION["userid"]."'";

								  	while($vieweduattended = mysql_fetch_array($resquery23)) {

										

								  ?>

                                    <tr>

                                      <td><?=$vieweduattended['program_enroll']?></td>

                                      <td><?=$vieweduattended['attend_date']?></td>

                                      <td><?=$vieweduattended['course_taken']?></td>

                                      <td><?=$vieweduattended['Grades']?></td>

                                      <td><?=$vieweduattended['course_enrolled']?></td>

                                      <td><a href="student.php?ind_id=<?=$vieweduattended['ind_id']?>&id=<?=$vieweduattended['st_id']?>&editeduattended=awards&accr=1&eduattendpanel=1">Edit</a>&nbsp;|&nbsp;<a href="student.php?ind_id=<?=$vieweduattended['ind_id']?>&id=<?=$vieweduattended['st_id']?>&deleduattended=val&eduattendpanel=1" style="color:#ff0000;">Delete</a> </td>

                                    </tr>

                                    <?php } ?>

                                  </tbody>

                                </table>

                              </dl>

                            </div>

                            <?php } else { ?>

                            <form name="eduattendedform" id="eduattendedform" onsubmit="return check9();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="eduattendedpanel" value="1" />

                            <?php

							 $viewstudenseduattendsql = mysql_fetch_array(mysql_query("SELECT * FROM na_st_eduinstitute_attended WHERE ind_id = '".$_SESSION["userid"]."' and `st_id`=".$_REQUEST['id'].""));

							?>

                            

                            <input type="text" name="eduattendeddid" value="<?=$viewstudenseduattendsql['id']?>" />

                             <input type="text" name="st_id" value="<?=$_REQUEST['id']?>" />

                            <div class="pmbb-edit" style="display:block;">

                             

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Program Enroll*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="<?php echo $viewstudenseduattendsql['program_enroll']?>" id="program_enroll" name="program_enroll" value="" placeholder="Program Enroll">

                                  </div>

                                   <span id="coach_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Attend Date</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="<?php echo $viewstudenseduattendsql['attend_date']?>" id="attend_date" name="attend_date" data-toggle="dropdown" placeholder="Schedule">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course Taken</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewstudenseduattendsql['course_taken']?>" id="attend_date" name="attend_date" data-toggle="dropdown" placeholder="Course Taken">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Grades</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewstudenseduattendsql['Grades']?>" id="Grades" name="Grades" data-toggle="dropdown" placeholder="Grades">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course Enrolled</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="<?php echo $viewstudenseduattendsql['course_enrolled']?>" id="course_enrolled" name="course_enrolled" data-toggle="dropdown" placeholder="Course Enrolled">

                                  </div>

                                </dd>

                              </dl>

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="eduattendedsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="eduattendedform" id="eduattendedform" onsubmit="return Submiteduattended();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

                            <input type="hidden" name="eduattendedpanel" value="1" />

                            <div class="pmbb-edit">

                            

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Eduattendeds Name*</dt>

                                <dd>

                                  <div class="fg-line">

                                    <input type="text" class="form-control" value="" id="program_enroll" name="program_enroll" value="" placeholder="Program Enroll">

                                  </div>

                                   <span id="eduattended_error3" style="color:#ff0000;">&nbsp;</span>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Schedule</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control date-picker" value="" id="attend_date" name="attend_date" data-toggle="dropdown" placeholder="Attend Date">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course Taken</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="course_taken" name="course_taken" data-toggle="dropdown" placeholder="Course Taken">

                                  </div>

                                </dd>

                              </dl>

                              

                             <dl class="dl-horizontal">

                                <dt class="p-t-10">Grade</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="Grades" name="Grades" data-toggle="dropdown" placeholder="Grades">

                                  </div>

                                </dd>

                              </dl>

                              

                              <dl class="dl-horizontal">

                                <dt class="p-t-10">Course Enrolled</dt>

                                <dd>

                                  <div class="dtp-container dropdown fg-line">

                                    <input type='text' class="form-control" value="" id="course_enrolled" name="course_enrolled" data-toggle="dropdown" placeholder="Course Enrolled">

                                  </div>

                                </dd>

                              </dl>

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="eduattendedsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <script>

                            function Submiteduattended(){

								if($("#program_enroll").val() == "" ){

									$("#program_enroll").focus();

									$("#eduattended_error3").html("Please Enter Program Enrolled");

									return false;

                            	}else{

									$("#eduattended_error3").html("");

								}

                            }

                            

                            </script>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                  

                  <div class="panel panel-collapse">		

                    <div <?php if($_REQUEST['seminarpanel']!='') { ?>class="panel-heading active" <?php } else { ?>class="panel-heading" <?php } ?> role="tab" id="awardpanel">

                      <h4 class="panel-title"> <a aria-expanded="true" href="#accordionTeal-24" data-parent="#accordionTeal" data-toggle="collapse" class=""> Seminars Attended: </a> </h4>

                    </div>

                    <div id="accordionTeal-24" <?php if($_REQUEST['seminarpanel']!='') { ?>class="collapse in" <?php } else { ?>class="collapse" <?php } ?> role="tabpanel" >

                      <div class="panel-body">

                        <div class="pmb-block p-10  m-b-0">

                          <div class="pmbb-body p-l-0">

                          <?php if($_REQUEST['editseminar']=='') { ?>

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

                            

                            <input type="text" name="seminardid" value="<?=$viewseminar['semi_id']?>" />

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

                              

                              <div class="m-t-30">

                                <button class="btn btn-primary btn-sm" name="submit" type="submit" value="seminarsubmit">Save</button>

                                <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>

                              </div>

                            </div>

                            </form>

                            <?php } ?>

                            <form name="seminarform" id="seminarform" onsubmit="return Submitseminar();" action="<?=$_SERVER['PHP_SELF']?>" method="post">

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

                </div>

              </div>

            </div>

        </div>

      </div>

    </div>

  </section>

</section>

<?php include('lib/inner_footer.php')?>
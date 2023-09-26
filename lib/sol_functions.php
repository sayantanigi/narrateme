<?php
//	Author: Kaushik Bhattacharjee
/////////////////////////////////////////////////////////////
//	Name: Email Send Function (SMTP + Mail)
//	Date: 23-02-2009
/////////////////////////////////////////////////////////////
function SendEMail($from,$to,$subject,$msg) {
	$opt=1;
	if ($opt==1) { //Mail function
		// HTML email EOF
		// $headers = "MIME-Version: 1.0" . "\r\n";
		// $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";// More headers
		// $headers .= 'From: <$from>' . "\r\n";
		$headers="Content-Type:text/html;CHARSET=iso-8859-1\r\n";
		$headers.="From: $from\r\n";
		
		$message = $msg;
		return mail($to,$subject,$message,$headers);
		//HTML email BOF
	} else { //SMTP
		//////SMTP Mail BOF //////		
		$host = "mail.example.com"; //setup SMTP host
		$username = "smtp_username"; //setup SMTP username
		$password = "smtp_password"; //setup SMTP password

		require_once "Mail.php";
		$body = $msg;		
		
		$headers = array ('From' => $from,
			'To' => $to,
			'Subject' => $subject);
		$smtp = Mail::factory('smtp',
			array ('host' => $host,
				'auth' => true,
				'username' => $username,
				'password' => $password));
		
		$mail = $smtp->send($to, $headers, $body);
		
		if (PEAR::isError($mail)) {
			return FALSE;
		 } else {
			return TRUE;
		 }
		/////// SMTP mail EOF
	}
}

/////////////////////////////////////////////////////////////
//	Downloading the file from particular location
//	Date: 24-02-2009
// 	Instructions: Pass path and file name
/////////////////////////////////////////////////////////////
function download_file($file_path,$file_name) {
	$filename = $file_path.$file_name;
	header("Cache-control: private"); 
	header("Content-Type: application/octet-stream"); 
	header("Content-Length: ".filesize($filename));
	header("Content-Disposition: attachment; filename=".$file_name);
	
	$fp = fopen($filename, 'r');
	fpassthru($fp);
	fclose($fp);
}

/////////////////////////////////////////////////////////////
//	Random Password Generator
//	Date: 24-02-2009
// 	Instructions: Pass password leath and get a random password
/////////////////////////////////////////////////////////////
function random_number($length) {
	/*$rstr = "abcdefghijklmnopqrstuvwxyz0123456789";
	$nstr = "";
	mt_srand ((double) microtime() * 1000000);
	while(strlen($nstr) < $length) {
		$random = mt_rand(0,(strlen($rstr)-1));
		$nstr .= $rstr{$random};
	}
	return($nstr);*/
	$str_result = 'abcdefghijklmnopqrstuvwxyz0123456789';
    return substr(str_shuffle($str_result), 0, $length);
}

/////////////////////////////////////////////////////////////
//	Remove quoted from a string
//	Date: 24-02-2009
// 	Instructions: Pass string with quotes to get string without quotes
/////////////////////////////////////////////////////////////
function removeQuotes($strToChange) {
	$strToChange=str_replace("'","&#39;",$strToChange);
	$strToChange=str_replace("\"","&quot;",$strToChange);
	return $strToChange;
}

/////////////////////////////////////////////////////////////
//	Function to insert data in any table.
//	Date: 03-03-2009
// 	Instructions: Pass the table name, and arry of filedname and value in function.
//	USE---
//	$data=array("name"=>"Kaushik Bhattacharjee","address"=>"Durgapur","company"=>"Self");
//	$insert=InsertData($data,$tablename);
/////////////////////////////////////////////////////////////
function insertData($data, $table) {
	$con = new mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	if(!empty($data)) {
		$fld_names = implode(', ', array_keys($data));
		$fld_values = '\'' . implode('\', \'', array_values($data)) . '\'';
		$sql = 'INSERT INTO ' . $table . ' (' . $fld_names . ') VALUES (' . $fld_values . ')';
		//exit();

		$result=mysqli_query($con, $sql) or die(mysqli_error());
		return $result;
	} 
	return 0;
}

/////////////////////////////////////////////////////////////
//	Function to edit data from any table
//	Date: 03-03-2009
// 	Instructions: Pass the table name, and arry of filedname and value in function.
//	USE---
//	$data=array("name"=>"Kaushik Bhattacharjee","address"=>"Durgapur","company"=>"Self");
//	$update=updateData($data,$tablename, " name = 'Kaushik'");
/////////////////////////////////////////////////////////////
function updateData($data, $table, $parameters = '') {
	$con = new mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	if($parameters !='') {
		$where = "WHERE ".$parameters;
	} else {
		$where = '';
	}

	if(!empty($data)) {
		$fld_names = array_keys($data);
		$fld_values = array_values($data);
		$data = 'SET ';
		for ($max = count($fld_names), $i = 0;$i < $max;$i++) {
			$data .= $fld_names[$i] . ' = \'' . $fld_values[$i] . '\' ';
			if ($i < $max-1) $data .= ', ';
		}
		 $sql = 'UPDATE ' . $table . ' ' . $data . ' ' . $where;
		//exit();
	
		$result=mysqli_query($con, $sql) or die(mysqli_error());
		return $result;	  
	}
	return 0;
}

/////////////////////////////////////////////////////////////
//	Function to get one record from anytable($table) having wny where clase($whereClause)
//	Date: 24-02-2009
// 	Instructions: Pass the table name and where clause like " and id=1"
/////////////////////////////////////////////////////////////
function getAnyTableWhereData($table,$whereClause) {
	$con = new mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	$query="select * from $table where 1=1 $whereClause ";
	$result = $con->query($query);
	//echo "<pre>"; print_r($result);
	if($row = mysqli_fetch_assoc($result)) {	
		mysqli_free_result($result);
		return $row;
	} else {	
		return false;
	}
}
/////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	Function to get one record from anytable($table) having wny where clase($whereClause)
//	Date: 24-02-2009
// 	Instructions: Pass the table name and where clause like " and id=1"
/////////////////////////////////////////////////////////////
function getAlldataWhereData($table,$whereClause) {
	$con = new mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	$query="select * from $table where 1=1 $whereClause ";
	
	//echo "<br>$query";
	$result=mysqli_query($con, $query) or die(mysqli_error());
}
/////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	Function to check image size
//	Date: 24-02-2009
// 	Instructions: Pass the image url to check the size
/////////////////////////////////////////////////////////////
Function CheckImageSize($imageUrl) {
	//echo $imageUrl;
	$imMaxWidth=$GLOBALS["imMaxWidth"];
	$imMaxHeight=$GLOBALS["imMaxHeight"];
	$img_dim = array();
	if(($imageUrl!=DIR_WS_IMAGES) && (file_exists($imageUrl))) {
		if($imDetail=getimagesize($imageUrl)) {
			$iWidth = $imDetail[0];
			$iHeight = $imDetail[1];
			$toWidth=$iWidth;
			$toHeight=$iHeight;
			// echo $iWidth." ".$iHeight." ".$imMaxWidth;
			if(($iWidth>=$iHeight) && ($iWidth>$imMaxWidth)) {
				$newWidth=$imMaxWidth;
				$reduce_per=($imMaxWidth/$iWidth)*100;
				$newHeight=($iHeight*$reduce_per)/100;
				// echo "here";
			} else if(($iWidth<$iHeight) && ($iHeight>$imMaxHeight)) {
				$newHeight=$imMaxHeight;
				$reduce_per=($imMaxHeight/$iHeight)*100;
				$newWidth=($iWidth*$reduce_per)/100;
				// echo $newHeight." dd ".$newWidth;
			} else {
				$newHeight=$iHeight;
				$newWidth=$iWidth;
			}
			$img_dim['width'] = round($newWidth);
			$img_dim['height'] = round($newHeight);
		} else {
			$img_dim['width'] = "";
			$img_dim['height'] = "";
		}
		$idimension = " width = '$img_dim[width]' height='$img_dim[height]'";
		// print_r($img_dim);
		// return $idimension;
	}
	//return $img_dim;
	return $idimension;
}

/////////////////////////////////////////////////////////////
//	Function to Upload file
//	Date: 24-02-2009
// 	Instructions: 
/////////////////////////////////////////////////////////////
function upload_my_file($upload_file,$destination) {
	//move_uploaded_file
	if(move_uploaded_file($upload_file,$destination)) {
		return true;
	} else {
		return false;
	}
	umask("0000");
	chmod($destination,"0755");
}
///////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	Functions for image
//	Date: 24-02-2009
// 	Instructions: 
/////////////////////////////////////////////////////////////
function create_thumb($path,$size,$save_path) {
	if (file_exists($path)) {
		$thumb=new my_thumbnail($path);	// generate image_file, set filename to resize
		$thumb->size_width(20);		// set width for thumbnail, or
		$thumb->size_height(20);		// set height for thumbnail, or
		$width=$thumb->img["lebar"];
		$height=$thumb->img["tinggi"];
		if($width>$size || $height>$size) {
			$size=$size;
		} else {
			$size=$width;
		}

		$thumb->size_auto($size);		// set the biggest width or height for thumbnail
		$thumb->jpeg_quality(100);		// [OPTIONAL] set quality for jpeg only (0 - 100) (worst - best), default = 75
		// $thumb->show();					// show your thumbnail
		$thumb->save($save_path);		// save your thumbnail to file
		// echo "saved";
	} else {
		return false;
	}
}
/*----------------------------------------------*/

class my_thumbnail {
	var $img;
	function my_thumbnail($imgfile) {
		//detect image format
		$this->img["format"]=ereg_replace(".*\.(.*)$","\\1",$imgfile);
		$this->img["format"]=strtoupper($this->img["format"]);
		if ($this->img["format"]=="JPG" || $this->img["format"]=="JPEG") {
			$this->img["format"]="JPEG";
			$this->img["src"] = ImageCreateFromJPEG ($imgfile);
		} elseif ($this->img["format"]=="PNG") {
			$this->img["format"]="PNG";
			$this->img["src"] = ImageCreateFromPNG ($imgfile);
		} elseif ($this->img["format"]=="GIF") {
			$this->img["format"]="GIF";
			$this->img["src"] = ImageCreateFromGIF ($imgfile);
		} elseif ($this->img["format"]=="WBMP") {
			$this->img["format"]="WBMP";
			$this->img["src"] = ImageCreateFromWBMP ($imgfile);
		} else {
			echo "Not Supported File";
			exit();
		}

		@$this->img["lebar"] = imagesx($this->img["src"]);
		@$this->img["tinggi"] = imagesy($this->img["src"]);
		$this->img["quality"]=100;
	}

	function size_height($size=100) {
		//height
    	$this->img["tinggi_thumb"]=$size;
    	@$this->img["lebar_thumb"] = ($this->img["tinggi_thumb"]/$this->img["tinggi"])*$this->img["lebar"];
	}

	function size_width($size=100) {
		//width
		$this->img["lebar_thumb"]=$size;
    	@$this->img["tinggi_thumb"] = ($this->img["lebar_thumb"]/$this->img["lebar"])*$this->img["tinggi"];
	}

	function size_auto($size=100) {
		//size
		if ($this->img["lebar"]>=$this->img["tinggi"]) {
    		$this->img["lebar_thumb"]=$size;
    		@$this->img["tinggi_thumb"] = ($this->img["lebar_thumb"]/$this->img["lebar"])*$this->img["tinggi"];
		} else {
	    	$this->img["tinggi_thumb"]=$size;
    		@$this->img["lebar_thumb"] = ($this->img["tinggi_thumb"]/$this->img["tinggi"])*$this->img["lebar"];
 		}
	}

	function jpeg_quality($quality) {
		//jpeg quality
		$this->img["quality"]=$quality;
	}

	function show() {
		//show thumb
		@Header("Content-Type: image/".$this->img["format"]);
		/* change ImageCreateTrueColor to ImageCreate if your GD not supported ImageCreateTrueColor function*/
		$this->img["des"] = ImageCreateTrueColor($this->img["lebar_thumb"],$this->img["tinggi_thumb"]);
    		imagecopyresampled ($this->img["des"], $this->img["src"], 0, 0, 0, 0, $this->img["lebar_thumb"], $this->img["tinggi_thumb"], $this->img["lebar"], $this->img["tinggi"]);
		if ($this->img["format"]=="JPG" || $this->img["format"]=="JPEG") {
			imageJPEG($this->img["des"],"",$this->img["quality"]);
		} elseif ($this->img["format"]=="PNG") {
			imagePNG($this->img["des"]);
		} elseif ($this->img["format"]=="GIF") {
			imageGIF($this->img["des"]);
		} elseif ($this->img["format"]=="WBMP") {
			imageWBMP($this->img["des"]);
		}
	}

	function save($save="") {
		//save thumb
		if (empty($save)) $save=strtolower("./thumb.".$this->img["format"]);
		/* change ImageCreateTrueColor to ImageCreate if your GD not supported ImageCreateTrueColor function*/
		$this->img["des"] = ImageCreateTrueColor($this->img["lebar_thumb"],$this->img["tinggi_thumb"]);
    		@imagecopyresampled ($this->img["des"], $this->img["src"], 0, 0, 0, 0, $this->img["lebar_thumb"], $this->img["tinggi_thumb"], $this->img["lebar"], $this->img["tinggi"]);
		if ($this->img["format"]=="JPG" || $this->img["format"]=="JPEG") {
			imageJPEG($this->img["des"],"$save",$this->img["quality"]);
		} elseif ($this->img["format"]=="PNG") {
			imagePNG($this->img["des"],"$save");
		} elseif ($this->img["format"]=="GIF") {
			imageGIF($this->img["des"],"$save");
		} elseif ($this->img["format"]=="WBMP") {
			imageWBMP($this->img["des"],"$save");
		}
	}
}

/////////////////////////////////////////////////////////////
//	Function to format and display date
//	Date: 24-02-2009
// 	Instructions: 
/////////////////////////////////////////////////////////////
function show_formatted_date($p_date) {
	if($p_date=="0000-00-00" || $p_date=="0000-00-00 00:00:00") 
		return ;
	else {
		$arr_date=explode(' ',$p_date);
		if(count($arr_date) > 1) {
			return date('dS F Y ',strtotime($p_date));
		} else {
			return date('dS F Y ',strtotime($p_date));
		}
	}	 
}
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	Function to get age from date
//	Date: 24-02-2009
// 	Instructions: just pass the date of birth in function
/////////////////////////////////////////////////////////////
function GetAge($DOB) { 
	list($Year, $Month, $Day) = explode("-",$DOB); 
	$YearDifference  = date("Y") - $Year; 
	$MonthDifference = date("m") - $Month; 
	$DayDifference   = date("d") - $Day; 
	if ($DayDifference < 0 || $MonthDifference < 0) { 
	$YearDifference--; 
	} 
	return $YearDifference; 
}
/////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	Function to compare the difference in two dates and return days
//	Date: 24-02-2009
// 	Instructions: 
/////////////////////////////////////////////////////////////
function date_diff_two_date($start,$end) {
	$start=substr($start, 0,10);    
	$start=str_replace("-", "", $start); 
	$end=substr($end, 0,10);    
	$end=str_replace("-", "", $end); 
	$count=0;
	for($j = $start;$j<=$end;$j++){
		$year = substr($j,0,4);
		$mnd = substr($j,4,2);
		$day = substr($j,6,2);
		if(checkdate ($mnd,$day,$year)){
			$count++;
		}else{
			if($mnd>12){
				$mnd = "01";
				$day = "00";
				$year++;
			}
			if($day>=31){
				$day = "00";
				$mnd = check($mnd+1);
			}
			$j = $year.$mnd.$day;
		}
	}
	return $count; 
}
///////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	Function to return the no of days in month start
//	Date: 24-02-2009
// 	Instructions: 
/////////////////////////////////////////////////////////////
function daysInMonth($month, $year) {
	if(checkdate($month, 31, $year)) return 31;
	if(checkdate($month, 30, $year)) return 30;
	if(checkdate($month, 29, $year)) return 29;
	if(checkdate($month, 28, $year)) return 28;
	return 0; // error
}

function date_timelisting($date,$seldd="day",$selmm="month",$selyy="year",$hr="hour",$min="minutes",$sec="sec",$startYear="",$endYear="") {
	if($date!="") {
		list($year,$month,$day)= split ("-",$date);
		$str_date=explode(" ",$date);
		list($hrs,$mins,$secs)=split(":",$str_date[1]);
   	}
	//print_r($str_date); 
	//echo $hrs;
	//date dropdown
	  	print '<select name="'.$seldd.'"><option value="">Date</option>';
 	$ct=0;
	for($ct=1;$ct<=31;$ct++) {
		echo "<option value='".($ct)."'";
		if($ct==$day) {
		 	echo " selected";
		}
	   	echo ">".$ct."</option>";
	}
	print "</select>";
    print" - ";
    //month dropdown
	print '<select name="'.$selmm.'"><option value="">Month</option>';
	$ct=0;
	for($ct=0;$ct<12;$ct++) {
		echo "<option value='".($ct+1)."'";
		if(($ct+1)==$month) {
		 	echo " selected";
		}
		echo ">".date ("M", mktime (0,0,0,$ct+1,1,98)) ."</option>";
	}
	print'</select>';
	print" - ";
	//Year dropdown

	print '<select name="'.$selyy.'"><option value="">Year</option>';
  	$ct=0;
	if($startYear=="") {
		$s_yy=(date('Y')-1);
	} else {
		$s_yy = $startYear;
	}
	
	if($endYear=="") {
		$e_yy=(date('Y')+1);
	} else {
		$e_yy = $endYear;
	}

	for($ct=$s_yy;$ct<=$e_yy;$ct++) {
		echo "<option value='".($ct)."'";
		if($ct==$year) {
	 		echo " selected";
		}
		echo ">".$ct."</option>";
	}
    print "</select>";
	print " - ";
	//Hour dropdown
	print '<select name="'.$hr.'"><option value="">Hour</option>';
	for($ct=0;$ct<=23;$ct++) {
		echo "<option value='".($ct)."'";
		if(($ct)==$hrs && $hrs!="") {
		 	echo " selected";
		}
		echo ">".$ct."</option>";
	}
    print "</select>";
	print " - ";
	//Minute dropdown
	print '<select name="'.$min.'"><option value="">Minutes</option>';
	for($ct=0;$ct<=59;$ct++) {
		echo "<option value='".($ct)."'";
		if(($ct)==$mins && $mins!="") {
		 	echo " selected";
		}
		echo ">".$ct."</option>";
	}
    print "</select>";
	print " - ";
	//Second dropdown
	print '<select name="'.$sec.'"><option value="">Second</option>';
	for($ct=0;$ct<=59;$ct++) {
		echo "<option value='".($ct)."'";
		if(($ct)==$mins && $mins!="") {
		 	echo " selected";
		}
		echo ">".$ct."</option>";
	}
    print "</select>";
}

/////////////////////////////////////////////////////////////
//	Function to return the file name from where request originated start
//	Date: 24-02-2009
// 	Instructions: 
/////////////////////////////////////////////////////////////
function GetRedirectUrl() {
	$REDIRECT_URL=$_SERVER['HTTP_REFERER']; // redirecting URL
	$full_url=$REDIRECT_URL; // complete redirecting url  
	$all_url=explode ( "/", $full_url); // explode url   
	$all_url=array_reverse($all_url);	// reverse array to fetch file name
	$return_url= $all_url[0]; // return file name
	$pos = strpos($return_url,"?"); // find position of ? in url
	if($pos) {
		$return_url=substr($return_url,0,$pos);		
	}
	return $return_url;
}
/////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////
//	Function to Send SMS Message
//	Date: 24-02-2009
// 	Instructions: Send Mobile No and Message to the function, mobile no with out + and 00 in begining with country code
//	Clicktell API is used to send messages http://www.clickatell.com
/////////////////////////////////////////////////////////////
function SendSMS($Destination,$Message) {
	// $user = "unitedglobal";  //username
	// $password = "funfid6k"; //password
	// $api_id = "3113631"; //API

	$user = "messad";  //username
	$password = "AIUijt05"; //password
	$api_id = "3155036"; //API

	$baseurl ="http://api.clickatell.com";
	$text = urlencode($Message);
	$to = $Destination; //example 919932130035 (country code is 91 and rest is the number)
	// auth call
	$url = "$baseurl/http/auth?user=$user&password=$password&api_id=$api_id";
	// do auth call
	$ret = file($url);
	// split our response. return string is on first line of the data returned
	$sess = split(":",$ret[0]);
	if ($sess[0] == "OK") {
		$sess_id = trim($sess[1]); // remove any whitespace
		$url = "$baseurl/http/sendmsg?session_id=$sess_id&to=$to&text=$text";
		// do sendmsg call
		$ret = file($url);
		$send = split(":",$ret[0]);
		if ($send[0] == "ID")
			//echo "success message ID: ". $send[1];
			return TRUE;
		else
			return FALSE;
	} else {
		echo "Authentication failure: ". $ret[0];
		return FALSE;
	}
}
/////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////
// Image Create Function
// Date: 09-06-2010
// Instructions:
// pass required height, width and the final image will be resized and cropped to fit that size without distortion
/////////////////////////////////////////////////////////////////////
function CreateFixedSizedImage($source,$dest,$width=100,$height=100) {
	$source_path = $source;
	list( $source_width, $source_height, $source_type ) = getimagesize( $source_path );

	switch ( $source_type ) {
		case IMAGETYPE_GIF:
			$source_gdim = imagecreatefromgif( $source_path );
		break;
		case IMAGETYPE_JPEG:
			$source_gdim = imagecreatefromjpeg( $source_path );
		break;
		case IMAGETYPE_PNG:
			$source_gdim = imagecreatefrompng( $source_path );
		break;
	}

	$source_aspect_ratio = $source_width / $source_height;
	$desired_aspect_ratio = $width / $height;

	if ( $source_aspect_ratio > $desired_aspect_ratio ) {
		$temp_height = $height;
		$temp_width = ( int ) ( $height * $source_aspect_ratio );
	} else {
		$temp_width = $width;
		$temp_height = ( int ) ( $width / $source_aspect_ratio );
	}
	$temp_gdim = imagecreatetruecolor( $temp_width, $temp_height );
	imagecopyresampled($temp_gdim, $source_gdim, 0, 0, 0, 0, $temp_width, $temp_height, $source_width, $source_height);
	$x0 = ( $temp_width - $width ) / 2;
	$y0 = ( $temp_height - $height ) / 2;

	$desired_gdim = imagecreatetruecolor( $width, $height );
	imagecopy($desired_gdim, $temp_gdim, 0, 0, $x0, $y0, $width, $height);
	imagejpeg( $desired_gdim, $dest );
}
/////////////////////////////////////////////////////////////////////

//=======================Get Ip Address=======================
function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

//=======================Get IP Address=======================
function sequre(){
	if($_SESSION['user_log_flag'] != 1) {
		header('location: index.php');
		exit;
	} 
}

function socialcheck() {
	$con = new mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	$sqlcheck=mysqli_query($con, "select * from `na_social_profile` where `user_id` =".$_SESSION["userid"]."");	
	if(mysqli_num_rows($sqlcheck) < 1){
		header('location: ../index.php');
	}
}

function socialcheckreg() {
	$con = new mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	$sqlcheck=mysqli_query($con, "select * from `na_social_profile` where `user_id` =".$_SESSION["userid"]."");	
	if(mysqli_num_rows($sqlcheck) < 1){
		header('location:social-network-profile-creation.php');
	}
}

function checkExistance($table,$whereClause){
	$con = new mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}
	$query=mysqli_query($con, "SELECT * FROM $table WHERE 1=1 $whereClause");
	$count=mysqli_num_rows($query);
	return $count;
}
?>
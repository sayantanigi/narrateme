<?php
//error_reporting(0);
define('PROJECT_NAME', 'Narrateme');
define('ALIAS', 'Narrate Me');
define('FAVICON', 'images/favicon.png');
define('TABLE_PREFIX', 'na_');
define('NARRATEME_SEO_PREFIX','narrateme');

/*if($_SERVER['HTTP_HOST']=='192.168.1.126' || $_SERVER['HTTP_HOST']=='127.0.0.1' || $_SERVER['HTTP_HOST']=='localhost') {
	define('DB_HOST', 'localhost');
	define('DB_USERNAME', 'narrate');
	define('DB_PASS', 'info#2018');
	define('DB_NAME', 'narrate');
	define("BASE_URL", "http://narrateme.com/new/");
	define("DIR_PATH", str_replace("\\","/",$_SERVER['DOCUMENT_ROOT'])."/admin/");
	$title = "Narrateme";
	$siteurl = "http://narrateme.com/new/";
	$siteurladmin = "http://narrateme.com/new/admin/";
	$siteimg = "http://narrateme.com/new/images";

} else {
	define('DB_HOST', 'localhost');
	define('DB_USERNAME', 'narrate');
	define('DB_PASS', 'info#2018');
	define('DB_NAME', 'narrate');
	define("BASE_URL", 'http://narrateme.com/new/admin/');
	define("DIR_PATH", str_replace("\\","/",$_SERVER['DOCUMENT_ROOT'])."/admin/");
	
	$title = "Narrateme";
	$siteimg = "http://narrateme.com/new/images";
	$siteurl = "http://narrateme.com/new/";
	$siteurladmin = "http://narrateme.com/new/admin/";
	$activationlink = "http://narrateme.com/new/memberactivation.php";
	//Change the max upload size
	ini_set('post_max_size', '100M');
	ini_set('upload_max_filesize', '100M');
}

$con = mysql_connect(DB_HOST,DB_USERNAME,DB_PASS) or die("Database connection error");
$db = mysql_select_db(DB_NAME,$con) or die("Database connection error");

//For Settings
$getsettings = "SELECT * FROM ".TABLE_PREFIX."settings";
$getsettings = mysql_query($getsettings) or die(mysql_error());

while($rowsettings = mysql_fetch_assoc($getsettings)) {
   $settings[$rowsettings['config_type']] = $rowsettings['config_val'];
}*/

if($_SERVER['HTTP_HOST']=='192.168.1.126' || $_SERVER['HTTP_HOST']=='127.0.0.1' || $_SERVER['HTTP_HOST']=='localhost') {
	//echo "string1";
	define('DB_HOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'narrateme');
	define("BASE_URL", "http://localhost/narrateme/");
	define("DIR_PATH", str_replace("\\","/",$_SERVER['DOCUMENT_ROOT'])."/admin/");
	$title = "Narrateme";
	$siteurl = "http://localhost/narrateme/";
	$siteurladmin = "http://localhost/narrateme/admin/";
	$siteimg = "http://localhost/narrateme/images";
} else {
	//echo "string2";
	define('DB_HOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'narrateme');
	define("BASE_URL", 'http://localhost/narrateme/admin/');
	define("DIR_PATH", str_replace("\\","/",$_SERVER['DOCUMENT_ROOT'])."/admin/");
	$title = "Narrateme";
	$siteimg = "http://localhost/narrateme/images";
	$siteurl = "http://localhost/narrateme/";
	$siteurladmin = "http://localhost/narrateme/admin/";
	$activationlink = "http://localhost/narrateme/memberactivation.php";
	//Change the max upload size
	ini_set('post_max_size', '100M');
	ini_set('upload_max_filesize', '100M');
}

$con = new mysqli(DB_HOST,DB_USERNAME,DB_PASS,DB_NAME);

if ($con->connect_error) {
	die("Connection failed: " . $con->connect_error);
}

//For Settings
/*$getsettings = "SELECT * FROM ".TABLE_PREFIX."settings";
$getsettings = mysqli_query($con, $getsettings) or die(mysqli_error()); 
while($rowsettings = mysqli_fetch_assoc($getsettings)) {
   $settings[$rowsettings['config_type']] = $rowsettings['config_val'];
}
$sql = "SELECT * FROM ".TABLE_PREFIX."settings";
$result = $con->query($sql);
if ($result->num_rows > 0) {
	while($rowsettings = $result->fetch_assoc()) {
		echo $rowsettings['config_val'];
		$settings[$rowsettings['config_type']] = $rowsettings['config_val'];
	}
}*/
?>
<?php
header("Access-Control-Allow-Origin: *"); 
include('lib/connect.php');
$user = $_POST['user'];
$pass = base64_encode($_POST['pass']);
$api_fetch = array();
$api_query = mysql_query("SELECT * from `na_member` where (username='".$user."' and password='".$pass."') ");
$check = mysql_num_rows($api_query);

$api_fetch[] = mysql_fetch_assoc($api_query);

if($check > 0){
	$character = $api_fetch;
	echo json_encode($character);
}else{
	echo 0;
}

 ?>
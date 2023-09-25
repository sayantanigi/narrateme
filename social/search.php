<?php
/*$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'narrate';
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);*/
include('../lib/connect.php');
include('../lib/sol_functions.php');
session_start();

$searchTerm = $_GET['term'];

//$query = $db->query("SELECT * FROM na_member WHERE first_name LIKE '%".$searchTerm."%' OR email LIKE '%".$searchTerm."%' and  ORDER BY first_name ASC");
$query=mysql_query("SELECT * FROM na_member WHERE (first_name LIKE '%".$searchTerm."%' OR email LIKE '%".$searchTerm."%') and id!=".$_SESSION["userid"]."   ORDER BY first_name ASC");

while ($row = mysql_fetch_assoc($query)) {
    $data[] = $row['first_name']." ".$row['last_name'];
}
//return json data
echo json_encode($data);
?>
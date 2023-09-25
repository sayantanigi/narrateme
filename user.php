<?php
include('lib/connect.php');
session_start();
//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = mysql_query ("SELECT * FROM na_member WHERE (first_name LIKE '%".$query."%' OR email LIKE '%".$query."%') and id!=".$_SESSION["userid"]."   ORDER BY first_name ASC");
	$array = array();
    while ($row = mysql_fetch_array($sql)) {
        $array[] = array (
            'label' => $row['first_name'].', '.$row['last_name'],
            'value' => $row['first_name'].' '.$row['last_name'],
        );
    }
    //RETURN JSON ARRAY
    echo json_encode ($array);
}

?>
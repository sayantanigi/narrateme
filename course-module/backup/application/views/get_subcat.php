<?php 
include_once 'config/connect.php'; 
if(!empty($_POST["country_id"])) {
	$query ="SELECT * FROM sub_category WHERE category_id = '" . $_POST["country_id"] . "'";
	$results = mysqli_query($con, $query);
        //print_r($results); exit();
?>
	
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["sub_category"]; ?>"><?php echo $state["sub_category"]; ?></option>
<?php
	}
}?>
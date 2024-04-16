<?php
include('lib/connect.php');
if (isset($_POST["country_name"]) && !empty($_POST["country_name"])) {
    //Get all state data
    $getcountryid = mysqli_query($con, "SELECT id FROM countries WHERE name = '".$_POST['country_name']."'");
    $country_id = mysqli_fetch_row($getcountryid);
    $state_array = mysqli_query($con, "SELECT * FROM states WHERE country_id = '".$country_id[0]."' ORDER BY name ASC");
    if ($state_array->num_rows > 0) {
        echo '<option value="">Select State</option>';
        while($srow = $state_array->fetch_assoc()) {
            echo "<option name='".$srow['name']."' value='".$srow['name']."'>".$srow['name']."</option>";
        }
    } else {
        echo '<option value="">State not available</option>';
    }
}

if (isset($_POST["state_name"]) && !empty($_POST["state_name"])) {
    //Get all city data
    $getstateid = mysqli_query($con, "SELECT id FROM states WHERE name = '".$_POST['state_name']."'");
    $state_id = mysqli_fetch_row($getstateid);
    $city_array = mysqli_query($con, "SELECT * FROM cities WHERE state_id = '".$state_id[0]."' ORDER BY name ASC");

    //Display cities list
    if ($city_array->num_rows > 0) {
        echo '<option value="">Select city</option>';
        while($crow = $city_array->fetch_assoc()) {
            echo "<option name= '".$crow['name']."' value='".$crow['name']."'>".$crow['name']."</option>";
        }
    } else {
        echo '<option value="">City not available</option>';
    }
}
?>
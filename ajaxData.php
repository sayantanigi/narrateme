<?php
//Include database configuration file
require_once("lib/dbcontroller.php");
 $db_handle = new DBController();

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
   $product_array = $db_handle->runQuery("SELECT * FROM states WHERE country_id = ".$_POST['country_id']."");
    print_r($product_array);
	
	echo "SELECT * FROM states WHERE country_id = ".$_POST['country_id']."";
    //Count total number of rows
    //$rowCount = $query->num_rows;
    
    //Display states list
   if (!empty($product_array)) { 
        echo '<option value="">Select state</option>';
        foreach($product_array as $key=>$value){
		?>
        	
            <option value="<?php echo $product_array[$key]['id']?>"><?php echo $product_array[$key]['name']?></option>
        <?php    
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}

if(isset($_POST["state"]) && !empty($_POST["state"])){
    //Get all city data
    //$query = $db->query("SELECT * FROM cities WHERE state_id = ".$_POST['state']." AND status = 1 ORDER BY city_name ASC");
	$product_array1 = $db_handle->runQuery("SELECT * FROM cities WHERE state_id = ".$_POST['state']."");
 
    //Display cities list
   if (!empty($product_array1)) {
        echo '<option value="">Select city</option>';
       foreach($product_array1 as $key=>$value){
	?>	
    	 <option value="<?php echo $product_array1[$key]['id']?>"><?php echo $product_array1[$key]['name']?></option>   
           
     <?php       
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>
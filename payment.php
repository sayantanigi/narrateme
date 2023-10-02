<?php 
//session_start();
include('lib/inner_header.php');
//include"lib/headercart.php";
//require_once("lib/dbcontroller.php");
//$db_handle = new DBController();
//if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
	if(!empty($_POST["quantity"])) {
		$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
		$itemArray = array($productByCode[0]["code"]=>array('product_name'=>$productByCode[0]["product_name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
		if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($productByCode[0]["code"] == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
						}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
	}
	break;
	case "remove":
	if(!empty($_SESSION["cart_item"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
			if($_GET["code"] == $k)
				unset($_SESSION["cart_item"][$k]);				
			if(empty($_SESSION["cart_item"]))
				unset($_SESSION["cart_item"]);
		}
	}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
//}
//print_r($_SESSION["cart_item"]);
if(isset($_SESSION["cart_item"])){
	$item_total = 0;
	$member_id=$_SESSION['email_address'];
	$transantionid = "PD".random_number(5).date('Y-m-d');
	$_SESSION['transantionid']=$transantionid;
foreach ($_SESSION["cart_item"] as $item) {
	$total = $item["quantity"]*$item["price"];
	$sqlinsert=mysqli_query($con, "INSERT INTO order_list (transaction_id, product_code, product_name, qty, price, total, member_id, add_date, pay_status) 
	VALUES ('".$transantionid."','".$item["code"]."', '".$item['product_name']."', ".$item["quantity"].", ".$item["price"].", ".$total.", '".$member_id."', '".date('Y-m-d')."', '0')");
}
$sqlinsertship=mysqli_query($con, "INSERT INTO shipping (transaction_id, first_name, last_name, country, state, city, address, zipcode, phone_no, customer_id) 
VALUES ('".$transantionid."', '".$_SESSION['first_name']."','".$_SESSION['last_name']."','".$_SESSION['country_id']."', '".$_SESSION['state']."','".$_SESSION['city']."','".$_SESSION['address']."','".$_SESSION['zip_code']."', '".$_SESSION['phone_number']."', '".$member_id."')");
}
?>
<section class="body_content">
  	<div class="page_header">
    	<div class="over_bg"></div>
	    <div class="block-header text-center">
      		<h2>Payment</h2>
	    </div>
  	</div>
  	<div class="inner_content">
    	<div class="" id="page-1">
      		<div class="bb-custom-container card-body card-padding card">
        		<div class="row content-block text-justify animateFadeInRight">
          			<div class="col-sm-12">
            			<div class="abt_txt" style="margin-bottom: 5%;margin-top: 5%;text-align: center;">
              				<div class="container">
                				<p>Your Payment is under process , Please do not refresh your browser</p>
                				<img src="img/loder.gif" />
				                <?php if(isset($_SESSION["cart_item"])) { ?>
                				<form method="post" action="https://www.paypal.com/cgi-bin/webscr" id="payment">
				                    <input type="hidden" name="cmd" value="_cart">
				                    <input type="hidden" name="upload" value="1">
				                    <input type="hidden" name="business" value="usasian2016@gmail.com" />
				                    <input type="hidden" name="currency_code" value="AUD">
				                    <?php 
										$cnt=1;
										foreach ($_SESSION["cart_item"] as $item){
								    ?>
                    				<p>
					                    <input type="hidden" name="item_name_<?php echo $cnt?>" value="<?php echo $item['product_name']; ?>">
					                    <input type="hidden" name="item_number_<?php echo $cnt?>" value="<?php echo $item["code"]; ?>">
					                    <input type="hidden" name="amount_<?php echo $cnt?>" value="<?php echo $item["price"]; ?>">
					                    <input type="hidden" name="quantity_<?php echo $cnt?>" value="<?php echo $item["quantity"]; ?>">
				                    </p>
                    				<?php $cnt++;} ?>
				                    <input type="hidden" name="tx" value="<?php echo $_SESSION["transantionid"];?>">
				  					<input type="hidden" name="at" value="<?php echo $_SESSION["transantionid"].'trnd';?>">
				                    <input type='hidden' name='notify_url' value='http://narrateme.com/dev/ipn.php'>
				                    <input type='hidden' name='cancel_return' value='http://narrateme.com/dev/cancel.php'>
				                  	<input type='hidden' name='return' value='http://narrateme.com/dev/success.php'>
				                </form>
                 				<?php } ?>
                 			</div>
            			</div>
          			</div>
        		</div>
      		</div>
		</div>
  	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<script>
	$(document).ready(function(){
	$("#payment").submit();
});
</script>
<?php include"lib/footercms.php";?>

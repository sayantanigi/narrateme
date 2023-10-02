<?php 
//session_start();
include"lib/headercart.php";
require_once("lib/dbcontroller.php");
$db_handle = new DBController();
//$view=getAnyTableWhereData('product', " AND code='".$_GET["code"]."' ");
$product_array = $db_handle->runQuery("SELECT * FROM countries");
if(isset($_REQUEST['payment'])){
    extract($_POST);
    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['country_id'] = $country_id;
    $_SESSION['state']=$state;
    $_SESSION['city']=$city;
    $_SESSION['address']=$address;
    $_SESSION['zip_code']=$zip_code;
    $_SESSION['phone_number']=$phone_number;
    $_SESSION['email_address']=$email_address;
    //exit();
    header('location:payment.php');
}	
?>
<style>
.steps {margin-top: -41px;display: inline-block;float: right;font-size: 16px }.step {float: left;background: white;padding: 7px 13px;border-radius: 1px;text-align: center;width: 100px;position: relative }.step_line {margin: 0;width: 0;height: 0;border-left: 16px solid #fff;border-top: 16px solid transparent;border-bottom: 16px solid transparent;z-index: 1008;position: absolute;left: 99px;top: 1px }.step_line.backline {border-left: 20px solid #f7f7f7;border-top: 20px solid transparent;border-bottom: 20px solid transparent;z-index: 1006;position: absolute;left: 99px;top: -3px }.step_complete {background: #357ebd }.step_complete a.check-bc, .step_complete a.check-bc:hover,.afix-1,.afix-1:hover{color: #eee;}.step_line.step_complete {background: 0;border-left: 16px solid #357ebd }.step_thankyou {float: left;background: white;padding: 7px 13px;border-radius: 1px;text-align: center;width: 100px;}.step.check_step {margin-left: 5px;}.ch_pp {text-decoration: underline;}.ch_pp.sip {margin-left: 10px;}.check-bc, .check-bc:hover {color: #222;}.SuccessField {border-color: #458845 !important;-webkit-box-shadow: 0 0 7px #9acc9a !important;-moz-box-shadow: 0 0 7px #9acc9a !important;box-shadow: 0 0 7px #9acc9a !important;background: #f9f9f9 url(../images/valid.png) no-repeat 98% center !important }.btn-xs{line-height: 28px;}.login-container{margin-top:30px ;}.login-container input[type=submit] {width: 100%;display: block;margin-bottom: 10px;position: relative;}.login-container input[type=text], input[type=password] {height: 44px;font-size: 16px;width: 100%;margin-bottom: 10px;-webkit-appearance: none;background: #fff;border: 1px solid #d9d9d9;border-top: 1px solid #c0c0c0;padding: 0 8px;box-sizing: border-box;-moz-box-sizing: border-box;}.login-container input[type=text]:hover, input[type=password]:hover {border: 1px solid #b9b9b9;border-top: 1px solid #a0a0a0;-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);}.login-container-submit {border: 0px;color: #fff;text-shadow: 0 1px rgba(0,0,0,0.1);background-color: #357ebd;padding: 17px 0px;font-family: roboto;font-size: 14px;}.login-container-submit:hover {border: 0px;text-shadow: 0 1px rgba(0,0,0,0.3);background-color: #357ae8;}.login-help{font-size: 12px;}.asterix{background:#f9f9f9 url(../images/red_asterisk.png) no-repeat 98% center !important;}ol, ul {list-style: none;}.hand {cursor: pointer;cursor: pointer;}.cards{padding-left:0;}.cards li {-webkit-transition: all .2s;-moz-transition: all .2s;-ms-transition: all .2s;-o-transition: all .2s;transition: all .2s;background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');background-position: 0 0;float: left;height: 32px;margin-right: 8px;text-indent: -9999px;width: 51px;}.cards .mastercard {background-position: -51px 0;}.cards li {-webkit-transition: all .2s;-moz-transition: all .2s;-ms-transition: all .2s;-o-transition: all .2s;transition: all .2s;background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');background-position: 0 0;float: left;height: 32px;margin-right: 8px;text-indent: -9999px;width: 51px;}.cards .amex {background-position: -102px 0;}.cards li {-webkit-transition: all .2s;-moz-transition: all .2s;-ms-transition: all .2s;-o-transition: all .2s;transition: all .2s;background-image: url('//c2.staticflickr.com/4/3713/20116660060_f1e51a5248_m.jpg');background-position: 0 0;float: left;height: 32px;margin-right: 8px;text-indent: -9999px;width: 51px;}.cards li:last-child {margin-right: 0;}.container{border: none;}.panel-footer{background:#fff;}.btn{border-radius: 1px;}.btn-sm, .btn-group-sm > .btn{border-radius: 1px;}.input-sm, .form-horizontal .form-group-sm .form-control{border-radius: 1px;}.panel-info {border-color: #999;}.panel-heading {border-top-left-radius: 1px;border-top-right-radius: 1px;padding: 10px 15px;}.panel {border-radius: 1px;}.panel-info > .panel-heading {color: #eee;border-color: #999;}.panel-info > .panel-heading {background-image: linear-gradient(to bottom, #555 0px, #888 100%);}hr {border-color: #999 -moz-use-text-color -moz-use-text-color;}.panel-footer {border-bottom-left-radius: 1px;border-bottom-right-radius: 1px;border-top: 1px solid #999;}.btn-link {color: #888;}hr{margin-bottom: 10px;margin-top: 10px;}@media only screen and (max-width: 989px){.span1{margin-bottom: 15px;clear:both;}}@media only screen and (max-width: 764px){.inverse-1{float:right;}}@media only screen and (max-width: 586px){.cart-titles{display:none;}.panel {margin-bottom: 1px;}}.form-control {border-radius: 1px;}@media only screen and (max-width: 486px){.col-xss-12{width:100%;}.cart-img-show{display: none;}.btn-submit-fix{width:100%;}}
</style>
<section class="body_content">
  <div class="page_header">
    <div class="over_bg"></div>
    <div class="block-header text-center">
      <h2>Check Out</h2>
    </div>
  </div>
<div class="inner_content">
  <div class="" id="page-1">
    <div class="bb-custom-container card-body card-padding card">
      <div class="row content-block text-justify animateFadeInRight">
        <div class="col-sm-12">
          <div class="abt_txt">
            <div class="container">
                 <div class="row cart-body">
                <form class="form-horizontal" method="post" action="" onsubmit="return checkvalidation();">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                        	<?php
							if(isset($_SESSION["cart_item"])){
    							$item_total = 0;
								foreach ($_SESSION["cart_item"] as $item){
				 			?>
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                      <?php if($item["product_image"]!=''){?>
                            			<img class="img-responsive" src="admin/uploads/product/<?php echo $item["product_image"]?>"/>
                        			<?php }else{?>
                            			<img class="img-responsive" src="img/np.png"/>
                     				<?php }?>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                     <div class="col-xs-12"><?php echo $item["product_name"]; ?></div>
                                    <div class="col-xs-12"><small>Quantity:<span><?php echo $item["quantity"]?></span></small></div>
                                    <div class="col-xs-12"><small>Price:<span><?php echo $item["price"]?></span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>$</span><?php echo $item["price"]*$item["quantity"];?></h6>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <?php
							$item_total += ($item["price"]*$item["quantity"]);
							 }?>
                           
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span><?php echo $item_total; ?></span></div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="" />
                                    <label id="first_nameerror"></label>
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" id="last_name" class="form-control" value="" />
                                    <label id="last_nameerror"></label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                   
                                   <select name="country_id" id="country_id" class="form-control cities">
                                    <option value="">Select Country</option>
                                    <?php
                                   if (!empty($product_array)) { 
                                        foreach($product_array as $key=>$value){
                                       // while($row = $query->fetch_assoc()){ 
                                       ?>
                                            <option value="<?php echo $product_array[$key]['id']?>"><?php echo $product_array[$key]['name']?></option>
                                       <?php     
                                        }
                                    }else{
                                        echo '<option value="">Country not available</option>';
                                    }
                                    ?>
                                </select>
                                 <label id="countryerror"></label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>State:</strong></div>
                                <div class="col-md-12">
                                   <select name="state" id="state" class="form-control cities">
        								<option value="">Select state</option>
    								</select>
                                    <label id="stateerror"></label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                	 <select name="city" id="city" class="form-control cities">
        								<option value="">Select city</option>
    								</select>
                                    <!--<select name="city" class="form-control cities" id="cityId" required="required">
										<option value="">Select City</option>
									</select>-->
                                    <label id="cityerror"></label>
                                </div>
                            </div>
                             <script src="js/jquery-1.11.3.min.js"></script>
							<script type="text/javascript">
							$(document).ready(function(){
								$('#country_id').on('change',function(){
									var countryID = $(this).val();
									
									if(countryID){
										$.ajax({
											type:'POST',
											url:'ajaxData.php',
											data:'country_id='+countryID,
											success:function(html){
												$('#state').html(html);
												$('#city').html('<option value="">Select city </option>'); 
											}
										}); 
									}else{
										$('#state').html('<option value="">Select state </option>');
										$('#city').html('<option value="">Select city </option>'); 
									}
								});
								
								$('#state').on('change',function(){
									var stateID = $(this).val();
									if(stateID){
										$.ajax({
											type:'POST',
											url:'ajaxData.php',
											data:'state='+stateID,
											success:function(html){
												$('#city').html(html);
											}
										}); 
									}else{
										$('#city').html('<option value="">Select city </option>'); 
									}
								});
							});
							</script>
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" id="address" class="form-control" value="" />
                                    <label id="addresserror"></label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" id="zip_code" class="form-control" value="" />
                                    <label id="ziperror"></label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12">
                                	<input type="text" name="phone_number" id="phone_number" class="form-control" value="" />
                                    <label id="phoneerror"></label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12">
                                	<input type="text" name="email_address" class="form-control" id="emailaddress" value="" />
                                    <label id="emailerror"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" name="payment" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
<script>
function checkvalidation(){
		//var xx=$("#pricefrom").val();
		//alert(xx);
  		if($("#first_name").val() == "" ){
   			$("#first_name").focus();
			$("#first_nameerror").show();
   			$("#first_nameerror").html("Please Enter First Name");
   			return false;
  		}else{
			$("#first_nameerror").hide();
			//alert("khjkjhkhkjh");
		}
		
		if($("#last_name").val() == "" ){
   			$("#last_name").focus();
			$("#last_nameerror").show();
   			$("#last_nameerror").html("Please Enter Last Name");
   			return false;
  		}else{
			$("#last_nameerror").hide();
			//alert("khjkjhkhkjh");
		}
		
		if($("#country_id").val() == "" ){
   			$("#country_id").focus();
			$("#countryerror").show();
   			$("#countryerror").html("Please Select Country");
   			return false;
  		}else{
			$("#countryerror").hide();
			//alert("khjkjhkhkjh");
		}
		
		if($("#state").val() == "" ){
   			$("#state").focus();
			$("#stateerror").show();
   			$("#stateerror").html("Please Select State");
   			return false;
  		}else{
			$("#stateerror").hide();
			//alert("khjkjhkhkjh");
		}
		
		if($("#city").val() == "" ){
   			$("#city").focus();
			$("#cityerror").show();
   			$("#cityerror").html("Please Select City");
   			return false;
  		}else{
			$("#cityerror").hide();
			//alert("khjkjhkhkjh");
		}
		
		if($("#address").val() == "" ){
   			$("#address").focus();
			$("#addresserror").show();
   			$("#addresserror").html("Please Enter Address");
   			return false;
  		}else{
			$("#addresserror").hide();
			//alert("khjkjhkhkjh");
		}
		
		
		if($("#zip_code").val() == "" ){
   			$("#zip_code").focus();
			$("#ziperror").show();
   			$("#ziperror").html("Please Enter Zipcode");
   			return false;
  		}else{
			$("#ziperror").hide();
			//alert("khjkjhkhkjh");
		}
		
		
		if($("#phone_number").val() == "" ){
   			$("#phone_number").focus();
			$("#phoneerror").show();
   			$("#phoneerror").html("Please Enter Phone Number");
   			return false;
  		}else{
			$("#phoneerror").hide();
			//alert("khjkjhkhkjh");
		}
		
		if($("#emailaddress").val() == "" ){
   			$("#emailaddress").focus();
			$("#emailerror").show();
   			$("#emailerror").html("Please Enter Email");
   			return false;
  		}else{
			$("#emailerror").hide();
			//alert("khjkjhkhkjh");
		}
 	}
</script>
<style>
#emailerror{ color:#F00;}
#phoneerror{ color:#F00;}
#ziperror{ color:#F00;}
#addresserror{ color:#F00;}
#cityerror{ color:#F00;}
#stateerror{ color:#F00;}
#countryerror{ color:#F00;}
#last_nameerror{ color:#F00;}
#first_nameerror{ color:#F00;}

</style>
<?php include"lib/footercms.php";?>

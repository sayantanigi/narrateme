<?php 
//session_start();
include"lib/headercart.php";
require_once("lib/dbcontroller.php");
$db_handle = new DBController();
	
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
			if(!empty($_POST["quantity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
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
}
?>
<style>
.glyphicon {margin-right:5px;}
.thumbnail {margin-bottom: 20px;padding: 3px;-webkit-border-radius: 0px;-moz-border-radius: 0px;border-radius: 0px;}
.thumbnail a{color:#0A6EBD;}
.item.list-group-item {float: none;width: 100%;background-color: #fff;margin-bottom: 10px;}
.item.list-group-item:nth-of-type(odd):hover, .item.list-group-item:hover {background: #428bca;}
.item.list-group-item .list-group-image {margin-right: 10px;}
.item.list-group-item .thumbnail {margin-bottom: 0px;}
.item.list-group-item .caption {padding: 9px 9px 0px 9px;}
.item.list-group-item:nth-of-type(odd) {background: #eeeeee;}
.item.list-group-item:before, .item.list-group-item:after {display: table;content: " ";}
.item.list-group-item img {float: left;}
.item.list-group-item:after {clear: both;}
.list-group-item-text {margin: 0 0 11px;}
.group.list-group-image {height: 250px; width: 100%;}
.button_cart{background-color: #d18c13; border: 0 none; border-radius: 5px; color: #fff; padding: 5px;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#list').click(function(event) {
    	event.preventDefault();$('#products .item').addClass('list-group-item');
    });

    $('#grid').click(function(event) {
    	event.preventDefault();$('#products .item').removeClass('list-group-item');
    	$('#products .item').addClass('grid-group-item');
    });
});
</script>
<section class="body_content">
<div class="page_header">
  	<div class="over_bg"></div>
  	<div class="block-header text-center">
  		<h2>Product List</h2>
  	</div>
</div>
<div class="inner_content">
  	<div class="" id="page-1">
    	<div class="bb-custom-container card-body card-padding card">
      		<div class="row content-block text-justify animateFadeInRight">
        		<div class="col-sm-12">
          			<div class="abt_txt">
            			<div class="container">
              				<div class="well well-sm"> <strong>Display</strong>
                				<div class="btn-group"> 
                					<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span>List</a> 
                					<a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Grid</a>
                				</div>
          					</div>
          					<div id="products" class="row list-group">
          					<?php $product_array = $db_handle->runQuery("SELECT * FROM `product`  where  `status`='1'");
          					if (!empty($product_array)) { 
								foreach($product_array as $key=>$value) { ?>	
                				<div class="item  col-xs-3 col-lg-3">
                  					<div class="thumbnail"> 
                  						<a href="<?php echo $product_array[$key]['sku'] ?>">
                  						<?php if($product_array[$key]["product_image"]!='') { ?>
                        				<img class="group list-group-image" src="admin/uploads/product/<?php echo $product_array[$key]['product_image']?>" height="250" width="400" />
				                        <?php }else{?>
		                            	<img class="group list-group-image" src="img/np.png" height="250" width="400" />
				                     	<?php }?>
                        				</a>
                    					<div class="caption">
                      						<h4 class="group inner list-group-item-heading"> <a href="product_detail.php?id=<?php echo base64_encode($product_array[$key]['product_id'])?>"><?php echo ucwords($product_array[$key]['product_name']); ?></a></h4>
                  							<p class="group inner list-group-item-text"> <?php echo ucfirst(strip_tags(substr($product_array[$key]['description'],0,100)));?></p>
					                      	<div class="row">
				                        		<div class="col-xs-3 col-md-3"><p class="lead"> $<?php echo $product_array[$key]['price']?></p></div>
				                        	</div>
                    					</div>
                  					</div>
                				</div>
          						<?php } } else { ?>  
              	 				<div class="item  col-xs-12 col-lg-12">No Product Found</div>
              					<?php } ?>
              				</div>
        				</div>
          			</div>
        		</div>
      		</div>
		</div>
  	</div>
</div>
</section>
<?php include"lib/footercms.php";?>

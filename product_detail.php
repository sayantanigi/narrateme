<?php
//session_start();
include "lib/headercart.php";
require_once ("lib/dbcontroller.php");
$db_handle = new DBController();
//$view=getAnyTableWhereData('product', " AND code='".$_GET["code"]."' ");

if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
		case "add":
			if (!empty($_POST["quantity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));

				if (!empty($_SESSION["cart_item"])) {
					if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
						foreach ($_SESSION["cart_item"] as $k => $v) {
							if ($productByCode[0]["code"] == $k) {
								if (empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
			break;
		case "remove":
			if (!empty($_SESSION["cart_item"])) {
				foreach ($_SESSION["cart_item"] as $k => $v) {
					if ($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if (empty($_SESSION["cart_item"]))
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
	.color,.size{margin-right:10px}.quintity{text-align:center;border-radius:5px;font-weight:600;border-style:solid;height:35px;width:70px}.action .button_cart{background:#576042;padding:0 20px;height:40px;border-radius:50px;font-size:14px;margin-left:10px}.button_cart{background-color:#d18c13;border:0;border-radius:5px;color:#fff;padding:5px}img{max-width:100%}.preview{display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;flex-direction:column;height:400px}@media screen and (max-width:996px){.preview{margin-bottom:20px}}.preview-pic{-webkit-box-flex:1;-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1;max-height:fit-content}.tab-content>.active{display:block;height:400px}.preview-thumbnail.nav-tabs{border:none;margin-top:15px}.preview-thumbnail.nav-tabs li{width:18%;margin-right:2.5%}.preview-thumbnail.nav-tabs li img{max-width:100%;display:block}.preview-thumbnail.nav-tabs li a{padding:0;margin:0}.preview-thumbnail.nav-tabs li:last-of-type{margin-right:0}.tab-content{overflow:hidden;padding:0}.tab-content img{width:100%;height:400px;-webkit-animation-name:opacity;animation-name:opacity;-webkit-animation-duration:.3s;animation-duration:.3s;border-radius:5px;object-fit:cover}.card{margin-top:0;padding:25px;line-height:1.5em;margin-bottom:0;box-shadow:rgba(50,50,93,.25) 0 13px 27px -5px,rgba(0,0,0,.3) 0 8px 16px -8px;border-radius:10px}.price,.product-title{font-style:normal;margin-bottom:15px!important}@media screen and (min-width:997px){.wrapper{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}}.details{display:flex;flex-direction:column;height:400px}.colors{-webkit-box-flex:1;-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1}.product-title{margin-top:0;text-transform:uppercase;font-size:20px}.add-to-cart,.colors,.like,.price,.product-title,.sizes{text-transform:UPPERCASE;font-weight:700}.price{display:block}.checked,.price span{color:#576042}.product-description{color:#504e5a}.price,.product-description,.product-title,.rating,.sizes,.vote{margin-bottom:15px}.size:first-of-type{margin-left:40px}.color{display:inline-block;vertical-align:middle;height:2em;width:2em;border-radius:2px}.color:first-of-type{margin-left:20px}.add-to-cart,.like{background:#d18c13;padding:1.2em 1.5em;border:none;color:#fff;-webkit-transition:background .3s;transition:background .3s}.add-to-cart:hover,.like:hover{background:#b36800;color:#fff}.not-available{text-align:center;line-height:2em}.not-available:before{font-family:fontawesome;content:"\f00d";color:#fff}.orange{background:#ff9f1a}.green{background:#85ad00}.blue{background:#0076ad}.tooltip-inner{padding:1.3em}@-webkit-keyframes opacity{0%{opacity:0;-webkit-transform:scale(3);transform:scale(3)}100%{opacity:1;-webkit-transform:scale(1);transform:scale(1)}}@keyframes opacity{0%{opacity:0;-webkit-transform:scale(3);transform:scale(3)}100%{opacity:1;-webkit-transform:scale(1);transform:scale(1)}}
</style>
<section class="body_content" style="padding: 0;">
	<div class="page_header">
		<div class="over_bg"></div>
		<div class="block-header text-center">
			<h2>Product Details</h2>
			<p>In hendrerit, sem sit amet blandit imperdiet, leo lacus tincidunt lorem, vel mollis lorem orci a lacus. Nullam at metus efficitur, venenatis diam nec, finibus dolor. Nullam euismod luctus mi. Integer dictum lacus et efficitur convallis.</p>
		</div>
	</div>
	<div class="inner_content">
		<div class="" id="page-1">
			<div class="Product_Body">
				<div class="row">
					<div class="col-sm-12">
						<div class="abt_txt">
							<div class="card">
								<?php $product_array = $db_handle->runQuery("SELECT * FROM `product`  where `product_id`='" . @$_GET['id'] . "'"); ?>
								<div class="container-fliud">
									<div class="wrapper row">
										<div class="preview col-md-6">
											<div class="preview-pic tab-content">
												<div class="tab-pane active" id="pic-1">
													<?php if ($product_array[0]["product_image"] != '') { ?>
													<img class="group list-group-image" src="uploads/fullsize/<?php echo $product_array[0]['product_image'] ?>" height="250" width="400" />
													<?php } else { ?>
													<img class="group list-group-image" src="img/np.png" height="250" width="400" />
													<?php } ?>
												</div>
											</div>
										</div>
										<div class="details col-md-6">
											<h3 class="product-title"><?php echo $product_array[0]['product_name'] ?></h3>
											<div class="rating">
												<p class="product-description"><?php echo strip_tags($product_array[0]['description']); ?></p>
												<h4 class="price">current price : <span>$<?php echo $product_array[0]['price'] ?></span></h4>
												<div class="action">
													<form method="post" action="product_cart.php?action=add&code=<?php echo $product_array[0]['code']; ?>">
														<input class="quintity" type="number" id="quantity" name="quantity" value="1" size="2"/>
														<div style="display: inline-block;width: auto;">
															<span id="plus"> <i class="fa fa-plus" aria-hidden="true"></i> </span>
															<span id="minus"> <i class="fa fa-minus" aria-hidden="true"></i> </span>
														</div>
														<input class="button_cart" value="Add to cart" type="submit">
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "lib/footercms.php"; ?>
<style>
#plus{display: inline-block; position: absolute; bottom: auto; top: 148px; font-size: 17px; margin-left: 7px; cursor: pointer;}
#minus{display: inline-block; position: absolute; bottom: 215px; top: auto; font-size: 17px; margin-left: 7px; cursor: pointer;}
.action .button_cart{margin-left: 30px !important;}
</style>
<script type="text/javascript">
$(function() {
	var value = $('#quantity').val();
	$('#plus').click(function() {
		value++;
		$('#quantity').val(value);
	})
	$('#minus').click(function() {
		if(value == 0)return;
		value--;
		$('#quantity').val(value);
	})
});
</script>
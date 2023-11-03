<?php
//session_start();
include "lib/headercart.php";
require_once("lib/dbcontroller.php");
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
	.quintity {
		text-align: center;
		border-radius: 5px;
		font-weight: 600;
		border-style: solid;
		height: 35px;
		width: 70px;
	}

	.action .button_cart {
		background: #576042;
		padding: 0 20px;
		height: 40px;
		border-radius: 50px;
		font-size: 14px;
		margin-left: 10px;
	}

	.button_cart {
		background-color: #d18c13;
		border: 0 none;
		border-radius: 5px;
		color: #fff;
		padding: 5px;
	}

	img {
		max-width: 100%;
	}

	.preview {
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		flex-direction: column;
		height: 400px;
	}

	@media screen and (max-width: 996px) {
		.preview {
			margin-bottom: 20px;
		}
	}

	.preview-pic {
		-webkit-box-flex: 1;
		-webkit-flex-grow: 1;
		-ms-flex-positive: 1;
		flex-grow: 1;
		max-height: fit-content;
	}

	.tab-content>.active {
		display: block;
		height: 400px;
	}

	.preview-thumbnail.nav-tabs {
		border: none;
		margin-top: 15px;
	}

	.preview-thumbnail.nav-tabs li {
		width: 18%;
		margin-right: 2.5%;
	}

	.preview-thumbnail.nav-tabs li img {
		max-width: 100%;
		display: block;
	}

	.preview-thumbnail.nav-tabs li a {
		padding: 0;
		margin: 0;
	}

	.preview-thumbnail.nav-tabs li:last-of-type {
		margin-right: 0;
	}

	.tab-content {
		overflow: hidden;
		padding: 0;
	}

	.tab-content img {
		width: 100%;
		height: 400px;
		-webkit-animation-name: opacity;
		animation-name: opacity;
		-webkit-animation-duration: .3s;
		animation-duration: .3s;
		border-radius: 5px;
		object-fit: cover;
	}

	.card {
		margin-top: 0;
		padding: 25px;
		line-height: 1.5em;
		margin-bottom: 0;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
		border-radius: 10px;
	}

	@media screen and (min-width: 997px) {
		.wrapper {
			display: -webkit-box;
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
		}
	}

	.details {
		display: flex;
		flex-direction: column;
		height: 400px;
	}

	.colors {
		-webkit-box-flex: 1;
		-webkit-flex-grow: 1;
		-ms-flex-positive: 1;
		flex-grow: 1;
	}

	.product-title {
		margin-top: 0;
		font-style: normal;
		text-transform: uppercase;
		margin-bottom: 15px !important;
		font-size: 20px;
	}

	.price {
		font-style: normal;
		margin-bottom: 15px !important;
		display: block;
	}

	.product-title,
	.price,
	.sizes,
	.colors {
		text-transform: UPPERCASE;
		font-weight: bold;
	}

	.checked,
	.price span {
		color: #576042;
	}

	.product-description {
		color: #504e5a;
	}

	.product-title,
	.rating,
	.product-description,
	.price,
	.vote,
	.sizes {
		margin-bottom: 15px;
	}

	.size {
		margin-right: 10px;
	}

	.size:first-of-type {
		margin-left: 40px;
	}

	.color {
		display: inline-block;
		vertical-align: middle;
		margin-right: 10px;
		height: 2em;
		width: 2em;
		border-radius: 2px;
	}

	.color:first-of-type {
		margin-left: 20px;
	}

	.add-to-cart,
	.like {
		background: #D18C13;
		padding: 1.2em 1.5em;
		border: none;
		text-transform: UPPERCASE;
		font-weight: bold;
		color: #fff;
		-webkit-transition: background .3s ease;
		transition: background .3s ease;
	}

	.add-to-cart:hover,
	.like:hover {
		background: #b36800;
		color: #fff;
	}

	.not-available {
		text-align: center;
		line-height: 2em;
	}

	.not-available:before {
		font-family: fontawesome;
		content: "\f00d";
		color: #fff;
	}

	.orange {
		background: #ff9f1a;
	}

	.green {
		background: #85ad00;
	}

	.blue {
		background: #0076ad;
	}

	.tooltip-inner {
		padding: 1.3em;
	}

	@-webkit-keyframes opacity {
		0% {
			opacity: 0;
			-webkit-transform: scale(3);
			transform: scale(3);
		}

		100% {
			opacity: 1;
			-webkit-transform: scale(1);
			transform: scale(1);
		}
	}

	@keyframes opacity {
		0% {
			opacity: 0;
			-webkit-transform: scale(3);
			transform: scale(3);
		}

		100% {
			opacity: 1;
			-webkit-transform: scale(1);
			transform: scale(1);
		}
	}
</style>
<section class="body_content" style="padding: 0;">
	<div class="page_header">
		<div class="over_bg"></div>
		<div class="block-header text-center">
			<h2>Product Details</h2>
			<p>
				In hendrerit, sem sit amet blandit imperdiet, leo lacus tincidunt lorem, vel mollis lorem orci a lacus. Nullam at metus efficitur, venenatis diam nec, finibus dolor. Nullam euismod luctus mi. Integer dictum lacus et efficitur convallis.
			</p>
		</div>
	</div>
	<div class="inner_content">
		<div class="" id="page-1">
			<div class="Product_Body">
				<div class="row">
					<div class="col-sm-12">
						<div class="abt_txt">
							<div class="card">
								<?php
								//echo "SELECT * FROM `product`  where `code`='".$_GET['code']."'";
								$product_array = $db_handle->runQuery("SELECT * FROM `product`  where `code`='" . @$_GET['code'] . "'");
								if (!empty($product_array)) {
									foreach ($product_array as $key => $value) {
								?>
										<div class="container-fliud">
											<div class="wrapper row">
												<div class="preview col-md-6">
													<div class="preview-pic tab-content">
														<div class="tab-pane active" id="pic-1">
															<?php if ($product_array[$key]["product_image"] != '') { ?>
																<img class="group list-group-image" src="uploads/fullsize/<?php echo $product_array[$key]['product_image'] ?>" height="250" width="400" />
															<?php } else { ?>
																<img class="group list-group-image" src="img/np.png" height="250" width="400" />
															<?php } ?>
															<!-- <img src="http://placekitten.com/400/252" />-->
														</div>
													</div>
												</div>
												<div class="details col-md-6">
													<h3 class="product-title"><?php echo $product_array[$key]['product_name'] ?></h3>
													<div class="rating">
														<!-- <div class="stars"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> </div>
                        <span class="review-no">41 reviews</span> </div>-->
														<p class="product-description"><?php echo strip_tags($product_array[$key]['description']); ?></p>
														<h4 class="price">current price : <span>$<?php echo $product_array[$key]['price'] ?></span></h4>
														<!-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                      <h5 class="sizes">sizes: <span class="size" data-toggle="tooltip" title="small">s</span> <span class="size" data-toggle="tooltip" title="medium">m</span> <span class="size" data-toggle="tooltip" title="large">l</span> <span class="size" data-toggle="tooltip" title="xtra large">xl</span> </h5>
                      <h5 class="colors">colors: <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span> <span class="color green"></span> <span class="color blue"></span> </h5>-->
														<div class="action">
															<form method="post" action="product_cart.php?action=add&code=<?php echo $product_array[$key]['code']; ?>">
																<!--<button class="add-to-cart btn btn-default" type="button">add to cart</button>-->
																<input class="quintity" type="text" name="quantity" value="1" size="2" />
																<input class="button_cart" value="Add to cart" type="submit">
															</form>

														</div>
													</div>
												</div>
											</div>
									<?php
									}
								}
									?>
										</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>
<?php include "lib/footercms.php"; ?>
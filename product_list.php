<?php
//session_start();
include "lib/headercart.php";
require_once("lib/dbcontroller.php");
$db_handle = new DBController();

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
	.glyphicon {
		margin-right: 5px;
	}

	#products .item {
		margin-bottom: 2%;
		background: none;
	}

	#products.Landscape {
		display: flex;
		flex-wrap: wrap;
	}

	.Landscape .list-group-item:nth-child(odd) {
		margin-right: 2%;
	}

	.thumbnail {
		box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
		border-radius: 10px;
		border: 0;
		margin-bottom: 0;
		padding: 0;
	}

	.thumbnail a {
		color: #0A6EBD;
	}

	.list-group-item {
		padding: 0;
	}

	.item.list-group-item {
		float: none;
		width: 48%;
		background-color: #fff;
		margin-bottom: 10px;
	}

	/* .item.list-group-item:nth-of-type(odd):hover,
	.item.list-group-item:hover {
		background: #428bca;
	} */

	.item.list-group-item .list-group-image {
		margin-right: 10px;
	}

	.item.list-group-item .thumbnail {
		margin-bottom: 0px;
	}

	.item.list-group-item .caption {
		padding: 9px 9px 0px 9px;
	}

	/* .item.list-group-item:nth-of-type(odd) {
		background: #eeeeee;
	} */

	.item.list-group-item:before,
	.item.list-group-item:after {
		display: table;
		content: " ";
	}

	.item.list-group-item img {
		float: left;
	}

	.item.list-group-item:after {
		clear: both;
	}

	.list-group-item-text {
		margin: 0 0 11px;
	}

	.group.list-group-image {
		height: 250px;
		width: 100%;
		object-fit: cover;
		border-radius: 10px 10px 0 0;
	}

	.button_cart {
		background-color: #d18c13;
		border: 0 none;
		border-radius: 5px;
		color: #fff;
		padding: 5px;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('#list').click(function(event) {
			event.preventDefault();
			$('#products .item').addClass('list-group-item');
		});
		$('#grid').click(function(event) {
			event.preventDefault();
			$('#products .item').removeClass('list-group-item');
			$('#products .item').addClass('grid-group-item');
		});
	});
</script>
<script>
	$(document).ready(function() {
		$("#list").click(function() {
			$("#products").addClass("Landscape");
		});
		$("#grid").click(function() {
			$("#products").removeClass("Landscape");
		});
	});
</script>
<section class="body_content" style="padding: 0;">
	<div class="page_header">
		<div class="over_bg"></div>
		<div class="block-header text-center">
			<h2>Product List</h2>
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
						<div class="well">
							<div class="well-heading">
								<p>Product View</p>
							</div>
							<div class="btn-group">
								<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span>List</a>
								<a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Grid</a>
							</div>
						</div>
						<div class="abt_txt">
							<div id="products" class="row list-group" style="margin: 0;">
								<?php $product_array = $db_handle->runQuery("SELECT * FROM `product`  where  `status`='1'");
								if (!empty($product_array)) {
									foreach ($product_array as $key => $value) { ?>
										<div class="item  col-xs-3 col-lg-3">
											<div class="thumbnail">
												<a href="<?php echo $product_array[$key]['sku'] ?>">
													<?php if ($product_array[$key]["product_image"] != '') { ?>
														<img class="group list-group-image" src="uploads/fullsize/<?php echo $product_array[$key]['product_image'] ?>" height="250" width="400" />
													<?php } else { ?>
														<img class="group list-group-image" src="img/np.png" height="250" width="400" />
													<?php } ?>
												</a>
												<div class="caption">
													<h4 class="group inner list-group-item-heading"> <a href="product_detail.php?id=<?php echo $product_array[$key]['product_id']?>"><?php echo $product_array[$key]['product_name'] ?></a></h4>
													<p class="Product-Des group inner list-group-item-text"> <?php echo strip_tags($product_array[$key]['description']) ?></p>
													<p class="lead Product-Price"> $<?php echo $product_array[$key]['price'] ?></p>
												</div>
											</div>
										</div>
									<?php }
								} else { ?>
									<div class="item  col-xs-12 col-lg-12">No Product Found</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "lib/footercms.php"; ?>
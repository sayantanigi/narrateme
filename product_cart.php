<?php 
    include"lib/headercart.php";
    require_once("lib/dbcontroller.php");
    $db_handle = new DBController();
    
    if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
        if(!empty($_POST["quantity"])) {
            $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
            $itemArray = array($productByCode[0]["code"]=>array('product_name'=>$productByCode[0]["product_name"], 'code'=>$productByCode[0]["code"],'product_image'=>$productByCode[0]["product_image"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
            
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
.img-responsive {width: 100%;}
</style>
<section class="body_content">
    <div class="page_header">
        <div class="over_bg"></div>
        <div class="block-header text-center">
            <h2> Cart List </h2>
        </div>
    </div>
    <div class="inner_content">
        <div class="" id="page-1">
            <div class="bb-custom-container card-body card-padding card">
                <div class="row content-block text-justify animateFadeInRight">
                    <div class="col-sm-12">
                        <div class="abt_txt	">
                            <div class="container">
                                <div id="shopping-cart">
                                <?php if(isset($_SESSION["cart_item"])) {
                                $item_total = 0; ?>
                                    <div class="table-responsive">
                                        <table cellpadding="10" cellspacing="1" class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th style="text-align:left; width:10%;"><strong>Image</strong></th>
                                                    <th style="text-align:left;"><strong>Name</strong></th>
                                                    <th style="text-align:left;"><strong>Code</strong></th>
                                                    <th style="text-align:center;"><strong>Quantity</strong></th>
                                                    <th style="text-align:right;"><strong>Price</strong></th>
                                                    <th style="text-align:right;"><strong>Total</strong></th>
                                                    <th style="text-align:right;"><strong>Action</strong></th>
                                                </tr>
                                                <?php foreach ($_SESSION["cart_item"] as $item){ ?>
                                                <tr>
                                                    <td style="text-align:left; border-bottom:#F0F0F0 1px solid;">
                                                        <?php if($item["product_image"]!=''){?>
                                                        <img class="img-responsive" src="admin/uploads/product/<?php echo $item["product_image"]?>"/>
                                                        <?php }else{?>
                                                        <img class="img-responsive" src="img/np.png"/>
                                                        <?php }?>
                                                    </td>
                                                    <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["product_name"]; ?></strong></td>
                                                    <td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
                                                    <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                                                    <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
                                                    <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]*$item["quantity"]; ?></td>

                                                    <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><a href="product_cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btn btn-danger" style="color:#fff;">Remove Item</a></td>
                                                </tr>
                                                <?php $item_total += ($item["price"]*$item["quantity"]); } ?>
                                                <tr>
                                                    <td colspan="7" align="right"><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
                                                </tr>
                                                <tr>
                                                    <td> &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td> &nbsp; </td>
                                                    <td align="right"><a style="color:#fff;"  class="btn btn-danger waves-effect" id="btnEmpty" href="product_cart.php?action=empty">Empty Cart</a> </td>
                                                    <td align="right">
                                                        <a href="product_list.php" class="btn btn-default" style="color:#000;"><span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</a>
                                                    </td>
                                                    <td style="text-align:right;">
                                                        <a href="checkout.php" class="btn btn-success" style="color:#000;"><span class="glyphicon glyphicon-shopping-cart"></span> Checkout</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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

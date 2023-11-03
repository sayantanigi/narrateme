<?php
//ob_start();
//session_start();
include "lib/headercart.php";
require_once("lib/dbcontroller.php");
$db_handle = new DBController();

if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":
      if (!empty($_POST["quantity"])) {
        $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
        $itemArray = array($productByCode[0]["code"] => array('product_name' => $productByCode[0]["product_name"], 'code' => $productByCode[0]["code"], 'product_image' => $productByCode[0]["product_image"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"]));

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
  .img-responsive {
    width: 100%;
  }

  .card {
    margin-top: 0;
    padding: 25px;
    line-height: 1.5em;
    margin-bottom: 0;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
    border-radius: 10px;
  }

  .card .Cart-Table {
    height: auto;
  }

  .Custom-Table {
    table-layout: fixed;
  }

  .Custom-Table thead tr th {
    padding: 10px !important;
    vertical-align: middle;
    border: 1px solid #e7e7e7;
    background: #576042;
    color: #fff;
  }

  .Custom-Table tbody tr td {
    padding: 10px !important;
    vertical-align: middle;
    border: 1px solid #e7e7e7;
    font-size: 15px;
  }

  .Custom-Table tbody tr td .btn-danger,
  .Custom-Table tbody tr td .btn-success,
  .Custom-Table tbody tr td .btn-default {
    border-radius: 50px;
    padding: 10px 15px;
    color: #fff !important;
  }

  .Custom-Table tbody tr td .btn-default {
    background: #576042;
  }

  .Custom-Table tbody tr td .btn-default:hover {
    background: #576042;
  }

  .Custom-Table tbody tr td .Total {
    font-size: 18px;
    font-weight: 600;
  }
</style>
<section class="body_content">
  <div class="page_header">
    <div class="over_bg"></div>
    <div class="block-header text-center">
      <h2>Cart List</h2>
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
                <div id="shopping-cart">

                  <?php
                  if (isset($_SESSION["cart_item"])) {
                    $item_total = 0;
                  ?>
                    <div class="table-responsive">
                      <table cellpadding="10" cellspacing="1" class="table table-hover Cart-Table Custom-Table">
                        <thead>
                          <tr>
                            <th style="text-align:left; width: 150px;"><strong>Image</strong></th>
                            <th style="text-align:left;"><strong>Name</strong></th>
                            <th style="text-align:left;"><strong>Code</strong></th>
                            <th style="text-align:right;"><strong>Quantity</strong></th>
                            <th style="text-align:right;"><strong>Price</strong></th>
                            <th style="text-align:right;"><strong>Total</strong></th>
                            <th style="text-align:center;"><strong>Action</strong></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($_SESSION["cart_item"] as $item) {
                          ?>
                            <tr>
                              <td style="width: 150px;">
                                <?php if ($item["product_image"] != '') { ?>
                                  <img class="img-responsive" src="uploads/fullsize/<?php echo $item["product_image"] ?>" />
                                <?php } else { ?>
                                  <img class="img-responsive" src="img/np.png" />
                                <?php } ?>
                              </td>
                              <td style="text-align:left;"><strong><?php echo $item["product_name"]; ?></strong></td>
                              <td style="text-align:left;"><?php echo $item["code"]; ?></td>
                              <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                              <td style="text-align:right;"><?php echo "$" . $item["price"]; ?></td>
                              <td style="text-align:right;"><?php echo "$" . $item["price"] * $item["quantity"]; ?></td>
                              <td style="text-align:center;"><a href="product_cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btn btn-danger" style="color:#fff;">Remove Item</a></td>
                            </tr>
                          <?php
                            $item_total += ($item["price"] * $item["quantity"]);
                          }
                          ?>
                          <tr>
                            <td colspan="7" align="right"><span class="Total">Total: <?php echo "$" . $item_total; ?></span></td>
                          </tr>
                          <tr>
                            <td colspan="7" style="text-align: right;">
                              <a style="color:#fff;" class="btn btn-danger waves-effect" id="btnEmpty" href="product_cart.php?action=empty">Empty Cart</a>
                              <a href="product_list.php" class="btn btn-default" style="margin: 0 10px;"><span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping</a>
                              <!--<button type="button" class="btn btn-success" > Checkout <span class="glyphicon glyphicon-play"></span> </button>-->
                              <a href="checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span> Checkout</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  <?php
                  }
                  ?>
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
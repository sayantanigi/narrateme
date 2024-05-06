<?php
include ('lib/inner_header.php');
sequre();
$view = getAnyTableWhereData('na_member', " AND username='" . $_SESSION["username"] . "' ");
$viewmember = getAnyTableWhereData('na_member', " AND id='" . $_SESSION["userid"] . "' ");
if (isset($_REQUEST['add_product'])) {
    extract($_POST);
    if (isset($_FILES['image'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "uploads/fullsize/" . $file_name);
            $data = array('categori_id' => $categori_id, 'manufacturer' => $manufacturer, 'product_name' => $product_name, 'price' => $Price, 'sale_price' => $SalePrice, 'description' => $description, 'sku' => $sku, 'supplier_id' => $supplier_id, 'discount' => $discount, 'quantity' => $quantity, 'product_add_date' => date('Y-m-d'), 'supplier_id' => $_SESSION["userid"], 'product_image' => $file_name);
            $result = insertData($data, 'product');
            header('location:add_product.php?op=add');
        } else {
            header('location:add_product.php?op=inv');
        }
    } else {
        $data = array('categori_id' => $categori_id, 'manufacturer' => $manufacturer, 'product_name' => $product_name, 'sale_price' => $SalePrice, 'price' => $Price, 'description' => $description, 'sku' => $sku, 'supplier_id' => $supplier_id, 'discount' => $discount, 'quantity' => $quantity, 'product_add_date' => date('Y-m-d'), 'supplier_id' => $_SESSION["userid"]);
        $result = insertData($data, 'product');
        header('location:add_product.php?op=add');
    }
}
?>
<style>
td {text-align: center;}
th {text-align: center;}
fieldset .form-group,fieldset .col-lg-2 {padding-left: 0;}
fieldset .form-group label {font-weight: bold; color: #576042; margin-bottom: 5px;}
.submit-btn {background-color: #576042; color: #fff; border: 0; border-radius: 100px; padding: 5px 15px;}
</style>
<section id="main">
    <?php include ('lib/aside.php'); ?>
    <section id="content">
        <div class="container Main_Container">
            <div class="block-header">
                <h2>Welcome Back <span style="color:#666; font-weight:400; margin-bottom: 15px !important;"><?php echo $view['first_name'] . " " . $view['last_name'] ?></span></h2>
            </div>
            <div id="profile-main" class="card" style="margin-top: 20px !important;">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" style="padding: 20px;">
                    <fieldset>
                        <div class=" col-lg-12 form-group">
                            <label class="col-lg-2" for="ProductType" style="margin-top:11px;">Product Name</label>
                            <div class="col-lg-4">
                                <input type="text" id="name" name="product_name" placeholder="Product Name" class="form-control name">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="SKU" style="margin-top:11px;">Sale Website Link</label>
                            <div class="col-lg-4">
                                <input type="text" id="sku" name="sku" placeholder="" class="form-control sku">
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="Published">Published</label>
                            <div class="col-lg-4">
                                <input type="radio" value="0" name="Published" class="input-xlarge">
                                <span>No</span>
                                <input type="radio" value="1" name="Published" checked class="input-xlarge">
                                <span>Yes</span>
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="Price" style="margin-top:12px;">Price</label>
                            <div class="col-lg-4">
                                <input type="text" id="price" name="Price" placeholder="" class="form-control price">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="CurrentInventory" style="margin-top:10px;">Image</label>
                            <div class="col-lg-4">
                                <input type="file" name="image" />
                            </div>
                        </div>

                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="SizeSKUModifier">Product Description</label>
                            <div class="col-lg-10">
                                <textarea name="description" id="pagedes"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <input class="submit-btn" type="submit" name="add_product" />
                        </div>
                    </fieldset>
                </form>
                <!--<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="frmimage" id="" enctype="multipart/form-data">
                    <fieldset>
                        <div class="col-lg-12 form-group margin50">
                            <label class="col-lg-2"  for="Name" style="margin-top:11px;">Product Name</label>
                            <div class="col-lg-4">
                                <input type="text" id="name" name="product_name" placeholder="" class="form-control name">
                            </div>
                        </div>
                        <div class=" col-lg-12 form-group">
                            <label class="col-lg-2" for="ProductType" style="margin-top:11px;">Product Category</label>
                            <div class="col-lg-4">
                                <select id="productType" name="product_category" class="form-control product-type">
                                <option value="0">-Select-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="Manufacturer" style="margin-top:11px;">Manufacturer</label>
                            <div class="col-lg-4">
                                <select id="manufacturer" name="Manufacturer" class="form-control manufacturer">
                                <option value="0">-Select-</option>
                                </select>
                                <p class="help-block"><a>Manufacturer Quick Add</a></p>
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="SKU" style="margin-top:11px;">SKU</label>
                            <div class="col-lg-4">
                                <input type="text" id="sku" name="sku" placeholder="" class="form-control sku">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2"  for="Published">Published</label>
                            <div class="col-lg-4">
                                <input type="radio" value="0"  name="Published" class="input-xlarge">
                                <span>No</span>
                                <input type="radio" value="1"  name="Published" checked class="input-xlarge">
                                <span>Yes</span>
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="Price" style="margin-top:12px;">Price</label>
                            <div class="col-lg-4">
                                <input type="text" id="price" name="Price" placeholder="" class="form-control price">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="SalePrice" style="margin-top:12px;">Sale Price</label>
                            <div class="col-lg-4">
                                <input type="text" id="saleprice" name="SalePrice" placeholder="" class="form-control sale-price">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="CurrentInventory" style="margin-top:10px;">Quantity</label>
                            <div class="col-lg-4">
                                <input type="text" id="currentInventory" name="quantity" placeholder="Quantity" class="form-control current-inventory">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="CurrentInventory" style="margin-top:10px;">Image</label>
                            <div class="col-lg-4">
                                <input name="image" id="file-2" class=""  type="file">
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <label class="col-lg-2" for="SizeSKUModifier">Product Description</label>
                            <div class="col-lg-10">
                                <textarea name="description" id="pagedes"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 form-group">
                            <div class="col-lg-12">
                                <input type="submit" name="add_product" value="Submit" />
                            </div>
                        </div>
                    </fieldset>
                </form>-->
            </div>
        </div>
    </section>
</section>
<?php include ('lib/inner_footer.php') ?>
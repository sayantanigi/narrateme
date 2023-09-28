<?php 
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $query1=mysql_query("delete from product where product_id='$id'");
    if($query1) {
        header('location:productlist.php');
    }
}
?>
<style>
td {text-align: center;}
th {text-align: center;}
</style>
<section id="main">
    <?php include('lib/aside.php');?>
    <section id="content">
        <div class="container">
            <div class="block-header">
                <h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span></h2>
            </div>
            <div id="profile-main" class="card">
                <div class="table-responsive">
       	            <table class="table table-condensed">
                		<thead>
                        	<tr>
                                <th colspan="9" style="font-size: 21px;text-align: right;"><a href="add_product.php" title="Add Product"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>
                            </tr>
                  			<tr>
                  			    <th>#</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Delete</th>
                  			</tr>
                		</thead>
                        <tbody>
                        <?php $sqlproduct_ist = mysqli_query($con, "SELECT * FROM `product`  where supplier_id = ".$_SESSION["userid"]." and `status`=1");
                        if(mysqli_num_rows($sqlproduct_ist)>0) {
                            $i=0;
                            while($rowlist=mysqli_fetch_array($sqlproduct_ist)) {
                            $i++; ?>	
              		        <tr>
              		            <td><?php echo $i; ?></td>
                                <td>
                                    <?php if($rowlist['product_image']!='') { ?>
                                    <img src="uploads/fullsize/<?php echo $rowlist['product_image']?>" height="50" width="50" />
                                    <?php } else { ?>
                                    <img src="img/np.png" height="50" width="50" />
                                    <?php } ?>
                                </td>
                                <td><?php echo $rowlist['product_name']?></td>
                                <td><?php echo $rowlist['price']?></td>
                                <td>
        						<?php if($rowlist['status']=='1') { ?>
                                 	<span style="color:#090;">Active</span> 
        						<?php } else {?>
                                	<span style="color:#900;">Inactive</span> 
        						<?php } ?>
                                </td>
                                <td><a onclick=" return confirm('Are you sure want to delete this row');" href="productlist.php?id=<?php echo $rowlist["product_id"]?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                      		</tr>
                            <?php }
                        } else { ?>
              		        <tr>
                                <td colspan="8">No Product Found</td>
              		        </tr>
                        <?php } ?>
                        </tbody>
  		            </table>
                </div>
            </div>
        </div>
    </section>
</section>
<?php include('lib/inner_footer.php')?>
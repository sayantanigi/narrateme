<?php 
	include('lib/inner_header.php');
	sequre();
	$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
	$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");
?>
<section id="main">
  <?php include('lib/aside.php');?>
  
  <section id="content">
    <div class="container">
      <div class="block-header">
        <h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span><!--<small>Designation</small>--></h2>
      </div>
      <div id="profile-main" class="card">
       	<table class="table table-condensed">
    		<thead>
      			<tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
      			</tr>
    		</thead>
    		<tbody>
              <tr>
                <td>Image</td>
                <td>Product</td>
                <td>Test Category</td>
                <td>Price</td>
                <td>Active</td>
                <td><a><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                <td><a><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                <td><a><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
              <tr>
                <td>Image</td>
                <td>Product</td>
                <td>Test Category</td>
                <td>Price</td>
                <td>Active</td>
                <td><a><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                <td><a><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                <td><a><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
              <tr>
                <td>Image</td>
                <td>Product</td>
                <td>Test Category</td>
                <td>Price</td>
                <td>Active</td>
                <td><a><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                <td><a><i class="fa fa-pencil-square" aria-hidden="true"></i></a></td>
                <td><a><i class="fa fa-trash" aria-hidden="true"></i></a></td>
              </tr>
    		</tbody>
  		</table>
     </div>
    </div>
  </section>

<?php include('lib/inner_footer.php')?>
<div class="clearfix"></div>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('modesview');?>
  </div>
  <div class="clearfix"></div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="cb-left">
        <h4><?php echo @$coursename?></h4>
      </div>
    </div>
  </div>
  <table class="small-tabel" width="100%">
    <tr>
      <th width="14%">Package</th>
      <th width="14%">Print Materials</th>
      <th width="14%">Online Access</th>
      <th width="14%">Tutor Support</th>
      <th width="14%">Certificates</th>
      <th width="14%">Price</th>
      <th width="14%">Book</th>
    </tr>
    <?php
	if($dlearning!=''){
    if(count($dlearning)>=1)
    {
		foreach($dlearning as $dl){ 
	?>
    <tr>
      <td width="14%"><?php echo $dl->package_name?></td>
      <td width="14%"><?php echo $dl->package_name?></td>
      <td width="14%"><?php echo $dl->online_access?></td>
      <td width="14%"><?php echo $dl->tutor_support?></td>
     <td width="14%"><?php echo $dl->cirtificates?></td>
      <td width="14%">£ <?php echo $dl->price?></td>
      <td width="14%"><input type="button" value="Book" class="small-book"></td>
    </tr>
    <?php } } else{?>
    <tr>
  <td colspan="7" style="color: #FF0000;"> Distance Booking not Available!!! </td>
    </tr>
    <?php } } ?>
    <!--<tr>
      <td width="14%">Gold</td>
      <td width="14%"> YES </td>
      <td width="14%">3 months</td>
      <td width="14%"> Full </td>
      <td width="14%"> Yes </td>
      <td width="14%">£ 144</td>
      <td width="14%"><input type="button" value="Book" class="small-book"></td>
    </tr>
    <tr>
      <td width="14%">Platinum</td>
      <td width="14%"> YES </td>
      <td width="14%">6 months</td>
      <td width="14%"> Full </td>
      <td width="14%"> Yes </td>
      <td width="14%">£ 216</td>
      <td width="14%"><input type="button" value="Book" class="small-book"></td>
    </tr>-->
  </table>
 </div>

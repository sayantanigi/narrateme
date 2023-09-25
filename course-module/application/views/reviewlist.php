<div class="clearfix"></div>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('modesview');?>
  </div>
  <div class="clearfix"></div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="cb-left-review">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tbody>
              <?php 
			  	if(!empty($querycourse)){
					foreach($querycourse as $qc){
					$CI =& get_instance();
					$member=$CI->generalmodel->getAllData('sm_member','member_id',$qc->user_id,'','','');
			  ?>
              	<tr>
                	<td style="width:10%;">
                    	<?php if($member[0]->profile_image==''){?>
    						<img src="<?php echo base_url()?>user_panel/student/img/logo1.png" width= "100%"> </p>
    					<?php }else{?>
    						<img src="<?php echo base_url()?>uploads/profile/<?php echo $member[0]->profile_image?>" width="100%"> </a> </p>
    					<?php }?> 
                    </td>
                	<td><?php echo $member[0]->first_name." ".$member[0]->last_name?></td>
                	<td><?php echo $qc->feedback;?></td>
              	</tr>
              <?php
					}
				}else{	
			  ?>
              	<tr>
                	<td colspan="3"  style="color: #FF0000;">No review posted yet against the course </td>
              	</tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

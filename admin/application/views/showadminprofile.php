<div class="page-container">
  <div class="page-sidebar-wrapper">
    <?php //include"lib/leftbar.php"?>
   <?php $this->load->view('leftbar'); ?>
  </div>
  <div class="page-content-wrapper">
    <div class="page-content">
      <h3 class="page-title">
        <?//=$pagetitle?>
      </h3>
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i> </li>
          <li> <span>
            <?php echo @$title;//echo $this->session->flashdata('success_msg');; ?>
            </span> </li>
        </ul>
      </div>
      	<?php //} ?>
		<?php
        //if($_REQUEST['mess'] == 'added') {
        ?>
      <div class="alert alert-success alert-dismissable" style="padding:10px;">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
        <?php echo @$h1title;//echo $this->session->flashdata('success_msg');; ?>
      </div>
      <?php // } ?>
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue-hoki">
            <div class="portlet-title">
              <div class="caption"> <i class="fa fa-reorder"></i>
                <?//=$pagetitle?>
              </div>
              <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
            </div>
            <div class="portlet-body form">
            <?php
				if(!empty($eadminprofile) ) {
                foreach($eadminprofile as $i){
				}
            ?>
            <form action="<?php echo base_url().'index.php/adminprofile/edit_adminprofile' ?>" class="form-horizontal form-bordered" method="post" >
            <input type="hidden" name="id" id="id" value="<?php echo $i->MailId?>">
                <div class="form-body">
                  <div class="form-group">
                    <label class="control-label col-md-3">Admin Mail</label>
                    <div class="col-md-5">
   						<?php echo form_input(array('id' => 'MailAddress', 'name' => 'MailAddress', 'class'=>'form-control', 'value'=>$i->MailAddress)); ?>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                      <?php echo form_submit(array('id' => 'submit', 'value' => 'Update' ,'class'=>'btn red')); ?>
                      <button type="button" class="btn default">Cancel</button>
                    </div>
                  </div>
                </div>
              </form>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>              
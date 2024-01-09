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
				if(!empty($esettings) ) {
                foreach($esettings as $i){
				}
            ?>
            <form action="<?php echo base_url().'index.php/settings/edit_settings' ?>" class="form-horizontal form-bordered" method="post" >
            <input type="hidden" name="id" id="id" value="<?php echo $i->id?>">
                <div class="form-body">
                  <div class="form-group">
                    <label class="control-label col-md-3">Google Analytics <span style="font-size:12px;">(Without &lt;script&gt;...&lt;/script&gt; Tags)</span></label>
                    <div class="col-md-5">
   <?php echo form_textarea(array('id' => 'google_analytics', 'name' => 'google_analytics', 'class'=>'form-control', 'value'=>$i->google_analytics)); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Facebook Link</label>
                    <div class="col-md-5">
                      <?php echo form_input(array('id' => 'facebook_link', 'name' => 'facebook_link','class'=>'form-control', 'value'=>$i->facebook_link)); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Twitter Link</label>
                    <div class="col-md-5">
                      <?php echo form_input(array('id' => 'twitter_link', 'name' => 'twitter_link','class'=>'form-control', 'value'=>$i->twitter_link)); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Youtube Link</label>
                    <div class="col-md-5">
                      <?php echo form_input(array('id' => 'youtube_link', 'name' => 'youtube_link','class'=>'form-control', 'value'=>$i->youtube_link)); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Google Plus Link</label>
                    <div class="col-md-5">
                      <?php echo form_input(array('id' => 'googleplus_link', 'name' => 'googleplus_link','class'=>'form-control', 'value'=>$i->googleplus_link)); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Pinterest Link</label>
                    <div class="col-md-5">
                      <?php echo form_input(array('id' => 'pinterest_link', 'name' => 'pinterest_link', 'class'=>'form-control', 'value'=>$i->pinterest_link)); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Instagram Link</label>
                    <div class="col-md-5">
                      <?php echo form_input(array('id' => 'instagram_link', 'name' => 'instagram_link','class'=>'form-control', 'value'=>$i->instagram_link)); ?>
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
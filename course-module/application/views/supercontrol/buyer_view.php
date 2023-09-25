<?php //$this->load->view ('header');?>

<div class="page-container">
  <div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
      <?php $this->load->view ('supercontrol/leftbar');?>
    </div>
  </div>
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="<?php echo base_url(); ?>supercontrol/home">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>supercontrol Panel</span> </li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-gift"></i>Buyer edit</div>
                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                  </div>
                  <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <?php foreach($viewbuyer as $i){?>
                    <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url().'supercontrol/buyer/edit_buyer '?>" enctype="multipart/form-data">
                      <div class="form-body">
                        
                        <div class="form-group">
                          <label class="control-label col-md-3">Buyer Image</label>
                          <div class="col-md-7">
							
                            <div id='default_img'><img id="select" src="<?php echo base_url()?>/buyer/<?php echo $i->buyer_image;?>" alt="your image" style="width:150px;"/></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Buyer Title</label>
                          <div class="col-md-5">
                            <?php echo $i->buyer_title;?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Designation</label>
                          <div class="col-md-5">
                            <?php echo $i->designation;?>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-md-3">Email</label>
                          <div class="col-md-5">
                            <?php echo $i->email;?>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-md-3">Password</label>
                          <div class="col-md-5">
                            <?php echo base64_decode($i->password);?>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="control-label col-md-3">Username</label>
                          <div class="col-md-5">
                            <?php echo $i->username;?>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Descriptions</label>
                          <div class="col-md-7">
                            <?php echo $i->buyer_desc;?>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions">
                        
                      </div>
                    </form>
                    <?php }?>
                    <!-- END FORM-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>
  <!-- END CONTENT -->
  <!-- BEGIN QUICK SIDEBAR -->
  <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<?php //$this->load->view ('footer');?>

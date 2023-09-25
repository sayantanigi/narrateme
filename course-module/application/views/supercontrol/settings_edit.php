<?php //$this->load->view ('header');?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
      <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
      <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <?php $this->load->view ('supercontrol/leftbar');?>
      <!-- END SIDEBAR MENU -->
      <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <!-- BEGIN THEME PANEL -->

      <!-- END THEME PANEL -->
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <a href="<?php echo base_url(); ?>supercontrol/home">Home</a>
            <i class="fa fa-circle"></i>
          </li>
          <li>
            <span>supercontrol Panel</span>
          </li>
        </ul>

      </div>
      <!-- END PAGE BAR -->
      <!-- BEGIN PAGE TITLE-->
      <!-- END PAGE TITLE-->
      <!-- END PAGE HEADER-->
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="fa fa-gift"></i>Social Link & Other Info</div>
                      <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                      </div>
                    </div>
                    <div class="portlet-body form">
                      <!-- BEGIN FORM-->
                      <?php foreach($ecms as $i){?>
                        <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url().'supercontrol/settings/edit_settings'?>" enctype="multipart/form-data">
                          <div class="form-body">

                            <input type="hidden" name="id" value="<?=$i->id;?>">

                            <div class="form-group">
                              <label class="control-label col-md-3">Google Map<br> <span style="color:#F00;font-size:10px;">( Enter google iframe code )</span></label>
                              <div class="col-md-7">
                                <textarea class="form-control" name="map" rows="6" id="map"><?php echo $i->map;?></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3">Address</label>
                              <div class="col-md-7">
                                <textarea class="form-control" name="address" rows="6" id="address"><?php echo $i->address;?></textarea>
                              </div>
                            </div>


                            <div class="form-group">
                              <label class="control-label col-md-3">Email Address</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="email" value="<?php echo $i->email;?>" name="email">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3">Phone</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="phone" value="<?php echo $i->phone;?>" name="phone">
                              </div>
                            </div> 

                            <div class="form-group">
                              <label class="control-label col-md-3">Facebook Link</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="facebook_link" value="<?php echo $i->facebook_link;?>" name="facebook_link">
                              </div>
                            </div>   

                            <div class="form-group">
                              <label class="control-label col-md-3">Twitter Link</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="twitter_link" value="<?php echo $i->twitter_link;?>" name="twitter_link">
                              </div>
                            </div> 
                            <div class="form-group">
                              <label class="control-label col-md-3">Youtube Link</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="youtube_link" value="<?php echo $i->youtube_link;?>" name="youtube_link">
                              </div>
                            </div> 

                            <div class="form-group">
                              <label class="control-label col-md-3">Google plus Link</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="googleplus_link" value="<?php echo $i->googleplus_link;?>" name="googleplus_link">
                              </div>
                            </div> 

                            <div class="form-group">
                              <label class="control-label col-md-3">Linked In Link</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="linkedin_link" value="<?php echo $i->linkedin_link;?>" name="linkedin_link">
                              </div>
                            </div>    

                            <div class="form-group">
                              <label class="control-label col-md-3">Pinterest Link</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="pinterest_link" value="<?php echo $i->pinterest_link;?>" name="pinterest_link">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3">Instagram Link</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="instagram_link" value="<?php echo $i->instagram_link;?>" name="instagram_link">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3">Classroom hour</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="per_hour_classroom" value="<?php echo $i->per_hour_classroom;?>" name="per_hour_classroom">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3">Flexibility hour</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="per_hour_flexibility" value="<?php echo $i->per_hour_flexibility;?>" name="per_hour_flexibility">
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-md-3">Private hour</label>
                              <div class="col-md-5">
                                <input type="text" class="form-control" id="per_hour_price" value="<?php echo $i->per_hour_price;?>" name="per_hour_price">
                              </div>
                            </div>

                          </div>
                          <div class="form-actions">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                                <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                                <input type="submit" class="btn red" id="submit" value="Submit" name="update">
                                <button class="btn default" type="button">Cancel</button>
                              </div>
                            </div>
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

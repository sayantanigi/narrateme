<div class="page-container">

  <!-- BEGIN SIDEBAR -->

  <div class="page-sidebar-wrapper">

    <!-- BEGIN SIDEBAR -->

    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->

    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->

    <?php //include"lib/leftbar.php"?>

   <?php $this->load->view('leftbar'); ?>

    <!-- END SIDEBAR -->

  </div>

  <!-- END SIDEBAR -->

  <!-- BEGIN CONTENT -->

  <div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->

    <div class="page-content">

      <!-- END THEME PANEL -->

      <!-- BEGIN PAGE TITLE-->

      <h3 class="page-title">

        <?//=$pagetitle?>

        <!--<small>classic page head option</small>-->

      </h3>

      <!-- END PAGE TITLE-->

      <!-- BEGIN PAGE BAR -->

      <div class="page-bar">

        <ul class="page-breadcrumb">

          <li> <a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i> </li>

          <li> <span>

            <?php echo @$title;//echo $this->session->flashdata('success_msg');; ?>

            </span> </li>

        </ul>

      </div>

      <!-- END PAGE BAR -->

     

      

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

          <!-- BEGIN PORTLET-->

          <div class="portlet box blue-hoki">

            <div class="portlet-title">

              <div class="caption"> <i class="fa fa-reorder"></i>

               <?php echo isset($title) ? $title : 'Default Title' ; ?>

              </div>

              <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>

            </div>

            <div class="portlet-body form">

            

             <?php foreach($ecms as $i){?>

            <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url()?>index.php/student/edit_student">

                <div class="form-body">

                  <div class="form-group">

                    <label class="control-label col-md-3">Name</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="name" value="<?php echo $i->name;?>" name="name">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Address</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="address" value="<?php echo $i->address;?>" name="address">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Phone</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="phone" value="<?php echo $i->phone;?>" name="phone">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Mobile</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="mobile" value="<?php echo $i->mobile;?>" name="mobile">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Email</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="email" value="<?php echo $i->email;?>" name="email">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">SMS Number</label>

                    <div class="col-md-5">

                      <input type="text" maxlength="10" class="form-control" id="phone" value="<?php echo $i->sms_no ;?>" name="sms_no">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">IP Address</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="email" value="<?php echo $i->ip_address ;?>" name="ip_address">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Web Site</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="website" value="<?php echo $i->website;?>" name="website">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Domain Name</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="domain_name " value="<?php echo $i->domain_name;?>" name="domain_name ">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">URL</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="url" value="<?php echo $i->url;?>" name="url">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Conference ID (Skype, Video ...)</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="conference_id" value="<?php echo $i->conference_id;?>" name="conference_id">

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Gender</label>

                    <div class="col-md-5">

                      Male :<input type="radio" value="1" name="gender" <?php if($i->gender==1){?> checked="checked"<?php }?>/>

                      Female :<input type="radio" value="1" name="gender" <?php if($i->gender==2){?> checked="checked"<?php }?>/>

                      

                    </div>

                  </div>

                  <div class="form-group">

                    <label class="control-label col-md-3">Social Id Number</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="social_id_no" value="<?php echo $i->social_id_no;?>" name="social_id_no">

                      <input type="hidden" name="id" value="<?php echo $i->id;?>">

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Date Of Birth</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="dob" value="<?php echo $i->dob;?>" name="dob">

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Description</label>

                    <div class="col-md-5">

                      

                     

                      <textarea class="form-control" name="description" rows="6" id="cms_pagedes"><?php echo stripslashes($i->description);?></textarea>

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Status</label>

                    <div class="col-md-5">

                      <select name="status">

                          <option value="1" <?php if($i->status==1){?> selected="selected"<?php }?>>Active</option>

                          <option value="0" <?php if($i->status==0){?> selected="selected"<?php }?>>Inactive</option>

                      </select>

                      

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

              <!-- BEGIN FORM-->

              

              <!-- END FORM-->

            </div>

          </div>

          <!-- END PORTLET-->

        </div>

      </div>

    </div>

    <!-- END CONTENT BODY -->

  </div>

  <!-- END CONTENT -->

  <!-- BEGIN QUICK SIDEBAR -->

  <!-- END QUICK SIDEBAR -->

</div>    

     
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

           <?php echo $title;?>

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

        <?php //echo $h1title;//echo $this->session->flashdata('success_msg');; ?>

      </div>

      <?php // } ?>

      <div class="row">

        <div class="col-md-12">

          <!-- BEGIN PORTLET-->

          <div class="portlet box blue-hoki">

            <div class="portlet-title">

              <div class="caption"> <i class="fa fa-reorder"></i>

                <?//=$pagetitle?>

              </div>

              <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>

            </div>

            <div class="portlet-body form">

             <?php foreach($ecms as $i){?>

              <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url()?>index.php/individual/edit_drug">

			  

			  <input type="hidden" name="id" id="id" value="<?php echo $i->id?>">

                <div class="form-body">

                  <div class="form-group">

                    <label class="control-label col-md-3">Name</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="name" value="<?php echo $i->drug_name;?>" name="drug_name">

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Date</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control form-control-inline date-picker" id="rehab_date" value="<?php echo date('d-m-Y',strtotime($i->drug_date));?>" name="drug_date">

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Outcome</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="outcome" value="<?php echo $i->outcome;?>" name="outcome">

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Description</label>

                    <div class="col-md-5">

                      <input type="text" class="form-control" id="cms_pagedes" value="<?php echo strip_tags($i->reason);?>" name="reason">

                    </div>

                  </div>

                  

                  <div class="form-group">

                    <label class="control-label col-md-3">Status</label>

                    <div class="col-md-5">

                    <select name="status">

                    	<option value="1" <?php if($i->status==1){?> selected="selected"<?php }?>>Active</option>

                        <option value="0" <?php if($i->status==0){?> selected="selected" <?php }?>>Inactive</option>

                    </select>

                      

                    </div>

                  </div>

                </div>

                <div class="form-actions">

                  <div class="row">

                    <div class="col-md-offset-3 col-md-9">

                      <input type="submit" class="btn red" id="submit" value="Submit" name="update">

                      <button class="btn default" type="button" onClick="window.location='<?php echo base_url()?>index.php/recomendation/view_recomendation';">Cancel</button>

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


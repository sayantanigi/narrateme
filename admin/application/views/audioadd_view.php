<div class="page-container">
    <div class="page-sidebar-wrapper">
        <?php $this->load->view('leftbar'); ?>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li> <a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i> </li>
                    <li> <span>
                            <?php echo @$title;?>
                        </span> </li>
                </ul>
            </div>
            <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-success alert-dismissable" style="padding:10px;">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
                <?php
                echo $this->session->flashdata('message');
                unset($_SESSION['message']);
                ?>
                </strong>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption"> <i class="fa fa-reorder"></i> </div>
                            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config"
                                    data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="remove"> </a> </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo base_url() . 'index.php/audio/add_audio' ?>"
                                class="form-horizontal form-bordered" method="post">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">audio Date</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'audio_date', 'name' => 'audio_date', 'class' => 'form-control form-control-inline date-picker')); ?>
                                            <?php echo form_error('audio_date'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">audio Link</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'link_rec_audio', 'name' => 'link_rec_audio', 'class' => 'form-control')); ?>
                                            <?php echo form_error('link_rec_audio'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Live Camera IP</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'ip_live_cam', 'name' => 'ip_live_cam', 'class' => 'form-control')); ?>
                                            <?php echo form_error('ip_live_cam'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <?php echo form_textarea(array('id' => 'cms_pagedes', 'name' => 'description', 'class' => 'form-control')); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit', 'class' => 'btn red')); ?>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('cms_pagedes');
</script>
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
                    <li> <span> <?php echo @$title;?> </span> </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption"> <i class="fa fa-reorder"></i>
                                <?php echo isset($title) ? $title : 'Default Title'; ?>
                            </div>
                            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo base_url() . 'index.php/social/add_social' ?>"
                                class="form-horizontal form-bordered" method="post">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Name</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'name', 'name' => 'name', 'class' => 'form-control')); ?>
                                            <?php echo form_error('name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Description</label>
                                        <div class="col-md-9">
                                            <?php echo form_textarea(array('id' => 'cms_pagedes', 'name' => 'description', 'class' => 'form-control')); ?>
                                            <?php echo form_error('description'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Ip Address</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'ip_address', 'name' => 'ip_address', 'class' => 'form-control')); ?>
                                            <?php echo form_error('ip_address'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Website</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'website', 'name' => 'website', 'class' => 'form-control')); ?>
                                            <?php echo form_error('website'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Domain Name</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'domain_name', 'name' => 'domain_name', 'class' => 'form-control')); ?>
                                            <?php echo form_error('domain_name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Url</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'url', 'name' => 'url', 'class' => 'form-control', 'maxlength' => '10')); ?>
                                            <?php echo form_error('url'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email Address</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'email', 'name' => 'email', 'class' => 'form-control')); ?>
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Marking Media</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'marking_media', 'name' => 'marking_media', 'class' => 'form-control')); ?>
                                            <?php echo form_error('marking_media'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Add Meterial</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'add_meterial', 'name' => 'add_meterial', 'class' => 'form-control')); ?>
                                            <?php echo form_error('add_meterial'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Marketing Meterial</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'marketing_meterial', 'name' => 'marketing_meterial', 'class' => 'form-control')); ?>
                                            <?php echo form_error('marketing_meterial'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Commercials</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'commercials', 'name' => 'commercials', 'class' => 'form-control')); ?>
                                            <?php echo form_error('commercials'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Infomercials</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'infomercials', 'name' => 'infomercials', 'class' => 'form-control')); ?>
                                            <?php echo form_error('infomercials'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Media Link</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'media_link', 'name' => 'media_link', 'class' => 'form-control')); ?>
                                            <?php echo form_error('media_link'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Network Site</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'network_site', 'name' => 'network_site', 'class' => 'form-control')); ?>
                                            <?php echo form_error('network_site'); ?>
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
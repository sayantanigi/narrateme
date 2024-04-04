<div class="page-container">
    <div class="page-sidebar-wrapper">
        <?php $this->load->view('leftbar'); ?>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title"></h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i></li>
                    <li><span><?php echo @$title;?></span> </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption"> <i class="fa fa-reorder"></i>
                                <?php echo isset($title) ? $title : 'Default Title'; ?>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php
                            $steeurl = base_url() . 'banner/add_banner';
                            $attr = "class='form-horizontal form-bordered'";
                            echo form_open_multipart($steeurl, $attr); ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-3">Image</label>
                                    <div class="col-md-8">
                                        <?php echo form_input(array('id' => 'banner_image', 'type' => 'file', 'name' => 'banner_image', 'class' => 'form-control')); ?>
                                        <?php echo form_error('banner_image'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Heading</label>
                                    <div class="col-md-8">
                                        <?php echo form_input(array('id' => 'title', 'name' => 'title', 'class' => 'form-control')); ?>
                                        <?php echo form_error('title'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Sub Heading</label>
                                    <div class="col-md-8">
                                        <?php echo form_input(array('id' => 'subtitle', 'name' => 'subtitle', 'class' => 'form-control')); ?>
                                        <?php echo form_error('subtitle'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">Description</label>
                                    <div class="col-md-8">
                                        <?php echo form_textarea(array('id' => 'cms_pagedes', 'name' => 'description', 'class' => 'form-control')); ?>
                                        <?php echo form_error('description'); ?>
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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
       CKEDITOR.replace('cms_pagedes');
    </script>
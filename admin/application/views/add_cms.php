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
                    <li><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i></li>
                    <li>
                        <span>
                            <?php echo "Add New Cms";?>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption"> <i class="fa fa-reorder"></i></div>
                            <div class="tools"> <a href="javascript:;" class="collapse">
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:void(0);" class="reload"></a>
                                <a href="javascript:void(0);" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo base_url().'cms/add_individual_cms' ?>" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Page Title</label>
                                        <div class="col-md-5">
                                            <?php echo form_input(array('id' => 'cms_pagetitle', 'name' => 'cms_pagetitle','class'=>'form-control')); ?>
                                            <?php echo form_error('cms_pagetitle'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Heading</label>
                                        <div class="col-md-5">
                                            <?php echo form_input(array('id' => 'cms_page_heading', 'name' => 'cms_page_heading','class'=>'form-control')); ?>
                                            <?php echo form_error('cms_page_heading'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta Keyword</label>
                                        <div class="col-md-5">
                                            <?php echo form_textarea(array('id' => 'meta_keywords', 'name' => 'meta_keywords','class'=>'form-control')); ?>
                                            <?php echo form_error('meta_keywords'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta Descriptions</label>
                                        <div class="col-md-5">
                                            <?php echo form_textarea(array('id' => 'meta_description', 'name' => 'meta_description','class'=>'form-control')); ?>
                                            <?php echo form_error('meta_description'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address Map <div style="font-size:10px; color:#ff0000;">(Enter Google Iframe code here)</div></label>
                                        <div class="col-md-7">
                                            <?php echo form_textarea(array('id' => 'cmsmap', 'name' => 'cmsmap','class'=>'form-control')); ?>
                                            <?php echo form_error('cmsmap'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Page Image</label>
                                        <div class="col-md-8">
                                            <?php $file = array('type' => 'file','name' => 'userfile','onchange' => 'readURL(this);');
                                            echo form_input($file); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Descriptions</label>
                                        <div class="col-md-8">
                                            <?php echo form_textarea(array('id' => 'cms_pagedes', 'name' => 'cms_pagedes','class'=>'form-control','maxlength'=>'10')); ?>
                                            <?php echo form_error('cms_pagedes'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit' ,'class'=>'btn red')); ?>
                                            <a href="<?php echo base_url()?>cms"> <button type="button" class="btn default">Cancel</button></a>
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
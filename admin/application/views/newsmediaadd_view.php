<div class="page-container">
    <div class="page-sidebar-wrapper">
        <?php $this->load->view('leftbar'); ?>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title"></h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li> <a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i> </li>
                    <li> <span>
                            <?php echo @$title; ?>
                        </span> </li>
                </ul>
            </div>
            <div class="alert alert-success alert-dismissable" style="padding:10px;">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
                <?php echo @$h1title; ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption"> <i class="fa fa-reorder"></i></div>
                            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config"
                                    data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <form action="<?php echo base_url() . 'index.php/newsmedia/add_newsmedia' ?>"
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
                                        <label class="control-label col-md-3">ipaddress</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'ipaddress', 'name' => 'ipaddress', 'class' => 'form-control')); ?>
                                            <?php echo form_error('ipaddress'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">website</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'website', 'name' => 'website', 'class' => 'form-control')); ?>
                                            <?php echo form_error('website'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">domain_name</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'domain_name', 'name' => 'domain_name', 'class' => 'form-control')); ?>
                                            <?php echo form_error('domain_name'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">url</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'url', 'name' => 'url', 'class' => 'form-control')); ?>
                                            <?php echo form_error('url'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">information</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'information', 'name' => 'information', 'class' => 'form-control', 'maxlength' => '10')); ?>
                                            <?php echo form_error('information'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">newsreport</label>
                                        <div class="col-md-9">
                                            <?php echo form_input(array('id' => 'newsreport', 'name' => 'newsreport', 'class' => 'form-control')); ?>
                                            <?php echo form_error('newsreport'); ?>
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
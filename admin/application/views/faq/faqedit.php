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
                    <li> <span><?php echo $title; ?></span> </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption"> <i class="fa fa-reorder"></i></div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php foreach ($efaq as $i) { ?>
                                <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url() ?>faq/edit_faq">
                                    <input type="hidden" name="id" id="id" value="<?php echo $i->id ?>">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Faq Question</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="faqq" value="<?php echo $i->faqq; ?>" name="faqq">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Faq Answers</label>
                                            <div class="col-md-9">
                                                <textarea type="text" class="form-control" id="cms_pagedes" name="faqa"><?php echo $i->faqa; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <input type="submit" class="btn red" id="submit" value="Submit" name="update">
                                                <button class="btn default" type="button">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
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
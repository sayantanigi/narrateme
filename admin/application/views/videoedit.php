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
                    <li> <span><?php echo $title; ?></span> </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption"> <i class="fa fa-reorder"></i>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php foreach ($ecms as $i) { ?>
                                <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url() ?>index.php/video/edit_video">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Video Date</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-inline date-picker" id="video_date" value="<?php echo date('d-m-Y', strtotime($i->video_date)); ?>" name="video_date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Record Video Link</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="link_rec_video" value="<?php echo $i->link_rec_video; ?>" name="link_rec_video">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">IP Address to live camera</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="ip_live_cam" value="<?php echo $i->ip_live_cam; ?>" name="ip_live_cam">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Description</label>
                                            <div class="col-md-9">
                                                <textarea name="description" id="cms_pagedes"><?php echo htmlentities($i->description); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Status</label>
                                            <div class="col-md-9">
                                                <select name="status"  class="form-control">
                                                    <option value="1" <?php if ($i->status == 1) { ?> selected="selected"
                                                        <?php } ?>>Active</option>
                                                    <option value="0" <?php if ($i->status == 0) { ?> selected="selected"
                                                        <?php } ?>>Inactive</option>
                                                </select>
                                                <input type="hidden" id="id" name="id" value="<?php echo $i->id; ?>" />
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

<script src="//cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('cms_pagedes');
</script>
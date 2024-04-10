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
                            <div class="caption"> <i class="fa fa-reorder"></i>
                            </div>
                            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config"
                                    data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php foreach ($ecms as $i) { ?>
                                <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url() ?>index.php/newsmedia/edit_newsmedia">
                                    <input type="hidden" name="id" id="id" value="<?php echo $i->id ?>">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="name" value="<?php echo $i->name; ?>" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">ipaddress</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="ipaddress" value="<?php echo $i->ipaddress; ?>" name="ipaddress">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">website</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="website" value="<?php echo $i->website; ?>" name="website">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">domain_name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="domain_name" value="<?php echo $i->domain_name; ?>" name="domain_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">url</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="url" value="<?php echo $i->url; ?>" name="url">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">information</label>
                                            <div class="col-md-9">
                                                <input type="text" maxlength="10" class="form-control" id="information" value="<?php echo $i->information; ?>" name="information">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">newsreport</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="newsreport" value="<?php echo $i->newsreport; ?>" name="newsreport">
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
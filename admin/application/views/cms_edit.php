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
                    <li><span><?php echo $title;?></span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-reorder"></i>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:void(0)" class="reload"></a>
                                <a href="javascript:void(0)" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php foreach($ecms as $i) { ?>
                            <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url()?>index.php/cms/edit_cms_individual" enctype="multipart/form-data">
                                <div class="form-body">
                                    <input type="hidden" name="cms_id" value="<?=$i->id;?>">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Page Title</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" id="cms_pagetitle" value="<?php echo $i->cms_pagetitle;?>" name="cms_pagetitle">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Heading</label>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" id="cms_page_heading" value="<?php echo $i->cms_page_heading;?>" name="cms_page_heading">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta Keyword</label>
                                        <div class="col-md-5">
                                            <textarea class="form-control" name="meta_keywords" rows="6" id="meta_keywords"><?php echo $i->meta_keywords;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Meta Descriptions</label>
                                        <div class="col-md-5">
                                            <textarea class="form-control" name="meta_description" rows="6" id="meta_description"><?php echo $i->meta_description;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address Map
                                            <div style="font-size:10px; color:#ff0000;">(Enter Google Iframe code here)</div>
                                        </label>
                                        <div class="col-md-7">
                                            <textarea class="form-control" name="cmsmap" rows="6" id="cmsmap"><?php echo $i->cmsmap;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Descriptions</label>
                                        <div class="col-md-7">
                                            <textarea class="form-control" name="cms_pagedes" rows="6" id="cms_pagedes"><?php echo $i->cms_pagedes;?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Image Upload</label>
                                        <div class="col-md-7">
                                            <?php $file = array('type' => 'file','name' => 'userfile','onchange' => 'readURL(this);');
                                            echo form_input($file);
                                            ?>
                                            <div id='default_img' style="margin-top: 10px;"><img id="select" src="<?php echo base_url()?>/uploads/<?php echo $i->cmsimg;?>" alt="your image" style="width:150px;"/></div>
                                            <input type="hidden" id="old_image" name="old_image" value="<?php echo $i->cmsimg;?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <input type="submit" class="btn red" id="submit" value="Submit" name="update">
                                            <a href="<?php echo base_url()?>index.php/cms"><button class="btn default" type="button">Cancel</button></a>
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


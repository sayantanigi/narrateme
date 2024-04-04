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
                    <li><span><?php echo $title; ?></span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption"> <i class="fa fa-reorder"></i>
                                <?//=$pagetitle ?>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <?php foreach ($ecms as $i) { ?>
                                <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url() ?>banner/edit_banner" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <input type="hidden" name="id" value="<?= $i->id; ?>">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Image Upload</label>
                                            <div class="col-md-7">
                                                <?php
                                                $file = array('type' => 'file', 'name' => 'banner_image', 'onchange' => 'readURL(this);');
                                                echo form_input($file);
                                                ?>
                                                <?php //echo form_input(array('id' => 'name', 'name'=>'image','type' =>'file' ,'class'=>'form-control fileimage'));  ?>
                                                <div id='default_img'><img id="select" src="<?php echo base_url() ?>uploads/banner/<?php echo $i->banner_image; ?>" alt="your image" style="width:150px;" /></div>
                                                <input type="hidden" name="old_image" id="old_image" value="<?php echo $i->banner_image; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Heading</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="title" value="<?php echo $i->title; ?>" name="title">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Sub Heading</label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" id="subtitle" value="<?php echo $i->subtitle; ?>" name="subtitle">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Descriptions</label>
                                            <div class="col-md-9">
                                                <textarea type="text" class="form-control" placeholder="Page Descriptions" rows="6" id="description" name="description"><?php echo $i->description; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <!--<button type="submit" class="btn red" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>-->
                                                <input type="submit" class="btn red" id="submit" value="Submit" name="update">
                                                <a href="<?php echo base_url() ?>index.php/cms"><button class="btn default" type="button">Cancel</button></a>
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
    CKEDITOR.replace('description');
</script>
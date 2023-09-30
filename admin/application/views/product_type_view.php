<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <?php $this->load->view ('leftbar');?>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?php echo base_url(); ?>home">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li> <span>Admin Panel</span> </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line boxless tabbable-reversed">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption"><i class="fa fa-gift"></i>Product type edit</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="reload"></a>
                                            <a href="javascript:;" class="remove"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <?php foreach($viewproduct_type as $i) { ?>
                                        <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url().'product_type/edit_product_type '?>" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Product type Image</label>
                                                    <div class="col-md-7">
                                                        <div id='default_img'>
                                                            <img id="select" src="<?php echo base_url()?>/product_type/<?php echo $i->product_type_image;?>" alt="your image" style="width:150px;"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Product type Title</label>
                                                    <div class="col-md-5"><?php echo $i->product_type_title;?></div>
                                                </div>
                                            </div>
                                            <div class="form-actions"></div>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //$this->load->view ('footer');?>

<?php //$this->load->view ('header');?>

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
                    <li> <a href="<?php echo base_url(); ?>home">Home</a> <i class="fa fa-circle"></i> </li>
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
                                        <div class="caption"> <i class="fa fa-gift"></i>Product edit</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"></a> 
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <?php foreach($ecms as $i){?>
                                        <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url().'product/edit_product '?>" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <input type="hidden" name="product_id" value="<?=$i->product_id;?>">
                                                <input type="hidden" name="product_image" value="<?=$i->product_image;?>">
                                                <div class="form-group">
                                                    <b> <label class="col-md-3 control-label">Product Type *</label> </b>
                                                    <div class="col-md-8">
                                                        <select name="product_type" id="product_type" class="form-control" >
                                                            <option value="">Choose Product Type</option>
                                                            <?php foreach($ecat as $a) { ?>
                                                            <option value="<?php echo $a->id; ?>" <?php if($a->id==$i->categori_id){?> selected="selected" <?php }?>><?php echo $a->product_type_title?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label id="errorBox"></label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Image Upload</label>
                                                    <div class="col-md-7">
                                                        <?php $file = array('type' => 'file','name' => 'userfile','onchange' => 'readURL(this);');
                                                        echo form_input($file); ?>
                                                        <div id='default_img'>
                                                            <img id="select" src="<?php echo base_url()?>uploads/product/<?php echo $i->product_image;?>" alt="your image" style="width:150px;"/>
                                                            <input type="hidden" name="old_image" value="<?php echo $i->product_image;?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Product Title</label>
                                                    <div class="col-md-5">
                                                        <input type="text" class="form-control" id="product_name" value="<?php echo $i->product_name;?>" name="product_name">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                        	                       <label class="control-label col-md-3">Price $</label>
                        	                       <div class="col-md-8"> <input type="text" class="form-control" id="price" value="<?php echo $i->price;?>" name="price">
                                                   </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Discount</label>
                                                    <div class="col-md-8"> <input type="text" class="form-control" id="discount" value="<?php echo $i->discount;?>" name="discount">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Quantity</label>
                                                    <div class="col-md-8"> <input type="text" class="form-control" id="quantity" value="<?php echo $i->quantity;?>" name="quantity">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Descriptions</label>
                                                    <div class="col-md-7">
                                                        <textarea class="form-control" name="description" rows="6" id="pagedes"><?php echo $i->description;?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" class="btn red" id="submit" value="Submit" name="update">
                                                        <button class="btn default" type="button" onclick="goBack()">Cancel</button>
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
        </div>
    </div>
</div>
<?php //$this->load->view ('footer');?>

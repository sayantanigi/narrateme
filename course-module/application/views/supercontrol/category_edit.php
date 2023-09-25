<?php //$this->load->view ('header');?>

<div class="page-container">
  <div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
      <?php $this->load->view ('supercontrol/leftbar');?>
    </div>
  </div>
  <div class="page-content-wrapper">
    <div class="page-content">
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="<?php echo base_url(); ?>supercontrol/user/dashboard">Home</a> <i class="fa fa-circle"></i> </li>
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
                    <div class="caption"> <i class="fa fa-gift"></i>Category edit</div>
                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                  </div>
                  <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <?php foreach($ecategory as $i){?>
                    <form method="post" class="form-horizontal form-bordered" action="<?php echo base_url().'supercontrol/category/edit_category'?>" enctype="multipart/form-data" onsubmit="return check();">
                      <div class="form-body">
                        <input type="hidden" name="category_id" value="<?=$i->category_id;?>">
                        
                     <!--   <div class="form-group">
                          <label class="control-label col-md-3">Category</label>
                          <div class="col-md-5">
                            <select class="form-control" name="category">
                            	<?php foreach($eallcat as $eac){?>
                          		<option value="<?php echo $eac->category_id?>" <?php if($eac->category_id == $i->category_id){?> selected="selected" <?php }?>><?php echo $eac->category_name?></option>
                                <?php }?>
                          	</select>
                          </div>
                        </div>-->
                        
                        <div class="form-group">
                          <label class="control-label col-md-3"><?php if($i->parent_id==0){?><p> Course Type </p><?php }else{?><p> Category </p><?php }?></label>
                          <div class="col-md-5">
                            <input type="text" class="form-control" id="category_name" value="<?php echo $i->category_name;?>" name="category_name" onkeyup= "leftTrim(this)">
                            <div id="errorBox"></div>
                          </div>
                        </div>
                        
                        <!--<div class="form-group">
                          <label class="control-label col-md-3">Sort Order</label>
                          <div class="col-md-5">
                            <input type="text" class="form-control" id="category_name" value="<?php echo $i->sort_order;?>" name="sort_order" onkeyup= "leftTrim(this)">
                            <div id="errorBox"></div>
                          </div>
                        </div>-->
                        
                        <!--<div class="form-group last">
                          <label class="control-label col-md-3">Image</label>
                          <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img src="<?php echo base_url()?>uploads/categoryimage/<?php echo $i->category_image?>" alt="" /> </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                              <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select image </span> <span class="fileinput-exists"> Change </span>
                                <?php
                                $file = array('type' => 'file','name' => 'userfile', 'onchange' => 'readURL(this);' );
                                echo form_input($file);
                                ?>
                                </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>
                            </div>
                            <div class="clearfix margin-top-10"> <span class="label label-danger">Format</span> jpg, jpeg, png, gif </div>
                          </div>
                        </div>-->
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
                    <?php }?>
                    <!-- END FORM-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END CONTENT BODY -->
  </div>
  <!-- END CONTENT -->
  <!-- BEGIN QUICK SIDEBAR -->
  <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
	<script>
    function check(){
		if($("#category_name").val() == "" ){
		$("#category_name").focus();
		$("#errorBox").html("Please Enter Project Type or Category");
		return false;
		}else{
		$("#errorBox").html("");
		
		}
    }
    </script>
    <script>
		function leftTrim(element){
		if(element)
		element.value=element.value.replace(/^\s+/,"");
		}
	</script>
	<style>
    #errorBox{
    color:#F00;
    }
    </style>
<?php //$this->load->view ('footer');?>

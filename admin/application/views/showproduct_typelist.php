<style>
#sample_1_filter{padding: 8px; float: right;}
#sample_1_length{padding: 8px;}
#sample_1_info{padding: 8px;}
#sample_1_paginate{float: right; padding: 8px;}
.dataTables_info{padding:7px;}
</style>
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
                    <li> <span>Admin Panel</span> <i class="fa fa-circle"></i> </li>
                    <li> <span>Show Product type List </span> </li>
                </ul>
            </div>
            <?php if(@$message){echo @$message;}?>
            <div class="row">
                <?php if(isset($success_msg)) { echo $success_msg; } ?>
				<?php if($this->session->flashdata('add_message')!='') { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&#10006;</button>
                    <strong>
                        <?php if($this->session->flashdata('add_message')) {
                            echo $this->session->flashdata('add_message');
                            unset($_SESSION['add_message']);
                        } ?>
                    </strong> 
                </div>
                <?php } ?>
                <?php if($this->session->flashdata('edit_message')!=''){?>
                <div class="alert alert-success1" style="background-color:#98E0D5;">
                    <button type="button" class="close" data-dismiss="alert">&#10006;</button>
                    <strong>
                        <?php if($this->session->flashdata('edit_message')) {
                            echo $this->session->flashdata('edit_message');
                            unset($_SESSION['edit_message']);
                        } ?>
                    </strong>
                </div>
                <?php } ?>
                <?php if($this->session->flashdata('delete_message')!=''){?>
                <div class="alert alert-error" style="background-color:#F0959B;">
                    <button type="button" class="close" data-dismiss="alert">&#10006;</button>
                    <strong>
                        <?php if($this->session->flashdata('delete_message')) {
                            echo $this->session->flashdata('delete_message');
                            unset($_SESSION['delete_message']);
                        } ?>
                    </strong>
                </div>
                <?php } ?>
                <div class="col-md-12">
                    <div class="tabbable-line boxless tabbable-reversed">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption"> <i class="fa fa-gift"></i>Show Product type</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"></a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                            <a href="javascript:;" class="reload"></a>
                                            <a href="javascript:;" class="remove"></a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                            <div id="mydiv">
                                                <thead>
                                                    <tr>
                                                        <th width="20">Sl No.</th>
                                                        <th width="180" style="max-width:170px;">Image</th>
                                                        <th width="30">Product type Title</th>
                                                        <th width="60">Status</th>
                                                        <th width="27">Edit</th>
                                                        <th width="27">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(is_array($ecms)): ?>
                                                    <?php $ctn=1;
                                                    foreach($ecms as $i) {
                                                    ?>
                                                    <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                                        <td  style="max-width:20px;"><?php echo $ctn;?></td>
                                                        <td>
                                                            <?php if($i->product_type_image==""){?>
                                                            No Image
                                                            <?php }else{?>
                                                            <img src="<?php echo base_url()?>uploads/product_type/<?php echo $i->product_type_image;?>" width="150" height="100" style="border: 2px solid #ddd;"/>
                                                            <?php }?>
                                                        </td>
                                                        <td  style="max-width:200px;"><?php echo $i->product_type_title;?></td>
                                                        <td  style="max-width:250px;">
                                                            <div class="form-group">
                                                                <div class="col-md-5">
                                                                    <select name="blog_status" id="stachange" onchange="f1(this.value,<?php echo $i->id ;?>)" style="padding:4px;">
                                                                        <option value="1" <?php if($i->product_type_status==1){?> selected="selected"<?php }?>>Active</option>
                                                                        <option value="0" <?php if($i->product_type_status==0){?> selected="selected"<?php }?>>Inactive</option>
                                                                    </select>
                                                                    <input type="hidden" name="id" value="<?php echo $i->id;?>">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="max-width:50px;">
                                                            <a class="btn green btn-sm btn-outline sbold uppercase" href="<?php echo base_url()?>product_type/show_product_type_id/<?php echo $i->id; ?>">Edit</a>
                                                        </td>
                                                        <td style="max-width:50px;">
                                                            <a class="btn red btn-sm btn-outline sbold uppercase" onclick="return confirm('Are you sure about this delete?');" href="<?php echo base_url()?>product_type/delete_product_type/<?php echo $i->id; ?>">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php $ctn++;} ?>
                                                    <?php endif; ?>
                                                </tbody>
                                            </div>
                                        </table>
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
<script>
$(document).ready(function() {
	$("#selectall").click(function(){
		var check = $(this).prop('checked');
		if(check == true) {
			$('.checker').find('span').addClass('checked');
			$('.checkbox1').prop('checked', true);
		} else {
			$('.checker').find('span').removeClass('checked');
			$('.checkbox1').prop('checked', false);
		}
	});
    $("#del_all").on('click', function(e) {
        e.preventDefault();
        var checkValues = $('.checkbox1:checked').map(function() {
            return $(this).val();
        }).get();
        console.log(checkValues);
        $.each( checkValues, function( i, val ) {
            $("#"+val).remove();
        });
        $.ajax({
            url: '<?php echo base_url() ?>product_type/delete_multiple',
            type: 'post',
            data: 'ids=' + checkValues
        }).done(function(data) {
            $("#respose").html(data);
			var newurl= '<?php echo base_url() ?>product_type/show_product_type';
			window.location.href = newurl;
            $('#selectall').attr('checked', false);
        });
    });

    function resetcheckbox(){
        $('input:checkbox').each(function() {
            this.checked = false;
        });
    }
});
</script>
<script>
    function f1(stat,id) {
		$.ajax({
            type:"get",
            url:"<?php echo base_url(); ?>product_type/statusproduct_type",
            data:{stat : stat, id :id}
		});
	}
</script>
<?php //$this->load->view ('footer');?>

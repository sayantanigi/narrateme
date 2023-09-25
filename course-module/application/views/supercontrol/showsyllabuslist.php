<?php //$this->load->view ('header');?>
<!-- BEGIN CONTAINER -->
<style>
#sample_1_filter{
	padding: 8px;
    float: right;
	}
#sample_1_length{
	padding: 8px;
	}
#sample_1_info{
	padding: 8px;	
	}
#sample_1_paginate{
	float: right;
    padding: 8px;
	}	
</style>
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <?php $this->load->view ('supercontrol/leftbar');?>
      <!-- END SIDEBAR MENU -->
      <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
  </div>
  <!-- END SIDEBAR -->
  <!-- BEGIN CONTENT -->
  <style>
 	.dataTables_info{padding:7px;}
  </style>
  <div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
      <!-- END THEME PANEL -->
      <!-- BEGIN PAGE BAR -->
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li> <a href="<?php echo base_url(); ?>supercontrol/home">Home</a> <i class="fa fa-circle"></i> </li>
          <li> <span>supercontrol Panel</span> <i class="fa fa-circle"></i> </li>
          <li> <span>Show Press List </span> </li>
        </ul>
      </div>
      <!-- END PAGE BAR -->
      <!-- END PAGE HEADER-->
      <?php if(@$success_msg){echo @$success_msg;}?>
	   <?php if(@$message){echo @$message;}?>
	     <?php if(@$msg){echo @$msg;}?>
		    <?php if(@$msg1){echo @$msg1;}?> 
			<?php if($this->session->flashdata('success')!=''){?><div class="alert alert-success text-center"><?php echo $this->session->flashdata('success');?></div><?php }?>
			
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-gift"></i>Show Press</div>
                    <div class="tools"> <a href="javascript:;" class="collapse"> </a>  <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                  </div>
                  
                  <div class="portlet-body form">
                  <button class="btn btn-warning btn-sm pull-right" id="del_all" style="padding:5px; margin:8px;" onclick="return confirm('Are you sure about this delete?');">Delete selected</button>
                  
                    <!-- BEGIN FORM-->
                    <table class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                    <div id="mydiv">
                      <thead>
                        <tr>
                          <th width="20"><input id="selectall" type="checkbox"></th>
                          <!--<th width="180" style="max-width:170px;">Image</th>-->
                          <th width="30">Sl No</th>
                          <th width="30">Syllabus Name</th>
                          <!--<th width="30">Syllabus Order</th>
                          <th width="60">Status</th>-->
                          <th width="27">Edit</th>
                          <th width="27">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if(is_array($syllabuslist)): ?>
					  <?php
					  $ctn=1;
                      foreach($syllabuslist as $i){
                      ?>
                        <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                          <td>
                          <input name="checkbox[]" class="checkbox1" type="checkbox"  value="<?php echo $i->syllabus_id;?>">
                          </td>
                          <td><?php echo $ctn;?></td>
                           <td  style="max-width:200px;"><?php echo $i->syllabus_name;?></td>
                           <!--<td  style="max-width:200px;"><?php echo $i->s_order;?></td>
                           <td  style="max-width:200px;">
						   	<?php if($i->status=='1'){?> 
                            	<span style="color:#0C3;">Active</span>
							<?php }else{?><span style="color:#F00;">Inactive</span><?php }?>
                            </td>-->
                          <td style="max-width:50px;"><a class="btn green btn-sm btn-outline sbold uppercase" href="<?php echo base_url()?>supercontrol/course/edit_syllabus_view/<?php echo $i->syllabus_id;?>">Edit</a></td>
                          <td style="max-width:50px;"><a class="btn red btn-sm btn-outline sbold uppercase" onclick="return confirm('Are you you want to  delete?');" href="<?php echo base_url()?>supercontrol/course/delete_syllabus/<?php echo $i->syllabus_id; ?>">Delete</a></td>
                        </tr>
                        
                        <?php $ctn++;}?>
                        <?php endif; ?>
                      </tbody>
                      </div>
                    </table>
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
<script>
//====FOR DELETE MULTIPLE====
     $(document).ready(function() {
                //resetcheckbox();
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
                    var checkValues = $('.checkbox1:checked').map(function()
                    {
                        return $(this).val();
                    }).get();
                    console.log(checkValues);
                     //alert(checkValues);
                    $.each( checkValues, function( i, val ) {
					 //alert(val);
                        $("#"+val).remove();
                        });
//                    return  false;
					 //alert ("<?php echo base_url() ?>supercontrol/controllers/press/delete_multiple");
                    $.ajax({
						  
                        url: '<?php echo base_url() ?>supercontrol/press/delete_multiple',
                        type: 'post',
                        data: 'ids=' + checkValues
                    }).done(function(data) {
                        $("#respose").html(data);
						//location.reload();
						var newurl= '<?php echo base_url() ?>supercontrol/press/show_press';
						window.location.href = newurl;
                        $('#selectall').attr('checked', false);
                    });
                });
                 
                function  resetcheckbox(){
                $('input:checkbox').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                   });
                }
            });
</script>
<script>
		function f1(stat,id)
		{
		$.ajax({
		type:"get",
		url:"<?php echo base_url(); ?>supercontrol/press/statuspress",
		data:{stat : stat, id :id}
		});
		}
</script>

<!-- END CONTAINER -->
<?php //$this->load->view ('footer');?>

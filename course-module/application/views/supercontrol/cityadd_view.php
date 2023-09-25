<?php //$this->load->view ('header');?>
<style type="text/css">
    label {
  width: 125px;
  display: block;
  float: left;
}
label input {
  display: none;
}
label span {
  display: block;
  width: 17px;
  height: 17px;
  border: 1px solid black;
  float: left;
  margin: 0 5px 0 0;
  position: relative;
}
label.active span:after {
  content: " ";
  position: absolute;
  left: 3px;
  right: 3px;
  top: 3px;
  bottom: 3px;
  background: black;
}
    .topul li {
      list-style-type:none;
        
    }
    select option{
      font-size:24px !important;
      padding-left:20px !important;
    }
    select .art{
      padding-left:20px !important; 
      margin-left:20px !important;  
    }
    select .art2{
      padding-left:40px !important; 
      margin-left:40px !important;  
    }
    #check{
      border:1px solid #dddddd; width:60%; 
      padding:8px; margin-left:10px; 
      margin-top:10px; 
      margin-bottom: 15px;
      }
    #check2{
      border:1px solid #dddddd; 
      width:60%; 
      display:none; 
      padding:8px; 
      margin-left:10px; 
      margin-top:10px;
      }
    #drop{
      display:none; 
      width:60%; 
      border:1px solid #ccc; 
      margin-left: 10px; 
      margin-bottom: 15px;
      }
    .form-groupp{
      padding: 25px 0 0 273px;
      }
    #title{
      width: 478px;
      }
    </style>
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
          <li> <span>Admin panel</span> </li>
        </ul>
      </div>
      <div class="alert alert-success alert-dismissable" style="padding:10px;">
        <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
        <strong>
        <?php 
				if(@$success_msg!=''){echo @$success_msg;}
				$last = end($this->uri->segments); 
				if($last=="success"){echo "City Added Successfully ......";}
				if($last=="successdelete"){echo "City Deleted Successfully ......";}
            ?>
        </strong> </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tabbable-line boxless tabbable-reversed">
            <div class="tab-content">
              <div class="tab-pane active" id="tab_0">
                <div class="portlet box blue-hoki">
                  <div class="portlet-title">
                    <div class="caption"> <i class="fa fa-gift"></i>Add City</div>
                    <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>
                  </div>
                  <div class="portlet-body form"> 
                    <!-- BEGIN FORM-->
                    <form action="<?php echo base_url().'supercontrol/city/add_city'?>" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" onsubmit="return check();">
                      <div class="form-body">
                        <div class="form-group">
                             <label class="col-md-3 control-label">Select Country </label>
                             <div class="col-md-8">
                          <select class="form-control"  name='sel_country'>
                               <option>-- Select Country --</option>
                              <?php if(is_array($categories) && count($categories)>0){
                                    foreach($categories as $cs){
                               ?>
                              <option value="<?=$cs->id?>"><?=$cs->country_name?></option>
                              <?php }} ?>
                          </select>
                          </div>
                        </div>
                        <div class="form-group"> <b>
                          <label class="col-md-3 control-label">City Name *</label>
                          </b>
                          <div class="col-md-4">
                            <input type="text" name="city_name" id="title" class="form-control" placeholder="City Name" onkeyup= "leftTrim(this)"/>
                            <label id="errorBox"></label>
                          </div>
                        </div>
                        <div style="color:#f00;text-align:center;"> <?php echo validation_errors(); ?> </div>
                        
                        <!--<div class="form-group"> <b>
                          <label class="col-md-3 control-label">Sort Order</label>
                          </b>
                          <div class="col-md-4">
                            <input type="text" name="sort_order" id="title" class="form-control" placeholder="Sort Order" onkeyup= "leftTrim(this)"/>
                            <label id="errorBox"></label>
                          </div>
                        </div>-->
                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                            <input type="submit" id="submit" value="Submit" class="btn red">
                            <button type="button" class="btn default">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </form>
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
    	function check(){
    		if($("#title").val() == "" ){
    			$("#title").focus();
    			$("#errorBox").html("Please Enter Country Name");
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

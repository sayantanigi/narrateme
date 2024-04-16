<style type="text/css">
    label {width: 125px;display: block;float: left;}label input {display: none;}label span {display: block;width: 17px;height: 17px;border: 1px solid black;float: left;margin: 0 5px 0 0;position: relative;}label.active span:after {content: " ";position: absolute;left: 3px;right: 3px;top: 3px;bottom: 3px;background: black;}.topul li {list-style-type: none;}select option {font-size: 24px !important;padding-left: 20px !important;}select .art {padding-left: 20px !important;margin-left: 20px !important;}select .art2 {padding-left: 40px !important;margin-left: 40px !important;}#check {border: 1px solid #dddddd;width: 60%;padding: 8px;margin-left: 10px;margin-top: 10px;margin-bottom: 15px;}#check2 {border: 1px solid #dddddd;width: 60%;display: none;padding: 8px;margin-left: 10px;margin-top: 10px;}#drop {display: none;width: 60%;border: 1px solid #ccc;margin-left: 10px;margin-bottom: 15px;}.form-groupp {padding: 25px 0 0 273px;}#title {width: 478px;}
</style>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <?php $this->load->view('supercontrol/leftbar'); ?>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?php echo base_url(); ?>supercontrol/user/dashboard">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li> <span>Admin panel</span> </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line boxless tabbable-reversed">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption"> <i class="fa fa-gift"></i>Add Category</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <form action="<?php echo base_url().'supercontrol/category/add_category' ?>" class="form-horizontal form-bordered" method="post" enctype="multipart/form-data" onsubmit="return check();">
                                            <div class="form-body">
                                                <div class="form-group"> <b><label class="col-md-3 control-label">Name *</label></b>
                                                    <div class="col-md-4">
                                                        <input type="text" name="name" id="title" class="form-control"
                                                            placeholder="Name" onkeyup="leftTrim(this)" />
                                                        <label id="errorBox"></label>
                                                    </div>
                                                </div>
                                                <div style="color:#f00;text-align:center;">
                                                    <?php echo validation_errors(); ?> </div>
                                                </div>

                                                <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <input type="submit" id="submit" value="Submit" class="btn red">
                                                            <button type="button" class="btn default">Cancel</button>
                                                        </div>
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
    function check() {
        if ($("#title").val() == "") {
            $("#title").focus();
            $("#errorBox").html("Please Enter Category Name");
            return false;
        } else {
            $("#errorBox").html("");
        }
    }
</script>
<script>
    function leftTrim(element) {
        if (element)
            element.value = element.value.replace(/^\s+/, "");
    }
</script>
<style>
    #errorBox {
        color: #F00;
    }
</style>
<?php //$this->load->view ('footer'); ?>
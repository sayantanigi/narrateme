<style>
    #sample_1_filter {
        padding: 8px;
        float: right;
    }
    #sample_1_length {
        padding: 8px;
    }
    #sample_1_info {
        padding: 8px;
    }
    #sample_1_paginate {
        float: right;
        padding: 8px;
    }
</style>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <?php $this->load->view('supercontrol/leftbar'); ?>
        </div>
    </div>
    <style>
        .dataTables_info {
            padding: 7px;
        }
    </style>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li> <a href="<?php echo base_url(); ?>user/dashboard">Home</a> <i class="fa fa-circle"></i> </li>
                    <li> <span>Admin Panel</span> <i class="fa fa-circle"></i> </li>
                    <li> <span>Show Category List </span> </li>
                </ul>
            </div>
            <?php if ($this->session->flashdata('message') != '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <?php echo @$this->session->flashdata('message'); unset($_SESSION['message']);?>
            </div>
            <?php } else if ($this->session->flashdata('error') != ''){ ?>
            <div class="alert alert-danger" style="margin-top: 20px;">
                <?php echo @$this->session->flashdata('error'); unset($_SESSION['error']);?>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line boxless tabbable-reversed">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption"> <i class="fa fa-gift"></i>Show Category</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <table class="table table-striped" id="">
                                        <tr>
                                            <td>
                                                <div class="portlet-body form">
                                                    <?php /*echo $categorieslisting;*/ ?>
                                                    <table
                                                        class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive"
                                                        id="sample_1">
                                                        <div id="mydiv">
                                                            <thead>
                                                                <tr>
                                                                    <th width="180"
                                                                        style="max-width:170px; float:left;">Category
                                                                        List</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if (is_array($eloca)): ?>
                                                                    <?php
                                                                    $ctn = 1;
                                                                    foreach ($eloca as $i) {
                                                                        ?>
                                                                        <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive"
                                                                            id="sample_1">
                                                                            <td style="max-width:200px;">
                                                                                <div class="col-md-12" style="text-align:left;">
                                                                                    <div class="col-md-12"
                                                                                        style="background-color: #999;border-bottom: 1px solid #ccc;color: #fff; padding: 5px;">
                                                                                        <?php echo $i->category_name; ?>&nbsp;<a
                                                                                            class="btn green sbold uppercase btn-xs"
                                                                                            href="<?php echo base_url() ?>supercontrol/category/show_category_id/<?php echo $i->category_id; ?>">Edit</a>
                                                                                        &nbsp;<a
                                                                                            class="btn red sbold uppercase btn-xs"
                                                                                            onclick="return confirm('Are you sure about this delete?');"
                                                                                            href="<?php echo base_url() ?>supercontrol/category/delete_category/<?php echo $i->category_id; ?>">Delete</a>
                                                                                    </div>
                                                                                    <div class="col-md-12" style="padding:5px;">
                                                                                        <?php
                                                                                        $this->db->from('sm_category');
                                                                                        $this->db->where('parent_id', $i->category_id);
                                                                                        $this->db->group_by('category_name', $i->category_name);
                                                                                        $query = $this->db->get();
                                                                                        if ($query->num_rows > 0) {
                                                                                            foreach ($query->result() as $row) {
                                                                                                ?>
                                                                                                <div class="col-md-4">
                                                                                                    <?php echo $row->category_name; ?>
                                                                                                    &nbsp;
                                                                                                    <a class="btn  btn-xs"
                                                                                                        href="<?php echo base_url() ?>supercontrol/category/show_category_id/<?php echo $row->category_id; ?>">&nbsp;</a>
                                                                                                    &nbsp;<a class=""
                                                                                                        onclick="return confirm('Are you sure about this delete?');"
                                                                                                        href="<?php echo base_url() ?>supercontrol/category/delete_category/<?php echo $row->category_id; ?>">&nbsp;</a>
                                                                                                </div>
                                                                                                <div class="col-md-12"
                                                                                                    style="padding:5px; margin-left:25px;">
                                                                                                    <?php
                                                                                                    $this->db->from('sm_category');
                                                                                                    $this->db->where('parent_id', $row->category_id);
                                                                                                    $this->db->group_by('category_name', $row->category_name);
                                                                                                    $query = $this->db->get();
                                                                                                    if ($query->num_rows > 0) {
                                                                                                        foreach ($query->result() as $newr) {
                                                                                                            ?>
                                                                                                            <div class="col-md-4">
                                                                                                                <?php echo $newr->category_name; ?>
                                                                                                                <a class="btn green sbold uppercase btn-xs"
                                                                                                                    href="<?php echo base_url() ?>supercontrol/category/show_category_id/<?php echo $newr->category_id; ?>">Edit</a>
                                                                                                                <a class="btn red sbold uppercase btn-xs"
                                                                                                                    onclick="return confirm('Are you sure about this delete?');"
                                                                                                                    href="<?php echo base_url() ?>supercontrol/category/delete_category/<?php echo $newr->category_id; ?>">Delete</a>
                                                                                                            </div>
                                                                                                            <?php
                                                                                                        }
                                                                                                    }
                                                                                                    ?>
                                                                                                </div>
                                                                                                &nbsp;<a
                                                                                                    class="btn green sbold uppercase btn-xs"
                                                                                                    href="<?php echo base_url() ?>supercontrol/category/show_category_id/<?php echo $row->category_id; ?>">Edit</a>
                                                                                                &nbsp;<a
                                                                                                    class="btn red sbold uppercase btn-xs"
                                                                                                    onclick="return confirm('Are you sure about this delete?');"
                                                                                                    href="<?php echo base_url() ?>supercontrol/category/delete_category/<?php echo $row->category_id; ?>">Delete</a><br>
                                                                                            <?php }
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <?php $ctn++;
                                                                    } ?>
                                                                <?php endif; ?>
                                                            </tbody>
                                                        </div>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
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

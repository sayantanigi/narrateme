<div class="page-container">
    <div class="page-sidebar-wrapper">
        <?php $this->load->view('leftbar'); ?>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title"><?php echo @$title; ?></h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li><a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i> </li>
                    <li><span> <?php echo @$title; ?></span> </li>
                </ul>
            </div>
            <?php if($this->session->flashdata('message')) { ?>
            <div class="alert alert-success alert-dismissable" style="padding:10px;">
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>
                <?php
                echo $this->session->flashdata('message');
                unset($_SESSION['message']);
                ?>
                </strong>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-hoki">
                        <div class="portlet-title">
                            <div class="caption"><i class="fa fa-reorder"></i></div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"> </a>
                                <!-- <a href="#portlet-config" data-toggle="modal" class="config"> </a> -->
                                <a href="javascript:;" class="reload"> </a>
                                <!-- <a href="javascript:;" class="remove"> </a> -->
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar"> </div>
                            <table
                                class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive"
                                id="sample_1">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Page Title</th>
                                        <th>Page Heading</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($ecms)) {
                                foreach ($ecms as $i) {
                                ?>
                                    <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                        <td>
                                        <?php if ($i->cmsimg == "") { ?>
                                            <img src="<?php echo base_url() ?>/uploads/no_image.png" width="30" height="30" />
                                        <?php } else { ?>
                                            <img src="<?php echo base_url() ?>/uploads/cms/<?php echo $i->cmsimg; ?>" width="30" height="30" />
                                        <?php } ?>
                                        </td>
                                        <td style="max-width:200px;">
                                            <?php echo $i->cms_pagetitle; ?>
                                        </td>
                                        <td style="max-width:250px;">
                                            <?php echo $i->cms_page_heading; ?>
                                        </td>
                                        <td style="max-width:350px;">
                                        <?php if ($i->cms_pagedes == "") {
                                            echo "No Data";
                                        } else {
                                            echo substr(strip_tags(stripslashes($i->cms_pagedes)), 0, 30);
                                        } ?>
                                        </td>
                                        <td style="max-width:50px;">
                                            <a class="btn green btn-sm btn-outline sbold uppercase"  href="<?php echo base_url() ?>cms/show_individual_cms_id/<?php echo $i->id; ?>">Edit</a>
                                        </td>
                                        <td>
                                            <a class="btn green btn-sm btn-outline sbold uppercase" href="<?php echo base_url() ?>cms/delete_cms/<?php echo $i->id ?>" onclick="return confirm('Are you sure you want to delete ?');">Delete</a>
                                        </td>
                                    </tr>
                                    <?php }
                                    } else { ?>
                                    <tr>
                                        <td colspan="5">No Data Find</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
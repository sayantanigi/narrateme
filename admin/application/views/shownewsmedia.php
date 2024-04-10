<div class="page-container">
    <div class="page-sidebar-wrapper">
        <?php $this->load->view('leftbar'); ?>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title"> <?php echo @$title; ?>
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li> <a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i> </li>
                    <li> <span><?php echo @$title; ?></span> </li>
                </ul>
            </div>
            <?php if ($this->session->flashdata('message')) { ?>
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
                            <div class="caption"> <i class="fa fa-reorder"></i></div>
                            <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config"
                                    data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a>
                                <a href="javascript:;" class="remove"> </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar"> </div>
                            <table
                                class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive"
                                id="sample_1">
                                <thead>
                                    <tr>
                                        <th width="18%"> Name </th>
                                        <th width="10%"> ipaddress</th>
                                        <th width="9%"> website </th>
                                        <th width="8%"> domain_name </th>
                                        <th width="11%"> url </th>
                                        <th width="14%"> information </th>
                                        <th width="14%"> newsreport</th>
                                        <th width="10%"> Status </th>
                                        <th width="8%"> Edit </th>
                                        <th width="12%"> Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($ecms)) {
                                        foreach ($ecms as $i) {
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $i->name; ?></td>
                                                <td><?php echo $i->ipaddress; ?></td>
                                                <td><?php echo $i->website; ?></td>
                                                <td><?php echo $i->domain_name; ?></td>
                                                <td><?php echo $i->url; ?></td>
                                                <td><?php echo $i->information; ?></td>
                                                <td><?php echo $i->newsreport; ?></td>
                                                <td><?php if ($i->status == 1) { ?>
                                                        <span style="color:#063;"><?php echo "Active"; ?></span>
                                                    <?php } else { ?>
                                                        <span style="color:#900;"><?php echo "Inactive"; ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td><a class="btn green btn-sm btn-outline sbold uppercase"
                                                        href="<?php echo base_url() ?>index.php/newsmedia/show_newsmedia_id/<?php echo $i->id ?>">Edit</a>
                                                </td>
                                                <td><a class="btn green btn-sm btn-outline sbold uppercase"
                                                        href="<?php echo base_url() ?>index.php/newsmedia/delete_newsmedia/<?php echo $i->id ?>"
                                                        onclick="return confirm('Are you sure you want to delete ?');">Delete</a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else { ?>
                                        <tr>
                                            <td colspan="10">No Data Find</td>
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
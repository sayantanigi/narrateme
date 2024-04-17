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
                    <li> <a href="<?php echo base_url(); ?>supercontrol/home">Home</a> <i class="fa fa-circle"></i>
                    </li>
                    <li> <span>supercontrol Panel</span> <i class="fa fa-circle"></i> </li>
                    <li> <span>Show Level List </span> </li>
                </ul>
            </div>
            <?php if($this->session->flashdata('message')) {
            echo '<div class="alert alert-success alert-dismissable" style="padding:10px;">';
            echo $this->session->flashdata('message');
            unset($_SESSION['message']);
            echo '</div>';
            } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line boxless tabbable-reversed">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption"> <i class="fa fa-gift"></i>Show Level</div>
                                        <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a
                                                href="javascript:;" class="reload"> </a> <a href="javascript:;"
                                                class="remove"> </a> </div>
                                    </div>

                                    <div class="portlet-body form">
                                        <button class="btn btn-warning btn-sm pull-right" id="del_all"
                                            style="padding:5px; margin:8px;"
                                            onclick="return confirm('Are you sure about this delete?');">Delete
                                            selected</button>

                                        <!-- BEGIN FORM-->
                                        <table
                                            class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive"
                                            id="sample_1">
                                            <div id="mydiv">
                                                <thead>
                                                    <tr>
                                                        <th width="20"><input id="selectall" type="checkbox"></th>
                                                        <!--<th width="180" style="max-width:170px;">Image</th>-->
                                                        <th width="30">Level Title</th>
                                                        <th width="60">Status</th>
                                                        <!--<th width="27">View</th>-->
                                                        <th width="27">Edit</th>
                                                        <!--<th width="27">Delete</th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (is_array($ecms)): ?>
                                                        <?php
                                                        $ctn = 1;
                                                        foreach ($ecms as $i) {
                                                            ?>
                                                            <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive"
                                                                id="sample_1">
                                                                <td>
                                                                    <input name="checkbox[]" class="checkbox1" type="checkbox"
                                                                        value="<?php echo $i->id; ?>">
                                                                </td>

                                                                <td style="max-width:200px;"><?php echo $i->level_title; ?></td>
                                                                <td style="max-width:250px;">
                                                                    <div class="form-group">
                                                                        <div class="col-md-5">
                                                                            <select name="level_status" id="stachange"
                                                                                onchange="f1(this.value,<?php echo $i->id; ?>)"
                                                                                style="padding:4px;">
                                                                                <option value="1" <?php if ($i->level_status == 1) { ?>
                                                                                        selected="selected" <?php } ?>>Active
                                                                                </option>
                                                                                <option value="0" <?php if ($i->level_status == 0) { ?>
                                                                                        selected="selected" <?php } ?>>Inactive
                                                                                </option>
                                                                            </select>
                                                                            <input type="hidden" name="id"
                                                                                value="<?php echo $i->id; ?>">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <!--<td style="max-width:50px;"><a class="btn yellow btn-sm btn-outline sbold uppercase" href="<?php echo base_url() ?>supercontrol/mode/view_mode/<?php echo $i->id; ?>">View</a></td>-->
                                                                <td style="max-width:50px;"><a
                                                                        class="btn blue btn-sm btn-outline sbold uppercase"
                                                                        href="<?php echo base_url() ?>supercontrol/level/show_level_id/<?php echo $i->id; ?>">Edit</a>
                                                                </td>
                                                                <!--<td style="max-width:50px;"><a class="btn red btn-sm btn-outline sbold uppercase" onclick="return confirm('Are you sure about this delete?');" href="<?php echo base_url() ?>supercontrol/mode/delete_mode/<?php echo $i->id; ?>">Delete</a></td>-->
                                                            </tr>

                                                            <?php $ctn++;
                                                        } ?>
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
    $(document).ready(function () {
        //resetcheckbox();
        $("#selectall").click(function () {
            var check = $(this).prop('checked');
            if (check == true) {
                $('.checker').find('span').addClass('checked');
                $('.checkbox1').prop('checked', true);
            } else {
                $('.checker').find('span').removeClass('checked');
                $('.checkbox1').prop('checked', false);
            }
        });
        $("#del_all").on('click', function (e) {
            e.preventDefault();
            var checkValues = $('.checkbox1:checked').map(function () {
                return $(this).val();
            }).get();
            console.log(checkValues);
            $.each(checkValues, function (i, val) {
                $("#" + val).remove();
            });
            $.ajax({
                url: '<?php echo base_url() ?>supercontrol/level/delete_multiple',
                type: 'post',
                data: 'ids=' + checkValues
            }).done(function (data) {
                $("#respose").html(data);
                //location.reload();
                var newurl = '<?php echo base_url() ?>supercontrol/level/show_level';
                window.location.href = newurl;
                $('#selectall').attr('checked', false);
            });
        });

        function resetcheckbox() {
            $('input:checkbox').each(function () {
                this.checked = false;
            });
        }
    });
</script>
<script>
    function f1(stat, id) {
        $.ajax({
            type: "get",
            url: "<?php echo base_url(); ?>supercontrol/level/statuslevel",
            data: { stat: stat, id: id }
        });
    }
</script>
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
                    <li> <span>Show Training Material List </span> </li>
                </ul>
            </div>
            <?php if ($this->session->flashdata('message') != '') { ?>
                <div class="alert alert-success text-center">
                    <?php
                    echo $this->session->flashdata('message');
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tabbable-line boxless tabbable-reversed">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption"> <i class="fa fa-gift"></i>Show Training Material List</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                            <a href="javascript:;" class="reload"> </a>
                                            <a href="javascript:;" class="remove"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <!-- <button class="btn btn-warning btn-sm pull-right" id="del_all" style="padding:5px; margin:8px;" onclick="return confirm('Are you sure about this delete?');">Delete selected</button> -->
                                        <button class="btn btn-warning btn-sm pull-right" id="del_all" style="padding:5px; margin:8px;">
                                            <a href="<?php echo base_url() ?>supercontrol/course/add_course_trainingmaterial_view/<?php echo end($this->uri->segment_array()); ?>">Add New Material</a>
                                        </button>
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                            <div id="mydiv">
                                                <thead>
                                                    <tr>
                                                        <th width="20"><input id="selectall" type="checkbox"></th>
                                                        <th width="30">Sl No</th>
                                                        <th width="180" style="max-width:170px;">Training Material PDF</th>
                                                        <th width="30">Training Material Name</th>
                                                        <th width="27">Edit</th>
                                                        <th width="27">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (is_array($syllabuslist)): ?>
                                                    <?php
                                                    $ctn = 1;
                                                    foreach ($syllabuslist as $i) {
                                                    ?>
                                                    <tr class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">
                                                        <td>
                                                            <input name="checkbox[]" class="checkbox1" type="checkbox" value="<?php echo $i->training_material_id; ?>">
                                                        </td>
                                                        <td><?php echo $ctn; ?></td>
                                                        <td>
                                                        <?php if (!empty($i->training_material_files)): ?>
                                                            <a href="<?php echo site_url('uploads/trainingmaterial/' . $i->training_material_files); ?>">
                                                                <i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>
                                                            </a>
                                                        <?php else: ?>
                                                            <img src="<?php echo base_url(); ?>img/350x260.png" alt="Please Connect Your Internet">
                                                        <?php endif; ?>
                                                        </td>
                                                        <td style="max-width:200px;">
                                                            <?php echo $i->training_material_name; ?></td>
                                                        <td style="max-width:50px;">
                                                            <a class="btn green btn-sm btn-outline sbold uppercase" href="<?php echo base_url() ?>supercontrol/course/edit_trainingmaterial_view/<?php echo $i->training_material_id; ?>">Edit</a>
                                                        </td>
                                                        <td style="max-width:50px;">
                                                            <a class="btn red btn-sm btn-outline sbold uppercase" onclick="return confirm('Are you you want to  delete?');" href="<?php echo base_url() ?>supercontrol/course/delete_trainingmaterial/<?php echo $i->training_material_id; ?>">Delete</a>
                                                        </td>
                                                    </tr>
                                                    <?php $ctn++;
                                                    } ?>
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
    $(document).ready(function () {
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
                url: '<?php echo base_url() ?>supercontrol/press/delete_multiple',
                type: 'post',
                data: 'ids=' + checkValues
            }).done(function (data) {
                $("#respose").html(data);
                var newurl = '<?php echo base_url() ?>supercontrol/press/show_press';
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
            url: "<?php echo base_url(); ?>supercontrol/press/statuspress",
            data: { stat: stat, id: id }
        });
    }
</script>
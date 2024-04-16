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
    .dataTables_info {
        padding: 7px;
    }
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
                    <li><a href="<?php echo base_url(); ?>supercontrol/home">Home</a><i class="fa fa-circle"></i> </li>
                    <li><span>supercontrol Panel</span> <i class="fa fa-circle"></i></li>
                    <li><span>Show Course List </span></li>
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
                    <div class="tabbable-line boxless tabbable-reversed showcase_buttons">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_0">
                                <div class="portlet box blue-hoki">
                                    <div class="portlet-title">
                                        <div class="caption"> <i class="fa fa-gift"></i> Course Booking Details </div>
                                        <button class="btn btn-warning btn-sm pull-right" id="del_all"
                                            style="padding:5px; margin:8px;"
                                            onclick="return confirm('Are you sure about this delete?');">Delete
                                            selected</button>
                                        <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a
                                                href="javascript:;" class="reload"> </a> <a href="javascript:;"
                                                class="remove"> </a> </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive"
                                                id="sample_1">
                                                <div id="mydiv">
                                                    <thead>
                                                        <tr>
                                                            <th width="20"><input id="selectall" type="checkbox"></th>
                                                            <th width="180" style="max-width:170px;">Image</th>
                                                            <th>Course Title</th>
                                                            <th> Course Category</th>
                                                            <th>Course Overview</th>
                                                            <th> Course Type Details </th>
                                                            <th width="27">Syllabus</th>
                                                            <th width="27">Training Material</th>
                                                            <th width="27">Course Session </th>
                                                            <th width="27">Course Clone</th>
                                                            <th width="27">Action</th>
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
                                                                    <td><input name="checkbox[]" class="checkbox1"
                                                                            type="checkbox" value="<?php echo $i->course_id; ?>">
                                                                    </td>
                                                                    <td><?php if ($i->course_image == "") { ?>
                                                                            No Image
                                                                        <?php } else { ?>
                                                                            <img src="<?php echo base_url() ?>/uploads/courseimage/<?php echo $i->course_image; ?>"
                                                                                width="150" height="100"
                                                                                style="border: 2px solid #ddd;" />
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td><?php echo $i->course_name; ?></td>
                                                                    <td>
                                                                        <?php
                                                                        $this->load->model('generalmodel');
                                                                        $table_name = 'sm_category';
                                                                        $primary_key = 'category_id';
                                                                        $wheredata = $i->course_category;
                                                                        $queryallcat = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '');
                                                                        echo $queryallcat[0]->category_name;
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <b>Course Price </b>: <?php echo $i->price; ?></br>
                                                                        <b>Course Certification </b>:
                                                                        <?php echo $i->certificate; ?></br>
                                                                        <b>Skills Required </b>:
                                                                        <?php echo $i->entry_requirment; ?></br>
                                                                        <b>Who should Attend </b>:
                                                                        <?php echo $i->who_should_apply; ?></br>
                                                                    </td>
                                                                    <td>
                                                                        <b>Course Mode </b>: <?php
                                                                        $this->load->model('generalmodel');
                                                                        $table_name = 'sm_mode';
                                                                        $primary_key = 'id';
                                                                        $wheredata = $i->course_mode;
                                                                        $queryallmode = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '');
                                                                        echo $queryallmode[0]->mode_title;
                                                                        ?></br>
                                                                        <b>Course Level </b>:
                                                                        <?php
                                                                        $this->load->model('generalmodel');
                                                                        $table_name = 'sm_levels';
                                                                        $primary_key = 'id';
                                                                        $wheredata = $i->course_level;
                                                                        $queryalllevels = $this->generalmodel->getAllData($table_name, $primary_key, $wheredata, '', '');
                                                                        echo $queryalllevels[0]->level_title;
                                                                        ?></br>
                                                                        <b>Course Start Date </b>:
                                                                        <?php echo $i->course_startDate; ?></br>
                                                                        <b>Course End Date </b>:
                                                                        <?php echo $i->course_endDate; ?>
                                                                    </td>
                                                                    <td style="max-width:250px;">
                                                                        <a class="btn green btn-sm btn-outline uppercase"
                                                                            href="<?php echo base_url(); ?>supercontrol/course/add_course_syllabus_view/<?php echo $i->course_id; ?>"><i
                                                                                class="fa fa-plus" aria-hidden="true"></i>
                                                                            Syllabus</a>
                                                                        <a class="btn green btn-sm btn-outline uppercase"
                                                                            href="<?php echo base_url(); ?>supercontrol/course/syllabus_list/<?php echo $i->course_id; ?>"><i
                                                                                class="fa fa-eye" aria-hidden="true"></i>
                                                                            Syllabus</a>
                                                                    </td>
                                                                    <td style="max-width:250px;">
                                                                        <a class="btn green btn-sm btn-outline uppercase"
                                                                            href="<?php echo base_url(); ?>supercontrol/course/add_course_trainingmaterial_view/<?php echo $i->course_id; ?>"><i
                                                                                class="fa fa-plus" aria-hidden="true"></i>
                                                                            Training Material</a>
                                                                        <a class="btn green btn-sm btn-outline uppercase"
                                                                            href="<?php echo base_url(); ?>supercontrol/course/trainingmaterial_list/<?php echo $i->course_id; ?>"><i
                                                                                class="fa fa-eye" aria-hidden="true"></i>
                                                                            Training Material</a>
                                                                    </td>
                                                                    <td style="max-width:250px;">
                                                                        <a class="btn green btn-sm btn-outline uppercase"
                                                                            href="<?php echo base_url(); ?>supercontrol/course/add_course_session_view/<?php echo $i->course_id; ?>"><i
                                                                                class="fa fa-plus" aria-hidden="true"></i>
                                                                            Course Session</a>
                                                                        <a class="btn green btn-sm btn-outline uppercase"
                                                                            href="<?php echo base_url(); ?>supercontrol/course/course_session_list/<?php echo $i->course_id; ?>"><i
                                                                                class="fa fa-eye" aria-hidden="true"></i> Course
                                                                            Session List</a>
                                                                    </td>
                                                                    <td style="max-width:250px;">
                                                                        <a class="btn green btn-sm btn-outline uppercase"
                                                                            href="<?php echo base_url(); ?>supercontrol/course/add_course_clone/<?php echo $i->course_id; ?>"><i
                                                                                class="fa fa-plus" aria-hidden="true"></i>
                                                                            Course Clone</a>
                                                                    </td>
                                                                    <td style="max-width:50px;">
                                                                        <a class="btn green btn-sm btn-outline sbold uppercase"
                                                                            href="<?php echo base_url() ?>supercontrol/course/view_course/<?php echo $i->course_id; ?>"><i
                                                                                class="fa fa-eye" aria-hidden="true"></i>
                                                                        </a>
                                                                        <a class="btn green btn-sm btn-outline sbold uppercase"
                                                                            href="<?php echo base_url() ?>supercontrol/course/show_course_id/<?php echo $i->course_id; ?>"><i
                                                                                class="fa fa-pencil-square-o"
                                                                                aria-hidden="true"></i>
                                                                        </a>
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
                url: '<?php echo base_url() ?>supercontrol/course/delete_multiple',
                type: 'post',
                data: 'ids=' + checkValues
            }).done(function (data) {
                $("#respose").html(data);
                //location.reload();
                var newurl = '<?php echo base_url() ?>supercontrol/course/show_course';
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
            url: "<?php echo base_url(); ?>supercontrol/blog/statusblog",
            data: { stat: stat, id: id }
        });
    }
</script>
<style type="text/css">
    .showcase_buttons {}
    .showcase_buttons .btn.btn-outline.green {
        width: 100%;
        margin: 0 0 5px 0;
    }
    .showcase_buttons .btn.btn-outline.red {
        width: 100%;
    }
</style>
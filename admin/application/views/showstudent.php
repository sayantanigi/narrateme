<!--<h2>Welcome <?php //echo $UserName; ?>!</h2>-->



<div class="page-container">

  <!-- BEGIN SIDEBAR -->

  <div class="page-sidebar-wrapper">

    <!-- BEGIN SIDEBAR -->

    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->

    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->

    <?php $this->load->view('leftbar'); ?>

    <!-- END SIDEBAR -->

  </div>

  <!-- END SIDEBAR -->

  <!-- BEGIN CONTENT -->

  <div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->

    <div class="page-content">

      <!-- END THEME PANEL -->

      <!-- BEGIN PAGE TITLE-->

      <h3 class="page-title"> <?php echo @$title;?>

        <!--<small>classic page head option</small>-->

      </h3>

      <!-- END PAGE TITLE-->

      <!-- BEGIN PAGE BAR -->

      <div class="page-bar">

        <ul class="page-breadcrumb">

          <li> <a href="dashboard.php">Home</a> <i class="fa fa-angle-right"></i> </li>

          <li> <span><?php echo @$title;?></span> </li>

        </ul>

      </div>

      <!-- END PAGE BAR -->

      <!-- END PAGE HEADER-->

     

      <div class="alert alert-success alert-dismissable" style="padding:10px;">

        <button class="close" aria-hidden="true" data-dismiss="alert" type="button" style="right:0;"></button>

        <strong>

			<?php 

				$last = end($this->uri->segments); 

				if($last=="successupdate"){echo "Data Updated Successfully ......";}

				if($last=="successdelete"){echo "Data Deleted Successfully ......";}

            ?>

        </strong> 

      </div>

      <div class="row">

        <div class="col-md-12">

          <!-- BEGIN PORTLET-->

          <div class="portlet box blue-hoki">

            <div class="portlet-title">

              <div class="caption"> <i class="fa fa-reorder"></i>

               

              </div>

              <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>

            </div>

            <div class="portlet-body">

              <!-- BEGIN FORM-->

              <div class="table-toolbar"> </div>

              <table class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">

                <thead>

                  <tr>

                    <th width="18%"> Name </th>

                    <th width="9%">  Mobile </th>

                    <th width="8%">  Email </th>

                    <th width="14%"> Gender </th>

                    <th width="10%"> Status </th>

                    <th width="10%"> Add Award </th>

                     <th width="10%">Add Extra </th>

                    <th width="10%"> Add Job </th>

                    <th width="8%">  Edit </th>

                    <th width="12%"> Delete </th>

                  </tr>

                </thead>

                <tbody>

				<?php

				if( !empty($ecms) ) {

                foreach($ecms as $i){

                ?>

                  <tr class="odd gradeX">

                    <td><?php echo $i->name; ?></td>

                    <td><?php echo $i->mobile;?></td>

                    <td><?php echo $i->email;?></td>

                    <td><?php if($i->gender ==1){ echo "Male";  }else{echo "Female";}?> </td>

                    <td><?php if($i->status ==1){?>

                      <span style="color:#063;"><?php echo "Active";?></span>

                      <?php }else{?>

                      <span style="color:#900;"><?php echo "Inactive";?></span>

                      <?php }?></td>

                      <td><a href="<?php echo base_url()?>index.php/studentaward/add_student_award/<?php echo $i->id?>" class="btn green btn-sm btn-outline sbold uppercase">Add Award</a></td>

                      <td><a href="<?php echo base_url()?>index.php/student/add_extra/<?php echo $i->id?>" class="btn green btn-sm btn-outline sbold uppercase">Add Extra</a></td>

                      <td><a href="<?php echo base_url()?>index.php/student/add_student_experience/<?php echo $i->id?>" class="btn green btn-sm btn-outline sbold uppercase">Add Job</a></td>

                    <td><a class="btn green btn-sm btn-outline sbold uppercase" href="<?php echo base_url()?>index.php/student/show_student_id/<?php echo $i->id?>">Edit</a></td>

                    <td><a class="btn green btn-sm btn-outline sbold uppercase" href="<?php echo base_url()?>index.php/student/delete_student/<?php echo $i->id?>" onclick="return confirm('Are you sure you want to delete ?');">Delete</a></td>

                  </tr>

                  <?php }}else{?>

                  <tr><td colspan="11">No Data Find</td></tr>

                  <?php }?>

                </tbody>

              </table>

              <!-- END FORM-->

            </div>

          </div>

          <!-- END PORTLET-->

        </div>

      </div>

    </div>

    <!-- END CONTENT BODY -->

  </div>

  <!-- END CONTENT -->

  <!-- BEGIN QUICK SIDEBAR -->

  <!-- END QUICK SIDEBAR -->

</div>


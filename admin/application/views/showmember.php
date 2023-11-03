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

			//echo $this->uri->segment(2);

			$rdurl=$this->uri->segment(3);

			//$urlpath=base_url()."index.php/individual/view_individual";

			if($rdurl){

				$imgpath="../../../images/";

			}else{

				$imgpath="../../images/";

			}

			?>

			<?php 

				$last = end($this->uri->segments); 

				if($last=="successupdate"){echo "Data Updated Successfully ......";}

				if($last=="successdelete"){echo "Data Deleted Successfully ......";}

				if($last=="drs"){echo "Drug Added Successfully ......";}

				if($last=="aws"){echo "Award Added Successfully ......";}

				if($last=="ars"){echo "Rehab Added Successfully ......";}

				if($last=="ais"){echo "Institute Added Successfully ......";}

				if($last=="ats"){echo "Teacher Added Successfully ......";}

				if($last=="acs"){echo "Coach Added Successfully ......";}

				if($last=="ares"){echo "Recomendation Added Successfully ......";}

				if($last=="jobs"){echo "Jobs Added Successfully ......";}

            	if($last=="Extra"){echo "Extra Added Successfully ......";}

            ?>

        </strong> 

      </div>

      <div class="row">

        <div class="col-md-12">

          <!-- BEGIN PORTLET-->

          <div class="portlet box blue-hoki">

            <div class="portlet-title">

              <div class="caption"> <i class="fa fa-reorder"></i>

                <?//=$pagetitle?>

              </div>

              <div class="tools"> <a href="javascript:;" class="collapse"> </a> <a href="#portlet-config" data-toggle="modal" class="config"> </a> <a href="javascript:;" class="reload"> </a> <a href="javascript:;" class="remove"> </a> </div>

            </div>

            <div class="portlet-body">

              <!-- BEGIN FORM-->

              <div class="table-toolbar"> </div>

              <table class="table table-striped table-bordered table-hover table-checkable order-column dt-responsive" id="sample_1">

                <thead>

                  <tr>

                    <th width="15%">Name</th>

                    <th width="6%"> Email</th>

                    <th width="9%"> Address </th>

                    <th width="6%"> City </th>

                    <th width="8%"> State </th>

                    <th width="8%"> Zip</th>
                    <th width="8%"> Friends</th>
                    <th width="8%"> Phone No </th>

                    <th width="9%"> Website</th>

                    <th width="9%"> Status</th>

                  </tr>

                </thead>

                <tbody>

				<?php

                foreach($ecms as $i){

                ?>

                  <tr class="odd gradeX">

                    <td><a href="<?php echo base_url()?>index.php/userprofile/show_user/<?php echo $i->id?>"><?php echo $i->first_name ." ".$i->last_name; ?></a></td>

                    <td><?php echo $i->email; ?></td>

                    <td><?php echo $i->address; ?></td>

                    <td><?php echo $i->city; ?></td>

                    <td><?php echo $i->state;?></td>

                    <td><?php echo $i->zip_code;?></td>
                    
                    <td><a class="btn green btn-sm btn-outline sbold uppercase" href="<?php echo base_url()?>index.php/friends/view_friends/<?=$i->id?>">View</a></td>
                    
                    
                    
                    <td><?php echo $i->first_name ." ".$i->phone_no; ?></td>

                    <td><?php echo $i->website;?></td>

                    

                    

                    <td><?php if($i->status ==1){?>

                      <span style="color:#063;"><img src="<?php echo $imgpath?>active.png" /></span>

                      <?php }else{?>

                      <span style="color:#900;"><img src="<?php echo $imgpath?>inactive.png" /></span>

                      <?php }?></td>

                  </tr>

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


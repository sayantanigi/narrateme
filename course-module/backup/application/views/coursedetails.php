<!-- Content design start here-->
<div class="clearfix"></div>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('modesview');?>
  </div>
  <div class="clearfix"></div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <div class="cb-left">
        <h4><?php echo $querycrs[0]->course_name;?></h4>
        <h3>Syllabus</h3>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="cb-right">
        <div class="green-btn"><a href="#">Select booking modes above for price, Time Table, Terms and Conditions and bookings</a></div>
      </div>
    </div>
  </div>
  <hr>
  <div class="depcription-sec">
    <div class="row">
		<?php 
        if(!empty($querydesc)){
            foreach($querydesc as $qd){
        ?>
      <div class="col-sm-4">
        <div class="depcription-bg left-radius">
          <h4 class="heading4"><?php echo $qd->syllabus_name;?></h4>
          <p><?php echo $qd->syllabus_content;?></p>
          <hr>
        </div>
      </div>
		<?php 
            }
        }
        ?>
    </div>
  </div>
  <?php foreach ($querycrs as $value) {?>
    
 
  <p class="heading1">CPD Accredited : <span> <?php echo $value->cpd;?></span></p>
  <p class="heading1">Certificates : <span><?php echo $value->certificate;?></span></p>
  <p class="heading1">Pre-Requisite : <span><?php echo $value->entry_requirment;?></span></p>
  <?php }?>
  <button data-toggle="modal" data-target="#myModal" type="submit" name="" class="book-btn">Book</button>
</div>
<div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Course Modes</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6" style="background-color:lavender;"><div class="green-btn"><a style="text-align:center;" href="<?=base_url();?>course/modeincourse/<?=$this->uri->segment(3)?>">Classroom</a></div></div>
                   
                   <div class="col-sm-6" style="background-color:lavender;"><div class="green-btn"><a style="text-align:center;" href="<?=base_url();?>course/privatecourse/<?=$this->uri->segment(3)?>">Private</a></div></div>
                </div>
                <br/>
                <div class="row">
                    
                    <div class="col-sm-6" style="background-color:lavenderblush;"><div class="green-btn"><a style="text-align:center;" href="<?=base_url();?>course/distancecourse/<?=$this->uri->segment(3)?>">Distance</a></div></div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
            </div>
            </div>
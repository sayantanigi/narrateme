  <?php 
  $nl=$this->uri->segment(2);
  ?>
  <div class="classroom_booking">
  <div class="col-sm-2">
        <div class="<?php if($nl=='coursedescription'){echo trim("tablink-light-active")?><?php }else{?>tablink-light<?php }?>"> <a href="<?php echo base_url()?>course/coursedescription/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>">Course Outline</a> </div>
      </div>
  	<div class="col-sm-2">
        <div class="<?php if($nl=='modeincourse'){echo trim("tablink-light-active")?><?php }else{?>tablink-dark<?php }?>"> <a href="<?php echo base_url()?>course/modeincourse/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>">Classroom Booking</a> </div>
      </div>
      <div class="col-sm-2">
        <div class="<?php if($nl=='flexiblecourse'){echo trim("tablink-light-active")?><?php }else{?>tablink-light<?php }?>"> <a href="<?php echo base_url()?>course/flexiblecourse/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>">Flexibility Booking</a> </div>
      </div>
      <div class="col-sm-2">
        <div class="<?php if($nl=='privatecourse'){echo trim("tablink-light-active")?><?php }else{?>tablink-dark<?php }?>"> <a href="<?php echo base_url()?>course/privatecourse/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>">Private Booking</a> </div>
      </div>
      <div class="col-sm-2">
        <div class="<?php if($nl=='distancecourse'){echo trim("tablink-light-active")?><?php }else{?>tablink-light<?php }?>"> <a href="<?php echo base_url()?>course/distancecourse/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>">Distance Booking</a> </div>
      </div>
      <div class="col-sm-2">
        <div class="<?php if($nl=='review'){echo trim("tablink-light-active")?><?php }else{?>tablink-dark<?php }?>"> <a href="<?php echo base_url()?>course/review/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>/<?php echo $this->uri->segment(5);?>">Review</a> </div>
      </div>
      </div>
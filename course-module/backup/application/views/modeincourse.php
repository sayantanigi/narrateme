<div class="clearfix"></div>
<div class="container-fluid">
 <div class="row">
  <?php $this->load->view('modesview');?>
</div>
<div class="clearfix"></div>
</div>
<div class="container">
   <!-- <div class="row">
      <div class="col-sm-6">
        <h4 class="price" style="margin-top: 34px;margin-bottom: -77px;"><?= @$batchlist->courseType ?> </h4>
      </div>
    </div> -->
    <div class="row">
      <div class="col-sm-12">
       <div class="cb-left">
        <h4 class="price"><?= ucfirst(@$course->course_name) ?> </h4>
        <!-- <h4><?php echo $coursename?></h4> -->
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
     <div class="cb-left">
      <h4 class="price">Location : <?= @$batchlist->batchLocation ?> </h4>
      <!-- <h4><?php echo $coursename?></h4> -->
    </div>
  </div>
  <div class="col-sm-6">
   <div class="cb-right">
    <h4 class="price">Price : £ <?php echo $price;?> </h4>
  </div>
</div>
</div>
<h6 class="heading3 pull-left">Total hours: <?= @$batchlist->total_hour ?></h6>
<div class="row">
  <div class="courses">
   <!-- <h2>Batches</h2> -->
   <table class="table table-bordered">
    <thead>
     <tr>
      <th class="text-center">Session</th>
      <th class="text-center">Date</th>
      <th class="text-center">Start Time</th>
      <th class="text-center">End Time</th>
      <th class="text-center">Hours</th>
    </tr>
  </thead>
  <tbody>
   <?php
   if(is_array($batchSession) && count($batchSession)>0){
    $i=1;
    foreach ($batchSession as $value) {
      ?>
               <!-- <div class="col-sm-3">
                  <div class="batchdet">
                    <h4><input type="radio" value="<?=$value->id?>" name="session" class="">    Session<?=$i?></h4>
                    <b> Start Date:</b> <?=date('y-m-d',strtotime($value->date))?><br>
                    <b> Start Time: </b><?=date('h:i',strtotime($value->starttime))?><br>
                    <b> End Time:</b> <?=date('h:i',strtotime($value->endtime))?><br>
                  </div>
                </div> -->
                <tr>
                  <td><?=$i?></td>
                  <td><?=date('y-m-d',strtotime($value->date))?></td>
                  <td><?=date('h:i',strtotime($value->starttime))?></td>
                  <td><?=date('h:i',strtotime($value->endtime))?></td>
                  <td>
                    <?php                   
                      $min = $value->starttime - $value->endtime;
                      echo abs(12-$min);
                    ?>
                  </td>
                </tr>
                <?php
                $i++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
   <!-- <div class="form-sec">
      <div class="row">
        <div class="col-sm-3">
          <p class="fildname">Course type</p>
        </div>
        <div class="col-sm-9">
         <form method="post">
            <div class="checkbox-sec"> <span class="checkbox-label">Weekdays</span>
           <input type="radio" value="wd"  name="type" id="weekdays" class="regular-checkbox" onchange="this.form.submit()" <?php if(@$type=='wd'){?> checked="checked" <?php }?>>
            <label for="weekdays" class="checkbox_cu_label"></label>
          </div>
            <div class="checkbox-sec"> <span class="checkbox-label">Evening</span>
            <input type="radio" value="ev" id="evening" name="type" class="regular-checkbox" onchange="this.form.submit()" <?php if(@$type=='ev'){?> checked="checked" <?php }?>>
            <label for="evening" class="checkbox_cu_label"></label>
          </div>
            <div class="checkbox-sec"> <span class="checkbox-label">Weekend</span>
            <input type="radio" value="we" id="weekend" name="type" class="regular-checkbox" onchange="this.form.submit()" <?php if(@$type=='we'){?> checked="checked" <?php }?>>
            <label for="weekend" class="checkbox_cu_label"></label>
          </div>
          <input type="hidden" name="course_id" value="<?php echo $this->uri->segment(3)?>" />
           <a id="2"></a>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <p class="fildname">Location</p>
         
        </div>
        <div class="col-sm-9">
        <form method="post" action="#3">
          <select class="select_cu" name="location" onchange="this.form.submit()">
            <option>Select Location</option>
            <?php if($location!=''){
         foreach($location as $ln){ 
             ?>
               <option <?php if(@$loc==$ln->location_id){?> selected="selected" <?php }?> value="<?php echo $ln->location_id?>"><?php echo $ln->location_name?></option>
               <?php }
         }
         ?>
          </select>
          <input type="hidden" name="type" value="<?php echo @$type?>" />
          <input type="hidden" name="course_id" value="<?php echo $this->uri->segment(3)?>" />
          
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <p class="fildname">Start Date</p>
        </div>
        <div class="col-sm-9">
        <a id="3"></a>
        <form method="post" action="#4">
        <select class="select_cu" name="start_date" onchange="this.form.submit()">
            <option>Select Start Date</option>
            <?php if(@$start!=''){
         foreach(@$start as $ln){ 
          ?>
               <option <?php if(@$start_date== $ln->start_date_id){?> selected="selected" <?php } ?> value="<?php echo $ln->start_date_id?>"><?php echo date('d-m-Y',strtotime($ln->start_date))?> </option>
               <?php
         }
            }
          ?>
          </select>
          <input type="hidden" name="type" value="<?php echo @$type?>" />
          <input type="hidden" name="course_id" value="<?php echo $this->uri->segment(3)?>" />
          <input type="hidden" name="location" value="<?php echo @$loc?>" />
          </form>
          
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <p class="fildname">End Date</p>
        </div>
        <div class="col-sm-9">
         <a id="4"></a>
        <form method="post" action="">
            <?php if(@$end!=''){
         foreach(@$end as $en){ ?>
            <input type="text" readonly="" class="select_cu1" value="<?php echo date('d-m-Y',strtotime($en->end_date));?>">
            <?php } } ?>
      
          <input type="hidden" name="type" value="<?php echo @$type?>" />
          <input type="hidden" name="course_id" value="<?php echo $this->uri->segment(3)?>" />
          <input type="hidden" name="location" value="<?php echo @$loc?>" />
          <input type="hidden" name="start_date" value="<?php echo @$start_date?>" />
          </form>
        </div>
      </div>
    </div> -->
    <!-- <h3 class="heading3 pull-left">Numbers of hours: <?php if(@$hour!=''){foreach(@$hour as $ln){ echo $ln->hour; }}?></h3>-->
    <!--<h3 class="heading3 pull-right">Numbers of hours: <?php if(@$hour!=''){foreach(@$hour as $ln){ echo $ln->hour; }}?></h3>-->
    <div class="clearfix"></div>
    <?php 
      //print_r($lesson);
    if(@$lesson!=''){?>
     <h3 class="heading3"> <?php if($type=='wd'){?>Week days Time Table<?php }else if($type=='ev'){?>Evening Time Table <?php }else if($type=='we'){?>Week End Time Table <?php }?></h3>
     <table class="cu-table" width="100%">
      <tr>
       <th>Lesson</th>
       <th>Date</th>
       <th>Start Time</th>
       <th>End Time</th>
     </tr>
     <?php 
     $cnt=1;
     foreach(@$lesson as $ls){
      ?>
      <tr>
       <td><?php echo $cnt?></td>
       <td><?php echo date('d/m/Y',strtotime($ls->start_date))?></td>
       <td><?php echo date('H:i',strtotime($ls->start_time))?></td>
       <td><?php echo date('H:i',strtotime($ls->end_time))?></td>
     </tr>
     <?php 
     $cnt++;
   }?>  
 </table>
 <?php 
}
?>
<!--<p class="heading1">[ If you miss less than 50% of lessons you may choose to book as Flexibility Mode]</p>-->
<!-- <p class="heading1" style="margin-bottom:0;">If you cannot make all lessons, you could alternatively book as Private or Flexibility mode.</p> -->
<p class="heading1" style="margin-bottom:0;">Can you make all above lessons?</p>
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>
<div class="radio_cu">
  <div class="form-group">
    <label class="control-label col-sm-2">YES</label>
    <div class="col-sm-10">
      <a href="javascript:void(0)" class="btn btn-success">Book Classroom</a>
    </div>
  </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="radio_cu">
  <div class="form-group">
    <label class="control-label col-sm-2">NO</label>
    <div class="col-sm-10">
      <a href="<?php echo base_url()?>course/flexiblecourse/<?php echo $this->uri->segment(3);?>/<?=$this->uri->segment(4);?>/<?=$this->uri->segment(5);?>" class="btn btn-success">Go to Flexibility</a>
    </div>
  </div>
</div>
<!-- <div id="select" onchange="getChoice()">
  <div class="radio_cu" >
   <input type="radio" id="radio-5" name="classrom-radio" class="regular-radio big-radio" value="1" />
   Yes
   <label for="radio-5" class="la-cu"></label>
 </div>
 <div class="radio_cu">
   <input value="2" type="radio" id="radio-6" name="classrom-radio" class="regular-radio big-radio"/>
   No
   <label for="radio-6" class="la-cu"></label>
 </div>
</div> -->
<?php 
      //============================ lat long fetch=============================
if(@$this->session->userdata['location']!=''){
  @$pid = $this->session->userdata['location'];
  @$query = $this->general_model->show_location($pid);
  $data['loca'] = $query;
  @$address = @$query[0]['location_name'];
  $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
  $geo = json_decode($geo, true);
  if ($geo['status'] == 'OK') {
   @$lat = $geo['results'][0]['geometry']['location']['lat'];
   @$long = $geo['results'][0]['geometry']['location']['lng'];
 }
}  
      //============================ lat long fetch==============================   

?>
<!-- <p class="heading2" style="margin-top:10px;"><?php echo @$query[0]['location_name'];?> <a href="https://www.google.co.in/maps/place/<?php echo @$query[0]['location_name'];?>">Map Link</a> <a href="javascript:void(0);">Direction</a></p> -->
<!--<a href="javascript:void(0);" class="book-btn">Book</a> -->
<?php if(count($lesson)>="1"){ ?>
 <form method="post" action="<?php echo base_url()?>course/payment">
  <input name="course_id" type="hidden" value="<?php echo $this->uri->segment(3);?>" />
  <input name="course_name" value="<?php echo $coursename?>" type="hidden" />
  <input name="price" value="<?php echo $price?>" type="hidden" />
  <input name="book_date" value="<?php echo date('Y-m-d H:i:s');?>" type="hidden" />
  <input name="course_type" value="<?php echo @$type?>" type="hidden" />
  <input name="mode" value="classroom"  type="hidden"/>
  <input name="location" value="<?php echo $this->input->post('location')?>"  type="hidden"/>
  <input name="start_date" value="<?php echo date('Y-m-d :h:i:s',strtotime(@$ls->start_date))?>"  type="hidden"/>
  <input name="start_time" value="<?php echo @$ls->start_time?>" type="hidden" />
  <input name="end_time" value="<?php echo @$ls->end_time?>" type="hidden" />
  <input name="hour" value="6" type="hidden" />
  <button type="submit" name="" class="book-btn">Book</button>
</form>
<?php } ?>

<!-- <div class="row">
  <div class="col-sm-3" id="flex" style="display:none">
   <button type="submit" name="" class="book-btn"  > <a href="<?php echo base_url()?>course/flexiblecourse/<?php echo $this->uri->segment(3);?>/<?=$this->uri->segment(4);?>/<?=$this->uri->segment(5);?>" style="color: #fff; text-decoration: none;  ">Flexibility </a></button>
 </div>
 <div class="col-sm-3" id="checkou" style="display:none"> 
   <button type="submit" name="" class="book-btn" > <a href="javascript:void(0)" style="color: #fff; text-decoration: none;">Checkout </a></button>
 </div>
</div> -->
<div class="row">
  <div class="clearfix">&nbsp;</div>
</div>
</div>
<script>
 function  getChoice(){
  var radioValue = $("input[name='classrom-radio']:checked").val();
  if(radioValue == 1){
    $('#flex').css('display','none');
    $('#checkou').css('display','block');
  }
  else{
    $('#checkou').css('display','none');
    $('#flex').css('display','block');
  }

}
</script>
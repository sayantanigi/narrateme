<div class="clearfix"></div>
<div class="container-fluid">
   <div class="row">
      <?php $this->load->view('modesview');?>
   </div>
   <div class="clearfix"></div>
</div>
<div ng-app="">
   <div class="container">
      <?php
      if(count($plearning)>=1)
      {
        foreach($plearning as $pl){
         ?>
         <div class="row">
            <div class="col-sm-6">
               <div class="cb-left">
                  <h4><?php echo @$coursename?></h4>
               </div>
            </div>
         </div>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
               <td width="10%">
                  <div class="radio_cu">
                     <input type="radio" id="privatebooking-1" name="privatebooking" class="regular-radio big-radio" />
                     <label for="privatebooking-1" class="la-cu"></label>
                  </div>
               </td>
               <td width="60%">
                  <p class="fontsize-24">Book The Whole Course</p>
               </td>
               <td width="20%">
                  <p class="fontsize-24">£ <?php echo $pl->price_whole_course;?></p>
               </td>
               <td width="10%">
                  <?php if(($pl->price_whole_course)>=0) {?>
                     <form method="post" action="<?php echo base_url()?>course/payment">
                        <input name="course_id" type="hidden" value="<?php echo $this->uri->segment(3);?>" />
                        <input name="course_name" value="<?php echo $coursename?>" type="hidden" />
                        <input name="price" value="<?php echo $pl->price_whole_course;?>" type="hidden" />
                        <input name="book_date" value="<?php echo date('Y-m-d H:i:s');?>" type="hidden" />
                        <input name="course_type" value="wholecourse" type="hidden" />
                        <input name="mode" value="privatebooking"  type="hidden"/>
                        <input name="location" value="<?php echo $this->input->post('location')?>"  type="hidden"/>
                        <input name="start_date" value="<?php echo date('Y-m-d :h:i:s',strtotime(@$ls->start_date))?>"  type="hidden"/>
                        <input name="start_time" value="<?php echo @$ls->start_time?>" type="hidden" />
                        <input name="end_time" value="<?php echo @$ls->end_time?>" type="hidden" />
                        <input name="hour" value="6" type="hidden" />
                        <button type="submit" name="" class="book-btn">Book</button>
                     </form>
                  <?php } ?>
               </td>
            </tr>
            <tr>
               <td width="10%">
                  <div class="radio_cu">
                     <input type="radio" id="privatebooking-2" name="privatebooking" class="regular-radio big-radio" />
                     <label for="privatebooking-2" class="la-cu"></label>
                  </div>
               </td>
               <td width="60%">
                  <p class="fontsize-24">
                     Book
                     <!--<input type="text" class="book-hours" value="2">-->
                     <select class="book-hours" ng-model="val1" id="quantity">
                        <option value="1" selected="selected">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                     </select>
                     hours
                  </p>
               </td>
               <td width="20%">
                  <p class="fontsize-24"><span id="showval" style="display:none;">£  {{ val1 *1 * <?php echo $pl->price_per_hr;?> *1}}</span><span id="totalprice"><?php echo "£ ".$pl->price_per_hr;?></span></p>
                  <input type="hidden" id="totalvalue" style="display:none;" value="{{ val1 *1 * <?php echo $pl->price_per_hr;?> *1}}" />
               </td>
               <td width="10%">
                  <?php if(($pl->price_whole_course)>=0) {?>
                     <form method="post" action="<?php echo base_url()?>course/payment">
                        <input name="course_id" type="hidden" value="<?php echo $this->uri->segment(3);?>" />
                        <input name="course_name" value="<?php echo $coursename?>" type="hidden" />
                        <input name="price" value="<?php echo $price ?>" type="hidden" />
                        <input name="book_date" value="<?php echo date('Y-m-d H:i:s');?>" type="hidden" />
                        <input name="course_type" value="hour" type="hidden" />
                        <input name="mode" value="privatebooking"  type="hidden"/>
                        <input name="location" value="<?php echo $this->input->post('location')?>"  type="hidden"/>
                        <input name="start_date" value="<?php echo date('Y-m-d :h:i:s',strtotime(@$ls->start_date))?>"  type="hidden"/>
                        <input name="start_time" value="<?php echo @$ls->start_time?>" type="hidden" />
                        <input name="end_time" value="<?php echo @$ls->end_time?>" type="hidden" />
                        <input name="hour" value="6" type="hidden" />
                        <button type="submit" name="" class="book-btn">Book</button>
                     </form>
                  <?php }?>
               </td>
            </tr>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
         </table>
      <!-- <p class="heading1">Price per hour for "Whole Course": <span>£<?php echo $pl->price_whole_course;?></span></p>
         <p class="heading1">Price per hour for "Pay as you go": <span>£<?php echo $pl->price_per_hr;?></span></p>
         <p class="heading1">Location and Time Table to be agreed by all parties</p> -->
         <?php 
      } 
   } 
   else{
      ?>
      <div class="row">
         <div class="cb-left" style="margin-top: 0px;">
            <div class="row">
             <div class="col-sm-6">
              <div class="cb-left">
               <h4 class="price"><?= @$course->course_name ?> </h4>
               <!-- <h4><?php echo $coursename?></h4> -->
            </div>
         </div>
         <div class="col-sm-6">
            <div class="cb-right">
             <h4 class="price">Price : £ <?php echo $course->price;?> </h4>
          </div>
       </div>
       <!-- <h5 style="color: #FF0000;">Private Booking not Available!!!</h5> -->
    </div>
 </div>
</div>
<div class="row">
 <div class="col-sm-3 ">
   <div class="well well-sm">Private one to one tutoring</div>
 </div>
 <div class="col-sm-3">
   <div class="well well-sm"><?= @$batchlist->total_hour ?></div>
 </div>
 <div class="col-sm-3">
   <div class="well well-sm">£ <?=$settings[0]->per_hour_flexibility?></div>
 </div>
 <div class="col-sm-3">
   <button class="btn btn-primary">Book</button>
   <!-- <div class="well well-sm">Private one to one tutoring</div> -->
 </div>
</div>
<div class="row">
 <div class="col-sm-3">
   <div class="well well-sm">Online Skype Tutoring</div>
 </div>
 <div class="col-sm-3">
   <div class="well well-sm"><?= @$batchlist->total_hour ?></div>
 </div>
 <div class="col-sm-3">
   <div class="well well-sm">£ <?=$settings[0]->per_hour_price;?></div>
 </div>
 <div class="col-sm-3">
   <button class="btn btn-primary">Book</button>
 </div>
</div>
<?php 
}
?>
</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
     $('#quantity').change(function(){
       $('#showval').show();  
       $('#totalprice').hide();
       $('#totalvalue').show();
       var qty = $('#quantity').val();
       var price = $('#productPrice').val();
      //var total = price * qty;
      var total = '';
      $("#totalprice").val(total);
      $("#hourprice").val(total);
   });
  });
   
</script>
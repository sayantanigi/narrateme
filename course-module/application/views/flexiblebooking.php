<script type="text/javascript">
     var ob = {};
     ob.c = '';
     //ob.t = '';
</script>
<div class="clearfix"></div>
<div class="container-fluid">
  <div class="row">
    <?php $this->load->view('modesview');?>
</div>
<div class="clearfix"></div>
</div>
<div class="container">
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
</div>
<h6 class="heading3 pull-left">Total hours: <?=count($batchSession)* @$batchlist->total_hour ?></h6>
<input type="hidden" id="sprice" value="<?= $batchlist->price ?>">
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
      <th class="text-center">Lessons you cannot make</th>
  </tr>
</thead>
<tbody id="checkedVal">
   <?php
   if(is_array($batchSession) && count($batchSession)>0){
    $i=1;
    foreach ($batchSession as $value) {
      ?>

      <tr>
          <td><?=$i?></td>
          <td><?=date('y-m-d',strtotime($value->date))?></td>
          <td><?=date('h:i',strtotime($value->starttime))?></td>
          <td><?=date('h:i',strtotime($value->endtime))?></td>
          <td>
            <?php                   
            $min = $value->starttime - $value->endtime;
            echo abs($min);
            ?>
        </td>
        <td>
          <input type="checkbox" name="lessons" value="<?=$value->id;?>" onclick="ss(<?=abs($value->starttime - $value->endtime)?>,)">
          <input type="hidden" name="" value="">
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
<p class="heading1" style="margin-bottom:0;">Total number of hours you make in group classroom: <b><span id="total_time" style="color: #0082bf;"><?=count($batchSession)* @$batchlist->total_hour ?></span></b> (you will attend based on above schedule)</p>
<p class="heading1" style="margin-bottom:0;">Total number of hours you cannot make in group classroom:  <b><span id="total_time1" style="color: #0082bf;"><?=count($batchSession)* @$batchlist->total_hour ?></span></b> (we will set private one to one session for you)</p>
<h4 class="price">Price : £ <span id="total_price"><?=$course->price?></span></h4>

 <div class="col-sm-3" id="checkou" > 
   <button type="submit" name="" class="book-btn" > <a href="javascript:void(0)" style="color: #fff; text-decoration: none;">Checkout </a></button>
 </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript">
    // $('td input[type="checkbox"]').click(function(){
    //   var radio = $(this).val();
    //   var price = <?=$course->price?>;
    //   var per_hour = <?=$settings[0]->per_hour_price?>;
    //   var total_hour_price = <?=$settings[0]->per_hour_price;?> * radio;
    //   var total = total_hour_price + price;
    //   $('#total_price').html(total+'.00');
    //   $('$total_time').html(per_hour);
    //   $('$total_time1').html(per_hour);
    // });


    function ss(time){
      var time = time;
      var price = <?=$course->price?>;
      var per_hour = <?=$settings[0]->per_hour_price?>;
      var checkedValue = $('#checkedVal input:checked').map(function(){
        return $(this).val();
      }).get();
      var len = checkedValue.length;
      var hr = 0;
      var tm = 0;
      for(var i=0; i< len; i++){
        var hr = hr + <?=$settings[0]->per_hour_price;?> * time;
        var tm = tm + time;
      }
      var total = hr + price;
      $('#total_price').html(total+'.00');
      $('#total_time').html(tm);
      $('#total_time1').html(tm);

    }
</script>
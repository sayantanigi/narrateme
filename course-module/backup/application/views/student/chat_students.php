    <section>
        <div class="pro-cover">
        </div>
        <div class="pro-menu">
            <div class="container">
                <div class="col-md-9 col-md-offset-3">
                    <ul>
                        <li><a href="<?=base_url();?>member/dashboard" class="pro-act">My Dashboard</a></li>
                        <li><a href="<?=base_url();?>member/profile">Profile</a></li>
                        <li><a href="<?=base_url();?>member/current_course">Courses</a></li>
                        <li><a href="<?=base_url();?>member/exam">Exams</a></li>
                        <li><a href="<?=base_url();?>member/timeline">Time Line</a></li>
                        <li> <a href="<?php echo base_url();?>member/chat_student">My Chat</a> </li>

                        <li><a href="#">Entry</a></li>
                        <li><a href="#">Notifications</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-3">
                      <?php 
    if($myprofile!=''){
    foreach($myprofile as $mf){
?>

                    <div class="pro-user">
                        <img src="<?php echo base_url()?>uploads/profile/<?php echo $mf->profile_image?>" alt="user">
                    </div>
                    <div class="pro-user-bio">
                        <ul>
                            <li>
                                <h4><?php echo $mf->first_name?> &nbsp; <?php echo $mf->last_name?></h4>
                            </li>
                            <li>Student Id: ST17241</li>
                            <li><a href="#!"><i class="fa fa-facebook"></i> Facebook: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-google-plus"></i> Google: my sample</a></li>
                            <li><a href="#!"><i class="fa fa-twitter"></i> Twitter: my sample</a></li>
                        </ul>
                    </div>
                  <?php }} ?>
                </div>
                <div class="col-md-9">
                    <div class="udb">
 <?php 
    if($myprofile!=''){
        foreach($myprofile as $mf){
?>
<style>
.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 50px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.panel-body
{
    overflow-y: scroll;
    height: 250px;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

</style>
 <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12" id="content">
        <center>
          <h1 class="page-header1" id="at" >My <font color="#005CA9">Chat</font></h1>
        </center>
      </div>
      <div class="col-lg-12">
<div class="container-fluid">
    <div class="row" >
  
    <div class="col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading"> <span class="glyphicon glyphicon-comment"></span> Chat With Admin
          <div class="btn-group pull-right">
          </div>
        </div>
        <div class="panel-body" id="mydiv">
          <ul class="chat" id="chat_new">
            <?php if(!empty($allchat)){ foreach($allchat as $all){?>
            <?php if($all->admin_id!=0){?>
            <li class="left clearfix"><span class="chat-img pull-left"> <img style="width:50px; height:50px;"
             src="<?php echo base_url()?>user_panel/student/img/logo1.png" alt="User Avatar" class="img-circle" /> </span>
              <div class="chat-body clearfix">
                <div class="header"> <strong class="primary-font">Admin</strong> <small class="pull-right text-muted"> <span class="glyphicon glyphicon-time"></span><?php echo date('d-m-Y h:i:s', strtotime($all->send_date));?></small> </div>
                <p> <?=$all->message;?></p>
              </div>
            </li>
            <?php }else{?>
            <li class="right clearfix"><span class="chat-img pull-right"><?php if(!empty($myprofile)){?> <img style="width:50px; height:50px;" src="<?php echo base_url()?>uploads/profile/<?php echo $myprofile[0]->profile_image?>" alt="User Avatar" class="img-circle" /><?php }else{?><img style="width:50px; height:50px;" src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" /> <?php }?> </span>
              <div class="chat-body clearfix">
                <div class="header"> <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?php echo date('d-m-Y h:i:s', strtotime($all->send_date));?></small> <strong class="pull-right primary-font"><?=$member[0]->first_name;?></strong> </div>
                <p style="float:right;"> <?=$all->message;?> </p>
              </div>
            </li>
            <?php }?>
            <?php }}?>
          </ul>
        </div>
        <div class="panel-footer">
        <form method="post">
          <div class="input-group">
            <input id="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
            <span class="input-group-btn">
            <input type="submit" value="Send" class="btn btn-warning btn-sm" id="createGrade"/>
            </span> 
           </div>
         </form>  
        </div>
      </div>
    </div>

  </div>
</div>      </div>
      <!-- /.col-lg-6 --> 
      
    </div>
    <!-- /.row --> 
    <!-- /.row -->

  </div>
<?php
        }
    }
?>  
  <!-- /#page-wrapper --> 
  
</div>
<!-- /#wrapper --> 

<!-- Bootstrap Core JavaScript --> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/metisMenu/dist/metisMenu.min.js"></script> 

<!-- Morris Charts JavaScript --> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/raphael/raphael-min.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/bower_components/morrisjs/morris.min.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/js/morris-data.js"></script> 
<script src="<?php echo base_url()?>user_panel/student/js/custom-file-input.js"></script> 
<!-- Custom Theme JavaScript --> 
<script src="<?php echo base_url()?>user_panel/student/dist/js/sb-admin-2.js"></script>

<script type="text/javascript">
  $("#createGrade").on('click', function (e) {
    if($("#message").val() == "" ){
    $("#message").focus();
    $("#message").css({'border-color' : '#F00'});
    return false;
    }else{
    $("#errorBox1").html("");
    }  
  e.preventDefault();
  $.ajax({
    url: '<?=base_url();?>member/chat_data',
    data: {
      message: $("#message").val(),
    },
    async: 'true',
    cache: 'false',
    type: 'post',
    success: function (data) {
      //alert("Data successfully added");
      $("#message").val("");
      //location.reload();
      //$("#chat_new").hide().fadeIn('fast');
      $('#chat_new').html(data);
      $('#mydiv').scrollTop($('#mydiv')[0].scrollHeight);
    }
  });
});
</script>

<script>
setInterval(call, 2000); 
function call() {
   $.ajax({
    url: '<?=base_url();?>member/chat_data_refresh',
    data: {
     // message: $("#message").val(),
    },
    async: 'true',
    cache: 'false',
    type: 'post',
    success: function (data) {

      $('#chat_new').html(data);
      $('#mydiv').scrollTop($('#mydiv')[0].scrollHeight);
    }
  });
}

</script>


                    </div>
                </div>

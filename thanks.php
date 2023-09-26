<?php
include('lib/headercms.php');
$current_session=session_id();
if(@$_REQUEST['regsuc']){
	if(@$_REQUEST['regsuc']!=$current_session){
		header('location:register.php');
		exit();
	}
}
?>
<section>
	<?php if($current_session!='') { ?>
  	<div class="container">
	    <div class="block-header text-center">
      		<h2>Registration Success</h2>
	    </div>
	    <div class="card" style="height:300px; padding-top:8%;">
      		<div class="card-header">
	      		<?php if(isset($_REQUEST['regsub'])) {
	      		if($response!='') { ?>
	        	<center><?php echo $response;?></center><br>
	        	<?php } } ?>
		        <div class="col-sm-12" style="text-align:center;">
			        <h2>Thank You For Registring With Narrate Me <br><br> <a onclick="$('#Login-area').modal('show');return false;" class="link-foo-ha" href="#" style="color:#D18C13;">Click Here To Login </a> With Your Username And Password.</h2>
		        </div>
	      	</div>
	    </div>
	</div>
 	<?php } ?>
</section>  
<?php
//include('lib/footer_inner.php');
include('lib/footer.php');
?>

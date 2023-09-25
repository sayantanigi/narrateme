<?php
include('lib/header_inner.php');
$current_session=session_id();
if(@$_REQUEST['regsuc']){
	if(@$_REQUEST['regsuc']!=$current_session){
		header('location:register.php');
		exit();
	}
}
?>
<section>
<?php
if($current_session!=''){
?>
  <div class="container">
    <div class="block-header text-center">
      <h2>Registration Success</h2>
    </div>
    <div class="card" style="height:300px; padding-top:8%;">
      <div class="card-header">
      	<?php
		if(isset($_REQUEST['regsub'])){
			if($response!=''){
		?>
        <center><?php echo $response;?></center><br>
        <?php
			}
		}
		?>
        <div class="col-sm-12" style="text-align:center;">
        <h2>
        	Thank You For Registring With Narrate Me <br><br>
            
            
        	<a onclick="$('#Login-area').modal('show');return false;" class="link-foo-ha" href="#" style="color:#D18C13;">Click Here To Login </a> With Your Username And Password 
        </h2>
        </div>
      </div>
      <div class="card-body card-padding">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"  onSubmit="return SubmitReg()" enctype="multipart/form-data">
          </div>
          <div class="row">
                
            
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group fg-line">
               
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group fg-line">
                <!--<label class="c-black f-500 m-b-20 m-t-20">Edit/Update/Add To  Profile :</label>
                <div data-provides="fileinput" class="fileinput fileinput-new"> <span class="btn bgm-gray btn-file m-r-10 waves-effect"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                  <input type="file" name="image">
                  </span> <span class="fileinput-filename"></span> <a data-dismiss="fileinput" class="close fileinput-exists" href="#">×</a> </div>-->
              </div>
            </div>
          </div>
          <!--<button class="btn btn-primary m-t-10 waves-effect" name="regsub" type="submit">Submit</button>-->
        </form>
      </div>
    </div>
 <?php }?>   
 
</section>
   <script>
	function SubmitReg(){
	
	  if($("#firstname").val() == "" ){
	   	$("#userfild").focus();
	   	$("#errofname").html("Please Enter First Name");
	   return false;
	  }else{
		   $("#errofname").html("");
		  
	  }
  
	   if($("#lastname").val() == "" ){
	   	$("#lastname").focus();
	   	$("#errolname").html("Please Enter Last Name");
	   	return false;
	  }else{
		   $("#errolname").html("");
		   return true;
	  }
	  
	   if($("#passwordreg").val() == "" ){
	   		$("#passwordreg").focus();
	   		$("#erroupsw").html("Please Enter Password");
	   		return false;
	    }else{
		   $("#erroupsw").html("");
		   return true;
	   }
		
		if($("#usrnamereg").val() == "" ){
	   		$("#usrnamereg").focus();
	   		$("#errousrnm").html("Please Enter Username");
	   		return false;
	   }else{
		   $("#errousrnm").html("");
		   return true;
	   }	
 }

	</script>
<style>
#errofname{
 color:#F00;
 }
 #errolname{
 	color:#F00;
 }
 #errousrnm{
 	color:#F00;
 }
 
 #erroupsw{
 	color:#F00;
 }

</style>
<?php
include('lib/footer_inner.php');
?>

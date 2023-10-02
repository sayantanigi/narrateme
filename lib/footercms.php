<div id="wb_LayoutGrid7">
  	<div id="LayoutGrid7">
    	<div class="row">
      		<div class="col-1">
        		<div id="wb_Text12"><span class="foo-text">&copy; Copyright <?php echo date("Y"); ?>. All Right Researved.</span></div>
      		</div>
      		<div class="col-2">
        		<div id="wb_Text13"> <span class="foo-text">Designed &amp; Developed By <a class="igi-link" href="http://www.goigi.com/">GOIGI.COM</a></span> </div>
      		</div>
    	</div>
  	</div>
</div>
<form name="Layer1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>" id="Login-area" class="modal fade" role="dialog" onsubmit="return Submit()">
   	<div class="modal-dialog">
      	<div class="modal-content">
         	<div class="modal-body">
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            	<div id="wb_FontAwesomeIcon1">
               		<div id="FontAwesomeIcon1"><i class="fa fa-user">&nbsp;</i></div>
               	</div>
           		<input type="text" id="userfild" name="user" value="" placeholder="Use Name / Email">
           		<label id="errorBoxusr"></label>
           		<input type="submit" id="login-butt" name="login" value="LOGIN" class="Buttn">
           		<div id="wb_Text1">
              		<span class="Item-Head_dark">Login to Your Account</span><br />
               		<span class="Item-Head_dark" style="color:#F00;font-size: 17px;">
              		<?php if(@$_REQUEST['op']=="logfals"){
				  		echo "Invalid Username Or Password";
			  		} ?>
			  		</span><br />
              	</div>
           		<input type="password" id="passfild" name="pass" value="" placeholder="Password">
           		<label id="errorBoxpass"></label>
           		<div id="wb_Text2">
           			<span class="Item-Head_dark">OR<br><br></span><span class="top-text"> Register / Sign Up</span><br /><br />
              		<span class="top-text"> <a id="fgpas" href="forgetpassword.php">Froget Password</a></span>
              	</div>
        	</div>
     	</div>
  	</div>
	</form>
<script src="dashboard/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="dashboard/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dashboard/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="dashboard/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="dashboard/vendors/bower_components/Waves/dist/waves.min.js"></script>
<script src="dashboard/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
<!-- <script src="dashboard/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script> -->
<script src="dashboard/vendors/bower_components/moment/min/moment.min.js"></script>
<script src="dashboard/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="dashboard/vendors/fileinput/fileinput.min.js"></script>
<script src="dashboard/vendors/input-mask/input-mask.min.js"></script>
<script src="dashboard/js/functions.js"></script>
<script src="dashboard/js/demo.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/wb.parallax.min.js"></script>
<script src="js/transition.min.js"></script>
<script src="js/carousel.min.js"></script>
<script src="js/wb.panel.min.js"></script>
<script src="js/scrollspy.min.js"></script>
<script src="js/modal.min.js"></script>
<script src="./searchindex.js"></script>
<script src="js/wwb11.min.js"></script>
<script src="js/index.js"></script>
<?php if(@$_REQUEST['op']=="logfals") { ?>
<script>
$(document).ready(function() {
	$("#myLink").click(function(){
		$('#Login-area').modal('show');
	});
	$('#myLink').trigger('click');
});
</script>
<?php } ?>
<script>
function Submit() {
	if($("#userfild").val() == "" ) {
   		$("#userfild").focus();
	   	$("#errorBoxusr").html("Please Enter Username");
	   	return false;
	} else {
		$("#errorBoxusr").html("Please Enter Username");
	   	return true;
  	}

  	if($("#passfild").val() == "" ) {
  		$("#passfild").focus();
  		$("#errorBoxpass").html("Please Enter Password");
  		return false;
  	} else {
  		$("#errorBoxusr").html("Please Enter Username");
  		return true;
  	}
}
</script>
</body>
</html>

<div id="wb_LayoutGrid7">
  	<div id="LayoutGrid7">
    	<div class="row">
      		<div class="col-1">
        		<div id="wb_Text12"> <span class="foo-text">© Copyright <?php echo date("Y"); ?>. All Right Researved.</span></div>
      		</div>
      		<div class="col-2">
        		<div id="wb_Text13"> <span class="foo-text">Designed &amp; Developed By <a href="http://www.goigi.com/" class="igi-link">GOIGI.COM</a></span> </div>
      		</div>
    	</div>
  	</div>
</div>
<form name="Layer1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>"  id="Login-area" class="modal fade" role="dialog" onsubmit="return Submit()">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-body">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<div id="wb_FontAwesomeIcon1">
          			<div id="FontAwesomeIcon1"><i class="fa fa-user">&nbsp;</i></div>
        		</div>
		        <input type="text" id="userfild" name="user" value="" placeholder="User Name">
		        <input type="submit" id="login-butt" name="login" value="LOGIN" class="Buttn">
        		<div id="wb_Text1">
        			<span class="Item-Head_dark">Login to Your Account</span><br/>
          			<span class="Item-Head_dark" id="lg2" style="color:#F00;font-size: 15px;"><?php if(@$_REQUEST['op']=="logfals") { echo "Invalid Username Or Password"; } ?></span> 
          			<span class="Item-Head_dark" id="errorBoxusr" style="color:#F00;font-size: 15px;"></span> <br />
        		</div>
		        <input type="password" id="passfild" name="pass" value="" placeholder="Password">
		        <label id="errorBoxpass"></label>
				<div id="wb_Text2">
					<span class="Item-Head_dark">OR<br><br></span>
					<span class="top-text"><a href="register.php"> Register / Sign Up</a></span><br /><br />
				  	<span class="top-text"> <a id="fgpas" href="forgetpassword.php">Forget Password</a></span>
				</div>
			</div>
    	</div>
  	</div>
</form>
<a class="link-foo-ha" id="myLink"></a>
<style>
#errorBoxusr{color:#F00;}
#errorBoxpass{color:#F00;}
</style>
<script src="dashboard/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
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
$(document).ready(function(){
	$("#myLink").click(function() {
		//$("#Login-area").show();
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
		$("#lg2").hide();
		return false;
	} else {
		$("#errorBoxusr").html("");
		$("#lg2").hide();
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
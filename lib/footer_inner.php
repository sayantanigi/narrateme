<div id="wb_LayoutGrid7">
    <div id="LayoutGrid7">
        <div class="row">
            <div class="col-1">
                <div id="wb_Text12"> <span class="foo-text">&copy; Copyright <?php echo date('Y')?>. All Right Researved. </span> </div>
            </div>
            <div class="col-2">
                <div id="wb_Text13"> <span class="foo-text">Designed &amp; Developed By <a class="igi-link" target="_blank" href="http://www.goigi.com/">GOIGI.COM</a></span> </div>
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
                <input type="text" id="userfild" name="user" value="" placeholder="Use Name">
                <label id="errorBoxusr"></label>
                <input type="submit" id="login-butt" name="login" value="LOGIN" class="Buttn">
                <div id="wb_Text1"> <span class="Item-Head_dark">Login to Your Account</span><br />
                    <span class="Item-Head_dark" style="color:#F00;font-size: 17px;">
                    <?php if(@$_REQUEST['op']=="logfals") {
                        echo "Invalid Username Or Password";
                    } ?></span><br />
                </div>
                <input type="password" id="passfild" name="pass" value="" placeholder="Password">
                <label id="errorBoxpass"></label>
                <div id="wb_Text2">
                    <span class="Item-Head_dark">OR<br><br></span>
                    <span class="top-text"><a href="<?php echo $baseurl?>register.php"> Register / Sign Up </a></span><br /><br />
                    <span class="top-text"> <a id="fgpas" href="<?php echo $baseurl?>forgetpassword.php">Forget Password</a></span>
                </div>
            </div>
        </div>
    </div>
</form>
<a  class="link-foo-ha" id="myLink"></a>
<!--<script src="dashboard/vendors/bower_components/jquery/dist/jquery.min.js"></script>-->
<script src="<?php echo $baseurl?>dashboard/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/bower_components/Waves/dist/waves.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/fileinput/fileinput.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/vendors/input-mask/input-mask.min.js"></script>
<script src="<?php echo $baseurl?>dashboard/js/functions.js"></script>
<script src="<?php echo $baseurl?>dashboard/js/demo.js"></script>
<script src="<?php echo $baseurl?>js/owl.carousel.min.js"></script>
<script src="<?php echo $baseurl?>js/custom.js"></script>
<script src="<?php echo $baseurl?>js/wb.parallax.min.js"></script>
<script src="<?php echo $baseurl?>js/transition.min.js"></script>
<script src="<?php echo $baseurl?>js/carousel.min.js"></script>
<script src="<?php echo $baseurl?>js/wb.panel.min.js"></script>
<script src="<?php echo $baseurl?>js/scrollspy.min.js"></script>
<script src="<?php echo $baseurl?>js/modal.min.js"></script>
<script src="./searchindex.js"></script>
<script src="<?php echo $baseurl?>js/wwb11.min.js"></script>
<script src="<?php echo $baseurl?>js/index.js"></script>
<?php if(@$_REQUEST['op']=="logfals"){ ?>
<script>
$(document).ready(function() {
    $("#myLink").click(function() {	
        //$("#Login-area").show();
        $('#Login-area').modal('show');
    });
    $('#myLink').trigger('click');
});
</script>
<?php } ?>
<script type="text/javascript">
$(document).ready(function() {
    $("#file-2").change(function() {
        $("#uploadFileForm").submit();
    });
});
</script>
</body>
</html>
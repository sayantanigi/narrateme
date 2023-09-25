<?php 
	session_start();
	include"lib/headercms.php";
	if($_SESSION["transantionid"]!=''){
		$data=array('pay_status'=>'1');
		echo $_SESSION["transantionid"];
		unset($_SESSION["transantionid"]);
		exit();
		$result=updateData($data,'order_list', "transaction_id='".$_SESSION["transantionid"]."'") ;
	}else{
		echo "<script language=\"JavaScript\" type=\"text/javascript\">\n";
			echo "window.top.location.href='cancel.php';\n";
			echo "</script>";
	}
	/*if($_SESSION["transantionid"]==''){
		header('cancel.php');
	}else{
		$data=array('pay_status'=>'1');
		$result=updateData($data,'order_list', "transaction_id='".$_SESSION["transantionid"]."'") ;
	}*/
?>
<style>
.col-sm-12{ margin-top:5%; margin-bottom:5%;}
</style>
<section class="body_content">
  <div class="page_header">
    <div class="over_bg"></div>
    <div class="block-header text-center">
     <h2> Payment Success </h2>
    </div>
  </div>
  <div class="inner_content">
    <div class="container" id="page-1">
      <div class="bb-custom-container card-body card-padding card">
        <div class="row content-block text-justify animateFadeInRight">
          <div class="col-sm-12 col-md-12">
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &nbsp;</button>
                    <span class="glyphicon glyphicon-ok"></span> <strong>Success Message</strong>
                    <hr class="message-inner-separator">
                    <p> Your Payment Received Successfully .</p>
                  </div>
                </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include"lib/footercms.php";?>
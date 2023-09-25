<?php 
session_start();
	include"lib/headercart.php";
	require_once("lib/dbcontroller.php");
	//$db_handle = new DBController();
	unset($_SESSION["transantionid"]);
?>
<style>
.col-sm-12.col-md-12 {
    margin-bottom: 5%;
    margin-top: 5%;
}
</style>
<section class="body_content">
  <div class="page_header">
    <div class="over_bg"></div>
    <div class="block-header text-center">
       <h2>Payment Cancel</h2>
    </div>
  </div>
  <div class="inner_content">
    <div class="" id="page-1">
      <div class="bb-custom-container card-body card-padding card">
        <div class="row content-block text-justify animateFadeInRight">
          <div class="col-sm-12">
            <div class="abt_txt">
              <div class="container">
                <div class="col-sm-12 col-md-12">
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &nbsp;</button>
                    <span class="glyphicon glyphicon-hand-right"></span> <strong> Failure Message</strong>
                    <hr class="message-inner-separator">
                    <p> Your payment is unsuccessful , please try again later .</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include"lib/footercms.php";?>
<?php 
include('lib/inner_header.php');
sequre();
$view=getAnyTableWhereData('na_member', " AND id='".base64_decode($_REQUEST["member"])."' ");
$soc=getAnyTableWhereData('na_user_social_link', " AND id='".base64_decode($_REQUEST["member"])."' ");
?>

<section id="main"> 
  <?php include('lib/aside.php');?>
  <section id="content"> 
    <div class="container">
      <div class="block-header">
        <h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span>
		<small><?php if($view['ind'] ==1){ echo "Individual,";} if($view['std'] ==1){ echo "Student,";} if($view['edu'] ==1){ echo "Educational Institute,";} 
		if($view['edu'] ==1){echo "Instructional Facility or School";} 
		?></small>
		</h2>
      </div>
      <div id="profile-main" class="card">
        <div class="pm-overview c-overflow">
          <div class="pmo-pic">
            <div class="p-relative"> 
            	<a href="#">
                <?php
				if($view['userImage']!=''){
				?>
            		<img class="img-responsive" src="admin/useravatar/fullsize/<?php echo $view['userImage']?>" alt=""> 
                 <?php }else{?>
                 	<img class="img-responsive" src="img/no-image.png" alt=""> 
                 <?php }?>   
                </a> <!--<a href="#" class="pmop-edit"> <i class="zmdi zmdi-camera"></i> <span class="hidden-xs">Update Profile Picture</span> </a> -->
                  
            </div>
            
          </div>
          <div class="pmo-block pmo-contact hidden-xs"> 
            <h2>Contact</h2>
            <ul>
              <li><i class="zmdi zmdi-phone"></i><?=$view['phone_no']?></li>
              <li><i class="zmdi zmdi-email"></i><?=$view['email']?></li>
              <li><i class="zmdi zmdi-facebook-box"></i><a href="<?=$soc['fb_links']?>" target="_blank"><?=$soc['fb_links']?></a></li>
              <li><i class="zmdi zmdi-twitter"></i><a href="<?=$soc['twit_link']?>" target="_blank"><?=$soc['twit_link']?></a></li>
              <li> <i class="zmdi zmdi-pin"></i>
                <address class="m-b-0 ng-binding">
                <?=$view['address']?>,<br>
               <!-- Suite 900-->
                <?=$view['country']?>,<br>
                <?=$view['state']?> 
                P: <?=$view['phone_no']?> <br>
                </address>
              </li>
            </ul>
          </div>
        </div>
        <div class="pm-body clearfix">
		<?php  if($_GET['mail']=='send') { ?>
			  <div class="alert alert-success" style="text-align: center;">Mail Send Successfully.</div>
		  <?php } ?>
        <a href="searchforuser.php" class="btn btn-danger" style="color:#FFF; float:right; margin:5px;">Search User</a>
            <div class="pmb-block"> 
              <div class="pmbb-header"> 
                <div class="panel-group" data-collapse-color="teal" id="accordionTeal" role="tablist" aria-multiselectable="true"> 
                  <div class="panel panel-collapse">
                  
                    <div class="panel-heading" role="tab">
                      <h4 class="panel-title"> <!--<a data-toggle="collapse" data-parent="#accordionTeal" href="#accordionTeal-one" aria-expanded="true">--> <a>Basic Information</a> <!--</a>--></h4>
                      
                    </div>
                    <div id="accordionTeal-one" class="collapse in" role="tabpanel"> 
                      <div class="panel-body"> 
                        <div class="pmb-block p-10  m-b-0"> 
                          <div class="pmbb-body p-l-0"> 
                            <div class="pmbb-view">
                              
                              <dl class="dl-horizontal">
                                <dt>Full Name </dt>
                                <dd><?=$view['prefixname']." ".$view['first_name']." ".$view['last_name']." ".$view['suffix']?></dd>
                              </dl>
                             <dl class="dl-horizontal">
                                <dt>Country</dt>
                                <dd><?=$view['country']?></dd>
                              </dl>
                              <?php if($view['addr_st'] == '0') { ?>
                              <dl class="dl-horizontal">
                                <dt>Address</dt>
                                <dd><?=$view['address']?></dd>
                              </dl>
                            <?php } if($view['phone_st'] == '0') { ?>
                              <dl class="dl-horizontal">
                                <dt>Telephone No.</dt>
                                <dd><?=$view['phone_no']?></dd>
                              </dl>
                              <?php } if($view['email_st'] == '0') { ?>
                              <dl class="dl-horizontal">
                                <dt>E-mail address</dt>
                                <dd><?=$view['email']?></dd>
                              </dl>
                            <?php } if($view['text_no_st'] == '0') { ?>
                              <dl class="dl-horizontal">
                                <dt>Text, Instant, SMS , or MMS message number</dt>
                                <dd><?=$view['text_no']?></dd>
                              </dl>
                            <?php } ?>
                              <dl class="dl-horizontal">
                                <dt>IP Address</dt>
                                <dd><?=$view['IpAddress']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Website</dt>
                                <dd><?=$view['website']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>Domain Name</dt>
                                <dd><?=$view['domain_name']?></dd>
                              </dl>
                              <dl class="dl-horizontal">
                                <dt>URL</dt>
                                <dd><?=$view['url']?></dd>
                              </dl>
                              <!--<dl class="dl-horizontal">
                                <dt>Gender</dt>
                                <dd><?=$view['gender']?></dd>
                              </dl>-->
                              <dl class="dl-horizontal">
                                <dt>Date of Birth</dt>
                                <dd><?=$view['dateofbirth']?></dd>
                              </dl>
                              <dl class="dl-horizontal" style="text-align:center;">
                              <a class="btn btn-primary waves-effect" href="">Send Request</a>
                              </dl>
                            </div>
                     
                          </div>
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
</section> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker/css/datepicker.css"/>
<script type="text/javascript" src="js/form-components.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php include('lib/inner_footer.php')?>
<script src="js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
    

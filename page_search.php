<?php include"lib/headercms.php";?>
<section class="body_content">
  <div class="page_header">
    <div class="over_bg"></div>
    <div class="block-header text-center">
    <?php
		$_SESSION['pagetitle']=$_REQUEST['pagetitle'];
		if($_REQUEST['pagetitle']==''){
			 $FetchUserSqlh = "SELECT * FROM `na_cms` WHERE `cms_pagetitle` = ''"; 
		}else{
         	 $FetchUserSqlh = "SELECT * FROM `na_cms` WHERE `cms_pagetitle` LIKE '%".$_SESSION['pagetitle']."%' LIMIT 0,1"; 
		}
		$FetchUserQueryh = mysql_query($FetchUserSqlh);
		$countFetch=mysql_num_rows($FetchUserQueryh);
        $rowdesth = mysql_fetch_array($FetchUserQueryh);
        if($rowdesth['cmsimg'] == "")
        {
        $pic4 = "images/nopic.jpg";
        }
        else if(!is_file("admin/uploads/".$rowdesth['cmsimg']))
        {
        $pic4 = "images/nopic.jpg";
        }
        else
        {
        $pic4 = "admin/uploads/".$rowdesth['cmsimg'];
        }
        ?>
      <h2><?=substr(stripslashes($rowdesth['cms_pagetitle']),0,100)?></h2>
    </div>
  </div>
  <div class="inner_content">
    <div class="container" id="page-1">
      <div class="bb-custom-container card-body card-padding card">
        <div class="row content-block text-justify animateFadeInRight">
          <div class="col-sm-2 col-sm-offset-2 text-center cust_size "> <img style="width:150px;" src="<?=$pic4?>" alt=""/> </div>
          <div class="col-sm-6">
            <div class="abt_txt">
            	<?php 
					if($countFetch>0){
				?>
              <h2><?=$rowdesth['cms_page_heading']?></h2>
              <p><?=substr(stripslashes($rowdesth['cms_pagedes']),0,1500)?></p>
              <?php
					}else{
			  ?>
              <p style="font-size:14px;"><img src="img/nopage.jpg" alt="No Image"></p>
              <?php }?>
            </div>
          </div>
        </div>
    </div>
    </div>
  </div>
</section>
<?php include"lib/footercms.php";?>
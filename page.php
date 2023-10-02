<?php include('lib/header.php');?>
<section class="body_content">
    <div class="page_header">
        <div class="over_bg"></div>
        <div class="block-header text-center">
            <?php $id=$_GET['id'];
            $FetchUserSqlh = "SELECT * FROM `na_cms` WHERE id = '".$id."'"; 
            $FetchUserQueryh = mysqli_query($con, $FetchUserSqlh);
            $rowdesth = mysqli_fetch_array($FetchUserQueryh);
            if($rowdesth['cmsimg'] == "") {
                $pic4 = "images/nopic.jpg";
            } else if(!is_file("admin/uploads/".$rowdesth['cmsimg'])) {
                $pic4 = "images/nopic.jpg";
            } else {
                $pic4 = "admin/uploads/".$rowdesth['cmsimg'];
            } ?>
            <h2><?=substr(stripslashes($rowdesth['cms_pagetitle']),0,100)?></h2>
        </div>
    </div>
    <div class="inner_content">
        <div class="container" id="page-1">
            <div class="bb-custom-container card-body card-padding card">
                <div class="row content-block text-justify animateFadeInRight">
                    <div class="col-sm-5 text-center cust_size ">
                        <img style="width:100%;height: 410px;" src="<?=$pic4?>" alt=""/>
                    </div>
                    <div class="col-sm-6">
                        <div class="abt_txt	">
                            <h2><?=$rowdesth['cms_page_heading']?></h2>
                            <p><?=substr(stripslashes($rowdesth['cms_pagedes']),0,1500)?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
//include"lib/footercms.php";
include('lib/footer.php');
?>
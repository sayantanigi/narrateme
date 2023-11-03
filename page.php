<?php include('lib/header.php'); ?>
<section class="body_content">
    <div class="page_header">
        <div class="over_bg"></div>
        <div class="block-header text-center">
            <?php $id = $_GET['id'];
            $FetchUserSqlh = "SELECT * FROM `na_cms` WHERE id = '" . $id . "'";
            $FetchUserQueryh = mysqli_query($con, $FetchUserSqlh);
            $rowdesth = mysqli_fetch_array($FetchUserQueryh);
            if ($rowdesth['cmsimg'] == "") {
                $pic4 = "images/nopic.jpg";
            } else if (!is_file("admin/uploads/" . $rowdesth['cmsimg'])) {
                $pic4 = "images/nopic.jpg";
            } else {
                $pic4 = "admin/uploads/" . $rowdesth['cmsimg'];
            } ?>
            <h2><?= substr(stripslashes($rowdesth['cms_pagetitle']), 0, 100) ?></h2>
            <p>
                <?= stripslashes($rowdesth['cms_pagetitledes']); ?>

            </p>
        </div>
    </div>
    <div class="inner_content">
        <div class="container-fluid" id="page-1">
            <div class="row page_inner_content">
                <!-- <div class="col-lg-3" style="padding-left: 0;">
                    <img style="width:150px;" src="<?= $pic4 ?>" alt="" />
                </div> -->
                <div class="col-lg-12" style="padding: 0;">
                    <div class="abt_txt	">
                        <h2><?= $rowdesth['cms_page_heading'] ?></h2>
                        <p><?= stripslashes($rowdesth['cms_pagedes']) ?></p>
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
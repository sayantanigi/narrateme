<?php include "lib/headercms.php"; ?>
<section class="body_content" style="padding: 0;">
    <!-- <div class="page_header">
        <div class="over_bg"></div>
        <div class="block-header text-center">
            <?php $_SESSION['pagetitle'] = $_REQUEST['pagetitle'];
            if ($_REQUEST['pagetitle'] == '') {
                $FetchUserSqlh = "SELECT * FROM `na_cms` WHERE `cms_pagetitle` = ''";
            } else {
                $FetchUserSqlh = "SELECT * FROM `na_cms` WHERE `cms_pagetitle` LIKE '%" . $_SESSION['pagetitle'] . "%' LIMIT 0,1";
            }
            $FetchUserQueryh = mysqli_query($con, $FetchUserSqlh);
            $countFetch = mysqli_num_rows($FetchUserQueryh);
            $rowdesth = mysqli_fetch_array($FetchUserQueryh);
            if (@$rowdesth['cmsimg'] == "") {
                $pic4 = "images/nopic.jpg";
            } else if (!is_file("admin/uploads/" . @$rowdesth['cmsimg'])) {
                $pic4 = "images/nopic.jpg";
            } else {
                $pic4 = "admin/uploads/" . @$rowdesth['cmsimg'];
            }
            if ($countFetch > 0) { ?>
                <h2><?= substr(stripslashes(@$rowdesth['cms_pagetitle']), 0, 100) ?></h2>
            <?php } else { ?>
                <h2>Page Not Found</h2>
            <?php } ?>
        </div>
    </div> -->

    <div class="inner_content">
        <div class="" id="page-1">
            <div class="Product_Body">
                <div class="row">
                    <?php if ($countFetch > 0) { ?>
                        <div class="col-sm-2 col-sm-offset-2 text-center cust_size ">
                            <img style="width:150px;" src="<?= $pic4 ?>" alt="" />
                        </div>
                    <?php }
                    if ($countFetch > 0) { ?>
                        <div class="col-sm-6">
                        <?php } else { ?>
                            <div class="col-sm-12">
                            <?php } ?>
                            <div class="abt_txt">
                                <?php if ($countFetch > 0) { ?>
                                    <h2><?= $rowdesth['cms_page_heading'] ?></h2>
                                    <?= substr(stripslashes($rowdesth['cms_pagedes']), 0, 1500) ?>
                                <?php } else { ?>
                                    <div class="NotFound_Text">
                                        <h2>404</h2>
                                        <div>
                                            <p>Sorry, the page not found</p>
                                            <p>The link you followed probably broken or the page has been removed.</p>
                                        </div>
                                    </div>
                                    <img class="no_img" src="img/404.png" alt="No Image">
                                <?php } ?>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</section>
<?php include "lib/footercms.php"; ?>

<style>
    .abt_txt {
        height: calc(100vh - 251px);
    }

    .no_img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background-repeat: no-repeat;
    }

    .Product_Body {
        background: #f9fbfd;
        position: relative;
    }

    .NotFound_Text {
        position: absolute;
        width: 100%;
        text-align: center;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }

    .NotFound_Text h2 {
        font-size: 100px;
        font-weight: 700;
    }

    .NotFound_Text p {
        font-size: 18px;
        color: #000;
        margin-bottom: 5px;
    }
</style>
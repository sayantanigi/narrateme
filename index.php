<?php
include('lib/header.php');
?>
    <div id="wb_heased-base">
        <div id="heased-base">
            <div class="row">
                <div class="col-1">
                    <div id="wb_Header-h1">
                        <span class="B1">NarrateMe</span>
                    </div>
                    <div id="wb_divider">
                        <div id="divider">
                            <div class="row">
                                <div class="col-1">
                                    <hr id="Line1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="wb_Header-sub-h2">
                        <span class="banner">Aenean nulla dui, sagittis ac magna sagittis,<br>aliquam feugiat dui. Nullam sed bibendum urna.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="wb_LayoutGrid3">
        <div id="LayoutGrid3">
            <div class="row">
                <div class="col-1">
                    <div id="wb_Text3">
                        <span id="wb_uid0">NarrateMe</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="wb_LayoutGrid4">
        <div id="LayoutGrid4">
            <div class="row">
                <?php $viewcreate = getAnyTableWhereData('na_cms', " AND id=9"); //print_r($viewcreate);?>
                <div class="col-1">
                    <input type="button" id="book-ico" name="" value="" class="rotateme">
                    <div id="wb_book-h1">
                        <span class="Item-Head"><?php echo $viewcreate['cms_pagetitle']?></span>
                    </div>
                    <div id="wb_book-p">
                        <span class="Para-style"><?php echo strip_tags($viewcreate['cms_pagedes'])?></span>
                    </div>
                </div>
                <?php $viewtrans=getAnyTableWhereData('na_cms', " AND id=10"); ?>
                <div class="col-2">
                    <input type="button" id="life-ico" name="" value="" class="rotateme">
                    <div id="wb_Life-H1">
                        <span class="Item-Head"><?php echo $viewtrans['cms_pagetitle']?></span>
                    </div>
                    <div id="wb_life-p">
                        <span class="Para-style"><?php echo strip_tags($viewtrans['cms_pagedes'])?></span>
                    </div>
                </div>
                <?php $viewlearn=getAnyTableWhereData('na_cms', " AND id=11"); ?>
                <div class="col-3">            
                    <input type="button" id="DL-ico" name="" value="" class="rotateme">
                    <div id="wb_Dlearning-h1">
                        <span class="Item-Head"><?php echo $viewlearn['cms_pagetitle']?></span>
                    </div>
                    <div id="wb_dlearning-p">
                        <span class="Para-style"><?php echo $viewlearn['cms_pagedes']?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="wb_LayoutGrid5">
        <div id="LayoutGrid5">
            <div class="row">
                <?php $viewind=getAnyTableWhereData('na_cms', " AND id=8"); ?>
                <div class="col-1">
                    <input type="button" id="individual-ico" name="" value="" class="rotateme">
                    <div id="wb_Text4">
                        <span class="Item-Head"><?php echo $viewind['cms_pagetitle']?></span>
                    </div>
                    <div id="wb_Text5">
                        <span class="Para-style"><?php echo $viewind['cms_pagedes']?></span>
                    </div>
                </div>
                <?php $vieedu=getAnyTableWhereData('na_cms', " AND id=7"); ?>
                <div class="col-2">
                    <input type="button" id="education-ico" name="" value="" class="rotateme">
                    <div id="wb_Text6">
                        <span class="Item-Head"><?php echo $vieedu['cms_pagetitle']?></span>
                    </div>
                    <div id="wb_Text7">
                        <span class="Para-style"><?php echo $vieedu['cms_pagedes']?></span>
                    </div>
                </div>
                <?php $viefac=getAnyTableWhereData('na_cms', " AND id=6"); ?>
                <div class="col-3">
                    <input type="button" id="instruc-ico" name="" value="" class="rotateme">
                    <div id="wb_Text8">
                        <span class="Item-Head"><?php echo $viefac['cms_pagetitle']?></span>
                    </div>
                    <div id="wb_Text9">
                        <span class="Para-style"><?php echo $viefac['cms_pagedes']?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="wb_LayoutGrid1">
        <div id="LayoutGrid1">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2">
                    <div id="wb_Text10">
                        <span class="Item-Head_dark">TOP STORIES</span>
                    </div>
                    <div id="Blog1" class="carousel slide" data-interval="5000" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#Blog1" data-slide-to="0" class="active"></li>
                            <li data-target="#Blog1" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <?php $viewnews = mysqli_query($con, "select * from `na_newsmedia` where `status`=1");
                            $counter=1;
    				        while($rownews=mysqli_fetch_array($viewnews)) { ?>
                            <div class="blogitem item <?php if($counter==1){?>active<?php }?>" id="<?php echo $counter;?>">
                                <span class="blogsubject"></span>
                                <div class="no-thumb"></div>
                                <div class="blogdate"><br></div>
                                <span id="wb_uid<?php echo $counter;?>"><?php echo strip_tags($rownews['description'])?><br></span><br>
                                <div class="blogcomments"></div>
                            </div>
                            <div class="clearfix visible-col1"></div>
                            <?php $counter++; } ?> 
                            <div class="clearfix visible-col1"></div>
                        </div>
                        <a class="left carousel-control" href="#Blog1" role="button" data-slide="prev">
                            <span class="icon-prev" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#Blog1" role="button" data-slide="next">
                            <span class="icon-next" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <hr id="Line2">
                </div>
                <div class="col-4">
                    <div id="wb_Text11">
                        <span class="Item-Head_dark">WE ARE SOCIAL</span>
                    </div>
                    <div id="wb_LayoutGrid6">
                        <div id="LayoutGrid6">
                            <div class="row">
                                <div class="col-1">
                                    <input type="submit" id="Button1" name="" value="">
                                </div>
                                <div class="col-2">
                                    <input type="submit" id="Button2" name="" value="">
                                </div>
                                <div class="col-3">
                                    <input type="submit" id="Button3" name="" value="">
                                </div>
                                <div class="col-4">
                                    <input type="submit" id="Button4" name="" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('lib/footer.php');?>
<?php
include('lib/header.php');
?>
<section class="banner-section">
    <div class="owl-carousel banner-carousel">
        <?php
        @$bannerList = mysqli_query($con, "SELECT * FROM bl_banner WHERE status = 1");
        $counter = 1;
        while ($rownews = mysqli_fetch_array($bannerList)) { ?>
        <div class="owl-block">
            <img class="owl-img" src="admin/uploads/banner/<?= $rownews['banner_image']?>" loading="lazy" alt="banner_img" style="width:1423px; height:650px;"/>
            <div class="banner-text">
                <h1><?= $rownews['title']?></h1>
                <p><?= $rownews['description']?></p>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
<div id="wb_heased-base" style="display: none;">
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
    <div id="LayoutGrid3" class="company-data">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="wb_Text3">
                        <span id="wb_uid0">Trusted By Global Companies</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2">
                            <Image src="https://i.pinimg.com/474x/21/57/05/215705e93617207f1691e557ace767e7.jpg"></Image>
                        </div>
                        <div class="col-md-2">
                            <Image src="https://seekvectorlogo.net/wp-content/uploads/2018/12/mailonline-vector-logo.png"></Image>
                        </div>
                        <div class="col-md-2">
                            <Image src="https://i.pinimg.com/736x/18/9e/e5/189ee51812c7118d060b217f0bed9219.jpg"></Image>
                        </div>
                        <div class="col-md-2">
                            <Image src="https://i.pinimg.com/474x/21/57/05/215705e93617207f1691e557ace767e7.jpg"></Image>
                        </div>
                        <div class="col-md-2">
                            <Image src="https://seekvectorlogo.net/wp-content/uploads/2018/12/mailonline-vector-logo.png"></Image>
                        </div>
                        <div class="col-md-2">
                            <Image src="https://i.pinimg.com/736x/18/9e/e5/189ee51812c7118d060b217f0bed9219.jpg"></Image>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contain Product_Container">
    <div class="row" style="margin: 0;">
        <div class="col-lg-12" style="padding: 0;">
            <img src="images/background.png" loading="lazy" alt="banner_img" />
        </div>
    </div>
    <div class="owl-carousel Product-carousel">
        <?php $viewcreate = getAnyTableWhereData('na_cms', " AND id=9"); ?>
        <div class="owl-block">
            <img class="owl-img" src="images/Block-6.jpg" loading="lazy" alt="banner_img" />
            <div class="owl-cover"></div>
            <div class="owl-Text">
                <a href="#">
                    <input type="button" id="book-ico" name="" value="" class="rotateme">
                </a>
                <p class="Block-Heading"><?php echo $viewcreate['cms_pagetitle'] ?></p>
                <p class="Block-SubHeading"><?php echo strip_tags($viewcreate['cms_pagedes']) ?></p>
            </div>
        </div>
        <?php $viewtrans = getAnyTableWhereData('na_cms', " AND id=10"); ?>
        <div class="owl-block">
            <img class="owl-img" src="images/Block-6.jpg" loading="lazy" alt="banner_img" />
            <div class="owl-cover"></div>
            <div class="owl-Text">
                <a href="#">
                    <input type="button" id="life-ico" name="" value="" class="rotateme">
                </a>
                <p class="Block-Heading"><?php echo $viewtrans['cms_pagetitle'] ?></p>
                <p class="Block-SubHeading"><?php echo strip_tags($viewtrans['cms_pagedes']) ?></p>
            </div>
        </div>
        <?php $viewlearn = getAnyTableWhereData('na_cms', " AND id=11"); ?>
        <div class="owl-block">
            <img class="owl-img" src="images/Block-6.jpg" loading="lazy" alt="banner_img" />
            <div class="owl-cover"></div>
            <div class="owl-Text">
                <a href="#">
                    <input type="button" id="DL-ico" name="" value="" class="rotateme">
                </a>
                <p class="Block-Heading"><?php echo $viewlearn['cms_pagetitle'] ?></p>
                <p class="Block-SubHeading"><?php echo $viewlearn['cms_pagedes'] ?></p>
            </div>
        </div>
        <?php $viewind = getAnyTableWhereData('na_cms', " AND id=8"); ?>
        <div class="owl-block">
            <img class="owl-img" src="images/Block-6.jpg" loading="lazy" alt="banner_img" />
            <div class="owl-cover"></div>
            <div class="owl-Text">
                <a href="#">
                    <input type="button" id="individual-ico" name="" value="" class="rotateme">
                </a>
                <p class="Block-Heading"><?php echo $viewind['cms_pagetitle'] ?></p>
                <p class="Block-SubHeading"><?php echo $viewind['cms_pagedes'] ?></p>
            </div>
        </div>
        <?php $vieedu = getAnyTableWhereData('na_cms', " AND id=7"); ?>
        <div class="owl-block">
            <img class="owl-img" src="images/Block-6.jpg" loading="lazy" alt="banner_img" />
            <div class="owl-cover"></div>
            <div class="owl-Text">
                <a href="#">
                    <input type="button" id="education-ico" name="" value="" class="rotateme">
                </a>
                <p class="Block-Heading"><?php echo $vieedu['cms_pagetitle'] ?></p>
                <p class="Block-SubHeading"><?php echo $vieedu['cms_pagedes'] ?></p>
            </div>
        </div>
        <?php $viefac = getAnyTableWhereData('na_cms', " AND id=6"); ?>
        <div class="owl-block">
            <img class="owl-img" src="images/Block-6.jpg" loading="lazy" alt="banner_img" />
            <div class="owl-cover"></div>
            <div class="owl-Text">
                <a href="#">
                    <input type="button" id="instruc-ico" name="" value="" class="rotateme">
                </a>
                <p class="Block-Heading"><?php echo $viefac['cms_pagetitle'] ?></p>
                <p class="Block-SubHeading"><?php echo $viefac['cms_pagedes'] ?></p>
            </div>
        </div>
    </div>
</div>

<!-- <div id="wb_LayoutGrid4">
    <div id="LayoutGrid4">
        <div class="row">
            <div class="col-1">
                <input type="button" id="book-ico" name="" value="" class="rotateme">
                <div id="wb_book-h1">
                    <span class="Item-Head"></span>
                </div>
                <div id="wb_book-p">
                    <span class="Para-style"></span>
                </div>
            </div>
            <div class="col-2">
                <div id="wb_Life-H1">
                    <span class="Item-Head"></span>
                </div>
                <div id="wb_life-p">
                    <span class="Para-style"></span>
                </div>
            </div>
            <div class="col-3">
                <div id="wb_Dlearning-h1">
                    <span class="Item-Head"></span>
                </div>
                <div id="wb_dlearning-p">
                    <span class="Para-style"></span>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- <div id="wb_LayoutGrid5">
    <div id="LayoutGrid5">
        <div class="row">
            <div class="col-1">
                <div id="wb_Text4">
                    <span class="Item-Head"></span>
                </div>
                <div id="wb_Text5">
                    <span class="Para-style"></span>
                </div>
            </div>
            <div class="col-2">
                <div id="wb_Text6">
                    <span class="Item-Head"></span>
                </div>
                <div id="wb_Text7">
                    <span class="Para-style"></span>
                </div>
            </div>
            <div class="col-3">
                <div id="wb_Text8">
                    <span class="Item-Head"></span>
                </div>
                <div id="wb_Text9">
                    <span class="Para-style"></span>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container-fluid testimonial-block">
    <div class="testimonial-block-data w-full max-w-3xl mx-auto text-center" x-data="slider">
        <!-- Testimonial image -->
        <div class="testimonial-block-img relative h-32">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[480px] h-[480px] pointer-events-none before:absolute before:inset-0 before:bg-gradient-to-b before:from-indigo-500/25 before:via-indigo-500/5 before:via-25% before:to-indigo-500/0 before:to-75% before:rounded-full before:-z-10">
                <div class="h-32 [mask-image:_linear-gradient(0deg,transparent,theme(colors.white)_20%,theme(colors.white))]">
                    <template x-for="(testimonial, index) in testimonials" :key="index">
                        <div x-show="active === index" class="absolute inset-0 -z-10" x-transition:enter="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700 order-first" x-transition:enter-start="opacity-0 -rotate-[60deg]" x-transition:enter-end="opacity-100 rotate-0" x-transition:leave="transition ease-[cubic-bezier(0.68,-0.3,0.32,1)] duration-700" x-transition:leave-start="opacity-100 rotate-0" x-transition:leave-end="opacity-0 rotate-[60deg]">
                            <img class="relative top-11 left-1/2 -translate-x-1/2 rounded-full" :src="testimonial.img" width="100" height="100" :alt="testimonial.name">
                        </div>
                    </template>
                </div>
            </div>
        </div>
        <!-- Text -->
        <div class="testimonial-block-text mb-9">
            <div class="relative flex flex-col transition-all duration-150 delay-300 ease-in-out" x-ref="testimonials">
                <template x-for="(testimonial, index) in testimonials" :key="index">
                    <div x-show="active === index" x-transition:enter="transition ease-in-out duration-500 delay-200 order-first" x-transition:enter-start="opacity-0 -translate-x-4" x-transition:enter-end="opacity-100 translate-x-0" x-transition:leave="transition ease-out duration-300 delay-300 absolute" x-transition:leave-start="opacity-100 translate-x-0" x-transition:leave-end="opacity-0 translate-x-4">
                        <div class="text-2xl font-bold text-slate-900 before:content-['\201C'] after:content-['\201D']" x-text="testimonial.quote"></div>
                    </div>
                </template>
            </div>
        </div>
        <!-- Buttons -->
        <div class="testimonial-block-btn flex flex-wrap justify-center -m-1.5">
            <template x-for="(testimonial, index) in testimonials" :key="index">
                <button class="inline-flex justify-center whitespace-nowrap rounded-full px-3 py-1.5 m-1.5 text-xs shadow-sm focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-300 dark:focus-visible:ring-slate-600 transition-colors duration-150" :class="active === index ? 'bg-indigo-500 text-white shadow-indigo-950/10' : 'bg-white hover:bg-indigo-100 text-slate-900'" @click="active = index; stopAutorotate();">
                    <span x-text="testimonial.name"></span> <span :class="active === index ? 'text-indigo-200' : 'text-slate-300'">-</span> <span x-text="testimonial.role"></span>
                </button>
            </template>
        </div>
    </div>
</div>

<div class="container-fluid Contact-Us">
    <div class="row Contact-Us-Data">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <a class="Footer-Logo">
                    <img src="images/Logo-Black.png" alt="">
                </a>
            </div>
            <div class="col-lg-6">
                <p class="Contact-Us-Data-Heading">Business Creative Professional Team</p>
                <p class="Contact-Us-Data-SubHeading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla eum veniam repudiandae iusto magnam ipsa molestias ullam exercitationem itaque cumque! Reiciendis minus enim architecto deserunt dignissimos modi doloribus nesciunt quidem.</p>
                <div class="Contact-Us-Social">
                    <a href="">
                        <img src="images/facebook.png" alt="">
                    </a>
                    <a href="">
                        <img src="images/pinterest.png" alt="">
                    </a>
                    <a href="">
                        <img src="images/google.png" alt="">
                    </a>
                    <a href="">
                        <img src="images/twitter.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div id="wb_LayoutGrid1">
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
                        <?php @$viewnews = mysqli_query($con, "select * from `na_newsmedia` where `status`=1");
                        $counter = 1;
                        while ($rownews = mysqli_fetch_array($viewnews)) { ?>
                            <div class="blogitem item <?php if ($counter == 1) { ?>active<?php } ?>" id="<?php echo $counter; ?>">
                                <span class="blogsubject"></span>
                                <div class="no-thumb"></div>
                                <div class="blogdate"><br></div>
                                <span id="wb_uid<?php echo $counter; ?>"><?php echo strip_tags($rownews['description']) ?><br></span><br>
                                <div class="blogcomments"></div>
                            </div>
                            <div class="clearfix visible-col1"></div>
                        <?php $counter++;
                        } ?>
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
</div> -->
<?php include('lib/footer.php'); ?>

<style>
    /********** home banner-section **********/
    .banner-section{position:relative;padding:0}.banner-section .owl-carousel{overflow:hidden;height:calc(100vh - 101px)}.banner-section .owl-carousel .owl-img{height:100%}.banner-section .banner-cover{position:absolute;width:100%;height:100%;background:#6a6a6a;top:0;z-index:1;opacity:.5;left:0}.owl-carousel:hover{cursor:grab}.banner-section .banner-text{z-index:1;padding:0 95px;margin:0;position:absolute;top:50%;left:50%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);width:100%;text-align:center}.banner-section .banner-text h1{color:#fff;font-size:90px;font-weight:700;margin-bottom:50px}.banner-section .banner-text p{color:#fff;font-size:22px;margin-top:30px;line-height:1.5;letter-spacing:2px}.company-data #wb_uid0{font-size:20px!important;color:#504e5a!important}.company-data{padding:20px 0!important}.company-data img{width:100%;height:100px;object-fit:contain}.Product_Container .Product-carousel{overflow:hidden;height:400px;position:absolute;top:70px;width:65%;right:25px}.Product_Container .Product-carousel .owl-img{height:400px;object-fit:cover;border-radius:15px}.Product_Container .Product-carousel .owl-block{position:relative;display:flex;align-items:center;justify-content:center}.Product_Container .Product-carousel .owl-block .owl-Text{position:absolute;padding:10px;height:100%;width:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:2;border-radius:15px}.Product_Container .Product-carousel .owl-block .owl-Text p.Block-Heading{font-size:20px;font-weight:600;color:#fff;text-align:center;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;height:70px}.Product_Container .Product-carousel .owl-block .owl-Text p.Block-SubHeading{font-size:15px;color:#fff;text-align:center;display:-webkit-box;-webkit-line-clamp:4;-webkit-box-orient:vertical;overflow:hidden}.Product_Container .Product-carousel .owl-block .owl-cover{position:absolute;height:100%;width:100%;background:#000;z-index:1;border-radius:15px;opacity:.5}.Product_Container .Product-carousel .owl-block .owl-Text .rotateme{width:80px!important;height:80px!important}.testimonial-block{display:flex;align-items:center;justify-content:center}.testimonial-block .testimonial-block-data{margin:100px 0;max-width:75%}.testimonial-block .testimonial-block-data .testimonial-block-text .text-slate-900{font-size:20px;line-height:25px;font-weight:500}.testimonial-block .testimonial-block-data .testimonial-block-text{margin:0 0 30px}.testimonial-block .testimonial-block-data .testimonial-block-img,.testimonial-block .testimonial-block-data .testimonial-block-img .h-32{height:150px}.testimonial-block .testimonial-block-data .testimonial-block-img .before\:from-indigo-500\/25::before{--tw-gradient-from:#cac9d075 var(--tw-gradient-from-position)}.testimonial-block .testimonial-block-data .testimonial-block-img .w-\[480px\]{width:700px}.testimonial-block .testimonial-block-data .testimonial-block-img .h-\[480px\]{height:700px}.testimonial-block .testimonial-block-data .testimonial-block-btn .text-xs{font-size:13px}.testimonial-block .testimonial-block-data .testimonial-block-btn .bg-indigo-500{background-color:#576042}.testimonial-block .testimonial-block-data .testimonial-block-btn button{display:flex;align-items:center;justify-content:center;height:40px;padding:0 20px!important}.testimonial-block .testimonial-block-data .testimonial-block-btn .hover\:bg-indigo-100:hover{background-color:#efefef}.Contact-Us{padding:0;margin:0;position:relative}.Contact-Us .Contact-Us-Data{height:350px;background-image:url(images/Contact-Us-Back.jpg);object-fit:cover;background-repeat:no-repeat;padding:50px;background-size:100%;margin:0}.Contact-Us .Contact-Us-Data p.Contact-Us-Data-Heading{font-weight:700;font-size:40px;text-align:right}.Contact-Us .Contact-Us-Data p.Contact-Us-Data-SubHeading{font-size:18px;line-height:25px;font-weight:500;margin-top:10px;text-align:right}.Contact-Us .Contact-Us-Social{display:flex;flex-direction:row;justify-content:end;margin-top:20px}.Contact-Us .Contact-Us-Social a{margin-right:15px}.Contact-Us .Contact-Us-Social a:last-child{margin-right:0}.Contact-Us .Contact-Us-Social a img{width:30px;object-fit:cover;border-radius:5px}
</style>
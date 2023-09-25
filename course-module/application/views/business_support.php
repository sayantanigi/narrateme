<!-- Content design start here-->
<div class="clearfix"></div>
<div class="supports">
    <div class="about-panels">
        <?php foreach($abt as $ab) {?>
        <div class="">
            <div id="why">
                <div class="container text-center">
                    <div class="row">
                        <div id="text-rotator">
                            <h1 class="rotate-text wow fadeInDown animated" data-wow-offset="50" style="visibility: visible;">We are here to Support Motivate You</h1>
                        </div>
                        <?php foreach ($features as $fea) {
                            
                         ?>
                        <div class="why-item col-md-6 wow fadeInRightQuick animated" data-wow-delay="0.8s" data-wow-offset="10" style="visibility: visible;-webkit-animation-delay: 0.8s; -moz-animation-delay: 0.8s; animation-delay: 0.8s;">
                            <div class="why-item-icon col-md-2">
                                <i class="<?php echo $fea->icon;?> fa-3x"></i>
                            </div>
                            <div class="why-item-text col-md-10">
                                <h2>
                                   <?php echo $fea->heading;?>
                                </h2>
                                <p>
                                    <?php echo $fea->description;?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                       

                        <div class="why-item-contact col-md-12 wow bounceIn animated" data-wow-offset="10" style="visibility: visible;">
                            <h1>Any questions about these?</h1>
                            <div class="col-md-6 col-md-offset-4">
                            <a href="<?=base_url('contact');?>" class="book-btn">
                                <i class="fa fa-envelope"></i>Contact us
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>



        <div class="clearfix"></div>
    </div>
</div>
<!-- Content design End here-->

<style type="text/css">

#why {
    background:#fff; padding: 15px 0 0 0;
}
#why h2 {
    font-weight:100
}
#why .rotate-text {
    color:#000;
    font-size:50px
}
#why .rotate {
    background:#000;
    color:#3d566e
}
#why .why-item {
    margin-top:40px
}
#why .why-item h1, #why .why-item h2, #why .why-item i, #why .why-item .why-item-text {
    color:#000
}
#why .why-item p, #why .why-item h2 {
    text-align:left; color: #000;
}
#why .why-item .why-item-icon i {
    background:#0082bf;
    color: #fff;
    width:82px;
    height:82px;
    border-radius:100%;
    border:2px solid #0082bf;
    margin-top:30px;
    padding:20px;
    text-align:center;
    
}
#why .why-item:hover i {
     background:rgba(150, 150, 150, .2);
    color: #0082bf;
    -webkit-animation-duration:1s;
    animation-duration:1s;
    -webkit-animation-fill-mode:both;
    animation-fill-mode:both;
    -webkit-animation-name:fadeIn;
    animation-name:fadeIn;
    
}
#why .why-item-contact {
    margin-top:30px;
    text-align:center;
}
#why .why-item-contact h1 {
    color:#000;
    margin-bottom:20px;
    text-align:center;
}
#why .why-item-contact .btn {
    margin-top:20px;
    text-align:center;
}
#why .why-item-contact .btn:hover i {
    color:#333;
    text-align:center;
}
</style>
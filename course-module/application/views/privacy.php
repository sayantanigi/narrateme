        <div class="inner-banner">
            <div class="blue-banenr">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="inner-hd-banenr">
                                Privacy Policy
                            </div>
                            <div class="badecame">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Privacy Policy</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <section class="terms-conditions-page">
                <div class="container">
                   <div class="row">
                         <div class="col-md-7">
                           <div class="terms-conditions-left">
                       <h1>Privacy Statement</h1>
                       
                            <?php foreach($privacy as $prv) {?>
					<?php echo $prv->description ?>
                <?php }?>
                         
                       </div>
                        </div>
                        <div class="col-md-5">
                            <div class="terms-conditions-right">
                              <div class="privacy-policy-inn">
                                  <figure><img src="<?=base_url();?>user_panel/new/images/privacy-policy.jpg" alt=""></figure>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
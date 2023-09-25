<?php include('lib/header.php');
socialcheck();?>
<section id="main">
  <aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu"> <a href="#">
      <div class="profile-pic text-center"> <img src="images/img.jpg" alt=""> </div>
      <div class="profile-info"> Member Name<i class="zmdi zmdi-caret-down"></i> </div>
      </a>
      <ul class="main-menu">
        <li> <a href="#"> View Profile</a> </li>
        <li> <a href="#"> Privacy Settings</a> </li>
        <li> <a href="#"> Settings</a> </li>
        <li> <a href="#"> Logout</a> </li>
      </ul>
    </div>
    <ul class="main-menu social_page_menu">
      <li><a href="dashboard.html"> Main Home <i class="zmdi zmdi-home zmdi-hc-fw"></i></a></li>
      <li class="active"> <a href="profile-wall.html"> Wall Page <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i></a></li>
      <li > <a href="#">All Post <i class="zmdi zmdi-comment-list zmdi-hc-fw"></i></a> </li>
      <li > <a href="#">All Member <i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i></a></li>
      <li > <a href="profile-about.html">About Me <i class="zmdi zmdi-account zmdi-hc-fw"></i></a></li>
    </ul>
  </aside>
  <aside id="chat" class="sidebar c-overflow">
    <div class="chat-search">
      <div class="fg-line">
        <input type="text" class="form-control" placeholder="Search People">
      </div>
    </div>
    <div class="listview"> <a class="lv-item" href="#">
      <div class="media">
        <div class="pull-left p-relative"> <img class="lv-img-sm" src="img/profile-pics/2.jpg" alt=""> <i class="chat-status-busy"></i> </div>
        <div class="media-body">
          <div class="lv-title">Jonathan Morris</div>
          <small class="lv-small">Available</small> </div>
      </div>
      </a> <a class="lv-item" href="#">
      <div class="media">
        <div class="pull-left"> <img class="lv-img-sm" src="img/profile-pics/1.jpg" alt=""> </div>
        <div class="media-body">
          <div class="lv-title">David Belle</div>
          <small class="lv-small">Last seen 3 hours ago</small> </div>
      </div>
      </a> <a class="lv-item" href="#">
      <div class="media">
        <div class="pull-left p-relative"> <img class="lv-img-sm" src="img/profile-pics/3.jpg" alt=""> <i class="chat-status-online"></i> </div>
        <div class="media-body">
          <div class="lv-title">Fredric Mitchell Jr.</div>
          <small class="lv-small">Availble</small> </div>
      </div>
      </a> <a class="lv-item" href="#">
      <div class="media">
        <div class="pull-left p-relative"> <img class="lv-img-sm" src="img/profile-pics/4.jpg" alt=""> <i class="chat-status-online"></i> </div>
        <div class="media-body">
          <div class="lv-title">Glenn Jecobs</div>
          <small class="lv-small">Availble</small> </div>
      </div>
      </a> <a class="lv-item" href="#">
      <div class="media">
        <div class="pull-left"> <img class="lv-img-sm" src="img/profile-pics/5.jpg" alt=""> </div>
        <div class="media-body">
          <div class="lv-title">Bill Phillips</div>
          <small class="lv-small">Last seen 3 days ago</small> </div>
      </div>
      </a> <a class="lv-item" href="#">
      <div class="media">
        <div class="pull-left"> <img class="lv-img-sm" src="img/profile-pics/6.jpg" alt=""> </div>
        <div class="media-body">
          <div class="lv-title">Wendy Mitchell</div>
          <small class="lv-small">Last seen 2 minutes ago</small> </div>
      </div>
      </a> <a class="lv-item" href="#">
      <div class="media">
        <div class="pull-left p-relative"> <img class="lv-img-sm" src="img/profile-pics/7.jpg" alt=""> <i class="chat-status-busy"></i> </div>
        <div class="media-body">
          <div class="lv-title">Teena Bell Ann</div>
          <small class="lv-small">Busy</small> </div>
      </div>
      </a> </div>
  </aside>
  <section id="content">
    <div class="container c-alt">
      <div class="block-header">
        <h2>Wall <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. .</small></h2>
        
        <!--<ul class="actions">
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-trending-up"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="zmdi zmdi-check-all"></i>
                                </a>
                            </li>
                            <li class="dropdown" dropdown>
                                <a href="#" dropdown-toggle>
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="#">Refresh</a>
                                    </li>
                                    <li>
                                        <a href="#">Manage Widgets</a>
                                    </li>
                                    <li>
                                        <a href="#">Widgets Settings</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>--> 
        
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="card wall-posting">
            <div class="card-body card-padding">
              <textarea class="wp-text" data-auto-size placeholder="Write Something..."></textarea>
              <div class="tab-content p-0">
                <div class="wp-media tab-pane" id="wpm-image"> Images - Coming soon... </div>
                <div class="wp-media tab-pane" id="wpm-video"> Video Links - Coming soon... </div>
                <div class="wp-media tab-pane" id="wpm-link"> Links - Coming soon... </div>
              </div>
            </div>
            <ul class="list-unstyled clearfix wpb-actions">
              <li class="wpba-attrs">
                <ul class="list-unstyled list-inline m-l-0 m-t-5">
                  <li><a data-wpba="image" data-toggle="tab" href="#" data-target="#wpm-image"><i class="zmdi zmdi-image"></i></a></li>
                  <li><a data-wpba="video" data-toggle="tab" href="#" data-target="#wpm-video"><i class="zmdi zmdi-play-circle"></i></a></li>
                  <li><a data-wpba="link" data-toggle="tab" href="#" data-target="#wpm-link"><i class="zmdi zmdi-link"></i></a></li>
                </ul>
              </li>
              <li class="pull-right">
                <button class="btn btn-primary btn-sm">Post</button>
              </li>
            </ul>
          </div>
          <div class="card">
            <div class="card-header">
              <div class="media">
                <div class="pull-left"> <img class="lv-img" src="images/img.jpg" alt=""> </div>
                <div class="media-body m-t-5">
                  <h2>Mallinda Hollaway <small>Posted on 31st Aug 2015 at 07:00</small></h2>
                </div>
              </div>
            </div>
            <div class="card-body card-padding">
              <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero, gravida vel diam ut, lobortis mollis quam. Morbi posuere egestas posuere. Curabitur in dui sollicitudin, lacinia magna at, laoreet sapien. Integer vitae eros nulla.</p>
              <ul class="wall-attrs clearfix list-inline list-unstyled">
                <li class="wa-stats"> <span><i class="zmdi zmdi-comments"></i> 36</span> <span class="active"><i class="fa fa-thumbs-up" aria-hidden="true"></i> 220</span> <span class=""><i class="fa fa-thumbs-down" aria-hidden="true"></i> 220</span> <span class="active"><i class="zmdi zmdi-share zmdi-hc-fw"></i> 220</span> </li>
              </ul>
              <a class="tvc-more" href="#"><i class="zmdi zmdi-mode-comment"></i> View all 54 Comments</a> </div>
            <div class="wall-comment-list"> 
              
              <!-- Comment Listing -->
              <div class="wcl-list">
                <div class="media"> <a href="#" class="pull-left"> <img src="images/img.jpg" alt="" class="lv-img-sm"> </a>
                  <div class="pull-right p-0">
                    <ul class="actions">
                      <li class="dropdown" dropdown=""> <a href="#" dropdown-toggle="" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li> <a href="#">Report</a> </li>
                          <li> <a href="#">Delete</a> </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class="media-body"> <a href="#" class="a-title">David Nathan</a> <small class="c-gray m-l-10">3 mins ago...</small>
                    <p class="m-t-5 m-b-0">Maecenas dignissim in neque id commodo. Nam pretium a tortor a convallis. Curabitur in arcu quis nulla aliquam condimentum. Morbi eu cursus diam, vitae tristique dui.</p>
                  </div>
                </div>
              </div>
              
              <!-- Comment form -->
              <div class="wcl-form">
                <div class="wc-comment">
                  <div class="wcc-inner wcc-toggle"> Write Something... </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 hidden-sm">
          <div class="card">
            <div class="card-header">
              <h2>About me</h2>
            </div>
            <div class="card-body card-padding"> Maecenas malesuada. Nam adipiscing. Etiam vitae tortor. Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem. <a data-ui-sref="" href="profile-about.html"><small>Read more...</small></a> </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h2>Recent Comments <small>Commodo vel pharetra nisi. Donec velit libero</small></h2>
            </div>
            <div class="listview">
              <div class="lv-body"> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">David Belle</div>
                    <small class="lv-small">Cum sociis natoque penatibus et magnis dis parturient montes</small> </div>
                </div>
                </a> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">Jonathan Morris</div>
                    <small class="lv-small">Nunc quis diam diamurabitur at dolor elementum, dictum turpis vel</small> </div>
                </div>
                </a> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">Fredric Mitchell Jr.</div>
                    <small class="lv-small">Phasellus a ante et est ornare accumsan at vel magnauis blandit turpis at augue ultricies</small> </div>
                </div>
                </a> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">Glenn Jecobs</div>
                    <small class="lv-small">Ut vitae lacus sem ellentesque maximus, nunc sit amet varius dignissim, dui est consectetur neque</small> </div>
                </div>
                </a> <a class="lv-item" href="#">
                <div class="media">
                  <div class="pull-left"> <img class="lv-img-sm" src="images/img.jpg" alt=""> </div>
                  <div class="media-body">
                    <div class="lv-title">Bill Phillips</div>
                    <small class="lv-small">Proin laoreet commodo eros id faucibus. Donec ligula quam, imperdiet vel ante placerat</small> </div>
                </div>
                </a> </div>
              <a class="lv-footer" href="">View All</a> </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h2>Contact Information <small>Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero</small></h2>
            </div>
            <div class="card-body card-padding">
              <div class="pmo-contact">
                <ul>
                  <li class="ng-binding"><i class="zmdi zmdi-phone"></i> 00971123456789</li>
                  <li class="ng-binding"><i class="zmdi zmdi-email"></i> abc.h@gmail.com</li>
                  <li class="ng-binding"><i class="zmdi zmdi-facebook-box"></i> abc.hollaway</li>
                  <li class="ng-binding"><i class="zmdi zmdi-twitter"></i> @abc (twitter.com/abc)</li>
                  <li> <i class="zmdi zmdi-pin"></i>
                    <address class="m-b-0 ng-binding">
                    44-46 Morningside Road,<br>
                    Edinburgh,<br>
                    Scotland
                    </address>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<?php include('lib/footer.php') ?>
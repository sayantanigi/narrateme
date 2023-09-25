        <div class="inner-banner">
            <div class="blue-banenr">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="inner-hd-banenr">
                                Blog
                            </div>
                            <div class="badecame">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li>Blog</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <section class="blog-page">
            <div class="blog-tab-col">
                <div class="container">
                   <div class="row">
                      <div class="col-sm-12">
                         <div class="top-stracture">
                            <ul>
                               <li> <a href="#">Courses  08 </a> </li>
                               <li> <a href="#">Accommodation  12</a> </li>
                               <li> <a href="#">Team Effectiveness  15</a> </li>
                               <li> <a href="#">Communications  04</a> </li>
                               <li> <a href="#">Business Development  06</a> </li>
                               <li> <a href="#">Advancement  03</a> </li>
                               <li> <a href="#">Coaching  05</a> </li>
                            </ul>
                            <div class="blog-search-col">
                               <form class="search-form">
                                  <input type="text" id="" class="search-field" placeholder="Search">
                                  <input type="button" class="search-submit">
                               </form>
                            </div>
                         </div>
                      </div>
                    </div>
                </div>
             </div>
             
             
             <?php //print_r($bloglist);die;
             foreach ($bloglist as $b) {
				//print_r($b);die;
					 ?>
					 
             <div class="blog-innerDiv">
                <div class="container">
                    <div class="row">
                       <div class="col-sm-8">
                            <div class="blog-inner-item">
                                <h2><a href="#"><?php  echo $b->blog_title; ?></a></h2>
                                <div class="comments-divIn">
                                    <ul>
                                       <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/share-icon.png" alt=""> Share </a> </li>
                                       <div class="postDate">
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/admin-icon.png" alt=""> <?php  echo $b->posted_by; ?>  </a> </li>
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/calender-icon.png" alt=""> January 16,2020 </a> </li>
                                       </div>
                                    </ul>
                                 </div>
                                 <p><strong>Proin rutrum orci a faucibus interdum.</strong> Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu eros. </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="blog-image">
                              <figure> <a href="#"><img src="<?php echo base_url()?>uploads/blog/<?php echo $b->blog_image;?>" alt=""></a></figure>
                            </div>
                         </div>
                    </div>
                </div>
             </div>
             
             
             <?php } ?>
             <!--<div class="blog-innerDiv">
                <div class="container">
                    <div class="row">
                       <div class="col-sm-8">
                            <div class="blog-inner-item">
                                <h2><a href="#">Bullying at school – UK  </a></h2>
                                <div class="comments-divIn">
                                    <ul>
                                       <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/share-icon.png" alt=""> Share </a> </li>
                                       <div class="postDate">
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/admin-icon.png" alt=""> edu-consultancy  </a> </li>
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/calender-icon.png" alt=""> January 16,2020 </a> </li>
                                       </div>
                                    </ul>
                                 </div>
                                 <p><strong>Proin rutrum orci a faucibus interdum.</strong> Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu eros. </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="blog-image">
                              <figure> <a href="#"><img src="<?php echo base_url()?>user_panel/new/images/blog-image-02.jpg" alt=""></a></figure>
                            </div>
                         </div>
                    </div>
                </div>
             </div>
             <div class="blog-innerDiv">
                <div class="container">
                    <div class="row">
                       <div class="col-sm-8">
                            <div class="blog-inner-item">
                                <h2><a href="#">Health and safety for school children- UK </a></h2>
                                <div class="comments-divIn">
                                    <ul>
                                       <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/share-icon.png" alt=""> Share </a> </li>
                                       <div class="postDate">
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/admin-icon.png" alt=""> edu-consultancy  </a> </li>
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/calender-icon.png" alt=""> January 16,2020 </a> </li>
                                       </div>
                                    </ul>
                                 </div>
                                 <p><strong>Proin rutrum orci a faucibus interdum.</strong> Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu eros. </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="blog-image">
                              <figure> <a href="#"><img src="<?php echo base_url()?>user_panel/new/images/blog-image-03.jpg" alt=""></a></figure>
                            </div>
                         </div>
                    </div>
                </div>
             </div>
             <div class="blog-innerDiv">
                <div class="container">
                    <div class="row">
                       <div class="col-sm-8">
                            <div class="blog-inner-item">
                                <h2><a href="#">Mauris sit amet vehicula elit, et maximus quam. </a></h2>
                                <div class="comments-divIn">
                                    <ul>
                                       <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/share-icon.png" alt=""> Share </a> </li>
                                       <div class="postDate">
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/admin-icon.png" alt=""> edu-consultancy  </a> </li>
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/calender-icon.png" alt=""> January 16,2020 </a> </li>
                                       </div>
                                    </ul>
                                 </div>
                                 <p><strong>Proin rutrum orci a faucibus interdum.</strong> Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu eros. </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="blog-image">
                              <figure> <a href="#"><img src="<?php echo base_url()?>user_panel/new/images/blog-image-04.jpg" alt=""></a></figure>
                            </div>
                         </div>
                    </div>
                </div>
             </div>
             <div class="blog-innerDiv">
                <div class="container">
                    <div class="row">
                       <div class="col-sm-8">
                            <div class="blog-inner-item">
                                <h2><a href="#">Mauris sit amet vehicula elit, et maximus quam. </a></h2>
                                <div class="comments-divIn">
                                    <ul>
                                       <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/share-icon.png" alt=""> Share </a> </li>
                                       <div class="postDate">
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/admin-icon.png" alt=""> edu-consultancy  </a> </li>
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/calender-icon.png" alt=""> January 16,2020 </a> </li>
                                       </div>
                                    </ul>
                                 </div>
                                 <p><strong>Proin rutrum orci a faucibus interdum.</strong> Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu eros. </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="blog-image">
                              <figure> <a href="#"><img src="<?php echo base_url()?>user_panel/new/images/blog-image-04.jpg" alt=""></a></figure>
                            </div>
                         </div>
                    </div>
                </div>
             </div>
             <div class="blog-innerDiv">
                <div class="container">
                    <div class="row">
                       <div class="col-sm-8">
                            <div class="blog-inner-item">
                                <h2><a href="#">Mauris sit amet vehicula elit, et maximus quam. </a></h2>
                                <div class="comments-divIn">
                                    <ul>
                                       <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/share-icon.png" alt=""> Share </a> </li>
                                       <div class="postDate">
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/admin-icon.png" alt=""> edu-consultancy  </a> </li>
                                          <li> <a href="#"> <img src="<?php echo base_url()?>user_panel/new/images/calender-icon.png" alt=""> January 16,2020 </a> </li>
                                       </div>
                                    </ul>
                                 </div>
                                 <p><strong>Proin rutrum orci a faucibus interdum.</strong> Sed eu neque sed nibh maximus elementum vel et odio. Vivamus ultrices velit vel vehicula vehicula. Proin ut lorem eget eros mattis efficitur sodales eu eros. </p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="blog-image">
                              <figure> <a href="#"><img src="<?php echo base_url()?>user_panel/new/images/blog-image-04.jpg" alt=""></a></figure>
                            </div>
                         </div>
                    </div>
                </div>
             </div>-->
             <!--<div class="container">
                <div class="next-page-conuter">
                    <div class="pagenavi-blog">
                        <div class="wp-pagenavi" role="navigation">
                            <a class="prevpostslink" rel="next" href="#">Previous</a>
                           <span aria-current="page" class="current">1</span>
                           <a class="page larger" title="Page 2" href="#">2</a>
                           <a class="page larger" title="Page 3" href="#">3</a>
                           <a class="page larger" title="Page 2" href="#">4</a>
                           <a class="page larger" title="Page 3" href="#">5</a>
                           <a class="nextpostslink" rel="next" href="#">Next</a>
                         </div>
                    </div>
                </div>
             </div>-->
        </section>
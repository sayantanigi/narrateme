<?php 
$nl=$this->uri->segment(1); 
$nl2=$this->uri->segment(2); 
?>
<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler"> </div>
        </li>
        <li class="sidebar-search-wrapper"></li>
        <li class="nav-item start <?//=$group['dashboard']?>">
            <a href="<?php echo base_url();?>home" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span>
                <span class="<?//=$selected['dashboard']?>"></span>
                <span class="arrow <?//=$arrowopen['dashboard']?>"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start <?//=$group['dashboard']?>"> 
                    <a href="<?php echo base_url();?>home" class="nav-link ">
                        <i class="icon-calendar"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="heading">
            <h3 class="uppercase">Features</h3>
        </li>
        <li class="nav-item <?php if($nl=="cms"){?>active open<?php }?>">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-docs"></i> <span class="title">CMS Mgmt</span>
                <span class="addmember"></span>
                <span class="arrow addmember"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item <?php if($nl2=="add_cms"){?>active open<?php }?>"> 
                    <a href="<?php echo base_url()?>cms/add_cms" class="nav-link "><span class="title">Add Cms Page</span> 
                    </a> 
                </li>
                <li class="nav-item  <?php if($nl=="cms" && $nl2!="add_cms"){?>active open<?php }?>"> <a href="<?php echo base_url()?>cms" class="nav-link "> <span class="title">Manage CMS Page</span> </a> </li>
            </ul>
        </li>
        <li class="nav-item <?php if($nl=="faq"){?>active open<?php }?>">
            <a href="javascript:;" class="nav-link nav-toggle"> 
                <i class="icon-docs"></i> <span class="title">FAQ Mgmt</span> 
                <span class="addmember"></span> 
                <span class="arrow addmember"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item <?php if($nl2=="add_faq"){?>active open<?php }?>">
                    <a href="<?php echo base_url()?>faq/add_faq" class="nav-link ">
                        <span class="title">Add FAQ</span>
                    </a>
                </li>
                <li class="nav-item  <?php if($nl=="faq" && $nl2!="add_faq"){?>active open<?php }?>">
                    <a href="<?php echo base_url()?>faq/view_faq" class="nav-link ">
                        <span class="title">Manage FAQ</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item <?php if($nl=="product" || $nl=="product_type"){?>active open<?php }?>">
            <a href="javascript:;" class="nav-link nav-toggle"> <i class="icon-docs"></i>
                <span class="title">Product Management</span>
                <span class="addindividual"></span>
                <span class="arrow addindividual"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  <?php if($nl2=="product_type_add_form"){?>active open<?php }?>">
                    <a href="<?php echo base_url();?>product_type/product_type_add_form" class="nav-link ">
                        <span class="title">Add Product Type</span>
                    </a>
                </li>
                <li class="nav-item  <?php if($nl=="show_product_type"){?>active open<?php }?>">
                    <a href="<?php echo base_url();?>product_type/show_product_type" class="nav-link ">
                        <span class="title">Manage Product Type</span>
                    </a>
                </li>
                <li class="nav-item <?php if($nl2=="product_add_form"){?>active open<?php }?>">
                    <a href="<?php echo base_url();?>product/product_add_form" class="nav-link ">
                        <span class="title">Add Product</span>
                    </a>
                </li>
                <li class="nav-item  <?php if($nl=="show_product"  ){?>active open<?php }?>">
                    <a href="<?php echo base_url();?>product/show_product" class="nav-link ">
                        <span class="title">Manage Product</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item <?php if($nl=="member"){?>active open<?php }?>"> 
            <a href="javascript:;" class="nav-link nav-toggle"> 
                <i class="icon-docs"></i>
                <span class="title">User Mgmt</span> 
                <span class="addmember"></span> 
                <span class="arrow addmember"></span>
            </a>
          <ul class="sub-menu">
            <li class="nav-item  <?php if($nl=="member" && $nl2!="view_member" && $nl2!="view_drug" && $nl2!="add_drug_view"){?>active open<?php }?>"> <a href="<?php echo base_url()?>member" class="nav-link "> <span class="title">Add member</span> </a> </li>

            <li class="nav-item  <?php if($nl2=="view_member"){?>active open<?php }?>"> <a href="<?php echo base_url()?>member/view_member" class="nav-link "> <span class="title">Manage User </span> </a> </li>

            

            <!--<li class="nav-item  <?php if($nl2=="view_drug"){?>active open<?php }?>"> <a href="<?php echo base_url()?>member/view_drug" class="nav-link "> <span class="title">Drug </span> </a> </li>-->

            

           <!-- <li class="nav-item  <?php if($nl2=="add_drug_view"){?>active open<?php }?>"> <a href="<?php echo base_url()?>member/add_drug_view" class="nav-link "> <span class="title">Add Drug </span> </a> </li>-->

          </ul>

        </li>

        

        <li class="nav-item <?php if($nl=="newsmedia"){?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-docs"></i> <span class="title">News Media  Mgmt</span> 

             <span class="<?//=$selected['newsmedia']?>"></span> 

             <span class="arrow <?//=$arrowopen['newsmedia']?>"></span>

        </a>

        

          <ul class="sub-menu">

            <li class="nav-item  <?php if($nl=="newsmedia" && $nl2!="view_newsmedia"){?>active open<?php }?>"> <a href="<?php echo base_url()?>newsmedia" class="nav-link "> <span class="title">Add News Media</span> </a> </li>

            <li class="nav-item  <?php if($nl2=="view_newsmedia"){?>active open<?php }?>"> <a href="<?php echo base_url()?>newsmedia/view_newsmedia" class="nav-link "> <span class="title">Manage News Media </span> </a> </li>

          </ul>

        </li>

        

        <li class="nav-item <?php if($nl=="social"){?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-docs"></i> <span class="title">Social Mgmt</span> 

             <span class="<?//=$selected['addsocialprofile']?>"></span> 

             <span class="arrow <?//=$arrowopen['addsocialprofile']?>"></span>

        </a>

          <ul class="sub-menu">

            <li class="nav-item <?php if($nl=="social" && $nl2!="view_social"){?>active open<?php }?>"> <a href="<?php echo base_url()?>social" class="nav-link "> <span class="title">Add Social Profile</span> </a> </li>

            <li class="nav-item  <?php if($nl2=="view_social"){?>active open<?php }?>"> <a href="<?php echo base_url()?>social/view_social" class="nav-link "> <span class="title">Manage Social Profile </span> </a> </li>

          </ul>

        </li>

        

        <!--li class="nav-item <?php if($nl=="student" || $nl=="studentaward"){?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-docs"></i> <span class="title">Student Mgmt</span> 

             <span class="<?//=$selected['addsocialprofile']?>"></span> 

             <span class="arrow <?//=$arrowopen['addsocialprofile']?>"></span>

        </a>

          <ul class="sub-menu">

            <li class="nav-item  <?php if($nl=="student" && $nl2!="view_student" && $nl2!="view_student_experience" && $nl2!="add_rehabdata_view"){?>active open<?php }?>"> <a href="<?php echo base_url()?>student" class="nav-link "> <span class="title">Add Student Profile</span> </a> </li>

            <li class="nav-item  <?php if($nl2=="view_student"){?>active open<?php }?>"> 

            	<a href="<?php echo base_url()?>student/view_student" class="nav-link "> <span class="title">Manage Student Profile </span> </a> 

            </li>

            

            <li class="nav-item  <?php if($nl2=="view_student_award"){?>active open<?php }?>"> 

            	<a href="<?php echo base_url()?>studentaward/view_student_award" class="nav-link "> <span class="title">Manage Student Award </span> </a> 

            </li>

            

            <li class="nav-item  <?php if($nl2=="view_student_experience"){?>active open<?php }?>"> 

            	<a href="<?php echo base_url()?>student/view_student_experience" class="nav-link "> <span class="title">Manage Student Job </span> </a> 

            </li>

            

            

            <li class="nav-item  <?php if($nl2=="add_rehabdata_view"){?>active open<?php }?>"> 

            	<a href="<?php echo base_url()?>student/add_rehabdata_view" class="nav-link "> <span class="title">Add Rehabiliation </span> </a> 

            </li>

            

            <li class="nav-item  <?php if($nl2=="view_rehabilitation"){?>active open<?php }?>"> 

            	<a href="<?php echo base_url()?>student/view_rehabilitation" class="nav-link "> <span class="title">View Rehabiliation </span> </a> 

            </li>

            

            

          </ul>

        </li-->

         <!--=================07-03-2016======================-->

        <!--<li class="nav-item <?php if($nl=="institute" || $nl=="teacher"){?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-docs"></i> <span class="title">Institute  Mgmt</span> 

             <span class="<?//=$selected['edu']?>"></span> 

             <span class="arrow <?//=$arrowopen['edu']?>"></span>

        </a>

          <ul class="sub-menu">

            <li class="nav-item  <?php if($nl=="institute" && $nl2!="view_institute"){?>active open<?php }?>"> <a href="<?php echo base_url()?>institute" class="nav-link "> <span class="title">Add Institute</span> </a> </li>

            <li class="nav-item   <?php if($nl2=="view_institute"){?>active open<?php }?>"> <a href="<?php echo base_url()?>institute/view_institute" class="nav-link "> <span class="title">Manage Institute </span> </a> </li>

			<li class="nav-item  <?php if($nl=="teacher" && $nl2!="view_teacher"){?>active open<?php }?>"> <a href="<?php echo base_url()?>teacher" class="nav-link "> <span class="title">Add Teacher </span> </a> </li>

			<li class="nav-item  <?php if($nl2=="view_teacher"){?>active open<?php }?>"> <a href="<?php echo base_url()?>teacher/view_teacher" class="nav-link "> <span class="title">Manage Teacher </span> </a> </li>

          </ul>

        </li>-->

        <!--=================07-03-2016======================-->

        

        <!--=================16-03-2016=======================-->

        <!--<li class="nav-item <?php if($nl=="recomendation" || $nl=="teacher"){?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-docs"></i> <span class="title">Recommendation Mgmt</span> 

             <span class="<?//=$selected['edu']?>"></span> 

             <span class="arrow <?//=$arrowopen['edu']?>"></span>

        </a>

          <ul class="sub-menu">

            <li class="nav-item  <?php if($nl=="recomendation" && $nl2!="view_recomendation"){?>active open<?php }?>"> <a href="<?php echo base_url()?>recomendation" class="nav-link "> <span class="title">Add Recomendation</span> </a> </li>

            <li class="nav-item   <?php if($nl2=="view_recomendation"){?>active open<?php }?>"> <a href="<?php echo base_url()?>recomendation/view_recomendation" class="nav-link "> <span class="title">Manage Recomendation </span> </a> </li>

          </ul>

        </li>-->

        

        <!--<li class="nav-item <?php if($nl=="coach"){?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-docs"></i> <span class="title">Coach Mgmt</span> 

             <span class="<?//=$selected['edu']?>"></span> 

             <span class="arrow <?//=$arrowopen['edu']?>"></span>

        </a>

          <ul class="sub-menu">

            <li class="nav-item  <?php if($nl=="coach" && $nl2!="view_coach"){?>active open<?php }?>"> <a href="<?php echo base_url()?>coach" class="nav-link "> <span class="title">Add Coach</span> </a> </li>

            <li class="nav-item   <?php if($nl2=="view_coach"){?>active open<?php }?>"> <a href="<?php echo base_url()?>coach/view_coach" class="nav-link "> <span class="title">Manage Coach </span> </a> </li>

          </ul>

        </li>-->

        

        <li class="nav-item <?php if($nl=="video"){?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-docs"></i> <span class="title">Video Mgmt</span> 

             <span class="<?//=$selected['edu']?>"></span> 

             <span class="arrow <?//=$arrowopen['edu']?>"></span>

        </a>

          <ul class="sub-menu">

            <li class="nav-item  <?php if($nl=="video" && $nl2!="view_video"){?>active open<?php }?>"> <a href="<?php echo base_url()?>video" class="nav-link "> <span class="title">Add video</span> </a> </li>

            <li class="nav-item   <?php if($nl2=="view_video"){?>active open<?php }?>"> <a href="<?php echo base_url()?>video/view_video" class="nav-link "> <span class="title">Manage video </span> </a> </li>

          </ul>

        </li>

        

        <li class="nav-item <?php if($nl=="audio"){?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-docs"></i> <span class="title">Audio Mgmt</span> 

             <span class="<?//=$selected['edu']?>"></span> 

             <span class="arrow <?//=$arrowopen['edu']?>"></span>

        </a>

          <ul class="sub-menu">

            <li class="nav-item  <?php if($nl=="audio" && $nl2!="view_audio"){?>active open<?php }?>"> <a href="<?php echo base_url()?>audio" class="nav-link "> <span class="title">Add audio</span> </a> </li>

            <li class="nav-item   <?php if($nl2=="view_audio"){?>active open<?php }?>"> <a href="<?php echo base_url()?>audio/view_audio" class="nav-link "> <span class="title">Manage Audio </span> </a> </li>

          </ul>

        </li>

        

        <!--<li class="nav-item <?php if($nl=="award"){?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-docs"></i> <span class="title">Reward Mgmt</span> 

             <span class="<?//=$selected['edu']?>"></span> 

             <span class="arrow <?//=$arrowopen['edu']?>"></span>

        </a>

          <ul class="sub-menu">

            <li class="nav-item  <?php if($nl=="award" && $nl2!="view_award"){?>active open<?php }?>"> <a href="<?php echo base_url()?>award" class="nav-link "> <span class="title">Add Award</span> </a> </li>

            <li class="nav-item   <?php if($nl2=="view_award"){?>active open<?php }?>"> <a href="<?php echo base_url()?>award/view_award" class="nav-link "> <span class="title">Manage Award </span> </a> </li>

          </ul>

        </li>-->

        <!--=================16-03-2016=======================-->

        

        <li class="heading">

          <h3 class="uppercase">Settings</h3>

        </li>

        <li class="nav-item <?php if($nl=="main"){ ?>active open<?php }?>"> 

        <a href="javascript:;" class="nav-link nav-toggle"> 

        <i class="icon-settings"></i> <span class="title">Tools</span> 

        <span class="<?//=$selected['tools']?>"></span> 

        <span class="arrow <?//=$arrowopen['tools']?>"></span> </a>

          <ul class="sub-menu">

            <li class="nav-item <?//=$activepage['settings']?>"> <a href="<?php echo base_url()?>settings/view_settings" class="nav-link"> <i class="icon-bar-chart"></i> Settings </a> </li>

            <li class="nav-item <?//=$activepage['adminprofile']?>"> <a href="<?php echo base_url()?>adminprofile/view_adminprofile" class="nav-link"> <i class="icon-user"></i> Admin Profile </a> </li>

            <li class="nav-item  <?php if($nl=="main"){?>active open<?php }?>"> <a href="<?php echo base_url()?>main/reset_password" class="nav-link"> <i class="icon-lock"></i> Change Password </a> </li>

            <li class="nav-item"> <a href="<?php echo base_url()?>main/logout" class="nav-link"> <i class="icon-key"></i> Logout </a> </li>

          </ul>

        </li>

      </ul>

      <!-- END SIDEBAR MENU -->

      <!-- END SIDEBAR MENU -->

    </div>
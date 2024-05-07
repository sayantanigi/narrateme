<style>
.list-box figure img {height: 215px !important;}
.price-view {text-align: justify !important;}
.upcoming-courses {padding: 0px !important;}
.couldnt-find-course {padding: 90px 0 90px !important;}
.search-courses {padding: 0 !important;}
.emply-resume-list{width: 100%; text-align: center; padding: 0px 0px 60px 0;}
.list-box {float: left; width: 100%; background: #ffffff; margin-top: 0px; box-shadow: 0 0 10px #ff9900; -moz-border-radius: 8px; -ms-border-radius: 8px; -o-border-radius: 8px; border-radius: 8px; overflow: hidden; padding: 0 0 25px 0px;}
.other-courses {background-size: 100% 475px !important; padding: 0 !important;}
.list-box-courses{float: left; width: 100%; background: #ffffff; margin-top: 0px; box-shadow: 0 0 10px #ff9900; -moz-border-radius: 8px; -ms-border-radius: 8px; -o-border-radius: 8px; border-radius: 8px; overflow: hidden; padding: 0 0 25px 0px;}
.list-box-courses figure {margin: 0 0 10px; padding: 0; border: 4px solid #ededf0;}
.courses-view-other {padding: 0 !important;}
.both-bt a.button-default {min-width: 47%; font-size: 18px; padding: 10px 6px 13px 6px;}
.price-view span {padding: 5px 15px 5px 15px; text-align: center; min-width: 185px; color: #ffffff; font-size: 16px; background: #2e3192; border-radius: 34px; line-height: normal; display: inline-block;}
.courses-view-other ul li {padding: 25px 24px !important;}
.formcourse .wrapper-form {padding: 0 !important;}
.users_name_err {display: none;}
.users_email_err {display: none;}
.users_phno_err {display: none;}
</style>
<?php
$this->db->select('*');
$this->db->from('sm_course');
$query = $this->db->get()->result();
$content = $this->generalmodel->show_data_id("sm_page_content", 3, "id", "get", "");
//print($content[0]->page_title);die;
?>
<div class="inner-banner">
    <div class="blue-banenr">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="inner-hd-banenr">
                        Courses
                    </div>
                    <div class="badecame">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Courses</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="search-courses">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-center">
                    <div class="heading-md">
                        <?php echo ($content[0]->content_title); ?>
                    </div>
                    <p><?php echo ($content[0]->content_details); ?>.</p>
                </div>
                <div class="search-form-course clearfix">
                    <div class="col-form">
                        <label>Category </label>
                        <div class="field-select">
                            <select class="select-option" id="categoryshow" onchange="courseget(this);">
                                <option value="">-- Select Category --</option>
                                <?php if (is_array($coursepcategory) && count($coursepcategory) > 0) {
                                foreach ($coursepcategory as $cat) { ?>
                                <option value="<?= $cat->category_id ?>"><?= $cat->category_name ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-form col-name">
                        <label>Course name </label>
                        <div class="field-select">
                            <select class="select-option" id="courseshow">
                                <option value="">-- Select Course --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-form">
                        <label>Level </label>
                        <div class="field-select">
                            <select class="select-option" id="levelshow">
                                <option value="">-- Select Level --</option>
                                <?php if (is_array($levels) && count($levels) > 0) {
                                    foreach ($levels as $lv) { ?>
                                    <option value="<?= $lv['id'] ?>"><?= $lv['level_title'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-form">
                        <label>Type  </label>
                        <div class="field-select">
                            <select class="select-option" id="typeshow">
                                <option value="">-- Select Type --</option>
                                <option value="Upcoming Courses">Upcoming Courses</option>
                                <option value="Coming Soon courses">Coming Soon courses</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-form col-name">
                        <label>Certificate </label>
                        <div class="field-select">
                            <select class="select-option" id="certificateshow">
                                <option value="">-- Select Course Certificate --</option>
                                <option value="Certificate of Completion">Certificate of Completion</option>
                                <option value="Certificate of Attendance">Certificate of Attendance</option>
                                <option value="BOTH">BOTH</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-form buttonForm" style="width: 8% !important">
                        <button type="button" class="btn" onclick="searchCourse()">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="upcoming-courses">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="courses-view" id="courses-view">
                    <ul>
                    <?php if (is_array($eloca)):
                    $ctn = 1;
                    foreach ($eloca as $i) { ?>
                        <li>
                            <div class="list-box">
                                <figure><img src="<?php echo base_url() ?>uploads/courseimage/<?php echo $i->course_image ?>" alt=""></figure>
                                <div class="all-content">
                                    <div class="hd-bt clearfix">
                                        <h3><?php echo $i->course_name; ?></h3>
                                    </div>
                                    <div class="price-view">
                                        <span style="margin-left: 5px;">Price $<?php echo $i->price; ?></span>
                                        <span class="name-bt" style="margin-right: 5px;">
                                        <?php
                                        $queryallcat = $this->db->query("SELECT * FROM sm_category WHERE category_id = '".$i->course_category."'")->row();
                                        echo $category_name = $queryallcat->category_name;
                                        ?>
                                        </span>
                                    </div>
                                    <div class="contentView">
                                        <p><?php echo date('jS M `y', strtotime($i->course_startDate)); ?> to <?php echo date('jS M `y', strtotime($i->course_endDate)); ?></p>
                                    </div>
                                    <div class="both-bt">
                                        <a href="http://localhost/narrateme/course-module/courses/upcomingcoursedetails/<?php echo $i->course_id; ?>" class="button-default orange">Course Details</a>
                                        <a href="<?= base_url(); ?>courses/payment" class="button-default orange">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php $ctn++; }
                    endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="other-courses">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="courses-view-other">
                    <ul>
                    <?php if (is_array($coming)):
                    $cts = 1;
                    foreach ($coming as $i) { ?>
                        <li>
                            <div class="list-box-courses">
                                <figure><img src="<?php echo base_url() ?>uploads/courseimage/<?php echo $i->course_image ?>" alt=""></figure>
                                <div class="all-content">
                                    <div class="hd-bt clearfix">
                                        <h3><?php echo $i->course_name; ?></h3>
                                    </div>
                                    <div class="price-view">
                                        <span style="margin-left: 5px;">Price $<?php echo $i->price; ?></span>
                                        <span class="name-bt" style="margin-right: 5px;">
                                        <?php
                                        $queryallcat = $this->db->query("SELECT * FROM sm_category WHERE category_id = '".$i->course_category."'")->row();
                                        echo $category_name = $queryallcat->category_name;
                                        ?>
                                        </span>
                                    </div>
                                    <div class="contentView">
                                        <p><?php echo date('jS M `y', strtotime($i->course_startDate)); ?> to <?php echo date('jS M `y', strtotime($i->course_endDate)); ?></p>
                                    </div>
                                    <div class="both-bt">
                                        <a href="<?= base_url(); ?>courses/comingsooncoursedetails/<?php echo $i->course_id; ?>" class="button-default orange">Course Detail </a>
                                        <a href="#" class="button-default orange">Register Your Interest </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php $cts++; }
                    endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="couldnt-find-course">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="formcourse">
                    <div class="form-heading">
                        <h3>Couldn't find your course?</h3>
                        <p>Drop us few lines about the course that you like, and we would do the rest: </p>
                    </div>
                    <div class="wrapper-form">
                        <div class="gform_wrapper">
                            <form id="rreqFrom">
                                <div class="gform_body">
                                    <ul class="gform_fields">
                                        <li class="gfield">
                                            <label class="gfield_label" for="">Name <span style="color: red;">*</span></label>
                                            <div class="ginput_container_text">
                                                <input name="users_name" id="users_name" type="text" value="" class="medium" placeholder="Name" required>
                                            </div>
                                            <div class="users_name_err" style="color: red;">This field is required</div>
                                        </li>
                                        <li class="gfield">
                                            <label class="gfield_label" for="">Email <span style="color: red;">*</span></label>
                                            <div class="ginput_container ginput_container_text">
                                                <input name="users_email" id="users_email" type="email" value="" class="medium" placeholder="Email" required>
                                            </div>
                                            <div class="users_email_err" style="color: red;">This field is required</div>
                                        </li>
                                        <li class="gfield">
                                            <label class="gfield_label" for="">Telephone Number <span style="color: red;">*</span></label>
                                            <div class="ginput_container ginput_container_email">
                                                <input name="users_phno" id="users_phno" type="text" value="" class="medium" placeholder="Telephone Number" required maxlength="10">
                                            </div>
                                            <div class="users_phno_err" style="color: red;">This field is required</div>
                                        </li>
                                        <li class="gfield">
                                            <label class="gfield_label" for="">Message</label>
                                            <div class="ginput_container ginput_container_textarea">
                                                <textarea name="users_msg" id="users_msg" class="textarea medium" placeholder="Message"></textarea>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="gform_footer top_label">
                                    <input type="button" class="gform_button button" value="Submit" onclick="submitForm()">
                                </div>
                                <div>&nbsp</div>
                                <div class="success_message" style="color: #ffffff"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    //called when key is pressed in textbox
    $("#users_phno").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $(".users_phno_err").html("Digits Only").show().fadeOut("slow");
            return false;
        }
    });
});
function searchCourse() {
    var categoryshow = $('#categoryshow').val();
    var courseshow = $('#courseshow').val();
    var levelshow = $('#levelshow').val();
    var typeshow = $('#typeshow').val();
    var certificateshow = $('#certificateshow').val();
    $.ajax({
        url: "<?php echo base_url()?>courses/searchCourse",
        method:"POST",
        data : {categoryshow: categoryshow, courseshow: courseshow,levelshow: levelshow, typeshow: typeshow, certificateshow: certificateshow},
        beforeSend:function(){},
        success:function(returndata) {
            $("#courses-view ul").html(returndata);
        }
    })
}

function submitForm() {
    var users_name = $('#users_name').val();
    var users_email = $('#users_email').val();
    var users_phno = $('#users_phno').val();
    var users_msg = $('#users_msg').val();
    var pattern_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (users_name == "" ) {
        $("#users_name").fadeIn().html("Required").css("border","2px solid red");
        $(".users_name_err").show()
        setTimeout(function() {
            $("#users_name").removeAttr("style");
            $(".users_name_err").hide()
        },2000);
        $("#users_name").focus();
        return false;
    } else if(users_email == "") {
        $("#users_email").fadeIn().html("Required").css("border","2px solid red");
        $(".users_email_err").show()
        setTimeout(function() {
            $("#users_email").removeAttr("style");
            $(".users_email_err").hide()
        },2000);
        $("#users_email").focus();
        return false;
    } else if(users_phno == "") {
        $("#users_phno").fadeIn().html("Required").css("border","2px solid red");
        $(".users_phno_err").show()
        setTimeout(function() {
            $("#users_phno").removeAttr("style");
            $(".users_phno_err").hide()
        },2000);
        $("#users_phno").focus();
        return false;
    } else {
        if(!pattern_email.test(users_email)) {
            $("#users_email").fadeIn().css("border","2px solid red");
            $(".users_email_err").fadeIn().html("Please enter valid email");
            setTimeout(function() {
                $("#users_phno").removeAttr("style");
                $(".users_email_err").hide()
            },5000)
            $(".users_email").focus();
            return false;
        } else {
            $.ajax({
                type : 'post',
                data : {
                    'users_name' : users_name,
                    'users_email' : users_email,
                    'users_phno' : users_phno,
                    'users_msg' : users_msg
                },
                url: "<?php echo base_url() ?>courses/sendMessage",
                success: function(data){
                    if(data) {
                        $(".success_message").fadeIn().html(data);
                        $("#rreqFrom")[0].reset();
                        setTimeout(function() {
                            $(".success_message").fadeIn().html('');
                        },5000)
                    }
                }
            });
        }
    }
}
</script>
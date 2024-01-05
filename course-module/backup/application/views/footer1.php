        <?php 
			//================settings fetch=====================
			$action4='get';
			$data4='';
			$tablename4='sm_settings';
			$fieldname4 = 'id';				
			$id4 = '1';
			$query = $this->generalmodel->show_data_id($tablename4,$id4,$fieldname4,$action4,$data4);
			//echo $this->db->last_query(); exit();
			$data['settings'] = $query;
			//================settings fetch===================== 
		?>
        	<div class="footer_big_col">
            	<div class="container">
                	<div class="row">
                    	<div class="footer_panel">
                        	<div class="col-sm-3">
                            	<div class="logos">
                                	<ul>
                                    	<li><img src="<?=base_url();?>user_panel/images/footer-01.jpg" alt="logo-1"></li>
                                        
                                        <li><img src="<?=base_url();?>user_panel/images/footer-03.jpg" alt="logo-1"></li>
                                        <li><img src="<?=base_url();?>user_panel/images/footer-02.jpg" alt="logo-1"></li>
                                        <li><img src="<?=base_url();?>user_panel/images/footer-04.jpg" alt="logo-1"></li>
                                        <li><img src="<?=base_url();?>user_panel/images/footer-05.jpg" alt="logo-1"></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-9">
                            	<div class="footer_right">
                                	<!-- footer Top Nav-->
                                    	<div class="footer_top_part">
                                        	<div class="col-sm-4">
                                            	<h2>Services</h2>
                                                <ul>
                                                    <li><a href="<?=base_url();?>about/student">Student Support</a></li>
                                                    <li><a href="<?=base_url();?>about/business">Corporate training</a></li>
                                                    <li><a href="#">Private Teaching</a></li>
                                                    <li><a href="#">CPD Accredited Courses</a></li>
                                                    <li><a href="#">Working Opportunities</a></li>
                                                </ul>
                                          </div>
                                            <div class="col-sm-4">
                                            	<h2>Help &amp; Information</h2>
                                                <ul>
                                                    <li><a href="<?=base_url();?>terms">Terms &amp; Conditions</a></li>
                                                    <li><a href="<?=base_url();?>privacy">Privacy Policy</a></li>
                                                    <li><a href="<?=base_url();?>equalopportunitypolicy">Equal Opportunity Policy</a></li>
                                                    <li><a href="<?=base_url();?>coursedeliverypolicy">Course Delivery Policy</a></li>
                                                    <li><a href="<?=base_url();?>refundandcancellationpolicy">Refund and Cancellation Policy</a></li>
                                                </ul>
                                          </div>
                                          <?php if (is_array(@$settings)){ foreach(@$settings as $s){?>
                                            <div class="col-sm-4">
                                            	<h2>Contact Us</h2>
                                                <div class="address_book">
                                                	<div class="col-sm-2">
                                                    	<i class="fa fa-map-marker" aria-hidden="true"></i>

                                                    </div>
                                                    <div class="col-sm-10">
                                                    	<h3>Address</h3>
                                                        <p><?=$s->address;?></p>
                                                    </div>
                                                </div>
                                                <div class="address_book email">
                                                	<div class="col-sm-2">
                                                    	<i class="fa fa-envelope" aria-hidden="true"></i>

                                                    </div>
                                                    <div class="col-sm-10">
                                                    	<h3>Email us</h3>
                                                        <p><?=$s->email;?></p>
                                                    </div>
                                                </div>
                                                <div class="address_book">
                                                	<div class="col-sm-2">
                                                    	<i class="fa fa-phone" aria-hidden="true"></i>

                                                    </div>
                                                    <div class="col-sm-10">
                                                    	<h3>Call us</h3>
                                                        <p><?=$s->phone;?></p>
                                                    </div>
                                                </div>

                                            </div>
                                           
                                        </div>
                                    <!-- footer Top End Nav-->
                                    
                                    <!-- Footer Bottom Here-->
                                    	<div class="footer_end">
                                        	<div class="col-sm-8">
                                            	<h2 class="accecpted">We Accept</h2>
                                            <img src="<?=base_url();?>user_panel/images/visa.png" alt="visa"> </div>
                                            <div class="col-sm-4">
                                            	<h2>Follow Us:</h2>
                                                	<ul class="social_icon">
                                                    	<li><a href="<?=$s->facebook_link;?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?=$s->twitter_link;?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?=$s->googleplus_link;?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?=$s->pinterest_link;?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?=$s->linkedin_link;?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    </ul>
                                            </div>
                                            <?php } }?>
                                        </div>
                                    <!-- Footer Bottom End Here-->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        <!-- Footer Panel Design End Here-->
        
        <!-- designer and development section-->
        	<div class="design_copy_col">
            	<div class="container">
                	<div class="row">
                    	<div class="col-sm-6"><p>Copyright © <?=date('Y')?> Open Educational Systems Limited</p></div>
                        <div class="col-sm-6">
                        <p class="design">Designed and Developed by <a href="http://www.goigi.com/" target="_blank">GOIGI.COM</a></p></div> 
                    </div>
                </div>
            </div>
        <!-- designer and development section End Here-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url();?>user_panel/js/jquery.js"></script>
    <script src="<?=base_url();?>user_panel/js/jquery.min.js"></script>
    <script src="<?=base_url();?>user_panel/js/jquery.bxslider.js"></script>
    <script src="<?=base_url();?>user_panel/js/jquery.datetimepicker.full.js"></script>
    
    <script>
	$(document).ready(function(){
    $(".under10y").click(function(){
		$(".if-eighten-years").toggle();
	});
	});
	</script>
    
    <script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015-04-15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
format:'d-m-Y H:i',
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});


$('#datetimepicker19').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker19').datetimepicker({value:'2015/04/15 05:03',step:10});


$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('#datetimepicker2').datetimepicker({
	format:'d-m-Y',
	timepicker:false,
	formatDate:'d-m-Y',
    
	minDate:'2016/11/03', // yesterday is minimum date
});
$('#datetimepicker99').datetimepicker({
	format:'d-m-Y',
	timepicker:false,
	formatDate:'d-m-Y',
	 
});
$('#datetimepicker100').datetimepicker({
    format:'d-m-Y',
    timepicker:false,
    formatDate:'d-m-Y',
     
});
$('#datetimepicker3').datetimepicker({
	inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:false,
	allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
	step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if (currentDateTime && currentDateTime.getDay() == 6){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date')
			.toggleClass('xdsoft_disabled');
	},
	minDate:'-1970/01/2',
	maxDate:'+1970/01/2',
	timepicker:false
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}

		return [true, ""];
	}
});
$('#datetimepicker12').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [true, "custom-date-style"];
		}

		return [true, ""];
	}
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?=base_url();?>user_panel/js/owl.carousel.js"></script>
    <script src="<?=base_url();?>user_panel/js/bootstrap.min.js"></script>
    <script type="text/javascript">
		$('.bxslider').bxSlider({
			auto: true,
			autoControls: true
		});
    </script>
    <script>
	$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        320:{
            items:1
        },
        767:{
            items:1
        },
        1000:{
            items:1
        }
    }
});

   jQuery('.owl-carousel2').owlCarousel({
        loop:true,
        margin:5,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                nav:true
            },
            480:{
                items:2,
                nav:true
            },
            768:{
                items:3,
                nav:false
            },
            1000:{
                items:4,
                nav:true,
                loop:true
            }
        }
    });
    </script>
    
    <script type="text/javascript">
		$('.bxslider').bxSlider({
			auto: true,
			autoControls: true
		});
    </script>
    <script>
        $(function(){
    $('.whatever1').click(function(){
        $('.whatever1.active').removeClass('active');
        $(this).addClass('active');
    });
});
        </script>
<script>
    $(document).on('change', '.regular-checkbox', function(event) {
        var totalHours = 0;
        $('.regular-checkbox:checked').each(function(index, el) {
            var cbId = $(this).attr('id');
            var startTime = $('#start-time'+cbId).text();
            var endTime = $('#end-time'+cbId).text();
            var diff = ( new Date("1970-1-1 " + endTime) - new Date("1970-1-1 " + startTime) )/(1000*60*60);
            totalHours = totalHours + diff;
        });
        var cprice = parseFloat($('#course-price').text());
        totalHours = (totalHours * 25);
        var totalPrice = (parseFloat(totalHours) + cprice);
        $('#total-price').text(totalPrice.toFixed(2));
    });
</script>
<script>
 $(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
 
});

  
</script>
<script>
    function numbersonly(e) {
        var unicode = e.charCode ? e.charCode : e.keyCode
        if (unicode != 8 && unicode != 46 && unicode != 37 && unicode != 27 && unicode != 38 && unicode != 39 && unicode != 40 && unicode != 9) {
            if (unicode < 48 || unicode > 57)
                return false
        }
    }
</script>
  </body>
</html>
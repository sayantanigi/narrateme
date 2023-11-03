<div id="wb_LayoutGrid7">
	<div id="LayoutGrid7">
		<div class="row">
			<div class="col-1">
				<div id="wb_Text12"> <span class="foo-text">© Copyright <?php echo date("Y"); ?>. All Right Researved.</span></div>
			</div>
			<div class="col-2">
				<div id="wb_Text13"> <span class="foo-text">Designed &amp; Developed By <a href="http://www.goigi.com/" class="igi-link">GOIGI.COM</a></span> </div>
			</div>
		</div>
	</div>
</div>
<form name="Layer1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="Login-area" class="modal fade" role="dialog" onsubmit="return Submit()">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<!-- Modal Close Button -->
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="fa fa-times-circle" aria-hidden="true"></i>
				</button>
				<!-- User Image -->
				<div id="wb_FontAwesomeIcon1">
					<div id="FontAwesomeIcon1"><i class="fa fa-user"></i></div>
				</div>
				<!-- Login Text -->
				<div id="wb_Text1">
					<span class="Item-Head_dark">Login to Your Account</span><br />
					<span class="Item-Head_dark" id="lg2" style="color:#F00;font-size: 15px;">
						<?php if (@$_REQUEST['op'] == "logfals") {
							echo "Invalid Username Or Password";
						} ?>
					</span>
					<span class="Item-Head_dark" id="errorBoxusr" style="color:#F00;font-size: 15px;"></span> <br />
				</div>
				<!-- Input Field -->
				<input type="text" id="userfild" name="user" value="" placeholder="User Name" style="margin-bottom: 15px;">
				<input type="password" id="passfild" name="pass" value="" placeholder="Password" style="margin-bottom: 15px;">
				<!-- Button -->
				<input type="submit" id="login-butt" name="login" value="LOGIN" class="Buttn" style="margin: 10px 0;">
				<label id="errorBoxpass"></label>
				<div id="wb_Text2">
					<span class="Item-Head_dark">OR</span>
					<div>
						<span class="top-text"><a href="register.php"> Register / Sign Up</a></span>
						<span class="top-text"> <a id="fgpas" href="forgetpassword.php">Forget Password</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<a class="link-foo-ha" id="myLink"></a>
<style>
	#errorBoxusr {
		color: #F00;
	}

	#errorBoxpass {
		color: #F00;
	}
</style>
<script src="dashboard/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/wb.parallax.min.js"></script>
<script src="js/transition.min.js"></script>
<script src="js/carousel.min.js"></script>
<script src="js/wb.panel.min.js"></script>
<script src="js/scrollspy.min.js"></script>
<script src="js/modal.min.js"></script>
<script src="./searchindex.js"></script>
<script src="js/wwb11.min.js"></script>
<script src="js/index.js"></script>
<?php if (@$_REQUEST['op'] == "logfals") { ?>
	<script>
		$(document).ready(function() {
			$("#myLink").click(function() {
				//$("#Login-area").show();
				$('#Login-area').modal('show');
			});
			$('#myLink').trigger('click');
		});
	</script>
<?php } ?>
<script>
	function Submit() {
		if ($("#userfild").val() == "") {
			$("#userfild").focus();
			$("#errorBoxusr").html("Please Enter Username");
			$("#lg2").hide();
			return false;
		} else {
			$("#errorBoxusr").html("");
			$("#lg2").hide();
			return true;
		}

		if ($("#passfild").val() == "") {
			$("#passfild").focus();
			$("#errorBoxpass").html("Please Enter Password");
			return false;
		} else {
			$("#errorBoxusr").html("Please Enter Username");
			return true;
		}
	}
</script>
<!-- Owl Carousel -->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
<script src="https://cdn.tailwindcss.com"></script>

<script>
	$(document).ready(() => {
		$(".owl-carousel.banner-carousel").owlCarousel({
			items: 1,
			loop: true,
			autoplay: true,
			autoplayTimeout: 5000,
			smartSpeed: 2000,
			autoplayHoverPause: false,
		});

		$(".owl-carousel.banner-carousel").mousedown(() => {
			gsap.fromTo(
				cursorVerticalGrab, {
					css: {
						transform: "scale(0, 0)"
					}
				}, {
					duration: 0.6,
					ease: "back.out(1.7)",
					css: {
						transform: "scale(1, 1)"
					}
				}
			);
		});
	});
</script>
<script>
	$(document).ready(() => {
		$(".owl-carousel.Product-carousel").owlCarousel({
			items: 3,
			loop: true,
			autoplay: true,
			autoplayTimeout: 5000,
			smartSpeed: 2000,
			autoplayHoverPause: false,
			startPosition: 'URLHash',
			margin: 25,
		});

		$(".owl-carousel.Product-carousel").mousedown(() => {
			gsap.fromTo(
				cursorVerticalGrab, {
					css: {
						transform: "scale(0, 0)"
					}
				}, {
					duration: 0.6,
					ease: "back.out(1.7)",
					css: {
						transform: "scale(1, 1)"
					}
				}
			);
		});
	});
</script>
<script>
	document.addEventListener('alpine:init', () => {
		Alpine.data('slider', () => ({
			active: 0,
			autorotate: true,
			autorotateTiming: 7000,
			testimonials: [{
					img: 'images/User-1.jpg',
					quote: "It was just task after task in Jira. Every week we completed a ton of tasks, but in the end, the project still felt incomplete. Trying to figure out what was missing by scrolling an infinite chat room was a fun way to reinvent the treasure hunt, but not a so nice way to manage a project.",
					name: 'Nevine Acotanza',
					role: 'CEO'
				},
				{
					img: 'images/User-2.jpg',
					quote: "Because the platform we used previously was so cumbersome and time-intensive to maintain, we used to have a person dedicated almost exclusively to managing the marketing production workflow for our three brands. Now I spend about an hour a month setting things up, and the process manages itself.",
					name: 'Alessia Caravaggio',
					role: 'CEO'
				},
				{
					img: 'images/User-3.jpg',
					quote: "I’ve tried a million things with clients. I work really closely with them, and finding something clients will use to collaborate with me is difficult. My clients just “get” NarrateMe, right away, and use it all the time. They like that they can use it via email. They also love that it has everything they need in one area. It’s fantastic.",
					name: 'Cassidee Cavazos',
					role: 'CEO'
				},
			],
			init() {
				if (this.autorotate) {
					this.autorotateInterval = setInterval(() => {
						this.active = this.active + 1 === this.testimonials.length ? 0 : this.active + 1
					}, this.autorotateTiming)
				}
				this.$watch('active', callback => this.heightFix())
			},
			stopAutorotate() {
				clearInterval(this.autorotateInterval)
				this.autorotateInterval = null
			},
			heightFix() {
				this.$nextTick(() => {
					this.$refs.testimonials.style.height = this.$refs.testimonials.children[this.active + 1].offsetHeight + 'px'
				})
			}
		}))
	})
</script>
<script src='https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js'></script>
</body>

</html>
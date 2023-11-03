<?php
include "lib/headercms.php";
if (@$_REQUEST['contactSubmit'] == "SUBMIT") {
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$subject = $_REQUEST['subject'];
	$message = addslashes($_REQUEST['message']);
	$SendMsgSql = "insert into na_user_contact set ContactName ='" . $name . "', Subject ='" . $subject . "', Email ='" . $email . "', Message='" . $message . "', ContactDate=NOW()";
	if (mysql_query($SendMsgSql)) {
		$BidSql = "SELECT * FROM na_admin_mail WHERE MailId = '1'";
		$BidSqlQuery = mysql_query($BidSql) or mysql_error();
		$BidFetch = mysql_fetch_array($BidSqlQuery);
		$to = $BidFetch['MailAddress'];
		$sendingdate = date("Y-m-d");
		$sendingdate = date('F d ,  Y', strtotime($sendingdate));
		$subject = "New Contact Message is received from $email";
		$message = "<table width='790px' border='0' cellspacing='2' cellpadding='2' style='font-family:Arial; font-size:15px; color:#000000; border:1px solid #47b9d4'><tr><td colspan='3'><img src='$siteimg/Logo.png' border='0'></td></tr><tr><td colspan='3'>&nbsp;</td></tr><tr><td colspan='3'><strong>Contact Detail : </strong></td></tr><tr><td colspan='2'>&nbsp;</td><td width='611'>&nbsp;</td></tr><tr><td width='144'><b>Contact Name</b></td><td width='13'>*</td><td>$name</td></tr><tr><td><b>Message</b></td><td>*</td><td>$message </td></tr><tr><td><b>Date</b></td><td>*</td><td>$sendingdate</td></tr><tr><td colspan='3'>&nbsp;</td></tr><tr><td colspan='3'>Narrate Me</td></tr></table>";
		$headers  = "MIME-Version: 1.0\r\n";
		$headers = "From: Contact " . $email . " \n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		mail($to, $subject, $message, $headers);
		$headers2  = "MIME-Version: 1.0\r\n";
		$headers2 = "From: Contact info@narrateme.com \n";
		$headers2 .= "Content-type: text/html; charset=iso-8859-1\r\n";
		mail($email, $subject, $message, $headers2);
		//$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$_SESSION['msg'] = "Thanks for your concern. We will get back to you soon!!";
		header("Location:contact.php?id=5&sent=successful");
		exit();
	} else {
		//$_SESSION['msg']="Message Not Sent,Try Again!!";
		header("Location:contact.php?id=5&sent=unsuccessful");
		exit();
	}
}
?>
<section class="body_content" style="padding: 0;">
	<div class="page_header">
		<div class="over_bg"></div>
		<div class="block-header text-center">
			<?php $id = $_GET['id'];
			$FetchUserSqlh = "SELECT * FROM `na_cms` WHERE id = '" . $id . "'";
			$FetchUserQueryh = mysqli_query($con, $FetchUserSqlh);
			$rowdesth = mysqli_fetch_array($FetchUserQueryh); ?>
			<h2><?= substr(stripslashes($rowdesth['cms_pagetitle']), 0, 100) ?></h2>
			<p>
				In hendrerit, sem sit amet blandit imperdiet, leo lacus tincidunt lorem, vel mollis lorem orci a lacus. Nullam at metus efficitur, venenatis diam nec, finibus dolor. Nullam euismod luctus mi. Integer dictum lacus et efficitur convallis.
			</p>
		</div>
	</div>
	<div class="inner_content">
		<div class="" id="page-1">
			<div class="Product_Body">
				<?php if (isset($_SESSION['msg'])) { ?>
					<p style="color:#D18C13; font-size:12px; text-align:justify; margin-left:0px; margin-top:0px;"><?= $_SESSION['msg'] ?></p>
				<?php unset($_SESSION['msg']);
				}   ?>
				<div class="map_section">
					<div class="row">
						<div class="col-lg-12">
							<?= stripslashes($rowdesth['cmsmap']) ?>
							<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26361123.797073178!2d-113.75288902170207!3d36.24166513668548!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1467018055728" frameborder="0" style="border:0; width:100%; min-height:500px" allowfullscreen></iframe>-->
						</div>
					</div>
				</div>
				<div class="row contact-form">
					<div class="col-md-8">
						<form name="contactform" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return contact();">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group fg-line" style="margin-bottom:0;">
										<label>Name</label>
										<input type="text" placeholder="Enter Name" id="name" name="name" class="form-control input-sm">
									</div>
									<span id="name_error" style="color:#ff0000;">&nbsp;</span>
									<div class="form-group fg-line" style="margin-bottom:0; margin-top: 15px;">
										<label>Email</label>
										<input type="email" placeholder="Enter Email" id="email" name="email" class="form-control input-sm">
									</div>
									<span id="email_error" style="color:#ff0000;">&nbsp;</span>
									<div class="form-group fg-line" style="margin-bottom:0; margin-top: 15px;">
										<label>Subject</label>
										<input type="text" placeholder="Enter Subject" id="subject" name="subject" class="form-control input-sm">
									</div>
									<span id="subject_error" style="color:#ff0000;">&nbsp;</span>
								</div>
								<div class="col-md-6">
									<div class="form-group fg-line" style="margin-bottom:0;">
										<label for="name"> Message</label>
										<textarea name="message" id="message" class="form-control" rows="11" cols="25" placeholder="Enter Message"></textarea>
									</div>
									<span id="message_error" style="color:#ff0000;">&nbsp;</span>
								</div>
								<div class="col-md-12">
									<button type="submit" class="btn btn-primary pull-right" name="contactSubmit" value="SUBMIT" id="btnContactUs"> Send Message</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-4 Contact-Data"><?= $rowdesth['cms_pagedes'] ?></div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	function contact() {
		var name = document.getElementById("name").value;
		var email = document.getElementById("email").value;
		var subject = document.getElementById("subject").value;
		var message = document.getElementById("message").value;
		if (name == '') {
			document.getElementById("name_error").innerHTML = "Please Enter Your Name";
			document.getElementById("name").focus();
			return false;
		} else {
			document.getElementById("name_error").innerHTML = "";
		}
		if (email == '') {
			document.getElementById("email_error").innerHTML = "Please Enter Your Email";
			document.getElementById("email").focus();
			return false;
		} else {
			document.getElementById("email_error").innerHTML = "";
		}

		if (subject == '') {
			document.getElementById("subject_error").innerHTML = "Please Enter Subject";
			document.getElementById("subject").focus();
			return false;
		} else {
			document.getElementById("subject_error").innerHTML = "";
		}
		if (message == '') {
			document.getElementById("message_error").innerHTML = "Please Enter Message";
			document.getElementById("message").focus();
			return false;
		} else {
			document.getElementById("message_error").innerHTML = "";
		}
	}
</script>
<?php include "lib/footercms.php"; ?>

<style>
	.contact-form {
		background: #fff;
		padding: 25px;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
		border-radius: 0 0 10px 10px;
		margin: 0;
	}

	.map_section {
		height: 500px;
	}

	.contact-form .btn.btn-primary {
		box-shadow: none;
		height: 40px;
		border-radius: 50px;
		padding: 0 20px;
		background: #576042;
	}

	.Contact-Data h2 {
		font-style: normal;
		text-transform: uppercase;
		margin-bottom: 15px;
		font-size: 20px;
		display: block;
		margin-top: 0;
	}

	.Contact-Data p {
		font-size: 15px;
		margin-bottom: 5px;
		font-weight: 500;
	}

	.Contact-Data p:nth-child(3) {
		color: #000;
	}

	.Contact-Data p a {
		color: #576042;
	}
</style>
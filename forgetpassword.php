<?php
include('lib/header_inner.php');
// if ($_REQUEST['forpass'] == "Submit") {
// 	$email = $_REQUEST['email'];
// 	$chkemail = "SELECT * FROM `na_member` WHERE email='" . $_REQUEST['email'] . "'";
// 	$qryemail = mysql_query($chkemail);
// 	$numrows = mysql_num_rows($qryemail);
// 	$fetcharray = mysql_fetch_array($qryemail);
// 	if ($numrows > 0) {

// 		$BidSql = "SELECT * FROM na_admin_mail WHERE MailId = '1'";
// 		$BidSqlQuery = mysql_query($BidSql) or mysql_error();
// 		$BidFetch = mysql_fetch_array($BidSqlQuery);

// 		$to = $BidFetch['MailAddress'];

// 		$uname = $fetcharray['username'];
// 		$password = base64_decode($fetcharray['password']);

// 		$sendingdate = date("Y-m-d");
// 		$sendingdate = date('F d ,  Y', strtotime($sendingdate));

// 		$subject = "Password Of Your NarrateMe Account";

// 		$message = "<table width='790px' border='0' cellspacing='2' cellpadding='2' style='font-family:Arial; font-size:15px; color:#000000; border:1px solid #47b9d4'>
// 			<tr>
// 			<td colspan='3'><img src='$siteimg/Logo.png' border='0'></td>
// 			</tr>
// 			<tr>
// 			<td colspan='3'>&nbsp;</td>
// 			</tr>
// 			<tr>
// 			<td colspan='3'><strong>Password : </strong></td>
// 			</tr>
// 			<tr>
// 			<td colspan='2'>&nbsp;</td>
// 			<td width='611'>&nbsp;</td>
// 			</tr>
// 			<tr>
// 			<td width='144'><b>User Name</b></td>
// 			<td width='13'>*</td>
// 			<td>$uname</td>
// 			</tr>
// 			<tr>
// 			<td><b>Password</b></td>
// 			<td>*</td>
// 			<td>$password </td>
// 			</tr>
// 			<tr>
// 			<td colspan='3'>Narrate Me</td>
// 			</tr>
// 			</table>
// 			";

// 		$headers  = "MIME-Version: 1.0\r\n";
// 		$headers = "From: Contact " . $email . " \n";
// 		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
// 		mail($to, $subject, $message, $headers);

// 		$headers2  = "MIME-Version: 1.0\r\n";
// 		$headers2 = "From: Contact info@narrateme.com \n";
// 		$headers2 .= "Content-type: text/html; charset=iso-8859-1\r\n";
// 		mail($email, $subject, $message, $headers2);

// 		//$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
// 		$_SESSION['msg'] = "Please Check Your Registered Email For The Password!!";
// 		header("Location:forgetpassword.php?sent=successful");
// 		exit();
// 	} else {
// 		$_SESSION['msg1'] = "Invalid Email!!";
// 		header("Location:forgetpassword.php?sent=unsuccessful");
// 		exit();
// 	}
// }
?>
<section class="body_content" style="padding: 0;">
	<div class="page_header">
		<div class="over_bg"></div>
		<div class="block-header text-center">
			<h2>Forget Password</h2>
			<p>
				In hendrerit, sem sit amet blandit imperdiet, leo lacus tincidunt lorem, vel mollis lorem orci a lacus. Nullam at metus efficitur, venenatis diam nec, finibus dolor. Nullam euismod luctus mi. Integer dictum lacus et efficitur convallis.
			</p>
		</div>
	</div>
	<div class="inner_content">
		<div class="Product_Body">
			<div class="card">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" onSubmit="return Submitpasscheck()">
					<div class="row">
						<div class="col-sm-12">
							<?php
							if (isset($_SESSION['msg'])) {
							?>
								<b style="color:#D18C13; font-size:12px; text-align:justify; margin-top:50px;"><?= $_SESSION['msg'] ?></b>
							<?php unset($_SESSION['msg']);
							} ?>

							<?php
							if (isset($_SESSION['msg1'])) {
							?>
								<b style="color:#D18C13; font-size:12px; text-align:justify; margin-top:50px;"><?= $_SESSION['msg1'] ?></b>
							<?php unset($_SESSION['msg1']);
							} ?>
							<div class="form-group fg-line">
								<label>Please Enter Your Registered Email Here</label>
								<input placeholder="" id="emailid" name="email" class="form-control input-sm">
							</div>
							<div id="erroemail"></div>
							<div id="errorBox2"></div>
							<button class="submit_btn btn btn-primary m-t-10 waves-effect" name="forpass" value="Submit" type="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script>
	function Submitpasscheck() {
		var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
		var formemail = $("#emailid").val();
		if ($("#emailid").val() == "") {
			$("#emailid").focus();
			$("#erroemail").html("Please Enter Email");
			return false;
		} else if (!emailRegex.test(formemail)) {
			$("#emailid").focus();
			$("#erroemail").html("Please Enter Valid Email");
			return false;
		}

	}
</script>
<style>
	#erroemail {
		color: #F00;
	}

	#errorBox2 {
		color: #F00;
	}

	.card {
		margin-top: 0;
		padding: 25px;
		line-height: 1.5em;
		margin-bottom: 0;
		box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
		border-radius: 10px;
		width: 800px;
	}

	.fg-line label {
		font-size: 20px;
		font-size: 400;
		color: #000;
	}

	.submit_btn {
		box-shadow: none;
		height: 40px;
		border-radius: 50px;
		padding: 0 20px;
		background: #576042;
	}

	.Product_Body {
		display: flex;
		align-items: center;
		justify-content: center;
	}
</style>
<?php
include('lib/footer.php');
?>
<?php 
	include('lib/inner_header.php');
	sequre();
	$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
	$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");
if(isset($_REQUEST['updatepass'])){
	    $password=base64_encode(mysql_real_escape_string($_REQUEST['new_pass']));
		$data = array('password'=>$password);
		$result=updateData($data,'na_member', " id='" . $_SESSION["userid"] . "' ") ;
		$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");
		$fnamelname=$viewmember['first_name']." ".$viewmember['last_name'];
		$newpassword=$_REQUEST['new_pass'];
		if($result){
			//======================Email Sending====================
		
			$BidSql = "SELECT * FROM na_admin_mail WHERE MailId = '1'";
			$BidSqlQuery = mysql_query($BidSql) or mysql_error();
			$BidFetch = mysql_fetch_array($BidSqlQuery);
			
			$from = $BidFetch['MailAddress'];
			$to=$viewmember['email'];
			$sendingdate=date("Y-m-d");
			$sendingdate=date('F d ,  Y',strtotime($sendingdate));
			
			$subject="Narrate Me Change Password";
			
			$message="<table width='790px' border='0' cellspacing='2' cellpadding='2' style='font-family:Arial; font-size:15px; color:#000000;>
			<tr>
			<td colspan='3'><img src='$siteimg/Logo.png' border='0'></td>
			</tr>
			<tr>
			<td colspan='3'>&nbsp;</td>
			</tr>
			<tr>
			<td colspan='3'><strong>Your Password Change Succussfully</strong></td>
			</tr>
			<tr>
			<td colspan='2'>&nbsp;</td>
			<td width='611'>&nbsp;</td>
			</tr>
			<tr>
			<td colspan='3'>Your New Details </td>
			</tr>
			<tr>
			<td width='144'><b>Contact Name</b></td>
			<td width='13'>*</td>
			<td>$fnamelname</td>
			</tr>
			<tr>
			<td><b>Your New Password</b></td>
			<td>*</td>
			<td>$newpassword</td>
			</tr>
			<tr>
			<td colspan='3'>&nbsp;</td>
			</tr>
			<tr>
			<td colspan='3'>Narrate Me</td>
			</tr>
			</table>
			";
			
			$headers  = "MIME-Version: 1.0\r\n";			
			$headers = "From: Contact ".$BidFetch['MailAddress']." \n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			mail($to, $subject, $message, $headers);
			
			//$headers2  = "MIME-Version: 1.0\r\n";			
			//$headers2 = "From: Contact info@narrateme.com \n";
			//$headers2 .= "Content-type: text/html; charset=iso-8859-1\r\n";
			//mail($email, $subject, $message, $headers2);
			
			//$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
			//$_SESSION['msg']="Thanks for your concern. We will get back to you soon!!";
			//header("Location:contact.php?id=5&sent=successful");
			//exit();
			
		
	//======================Email Sending====================
			
			header('location:changepassword.php?op='.session_id().'');
		}
	}
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."' ");
$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");
?>
<section id="main">
  <?php include('lib/aside.php');?>
  <section id="content">
    <div class="container">
      <div class="block-header">
        <h2>Welcome Back <span style="color:#666; font-weight:400;"><?php echo $view['first_name']." ".$view['last_name']?></span><!--<small>Designation</small>--></h2>
      </div>
      <div id="profile-main" class="card">
      
       		<form method="post" action="" id="" onSubmit="return Submitpasscheck()">
             <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="fa fa-key"></i>Change Password</h2>
                                    
                                </div>
                                <div class="pmbb-body p-l-30">
                                	<p style="text-align:center; color:#F00;">
                                    <?php 
									//echo session_id();
									if(@$_REQUEST['op']==session_id()){
									?>
                                    Password Updated Successfully  !!
                                    <?php } ?>
                                    </p>
                                   <div class="pmbb-edit" style="display:block;">
                                    	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Old Password</dt>
                                            <dd>
                                                <div class="fg-line">
                                                	<input type="hidden" name="curpass" id="curpass" value="<?php echo base64_decode($viewmember['password'])?>" />
                                                    <input type="password" class="form-control" id="old_password" name="old_password" value="">
                                                    <label id="erroroldpass"></label>
                                                </div>
                                            </dd>
                                        </dl>
                                        
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">New Password</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="password" class="form-control" id="newpas" name="new_pass" value="" >
                                                    <label id="errornewpass"></label>
                                                </div>
                                            </dd>
                                        </dl>
                                        
                                        <dl class="dl-horizontal">
                                            <dt class="p-t-10">Confirm Password</dt>
                                            <dd>
                                                <div class="fg-line">
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" >
                                                    <label id="errorconpass"></label>

                                                </div>
                                            </dd>
                                        </dl>
                                        
                                        <div class="m-t-30">
                                            <button type="submit" class="btn btn-primary btn-sm" name="updatepass">Save</button>
                                            <button data-pmb-action="reset" class="btn btn-link btn-sm">Cancel</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
            </form>
            <script>
				function Submitpasscheck(){
					var npasswrd = $("#newpas").val();
					var conpas = $("#confirm_password").val();
					var curpass = $("#curpass").val();
					var oldpass = $("#old_password").val();
					
					if($("#old_password").val() == "" ){
						$("#old_password").focus();
						$("#erroroldpass").html("Please Enter Your Current Password !!!");
						return false;
					}else{
						$("#erroroldpass").html("");
					}
					
					if($("#newpas").val() == "" ){
						$("#newpas").focus();
						$("#errornewpass").html("Please Enter New Password !!!");
						return false;
					}else{
						$("#errornewpass").html("");
					}
					
					if(npasswrd != conpas){
						$("#confirm_password").focus();
						$("#errorconpass").html("New Password And Confirm Password Must Be Same !!!");
						return false;
					}else{
						$("#errorconpass").html("");
					}
					
					if(curpass !=oldpass){
						$("#old_password").focus();
						$("#erroroldpass").html("Current Password Not Matching !!!");
						return false;
					}else{
						$("#erroroldpass").html("");
					}
				}
           </script>  
            <style>
		   #erroroldpass{color:#F00;}
		   #errornewpass{color:#F00;}
		   #errorconpass{color:#F00;}
		   </style>
    </div> 
  </section>
</section>
<?php include('lib/inner_footer.php')?>
<?php 
include('lib/header.php');
//socialcheck();
if(isset($_REQUEST['addprofile'])){
	 $myname=$_REQUEST['myname'];
	 $description=$_REQUEST['description'];
	 $website=$_REQUEST['website'];
	 $linktopage=$_REQUEST['linktopage'];
	 $dob=date('Y-m-d',strtotime($_REQUEST['dob']));
	 $marital_status=$_REQUEST['marital_status'];
	 $social_twitter=$_REQUEST['social_twitter'];
	 $social_skype=$_REQUEST['social_skype'];
	  
	extract(mysql_real_escape_string(strip_tags(trim($_POST))));
	$srcount=checkExistance('na_social_profile'," AND user_id='".$_SESSION["userid"]."'");
	//echo $srcount;
	//exit();
	if($srcount >0){
		$response="Your Social Profile Is Already Created";
	}else{
		$data = array('user_id'=>$_SESSION["userid"],'myname'=>$myname,'marital_status'=>$marital_status,'description'=>$description,'ip_address'=>getUserIP(),'website'=>$website,'social_link'=>$linktopage,'social_twitter'=>$social_twitter,'social_skype'=>$social_skype,'add_date'=>date('Y-m-d'),'dob'=>$dob,'status'=>1);
		//print_r($data);
		//exit();
		$result = insertData($data, 'na_social_profile');
		if($result){
			header('location:profile-about.php');
		}
		
	}
}
$viewmember=getAnyTableWhereData('na_member', " AND id='".$_SESSION["userid"]."' ");
?>
<section id="main">
  <?php include('lib/aside.php');?>
  <section id="content">
    <div class="container">
      <div class="block-header">
        <h2>Social Network Profile Creation</h2>
      </div>
      <div class="card">
        <div class="card-body card-padding">
            <form method="post" action="" id="" onSubmit="return Submitdata()">
              <div class="row">
                <ul class="clist clist-check">
                  <li>Enter the following information:</li>
                  <?php if(isset($_REQUEST['addprofile'])){
					  		if($response!=''){
					?>			
                  <li><?php echo $response;?></li>
                  <?php
				  			}
				  		}
				 ?>
                </ul>
                <div class="col-sm-4">
                  <p class="c-black f-500 m-b-10">Name</p>
                  <div class="form-group">
                    <div class="fg-line">
                      <input type="text" placeholder="" class="form-control" name="myname" id="myname" value="<?php echo $viewmember['first_name']."".$viewmember['last_name']?>">
                      <label id="errormyname"></label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <p class="c-black f-500 m-b-10"> Description</p>
                  <div class="form-group">
                    <div class="fg-line">
                      <input type="text" placeholder="" class="form-control" name="description">
                    </div>
                  </div>
                </div>
                
                
              <div class="col-sm-4">
                  <p class="c-black f-500 m-b-10">Website(s)</p>
                  <div class="form-group">
                    <div class="fg-line">
                      <input type="text" placeholder="" class="form-control" name="website">
                    </div>
                  </div>
                </div>
                
               <div class="col-sm-4">
                  <p class="c-black f-500 m-b-10">Link to page</p>
                  <div class="form-group">
                    <div class="fg-line">
                      <input type="text" placeholder="" name="linktopage" class="form-control">
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-4">
                  <p class="c-black f-500 m-b-10">Twitter Link</p>
                  <div class="form-group">
                    <div class="fg-line">
                      <input type="text" placeholder="" name="social_twitter" class="form-control">
                    </div>
                  </div>
                </div>
                
                <div class="col-sm-4">
                  <p class="c-black f-500 m-b-10">Skype Link</p>
                  <div class="form-group">
                    <div class="fg-line">
                      <input type="text" placeholder="" name="social_skype" class="form-control">
                    </div>
                  </div>
                </div>
                
               <div class="col-sm-4">
                  <p class="c-black f-500 m-b-10">Marital Status</p>
                  <div class="form-group">
                    <div class="fg-line">
                      <select name="marital_status" class="form-control">
                      	<option>Select One</option>
                        <option value="married">Married</option>
                        <option value="single">Single</option>
                        <option value="divorced">Divorced</option>
                      </select>
                    </div>
                  </div>
                </div>
                
               <div class="col-sm-4">
                  <p class="c-black f-500 m-b-10">Date Of Birth</p>
                  <div class="form-group">
                    <div class="fg-line">
                      <input type="text" placeholder="" name="dob" class="form-control date-picker">
                    </div>
                  </div>
                </div> 
             </div>
              <div class="row">
                 <ul class="clist clist-check">
                  <li>Link to Media/News/Information Source(s):</li>
                </ul>
              
              </div>
              <div class="row">
            	<div class="col-sm-1">
              		<div class="form-group"><button class="btn btn-primary  waves-effect">Edit</button></div>
            	</div>
            	<div class="col-sm-4">
                  <div class="form-group"><button class="btn btn-primary  waves-effect" name="addprofile" type="submit">Create Profile</button></div>
            	</div>
          </div>   
            </form>  
            <script>
				function Submitdata(){
					if($("#myname").val() == "" ){
						$("#myname").focus();
						$("#errormyname").html("Please Enter Your Name");
						return false;
					}else{
						$("#errormyname").html("");
					}
				}
           </script>  
           <style>
		   #errormyname{color:#F00;}
		   </style>
        </div>
      </div>
    </div>
  </section>
</section>
<?php include('lib/footer.php')?>
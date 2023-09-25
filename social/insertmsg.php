<?php
include('../lib/connect.php');
include('../lib/sol_functions.php');
session_start();
//$servername = "localhost";
	//$username = "root";
	//$password = "";
	//$database = "narrate";
 
// Create connection
	//$conn = new mysqli($servername, $username, $password, $database);
 
	//if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
	//} 
 		//echo $_REQUEST['data'];
 		$data=explode('~',$_REQUEST['data']);
		$to_id=$data[0];
		$message=$data[1];
		//$to_id = $_POST['to_id'];
		//$message = $_POST['message'];
		//$address = $_POST['address'];
 

		$sql = mysql_query("INSERT INTO na_message (from_id, to_id, message, post_date_time,read_status,status)
			VALUES ('".$_SESSION['userid']."', '".$to_id."', '".$message."', '".date('Y-m-d H:i:s')."',1,1)");
 
	//if ($conn->query($sql) === TRUE)
	//{
		//echo "New record created successfully";
	//} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
	//}
	//$conn->close();
 
?> <div class="lv-body" id="mypostmessage">  
                                	<?php
									
									$sqlmessagelist=mysql_query("SELECT * from `na_message` where (`from_id`=".$_SESSION['userid']." || `to_id`=".$_SESSION['userid'].") and (`to_id`=".$to_id." || `from_id`=".$to_id.") and `status`=1 ");
									$counter=1;
									while($rowmsglist=mysql_fetch_array($sqlmessagelist)){
									?>
                                    <div class="lv-item media <?php if($rowmsglist['from_id']==$_SESSION['userid']){ }else{?>right<?php }?>">
                                        <div class="lv-avatar pull-left">
                                        	<?php 
											$viewavatar=getAnyTableWhereData('na_member', " AND id='".$rowmsglist["from_id"]."' ");
											?>
                                            <img src="../admin/useravatar/fullsize/<?php echo $viewavatar['userImage']?>" alt=""> 
                                        </div>
                                        <div class="media-body">
                                            <div class="ms-item">
                                                <?php echo strip_tags($rowmsglist['message']);?>
                                            </div>
                                            <small class="ms-date"><i class="zmdi zmdi-time"></i> <?php echo date('d/m/Y',strtotime($rowmsglist['post_date_time']))?> at <?php echo date('H:i:A',strtotime($rowmsglist['post_date_time']))?></small>
                                        </div>
                                    </div>
                                    <?php }?>
                                    
                                    
                                   </div>


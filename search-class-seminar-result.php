<?php 
include('lib/inner_header.php');
sequre();
$start=0;
$limit=10;
$id=1;
if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."'");


$program_type=$_REQUEST['program_type'];

$course_name=$_REQUEST['course_name'];


$query1 ="select * from na_ins_schools where status=1"; 




if($course_name=="")
{
$query1 .=" and program like '%$program_type%'  LIMIT $start,$limit";
}
else{
    
    $query1 .=" and program like '%$program_type%' or course like '%$course_name%'";
}




/*******************************/

?>
<section id="main">
  <?php echo include('lib/aside.php')?>
  
  
  <section id="content">
    <div class="container">
      <div class="block-header">
        <h2>Search Program</h2>
      </div>
      <div class="card">
        <div class="card" id="profile-main">
                        <div class="pm-body clearfix"  style="padding:0;">
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-account m-r-5"></i> Program Information</h2>
                                </div>
                                <div class="pmbb-body p-l-30">
								<?php 
							//echo $query1;
							//  exit();
							$member_query=  mysql_query($query1);
							if(mysql_num_rows($member_query) > 0){
							while($fetch_member=  mysql_fetch_array($member_query))
							{
							// echo $fetch_member['first_name'];
							?>
									
                                    <div class="pmbb-view" style="display: -webkit-inline-box;">
										 
										  <div class="jk">
                                        <dl class="dl-horizontal">
                                            <dt>Academic Programs</dt>
                                            <dd><?php echo $fetch_member['program'];?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Course/Program Bulletin</dt>
                                            <dd><?php echo $fetch_member['course'];?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Curriculum</dt>
                                            <dd><?php echo $fetch_member['curiculum']?></dd>
                                        </dl>
										<div class="m-t-30">
										  <a class="btn btn-primary" href="dashboard-report.php?member=<?=  base64_encode($fetch_member['id'])?>"><i class="zmdi zmdi-account m-r-5"></i>View Profile</a>
										  <a class="btn btn-success" href="dashboard-report.php?member=<?=  base64_encode($fetch_member['id'])?>"><i class="zmdi zmdi-book m-r-5"></i>Programs</a>
										  <a class="btn btn-danger" href="dashboard-report.php?member=<?=  base64_encode($fetch_member['id'])?>"><i class="zmdi zmdi-video m-r-5"></i>Seminar</a>


										</div>
										
										</div>
										
                                    </div>
									<hr/>
							<?php } }
							else{ echo "No result found";}
							?>
                                    <?php
								$rows=mysql_num_rows(mysql_query($query1));
								$total=ceil($rows/$limit);

								?>
								<nav class="pagination" role="navigation" aria-label="pager">

								<?php        if($id>1)
								{
								?>
								<span class="prev">
								  <a rel="prev" href="?id=<?php echo ($id-1);?>">‹ Prev</a>
								</span>
								<?php
								}


								for($i=1;$i<=$total;$i++)
								{
								if($id==$i)
								{
								echo "$id";
								continue;	
								}
								?><span class="prev">
								<a href="?id=<?php echo $i;?>"><?php echo $i;?></a>
								</span>
								<?php
								}

								if($id<$total)
								{
								?>
								<span class="next">
								  <a rel="next" href="?id=<?php echo ($id+1);?>">Next ›</a>
								</span>
								<?php
								}
								?>
								</nav>
                                   
                                </div>
                            </div>
                       
                        </div>
                    </div>
      </div>
    </div>
  </section>
</section>
  <?php include('lib/inner_footer.php')?>
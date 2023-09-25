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

//$course_name=$_REQUEST['course_name'];


$query1 ="(SELECT * FROM na_sch_affiliate_schools WHERE program LIKE '$program_type') UNION (SELECT * FROM na_ins_schools WHERE program LIKE '$program_type') UNION (SELECT * FROM na_sch_schools WHERE program LIKE '$program_type') UNION (SELECT * FROM na_ins_affiliate_schools WHERE program LIKE '$program_type')"; 



	//$query2 = "select * from na_ins_affiliate_schools where status=1 and program like '%$program_type%'  LIMIT 0,10";

/*******************************/

?>
<style type="text/css">
	.def{
		border-radius: 26px;text-transform: capitalize;background: #eee;
	}
</style>
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
							$prgm_query=  mysql_query($query1);
							if(mysql_num_rows($prgm_query) > 0){
							while($fetch_prgm=  mysql_fetch_array($prgm_query))
							{
							// echo $fetch_member['first_name'];
							?>
									
                                    <div class="pmbb-view" style="display: -webkit-inline-box;">
										 
										  <div class="jk">
										  	 <dl class="dl-horizontal">
                                            <dt>Educational Institute/School Name</dt>
                                            <dd><?php 
                                           $fl_name_q=mysql_query("select * from na_member where id='".$fetch_prgm['ind_id']."'");
                                            $fl_name_f=mysql_fetch_array($fl_name_q);
                                            echo $fl_name_f['fullname'];

                                            ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Academic Programs</dt>
                                            <dd><?php echo $fetch_prgm['program']; echo $fetch_prgm['id'];?></dd>
                                        </dl>
                                        <dl class="dl-horizontal"> 
                                            <dt>Course/Program Bulletin</dt>
                                            <dd><?php echo $fetch_prgm['course'];?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Curriculum</dt>
                                            <dd><?php echo $fetch_prgm['curiculum']?></dd>
                                        </dl>
                                         <dl class="dl-horizontal">
                                            <dt>Courses</dt>
                                            <dd>
                                            	<?php
                                            	$cs_id=$fetch_prgm['id'];
                                            	$query2="(SELECT * FROM na_ins_schools_curiculum WHERE ins_schools_id LIKE '$cs_id') UNION (SELECT * FROM na_ins_affiliate_schools_curiculum_details WHERE ias_id LIKE '$cs_id') UNION (SELECT * FROM na_sch_schools_coursesandclasses WHERE sch_schools_id LIKE '$cs_id') UNION (SELECT * FROM na_sch_affiliate_schools_course WHERE sch_affiliate_schools_id LIKE '$cs_id')";
                                            	$etcs=mysql_query($query2);
                                            	if($count=mysql_num_rows($etcs) > 0){
                                            	while($ftcs=mysql_fetch_array($etcs)){
                                                  echo $ftsch_id= $ftcs['isc_id'];
                                                  if($ftsch_id != ""){
                                                    $exe_query=  mysql_query("SELECT iscd_id FROM na_ins_schools_curiculum_details where isc_id='".$ftsch_id."'");
                                                    $ftert=mysql_fetch_array($exe_query);
                                                    echo $ftid=$ftert['iscd_id'];
                                                  }
                                                  elseif($ftsch_id != ""){
                                                     $exe_query=  mysql_query("SELECT iaccd_id FROM na_ins_affiliate_curricullum_course_details where iascd_id ='".$ftsch_id."'");
                                                    $ftert=mysql_fetch_array($exe_query);
                                                    echo $ftid=$ftert['iaccd_id'];
                                                }elseif($ftsch_id != ""){
                                                     $exe_query=  mysql_query("SELECT sscs_id FROM na_sch_schools_coursesandclasses_subdes where sch_schools_coursesandclasses_id='".$ftsch_id."'");
                                                    $ftert=mysql_fetch_array($exe_query);
                                                    echo $ftid=$ftert['sscs_id'];
                                                }elseif($ftsch_id != ""){
                                                     $exe_query=  mysql_query("SELECT sascd_id FROM na_sch_affiliate_schools_course_details WHERE sch_affiliate_schools_course_id='".$ftsch_id."'");
                                                    $ftert=mysql_fetch_array($exe_query);
                                                    echo $ftid=$ftert['sascd_id'];
                                                }
                                            		

                                            		?>
                                            		<a href="search-program-course-result.php?crse_id=<?php echo $ftid; ?>" class="btn btn-default def"><?php echo $ftcs['crsname']; ?></a>
                                            	
                                            	<?php
                                            }} else {
                                            	echo"<span style='color:red'>courses not available</span>";
                                            }

                                            	?>
                                            </dd>
                                        </dl>
										<div class="m-t-30">
										  <a class="btn btn-primary" href="dashboard-profile-report.php?member=<?=base64_encode($fetch_prgm['id'])?>"><i class="zmdi zmdi-account m-r-5"></i>View Profile</a>
										  <a class="btn btn-success" href="search-program-course-result.php?course=<?=$fetch_prgm['id']?>"><i class="zmdi zmdi-book m-r-5"></i>Courses</a>
										  <a class="btn btn-danger" href="dashboard-report.php?member=<?=  base64_encode($fetch_prgm['id'])?>"><i class="zmdi zmdi-video m-r-5"></i>Seminar</a>


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

<?php 
include('lib/inner_header.php');


sequre();
$start=0;
$limit=1;
$id=1;
if(isset($_GET['id']))
{
$id=$_GET['id'];
$start=($id-1)*$limit;
}
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."'");


$inst_name=$_REQUEST['inst_name'];

$query =mysql_query("select * from na_ins_general_info where name like '%$inst_name%' and ind_id!='".$_SESSION['userid']."'"); 
$count = mysql_num_rows($query);
	


?>


<style>
 
 .jk{
    background: #fff;
    box-shadow: 0 7px 13px rgba(99, 97, 97, 0.5);
    min-height: 340px;
}
dl{
	margin-bottom: 8px!important;
}
.gh{
	background:#cbf1cc;
	height: 340px;
}

.dos{
	position: absolute;
    bottom: 65px;
    left: 28px;
    font-size:21px;
    color: #d18c13;
}
.doss{
	position: absolute;
    bottom: 30px;
    left: 28px;
    font-size: 20px;
    color:#4da9df;
}
 .damru {
    width: 0;
    height: 0;
    border-left: 26px solid transparent;
    border-right: 26px solid transparent;
    border-bottom: 43px solid #61e062;
    position: relative;
    left: 12px;
    top: 16px;
    }
  .damru:after {
    width: 0;
    height: 0;
    border-left: 26px solid transparent;
    border-right: 27px solid transparent;
    border-top: 39px solid #61e062;
    position: absolute;
    content: "";
    top: 18px;
    left: -26px;
    }
    .damru span{
    position: absolute;
    top: 18px;
    z-index: 9999;
    right: -15px;
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    }
</style>

<section id="main">
  <?php echo include('lib/aside.php')?>
  
  
  <section id="content">
    <div class="container">
      <div class="block-header">
        <h2>Search Educational Institute Result</h2>
      </div>
      <div class="card">
        <div class="card" id="profile-main">
                        <div class="pm-body clearfix"  style="padding:0;">
                            <div class="pmb-block">
                                <div class="pmbb-header">
                                    <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>
                                </div>
                                <div class="pmbb-body">
								<?php 
									if($count == "0"){
									echo" No related search result found.";
								}else{
									while($row_ins = mysql_fetch_array($query)){

										$ft_ins = mysql_fetch_array(mysql_query("select * from na_member where id='".$row_ins['ind_id']."'"));
									
							?>
									
                                    <div class="pmbb-view jk" style="">
										  <div class="imgs col-md-4" style="padding: 14px 20px;">
										  
										  <a href="dashboard-report.php?member=<?=base64_encode($ft_ins['id'])?>">

										<?php
										if($ft_ins['userImage']=="")
										{
										?>
										<img width="280px" height="300px" alt="" src="img/no-image.png" class="media-object">

										<?php }elseif(!is_file('admin/useravatar/fullsize/'.$ft_ins['userImage'])){?>
										<img width="280px" height="300px" alt="" src="img/no-image.png" class="media-object">
										<?php }else{?>
										<img width="280px" height="300px" alt="" src="admin/useravatar/fullsize/<?=$ft_ins['userImage']?>" class="media-object">
										<?php }?>
										</a>
										  </div>
										  <div class="col-md-7" style="padding: 14px 20px;">
                                        <dl class="dl-horizontal">
                                            <dt>Institute Name</dt>
                                            <dd><?php echo $row_ins['name'];?></dd>
                                        </dl>

                                        <dl class="dl-horizontal">
                                            <dt>Contact Name</dt>
                                            <dd><?php echo $ft_ins['fullname'];?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Address</dt>
                                            <dd><?php echo $row_ins['address'];?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Email</dt>
                                            <dd><?php echo $row_ins['email'];?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Phone</dt>
                                            <dd><?php echo $row_ins['telephone_no'];?></dd>
                                        </dl>

                                        <dl class="dl-horizontal">
                                            <dt>Description</dt>
                                            <dd style="margin-bottom: -11px;"><?php echo $row_ins['informational_description']?></dd>
                                        </dl>

                                        <dl class="dl-horizontal">
                                            <dt>Website</dt>
                                            <dd><?php echo $row_ins['website']?></dd>
                                        </dl>
										<div class="m-t-30">
										  <a class="btn btn-success" href="dashboard-report.php?member=<?=  base64_encode($fetch_member['id'])?>"><i class="zmdi zmdi-book m-r-5"></i>Send Request</a>
										</div>
										</div>

										<div class="col-md-1" style="padding: 0;">
											<div class="gh">
												 <p class="damru">
												  <span>New</span>
												</p>
												 <i class="fa fa-heart dos" aria-hidden="true"></i>
												 <i class="fa fa-thumbs-up doss" aria-hidden="true"></i>
											</div>
										</div>
                                    </div>
									<hr/>
							<?php }  } ?>
                                    <?php
								$rows=mysql_num_rows(mysql_query($query));
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
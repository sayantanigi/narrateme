<?php 
include('lib/inner_header.php');
sequre();
$start=0;
$limit=10;
$id=1;
if(isset($_GET['id'])) {
	$id=$_GET['id'];
	$start=($id-1)*$limit;
}
$view=getAnyTableWhereData('na_member', " AND username='".$_SESSION["username"]."'");
$member_type=$_REQUEST['member_type'];
$member_name=$_REQUEST['member_name'];
$query ="select * from na_member where std=0 and ind=0 and edu=0 and fac=0"; 
$query1 ="select * from na_member where std=0 and ind=0 and edu=0 and fac=0"; 
if($member_name!="") {
	$query .=" and first_name like '%$member_name%' or last_name like '%$member_name%'";
	if($member_type=="") {
		$query1 .=" and first_name like '%$member_name%' or last_name like '%$member_name%' LIMIT $start,$limit";
	} else {
		$query1 .=" and first_name like '%$member_name%' or last_name like '%$member_name%'";
	}
}
/*******************************/
if($member_type!="") {
	switch ($member_type) {
		case "2":
			$query .=" and std='1' ";
			$query1 .=" and std='1' LIMIT $start,$limit";
		break;
		case "3":
			$query .=" and edu='1' ";
			$query1 .=" and edu='1' LIMIT $start,$limit";
		break;
		case "4":
			$query .=" and fac='1' ";
			$query1 .=" and fac='1' LIMIT $start,$limit";
		break;
		case "1":
			$query .=" and ind='1' ";
			$query1 .=" and ind='1' LIMIT $start,$limit";
		break;
		default :
	}
}
?>
<section id="main">
	<?php echo include('lib/aside.php')?>
	<section id="content">
    	<div class="container">
      		<div class="block-header">
        		<h2>Search Member</h2>
      		</div>
      		<div class="card">
        		<div class="card" id="profile-main">
                    <div class="pm-body clearfix"  style="padding:0;">
                        <div class="pmb-block">
                            <div class="pmbb-header">
                                <h2><i class="zmdi zmdi-account m-r-5"></i> Basic Information</h2>
                            </div>
                            <div class="pmbb-body p-l-30">
							<?php $member_query =  mysqli_query($con, $query1);
							while($fetch_member =  mysqli_fetch_array($member_query)) { ?>
                                <div class="pmbb-view" style="display: -webkit-inline-box;">
								  	<div class="imgs" style="margin-right: 10px;">
								  		<a href="dashboard-report.php?member=<?=base64_encode($fetch_member['id'])?>">
							  			<?php if($fetch_member['userImage']=="") { ?>
										<img width="60px" height="60px" alt="" src="img/no-image.png" class="media-object">
										<?php } elseif(!is_file('admin/useravatar/smallimg/'.$fetch_member['userImage'])) {?>
										<img width="60px" height="60px" alt="" src="img/no-image.png" class="media-object">
										<?php } else {?>
										<img width="60px" height="60px" alt="" src="admin/useravatar/smallimg/<?=$fetch_member['userImage']?>" class="media-object">
										<?php } ?>
										</a>
								  	</div>
								  	<div class="jk">
                                        <dl class="dl-horizontal">
                                            <dt>Full Name</dt>
                                            <dd><?php echo $fetch_member['fullname'];?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Country</dt>
                                            <dd><?php echo $fetch_member['country'];?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Date of Birth</dt>
                                            <dd><?=date('d M Y',strtotime($fetch_member['dateofbirth']));?> </dd>
                                        </dl>
										<div class="m-t-30">
									  		<a class="btn btn-primary" href="dashboard-profile-report.php?member=<?= base64_encode(@$fetch_member['id'])?>"><i class="zmdi zmdi-account m-r-5"></i>View Profile</a>
										</div>
									</div>
                                </div>
								<hr/>
								<?php } 
								$rows=mysqli_num_rows(mysqli_query($con, $query));
								$total=ceil($rows/$limit); ?>
								<nav class="pagination" role="navigation" aria-label="pager">
								<?php if($id>1) { ?>
								<span class="prev">
							  		<a rel="prev" href="?id=<?php echo ($id-1);?>">‹ Prev</a>
								</span>
								<?php }
								for($i=1;$i<=$total;$i++) {
									if($id==$i) {
										echo "$id";
										continue;
									} ?>
								<span class="prev">
									<a href="?id=<?php echo $i;?>"><?php echo $i;?></a>
								</span>
								<?php }
								if($id<$total) { ?>
								<span class="next">
							  		<a rel="next" href="?id=<?php echo ($id+1);?>">Next ›</a>
								</span>
								<?php } ?>
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
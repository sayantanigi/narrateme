<!-- Content design start here-->
<div class="clearfix"></div>
<div class="container">
	<div class="about-panel">
		<div class="row">
			<div class="col-sm-12">
				<?php 
				if(!empty($result)){
					foreach ($result as  $res) {?>
						<div class="cb-left">
							<div class="row">
								<div class="col-sm-4">
									<h4><a href="<?= base_url()?>course/coursedescription/<?= $res->course_id?>"><?= $res->course_name?></a></h4>
								</div>
								<div class="col-sm-8">
									<h3><?= $res->course_description?> </h3>
								</div>
							</div>
						</div>
						<hr/>

					<?php } } else{?>
						<div class="cb-left">
							<h4>No  Result Found</h4>
						</div>	
					<?php }  ?>

				</div>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
<!-- Content design End here-->
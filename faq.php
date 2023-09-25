<?php include"lib/headercms.php";?>
<section class="body_content" style="min-height:200px;">
  <div class="page_header">
    <div class="over_bg"></div>
    <div class="block-header text-center">
      <h2>FAQ</h2>
    </div>
  </div>
  <div class="inner_content">
    <div class="container" id="page-1">
      <div class="btn-demo" role="tablist" aria-multiselectable="true" style="margin-top:50px;">
        <?php
		$ctn=1; 
		$faqfetch=mysql_query("SELECT * FROM `na_faq`");
		while($fetchfaqarr=mysql_fetch_array($faqfetch)){
		?>
        <div class="panel panel-collapse">
          <div class="panel-heading" role="tab" id="heading<?=$ctn?>" style="background-color:#D18C13; width: 95%;">
     		<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$ctn?>" aria-expanded="true" aria-controls="collapse<?=$ctn?>"><?=$fetchfaqarr['faqq']?></a> </h4>
          </div>
          <div id="collapse<?=$ctn?>" class="collapse <?php if($ctn==1){?>in<?php }?>" role="tabpanel" aria-labelledby="heading<?=$ctn?>">
            <div class="panel-body" style="text-align:center; padding:30px;"><?=$fetchfaqarr['faqa']?></div>
          </div>
        </div>
        <?php $ctn++;}?>
      </div>
    </div>
  </div>
</section>
<?php include"lib/footercms.php";?>
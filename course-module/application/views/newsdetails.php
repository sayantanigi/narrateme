<style type="text/css">
.panel-heading{
	background-color:#075b82 !Important;
	color:#FFF !Important;
	font-weight:bold !Important;
	}
</style>
<!-- Content design start here-->
<div class="clearfix"></div>
<div class="container">
  <div class="about-panel">
    <div class="row">
    	<?php if($news!=''){
				foreach($news as $ns){
		?>
        	<div class="col-6 col-md-12">
            	<p>
                <img class="" style="padding:5px; text-align: center;" src="<?php echo base_url()?>uploads/news/<?php echo $ns->news_image?>" alt="" >
                </p>
                <?php echo $ns->news_desc;?>
        	</div>
        <?php }
		}
		?>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- Content design End here-->
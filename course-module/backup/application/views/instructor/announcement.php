<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12" id="content">
      <center>
        <h1 class="page-header1" id="at" > Announcement <font color="#005CA9">List</font></h1>
      </center>
    </div>
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Announcement Details </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>Announcement Title</th>
                  <th>Detail</th>
                  <th>Add Date</th>
                </tr>
              </thead>
              <tbody>
              	<?php 
					if(!empty($announcement)){
						foreach($announcement as $an){
				?>
                <tr>
               	 	<td><?php echo $an->announcement_title;?></td>	
                  <td><?php echo $an->description;?></td>
                  <td><?php echo date('d-m-Y',strtotime($an->add_date));?></td>
                </tr>
                <?php 
						}
					} else{ ?>
            <tr><td> No List.</td></tr>
         <?php }
				?>
              </tbody>
            </table>
           
          </div>
          <!-- /.table-responsive --> 
        </div>
        <!-- /.panel-body --> 
      </div>
      <!-- /.panel --> 
    </div>
    
    
    
    <!-- /.row -->
    
    
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <p>Copyright © OES  | <?= date('Y') ?></p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 d_by">
        <p>Developed & Designed By <a href="http://www.goigi.com/" target="_blank"> GOIGI.COM</a></p>
      </div>
    </div>
  </div>
  <!-- /#page-wrapper --> 
  
</div>
</div>

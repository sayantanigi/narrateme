<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12" id="content">
      <center>
        <h1 class="page-header1" id="at" >Member <font color="#005CA9">List</font></h1>
      </center>
    </div>
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">Member List
          <div id="search">
            <div class="row">
              <div class="col-md-6">
                <form method="post" action="<?php echo base_url()?>member/business_member" autocomplete="on">
                  <input id="search"  name="student_name" type="text" placeholder="Enter Member Name" style="color:#000;">
                  <button id="search_submit"  type="submit"><i class="fa fa-search" aria-hidden="true"></i> </button>
                </form>
              </div>
              <div class="col-md-6">
                <div class="top_sections_button">
                  <a title="Add Member" class="btn btn-default" href="<?php echo base_url()?>member/add_member/<?php echo $this->session->userdata('is_user_id')?>">
                    Add Member<i class="fa fa-plus" aria-hidden="true"></i>
                  </a>
                 <a  class="btn btn-default" href="<?php echo base_url()?>member/assignmembercourse">Assign Course</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
         
          <?php if($this->session->flashdata('success_msg')!=''){?>
          <div class=" col-md-12 col-lg-12"><?php echo $this->session->flashdata('success_msg'); ?> </div>
          <?php } ?>

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                
                  <th>Student Name</th>
                  <th>Email Id</th>
                  <th>Contact No</th>
                  <th>Gender</th>
                  <th>Join Date</th>
                  <th>Course List </th> 
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if(!empty($currentstudents)){
                  $cnt=1;
                  foreach($currentstudents as $cs){
                    ?>
                    <tr>
                     <td><?php echo $cs->first_name." ".$cs->last_name?></td>
                      <td><?php echo $cs->email?></td>
                      <td><?php echo $cs->phoneno?></td>
                      <td><?php echo ucfirst($cs->gender)?></td>
                      <td><?php echo date('d-m-Y',strtotime($cs->add_date))?></td>
                      <td><a href="" role="button" class="btn btn-default" id="views">View Courses </a>
                        <div class="showcourses" id="showcourses" style="display: none;">
                          <p>Php </p>
                          <p>Java</p>
                        </div>

                      </td>
                      <td>
                        <div class="co_details" align="left" style="text-align:left;">
                          <a href="<?php echo base_url()?>member/edit_member/<?php echo $cs->member_id?>">Edit</a>
                          <a href="javascript:void(0);" class="btn btn-primary" onclick="deleteone(<?php echo $cs->member_id;?>);">Delete</a>
                        </div>
                      </td>
                    </tr>
                    <?php 
                    $cnt++;
                  }
                }else{
                  ?>
                  <tr>
                    <td colspan="5">No Member List</td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>

            </div>
            <!-- /.table-responsive --> 
          </div>
          <!-- /.panel-body --> 
        </div>
        <!-- /.panel --> 
      </div>


      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <p>Copyright © OES  | <?= date('Y') ?></p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs"> </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 d_by">
          <p>Developed &amp; Designed By <a href="http://www.goigi.com/" target="_blank"> GOIGI.COM</a></p>
        </div>
      </div>
    </div>
    <!-- /#page-wrapper --> 

  </div>
  <!-- /#wrapper -->
</div>
<!-- Bootstrap Core JavaScript --> 
<script src="<?php echo base_url()?>user_panel/business/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 

<!-- Metis Menu Plugin JavaScript --> 
<script src="<?php echo base_url()?>user_panel/business/bower_components/metisMenu/dist/metisMenu.min.js"></script> 

<!-- Morris Charts JavaScript --> 
<script src="<?php echo base_url()?>user_panel/business/bower_components/raphael/raphael-min.js"></script> 
<script src="<?php echo base_url()?>user_panel/business/bower_components/morrisjs/morris.min.js"></script> 
<script src="<?php echo base_url()?>user_panel/business/js/morris-data.js"></script> 
<script src="<?php echo base_url()?>user_panel/business/js/custom-file-input.js"></script> 
<!-- Custom Theme JavaScript --> 
<script src="<?php echo base_url()?>user_panel/business/dist/js/sb-admin-2.js"></script>
<script>
var select_all = document.getElementById("select_all"); //select all checkbox
var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
//select all checkboxes
select_all.addEventListener("change", function(e){
  for (i = 0; i < checkboxes.length; i++) { 
    checkboxes[i].checked = select_all.checked;
  }
});
for (var i = 0; i < checkboxes.length; i++) {
checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
//uncheck "select all", if one of the listed checkbox item is unchecked
if(this.checked == false){
  select_all.checked = false;
}
//check "select all" if all checkbox items are checked
if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
  select_all.checked = true;
}
});
}
</script>
<script type="text/javascript">
  $(document).ready(function(){
     $("#views").click(function(){
        $("#showcourses").show();
       // $("#view").hide();
    });
    
});
  function deleteone(id)
  {
    cnf = confirm("Are you confirm to delete?");
    if(cnf)
    {
      $('.portlet .tools a.reload').click();
      $.ajax({
        type:"GET",
        url:"<?php echo base_url();?>member/deletebusstdlist",
        data:"id="+id,
        success:function(data)
        {
          //alert(data);
          window.location.reload();
        }
      });
    }
  }
</script>
</body>
</html>
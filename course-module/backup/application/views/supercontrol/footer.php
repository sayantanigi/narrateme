
 <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
      <!--  <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script> -->
          <script src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script> 
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script> 
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url(); ?>assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
         <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
         
        <!-- END THEME LAYOUT SCRIPTS -->
<script type="text/javascript" src="<?php echo base_url()?>/assets/tinymce/tinymce.min.js"></script>
<script>
	function leftTrim(element){
	if(element)
	element.value=element.value.replace(/^\s+/,"");
	}

</script>

<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		  // UIModals.init();
		   //TableManaged.init();
		   tinymce.init({
			selector: "#pagedes",
			/*height:500,*/
			plugins: [
				 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   toolbar: "insertfile undo redo | styleselect | bold italic | fontselect | fontsizeselect | sizeselect |  alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
		   style_formats: [
				{title: 'Bold text', inline: 'b'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			]

		});
		});
				
			jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		  // UIModals.init();
		   //TableManaged.init();
		   tinymce.init({
			selector: "#pagedes1",
			/*height:500,*/
			plugins: [
				 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   toolbar: "insertfile undo redo | styleselect | bold italic | fontselect | fontsizeselect | sizeselect |  alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
		   style_formats: [
				{title: 'Bold text', inline: 'b'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			]

		});
		});	
		
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		  // UIModals.init();
		   //TableManaged.init();
		   tinymce.init({
			selector: "#pagedes2",
			/*height:500,*/
			plugins: [
				 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   toolbar: "insertfile undo redo | styleselect | bold italic | fontselect | fontsizeselect | sizeselect |  alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
		   style_formats: [
				{title: 'Bold text', inline: 'b'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			]

		});
		});
		
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		  // UIModals.init();
		   //TableManaged.init();
		   tinymce.init({
			selector: "#pagedes3",
			/*height:500,*/
			plugins: [
				 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   toolbar: "insertfile undo redo | styleselect | bold italic | fontselect | fontsizeselect | sizeselect |  alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
		   style_formats: [
				{title: 'Bold text', inline: 'b'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			]

		});
		});
		
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		  // UIModals.init();
		   //TableManaged.init();
		   tinymce.init({
			selector: "#pagedes4",
			/*height:500,*/
			plugins: [
				 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
				 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   toolbar: "insertfile undo redo | styleselect | bold italic | fontselect | fontsizeselect | sizeselect |  alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
		   style_formats: [
				{title: 'Bold text', inline: 'b'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			]

		});
		});
</script>

<script type="text/javascript">
  $("#createGrade").on('click', function (e) {
	if($("#message").val() == "" ){
	$("#message").focus();
	$("#message").css({'border-color' : '#F00'});
	return false;
	}else{
	$("#errorBox1").html("");
	}  
  e.preventDefault();
  $.ajax({
    url: '<?=base_url();?>supercontrol/member/chat_data',
    data: {
	  uid: $("#uid").val(),	
      message: $("#message").val(),
    },
    async: 'true',
    cache: 'false',
    type: 'post',
    success: function (data) {
      //alert("Data successfully added");
	  $("#message").val("");
	  //location.reload();
	  //$("#chat_new").hide().fadeIn('fast');
	  $('#chat_new').html(data);
	  $('#mydiv').scrollTop($('#mydiv')[0].scrollHeight);
    }
  });
});
</script>


<script>
setInterval(call, 2000); 
function call() {
   $.ajax({
    url: '<?=base_url();?>supercontrol/member/chat_data_refresh',
    data: {
     uid: $("#uid").val(),
    },
    async: 'true',
    cache: 'false',
    type: 'post',
    success: function (data) {
      //alert("Data successfully added");
	  //$("#message").val("");
	  //location.reload();
	  //$("#chat_new").hide().fadeIn('fast');
	  $('#chat_new').html(data);
	  $('#mydiv').scrollTop($('#mydiv')[0].scrollHeight);
    }
  });
}

</script>

  <script>
        $(document).ready(function(){
            $("#check").click(function(){
                $("#drop").show(1000);
        $("#check").hide();
        $("#check2").show();
            });
      
      $("#check2").click(function(){
                $("#drop").hide(1000);
        $("#check").show();
        $("#check2").hide();
            });
            
        });
    
        </script>
        <script>
  $(document).ready(function(){
    $("#check").click(function(){
      $("#drop").show(1000);
      $("#check").hide();
      $("#check2").show();
    });

    $("#check2").click(function(){
      $("#drop").hide(1000);
      $("#check").show();
      $("#check2").hide();
    });

  });

</script>
<script>
  $(document).ready(function () {
    $('label').click(function() {
      $('.active').removeClass("active");
      $(this).addClass("active");
    });
  });
</script>
  <script>
		var room = 1;
		function education_fields() {
			room++;
			var objTo = document.getElementById('education_fields')
			var divtest = document.createElement("div");
			divtest.setAttribute("class", "form-group removeclass"+room);
			var rdiv = 'removeclass'+room;
			divtest.innerHTML = '<b><label class="col-md-3 control-label"></label></b><div class="form-group col-md-2"><label for="inputEmail4">Start Time</label> <input type="time" name="start_time" class="form-control" id="start_time" placeholder="Email"></div><div class="form-group col-md-2"><label for="inputPassword4">End Time</label><input type="time" name="end_time" class="form-control" id="inputPassword4" placeholder="Password"></div><div class="form-group col-md-2"><label for="inputPassword4">Day</label><input type="text" name="day" class="form-control" id="inputPassword4" placeholder="Password"></div><div class="form-group col-md-2"><label for="inputPassword4">Shift Time</label><input type="text" name="shift" class="form-control" id="inputPassword4" placeholder="Password"></div><div class="form-group col-md-1" style="margin-top: 24px;"><button type="button" class="btn btn-danger" onclick="remove_education_fields('+ room +');"><span>Remove</span></button></div><div class="clear"></div>';
			objTo.appendChild(divtest)
		}
		function remove_education_fields(rid) {
		   $('.removeclass'+rid).remove();
		}
	</script>
<script type="text/javascript">
  $("form").submit(function(){

    if($("#title").val()== ""){
      $("#title").focus();
      $("#errorBox").html("Please Enter course");
      return false;
    }else{
      $("#errorBox").html("");

    }
    if($("#price").val()=="")
    {
      $("#price").focus();
      $("#errorprice").html("Please Enter Price");
      return false;
    }else{
      $("#errorprice").html("");
    }


    }
  
</script> 
<script>
  function leftTrim(element){
    if(element)
      element.value=element.value.replace(/^\s+/,"");
  }
</script>

<!-- END THEME LAYOUT SCRIPTS -->
</body>
  
</html>    
    
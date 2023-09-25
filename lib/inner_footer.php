<footer id="footer">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-3">
        <p>Copyright &copy; 2016 NarrateMe</p>
      </div>
      <div class="col-sm-6">
        <ul class="f-menu" style="margin:0;">
          <li><a href="index.php">Home</a></li>
          <li><a href="page.php?id=17">About Us</a></li>
          <li><a href="contact.php?id=5">Contact Us</a></li>
          <li><a href="faq.php">FAQ</a></li>
          <li><a href="page.php?id=4">Terms &amp; Conditions</a></li>
        </ul>
      </div>
      <div class="col-sm-3">
        <p> Designed &amp; Developed By <a href="http://www.goigi.com/" target="_blank">GOIGI.COM</a></p>
      </div>
    </div>
  </div>
</footer>

<!-- Javascript Libraries --> 
<script src="dashboard/vendors/bower_components/jquery/dist/jquery.min.js"></script> 
<script src="dashboard/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="dashboard/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="dashboard/vendors/bower_components/Waves/dist/waves.min.js"></script> 
<script src="dashboard/vendors/bootstrap-growl/bootstrap-growl.min.js"></script> 
<script src="dashboard/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script> 
<script src="dashboard/vendors/bower_components/moment/min/moment.min.js"></script> 
<script src="dashboard/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script> 
<script src="dashboard/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script> 
<script src="dashboard/js/functions.js"></script>
<script src="dashboard/js/demo.js"></script>
<script src="js/app.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script>
		jQuery(document).ready(function() {       
		   // initiate layout and plugins
		   App.init();
		  // UIModals.init();
		   //TableManaged.init();
		   //======================================For Individual Page====================================
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
			
			tinymce.init({
			selector: "#pagedes5",
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
		
		tinymce.init({
			selector: "#pagedes6",
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
		
		tinymce.init({
			selector: "#pagedes7",
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
		
				tinymce.init({
			selector: "#pagedes8",
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
				
		tinymce.init({
			selector: "#pagedes9",
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
		
				tinymce.init({
			selector: "#pagedes10",
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
				
			tinymce.init({
			selector: "#pagedes11",
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
		
			tinymce.init({
			selector: "#pagedes12",
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
		
			tinymce.init({
			selector: "#pagedes13",
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
		
			tinymce.init({
			selector: "#pagedes14",
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
		
		
			tinymce.init({
			selector: "#pagedes15",
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
		
			tinymce.init({
			selector: "#pagedes16",
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
		
		
			tinymce.init({
			selector: "#pagedes17",
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
		
			tinymce.init({
			selector: "#pagedes18",
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
		
			tinymce.init({
			selector: "#pagedes19",
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
		
			tinymce.init({
			selector: "#pagedes20",
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
		
			tinymce.init({
			selector: "#pagedes21",
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
		
			tinymce.init({
			selector: "#pagedes22",
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
		
			tinymce.init({
			selector: "#pagedes23",
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
		
			tinymce.init({
			selector: "#pagedes24",
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
		
			tinymce.init({
			selector: "#pagedes25",
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
			
			tinymce.init({
			selector: "#pagedes26",
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
		
			tinymce.init({
			selector: "#pagedes27",
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
		
			tinymce.init({
			selector: "#pagedes28",
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
			
			tinymce.init({
			selector: "#pagedes29",
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
		
			tinymce.init({
			selector: "#pagedes30",
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
		
			tinymce.init({
			selector: "#pagedes31",
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
		
			tinymce.init({
			selector: "#pagedes32",
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
		
			tinymce.init({
			selector: "#pagedes33",
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
		
			tinymce.init({
			selector: "#pagedes34",
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
		
			tinymce.init({
			selector: "#pagedes35",
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
		//======================================For Individual Page====================================
		
		//======================================For Educational Institute Page=========================
		
			tinymce.init({
			selector: "#pagedes36",
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
		
			tinymce.init({
			selector: "#pagedes37",
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
		
		
			tinymce.init({
			selector: "#crsdet",
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
		
			tinymce.init({
			selector: "#crsdetedt",
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
			
			tinymce.init({
			selector: "#crsdeti",
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
		
			tinymce.init({
			selector: "#crsdetedti",
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
			
			tinymce.init({
			selector: "#crsmisc",
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
			
			tinymce.init({
			selector: "#crsmiscc",
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
			
			tinymce.init({
			selector: "#newsdescription",
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
		//======================================For Educational Institute Page=========================
		
		//======================================For Instructional Facility Page========================
		tinymce.init({
			selector: "#informational_description",
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
			tinymce.init({
			selector: "#text_message",
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
			tinymce.init({
			selector: "#bioandinformation",
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
			tinymce.init({
			selector: "#desorsyl",
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
			tinymce.init({
			selector: "#desorsyl1",
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
			tinymce.init({
			selector: "#syllabus",
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
			tinymce.init({
			selector: "#syllabus1",
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
			tinymce.init({
			selector: "#miscellaneous",
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
			tinymce.init({
			selector: "#advertisementedit",
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
			tinymce.init({
			selector: "#advertisement",
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
		tinymce.init({
			selector: "#newsdescription",
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
		//======================================For Instructional Facility Page========================
		//======================================For Media Provider Profile========================
		    tinymce.init({
			selector: "#descriptionnnn",
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
			tinymce.init({
			selector: "#news_informationnnn",
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
			tinymce.init({
			selector: "#news_reports",
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
			tinymce.init({
			selector: "#published_reportssss",
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
		    tinymce.init({
			selector: "#study_reportssss",
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
			tinymce.init({
			selector: "#programssss",
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
			tinymce.init({
			selector: "#television_programssss",
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
			tinymce.init({
			selector: "#advertisement_material",
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
			tinymce.init({
			selector: "#marketing_material",
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
			
			tinymce.init({
			selector: "#pagedes77",
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
			tinymce.init({
			selector: "#pagedes78",
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
			tinymce.init({
			selector: "#pagedes81",
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
			tinymce.init({
			selector: "#pagedes82",
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
			tinymce.init({
			selector: "#pagedes91",
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
			tinymce.init({
			selector: "#pagedes101",
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
			tinymce.init({
			selector: "#pagedes772",
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
			tinymce.init({
			selector: "#pagedes782",
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
			tinymce.init({
			selector: "#pagedes811",
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
			tinymce.init({
			selector: "#pagedes922",
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
		 tinymce.init({
			selector: "#pagedes102",
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
		 tinymce.init({
			selector: "#pagedes773",
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
		
		tinymce.init({
			selector: "#pagedes813",
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
			tinymce.init({
			selector: "#pagedes933",
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
			tinymce.init({
			selector: "#pagedes103",
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
		//======================================For Media Provider Profile========================
		});
				
				
</script>
</body>
</html>
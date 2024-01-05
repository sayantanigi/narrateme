<link rel='stylesheet' href='<?php echo base_url()?>user_panel/css/fullcalendar.css' />
    <link rel='stylesheet' href='<?php echo base_url()?>user_panel/css/fullcalendar.print.css'/>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
    	<?php //print_r($details);

    	 ?>
      <center>
        <h1 class="page-header1" id="at" >Your <font color="#005CA9">Time Table</font></h1>
      </center>
    </div>
       

    <div class="col-lg-12">
<!--         <script src='<?php echo base_url()?>user_panel/js/jquery-1.10.2.js'></script>-->
      <script src='<?php echo base_url()?>user_panel/js/jquery-ui.custom.min.js'></script>
        <script src='<?php echo base_url()?>user_panel/js/fullcalendar.js'></script> 
        <script src='<?php echo base_url()?>user_panel/js/moment.min.js'></script>
   
    <div id='wrap'>
  <?php if($this->session->flashdata('msg')!=''){?>
        
                      	 <div class=" col-md-12 col-lg-12"><?php echo $this->session->flashdata('msg'); ?> </div>
            		  <?php }?>
<div id='calendar'></div>

<div style='clear:both'></div>
</div>
    <script>

	$(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

	/*	-----------------------------------------------------------------*/

		$('#external-events div.external-event').each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
				//start:$.trim($(this).text())
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/

		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: false,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',

			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
                                
                                $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
                               
//                            var title = prompt('Event Title:');
//				if (title) {
//					calendar.fullCalendar('renderEvent',
//						{
//							title: title,
//							start: start,
//							end: end,
//							allDay: allDay
//						},
//						true // make the event "stick"
//					);
//				}
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped

				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}

			},
			events: [
			<?php 
			if($details !=''){
				foreach($details as $dtls){
					
					$cid=$dtls->course_id;
		$queryallcat = $this->generalmodel->fetch_all_join("select * from sm_course_lesion where course_id='$cid'");
					foreach ($queryallcat as $lis) {
						
                     //print_r($details); 
					?>
					{
						title: '<?php echo $dtls->course_name;?>[Start Time:<?php echo $lis->start_time;?>][End Time:<?php echo $lis->end_time;?>]',
						start: '<?php echo $lis->start_date;?>',
						endTime: '<?php echo $lis->end_time;?>',
						id:'<?php echo $dtls->course_id;?>',
					},
					<?php }
				}
			}
			?>

			],
		
		});


	});

</script>
      <!-- /.panel --> 
    </div>
    <!-- /.col-lg-6 --> 
  </div>
  <!-- /#page-wrapper --> 
</div>
</div>

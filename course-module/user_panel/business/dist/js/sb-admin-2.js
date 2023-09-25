$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
	
	
	
	
	
	
	
	
    // add the animation to the popover
    $('a[rel=popover]').popover().click(function(e) {
        e.preventDefault();        
         var open = $(this).attr('data-easein');
        if(open == 'shake') {
                  $(this).next().velocity('callout.' + open);
            } else if(open == 'pulse') {
              $(this).next().velocity('callout.' + open);
            } else if(open == 'tada') {
                $(this).next().velocity('callout.' + open);
            } else if(open == 'flash') {
                  $(this).next().velocity('callout.' + open);
            }  else if(open == 'bounce') {
                 $(this).next().velocity('callout.' + open);
            } else if(open == 'swing') {
                 $(this).next().velocity('callout.' + open);
            }else {
             $(this).next().velocity('transition.' + open); 
            }
      
      
                
    });


   // add the animation to the modal
$( ".modal" ).each(function(index) {
   $(this).on('show.bs.modal', function (e) {
 var open = $(this).attr('data-easein');
     if(open == 'shake') {
                 $('.modal-dialog').velocity('callout.' + open);
            } else if(open == 'pulse') {
                 $('.modal-dialog').velocity('callout.' + open);
            } else if(open == 'tada') {
                 $('.modal-dialog').velocity('callout.' + open);
            } else if(open == 'flash') {
                 $('.modal-dialog').velocity('callout.' + open);
            }  else if(open == 'bounce') {
                 $('.modal-dialog').velocity('callout.' + open);
            } else if(open == 'swing') {
                 $('.modal-dialog').velocity('callout.' + open);
            }else {
              $('.modal-dialog').velocity('transition.' + open);
            }
             
}); 
});





	
	
	
	
	
	
	
});

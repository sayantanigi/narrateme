   
   var features = 'toolbar=no,menubar=no,location=no,scrollbars=yes,resizable=yes,status=no,left=,top=,width=,height=';
   var searchDatabase = new SearchDatabase();
   var searchResults_length = 0;
   var searchResults = new Object();
   function searchPage(features)
   {
      var element = document.getElementById('Search-site');
      if (element.value.length != 0 || element.value != " ")
      {
         var value = unescape(element.value);
         var keywords = value.split(" ");
         searchResults_length = 0;
         for (var i=0; i<database_length; i++)
         {
            var matches = 0;
            var words = searchDatabase[i].title + " " + searchDatabase[i].description + " " + searchDatabase[i].keywords;
            for (var j = 0; j < keywords.length; j++)
            {
               var pattern = new RegExp(keywords[j], "i");
               var result = words.search(pattern);
               if (result >= 0)
               {
                  matches++;
               }
               else
               {
                  matches = 0;
               }
            }
            if (matches == keywords.length)
            {
               searchResults[searchResults_length++] = searchDatabase[i];
            }
         }
         var wndResults = window.open('about:blank', '', features);
         setTimeout(function()
         {
            var results = '';
            var html = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>Search results<\/title><\/head>';
            html = html + '<body style="background-color:#FFFFFF;margin:0;padding:2px 2px 2px 2px;">';
            html = html + '<span style="font-family:Arial;font-size:13px;color:#000000">';
            for (var n=0; n<searchResults_length; n++)
            {
               results = results + '<strong><a style="color:#0000FF" target="_parent" href="'+searchResults[n].url+'">'+searchResults[n].title +'<\/a><\/strong><br><br>\n';
            }
            if (searchResults_length == 0)
            {
               results = 'No results';
            }
            else
            {
               html = html + searchResults_length;
               html = html + ' result(s) found for search term: ';
               html = html + value;
               html = html + '<br><br>';
            }
            html = html + results;
            html = html + '<\/span>';
            html = html + '<\/body><\/html>';
            wndResults.document.write(html);
        },100);
      }
      return false;
   }
   function searchParseURL()
   {
      var url = decodeURIComponent(window.location.href);
      if (url.indexOf('?') > 0)
      {
         var terms = '';
         var params = url.split('?');
         var values = params[1].split('&');
         for (var i=0;i<values.length;i++)
         {
            var param = values[i].split('=');
            if (param[0] == 'q')
            {
               terms = unescape(param[1]);
               break;
            }
         }
         if (terms != '')
         {
            var element = document.getElementById('Search-site');
            element.value = terms;
            searchPage('');
         }
      }
   }
      
   $(document).ready(function()
   {
      searchParseURL();
      $('#wb_heased-base').parallax();
      $("#PanelMenu").panel({animate: true, animationDuration: 200, animationEasing: 'linear', dismissible: true, display: 'push', position: 'top'});
   });
      
   $(window).scroll(function () {
       if( $(window).scrollTop() > $('#header-nav').offset().top && !($('#header-nav').hasClass('posi'))){
       $('#header-nav').addClass('posi');
       } else if ($(window).scrollTop() == 0){
       $('#header-nav').removeClass('posi');
       }
   });
      
   $(window).scroll(function () {
       if( $(window).scrollTop() > $('.fader').offset().top && !($('.fader').hasClass('posi2'))){
       $('.fader').addClass('posi2');
       } else if ($(window).scrollTop() == 0){
       $('.fader').removeClass('posi2');
       }
   });
   
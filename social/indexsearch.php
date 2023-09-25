<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Autocomplete textbox using jQuery, PHP and MySQL by CodexWorld</title>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'search.php'
    });
  });
  </script>
</head>
<body>
 
<div class="ui-widget">
  <label for="skills">Skills: </label>
  <input type="text" class="search-query form-control" placeholder="Search" id="skills" />
  
</div>
</body>
</html>
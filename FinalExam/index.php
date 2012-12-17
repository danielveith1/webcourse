<?php
require_once ('/home/veithd1/WWW/2012webcourse/FinalExam/inc/functions.php');
?>
<!doctype html>
 
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Autocomplete</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css" />
    
</head>
<body>
 <?
 $id = 'ba'; 
 $result = AutoSearch($id); 

 echo json_encode($result);
 flush();
 ?>
<div class="ui-widget">
    <label for="tags">Tags: </label>
    <input id="tags" />
</div>
 
 <script>
           
        $( "#tags" ).autocomplete({
            source: index.php
        });
    
    </script>
</body>
</html>
<?php
require_once ('/home/veithd1/WWW/2012webcourse/FinalExam/inc/functions.php');


  
 $result = AutoSearch($id); 
 echo json_encode($result);
 flush();

?>
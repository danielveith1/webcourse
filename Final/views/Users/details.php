<?
require_once ('../../models/Users.php');
$row = Users::Get($_REQUEST['id']);
?>


<!DOCTYPE html>
<html lang="en">
        <? include('../../inc/head.php'); ?>
        <body>
                <div>
                        <? include('../../inc/nav.php'); ?>

                        <div id="content" class="form-horizontal">
                                <br style="clear: both" />
                                <div class="control-group">
                                        <label class="control-label">First Name:</label>
                                        <div class="controls"><?=$row['firstName']?></div>
                                </div>
                                
                                <div class="control-group">
                                        <label class="control-label">Last Name:</label>
                                        <div class="controls"><?=$row['lastName']?></div>
                                </div>
                        
                                <div class="control-group">
                                        <label class="control-label">created_at:</label>
                                        <div class="controls"><?=$row['created_at']?></div>
                                </div>
                        
                        
                        </div>
                        <? include('../../inc/footer.php'); ?>
                </div>
        </body>
</html>

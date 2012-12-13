<?
require_once ('../../models/Users.php');

if(isset($_POST['userNumber']))
{
        $row = $_POST;
        $response = Users::Update($row);
        if($response === true)
                header("Location: index.php");
}else{
        $row = Users::Get($_REQUEST['userNumber']);
}




?>


<!DOCTYPE html>
<html lang="en">
        <? include('../../inc/head.php'); ?>
        <body>
                <div>
                        <? include('../../inc/nav.php'); ?>

                        <div id="content">
                                
                                <? if(isset($response)): ?>
                                        <dl class="dl-horizontal error">
                                                <? foreach ($response as $key => $value) { ?>
                                                        <dt><?=$key?></dt>
                                                        <dd><?=$value?></dd>
                                                <? } ?>                                         
                                        </dl>
                                <? endif; ?>
                                <form class="form-horizontal" action="" method="post">
                                        <input type="hidden" name="id" value="<?=$row['userNumber']?>" />
                                        <div class="control-group">
                                                <label class="control-label" for="firstName">First Name:</label>
                                                <div class="controls">
                                                        <input type="text" name="firstName" id="firstName" value="<?=$row['firstName']?>" />
                                                </div>
                                        </div>
                                        
                                        <div class="control-group">
                                                <label class="control-label">Last Name:</label>
                                                <div class="controls">
                                                        <input type="text" name="lastName" value="<?=$row['lastName']?>" />
                                                </div>
                                        </div>
                                
                                        <div class="control-group">
                                                <label class="control-label">created_at:</label>
                                                <div class="controls">
                                                        <input type="text" name="createdAt" value="<?=$row['createdAt']?>" />
                                                </div>
                                        </div>
                                        <div class="control-group">
                                                <label class="control-label">updated_at:</label>
                                                <div class="controls">
                                                        <input type="text" name="updatedAt" value="<?=$row['updatedAt']?>" />
                                                </div>
                                       
                                        
                                        <div class="control-group">
                                                <div class="controls">
                                                        <input type="submit" value="Save" class="btn btn-primary" />
                                                </div>
                                        </div>
                        
                                </form>

                        </div>
                        <? include('../../inc/footer.php'); ?>
                </div>
        </body>
</html>
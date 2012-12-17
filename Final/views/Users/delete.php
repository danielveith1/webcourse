<?
require_once ('../../models/Users.php');
if(isset($_POST['userNumber']))
{
        $response = Users::Delete($_POST['userNumber']);
        if($response === true)
        {
                header("Location: index.php");
                die();
        }
}
        $row = Users::Get($_REQUEST['id']);
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
                                <form method="post" action="delete.php">
                                        <h2>Are you Sure?</h2>
                                        <p>
                                                Would you like to delete <?=$row['firstName']?> <?=$row['lastName']?>?
                                        </p>
                                        <input type="hidden" name="userNumber" value="<?=$row['userNumber']?>" />
                                    <div class="modal-footer">
                                                <input type="submit" value="Delete" class="btn btn-primary" />
                                        </div>
                                </form>
                               
                        </div>
                        <? include('../../inc/footer.php'); ?>
                </div>
        </body>
</html>

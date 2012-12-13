<?
require_once ('../../models/Users.php');
$row = Users::Get($_REQUEST['userNumber']);
?>


<!DOCTYPE html>
<html lang="en">
        <? include('../../inc/head.php'); ?>
        <body>
                <div>
                        <? include('../../inc/nav.php'); ?>

                        
                        <div id="content" class="dl-horizontal">
                                                      
                                 
                                <dl>
                                        <dt>First Name:</dt>
                                        <dd><?=$row['firstName']?></dd>
                                </dl>
                                <dl>
                                        <dt>Last Name:</dt>
                                        <dd><?=$row['lastName']?></dd>
                                </dl>
                                <dl>
                                        <dt>Created at:</dt>
                                        <dd><?=$row['createdAt']?></dd>
                                </dl>
                                <dl>
                                        <dt>Upated at:</dt>
                                        <dd><?=$row['updatedAt']?></dd>
                                </dl>
                                <dl>
                                        <dt>User Number:</dt>
                                        <dd><?=$row['userNumber']?></dd>
                                </dl>
                        
                        
                        </div>
                        <? include('../../inc/footer.php'); ?>
                </div>
        </body>
</html>

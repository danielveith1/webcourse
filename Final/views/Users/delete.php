<?
require_once ('../../models/Users.php');
$results = Users::GetAll();
?>


<!DOCTYPE html>
<html lang="en">
        <? include('../../inc/head.php'); ?>
        <body>
                <div>
                        <? include('../../inc/nav.php'); ?>

                        <div id="content">



                                
                        </div>
                        <? include('../../inc/footer.php'); ?>
                </div>
        </body>
</html>

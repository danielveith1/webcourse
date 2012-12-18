<?
require_once ('../../models/Accounts.php');
if(isset($_POST['email']))
        DoLogin($_POST['email'],$_POST['password']);
?>

<!DOCTYPE html>
<html lang="en">
        <? include('../../inc/head.php'); ?>
        <body>
                <div>
                        <? include('../../inc/nav.php'); ?>

                        <div id="content">
                                <form class="form-inline" action="<?=$rootUrl?>/views/Accounts/login.php" method="post">
                                        <input type="text" name="email" placeholder="Email or Phone Number" />
                                        <input type="text" name="password" placeholder="Password" />
                                        <input class="btn" type="submit" value="Login" />
                                </form>
                        </div>
                        <? include('../../inc/footer.php'); ?>
                </div>
        </body>
</html>
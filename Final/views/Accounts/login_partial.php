<?
require_once ('../../models/Accounts.php');
$user = User();
?>

<? if(IsLoggedIn()): ?>
        <span>
                Welcome <?=$user['FirstName']?>
                (<a href="">not you?</a> )
        </span>
<? else: ?>
        <form action="<?=$rootUrl?>/views/Accounts/login.php" method="post">
                <input name="email" placeholder="Email or Phone Number" />
                <input name="password" placeholder="Password" />
                <input type="suubmit" value="Login" />
        </form>
<? endif; ?>
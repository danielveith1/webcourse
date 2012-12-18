<?
require_once ('../../models/Users.php');
require_once ('../../models/Logins.php');
require_once ('../../models/Accounts.php');
RequireLogin();
$results = Users::GetAll();

?>


<!DOCTYPE html>
<html lang="en">
        <? include('../../inc/head.php'); ?>

        <body>
                <div>
                        <? include('../../inc/nav.php'); ?>

                        <div id="content">
                                <? if(isset($_GET['inserted'])): ?>
                                    <div class="alert alert-success">
                                            <button type="button" class="close">×</button>
                                            A user has been successfuly added.
                                    </div>
                                    <div class="alert">
                                            <button type="button" class="close">×</button>
                                            A user has been successfuly added.
                                    </div>
                                <? endif; ?>
                                <a href="edit.php">+ Create New</a>
                               
                                <table class="table table-bordered table-condensed table-hover table-striped">
                                        <tr>
                                                <th>First Name</th><th>Last Name</th><th>Actions</th>
                                        </tr>
                                       
                                        <? while($row = $results->fetch_assoc()): ?>
                                                <tr class="<?= isset($_GET['inserted']) && $row['userNumber'] == $_GET['inserted'] ? 'error' : '' ?>">
                                                        <td><?=$row['firstName']?></td> <td><?=$row['lastName']?> </td>
                                                        <td>
                                                                <a href="details.php?id=<?=$row['userNumber']?>">Details</a>
                                                                <a href="edit.php?id=<?=$row['userNumber']?>">Edit</a>
                                                                <a href="delete.php?id=<?=$row['userNumber']?>">Delete</a>
                                                        </td>                                  
                                                </tr>
                                        <? endwhile; ?>

                                       
                                </table>
                               
                        </div>
                                                <? include('../../inc/footer.php'); ?>
                       
                </div>
                 <script type="text/javascript">
                        $(function(){
                                $(".close").click(function(){
                                        $(this).closest(".alert").slideUp();
                                });
                                $(".error").removeClass('error', 'slow');
                        });
                </script>

        </body>
</html>


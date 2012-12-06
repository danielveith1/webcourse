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
                                <table class="table table-bordered table-condensed table-hover table-striped">
                                        <tr>
                                                <th>First Name</th><th>Last Name</th><th>Actions</th>
                                        </tr>
                                        
                                        <? while($row = $results->fetch_assoc()): ?>
                                                <tr>
                                                        <td><?=$row['firstName']?></td> <td><?=$row['lastName']?> </td>
                                                        <td>
                                                                <a href="#">Details</a>
                                                                <a href="#">Edit</a>
                                                                <a href="#">Delete</a>
                                                        </td>                                   
                                                </tr>
                                        <? endwhile; ?>
                                        
                                </table>
                                
                        </div>
						<? include('../../inc/footer.php'); ?>
                        
                </div>
        </body>
</html>
<?
require_once ('models/Users.php');
$results = Users::GetAll();
require_once ('inc/functions.php');
$testConn = GetConnection();
/*
 * if(admin){
 * build admin options
 * }
 * else{
 * build customer options
 * }
 * 
 */

?>
<!DOCTYPE html>
<html lang="en">
       <? include('inc/head.php'); ?>

        <body>
                <div>
                        <header>
                                <h1>Index</h1>
                        </header>
                        <nav>
                                <p>
                                        <a href="/">Home</a>
                                </p>
                                <p>
                                        <a href="/contact">Contact</a>
                                </p>
                        </nav>

                        <div id="content">
                                <table class="table table-bordered table-condensed table-hover table-striped">
                                        <tr>
                                                <th>User Number</th><th>First Name</th><th>Last Name</th> <th>User Type Number</th><th>Actions</th>
                                        </tr>
                                       
                                        <? while($row = $results->fetch_assoc()): ?>
                                                <tr>
                                                        <td><?=$row['userNumber']?></td> <td><?=$row['firstName']?></td> <td><?=$row['lastName']?> </td> <td><?=$row['userTypeNumber_FK']?></td>
                                                        <td>
                                                                <a href="#">Details</a>
                                                                <a href="#">Edit</a>
                                                                <a href="#">Delete</a>
                                                        </td>                                  
                                                </tr>
                                        <? endwhile; ?>
                                       
                                </table>
                               
                        </div>
<?

$SQLQuery1 = "SELECT MAX(userNumber) from Users";
$ResultSet2 = mysqli_query($testConn, $SQLQuery1);
if (!$ResultSet2)
    die("<p>Unable to execute the query.</p>");
$Row1 = mysqli_fetch_row($ResultSet2);
echo $Row1[0]+1;  

	

?>

                     <? include('inc/footer.php'); ?>
                </div>
        </body>
</html>

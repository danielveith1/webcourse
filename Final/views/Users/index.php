<?
require_once ('../../models/Users.php');
$results = Users::GetAll();
?>


<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8" />
                <title>Index</title>
                <link type="text/css" rel="stylesheet" href="../../static/css/bootstrap.min.css" />
                <link type="text/css" rel="stylesheet" href="../../static/css/main.css" />
        </head>

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

                        <footer>
                                <p>
                                        &copy; Copyright  by New Paltz
                                </p>
                        </footer>
                </div>
        </body>
</html>
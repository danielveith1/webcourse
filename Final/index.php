<?
        require_once ('inc/functions.php');
        $conn = GetConnection();
        ;
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <meta charset="utf-8" />
                <title>index</title>
        </head>

        <body>
                <div>
                        <header>
                                <h1>index</h1>
                        </header>
                        <nav>
                                <p>
                                        <a href="/">Home</a>
                                </p>
                                <p>
                                        <a href="/contact">Contact</a>
                                </p>
                        </nav>

                        <div>
                                <?=$conn->host_info?>
                        </div>

                        <footer>
                                <p>
                                        &copy; Copyright  by New Paltz
                                </p>
                        </footer>
                </div>
        </body>
</html>


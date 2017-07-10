<?php
/**
 * Created by PhpStorm.
 * User: Amos
 * Date: 7/6/2017
 * Time: 3:53 PM
 */
?>


<html>
    <head>
        <title>Sermon Central Offline</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <link href="/css/styles.css" rel="stylesheet">
    </head>
    <body style="background-color:snow;">
    <header>
        <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="30px" height="30px"/>Vladimir Pustan</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Acasă <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list.php">Listă predici</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="content" style="margin-top: 10%">
        <center>
            <img src="images/ciresarii.png" />
            <form class="form" action="search.php" method="get">
                <input class="form-control" id="search_panel" name="title" style="width:300px; margin-top: 20px;" type="text" placeholder="Search">
                <button class="btn btn-outline-success" style="margin-top: 10px;" type="submit">Search</button>
            </form>
        </center>
    </div>

    <footer class="footer">
        <div class="container">
            <span class="text-muted"></span>
        </div>
    </footer>
    </body>
</html>

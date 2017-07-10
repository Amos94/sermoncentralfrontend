<?php
/**
 * Created by PhpStorm.
 * User: Amos
 * Date: 7/6/2017
 * Time: 4:24 PM
 */

require_once 'Dbconnection.php';

$db = new Dbconnection();

$title = $_GET['title'];
$title = strtolower($title);
$path = "";


$sql = "SELECT * FROM path";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $path = $row['path'];
    }
}

$path = str_replace('"', "", $path);

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
            <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
                <input class="form-control mr-sm-2" name="title" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</header>

<div class="content">
    <?php

    $sql = "SELECT COUNT(id) AS sermonsNo FROM sermons";
    $total = $db->query($sql);
    $sermonsNo = $total->fetch_object()->sermonsNo;
    $pagesNo = ceil($sermonsNo/25);


    if(isset($_GET['page'])){
        if($_GET['page'] == null){
            $currentPage = 0;
        }else {
            $currentPage = intval($_GET['page']);
        }
    }else{
        $currentPage = 0;
    }


    $offset = $currentPage*25;


    if($currentPage == $pagesNo){
        $nextPage = $pagesNo;
    }else{
        $nextPage = $currentPage+1;
    }

    if($currentPage == 0){
        $previousPage = 0;
    }else{
        $previousPage = $currentPage-1;
    }

    $sql = "SELECT * FROM sermons WHERE title LIKE '%".ucwords($title)."%' LIMIT 25 OFFSET ".$offset;
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table class='table table-striped'>";
        echo "<thead class='thead-default'><td>#</td><td>Titlu predică</td><td>Link către predică</td></thead>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            echo $row['id'];
            echo "</td>";
            echo "<td>";
            echo "<strong>".str_replace('"','',$row['title'])."</strong>";
            echo "</td>";
            echo "<td>";
            echo "<a href='sermon/".str_replace('"','',$row['name_on_disk'])."'><button class='btn btn-primary'>Mergi la predică</button></a>";
            echo "</td>";
            echo"</tr>";
        }
        echo "</table>";
    }
    else{
        echo "<h1>Sfârșitul tabelului</h1>";
    }
    ?>
    </center>
    <center>
        <a href="search.php?title=<?php echo $title;?>&page=<?php echo $previousPage;?>"><button class="btn btn-primary"><</button></a>
        <button class="btn btn-primary"><?php echo $currentPage;?></button>
        <a href="search.php?title=<?php echo $title;?>&page=<?php echo $nextPage;?>"><button class="btn btn-primary">></button></a>
    </center>
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted"></span>
    </div>
</footer>
</body>
</html>

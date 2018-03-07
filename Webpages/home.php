<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        TwoFootball
    </title>
    <link rel="shortcut icon" href="../Images/icon.png"/>
    <link rel="stylesheet" type="text/css" href="../Resources/style.css"/>
    <script src="../Resources/search-engine.js"></script>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
</head>
</html>
<style>
</style>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="" style="display: inline; background-color: darkgreen; color: whitesmoke">
                <img src="../Images/icon.png" style="display: inline; padding: 1%" height="20" width="20"/>
                TwoFootball
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="./home.php">
                    Home
                </a>
            </li>
            <li>
                <a href="./transfers.html">
                    Transfers
                </a>
            </li>
            <li>
                <a href="./news.html">
                    News
                </a>
            </li>
            <li>
                <a href="videos.html">
                    Upcoming Fixtures
                </a>
            </li>
        </ul>
        <div class="navbar-form navbar-right has-feedback">
            <input class="form-control dropdown-toggle" placeholder="Search for clubs, players.."
                   type="text" onkeyup="filter(this.value)" id="search-field" data-toggle="dropdown">
            <i class="glyphicon glyphicon-search form-control-feedback" style="margin-right: 10%; "></i>
            <ul class="dropdown-menu" aria-labelledby="search-field" id="dropmenu">
            </ul>
        </div>
    </div>
</nav>

<section id='title'>
    <div class="jumbotron">
        <h1 align="center">
            Two Football
        </h1>
        <h3 align="center">
            Everything Soccer, Everything here.
        </h3>
    </div>
</section>

<?php
    $uri = 'https://newsapi.org/v2/top-headlines?sources=bbc-sport,fox-sports';
    // $uri = 'http://api.football-data.org/v1/competitions/354/fixtures/?matchday=22';
    // $uri = 'https://heisenbug-premier-league-live-scores-v1.p.mashape.com/api/premierleague/table';
    $reqPrefs['http']['method'] = 'GET';
    $reqPrefs['http']['header'] = "X-Api-Key: 361f413451a94b009d6d23bd194a4d97";
    // $reqPrefs['http']['header'] = "X-Auth-Token: 768e4dd9e5424d79bdefb3e535eb5136";
    // $reqPrefs['http']['header'] = "X-Mashape-Key: zLeZWhIQJYmshzdjfEBZvqfjLFyjp1T4gBAjsn9wQr92HMxkU0";
    // $reqPrefs['http']['header'] = "Accept: application/json";
    $stream_context = stream_context_create($reqPrefs);
    $response = file_get_contents($uri, false, $stream_context);
    $stories = json_decode($response)->articles;
    $first = true; ?>

<!-- Top Stories News API Carousel-->
<div class="container" style="margin-bottom: 1%">
    <h2>
        Top Stories
    </h2>
    <div class="carousel slide" data-ride="carousel" id="myCarousel2">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            
            <?php foreach ($stories as $index=>$entry): ?>
                <?php if($first) {
                    echo "<li class='active' data-slide-to='0' data-target='#myCarousel2'></li>";
                    $first = false;
                } else {
                    echo "<li data-slide-to='$index' data-target='#myCarousel2'></li>";
                }
                ?>
            <?php endforeach; $first = true; ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
        <?php foreach ($stories as $index=>$entry): ?>
        <?php if ((strpos($entry->url, 'football') !== false || strpos($entry->url, 'soccer') !== false ) && $entry->urlToImage): ?>
            <?php if($first) {
                echo "<div class='item active'>";
                $first = false;
            } else {
                echo "<div class='item'>";
            }
            ?>
            <?php echo " <a href='$entry->url'>" ?>
                <?php echo "<img alt='Loading..' src='$entry->urlToImage' style='width:100%;'>" ?>
                <div class="carousel-caption">
                    <h3>
                        <?php echo $entry->description ?>
                    </h3>
                </div>
                </img>
            </a>
            </div>
        <?php endif; ?>
        <?php endforeach; ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" data-slide="prev" href="#myCarousel2">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">
                    Previous
            </span>
        </a>
        <a class="right carousel-control" data-slide="next" href="#myCarousel2">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">
                Next
            </span>
        </a>
    </div>
</div>

<br><br><hr>
<div class="container">
    <h2>
        Standings
    </h2>

    <?php 
    // $table = json_decode($response)->records;
    
    // foreach($table as $entry)
    // {
    // echo $entry->team . '<br>';
    // echo $entry->points . '<br>';
    // }

    // if (count($table) > 0) {
    //     echo '<table class="table table-striped">';
    //     echo'<thead class="thead-dark">';
    //     echo'<tr>';
    //     echo  '<th scope="col">#</th>';
    //     echo  '<th scope="col">Team</th>';
    //     echo  '<th scope="col">Played</th>';
    //     echo  '<th scope="col">Won</th>';
    //     echo  '<th scope="col">Drawn</th>';
    //     echo  '<th scope="col">Lost</th>';
    //     echo  '<th scope="col">Goals For</th>';
    //     echo  '<th scope="col">Goals Against</th>';
    //     echo  '<th scope="col">Points</th>';
    //     echo'</tr>';
    //     echo'</thead>';
    //     echo'<tbody>';

    //     foreach ($table as $index=>$entry) {

    //         echo "<tr>";
    //         echo "<td>$index</td>";
    //         echo "<td>$entry->team</td>";
    //         echo "<td>$entry->played</td>";
    //         echo "<td>$entry->win</td>";
    //         echo "<td>$entry->draw</td>";
    //         echo "<td>$entry->loss</td>";
    //         echo "<td>$entry->goalsFor</td>";
    //         echo "<td>$entry->goalsAgainst</td>";
    //         echo "<td>$entry->points</td>";
    //         echo "</tr>";
    //     }
    //     echo"</tbody>";
    //     echo "</table>";
    // }
    ?>
</div>

<br><br><hr>


<!-- TOP Stories OG Carousel - Uncomment if required -->
<!-- <div class="container">
    <h2>
        Top Stories
    </h2>
    <div class="carousel slide" data-ride="carousel" id="myCarousel">
        <!-- Indicators -->
        <!-- <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#myCarousel">
            </li>
            <li data-slide-to="1" data-target="#myCarousel">
            </li>
            <li data-slide-to="2" data-target="#myCarousel">
            </li>
        </ol> -->
        <!-- Wrapper for slides -->
        <!-- <div class="carousel-inner">
            <div class="item active">
                <img alt="NA" src="../Images/AnthonyM.jpg" style="width:100%;">
                <div class="carousel-caption">
                    <h3 class="carhead">
                        MARTIAL A MAKEWEIGHT IN ALEXIS BID
                        Manchester United are closing in on a move for Alexis Sanchez from Arsenal and could throw in
                        Anthony Martial as part of a deal for the Chile international.
                    </h3>
                </div>
                </img>
            </div>
            <div class="item">
                <img alt="NA" src="../Images/liverpoolCity.jpg" style="width:100%;">
                <div class="carousel-caption">
                    <h3 class="carhead">
                        Manchester City 1 Liverpool 4, match report: Calamity for City as Liverpool demolish them in
                        their own backyard
                    </h3>
                    <p>
                    </p>
                </div>
                </img>
            </div>
            <div class="item">
                <img alt="New York" src="../Images/realM.jpg " style="width:100%;">
                <div class="carousel-caption">
                    <h3 class="carhead">
                        Gareth Bale given standing ovation as Real Madrid thrash Deportivo
                    </h3>
                    <p>
                    </p>
                </div>
                </img>
            </div>
        </div> -->
        <!-- Left and right controls -->
        <!-- <a class="left carousel-control" data-slide="prev" href="#myCarousel">
                <span class="glyphicon glyphicon-chevron-left">
                </span>
            <span class="sr-only">
                    Previous
                </span>
        </a>
        <a class="right carousel-control" data-slide="next" href="#myCarousel">
                <span class="glyphicon glyphicon-chevron-right">
                </span>
            <span class="sr-only">
                    Next
                </span>
        </a>
    </div>
</div> -->

</body>

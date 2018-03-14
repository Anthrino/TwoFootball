<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
    Transfers
  </title>
  <meta charset="utf-8">
  <link href="../Images/icon.png" rel="shortcut icon"/>
  <link href="../Resources/style.css" rel="stylesheet" type="text/css"/>
  <script src="../Resources/search-engine.js">
  </script>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet"/>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
  </meta>
  </meta>
  <style type="text/css">
    #icon_container {
      text-align: justify;
    }

    div img {
      display: inline-block;

    }

    div:after {
      content: '';
      display: inline-block;
      width: 100%;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="" style="display: inline; background-color: darkgreen; color: whitesmoke">
        <img height="20" src="../Images/icon.png" style="display: inline; padding: 1%" width="20"/>
        TwoFootball
      </a>
    </div>
    <ul class="nav navbar-nav">
      <li>
        <a href="./home.php">
          Home
        </a>
      </li>
      <li class="active">
        <a href="./transfers.php">
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
      <input class="form-control dropdown-toggle" data-toggle="dropdown" id="search-field" onkeyup="filter(this.value)"
             placeholder="Search for clubs, players.." type="text">
      <i class="glyphicon glyphicon-search form-control-feedback" style="margin-right: 10%; ">
      </i>
      <ul aria-labelledby="search-field" class="dropdown-menu" id="dropmenu">
      </ul>
      </input>
    </div>
  </div>
</nav>
<div class="w3-container">
  <h2 align="center">
    Latest Transfer Roundup
  </h2>
  <?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "twofootball";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * from transfers";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  $GLOBALS['title'] = $row["title"];
  $GLOBALS['playerimg'] = $row["playerimg"];
  $GLOBALS['fromclubimg'] = $row["fromclubimg"];
  $GLOBALS['toclubimg'] = $row["toclubimg"];
  $GLOBALS['link'] = $row["link"];

  ?>

  <center>
    <div class="w3-card-4" style="width:75%">
      <header class="w3-container hf">
        <h1>
          <?php echo $GLOBALS["title"] ?>
        </h1>
      </header>
      <div class="w3-container">
        <p>
          <a href="<?php echo $GLOBALS['link'] ?>">
            <img src="<?php echo $GLOBALS['playerimg'] ?>" height="50%" width="50%">
          </a>

        </p>
      </div>
      <footer class="w3-container hf">
        <center>
          <div calss="icon_container">
            <img src="<?php echo $GLOBALS['fromclubimg'] ?>" alt="" width="10%" height="10%"/>
            <img src="../Images/transfers.png" alt="" width="10%" height="10%"/>
            <img src="<?php echo $GLOBALS['toclubimg'] ?>" alt="" width="10%" height="10%"/>
          </div>
        </center>

      </footer>
    </div>
  </center>
  <?php
  }
  } else {
  echo "0 results";
  }
  $conn->close();
  ?>

</body>
</html>
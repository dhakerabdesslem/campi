<?php
error_reporting(0);
ini_set('display_errors', 0);
include 'db.php';
$sql = "SELECT * FROM produits";
$result = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
      Campi - the most comprehensive resource for beautiful private campsites.
    </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
     .jumbotron {
      margin-bottom: 0;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>CAMPI</h1>      
    <p>the most comprehensive resource for beautiful private campsites.</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">CAMPI</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Products</a></li>

      </ul>
    </div>
  </div>
</nav>


<div class="container">    
  <div class="row">
    <?php if (mysqli_num_rows($result) > 0) {
      while($res = mysqli_fetch_assoc($result)) {
        ?>
    <div class="col-sm-4">
      <div class="panel panel-<?= $res['type'] ?>">
        <div class="panel-heading"><?= $res['name']?></div>
        <div class="panel-body"><img src="<?= $res['image']?>" class="img-responsive" alt="Image"></div>
        <div class="panel-footer"><?= $res['description'] ?></div>
      </div>
    </div>
    <?php }}?>
  </div>
</div>

</body>
</html>

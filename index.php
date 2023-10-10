<?php
$produits = array(
  array('name' => 'Tente de camping', 'description' =>'Tente de camping - 2 seconds - 3 places', 'image' => 'img/tente.webp', 'type' =>'primary'),
  array('name' => 'Chaise basse pliante de camping', 'description' =>'Chaise basse pliante de camping mh100 jaune', 'image' => 'img/chaise.webp', 'type' =>'success'),
  array('name' => 'Tente de camping', 'description' =>'Tente de camping - 2 seconds - 3 places', 'image' => 'img/hamac.webp', 'type' =>'danger'),
  array('name' => 'Nordisk Oppland 3 SI Tente', 'description' =>'Oppland 3 SI est construit sur une construction de tunnel aérodynamique qui offre une excellente résistance à la déchirure', 'image' => 'img/nordisk.jpg', 'type' =>'warning'),
  array('name' => 'Carinthia XP Top Sac de couchage', 'description' =>'Sac de couchage G-Loft avec un matériau isolant de 135g/m2.', 'image' => 'img/carinthia.jpg', 'type' =>'info'),
  array('name' => 'Outwell Casilda Chaise', 'description' =>'Ces chaises en demi-lune sont un peu plus grandes et confortables que les chaises rondes classiques.', 'image' => 'img/outwell.jpg', 'type' =>'primary'),

);
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
    <?php foreach ($produits as $key => $produit) { ?>
    <div class="col-sm-4">
      <div class="panel panel-<?= $produit['type'] ?>">
        <div class="panel-heading"><?= $produit['name']?></div>
        <div class="panel-body"><img src="<?= $produit['image']?>" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer"><?= $produit['description'] ?></div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

</body>
</html>

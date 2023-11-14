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
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

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
      <a class="navbar-brand" href="/">CAMPI</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a data-toggle="modal"
                data-target="#ajouterproduit">add produit</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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

    <!-- ***** Add Produit ***** -->
    <div
      class="modal fade"
      id="ajouterproduit"
      tabindex="-1"
      role="dialog"
      aria-labelledby="ajouterproduitLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ajouterproduitLabel">Ajoute un produit</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form-pay" method="post" action="add.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name" class="col-form-label">Name :</label>
                <input
                  type="text"
                  class="form-control"
                  name="name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="description" class="col-form-label">Description :</label>
                <textarea class="form-control"  name="description" rows="5" id="description" required></textarea>

              </div>
              <div class="form-group">
                <label for="prix" class="col-form-label">Prix :</label>
                <input type="text" class="form-control" id="prix" placeholder="Enter prix" name="prix" required>
              </div>
              <div class="form-group">
                <label for="image" class="col-form-label">Select image :</label>
                <input type="file" id="image" class="form-control" name="image" accept="image/png, image/jpeg" value="" required>
              </div>
              <div class="form-group">
                <label for="image" class="col-form-label">Select Type :</label>
                <select class="form-control" id="type" name="type">
    <option value="success">success</option>
    <option value="danger">danger</option>
    <option value="info">info</option>
    <option value="primary">primary</option>
  </select>
</div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-danger"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-success">Ajoute le produit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
</body>
</html>

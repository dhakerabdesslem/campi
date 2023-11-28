<?php
error_reporting(1);
ini_set('display_errors', 1);

include "./assets/database/db.php";

if (isset($_POST) && $_POST) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $prix = $_POST['prix'];
    $type = $_POST['type'];
    $target_dir = "./assets/images/produits/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO produits (name, description, prix,image, type)
    VALUES ('$name', '$description','$prix', '$target_file', '$type')";
    $X = mysqli_query($db, $sql);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
      Campi.tn - the most comprehensive resource for beautiful private campsites.
    </title>

</head>
<body>
<?php include "./navbar.php";?>
<div class="container">    
<form method="post" action="add.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name">Nom</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Enter nom" required>
  </div>
  <div class="form-group">
  <label for="description">Description :</label>
  <textarea class="form-control"  name="description" rows="5" id="description" aria-describedby="descriptionHelp" placeholder="Enter description" required></textarea>
  </div>
  <div class="form-group">
  <label for="prix">Prix :</label>
  <input type="text" class="form-control" id="prix" placeholder="Enter prix" aria-describedby="prixHelp" placeholder="Enter prix" name="prix" required>
  </div>
  <div class="form-group">
  <label for="image" >Select image :</label>
  <input type="file" id="image" class="form-control" name="image" accept="image/png, image/jpeg" aria-describedby="imgHelp" value="" required>
  </div>
  <div class="form-group">
  <label for="image" aria-describedby="typeHelp">Select Type :</label>
    <select class="form-control" id="type" name="type">
    <option value="success">success</option>
    <option value="danger">danger</option>
    <option value="info">info</option>
    <option value="primary">primary</option>
  </select>
  </div>
  <button type="submit" class="btn btn-primary">Ajoute produit</button>
</form>
</div>
</body>
</html>
<script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
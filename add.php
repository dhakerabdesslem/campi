<?php
// error_reporting(1);
// ini_set('display_errors', 1);

include 'db.php';

if (isset($_POST) && $_POST) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $prix = $_POST['prix'];
    $type = $_POST['type'];

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO produits (name, description, prix,image, type)
    VALUES ('$name', '$description',$prix, '$target_file', '$type')";
    $X = mysqli_query($db, $sql);
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>add produit | campi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>ajout un produit</h2>
  <form action="add.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="name">name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control"  name="description" rows="5" id="description"></textarea>
    </div>
    <div class="form-group">
    <label for="image">Select image:</label>
  <input type="file" id="image" name="image" accept="image/png, image/jpeg" value="">
    </div>
    <div class="form-group">
      <label for="prix">Prix:</label>
      <input type="number" class="form-control" id="prix" placeholder="Enter prix" name="prix">
    </div>

    <div class="form-group">
  <label for="type">Type:</label>
  <select class="form-control" id="type" name="type">
    <option value="success">success</option>
    <option value="danger">danger</option>
    <option value="info">info</option>
    <option value="primary">primary</option>
  </select>
</div>
    <button type="submit" class="btn btn-default">add</button>
  </form>
</div>

</body>
</html>

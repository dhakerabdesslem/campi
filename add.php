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

    $target_dir = "C:\\xampp\htdocs\campi\img\uploads\\";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    if ($name != NULL && $description != NULL && $image != NULL && $prix != NULL && $type!= NULL){
        $sql = "INSERT INTO produits (name, description, prix,image, type)
        VALUES ('$name', '$description',$prix, '$image', '$type')";
        $X = mysqli_query($db, $sql);
    } else {
        echo "Post request empty";
        die;
    }
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

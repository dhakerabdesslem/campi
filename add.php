<?php
session_start();
error_reporting(1);
ini_set('display_errors', 1);

include "./assets/database/db.php";

if (isset($_SESSION["id"]) && $_SESSION["id"]) {
  $sql = "SELECT * FROM `users` WHERE id=".$_SESSION["id"];
  $result = mysqli_query($db, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($res = mysqli_fetch_assoc($result)) {
    if($res["role"] != "admin"){ 
      header("Location: ./login.php");
      setcookie("ref", $_SERVER['REQUEST_URI'] , time() + (86400 * 30) ,"/");
      die();
    }
    }
  
  }
}else{
  header("Location: ./login.php");
  setcookie("ref", $_SERVER['REQUEST_URI'] , time() + (86400 * 30) ,"/");
  die();
}

if (isset($_POST) && $_POST) {
  
  function imageToBase64($imagePath) {
    ob_start();
    readfile($imagePath);
    $imageData = ob_get_contents();
    ob_end_clean();

    if ($imageData === false) {
        return false;
    }

    $base64 = base64_encode($imageData);

    return $base64;
}

  if($_POST['categorie'] != ''){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $prix = intval($_POST['prix']);
    $categorie = $_POST['categorie'];
    $sale = intval($_POST['sale']);


      if (isset($_FILES["image"])) {
          $imagePath = $_FILES["image"]["tmp_name"];
  
          if (is_uploaded_file($imagePath)) {
              $base64Image = imageToBase64($imagePath);
  
              if ($base64Image !== false) {
                  echo "Base64 representation of the image: <br>";
                  echo "<textarea rows='10' cols='50'>$base64Image</textarea>";
              } else {
                  echo "Unable to convert the image to base64.";
              }
          } else {
              echo "Invalid file.";
          }
      }
  
  function imageToBase64($imagePath) {
      $fileHandle = fopen($imagePath, 'rb');
  
      if ($fileHandle === false) {
          return false;
      }
  
      $base64 = '';
      while (!feof($fileHandle)) {
          $chunk = fread($fileHandle, 8192);
          $base64 .= base64_encode($chunk);
      }
  
      fclose($fileHandle);
  
      return $base64;
  }



    $target_dir = "./assets/images/produits/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $sql = "INSERT INTO produits (name, description, prix,image, categorie,sale)
    VALUES ('$name', '$description',$prix, '$base64Image', '$categorie',$sale)";
    $X = mysqli_query($db, $sql);
  }
}

?>
<?php include "./navbar.php";?>
<br>
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
  <label for="categorie" aria-describedby="categorieHelp">Select categorie :</label>
    <select class="form-control" id="categorie" name="categorie" required>
    <option value="" hidden>Select categorie</option>
  
    <?php
              $categoriessql = "SELECT * FROM categories";
              $categories = mysqli_query($db, $categoriessql);
              if (mysqli_num_rows($categories) > 0) {
        while ($categoriesres = mysqli_fetch_assoc($categories)) { ?>
              <option value="<?= $categoriesres["id"] ?>"><?= $categoriesres["name"] ?></option>
              <?php }
    } ?>
  </select>
  </div>
  <div class="form-group">
  <label for="sale" aria-describedby="saleHelp">sale :</label>
  <input type="number" class="form-control" id="sale" placeholder="Enter sale" aria-describedby="saleHelp" placeholder="Enter sale" max="99" min="0" name="sale" value="0">
  </select>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Ajoute produit</button>
</form>
</div>
<br>
<script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
<?php include "./footer.php";?>
</body>
</html>

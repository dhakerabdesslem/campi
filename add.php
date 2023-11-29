<?php
error_reporting(1);
ini_set('display_errors', 1);

include "./assets/database/db.php";

if (isset($_POST) && $_POST) {
  if($_POST['categorie'] != ''){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $prix = intval($_POST['prix']);
    $categorie = $_POST['categorie'];
    $sale = intval($_POST['sale']);
    $target_dir = "./assets/images/produits/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    $sql = "INSERT INTO produits (name, description, prix,image, categorie,sale)
    VALUES ('$name', '$description',$prix, '$target_file', '$categorie',$sale)";
    $X = mysqli_query($db, $sql);

  }
}

?>
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
  <input type="number" class="form-control" id="prix" placeholder="Enter prix" aria-describedby="prixHelp" placeholder="Enter prix" name="prix" required>
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
  <label for="sale" aria-describedby="saleHelp">Select sale :</label>
    <select class="form-control" id="sale" name="sale">
    <option value="0">Select sale</option>
    <option value="10">10%</option>
    <option value="15">15%</option>
    <option value="20">20%</option>
    <option value="25">25%</option>
    <option value="30">30%</option>
    <option value="35">35%</option>
    <option value="40">40%</option>
    <option value="45">45%</option>
    <option value="50">50%</option>
    <option value="55">55%</option>
    <option value="60">60%</option>
    <option value="65">65%</option>
    <option value="70">70%</option>
    <option value="75">75%</option>
    <option value="80">80%</option>
    <option value="85">85%</option>
    <option value="90">90%</option>
    <option value="95">95%</option>
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
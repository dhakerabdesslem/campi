<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0);
include "./assets/database/db.php";

if (isset($_GET['keyword']) && $_GET['keyword']) {
$sql = "SELECT * FROM produits WHERE name LIKE '%".$_GET['keyword']."%'";
$result = mysqli_query($db, $sql);
}else{
$sql = "SELECT * FROM produits";
$result = mysqli_query($db, $sql);
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
  <div class="row">
    <?php if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_assoc($result)) { ?>
    <div class="col-sm-4">
      <div class="panel panel-<?= $res["type"] ?>">
        <div class="panel-heading"><?= $res["name"] ?></div>
        <div class="panel-body"><img src="<?= $res[
            "image"
        ] ?>" class="img-responsive" alt="Image"></div>
        <div class="panel-footer"><?= $res["description"] ?></div>
      </div>
    </div>
    <?php }
    } ?>
  </div>
</div>
    </div>
    <script src="script.js"></script>
</body>
</html>

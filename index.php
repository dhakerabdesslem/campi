<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0);
include "./assets/database/db.php";

if ((isset($_GET['keyword']) && $_GET['keyword']) && (isset($_GET['category']) && $_GET['category'])) {
  if($_GET['category'] != 'all') {
    $sql = "SELECT * FROM produits WHERE name LIKE '%".$_GET['keyword']."%' AND categorie LIKE '%".$_GET['category']."%'";
    $result = mysqli_query($db, $sql);
  }else{
    $sql = "SELECT * FROM produits WHERE name LIKE '%".$_GET['keyword']."%'";
    $result = mysqli_query($db, $sql);
  }
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
    <link href="./assets/css/style2.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body>
<?php include "./navbar.php";?>
<section class="py-5">
<?php if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_assoc($result)) { ?>
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <img class="card-img-top" src="<?= $res["image"] ?>" alt="<?= $res["name"] ?>" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?= $res["name"] ?></h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <span class="text-muted text-decoration-line-through"><?= intval($res["prix"])+15; ?></span>
                                    <?= $res["prix"] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
    } ?>
        </section>
</body>
</html>

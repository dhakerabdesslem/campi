<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0);
include "./assets/database/db.php";
if ((isset($_GET['produit']) && $_GET['produit'])) {
    $id_produit = intval($_GET['produit']);
    $category = intval($_GET['category']);
    $sql = "SELECT * FROM produits where id=".$id_produit;
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) < 1) {
        header("Location: /");
    }
    $sqlcat = "SELECT  * FROM produits where categorie=".$category." AND id!=".$id_produit." LIMIT 4";
    $resultcat = mysqli_query($db, $sqlcat);
}else{
    header("Location: /");
}
?>
<?php include "./navbar.php";?>
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
               <?php 
               while ($res = mysqli_fetch_assoc($result)) {
                $sale = $res["prix"] - ($res["prix"] * ($res["sale"] / 100)); ?>
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?= $res["image"] ?>" alt="<?= $res["name"] ?>" /></div>
                    <div class="col-md-6">
                            <?php if ($res['sale'] != 0) { ?>
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <?php } ?>
                        <h1 class="display-5 fw-bolder"><?= $res["name"] ?></h1>
                        <div class="fs-5 mb-5">
                        <?php if ($res['sale'] != 0) { ?>
                            <span class="text-decoration-line-through"><?= $res['prix']?>TND</span>
                            <span><?= $sale?>TND</span>
                            <?php }else{ ?>
                                <span><?= $res['prix']?>TND</span>
                        <?php } ?>
                        </div>
                        <p class="lead"><?= $res["description"] ?></p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                    <?php }?>
    </div>
                </div>

            </div>
            
        </section>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Produits Connexes</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php while ($rescat = mysqli_fetch_assoc($resultcat)) {
                $salecat = $rescat["prix"] - ($rescat["prix"] * ($rescat["sale"] / 100)); ?>
                    <div class="col mb-5">      
                        <div class="card h-100">
                            <?php if ($rescat['sale'] != 0) { ?>
                                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <?php } ?>
                            <img class="card-img-top" src="<?= $rescat["image"] ?>" alt="<?= $rescat["name"] ?>" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?= $rescat["name"] ?></h5>
                                    <?php if ($rescat['sale'] != 0) { ?>
                                    <span class="text-muted text-decoration-line-through"><?= $rescat["prix"];?></span>
                                    <?= $salecat?>TND
                                    <?php }else{ ?>
                                    <?= $rescat['prix']?>TND
                                   <?php } ?>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="./produit.php?produit=<?= $rescat['id']?>&category=<?= $rescat['categorie']?>">View Produit</a></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php include "./footer.php";?>
<?php


?>
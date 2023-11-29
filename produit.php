<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0);
include "./assets/database/db.php";

if ((isset($_GET['produit']) && $_GET['produit'])) {
    $id_produit = intval($_GET['produit']);
    $sql = "SELECT * FROM produits where id=".$id_produit;
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) < 1) {
        header("Location: /");
    }
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
        <?php
        $sqlRelated = "SELECT * FROM produits";
        $resultRelated = mysqli_query($db, $sqlsqlRelated);
        if (mysqli_num_rows($resultRelated) > 0) { ?>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php while ($resRelated = mysqli_fetch_assoc($resultRelated)) {
          $saleRelated = $resRelated["prix"] - ($resRelated["prix"] * ($resRelated["sale"] / 100)); ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                        <?php if ($resRelated['sale'] != 0) { ?>
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <?php } ?>
                            <img class="card-img-top" src="<?= $resRelated["image"] ?>" alt="<?= $resRelated["name"] ?>" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?= $resRelated["name"] ?></h5>
                                    <?php if ($resRelated['sale'] != 0) { ?>
                                    <span class="text-muted text-decoration-line-through"><?= $resRelated['prix']?></span>
                                    <?= $saleRelated ?>
                                    <?php }else{ ?>
                                        <?= $resRelated['prix']?>TND
                                        <?php } ?>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="?produit=<?= $resRelated['id']?>">Add to cart</a></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php }?>
        <?php include "./footer.php";?>
<?php


?>
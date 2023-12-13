<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0);
include "./assets/database/db.php";

if (isset($_POST) && $_POST) {
        $sql = "INSERT INTO `review` (`rating`, `comment`,`id_user`,`id_produit`) VALUES ('" . $_POST['rating'] . "', '" . $_POST['review'] . "'," . $_SESSION['id'] . ",".intval($_GET['produit']).");";
        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

if ((isset($_GET['produit']) && $_GET['produit'])) {
    $id_produit = intval($_GET['produit']);
    $category = intval($_GET['category']);

    //review
    $reviewsql = "SELECT * FROM review WHERE id_produit=".$id_produit;
    $reviewresult = mysqli_query($db, $reviewsql);

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
    <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                    <?php 
                                        if (mysqli_num_rows($reviewresult) > 0) {
                                            while($reviewrow = mysqli_fetch_assoc($reviewresult)) { ?>
                                                <div class="d-flex">
                                                    <div class="">
                                                        <p class="mb-2" style="font-size: 14px;"><?= $reviewrow['date'] ?></p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex mb-3">
                                                                <?php for($i=0; $i < 5; $i++ ){
                                                                    if ($i < $reviewrow['rating'] ){ ?>
                                                                    <i class="fa fa-star text-secondary"></i>
                                                                    <?php } else { ?> 
                                                                        <i class="fa fa-star"></i>
                                                                <?php }} ?>
                                                            </div>
                                                        </div>
                                                        <p><?= $reviewrow['comment'] ?></p>
                                                    </div>
                                                </div>
                                        <?php }
                                        } else {
                                            echo "0 reviews";
                                        }
                                    ?>
                                </div>
                </div>
                <form method="POST">
                            <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="review" id="message" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3">Please rate:</p>
                                            <input type="number" name="rating" id="rating">
                                            <div class="d-flex align-items-center" style="font-size: 12px;">
                                                <i class="fa fa-star text-muted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <button class="btn border border-secondary text-primary rounded-pill px-4 py-3" type="submit">Post Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>

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
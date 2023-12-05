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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<style>
    @charset "UTF-8";
@import url("https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap");
@import url("https://fonts.googleapis.com/css2?family=Potta+One&display=swap");
* {
  box-sizing: border-box;
}

html {
  font-size: 6.25vmax;
}
@media (max-width: 992px) {
  html {
    font-size: 60px;
  }
}



.wrapper {
  width: 6rem;
  padding: 0.3rem 0.6rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.3rem;
  border-radius: 0.25rem;
  box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.2);
  background-color: rgba(255, 255, 255, 0.5);
  z-index: 1;
}
.wrapper .title {
  font-weight: bold;
  font-size: 0.36rem;
}
.wrapper .content {
  line-height: 1.6;
  color: #555;
}

.rate-box {
  display: flex;
  flex-direction: row-reverse;
  gap: 0.1rem;
}
.rate-box input {
  display: none;
}
.rate-box input:hover ~ .star:before {
  color: rgba(255, 204, 51, 0.5);
}
.rate-box input:active + .star:before {
  transform: scale(0.9);
}
.rate-box input:checked ~ .star:before {
  color: #ffcc33;
  text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3), -3px -3px 8px rgba(255, 255, 255, 0.8);
}
.rate-box .star:before {
  content: "★";
  display: inline-block;
  font-family: "Potta One", cursive;
  font-size: 0.6rem;
  cursor: pointer;
  color: #0000;
  text-shadow: 2px 2px 3px rgba(255, 255, 255, 0.5);
  background-color: #aaa;
  background-clip: text;
  -webkit-background-clip: text;
  transition: all 0.3s;
}

textarea {
  border: none;
  resize: none;
  width: 100%;
  padding: 0.2rem;
  color: inherit;
  font-family: inherit;
  line-height: 1.5;
  border-radius: 0.2rem;
  box-shadow: inset 2px 2px 8px rgba(0, 0, 0, 0.3), inset -2px -2px 8px rgba(255, 255, 255, 0.8);
  background-color: rgba(255, 255, 255, 0.3);
}
textarea::placeholder {
  color: #aaa;
}
textarea:focus {
  outline-color: #ffcc33;
}

.submit-btn {
  padding: 0.2rem 0.5rem;
  box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3), -3px -3px 8px rgba(255, 255, 255, 0.8);
  border-radius: 1rem;
  cursor: pointer;
  background-color: rgba(255, 204, 51, 0.8);
  transition: all 0.2s;
}
.submit-btn:active {
  transform: translate(2px, 2px);
}
</style>
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
                    <div class="wrapper"> 
  <div class="title">Rate your experience</div>
  <div class="content">We highly value your feedback! Kindly take a moment to rate your experience and provide us with your valuable feedback.</div>
  <div class="rate-box">
    <input type="radio" name="star" id="star0"/>
    <label class="star" for="star0"></label>
    <input type="radio" name="star" id="star1"/>
    <label class="star" for="star1"></label>
    <input type="radio" name="star" id="star2" checked="checked"/>
    <label class="star" for="star2"></label>
    <input type="radio" name="star" id="star3"/>
    <label class="star" for="star3"></label>
    <input type="radio" name="star" id="star4"/>
    <label class="star" for="star4"></label>
  </div>
  <textarea cols="30" rows="6" placeholder="Tell us about your experience!"></textarea>
  <div class="submit-btn">Send</div>
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
<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0);
include "assets/database/db.php";
$sql = "SELECT * FROM produits";
$result = mysqli_query($db, $sql);
$categoriessql = "SELECT * FROM categories";
$categories = mysqli_query($db, $categoriessql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
      Campi.tn - the most comprehensive resource for beautiful private campsites.
    </title>
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />
    <link href="/assets/css/style.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://use.fontawesome.com/07b0ce5d10.js"></script>

</head>
<body>
<nav class="topBar">
    <div class="container">
      <ul class="topBarNav pull-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-money mr-5"></i>TND<i class="fa fa-angle-down ml-5"></i>
          </a>
          <ul class="dropdown-menu w-100" role="menu">
            <li><a href="#"><i class="fa fa-money mr-5"></i>TND</a>
            </li>
            <li class=""><a href="#"><i class="fa fa-eur mr-5"></i>EUR</a>
            </li>
            <li><a href="#"><i class="fa fa-usd mr-5"></i>USD</a>
            </li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down ml-5"></i></span> </a>
          <ul class="dropdown-menu w-150" role="menu">
          <?php if (isset($_SESSION["id"]) && $_SESSION["id"]) {
              echo '<li><a href="logout.php">LogOut</a>
            </li>';
          } else {
              echo '<li><a href="login.php">Login</a>
            </li>';
              echo '<li><a href="register.php">Create Account</a>
            </li>';
          } ?>
          
            <li class="divider"></li>
            </li>
            <li><a>My Cart</a>
            </li>
            <li><a>Checkout</a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-shopping-basket mr-5"></i> <span class="hidden-xs">
                                Cart<sup class="text-primary">(0)</sup>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span> </a>
          <ul class="dropdown-menu cart w-250" role="menu">
            <li>
              <div class="cart-items">
                <ol class="items">
                <!--
                    <li>
                    <a href="#" class="product-image"> <img src="" class="img-responsive" alt="Sample Product"> </a>
                    <div class="product-details">
                      <div class="close-icon"> <a href="#"><i class="fa fa-close"></i></a> </div>
                      <p class="product-name"> <a href="#">Lorem Ipsum dolor sit</a> </p> <strong>1</strong> x <span class="price text-primary">$29.99</span> </div>
                  </li>
                  -->
                </ol>
              </div>
            </li>
            <li>
              <div class="cart-footer"> <a href="#" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View
					Cart</a> <a href="#" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a> </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <div class="middleBar">
    <div class="container">
  <div class="row display-table">
    <div class="col-sm-3 vertical-align text-left hidden-xs">
      <a href="/"> <img width="" src="/assets/images/logo.png" alt="campi"></a>
    </div>
    <div class="col-sm-7 vertical-align text-center">
      <form>
        <div class="row grid-space-1">
          <div class="col-sm-6">
            <input type="text" name="keyword" class="form-control input-lg" placeholder="Search">
         </div>
          <div class="col-sm-3">
            <select class="form-control input-lg" name="category">
              <option value="all">All Categories</option>
              <?php
              if (mysqli_num_rows($categories) > 0) {
        while ($categoriesres = mysqli_fetch_assoc($categories)) { ?>
              <option value="<?= $categoriesres["id"] ?>"><?= $categoriesres["name"] ?></option>
              <?php }
    } ?>
            </select>
          </div>
          <div class="col-sm-3">
            <input type="submit" class="btn btn-default btn-block btn-lg" value="Search">
         </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
    
<nav class="navbar navbar-main navbar-default" role="navigation" style="opacity: 1;">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>             
            </div>
        
            <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">            
              <ul class="nav navbar-nav">
                <li><a href="/" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Home</a></li>  
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Page <i class="fa fa-angle-down ml-5"></i></a>
                  <ul class="dropdown-menu dropdown-menu-left">
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="passwordrecovery.php">Password Recovery</a></li>
                  </ul>
                </li>
              
              </ul>
            </div>
          </div>
        </nav>

  <script type="text/javascript">
    ! function($, n, e) {
      var o = $();
      $.fn.dropdownHover = function(e) {
        return "ontouchstart" in document ? this : (o = o.add(this.parent()), this.each(function() {
          function t(e) {
            o.find(":focus").blur(), h.instantlyCloseOthers === !0 && o.removeClass("open"), n.clearTimeout(c), i.addClass("open"), r.trigger(a)
          }
          var r = $(this),
            i = r.parent(),
            d = {
              delay: 100,
              instantlyCloseOthers: !0
            },
            s = {
              delay: $(this).data("delay"),
              instantlyCloseOthers: $(this).data("close-others")
            },
            a = "show.bs.dropdown",
            u = "hide.bs.dropdown",
            h = $.extend(!0, {}, d, e, s),
            c;
          i.hover(function(n) {
            return i.hasClass("open") || r.is(n.target) ? void t(n) : !0
          }, function() {
            c = n.setTimeout(function() {
              i.removeClass("open"), r.trigger(u)
            }, h.delay)
          }), r.hover(function(n) {
            return i.hasClass("open") || i.is(n.target) ? void t(n) : !0
          }), i.find(".dropdown-submenu").each(function() {
            var e = $(this),
              o;
            e.hover(function() {
              n.clearTimeout(o), e.children(".dropdown-menu").show(), e.siblings().children(".dropdown-menu").hide()
            }, function() {
              var t = e.children(".dropdown-menu");
              o = n.setTimeout(function() {
                t.hide()
              }, h.delay)
            })
          })
        }))
      }, $(document).ready(function() {
        $('[data-hover="dropdown"]').dropdownHover()
      })
    }(jQuery, this);
  </script>

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

    <div
      class="modal fade"
      id="ajouterproduit"
      tabindex="-1"
      role="dialog"
      aria-labelledby="ajouterproduitLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ajouterproduitLabel">Ajoute un produit</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form-pay" method="post" action="add.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name" class="col-form-label">Name :</label>
                <input
                  type="text"
                  class="form-control"
                  name="name"
                  required
                />
              </div>
              <div class="form-group">
                <label for="description" class="col-form-label">Description :</label>
                <textarea class="form-control"  name="description" rows="5" id="description" required></textarea>

              </div>
              <div class="form-group">
                <label for="prix" class="col-form-label">Prix :</label>
                <input type="text" class="form-control" id="prix" placeholder="Enter prix" name="prix" required>
              </div>
              <div class="form-group">
                <label for="image" class="col-form-label">Select image :</label>
                <input type="file" id="image" class="form-control" name="image" accept="image/png, image/jpeg" value="" required>
              </div>
              <div class="form-group">
                <label for="image" class="col-form-label">Select Type :</label>
                <select class="form-control" id="type" name="type">
    <option value="success">success</option>
    <option value="danger">danger</option>
    <option value="info">info</option>
    <option value="primary">primary</option>
  </select>
</div>

              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-danger"
                  data-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-success">Ajoute le produit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
</body>
</html>

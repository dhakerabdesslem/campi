<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
      Campi.tn - the most comprehensive resource for beautiful private campsites.
    </title>
<link href="./assets/css3/styles.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
<link rel="icon" type="image/png" href="./assets/images/logo.png" />
</head>
<body>
<div class="main-navbar shadow-sm sticky-top">
        <div class="top-navbar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                        <h5 class="brand-name" href="/">Campi.tn</h5>
                    </div>
                    <div class="col-md-5 my-auto">
                        <form role="search">
                            <div class="input-group">
                                <input type="search" name="keyword" placeholder="Search your product" class="form-control" required/>
                                <button class="btn bg-white" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 my-auto">
                        <ul class="nav justify-content-end">
                        <?php if (isset($_SESSION["id"]) && $_SESSION["id"]) {
                            echo '<li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-shopping-cart"></i> Cart (0)
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fa fa-heart"></i> Wishlist (0)
                                </a>
                            </li>';
                         } ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                <?php if (isset($_SESSION["id"]) && $_SESSION["id"]) {
                                    echo $_SESSION["name"]; }else{
                                        echo "Login / Create Account";
                                    }
                                    
                                    ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if (isset($_SESSION["id"]) && $_SESSION["id"]) {
                                echo '<li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                                <li><a class="dropdown-item" href="./logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>';
                                    } else {
                                echo '<li><a class="dropdown-item" href="./login.php"><i class="fa fa-sign-in"></i>Login</a></li>';
                                echo '<li><a class="dropdown-item" href="./register.php"><i class="fa fa-user"></i>Create Account</a></li>';
                                } ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                Campi.tn
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">All Categories</a>
                        </li>
                        <?php
              $categoriessql = "SELECT * FROM categories";
              $categories = mysqli_query($db, $categoriessql);
              if (mysqli_num_rows($categories) > 0) {
        while ($categoriesres = mysqli_fetch_assoc($categories)) { ?>
        <li class="nav-item">
        <a class="nav-link" href="./index.php?category=<?= $categoriesres["id"] ?>"><?= $categoriesres["name"] ?></a>
        </li>
              <?php }
    } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0);

include "./assets/database/db.php";

if (isset($_SESSION["id"]) && $_SESSION["id"]) {
  header("Location: ./");
  die();
}

if (isset($_POST) && $_POST) {
  $name = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $Password = $_POST['Password'];
    $sql = "INSERT INTO `users` VALUES (NULL,'".$name."','".$prenom."','".$email."','".$password."','client')";
      $result = mysqli_query($db, $sql);
  }

?>
<?php include "./navbar.php";?>
<br>
<div class="container">    
<form method="post" action="register.php">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input type="text" class="form-control" name="nom" id="nom" aria-describedby="nomHelp" placeholder="Enter nom">
  </div>
  <div class="form-group">
    <label for="prenom">Prenom</label>
    <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="prenomHelp" placeholder="Enter prenom">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="Password" class="form-control" name="Password" id="Password" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Registr</button>
</form>
</div>
<br>
<?php include "./footer.php";?>
</body>
</html>

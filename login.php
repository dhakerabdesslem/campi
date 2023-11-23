<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0);
include "assets/database/db.php";
if (isset($_POST) && $_POST) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM `users` WHERE `email` = '".$email."' and `password` = '".$password."'";
  $result = mysqli_query($db, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($res = mysqli_fetch_assoc($result)) {
    $_SESSION['id'] = $res['username'];
    }
    header("Location: /");
    die();
  
  }else{
  $err = "true";
  } 
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
<?php 
  if($err == 'true') {
    echo '<center><div class="alert alert-warning">Login Error!!</div></center>';
  }
     ?>
<form method="post" action="login.php">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
    <small id="passwordHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>

  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>

</body>
</html>
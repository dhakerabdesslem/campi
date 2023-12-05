<?php
session_start();
error_reporting(0);
ini_set("display_errors", 0);
include "./assets/database/db.php";

if (isset($_POST) && $_POST) {
  $name = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $Password = $_POST['Password'];
    $sql = "INSERT INTO `users` VALUES (NULL,'".$name."','".$prenom."','".$email."','".$password."')";
      $result = mysqli_query($db, $sql);
  }

?>
<?php include "./navbar.php";?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>


    h2 {
      font-size: 1.5em;
      line-height: 1.5em;
      margin: 0;
      text-align: center;
      padding-bottom: 15px;
    }

    .input-field {
      display: flex;
      margin-bottom: 20px;
    }

    .input-field i {
      color: #333;
      height: 22px;
      width: 30px;
      padding-top: 10px;
      border: 1px solid #cccccc;
      border-right: none;
      text-align: center;
    }

    .input-field input:hover {
      background: #fafafa;
    }

    .input-field input[type=text],
    .input-field input[type=email],
    .input-field input[type=password] {
      width: 100%;
      padding: 8px 10px;
      height: 35px;
      border: 1px solid #cccccc;
      box-sizing: border-box;
      outline: none;
    }

    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      box-shadow: 0 0 2px 1px rgba(255, 169, 0, 0.5);
      border: 1px solid #f5ba1a;
      background: #fafafa;
    }

    .select-option {
      position: relative;
      width: 100%;
    }

    .select-option select {
      display: inline-block;
      width: 100%;
      height: 35px;
      padding: 0px 15px;
      cursor: pointer;
      color: #7b7b7b;
      border: 1px solid #cccccc;
      border-radius: 0;
      background: #fff;
      appearance: none;
    }

    .select-arrow {
      position: absolute;
      top: calc(50% - 4px);
      right: 15px;
      width: 0;
      height: 0;
      pointer-events: none;
      border-width: 8px 5px 0 5px;
      border-style: solid;
      border-color: #7b7b7b transparent transparent transparent;
    }

    input[type=submit] {
      background: #f5961a;
      height: 35px;
      line-height: 35px;
      width: 100%;
      border: none;
      outline: none;
      cursor: pointer;
      color: #fff;
      font-size: 1.1em;
      margin-bottom: 10px;
    }

    input[type=submit]:hover {
      background: #d17f13;
    }
  </style>
  <div class="container">
    <h2>Registration Form</h2>
    <form action="./register.php" method="post">
      <div class="input-field">
        <i class="fa fa-user"></i>
        <input type="text" name="prenom" placeholder="First Name" required/>
      </div>
      <div class="input-field">
        <i class="fa fa-user"></i>
        <input type="text" name="nom" placeholder="Last Name" required />
      </div>
      <div class="input-field">
        <i class="fa fa-envelope"></i>
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div class="input-field">
        <i class="fa fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <div class="input-field">
        <input type="checkbox" id="terms" required>
        <label for="terms">I agree with terms and conditions</label>
      </div>
      <div class="input-field">
        <input type="checkbox" id="newsletter">
        <label for="newsletter">I want to receive the newsletter</label>
      </div>
      <input class="button" type="submit" value="Register">
    <closeform></closeform></form>
  </div>
  <?php include "./footer.php";?>
</body>
</html>
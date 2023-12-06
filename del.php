<?php
session_start();
error_reporting(1);
ini_set('display_errors', 1);

include "./assets/database/db.php";

if (isset($_SESSION["id"]) && $_SESSION["id"]) {
  $sql = "SELECT * FROM `users` WHERE id=".$_SESSION["id"];
  $result = mysqli_query($db, $sql);
  if (mysqli_num_rows($result) > 0) {
    while($res = mysqli_fetch_assoc($result)) {
    if($res["role"] != "admin"){ 
      header("Location: ./login.php");
      setcookie("ref", $_SERVER['REQUEST_URI'] , time() + (86400 * 30) ,"/");
      die();
    }
    }
  
  }
}else{
  header("Location: ./login.php");
  setcookie("ref", $_SERVER['REQUEST_URI'] , time() + (86400 * 30) ,"/");
  die();
}

if (isset($_POST) && $_POST) {
    $id = $_POST['id'];
    $sql = "DELETE FROM produits WHERE id=".$id;
    $X = mysqli_query($db, $sql);
}
$sql = "SELECT * FROM produits";
$result = mysqli_query($db, $sql);
?>
<?php include "./navbar.php";?>
<br>
<div class="container">
  <h2>Delete un produit</h2>
  <form action="del.php" method="post">
    <div class="form-group">
  <label for="id">Produit :</label>
  <select class="form-control" id="id" name="id">
      <?php if (mysqli_num_rows($result) > 0) {
         while($res = mysqli_fetch_assoc($result)) {
        ?>
    <option value="<?= $res['id']?>"><?= $res['name']?></option>
    <?php }}?>
  </select> 
</div>
<br>
<button type="submit" class="btn btn-primary">Delete produit</button>
  </form>
</div>
<br>

<script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
</script>
<?php include "./footer.php";?>
</body>
</html>
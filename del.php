<?php

include "/assets/database/db.php";

if (isset($_POST) && $_POST) {
    $name = $_POST['name'];

    $sql = "DELETE FROM produits WHERE name = '$name'";
    $X = mysqli_query($db, $sql);
}
$sql = "SELECT * FROM produits";
$result = mysqli_query($db, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete produit | campi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Delete un produit</h2>
  <form action="del.php" method="post">
    <div class="form-group">
  <label for="name">name:</label>
  <select class="form-control" id="name" name="name">
  <?php if (mysqli_num_rows($result) > 0) {
      while($res = mysqli_fetch_assoc($result)) {
        ?>
    <option value="<?= $res['name']?>"><?= $res['name']?></option>
    <?php }}?>
  </select>
</div>
    <button type="submit" class="btn btn-default">Delete</button>
  </form>
</div>

<script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
</script>
</body>
</html>
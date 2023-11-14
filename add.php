<?php
// error_reporting(1);
// ini_set('display_errors', 1);

include 'db.php';

if (isset($_POST) && $_POST) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $prix = $_POST['prix'];
    $type = $_POST['type'];

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO produits (name, description, prix,image, type)
    VALUES ('$name', '$description',$prix, '$target_file', '$type')";
    $X = mysqli_query($db, $sql);
    
}
header("Location: /");


?>
<script type="text/javascript">
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
<?php
include('database.php');
$resedinta = "";
$db = new mysqli($hostName, $userName, $password, $databaseName);
if(isset($_POST["resedinta_user"])) {
    $resedinta = $_POST['primarie'];
    $_SESSION['resedinta'] = $resedinta;
    header("location: index.php");
}
?>
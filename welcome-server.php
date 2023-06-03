<?php
include('database.php');
$resedinta = "";
$db = mysqli_connect('localhost', 'root', '', 'primarie');
if(isset($_POST["resedinta_user"])) {
    $resedinta = $_POST['primarie'];
    header("location: index.php");
    $_SESSION['resedinta'] = $resedinta;
}
?>
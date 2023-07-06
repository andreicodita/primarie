<?php
include('database.php');
include('server.php');
$resedinta = "";
$titlu = "";
$descriere = "";
$categorie = "";
$errors = array(); 

$db = new mysqli($hostName, $userName, $password, $databaseName);
if(!isset($_SESSION["email"]))
{
  $_SESSION['error'] = "Trebuie să fii logat pentru a crea o postare";
  header("location: login.php");
  exit;
}
$email = $_SESSION['email'];
$query = "SELECT id FROM users WHERE email='$email'";
$data = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($data);
$id = $row['id'];

if (isset($_POST['post_user'])) {
  $titlu = mysqli_real_escape_string($db, $_POST['titlu']);
  $categorie = mysqli_real_escape_string($db, $_POST['categorie']);
  $resedinta = mysqli_real_escape_string($db, $_POST['primarie']);
  $descriere = mysqli_real_escape_string($db, $_POST['descriere']);
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES['pictures']["name"]);
  $image = $_FILES['pictures']["name"];
  
  if (file_exists($target_file) && !empty($image)) { array_push($errors, "Există deja o imagine cu acest nume"); }
  if (empty($titlu)) { array_push($errors, "Titlul este obligatoriu"); }
  if (empty($descriere)) { array_push($errors, "Descrierea este obligatorie"); }

  if (count($errors) == 0) {
  	$query = "INSERT INTO postari (titlu, categorie, resedinta, descriere, id_user, imagine_nume) 
  			  VALUES ('$titlu', '$categorie', '$resedinta', '$descriere', '$id', '$image')";
  	mysqli_query($db, $query);
    move_uploaded_file($_FILES['pictures']["tmp_name"], $target_file);
  }
  
}

if(isset($_POST['anunt_user']))
{
  $titlu = mysqli_real_escape_string($db, $_POST['titlu']);
  $categorie = "Anunțuri";
  $resedinta = mysqli_real_escape_string($db, $_POST['primarie']);
  if($resedinta == '')
    $resedinta = $_SESSION['resedinta'];
  $descriere = mysqli_real_escape_string($db, $_POST['descriere']);
  $target_dir = "images/";
  $target_file = $target_dir . basename($_FILES['pictures']["name"]);
  $image = $_FILES['pictures']["name"];
  if (file_exists($target_file) && !empty($image)) { array_push($errors, "Există deja o imagine cu acest nume"); }
  if (empty($titlu)) { array_push($errors, "Titlul este obligatoriu"); }
  if (empty($descriere)) { array_push($errors, "Descrierea este obligatorie"); }
  if (count($errors) == 0) {
  	$query = "INSERT INTO postari (titlu, categorie, resedinta, descriere, id_user, imagine_nume) 
  			  VALUES ('$titlu', '$categorie', '$resedinta', '$descriere', '$id', '$image')";
  	mysqli_query($db, $query);
    move_uploaded_file($_FILES['pictures']["tmp_name"], $target_file);
  }

}

if(isset($_POST["anunt_user"]))
  if (count($errors) == 0){
    $_SESSION['success'] = "Anunț creat!";
  	header('location: index.php');}

if(isset($_POST["post_user"]))
  if (count($errors) == 0){
    $_SESSION['success'] = "Postare creată!";
  	header('location: index.php');}
?>

<?php
session_start();
include('database.php');
$nume = "";
$prenume = "";
$email    = "";
$resedinta = "";
$titlu = "";
$descriere = "";
$errors = array(); 

$db = new mysqli($hostName, $userName, $password, $databaseName);

if (isset($_POST['reg_user'])) {
  $nume = mysqli_real_escape_string($db, $_POST['nume']);
  $prenume = mysqli_real_escape_string($db, $_POST['prenume']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $resedinta = mysqli_real_escape_string($db, $_POST['primarie']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if (empty($nume)) { array_push($errors, "Numele este obligatoriu"); }
  if (empty($prenume)) { array_push($errors, "Prenumele este obligatoriu"); }
  if (empty($email)) { array_push($errors, "Email-ul este obligatoriu"); }
  if (empty($password_1)) { array_push($errors, "Parola este obligatorie"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Parolele nu sunt la fel");
  }
  $user_check_query = "SELECT * FROM users WHERE /*nume='$nume' OR */email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['email'] === $email) {
      array_push($errors, "Email-ul este deja folosit");
    }
  }


  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (nume, prenume, email, password, resedinta) 
  			  VALUES('$nume', '$prenume', '$email', '$password', '$resedinta')";
  	mysqli_query($db, $query);
  	$_SESSION['email'] = $email;
  	header('location: index.php');
  }
}


if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($email)) {
  	array_push($errors, "Email-ul este obligatoriu");
  }
  if (empty($password)) {
  	array_push($errors, "Parola este obligatorie");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  header("location: index.php");
  	}else {
  		array_push($errors, "Datele introduse sunt gresite");
  	}
  }
}
?>
